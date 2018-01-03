<?php
/* @var $this EntreeConteneurController */
/* @var $model EntreeConteneur */

$this->breadcrumbs=array(
	'Entree Conteneurs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'<i class="menu-icon fa fa-list-alt"></i> <span class="menu-text">Liste des Entrées Conteneurs</span>', 'url'=>array('index')),
	array('label'=>'<i class="menu-icon fa fa-floppy-o"></i> <span class="menu-text">Nouvelle Entrée Conteneurs</span>', 'url'=>array('create')),
	array('label'=>'<i class="menu-icon glyphicon glyphicon-list"></i> <span class="menu-text">Detail Entrée Conteneurs</span>', 'url'=>array('view', 'id'=>$model->id)),
	//array('label'=>'Manage EntreeConteneur', 'url'=>array('admin')),
);
?>

<div class="page-header">
	<h1>Modification Entrée Conteneur <?php echo $model->numero; ?></h1>
</div>

<?php $this->renderPartial('_form', array('model'=>$model, 'error'=>$error)); ?>