<?php
/* @var $this DetailListeColisageController */
/* @var $model DetailListeColisage */

$this->breadcrumbs=array(
	'Detail Liste Colisages'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List DetailListeColisage', 'url'=>array('index')),
	array('label'=>'Create DetailListeColisage', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#detail-liste-colisage-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Detail Liste Colisages</h1>

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
	'id'=>'detail-liste-colisage-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'description_materiel',
		'conteneur',
		'poids_brut',
		'poids_net',
		'date_created',
		/*
		'date_modified',
		'id_user',
		'id_liste_colisage',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
