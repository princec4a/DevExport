<?php

/**
 * This is the model class for table "dc_bon_caisse".
 *
 * The followings are the available columns in table 'dc_bon_caisse':
 * @property integer $id
 * @property string $numero
 * @property string $date
 * @property integer $a_ordre
 * @property string $motif
 * @property double $montant
 * @property double $transport
 * @property double $rendue
 * @property integer $visa_caissier
 * @property integer $visa_interesse
 * @property string $num_piece
 * @property string $date_created
 * @property string $date_modified
 * @property integer $id_user
 * @property string $date_validation_caissier
 * @property string $date_validation_interesse
 * @property integer $id_caissier
 * @property integer $id_interesse
 *
 * The followings are the available model relations:
 * @property Users $aOrdre
 * @property Users $idUser
 */
class BonCaisse extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'dc_bon_caisse';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('date, a_ordre, motif, montant, num_piece, id_user', 'required'),
			array('a_ordre, visa_caissier, visa_interesse, id_user, id_caissier, id_interesse', 'numerical', 'integerOnly'=>true),
			array('montant, transport, rendue', 'numerical'),
			array('numero, motif, num_piece', 'length', 'max'=>255),
			array('date_created, date_modified, date_validation_caissier, date_validation_interesse', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, numero, date, a_ordre, motif, montant, transport, rendue, visa_caissier, visa_interesse, num_piece, date_created, date_modified, id_user, date_validation_caissier, date_validation_interesse, id_caissier, id_interesse', 'safe', 'on'=>'search'),
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
			'aOrdre' => array(self::BELONGS_TO, 'Users', 'a_ordre'),
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
			'date' => 'Date',
			'a_ordre' => 'A Ordre',
			'motif' => 'Motif',
			'montant' => 'Montant',
			'transport' => 'Transport',
			'rendue' => 'Rendue',
			'visa_caissier' => 'Visa Caissier',
			'visa_interesse' => 'Visa Interesse',
			'num_piece' => 'Num Piece',
			'date_created' => 'Date Created',
			'date_modified' => 'Date Modified',
			'id_user' => 'Id User',
			'date_validation_caissier' => 'Date Validation Caissier',
			'date_validation_interesse' => 'Date Validation Interesse',
			'id_caissier' => 'Id Caissier',
			'id_interesse' => 'Id Interesse',
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
		$criteria->compare('date',$this->date,true);
		$criteria->compare('a_ordre',$this->a_ordre);
		$criteria->compare('motif',$this->motif,true);
		$criteria->compare('montant',$this->montant);
		$criteria->compare('transport',$this->transport);
		$criteria->compare('rendue',$this->rendue);
		$criteria->compare('visa_caissier',$this->visa_caissier);
		$criteria->compare('visa_interesse',$this->visa_interesse);
		$criteria->compare('num_piece',$this->num_piece,true);
		$criteria->compare('date_created',$this->date_created,true);
		$criteria->compare('date_modified',$this->date_modified,true);
		$criteria->compare('id_user',$this->id_user);
		$criteria->compare('date_validation_caissier',$this->date_validation_caissier,true);
		$criteria->compare('date_validation_interesse',$this->date_validation_interesse,true);
		$criteria->compare('id_caissier',$this->id_caissier);
		$criteria->compare('id_interesse',$this->id_interesse);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return BonCaisse the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	protected function beforeSave(){
		if(parent::beforeSave()){
			$this->date = date('Y-m-d', strtotime($this->date));
			return TRUE;
		}
		else return false;
	}

	protected function afterFind(){
		parent::afterFind();
		$this->date = date('d-m-Y', strtotime($this->date));
		//$this->date_created = date('d/m/Y', strtotime($this->date_created));
		//$this->date_modified = date('d/m/Y', strtotime($this->date_modified));
	}
}
