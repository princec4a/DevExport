<?php
/* @var $this DevisAController */
/* @var $model DevisA */
/* @var $form CActiveForm */
?>


<div class="col-xs-12">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'devis-a-form',
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

	<div class="form-group <?=(isset($error) && !empty($error)) ? 'has-error' : '' ?>">
		<?php echo $form->labelEx($model,'id_dossier', array('label'=>'N° Booking', 'class'=>'col-sm-3 control-label no-padding-right')); ?>
		<div class="col-sm-9">
			<?php echo $form->textField($model,'id_dossier', array('class'=>'col-xs-10 col-sm-5')); ?>
			<?php echo $form->error($model,'id_dossier'); ?>
			<?php /* ?>
			<?php echo CHtml::ajaxButton('Rechercher',CHtml::normalizeUrl(array('devisA/search','render'=>true)),
				array(
					'dataType'=>'json',
					'type'=>'post',
					'data'=>'js:{
						"booking": $("#DevisA_id").val(),
					}',
					'success'=>'function(data) {
						console.log(data);
						if(data["id_dossier"] > 0){
							$("#DevisA_id_dossier").val(data["id_dossier"]);
							$("#form-devisA").show("slow");
						}
						else{
							alert("Ce booking existe pas, veuillez saisir le bon numéro de booking svp !!!");
							$("#DevisA_id").val("");
						}
                    }',
					'beforeSend'=>'function(){
                       $("#AjaxLoader").show();
                    }',
					'complete' => 'function() {
					  $("#AjaxLoader").hide();
					}',
				), array('class'=>'btn btn-sm btn-primary')); ?>
			<span id="AjaxLoader"><i class="ace-icon fa fa-spinner fa-spin orange bigger-180"></i></span>
 			<?php */ ?>
		</div>
	</div>

	<!-- <div id="form-devisA"> -->
		<div class="form-group">
			<?php echo $form->labelEx($model,'autorise_par', array('label'=>'Autorisé  Par Mr/Mme', 'class'=>'col-sm-3 control-label no-padding-right')); ?>
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
			<div class="col-sm-9">Pour les frais de dossiers administratifs à savoir :</div>
		</div>

		<div class="row">

			<div class="col-xs-6 col-sm-4">
				<div class="form-group">
					<?php echo $form->labelEx($model,'bsc', array('label'=>'BSC', 'class'=>'col-sm-3 control-label no-padding-right')); ?>
					<div class="col-sm-9">
						<?php echo $form->textField($model,'bsc', array('value'=>0,
							'onKeyUp' => "$(function () {
									var arrayKey = [96,97,98,99,100,101,102,103,104,105];
									if((event.keyCode >= 48 && event.keyCode <= 59) || event.keyCode == 8 || ($.inArray(event.keyCode, arrayKey) != -1)){

										var bsc = $('#DevisA_bsc').val();
										var co = $('#DevisA_co').val();
										var de = $('#DevisA_de').val();
										var cexp = $('#DevisA_c_exp').val();
										var frais = $('#DevisA_frais_saisie').val();
										var trans = $('#DevisA_trans').val();

										var montant = calculMontant(bsc,co,de,cexp,frais,trans);

										$('#DevisA_montant').val(montant);
									}
								});",
						)); ?>
						<?php echo $form->error($model,'bsc'); ?>
					</div>
				</div>
				<div class="form-group">
					<?php echo $form->labelEx($model,'co', array('label'=>'C.O', 'class'=>'col-sm-3 control-label no-padding-right')); ?>
					<div class="col-sm-9">
						<?php echo $form->textField($model,'co', array('value'=>0,
							'onKeyUp' => "$(function () {
									var arrayKey = [96,97,98,99,100,101,102,103,104,105];
									if((event.keyCode >= 48 && event.keyCode <= 59) || event.keyCode == 8 || ($.inArray(event.keyCode, arrayKey) != -1)){

										var bsc = $('#DevisA_bsc').val();
										var co = $('#DevisA_co').val();
										var de = $('#DevisA_de').val();
										var cexp = $('#DevisA_c_exp').val();
										var frais = $('#DevisA_frais_saisie').val();
										var trans = $('#DevisA_trans').val();

										var montant = calculMontant(bsc,co,de,cexp,frais,trans);

										$('#DevisA_montant').val(montant);
									}
								});"
						)); ?>
						<?php echo $form->error($model,'co'); ?>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-sm-4">
				<div class="form-group">
					<?php echo $form->labelEx($model,'de', array('label'=>'D.E', 'class'=>'col-sm-3 control-label no-padding-right')); ?>
					<div class="col-sm-9">
						<?php echo $form->textField($model,'de', array('value'=>0,
							'onKeyUp' => "$(function () {
									var arrayKey = [96,97,98,99,100,101,102,103,104,105];
									if((event.keyCode >= 48 && event.keyCode <= 59) || event.keyCode == 8 || ($.inArray(event.keyCode, arrayKey) != -1)){

										var bsc = $('#DevisA_bsc').val();
										var co = $('#DevisA_co').val();
										var de = $('#DevisA_de').val();
										var cexp = $('#DevisA_c_exp').val();
										var frais = $('#DevisA_frais_saisie').val();
										var trans = $('#DevisA_trans').val();

										var montant = calculMontant(bsc,co,de,cexp,frais,trans);

										$('#DevisA_montant').val(montant);
									}
								});"
						)); ?>
						<?php echo $form->error($model,'de'); ?>
					</div>
				</div>
				<div class="form-group">
					<?php echo $form->labelEx($model,'c_exp', array('label'=>'C.EXP', 'class'=>'col-sm-3 control-label no-padding-right')); ?>
					<div class="col-sm-9">
						<?php echo $form->textField($model,'c_exp', array('value'=>0,
							'onKeyUp' => "$(function () {
									var arrayKey = [96,97,98,99,100,101,102,103,104,105];
									if((event.keyCode >= 48 && event.keyCode <= 59) || event.keyCode == 8 || ($.inArray(event.keyCode, arrayKey) != -1)){

										var bsc = $('#DevisA_bsc').val();
										var co = $('#DevisA_co').val();
										var de = $('#DevisA_de').val();
										var cexp = $('#DevisA_c_exp').val();
										var frais = $('#DevisA_frais_saisie').val();
										var trans = $('#DevisA_trans').val();

										var montant = calculMontant(bsc,co,de,cexp,frais,trans);

										$('#DevisA_montant').val(montant);
									}
								});"
						)); ?>
						<?php echo $form->error($model,'c_exp'); ?>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-sm-4">
				<div class="form-group">
					<?php echo $form->labelEx($model,'frais_saisie', array('label'=>'Frais de saisie', 'class'=>'col-sm-3 control-label no-padding-right')); ?>
					<div class="col-sm-9">
						<?php echo $form->textField($model,'frais_saisie', array('value'=>0,
							'onKeyUp' => "$(function () {
									var arrayKey = [96,97,98,99,100,101,102,103,104,105];
									if((event.keyCode >= 48 && event.keyCode <= 59) || event.keyCode == 8 || ($.inArray(event.keyCode, arrayKey) != -1)){

										var bsc = $('#DevisA_bsc').val();
										var co = $('#DevisA_co').val();
										var de = $('#DevisA_de').val();
										var cexp = $('#DevisA_c_exp').val();
										var frais = $('#DevisA_frais_saisie').val();
										var trans = $('#DevisA_trans').val();

										var montant = calculMontant(bsc,co,de,cexp,frais,trans);

										$('#DevisA_montant').val(montant);
									}
								});"
						)); ?>
						<?php echo $form->error($model,'frais_saisie'); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo $form->labelEx($model,'trans', array('label'=>'Trans', 'class'=>'col-sm-3 control-label no-padding-right')); ?>
					<div class="col-sm-9">
						<?php echo $form->textField($model,'trans', array('value'=>0,
							'onKeyUp' => "$(function () {
									var arrayKey = [96,97,98,99,100,101,102,103,104,105];
									if((event.keyCode >= 48 && event.keyCode <= 59) || event.keyCode == 8 || ($.inArray(event.keyCode, arrayKey) != -1)){

										var bsc = $('#DevisA_bsc').val();
										var co = $('#DevisA_co').val();
										var de = $('#DevisA_de').val();
										var cexp = $('#DevisA_c_exp').val();
										var frais = $('#DevisA_frais_saisie').val();
										var trans = $('#DevisA_trans').val();

										var montant = calculMontant(bsc,co,de,cexp,frais,trans);

										$('#DevisA_montant').val(parseFloat(montant));
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

	<!-- </div> -->
<?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">
	function calculMontant(bsc,co,de,cexp,frais,trans){
		var montant = parseFloat(bsc) + parseFloat(co) + parseFloat(de) + parseFloat(cexp) + parseFloat(frais) + parseFloat(trans);
		return montant;
	}
</script>