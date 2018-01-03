<?php
/* @var $this BonCaisseController */
/* @var $model BonCaisse */

$this->breadcrumbs=array(
	'Bon Caisse'=>array('index'),
	'Nouveau',
);

$this->menu=array(
	array('label'=>'<i class="menu-icon fa fa-list-alt"></i> <span class="menu-text">Liste des Bons de Caisse</span>', 'url'=>array('index')),
	//array('label'=>'<i class="menu-icon fa fa-cog"></i> <span class="menu-text">Gerer les Dossiers</span>', 'url'=>array('admin')),
	)
?>

<div class="page-header">
	<h1>Nouveau Sortie Caisse</h1>
</div>

<?php $this->renderPartial('_form', array('model'=>$model, 'error'=>$error)); ?>