<?php

/**
 * This is the model class for table "dc_liste_colisage".
 *
 * The followings are the available columns in table 'dc_liste_colisage':
 * @property integer $id
 * @property string $mumero
 * @property string $client
 * @property string $nom_navire
 * @property string $pays_destination
 * @property string $port_embarquement
 * @property string $port_chargement
 * @property string $destination_final
 * @property double $total_poids_net
 * @property double $total_poids_brut
 * @property string $date_created
 * @property string $date_modified
 * @property integer $id_user
 *
 * The followings are the available model relations:
 * @property DetailListeColisage[] $detailListeColisages
 */
class ListeColisage extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'dc_liste_colisage';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('client, pays_destination, port_embarquement, port_chargement, destination_final', 'required'),
			array('id_user', 'numerical', 'integerOnly'=>true),
			array('total_poids_net, total_poids_brut', 'numerical'),
			array('mumero, client, nom_navire, pays_destination, port_embarquement, port_chargement, destination_final', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, mumero, client, nom_navire, pays_destination, port_embarquement, port_chargement, destination_final, total_poids_net, total_poids_brut, date_created, date_modified, id_user', 'safe', 'on'=>'search'),
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
			'detailListeColisages' => array(self::HAS_MANY, 'DetailListeColisage', 'id_liste_colisage'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'mumero' => 'Mumero',
			'client' => 'Client',
			'nom_navire' => 'Nom Navire',
			'pays_destination' => 'Pays Destination',
			'port_embarquement' => 'Port Embarquement',
			'port_chargement' => 'Port Chargement',
			'destination_final' => 'Destination Final',
			'total_poids_net' => 'Total Poids Net',
			'total_poids_brut' => 'Total Poids Brut',
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
		$criteria->compare('mumero',$this->mumero,true);
		$criteria->compare('client',$this->client,true);
		$criteria->compare('nom_navire',$this->nom_navire,true);
		$criteria->compare('pays_destination',$this->pays_destination,true);
		$criteria->compare('port_embarquement',$this->port_embarquement,true);
		$criteria->compare('port_chargement',$this->port_chargement,true);
		$criteria->compare('destination_final',$this->destination_final,true);
		$criteria->compare('total_poids_net',$this->total_poids_net);
		$criteria->compare('total_poids_brut',$this->total_poids_brut);
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
	 * @return ListeColisage the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
