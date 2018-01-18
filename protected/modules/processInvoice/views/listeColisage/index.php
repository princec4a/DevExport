<?php
/* @var $this ListeColisageController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Liste Colisages',
);

$this->menu=array(
	array('label'=>'<i class="menu-icon fa fa-floppy-o"></i> <span class="menu-text">Nouvelle Liste de colisge</span>', 'url'=>array('create')),
	//array('label'=>'Manage ListeColisage', 'url'=>array('admin')),
);
?>


<div class="page-header">
	<h1>Liste Colisages</h1>
</div>
<div class="clearfix"></div>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
