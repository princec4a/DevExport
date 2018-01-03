<?php

class DevisAController extends Controller
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
				'actions'=>array('create','update','index','view', 'validerDgDevisA', 'rejeterDgDevisA'),
				'users'=>array('@'),
				'roles'=>array('admin', 'DG'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('view','validerDDDevisA', 'rejeterDDDevisA'),
				'users'=>array('@'),
				'roles'=>array('admin', 'DD'),
			),
			array('allow',
				'actions'=>array('create','update','index','view','validerRTTDevisA', 'rejeterRTTDevisA'),
				'users'=>array('@'),
				'roles'=>array('admin', 'RTT'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('view','validerCaissierDevisA', 'rejeterCaissierDevisA'),
				'users'=>array('@'),
				'roles'=>array('admin', 'Caissier'),
			),
			array('allow',
				'actions'=>array('admin','delete', 'validerDgDevisA', 'rejeterDgDevisA',
					'validerDDDevisA', 'rejeterDDDevisA', 'validerRTTDevisA', 'rejeterRTTDevisA', 'validerCaissierDevisA', 'rejeterCaissierDevisA'),
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
		$model=new DevisA;
		$error = '';

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['DevisA']))
		{
			$model->attributes=$_POST['DevisA'];
			$model->id_user = Yii::app()->user->id;
			$model->date_created = date('Y-m-d H:i:s');
			$model->visa_rtt = 1;
			//Recherche si le dossier client à déjà un devis A
			$model->id_dossier = $this->getDossierClient($model->id_dossier);
			try{
				if($model->save()){
					$model->numero = 'DV-A-'.date('Ymd')."/".$model->id;
					$model->update(array('numero'));
					$this->redirect(array('view','id'=>$model->id));
				}
			}catch (CDbException $e){
				$model->id_dossier = $model->idDossier->num_booking;
				$error = 'Le booking N° <strong>'.$model->idDossier->num_booking.'</strong> a déjà un devis A, veuillez saisi un autre booking SVP !!';

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
		$error = '';
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['DevisA']))
		{
			$model->attributes=$_POST['DevisA'];

			//Recherche si le dossier client à déjà un devis A
			$model->id_dossier = $this->getDossierClient($model->id_dossier);
			try{

				if($model->save())
					$this->redirect(array('view','id'=>$model->id));

			}catch (CDbException $e){
				$model->id_dossier = $model->idDossier->num_booking;
				$error = 'Le booking N° <strong>'.$model->idDossier->num_booking.'</strong> a déjà un devis A, veuillez saisi un autre booking SVP !!';

			}
		}

		$this->render('update',array(
			'model'=>$model,
			'error'=>$error,
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
		$dataProvider=new CActiveDataProvider('DevisA');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new DevisA('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['DevisA']))
			$model->attributes=$_GET['DevisA'];

		$this->render('admin',array(
			'model'=>$model,
		));
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
	public function actionValiderDgDevisA($id)
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
	public function actionRejeterDgDevisA($id)
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
	public function actionValiderDDDevisA($id)
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
	public function actionRejeterDDDevisA($id)
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
	public function actionValiderRTTDevisA($id)
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
	public function actionRejeterRTTDevisA($id)
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
	public function actionValiderCaissierDevisA($id)
	{
		$model=$this->loadModel($id);

		$model->visa_caissiere = 1;
		$model->id_caissiere = Yii::app()->user->id;
		$model->date_validation_caissiere = date('Y-m-d H:i:s');
		if($model->save())
			$this->redirect(array('view','id'=>$model->id));

	}

	/**
	 * Rejet Caissier
	 * @param $booking
	 * @return mixed|null
	 * @internal param $id
	 */

	/*public function actionSearch()
	{

		if(isset($_POST['booking']) && !empty($_POST['booking']))
		{
			$data = array();

			$criteria = new CDbCriteria();
			$criteria->addCondition("num_booking=:num_booking");
			$criteria->params = array(':num_booking' => $_POST['booking']);

			if(DossierClient::model()->count($criteria) > 0){
				$model = DossierClient::model()->find($criteria);
				$data['client'] = $model->idClient->nom.' '.$model->idClient->prenom;
				$data['id_client'] = $model->id_client;
				$data['nbrDossier'] = DossierClient::model()->count($criteria);
				$data['id_dossier'] = $model->id;
			}
			else{
				$data['id_dossier'] = 0;
			}

			echo CJSON::encode($data);
			Yii::app()->end();
		}

	}*/

	public function getDossierClient($booking)
	{

		if(isset($booking) && !empty($booking))
		{
			$criteria = new CDbCriteria();
			$criteria->addCondition("num_booking=:num_booking");
			$criteria->params = array(':num_booking' => $booking);

			if(DossierClient::model()->count($criteria) > 0){
				$model = DossierClient::model()->find($criteria);
				return $model->id;
			}
		}

	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return DevisA the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=DevisA::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param DevisA $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='devis-a-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

}
