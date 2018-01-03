<?php
/* @var $this ClientController */
/* @var $model Client */
/* @var $dossier DossierClient */

$this->breadcrumbs=array(
	'Clients'=>array('index'),
	$model->code,
);

$this->menu=array(
	array('label'=>'<i class="menu-icon fa fa-list-alt"></i> <span class="menu-text">Liste des Dossiers</span>', 'url'=>array('index')),
	array('label'=>'<i class="menu-icon fa fa-floppy-o"></i> <span class="menu-text">Nouveau Dossier</span>', 'url'=>array('create')),
	array('label'=>'<i class="menu-icon fa fa-pencil-square-o"></i> <span class="menu-text">Modifier ce Dossier</span>', 'url'=>array('update', 'id'=>$model->id, 'do'=>$dossier->id)),
	//array('label'=>'<i class="menu-icon fa fa-trash-o"></i> <span class="menu-text">Supprimer ce Dossier</span>', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'<i class="menu-icon fa fa-cog"></i> <span class="menu-text">Gerer les Dossiers</span>', 'url'=>array('admin')),
);
?>
<div class="page-header">
	<h1>
		Dossier du client <strong><?php echo $model->nom.' '.$model->prenom; ?></strong>
		<?php if($model->getNumBooking($model->id) > 0): ?>
		<small><i class="ace-icon fa fa-angle-double-right"></i></small>
			<?php if($model->loadEtatDossier($model->primaryKey) == 1): ?>
				<?php echo CHtml::link('<i class="ace-icon fa fa-arrow-right icon-on-right"></i> Lancer un booking ',array('client/booking'), array('class'=>'btn btn-xs btn-danger blink_text')); ?>
			<?php elseif($model->loadEtatDossier($model->primaryKey) == 2) : ?>
				<?php echo CHtml::link('<i class="ace-icon fa fa-arrow-right icon-on-right"></i> Faire le devis A ',array('/processDevis/devisA/create'), array('class'=>'btn btn-sm btn-warning blink_text')); ?>
			<?php endif; ?>
		<?php endif; ?>
	</h1>
</div>

