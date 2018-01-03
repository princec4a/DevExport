<?php
/* @var $this BonCaisseController */
/* @var $model BonCaisse */

$this->breadcrumbs=array(
	'Bon Caisses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'<i class="menu-icon fa fa-list-alt"></i> <span class="menu-text">Liste Bon de Caisse</span>', 'url'=>array('index')),
	array('label'=>'<i class="menu-icon fa fa-floppy-o"></i> <span class="menu-text">Nouveau Bon de Caisse</span>', 'url'=>array('create')),
	array('label'=>'<i class="menu-icon glyphicon glyphicon-list"></i> <span class="menu-text">Detail Bon de Caisse</span>', 'url'=>array('view', 'id'=>$model->id)),
	//array('label'=>'Manage BonCaisse', 'url'=>array('admin')),
);
?>

<div class="page-header">
	<h1>Modification BonCaisse <?php echo $model->numero; ?></h1>
</div>


<?php $this->renderPartial('_form', array('model'=>$model, 'error'=>$error)); ?>