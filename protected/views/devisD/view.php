<?php
/* @var $this DevisDController */
/* @var $model DevisD */

$this->breadcrumbs=array(
	'Devis Ds'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List DevisD', 'url'=>array('index')),
	array('label'=>'Create DevisD', 'url'=>array('create')),
	array('label'=>'Update DevisD', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete DevisD', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DevisD', 'url'=>array('admin')),
);
?>

<h1>View DevisD #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'autorise_par',
		'montant',
		'dd',
		'tel_i',
		'tr',
		'frais_saisie_btf',
		'sortie_tc_d',
		'visa_dd',
		'visa_rtt',
		'visa_caissiere',
		'visa_dg',
		'numero',
		'date_created',
		'date_modified',
		'id_user',
		'id_devis_a',
	),
)); ?>
