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
				<div class=""><span style="display: block; float: left; width: 60%;">Navire Prévu :</span> <strong><?php echo CHtml::encode($data->navire_prevu); ?></strong></div>
				<div class=""><span style="display: block; float: left; width: 60%;">Port Destination :</span> <strong><?php echo CHtml::encode($data->port_destination); ?></strong></div>
				<div class=""><span style="display: block; float: left; width: 60%;">N° TC :</span> <strong><?php echo CHtml::encode($data->num_tc); ?></strong></div>
				<div class=""><span style="display: block; float: left; width: 60%;">N° Bon de Sortie :</span> <strong><?php echo CHtml::encode($data->num_bon_sortie); ?></strong></div>
			</div>
		</div>
	</div>
</div>