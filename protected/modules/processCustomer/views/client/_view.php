<?php
/* @var $this ClientController */
/* @var $data Client */
?>
<div class="col-sm-4">
	<div class="widget-box">
		<div class="widget-header">
			<h4 class="widget-title"><?php echo CHtml::encode($data->nom_societe); ?></h4>
		</div>

		<div class="widget-body">
			<div class="widget-main">
				<div class=""><span style="display: block; float: left; width: 60%;">Compte :</span> <strong><?php echo CHtml::encode($data->code); ?></strong></div>
				<hr style="margin: 0 0 5px;" />
				<div class=""><span style="display: block; float: left; width: 60%;">Téléphone:</span> <strong><?php echo CHtml::encode($data->tel); ?></strong></div>
				<hr style="margin: 0 0 5px;" />
				<div class=""><span style="display: block; float: left; width: 60%;">E-mail :</span> <strong><?php echo CHtml::encode($data->email); ?></strong></div>
				<hr style="margin: 0 0 5px;" />
				<div class=""><span style="display: block; float: left; width: 60%;">Adresse :</span> <strong><?php echo CHtml::encode($data->adresse); ?></strong></div>
				<div class="clearfix"></div>
				<hr style="margin: 0 0 5px;" />
				<div class=""><span style="cursor: pointer;" id="doc_<?=$data->id; ?>"><?= count($data->dossiers); ?> Dossier(s) <strong id="plus_<?=$data->id; ?>">[+]</strong></span>
					<ul id="list_<?=$data->id; ?>" style="display: none;">
						<?php foreach($data->dossiers as $dossier) : ?>
							<li><?= CHtml::link($dossier->numero, array('view', 'id'=>$data->id, 'do'=>$dossier->id));  ?></li>
						<?php endforeach; ?>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	jQuery(function($) {
		$("#doc_<?=$data->id; ?>").click(function(){
			$("#list_<?=$data->id; ?>").toggle('slow');
			if($("#plus_<?=$data->id; ?>").html() == '[+]') $("#plus_<?=$data->id; ?>").html('[-]');
			else $("#plus_<?=$data->id; ?>").html('[+]');
		});
	})
</script>