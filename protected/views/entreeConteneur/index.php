<?php
/* @var $this EntreeConteneurController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Entree Conteneurs',
);

$this->menu=array(
	array('label'=>'Create EntreeConteneur', 'url'=>array('create')),
	array('label'=>'Manage EntreeConteneur', 'url'=>array('admin')),
);
?>

<h1>Entree Conteneurs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
