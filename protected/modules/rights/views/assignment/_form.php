<div class="form">

<?php $form=$this->beginWidget('CActiveForm',array(
	'htmlOptions'=>array('class'=>'form-horizontal', 'role'=>'form'),
)); ?>

	<div class="form-group">
		<div class="col-sm-9">
		<?php $this->widget('ext.select2.XSelect2', array(
			'model'=>$model,
			'attribute'=>'itemname',
			'data'=>$itemnameSelectOptions,
			'htmlOptions'=>array(
				'style'=>'width:50%;',
			),
		));?>
		<?php echo $form->error($model, 'itemname'); ?>
		</div>
	</div>

	<div class="clearfix form-actions">
		<div class="col-md-offset-3 col-md-9">
			<?php echo CHtml::submitButton(Rights::t('core', 'Assigner'), array('class'=>'btn btn-info')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div>