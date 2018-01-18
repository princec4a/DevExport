<?php
/* @var $this ListeColisageController */
/* @var $model ListeColisage */

$this->breadcrumbs=array(
	'Liste Colisages'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ListeColisage', 'url'=>array('index')),
	array('label'=>'Create ListeColisage', 'url'=>array('create')),
	array('label'=>'View ListeColisage', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ListeColisage', 'url'=>array('admin')),
);
?>

<h1>Update ListeColisage <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'detailListeColisages' => $detailListeColisages)); ?>