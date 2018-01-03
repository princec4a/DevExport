<?php
$this->breadcrumbs=array(
	UserModule::t('Utilisateurs')=>array('admin'),
	UserModule::t('Nouveau'),
);

$this->menu=array(
    array('label'=>UserModule::t('<i class="menu-icon fa fa-cog"></i> <span class="menu-text">Gérer les utilisateurs</span>'), 'url'=>array('admin')),
    //array('label'=>UserModule::t('Gerer les Profiles'), 'url'=>array('profileField/admin')),
    array('label'=>UserModule::t('<i class="menu-icon fa fa-list-alt"></i> <span class="menu-text">Lister les utilisateurs</span>'), 'url'=>array('/user')),
);
?>
<div class="page-header">
    <h1><?php echo UserModule::t("Nouvel utilisateur"); ?></h1>
</div>

<?php
	echo $this->renderPartial('_form', array('model'=>$model,'profile'=>$profile));
?>