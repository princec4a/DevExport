<?php
/* @var $this EntreeConteneurController */
/* @var $model EntreeConteneur */

$this->breadcrumbs=array(
	'Entree Conteneurs'=>array('index'),
	'Nouveau',
);

$this->menu=array(
	array('label'=>'<i class="menu-icon fa fa-list-alt"></i> <span class="menu-text">Liste des Entrées Conteneurs</span>', 'url'=>array('index')),
	//array('label'=>'Manage EntreeConteneur', 'url'=>array('admin')),
);
?>
<div class="page-header">
	<h1>Nouvelle Entrée Conteneurs</h1>
</div>

<?php $this->renderPartial('_form', array('model'=>$model, 'error'=>$error)); ?>