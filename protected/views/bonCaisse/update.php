<?php
/* @var $this BonCaisseController */
/* @var $model BonCaisse */

$this->breadcrumbs=array(
	'Bon Caisses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List BonCaisse', 'url'=>array('index')),
	array('label'=>'Create BonCaisse', 'url'=>array('create')),
	array('label'=>'View BonCaisse', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage BonCaisse', 'url'=>array('admin')),
);
?>

<h1>Update BonCaisse <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>