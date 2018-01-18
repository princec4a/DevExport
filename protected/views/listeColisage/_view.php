<?php
/* @var $this ListeColisageController */
/* @var $data ListeColisage */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mumero')); ?>:</b>
	<?php echo CHtml::encode($data->mumero); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('client')); ?>:</b>
	<?php echo CHtml::encode($data->client); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nom_navire')); ?>:</b>
	<?php echo CHtml::encode($data->nom_navire); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pays_destination')); ?>:</b>
	<?php echo CHtml::encode($data->pays_destination); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('port_embarquement')); ?>:</b>
	<?php echo CHtml::encode($data->port_embarquement); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('port_chargement')); ?>:</b>
	<?php echo CHtml::encode($data->port_chargement); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('destination_final')); ?>:</b>
	<?php echo CHtml::encode($data->destination_final); ?>
	<br />

	*/ ?>

</div>