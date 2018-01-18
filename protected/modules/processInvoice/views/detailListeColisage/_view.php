<?php
/* @var $this DetailListeColisageController */
/* @var $data DetailListeColisage */
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('poids_brut')); ?>:</b>
	<?php echo CHtml::encode($data->poids_brut); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('poids_net')); ?>:</b>
	<?php echo CHtml::encode($data->poids_net); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_liste_colisage')); ?>:</b>
	<?php echo CHtml::encode($data->id_liste_colisage); ?>
	<br />

	*/ ?>

</div>