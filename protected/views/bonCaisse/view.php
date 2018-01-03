<?php
/* @var $this BonCaisseController */
/* @var $model BonCaisse */

$this->breadcrumbs=array(
	'Bon Caisses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List BonCaisse', 'url'=>array('index')),
	array('label'=>'Create BonCaisse', 'url'=>array('create')),
	array('label'=>'Update BonCaisse', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete BonCaisse', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BonCaisse', 'url'=>array('admin')),
);
?>

<h1>View BonCaisse #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'date',
		'a_ordre',
		'motif',
		'montant',
		'transport',
		'visa_caissier',
		'visa_interesse',
		'id_devis_a',
		'id_devis_d',
		'date_created',
		'date_modified',
		'id_user',
	),
)); ?>
