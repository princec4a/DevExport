<?php
/* @var $this DevisAController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Devis As',
);

$this->menu=array(
	array('label'=>'Create DevisA', 'url'=>array('create')),
	array('label'=>'Manage DevisA', 'url'=>array('admin')),
);
?>

<h1>Devis As</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
