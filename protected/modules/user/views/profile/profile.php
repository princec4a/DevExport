<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Profil");
$this->breadcrumbs=array(
	UserModule::t("Profil"),
);
$this->menu=array(
	((UserModule::isAdmin())
		?array('label'=>UserModule::t('<i class="menu-icon fa fa-users"></i> Manage Users'), 'url'=>array('/user/admin'))
		:array('label'=>'')),
	((UserModule::isAdmin())
		?array('label'=>UserModule::t('<i class="menu-icon fa fa-list-alt"></i> Liste Utilisateur'), 'url'=>array('/user'))
		:array('label'=>'')),
    array('label'=>UserModule::t('<i class="menu-icon fa fa-pencil-square-o"></i> Modifier'), 'url'=>array('edit')),
    array('label'=>UserModule::t('<i class="menu-icon glyphicon glyphicon-cog"></i> Changer de mot de passe'), 'url'=>array('changepassword')),
    //array('label'=>UserModule::t('Logout'), 'url'=>array('/user/logout')),
);
?>
<div class="page-header">
	<h1><?php echo UserModule::t('Votre profil'); ?></h1>
</div>

<div class="col-xs-12">

<?php if(Yii::app()->user->hasFlash('profileMessage')): ?>
<div class="success">
	<?php echo Yii::app()->user->getFlash('profileMessage'); ?>
</div>
<?php endif; ?>
	<table class="dataGrid" style="font-size: 20px;">
		<tr>
			<th style="font-size: 20px; ; background-color: #ABBAC3; color: #FFF; padding: 5px;"><?php echo CHtml::encode('Identifiant'); ?></th>
			<td style="padding: 5px;"><?php echo CHtml::encode($model->username); ?></td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<?php
			$profileFields=ProfileField::model()->forOwner()->sort()->findAll();
			if ($profileFields) {
				foreach($profileFields as $field) {
				?>
		<tr>
			<th style="font-size: 20px; background-color: #ABBAC3; color: #FFF; padding: 5px;"><?php echo CHtml::encode(UserModule::t(($field->title == 'First Name')? 'Nom':'Prenom')); ?></th>
			<td style="padding: 5px;"><?php echo (($field->widgetView($profile))?$field->widgetView($profile):CHtml::encode((($field->range)?Profile::range($field->range,$profile->getAttribute($field->varname)):$profile->getAttribute($field->varname)))); ?></td>
		</tr>
		<tr><td>&nbsp;</td></tr>
				<?php
				}
			}
		?>
		<tr>
			<th style="font-size: 20px; ; background-color: #ABBAC3; color: #FFF; padding: 5px;"><?php echo CHtml::encode($model->getAttributeLabel('email')); ?></th>
			<td style="padding: 5px;"><?php echo CHtml::encode($model->email); ?></td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
			<th style="font-size: 20px; ; background-color: #ABBAC3; color: #FFF; padding: 5px;"><?php echo CHtml::encode('Créer le'); ?></th>
			<td style="padding: 5px;"><?php echo date('d/m/Y H:i:s', strtotime($model->create_at)); ?></td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
			<th style="font-size: 20px; ; background-color: #ABBAC3; color: #FFF; padding: 5px;"><?php echo CHtml::encode('Dernière connexion'); ?></th>
			<td style="padding: 5px;"><?php echo date('d/m/Y H:i:s', strtotime($model->lastvisit_at)); ?></td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
			<th style="font-size: 20px; ; background-color: #ABBAC3; color: #FFF; padding: 5px;"><?php echo CHtml::encode('Statut'); ?></th>
			<td style="padding: 5px;"><?php echo CHtml::encode(User::itemAlias("UserStatus",$model->status)); ?></td>
		</tr>
	</table>
</div>
