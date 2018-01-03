<?php
/* @var $this DossierClientController */
/* @var $model DossierClient */

$this->breadcrumbs=array(
	'Dossier Clients'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List DossierClient', 'url'=>array('index')),
	array('label'=>'Create DossierClient', 'url'=>array('create')),
	array('label'=>'View DossierClient', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage DossierClient', 'url'=>array('admin')),
);
?>

<h1>Update DossierClient <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>