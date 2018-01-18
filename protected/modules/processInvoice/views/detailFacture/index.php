<?php
/* @var $this DetailFactureController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Detail Factures',
);

$this->menu=array(
	array('label'=>'Create DetailFacture', 'url'=>array('create')),
	array('label'=>'Manage DetailFacture', 'url'=>array('admin')),
);
?>

<h1>Detail Factures</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
