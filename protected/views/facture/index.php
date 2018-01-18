<?php
/* @var $this FactureController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Factures',
);

$this->menu=array(
	array('label'=>'Create Facture', 'url'=>array('create')),
	array('label'=>'Manage Facture', 'url'=>array('admin')),
);
?>

<h1>Factures</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
