<?php
/* @var $this SortieConteneurController */
/* @var $model SortieConteneur */

$this->breadcrumbs=array(
	'Sortie Conteneurs'=>array('index'),
	$model->numero,
);

$this->menu=array(
	array('label'=>'<i class="menu-icon fa fa-list-alt"></i> <span class="menu-text">Lister des Sorties Conteneurs</span>', 'url'=>array('index')),
	array('label'=>'<i class="menu-icon fa fa-floppy-o"></i> <span class="menu-text">Nouvelle Sortie Conteneurs</span>', 'url'=>array('create')),
	array('label'=>'<i class="menu-icon fa fa-pencil-square-o"></i> <span class="menu-text">Modifier Sortie Conteneurs</span>', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'<i class="menu-icon fa fa-trash-o"></i> <span class="menu-text">Supprimer la Sortie Conteneurs</span>', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage SortieConteneur', 'url'=>array('admin')),
);
?>

<div class="page-header">
	<h1>
		Sortie Conteneurs N° <strong><?php echo $model->numero; ?></strong>
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			booking : <strong><?php echo $model->num_booking; ?></strong>
		</small>
	</h1>
</div>


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		//'numero',
		'num_booking',
		array(
			'label' => 'Sortie le',
			'type'=>'raw',
			'value' =>$model->date_sortie_tc,
		),
		array(
			'label' => 'N° TC',
			'type'=>'raw',
			'value' =>$model->num_tc.' de '.TypeTc::model()->findByPk($model->id_type_tc)->libelle,
		),
		'site',
		'num_eir',
		array(
			'label' => 'Etat',
			'type'=>'raw',
			'value' =>EtatTc::model()->findByPk($model->etat)->libelle,
		),
		'client',
		array(
			'label' => 'N° Bon',
			'type'=>'raw',
			'value' => $model->num_bon_sortie.' - <b>'.TypeBon::model()->findByPk($model->id_type_bon)->libelle.'</b>',
		),
		/*'date_created',
		'date_modified',
		'id_user',
		'id_dossier',*/
	),
)); ?>
