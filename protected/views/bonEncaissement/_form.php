<?php
/* @var $this BonEncaissementController */
/* @var $model BonEncaissement */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'bon-encaissement-form',
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
		<?php echo $form->labelEx($model,'accompte'); ?>
		<?php echo $form->textField($model,'accompte'); ?>
		<?php echo $form->error($model,'accompte'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'reste'); ?>
		<?php echo $form->textField($model,'reste'); ?>
		<?php echo $form->error($model,'reste'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_dossier'); ?>
		<?php echo $form->textField($model,'id_dossier'); ?>
		<?php echo $form->error($model,'id_dossier'); ?>
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
		<?php echo $form->labelEx($model,'id_caissier'); ?>
		<?php echo $form->textField($model,'id_caissier'); ?>
		<?php echo $form->error($model,'id_caissier'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->