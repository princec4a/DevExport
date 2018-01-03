<?php

class BesoinController extends Controller
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('create','update','index','view','getRowForm','create','update',),
				'users'=>array('@'),
				'roles'=>array('admin', 'RTT', 'CO', 'Informatique', 'CMPT'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','index','view', 'validerDgBesoin', 'rejeterDgBesoin','getRowForm'),
				'users'=>array('@'),
				'roles'=>array('admin', 'DG'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','index','view','validerDDBesoin', 'rejeterDDBesoin','getRowForm'),
				'users'=>array('@'),
				'roles'=>array('admin', 'DD'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','index','view','getRowForm'),
				'users'=>array('@'),
				'roles'=>array('admin', 'Caissier'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actions() {
		return array(
			'getRowForm' => array(
				'class' => 'ext.DynamicTabularForm.actions.GetRowForm',
				'view' => '_rowForm',
				'modelClass' => 'DetailBesoin'
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
		$model=new Besoin;
		$detailBesoins = array(new DetailBesoin);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Besoin']))
		{
			$model->attributes=$_POST['Besoin'];
			$model->id_user = Yii::app()->user->id;
			$model->date_created = date('Y-m-d H:i:s');

			if(Yii::app()->user->checkAccess('DG')){
				$model->visa_dg = 1;
				$model->id_dg = Yii::app()->user->id;
				$model->date_validation_dg = date('Y-m-d H:i:s');
			}
			if(Yii::app()->user->checkAccess('DD')){
				$model->visa_dd = 1;
				$model->id_dd = Yii::app()->user->id;
				$model->date_validation_dd = date('Y-m-d H:i:s');
			}

			if(isset($_POST['DetailBesoin'])) {
				$detailBesoins = array();
				foreach ($_POST['DetailBesoin'] as $key => $value) {
					/*
                     * sladetail needs a scenario wherein the fk sla_id
                     * is not required because the ID can only be
                     * linked after the sla has been saved
                     */
					$detailBesoin = new DetailBesoin('batchSave');
					$detailBesoin->attributes = $value;
					$detailBesoins[] = $detailBesoin;
				}
			}
			/**
			 * validating the sla and array of sladetail
			 */

			$valid = $model->validate();
			foreach ($detailBesoins as $detailBesoin) {
				$valid = $detailBesoin->validate() & $valid;
			}

			if ($valid) {
				$transaction = $model->getDbConnection()->beginTransaction();
				try {
					$model->montant = 0;
					//Calcul du montant du devis
					foreach ($detailBesoins as $detailBesoin) {
						$model->montant = $model->montant + ($detailBesoin->quantite * $detailBesoin->pu);
					}
					$model->save();
					$model->numero = 'SDC-'.date('Ymd')."/".$model->id;
					$model->update(array('numero'));
					$model->refresh();

					foreach ($detailBesoins as $detailBesoin) {
						$detailBesoin->id_besoin = $model->id;
						$detailBesoin->save();
					}
					$transaction->commit();
				} catch (Exception $e) {
					$transaction->rollback();
				}

				$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'detailBesoins' => $detailBesoins,
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
		$detailBesoins = $model->detailBesoins;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Besoin']))
		{
			$model->attributes=$_POST['Besoin'];

			if (isset($_POST['DetailBesoin'])) {
				$detailBesoins = array();
				foreach ($_POST['DetailBesoin'] as $key => $value) {
					/**
					 * here we will take advantage of the updateType attribute so
					 * that we will be able to determine what we want to do
					 * to a specific row
					 */

					if ($value['updateType'] == DynamicTabularForm::UPDATE_TYPE_CREATE)
						$detailBesoins[$key] = new DetailBesoin();

					else if ($value['updateType'] == DynamicTabularForm::UPDATE_TYPE_UPDATE)
						$detailBesoins[$key] = DetailBesoin::model()->findByPk($value['id']);

					else if ($value['updateType'] == DynamicTabularForm::UPDATE_TYPE_DELETE) {
						$delete = DetailBesoin::model()->findByPk($value['id']);
						if ($delete->delete()) {
							unset($detailBesoins[$key]);
							continue;
						}
					}
					$detailBesoins[$key]->attributes = $value;
				}
			}

			$valid = $model->validate();
			foreach ($detailBesoins as $detailBesoin) {
				$valid = $detailBesoin->validate() & $valid;
			}

			if ($valid) {
				$transaction = $model->getDbConnection()->beginTransaction();
				try {
					$model->montant = 0;
					//Calcul du montant du devis
					foreach ($detailBesoins as $detailBesoin) {
						$model->montant = $model->montant + ($detailBesoin->quantite * $detailBesoin->pu);
					}
					$model->save();
					$model->refresh();

					foreach ($detailBesoins as $detailBesoin) {
						$detailBesoin->id_besoin = $model->id;
						$detailBesoin->save();
					}
					$transaction->commit();
				} catch (Exception $e) {
					$transaction->rollback();
				}

				$this->redirect(array('view', 'id' => $model->id));
			}

		}

		$this->render('update',array(
			'model'=>$model,
			'detailBesoins' => $detailBesoins,
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
		$dataProvider=new CActiveDataProvider('Besoin');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Besoin('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Besoin']))
			$model->attributes=$_GET['Besoin'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Besoin the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Besoin::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Besoin $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='besoin-form')
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
	public function actionValiderDgBesoin($id)
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
	public function actionRejeterDgBesoin($id)
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
	public function actionValiderDDBesoin($id)
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
	public function actionRejeterDDBesoin($id)
	{
		$model=$this->loadModel($id);

		$model->visa_dd = 0;
		$model->id_dd = Yii::app()->user->id;
		$model->date_validation_dd = date('Y-m-d H:i:s');
		if($model->save())
			$this->redirect(array('view','id'=>$model->id));

	}
}
