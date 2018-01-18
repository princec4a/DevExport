<?php
/* @var $this FactureController */
/* @var $model Facture */

$this->breadcrumbs=array(
	'Factures'=>array('index'),
	$model->numero,
);

$this->menu=array(
	array('label'=>'<i class="menu-icon fa fa-list-alt"></i> <span class="menu-text">Lister des Factures</span>', 'url'=>array('index')),
	array('label'=>'<i class="menu-icon fa fa-floppy-o"></i> <span class="menu-text">Nouvelle Facture</span>', 'url'=>array('create')),
	array('label'=>'<i class="menu-icon fa fa-pencil-square-o"></i> <span class="menu-text">Modifier Facture</span>', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'<i class="menu-icon fa fa-trash-o"></i> <span class="menu-text">Supprimer Facture</span>', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Êtes vous sur de vouloir modifier cet élément?')),
	//array('label'=>'Manage Facture', 'url'=>array('admin')),
);
?>

<div class="page-header">
	<h1>
		Facture N° <strong><?php echo $model->numero; ?></strong>
	</h1>
</div>

<button class="btn btn-app btn-light btn-xs" onclick="print();">
	<i class="ace-icon fa fa-print bigger-160"></i> Imprimer
</button>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'client',
		'pays_destionation',
		'nom_navire',
		'port_embarquement',
		'port_chargement',
		'destination_final',
		/*'date_created',
		'date_modified',
		'id_user',*/
	),
)); ?>

<table id="simple-table" class="table  table-bordered table-hover">
	<thead>
	<tr>
		<th>N°</th>
		<th>Description matériel</th>
		<th>Conteneur</th>
		<th>Taux/MT</th>
		<th>Poids Net(MT)</th>
		<th>Montant (cfa)</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach($model->detailFactures as $key => $detailFacture): ?>
		<tr>
			<td><?=$key+1; ?></td>
			<td><?=$detailFacture->description_materiel; ?></td>
			<td><?=$detailFacture->conteneur; ?></td>
			<td style="text-align: right;"><?php echo number_format(DetailFacture::TAUX_AFFICHAGE,0,'','.'); ?></td>
			<td style="text-align: right;"><?php echo number_format($detailFacture->poids_net,0,'','.'); ?></td>
			<td style="text-align: right;"><?php echo number_format($detailFacture->taux*$detailFacture->poids_net,0,'','.'); ?></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	<tfoot>
	<tr>
		<td colspan="4" style="text-align: right"><strong>Total = </strong></td>
		<td  style="text-align: right; background-color: #e5f1f4; color: #000000;"><strong><?=number_format($model->total_poids_net,0,'','.') ?></strong></td>
		<td  style="text-align: right; background-color: #438EB9; color: #ffffff;"><strong><?=number_format($model->montant,0,'','.') ?></strong></td>
	</tr>
	</tfoot>
</table>

