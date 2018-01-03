<?php
/* @var $this BonCaisseController */
/* @var $model BonCaisse */
/* @var $form CActiveForm */
?>

<div class="col-xs-12">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'bon-caisse-form',
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
		<?php echo $form->labelEx($model,'date', array('class'=>'col-sm-3 control-label no-padding-right')); ?>
		<div class="col-sm-9">
			<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
				'model' => $model,
				'attribute' => 'date',
				'options' => array(
					'showAnim' => 'fold',
					'dateFormat' => 'dd-mm-yy',
				),
				'htmlOptions' => array(
					'class'=>'',
				),
			)); ?>
			<?php echo $form->error($model,'date'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'a_ordre', array('class'=>'col-sm-3 control-label no-padding-right')); ?>
		<div class="col-sm-9">
			<?php $this->widget('ext.select2.XSelect2', array(
				'model'=>$model,
				'attribute'=>'a_ordre',
				'data'=>User::getListeData(),
				'htmlOptions'=>array(
					'style'=>'width:50%;',
				),
			));?>
			<?php echo $form->error($model,'a_ordre'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'motif', array('class'=>'col-sm-3 control-label no-padding-right')); ?>
		<div class="col-sm-9">
			<?php echo $form->textField($model,'motif',array('size'=>60,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'motif'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'num_piece', array('label'=>'N° Pièce', 'class'=>'col-sm-3 control-label no-padding-right')); ?>
		<div class="col-sm-9">
			<?php $this->widget('ext.select2.XSelect2', array(
				'model'=>$model,
				'attribute'=>'num_piece',
				'data'=>DevisA::getListeData(),
				'htmlOptions'=>array(
					'style'=>'width:50%;',
				),
				'events'=>array(
					'change'=>"js:function (element) {
						var num_piece=$('#BonCaisse_num_piece').val();
						if (num_piece!='') {
							$.ajax('".$this->createUrl('/processBC/bonCaisse/getInfoPiece')."', {
								dataType: 'json',
								method: 'POST',
								data: {
									num_piece: num_piece
								}
							}).done(function(data) {
								console.log(data);
								$('#BonCaisse_montant').val(data.montant);
								$('#BonCaisse_transport').val(data.trans);s
							});
						}
					}"
				),
			));?>
			<?php echo $form->error($model,'num_piece'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'montant', array('class'=>'col-sm-3 control-label no-padding-right')); ?>
		<div class="col-sm-9">
			<?php echo $form->textField($model,'montant', array('readonly'=>'readonly')); ?> <span>CFA</span>
			<?php echo $form->error($model,'montant'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'transport', array('class'=>'col-sm-3 control-label no-padding-right')); ?>
		<div class="col-sm-9">
			<?php echo $form->textField($model,'transport', array('readonly'=>'readonly')); ?> <span>CFA</span>
			<?php echo $form->error($model,'transport'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'rendue', array('label'=>'Rendu','class'=>'col-sm-3 control-label no-padding-right')); ?>
		<div class="col-sm-9">
			<?php echo $form->textField($model,'rendue'); ?> <span>CFA</span>
			<?php echo $form->error($model,'rendue'); ?>
		</div>
	</div>

	<div class="clearfix form-actions">
		<div class="col-md-offset-3 col-md-9">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Créer' : 'Sauver', array('class'=>'btn btn-info')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->