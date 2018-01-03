<?php
/* @var $this DevisAController */
/* @var $model DevisA */

$this->breadcrumbs=array(
	'Devis As'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List DevisA', 'url'=>array('index')),
	array('label'=>'Create DevisA', 'url'=>array('create')),
	array('label'=>'Update DevisA', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete DevisA', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DevisA', 'url'=>array('admin')),
);
?>

<h1>View DevisA #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'autorise_par',
		'montant',
		'bsc',
		'co',
		'de',
		'c_exp',
		'frais_saisie',
		'trans',
		'visa_dd',
		'visa_rtt',
		'visa_caissiere',
		'visa_dg',
		'date_created',
		'date_modified',
		'id_user',
		'numero',
	),
)); ?>
