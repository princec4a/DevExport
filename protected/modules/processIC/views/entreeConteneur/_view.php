<?php
/* @var $this EntreeConteneurController */
/* @var $data EntreeConteneur */
?>

<div class="col-sm-4">
	<div class="widget-box">
		<div class="widget-header">
			<h4 class="widget-title"><?php echo CHtml::link(CHtml::encode($data->numero), array('view', 'id'=>$data->id)); ?></h4>
		</div>

		<div class="widget-body">
			<div class="widget-main">
				<div class=""><span style="display: block; float: left; width: 50%;">Chauffeur :</span> <strong><?php echo CHtml::encode($data->chauffeur); ?></strong></div>
				<hr style="margin: 0 0 5px;" />
				<div class=""><span style="display: block; float: left; width: 85%;">Site :</span> <strong><?php echo CHtml::encode($data->site); ?></strong></div>
				<div class=""><span style="display: block; float: left; width: 85%;">Heure de fin d'empotage :</span> <strong><?php echo CHtml::encode($data->heure_fin_empotage); ?></strong></div>
				<div class=""><span style="display: block; float: left; width: 85%;">N° Plomb :</span> <strong><?php echo CHtml::encode($data->num_plomb); ?></strong></div>
				<div class=""><span style="display: block; float: left; width: 85%;">Date Livraison :</span> <strong><?php echo CHtml::encode($data->date_livraison); ?></strong></div>
			</div>
		</div>
	</div>
</div>