<?php
/* @var $this DevisDController */
/* @var $model DevisD */

$this->breadcrumbs=array(
	'Devis Douane'=>array('index'),
	$model->numero,
);

$this->menu=array(
	array('label'=>'<i class="menu-icon fa fa-list-alt"></i> <span class="menu-text">Lister les devis D</span>', 'url'=>array('index')),
	array('label'=>'<i class="menu-icon fa fa-floppy-o"></i> <span class="menu-text">Nouveau devis D</span>', 'url'=>array('create')),
	array('label'=>'<i class="menu-icon fa fa-pencil-square-o"></i> <span class="menu-text">Modifier le devis D</span>', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'<i class="menu-icon fa fa-trash-o"></i> <span class="menu-text">Supprimer le devis D</span>', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Êts vous sur de vouloir supprimer cet utilisateur?')),
	//array('label'=>'Manage DevisD', 'url'=>array('admin')),
);
?>

<div class="page-header">
	<h1> Devis Douane N° <strong><?php echo $model->numero; ?></strong>
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			Devis A correspondant : <strong><?php echo $model->idDevisA->numero; ?></strong>
		</small>
	</h1>

</div>

<?php if(!Yii::app()->user->checkAccess('admin')) { ?>
	<?php if(Yii::app()->user->checkAccess('DG')) : ?>
		<span style="float: right;"><?php echo CHtml::link('<i class="ace-icon fa fa-times"></i> Rejeter',
				array('devisD/rejeterDgDevisD', 'id'=>$model->primaryKey),
				array('confirm' => 'Êtes vous sur de vouloir rejeter ce devis A?','class'=>'btn btn-app btn-danger btn-xs')); ?></span>
		<span style="float: right;"><?php echo CHtml::link('<i class="ace-icon fa fa-check"></i> Valider',
				array('devisD/validerDgDevisD', 'id'=>$model->primaryKey),
				array('confirm' => 'Êtes vous sur de vouloir valider ce devis D?', 'class'=>'btn btn-app btn-success btn-xs')); ?></span>
	<?php endif; ?>
	<?php if(Yii::app()->user->checkAccess('DD')) :  ?>
		<span style="float: right;"><?php echo CHtml::link('<i class="ace-icon fa fa-check"></i> Valider',
				array('devisD/validerDDDevisD', 'id'=>$model->primaryKey),
				array('confirm' => 'Êtes vous sur de vouloir valider ce devis D?', 'class'=>'btn btn-app btn-success btn-xs')); ?></span>
	<?php endif; ?>
	<?php if(Yii::app()->user->checkAccess('RTT')): ?>
		<span style="float: right;"><?php echo CHtml::link('<i class="ace-icon fa fa-check"></i> Valider',
				array('devisD/validerRTTDevisD', 'id'=>$model->primaryKey),
				array('confirm' => 'Êtes vous sur de vouloir valider ce devis D?', 'class'=>'btn btn-app btn-success btn-xs')); ?></span>
		<span class="btn btn-app btn-light btn-xs"><i class="ace-icon fa fa-print bigger-160"></i>Imprimer</span>
	<?php endif; ?>
	<?php if(Yii::app()->user->checkAccess('Caissier')) : ?>
		<span style="float: right;"><?php echo CHtml::link('<i class="ace-icon fa fa-check"></i> Valider',
				array('devisD/validerCaissierDevisD', 'id'=>$model->primaryKey),
				array('confirm' => 'Êtes vous sur de vouloir valider ce devis D?', 'class'=>'btn btn-app btn-success btn-xs')); ?></span>
		<span style="float: right;"><?php echo CHtml::link('<i class="ace-icon fa fa-pencil-square-o"></i> Editer le Bon de Caisse',
				array('/processBC/bonCaisse/create'),
				array('class'=>'btn btn-app btn-primary btn-xs')); ?></span>
	<?php endif; ?>
	<?php
}
?>

<button class="btn btn-app btn-light btn-xs" onclick="print();">
	<i class="ace-icon fa fa-print bigger-160"></i> Imprimer
</button>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		array(
			'label' => 'Autorisé par ',
			'type'=>'raw',
			'value' => User::model()->getUserProfileFields($model->id_user),
		),
		array(
			'label' => 'D.D',
			'type'=>'raw',
			'value' =>number_format($model->dd,0,'',' ').' frs CFA',
		),
		array(
			'label' => 'TEL I',
			'type'=>'raw',
			'value' =>number_format($model->tel_i,0,'',' ').' frs CFA',
		),
		array(
			'label' => 'TR',
			'type'=>'raw',
			'value' =>number_format($model->tr,0,'',' ').' frs CFA',
		),
		array(
			'label' => 'Frais de saisie BTF',
			'type'=>'raw',
			'value' =>number_format($model->frais_saisie_btf,0,'',' ').' frs CFA',
		),
		array(
			'label' => 'Sortie TC D',
			'type'=>'raw',
			'value' =>number_format($model->sortie_tc_d,0,'',' ').' frs CFA',
		),
		array(
			'label' => 'Transport',
			'type'=>'raw',
			'value' =>number_format($model->trans,0,'',' ').' frs CFA',
		),
		array(
			'label' => 'Montant',
			'type'=>'raw',
			'value' =>number_format($model->montant,0,'',' ').' frs CFA',
		),
		/*'date_created',
		'date_modified',
		'id_user',
		'id_devis_a',*/
		array(
			'label' => 'Visa DG',
			'type'=>'raw',
			'value' => ($model->visa_dg == 0) ? '<span class="label label-danger arrowed-in-right arrowed">Dévis non validé par le <strong>DG</strong></span>' : '<span class="label label-success arrowed-in-right arrowed">Dévis validé par le <strong>DG</strong></span>',
		),
		array(
			'label' => 'Visa DD',
			'type'=>'raw',
			'value' => ($model->visa_dd == 0) ? '<span class="label label-danger arrowed-in-right arrowed">Dévis non validé par le <strong>DD</strong></span>' : '<span class="label label-success arrowed-in-right arrowed">Dévis validé par le <strong>DD</strong></span>',
		),
		array(
			'label' => 'Visa RTT',
			'type'=>'raw',
			'value' => ($model->visa_rtt == 0) ? '<span class="label label-danger arrowed-in-right arrowed">Dévis non validé par le <strong>RTT</strong></span>' : '<span class="label label-success arrowed-in-right arrowed">Dévis validé par le <strong>RTT</strong></span>',
		),
		array(
			'label' => 'Visa Caissière',
			'type'=>'raw',
			'value' => ($model->visa_caissiere == 0) ? '<span class="label label-danger arrowed-in-right arrowed">Dévis non validé par la <strong>caissière</strong></span>' : '<span class="label label-success arrowed-in-right arrowed">Dévis validé par la <strong>Caissière</strong></span>',
		),
		array(
			'label' => 'Créer le',
			'type'=>'raw',
			'value' => date('d/m/Y H:i:s', strtotime($model->date_created)),
		),
	),
)); ?>

