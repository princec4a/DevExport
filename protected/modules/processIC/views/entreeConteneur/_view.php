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
				<?php /*
				<div class=""><span style="display: block; float: left; width: 50%;">Chauffeur :</span> <strong><?php echo CHtml::encode($data->chauffeur); ?></strong></div>
 				*/?>
				<hr style="margin: 0 0 5px;" />
				<div class=""><span style="display: block; float: left; width: 75%;;">N° EIR :</span> <strong><?php echo CHtml::encode($data->num_eir); ?></strong></div>
				<div class=""><span style="display: block; float: left; width: 75%;">Poid Net :</span> <strong><?php echo CHtml::encode($data->poid_reel); ?></strong></div>
				<div class=""><span style="display: block; float: left; width: 75%;">Date Livraison :</span> <strong><?php echo CHtml::encode($data->date_livraison); ?></strong></div>
				<div style="clear: both;"></div>
			</div>
		</div>
	</div>
</div>