<?php
/* @var $this SortieConteneurController */
/* @var $model SortieConteneur */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sortie-conteneur-form',
	'htmlOptions'=>array('class'=>'form-horizontal', 'role'=>'form', 'enctype'=>'multipart/form-data'),
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Les champs avec <span class="required">*</span> sont obligatoires.</p>
	<?php
	if(isset($error) && !empty($error)): ?>
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert">
				<i class="ace-icon fa fa-times"></i>
			</button>
			<?php echo $error; ?>
			<br/>
		</div>
	<?php endif; ?>
	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'num_booking', array('label'=>'N° Booking','class'=>'col-sm-3 control-label no-padding-right')); ?>
		<div class="col-sm-9">
			<?php echo $form->textField($model,'num_booking',array('size'=>60,'maxlength'=>255, 'class'=>'col-xs-10 col-sm-5')); ?>
			<?php echo $form->error($model,'num_booking'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'navire_prevu', array('class'=>'col-sm-3 control-label no-padding-right')); ?>
		<div class="col-sm-9">
			<?php echo $form->textField($model,'navire_prevu',array('size'=>60,'maxlength'=>255, 'class'=>'col-xs-10 col-sm-5')); ?>
			<?php echo $form->error($model,'navire_prevu'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'port_destination', array('class'=>'col-sm-3 control-label no-padding-right')); ?>
		<div class="col-sm-9">
			<?php echo $form->textField($model,'port_destination',array('size'=>60,'maxlength'=>255, 'class'=>'col-xs-10 col-sm-5')); ?>
			<?php echo $form->error($model,'port_destination'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'num_tc', array('class'=>'col-sm-3 control-label no-padding-right')); ?>
		<div class="col-sm-9">
			<?php echo $form->textField($model,'num_tc',array('size'=>20,'maxlength'=>20, 'class'=>'col-xs-10 col-sm-5')); ?>
			<?php echo $form->error($model,'num_tc'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'num_bon_sortie', array('label'=>'N° Bon de Sortie','class'=>'col-sm-3 control-label no-padding-right')); ?>
		<div class="col-sm-9">
			<?php echo $form->textField($model,'num_bon_sortie',array('size'=>60,'maxlength'=>255, 'class'=>'col-xs-10 col-sm-5', 'placeholder'=>'XXXXXXXX')); ?>
			<?php echo $form->error($model,'num_bon_sortie'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'date_livraison_tc', array('class'=>'col-sm-3 control-label no-padding-right')); ?>
		<div class="col-sm-9">
			<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
				'model' => $model,
				'attribute' => 'date_livraison_tc',
				'options' => array(
					'showAnim' => 'fold',
					'dateFormat' => 'dd-mm-yy',
				),
				'htmlOptions' => array(
					'class'=>'',
				),
			)); ?>
			<?php echo $form->error($model,'date_livraison_tc'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'immatriculation', array('class'=>'col-sm-3 control-label no-padding-right')); ?>
		<div class="col-sm-9">
			<?php echo $form->textField($model,'immatriculation',array('size'=>20,'maxlength'=>20, 'class'=>'col-xs-10 col-sm-5', 'placeholder'=>'XXXXXXXX')); ?>
			<?php echo $form->error($model,'immatriculation'); ?>
		</div>
	</div>

	<!--div class="form-group">
		<?php //echo $form->labelEx($model,'poids', array('class'=>'col-sm-3 control-label no-padding-right')); ?>
		<div class="col-sm-9">
			<?php // echo $form->textField($model,'poids', array('class'=>'col-xs-10 col-sm-5', 'placeholder'=>'Poids')); ?> Tonne
			<?php //	echo $form->error($model,'poids'); ?>
		</div>
	</div -->

	<div class="clearfix form-actions">
		<div class="col-md-offset-3 col-md-9">
			<?php echo CHtml::submitButton($model->isNewRecord ? ' Sauvegarder' : 'Sauvegarder', array('class'=>'btn btn-info')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->