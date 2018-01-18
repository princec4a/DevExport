<?php
/* @var $this ListeColisageController */
/* @var $model ListeColisage */

$this->breadcrumbs=array(
	'Liste Colisages'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'<i class="menu-icon fa fa-list-alt"></i> <span class="menu-text">Liste de colisage</span>', 'url'=>array('index')),
	//array('label'=>'Manage ListeColisage', 'url'=>array('admin')),
);
?>

<div class="page-header">
	<h1>Nouvelle Liste de colisage</h1>
</div>

<?php $this->renderPartial('_form', array('model'=>$model, 'detailListeColisages' => $detailListeColisages)); ?>