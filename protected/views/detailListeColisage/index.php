<?php
/* @var $this DetailListeColisageController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Detail Liste Colisages',
);

$this->menu=array(
	array('label'=>'Create DetailListeColisage', 'url'=>array('create')),
	array('label'=>'Manage DetailListeColisage', 'url'=>array('admin')),
);
?>

<h1>Detail Liste Colisages</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
