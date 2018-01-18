<?php
/* @var $this FactureController */
/* @var $model Facture */

$this->breadcrumbs=array(
	'Factures'=>array('index'),
	$model->numero=>array('view','id'=>$model->id),
	'Modification',
);

$this->menu=array(
	array('label'=>'<i class="menu-icon fa fa-list-alt"></i> <span class="menu-text">Liste de Factures</span>', 'url'=>array('index')),
	array('label'=>'<i class="menu-icon fa fa-floppy-o"></i> <span class="menu-text">Nouvel Factures</span>', 'url'=>array('create')),
	array('label'=>'<i class="menu-icon glyphicon glyphicon-list"></i> <span class="menu-text">Detail facture</span>', 'url'=>array('view', 'id'=>$model->id)),
	//array('label'=>'Manage Facture', 'url'=>array('admin')),
);
?>

<div class="page-header">
	<h1>Modification de la Facture N° <strong><?php echo $model->numero; ?></strong></h1>
</div>

<?php $this->renderPartial('_form', array('model'=>$model, 'detailFactures' => $detailFactures)); ?>