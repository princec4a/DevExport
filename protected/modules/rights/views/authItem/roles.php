<?php $this->breadcrumbs = array(
	'Droits'=>Rights::getBaseUrl(),
	Rights::t('core', 'Rôles'),
); ?>

<div class="page-header">
	<h1><?php echo Rights::t('core', 'Rôles'); ?></h1>
</div>

<div id="roles">

	<p>
		<?php echo Rights::t('core', 'Un rôle est un groupe d\'autorisations pour effectuer une variété de tâches et d\'opérations, par exemple l\'utilisateur authentifié.'); ?><br />
		<?php echo Rights::t('core', 'Les rôles existent en haut de la hiérarchie d\'autorisation et peuvent donc hériter d\'autres rôles, tâches et / ou opérations.'); ?>
	</p>



	<p><?php echo CHtml::link(Rights::t('core', '<i class="ace-icon fa fa-floppy-o bigger-160"></i> Nouveau rôle'), array('authItem/create', 'type'=>CAuthItem::TYPE_ROLE), array(
	   	'class'=>'btn btn-app btn-primary btn-xs radius-4',
	)); ?></p>

	<?php $this->widget('zii.widgets.grid.CGridView', array(
	    'dataProvider'=>$dataProvider,
	    'template'=>'{items}',
	    'emptyText'=>Rights::t('core', 'No roles found.'),
	    'htmlOptions'=>array('class'=>'grid-view role-table'),
	    'columns'=>array(
    		array(
    			'name'=>'name',
    			'header'=>Rights::t('core', 'Name'),
    			'type'=>'raw',
    			'htmlOptions'=>array('class'=>'name-column'),
    			'value'=>'$data->getGridNameLink()',
    		),
    		array(
    			'name'=>'description',
    			'header'=>Rights::t('core', 'Description'),
    			'type'=>'raw',
    			'htmlOptions'=>array('class'=>'description-column'),
    		),
    		array(
    			'name'=>'bizRule',
    			'header'=>Rights::t('core', 'Business rule'),
    			'type'=>'raw',
    			'htmlOptions'=>array('class'=>'bizrule-column'),
    			'visible'=>Rights::module()->enableBizRule===true,
    		),
    		array(
    			'name'=>'data',
    			'header'=>Rights::t('core', 'Data'),
    			'type'=>'raw',
    			'htmlOptions'=>array('class'=>'data-column'),
    			'visible'=>Rights::module()->enableBizRuleData===true,
    		),
    		array(
    			'header'=>'&nbsp;',
    			'type'=>'raw',
    			'htmlOptions'=>array('class'=>'actions-column'),
    			'value'=>'$data->getDeleteRoleLink()',
    		),
	    )
	)); ?>

	<p class="info"><?php echo Rights::t('core', 'Values within square brackets tell how many children each item has.'); ?></p>

</div>