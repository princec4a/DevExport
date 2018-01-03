<div class="col-xs-12">
	<div class="form span-12 first">

	<?php if( $model->scenario==='update' ): ?>

		<h3><?php echo Rights::getAuthItemTypeName($model->type); ?></h3>

	<?php endif; ?>

	<?php $form=$this->beginWidget('CActiveForm',array(
		'htmlOptions'=>array('class'=>'form-horizontal', 'role'=>'form'),
	)); ?>

		<div class="form-group">
			<?php echo $form->labelEx($model, 'name', array('label'=>'Nom','class'=>'col-sm-3 control-label no-padding-right')); ?>
			<div class="col-sm-9">
				<?php echo $form->textField($model, 'name', array('maxlength'=>255, 'class'=>'col-xs-10 col-sm-5')); ?>
				<?php echo $form->error($model, 'name'); ?>
			</div>
		</div>
		<div class="form-group">
			<label for="" class="col-sm-3 control-label no-padding-right">&nbsp;</label>
			<div class="col-sm-9">
				<p class="hint"><?php echo Rights::t('core', 'Ne changez pas le nom, sauf si vous savez ce que vous faites.'); ?></p>
			</div>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model, 'description', array('class'=>'col-sm-3 control-label no-padding-right')); ?>
			<div class="col-sm-9">
				<?php echo $form->textField($model, 'description', array('maxlength'=>255, 'class'=>'col-xs-10 col-sm-5')); ?>
				<?php echo $form->error($model, 'description'); ?>
			</div>
		</div>
		<div class="form-group">
			<label for="" class="col-sm-3 control-label no-padding-right">&nbsp;</label>
			<div class="col-sm-9">
				<p class="hint"><?php echo Rights::t('core', 'La description de votre élément.'); ?></p>
			</div>
		</div>

		<?php if( Rights::module()->enableBizRule===true ): ?>

			<div class="form-group">
				<?php echo $form->labelEx($model, 'bizRule', array('Rôle métier'=>'Nom', 'class'=>'col-sm-3 control-label no-padding-right')); ?>
				<div class="col-sm-9">
					<?php echo $form->textField($model, 'bizRule', array('maxlength'=>255, 'class'=>'col-xs-10 col-sm-5')); ?>
					<?php echo $form->error($model, 'bizRule'); ?>
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-sm-3 control-label no-padding-right">&nbsp;</label>
				<div class="col-sm-9">
					<p class="hint"><?php echo Rights::t('core', 'Code qui sera exécuté lors de la vérification d\'accès.'); ?></p>
				</div>
			</div>

		<?php endif; ?>

		<?php if( Rights::module()->enableBizRule===true && Rights::module()->enableBizRuleData ): ?>

			<div class="form-group">
				<?php echo $form->labelEx($model, 'data', array('class'=>'col-sm-3 control-label no-padding-right')); ?>
				<div class="col-sm-9">
					<?php echo $form->textField($model, 'data', array('maxlength'=>255, 'class'=>'col-xs-10 col-sm-5')); ?>
					<?php echo $form->error($model, 'data'); ?>
					<p class="hint"><?php echo Rights::t('core', 'Additional data available when executing the business rule.'); ?></p>
				</div>
			</div>

		<?php endif; ?>

		<div class="clearfix form-actions">
			<div class="col-md-offset-3 col-md-9">
			<?php echo CHtml::submitButton(Rights::t('core', 'Valider'), array('class'=>'btn btn-info')); ?> | <?php echo CHtml::link(Rights::t('core', '<i class="ace-icon fa fa-undo bigger-110"></i> Annuler'), Yii::app()->user->rightsReturnUrl, array('class'=>'btn')); ?>
			</div>
		</div>

	<?php $this->endWidget(); ?>

	</div>
