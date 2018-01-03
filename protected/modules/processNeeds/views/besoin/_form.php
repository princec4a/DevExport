<?php
/* @var $this BesoinController */
/* @var $model Besoin */
/* @var $form CActiveForm */
?>

<div class="col-xs-12">

<?php $form = $this->beginWidget('DynamicTabularForm', array(
	'defaultRowView'=>'_rowForm',
	'htmlOptions'=>array('class'=>'form-horizontal', 'role'=>'form', 'enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Les champs avec <span class="required">*</span> sont obligatoires.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'libelle', array('label'=>'Motif','class'=>'col-sm-3 control-label no-padding-right')); ?>
		<div class="col-sm-9">
			<?php echo $form->textField($model,'libelle', array('class'=>'col-xs-10 col-sm-5')); ?>
			<?php echo $form->error($model,'libelle'); ?>
		</div>
	</div>

	<?php echo $form->rowForm($detailBesoins); ?>

	<div class="clearfix form-actions">
		<div class="col-md-offset-3 col-md-9">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Sauvegarder' : 'Sauvegarder', array('class'=>'btn btn-info')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->