<?php
/* @var $this DevisDController */
/* @var $model DevisD */

$this->breadcrumbs=array(
	'Devis Douane'=>array('index'),
	'Nouveau',
);

$this->menu=array(
	array('label'=>'<i class="menu-icon fa fa-list-alt"></i> <span class="menu-text">List Devis D</span>', 'url'=>array('index')),
	//array('label'=>'Manage DevisD', 'url'=>array('admin')),
);
?>

<div class="page-header">
		<h1>Nouveau Devis Douane</h1>
</div>

<?php $this->renderPartial('_form', array('model'=>$model, 'error'=>$error)); ?>