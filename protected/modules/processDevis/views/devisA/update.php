<?php
/* @var $this DevisAController */
/* @var $model DevisA */

$this->breadcrumbs=array(
	'Devis Administratif'=>array('index'),
	$model->numero=>array('view','id'=>$model->id),
	'Modification',
);

$this->menu=array(
	array('label'=>'<i class="menu-icon fa fa-list-alt"></i> <span class="menu-text">Liste Devis A</span>', 'url'=>array('index')),
	array('label'=>'<i class="menu-icon fa fa-floppy-o"></i> <span class="menu-text">Nouveau Devis A</span>', 'url'=>array('create')),
	array('label'=>'<i class="menu-icon glyphicon glyphicon-list"></i> <span class="menu-text">Detail Devis A</span>', 'url'=>array('view', 'id'=>$model->id)),
	//array('label'=>'Manage DevisA', 'url'=>array('admin')),
);
?>

<div class="page-header">
	<h1>Modification du DevisA N° <strong><?php echo $model->numero; ?></strong></h1>
</div>

<?php $this->renderPartial('_form', array('model'=>$model, 'error'=>$error)); ?>