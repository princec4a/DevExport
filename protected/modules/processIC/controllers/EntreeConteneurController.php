<?php

class EntreeConteneurController extends Controller
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
				'actions'=>array('create','update','statistiqueEntreeTC','statistiqueEntreeTCByBooking'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','statistiqueEntreeTC','statistiqueEntreeTCByBooking'),
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
		$model=new EntreeConteneur;
		$error = '';
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['EntreeConteneur']))
		{

			$model->attributes=$_POST['EntreeConteneur'];
			$sortie = $model->id_sortie_conteneur;
			$model->idSortieConteneur = $this->getIdSortieConteneur($model->id_sortie_conteneur);
			if(!is_null($model->idSortieConteneur))
				$model->id_sortie_conteneur = $model->idSortieConteneur->primaryKey;
			$model->id_user = Yii::app()->user->id;
			$model->date_created = date('Y-m-d H:i:s');
			try{
				if($model->save()) {
					$model->numero = 'E-C-' . date('Ymd') . "/" . $model->id;
					$model->update(array('numero'));
					$this->redirect(array('view', 'id' => $model->id));
				}
			}catch (CDbException $e){
				$model->id_sortie_conteneur = $sortie;
				$error = 'La sortie de conteneur N° <strong>'.$sortie.'</strong> n\'existe pas, veuillez saisi le bon numéro SVP !!';
			}

		}

		$this->render('create',array(
			'model'=>$model,
			'error'=>$error,
		));
	}

	public function getIdSortieConteneur($num){

		$model = null;
		$criteria = new CDbCriteria();
		$criteria->addCondition("numero=:numero");
		$criteria->params = array(':numero' => $num);

		try{
			if(SortieConteneur::model()->count($criteria) > 0){
				$model = SortieConteneur::model()->find($criteria);
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
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$model->id_sortie_conteneur = $model->idSortieConteneur->numero;
		$error = '';

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['EntreeConteneur']))
		{
			$model->attributes=$_POST['EntreeConteneur'];
			$sortie = $model->id_sortie_conteneur;
			$model->idSortieConteneur = $this->getIdSortieConteneur($model->id_sortie_conteneur);
			$model->id_sortie_conteneur = $model->idSortieConteneur->primaryKey;
			$model->date_modified = date('Y-m-d H:i:s');
			try{
				if($model->save())
					$this->redirect(array('view','id'=>$model->id));
			}catch (CException $e){
				$model->id_sortie_conteneur = $sortie;
				$error = 'Le N° <strong>'.$sortie.'</strong> n\'existe pas, veuillez saisi un autre SVP !!';
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
		$model = new EntreeConteneur;

		$criteria  = (isset($_POST['EntreeConteneur']['date_entree_tc']) && !empty($_POST['EntreeConteneur']['date_entree_tc'])) ?
			array(
				'condition'=>"date_entree_tc = '".date('Y-m-d', strtotime($_POST['EntreeConteneur']['date_entree_tc']))."' ",
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

		$dataProvider=new CActiveDataProvider('EntreeConteneur', $options);
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'model'=>$model
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new EntreeConteneur('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['EntreeConteneur']))
			$model->attributes=$_GET['EntreeConteneur'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionStatistiqueEntreeTC()
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

		$this->render('statistiqueEntreeTC',array(
			'model'=>$model,
		));
	}



	public function actionStatistiqueEntreeTCByBooking($booking, $du, $au)
	{
		$model=$this->loadModelByBooking($booking);
		$arrayEntree = array(new EntreeConteneur);
		$trouve = false;

		/*foreach($model as $key => $sortie){
			echo "<pre>";
			print_r($sortie[0]->numero);
			echo "</pre>";
		}

		exit;*/

		if($du != 'null' && $au == 'null'){
			//print_r('ici');
			foreach($model as $key => $entree){
				if(strtotime(date('Y-m-d', strtotime($entree[0]->date_entree_tc))) >= strtotime($du)){
					$arrayEntree[$key] = $entree[0];
				}
			}
		}else{
			foreach($model as $key => $entree){
				if(strtotime($du) <= strtotime(date('Y-m-d', strtotime($entree[0]->date_entree_tc))) && strtotime(date('Y-m-d', strtotime($entree[0]->date_entree_tc))) <= strtotime($au) ){
					$arrayEntree[$key] = $entree[0];
					$trouve = true;
				}
			}

			if(!$trouve)
				$arrayEntree = array();

		}

		//print_r(count($arraySortie));

		//exit;

		//$mPDF1 = Yii::app()->ePdf->mpdf('','A4-L','','',/*$mgl*/10,/*$mgr*/10,/*$mgt*/30,/*$mgb*/20,/*$mgh*/10,/*$mgf*/10);
		/*$mPDF1->WriteHTML(*/
		$this->renderPartial(
			'statistiqueEntreeTCByBooking',
			array(
				'model'=>$model,
				'du'=>$du,
				'au'=>$au,
				'booking'=>$booking,
				'nb'=>count($arrayEntree),
				'client'=>DossierClient::model()->find("num_booking = '".$booking."'"),
				'entrees'=>$arrayEntree,
			)//,
		//true
		) /*)*/;

		//$mPDF1->Output();
	}

	public function loadModelByBooking($booking)
	{
		$criteria = new CDbCriteria();
		$criteria->addCondition("num_booking=:booking");
		$criteria->params = array(':booking' => $booking);
		$model = SortieConteneur::model()->findAll($criteria);
		$array = array();
		foreach($model as $v){
			if(count($v->entreeConteneurs) > 0)
				$array[] = $v->entreeConteneurs;
		}

		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $array;
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return EntreeConteneur the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=EntreeConteneur::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param EntreeConteneur $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='entree-conteneur-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
