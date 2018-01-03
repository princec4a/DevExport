<?php
/* @var $this SortieConteneurController */
/* @var $model SortieConteneur */

$this->breadcrumbs=array(
	'Sortie Conteneurs'=>array('index'),
	'Nouveau',
);

$this->menu=array(
	array('label'=>'<i class="menu-icon fa fa-list-alt"></i> <span class="menu-text">Liste des Sorties Conteneurs</span>', 'url'=>array('index')),
	//array('label'=>'Manage SortieConteneur', 'url'=>array('admin')),
);
?>

<div class="page-header">
	<h1>Nouvelle Sortie Conteneurs</h1>
</div>

<?php $this->renderPartial('_form', array('model'=>$model, 'error'=>$error)); ?>