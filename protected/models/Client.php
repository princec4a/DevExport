<?php

/**
 * This is the model class for table "dc_client".
 *
 * The followings are the available columns in table 'dc_client':
 * @property integer $id
 * @property string $nom
 * @property string $prenom
 * @property string $tel
 * @property string $email
 * @property string $adresse
 * @property string $code
 * @property string $nom_societe
 * @property string $date_created
 * @property string $date_modified
 * @property integer $id_user
 *
 * @property string $num_tc;
 * @property integer $nbr_conteneur;
 * @property string $num_de;
 * @property string $num_co;
 * @property string $num_expertise;
 * @property string $num_facture;
 * @property string $num_liste_colisage;
 * @property string $num_bsc;
 * @property string $num_booking;
 *
 * @property string $bae
 * @property string $faux_bel
 * @property string $bul_liquidation
 * @property string $travail_remunerer
 * @property string $num_plomb
 * @property string $page_info
 * @property string $certificat_empotage
 * @property string $declaration_douane
 * @property string $quitance_douane
 * @property string $recu_banq
 * @property string $bon_sortie_tc
 * @property string $interchange
 * @property string $ordre_transit
 *
 * image des documents
 * @property string $img_bae
 * @property string $img_faux_bel
 * @property string $img_bul_liquidation
 * @property string $img_travail_remunerer
 * @property string $img_page_info
 * @property string $img_certificat_empotage
 * @property string $img_declaration_douane
 * @property string $img_quitance_douane
 * @property string $img_recu_banq
 * @property string $img_bon_sortie_tc
 * @property string $img_interchange
 * @property string $img_ordre_transit
 *
 * The followings are the available model relations:
 * @property Users $idUser
 * @property Dossier[] $dossiers
 */
