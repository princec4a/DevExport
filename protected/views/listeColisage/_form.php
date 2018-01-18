<?php
/* @var $this ListeColisageController */
/* @var $model ListeColisage */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'liste-colisage-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'mumero'); ?>
		<?php echo $form->textField($model,'mumero',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'mumero'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'client'); ?>
		<?php echo $form->textField($model,'client',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'client'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nom_navire'); ?>
		<?php echo $form->textField($model,'nom_navire',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'nom_navire'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pays_destination'); ?>
		<?php echo $form->textField($model,'pays_destination',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'pays_destination'); ?>
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

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->