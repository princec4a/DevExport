<?php

/**
 * This is the model class for table "dc_dossier".
 *
 * The followings are the available columns in table 'dc_dossier':
 * @property integer $id
 * @property string $numero
 * @property integer $id_client
 * @property string $num_tc
 * @property integer $nbr_conteneur
 * @property string $num_de
 * @property string $num_co
 * @property string $num_expertise
 * @property string $num_facture
 * @property string $num_liste_colisage
 * @property string $num_bsc
 * @property integer $num_booking
 * @property string $date_created
 * @property string $date_modified
 * @property integer $id_user
 *
 * The followings are the available model relations:
 * @property Users $idUser
 * @property Client $idClient
 */
class Dossier extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'dc_dossier';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('numero, id_client, id_devis_a, id_devis_d, num_tc, nbr_conteneur, num_de, num_co, num_expertise, num_facture, num_liste_colisage, num_bsc, num_booking, id_user', 'required'),
			array('id_client, id_devis_a, id_devis_d, nbr_conteneur, num_booking, id_user', 'numerical', 'integerOnly'=>true),
			array('numero, num_tc, num_de, num_co, num_expertise, num_facture, num_liste_colisage, num_bsc', 'length', 'max'=>255),
			array('date_created, date_modified', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, numero, id_client, id_devis_a, id_devis_d, num_tc, nbr_conteneur, num_de, num_co, num_expertise, num_facture, num_liste_colisage, num_bsc, num_booking, date_created, date_modified, id_user', 'safe', 'on'=>'search'),
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
			'idClient' => array(self::BELONGS_TO, 'Client', 'id_client'),
			'idDevisA' => array(self::BELONGS_TO, 'DevisA', 'id_devis_a'),
			'idDevisD' => array(self::BELONGS_TO, 'DevisD', 'id_devis_d'),
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
			'id_client' => 'Id Client',
			'id_devis_a' => 'Id Devis A',
			'id_devis_d' => 'Id Devis D',
			'num_tc' => 'Num Tc',
			'nbr_conteneur' => 'Nbr Conteneur',
			'num_de' => 'Num De',
			'num_co' => 'Num Co',
			'num_expertise' => 'Num Expertise',
			'num_facture' => 'Num Facture',
			'num_liste_colisage' => 'Num Liste Colisage',
			'num_bsc' => 'Num Bsc',
			'num_booking' => 'Num Booking',
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
		$criteria->compare('numero',$this->numero,true);
		$criteria->compare('id_client',$this->id_client);
		$criteria->compare('id_devis_a',$this->id_devis_a);
		$criteria->compare('id_devis_d',$this->id_devis_d);
		$criteria->compare('num_tc',$this->num_tc,true);
		$criteria->compare('nbr_conteneur',$this->nbr_conteneur);
		$criteria->compare('num_de',$this->num_de,true);
		$criteria->compare('num_co',$this->num_co,true);
		$criteria->compare('num_expertise',$this->num_expertise,true);
		$criteria->compare('num_facture',$this->num_facture,true);
		$criteria->compare('num_liste_colisage',$this->num_liste_colisage,true);
		$criteria->compare('num_bsc',$this->num_bsc,true);
		$criteria->compare('num_booking',$this->num_booking);
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
	 * @return Dossier the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
