<?php
/* @var $this BesoinController */
/* @var $model Besoin */

$this->breadcrumbs=array(
	'Besoins'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Besoin', 'url'=>array('index')),
	array('label'=>'Manage Besoin', 'url'=>array('admin')),
);
?>

<h1>Create Besoin</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>