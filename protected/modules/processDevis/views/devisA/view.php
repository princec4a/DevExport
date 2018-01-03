<?php
/* @var $this DevisAController */
/* @var $model DevisA */

$this->breadcrumbs=array(
	'Devis Administratif'=>array('index'),
	$model->numero,
);

$this->menu=array(
	array('label'=>'<i class="menu-icon fa fa-list-alt"></i> <span class="menu-text">Lister les devis A</span>', 'url'=>array('index')),
	array('label'=>'<i class="menu-icon fa fa-floppy-o"></i> <span class="menu-text">Nouveau devis A</span>', 'url'=>array('create')),
	array('label'=>'<i class="menu-icon fa fa-pencil-square-o"></i> <span class="menu-text">Modifier le devis A</span>', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'<i class="menu-icon fa fa-trash-o"></i> <span class="menu-text">Supprimer le devis A</span>', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Êtes vous sur de vouloir supprimer ce devis A?')),
	/*array('label'=>'Manage DevisA', 'url'=>array('admin')),*/
);
?>
<div class="page-header">
	<h1> Devis Administratif N° <strong><?php echo $model->numero; ?></strong>
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			booking : <strong><?php echo $model->idDossier->num_booking; ?></strong>
		</small>
	</h1>

</div>
<?php if(!Yii::app()->user->checkAccess('admin')) { ?>
	<?php if(Yii::app()->user->checkAccess('DG')) : ?>
		<span style="float: right;"><?php echo CHtml::link('<i class="ace-icon fa fa-times"></i> Rejeter',
				array('devisA/rejeterDgDevisA', 'id'=>$model->primaryKey),
				array('confirm' => 'Êtes vous sur de vouloir rejeter ce devis A?','class'=>'btn btn-app btn-danger btn-xs')); ?></span>
		<span style="float: right;"><?php echo CHtml::link('<i class="ace-icon fa fa-check"></i> Valider',
				array('devisA/validerDgDevisA', 'id'=>$model->primaryKey),
				array('confirm' => 'Êtes vous sur de vouloir valider ce devis A?', 'class'=>'btn btn-app btn-success btn-xs')); ?></span>
	<?php endif; ?>
	<?php if(Yii::app()->user->checkAccess('DD')) :  ?>
		<span style="float: right;"><?php echo CHtml::link('<i class="ace-icon fa fa-times"></i> Rejeter',
				array('devisA/rejeterDDDevisA', 'id'=>$model->primaryKey),
				array('confirm' => 'Êtes vous sur de vouloir rejeter ce devis A?','class'=>'btn btn-app btn-danger btn-xs')); ?></span>
		<span style="float: right;"><?php echo CHtml::link('<i class="ace-icon fa fa-check"></i> Valider',
				array('devisA/validerDDDevisA', 'id'=>$model->primaryKey),
				array('confirm' => 'Êtes vous sur de vouloir valider ce devis A?', 'class'=>'btn btn-app btn-success btn-xs')); ?></span>
	<?php endif; ?>
	<?php if(Yii::app()->user->checkAccess('RTT')): ?>
		<span style="float: right;"><?php /* echo CHtml::link('<i class="ace-icon fa fa-times"></i> Rejeter',
				array('devisA/rejeterRTTDevisA', 'id'=>$model->primaryKey),
				array('confirm' => 'Êtes vous sur de vouloir rejeter ce devis A?','class'=>'btn btn-app btn-danger btn-xs')); */ ?></span>
		<span style="float: right;"><?php echo CHtml::link('<i class="ace-icon fa fa-check"></i> Valider',
				array('devisA/validerRTTDevisA', 'id'=>$model->primaryKey),
				array('confirm' => 'Êtes vous sur de vouloir valider ce devis A?', 'class'=>'btn btn-app btn-success btn-xs')); ?></span>
		<span class="btn btn-app btn-light btn-xs"><i class="ace-icon fa fa-print bigger-160"></i>Imprimer</span>
	<?php endif; ?>
	<?php if(Yii::app()->user->checkAccess('Caissier')) : ?>
		<span style="float: right;"><?php echo CHtml::link('<i class="ace-icon fa fa-check"></i> Valider',
				array('devisA/validerCaissierDevisA', 'id'=>$model->primaryKey),
				array('confirm' => 'Êtes vous sur de vouloir valider ce devis A?', 'class'=>'btn btn-app btn-success btn-xs')); ?></span>
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

<div class="clearfix"></div>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array(
			'label' => 'Autorisé par ',
			'type'=>'raw',
			'value' => User::model()->getUserProfileFields($model->id_user),
		),
		array(
			'label' => 'BSC',
			'type'=>'raw',
			'value' =>number_format($model->bsc,0,'',' ').' frs CFA',
		),
		array(
			'label' => 'C.O',
			'type'=>'raw',
			'value' =>number_format($model->co,0,'',' ').' frs CFA',
		),
		array(
			'label' => 'D.E',
			'type'=>'raw',
			'value' =>number_format($model->de,0,'',' ').' frs CFA',
		),
		array(
			'label' => 'C.EXP',
			'type'=>'raw',
			'value' =>number_format($model->c_exp,0,'',' ').' frs CFA',
		),
		array(
			'label' => 'Frais de saisie',
			'type'=>'raw',
			'value' =>number_format($model->frais_saisie,0,'',' ').' frs CFA',
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
		<tr><td colspan="6" style="text-align: center; font-size:25px;">DEVIS ADMINISTRATIF N° <span style="border: 1px solid #000; padding: 5px;"><?php echo $model->numero;?></span></td></tr>
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
		<tr>
			<td>BSC</td>
			<td colspan="2" style="border-bottom: 1px solid #000;"><?php echo number_format($model->bsc,0,'',' '); ?> frs CFA</td>
		</tr>
		<tr>
			<td>C.O</td>
			<td colspan="2" style="border-bottom: 1px solid #000;"><?php echo number_format($model->co,0,'',' '); ?></span> frs CFA</td>
		</tr>
		<tr>
			<td>D.E</td>
			<td colspan="2" style="border-bottom: 1px solid #000;"><?php echo number_format($model->de,0,'',' '); ?></span> frs CFA</td>
		</tr>
		<tr>
			<td>C. EXP</td>
			<td colspan="2" style="border-bottom: 1px solid #000;"><?php echo number_format($model->c_exp,0,'',' '); ?></span> frs CFA</td>
		</tr>
		<tr>
			<td>Frais de Saisie</td>
			<td colspan="2" style="border-bottom: 1px solid #000;"><?php echo number_format($model->frais_saisie,0,'',' '); ?></span> frs CFA</td>
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
		<tr><td colspan="6" style="text-align: center; font-size:25px;">DEVIS ADMINISTRATIF N° <span style="border: 1px solid #000; padding: 5px;"><?php echo $model->numero;?></span></td></tr>
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
		<tr>
			<td>BSC</td>
			<td colspan="2" style="border-bottom: 1px solid #000;"><?php echo number_format($model->bsc,0,'',' '); ?> frs CFA</td>
		</tr>
		<tr>
			<td>C.O</td>
			<td colspan="2" style="border-bottom: 1px solid #000;"><?php echo number_format($model->co,0,'',' '); ?></span> frs CFA</td>
		</tr>
		<tr>
			<td>D.E</td>
			<td colspan="2" style="border-bottom: 1px solid #000;"><?php echo number_format($model->de,0,'',' '); ?></span> frs CFA</td>
		</tr>
		<tr>
			<td>C. EXP</td>
			<td colspan="2" style="border-bottom: 1px solid #000;"><?php echo number_format($model->c_exp,0,'',' '); ?></span> frs CFA</td>
		</tr>
		<tr>
			<td>Frais de Saisie</td>
			<td colspan="2" style="border-bottom: 1px solid #000;"><?php echo number_format($model->frais_saisie,0,'',' '); ?></span> frs CFA</td>
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