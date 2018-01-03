<?php
/* @var $this BonEncaissementController */
/* @var $model BonEncaissement */

$this->breadcrumbs=array(
	'Bon Encaissements'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List BonEncaissement', 'url'=>array('index')),
	array('label'=>'Manage BonEncaissement', 'url'=>array('admin')),
);
?>

<h1>Create BonEncaissement</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>