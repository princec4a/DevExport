<?php
/* @var $this BesoinController */
/* @var $model Besoin */

$this->breadcrumbs=array(
	'Besoins'=>array('index'),
	$model->numero,
);

$this->menu=array(
	array('label'=>'<i class="menu-icon fa fa-list-alt"></i> <span class="menu-text">Lister des Besoins</span>', 'url'=>array('index')),
	array('label'=>'<i class="menu-icon fa fa-floppy-o"></i> <span class="menu-text">Nouveau Besoin</span>', 'url'=>array('create')),
	array('label'=>'<i class="menu-icon fa fa-pencil-square-o"></i> <span class="menu-text">Modifier Besoin</span>', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'<i class="menu-icon fa fa-trash-o"></i> <span class="menu-text">Supprimer Besoin</span> Besoin', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Êtes vous sur de vouloir modifier cet élément?')),
	//array('label'=>'Manage Besoin', 'url'=>array('admin')),
);
?>
<div class="page-header">
	<h1>
		Etat de Besoin N° <strong><?php echo $model->numero; ?></strong>
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			<?= ($model->etat == 1)? '<span class="label label-success arrowed arrowed-in-right">Payé</span>' : '<span class="label label-danger arrowed arrowed-in-right">Impayé</span>'?>
		</small>
	</h1>
</div>
<?php if(!Yii::app()->user->checkAccess('admin')) { ?>
	<?php if(Yii::app()->user->checkAccess('DG')) : ?>
		<span style="float: right;"><?php echo CHtml::link('<i class="ace-icon fa fa-times"></i> Rejeter',
				array('besoin/rejeterDDBesoin', 'id'=>$model->primaryKey),
				array('confirm' => 'Êtes vous sur de vouloir rejeter ce besoin?','class'=>'btn btn-app btn-danger btn-xs')); ?></span>
		<span style="float: right;"><?php echo CHtml::link('<i class="ace-icon fa fa-check"></i> Valider',
				array('besoin/validerDgBesoin', 'id'=>$model->primaryKey),
				array('confirm' => 'Êtes vous sur de vouloir valider ce besoin?', 'class'=>'btn btn-app btn-success btn-xs')); ?></span>
			<button class="btn btn-app btn-light btn-xs" onclick="print();">
				<i class="ace-icon fa fa-print bigger-160"></i> Imprimer
			</button>
	<?php endif; ?>
	<?php if(Yii::app()->user->checkAccess('DD')) :  ?>
		<span style="float: right;"><?php echo CHtml::link('<i class="ace-icon fa fa-times"></i> Rejeter',
				array('besoin/rejeterDDBesoin', 'id'=>$model->primaryKey),
				array('confirm' => 'Êtes vous sur de vouloir rejeter ce besoin?','class'=>'btn btn-app btn-danger btn-xs')); ?></span>
		<span style="float: right;"><?php echo CHtml::link('<i class="ace-icon fa fa-check"></i> Valider',
				array('besoin/validerDDBesoin', 'id'=>$model->primaryKey),
				array('confirm' => 'Êtes vous sur de vouloir valider ce besoin?', 'class'=>'btn btn-app btn-success btn-xs')); ?></span>
			<button class="btn btn-app btn-light btn-xs" onclick="print();">
				<i class="ace-icon fa fa-print bigger-160"></i> Imprimer
			</button>
	<?php endif; ?>
	<?php if(Yii::app()->user->checkAccess('RTT')) :  ?>
		<button class="btn btn-app btn-light btn-xs" onclick="print();">
			<i class="ace-icon fa fa-print bigger-160"></i> Imprimer
		</button>
	<?php endif; ?>
	<?php if(Yii::app()->user->checkAccess('Caissier')) :  ?>
		<button class="btn btn-app btn-light btn-xs" onclick="print();">
			<i class="ace-icon fa fa-print bigger-160"></i> Imprimer
		</button>
	<?php endif; ?>

	<?php
}
?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'numero',
		'libelle',
		array(
			'label' => 'Montant Total',
			'type'=>'raw',
			'value' => '<strong>'.number_format($model->montant,0,'',' ').' frs CFA</strong>',
		),
		array(
			'label' => 'Visa DG',
			'type'=>'raw',
			'value' => ($model->visa_dg == 0) ? '<span class="label label-danger arrowed-in-right arrowed">non validé</span>' : '<span class="label label-success arrowed-in-right arrowed">validé</span>',
		),
		array(
			'label' => 'Visa DD',
			'type'=>'raw',
			'value' => ($model->visa_dd == 0) ? '<span class="label label-danger arrowed-in-right arrowed">non validé</span>' : '<span class="label label-success arrowed-in-right arrowed">validé</span>',
		),
		array(
			'label' => 'Crée le ',
			'type'=>'raw',
			'value' => date('d/m/Y H:i:s', strtotime($model->date_created)),
		)
	),
)); ?>
<table id="simple-table" class="table  table-bordered table-hover">
	<thead>
		<tr>
			<th>Libelle</th>
			<th>Quantité</th>
			<th>Prix</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($model->detailBesoins as $detailBesoin): ?>
		<tr>
			<td><?php echo $detailBesoin->libelle; ?></td>
			<td style="text-align: right;"><?php echo $detailBesoin->quantite; ?></td>
			<td style="text-align: right;"><?php echo number_format($detailBesoin->pu,0,'',' '); ?> frs CFA</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	<tfoot>
	<tr>
		<td colspan="2" style="text-align: right"><strong>Total = </strong></td>
		<td  style="text-align: right; background-color: #438EB9; color: #ffffff;"><strong><?=number_format($model->montant,0,'',' ') ?> frs CFA</strong></td>
	</tr>
	</tfoot>
