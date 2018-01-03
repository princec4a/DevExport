<?php
/* @var $this DevisDController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Devis Ds',
);

$this->menu=array(
	array('label'=>'Create DevisD', 'url'=>array('create')),
	array('label'=>'Manage DevisD', 'url'=>array('admin')),
);
?>

<h1>Devis Ds</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
