<?php
/* @var $this DossierClientController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Dossier Clients',
);

$this->menu=array(
	array('label'=>'Create DossierClient', 'url'=>array('create')),
	array('label'=>'Manage DossierClient', 'url'=>array('admin')),
);
?>

<h1>Dossier Clients</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
