<?php
/* @var $this DetailFactureController */
/* @var $model DetailFacture */

$this->breadcrumbs=array(
	'Detail Factures'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List DetailFacture', 'url'=>array('index')),
	array('label'=>'Create DetailFacture', 'url'=>array('create')),
	array('label'=>'View DetailFacture', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage DetailFacture', 'url'=>array('admin')),
);
?>

<h1>Update DetailFacture <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>