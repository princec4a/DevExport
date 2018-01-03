<?php

class BonCaisseController extends Controller
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
				'actions'=>array('create','update','index','view','getInfoPiece', 'validerRTTBC', 'validerCaissierBC', 'bonDeCaisse'),
				'users'=>array('@'),
				'roles'=>array('DG', 'Caissier', 'CMPT', 'admin'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('view', 'validerRTTBC', 'bonDeCaisse'),
				'users'=>array('@'),
				'roles'=>array('RTT', 'admin'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','getInfoPiece', 'validerRTTBC', 'validerCaissierBC'),
				'users'=>array('admin', 'DG'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionBonDeCaisse($id)
	{
		$model=$this->loadModel($id);
		$mPDF1 = Yii::app()->ePdf->mpdf('','A4','','',/*$mgl*/10,/*$mgr*/10,/*$mgt*/30,/*$mgb*/20,/*$mgh*/10,/*$mgf*/10);
		$mPDF1->WriteHTML($this->renderPartial(
			'bonDeCaisse',
			array(
				'model'=>$model,
			),
			true
		));

		$mPDF1->Output();
	}

	/******************************************************
	 *
	 * 				Acttions validation RTT interessé
	 *
	 ********************************************************/

	/**
	 * Validation RTT
	 * @param $id
	 * @throws CHttpException
	 */
	public function actionValiderRTTBC($id)
	{
		$model=$this->loadModel($id);

		$model->visa_interesse = 1;
		$model->id_interesse = Yii::app()->user->id;
		$model->date_validation_interesse = date('Y-m-d H:i:s');
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
	public function actionValiderCaissierBC($id)
	{
		$model=$this->loadModel($id);

		$model->visa_caissier = 1;
		$model->id_caissier = Yii::app()->user->id;
		$model->date_validation_caissier = date('Y-m-d H:i:s');
		if($model->save())
			$this->redirect(array('view','id'=>$model->id));
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
		$model=new BonCaisse;
		$error = '';

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['BonCaisse']))
		{
			$model->attributes=$_POST['BonCaisse'];
			$model->id_user = Yii::app()->user->id;
			$model->date_created = date('Y-m-d H:i:s');
			$model->visa_caissier = 1;

			//Vérifier si la pièce n'a pas déjà été payé
			if(!$this->isPayePiece($model->num_piece)){
				//Vérifier si la pièce [Devis A ou Devi D] a été validé par le DG, DD, RTT avant de créer le bon de caisse
				if($this->isValidePiece($model->num_piece)){
					if($model->save()){
						$model->numero = 'BC-'.date('Ymd')."/".$model->id;
						$model->update(array('numero'));
						//Changer l'état de la pièce [Devis A ou D ou Etat de besoin] à payé : 1
						$piece = $this->loadPieceModel($model->num_piece);
						$piece->etat = 1;
						$piece->update(array('etat'));
						$this->redirect(array('view','id'=>$model->id));
					}
				}
				else
					$error = 'Impossible de créer un bon sortie caisse pour le document N° <strong>'.$model->num_piece.'</strong>, il n\'est pas validé !!';
			}else
				$error = 'Attention le document N° <strong>'.$model->num_piece.'</strong>, il est déjà payé !!';
		}

		$this->render('create',array(
			'model'=>$model,
			'error'=>$error,
		));
	}

	public function isValidePiece($numero_piece){

		$criteria = new CDbCriteria();
		$criteria->addCondition("numero=:num");
		$criteria->params = array(':num' => $numero_piece);

		/**
		 * Rechercher la pièce parmis les devis A
		 * Si la pièce est un devis A alors vérifion si le Dg, DD, RTT ont validé la pièce
		 */
		if(DevisA::model()->count($criteria) > 0){
			$piece = DevisA::model()->find($criteria);
			if($piece->visa_dg == 1 && $piece->visa_dd == 1 && $piece->visa_rtt == 1 && $piece->visa_caissiere == 1 )
				return true;
			else
				return false;
		}
		elseif(DevisD::model()->count($criteria) > 0){
			$piece = DevisD::model()->find($criteria);
			if($piece->visa_dg == 1 && $piece->visa_dd == 1 && $piece->visa_rtt == 1 && $piece->visa_caissiere == 1)
				return true;
			else
				return false;
		}
		elseif(Besoin::model()->count($criteria) > 0){
			$piece = Besoin::model()->find($criteria);
			if($piece->visa_dg == 1 && $piece->visa_dd == 1)
				return true;
			else
				return false;
		}
	}

	public function isPayePiece($numero_piece){

		$criteria = new CDbCriteria();
		$criteria->addCondition("numero=:num");
		$criteria->params = array(':num' => $numero_piece);

		/**
		 * Rechercher la pièce parmis les devis A
		 * Si la pièce est un devis A alors vérifion si le Dg, DD, RTT ont validé la pièce
		 */
		if(DevisA::model()->count($criteria) > 0){
			$piece = DevisA::model()->find($criteria);
			if($piece->etat == 1)
				return true;
			else
				return false;
		}
		elseif(DevisD::model()->count($criteria) > 0){
			$piece = DevisD::model()->find($criteria);
			if($piece->etat == 1)
				return true;
			else
				return false;
		}
		elseif(Besoin::model()->count($criteria) > 0){
			$piece = Besoin::model()->find($criteria);
			if($piece->etat == 1)
				return true;
			else
				return false;
		}
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$dossier=
		$error = '';
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['BonCaisse']))
		{
			$model->attributes=$_POST['BonCaisse'];
			$model->date_modified = date('Y-m-d H:i:s');

			//Vérifier si la pièce n'a pas déjà été payé
			if(!$this->isPayePiece($model->num_piece)) {
				if ($this->isValidePiece($model->num_piece)) {
					if ($model->save())
						$this->redirect(array('view', 'id' => $model->id));
				} else
					$error = 'Impossible de créer un bon de caisse pour le devis N° <strong>' . $model->num_piece . '</strong>, il n\'est pas validé !!';
			}else
				$error = 'Attention le document N° <strong>'.$model->num_piece.'</strong>, il est déjà payé !!';
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
		$dataProvider=new CActiveDataProvider('BonCaisse');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new BonCaisse('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['BonCaisse']))
			$model->attributes=$_GET['BonCaisse'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionGetInfoPiece()
	{

		if(isset($_POST['num_piece']) && !empty($_POST['num_piece']))
		{
			//On vérifie si le numero de pièce sélection correspond à un devis A
			$count_A  = DevisA::model()->count(array(
				'condition'=>'numero=:num_piece',
				'params'=>array(':num_piece'=>$_POST['num_piece'])
			));

			//Si La pièce selection n'est pas un devis A
			if($count_A < 1){
				//Rechercher parmis les devis D
				$count_D = DevisD::model()->count(array(
					'condition'=>'numero=:num_piece',
					'params'=>array(':num_piece'=>$_POST['num_piece'])
				));

				//Si La pièce selection est un devis D
				if($count_D > 0){

					$model = DevisD::model()->find(array(
						'condition'=>'numero=:num_piece',
						'params'=>array(':num_piece'=>$_POST['num_piece'])
					));

					echo CJSON::encode($model);

					Yii::app()->end();
				}else{
					//Si c'est un Etat de besoin

					$model = Besoin::model()->find(array(
						'condition'=>'numero=:num_piece',
						'params'=>array(':num_piece'=>$_POST['num_piece'])
					));

					echo CJSON::encode($model);

					Yii::app()->end();
				}
			}
			else{
				//Si la pièce est un devis A
				$model = DevisA::model()->find(array(
					'condition'=>'numero=:num_piece',
					'params'=>array(':num_piece'=>$_POST['num_piece'])
				));

				echo CJSON::encode($model);

				Yii::app()->end();

			}

		}

		Yii::app()->end();
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return BonCaisse the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=BonCaisse::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadPieceModel($num)
	{
		//On vérifie si le numero de pièce sélection correspond à un devis A
		$count_A  = DevisA::model()->count(array(
			'condition'=>'numero=:num_piece',
			'params'=>array(':num_piece'=>$num)
		));

		//Si La pièce selection n'est pas un devis A
		if($count_A < 1){
			//Rechercher parmis les devis D
			$count_D = DevisD::model()->count(array(
				'condition'=>'numero=:num_piece',
				'params'=>array(':num_piece'=>$num)
			));

			//Si La pièce selection est un devis D
			if($count_D > 0){
				$model = DevisD::model()->find(array(
					'condition'=>'numero=:num_piece',
					'params'=>array(':num_piece'=>$num)
				));
				return $model;
			}else{
				$model = Besoin::model()->find(array(
					'condition'=>'numero=:num_piece',
					'params'=>array(':num_piece'=>$num)
				));
				return $model;
			}
		}
		else{
			$model = DevisA::model()->find(array(
				'condition'=>'numero=:num_piece',
				'params'=>array(':num_piece'=>$num)
			));
			return $model;
		}
	}

	/**
	 * Performs the AJAX validation.
	 * @param BonCaisse $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='bon-caisse-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