</table>

<div id="ticket">
	<table border="0" cellspacing=0 cellpadding=0 style="width: 100%; border-collapse:collapse; font-family: 'Book Antiqua'; font-size: 12pt;">
		<tr>
			<td rowspan="1" colspan="3" valign="top" style="text-align: center;"><img src="<?php echo Yii::app()->request->baseUrl ?>/images/logo.jpg" width="60%" /></td>
		</tr>
		<tr><td colspan="6">&nbsp;</td></tr>
		<tr><td colspan="6" style="text-align: center; font-size:25px;">ETAT DE BESOINS N° <span style="border: 1px solid #000; padding: 5px;"><?php echo $model->numero;?></span></td></tr>
		<tr><td colspan="6">&nbsp;</td></tr>
		<tr>
			<td>Date: <?php echo date('d/m/Y'); ?></td>
			<td>&nbsp;</td>
		</tr>
		<tr><td colspan="6"></td></tr>
		<tr><td colspan="6"></td></tr>
		<tr><td colspan="6"></td></tr>
		<tr><td colspan="6"></td></tr>
		<tr>
			<th style="border: 2px solid #000000; padding: 0 5px;">Libelle</th>
			<th style="border: 2px solid #000000; padding: 0 5px;">Quantité</th>
			<th style="border: 2px solid #000000; padding: 0 5px;">Prix</th>
		</tr>
		<?php foreach($model->detailBesoins as $detailBesoin): ?>
			<tr>
				<td style="border: 1px solid #000; padding: 5px"><?=$detailBesoin->libelle; ?></td>
				<td style="border: 1px solid #000; padding: 5px; text-align: right;"><?=$detailBesoin->quantite; ?></td>
				<td style="border: 1px solid #000; padding: 5px; text-align: right;"><?=number_format($detailBesoin->pu,0,'',' '); ?> frs CFA</td>
			</tr>
		<?php endforeach; ?>
		<tr>
			<td style="border: none;">&nbsp;</td>
			<td style="border: none; text-align: right; padding: 5px;">Total = </td>
			<td style="border: 2px solid #000000; padding: 5px; text-align: right;"><?=number_format($model->montant,0,'',' '); ?> frs CFA</td>
		</tr>
	</table>
	<p>&nbsp;</p>
	<table border="0" cellspacing=0 cellpadding=0 style="width: 100%; border-collapse:collapse; font-family: 'Book Antiqua'; font-size: 12pt;">
		<tr>
			<td rowspan="4">Service émetteur</td>
			<td style="text-align: right; padding: 0 10px;">Direction Générale</td>
			<td style="border: 1px solid #000; padding: 5px; text-align: center;">&nbsp;<?php if(Yii::app()->user->checkAccess('DG')) echo 'X'; ?></td>
			<td style="text-align: right; padding: 0 10px;">Direction Départémentale</td>
			<td style="border: 1px solid #000; padding: 10px; text-align: center;">&nbsp;<?php if(Yii::app()->user->checkAccess('DD')) echo 'X'; ?></td>
		</tr>
		<tr>
			<td style="text-align: right; padding: 0 10px;">Direction Transit</td>
			<td style="border: 1px solid #000; padding: 5px; text-align: center;">&nbsp;<?php if(Yii::app()->user->checkAccess('RTT')) echo 'X'; ?></td>
			<td style="text-align: right; padding: 0 10px;">Sécrétariat Caisse</td>
			<td style="border: 1px solid #000; padding: 10px; text-align: center;">&nbsp;<?php if(Yii::app()->user->checkAccess('Caissier')) echo 'X'; ?></td>
		</tr>
		<tr>
			<td style="text-align: right; padding: 0 10px;">Comptabilité</td>
			<td style="border: 1px solid #000; padding: 5px; text-align: center;">&nbsp;<?php if(Yii::app()->user->checkAccess('CMPT')) echo 'X'; ?></td>
			<td style="text-align: right; padding: 0 10px;">Agent de surface</td>
			<td style="border: 1px solid #000; padding: 10px; text-align: center;">&nbsp;<?php if(Yii::app()->user->checkAccess('Caissier')) echo 'X'; ?></td>
		</tr>
		<tr>
			<td style="text-align: right; padding: 0 10px;">Service Informatique</td>
			<td style="border: 1px solid #000; padding: 10px; text-align: center;">&nbsp;<?php if(Yii::app()->user->checkAccess('Informatique')) echo 'X'; ?></td>
			<td colspan="2">&nbsp;</td>
		</tr>
	</table>
	<p>&nbsp;</p>
	<table border="0" cellspacing=0 cellpadding=0 style="width: 100%; border-collapse:collapse; font-family: 'Book Antiqua'; font-size: 12pt;">
		<tr>
			<td colspan="5"><strong>ACCORDS</strong></td>
		</tr>
		<tr>
			<td style="text-align: center; padding: 0 10px;">DIRECTEUR GENERAL</td>
			<td style="padding: 5px;">&nbsp;</td>
			<td style="text-align: center; padding: 0 10px;">DIRECTEUR DEPARTEMENTAL</td>
			<td style="padding: 5px;">&nbsp;</td>
		</tr>
		<tr>
			<td style="border: 1px solid #000; text-align: right; padding: 20px;">&nbsp;</td>
			<td style="padding: 5px;">&nbsp;</td>
			<td colspan="2" style="border: 1px solid #000;  text-align: right; padding: 20px;">&nbsp;</td>
		</tr>
	</table>
</div>

<style type="text/css">
	@media screen{
		#ticket{
			visibility: hidden;
		}
	}
	@media print {
		body * {
			visibility: hidden;
		}
		#ticket, #ticket * {
			visibility: visible;
		}
		#ticket {
			position: absolute;
			left: 0;
			top: 0;
			width: 100%;
			margin-top: 30px;
			padding: 0 20px;
		}
		@page {
			size: auto;   /* auto is the initial value */
			margin: 0;  /* this affects the margin in the printer settings */
		}
	}
</style>
<script type="text/javascript">
	jQuery(function($) {
		function print(){
			document.title = "";
			w=window.open();
			w.document.write($('.report_left_inner').html());
			w.print();
			w.close();
		}
	})
</script>