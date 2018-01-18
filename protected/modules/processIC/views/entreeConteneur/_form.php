<?php
/* @var $this EntreeConteneurController */
/* @var $model EntreeConteneur */
/* @var $form CActiveForm */
?>

<div class="col-xs-12">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'entree-conteneur-form',
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

	<div class="form-group">
		<?php echo $form->labelEx($model,'id_sortie_conteneur', array('label'=>'N° Sortie Conteneur','class'=>'col-sm-3 control-label no-padding-right')); ?>
		<div class="col-sm-9">
			<?php echo $form->textField($model,'id_sortie_conteneur', array('class'=>'col-xs-10 col-sm-5')); ?>
			<?php echo $form->error($model,'id_sortie_conteneur'); ?>
		</div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'poid_reel', array('class'=>'col-sm-3 control-label no-padding-right')); ?>
		<div class="col-sm-9">
			<?php echo $form->textField($model,'poid_reel', array('class'=>'col-xs-10 col-sm-5')); ?>
			<?php echo $form->error($model,'poid_reel'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'num_eir', array('class'=>'col-sm-3 control-label no-padding-right')); ?>
		<div class="col-sm-9">
			<?php echo $form->textField($model,'num_eir', array('class'=>'col-xs-10 col-sm-5')); ?>
			<?php echo $form->error($model,'num_eir'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'date_entree_tc', array('class'=>'col-sm-3 control-label no-padding-right')); ?>
		<div class="col-sm-9">
			<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
				'model' => $model,
				'attribute' => 'date_entree_tc',
				'options' => array(
					'showAnim' => 'fold',
					'dateFormat' => 'dd-mm-yy',
				),
				'htmlOptions' => array(
					'class'=>'',
				),
			)); ?>
			<?php echo $form->error($model,'date_entree_tc'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'date_livraison', array('class'=>'col-sm-3 control-label no-padding-right')); ?>
		<div class="col-sm-9">
			<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
				'model' => $model,
				'attribute' => 'date_livraison',
				'options' => array(
					'showAnim' => 'fold',
					'dateFormat' => 'dd-mm-yy',
				),
				'htmlOptions' => array(
					'class'=>'',
				),
			)); ?>
			<?php echo $form->error($model,'date_livraison'); ?>
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
		<?php echo $form->labelEx($model,'chauffeur', array('class'=>'col-sm-3 control-label no-padding-right')); ?>
		<div class="col-sm-9">
			<?php echo $form->textField($model,'chauffeur',array('size'=>60,'maxlength'=>255, 'class'=>'col-xs-10 col-sm-5')); ?>
			<?php echo $form->error($model,'chauffeur'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'site', array('class'=>'col-sm-3 control-label no-padding-right')); ?>
		<div class="col-sm-9">
			<?php echo $form->textField($model,'site',array('size'=>60,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'site'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'heure_fin_empotage', array('class'=>'col-sm-3 control-label no-padding-right')); ?>
		<div class="col-sm-9">
			<?php echo $form->textField($model,'heure_fin_empotage', array('class'=>'col-xs-10 col-sm-5')); ?>
			<?php echo $form->error($model,'heure_fin_empotage'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'num_plomb', array('label'=>'N° Plomb','class'=>'col-sm-3 control-label no-padding-right')); ?>
		<div class="col-sm-9">
			<?php echo $form->textField($model,'num_plomb',array('size'=>60,'maxlength'=>255, 'class'=>'col-xs-10 col-sm-5')); ?>
			<?php echo $form->error($model,'num_plomb'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'poid_brut', array('class'=>'col-sm-3 control-label no-padding-right')); ?>
		<div class="col-sm-9">
			<?php echo $form->textField($model,'poid_brut', array('class'=>'col-xs-10 col-sm-5')); ?>
			<?php echo $form->error($model,'poid_brut'); ?>
		</div>
	</div>

	<div class="clearfix form-actions">
		<div class="col-md-offset-3 col-md-9">
			<?php echo CHtml::submitButton($model->isNewRecord ? ' Sauvegarder' : 'Sauvegarder', array('class'=>'btn btn-info')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->