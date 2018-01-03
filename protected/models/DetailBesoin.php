<?php

/**
 * This is the model class for table "dc_detail_besoin".
 *
 * The followings are the available columns in table 'dc_detail_besoin':
 * @property integer $id
 * @property string $libelle
 * @property integer $quantite
 * @property double $pu
 * @property integer $id_besoin
 *
 * The followings are the available model relations:
 * @property Besoin $idBesoin
 */
class DetailBesoin extends CActiveRecord
{
	public $updateType;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'dc_detail_besoin';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('libelle, quantite, pu', 'required'),
			array('quantite, id_besoin', 'numerical', 'integerOnly'=>true),
			array('pu', 'numerical'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, libelle, quantite, pu, id_besoin', 'safe', 'on'=>'search'),
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
			'idBesoin' => array(self::BELONGS_TO, 'Besoin', 'id_besoin'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'libelle' => 'Libelle',
			'quantite' => 'Quantite',
			'pu' => 'Prix',
			'id_besoin' => 'Id Besoin',
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
		$criteria->compare('libelle',$this->libelle,true);
		$criteria->compare('quantite',$this->quantite);
		$criteria->compare('pu',$this->pu);
		$criteria->compare('id_besoin',$this->id_besoin);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DetailBesoin the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
