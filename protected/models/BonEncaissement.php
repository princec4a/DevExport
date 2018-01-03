<?php

/**
 * This is the model class for table "dc_bon_encaissement".
 *
 * The followings are the available columns in table 'dc_bon_encaissement':
 * @property integer $id
 * @property string $numero
 * @property string $date
 * @property integer $a_ordre
 * @property string $motif
 * @property double $montant
 * @property double $accompte
 * @property double $reste
 * @property integer $id_dossier
 * @property string $date_created
 * @property string $date_modified
 * @property integer $id_user
 * @property integer $id_caissier
 *
 * The followings are the available model relations:
 * @property Users $idCaissier
 * @property DossierClient $idDossier
 * @property Users $idUser
 */
class BonEncaissement extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'dc_bon_encaissement';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('date, a_ordre, motif, montant, accompte, id_dossier, id_user, id_caissier', 'required'),
			array('a_ordre, id_dossier, id_user, id_caissier', 'numerical', 'integerOnly'=>true),
			array('montant, accompte, reste', 'numerical'),
			array('numero, motif', 'length', 'max'=>255),
			array('date_created, date_modified', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, numero, date, a_ordre, motif, montant, accompte, reste, id_dossier, date_created, date_modified, id_user, id_caissier', 'safe', 'on'=>'search'),
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
			'idCaissier' => array(self::BELONGS_TO, 'Users', 'id_caissier'),
			'idDossier' => array(self::BELONGS_TO, 'DossierClient', 'id_dossier'),
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
			'accompte' => 'Accompte',
			'reste' => 'Reste',
			'id_dossier' => 'Id Dossier',
			'date_created' => 'Date Created',
			'date_modified' => 'Date Modified',
			'id_user' => 'Id User',
			'id_caissier' => 'Id Caissier',
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
		$criteria->compare('accompte',$this->accompte);
		$criteria->compare('reste',$this->reste);
		$criteria->compare('id_dossier',$this->id_dossier);
		$criteria->compare('date_created',$this->date_created,true);
		$criteria->compare('date_modified',$this->date_modified,true);
		$criteria->compare('id_user',$this->id_user);
		$criteria->compare('id_caissier',$this->id_caissier);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return BonEncaissement the static model class
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


	//ALTER TABLE  `dc_dossier_client` ADD  `num_vgm` VARCHAR( 255 ) NOT NULL ;
}
