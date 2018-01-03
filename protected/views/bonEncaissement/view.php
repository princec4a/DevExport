<?php
/* @var $this BonEncaissementController */
/* @var $model BonEncaissement */

$this->breadcrumbs=array(
	'Bon Encaissements'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List BonEncaissement', 'url'=>array('index')),
	array('label'=>'Create BonEncaissement', 'url'=>array('create')),
	array('label'=>'Update BonEncaissement', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete BonEncaissement', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BonEncaissement', 'url'=>array('admin')),
);
?>

<h1>View BonEncaissement #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'numero',
		'date',
		'a_ordre',
		'motif',
		'montant',
		'accompte',
		'reste',
		'id_dossier',
		'date_created',
		'date_modified',
		'id_user',
		'id_caissier',
	),
)); ?>
