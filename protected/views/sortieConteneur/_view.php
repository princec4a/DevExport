<?php
/* @var $this SortieConteneurController */
/* @var $data SortieConteneur */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numero')); ?>:</b>
	<?php echo CHtml::encode($data->numero); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_booking')); ?>:</b>
	<?php echo CHtml::encode($data->num_booking); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('navire_prevu')); ?>:</b>
	<?php echo CHtml::encode($data->navire_prevu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('port_destination')); ?>:</b>
	<?php echo CHtml::encode($data->port_destination); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_tc')); ?>:</b>
	<?php echo CHtml::encode($data->num_tc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_bon_sortie')); ?>:</b>
	<?php echo CHtml::encode($data->num_bon_sortie); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('date_livraison_tc')); ?>:</b>
	<?php echo CHtml::encode($data->date_livraison_tc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('immatriculation')); ?>:</b>
	<?php echo CHtml::encode($data->immatriculation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('poids')); ?>:</b>
	<?php echo CHtml::encode($data->poids); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_dossier')); ?>:</b>
	<?php echo CHtml::encode($data->id_dossier); ?>
	<br />

	*/ ?>

</div>