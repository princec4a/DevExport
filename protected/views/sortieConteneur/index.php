<?php
/* @var $this SortieConteneurController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Sortie Conteneurs',
);

$this->menu=array(
	array('label'=>'Create SortieConteneur', 'url'=>array('create')),
	array('label'=>'Manage SortieConteneur', 'url'=>array('admin')),
);
?>

<h1>Sortie Conteneurs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
