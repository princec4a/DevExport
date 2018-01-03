<?php
/* @var $this BonCaisseController */
/* @var $data BonCaisse */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('a_ordre')); ?>:</b>
	<?php echo CHtml::encode($data->a_ordre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('motif')); ?>:</b>
	<?php echo CHtml::encode($data->motif); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('montant')); ?>:</b>
	<?php echo CHtml::encode($data->montant); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('transport')); ?>:</b>
	<?php echo CHtml::encode($data->transport); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('visa_caissier')); ?>:</b>
	<?php echo CHtml::encode($data->visa_caissier); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('visa_interesse')); ?>:</b>
	<?php echo CHtml::encode($data->visa_interesse); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_devis_a')); ?>:</b>
	<?php echo CHtml::encode($data->id_devis_a); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_devis_d')); ?>:</b>
	<?php echo CHtml::encode($data->id_devis_d); ?>
	<br />

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