<script src="<?php echo Yii::app()->request->baseUrl; ?>/css/dist/JsBarcode.all.js"></script>
<div id="ticket">
	<table border="0" cellspacing=0 cellpadding=0 style="width: 100%; border-collapse:collapse; font-family: 'Book Antiqua'; font-size: 12pt;">
		<tr>
			<td rowspan="1" colspan="3" valign="top" style="text-align: center;"><img src="<?php echo Yii::app()->request->baseUrl ?>/images/logo.jpg" width="30%" /></td>
		</tr>
		<tr><td colspan="6">&nbsp;</td></tr>
		<tr>
			<td colspan="6" style="text-align: center; font-size:25px;">
				FACTURE N° <span style="border: 1px solid #000; padding: 5px; background-color: #E4F1F3;"><?php echo $model->numero;?></span>
				<span><img id="barcode3" width="13%" /></span>
			</td>
		</tr>
		<tr><td colspan="6">&nbsp;</td></tr>
		<tr>
			<td><span style="border: 1px solid #000000; background-color: #E4F1F3; padding: 10px;">Date: <?php echo date('d/m/Y'); ?></span></td>
			<td>&nbsp;</td>
		</tr>
		<tr><td colspan="6">&nbsp;</td></tr>
		<tr><td colspan="6">&nbsp;</td></tr>
	</table>
	<table border="0" cellspacing=0 cellpadding=0 style="width: 100%; border-collapse:collapse; font-family: 'Book Antiqua'; font-size: 12pt;">
		<tr>
			<th>Consigne / export</th>
			<td style="border-bottom: 2px solid #000000; padding: 0 0 2px 0;"><?=$model->client; ?></td>
		</tr>
		<tr>
			<th>Pays de destination</th>
			<td style="border-bottom: 2px solid #000000; padding: 0 0 2px 0;"><?=$model->pays_destionation; ?></td>
		</tr>
		<tr>
			<th>Nom du navire</th>
			<td style="border-bottom: 2px solid #000000; padding: 0 0 2px 0;"><?=$model->nom_navire; ?></td>
		</tr>
		<tr>
			<th>Port d'embarquement</th>
			<td style="border-bottom: 2px solid #000000; padding: 0 0 2px 0;"><?=$model->port_embarquement; ?></td>
		</tr>
		<tr>
			<th>Port de chargement</th>
			<td style="border-bottom: 2px solid #000000; padding: 0 0 2px 0;"><?=$model->port_chargement; ?></td>
		</tr>
		<tr>
			<th>Destination finale</th>
			<td style="border-bottom: 2px solid #000000; padding: 0 0 2px 0;"><?=$model->destination_final; ?></td>
		</tr>
	</table>
	<p>&nbsp;</p>
	<table border="0" cellspacing=0 cellpadding=0 style="width: 100%; border-collapse:collapse; font-family: 'Book Antiqua'; font-size: 12pt;">
		<tr>
			<th style="border: 2px solid #000000; padding: 0 5px;">N°</th>
			<th style="border: 2px solid #000000; padding: 0 5px;">Description matériel</th>
			<th style="border: 2px solid #000000; padding: 0 5px;">Conteneur</th>
			<th style="border: 2px solid #000000; padding: 0 5px;">Taux/MT</th>
			<th style="border: 2px solid #000000; padding: 0 5px;">Poids Net(MT)</th>
			<th style="border: 2px solid #000000; padding: 0 5px;">Montant (cfa)</th>
		</tr>
		<?php foreach($model->detailFactures as $key => $detailFacture): ?>
			<tr style="background-color: <?=($key%2==0)? '#F8F8F8':'#E4F1F3' ?>;">
				<td style="border: 1px solid #000; padding: 5px"><?=$key+1; ?></td>
				<td style="border: 1px solid #000; padding: 5px"><?=$detailFacture->description_materiel; ?></td>
				<td style="border: 1px solid #000; padding: 5px"><?=$detailFacture->conteneur; ?></td>
				<td style="text-align: right; border: 1px solid #000; padding: 5px"><?php echo number_format(DetailFacture::TAUX_AFFICHAGE,0,'','.'); ?></td>
				<td style="text-align: right; border: 1px solid #000; padding: 5px"><?php echo number_format($detailFacture->poids_net,0,'','.'); ?></td>
				<td style="text-align: right; border: 1px solid #000; padding: 5px"><?php echo number_format($detailFacture->taux*$detailFacture->poids_net,0,'','.'); ?></td>
			</tr>
		<?php endforeach; ?>
		<tr>
			<td colspan="4" style="text-align: right; border: 1px solid #000; padding: 5px"><strong>Total = </strong></td>
			<td  style="text-align: right; background-color: #e5f1f4; color: #000000; border: 1px solid #000; padding: 5px""><strong><?=number_format($model->total_poids_net,0,'','.') ?></strong></td>
			<td  style="text-align: right; background-color: #438EB9; color: #ffffff; border: 1px solid #000; padding: 5px""><strong><?=number_format($model->montant,0,'','.') ?></strong></td>
		</tr>
	</table>
	<p>&nbsp;</p>
	<table border="0" cellspacing=0 cellpadding=0 style="width: 100%; border-collapse:collapse; font-family: 'Book Antiqua'; font-size: 12pt;" width="100%">
		<tr>
			<td width="50%">
				<span style="font-weight: bold; border-bottom: 1px dotted #000000;">Montant en francs CFA (en lettre) : </span><br />
				<span  style="font-weight: bold; color: #2679b5" ><?= strtoupper(NumberToWords::toFr($model->montant)); ?> francs CFA</span>
			</td>
			<td width="25%">&nbsp;</td>
			<td width="25%" style="padding: 20px 5px 40px 5px; border: 1px solid #000000;">Signature & Date</td>
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
