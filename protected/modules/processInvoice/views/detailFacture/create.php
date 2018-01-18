<?php
/* @var $this DetailFactureController */
/* @var $model DetailFacture */

$this->breadcrumbs=array(
	'Detail Factures'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DetailFacture', 'url'=>array('index')),
	array('label'=>'Manage DetailFacture', 'url'=>array('admin')),
);
?>

<h1>Create DetailFacture</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>