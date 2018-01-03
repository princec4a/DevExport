<?php
/* @var $this DetailBesoinController */
/* @var $data DetailBesoin */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('libelle')); ?>:</b>
	<?php echo CHtml::encode($data->libelle); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('quantite')); ?>:</b>
	<?php echo CHtml::encode($data->quantite); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_besoin')); ?>:</b>
	<?php echo CHtml::encode($data->id_besoin); ?>
	<br />


</div>