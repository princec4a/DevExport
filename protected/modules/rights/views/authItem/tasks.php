<?php $this->breadcrumbs = array(
	'Droits'=>Rights::getBaseUrl(),
	Rights::t('core', 'Tâches'),
); ?>

<div class="page-header">
	<h1><?php echo Rights::t('core', 'Tâches'); ?></h1>
</div>

<div id="tasks">

	<p>
		<?php echo Rights::t('core', 'Une tâche est une autorisation d\'effectuer plusieurs opérations, par exemple l\'accès à un groupe d\'action du contrôleur.'); ?><br />
		<?php echo Rights::t('core', 'Les tâches existent sous des rôles dans la hiérarchie d\'autorisation et ne peuvent donc hériter que d\'autres tâches et / ou opérations.'); ?>
	</p>

	<p><?php echo CHtml::link(Rights::t('core', '<i class="ace-icon fa fa-floppy-o bigger-160"></i> Nouvelle tâche'), array('authItem/create', 'type'=>CAuthItem::TYPE_TASK), array(
			'class'=>'btn btn-app btn-primary btn-xs radius-4',
	)); ?></p>

	<?php $this->widget('zii.widgets.grid.CGridView', array(
	    'dataProvider'=>$dataProvider,
	    'template'=>'{items}',
	    'emptyText'=>Rights::t('core', 'No tasks found.'),
	    'htmlOptions'=>array('class'=>'grid-view task-table'),
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
    			'value'=>'$data->getDeleteTaskLink()',
    		),
	    )
	)); ?>

	<p class="info"><?php echo Rights::t('core', 'Values within square brackets tell how many children each item has.'); ?></p>

</div>