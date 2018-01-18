<?php
/* @var $this FactureController */
/* @var $model Facture */

$this->breadcrumbs=array(
	'Factures'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Facture', 'url'=>array('index')),
	array('label'=>'Manage Facture', 'url'=>array('admin')),
);
?>

<h1>Create Facture</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>