<?php
/* @var $this BesoinController */
/* @var $data Besoin */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numero')); ?>:</b>
	<?php echo CHtml::encode($data->numero); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('libelle')); ?>:</b>
	<?php echo CHtml::encode($data->libelle); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('visa_dg')); ?>:</b>
	<?php echo CHtml::encode($data->visa_dg); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('visa_dd')); ?>:</b>
	<?php echo CHtml::encode($data->visa_dd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_created')); ?>:</b>
	<?php echo CHtml::encode($data->date_created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_modified')); ?>:</b>
	<?php echo CHtml::encode($data->date_modified); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_user')); ?>:</b>
	<?php echo CHtml::encode($data->id_user); ?>
	<br />

	*/ ?>

</div>