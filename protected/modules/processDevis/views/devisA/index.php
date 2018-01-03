<?php
/* @var $this DevisAController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Devis Administratif'=>['#'],
	'Liste'
);

$this->menu=array(
	array('label'=>'<i class="menu-icon fa fa-floppy-o"></i> <span class="menu-text">Nouveau Devis A</span>', 'url'=>array('create')),
	//array('label'=>'Manage DevisA', 'url'=>array('admin')),
);
?>

<div class="page-header">
	<h1>Devis Administratifs</h1>
</div>
<div class="clearfix"></div>

<div class="col-xs-12">
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
</div>