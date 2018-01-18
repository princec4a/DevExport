<?php
/* @var $this DetailListeColisageController */
/* @var $model DetailListeColisage */

$this->breadcrumbs=array(
	'Detail Liste Colisages'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List DetailListeColisage', 'url'=>array('index')),
	array('label'=>'Create DetailListeColisage', 'url'=>array('create')),
	array('label'=>'View DetailListeColisage', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage DetailListeColisage', 'url'=>array('admin')),
);
?>

<h1>Update DetailListeColisage <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>