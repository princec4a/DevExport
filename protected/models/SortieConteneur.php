<?php

/**
 * This is the model class for table "dc_sortie_conteneur".
 *
 * The followings are the available columns in table 'dc_sortie_conteneur':
 * @property integer $id
 * @property string $numero
 * @property string $num_booking
 * @property string $navire_prevu
 * @property string $port_destination
 * @property string $num_tc
 * @property string $num_bon_sortie
 * @property string $date_livraison_tc
 * @property string $date_sortie_tc
 * @property string $immatriculation
 * @property double $poids
 * @property string $client
 * @property string $num_eir
 * @property string $site
 * @property string $etat
 * @property string $date_created
 * @property string $date_modified
 * @property integer $id_user
 * @property integer $id_dossier
 * @property integer $id_type_tc
 * @property integer $id_type_bon
 *
 * The followings are the available model relations:
 * @property EntreeConteneur[] $entreeConteneurs
 * @property Users $idUser
 */
class SortieConteneur extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'dc_sortie_conteneur';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('num_booking, num_tc, num_bon_sortie, client, num_eir, site, etat, id_user, date_sortie_tc', 'required', 'message'=>'Ce champ est obligatoire : {attribute}.'),
			array('id_user, id_dossier', 'numerical', 'integerOnly'=>true),
			array('poids', 'numerical'),
			array('numero, num_booking, navire_prevu, port_destination, num_bon_sortie, client, num_eir, site, etat', 'length', 'max'=>255),
			array('num_tc, immatriculation', 'length', 'max'=>20),
			array('date_livraison_tc, date_created, date_modified', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, numero, num_booking, navire_prevu, port_destination, num_tc, date_sortie_tc, num_bon_sortie, date_livraison_tc, immatriculation, poids, date_created, date_modified, id_user, id_dossier, client, num_eir, site, etat,id_type_tc, id_type_bon', 'safe', 'on'=>'search'),
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
			'entreeConteneurs' => array(self::HAS_MANY, 'EntreeConteneur', 'id_sortie_conteneur'),
			'idUser' => array(self::BELONGS_TO, 'Users', 'id_user'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'numero' => 'Numero',
			'num_booking' => 'N° Booking',
			'navire_prevu' => 'Navire Prevu',
			'port_destination' => 'Port Destination',
			'num_tc' => 'N° TC',
			'num_bon_sortie' => 'N° Bon Sortie',
			'date_livraison_tc' => 'Date Livraison TC',
			'date_sortie_tc' => 'Date Sortie Tc',
			'immatriculation' => 'Immatriculation',
			'poids' => 'Poids',
			'client' => 'Client',
			'num_eir' => 'N° EIR',
			'site' => 'Site',
			'etat' => 'Etat',
			'date_created' => 'Date Created',
			'date_modified' => 'Date Modified',
			'id_user' => 'Id User',
			'id_dossier' => 'Id Dossier',
			'id_type_tc' => 'Type Tc',
			'id_type_bon' => 'Type Bon',
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
		$criteria->compare('numero',$this->numero,true);
		$criteria->compare('num_booking',$this->num_booking,true);
		$criteria->compare('navire_prevu',$this->navire_prevu,true);
		$criteria->compare('port_destination',$this->port_destination,true);
		$criteria->compare('num_tc',$this->num_tc,true);
		$criteria->compare('num_bon_sortie',$this->num_bon_sortie,true);
		$criteria->compare('date_livraison_tc',$this->date_livraison_tc,true);
		$criteria->compare('date_sortie_tc',$this->date_sortie_tc,true);
		$criteria->compare('immatriculation',$this->immatriculation,true);
		$criteria->compare('poids',$this->poids);
		$criteria->compare('client',$this->client,true);
		$criteria->compare('num_eir',$this->num_eir,true);
		$criteria->compare('site',$this->site,true);
		$criteria->compare('etat',$this->etat,true);
		$criteria->compare('date_created',$this->date_created,true);
		$criteria->compare('date_modified',$this->date_modified,true);
		$criteria->compare('id_user',$this->id_user);
		$criteria->compare('id_dossier',$this->id_dossier);
		$criteria->compare('id_type_tc',$this->id_type_tc);
		$criteria->compare('id_type_bon',$this->id_type_bon);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SortieConteneur the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	protected function beforeSave(){
		if(parent::beforeSave()){
			$this->date_livraison_tc = date('Y-m-d', strtotime($this->date_livraison_tc));
			return TRUE;
		}
		else return false;
	}

	protected function afterFind(){
		parent::afterFind();
		$this->date_livraison_tc = date('d-m-Y', strtotime($this->date_livraison_tc));
		$this->date_sortie_tc = date('d-m-Y', strtotime($this->date_sortie_tc));
		//$this->date_created = date('d/m/Y', strtotime($this->date_created));
		//$this->date_modified = date('d/m/Y', strtotime($this->date_modified));
	}


}
