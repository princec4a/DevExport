<?php
/* @var $this BonEncaissementController */
/* @var $model BonEncaissement */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'numero'); ?>
		<?php echo $form->textField($model,'numero',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date'); ?>
		<?php echo $form->textField($model,'date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'a_ordre'); ?>
		<?php echo $form->textField($model,'a_ordre'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'motif'); ?>
		<?php echo $form->textField($model,'motif',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'montant'); ?>
		<?php echo $form->textField($model,'montant'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'accompte'); ?>
		<?php echo $form->textField($model,'accompte'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'reste'); ?>
		<?php echo $form->textField($model,'reste'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_dossier'); ?>
		<?php echo $form->textField($model,'id_dossier'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_created'); ?>
		<?php echo $form->textField($model,'date_created'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_modified'); ?>
		<?php echo $form->textField($model,'date_modified'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_user'); ?>
		<?php echo $form->textField($model,'id_user'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_caissier'); ?>
		<?php echo $form->textField($model,'id_caissier'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->