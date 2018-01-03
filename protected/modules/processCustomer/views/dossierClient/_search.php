<?php
/* @var $this DossierClientController */
/* @var $model DossierClient */
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
		<?php echo $form->label($model,'id_client'); ?>
		<?php echo $form->textField($model,'id_client'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_devis_a'); ?>
		<?php echo $form->textField($model,'id_devis_a'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_devis_d'); ?>
		<?php echo $form->textField($model,'id_devis_d'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'num_tc'); ?>
		<?php echo $form->textField($model,'num_tc',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nbr_conteneur'); ?>
		<?php echo $form->textField($model,'nbr_conteneur'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'num_de'); ?>
		<?php echo $form->textField($model,'num_de',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'num_co'); ?>
		<?php echo $form->textField($model,'num_co',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'num_expertise'); ?>
		<?php echo $form->textField($model,'num_expertise',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'num_facture'); ?>
		<?php echo $form->textField($model,'num_facture',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'num_liste_colisage'); ?>
		<?php echo $form->textField($model,'num_liste_colisage',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'num_bsc'); ?>
		<?php echo $form->textField($model,'num_bsc',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'num_booking'); ?>
		<?php echo $form->textField($model,'num_booking'); ?>
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