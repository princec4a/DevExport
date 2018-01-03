<?php
/* @var $this ClientController */
/* @var $model Client */
/* @var $form CActiveForm */
?>
<div class="col-xs-12">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'client-form',
		'htmlOptions'=>array('class'=>'form-horizontal', 'role'=>'form', 'enctype'=>'multipart/form-data'),
		// Please note: When you enable ajax validation, make sure the corresponding
		// controller action is handling ajax validation correctly.
		// There is a call to performAjaxValidation() commented in generated controller code.
		// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation'=>false,
	)); ?>

		<p class="note">Les champs avec <span class="required">*</span> sont obligatoires.</p>

		<?php //echo $form->errorSummary($model); ?>

		<div class="form-group">
			<?php echo $form->labelEx($model,'code', array('class'=>'col-sm-3 control-label no-padding-right')); ?>
			<div class="col-sm-9">
				<?php $this->widget('zii.widgets.jui.CJuiAutoComplete',array(
					'model'=>$model,
					'attribute'=>'code',
					'source'=>Client::getListeData()	,
					'options'=>array(
						'minLength'=>'2',
						'select'=>"js:function(event, ui) {
								var numcpt = ui.item.value
								/*alert(numcpt);
								console.log(ui.item.value);*/
								if (numcpt!='') {
									$.ajax('".$this->createUrl('/processCustomer/client/getInfoClient')."', {
										dataType: 'json',
										method: 'POST',
										data: {
											code: numcpt
										}
									}).done(function(data) {
										//console.log(data);
										$('#Client_nom').val(data['nom']);
										$('#Client_prenom').val(data['prenom']);
										$('#Client_tel').val(data['tel']);
										$('#Client_email').val(data['email']);
										$('#Client_nom_societe').val(data['nom_societe']);
										$('#Client_adresse').val(data['adresse']);
									});
								}
							}",
					),
					'htmlOptions'=>array(
						'class'=>'col-xs-10 col-sm-5',
						'placeholder'=>'XXXXXXX',
					),
				));
				?>
				<?php echo $form->error($model,'code'); ?>
			</div>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'nom', array('class'=>'col-sm-3 control-label no-padding-right')); ?>
			<div class="col-sm-9">
				<?php echo $form->textField($model,'nom',array('size'=>60,'maxlength'=>255, 'class'=>'col-xs-10 col-sm-5', 'placeholder'=>'Nom')); ?>
				<?php echo $form->error($model,'nom'); ?>
			</div>

		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'prenom', array('class'=>'col-sm-3 control-label no-padding-right')); ?>
			<div class="col-sm-9">
				<?php echo $form->textField($model,'prenom',array('size'=>60,'maxlength'=>255, 'class'=>'col-xs-10 col-sm-5', 'placeholder'=>'Prenom')); ?>
				<?php echo $form->error($model,'prenom'); ?>
			</div>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'tel', array('label'=>'Téléphone','class'=>'col-sm-3 control-label no-padding-right')); ?>
			<div class="col-sm-9">
				<?php echo $form->textField($model,'tel',array('size'=>14,'maxlength'=>14, 'class'=>'col-xs-10 col-sm-5', 'placeholder'=>'242 000000000')); ?>
				<?php echo $form->error($model,'tel'); ?>
			</div>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'email', array('class'=>'col-sm-3 control-label no-padding-right')); ?>
			<div class="col-sm-9">
				<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255, 'class'=>'col-xs-10 col-sm-5', 'placeholder'=>'exemple@devexport.com')); ?>
				<?php echo $form->error($model,'email'); ?>
			</div>

		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'nom_societe', array('class'=>'col-sm-3 control-label no-padding-right')); ?>
			<div class="col-sm-9">
				<?php echo $form->textField($model,'nom_societe',array('size'=>60,'maxlength'=>255, 'class'=>'col-xs-10 col-sm-5', 'placeholder'=>'')); ?>
				<?php echo $form->error($model,'nom_societe'); ?>
			</div>

		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'adresse',  array('class'=>'col-sm-3 control-label no-padding-right')); ?>
			<div class="col-sm-9">
				<?php echo $form->textArea($model,'adresse',array('size'=>60,'maxlength'=>255, 'class'=>'col-xs-10 col-sm-5', 'placeholder'=>'Av. Xxxxxxxx, N° 00, Brazzaville Congo')); ?>
				<?php echo $form->error($model,'adresse'); ?>
			</div>

		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'numbc',  array('label'=>'N° Bon de Commande','class'=>'col-sm-3 control-label no-padding-right')); ?>
			<div class="col-sm-9">
				<?php echo $form->textField($model,'numbc',array('class'=>'col-xs-10 col-sm-5', 'placeholder'=>'XXXXXXXX')); ?>
				<?php $this->widget('CMultiFileUpload', array(
					'model'=>$model,
					'attribute'=>'bonDeCommande',
					'name' => 'fichier_bc',
					'accept' => 'jpeg|jpg|gif|png', // useful for verifying files
					'duplicate' => 'Ce fichier est déjà dans la liste!', // useful, i think
					'denied' => 'Type de fichier invalide', // useful, i think
					'htmlOptions'=>array('class'=>'col-sm-3 control-label no-padding-right'),
				));
				?>
				<?php echo $form->error($model,'numbc'); ?>
			</div>
		</div>
	<?php if(!$model->isNewRecord): ?>

		<div class="form-group">
			<?php echo $form->labelEx($model,'num_booking',  array('label'=>'N° Booking','class'=>'col-sm-3 control-label no-padding-right')); ?>
			<div class="col-sm-9">
				<?php echo $form->textField($model,'num_booking',array('class'=>'col-xs-10 col-sm-5', 'placeholder'=>'XXXXXXXX')); ?>
				<?php $this->widget('CMultiFileUpload', array(
					'model'=>$model,
					'attribute'=>'img_booking',
					'name' => 'fichier_booking',
					'accept' => 'jpeg|jpg|gif|png', // useful for verifying files
					'duplicate' => 'Ce fichier est déjà dans la liste!', // useful, i think
					'denied' => 'Type de fichier invalide', // useful, i think
					'htmlOptions'=>array('class'=>'col-sm-3 control-label no-padding-right'),
				));
				?>
				<?php echo $form->error($model,'num_booking'); ?>
			</div>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'nbr_conteneur',  array('label'=>'Nbr TC','class'=>'col-sm-3 control-label no-padding-right')); ?>
			<div class="col-sm-9">
				<?php echo $form->textField($model,'nbr_conteneur'); ?>
				<?php echo $form->error($model,'nbr_conteneur'); ?>
			</div>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'num_vgm',  array('label'=>'N° VGM','class'=>'col-sm-3 control-label no-padding-right')); ?>
			<div class="col-sm-9">
				<?php echo $form->textField($model,'num_vgm'); ?>
				<?php echo $form->error($model,'num_vgm'); ?>
			</div>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'num_plomb', array('label'=>'N°Plomb','class'=>'col-sm-3 control-label no-padding-right')); ?>
			<div class="col-sm-9">
				<?php echo $form->textField($model,'num_plomb',array('class'=>'col-xs-10 col-sm-5','size'=>60,'maxlength'=>255, 'placeholder'=>'XXXXXXXX')); ?>
				<?php echo $form->error($model,'num_plomb'); ?>
			</div>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'num_tc',  array('label'=>'N° TC','class'=>'col-sm-3 control-label no-padding-right')); ?>
			<div class="col-sm-9">
				<?php echo $form->textField($model,'num_tc',array('class'=>'col-xs-10 col-sm-5', 'placeholder'=>'XXXXXXXX')); ?>
				<?php $this->widget('CMultiFileUpload', array(
					'model'=>$model,
					'attribute'=>'img_tc',
					'name' => 'fichier_tc',
					'accept' => 'jpeg|jpg|gif|png', // useful for verifying files
					'duplicate' => 'Ce fichier est déjà dans la liste!', // useful, i think
					'denied' => 'Type de fichier invalide', // useful, i think
					'htmlOptions'=>array('class'=>'col-sm-3 control-label no-padding-right'),
				));
				?>
				<?php echo $form->error($model,'num_tc'); ?>
			</div>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'num_de',  array('label'=>'N° DE','class'=>'col-sm-3 control-label no-padding-right')); ?>
			<div class="col-sm-9">
				<?php echo $form->textField($model,'num_de',array('class'=>'col-xs-10 col-sm-5', 'placeholder'=>'XXXXXXXX')); ?>
				<?php $this->widget('CMultiFileUpload', array(
					'model'=>$model,
					'attribute'=>'img_de',
					'name' => 'fichier_de',
					'accept' => 'jpeg|jpg|gif|png', // useful for verifying files
					'duplicate' => 'Ce fichier est déjà dans la liste!', // useful, i think
					'denied' => 'Type de fichier invalide', // useful, i think
					'htmlOptions'=>array('class'=>'col-sm-3 control-label no-padding-right'),
				));
				?>
				<?php echo $form->error($model,'num_de'); ?>
			</div>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'num_co',  array('label'=>'N° CO','class'=>'col-sm-3 control-label no-padding-right')); ?>
			<div class="col-sm-9">
				<?php echo $form->textField($model,'num_co',array('class'=>'col-xs-10 col-sm-5', 'placeholder'=>'XXXXXXXX')); ?>
				<?php $this->widget('CMultiFileUpload', array(
					'model'=>$model,
					'attribute'=>'img_co',
					'name' => 'fichier_co',
					'accept' => 'jpeg|jpg|gif|png', // useful for verifying files
					'duplicate' => 'Ce fichier est déjà dans la liste!', // useful, i think
					'denied' => 'Type de fichier invalide', // useful, i think
					'htmlOptions'=>array('class'=>'col-sm-3 control-label no-padding-right'),
				));
				?>
				<?php echo $form->error($model,'num_co'); ?>
			</div>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'num_expertise',  array('label'=>'N° Expertise','class'=>'col-sm-3 control-label no-padding-right')); ?>
			<div class="col-sm-9">
				<?php echo $form->textField($model,'num_expertise',array('class'=>'col-xs-10 col-sm-5', 'placeholder'=>'XXXXXXXX')); ?>
				<?php $this->widget('CMultiFileUpload', array(
					'model'=>$model,
					'attribute'=>'img_expertise',
					'name' => 'fichier_expertise',
					'accept' => 'jpeg|jpg|gif|png', // useful for verifying files
					'duplicate' => 'Ce fichier est déjà dans la liste!', // useful, i think
					'denied' => 'Type de fichier invalide', // useful, i think
					'htmlOptions'=>array('class'=>'col-sm-3 control-label no-padding-right'),
				));
				?>
				<?php echo $form->error($model,'num_expertise'); ?>
			</div>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'num_facture',  array('label'=>'N° Facture','class'=>'col-sm-3 control-label no-padding-right')); ?>
			<div class="col-sm-9">
				<?php echo $form->textField($model,'num_facture',array('class'=>'col-xs-10 col-sm-5', 'placeholder'=>'XXXXXXXX')); ?>
				<?php $this->widget('CMultiFileUpload', array(
					'model'=>$model,
					'attribute'=>'img_facture',
					'name' => 'fichier_facture',
					'accept' => 'jpeg|jpg|gif|png', // useful for verifying files
					'duplicate' => 'Ce fichier est déjà dans la liste!', // useful, i think
					'denied' => 'Type de fichier invalide', // useful, i think
					'htmlOptions'=>array('class'=>'col-sm-3 control-label no-padding-right'),
				));
				?>
				<?php echo $form->error($model,'num_facture'); ?>
			</div>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'num_liste_colisage',  array('label'=>'N° Liste Colisage','class'=>'col-sm-3 control-label no-padding-right')); ?>
			<div class="col-sm-9">
				<?php echo $form->textField($model,'num_liste_colisage',array('class'=>'col-xs-10 col-sm-5', 'placeholder'=>'XXXXXXXX')); ?>
				<?php $this->widget('CMultiFileUpload', array(
					'model'=>$model,
					'attribute'=>'img_liste_colisage',
					'name' => 'fichier_lc',
					'accept' => 'jpeg|jpg|gif|png', // useful for verifying files
					'duplicate' => 'Ce fichier est déjà dans la liste!', // useful, i think
					'denied' => 'Type de fichier invalide', // useful, i think
					'htmlOptions'=>array('class'=>'col-sm-3 control-label no-padding-right'),
				));
				?>
				<?php echo $form->error($model,'num_liste_colisage'); ?>
			</div>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'num_bsc',  array('label'=>'N° BSC','class'=>'col-sm-3 control-label no-padding-right')); ?>
			<div class="col-sm-9">
				<?php echo $form->textField($model,'num_bsc',array('class'=>'col-xs-10 col-sm-5', 'placeholder'=>'XXXXXXXX')); ?>
				<?php $this->widget('CMultiFileUpload', array(
					'model'=>$model,
					'attribute'=>'img_bsc',
					'name' => 'fichier_bsc',
					'accept' => 'jpeg|jpg|gif|png', // useful for verifying files
					'duplicate' => 'Ce fichier est déjà dans la liste!', // useful, i think
					'denied' => 'Type de fichier invalide', // useful, i think
					'htmlOptions'=>array('class'=>'col-sm-3 control-label no-padding-right'),
				));
				?>
				<?php echo $form->error($model,'num_bsc'); ?>
			</div>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'bae', array('label'=>'BAE','class'=>'col-sm-3 control-label no-padding-right')); ?>
			<div class="col-sm-9">
				<?php echo $form->textField($model,'bae',array('size'=>60,'maxlength'=>255,'class'=>'col-xs-10 col-sm-5', 'placeholder'=>'XXXXXXXX')); ?>
				<?php $this->widget('CMultiFileUpload', array(
					'model'=>$model,
					'attribute'=>'img_bae',
					'name' => 'fichier_bae',
					'accept' => 'jpeg|jpg|gif|png', // useful for verifying files
					'duplicate' => 'Ce fichier est déjà dans la liste!', // useful, i think
					'denied' => 'Type de fichier invalide', // useful, i think
					'htmlOptions'=>array('class'=>'col-sm-3 control-label no-padding-right'),
				));
				?>
				<?php echo $form->error($model,'bae'); ?>
			</div>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'faux_bel', array('label'=>'Faux Bel','class'=>'col-sm-3 control-label no-padding-right')); ?>
			<div class="col-sm-9">
				<?php echo $form->textField($model,'faux_bel',array('class'=>'col-xs-10 col-sm-5','size'=>60,'maxlength'=>255, 'placeholder'=>'XXXXXXXX')); ?>
				<?php $this->widget('CMultiFileUpload', array(
					'model'=>$model,
					'attribute'=>'img_faux_bel',
					'name' => 'fichier_faux_bel',
					'accept' => 'jpeg|jpg|gif|png', // useful for verifying files
					'duplicate' => 'Ce fichier est déjà dans la liste!', // useful, i think
					'denied' => 'Type de fichier invalide', // useful, i think
					'htmlOptions'=>array('class'=>'col-sm-3 control-label no-padding-right'),
				));
				?>
				<?php echo $form->error($model,'faux_bel'); ?>
			</div>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'bul_liquidation', array('label'=>'Bulletin de Liquidation','class'=>'col-sm-3 control-label no-padding-right')); ?>
			<div class="col-sm-9">
				<?php echo $form->textField($model,'bul_liquidation',array('class'=>'col-xs-10 col-sm-5','size'=>60,'maxlength'=>255, 'placeholder'=>'XXXXXXXX')); ?>
				<?php $this->widget('CMultiFileUpload', array(
					'model'=>$model,
					'attribute'=>'img_bul_liquidation',
					'name' => 'fichier_bul_liquidation',
					'accept' => 'jpeg|jpg|gif|png', // useful for verifying files
					'duplicate' => 'Ce fichier est déjà dans la liste!', // useful, i think
					'denied' => 'Type de fichier invalide', // useful, i think
					'htmlOptions'=>array('class'=>'col-sm-3 control-label no-padding-right'),
				));
				?>
				<?php echo $form->error($model,'bul_liquidation'); ?>
			</div>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'travail_remunerer', array('label'=>'Travail rémunéré','class'=>'col-sm-3 control-label no-padding-right')); ?>
			<div class="col-sm-9">
				<?php echo $form->textField($model,'travail_remunerer',array('class'=>'col-xs-10 col-sm-5','size'=>60,'maxlength'=>255, 'placeholder'=>'XXXXXXXX')); ?>
				<?php $this->widget('CMultiFileUpload', array(
					'model'=>$model,
					'attribute'=>'img_travail_remunerer',
					'name' => 'fichier_travail_remunerer',
					'accept' => 'jpeg|jpg|gif|png', // useful for verifying files
					'duplicate' => 'Ce fichier est déjà dans la liste!', // useful, i think
					'denied' => 'Type de fichier invalide', // useful, i think
					'htmlOptions'=>array('class'=>'col-sm-3 control-label no-padding-right'),
				));
				?>
				<?php echo $form->error($model,'travail_remunerer'); ?>
			</div>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'page_info', array('label'=>'Page Info','class'=>'col-sm-3 control-label no-padding-right')); ?>
			<div class="col-sm-9">
				<?php echo $form->textField($model,'page_info',array('class'=>'col-xs-10 col-sm-5','size'=>60,'maxlength'=>255, 'placeholder'=>'XXXXXXXX')); ?>
				<?php $this->widget('CMultiFileUpload', array(
					'model'=>$model,
					'attribute'=>'img_page_info',
					'name' => 'fichier_page_info',
					'accept' => 'jpeg|jpg|gif|png', // useful for verifying files
					'duplicate' => 'Ce fichier est déjà dans la liste!', // useful, i think
					'denied' => 'Type de fichier invalide', // useful, i think
					'htmlOptions'=>array('class'=>'col-sm-3 control-label no-padding-right'),
				));
				?>
				<?php echo $form->error($model,'page_info'); ?>
			</div>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'certificat_empotage', array('label'=>'Certificat d\'empotage','class'=>'col-sm-3 control-label no-padding-right')); ?>
			<div class="col-sm-9">
				<?php echo $form->textField($model,'certificat_empotage',array('class'=>'col-xs-10 col-sm-5','size'=>60,'maxlength'=>255, 'placeholder'=>'XXXXXXXX')); ?>
				<?php $this->widget('CMultiFileUpload', array(
					'model'=>$model,
					'attribute'=>'img_certificat_empotage',
					'name' => 'fichier_certificat_empotage',
					'accept' => 'jpeg|jpg|gif|png', // useful for verifying files
					'duplicate' => 'Ce fichier est déjà dans la liste!', // useful, i think
					'denied' => 'Type de fichier invalide', // useful, i think
					'htmlOptions'=>array('class'=>'col-sm-3 control-label no-padding-right'),
				));
				?>
				<?php echo $form->error($model,'certificat_empotage'); ?>
			</div>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'declaration_douane', array('label'=>'Déclation de Douane','class'=>'col-sm-3 control-label no-padding-right')); ?>
			<div class="col-sm-9">
				<?php echo $form->textField($model,'declaration_douane',array('class'=>'col-xs-10 col-sm-5','size'=>60,'maxlength'=>255, 'placeholder'=>'XXXXXXXX')); ?>
				<?php $this->widget('CMultiFileUpload', array(
					'model'=>$model,
					'attribute'=>'img_declaration_douane',
					'name' => 'fichier_declaration_douane',
					'accept' => 'jpeg|jpg|gif|png', // useful for verifying files
					'duplicate' => 'Ce fichier est déjà dans la liste!', // useful, i think
					'denied' => 'Type de fichier invalide', // useful, i think
					'htmlOptions'=>array('class'=>'col-sm-3 control-label no-padding-right'),
				));
				?>
				<?php echo $form->error($model,'declaration_douane'); ?>
			</div>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'quitance_douane', array('label'=>'Quitance de Douane','class'=>'col-sm-3 control-label no-padding-right')); ?>
			<div class="col-sm-9">
				<?php echo $form->textField($model,'quitance_douane',array('class'=>'col-xs-10 col-sm-5','size'=>60,'maxlength'=>255, 'placeholder'=>'XXXXXXXX')); ?>
				<?php $this->widget('CMultiFileUpload', array(
					'model'=>$model,
					'attribute'=>'img_quitance_douane',
					'name' => 'fichier_quitance_douane',
					'accept' => 'jpeg|jpg|gif|png', // useful for verifying files
					'duplicate' => 'Ce fichier est déjà dans la liste!', // useful, i think
					'denied' => 'Type de fichier invalide', // useful, i think
					'htmlOptions'=>array('class'=>'col-sm-3 control-label no-padding-right'),
				));
				?>
				<?php echo $form->error($model,'quitance_douane'); ?>
			</div>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'recu_banq', array('label'=>'Reçu de Banque','class'=>'col-sm-3 control-label no-padding-right')); ?>
			<div class="col-sm-9">
				<?php echo $form->textField($model,'recu_banq',array('class'=>'col-xs-10 col-sm-5','size'=>60,'maxlength'=>255, 'placeholder'=>'XXXXXXXX')); ?>
				<?php $this->widget('CMultiFileUpload', array(
					'model'=>$model,
					'attribute'=>'img_recu_banq',
					'name' => 'fichier_recu_banq',
					'accept' => 'jpeg|jpg|gif|png', // useful for verifying files
					'duplicate' => 'Ce fichier est déjà dans la liste!', // useful, i think
					'denied' => 'Type de fichier invalide', // useful, i think
					'htmlOptions'=>array('class'=>'col-sm-3 control-label no-padding-right'),
				));
				?>
				<?php echo $form->error($model,'recu_banq'); ?>
			</div>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'bon_sortie_tc', array('label'=>'Bon de Sortie TC','class'=>'col-sm-3 control-label no-padding-right')); ?>
			<div class="col-sm-9">
				<?php echo $form->textField($model,'bon_sortie_tc',array('class'=>'col-xs-10 col-sm-5','size'=>60,'maxlength'=>255, 'placeholder'=>'XXXXXXXX')); ?>
				<?php $this->widget('CMultiFileUpload', array(
					'model'=>$model,
					'attribute'=>'img_bon_sortie_tc',
					'name' => 'fichier_bon_sortie_tc',
					'accept' => 'jpeg|jpg|gif|png', // useful for verifying files
					'duplicate' => 'Ce fichier est déjà dans la liste!', // useful, i think
					'denied' => 'Type de fichier invalide', // useful, i think
					'htmlOptions'=>array('class'=>'col-sm-3 control-label no-padding-right'),
				));
				?>
				<?php echo $form->error($model,'bon_sortie_tc'); ?>
			</div>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'interchange', array('class'=>'col-sm-3 control-label no-padding-right')); ?>
			<div class="col-sm-9">
				<?php echo $form->textField($model,'interchange',array('class'=>'col-xs-10 col-sm-5','size'=>60,'maxlength'=>255, 'placeholder'=>'XXXXXXXX')); ?>
				<?php $this->widget('CMultiFileUpload', array(
					'model'=>$model,
					'attribute'=>'img_interchange',
					'name' => 'fichier_interchange',
					'accept' => 'jpeg|jpg|gif|png', // useful for verifying files
					'duplicate' => 'Ce fichier est déjà dans la liste!', // useful, i think
					'denied' => 'Type de fichier invalide', // useful, i think
					'htmlOptions'=>array('class'=>'col-sm-3 control-label no-padding-right'),
				));
				?>
				<?php echo $form->error($model,'interchange'); ?>
			</div>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'ordre_transit', array('label'=>'Ordre de Transite','class'=>'col-sm-3 control-label no-padding-right')); ?>
			<div class="col-sm-9">
				<?php echo $form->textField($model,'ordre_transit',array('class'=>'col-xs-10 col-sm-5','size'=>60,'maxlength'=>255, 'placeholder'=>'XXXXXXXX')); ?>
				<?php $this->widget('CMultiFileUpload', array(
					'model'=>$model,
					'attribute'=>'img_ordre_transit',
					'name' => 'fichier_ordre_transit',
					'accept' => 'jpeg|jpg|gif|png', // useful for verifying files
					'duplicate' => 'Ce fichier est déjà dans la liste!', // useful, i think
					'denied' => 'Type de fichier invalide', // useful, i think
					'htmlOptions'=>array('class'=>'col-sm-3 control-label no-padding-right'),
				));
				?>
				<?php echo $form->error($model,'ordre_transit'); ?>
			</div>
		</div>

	<?php endif; ?>

		<div class="clearfix form-actions">
			<div class="col-md-offset-3 col-md-9">
				<?php echo CHtml::submitButton($model->isNewRecord ? ' Sauvegarder' : 'Sauvegarder', array('class'=>'btn btn-info')); ?>
			</div>
		</div>

	<?php $this->endWidget(); ?>

</div>