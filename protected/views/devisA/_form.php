<?php
/* @var $this DevisAController */
/* @var $model DevisA */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'devis-a-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'autorise_par'); ?>
		<?php echo $form->textField($model,'autorise_par'); ?>
		<?php echo $form->error($model,'autorise_par'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'montant'); ?>
		<?php echo $form->textField($model,'montant'); ?>
		<?php echo $form->error($model,'montant'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bsc'); ?>
		<?php echo $form->textField($model,'bsc'); ?>
		<?php echo $form->error($model,'bsc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'co'); ?>
		<?php echo $form->textField($model,'co'); ?>
		<?php echo $form->error($model,'co'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'de'); ?>
		<?php echo $form->textField($model,'de'); ?>
		<?php echo $form->error($model,'de'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'c_exp'); ?>
		<?php echo $form->textField($model,'c_exp'); ?>
		<?php echo $form->error($model,'c_exp'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'frais_saisie'); ?>
		<?php echo $form->textField($model,'frais_saisie'); ?>
		<?php echo $form->error($model,'frais_saisie'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'trans'); ?>
		<?php echo $form->textField($model,'trans'); ?>
		<?php echo $form->error($model,'trans'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'visa_dd'); ?>
		<?php echo $form->textField($model,'visa_dd'); ?>
		<?php echo $form->error($model,'visa_dd'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'visa_rtt'); ?>
		<?php echo $form->textField($model,'visa_rtt'); ?>
		<?php echo $form->error($model,'visa_rtt'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'visa_caissiere'); ?>
		<?php echo $form->textField($model,'visa_caissiere'); ?>
		<?php echo $form->error($model,'visa_caissiere'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'visa_dg'); ?>
		<?php echo $form->textField($model,'visa_dg'); ?>
		<?php echo $form->error($model,'visa_dg'); ?>
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
		<?php echo $form->labelEx($model,'numero'); ?>
		<?php echo $form->textField($model,'numero',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'numero'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->