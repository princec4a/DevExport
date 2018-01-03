<?php
/* @var $this DetailBesoinController */
/* @var $model DetailBesoin */
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
		<?php echo $form->label($model,'libelle'); ?>
		<?php echo $form->textArea($model,'libelle',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'quantite'); ?>
		<?php echo $form->textField($model,'quantite'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_besoin'); ?>
		<?php echo $form->textField($model,'id_besoin'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->