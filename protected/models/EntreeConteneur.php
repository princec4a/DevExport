<?php

/**
 * This is the model class for table "dc_entree_conteneur".
 *
 * The followings are the available columns in table 'dc_entree_conteneur':
 * @property integer $id
 * @property string $numero
 * @property string $date_livraison
 * @property string $chauffeur
 * @property string $site
 * @property string $heure_fin_empotage
 * @property string $num_plomb
 * @property double $poid_brut
 * @property double $poid_reel
 * @property integer $id_sortie_conteneur
 * @property string $date_created
 * @property string $date_modified
 * @property integer $id_user
 *
 * The followings are the available model relations:
 * @property Users $idUser
 * @property SortieConteneur $idSortieConteneur
 */
class EntreeConteneur extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'dc_entree_conteneur';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('date_livraison, chauffeur, site, heure_fin_empotage, num_plomb, poid_brut, poid_reel', 'required'),
			array('id_sortie_conteneur, id_user', 'numerical', 'integerOnly'=>true),
			array('poid_brut, poid_reel', 'numerical'),
			array('numero, chauffeur, site, num_plomb', 'length', 'max'=>255),
			array('date_created, date_modified', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, numero, date_livraison, chauffeur, site, heure_fin_empotage, num_plomb, poid_brut, poid_reel, id_sortie_conteneur, date_created, date_modified, id_user', 'safe', 'on'=>'search'),
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
			'idSortieConteneur' => array(self::BELONGS_TO, 'SortieConteneur', 'id_sortie_conteneur'),
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
			'date_livraison' => 'Date Livraison',
			'chauffeur' => 'Remorque',
			'site' => 'Site',
			'heure_fin_empotage' => 'Heure Fin Empotage',
			'num_plomb' => 'Num Plomb',
			'poid_brut' => 'Poid Brut',
			'poid_reel' => 'Poid Reel',
			'id_sortie_conteneur' => 'Id Sortie Conteneur',
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
		$criteria->compare('date_livraison',$this->date_livraison,true);
		$criteria->compare('chauffeur',$this->chauffeur,true);
		$criteria->compare('site',$this->site,true);
		$criteria->compare('heure_fin_empotage',$this->heure_fin_empotage,true);
		$criteria->compare('num_plomb',$this->num_plomb,true);
		$criteria->compare('poid_brut',$this->poid_brut);
		$criteria->compare('poid_reel',$this->poid_reel);
		$criteria->compare('id_sortie_conteneur',$this->id_sortie_conteneur);
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
	 * @return EntreeConteneur the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	protected function beforeSave(){
		if(parent::beforeSave()){
			$this->date_livraison = date('Y-m-d', strtotime($this->date_livraison));
			return TRUE;
		}
		else return false;
	}

	protected function afterFind(){
		parent::afterFind();
		$this->date_livraison = date('d-m-Y', strtotime($this->date_livraison));
		//$this->date_created = date('d/m/Y', strtotime($this->date_created));
		//$this->date_modified = date('d/m/Y', strtotime($this->date_modified));
	}
}
