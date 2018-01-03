<?php
/* @var $this DevisAController */
/* @var $model DevisA */
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
		<?php echo $form->label($model,'autorise_par'); ?>
		<?php echo $form->textField($model,'autorise_par'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'montant'); ?>
		<?php echo $form->textField($model,'montant'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bsc'); ?>
		<?php echo $form->textField($model,'bsc'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'co'); ?>
		<?php echo $form->textField($model,'co'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'de'); ?>
		<?php echo $form->textField($model,'de'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'c_exp'); ?>
		<?php echo $form->textField($model,'c_exp'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'frais_saisie'); ?>
		<?php echo $form->textField($model,'frais_saisie'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'trans'); ?>
		<?php echo $form->textField($model,'trans'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'visa_dd'); ?>
		<?php echo $form->textField($model,'visa_dd'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'visa_rtt'); ?>
		<?php echo $form->textField($model,'visa_rtt'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'visa_caissiere'); ?>
		<?php echo $form->textField($model,'visa_caissiere'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'visa_dg'); ?>
		<?php echo $form->textField($model,'visa_dg'); ?>
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
		<?php echo $form->label($model,'numero'); ?>
		<?php echo $form->textField($model,'numero',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->