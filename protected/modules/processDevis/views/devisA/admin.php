<?php
/* @var $this DevisAController */
/* @var $model DevisA */

$this->breadcrumbs=array(
	'Devis As'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List DevisA', 'url'=>array('index')),
	array('label'=>'Create DevisA', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#devis-a-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Devis As</h1>

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
	'id'=>'devis-a-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'autorise_par',
		'montant',
		'bsc',
		'co',
		'de',
		/*
		'c_exp',
		'frais_saisie',
		'trans',
		'visa_dd',
		'visa_rtt',
		'visa_caissiere',
		'visa_dg',
		'date_created',
		'date_modified',
		'id_user',
		'numero',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
