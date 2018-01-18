<?php
/* @var $this FactureController */
/* @var $model Facture */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('DynamicTabularForm', array(
	'defaultRowView'=>'_rowForm',
	'id'=>'facture-form',
	'htmlOptions'=>array('class'=>'form-horizontal', 'role'=>'form', 'enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Les champs avec <span class="required">*</span> sont obligatoires.</p>

	<div class="form-group">
		<?php echo $form->labelEx($model,'client', array('class'=>'col-sm-3 control-label no-padding-right')); ?>
		<div class="col-sm-9">
			<?php echo $form->textArea($model,'client',array('rows'=>4, 'cols'=>50, 'class'=>'col-xs-10 col-sm-5')); ?>
			<?php echo $form->error($model,'client'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'pays_destionation', array('class'=>'col-sm-3 control-label no-padding-right')); ?>
		<div class="col-sm-9">
			<?php echo $form->textField($model,'pays_destionation',array('size'=>60,'maxlength'=>255, 'class'=>'col-xs-10 col-sm-5')); ?>
			<?php echo $form->error($model,'pays_destionation'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'nom_navire', array('class'=>'col-sm-3 control-label no-padding-right')); ?>
		<div class="col-sm-9">
			<?php echo $form->textField($model,'nom_navire',array('size'=>60,'maxlength'=>255, 'class'=>'col-xs-10 col-sm-5')); ?>
			<?php echo $form->error($model,'nom_navire'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'port_embarquement', array('class'=>'col-sm-3 control-label no-padding-right')); ?>
		<div class="col-sm-9">
			<?php echo $form->textField($model,'port_embarquement',array('size'=>60,'maxlength'=>255, 'class'=>'col-xs-10 col-sm-5')); ?>
			<?php echo $form->error($model,'port_embarquement'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'port_chargement', array('class'=>'col-sm-3 control-label no-padding-right')); ?>
		<div class="col-sm-9">
			<?php echo $form->textField($model,'port_chargement',array('size'=>60,'maxlength'=>255, 'class'=>'col-xs-10 col-sm-5')); ?>
			<?php echo $form->error($model,'port_chargement'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'destination_final', array('class'=>'col-sm-3 control-label no-padding-right')); ?>
		<div class="col-sm-9">
			<?php echo $form->textField($model,'destination_final',array('size'=>60,'maxlength'=>255, 'class'=>'col-xs-10 col-sm-5')); ?>
			<?php echo $form->error($model,'destination_final'); ?>
		</div>
	</div>

	<?php echo $form->rowForm($detailFactures); ?>

	<div class="clearfix form-actions">
		<div class="col-md-offset-3 col-md-9">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Sauvegarder' : 'Sauvegarder', array('class'=>'btn btn-info')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->