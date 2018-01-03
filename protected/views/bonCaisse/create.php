<?php
/* @var $this BonCaisseController */
/* @var $model BonCaisse */

$this->breadcrumbs=array(
	'Bon Caisses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List BonCaisse', 'url'=>array('index')),
	array('label'=>'Manage BonCaisse', 'url'=>array('admin')),
);
?>

<h1>Create BonCaisse</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>