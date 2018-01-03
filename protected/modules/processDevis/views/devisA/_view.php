<?php
/* @var $this DevisAController */
/* @var $data DevisA */
?>


<div class="col-sm-4">
	<div class="widget-box">
		<div class="widget-header">
			<h4 class="widget-title"><?php echo CHtml::link(CHtml::encode($data->numero), array('view', 'id'=>$data->id)); ?></h4>
			<div class="widget-toolbar"><?= ($data->etat == 1)? '<span class="label label-success arrowed arrowed-in-right">Payé</span>' : '<span class="label label-danger arrowed arrowed-in-right">Impayé</span>'?></div>
		</div>

		<div class="widget-body">
			<div class="widget-main">
				<div class=""><span style="display: block; float: left; width: 50%;">Autorisé par :</span> <strong><?php echo CHtml::encode(User::model()->getUserProfileFields($data->autorise_par)); ?></strong></div>
				<hr style="margin: 0 0 5px;" />
				<div class=""><span style="display: block; float: left; width: 85%;">BSC :</span> <strong><?php echo CHtml::encode(Yii::app()->numberFormatter->format('#,##0',$data->bsc, "EUR")); ?></strong></div>
				<div class=""><span style="display: block; float: left; width: 85%;">C.O :</span> <strong><?php echo CHtml::encode(Yii::app()->numberFormatter->format('#,##0',$data->co, "EUR")); ?></strong></div>
				<div class=""><span style="display: block; float: left; width: 85%;">D.E :</span> <strong><?php echo CHtml::encode(Yii::app()->numberFormatter->format('#,##0',$data->de, "EUR")); ?></strong></div>
				<div class=""><span style="display: block; float: left; width: 85%;">C.EXP :</span> <strong><?php echo CHtml::encode(Yii::app()->numberFormatter->format('#,##0',$data->c_exp, "EUR")); ?></strong></div>
				<div class=""><span style="display: block; float: left; width: 85%;">Frais de saisie :</span> <strong><?php echo CHtml::encode(Yii::app()->numberFormatter->format('#,##0',$data->frais_saisie, "EUR")); ?></strong></div>
				<div class=""><span style="display: block; float: left; width: 85%;">Transport :</span> <strong><?php echo CHtml::encode(Yii::app()->numberFormatter->format('#,##0',$data->trans, "EUR")); ?></strong></div>
				<hr style="margin: 0 0 5px;" />
				<div class=""><span style="display: block; float: left; width: 85%;">Total =</span> <strong class="label label-grey"><?php echo CHtml::encode(Yii::app()->numberFormatter->format('#,##0',$data->montant, "EUR")); ?></strong></div>
			</div>
		</div>
	</div>
</div>