<?php
/* @var $this ClientController */
/* @var $model Client */

$this->breadcrumbs=array(
	'Clients'=>array('index'),
	'Nouveau Dossier',
);

$this->menu=array(
	array('label'=>'<i class="menu-icon fa fa-list-alt"></i> <span class="menu-text">Liste des Dossiers</span>', 'url'=>array('index')),
	//array('label'=>'<i class="menu-icon fa fa-cog"></i> <span class="menu-text">Gerer les Dossiers</span>', 'url'=>array('admin')),
);
?>

<div class="page-header">
	<h1>
		<h1>Nouveau Dossier</h1>
	</h1>
</div>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>