<script src="<?php echo Yii::app()->request->baseUrl; ?>/css/dist/JsBarcode.all.js"></script>
<div id="ticket">
	<table border="0" cellspacing=0 cellpadding=0 style="width: 100%; border-collapse:collapse; font-family: 'Book Antiqua'; font-size: 12pt;">
		<tr>
			<td rowspan="1" colspan="2" valign="top"><img src="<?php echo Yii::app()->request->baseUrl ?>/images/logo.jpg" width="60%" /></td>
			<td style="text-align: right;"><img id="barcode3" width="50%" /></td>
		</tr>
		<tr><td colspan="6">&nbsp;</td></tr>
		<tr><td colspan="6" style="text-align: center; font-size:25px;">DEVIS DOUANES N° <span style="border: 1px solid #000; padding: 5px;"><?php echo $model->numero;?></span></td></tr>
		<tr><td colspan="6">&nbsp;</td></tr>
		<tr>
			<td>Date</td>
			<td><?php echo date('d/m/Y'); ?></td>
		</tr>
		<tr><td colspan="6"></td></tr>
		<tr>
			<td>A l’ordre de</td>
			<td colspan="2" style="border-bottom: 1px solid #000; background-color: #F5F5F5; padding: 5px;"><strong><?php echo User::model()->getUserProfileFields($model->autorise_par); ?></strong></td>
		</tr>
		<tr><td colspan="6">&nbsp;</td></tr>
		<tr>
			<td>D.D</td>
			<td colspan="2" style="border-bottom: 1px solid #000;"><?php echo number_format($model->dd,0,'',' '); ?></span> frs CFA</td>
		</tr>
		<tr>
			<td>TEL I</td>
			<td colspan="2" style="border-bottom: 1px solid #000;"><?php echo number_format($model->tel_i,0,'',' '); ?></span> frs CFA</td>
		</tr>
		<tr>
			<td>T.R</td>
			<td colspan="2" style="border-bottom: 1px solid #000;"><?php echo number_format($model->tr,0,'',' '); ?></span> frs CFA</td>
		</tr>
		<tr>
			<td>Frais de Saisie BTF</td>
			<td colspan="2" style="border-bottom: 1px solid #000;"><?php echo number_format($model->frais_saisie_btf,0,'',' '); ?></span> frs CFA</td>
		</tr>
		<tr>
			<td>Sortie TC D</td>
			<td colspan="2" style="border-bottom: 1px solid #000;"><?php echo number_format($model->sortie_tc_d,0,'',' '); ?></span> frs CFA</td>
		</tr>
		<tr>
			<td>Transport</td>
			<td colspan="2" style="border-bottom: 1px solid #000;"><?php echo number_format($model->trans,0,'',' '); ?></span> frs CFA</td>
		</tr>
		<tr>
			<td>Montant</td>
			<td colspan="2" style="border-bottom: 1px solid #000;"><?php echo number_format($model->montant,0,'',' '); ?></span> frs CFA</td>
		</tr>
		<tr>
			<td><p style="text-align: center">&nbsp;</p></td>
			<td>&nbsp;</td>
			<td><p style="text-align: center">Intéressé</p></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td style="font-size: 9px;" ><?php echo date('H:i:s'); ?></td>
			<td colspan="2">&nbsp;</td>
			<td colspan="3"></td>
		</tr>
		<tr>
			<td style="border-top: 2px solid; font-size: 9px;" >&nbsp;</td>
			<td style="border-top: 2px solid;" colspan="2">&nbsp;</td>
			<td style="border-top: 2px solid;" colspan="3">&nbsp;</td>
		</tr>
	</table>
	<p>&nbsp;</p>
	<table border="0" cellspacing=0 cellpadding=0 style="width: 100%; border-collapse:collapse; font-family: 'Book Antiqua'; font-size: 12pt;">
		<tr>
			<td rowspan="1" colspan="2" valign="top"><img src="<?php echo Yii::app()->request->baseUrl ?>/images/logo.jpg" width="60%" /></td>
			<td style="text-align: right;"><img id="barcode3" width="50%" /></td>
		</tr>
		<tr><td colspan="6">&nbsp;</td></tr>
		<tr><td colspan="6" style="text-align: center; font-size:25px;">DEVIS DOUANES N° <span style="border: 1px solid #000; padding: 5px;"><?php echo $model->numero;?></span></td></tr>
		<tr><td colspan="6">&nbsp;</td></tr>
		<tr>
			<td>Date</td>
			<td><?php echo date('d/m/Y'); ?></td>
		</tr>
		<tr><td colspan="6"></td></tr>
		<tr>
			<td>A l’ordre de</td>
			<td colspan="2" style="border-bottom: 1px solid #000; background-color: #F5F5F5; padding: 5px;"><strong><?php echo User::model()->getUserProfileFields($model->autorise_par); ?></strong></td>
		</tr>
		<tr><td colspan="6">&nbsp;</td></tr>
		<tr>
			<td>D.D</td>
			<td colspan="2" style="border-bottom: 1px solid #000;"><?php echo number_format($model->dd,0,'',' '); ?></span> frs CFA</td>
		</tr>
		<tr>
			<td>TEL I</td>
			<td colspan="2" style="border-bottom: 1px solid #000;"><?php echo number_format($model->tel_i,0,'',' '); ?></span> frs CFA</td>
		</tr>
		<tr>
			<td>T.R</td>
			<td colspan="2" style="border-bottom: 1px solid #000;"><?php echo number_format($model->tr,0,'',' '); ?></span> frs CFA</td>
		</tr>
		<tr>
			<td>Frais de Saisie BTF</td>
			<td colspan="2" style="border-bottom: 1px solid #000;"><?php echo number_format($model->frais_saisie_btf,0,'',' '); ?></span> frs CFA</td>
		</tr>
		<tr>
			<td>Sortie TC D</td>
			<td colspan="2" style="border-bottom: 1px solid #000;"><?php echo number_format($model->sortie_tc_d,0,'',' '); ?></span> frs CFA</td>
		</tr>
		<tr>
			<td>Transport</td>
			<td colspan="2" style="border-bottom: 1px solid #000;"><?php echo number_format($model->trans,0,'',' '); ?></span> frs CFA</td>
		</tr>
		<tr>
			<td>Montant</td>
			<td colspan="2" style="border-bottom: 1px solid #000;"><?php echo number_format($model->montant,0,'',' '); ?></span> frs CFA</td>
		</tr>
		<tr>
			<td><p style="text-align: center">&nbsp;</p></td>
			<td>&nbsp;</td>
			<td><p style="text-align: center">Intéressé</p></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td style="font-size: 9px;" ><?php echo date('H:i:s'); ?></td>
			<td colspan="2">&nbsp;</td>
			<td colspan="3"></td>
		</tr>
		<tr>
			<td style="border-top: 2px solid; font-size: 9px;" >&nbsp;</td>
			<td style="border-top: 2px solid;" colspan="2">&nbsp;</td>
			<td style="border-top: 2px solid;" colspan="3">&nbsp;</td>
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
<script>
	JsBarcode("#barcode3", "<?php echo $model->numero; ?>", {
		format:"code128",
		displayValue:true,
		fontSize:10
	});
</script>
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
