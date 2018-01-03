<?php
/* @var $this BonEncaissementController */
/* @var $model BonEncaissement */

$this->breadcrumbs=array(
	'Bon Encaissements'=>array('index'),
	$model->numero,
);

$this->menu=array(
	array('label'=>'<i class="menu-icon fa fa-list-alt"></i> <span class="menu-text">Lister des Encaissements</span>', 'url'=>array('index')),
	array('label'=>'<i class="menu-icon fa fa-floppy-o"></i> <span class="menu-text">Nouvel Encaissement</span>', 'url'=>array('create')),
	array('label'=>'<i class="menu-icon fa fa-pencil-square-o"></i> <span class="menu-text">Modifier Encaissement</span>', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'<i class="menu-icon fa fa-trash-o"></i> <span class="menu-text">Supprimer Encaissement</span>', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage BonEncaissement', 'url'=>array('admin')),
);
?>


<div class="page-header">
	<h1> Bon Encaissement N° <strong><?php echo $model->numero; ?></strong></h1>
</div>

<?php if(Yii::app()->user->checkAccess('Caissier') || Yii::app()->user->checkAccess('DG')): ?>
	<button class="btn btn-app btn-light btn-xs" onclick="print();">
		<i class="ace-icon fa fa-print bigger-160"></i> Imprimer
	</button>
<?php endif; ?>

<div class="clearfix"></div>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'numero',
		'date',
		array(
			'label' => 'A l\'ordre de ',
			'type'=>'raw',
			'value' => $model->idDossier->idClient->nom_societe,
		),
		'motif',
		array(
			'label' => 'Montant',
			'type'=>'raw',
			'value' => number_format($model->montant,0,'',' ').' frs CFA',
		),
		array(
			'label' => 'Accompte',
			'type'=>'raw',
			'value' => number_format($model->accompte,0,'',' ').' frs CFA',
		),
		array(
			'label' => 'Reste',
			'type'=>'raw',
			'value' => number_format($model->reste,0,'',' ').' frs CFA',
		),
		array(
			'label' => 'N° Booking',
			'type'=>'raw',
			'value' => $model->idDossier->num_booking,
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
		<tr><td colspan="6" style="text-align: center; font-size:25px;">BON D'ENCAISSEMENT N° <span style="border: 1px solid #000; padding: 5px;"><?php echo $model->numero;?></span></td></tr>
		<tr><td colspan="6">&nbsp;</td></tr>
		<tr>
			<td>Date</td>
			<td><?php echo date('d/m/Y'); ?></td>
		</tr>
		<tr><td colspan="6"></td></tr>
		<tr>
			<td>A l’ordre de</td>
			<td colspan="2" style="border-bottom: 1px solid #000; background-color: #F5F5F5; padding: 5px;"><strong><?php echo $model->idDossier->idClient->nom_societe; ?></strong></td>
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
			<td>Accompte </td>
			<td colspan="2" style="border-bottom: 1px solid #000;"><?php echo number_format($model->accompte,0,'',' '); ?></span>frs CFA</td>
		</tr>
		<tr><td colspan="6">&nbsp;</td></tr>
		<tr>
			<td>Reste </td>
			<td colspan="2" style="border-bottom: 1px solid #000;"><?php echo number_format($model->reste,0,'',' '); ?></span>frs CFA</td>
		</tr>
		<tr><td colspan="6">&nbsp;</td></tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td><p style="text-align: center">Caisse</p></td>
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
	<p>&nbsp;</p>
	<table border="0" cellspacing=0 cellpadding=0 style="width: 100%; border-collapse:collapse; font-family: 'Book Antiqua'; font-size: 12pt;">
		<tr>
			<td rowspan="1" colspan="2" valign="top"><img src="<?php echo Yii::app()->request->baseUrl ?>/images/logo.jpg" width="60%" /></td>
			<td style="text-align: right;"><img id="barcode3" width="50%" /></td>
		</tr>
		<tr><td colspan="6">&nbsp;</td></tr>
		<tr><td colspan="6" style="text-align: center; font-size:25px;">BON D'ENCAISSEMENT N° <span style="border: 1px solid #000; padding: 5px;"><?php echo $model->numero;?></span></td></tr>
		<tr><td colspan="6">&nbsp;</td></tr>
		<tr>
			<td>Date</td>
			<td><?php echo date('d/m/Y'); ?></td>
		</tr>
		<tr><td colspan="6"></td></tr>
		<tr>
			<td>A l’ordre de</td>
			<td colspan="2" style="border-bottom: 1px solid #000; background-color: #F5F5F5; padding: 5px;"><strong><?php echo $model->idDossier->idClient->nom_societe; ?></strong></td>
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
			<td>Accompte </td>
			<td colspan="2" style="border-bottom: 1px solid #000;"><?php echo number_format($model->accompte,0,'',' '); ?></span>frs CFA</td>
		</tr>
		<tr><td colspan="6">&nbsp;</td></tr>
		<tr>
			<td>Reste </td>
			<td colspan="2" style="border-bottom: 1px solid #000;"><?php echo number_format($model->reste,0,'',' '); ?></span>frs CFA</td>
		</tr>
		<tr><td colspan="6">&nbsp;</td></tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td><p style="text-align: center">Caisse</p></td>
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
