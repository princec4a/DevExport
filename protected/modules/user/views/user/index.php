<?php
$this->breadcrumbs=array(
	UserModule::t("Utilisateurs"),
);
if(UserModule::isAdmin()) {
	$this->layout='//layouts/column2';
	$this->menu=array(
		array('label'=>UserModule::t('<i class="menu-icon fa fa-floppy-o"></i> <span class="menu-text">Nouvel utilisateur</span>'), 'url'=>array('admin/create')),
	    array('label'=>UserModule::t('<i class="menu-icon fa fa-cog"></i> <span class="menu-text">Gérer les utilisateurs</span>'), 'url'=>array('/user/admin')),
	    //array('label'=>UserModule::t('Manage Profile Field'), 'url'=>array('profileField/admin')),
	);
}
?>

<div class="page-header">
	<h1><?php echo UserModule::t("Liste des utilisateurs"); ?></h1>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		array(
			'name' => 'Identifiant',
			'type'=>'raw',
			'value' => 'CHtml::link(CHtml::encode($data->username),array("user/view","id"=>$data->id))',
		),
		array(
			'name' => 'Crée le',
			'type'=>'raw',
			'value' => 'date("d/m/Y H:i:s", strtotime($data->create_at))',
		),
		array(
			'name' => 'Dernière connexion',
			'type'=>'raw',
			'value' => 'date("d/m/Y H:i:s", strtotime($data->lastvisit_at))',
		),
	),
)); ?>
