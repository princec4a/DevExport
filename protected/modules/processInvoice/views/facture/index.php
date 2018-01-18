<?php
/* @var $this FactureController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Factures',
);

$this->menu=array(
	array('label'=>'<i class="menu-icon fa fa-floppy-o"></i> <span class="menu-text">Nouvelle Facture</span>', 'url'=>array('create')),
	//array('label'=>'Manage Facture', 'url'=>array('admin')),
);
?>

<div class="page-header">
	<h1>Factures</h1>
</div>
<div class="clearfix"></div>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

