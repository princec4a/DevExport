<?php
/* @var $this BonCaisseController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Bon Caisses',
);

$this->menu=array(
	array('label'=>'Create BonCaisse', 'url'=>array('create')),
	array('label'=>'Manage BonCaisse', 'url'=>array('admin')),
);
?>

<h1>Bon Caisses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
