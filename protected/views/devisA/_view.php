<?php
/* @var $this DevisAController */
/* @var $data DevisA */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('autorise_par')); ?>:</b>
	<?php echo CHtml::encode($data->autorise_par); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('montant')); ?>:</b>
	<?php echo CHtml::encode($data->montant); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bsc')); ?>:</b>
	<?php echo CHtml::encode($data->bsc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('co')); ?>:</b>
	<?php echo CHtml::encode($data->co); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('de')); ?>:</b>
	<?php echo CHtml::encode($data->de); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('c_exp')); ?>:</b>
	<?php echo CHtml::encode($data->c_exp); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('frais_saisie')); ?>:</b>
	<?php echo CHtml::encode($data->frais_saisie); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('trans')); ?>:</b>
	<?php echo CHtml::encode($data->trans); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('visa_dd')); ?>:</b>
	<?php echo CHtml::encode($data->visa_dd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('visa_rtt')); ?>:</b>
	<?php echo CHtml::encode($data->visa_rtt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('visa_caissiere')); ?>:</b>
	<?php echo CHtml::encode($data->visa_caissiere); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('visa_dg')); ?>:</b>
	<?php echo CHtml::encode($data->visa_dg); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('numero')); ?>:</b>
	<?php echo CHtml::encode($data->numero); ?>
	<br />

	*/ ?>

</div>