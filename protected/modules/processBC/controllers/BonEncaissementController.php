<?php

class BonEncaissementController extends Controller
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
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','index','view','getInfoPiece', 'validerRTTBC', 'validerCaissierBC', 'getInfoDossierClient','refresh'),
				'users'=>array('@'),
				'roles'=>array('DG', 'Caissier', 'CMPT', 'admin'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('view', 'validerRTTBC', 'getInfoDossierClient','refresh'),
				'users'=>array('@'),
				'roles'=>array('RTT', 'admin'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','getInfoDossierClient', 'validerRTTBC', 'validerCaissierBC','refresh'),
				'users'=>array('admin', 'DG'),
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
		$model=new BonEncaissement;
		$model->montant = 0;
		$model->accompte = 0;
		$error = '';

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['BonEncaissement']))
		{
			$model->attributes=$_POST['BonEncaissement'];
			$model->id_user = Yii::app()->user->id;
			$model->id_caissier = Yii::app()->user->id;
			$model->date_created = date('Y-m-d H:i:s');

			//Verifier si l'accompte est supérieur au montant
			if($model->montant >= $model->accompte){
				//Vérifier si le booking est lie à un dossier
				if($this->isValideBooking($model->id_dossier)){
					$dossier = $this->getDossierClient($model->id_dossier);
					$model->id_dossier = $dossier->primaryKey;
					$model->a_ordre = $dossier->id_client;
					if($model->save()){
						$model->numero = 'EC-'.date('Ymd')."/".$model->id;
						$model->update(array('numero'));
						$this->redirect(array('view','id'=>$model->id));
					}
				}
				else
					$error = 'Impossible de créer un bon d\'encaissent pour le booking N° <strong>'.$model->id_dossier.'</strong>, booking inexistant !!';
			}else
				$error = 'Impossible de créer un bon d\'encaissent dont l\'accompte est supérieur au montant total';
		}

		$this->render('create',array(
			'model'=>$model,
			'error'=>$error,
		));
	}

	public function isValideBooking($num_booking){
		$criteria = new CDbCriteria();
		$criteria->addCondition("num_booking=:booking");
		$criteria->params = array(':booking' => $num_booking);

		/**
		 * Rechercher le dossier correspondant au booing
		 */
		if(DossierClient::model()->count($criteria) > 0)
			return true;
		else
			return false;
	}

	public function getDossierClient($num_booking){
		$criteria = new CDbCriteria();
		$criteria->addCondition("num_booking=:booking");
		$criteria->params = array(':booking' => $num_booking);

		/**
		 * Rechercher le dossier correspondant au booing
		 */
		if(DossierClient::model()->count($criteria) > 0)
			return DossierClient::model()->find($criteria);
		else
			return null;
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$dossier = $this->loadDossierClient($model->id_dossier);
		$error = '';
		$model->id_dossier = $dossier->num_booking;
		$model->a_ordre = $dossier->idClient->nom_societe;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['BonEncaissement']))
		{
			$model->attributes=$_POST['BonEncaissement'];
			$model->date_created = date('Y-m-d H:i:s');

			//Verifier si l'accompte est supérieur au montant
			if($model->montant >= $model->accompte) {
				if ($this->isValideBooking($model->id_dossier)) {
					$dossier = $this->getDossierClient($model->id_dossier);
					$model->id_dossier = $dossier->primaryKey;
					$model->a_ordre = $dossier->id_client;
					if ($model->save())
						$this->redirect(array('view', 'id' => $model->id));
				} else
					$error = 'Impossible de créer un bon d\'encaissent pour le booking N° <strong>' . $model->id_dossier . '</strong>, booking inexistant !!';
			}else
				$error = 'Impossible de créer un bon d\'encaissent dont l\'accompte est supérieur au montant total';

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

	public function actionGetInfoDossierClient()
	{

		if(isset($_POST['num_booking']) && !empty($_POST['num_booking'])) {
			//On vérifie si le numero de booking à bien un dossier
			$model = DossierClient::model()->find(array(
				'condition' => 'num_booking=:num_booking',
				'params' => array(':num_booking' => $_POST['num_booking'])
			));

			$data['client'] = $model->idClient->nom.' '.$model->idClient->prenom;
			$data['societe'] = $model->idClient->nom_societe;

			echo CJSON::encode($data);
		}

		Yii::app()->end();
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('BonEncaissement');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new BonEncaissement('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['BonEncaissement']))
			$model->attributes=$_GET['BonEncaissement'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionRefresh(){
		echo "refresh";
		Yii::app()->end();
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return BonEncaissement the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=BonEncaissement::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadDossierClient($id){
		$model=DossierClient::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param BonEncaissement $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='bon-encaissement-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
