<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Profil");
$this->breadcrumbs=array(
	UserModule::t("Profil")=>array('profile'),
	UserModule::t("Edit"),
);
$this->menu=array(
	((UserModule::isAdmin())
		?array('label'=>UserModule::t('<i class="menu-icon fa fa-users"></i> Manage Users'), 'url'=>array('/user/admin'))
		:array('label'=>'')),
	((UserModule::isAdmin())
		?array('label'=>UserModule::t('<i class="menu-icon fa fa-list-alt"></i> Liste Utilisateur'), 'url'=>array('/user'))
		:array('label'=>'')),
    array('label'=>UserModule::t('<i class="menu-icon glyphicon glyphicon-user"></i> Profil'), 'url'=>array('/user/profile')),
    array('label'=>UserModule::t('<i class="menu-icon glyphicon glyphicon-cog"></i> Changer de mot de passe'), 'url'=>array('changepassword')),
    //array('label'=>UserModule::t('Logout'), 'url'=>array('/user/logout')),
);
?>
<div class="page-header">
	<h1><?php echo UserModule::t('Modification du profil'); ?></h1>
</div>

<div class="col-xs-12">

	<?php if(Yii::app()->user->hasFlash('profileMessage')): ?>
	<div class="success">
	<?php echo Yii::app()->user->getFlash('profileMessage'); ?>
	</div>
	<?php endif; ?>
	<div class="form">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'profile-form',
		'enableAjaxValidation'=>true,
		'htmlOptions' => array('class'=>'form-horizontal','enctype'=>'multipart/form-data'),
	)); ?>

		<p class="note"><?php echo UserModule::t('Les champs avec <span class="required">*</span> sont obligatoires.'); ?></p>

		<?php echo $form->errorSummary(array($model,$profile)); ?>

	<?php
			$profileFields=$profile->getFields();
			if ($profileFields) {
				foreach($profileFields as $field) {
					if($field->varname == 'firstname') $var = 'Nom';
					if($field->varname == 'lastname') $var = 'Prenom';
				?>
		<div class="form-group">
			<?php echo $form->labelEx($profile,$field->varname, array('label'=>$var,'class'=>'col-sm-3 control-label no-padding-right'));
			?>
			<div class="col-sm-9">
				<?php
				if ($widgetEdit = $field->widgetEdit($profile)) {
					echo $widgetEdit;
				} elseif ($field->range) {
					echo $form->dropDownList($profile,$field->varname,Profile::range($field->range));
				} elseif ($field->field_type=="TEXT") {
					echo $form->textArea($profile,$field->varname,array('rows'=>6, 'cols'=>50));
				} else {
					echo $form->textField($profile,$field->varname,array('size'=>60,'maxlength'=>(($field->field_size)?$field->field_size:255)));
				}
				echo $form->error($profile,$field->varname); ?>
			</div>
		</div>
				<?php
				}
			}
	?>
		<div class="form-group">
			<?php echo $form->labelEx($model,'username', array('label'=>'Identifiant', 'class'=>'col-sm-3 control-label no-padding-right')); ?>
			<div class="col-sm-9">
				<?php echo $form->textField($model,'username',array('size'=>20,'maxlength'=>20)); ?>
				<?php echo $form->error($model,'username'); ?>
			</div>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'email', array('label'=>'E-mail', 'class'=>'col-sm-3 control-label no-padding-right')); ?>
			<div class="col-sm-9">
				<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128)); ?>
				<?php echo $form->error($model,'email'); ?>
			</div>
		</div>

		<div class="clearfix form-actions">
			<div class="col-md-offset-3 col-md-9">
				<?php echo CHtml::submitButton($model->isNewRecord ? UserModule::t('Créer') : UserModule::t('Sauver'), array('class'=>'btn btn-info')); ?>
			</div>
		</div>

	<?php $this->endWidget(); ?>

</div><!-- form -->
