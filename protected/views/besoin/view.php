<?php
/* @var $this BesoinController */
/* @var $model Besoin */

$this->breadcrumbs=array(
	'Besoins'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Besoin', 'url'=>array('index')),
	array('label'=>'Create Besoin', 'url'=>array('create')),
	array('label'=>'Update Besoin', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Besoin', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Besoin', 'url'=>array('admin')),
);
?>

<h1>View Besoin #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'numero',
		'libelle',
		'visa_dg',
		'visa_dd',
		'date_created',
		'date_modified',
		'id_user',
	),
)); ?>
