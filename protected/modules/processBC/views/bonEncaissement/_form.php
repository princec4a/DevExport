<?php
/* @var $this BonEncaissementController */
/* @var $model BonEncaissement */
/* @var $form CActiveForm */
?>

<div class="col-xs-12">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'bon-encaissement-form',
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
		<?php echo $form->labelEx($model,'id_dossier', array('label'=>'N° Booking', 'class'=>'col-sm-3 control-label no-padding-right')); ?>
		<div class="col-sm-9">
			<?php $this->widget('ext.select2.XSelect2', array(
				'model'=>$model,
				'attribute'=>'id_dossier',
				'data'=>DossierClient::getListeData(),
				'htmlOptions'=>array(
					'style'=>'width:50%;',
				),
				'events'=>array(
					'change'=>"js:function (element) {
						var num_booking=$('#BonEncaissement_id_dossier').val();
						console.log(num_booking);
						if (num_booking!='') {
							$.ajax('".$this->createUrl('/processBC/bonEncaissement/getInfoDossierClient')."', {
								dataType: 'json',
								method: 'POST',
								data: {
									num_booking: num_booking
								}
							}).done(function(data) {
								console.log(data);
								$('#BonEncaissement_a_ordre').val(data['societe']);
								$('#nomClient').html('Client : '+data['client']);
							});
						}
					}"
				),
			));?>
			<?php echo $form->error($model,'id_dossier'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'a_ordre', array('class'=>'col-sm-3 control-label no-padding-right')); ?>
		<div class="col-sm-9">
			<?php echo $form->textField($model,'a_ordre', array('readonly'=>'readonly')); ?>
			<span id="nomClient"></span>
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
		<?php echo $form->labelEx($model,'montant', array('class'=>'col-sm-3 control-label no-padding-right')); ?>
		<div class="col-sm-9">
			<?php echo $form->textField($model,'montant', array(
				'onKeyUp' => "$(function () {
					var arrayKey = [96,97,98,99,100,101,102,103,104,105];
					if((event.keyCode >= 48 && event.keyCode <= 59) || event.keyCode == 8 || ($.inArray(event.keyCode, arrayKey) != -1)){

						var total = $('#BonEncaissement_montant').val();
						var accompte = $('#BonEncaissement_accompte').val();

						var reste = calculMontant(total,accompte);

						$('#BonEncaissement_reste').val(reste);
					}
				});"
			)); ?>
			<?php echo $form->error($model,'montant'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'accompte', array('class'=>'col-sm-3 control-label no-padding-right')); ?>
		<div class="col-sm-9">
			<?php echo $form->textField($model,'accompte', array(
				'onKeyUp' => "$(function () {
					var arrayKey = [96,97,98,99,100,101,102,103,104,105];
					if((event.keyCode >= 48 && event.keyCode <= 59) || event.keyCode == 8 || ($.inArray(event.keyCode, arrayKey) != -1)){

						var total = $('#BonEncaissement_montant').val();
						var accompte = $('#BonEncaissement_accompte').val();

						var reste = calculMontant(total,accompte);

						$('#BonEncaissement_reste').val(reste);
					}
				});"
			)); ?>
			<?php echo $form->error($model,'accompte'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'reste', array('class'=>'col-sm-3 control-label no-padding-right')); ?>
		<div class="col-sm-9">
			<?php echo $form->textField($model,'reste', array('readonly'=>'readonly')); ?>
			<?php echo $form->error($model,'reste'); ?>
		</div>
	</div>

	<div class="clearfix form-actions">
		<div class="col-md-offset-3 col-md-9">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Créer' : 'Sauver', array('class'=>'btn btn-info')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">
	function calculMontant(total,accompte){
		var reste = parseFloat(total) - parseFloat(accompte);
		return reste;
	}
</script>