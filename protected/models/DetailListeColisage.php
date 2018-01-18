<?php

/**
 * This is the model class for table "dc_detail_liste_colisage".
 *
 * The followings are the available columns in table 'dc_detail_liste_colisage':
 * @property integer $id
 * @property string $description_materiel
 * @property string $conteneur
 * @property double $poids_brut
 * @property double $poids_net
 * @property string $date_created
 * @property string $date_modified
 * @property integer $id_user
 * @property integer $id_liste_colisage
 *
 * The followings are the available model relations:
 * @property ListeColisage $idListeColisage
 */
class DetailListeColisage extends CActiveRecord
{
	public $updateType;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'dc_detail_liste_colisage';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('description_materiel, conteneur, poids_brut, poids_net', 'required'),
			array('id_user, id_liste_colisage', 'numerical', 'integerOnly'=>true),
			array('poids_brut, poids_net', 'numerical'),
			array('description_materiel, conteneur', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, description_materiel, conteneur, poids_brut, poids_net, date_created, date_modified, id_user, id_liste_colisage', 'safe', 'on'=>'search'),
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
			'idListeColisage' => array(self::BELONGS_TO, 'ListeColisage', 'id_liste_colisage'),
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
			'poids_brut' => 'Poids Brut',
			'poids_net' => 'Poids Net',
			'date_created' => 'Date Created',
			'date_modified' => 'Date Modified',
			'id_user' => 'Id User',
			'id_liste_colisage' => 'Id Liste Colisage',
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
		$criteria->compare('poids_brut',$this->poids_brut);
		$criteria->compare('poids_net',$this->poids_net);
		$criteria->compare('date_created',$this->date_created,true);
		$criteria->compare('date_modified',$this->date_modified,true);
		$criteria->compare('id_user',$this->id_user);
		$criteria->compare('id_liste_colisage',$this->id_liste_colisage);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DetailListeColisage the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