<div class="clearfix"></div>
<div class="col-xs-12">
	<?php if(Yii::app()->user->checkAccess('DD') || Yii::app()->user->checkAccess('DG')): ?>
	<button class="btn btn-app btn-light btn-xs" onclick="print();">
		<i class="ace-icon fa fa-print bigger-160"></i> Imprimer
	</button>
	<!--span class="btn btn-app btn-light btn-xs">
		<?php //echo CHtml::link('<i class="ace-icon fa fa-print bigger-160"></i> Imprimer', array('ticket', 'id'=>$model->primaryKey), array('target'=>'_blank')); ?>
	</span-->
	<?php endif; ?>
	<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'code',
		'nom',
		'prenom',
		'tel',
		'email',
		'adresse',

	),
)); ?>

	<table id="simple-table" class="table  table-bordered table-hover">
		<thead>
		<tr>
			<th class="detail-col">Date</th>
			<th>N°TC</th>
			<th>Nbr TC</th>
			<th>N° D.E</th>
			<th>N° C.O</th>
			<th>N° Exp</th>
			<th>N° Facture</th>
			<th>N° Liste de colisage</th>
			<th>N° BSC</th>
			<th>N° Booking</th>
			<th>N°BC</th>
			<th>BAE</th>
			<th>Faux Bel</th>
			<th>Bulletin de Liquidation</th>
			<th>Travail rémunéré</th>
			<th>N° Plomb</th>
			<th>Page Info</th>
			<th>Certificat d'empotage</th>
			<th>Déclation de Douane</th>
			<th>Quitance de Douane</th>
			<th>Reçu de Banque</th>
			<th>Bon de Sortie TC</th>
			<th>Interchange</th>
			<th>Ordre de Transite</th>

		</tr>
		</thead>
		<tbody>
		<tr>
			<td><?php echo date('d/m/Y', strtotime($dossier->date_created)); ?></td>
			<td class="ace-thumbnails clearfix">
				<a href="<?php echo Yii::app()->request->baseUrl.'/Dossiers_Clients/'.$model->code.'/'.$dossier->primaryKey.'/'.$dossier->img_tc; ?>" data-rel="colorbox" title="<?php echo $dossier->num_tc; ?>">
					<?php echo $dossier->num_tc; ?>
				</a>
			</td>
			<td><?php echo $dossier->nbr_conteneur; ?></td>
			<td class="ace-thumbnails clearfix">
				<a href="<?php echo Yii::app()->request->baseUrl.'/Dossiers_Clients/'.$model->code.'/'.$dossier->primaryKey.'/'.$dossier->img_de; ?>" data-rel="colorbox" title="<?php echo $dossier->num_de; ?>">
					<?php echo $dossier->num_de; ?>
				</a>
			</td>
			<td class="ace-thumbnails clearfix">
				<a href="<?php echo Yii::app()->request->baseUrl.'/Dossiers_Clients/'.$model->code.'/'.$dossier->primaryKey.'/'.$dossier->img_co; ?>" data-rel="colorbox" title="<?php echo $dossier->num_co; ?>">
					<?php echo $dossier->num_co; ?>
				</a>
			</td>
			<td class="ace-thumbnails clearfix">
				<a href="<?php echo Yii::app()->request->baseUrl.'/Dossiers_Clients/'.$model->code.'/'.$dossier->primaryKey.'/'.$dossier->img_expertise; ?>" data-rel="colorbox" title="<?php echo $dossier->num_expertise; ?>">
					<?php echo $dossier->num_expertise; ?>
				</a>
			</td>
			<td class="ace-thumbnails clearfix">
				<a href="<?php echo Yii::app()->request->baseUrl.'/Dossiers_Clients/'.$model->code.'/'.$dossier->primaryKey.'/'.$dossier->img_facture; ?>" data-rel="colorbox" title="<?php echo $dossier->num_facture; ?>">
					<?php echo $dossier->num_facture; ?>
				</a>
			</td>
			<td class="ace-thumbnails clearfix">
				<a href="<?php echo Yii::app()->request->baseUrl.'/Dossiers_Clients/'.$model->code.'/'.$dossier->primaryKey.'/'.$dossier->img_liste_colisage; ?>" data-rel="colorbox" title="<?php echo $dossier->num_liste_colisage; ?>">
					<?php echo $dossier->num_liste_colisage; ?>
				</a>
			</td>
			<td class="ace-thumbnails clearfix">
				<a href="<?php echo Yii::app()->request->baseUrl.'/Dossiers_Clients/'.$model->code.'/'.$dossier->primaryKey.'/'.$dossier->img_bsc; ?>" data-rel="colorbox" title="<?php echo $dossier->num_bsc; ?>">
					<?php echo $dossier->num_bsc; ?>
				</a>
			</td>
			<td class="ace-thumbnails clearfix">
				<a href="<?php echo Yii::app()->request->baseUrl.'/Dossiers_Clients/'.$model->code.'/'.$dossier->primaryKey.'/'.$dossier->img_booking; //$model->getImgBookingClient($model->primaryKey) ?>" data-rel="colorbox" title="<?php echo $dossier->num_booking; //$model->getNumBooking($model->primaryKey)?>">
					<?php echo $dossier->num_booking; ?>
				</a>
			</td>
			<td class="ace-thumbnails clearfix">
				<a href="<?php echo Yii::app()->request->baseUrl.'/Dossiers_Clients/'.$model->code.'/'.$dossier->primaryKey.'/'.$dossier->img_bon_commande; //$model->getImgBC($model->primaryKey) ?>" data-rel="colorbox" title="<?php echo $dossier->num_bon_commande; //$model->getNumBCmd($model->primaryKey)?>">
					<?php echo $dossier->num_bon_commande;?>
				</a>
			</td>
			<td class="ace-thumbnails clearfix">
				<a href="<?php echo Yii::app()->request->baseUrl.'/Dossiers_Clients/'.$model->code.'/'.$dossier->primaryKey.'/'.$dossier->img_bae; //$model->getImgBC($model->primaryKey) ?>" data-rel="colorbox" title="<?php echo $dossier->bae; //$model->getNumBCmd($model->primaryKey)?>">
					<?php echo $dossier->bae;?>
				</a>
			</td>
			<td class="ace-thumbnails clearfix">
				<a href="<?php echo Yii::app()->request->baseUrl.'/Dossiers_Clients/'.$model->code.'/'.$dossier->primaryKey.'/'.$dossier->img_faux_bel; //$model->getImgBC($model->primaryKey) ?>" data-rel="colorbox" title="<?php echo $dossier->faux_bel; //$model->getNumBCmd($model->primaryKey)?>">
					<?php echo $dossier->faux_bel;?>
				</a>
			</td>
			<td class="ace-thumbnails clearfix">
				<a href="<?php echo Yii::app()->request->baseUrl.'/Dossiers_Clients/'.$model->code.'/'.$dossier->primaryKey.'/'.$dossier->img_bul_liquidation; //$model->getImgBC($model->primaryKey) ?>" data-rel="colorbox" title="<?php echo $dossier->bul_liquidation; //$model->getNumBCmd($model->primaryKey)?>">
					<?php echo $dossier->bul_liquidation; ?>
				</a>
			</td>
			<td class="ace-thumbnails clearfix">
				<a href="<?php echo Yii::app()->request->baseUrl.'/Dossiers_Clients/'.$model->code.'/'.$dossier->primaryKey.'/'.$dossier->img_travail_remunerer; //$model->getImgBC($model->primaryKey) ?>" data-rel="colorbox" title="<?php echo $dossier->travail_remunerer; //$model->getNumBCmd($model->primaryKey)?>">
					<?php echo $dossier->travail_remunerer; ?>
				</a>
			</td>
			<td><?php echo $dossier->num_plomb; ?></td>
			<td class="ace-thumbnails clearfix">
				<a href="<?php echo Yii::app()->request->baseUrl.'/Dossiers_Clients/'.$model->code.'/'.$dossier->primaryKey.'/'.$dossier->img_page_info; //$model->getImgBC($model->primaryKey) ?>" data-rel="colorbox" title="<?php echo $dossier->page_info; //$model->getNumBCmd($model->primaryKey)?>">
					<?php echo $dossier->page_info; ?>
				</a>
			</td>
			<td class="ace-thumbnails clearfix">
				<a href="<?php echo Yii::app()->request->baseUrl.'/Dossiers_Clients/'.$model->code.'/'.$dossier->primaryKey.'/'.$dossier->img_certificat_empotage; //$model->getImgBC($model->primaryKey) ?>" data-rel="colorbox" title="<?php echo $dossier->certificat_empotage; //$model->getNumBCmd($model->primaryKey)?>">
					<?php echo $dossier->certificat_empotage; ?>
				</a>
			</td>
			<td class="ace-thumbnails clearfix">
				<a href="<?php echo Yii::app()->request->baseUrl.'/Dossiers_Clients/'.$model->code.'/'.$dossier->primaryKey.'/'.$dossier->img_declaration_douane; //$model->getImgBC($model->primaryKey) ?>" data-rel="colorbox" title="<?php echo $dossier->declaration_douane; //$model->getNumBCmd($model->primaryKey)?>">
					<?php echo $dossier->declaration_douane; ?>
				</a>
			</td>
			<td class="ace-thumbnails clearfix">
				<a href="<?php echo Yii::app()->request->baseUrl.'/Dossiers_Clients/'.$model->code.'/'.$dossier->primaryKey.'/'.$dossier->img_quitance_douane; //$model->getImgBC($model->primaryKey) ?>" data-rel="colorbox" title="<?php echo $dossier->quitance_douane; //$model->getNumBCmd($model->primaryKey)?>">
					<?php echo $dossier->quitance_douane; ?>
				</a>
			</td>
			<td class="ace-thumbnails clearfix">
				<a href="<?php echo Yii::app()->request->baseUrl.'/Dossiers_Clients/'.$model->code.'/'.$dossier->primaryKey.'/'.$dossier->img_recu_banq; //$model->getImgBC($model->primaryKey) ?>" data-rel="colorbox" title="<?php echo $dossier->recu_banq; //$model->getNumBCmd($model->primaryKey)?>">
					<?php echo $dossier->recu_banq; ?>
				</a>
			</td>
			<td class="ace-thumbnails clearfix">
				<a href="<?php echo Yii::app()->request->baseUrl.'/Dossiers_Clients/'.$model->code.'/'.$dossier->primaryKey.'/'.$dossier->img_bon_sortie_tc; //$model->getImgBC($model->primaryKey) ?>" data-rel="colorbox" title="<?php echo $dossier->bon_sortie_tc; //$model->getNumBCmd($model->primaryKey)?>">
					<?php echo $dossier->bon_sortie_tc; ?>
				</a>
			</td>
			<td class="ace-thumbnails clearfix">
				<a href="<?php echo Yii::app()->request->baseUrl.'/Dossiers_Clients/'.$model->code.'/'.$dossier->primaryKey.'/'.$dossier->img_interchange; //$model->getImgBC($model->primaryKey) ?>" data-rel="colorbox" title="<?php echo $dossier->interchange; //$model->getNumBCmd($model->primaryKey)?>">
					<?php echo $dossier->interchange; ?>
				</a>
			</td>
			<td class="ace-thumbnails clearfix">
				<a href="<?php echo Yii::app()->request->baseUrl.'/Dossiers_Clients/'.$model->code.'/'.$dossier->primaryKey.'/'.$dossier->img_ordre_transit; //$model->getImgBC($model->primaryKey) ?>" data-rel="colorbox" title="<?php echo $dossier->ordre_transit; //$model->getNumBCmd($model->primaryKey)?>">
					<?php echo $dossier->ordre_transit; ?>
				</a>
			</td>
		</tr>
		</tbody>
	</table>
