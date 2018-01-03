<?php
/* @var $this BesoinController */
/* @var $model Besoin */

$this->breadcrumbs=array(
	'Etat de Besoins'=>array('index'),
	'Nouveau',
);

$this->menu=array(
	array('label'=>'<i class="menu-icon fa fa-list-alt"></i> <span class="menu-text">List Etat de Besoins</span>', 'url'=>array('index')),
	//array('label'=>'Manage Besoin', 'url'=>array('admin')),
);
?>


<div class="page-header">
	<h1>Nouvel Etat de Besoins</h1>
</div>
<?php $this->renderPartial('_form', array('model'=>$model, 'detailBesoins' => $detailBesoins)); ?>