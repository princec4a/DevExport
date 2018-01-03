<?php
/* @var $this DossierClientController */
/* @var $model DossierClient */

$this->breadcrumbs=array(
	'Dossier Clients'=>array('index'),
	'Créer',
);

$this->menu=array(
	array('label'=>'List DossierClient', 'url'=>array('index')),
	array('label'=>'Manage DossierClient', 'url'=>array('admin')),
);
?>

<h1>Create DossierClient</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>