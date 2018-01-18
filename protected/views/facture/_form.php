<?php
/* @var $this FactureController */
/* @var $model Facture */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'facture-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'client'); ?>
		<?php echo $form->textArea($model,'client',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'client'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pays_destionation'); ?>
		<?php echo $form->textField($model,'pays_destionation',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'pays_destionation'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nom_navire'); ?>
		<?php echo $form->textField($model,'nom_navire',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'nom_navire'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'port_embarquement'); ?>
		<?php echo $form->textField($model,'port_embarquement',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'port_embarquement'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'port_chargement'); ?>
		<?php echo $form->textField($model,'port_chargement',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'port_chargement'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'destination_final'); ?>
		<?php echo $form->textField($model,'destination_final',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'destination_final'); ?>
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