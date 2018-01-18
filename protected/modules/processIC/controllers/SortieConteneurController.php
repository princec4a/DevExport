<?php

class SortieConteneurController extends Controller
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
				'actions'=>array(),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','statistiqueSortieTC','statistiqueSortieTCByBooking'),
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
		$model=new SortieConteneur;
		$error = '';

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SortieConteneur']))
		{

			$model->attributes=$_POST['SortieConteneur'];

			$model->id_type_tc = $_POST['SortieConteneur']['id_type_tc'];
			$model->id_type_bon = $_POST['SortieConteneur']['id_type_bon'];
			$model->id_dossier = $this->getDossierClient($model->num_booking);
			$model->id_user = Yii::app()->user->id;
			$model->date_created = date('Y-m-d H:i:s');
			$model->date_livraison_tc = date('Y-m-d', strtotime($model->date_livraison_tc));
			try{
				if($model->save()) {
					$model->numero = 'ST-C-' . date('Ymd') . "/" . $model->id;
					$model->update(array('numero'));
					$this->redirect(array('view','id'=>$model->id));
				}
			}catch (CDbException $e){
				$error = 'Le booking N° <strong>'.$model->num_booking.'</strong> ne fait référence à aucun dossier, veuillez saisi un autre booking SVP !!';
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'error'=>$error,
		));
	}

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

		if(isset($_POST['SortieConteneur']))
		{
			$model->attributes=$_POST['SortieConteneur'];
			$model->id_dossier = $this->getDossierClient($model->num_booking);
			$model->date_modified = date('Y-m-d H:i:s');
			try {
				if ($model->save())
					$this->redirect(array('view', 'id' => $model->id));
			}catch (CDbException $e){
				$error = 'Le booking N° <strong>'.$model->num_booking.'</strong> n\'existe pas, veuillez saisi un autre booking SVP !!';
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
		$model = new SortieConteneur;

		$criteria  = (isset($_POST['SortieConteneur']['date_sortie_tc']) && !empty($_POST['SortieConteneur']['date_sortie_tc'])) ?
			array(
				'condition'=>"date_sortie_tc = '".date('Y-m-d', strtotime($_POST['SortieConteneur']['date_sortie_tc']))."' ",
				'order'=>'id DESC',
			):array(
				'order'=>'id DESC',
			);

		$options = array(
			'criteria'=> $criteria,
			'pagination'=>array(
				'pageSize'=>6,
			),
		);

		$dataProvider=new CActiveDataProvider('SortieConteneur', $options);
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'model'=>$model
		));
	}

	public function actionStatistiqueSortieTC()
	{
		$model=new SortieConteneur;
		$datas = array();

		if(isset($_POST['SortieConteneur'])){

			$booking = $_POST['SortieConteneur']['num_booking'];

			$du = ($_POST['SortieConteneur']['date_created'] == '0000-00-00')? null : $_POST['SortieConteneur']['date_created'];
			$au = ($_POST['SortieConteneur']['date_modified'] == '0000-00-00')? null : $_POST['SortieConteneur']['date_modified'];

			$criteria = new CDbCriteria();
			$criteria->addCondition("num_booking=:booking");
			$criteria->params = array(':booking' => $booking);
			$model = SortieConteneur::model()->findAll($criteria);

			$datas['booking'] = $booking;
			$datas['du'] = $du;
			$datas['au'] = $au;
			$datas['nb'] = SortieConteneur::model()->count($criteria);

			echo CJSON::encode($datas);

			Yii::app()->end();
		}

		$this->render('statistiqueSortieTC',array(
			'model'=>$model,
		));
	}



	public function actionStatistiqueSortieTCByBooking($booking, $du, $au)
	{
		$model=$this->loadModelByBooking($booking);
		$arraySortie = array(new SortieConteneur);
		$trouve = false;

		if($du != 'null' && $au == 'null'){
			//print_r('ici');
			foreach($model as $key => $sortie){
				if(strtotime(date('Y-m-d', strtotime($sortie->date_sortie_tc))) >= strtotime($du)){
					$arraySortie[$key] = $sortie;
				}
			}
		}else{
			foreach($model as $key => $sortie){
				if(strtotime($du) <= strtotime(date('Y-m-d', strtotime($sortie->date_sortie_tc))) && strtotime(date('Y-m-d', strtotime($sortie->date_sortie_tc))) <= strtotime($au) ){
					$arraySortie[$key] = $sortie;
					$trouve = true;
				}
			}

			if(!$trouve)
				$arraySortie = array();
		}

		//print_r(count($arraySortie));

		//exit;

		//$mPDF1 = Yii::app()->ePdf->mpdf('','A4-L','','',/*$mgl*/10,/*$mgr*/10,/*$mgt*/30,/*$mgb*/20,/*$mgh*/10,/*$mgf*/10);
		/*$mPDF1->WriteHTML(*/
		$this->renderPartial(
			'statistiqueSortieTCByBooking',
			array(
				'model'=>$model,
				'du'=>$du,
				'au'=>$au,
				'booking'=>$booking,
				'nb'=>count($arraySortie),
				'client'=>DossierClient::model()->find("num_booking = '".$booking."'"),
				'sorties'=>$arraySortie,
			)//,
		//true
		) /*)*/;

		//$mPDF1->Output();
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new SortieConteneur('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['SortieConteneur']))
			$model->attributes=$_GET['SortieConteneur'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return SortieConteneur the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=SortieConteneur::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadModelByBooking($booking)
	{
		$criteria = new CDbCriteria();
		$criteria->addCondition("num_booking=:booking");
		$criteria->params = array(':booking' => $booking);
		$model = SortieConteneur::model()->findAll($criteria);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param SortieConteneur $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='sortie-conteneur-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
