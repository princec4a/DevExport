<?php
/* @var $this DetailBesoinController */
/* @var $model DetailBesoin */

$this->breadcrumbs=array(
	'Detail Besoins'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DetailBesoin', 'url'=>array('index')),
	array('label'=>'Manage DetailBesoin', 'url'=>array('admin')),
);
?>

<h1>Create DetailBesoin</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>