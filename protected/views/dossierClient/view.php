<?php
/* @var $this DossierClientController */
/* @var $model DossierClient */

$this->breadcrumbs=array(
	'Dossier Clients'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List DossierClient', 'url'=>array('index')),
	array('label'=>'Create DossierClient', 'url'=>array('create')),
	array('label'=>'Update DossierClient', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete DossierClient', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DossierClient', 'url'=>array('admin')),
);
?>

<h1>View DossierClient #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'numero',
		'id_client',
		'id_devis_a',
		'id_devis_d',
		'num_tc',
		'nbr_conteneur',
		'num_de',
		'num_co',
		'num_expertise',
		'num_facture',
		'num_liste_colisage',
		'num_bsc',
		'num_booking',
		'date_created',
		'date_modified',
		'id_user',
	),
)); ?>
