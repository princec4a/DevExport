<?php
/* @var $this EntreeConteneurController */
/* @var $model EntreeConteneur */

$this->breadcrumbs=array(
	'Entree Conteneurs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EntreeConteneur', 'url'=>array('index')),
	array('label'=>'Manage EntreeConteneur', 'url'=>array('admin')),
);
?>

<h1>Create EntreeConteneur</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>