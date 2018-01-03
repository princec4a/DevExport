<?php
$this->breadcrumbs=array(
	UserModule::t('Utilisateurs')=>array('admin'),
	$model->username,
);


$this->menu=array(
    array('label'=>UserModule::t('<i class="menu-icon fa fa-floppy-o"></i> <span class="menu-text">Nouvel utilisateur</span>'), 'url'=>array('create')),
    array('label'=>UserModule::t('<i class="menu-icon fa fa-pencil-square-o"></i> <span class="menu-text">Modifier l\'utilisateur</span>'), 'url'=>array('update','id'=>$model->id)),
    array('label'=>UserModule::t('<i class="menu-icon fa fa-trash-o"></i> <span class="menu-text">Supprimer l\'utilisateur</span>'), 'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>UserModule::t('Are you sure to delete this item?'))),
    array('label'=>UserModule::t('<i class="menu-icon fa fa-cog"></i> <span class="menu-text">Gérer les utilisateurs</span>'), 'url'=>array('admin')),
    //array('label'=>UserModule::t('Manage Profile Field'), 'url'=>array('profileField/admin')),
    array('label'=>UserModule::t('<i class="menu-icon fa fa-list-alt"></i> <span class="menu-text">Lister des utilisateurs</span>'), 'url'=>array('/user')),
);
?>
<div class="page-header">
	<h1><?php echo UserModule::t('Detail de l\'utilisateur : ').' <strong>'.$model->username.'</strong>'; ?></h1>
</div>


<?php
 
	$attributes = array(
		//'id',
		//'username',
		array(
			'label' => 'Identifiant',
			'type'=>'raw',
			'value' =>$model->username,
		),

	);
	
	$profileFields=ProfileField::model()->forOwner()->sort()->findAll();
	if ($profileFields) {
		foreach($profileFields as $field) {
			array_push($attributes,array(
					'label' => UserModule::t(($field->title == 'First Name')? 'Nom ': 'Prénom'),
					'name' => $field->varname,
					'type'=>'raw',
					'value' => (($field->widgetView($model->profile))?$field->widgetView($model->profile):(($field->range)?Profile::range($field->range,$model->profile->getAttribute($field->varname)):$model->profile->getAttribute($field->varname))),
				));
		}
	}
	
	array_push($attributes,
		'password',
		'email',
		'activkey',
		'create_at',
		'lastvisit_at',
		array(
			'name' => 'superuser',
			'value' => User::itemAlias("AdminStatus",$model->superuser),
		),
		array(
			'name' => 'status',
			'value' => User::itemAlias("UserStatus",$model->status),
		)
	);
	
	$this->widget('zii.widgets.CDetailView', array(
		'data'=>$model,
		'attributes'=>$attributes,
	));
	

?>
