<?php
/* @var $this BonCaisseController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Bon de caisse'=>['#'],
	'Liste'
);

$this->menu=array(
	array('label'=>'<i class="menu-icon fa fa-floppy-o"></i> <span class="menu-text">Nouveau Bon de caisse</span>', 'url'=>array('create')),
	//array('label'=>'Manage BonCaisse', 'url'=>array('admin')),
);
?>

<div class="page-header">
	<h1>Liste des Bon de caisse</h1>
</div>

<div class="clearfix"></div>

<div class="col-xs-12">
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
</div>
