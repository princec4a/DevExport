<?php

/**
 * This is the model class for table "dc_facture".
 *
 * The followings are the available columns in table 'dc_facture':
 * @property integer $id
 * @property string $client
 * @property string $pays_destionation
 * @property string $nom_navire
 * @property string $port_embarquement
 * @property string $port_chargement
 * @property string $destination_final
 * @property string $date_created
 * @property string $date_modified
 * @property integer $id_user
 * @property string $numero
 * @property double $montant
 * @property double $total_poids_net
 *
 * The followings are the available model relations:
 * @property DetailFacture[] $detailFactures
 */
class Facture extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'dc_facture';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('client, pays_destionation, port_embarquement, port_chargement, destination_final, date_created, id_user', 'required'),
			array('id_user', 'numerical', 'integerOnly'=>true),
			array('montant, total_poids_net', 'numerical'),
			array('pays_destionation, nom_navire, port_embarquement, port_chargement, destination_final, numero', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, client, pays_destionation, nom_navire, port_embarquement, port_chargement, destination_final, date_created, date_modified, id_user, numero, montant, total_poids_net', 'safe', 'on'=>'search'),
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
			'detailFactures' => array(self::HAS_MANY, 'DetailFacture', 'id_facture'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'client' => 'Client',
			'pays_destionation' => 'Pays Destionation',
			'nom_navire' => 'Nom Navire',
			'port_embarquement' => 'Port Embarquement',
			'port_chargement' => 'Port Chargement',
			'destination_final' => 'Destination Final',
			'date_created' => 'Date Created',
			'date_modified' => 'Date Modified',
			'id_user' => 'Id User',
			'numero' => 'Numero',
			'montant' => 'Montant',
			'total_poids_net' => 'Total Poids Net',
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
		$criteria->compare('client',$this->client,true);
		$criteria->compare('pays_destionation',$this->pays_destionation,true);
		$criteria->compare('nom_navire',$this->nom_navire,true);
		$criteria->compare('port_embarquement',$this->port_embarquement,true);
		$criteria->compare('port_chargement',$this->port_chargement,true);
		$criteria->compare('destination_final',$this->destination_final,true);
		$criteria->compare('date_created',$this->date_created,true);
		$criteria->compare('date_modified',$this->date_modified,true);
		$criteria->compare('id_user',$this->id_user);
		$criteria->compare('numero',$this->numero,true);
		$criteria->compare('montant',$this->montant);
		$criteria->compare('total_poids_net',$this->total_poids_net);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Facture the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
