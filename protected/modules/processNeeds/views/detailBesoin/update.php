<?php
/* @var $this DetailBesoinController */
/* @var $model DetailBesoin */

$this->breadcrumbs=array(
	'Detail Besoins'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List DetailBesoin', 'url'=>array('index')),
	array('label'=>'Create DetailBesoin', 'url'=>array('create')),
	array('label'=>'View DetailBesoin', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage DetailBesoin', 'url'=>array('admin')),
);
?>

<h1>Update DetailBesoin <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>