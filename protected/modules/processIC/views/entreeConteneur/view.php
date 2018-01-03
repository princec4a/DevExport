<?php
/* @var $this EntreeConteneurController */
/* @var $model EntreeConteneur */

$this->breadcrumbs=array(
	'Entree Conteneurs'=>array('index'),
	$model->numero,
);

$this->menu=array(
	array('label'=>'<i class="menu-icon fa fa-list-alt"></i> <span class="menu-text">Lister des Entrées Conteneurs</span>', 'url'=>array('index')),
	array('label'=>'<i class="menu-icon fa fa-floppy-o"></i> <span class="menu-text">Nouvelle Entrée Conteneurs</span>', 'url'=>array('create')),
	array('label'=>'<i class="menu-icon fa fa-pencil-square-o"></i> <span class="menu-text">Modifier Entrée Conteneurs</span>', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'<i class="menu-icon fa fa-trash-o"></i> <span class="menu-text">Supprimer Entrée Conteneurs</span>', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Êtes vous sur de vouloir modifier cet élément?')),
	//array('label'=>'Manage EntreeConteneur', 'url'=>array('admin')),
);
?>

<div class="page-header">
	<h1>
		Entrée Conteneurs N° <strong><?php echo $model->numero; ?></strong>
	</h1>
</div>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		//'numero',
		'date_livraison',
		'chauffeur',
		'site',
		'heure_fin_empotage',
		'num_plomb',
		'poid_brut',
		'poid_reel',
		/*'date_created',
		'date_modified',
		'id_user',*/
	),
)); ?>
