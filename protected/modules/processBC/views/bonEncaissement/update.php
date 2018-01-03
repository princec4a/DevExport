<?php
/* @var $this BonEncaissementController */
/* @var $model BonEncaissement */

$this->breadcrumbs=array(
	'Bon Encaissements'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'<i class="menu-icon fa fa-list-alt"></i> <span class="menu-text">Liste des Encaissements</span>', 'url'=>array('index')),
	array('label'=>'<i class="menu-icon fa fa-floppy-o"></i> <span class="menu-text">Nouvel Encaissement</span>', 'url'=>array('create')),
	array('label'=>'<i class="menu-icon glyphicon glyphicon-list"></i> <span class="menu-text">Detail Encaissement</span>', 'url'=>array('view', 'id'=>$model->id)),
	//array('label'=>'Manage BonEncaissement', 'url'=>array('admin')),
);
?>

<div class="page-header">
	<h1>Modification Encaissement <?php echo $model->numero; ?></h1>
</div>

<?php $this->renderPartial('_form', array('model'=>$model, 'error'=>$error)); ?>