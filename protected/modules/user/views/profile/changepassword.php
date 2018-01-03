<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Changer le mot de Passe");
$this->breadcrumbs=array(
	UserModule::t("Profil") => array('/user/profile'),
	UserModule::t("Changer le mot de passe"),
);
$this->menu=array(
	((UserModule::isAdmin())
		?array('label'=>UserModule::t('<i class="menu-icon fa fa-users"></i> Manage Users'), 'url'=>array('/user/admin'))
		:array('label'=>'')),
	((UserModule::isAdmin())
		?array('label'=>UserModule::t('<i class="menu-icon fa fa-list-alt"></i> Liste Utilisateur'), 'url'=>array('/user'))
		:array('label'=>'')),
    array('label'=>UserModule::t('<i class="menu-icon glyphicon glyphicon-user"></i> Profile'), 'url'=>array('/user/profile')),
    array('label'=>UserModule::t('<i class="menu-icon fa fa-pencil-square-o"></i> Modifier'), 'url'=>array('edit')),
    //array('label'=>UserModule::t('Logout'), 'url'=>array('/user/logout')),
);
?>

<div class="page-header">
	<h1><?php echo UserModule::t("Changer le mot de passe"); ?></h1>
</div>

<div class="col-xs-12">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'changepassword-form',
	'enableAjaxValidation'=>true,
	'htmlOptions' => array('class'=>'form-horizontal','enctype'=>'multipart/form-data'),
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note"><?php echo UserModule::t('Les champs avec <span class="required">*</span> sont obligatoires.'); ?></p>

	<?php echo $form->errorSummary($model); ?>
	
	<div class="form-group">
	<?php echo $form->labelEx($model,'oldPassword', array('label'=>'Ancien mot de passe', 'class'=>'col-sm-3 control-label no-padding-right')); ?>
		<div class="col-sm-9">
			<?php echo $form->passwordField($model,'oldPassword'); ?>
			<?php echo $form->error($model,'oldPassword'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'password', array('label'=>'Nouveau mot de passe', 'class'=>'col-sm-3 control-label no-padding-right')); ?>
		<div class="col-sm-9">
			<?php echo $form->passwordField($model,'password'); ?>
			<?php echo $form->error($model,'password'); ?>
			<p class="hint">
			<?php echo UserModule::t("Longueur minimale du mot de passe 4 symboles."); ?>
			</p>
		</div>
	</div>

	<div class="form-group">
	<?php echo $form->labelEx($model,'verifyPassword', array('label'=>'Confirmer le mot de passe', 'class'=>'col-sm-3 control-label no-padding-right')); ?>
		<div class="col-sm-9">
			<?php echo $form->passwordField($model,'verifyPassword'); ?>
			<?php echo $form->error($model,'verifyPassword'); ?>
		</div>
	</div>


	<div class="clearfix form-actions">
		<div class="col-md-offset-3 col-md-9">
			<?php echo CHtml::submitButton(UserModule::t("Sauver"), array('class'=>'btn btn-info')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->