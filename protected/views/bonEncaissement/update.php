<?php
/* @var $this BonEncaissementController */
/* @var $model BonEncaissement */

$this->breadcrumbs=array(
	'Bon Encaissements'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List BonEncaissement', 'url'=>array('index')),
	array('label'=>'Create BonEncaissement', 'url'=>array('create')),
	array('label'=>'View BonEncaissement', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage BonEncaissement', 'url'=>array('admin')),
);
?>

<h1>Update BonEncaissement <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>