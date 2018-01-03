<?php
/* @var $this BonEncaissementController */
/* @var $model BonEncaissement */

$this->breadcrumbs=array(
	'Bon Encaissements'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'<i class="menu-icon fa fa-list-alt"></i> <span class="menu-text">Liste des Encaissement</span>', 'url'=>array('index')),
	//array('label'=>'Manage BonEncaissement', 'url'=>array('admin')),
);
?>

<div class="page-header">
	<h1>Nouvel Encaissement</h1>
</div>
<?php $this->renderPartial('_form', array('model'=>$model, 'error'=>$error)); ?>