<?php
/* @var $this SortieConteneurController */
/* @var $data SortieConteneur */
?>

<div class="col-sm-4">
	<div class="widget-box">
		<div class="widget-header">
			<h4 class="widget-title"><?php echo CHtml::link(CHtml::encode($data->numero), array('view', 'id'=>$data->id)); ?></h4>
		</div>

		<div class="widget-body">
			<div class="widget-main">
				<div class=""><span style="display: block; float: left; width: 60%;">N° Booking :</span> <strong><?php echo CHtml::encode($data->num_booking); ?></strong></div>
				<div class=""><span style="display: block; float: left; width: 60%;">N° EIR :</span> <strong><?php echo CHtml::encode($data->num_eir); ?></strong></div>
				<div class=""><span style="display: block; float: left; width: 60%;">Client :</span> <strong><?php echo CHtml::encode($data->client); ?></strong></div>
				<div class=""><span style="display: block; float: left; width: 60%;">N° TC :</span> <strong><?php echo CHtml::encode($data->num_tc); ?></strong></div>
				<div class=""><span style="display: block; float: left; width: 60%;">N° Bon de Sortie :</span> <strong><?php echo CHtml::encode($data->num_bon_sortie); ?></strong></div>
				<div style="clear: both;"></div>
			</div>
		</div>
	</div>
</div>