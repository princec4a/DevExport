<?php
/* @var $this BesoinController */
/* @var $model Besoin */

$this->breadcrumbs=array(
	'Besoins'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Besoin', 'url'=>array('index')),
	array('label'=>'Create Besoin', 'url'=>array('create')),
	array('label'=>'View Besoin', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Besoin', 'url'=>array('admin')),
);
?>

<h1>Update Besoin <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>