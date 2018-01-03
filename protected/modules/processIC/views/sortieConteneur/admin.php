<?php
/* @var $this SortieConteneurController */
/* @var $model SortieConteneur */

$this->breadcrumbs=array(
	'Sortie Conteneurs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List SortieConteneur', 'url'=>array('index')),
	array('label'=>'Create SortieConteneur', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#sortie-conteneur-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Sortie Conteneurs</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'sortie-conteneur-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'numero',
		'num_booking',
		'navire_prevu',
		'port_destination',
		'num_tc',
		/*
		'num_bon_sortie',
		'date_livraison_tc',
		'immatriculation',
		'poids',
		'date_created',
		'date_modified',
		'id_user',
		'id_dossier',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
