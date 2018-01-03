<?php
/* @var $this BonEncaissementController */
/* @var $data BonEncaissement */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numero')); ?>:</b>
	<?php echo CHtml::encode($data->numero); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('accompte')); ?>:</b>
	<?php echo CHtml::encode($data->accompte); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('reste')); ?>:</b>
	<?php echo CHtml::encode($data->reste); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_dossier')); ?>:</b>
	<?php echo CHtml::encode($data->id_dossier); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_caissier')); ?>:</b>
	<?php echo CHtml::encode($data->id_caissier); ?>
	<br />

	*/ ?>

</div>