<?php

/**
 * This is the model class for table "dc_besoin".
 *
 * The followings are the available columns in table 'dc_besoin':
 * @property integer $id
 * @property string $numero
 * @property string $libelle
 * @property double $montant
 * @property integer $visa_dg
 * @property integer $visa_dd
 * @property string $date_created
 * @property string $date_modified
 * @property integer $id_user
 * @property integer $etat
 * @property integer $id_dg
 * @property string $date_validation_dg
 * @property integer $id_dd
 * @property string $date_validation_dd
 *
 * The followings are the available model relations:
 * @property Users $idUser
 * @property DetailBesoin[] $detailBesoins
 */
class Besoin extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'dc_besoin';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('libelle, id_user', 'required'),
			array('visa_dg, visa_dd, id_user, etat', 'numerical', 'integerOnly'=>true),
			array('montant', 'numerical'),
			array('numero', 'length', 'max'=>255),
			array('date_created, date_modified', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, numero, libelle, montant, visa_dg, visa_dd, date_created, date_modified, id_user, etat', 'safe', 'on'=>'search'),
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
			'detailBesoins' => array(self::HAS_MANY, 'DetailBesoin', 'id_besoin'),
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
			'libelle' => 'Libelle',
			'montant' => 'Montant',
			'visa_dg' => 'Visa Dg',
			'visa_dd' => 'Visa Dd',
			'date_created' => 'Date Created',
			'date_modified' => 'Date Modified',
			'id_user' => 'Id User',
			'etat' => 'Etat',
			'id_dg' => 'Id Dg',
			'date_validation_dg' => 'Date Validation Dg',
			'id_dd' => 'Id Dd',
			'date_validation_dd' => 'Date Validation Dd',
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
		$criteria->compare('libelle',$this->libelle,true);
		$criteria->compare('montant',$this->montant);
		$criteria->compare('visa_dg',$this->visa_dg);
		$criteria->compare('visa_dd',$this->visa_dd);
		$criteria->compare('date_created',$this->date_created,true);
		$criteria->compare('date_modified',$this->date_modified,true);
		$criteria->compare('id_user',$this->id_user);
		$criteria->compare('etat',$this->etat);
		$criteria->compare('id_dg',$this->id_dg);
		$criteria->compare('date_validation_dg',$this->date_validation_dg,true);
		$criteria->compare('id_dd',$this->id_dd);
		$criteria->compare('date_validation_dd',$this->date_validation_dd,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Besoin the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
