<?php

$this->breadcrumbs=array(
	(UserModule::t('Utilisateurs'))=>array('admin'),
	(UserModule::t('Modification')),
    $model->username=>array('view','id'=>$model->id),
);

$this->menu=array(
    array('label'=>UserModule::t('<i class="menu-icon fa fa-floppy-o"></i> <span class="menu-text">Nouvel utilisateur</span>'), 'url'=>array('create')),
    array('label'=>UserModule::t('<i class="menu-icon fa fa-floppy-o"></i> <span class="menu-text">Détail de l\'utilisateur</span>'), 'url'=>array('view','id'=>$model->id)),
    array('label'=>UserModule::t('<i class="menu-icon fa fa-cog"></i> <span class="menu-text">Gérer les utilisateurs</span>'), 'url'=>array('admin')),
    //array('label'=>UserModule::t('Manage Profile Field'), 'url'=>array('profileField/admin')),
    array('label'=>UserModule::t('<i class="menu-icon fa fa-list-alt"></i> <span class="menu-text">Lister les utilisateurs</span>'), 'url'=>array('/user')),
);
?>

<div class="page-header">
    <h1><?php echo  UserModule::t('Modification de l\'utilisateur')." <strong>".$model->username."</strong>"; ?></h1>
</div>

<?php
	echo $this->renderPartial('_form', array('model'=>$model,'profile'=>$profile));
?>