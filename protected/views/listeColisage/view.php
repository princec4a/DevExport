<?php
/* @var $this ListeColisageController */
/* @var $model ListeColisage */

$this->breadcrumbs=array(
	'Liste Colisages'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ListeColisage', 'url'=>array('index')),
	array('label'=>'Create ListeColisage', 'url'=>array('create')),
	array('label'=>'Update ListeColisage', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ListeColisage', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ListeColisage', 'url'=>array('admin')),
);
?>

<h1>View ListeColisage #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'mumero',
		'client',
		'nom_navire',
		'pays_destination',
		'port_embarquement',
		'port_chargement',
		'destination_final',
	),
)); ?>
