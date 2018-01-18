<?php
/* @var $this ListeColisageController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Liste Colisages',
);

$this->menu=array(
	array('label'=>'Create ListeColisage', 'url'=>array('create')),
	array('label'=>'Manage ListeColisage', 'url'=>array('admin')),
);
?>

<h1>Liste Colisages</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
