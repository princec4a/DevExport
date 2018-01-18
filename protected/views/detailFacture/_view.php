<?php
/* @var $this DetailFactureController */
/* @var $data DetailFacture */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description_materiel')); ?>:</b>
	<?php echo CHtml::encode($data->description_materiel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('conteneur')); ?>:</b>
	<?php echo CHtml::encode($data->conteneur); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('poids_net')); ?>:</b>
	<?php echo CHtml::encode($data->poids_net); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('taux')); ?>:</b>
	<?php echo CHtml::encode($data->taux); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('montant')); ?>:</b>
	<?php echo CHtml::encode($data->montant); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_created')); ?>:</b>
	<?php echo CHtml::encode($data->date_created); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('date_modified')); ?>:</b>
	<?php echo CHtml::encode($data->date_modified); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_facture')); ?>:</b>
	<?php echo CHtml::encode($data->id_facture); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_user')); ?>:</b>
	<?php echo CHtml::encode($data->id_user); ?>
	<br />

	*/ ?>

</div>