<?php

/**
 * This is the model class for table "dc_dossier_client".
 *
 * The followings are the available columns in table 'dc_dossier_client':
 * @property integer $id
 * @property integer $id_client
 * @property string $num_tc
 * @property integer $nbr_conteneur
 * @property string $num_de
 * @property string $num_co
 * @property string $num_expertise
 * @property string $num_facture
 * @property string $num_liste_colisage
 * @property string $num_bsc
 * @property string $num_booking
 * @property string $num_bon_commande
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
 * @property string $date_created
 * @property string $date_modified
 * @property integer $etat
 * @property string $img_tc
 * @property string $img_de
 * @property string $img_co
 * @property string $img_expertise
 * @property string $img_facture
 * @property string $img_liste_colisage
 * @property string $img_bsc
 * @property string $img_booking
 * @property string $img_bon_commande
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
 * @property integer $id_user
 * @property string $numero
 * @property string $num_vgm
 *
 * The followings are the available model relations:
 * @property BonEncaissement[] $bonEncaissements
 * @property SortieConteneur[] $sortieConteneurs
 * @property DevisA[] $devisAs
 * @property Users $idUser
 * @property Client $idClient
 */
class DossierClient extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'dc_dossier_client';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_client', 'required'),
			array('id_client, nbr_conteneur, etat, id_user', 'numerical', 'integerOnly'=>true),
			array('num_tc, num_de, num_co, num_expertise, num_facture, num_liste_colisage, num_bsc, num_booking, num_bon_commande, bae, faux_bel, bul_liquidation, travail_remunerer, num_plomb, page_info, certificat_empotage, declaration_douane, quitance_douane, recu_banq, bon_sortie_tc, interchange, ordre_transit, img_tc, img_de, img_co, img_expertise, img_facture, img_liste_colisage, img_bsc, img_booking, img_bon_commande', 'length', 'max'=>255),
			array('date_created, date_modified', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_client, num_tc, nbr_conteneur, num_de, num_co, num_expertise, num_facture, num_liste_colisage, num_bsc, num_booking, num_bon_commande, bae, faux_bel, bul_liquidation, travail_remunerer, num_plomb, page_info, certificat_empotage, declaration_douane, quitance_douane, recu_banq, bon_sortie_tc, interchange, ordre_transit, date_created, date_modified, etat, img_tc, img_de, img_co, img_expertise, img_facture, img_liste_colisage, img_bsc, img_booking, img_bon_commande, img_bae, img_faux_bel, img_bul_liquidation, img_travail_remunerer, img_page_info, img_certificat_empotage, img_declaration_douane, img_quitance_douane, img_recu_banq, img_bon_sortie_tc, img_interchange, img_ordre_transit, id_user, num_vgm', 'safe', 'on'=>'search'),
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
			'bonEncaissements' => array(self::HAS_MANY, 'BonEncaissement', 'id_dossier'),
			'devisAs' => array(self::HAS_MANY, 'DevisA', 'id_dossier'),
			'idUser' => array(self::BELONGS_TO, 'Users', 'id_user'),
			'idClient' => array(self::BELONGS_TO, 'Client', 'id_client'),
			'sortieConteneurs' => array(self::HAS_MANY, 'SortieConteneur', 'id_dossier'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_client' => 'Id Client',
			'num_tc' => 'Num Tc',
			'nbr_conteneur' => 'Nbr Conteneur',
			'num_de' => 'Num De',
			'num_co' => 'Num Co',
			'num_expertise' => 'Num Expertise',
			'num_facture' => 'Num Facture',
			'num_liste_colisage' => 'Num Liste Colisage',
			'num_bsc' => 'Num Bsc',
			'num_booking' => 'Num Booking',
			'num_bon_commande' => 'Num Bon Commande',
			'bae' => 'Bae',
			'faux_bel' => 'Faux Bel',
			'bul_liquidation' => 'Bul Liquidation',
			'travail_remunerer' => 'Travail Remunerer',
			'num_plomb' => 'Num Plomb',
			'page_info' => 'Page Info',
			'certificat_empotage' => 'Certificat Empotage',
			'declaration_douane' => 'Declaration Douane',
			'quitance_douane' => 'Quitance Douane',
			'recu_banq' => 'Recu Banq',
			'bon_sortie_tc' => 'Bon Sortie Tc',
			'interchange' => 'Interchange',
			'ordre_transit' => 'Ordre Transit',
			'date_created' => 'Date Created',
			'date_modified' => 'Date Modified',
			'etat' => 'Etat',
			'img_tc' => 'Img Tc',
			'img_de' => 'Img De',
			'img_co' => 'Img Co',
			'img_expertise' => 'Img Expertise',
			'img_facture' => 'Img Facture',
			'img_liste_colisage' => 'Img Liste Colisage',
			'img_bsc' => 'Img Bsc',
			'img_booking' => 'Img Booking',
			'img_bon_commande' => 'Img Bon Commande',
			'img_bae' => 'Img Bae',
			'img_faux_bel' => 'Img Faux Bel',
			'img_bul_liquidation' => 'Img Bul Liquidation',
			'img_travail_remunerer' => 'Img Travail Remunerer',
			'img_page_info' => 'Img Page Info',
			'img_certificat_empotage' => 'Img Certificat Empotage',
			'img_declaration_douane' => 'Img Declaration Douane',
			'img_quitance_douane' => 'Img Quitance Douane',
			'img_recu_banq' => 'Img Recu Banq',
			'img_bon_sortie_tc' => 'Img Bon Sortie Tc',
			'img_interchange' => 'Img Interchange',
			'img_ordre_transit' => 'Img Ordre Transit',
			'id_user' => 'Id User',
			'numero' => 'Numero',
			'num_vgm' => 'Num Vgm',
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
		$criteria->compare('id_client',$this->id_client);
		$criteria->compare('num_tc',$this->num_tc,true);
		$criteria->compare('nbr_conteneur',$this->nbr_conteneur);
		$criteria->compare('num_de',$this->num_de,true);
		$criteria->compare('num_co',$this->num_co,true);
		$criteria->compare('num_expertise',$this->num_expertise,true);
		$criteria->compare('num_facture',$this->num_facture,true);
		$criteria->compare('num_liste_colisage',$this->num_liste_colisage,true);
		$criteria->compare('num_bsc',$this->num_bsc,true);
		$criteria->compare('num_booking',$this->num_booking,true);
		$criteria->compare('num_bon_commande',$this->num_bon_commande,true);
		$criteria->compare('bae',$this->bae,true);
		$criteria->compare('faux_bel',$this->faux_bel,true);
		$criteria->compare('bul_liquidation',$this->bul_liquidation,true);
		$criteria->compare('travail_remunerer',$this->travail_remunerer,true);
		$criteria->compare('num_plomb',$this->num_plomb,true);
		$criteria->compare('page_info',$this->page_info,true);
		$criteria->compare('certificat_empotage',$this->certificat_empotage,true);
		$criteria->compare('declaration_douane',$this->declaration_douane,true);
		$criteria->compare('quitance_douane',$this->quitance_douane,true);
		$criteria->compare('recu_banq',$this->recu_banq,true);
		$criteria->compare('bon_sortie_tc',$this->bon_sortie_tc,true);
		$criteria->compare('interchange',$this->interchange,true);
		$criteria->compare('ordre_transit',$this->ordre_transit,true);
		$criteria->compare('date_created',$this->date_created,true);
		$criteria->compare('date_modified',$this->date_modified,true);
		$criteria->compare('etat',$this->etat);
		$criteria->compare('img_tc',$this->img_tc,true);
		$criteria->compare('img_de',$this->img_de,true);
		$criteria->compare('img_co',$this->img_co,true);
		$criteria->compare('img_expertise',$this->img_expertise,true);
		$criteria->compare('img_facture',$this->img_facture,true);
		$criteria->compare('img_liste_colisage',$this->img_liste_colisage,true);
		$criteria->compare('img_bsc',$this->img_bsc,true);
		$criteria->compare('img_booking',$this->img_booking,true);
		$criteria->compare('img_bon_commande',$this->img_bon_commande,true);
		$criteria->compare('img_bae',$this->img_bae,true);
		$criteria->compare('img_faux_bel',$this->img_faux_bel,true);
		$criteria->compare('img_bul_liquidation',$this->img_bul_liquidation,true);
		$criteria->compare('img_travail_remunerer',$this->img_travail_remunerer,true);
		$criteria->compare('img_page_info',$this->img_page_info,true);
		$criteria->compare('img_certificat_empotage',$this->img_certificat_empotage,true);
		$criteria->compare('img_declaration_douane',$this->img_declaration_douane,true);
		$criteria->compare('img_quitance_douane',$this->img_quitance_douane,true);
		$criteria->compare('img_recu_banq',$this->img_recu_banq,true);
		$criteria->compare('img_bon_sortie_tc',$this->img_bon_sortie_tc,true);
		$criteria->compare('img_interchange',$this->img_interchange,true);
		$criteria->compare('img_ordre_transit',$this->img_ordre_transit,true);
		$criteria->compare('id_user',$this->id_user);
		$criteria->compare('numero',$this->numero,true);
		$criteria->compare('num_vgm',$this->num_vgm,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DossierClient the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function getListeData(){

		try {
			$dossier = DossierClient::model()->findAll();

			$datas = array('num_booking'=>'','num_booking'=>'-- rechercher --');

			$datas = array_merge($datas,$dossier);

		} catch (Exception $e) {
			echo $e;
		}

		return CHtml::listData($datas,'num_booking','num_booking');
	}

}
