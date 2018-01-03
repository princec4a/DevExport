<?php
/* @var $this BonCaisseController */
/* @var $model BonCaisse */

$this->breadcrumbs=array(
	'Bon Caisses'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List BonCaisse', 'url'=>array('index')),
	array('label'=>'Create BonCaisse', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#bon-caisse-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Bon Caisses</h1>

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
	'id'=>'bon-caisse-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'date',
		'a_ordre',
		'motif',
		'montant',
		'transport',
		/*
		'visa_caissier',
		'visa_interesse',
		'id_devis_a',
		'id_devis_d',
		'date_created',
		'date_modified',
		'id_user',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
