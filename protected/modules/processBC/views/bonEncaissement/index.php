<?php
/* @var $this BonEncaissementController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Bon Encaissements'=>['#'],
	'Liste'
);

$this->menu=array(
	array('label'=>'<i class="menu-icon fa fa-floppy-o"></i> <span class="menu-text">Nouvel Encaissement</span>', 'url'=>array('create')),
	//array('label'=>'Manage BonEncaissement', 'url'=>array('admin')),
);
?>

<div class="page-header">
	<h1>Liste des Encaissements</h1>
</div>

<div class="clearfix"></div>

<div class="col-xs-12">
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
</div>
