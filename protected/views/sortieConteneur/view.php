<?php
/* @var $this SortieConteneurController */
/* @var $model SortieConteneur */

$this->breadcrumbs=array(
	'Sortie Conteneurs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SortieConteneur', 'url'=>array('index')),
	array('label'=>'Create SortieConteneur', 'url'=>array('create')),
	array('label'=>'Update SortieConteneur', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SortieConteneur', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SortieConteneur', 'url'=>array('admin')),
);
?>

<h1>View SortieConteneur #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'numero',
		'num_booking',
		'navire_prevu',
		'port_destination',
		'num_tc',
		'num_bon_sortie',
		'date_livraison_tc',
		'immatriculation',
		'poids',
		'date_created',
		'date_modified',
		'id_user',
		'id_dossier',
	),
)); ?>
