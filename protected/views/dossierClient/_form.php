<?php
/* @var $this DossierClientController */
/* @var $model DossierClient */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'dossier-client-form',
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
		<?php echo $form->labelEx($model,'id_client'); ?>
		<?php echo $form->textField($model,'id_client'); ?>
		<?php echo $form->error($model,'id_client'); ?>
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
		<?php echo $form->labelEx($model,'num_tc'); ?>
		<?php echo $form->textField($model,'num_tc',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'num_tc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nbr_conteneur'); ?>
		<?php echo $form->textField($model,'nbr_conteneur'); ?>
		<?php echo $form->error($model,'nbr_conteneur'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'num_de'); ?>
		<?php echo $form->textField($model,'num_de',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'num_de'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'num_co'); ?>
		<?php echo $form->textField($model,'num_co',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'num_co'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'num_expertise'); ?>
		<?php echo $form->textField($model,'num_expertise',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'num_expertise'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'num_facture'); ?>
		<?php echo $form->textField($model,'num_facture',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'num_facture'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'num_liste_colisage'); ?>
		<?php echo $form->textField($model,'num_liste_colisage',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'num_liste_colisage'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'num_bsc'); ?>
		<?php echo $form->textField($model,'num_bsc',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'num_bsc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'num_booking'); ?>
		<?php echo $form->textField($model,'num_booking'); ?>
		<?php echo $form->error($model,'num_booking'); ?>
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