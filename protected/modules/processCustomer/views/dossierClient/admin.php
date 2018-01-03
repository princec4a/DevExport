<?php
/* @var $this DossierClientController */
/* @var $model DossierClient */

$this->breadcrumbs=array(
	'Dossier Clients'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List DossierClient', 'url'=>array('index')),
	array('label'=>'Create DossierClient', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#dossier-client-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Dossier Clients</h1>

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
	'id'=>'dossier-client-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_client',
		'num_booking',
		'num_bon_commande',
		/*'id_devis_a',
		'id_devis_d',
		'num_tc',
		'nbr_conteneur',
		'num_de',
		'num_co',
		'num_expertise',
		'num_facture',
		'num_liste_colisage',
		'num_bsc',
		'num_booking',
		'date_created',
		'date_modified',
		'id_user',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
