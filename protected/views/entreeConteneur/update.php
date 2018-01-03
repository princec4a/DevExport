<?php
/* @var $this EntreeConteneurController */
/* @var $model EntreeConteneur */

$this->breadcrumbs=array(
	'Entree Conteneurs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List EntreeConteneur', 'url'=>array('index')),
	array('label'=>'Create EntreeConteneur', 'url'=>array('create')),
	array('label'=>'View EntreeConteneur', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage EntreeConteneur', 'url'=>array('admin')),
);
?>

<h1>Update EntreeConteneur <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>