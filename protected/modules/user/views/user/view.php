<?php
$this->breadcrumbs=array(
	UserModule::t('Utilisateurs')=>array('index'),
	$model->username,
);

$this->layout='//layouts/column2';

$this->menu=array(
    array('label'=>UserModule::t('<i class="menu-icon fa fa-list-alt"></i> <span class="menu-text">Lister les utilisateurs</span>'), 'url'=>array('index')),
);
?>

<div class="page-header">
<h1><?php echo UserModule::t('Détail de l\'utilisateur ').' <strong>'.$model->username.'</strong>'; ?></h1>
</div>

<?php 

// For all users
	$attributes = array(
			'username',
	);
	
	$profileFields=ProfileField::model()->forAll()->sort()->findAll();
	if ($profileFields) {
		foreach($profileFields as $field) {
			array_push($attributes,array(
					'label' => UserModule::t($field->title),
					'name' => $field->varname,
					'value' => (($field->widgetView($model->profile))?$field->widgetView($model->profile):(($field->range)?Profile::range($field->range,$model->profile->getAttribute($field->varname)):$model->profile->getAttribute($field->varname))),

				));
		}
	}
	array_push($attributes,
		'create_at',
		array(
			'name' => 'lastvisit_at',
			'value' => (($model->lastvisit_at!='0000-00-00 00:00:00')?$model->lastvisit_at:UserModule::t('Not visited')),
		)
	);
			
	$this->widget('zii.widgets.CDetailView', array(
		'data'=>$model,
		'attributes'=>$attributes,
	));

?>
