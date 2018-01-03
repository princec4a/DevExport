<?php
/* @var $this EntreeConteneurController */
/* @var $model EntreeConteneur */
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
		<?php echo $form->label($model,'date_livraison'); ?>
		<?php echo $form->textField($model,'date_livraison'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'chauffeur'); ?>
		<?php echo $form->textField($model,'chauffeur',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'site'); ?>
		<?php echo $form->textField($model,'site',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'heure_fin_empotage'); ?>
		<?php echo $form->textField($model,'heure_fin_empotage'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'num_plomb'); ?>
		<?php echo $form->textField($model,'num_plomb',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'poid_brut'); ?>
		<?php echo $form->textField($model,'poid_brut'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'poid_reel'); ?>
		<?php echo $form->textField($model,'poid_reel'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_sortie_conteneur'); ?>
		<?php echo $form->textField($model,'id_sortie_conteneur'); ?>
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

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->