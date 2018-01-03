<?php
/* @var $this SortieConteneurController */
/* @var $model SortieConteneur */

$this->breadcrumbs=array(
	'Sortie Conteneurs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SortieConteneur', 'url'=>array('index')),
	array('label'=>'Create SortieConteneur', 'url'=>array('create')),
	array('label'=>'View SortieConteneur', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SortieConteneur', 'url'=>array('admin')),
);
?>

<h1>Update SortieConteneur <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>