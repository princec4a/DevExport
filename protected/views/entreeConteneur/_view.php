<?php
/* @var $this EntreeConteneurController */
/* @var $data EntreeConteneur */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numero')); ?>:</b>
	<?php echo CHtml::encode($data->numero); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_livraison')); ?>:</b>
	<?php echo CHtml::encode($data->date_livraison); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('chauffeur')); ?>:</b>
	<?php echo CHtml::encode($data->chauffeur); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('site')); ?>:</b>
	<?php echo CHtml::encode($data->site); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('heure_fin_empotage')); ?>:</b>
	<?php echo CHtml::encode($data->heure_fin_empotage); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_plomb')); ?>:</b>
	<?php echo CHtml::encode($data->num_plomb); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('poid_brut')); ?>:</b>
	<?php echo CHtml::encode($data->poid_brut); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('poid_reel')); ?>:</b>
	<?php echo CHtml::encode($data->poid_reel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_sortie_conteneur')); ?>:</b>
	<?php echo CHtml::encode($data->id_sortie_conteneur); ?>
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