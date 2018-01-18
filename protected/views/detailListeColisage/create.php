<?php
/* @var $this DetailListeColisageController */
/* @var $model DetailListeColisage */

$this->breadcrumbs=array(
	'Detail Liste Colisages'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DetailListeColisage', 'url'=>array('index')),
	array('label'=>'Manage DetailListeColisage', 'url'=>array('admin')),
);
?>

<h1>Create DetailListeColisage</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>