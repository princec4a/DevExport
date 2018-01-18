<?php
/* @var $this FactureController */
/* @var $data Facture */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('client')); ?>:</b>
	<?php echo CHtml::encode($data->client); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pays_destionation')); ?>:</b>
	<?php echo CHtml::encode($data->pays_destionation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nom_navire')); ?>:</b>
	<?php echo CHtml::encode($data->nom_navire); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('port_embarquement')); ?>:</b>
	<?php echo CHtml::encode($data->port_embarquement); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('port_chargement')); ?>:</b>
	<?php echo CHtml::encode($data->port_chargement); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('destination_final')); ?>:</b>
	<?php echo CHtml::encode($data->destination_final); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('date_created')); ?>:</b>
	<?php echo CHtml::encode($data->date_created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_modified')); ?>:</b>
	<?php echo CHtml::encode($data->date_modified); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_user')); ?>:</b>
	<?php echo CHtml::encode($data->id_user); ?>
	<br />

	*/ ?>

</div>