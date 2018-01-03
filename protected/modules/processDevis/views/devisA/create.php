<?php
/* @var $this DevisAController */
/* @var $model DevisA */

$this->breadcrumbs=array(
	'Devis Administratif'=>array('index'),
	'Nouveau',
);

$this->menu=array(
	array('label'=>'<i class="menu-icon fa fa-list-alt"></i> <span class="menu-text">List DevisA</span>	', 'url'=>array('index')),
	//array('label'=>'Manage DevisA', 'url'=>array('admin')),
);
?>

<div class="page-header">
		<h1>Nouveau Devis Administratif</h1>
</div>

<?php $this->renderPartial('_form', array('model'=>$model, 'error'=>$error)); ?>