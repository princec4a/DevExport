<?php

class DevisDController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			/*array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),*/
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','index','view', 'validerDgDevisD', 'rejeterDgDevisD'),
				'users'=>array('@'),
				'roles'=>array('admin', 'DG'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('view','validerDDDevisD', 'rejeterDDDevisD'),
				'users'=>array('@'),
				'roles'=>array('admin', 'DD'),
			),
			array('allow',
				'actions'=>array('create','update','index','view','validerRTTDevisD', 'rejeterRTTDevisD'),
				'users'=>array('@'),
				'roles'=>array('admin', 'RTT'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('view','validerCaissierDevisD', 'rejeterCaissierDevisD'),
				'users'=>array('@'),
				'roles'=>array('admin', 'Caissier'),
			),
			array('allow',
				'actions'=>array('index','view','admin','delete', 'validerDgDevisA', 'rejeterDgDevisA',
					'validerDDDevisA', 'rejeterDDDevisD', 'validerRTTDevisD', 'rejeterRTTDevisD', 'validerCaissierDevisD', 'rejeterCaissierDevisD'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new DevisD;
		$model->dd = $model->tel_i = $model->tr = $model->frais_saisie_btf = $model->sortie_tc_d = $model->trans = 0;

		$error = '';

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['DevisD']))
		{
			$model->attributes=$_POST['DevisD'];
			$model->id_user = Yii::app()->user->id;
			$model->date_created = date('Y-m-d H:i:s');
			$model->visa_rtt = 1;
			//On va recherche l'id du devis A via le numéro
			$model->idDevisA = $this->getIdevisAByNum($model->id_devis_a);

			if(!is_null($model->idDevisA)){
				//verification de la validation du devis
				if($model->idDevisA->visa_dg !=0 && $model->idDevisA->visa_dd !=0 && $model->idDevisA->visa_rtt !=0 && $model->idDevisA->visa_caissiere !=0){
					//Verification des doublons
					try{
						$model->id_devis_a = $model->idDevisA->id;
						if($model->save()){
							$model->numero = 'DV-D-'.date('Ymd')."/".$model->id;
							$model->update(array('numero'));
							$this->redirect(array('view','id'=>$model->id));
						}
					}catch (CDbException $e){
						$model->id_devis_a = $model->idDevisA->numero;
						$error = 'Le Devis Administratif N° <strong>'.$model->idDevisA->numero.'</strong> a déjà un devis D, veuillez saisi un autre numéro SVP !!';
					}
				}
				else{
					$model->id_devis_a = $model->idDevisA->numero;
					$error = 'Le Devis Administratif N° <strong>'.$model->idDevisA->numero.'</strong> n\'est pas validé, Impossible de créer un Devis Douane correspondant';
				}
			}else{
				$error = 'Le Devis Administratif N° <strong>'.$model->id_devis_a.'</strong> inexistant, veuillez créer un devis administratif avant de faire cette opération';
			}

		}
		$this->render('create',array(
			'model'=>$model,
			'error'=>$error,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['DevisD']))
		{
			$model->attributes=$_POST['DevisD'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('DevisD');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new DevisD('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['DevisD']))
			$model->attributes=$_GET['DevisD'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return DevisD the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=DevisD::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function getIdevisAByNum($num_devis){

		$model = null;
		$criteria = new CDbCriteria();
		$criteria->addCondition("numero=:numero");
		$criteria->params = array(':numero' => $num_devis);

		try{
			if(DevisA::model()->count($criteria) > 0){
				$model = DevisA::model()->find($criteria);
				return $model;
			}
			else{
				return $model;
			}
		}catch (CException $e){
			return $model;
		}
	}

	/**
	 * Performs the AJAX validation.
	 * @param DevisD $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='devis-d-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	/************************************************
	 *
	 * 		Action de validation et rejet DG
	 *
	 ********************************************/

	/**
	 * Validation DG
	 * @param $id
	 * @throws CHttpException
	 */
	public function actionValiderDgDevisD($id)
	{
		$model=$this->loadModel($id);

		$model->visa_dg = 1;
		$model->id_dg = Yii::app()->user->id;
		$model->date_validation_dg = date('Y-m-d H:i:s');
		if($model->save())
			$this->redirect(array('view','id'=>$model->id));

	}

	/**
	 * Rejet DG
	 * @param $id
	 * @throws CHttpException
	 */
	public function actionRejeterDgDevisD($id)
	{
		$model=$this->loadModel($id);

		$model->visa_dg = 0;
		$model->id_dg = Yii::app()->user->id;
		$model->date_validation_dg = date('Y-m-d H:i:s');
		if($model->save())
			$this->redirect(array('view','id'=>$model->id));

	}

	/******************************************************
	 *
	 * 				Acttions validation DD
	 *
	 ********************************************************/

	/**
	 * Validation DD
	 * @param $id
	 * @throws CHttpException
	 */
	public function actionValiderDDDevisD($id)
	{
		$model=$this->loadModel($id);

		$model->visa_dd = 1;
		$model->id_dd = Yii::app()->user->id;
		$model->date_validation_dd = date('Y-m-d H:i:s');
		if($model->save())
			$this->redirect(array('view','id'=>$model->id));

	}

	/**
	 * Rejet DG
	 * @param $id
	 * @throws CHttpException
	 */
	public function actionRejeterDDDevisD($id)
	{
		$model=$this->loadModel($id);

		$model->visa_dd = 0;
		$model->id_dd = Yii::app()->user->id;
		$model->date_validation_dd = date('Y-m-d H:i:s');
		if($model->save())
			$this->redirect(array('view','id'=>$model->id));

	}

	/******************************************************
	 *
	 * 				Acttions validation RTT
	 *
	 ********************************************************/

	/**
	 * Validation RTT
	 * @param $id
	 * @throws CHttpException
	 */
	public function actionValiderRTTDevisD($id)
	{
		$model=$this->loadModel($id);

		$model->visa_rtt = 1;
		$model->id_rtt = Yii::app()->user->id;
		$model->date_validation_rtt = date('Y-m-d H:i:s');
		if($model->save())
			$this->redirect(array('view','id'=>$model->id));

	}

	/**
	 * Rejet RTT
	 * @param $id
	 * @throws CHttpException
	 */
	public function actionRejeterRTTDevisD($id)
	{
		$model=$this->loadModel($id);

		$model->visa_dd = 0;
		$model->id_dd = Yii::app()->user->id;
		$model->date_validation_dd = date('Y-m-d H:i:s');
		if($model->save())
			$this->redirect(array('view','id'=>$model->id));

	}

	/******************************************************
	 *
	 * 				Acttions validation CAISSIER
	 *
	 ********************************************************/

	/**
	 * Validation Caissier
	 * @param $id
	 * @throws CHttpException
	 */
	public function actionValiderCaissierDevisD($id)
	{
		$model=$this->loadModel($id);

		$model->visa_caissiere = 1;
		$model->id_caissiere = Yii::app()->user->id;
		$model->date_validation_caissiere = date('Y-m-d H:i:s');
		if($model->save())
			$this->redirect(array('view','id'=>$model->id));

	}
}
