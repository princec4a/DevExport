<?php
/* @var $this BonCaisseController */
/* @var $model BonCaisse */

$this->breadcrumbs=array(
	'Bon Caisses'=>array('index'),
	$model->numero,
);

$this->menu=array(
	array('label'=>'<i class="menu-icon fa fa-list-alt"></i> <span class="menu-text">Lister les Bon de Caisse</span>', 'url'=>array('index')),
	array('label'=>'<i class="menu-icon fa fa-floppy-o"></i> <span class="menu-text">Nouveau Bon de Caisse</span>', 'url'=>array('create')),
	array('label'=>'<i class="menu-icon fa fa-pencil-square-o"></i> <span class="menu-text">Modifier le Bon de Caisse</span>', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'<i class="menu-icon fa fa-trash-o"></i> <span class="menu-text">Supprimer le Bon de Caisse</span>', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Êtes vous sur de vouloir supprimer ce Bon de Caisse?')),
	//array('label'=>'Manage BonCaisse', 'url'=>array('admin')),
);
?>

<div class="page-header">
	<h1> Bon de Caisse N° <strong><?php echo $model->numero; ?></strong></h1>
</div>


<?php if(Yii::app()->user->checkAccess('RTT')) : ?>
	<span style="float: right;"><?php echo CHtml::link('<i class="ace-icon fa fa-check"></i> Valider',
			array('bonCaisse/validerRTTBC', 'id'=>$model->primaryKey),
			array('confirm' => 'Êtes vous sur de vouloir valider ce Bon de Caisse ?', 'class'=>'btn btn-app btn-success btn-xs')); ?></span>
<?php endif; ?>

<?php if(Yii::app()->user->checkAccess('Caissier') || Yii::app()->user->checkAccess('DG')): ?>
	<span style="float: right;"><?php echo CHtml::link('<i class="ace-icon fa fa-check"></i> Valider',
			array('bonCaisse/validerCaissierBC', 'id'=>$model->primaryKey),
			array('confirm' => 'Êtes vous sur de vouloir valider ce Bon de Caisse ?', 'class'=>'btn btn-app btn-success btn-xs')); ?></span>
	<button class="btn btn-app btn-light btn-xs" onclick="print();">
		<i class="ace-icon fa fa-print bigger-160"></i> Imprimer
	</button>
	<!--span class="btn btn-app btn-light btn-xs">
		<?php //echo CHtml::link('<i class="ace-icon fa fa-print bigger-160"></i> Imprimer', array('bonDeCaisse', 'id'=>$model->primaryKey), array('target'=>'_blank')); ?>
	</span-->

<?php endif; ?>
<div class="clearfix"></div>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'date',
		array(
			'label' => 'A l\'ordre de ',
			'type'=>'raw',
			'value' => User::model()->getUserProfileFields($model->a_ordre),
		),
		'motif',
		array(
			'label' => 'Montant',
			'type'=>'raw',
			'value'=>number_format($model->montant,0,'',' ').' frs CFA',
		),
		array(
			'label' => 'Transport',
			'type'=>'raw',
			'value'=>number_format($model->transport,0,'',' ').' frs CFA',
		),
		array(
			'label' => 'Visa caissière',
			'type'=>'raw',
			'value' => ($model->visa_caissier == 0) ? '<span class="label label-danger arrowed-in-right arrowed">Bon de Caisse non validé</span>' : '<span class="label label-success arrowed-in-right arrowed">Bon de Caisse validé</span>',
		),
		/*array(
			'label' => 'Visa interessé',
			'type'=>'raw',
			'value' => ($model->visa_interesse == 0) ? '<span class="label label-danger arrowed-in-right arrowed">Bon de Caisse non validé</span>' : '<span class="label label-success arrowed-in-right arrowed">Bon de Caisse validé</span>',
		),*/
		array(
			'label' => 'N° de pièce',
			'type'=>'raw',
			'value' => $model->num_piece,
		),
		array(
			'label' => 'Crée le ',
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
		<tr><td colspan="6" style="text-align: center; font-size:25px;">BON DE SORTIE CAISSE N° <span style="border: 1px solid #000; padding: 5px;"><?php echo $model->numero;?></span></td></tr>
		<tr><td colspan="6">&nbsp;</td></tr>
		<tr>
			<td>Date</td>
			<td><?php echo date('d/m/Y'); ?></td>
		</tr>
		<tr><td colspan="6"></td></tr>
		<tr>
			<td>A l’ordre de</td>
			<td colspan="2" style="border-bottom: 1px solid #000; background-color: #F5F5F5; padding: 5px;"><strong><?php echo User::model()->getUserProfileFields($model->a_ordre); ?></strong></td>
		</tr>
		<tr><td colspan="6">&nbsp;</td></tr>
		<tr>
			<td> Motif</td>
			<td colspan="2" style="border-bottom: 1px solid #000;"><?php echo $model->motif; ?></td>
		</tr>
		<tr><td colspan="6">&nbsp;</td></tr>
		<tr>
			<td>Montant </td>
			<td colspan="2" style="border-bottom: 1px solid #000;"><?php echo number_format($model->montant,0,'',' '); ?></span>frs CFA</td>
		</tr>
		<tr><td colspan="6">&nbsp;</td></tr>
		<tr>
			<td>Transport </td>
			<td colspan="2" style="border-bottom: 1px solid #000;"><?php echo number_format($model->transport,0,'',' '); ?></span>frs CFA</td>
		</tr>
		<tr><td colspan="6">&nbsp;</td></tr>
		<tr>
			<td>Rendu </td>
			<td colspan="2" style="border-bottom: 1px solid #000;"><?php echo number_format($model->rendue,0,'',' '); ?></span>frs CFA</td>
		</tr>
		<tr><td colspan="6">&nbsp;</td></tr>
		<tr>
			<td><p style="text-align: center">Caisse</p></td>
			<td>&nbsp;</td>
			<td><p style="text-align: center">Intéressé</p></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td style="border-bottom: 2px solid; font-size: 9px;" ><?php echo date('H:i:s'); ?></td>
			<td style="border-bottom: 2px solid;" colspan="2">&nbsp;</td>
			<td style="border-bottom: 2px solid;" colspan="3"></td>
		</tr>
	</table>
	<p>&nbsp;</p>
	<table border="0" cellspacing=0 cellpadding=0 style="width: 100%; border-collapse:collapse; font-family: 'Book Antiqua'; font-size: 12pt;">
		<tr>
			<td rowspan="1" colspan="2" valign="top"><img src="<?php echo Yii::app()->request->baseUrl ?>/images/logo.jpg" width="60%" /></td>
			<td style="text-align: right;"><img id="barcode3" width="50%" /></td>
		</tr>
		<tr><td colspan="6">&nbsp;</td></tr>
		<tr><td colspan="6" style="text-align: center; font-size:25px;">BON DE SORTIE CAISSE N° <span style="border: 1px solid #000; padding: 5px;"><?php echo $model->numero;?></span></td></tr>
		<tr><td colspan="6">&nbsp;</td></tr>
		<tr>
			<td>Date</td>
			<td><?php echo date('d/m/Y'); ?></td>
		</tr>
		<tr><td colspan="6"></td></tr>
		<tr>
			<td>A l’ordre de</td>
			<td colspan="2" style="border-bottom: 1px solid #000; background-color: #F5F5F5; padding: 5px;"><strong><?php echo User::model()->getUserProfileFields($model->a_ordre); ?></strong></td>
		</tr>
		<tr><td colspan="6">&nbsp;</td></tr>
		<tr>
			<td> Motif</td>
			<td colspan="2" style="border-bottom: 1px solid #000;"><?php echo $model->motif; ?></td>
		</tr>
		<tr><td colspan="6">&nbsp;</td></tr>
		<tr>
			<td>Montant </td>
			<td colspan="2" style="border-bottom: 1px solid #000;"><?php echo number_format($model->montant,0,'',' '); ?></span>frs CFA</td>
		</tr>
		<tr><td colspan="6">&nbsp;</td></tr>
		<tr>
			<td>Transport </td>
			<td colspan="2" style="border-bottom: 1px solid #000;"><?php echo number_format($model->transport,0,'',' '); ?></span>frs CFA</td>
		</tr>
		<tr><td colspan="6">&nbsp;</td></tr>
		<tr>
			<td>Rendu </td>
			<td colspan="2" style="border-bottom: 1px solid #000;"><?php echo number_format($model->rendue,0,'',' '); ?></span>frs CFA</td>
		</tr>
		<tr><td colspan="6">&nbsp;</td></tr>
		<tr>
			<td><p style="text-align: center">Caisse</p></td>
			<td>&nbsp;</td>
			<td><p style="text-align: center">Intéressé</p></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td style="border-bottom: 2px solid; font-size: 9px;" ><?php echo date('H:i:s'); ?></td>
			<td style="border-bottom: 2px solid;" colspan="2">&nbsp;</td>
			<td style="border-bottom: 2px solid;" colspan="3"></td>
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
