<?php
/* @var $this EntreeConteneurController */
/* @var $model EntreeConteneur */

$this->breadcrumbs=array(
	'Entree Conteneurs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List EntreeConteneur', 'url'=>array('index')),
	array('label'=>'Create EntreeConteneur', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#entree-conteneur-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Entree Conteneurs</h1>

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
	'id'=>'entree-conteneur-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'numero',
		'date_livraison',
		'chauffeur',
		'site',
		'heure_fin_empotage',
		/*
		'num_plomb',
		'poid_brut',
		'poid_reel',
		'id_sortie_conteneur',
		'date_created',
		'date_modified',
		'id_user',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
