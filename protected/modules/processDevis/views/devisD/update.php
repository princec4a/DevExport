<?php
/* @var $this DevisDController */
/* @var $model DevisD */

$this->breadcrumbs=array(
	'Devis Ds'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List DevisD', 'url'=>array('index')),
	array('label'=>'Create DevisD', 'url'=>array('create')),
	array('label'=>'View DevisD', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage DevisD', 'url'=>array('admin')),
);
?>

<h1>Update DevisD <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>