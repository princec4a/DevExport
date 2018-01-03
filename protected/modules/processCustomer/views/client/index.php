<?php
/* @var $this ClientController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Clients'=>array('#'),
	'Liste des Dossiers',
);

$this->menu=array(
	array('label'=>'<i class="menu-icon fa fa-floppy-o"></i> <span class="menu-text">Nouveau Dossier</span>', 'url'=>array('create')),
	//array('label'=>'<i class="menu-icon fa fa-cog"></i> <span class="menu-text">Gerer les Dossiers</span>', 'url'=>array('admin')),
);
?>

<div class="page-header">
	<h1>Clients</h1>
</div>
<div class="clearfix"></div>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'pager' => array(
		'firstPageLabel' => '<<',
		'lastPageLabel' => '>>',
		'prevPageLabel' => '<',
		'nextPageLabel' => '>',
		'nextPageCssClass' => 'paginate_button next',
		'previousPageCssClass' => 'ClassName',
		'selectedPageCssClass' => 'paginate_button active',
		'internalPageCssClass' => 'ClassName',
	),
	'pagerCssClass' => 'pagination'
)); ?>
<div class="clearfix"></div>
