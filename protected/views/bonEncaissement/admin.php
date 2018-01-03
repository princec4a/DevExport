<?php
/* @var $this BonEncaissementController */
/* @var $model BonEncaissement */

$this->breadcrumbs=array(
	'Bon Encaissements'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List BonEncaissement', 'url'=>array('index')),
	array('label'=>'Create BonEncaissement', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#bon-encaissement-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Bon Encaissements</h1>

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
	'id'=>'bon-encaissement-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'numero',
		'date',
		'a_ordre',
		'motif',
		'montant',
		/*
		'accompte',
		'reste',
		'id_dossier',
		'date_created',
		'date_modified',
		'id_user',
		'id_caissier',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