class Client extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */

	private $bonDeCommande;
	private $numbc;
	private $num_tc;
	private $nbr_conteneur;
	private $num_de;
	private $num_co;
	private $num_expertise;
	private $num_facture;
	private $num_liste_colisage;
	private $num_bsc;
	private $num_booking;
	private $num_vgm;

	private $bae;
	private $faux_bel;
	private $bul_liquidation;
	private $travail_remunerer;
	private $num_plomb;
	private $page_info;
	private $certificat_empotage;
	private $declaration_douane;
	private $quitance_douane;
	private $recu_banq;
	private $bon_sortie_tc;
	private $interchange;
	private $ordre_transit;

	private $img_tc;
	private $img_de;
	private $img_co;
	private $img_expertise;
	private $img_facture;
	private $img_liste_colisage;
	private $img_bsc;
	private $img_booking;

	private $img_bae;
	private $img_faux_bel;
	private $img_bul_liquidation;
	private $img_travail_remunerer;
	private $img_page_info;
	private $img_certificat_empotage;
	private $img_declaration_douane;
	private $img_quitance_douane;
	private $img_recu_banq;
	private $img_bon_sortie_tc;
	private $img_interchange;
	private $img_ordre_transit;

	/**
	 * @return mixed
	 */
	public function getNum_Vgm()
	{
		return $this->num_vgm;
	}

	/**
	 * @param mixed $num_vgm
	 */
	public function setNum_Vgm($num_vgm)
	{
		$this->num_vgm = $num_vgm;
	}

	/**
	 * @return string
	 */
	public function getBae()
	{
		return $this->bae;
	}

	/**
	 * @param string $bae
	 */
	public function setBae($bae)
	{
		$this->bae = $bae;
	}

	/**
	 * @return string
	 */
	public function getFaux_Bel()
	{
		return $this->faux_bel;
	}

	/**
	 * @param string $faux_bel
	 */
	public function setFaux_Bel($faux_bel)
	{
		$this->faux_bel = $faux_bel;
	}

	/**
	 * @return string
	 */
	public function getBul_Liquidation()
	{
		return $this->bul_liquidation;
	}

	/**
	 * @param string $bul_liquidation
	 */
	public function setBul_Liquidation($bul_liquidation)
	{
		$this->bul_liquidation = $bul_liquidation;
	}

	/**
	 * @return string
	 */
	public function getTravail_Remunerer()
	{
		return $this->travail_remunerer;
	}

	/**
	 * @param string $travail_remunerer
	 */
	public function setTravail_Remunerer($travail_remunerer)
	{
		$this->travail_remunerer = $travail_remunerer;
	}

	/**
	 * @return string
	 */
	public function getNum_Plomb()
	{
		return $this->num_plomb;
	}

	/**
	 * @param string $num_plomb
	 */
	public function setNum_Plomb($num_plomb)
	{
		$this->num_plomb = $num_plomb;
	}

	/**
	 * @return string
	 */
	public function getPage_Info()
	{
		return $this->page_info;
	}

	/**
	 * @param string $page_info
	 */
	public function setPage_Info($page_info)
	{
		$this->page_info = $page_info;
	}

	/**
	 * @return string
	 */
	public function getCertificat_Empotage()
	{
		return $this->certificat_empotage;
	}

	/**
	 * @param string $certificat_empotage
	 */
	public function setCertificat_Empotage($certificat_empotage)
	{
		$this->certificat_empotage = $certificat_empotage;
	}

	/**
	 * @return string
	 */
	public function getDeclaration_Douane()
	{
		return $this->declaration_douane;
	}

	/**
	 * @param string $declaration_douane
	 */
	public function setDeclaration_Douane($declaration_douane)
	{
		$this->declaration_douane = $declaration_douane;
	}

	/**
	 * @return string
	 */
	public function getQuitance_Douane()
	{
		return $this->quitance_douane;
	}

	/**
	 * @param string $quitance_douane
	 */
	public function setQuitance_Douane($quitance_douane)
	{
		$this->quitance_douane = $quitance_douane;
	}

	/**
	 * @return string
	 */
	public function getRecu_Banq()
	{
		return $this->recu_banq;
	}

	/**
	 * @param string $recu_banq
	 */
	public function setRecu_Banq($recu_banq)
	{
		$this->recu_banq = $recu_banq;
	}

	/**
	 * @return string
	 */
	public function getBon_Sortie_Tc()
	{
		return $this->bon_sortie_tc;
	}

	/**
	 * @param string $bon_sortie_tc
	 */
	public function setBon_Sortie_Tc($bon_sortie_tc)
	{
		$this->bon_sortie_tc = $bon_sortie_tc;
	}

	/**
	 * @return string
	 */
	public function getInterchange()
	{
		return $this->interchange;
	}

	/**
	 * @param string $interchange
	 */
	public function setInterchange($interchange)
	{
		$this->interchange = $interchange;
	}

	/**
	 * @return string
	 */
	public function getOrdre_Transit()
	{
		return $this->ordre_transit;
	}

	/**
	 * @param string $ordre_transit
	 */
	public function setOrdre_Transit($ordre_transit)
	{
		$this->ordre_transit = $ordre_transit;
	}

	/**
	 * @return string
	 */
	public function getImg_Bae()
	{
		return $this->img_bae;
	}

	/**
	 * @param string $img_bae
	 */
	public function setImg_Bae($img_bae)
	{
		$this->img_bae = $img_bae;
	}

	/**
	 * @return string
	 */
	public function getImg_Faux_Bel()
	{
		return $this->img_faux_bel;
	}

	/**
	 * @param string $img_faux_bel
	 */
	public function setImg_Faux_Bel($img_faux_bel)
	{
		$this->img_faux_bel = $img_faux_bel;
	}

	/**
	 * @return string
	 */
	public function getImg_Bul_Liquidation()
	{
		return $this->img_bul_liquidation;
	}

	/**
	 * @param string $img_bul_liquidation
	 */
	public function setImg_Bul_Liquidation($img_bul_liquidation)
	{
		$this->img_bul_liquidation = $img_bul_liquidation;
	}

	/**
	 * @return string
	 */
	public function getImg_Travail_Remunerer()
	{
		return $this->img_travail_remunerer;
	}

	/**
	 * @param string $img_travail_remunerer
	 */
	public function setImg_Travail_Remunerer($img_travail_remunerer)
	{
		$this->img_travail_remunerer = $img_travail_remunerer;
	}

	/**
	 * @return string
	 */
	public function getImg_Page_Info()
	{
		return $this->img_page_info;
	}

	/**
	 * @param string $img_page_info
	 */
	public function setImg_Page_Info($img_page_info)
	{
		$this->img_page_info = $img_page_info;
	}

	/**
	 * @return string
	 */
	public function getImg_Certificat_Empotage()
	{
		return $this->img_certificat_empotage;
	}

	/**
	 * @param string $img_certificat_empotage
	 */
	public function setImg_Certificat_Empotage($img_certificat_empotage)
	{
		$this->img_certificat_empotage = $img_certificat_empotage;
	}

	/**
	 * @return string
	 */
	public function getImg_Declaration_Douane()
	{
		return $this->img_declaration_douane;
	}

	/**
	 * @param string $img_declaration_douane
	 */
	public function setImg_Declaration_Douane($img_declaration_douane)
	{
		$this->img_declaration_douane = $img_declaration_douane;
	}

	/**
	 * @return string
	 */
	public function getImg_Quitance_Douane()
	{
		return $this->img_quitance_douane;
	}

	/**
	 * @param string $img_quitance_douane
	 */
	public function setImg_Quitance_Douane($img_quitance_douane)
	{
		$this->img_quitance_douane = $img_quitance_douane;
	}

	/**
	 * @return string
	 */
	public function getImg_Recu_Banq()
	{
		return $this->img_recu_banq;
	}

	/**
	 * @param string $img_recu_banq
	 */
	public function setImg_Recu_Banq($img_recu_banq)
	{
		$this->img_recu_banq = $img_recu_banq;
	}

	/**
	 * @return string
	 */
	public function getImg_Bon_Sortie_Tc()
	{
		return $this->img_bon_sortie_tc;
	}

	/**
	 * @param string $img_bon_sortie_tc
	 */
	public function setImg_Bon_Sortie_Tc($img_bon_sortie_tc)
	{
		$this->img_bon_sortie_tc = $img_bon_sortie_tc;
	}

	/**
	 * @return string
	 */
	public function getImg_Interchange()
	{
		return $this->img_interchange;
	}

	/**
	 * @param string $img_interchange
	 */
	public function setImg_Interchange($img_interchange)
	{
		$this->img_interchange = $img_interchange;
	}

	/**
	 * @return string
	 */
	public function getImg_Ordre_Transit()
	{
		return $this->img_ordre_transit;
	}

	/**
	 * @param string $img_ordre_transit
	 */
	public function setImg_Ordre_Transit($img_ordre_transit)
	{
		$this->img_ordre_transit = $img_ordre_transit;
	}

	/**
	 * @return mixed
	 */
	public function getImgTc()
	{
		return $this->img_tc;
	}

	/**
	 * @param mixed $img_tc
	 */
	public function setImgTc($img_tc)
	{
		$this->img_tc = $img_tc;
	}

	/**
	 * @return mixed
	 */
	public function getImgDe()
	{
		return $this->img_de;
	}

	/**
	 * @param mixed $img_de
	 */
	public function setImgDe($img_de)
	{
		$this->img_de = $img_de;
	}

	/**
	 * @return mixed
	 */
	public function getImgCo()
	{
		return $this->img_co;
	}

	/**
	 * @param mixed $img_co
	 */
	public function setImgCo($img_co)
	{
		$this->img_co = $img_co;
	}

	/**
	 * @return mixed
	 */
	public function getImgExpertise()
	{
		return $this->img_expertise;
	}

	/**
	 * @param mixed $img_expertise
	 */
	public function setImgExpertise($img_expertise)
	{
		$this->img_expertise = $img_expertise;
	}

	/**
	 * @return mixed
	 */
	public function getImgFacture()
	{
		return $this->img_facture;
	}

	/**
	 * @param mixed $img_facture
	 */
	public function setImgFacture($img_facture)
	{
		$this->img_facture = $img_facture;
	}

	/**
	 * @return mixed
	 */
	public function getImgListeColisage()
	{
		return $this->img_liste_colisage;
	}

	/**
	 * @param mixed $img_liste_colisage
	 */
	public function setImgListeColisage($img_liste_colisage)
	{
		$this->img_liste_colisage = $img_liste_colisage;
	}

	/**
	 * @return mixed
	 */
	public function getImgBsc()
	{
		return $this->img_bsc;
	}

	/**
	 * @param mixed $img_bsc
	 */
	public function setImgBsc($img_bsc)
	{
		$this->img_bsc = $img_bsc;
	}

	/**
	 * @return mixed
	 */
	public function getImgBooking()
	{
		return $this->img_booking;
	}

	/**
	 * @param mixed $img_booking
	 */
	public function setImgBooking($img_booking)
	{
		$this->img_booking = $img_booking;
	}


	public function getNum_TC()
	{
		return $this->num_tc;
	}

	/**
	 * @param $num_tc
	 */
	public function setNum_TC($num_tc)
	{
		$this->num_tc = $num_tc;
	}

	public function getNbr_Conteneur()
	{
		return $this->nbr_conteneur;
	}

	/**
	 * @param $nbr_conteneur
	 */
	public function setNbr_Conteneur($nbr_conteneur)
	{
		$this->nbr_conteneur = $nbr_conteneur;
	}

	public function getNum_DE()
	{
		return $this->num_de;
	}

	/**
	 * @param $num_de
	 */
	public function setNum_DE($num_de)
	{
		$this->num_de = $num_de;
	}

	public function getNum_CO()
	{
		return $this->num_co;
	}

	/**
	 * @param $num_co
	 */
	public function setNum_CO($num_co)
	{
		$this->num_co = $num_co;
	}


	public function getNum_Expertise()
	{
		return $this->num_expertise;
	}

	/**
	 * @param $num_expertise
	 */
	public function setNum_Expertise($num_expertise)
	{
		$this->num_expertise = $num_expertise;
	}

	public function getNum_Facture()
	{
		return $this->num_facture;
	}

	/**
	 * @param $num_facture
	 */
	public function setNum_Facture($num_facture)
	{
		$this->num_facture = $num_facture;
	}

	public function getNum_Liste_Colisage()
	{
		return $this->num_liste_colisage;
	}

	/**
	 * @param $num_liste_colisage
	 */
	public function setNum_Liste_Colisage($num_liste_colisage)
	{
		$this->num_liste_colisage = $num_liste_colisage;
	}

	public function getNum_BSC()
	{
		return $this->num_bsc;
	}

	/**
	 * @param $num_bsc
	 */
	public function setNum_BSC($num_bsc)
	{
		$this->num_bsc = $num_bsc;
	}

	public function getNum_Booking()
	{
		return $this->num_booking;
	}

	/**
	 * @param $num_booking
	 */
	public function setNum_Booking($num_booking)
	{
		$this->num_booking = $num_booking;
	}



	/**
	 * @return mixed
	 */
	public function getNumbc()
	{
		return $this->numbc;
	}

	/**
	 * @param mixed $numbc
	 */
	public function setNumbc($numbc)
	{
		$this->numbc = $numbc;
	}


	/**
	 * @return mixed
	 */
	public function getBonDeCommande()
	{
		return $this->bonDeCommande;
	}

	/**
	 * @param mixed $bonDeCommande
	 */
	public function setBonDeCommande($bonDeCommande)
	{
		$this->bonDeCommande = $bonDeCommande;
	}


	public function tableName()
	{
		return 'dc_client';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nom, prenom, tel, email, code', 'required'),
			array('id_user', 'numerical', 'integerOnly'=>true),
			array('nom, prenom, email, adresse, code, nom_societe', 'length', 'max'=>255),
			array('tel', 'length', 'max'=>14),
			array('date_created, date_modified', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nom, prenom, tel, email, adresse, code, nom_societe, date_created, date_modified, id_user, mon_societe', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'idUser' => array(self::BELONGS_TO, 'Users', 'id_user'),
			'dossiers' => array(self::HAS_MANY, 'DossierClient', 'id_client'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nom' => 'Nom',
			'prenom' => 'Prenom',
			'tel' => 'Tel',
			'email' => 'Email',
			'adresse' => 'Adresse',
			'code' => 'N°Compte',
			'nom_societe' => 'Nom de la Societe',
			'date_created' => 'Date Created',
			'date_modified' => 'Date Modified',
			'id_user' => 'Id User',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('nom',$this->nom,true);
		$criteria->compare('prenom',$this->prenom,true);
		$criteria->compare('tel',$this->tel,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('adresse',$this->adresse,true);
		$criteria->compare('code',$this->code,true);
		$criteria->compare('nom_societe',$this->nom_societe,true);
		$criteria->compare('date_created',$this->date_created,true);
		$criteria->compare('date_modified',$this->date_modified,true);
		$criteria->compare('id_user',$this->id_user);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Client the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	protected function beforeSave(){
		if(parent::beforeSave()){
			$this->nom = strtoupper($this->nom);
			return TRUE;
		}
		else return false;
	}

	protected function afterFind(){
		parent::afterFind();
	}

	public static function getPathFiles($id,$id_dossier,$dir=null) {
		$client = Client::model()->findByPk($id);
		$dossier = DossierClient::model()->findByPk($id_dossier);
		$module='Dossiers_Clients';
		if($dir==null)
			return  Yii::getPathOfAlias('webroot').'/'.$module.'/'.$client->code.'/'.$dossier->primaryKey.'/';
		else
			return  Yii::getPathOfAlias('webroot').'/'.$module.'/'.$client->code.'/'.$dir.'/';
	}

	public function loadEtatDossier($id){
		$criteria = new CDbCriteria();
		$criteria->addCondition("id_client=:id");
		$criteria->params = array(':id' => $id);
		$etat = DossierClient::model()->find($criteria)->etat;
		return $etat;
		/*if($etat == 1) return "En attente de booking";
		if($etat == 2) return "En attente des documents";
		if($etat == 3) return "Clôturé";
		*/
	}

	public function getNumTC($id){
		$criteria = new CDbCriteria();
		$criteria->addCondition("id_client=:id");
		$criteria->params = array(':id' => $id);
		return DossierClient::model()->find($criteria)->num_tc;
	}

	public function getNbrTC($id){
		$criteria = new CDbCriteria();
		$criteria->addCondition("id_client=:id");
		$criteria->params = array(':id' => $id);
		return DossierClient::model()->find($criteria)->nbr_conteneur;
	}

	public function getNumDE($id){
		$criteria = new CDbCriteria();
		$criteria->addCondition("id_client=:id");
		$criteria->params = array(':id' => $id);
		return DossierClient::model()->find($criteria)->num_de;
	}

	public function getNumCO($id){
		$criteria = new CDbCriteria();
		$criteria->addCondition("id_client=:id");
		$criteria->params = array(':id' => $id);
		return DossierClient::model()->find($criteria)->num_co;
	}

	public function getNumExpertise($id){
		$criteria = new CDbCriteria();
		$criteria->addCondition("id_client=:id");
		$criteria->params = array(':id' => $id);
		return DossierClient::model()->find($criteria)->num_expertise;
	}

	public function getNumFacture($id){
		$criteria = new CDbCriteria();
		$criteria->addCondition("id_client=:id");
		$criteria->params = array(':id' => $id);
		return DossierClient::model()->find($criteria)->num_facture;
	}

	public function getNumListeColisage($id){
		$criteria = new CDbCriteria();
		$criteria->addCondition("id_client=:id");
		$criteria->params = array(':id' => $id);
		return DossierClient::model()->find($criteria)->num_liste_colisage;
	}

	public function getNumBSC($id){
		$criteria = new CDbCriteria();
		$criteria->addCondition("id_client=:id");
		$criteria->params = array(':id' => $id);
		return DossierClient::model()->find($criteria)->num_bsc;
	}

	public function getNumBooking($id){
		$criteria = new CDbCriteria();
		$criteria->addCondition("id_client=:id");
		$criteria->params = array(':id' => $id);
		return DossierClient::model()->find($criteria)->num_booking;
	}

	public function getNumBCmd($id){
		$criteria = new CDbCriteria();
		$criteria->addCondition("id_client=:id");
		$criteria->params = array(':id' => $id);
		return DossierClient::model()->find($criteria)->num_bon_commande;
	}

	public function getImgBC($id){
		$criteria = new CDbCriteria();
		$criteria->addCondition("id_client=:id");
		$criteria->params = array(':id' => $id);
		return DossierClient::model()->find($criteria)->img_bon_commande;
	}

	public function getImgBookingClient($id){
		$criteria = new CDbCriteria();
		$criteria->addCondition("id_client=:id");
		$criteria->params = array(':id' => $id);
		return DossierClient::model()->find($criteria)->img_booking;
	}

	public static function getListeData(){
		$datas = array();
		try {
			$clients = Client::model()->findAll();
			foreach($clients as $client){
				array_push($datas,$client->code);
			}
		} catch (Exception $e) {
			echo $e;
		}

		return $datas;
	}

	public static function getListeDataSearch(){
		$datas = array();
		try {
			$clients = Client::model()->findAll();
			foreach($clients as $client){
				array_push($datas,$client->nom_societe);
			}
		} catch (Exception $e) {
			echo $e;
		}

		return $datas;
	}
}
