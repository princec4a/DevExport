<?php
/* @var $this DetailListeColisageController */
/* @var $model DetailListeColisage */

$this->breadcrumbs=array(
	'Detail Liste Colisages'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List DetailListeColisage', 'url'=>array('index')),
	array('label'=>'Create DetailListeColisage', 'url'=>array('create')),
	array('label'=>'Update DetailListeColisage', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete DetailListeColisage', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DetailListeColisage', 'url'=>array('admin')),
);
?>

<h1>View DetailListeColisage #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'description_materiel',
		'conteneur',
		'poids_brut',
		'poids_net',
		'date_created',
		'date_modified',
		'id_user',
		'id_liste_colisage',
	),
)); ?>
