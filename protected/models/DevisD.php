<?php

/**
 * This is the model class for table "dc_devis_d".
 *
 * The followings are the available columns in table 'dc_devis_d':
 * @property integer $id
 * @property integer $autorise_par
 * @property double $montant
 * @property double $dd
 * @property double $tel_i
 * @property double $tr
 * @property double $frais_saisie_btf
 * @property double $sortie_tc_d
 * @property double $trans
 * @property integer $visa_dd
 * @property integer $visa_rtt
 * @property integer $visa_caissiere
 * @property integer $visa_dg
 * @property string $numero
 * @property string $date_created
 * @property string $date_modified
 * @property integer $id_user
 * @property integer $id_devis_a
 * @property string $num_bul_liquidation
 * @property string $date_validation_dg
 * @property string $date_validation_dd
 * @property string $date_validation_rtt
 * @property string $date_validation_caissiere
 * @property integer $id_dg
 * @property integer $id_dd
 * @property integer $id_rtt
 * @property integer $id_caissiere
 * @property integer $etat
 *
 * The followings are the available model relations:
 * @property Users $idUser
 * @property DevisA $idDevisA
 */
class DevisD extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'dc_devis_d';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('autorise_par, montant, dd, tel_i, tr, frais_saisie_btf, sortie_tc_d, trans, id_user, id_devis_a, num_bul_liquidation', 'required'),
			array('autorise_par, visa_dd, visa_rtt, visa_caissiere, visa_dg, id_user, id_devis_a, id_dg, id_dd, id_rtt, id_caissiere, etat', 'numerical', 'integerOnly'=>true),
			array('montant, dd, tel_i, tr, frais_saisie_btf, sortie_tc_d, etat', 'numerical'),
			array('numero, num_bul_liquidation', 'length', 'max'=>255),
			array('date_created, date_modified, date_validation_dg, date_validation_dd, date_validation_rtt, date_validation_caissiere', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, autorise_par, montant, dd, tel_i, tr, frais_saisie_btf, sortie_tc_d, visa_dd, visa_rtt, visa_caissiere, visa_dg, numero, date_created, date_modified, id_user, id_devis_a, num_bul_liquidation, date_validation_dg, date_validation_dd, date_validation_rtt, date_validation_caissiere, id_dg, id_dd, id_rtt, id_caissiere, etat', 'safe', 'on'=>'search'),
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
			'idDevisA' => array(self::BELONGS_TO, 'DevisA', 'id_devis_a'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'autorise_par' => 'Autorise Par',
			'montant' => 'Montant',
			'dd' => 'Dd',
			'tel_i' => 'Tel I',
			'tr' => 'Tr',
			'frais_saisie_btf' => 'Frais Saisie Btf',
			'sortie_tc_d' => 'Sortie Tc D',
			'trans' => 'Transport',
			'visa_dd' => 'Visa Dd',
			'visa_rtt' => 'Visa Rtt',
			'visa_caissiere' => 'Visa Caissiere',
			'visa_dg' => 'Visa Dg',
			'numero' => 'Numero',
			'date_created' => 'Date Created',
			'date_modified' => 'Date Modified',
			'id_user' => 'Id User',
			'id_devis_a' => 'Id Devis A',
			'num_bul_liquidation' => 'Num Bul Liquidation',
			'date_validation_dg' => 'Date Validation Dg',
			'date_validation_dd' => 'Date Validation Dd',
			'date_validation_rtt' => 'Date Validation Rtt',
			'date_validation_caissiere' => 'Date Validation Caissiere',
			'id_dg' => 'Id Dg',
			'id_dd' => 'Id Dd',
			'id_rtt' => 'Id Rtt',
			'id_caissiere' => 'Id Caissiere',
			'etat' => 'Etat',
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
		$criteria->compare('autorise_par',$this->autorise_par);
		$criteria->compare('montant',$this->montant);
		$criteria->compare('dd',$this->dd);
		$criteria->compare('tel_i',$this->tel_i);
		$criteria->compare('tr',$this->tr);
		$criteria->compare('frais_saisie_btf',$this->frais_saisie_btf);
		$criteria->compare('sortie_tc_d',$this->sortie_tc_d);
		$criteria->compare('trans',$this->trans);
		$criteria->compare('visa_dd',$this->visa_dd);
		$criteria->compare('visa_rtt',$this->visa_rtt);
		$criteria->compare('visa_caissiere',$this->visa_caissiere);
		$criteria->compare('visa_dg',$this->visa_dg);
		$criteria->compare('numero',$this->numero,true);
		$criteria->compare('date_created',$this->date_created,true);
		$criteria->compare('date_modified',$this->date_modified,true);
		$criteria->compare('id_user',$this->id_user);
		$criteria->compare('id_devis_a',$this->id_devis_a);
		$criteria->compare('num_bul_liquidation',$this->num_bul_liquidation,true);
		$criteria->compare('date_validation_dg',$this->date_validation_dg,true);
		$criteria->compare('date_validation_dd',$this->date_validation_dd,true);
		$criteria->compare('date_validation_rtt',$this->date_validation_rtt,true);
		$criteria->compare('date_validation_caissiere',$this->date_validation_caissiere,true);
		$criteria->compare('id_dg',$this->id_dg);
		$criteria->compare('id_dd',$this->id_dd);
		$criteria->compare('id_rtt',$this->id_rtt);
		$criteria->compare('id_caissiere',$this->id_caissiere);
		$criteria->compare('etat',$this->etat);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DevisD the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
