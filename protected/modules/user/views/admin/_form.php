<div class="col-xs-12">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>true,
	'htmlOptions' => array('class'=>'form-horizontal', 'role'=>'form','enctype'=>'multipart/form-data'),
));
?>

	<p class="note"><?php echo UserModule::t('Les champs portant <span class="required">*</span> sont requis.'); ?></p>

	<?php echo $form->errorSummary(array($model,$profile)); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'username', array('label'=>'Identifiant','class'=>'col-sm-3 control-label no-padding-right')); ?>
		<div class="col-sm-9">
			<?php echo $form->textField($model,'username',array('size'=>20,'maxlength'=>20, 'class'=>'col-xs-10 col-sm-5')); ?>
			<?php echo $form->error($model,'username'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'password', array('label'=>'Mot de passes','class'=>'col-sm-3 control-label no-padding-right')); ?>
		<div class="col-sm-9">
			<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>128, 'class'=>'col-xs-10 col-sm-5')); ?>
			<?php echo $form->error($model,'password'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'email', array('class'=>'col-sm-3 control-label no-padding-right')); ?>
		<div class="col-sm-9">
			<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128, 'class'=>'col-xs-10 col-sm-5')); ?>
			<?php echo $form->error($model,'email'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'superuser', array('label'=>'Super utilisateur ?','class'=>'col-sm-3 control-label no-padding-right')); ?>
		<div class="col-sm-9">
			<?php echo $form->dropDownList($model,'superuser',User::itemAlias('AdminStatus')); ?>
			<?php echo $form->error($model,'superuser'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'status', array('label'=>'Statut','class'=>'col-sm-3 control-label no-padding-right')); ?>
		<div class="col-sm-9">
			<?php echo $form->dropDownList($model,'status',User::itemAlias('UserStatus')); ?>
			<?php echo $form->error($model,'status'); ?>
		</div>
	</div>
<?php 
		$profileFields=$profile->getFields();
		if ($profileFields) {
			$var = '';
			foreach($profileFields as $field) {
				if($field->varname == 'firstname') $var = 'Nom';
				if($field->varname == 'lastname') $var = 'Prenom';
			?>
	<div class="form-group">
		<?php echo $form->labelEx($profile,$field->varname,array('label'=>$var ,'class'=>'col-sm-3 control-label no-padding-right')); ?>
		<div class="col-sm-9">
			<?php
			if ($widgetEdit = $field->widgetEdit($profile)) {
				echo $widgetEdit;
			} elseif ($field->range) {
				echo $form->dropDownList($profile,$field->varname,Profile::range($field->range));
			} elseif ($field->field_type=="TEXT") {
				echo CHtml::activeTextArea($profile,$field->varname,array('rows'=>6, 'cols'=>50));
			} else {
				echo $form->textField($profile,$field->varname,array('size'=>60,'maxlength'=>(($field->field_size)?$field->field_size:255)));
			}
			 ?>
			<?php echo $form->error($profile,$field->varname); ?>
		</div>
	</div>
			<?php
			}
		}
?>
	<div class="clearfix form-actions">
		<div class="col-md-offset-3 col-md-9">
			<?php echo CHtml::submitButton($model->isNewRecord ? UserModule::t('Créer') : UserModule::t('Sauver'), array('class'=>'btn btn-info')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->