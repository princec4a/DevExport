<?php
/* @var $this FactureController */
/* @var $model Facture */

$this->breadcrumbs=array(
	'Factures'=>array('index'),
	'Nouveau',
);

$this->menu=array(
	array('label'=>'<i class="menu-icon fa fa-list-alt"></i> <span class="menu-text">Liste Facture</span>', 'url'=>array('index')),
	//array('label'=>'Manage Facture', 'url'=>array('admin')),
);
?>

<div class="page-header">
	<h1>Nouvel Facture</h1>
</div>

<?php $this->renderPartial('_form', array('model'=>$model, 'detailFactures' => $detailFactures)); ?>