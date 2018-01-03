<?php
/* @var $this ClientController */
/* @var $model Client */
/* @var $dossier DossierClient */

$this->breadcrumbs=array(
	'Clients'=>array('index'),
	$model->code=>array('view','id'=>$model->id, 'do'=>$dossier->id),
	'Modification',
);

$this->menu=array(
	array('label'=>'<i class="menu-icon fa fa-list-alt"></i> <span class="menu-text">Liste des Dossiers</span>', 'url'=>array('index')),
	array('label'=>'<i class="menu-icon fa fa-floppy-o"></i> <span class="menu-text">Nouveau Dossier</span>', 'url'=>array('create')),
	array('label'=>'<i class="menu-icon glyphicon glyphicon-list"></i> <span class="menu-text">Detail Dossier</span>', 'url'=>array('view', 'id'=>$model->id, 'do'=>$dossier->id)),
	//array('label'=>'<i class="menu-icon fa fa-cog"></i> <span class="menu-text">Gerer les Dossiers</span>', 'url'=>array('admin')),
);
?>

<div class="page-header">
	<h1>
		Modification du Dossier du client : <strong><?php echo $model->nom.' '.$model->prenom; ?></strong>
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			<?php if($model->loadEtatDossier($model->primaryKey) == "En attente du booking"): ?>
				<span class="label label-sm label-danger"><?php echo $model->loadEtatDossier($model->primaryKey); ?></span>
			<?php elseif($model->loadEtatDossier($model->primaryKey) == "En attente des documents") : ?>
				<span class="label label-sm label-warning"><?php echo $model->loadEtatDossier($model->primaryKey); ?></span>
			<?php endif ?>
		</small>
	</h1>
</div>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>