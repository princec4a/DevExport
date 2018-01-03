<?php
/* @var $this DevisDController */
/* @var $model DevisD */

$this->breadcrumbs=array(
	'Devis Ds'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DevisD', 'url'=>array('index')),
	array('label'=>'Manage DevisD', 'url'=>array('admin')),
);
?>

<h1>Create DevisD</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>