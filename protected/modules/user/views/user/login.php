<?php
$this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Login");
$this->breadcrumbs=array(
	UserModule::t("Login"),
);
?>

<?php if(Yii::app()->user->hasFlash('loginMessage')): ?>

<div class="success">
	<?php echo Yii::app()->user->getFlash('loginMessage'); ?>
</div>

<?php endif; ?>


<div class="form">
<?php echo CHtml::beginForm(); ?>
	
	<?php echo CHtml::errorSummary($model); ?>

	<fieldset>
		<label class="block clearfix">
			<span class="block input-icon input-icon-right">
				<?php echo CHtml::activeTextField($model,'username', array('class'=>'form-control' , 'placeholder'=>'identifiant')) ?>
				<i class="ace-icon fa fa-user"></i>
			</span>
		</label>

		<label class="block clearfix">
			<span class="block input-icon input-icon-right">
				<?php echo CHtml::activePasswordField($model,'password', array('class'=>'form-control' , 'placeholder'=>'mot de passe')) ?>
				<i class="ace-icon fa fa-lock"></i>
			</span>
		</label>

		<div class="space"></div>

		<div class="clearfix">
			<label class="inline">
				<input type="checkbox" class="ace" />
				<?php echo CHtml::activeCheckBox($model,'rememberMe'); ?>
				<?php echo CHtml::activeLabelEx($model,'rememberMe', array('label'=>'se souvenir de Moi', 'class'=>'lbl')); ?>
			</label>

			<?php echo CHtml::submitButton(UserModule::t("Connexion"), array('class'=>'width-35 pull-right btn btn-sm btn-primary')); ?>
		</div>
	</fieldset>
<?php echo CHtml::endForm(); ?>
</div><!-- form -->


<?php
$form = new CForm(array(
    'elements'=>array(
        'username'=>array(
            'type'=>'text',
            'maxlength'=>32,
        ),
        'password'=>array(
            'type'=>'password',
            'maxlength'=>32,
        ),
        'rememberMe'=>array(
            'type'=>'checkbox',
        )
    ),

    'buttons'=>array(
        'login'=>array(
            'type'=>'submit',
            'label'=>'Login',
        ),
    ),
), $model);
?>
