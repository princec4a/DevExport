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
	<div class="form-group"> <!-- has-error -->
		<?php echo $form->labelEx($model,'num_booking', array('label'=>'N° Booking','class'=>'col-sm-3 control-label no-padding-right')); ?>
		<div class="col-sm-9">
			<?php echo $form->textField($model,'num_booking',array('size'=>60,'maxlength'=>255, 'class'=>'col-xs-10 col-sm-5')); ?>
			<?php echo $form->error($model,'num_booking', array('class'=>'help-block col-xs-12 col-sm-reset inline')); ?>
		</div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'num_tc', array('class'=>'col-sm-3 control-label no-padding-right')); ?>
		<div class="col-sm-9">
			<?php echo $form->textField($model,'num_tc',array('size'=>20,'maxlength'=>20, 'class'=>'col-xs-10 col-sm-2')); ?>
			<?php $this->widget('ext.select2.XSelect2', array(
				'model'=>$model,
				'attribute'=>'id_type_tc',
				'data'=>TypeTc::getListeData(),
				'htmlOptions'=>array(
					'style'=>'width:25%; padding:1px',
				),
			));?>
			<?php echo $form->error($model,'num_tc', array('class'=>'help-block col-xs-12 col-sm-reset inline')); ?>
		</div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'num_bon_sortie', array('label'=>'N° Bon de Sortie','class'=>'col-sm-3 control-label no-padding-right')); ?>
		<div class="col-sm-9">
			<?php echo $form->textField($model,'num_bon_sortie',array('size'=>60,'maxlength'=>255, 'class'=>'col-xs-10 col-sm-2', 'placeholder'=>'XXXXXXXX')); ?>
			<?php $this->widget('ext.select2.XSelect2', array(
				'model'=>$model,
				'attribute'=>'id_type_bon',
				'data'=>TypeBon::getListeData(),
				'htmlOptions'=>array(
					'style'=>'width:25%; padding:1px',
				),
			));?>
			<?php echo $form->error($model,'num_bon_sortie', array('class'=>'help-block col-xs-12 col-sm-reset inline')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'client', array('class'=>'col-sm-3 control-label no-padding-right')); ?>
		<div class="col-sm-9">
			<?php echo $form->textField($model,'client',array('size'=>60,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'client', array('class'=>'help-block col-xs-12 col-sm-reset inline')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'num_eir', array('class'=>'col-sm-3 control-label no-padding-right')); ?>
		<div class="col-sm-9">
			<?php echo $form->textField($model,'num_eir',array('size'=>60,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'num_eir', array('class'=>'help-block col-xs-12 col-sm-reset inline')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'site', array('class'=>'col-sm-3 control-label no-padding-right')); ?>
		<div class="col-sm-9">
			<?php echo $form->textField($model,'site',array('size'=>60,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'site', array('class'=>'help-block col-xs-12 col-sm-reset inline')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'etat', array('class'=>'col-sm-3 control-label no-padding-right')); ?>
		<div class="col-sm-9">
			<?php //echo $form->textField($model,'etat',array('size'=>60,'maxlength'=>255)); ?>
			<?php $this->widget('ext.select2.XSelect2', array(
				'model'=>$model,
				'attribute'=>'etat',
				'data'=>EtatTc::getListeData(),
				'htmlOptions'=>array(
					'style'=>'width:25%;',
				),
			));?>
			<?php echo $form->error($model,'etat', array('class'=>'help-block col-xs-12 col-sm-reset inline')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'date_sortie_tc', array('class'=>'col-sm-3 control-label no-padding-right')); ?>
		<div class="col-sm-9">
			<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
				'model' => $model,
				'attribute' => 'date_sortie_tc',
				'options' => array(
					'showAnim' => 'fold',
					'dateFormat' => 'dd-mm-yy',
				),
				'htmlOptions' => array(
					'class'=>'',
				),
			)); ?>
			<?php echo $form->error($model,'date_sortie_tc', array('class'=>'help-block col-xs-12 col-sm-reset inline')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'port_destination', array('class'=>'col-sm-3 control-label no-padding-right')); ?>
		<div class="col-sm-9">
			<?php echo $form->textField($model,'port_destination',array('size'=>60,'maxlength'=>255, 'class'=>'col-xs-10 col-sm-5')); ?>
			<?php echo $form->error($model,'port_destination', array('class'=>'help-block col-xs-12 col-sm-reset inline')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'navire_prevu', array('class'=>'col-sm-3 control-label no-padding-right')); ?>
		<div class="col-sm-9">
			<?php echo $form->textField($model,'navire_prevu',array('size'=>60,'maxlength'=>255, 'class'=>'col-xs-10 col-sm-5')); ?>
			<?php echo $form->error($model,'navire_prevu', array('class'=>'help-block col-xs-12 col-sm-reset inline')); ?>
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
			<?php echo $form->error($model,'date_livraison_tc', array('class'=>'help-block col-xs-12 col-sm-reset inline')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'immatriculation', array('class'=>'col-sm-3 control-label no-padding-right')); ?>
		<div class="col-sm-9">
			<?php echo $form->textField($model,'immatriculation',array('size'=>20,'maxlength'=>20, 'class'=>'col-xs-10 col-sm-5', 'placeholder'=>'XXXXXXXX')); ?>
			<?php echo $form->error($model,'immatriculation', array('class'=>'help-block col-xs-12 col-sm-reset inline')); ?>
		</div>
	</div>

	<div class="clearfix form-actions">
		<div class="col-md-offset-3 col-md-9">
			<?php echo CHtml::submitButton($model->isNewRecord ? ' Sauvegarder' : 'Sauvegarder', array('class'=>'btn btn-info')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->