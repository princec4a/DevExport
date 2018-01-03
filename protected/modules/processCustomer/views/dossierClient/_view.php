<?php
/* @var $this DossierClientController */
/* @var $data DossierClient */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numero')); ?>:</b>
	<?php echo CHtml::encode($data->numero); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_client')); ?>:</b>
	<?php echo CHtml::encode($data->id_client); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_devis_a')); ?>:</b>
	<?php echo CHtml::encode($data->id_devis_a); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_devis_d')); ?>:</b>
	<?php echo CHtml::encode($data->id_devis_d); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_tc')); ?>:</b>
	<?php echo CHtml::encode($data->num_tc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nbr_conteneur')); ?>:</b>
	<?php echo CHtml::encode($data->nbr_conteneur); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('num_de')); ?>:</b>
	<?php echo CHtml::encode($data->num_de); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_co')); ?>:</b>
	<?php echo CHtml::encode($data->num_co); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_expertise')); ?>:</b>
	<?php echo CHtml::encode($data->num_expertise); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_facture')); ?>:</b>
	<?php echo CHtml::encode($data->num_facture); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_liste_colisage')); ?>:</b>
	<?php echo CHtml::encode($data->num_liste_colisage); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_bsc')); ?>:</b>
	<?php echo CHtml::encode($data->num_bsc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_booking')); ?>:</b>
	<?php echo CHtml::encode($data->num_booking); ?>
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