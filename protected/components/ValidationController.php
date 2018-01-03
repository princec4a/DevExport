<?php

/**
 * Created by PhpStorm.
 * User: migration7
 * Date: 19/12/16
 * Time: 14:12
 */
class ValidationController
{

    /**
     * Récupérer tous les devis A non validé par le DG
     * @throws CHttpException
     */
    public static function getDevisADgNonValider(){
        $criteria = new CDbCriteria();
        $criteria->addCondition("visa_dg=:visa");
        $criteria->params = array(':visa' => 0);
        $models = DevisA::model()->findAll($criteria);
        if($models===null)
            throw new CHttpException(404,'The requested page does not exist.');
        else
            return $models;
    }

    /**
     * Récupérer tous les devis A non validé par le DG
     * @throws CHttpException
     */
    public static function getDevisADDNonValider(){
        $criteria = new CDbCriteria();
        $criteria->addCondition("visa_dd=:visa");
        $criteria->params = array(':visa' => 0);
        $models = DevisA::model()->findAll($criteria);
        if($models===null)
            throw new CHttpException(404,'The requested page does not exist.');
        else
            return $models;
    }

    /**
     * Récupérer tous les devis A non validé par le RTT
     * @throws CHttpException
     */
    public static function getDevisARTTNonValider(){
        $criteria = new CDbCriteria();
        $criteria->addCondition("visa_rtt=:visa");
        $criteria->params = array(':visa' => 0);
        $models = DevisA::model()->findAll($criteria);
        if($models===null)
            throw new CHttpException(404,'The requested page does not exist.');
        else
            return $models;
    }

    /**
     * Récupérer tous les devis A non validé par le Caissier
     * @throws CHttpException
     */
    public static function getDevisACaissierNonValider(){
        $criteria = new CDbCriteria();
        $criteria->addCondition("visa_caissiere=:visa");
        $criteria->params = array(':visa' => 0);
        $models = DevisA::model()->findAll($criteria);
        if($models===null)
            throw new CHttpException(404,'The requested page does not exist.');
        else
            return $models;
    }

    /**
     * Récupérer tous les devis A non validé par le Caissier
     * @throws CHttpException
     */
    public static function getAllDevisANonValider(){
        $criteria = new CDbCriteria();
        $criteria->compare("visa_caissiere", 0, false,'OR');
        $criteria->compare("visa_rtt", 0, false, 'OR');
        $criteria->compare("visa_dd", 0, false, 'OR');
        $criteria->compare("visa_dg", 0, false, 'OR');
        $models = DevisA::model()->findAll($criteria);
        if($models===null)
            throw new CHttpException(404,'The requested page does not exist.');
        else
            return $models;
    }

    /**
     * Récupérer tous les devis D non validé par le DG
     * @throws CHttpException
     */
    public static function getDevisDDgNonValider(){
        $criteria = new CDbCriteria();
        $criteria->addCondition("visa_dg=:visa");
        $criteria->params = array(':visa' => 0);
        $models = DevisD::model()->findAll($criteria);
        if($models===null)
            throw new CHttpException(404,'The requested page does not exist.');
        else
            return $models;
    }

    /**
     * Récupérer tous les devis D non validé par le DG
     * @throws CHttpException
     */
    public static function getDevisDDDNonValider(){
        $criteria = new CDbCriteria();
        $criteria->addCondition("visa_dd=:visa");
        $criteria->params = array(':visa' => 0);
        $models = DevisD::model()->findAll($criteria);
        if($models===null)
            throw new CHttpException(404,'The requested page does not exist.');
        else
            return $models;
    }

    /**
     * Récupérer tous les devis D non validé par le RTT
     * @throws CHttpException
     */
    public static function getDevisDRTTNonValider(){
        $criteria = new CDbCriteria();
        $criteria->addCondition("visa_rtt=:visa");
        $criteria->params = array(':visa' => 0);
        $models = DevisD::model()->findAll($criteria);
        if($models===null)
            throw new CHttpException(404,'The requested page does not exist.');
        else
            return $models;
    }

    /**
     * Récupérer tous les devis D non validé par le Caissier
     * @throws CHttpException
     */
    public static function getDevisDCaissierNonValider(){
        $criteria = new CDbCriteria();
        $criteria->addCondition("visa_caissiere=:visa");
        $criteria->params = array(':visa' => 0);
        $models = DevisD::model()->findAll($criteria);
        if($models===null)
            throw new CHttpException(404,'The requested page does not exist.');
        else
            return $models;
    }

    /**
     * Récupérer tous les devis D non validé par le Caissier
     * @throws CHttpException
     */
    public static function getAllDevisDNonValider(){
        $criteria = new CDbCriteria();
        $criteria->compare("visa_caissiere", 0, false,'OR');
        $criteria->compare("visa_rtt", 0, false, 'OR');
        $criteria->compare("visa_dd", 0, false, 'OR');
        $criteria->compare("visa_dg", 0, false, 'OR');
        $models = DevisD::model()->findAll($criteria);
        if($models===null)
            throw new CHttpException(404,'The requested page does not exist.');
        else
            return $models;
    }

    /**
     * Récupérer tous les BON DE CAISSE non validé par le RTT
     * @throws CHttpException
     */
    public static function getBC_RTTNonValider(){
        $criteria = new CDbCriteria();
        $criteria->addCondition("visa_interesse=:visa");
        $criteria->params = array(':visa' => 0);
        $models = BonCaisse::model()->findAll($criteria);
        if($models===null)
            throw new CHttpException(404,'The requested page does not exist.');
        else
            return $models;
    }

    /**
     * Récupérer tous les BON DE CAISSE non validé par le Caissier
     * @throws CHttpException
     */
    public static function getBC_CaissierNonValider(){
        $criteria = new CDbCriteria();
        $criteria->addCondition("visa_caissier=:visa");
        $criteria->params = array(':visa' => 0);
        $models = BonCaisse::model()->findAll($criteria);
        if($models===null)
            throw new CHttpException(404,'The requested page does not exist.');
        else
            return $models;
    }

    /**
     * Récupérer tous les BON DE CAISSE non validé par le Caissier
     * @throws CHttpException
     */
    public static function getAllBC_NonValider(){
        $criteria = new CDbCriteria();
        $criteria->compare("visa_caissier", 0, false,'OR');
        $criteria->compare("visa_interesse", 0, false, 'OR');
        $models = BonCaisse::model()->findAll($criteria);
        if($models===null)
            throw new CHttpException(404,'The requested page does not exist.');
        else
            return $models;
    }

    public static function getAllBesoin_NonValider(){
        $criteria = new CDbCriteria();
        $criteria->compare("visa_dg", 0, false,'OR');
        $criteria->compare("visa_dd", 0, false, 'OR');
        $models = Besoin::model()->findAll($criteria);
        if($models===null)
            throw new CHttpException(404,'The requested page does not exist.');
        else
            return $models;
    }

    public static function getBesoin_DgNonValider(){
        $criteria = new CDbCriteria();
        $criteria->addCondition("visa_dg=:visa");
        $criteria->params = array(':visa' => 0);
        $models = Besoin::model()->findAll($criteria);
        if($models===null)
            throw new CHttpException(404,'The requested page does not exist.');
        else
            return $models;
    }
    public static function getBesoin_DDNonValider(){
        $criteria = new CDbCriteria();
        $criteria->addCondition("visa_dd=:visa");
        $criteria->params = array(':visa' => 0);
        $models = Besoin::model()->findAll($criteria);
        if($models===null)
            throw new CHttpException(404,'The requested page does not exist.');
        else
            return $models;
    }

}