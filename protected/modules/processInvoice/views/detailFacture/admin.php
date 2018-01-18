<?php
/* @var $this DetailFactureController */
/* @var $model DetailFacture */

$this->breadcrumbs=array(
	'Detail Factures'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List DetailFacture', 'url'=>array('index')),
	array('label'=>'Create DetailFacture', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#detail-facture-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Detail Factures</h1>

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
	'id'=>'detail-facture-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'description_materiel',
		'conteneur',
		'poids_net',
		'taux',
		'montant',
		/*
		'date_created',
		'date_modified',
		'id_facture',
		'id_user',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
