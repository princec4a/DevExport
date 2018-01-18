<?php
/* @var $this ListeColisageController */
/* @var $model ListeColisage */

$this->breadcrumbs=array(
	'Liste Colisages'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ListeColisage', 'url'=>array('index')),
	array('label'=>'Manage ListeColisage', 'url'=>array('admin')),
);
?>

<h1>Create ListeColisage</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>