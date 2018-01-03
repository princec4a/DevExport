<?php
/* @var $this DevisAController */
/* @var $model DevisA */

$this->breadcrumbs=array(
	'Devis As'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List DevisA', 'url'=>array('index')),
	array('label'=>'Create DevisA', 'url'=>array('create')),
	array('label'=>'View DevisA', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage DevisA', 'url'=>array('admin')),
);
?>

<h1>Update DevisA <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>