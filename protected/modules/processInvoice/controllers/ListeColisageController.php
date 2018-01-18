<?php

class ListeColisageController extends Controller
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
				'modelClass' => 'DetailListeColisage'
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
		$model=new ListeColisage;
		$detailListeColisages = array(new DetailListeColisage);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ListeColisage']))
		{
			$model->attributes=$_POST['ListeColisage'];
			$model->id_user = Yii::app()->user->id;
			$model->date_created = date('Y-m-d H:i:s');


			if(isset($_POST['DetailListeColisage'])) {
				$detailListeColisages = array();
				foreach ($_POST['DetailListeColisage'] as $key => $value) {
					/*
                     * sladetail needs a scenario wherein the fk sla_id
                     * is not required because the ID can only be
                     * linked after the sla has been saved
                     */
					$detailListeColisage = new DetailListeColisage('batchSave');
					$detailListeColisage->attributes = $value;
					$detailListeColisage->id_user = Yii::app()->user->id;
					$detailListeColisage->date_created = date('Y-m-d H:i:s');

					$detailListeColisages[] = $detailListeColisage;
				}
			}

			/**
			 * validating the sla and array of sladetail
			 */

			$valid = $model->validate();
			foreach ($detailListeColisages as $detailListeColisage) {
				$valid = $detailListeColisage->validate() & $valid;
			}

			if ($valid) {
				$transaction = $model->getDbConnection()->beginTransaction();
				try {
					$model->total_poids_brut = 0;
					$model->total_poids_net = 0;
					//Calcul du montant du devis
					foreach ($detailListeColisages as $detailListeColisage)  {
						$model->total_poids_brut = $model->total_poids_brut + $detailListeColisage->poids_brut;
						$model->total_poids_net = $model->total_poids_net + $detailListeColisage->poids_net;
					}
					$model->save();
					$model->mumero = 'LC-'.date('Ymd')."/".$model->id;
					$model->update(array('mumero'));
					$model->refresh();

					var_dump('ici');

					foreach ($detailListeColisages as $detailListeColisage) {
						$detailListeColisage->id_liste_colisage = $model->id;
						$detailListeColisage->save();
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
			'detailListeColisages' => $detailListeColisages,
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
		$detailListeColisages = $model->detailListeColisage;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ListeColisage']))
		{
			$model->attributes=$_POST['ListeColisage'];

			if (isset($_POST['DetailListeColisage'])) {
				$detailListeColisages = array();
				foreach ($_POST['DetailListeColisage'] as $key => $value) {
					/**
					 * here we will take advantage of the updateType attribute so
					 * that we will be able to determine what we want to do
					 * to a specific row
					 */

					if ($value['updateType'] == DynamicTabularForm::UPDATE_TYPE_CREATE)
						$detailListeColisages[$key] = new DetailListeColisage;

					else if ($value['updateType'] == DynamicTabularForm::UPDATE_TYPE_UPDATE)
						$detailListeColisages[$key] = DetailListeColisage::model()->findByPk($value['id']);

					else if ($value['updateType'] == DynamicTabularForm::UPDATE_TYPE_DELETE) {
						$delete = DetailFacture::model()->findByPk($value['id']);
						if ($delete->delete()) {
							unset($detailListeColisages[$key]);
							continue;
						}
					}
					$detailListeColisages[$key]->attributes = $value;
				}
			}

			$valid = $model->validate();
			foreach ($detailListeColisages as $detailListeColisage) {
				$valid = $detailListeColisage->validate() & $valid;
			}

			if ($valid) {
				$transaction = $model->getDbConnection()->beginTransaction();
				try {

					//Calcul
					foreach ($detailListeColisages as $detailListeColisage) {
						$model->total_poids_brut = $model->total_poids_brut + $detailListeColisage->poids_brut;
						$model->total_poids_net = $model->total_poids_net + $detailListeColisage->poids_net;
					}
					$model->save();
					$model->refresh();

					foreach ($detailListeColisages as $detailListeColisage) {
						$detailListeColisage->id_liste_colisage = $model->id;
						$detailListeColisage->id_user = Yii::app()->user->id;
						$detailListeColisage->date_modified = date('Y-m-d H:i:s');
						$detailListeColisage->save();
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
			'detailListeColisages' => $detailListeColisages,
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
		$dataProvider=new CActiveDataProvider('ListeColisage');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ListeColisage('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ListeColisage']))
			$model->attributes=$_GET['ListeColisage'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return ListeColisage the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=ListeColisage::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param ListeColisage $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='liste-colisage-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