</div><!-- /.span -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/css/dist/JsBarcode.all.js"></script>
<div id="ticket">
	<p style="text-align: center; font-size: 20px;"><strong>TICKET DE CONFIRMATION DE BOOKING</strong></p>
	<table border="0" cellspacing=0 cellpadding=0 style="width: 100%; border-collapse:collapse; font-family: 'Book Antiqua'; font-size: 12pt; border-top: 1px solid;">
		<tr>
			<td rowspan="3" colspan="2"><img src="<?php echo Yii::app()->request->baseUrl ?>/images/logo.jpg" width="30%" /></td>
			<td style="background-color: #000; color: #ffffff; text-align: center; padding: 5px;"><?php echo date('d/m/Y'); ?></td>
		</tr>
		<tr><td colspan="6">&nbsp;</td></tr>
		<tr><td colspan="6">&nbsp;</td></tr>
		<tr>
			<td>Booking N°</td>
			<td style="border-bottom: 1px solid #000; background-color: #F5F5F5; padding: 5px;"><strong><?php echo $model->getNumBooking($model->primarykey); ?></strong></td>
		</tr>
		<tr><td colspan="6">&nbsp;</td></tr>
		<tr>
			<td>Bon de commande N°</td>
			<td style="border-bottom: 1px solid #000; background-color: #F5F5F5; padding: 5px;"><strong><?php echo $model->getNumBCmd($model->primarykey); ?></strong></td>
		</tr>
		<tr><td colspan="6">&nbsp;</td></tr>
		<tr>
			<td>Dossier enregistré sous le N°</td>
			<td style="border-bottom: 1px solid #000;"><?php echo $dossier->numero; ?></td>
		</tr>
		<tr><td colspan="6">&nbsp;</td></tr>
		<tr>
			<td>Client </td>
			<td style="border-bottom: 1px solid #000;"><?php echo $model->nom.' '.$model->prenom; ?></td>
		</tr>
		<tr><td colspan="6">&nbsp;</td></tr>
		<tr>
			<td>Destination </td>
			<td style="border-bottom: 1px solid #000;">SERVICE TRANSIT ET TRANSPORT</td>
		</tr>
		<tr><td colspan="6">&nbsp;</td></tr>
		<tr>
			<td>Edité par </td>
			<td style="border-bottom: 1px solid #000;"><?php echo User::model()->getUserProfileFields(Yii::app()->user->id); ?></td>
		</tr>
		<tr><td colspan="6">&nbsp;</td></tr>
		<tr>
			<td>&nbsp;</td>
			<td style="text-align: right;"><img id="barcode3"/></td>
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
			visibility: visible;
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
	JsBarcode("#barcode3", "<?php echo $dossier->numero; ?>", {
		format:"code128",
		displayValue:true,
		fontSize:20
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
