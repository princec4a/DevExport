<?php
/* @var $this BonEncaissementController */
/* @var $data BonEncaissement */
?>

<div class="col-sm-4">
	<div class="widget-box">
		<div class="widget-header">
			<h4 class="widget-title"><?php echo CHtml::link(CHtml::encode($data->numero), array('view', 'id'=>$data->id)); ?></h4>
		</div>

		<div class="widget-body">
			<div class="widget-main">
				<div class=""><span style="display: block; float: left; width: 50%;">A l'ordre de :</span> <strong><?php echo CHtml::encode(User::model()->getUserProfileFields($data->a_ordre)); ?></strong></div>
				<hr style="margin: 0 0 5px;" />
				<div class=""><span style="display: block; float: left; width: 85%;">Accompte :</span> <strong><?php echo CHtml::encode(Yii::app()->numberFormatter->format('#,##0',$data->accompte, "EUR")); ?></strong></div>
				<div class=""><span style="display: block; float: left; width: 85%;">Reste :</span> <strong><?php echo CHtml::encode(Yii::app()->numberFormatter->format('#,##0',$data->reste, "EUR")); ?></strong></div>
				<hr style="margin: 0 0 5px;" />
				<div class=""><span style="display: block; float: left; width: 85%;">Montant</span> <strong class="label label-grey"><?php echo CHtml::encode(Yii::app()->numberFormatter->format('#,##0',$data->montant, "EUR")); ?></strong></div>
			</div>
		</div>
	</div>
</div>