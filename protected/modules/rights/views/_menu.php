<?php $this->widget('zii.widgets.CMenu', array(
	'firstItemCssClass'=>'first',
	'lastItemCssClass'=>'last',
	'encodeLabel'=>false,
	'htmlOptions'=>array('class'=>'nav nav-list'),
	'items'=>array(
		array(
			'label'=>Rights::t('core','<i class="menu-icon fa fa-cog"></i> <span class="menu-text">Assignations</span>' ),
			'url'=>array('assignment/view'),
			'itemOptions'=>array('class'=>'hover'),
		),
		array(
			'label'=>Rights::t('core', '<i class="menu-icon fa fa-wrench"></i> <span class="menu-text">Permissions</span>'),
			'url'=>array('authItem/permissions'),
			'itemOptions'=>array('class'=>'hover'),
		),
		array(
			'label'=>Rights::t('core', '<i class="menu-icon fa fa-flask"></i> <span class="menu-text">Rôles</span>'),
			'url'=>array('authItem/roles'),
			'itemOptions'=>array('class'=>'hover'),
		),
		array(
			'label'=>Rights::t('core', '<i class="menu-icon fa fa-bolt"></i> <span class="menu-text">Tâches</span>'),
			'url'=>array('authItem/tasks'),
			'itemOptions'=>array('class'=>'hover'),
		),
		array(
			'label'=>Rights::t('core', '<i class="menu-icon fa fa-arrow-circle-o-down"></i> <span class="menu-text">Operations</span>'),
			'url'=>array('authItem/operations'),
			'itemOptions'=>array('class'=>'hover'),
		),
	)
));	?>