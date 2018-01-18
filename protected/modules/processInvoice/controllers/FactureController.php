<?php

class FactureController extends Controller
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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','getRowForm'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','getRowForm'),
				'users'=>array('admin'),
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
				'modelClass' => 'DetailFacture'
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
		$model=new Facture;
		$detailFactures = array(new DetailFacture);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Facture']))
		{
			$model->attributes=$_POST['Facture'];
			$model->id_user = Yii::app()->user->id;
			$model->date_created = date('Y-m-d H:i:s');

			if(isset($_POST['DetailFacture'])) {
				$detailFactures = array();
				foreach ($_POST['DetailFacture'] as $key => $value) {
					/*
                     * sladetail needs a scenario wherein the fk sla_id
                     * is not required because the ID can only be
                     * linked after the sla has been saved
                     */
					$detailFacture = new DetailFacture('batchSave');
					$detailFacture->attributes = $value;
					$detailFacture->id_user = Yii::app()->user->id;
					$detailFacture->date_created = date('Y-m-d H:i:s');

					$detailFactures[] = $detailFacture;
				}
			}

			/**
			 * validating the sla and array of sladetail
			 */

			$valid = $model->validate();
			foreach ($detailFactures as $detailFacture) {
				$valid = $detailFacture->validate() & $valid;
			}

			if ($valid) {
				$transaction = $model->getDbConnection()->beginTransaction();
				try {
					$model->montant = 0;
					$model->total_poids_net = 0;
					//Calcul du montant du devis
					foreach ($detailFactures as $detailFacture)  {
						$model->montant = $model->montant + ($detailFacture->poids_net * DetailFacture::TAUX);
						$model->total_poids_net = $model->total_poids_net + $detailFacture->poids_net;
					}
					$model->save();
					$model->numero = 'FCT-'.date('Ymd')."/".$model->id;
					$model->update(array('numero'));
					$model->refresh();

					foreach ($detailFactures as $detailFacture) {
						$detailFacture->id_facture = $model->id;
						$detailFacture->montant = $detailFacture->poids_net * DetailFacture::TAUX;
						$detailFacture->save();
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
			'detailFactures' => $detailFactures,
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
		$detailFactures = $model->detailFactures;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Facture']))
		{
			$model->attributes=$_POST['Facture'];

			if (isset($_POST['DetailFacture'])) {
				$detailFactures = array();
				foreach ($_POST['DetailFacture'] as $key => $value) {
					/**
					 * here we will take advantage of the updateType attribute so
					 * that we will be able to determine what we want to do
					 * to a specific row
					 */

					if ($value['updateType'] == DynamicTabularForm::UPDATE_TYPE_CREATE)
						$detailFactures[$key] = new DetailFacture();

					else if ($value['updateType'] == DynamicTabularForm::UPDATE_TYPE_UPDATE)
						$detailFactures[$key] = DetailFacture::model()->findByPk($value['id']);

					else if ($value['updateType'] == DynamicTabularForm::UPDATE_TYPE_DELETE) {
						$delete = DetailFacture::model()->findByPk($value['id']);
						if ($delete->delete()) {
							unset($detailFactures[$key]);
							continue;
						}
					}
					$detailFactures[$key]->attributes = $value;
				}
			}

			$valid = $model->validate();
			foreach ($detailFactures as $detailFacture) {
				$valid = $detailFacture->validate() & $valid;
			}

			if ($valid) {
				$transaction = $model->getDbConnection()->beginTransaction();
				try {

					$model->montant = 0;
					//Calcul du montant de la facture
					foreach ($detailFactures as $detailFacture) {
						$model->montant = $model->montant + ($detailFacture->poids_net * DetailFacture::TAUX);
						$model->total_poids_net = $model->total_poids_net + $detailFacture->poids_net;
					}
					$model->save();
					$model->refresh();

					foreach ($detailFactures as $detailFacture) {
						$detailFacture->id_facture = $model->id;
						$detailFacture->montant = $detailFacture->poids_net * DetailFacture::TAUX;
						$detailFacture->id_user = Yii::app()->user->id;
						$detailFacture->date_modified = date('Y-m-d H:i:s');
						$detailFacture->save();
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
			'detailFactures' => $detailFactures,
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
		$dataProvider=new CActiveDataProvider('Facture');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Facture('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Facture']))
			$model->attributes=$_GET['Facture'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Facture the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Facture::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Facture $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='facture-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
