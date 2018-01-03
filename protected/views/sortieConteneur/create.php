<?php
/* @var $this SortieConteneurController */
/* @var $model SortieConteneur */

$this->breadcrumbs=array(
	'Sortie Conteneurs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SortieConteneur', 'url'=>array('index')),
	array('label'=>'Manage SortieConteneur', 'url'=>array('admin')),
);
?>

<h1>Create SortieConteneur</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>