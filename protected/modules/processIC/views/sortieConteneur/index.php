<?php
/* @var $this SortieConteneurController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Sortie Conteneurs'=>['#'],
	'Liste'
);

$this->menu=array(
	array('label'=>'<i class="menu-icon fa fa-floppy-o"></i> <span class="menu-text">Nouvelle Sortie Conteneurs</span>', 'url'=>array('create')),
	//array('label'=>'Manage SortieConteneur', 'url'=>array('admin')),
);
?>

<div class="page-header">
	<h1>Liste des Sorties Conteneurs</h1>
</div>

<div class="clearfix"></div>

<div class="col-xs-12">
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
</div>