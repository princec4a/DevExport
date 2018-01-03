<?php
/* @var $this BonEncaissementController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Bon Encaissements',
);

$this->menu=array(
	array('label'=>'Create BonEncaissement', 'url'=>array('create')),
	array('label'=>'Manage BonEncaissement', 'url'=>array('admin')),
);
?>

<h1>Bon Encaissements</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
