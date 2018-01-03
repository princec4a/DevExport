<?php
/* @var $this SortieConteneurController */
/* @var $model SortieConteneur */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sortie-conteneur-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'numero'); ?>
		<?php echo $form->textField($model,'numero',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'numero'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'num_booking'); ?>
		<?php echo $form->textField($model,'num_booking',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'num_booking'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'navire_prevu'); ?>
		<?php echo $form->textField($model,'navire_prevu',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'navire_prevu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'port_destination'); ?>
		<?php echo $form->textField($model,'port_destination',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'port_destination'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'num_tc'); ?>
		<?php echo $form->textField($model,'num_tc',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'num_tc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'num_bon_sortie'); ?>
		<?php echo $form->textField($model,'num_bon_sortie',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'num_bon_sortie'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_livraison_tc'); ?>
		<?php echo $form->textField($model,'date_livraison_tc'); ?>
		<?php echo $form->error($model,'date_livraison_tc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'immatriculation'); ?>
		<?php echo $form->textField($model,'immatriculation',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'immatriculation'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'poids'); ?>
		<?php echo $form->textField($model,'poids'); ?>
		<?php echo $form->error($model,'poids'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_created'); ?>
		<?php echo $form->textField($model,'date_created'); ?>
		<?php echo $form->error($model,'date_created'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_modified'); ?>
		<?php echo $form->textField($model,'date_modified'); ?>
		<?php echo $form->error($model,'date_modified'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_user'); ?>
		<?php echo $form->textField($model,'id_user'); ?>
		<?php echo $form->error($model,'id_user'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_dossier'); ?>
		<?php echo $form->textField($model,'id_dossier'); ?>
		<?php echo $form->error($model,'id_dossier'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->