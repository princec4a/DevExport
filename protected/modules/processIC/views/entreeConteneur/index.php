<?php
/* @var $this EntreeConteneurController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Entree Conteneurs',
);

$this->menu=array(
	array('label'=>'<i class="menu-icon fa fa-floppy-o"></i> <span class="menu-text">Nouvelle Entrée Conteneurs</span>', 'url'=>array('create')),
	//array('label'=>'Manage EntreeConteneur', 'url'=>array('admin')),
);
?>

<div class="page-header">
	<h1>Liste des Entrées Conteneurs</h1>
</div>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
