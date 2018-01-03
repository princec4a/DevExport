<?php
/* @var $this DevisDController */
/* @var $data DevisD */
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('dd')); ?>:</b>
	<?php echo CHtml::encode($data->dd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tel_i')); ?>:</b>
	<?php echo CHtml::encode($data->tel_i); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tr')); ?>:</b>
	<?php echo CHtml::encode($data->tr); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('frais_saisie_btf')); ?>:</b>
	<?php echo CHtml::encode($data->frais_saisie_btf); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('sortie_tc_d')); ?>:</b>
	<?php echo CHtml::encode($data->sortie_tc_d); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('numero')); ?>:</b>
	<?php echo CHtml::encode($data->numero); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_devis_a')); ?>:</b>
	<?php echo CHtml::encode($data->id_devis_a); ?>
	<br />

	*/ ?>

</div>