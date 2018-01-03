<?php $this->breadcrumbs = array(
	'Droits'=>Rights::getBaseUrl(),
	Rights::t('core', 'Permissions'),
); ?>

<div id="permissions">

	<h2><?php echo Rights::t('core', 'Permissions'); ?></h2>

	<p>
		<?php echo Rights::t('core', 'Ici, vous pouvez afficher et gérer les autorisations attribuées à chaque rôle.'); ?><br />
		<?php echo Rights::t('core', 'Les éléments d\'autorisation peuvent être gérés sous {roleLink}, {taskLink} and {operationLink}.', array(
			'{roleLink}'=>CHtml::link(Rights::t('core', 'Rôles'), array('authItem/roles')),
			'{taskLink}'=>CHtml::link(Rights::t('core', 'Tâches'), array('authItem/tasks')),
			'{operationLink}'=>CHtml::link(Rights::t('core', 'Operations'), array('authItem/operations')),
		)); ?>
	</p>
s
	<p><?php echo CHtml::link(Rights::t('core', '<i class="ace-icon fa fa-floppy-o bigger-160"></i> Nouvelle permission'), array('authItem/generate'), array(
			'class'=>'btn btn-app btn-primary btn-xs radius-4',
	)); ?></p>

	<?php $this->widget('zii.widgets.grid.CGridView', array(
		'dataProvider'=>$dataProvider,
		'template'=>'{items}',
		'emptyText'=>Rights::t('core', 'No authorization items found.'),
		'htmlOptions'=>array('class'=>'grid-view permission-table'),
		'columns'=>$columns,
	)); ?>

	<p class="info">*) <?php echo Rights::t('core', 'Hover to see from where the permission is inherited.'); ?></p>

	<script type="text/javascript">

		/**
		* Attach the tooltip to the inherited items.
		*/
		jQuery('.inherited-item').rightsTooltip({
			title:'<?php echo Rights::t('core', 'Source'); ?>: '
		});

		/**
		* Hover functionality for rights' tables.
		*/
		$('#rights tbody tr').hover(function() {
			$(this).addClass('hover'); // On mouse over
		}, function() {
			$(this).removeClass('hover'); // On mouse out
		});

	</script>

</div>
