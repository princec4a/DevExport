<?php

/**
 * This is the model class for table "dc_detail_facture".
 *
 * The followings are the available columns in table 'dc_detail_facture':
 * @property integer $id
 * @property string $description_materiel
 * @property string $conteneur
 * @property double $poids_net
 * @property double $taux
 * @property double $montant
 * @property string $date_created
 * @property string $date_modified
 * @property integer $id_facture
 * @property integer $id_user
 *
 * The followings are the available model relations:
 * @property Facture $idFacture
 */
class DetailFacture extends CActiveRecord
{
	public $updateType;

	const TAUX = 50;
	const TAUX_AFFICHAGE = 50000;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'dc_detail_facture';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('description_materiel, conteneur, poids_net, taux', 'required'),
			array('id_facture, id_user', 'numerical', 'integerOnly'=>true),
			array('poids_net, taux, montant', 'numerical'),
			array('description_materiel, conteneur', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, description_materiel, conteneur, poids_net, taux, montant, date_created, date_modified, id_facture, id_user', 'safe', 'on'=>'search'),
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
			'idFacture' => array(self::BELONGS_TO, 'Facture', 'id_facture'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'description_materiel' => 'Description Materiel',
			'conteneur' => 'Conteneur',
			'poids_net' => 'Poids Net',
			'taux' => 'Taux',
			'montant' => 'Montant',
			'date_created' => 'Date Created',
			'date_modified' => 'Date Modified',
			'id_facture' => 'Id Facture',
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
		$criteria->compare('description_materiel',$this->description_materiel,true);
		$criteria->compare('conteneur',$this->conteneur,true);
		$criteria->compare('poids_net',$this->poids_net);
		$criteria->compare('taux',$this->taux);
		$criteria->compare('montant',$this->montant);
		$criteria->compare('date_created',$this->date_created,true);
		$criteria->compare('date_modified',$this->date_modified,true);
		$criteria->compare('id_facture',$this->id_facture);
		$criteria->compare('id_user',$this->id_user);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DetailFacture the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
