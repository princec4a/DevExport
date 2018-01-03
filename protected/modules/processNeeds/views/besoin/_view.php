<?php
/* @var $this BesoinController */
/* @var $data Besoin */
?>

<div class="col-sm-4">
	<div class="widget-box">
		<div class="widget-header">
			<h4 class="widget-title"><?php echo CHtml::link(CHtml::encode($data->numero), array('view', 'id'=>$data->id)); ?></h4>
			<div class="widget-toolbar"><?= ($data->etat == 1)? '<span class="label label-success arrowed arrowed-in-right">Payé</span>' : '<span class="label label-danger arrowed arrowed-in-right">Impayé</span>'?></div>

		</div>

		<div class="widget-body">
			<div class="widget-main">
				<div class=""><span style="display: block; float: left; width: 60%;"></span> <strong><?php echo CHtml::encode($data->libelle); ?></strong></div>
				<hr style="margin: 0 0 5px;" />
				<div class=""><span style="display: block; float: left; width: 60%;">Détails :</span> <strong><?php echo count($data->detailBesoins); ?></strong></div>
				<hr style="margin: 0 0 5px;" />
				<div class=""><span style="display: block; float: left; width: 60%;">Créer le :</span> <strong><?php echo date('d-m-Y à H:i:s', strtotime($data->date_created)); ?></strong></div>
			</div>
		</div>
	</div>
</div>