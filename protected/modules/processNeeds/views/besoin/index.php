<?php
/* @var $this BesoinController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Etat de Besoins',
);

$this->menu=array(
	array('label'=>'<i class="menu-icon fa fa-floppy-o"></i> <span class="menu-text">Nouvel Etat de Besoin</span>', 'url'=>array('create')),
	//array('label'=>'Manage Besoin', 'url'=>array('admin')),
);
?>

<div class="page-header">
	<h1>Etat de Besoins</h1>
</div>
<div class="clearfix"></div>

<div class="col-xs-12">
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
</div>
