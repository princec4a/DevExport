<?php
/* @var $this EntreeConteneurController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Entree Conteneurs',
);

$this->menu=array(
	array('label'=>'<i class="menu-icon fa fa-floppy-o"></i> <span class="menu-text">Nouvelle Entrée Conteneurs</span>', 'url'=>array('create')),
	array('label'=>'<i class="menu-icon fa fa-tachometer"></i> <span class="menu-text">Stat. Entrée Conteneurs</span>', 'url'=>array('statistiqueEntreeTC')),
	//array('label'=>'Manage EntreeConteneur', 'url'=>array('admin')),
);
?>

<div class="page-header">
	<h1 style="display: block; width: 83%; float: left;">Liste des Entrées Conteneurs</h1>
	<?=CHtml::beginForm(CHtml::normalizeUrl(array('entreeConteneur/index')), 'post', array('id'=>'filter-form', 'class'=>'form-search')); ?>
	<div class="input-group">
		<span class="input-group-btn">
			<?=CHtml::submitButton('Filtrer', array('name'=>'', 'class'=>'btn btn-sm btn-info')); ?>
		</span>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'date_entree_tc',
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

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
