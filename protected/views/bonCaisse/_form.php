<?php
/* @var $this BonCaisseController */
/* @var $model BonCaisse */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'bon-caisse-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php echo $form->textField($model,'date'); ?>
		<?php echo $form->error($model,'date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'a_ordre'); ?>
		<?php echo $form->textField($model,'a_ordre'); ?>
		<?php echo $form->error($model,'a_ordre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'motif'); ?>
		<?php echo $form->textField($model,'motif',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'motif'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'montant'); ?>
		<?php echo $form->textField($model,'montant'); ?>
		<?php echo $form->error($model,'montant'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'transport'); ?>
		<?php echo $form->textField($model,'transport'); ?>
		<?php echo $form->error($model,'transport'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'visa_caissier'); ?>
		<?php echo $form->textField($model,'visa_caissier'); ?>
		<?php echo $form->error($model,'visa_caissier'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'visa_interesse'); ?>
		<?php echo $form->textField($model,'visa_interesse'); ?>
		<?php echo $form->error($model,'visa_interesse'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_devis_a'); ?>
		<?php echo $form->textField($model,'id_devis_a'); ?>
		<?php echo $form->error($model,'id_devis_a'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_devis_d'); ?>
		<?php echo $form->textField($model,'id_devis_d'); ?>
		<?php echo $form->error($model,'id_devis_d'); ?>
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

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->