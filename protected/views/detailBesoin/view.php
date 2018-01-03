<?php
/* @var $this DetailBesoinController */
/* @var $model DetailBesoin */

$this->breadcrumbs=array(
	'Detail Besoins'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List DetailBesoin', 'url'=>array('index')),
	array('label'=>'Create DetailBesoin', 'url'=>array('create')),
	array('label'=>'Update DetailBesoin', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete DetailBesoin', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DetailBesoin', 'url'=>array('admin')),
);
?>

<h1>View DetailBesoin #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'libelle',
		'quantite',
		'id_besoin',
	),
)); ?>
