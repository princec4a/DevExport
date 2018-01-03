<?php
/* @var $this DevisDController */
/* @var $model DevisD */

$this->breadcrumbs=array(
	'Devis Douane'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'<i class="menu-icon fa fa-list-alt"></i> <span class="menu-text">Lister les devis douanes</span>', 'url'=>array('index')),
	array('label'=>'<i class="menu-icon fa fa-floppy-o"></i> <span class="menu-text">Nouveau devis douanes</span>', 'url'=>array('create')),
);

/*
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#devis-d-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
*/
?>
<div class="page-header">
	<h1>Gérer les devis douanes</h1>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'devis-d-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'autorise_par',
		'montant',
		'dd',
		'tel_i',
		'tr',
		/*
		'frais_saisie_btf',
		'sortie_tc_d',
		'visa_dd',
		'visa_rtt',
		'visa_caissiere',
		'visa_dg',
		'numero',
		'date_created',
		'date_modified',
		'id_user',
		'id_devis_a',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
