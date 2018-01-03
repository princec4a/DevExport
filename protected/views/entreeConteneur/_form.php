<?php
/* @var $this EntreeConteneurController */
/* @var $model EntreeConteneur */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'entree-conteneur-form',
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
		<?php echo $form->labelEx($model,'date_livraison'); ?>
		<?php echo $form->textField($model,'date_livraison'); ?>
		<?php echo $form->error($model,'date_livraison'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'chauffeur'); ?>
		<?php echo $form->textField($model,'chauffeur',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'chauffeur'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'site'); ?>
		<?php echo $form->textField($model,'site',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'site'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'heure_fin_empotage'); ?>
		<?php echo $form->textField($model,'heure_fin_empotage'); ?>
		<?php echo $form->error($model,'heure_fin_empotage'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'num_plomb'); ?>
		<?php echo $form->textField($model,'num_plomb',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'num_plomb'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'poid_brut'); ?>
		<?php echo $form->textField($model,'poid_brut'); ?>
		<?php echo $form->error($model,'poid_brut'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'poid_reel'); ?>
		<?php echo $form->textField($model,'poid_reel'); ?>
		<?php echo $form->error($model,'poid_reel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_sortie_conteneur'); ?>
		<?php echo $form->textField($model,'id_sortie_conteneur'); ?>
		<?php echo $form->error($model,'id_sortie_conteneur'); ?>
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