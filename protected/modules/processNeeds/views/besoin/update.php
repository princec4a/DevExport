<?php
/* @var $this BesoinController */
/* @var $model Besoin */

$this->breadcrumbs=array(
	'Besoins'=>array('index'),
	$model->numero=>array('view','id'=>$model->id),
	'Modification',
);

$this->menu=array(
	array('label'=>'<i class="menu-icon fa fa-list-alt"></i> <span class="menu-text">Liste Etat de Besoins</span>', 'url'=>array('index')),
	array('label'=>'<i class="menu-icon fa fa-floppy-o"></i> <span class="menu-text">Nouvel Etat de Besoins</span>', 'url'=>array('create')),
	array('label'=>'<i class="menu-icon glyphicon glyphicon-list"></i> <span class="menu-text">Detail Etat de Besoins</span>', 'url'=>array('view', 'id'=>$model->id)),
	//array('label'=>'Manage Besoin', 'url'=>array('admin')),
);
?>

<div class="page-header">
	<h1>Modification de Etat de Besoin N° <strong><?php echo $model->numero; ?></strong></h1>
</div>

<?php $this->renderPartial('_form', array('model'=>$model, 'detailBesoins' => $detailBesoins)); ?>