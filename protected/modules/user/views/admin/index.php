<?php
$this->breadcrumbs=array(
	UserModule::t('Utilisateurs')=>array('/user'),
	UserModule::t('Gérer'),
);

$this->menu=array(
    array('label'=>UserModule::t('<i class="menu-icon fa fa-floppy-o"></i> <span class="menu-text">Nouvel utilisateur</span>'), 'url'=>array('create')),
    array('label'=>UserModule::t('<i class="menu-icon fa fa-cog"></i> <span class="menu-text">Gérer les utilisateurs</span>'), 'url'=>array('admin')),
    //array('label'=>UserModule::t('Manage Profile Field'), 'url'=>array('profileField/admin')),
    array('label'=>UserModule::t('<i class="menu-icon fa fa-list-alt"></i> <span class="menu-text">Lister les utilisateurs</span>'), 'url'=>array('/user')),
);

/*Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').toggle();
    return false;
});	
$('.search-form form').submit(function(){
    $.fn.yiiGridView.update('user-grid', {
        data: $(this).serialize()
    });
    return false;
});
");
*/
?>

<div class="page-header">
	<h1><?php echo UserModule::t("Gérer les utilisateurs"); ?></h1>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'name' => 'id',
			'type'=>'raw',
			'value' => 'CHtml::link(CHtml::encode($data->id),array("admin/update","id"=>$data->id))',
		),
		array(
			'name' => 'username',
			'type'=>'raw',
			'value' => 'CHtml::link(UHtml::markSearch($data,"username"),array("admin/view","id"=>$data->id))',
		),
		array(
			'name'=>'email',
			'type'=>'raw',
			'value'=>'CHtml::link(UHtml::markSearch($data,"email"), "mailto:".$data->email)',
		),
		'create_at',
		'lastvisit_at',
		array(
			'name'=>'superuser',
			'value'=>'User::itemAlias("AdminStatus",$data->superuser)',
			'filter'=>User::itemAlias("AdminStatus"),
		),
		array(
			'name'=>'status',
			'value'=>'User::itemAlias("UserStatus",$data->status)',
			'filter' => User::itemAlias("UserStatus"),
		),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
