<?php
/* @var $this BesoinController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Besoins',
);

$this->menu=array(
	array('label'=>'Create Besoin', 'url'=>array('create')),
	array('label'=>'Manage Besoin', 'url'=>array('admin')),
);
?>

<h1>Besoins</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
