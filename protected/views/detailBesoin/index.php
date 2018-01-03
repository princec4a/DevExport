<?php
/* @var $this DetailBesoinController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Detail Besoins',
);

$this->menu=array(
	array('label'=>'Create DetailBesoin', 'url'=>array('create')),
	array('label'=>'Manage DetailBesoin', 'url'=>array('admin')),
);
?>

<h1>Detail Besoins</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
