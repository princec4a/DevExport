<?php
/* @var $this DetailFactureController */
/* @var $model DetailFacture */

$this->breadcrumbs=array(
	'Detail Factures'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List DetailFacture', 'url'=>array('index')),
	array('label'=>'Create DetailFacture', 'url'=>array('create')),
	array('label'=>'Update DetailFacture', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete DetailFacture', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DetailFacture', 'url'=>array('admin')),
);
?>

<h1>View DetailFacture #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'description_materiel',
		'conteneur',
		'poids_net',
		'taux',
		'montant',
		'date_created',
		'date_modified',
		'id_facture',
		'id_user',
	),
)); ?>
