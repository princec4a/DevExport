<?php
/* @var $this BesoinController */
/* @var $model Besoin */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'besoin-form',
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
		<?php echo $form->labelEx($model,'libelle'); ?>
		<?php echo $form->textArea($model,'libelle',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'libelle'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'visa_dg'); ?>
		<?php echo $form->textField($model,'visa_dg'); ?>
		<?php echo $form->error($model,'visa_dg'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'visa_dd'); ?>
		<?php echo $form->textField($model,'visa_dd'); ?>
		<?php echo $form->error($model,'visa_dd'); ?>
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