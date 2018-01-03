<?php
/* @var $this DevisDController */
/* @var $model DevisD */
/* @var $form CActiveForm */
?>

<div class="col-xs-12">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'devis-d-form',
	'htmlOptions'=>array('class'=>'form-horizontal', 'role'=>'form', 'enctype'=>'multipart/form-data'),
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Les champs avec <span class="required">*</span> sont obligatoires.</p>

	<?php echo $form->errorSummary($model); ?>
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

	<div class="form-group <?=(isset($error) && !empty($error)) ? 'has-error' : '' ?>">
		<?php echo $form->labelEx($model,'id_devis_a', array('label'=>'N° Devis A', 'class'=>'col-sm-3 control-label no-padding-right')); ?>
		<div class="col-sm-9">
			<?php echo $form->textField($model,'id_devis_a'); ?>
			<?php echo $form->error($model,'id_devis_a'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'num_bul_liquidation', array('label'=>'N° Bulletin de Liquidation', 'class'=>'col-sm-3 control-label no-padding-right')); ?>
		<div class="col-sm-9">
			<?php echo $form->textField($model,'num_bul_liquidation'); ?>
			<?php echo $form->error($model,'num_bul_liquidation'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'autorise_par', array('label'=>'Autoriser Par', 'class'=>'col-sm-3 control-label no-padding-right')); ?>
		<div class="col-sm-9">
			<?php $this->widget('ext.select2.XSelect2', array(
				'model'=>$model,
				'attribute'=>'autorise_par',
				'data'=>User::getListeData(),
				'htmlOptions'=>array(
					'style'=>'width:50%;',
				),
			));?>
			<?php echo $form->error($model,'autorise_par'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'montant', array('label'=>'Le décaissement d’un montant  de', 'class'=>'col-sm-3 control-label no-padding-right')); ?>
		<div class="col-sm-9">
			<?php echo $form->textField($model,'montant', array('readonly'=>'readonly', 'class'=>'col-xs-10 col-sm-5')); ?>&nbsp;<span>FCFA</span>
			<?php echo $form->error($model,'montant'); ?>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right">&nbsp;</label>
		<div class="col-sm-9">Pour les frais de dossiers douanes à savoir :</div>
	</div>

	<div class="row">

		<div class="col-xs-6 col-sm-4">
			<div class="form-group">
				<?php echo $form->labelEx($model,'dd', array('label'=>'D.D', 'class'=>'col-sm-3 control-label no-padding-right')); ?>
				<div class="col-sm-9">
					<?php echo $form->textField($model,'dd', array(
						'onKeyUp' => "$(function () {
							var arrayKey = [96,97,98,99,100,101,102,103,104,105];
							if((event.keyCode >= 48 && event.keyCode <= 59) || event.keyCode == 8 || ($.inArray(event.keyCode, arrayKey) != -1)){

								var dd = $('#DevisD_dd').val();
								var teli = $('#DevisD_tel_i').val();
								var tr = $('#DevisD_tr').val();
								var frais = $('#DevisD_frais_saisie_btf').val();
								var sortie = $('#DevisD_sortie_tc_d').val();
								var trans = $('#DevisD_trans').val();

								var montant = calculMontant(dd,teli,tr,sortie,frais,trans);

								$('#DevisD_montant').val(montant);
							}
						});",
					)); ?>
					<?php echo $form->error($model,'dd'); ?>
				</div>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'tel_i', array('label'=>'TEL I', 'class'=>'col-sm-3 control-label no-padding-right')); ?>
				<div class="col-sm-9">
					<?php echo $form->textField($model,'tel_i', array(
						'onKeyUp' => "$(function () {
							var arrayKey = [96,97,98,99,100,101,102,103,104,105];
							if((event.keyCode >= 48 && event.keyCode <= 59) || event.keyCode == 8 || ($.inArray(event.keyCode, arrayKey) != -1)){

								var dd = $('#DevisD_dd').val();
								var teli = $('#DevisD_tel_i').val();
								var tr = $('#DevisD_tr').val();
								var frais = $('#DevisD_frais_saisie_btf').val();
								var sortie = $('#DevisD_sortie_tc_d').val();
								var trans = $('#DevisD_trans').val();

								var montant = calculMontant(dd,teli,tr,sortie,frais,trans);

								$('#DevisD_montant').val(montant);
							}
						});",
					)); ?>
					<?php echo $form->error($model,'tel_i'); ?>
				</div>
			</div>
		</div>
		<div class="col-xs-6 col-sm-4">
			<div class="form-group">
				<?php echo $form->labelEx($model,'tr', array('label'=>'TR', 'class'=>'col-sm-3 control-label no-padding-right')); ?>
				<div class="col-sm-9">
					<?php echo $form->textField($model,'tr', array(
						'onKeyUp' => "$(function () {
							var arrayKey = [96,97,98,99,100,101,102,103,104,105];
							if((event.keyCode >= 48 && event.keyCode <= 59) || event.keyCode == 8 || ($.inArray(event.keyCode, arrayKey) != -1)){

								var dd = $('#DevisD_dd').val();
								var teli = $('#DevisD_tel_i').val();
								var tr = $('#DevisD_tr').val();
								var frais = $('#DevisD_frais_saisie_btf').val();
								var sortie = $('#DevisD_sortie_tc_d').val();
								var trans = $('#DevisD_trans').val();

								var montant = calculMontant(dd,teli,tr,sortie,frais,trans);

								$('#DevisD_montant').val(montant);
							}
						});",
					)); ?>
					<?php echo $form->error($model,'tr'); ?>
				</div>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'frais_saisie_btf', array('label'=>'Frais de saisie BTF', 'class'=>'col-sm-3 control-label no-padding-right')); ?>
				<div class="col-sm-9">
					<?php echo $form->textField($model,'frais_saisie_btf', array(
						'onKeyUp' => "$(function () {
							var arrayKey = [96,97,98,99,100,101,102,103,104,105];
							if((event.keyCode >= 48 && event.keyCode <= 59) || event.keyCode == 8 || ($.inArray(event.keyCode, arrayKey) != -1)){

								var dd = $('#DevisD_dd').val();
								var teli = $('#DevisD_tel_i').val();
								var tr = $('#DevisD_tr').val();
								var frais = $('#DevisD_frais_saisie_btf').val();
								var sortie = $('#DevisD_sortie_tc_d').val();
								var trans = $('#DevisD_trans').val();

								var montant = calculMontant(dd,teli,tr,sortie,frais,trans);

								$('#DevisD_montant').val(montant);
							}
						});",
					)); ?>
					<?php echo $form->error($model,'frais_saisie_btf'); ?>
				</div>
			</div>
		</div>

		<div class="col-xs-6 col-sm-4">
			<div class="form-group">
				<?php echo $form->labelEx($model,'sortie_tc_d', array('label'=>'Sortie  TC D.', 'class'=>'col-sm-3 control-label no-padding-right')); ?>
				<div class="col-sm-9">
					<?php echo $form->textField($model,'sortie_tc_d', array(
						'onKeyUp' => "$(function () {
							var arrayKey = [96,97,98,99,100,101,102,103,104,105];
							if((event.keyCode >= 48 && event.keyCode <= 59) || event.keyCode == 8 || ($.inArray(event.keyCode, arrayKey) != -1)){

								var dd = $('#DevisD_dd').val();
								var teli = $('#DevisD_tel_i').val();
								var tr = $('#DevisD_tr').val();
								var frais = $('#DevisD_frais_saisie_btf').val();
								var sortie = $('#DevisD_sortie_tc_d').val();

								var montant = calculMontant(dd,teli,tr,sortie,frais);

								$('#DevisD_montant').val(montant);
							}
						});",
					)); ?>
					<?php echo $form->error($model,'sortie_tc_d'); ?>
				</div>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model,'trans', array('class'=>'col-sm-3 control-label no-padding-right')); ?>
				<div class="col-sm-9">
					<?php echo $form->textField($model,'trans', array(
						'onKeyUp' => "$(function () {
									var arrayKey = [96,97,98,99,100,101,102,103,104,105];
									if((event.keyCode >= 48 && event.keyCode <= 59) || event.keyCode == 8 || ($.inArray(event.keyCode, arrayKey) != -1)){

										var dd = $('#DevisD_dd').val();
										var teli = $('#DevisD_tel_i').val();
										var tr = $('#DevisD_tr').val();
										var frais = $('#DevisD_frais_saisie_btf').val();
										var sortie = $('#DevisD_sortie_tc_d').val();
										var trans = $('#DevisD_trans').val();

										var montant = calculMontant(dd,teli,tr,sortie,frais,trans);

										$('#DevisD_montant').val(montant);
									}
								});"
					)); ?>
					<?php echo $form->error($model,'trans'); ?>
				</div>
			</div>
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
	function calculMontant(dd,teli,tr,sortie,frais,trans){
		var montant = parseFloat(dd) + parseFloat(teli) + parseFloat(tr) + parseFloat(sortie) + parseFloat(frais) + parseFloat(trans);
		return montant;
	}
</script>