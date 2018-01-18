<?php
/* @var $this DetailFactureController */
/* @var $model DetailFacture */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'description_materiel'); ?>
		<?php echo $form->textField($model,'description_materiel',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'conteneur'); ?>
		<?php echo $form->textField($model,'conteneur',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'poids_net'); ?>
		<?php echo $form->textField($model,'poids_net'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'taux'); ?>
		<?php echo $form->textField($model,'taux'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'montant'); ?>
		<?php echo $form->textField($model,'montant'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_created'); ?>
		<?php echo $form->textField($model,'date_created'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_modified'); ?>
		<?php echo $form->textField($model,'date_modified'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_facture'); ?>
		<?php echo $form->textField($model,'id_facture'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_user'); ?>
		<?php echo $form->textField($model,'id_user'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->