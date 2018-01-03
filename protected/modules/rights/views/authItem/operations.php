<?php $this->breadcrumbs = array(
	'Droits'=>Rights::getBaseUrl(),
	Rights::t('core', 'Operations'),
); ?>

<div class="page-header">
	<h1><?php echo Rights::t('core', 'Operations'); ?></h1>
</div>

<div id="operations">

	<p>
		<?php echo Rights::t('core', 'Une opération est une autorisation pour effectuer une seule opération, par exemple en accédant à une certaine action de contrôleur.'); ?><br />
		<?php echo Rights::t('core', 'Les opérations existent sous les tâches de la hiérarchie d\'autorisation et ne peuvent donc hériter que des autres opérations.'); ?>
	</p>

	<p><?php echo CHtml::link(Rights::t('core', '<i class="ace-icon fa fa-floppy-o bigger-160"></i> Nouvelle operation'), array('authItem/create', 'type'=>CAuthItem::TYPE_OPERATION), array(
			'class'=>'btn btn-app btn-primary btn-xs radius-4',
	)); ?></p>

	<?php $this->widget('zii.widgets.grid.CGridView', array(
	    'dataProvider'=>$dataProvider,
	    'template'=>'{items}',
	    'emptyText'=>Rights::t('core', 'No operations found.'),
	    'htmlOptions'=>array('class'=>'grid-view operation-table sortable-table'),
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
    			'value'=>'$data->getDeleteOperationLink()',
    		),
	    )
	)); ?>

	<p class="info"><?php echo Rights::t('core', 'Values within square brackets tell how many children each item has.'); ?></p>

</div>