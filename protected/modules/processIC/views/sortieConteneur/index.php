<?php
/* @var $this SortieConteneurController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Sortie Conteneurs'=>['#'],
	'Liste'
);

$this->menu=array(
	array('label'=>'<i class="menu-icon fa fa-floppy-o"></i> <span class="menu-text">Nouvelle Sortie Conteneurs</span>', 'url'=>array('create')),
	array('label'=>'<i class="menu-icon fa fa-tachometer"></i> <span class="menu-text">Stat. Sortie Conteneurs</span>', 'url'=>array('statistiqueSortieTC')),
	//array('label'=>'Manage SortieConteneur', 'url'=>array('admin')),
);
?>
<?php /**/?>
<div class="page-header">
	<h1 style="display: block; width: 83%; float: left;">Liste des Sorties Conteneurs</h1>
	<?=CHtml::beginForm(CHtml::normalizeUrl(array('sortieConteneur/index')), 'post', array('id'=>'filter-form', 'class'=>'form-search')); ?>
	<div class="input-group">
		<span class="input-group-btn">
			<?=CHtml::submitButton('Filtrer', array('name'=>'', 'class'=>'btn btn-sm btn-info')); ?>
		</span>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'date_sortie_tc',
			'options' => array(
				'showAnim' => 'fold',
				'dateFormat' => 'dd-mm-yy',
			),
			'htmlOptions' => array(
				'class'=>'',
			),
		)); ?>
	<?=CHtml::endForm();	?>
	</div>
	<div class="clearfix"></div>
</div>

<div class="clearfix"></div>

<div class="col-xs-12">
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
</div>