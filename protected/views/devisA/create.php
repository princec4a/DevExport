<?php
/* @var $this DevisAController */
/* @var $model DevisA */

$this->breadcrumbs=array(
	'Devis As'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DevisA', 'url'=>array('index')),
	array('label'=>'Manage DevisA', 'url'=>array('admin')),
);
?>

<h1>Create DevisA</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>