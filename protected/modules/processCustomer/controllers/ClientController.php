<?php

class ClientController extends Controller
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
				'actions'=>array('create','delete','update','index','view','booking','ticket', 'getInfoClient', 'searchReleveCmpt','releveCmptClient'),
				'users'=>array('@'),
				'roles'=>array('DG', 'DD','admin','getInfoClient','Caissier'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('searchReleveCmpt','releveCmptClient'),
				'users'=>array('@'),
				'roles'=>array('CMPT'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','booking','getInfoClient', 'searchReleveCmpt','releveCmptClient'),
				'users'=>array('DG','admin'),
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
	public function actionView($id,$do)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'dossier'=>$this->loadDossierClient($do),
		));
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionBooking()
	{
		$this->render('booking',array(
			//'model'=>$model,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Client;
		$dossier= new DossierClient;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Client']))
		{
			$model->attributes=$_POST['Client'];
			$model->id_user = Yii::app()->user->id;
			$model->date_created = date('Y-m-d H:i:s');
			//print_r($model);
			//exit;
			$model->setNumbc($_POST['Client']['numbc']);
			$Fichiers_bc = CUploadedFile::getInstancesByName('fichier_bc');
			foreach ($Fichiers_bc as $file => $Fichier) {
				$dossier->img_bon_commande = $Fichier->name;
				break;
			}
			/*
			 * Vérifier si le client existe déjà alors on ne créer que son dossier
			 * sinon on l'enregistrer et on créer son dossier
			 */
			$condition = array(
				'condition' => 'code=:code',
				'params' => array(':code' => $model->code)
			);
			if(Client::model()->exists($condition)){
				$model = Client::model()->find($condition);
				$model->setNumbc($_POST['Client']['numbc']);
				$id_dossier = $this->createDossier($model,$dossier);
				GestionFichier::FileSaveFichier($Fichiers_bc,$model->id, $id_dossier);
				$this->redirect(array('view','id'=>$model->id, 'do'=>$id_dossier));
			}else{
				if($model->save()){
					$id_dossier = $this->createDossier($model,$dossier);
					GestionFichier::FileSaveFichier($Fichiers_bc,$model->id, $id_dossier);
					$this->redirect(array('view','id'=>$model->id, 'do'=>$id_dossier));
				}
			}

		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function createDossier($model, $dossier){
		$dossier->id_client = $model->primaryKey;
		$dossier->id_user = Yii::app()->user->id;
		$dossier->date_created = date('Y-m-d H:i:s');
		$dossier->num_bon_commande = $model->getNumbc();
		$dossier->etat = 1; //Etat en attente de booking
		$dossier->save(false);
		$dossier->numero = $model->code.'F-0'.$dossier->primaryKey;
		$dossier->update(array('numero'));
		return $dossier->primaryKey;
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id, $do)
	{
		$model=$this->loadModel($id);
		$dossier=$this->loadDossierClient($do);

		$model->setNumbc($dossier->num_bon_commande);

		$model->setNum_Booking($dossier->num_booking);

		$model->setNum_CO($dossier->num_co);

		$model->setNum_BSC($dossier->num_bsc);

		$model->setNum_DE($dossier->num_de);

		$model->setNum_Liste_Colisage($dossier->num_liste_colisage);

		$model->setNum_Expertise($dossier->num_expertise);

		$model->setNum_TC($dossier->num_tc);

		$model->setNum_Facture($dossier->num_facture);

		$model->setNbr_Conteneur($dossier->nbr_conteneur);

		$model->setBae($dossier->bae);

		$model->setFaux_Bel($dossier->faux_bel);

		$model->setBul_Liquidation($dossier->bul_liquidation);

		$model->setTravail_Remunerer($dossier->travail_remunerer);

		$model->setNum_Plomb($dossier->num_plomb);

		$model->setPage_Info($dossier->page_info);

		$model->setCertificat_Empotage($dossier->certificat_empotage);

		$model->setDeclaration_Douane($dossier->declaration_douane);

		$model->setQuitance_Douane($dossier->quitance_douane);

		$model->setRecu_Banq($dossier->recu_banq);

		$model->setBon_Sortie_Tc($dossier->bon_sortie_tc);

		$model->setInterchange($dossier->interchange);

		$model->setOrdre_Transit($dossier->ordre_transit);





		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Client']))
		{
			$model->attributes=$_POST['Client'];
			$model->id_user = Yii::app()->user->id;
			$model->date_modified = date('Y-m-d H:i:s');

			$dossier->id_user = Yii::app()->user->id;
			$dossier->date_modified = date('Y-m-d H:i:s');

			//Bon de commande
			if(isset($_POST['Client']['numbc']) && !empty($_POST['Client']['numbc'])){
				$dossier->num_bon_commande = $_POST['Client']['numbc'];
				$Fichiers_bc = CUploadedFile::getInstancesByName('fichier_bc');
				foreach ($Fichiers_bc as $file => $Fichier) {
					$dossier->img_bon_commande = $Fichier->name;
					break;
				}
				GestionFichier::FileSaveFichier($Fichiers_bc,$model->id,$dossier->primaryKey);
			}
			//Numéro TC
			if(isset($_POST['Client']['num_tc']) && !empty($_POST['Client']['num_tc'])){
				$dossier->num_tc = $_POST['Client']['num_tc'];
				$Fichiers_tc = CUploadedFile::getInstancesByName('fichier_tc');
				foreach ($Fichiers_tc as $file => $Fichier) {
					$dossier->img_tc = $Fichier->name;
					break;
				}

				GestionFichier::FileSaveFichier($Fichiers_tc,$model->id,$dossier->primaryKey);
			}
			// Numéro DE
			if(isset($_POST['Client']['num_de']) && !empty($_POST['Client']['num_de'])){
				$dossier->num_de = $_POST['Client']['num_de'];
				$Fichiers_de = CUploadedFile::getInstancesByName('fichier_de');
				foreach ($Fichiers_de as $file => $Fichier) {
					$dossier->img_de = $Fichier->name;
					break;
				}
				GestionFichier::FileSaveFichier($Fichiers_de,$model->id,$dossier->primaryKey);
			}
			//Numéro CO
			if(isset($_POST['Client']['num_co']) && !empty($_POST['Client']['num_co'])){
				$dossier->num_co = $_POST['Client']['num_co'];
				$Fichiers_co = CUploadedFile::getInstancesByName('fichier_co');
				foreach ($Fichiers_co as $file => $Fichier) {
					$dossier->img_co = $Fichier->name;
					break;
				}
				GestionFichier::FileSaveFichier($Fichiers_co,$model->id,$dossier->primaryKey);
			}
			//Numéro Expertise
			if(isset($_POST['Client']['num_expertise']) && !empty($_POST['Client']['num_expertise'])){
				$dossier->num_expertise = $_POST['Client']['num_expertise'];
				$Fichiers_expertise = CUploadedFile::getInstancesByName('fichier_expertise');
				foreach ($Fichiers_expertise as $file => $Fichier) {
					$dossier->img_expertise = $Fichier->name;
					break;
				}

				GestionFichier::FileSaveFichier($Fichiers_expertise,$model->id,$dossier->primaryKey);
			}
			//Numéro Facture
			if(isset($_POST['Client']['num_facture']) && !empty($_POST['Client']['num_facture'])){
				$dossier->num_facture = $_POST['Client']['num_facture'];
				$Fichiers_facture = CUploadedFile::getInstancesByName('fichier_facture');
				foreach ($Fichiers_facture as $file => $Fichier) {
					$dossier->img_facture = $Fichier->name;
					break;
				}

				GestionFichier::FileSaveFichier($Fichiers_facture,$model->id,$dossier->primaryKey);
			}
			// Numéroe Liste de Colisage
			if(isset($_POST['Client']['num_liste_colisage']) && !empty($_POST['Client']['num_liste_colisage'])){
				$dossier->num_liste_colisage = $_POST['Client']['num_liste_colisage'];
				$Fichiers_liste_colisage = CUploadedFile::getInstancesByName('fichier_liste_colisage');
				foreach ($Fichiers_liste_colisage as $file => $Fichier) {
					$dossier->img_liste_colisage = $Fichier->name;
					break;
				}
				GestionFichier::FileSaveFichier($Fichiers_liste_colisage,$model->id,$dossier->primaryKey);
			}
			//Numéroe BSC
			if(isset($_POST['Client']['num_bsc']) && !empty($_POST['Client']['num_bsc'])){
				$dossier->num_bsc = $_POST['Client']['num_bsc'];
				$Fichiers_bsc = CUploadedFile::getInstancesByName('fichier_bsc');
				foreach ($Fichiers_bsc as $file => $Fichier) {
					$dossier->img_bsc = $Fichier->name;
					break;
				}
				GestionFichier::FileSaveFichier($Fichiers_bsc,$model->id,$dossier->primaryKey);
			}
			//Numéro Booking
			if(isset($_POST['Client']['num_booking']) && !empty($_POST['Client']['num_booking'])){
				$dossier->num_booking = $_POST['Client']['num_booking'];
				$Fichiers_booking = CUploadedFile::getInstancesByName('fichier_booking');
				foreach ($Fichiers_booking as $file => $Fichier) {
					$dossier->img_booking = $Fichier->name;
					break;
				}
				$dossier->etat = 2; //Etat en attente des documents administratifs
				GestionFichier::FileSaveFichier($Fichiers_booking,$model->id,$dossier->primaryKey);
			}
			//Numéroe BAE
			if(isset($_POST['Client']['bae']) && !empty($_POST['Client']['bae'])){
				$dossier->bae = $_POST['Client']['bae'];
				$Fichiers_bae = CUploadedFile::getInstancesByName('fichier_bae');
				foreach ($Fichiers_bae as $file => $Fichier) {
					$dossier->img_bae = $Fichier->name;
					break;
				}
				GestionFichier::FileSaveFichier($Fichiers_bae,$model->id,$dossier->primaryKey);
			}
			//Numéroe faux bel
			if(isset($_POST['Client']['faux_bel']) && !empty($_POST['Client']['faux_bel'])){
				$dossier->faux_bel = $_POST['Client']['faux_bel'];
				$Fichiers_faux_bel = CUploadedFile::getInstancesByName('fichier_faux_bel');
				foreach ($Fichiers_faux_bel as $file => $Fichier) {
					$dossier->img_faux_bel = $Fichier->name;
					break;
				}

				GestionFichier::FileSaveFichier($Fichiers_faux_bel,$model->id,$dossier->primaryKey);
			}
			//Numéroe bul_liquidation
			if(isset($_POST['Client']['bul_liquidation']) && !empty($_POST['Client']['bul_liquidation'])){
				$dossier->bul_liquidation = $_POST['Client']['bul_liquidation'];
				$Fichiers_bul_liquidation = CUploadedFile::getInstancesByName('fichier_bul_liquidation');
				foreach ($Fichiers_bul_liquidation as $file => $Fichier) {
					$dossier->img_bul_liquidation = $Fichier->name;
					break;
				}
				GestionFichier::FileSaveFichier($Fichiers_bul_liquidation,$model->id,$dossier->primaryKey);
			}
			//Numéroe travail_remunerer
			if(isset($_POST['Client']['travail_remunerer']) && !empty($_POST['Client']['travail_remunerer'])){
				$dossier->travail_remunerer = $_POST['Client']['travail_remunerer'];
				$Fichiers_travail_remunerer = CUploadedFile::getInstancesByName('fichier_travail_remunerer');
				foreach ($Fichiers_travail_remunerer as $file => $Fichier) {
					$dossier->img_travail_remunerer = $Fichier->name;
					break;
				}
				GestionFichier::FileSaveFichier($Fichiers_travail_remunerer,$model->id,$dossier->primaryKey);
			}
			//Numéroe page_info
			if(isset($_POST['Client']['page_info']) && !empty($_POST['Client']['page_info'])){
				$dossier->page_info = $_POST['Client']['page_info'];
				$Fichiers_page_info = CUploadedFile::getInstancesByName('fichier_page_info');
				foreach ($Fichiers_page_info as $file => $Fichier) {
					$dossier->img_page_info = $Fichier->name;
					break;
				}
				GestionFichier::FileSaveFichier($Fichiers_page_info,$model->id,$dossier->primaryKey);
			}
			//Numéroe certificat_empotage
			if(isset($_POST['Client']['certificat_empotage']) && !empty($_POST['Client']['certificat_empotage'])){
				$dossier->certificat_empotage = $_POST['Client']['certificat_empotage'];
				$Fichiers_certificat_empotage = CUploadedFile::getInstancesByName('fichier_certificat_empotage');
				foreach ($Fichiers_certificat_empotage as $file => $Fichier) {
					$dossier->img_certificat_empotage = $Fichier->name;
					break;
				}
				GestionFichier::FileSaveFichier($Fichiers_certificat_empotage,$model->id,$dossier->primaryKey);
			}
			//Numéroe declaration_douane
			if(isset($_POST['Client']['declaration_douane']) && !empty($_POST['Client']['declaration_douane'])){
				$dossier->declaration_douane = $_POST['Client']['declaration_douane'];
				$Fichiers_declaration_douane = CUploadedFile::getInstancesByName('fichier_declaration_douane');
				foreach ($Fichiers_declaration_douane as $file => $Fichier) {
					$dossier->img_declaration_douane = $Fichier->name;
					break;
				}
				GestionFichier::FileSaveFichier($Fichiers_declaration_douane,$model->id,$dossier->primaryKey);
			}
			//Numéroe quitance_douane
			if(isset($_POST['Client']['quitance_douane']) && !empty($_POST['Client']['quitance_douane'])){
				$dossier->quitance_douane = $_POST['Client']['quitance_douane'];
				$Fichiers_quitance_douane = CUploadedFile::getInstancesByName('fichier_quitance_douane');
				foreach ($Fichiers_quitance_douane as $file => $Fichier) {
					$dossier->img_quitance_douane = $Fichier->name;
					break;
				}

				GestionFichier::FileSaveFichier($Fichiers_quitance_douane,$model->id,$dossier->primaryKey);
			}
			//Numéroe recu_banq
			if(isset($_POST['Client']['recu_banq']) && !empty($_POST['Client']['recu_banq'])){
				$dossier->recu_banq = $_POST['Client']['recu_banq'];
				$Fichiers_recu_banq = CUploadedFile::getInstancesByName('fichier_recu_banq');
				foreach ($Fichiers_recu_banq as $file => $Fichier) {
					$dossier->img_recu_banq = $Fichier->name;
					break;
				}

				GestionFichier::FileSaveFichier($Fichiers_recu_banq,$model->id,$dossier->primaryKey);
			}
			//Numéroe bon_sortie_tc
			if(isset($_POST['Client']['bon_sortie_tc']) && !empty($_POST['Client']['bon_sortie_tc'])){
				$dossier->bon_sortie_tc = $_POST['Client']['bon_sortie_tc'];
				$Fichiers_bon_sortie_tc = CUploadedFile::getInstancesByName('fichier_bon_sortie_tc');
				foreach ($Fichiers_bon_sortie_tc as $file => $Fichier) {
					$dossier->img_bon_sortie_tc = $Fichier->name;
					break;
				}
				GestionFichier::FileSaveFichier($Fichiers_bon_sortie_tc,$model->id,$dossier->primaryKey);
			}
			//Numéroe interchange
			if(isset($_POST['Client']['interchange']) && !empty($_POST['Client']['interchange'])){
				$dossier->interchange = $_POST['Client']['interchange'];
				$Fichiers_interchange = CUploadedFile::getInstancesByName('fichier_interchange');
				foreach ($Fichiers_interchange as $file => $Fichier) {
					$dossier->img_interchange = $Fichier->name;
					break;
				}

				GestionFichier::FileSaveFichier($Fichiers_interchange,$model->id,$dossier->primaryKey);
			}
			//Numéroe ordre_transit
			if(isset($_POST['Client']['ordre_transit']) && !empty($_POST['Client']['ordre_transit'])){
				$dossier->ordre_transit = $_POST['Client']['ordre_transit'];
				$Fichiers_ordre_transit = CUploadedFile::getInstancesByName('fichier_ordre_transit');
				foreach ($Fichiers_ordre_transit as $file => $Fichier) {
					$dossier->img_ordre_transit = $Fichier->name;
					break;
				}
				GestionFichier::FileSaveFichier($Fichiers_ordre_transit,$model->id,$dossier->primaryKey);
			}

			if(isset($_POST['Client']['nbr_conteneur']) && !empty($_POST['Client']['nbr_conteneur'])){
				$dossier->nbr_conteneur = $_POST['Client']['nbr_conteneur'];
			}

			if(isset($_POST['Client']['num_plomb']) && !empty($_POST['Client']['num_plomb'])){
				$dossier->num_plomb = $_POST['Client']['num_plomb'];
			}

			if($model->save()){
				$dossier->save(false);
				$this->redirect(array('view','id'=>$model->id, 'do'=>$dossier->id));
			}

		}

		$this->render('update',array(
			'model'=>$model,
			'dossier'=>$dossier,
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
		$dataProvider=new CActiveDataProvider('Client');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Client('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Client']))
			$model->attributes=$_GET['Client'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

    /**
     * @param $id
     * @throws CException
     * @throws CHttpException
     */
    public function actionTicket($id)
    {
        $model=$this->loadModel($id);
        $mPDF1 = Yii::app()->ePdf->mpdf('','A4','','',/*$mgl*/10,/*$mgr*/10,/*$mgt*/30,/*$mgb*/20,/*$mgh*/10,/*$mgf*/10);
        $mPDF1->WriteHTML($this->renderPartial(
            'ticket',
            array(
                'model'=>$model,
            ),
            true
        ));

        $mPDF1->Output();
    }

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Client the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Client::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadDossier($id)
	{
		$criteria = new CDbCriteria();
		$criteria->addCondition("id_client=:id");
		$criteria->params = array(':id' => $id);
		$model=DossierClient::model()->find($criteria);
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

	public function actionGetInfoClient()
	{
		if(isset($_POST['code']) && !empty($_POST['code'])) {

			$code = $_POST['code'];

			$model = Client::model()->find(array(
				'condition' => 'code=:code',
				'params' => array(':code' => $code)
			));

			echo CJSON::encode($model);
		}

		Yii::app()->end();
	}

	/**
	 * Performs the AJAX validation.
	 * @param Client $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='client-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionSearchReleveCmpt()
	{
		$model=new Client;
		$datas = array();

		if(isset($_POST['Client'])){

			$du = ($_POST['Client']['date_created'] == '0000-00-00 00:00:00')? null : $_POST['Client']['date_created'];
			$au = ($_POST['Client']['date_modified'] == '0000-00-00 00:00:00')? null : $_POST['Client']['date_modified'];

			$criteria = new CDbCriteria();
			$criteria->addCondition("nom_societe=:societe");
			$criteria->params = array(':societe' => $_POST['Client']['nom_societe']);
			$model = Client::model()->find($criteria);

			$datas['id'] = $model->primaryKey;
			$datas['nom'] = $model->nom_societe;
			$datas['du'] = $du;
			$datas['au'] = $au;
			$datas['nbClient'] = Client::model()->count($criteria);

			echo CJSON::encode($datas);

			Yii::app()->end();
		}

		$this->render('searchReleveCmpt',array(
			'model'=>$model,
		));
	}

	public function actionReleveCmptClient($id, $du, $au)
	{
		$model=$this->loadModel($id);
		$arrayDossier = array(new DossierClient);

		if($du != 'null' && $au == 'null'){
			//print_r('ici');
			foreach($model->dossiers as $key => $dossier){
				if(strtotime(date('Y-m-d', strtotime($dossier->date_created))) >= strtotime($du)){
					$arrayDossier[$key] = $dossier;
				}
			}
		}else{
			foreach($model->dossiers as $key => $dossier){

				if(strtotime($du) <= strtotime(date('Y-m-d', strtotime($dossier->date_created))) && strtotime(date('Y-m-d', strtotime($dossier->date_created))) <= strtotime($au) ){
					$arrayDossier[$key] = $dossier;
					//print_r($dossier->date_created);
				}
			}

			//print_r(count($arrayDossier));
		}

		//exit;

		//$mPDF1 = Yii::app()->ePdf->mpdf('','A4-L','','',/*$mgl*/10,/*$mgr*/10,/*$mgt*/30,/*$mgb*/20,/*$mgh*/10,/*$mgf*/10);
		/*$mPDF1->WriteHTML(*/
		$this->renderPartial(
			'releveCmptClient',
			array(
				'model'=>$model,
				'du'=>$du,
				'au'=>$au,
				'dossiers'=>$arrayDossier,
			)//,
			//true
		) /*)*/;

		//$mPDF1->Output();
	}
}
