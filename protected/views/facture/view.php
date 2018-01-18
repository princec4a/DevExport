<?php
/* @var $this FactureController */
/* @var $model Facture */

$this->breadcrumbs=array(
	'Factures'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Facture', 'url'=>array('index')),
	array('label'=>'Create Facture', 'url'=>array('create')),
	array('label'=>'Update Facture', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Facture', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Facture', 'url'=>array('admin')),
);
?>

<h1>View Facture #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'client',
		'pays_destionation',
		'nom_navire',
		'port_embarquement',
		'port_chargement',
		'destination_final',
		'date_created',
		'date_modified',
		'id_user',
	),
)); ?>
