<?php
/* @var $this DetailFactureController */
/* @var $model DetailFacture */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'detail-facture-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'description_materiel'); ?>
		<?php echo $form->textField($model,'description_materiel',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'description_materiel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'conteneur'); ?>
		<?php echo $form->textField($model,'conteneur',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'conteneur'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'poids_net'); ?>
		<?php echo $form->textField($model,'poids_net'); ?>
		<?php echo $form->error($model,'poids_net'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'taux'); ?>
		<?php echo $form->textField($model,'taux'); ?>
		<?php echo $form->error($model,'taux'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'montant'); ?>
		<?php echo $form->textField($model,'montant'); ?>
		<?php echo $form->error($model,'montant'); ?>
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
		<?php echo $form->labelEx($model,'id_facture'); ?>
		<?php echo $form->textField($model,'id_facture'); ?>
		<?php echo $form->error($model,'id_facture'); ?>
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