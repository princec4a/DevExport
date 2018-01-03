<?php $this->breadcrumbs = array(
	'Droits'=>Rights::getBaseUrl(),
	Rights::t('core', 'Créer :type', array(':type'=>Rights::getAuthItemTypeName($_GET['type']))),
); ?>

<div class="page-header">
	<h1><?php echo Rights::t('core', 'Nouveau :type', array(
			':type'=>Rights::getAuthItemTypeName($_GET['type']),
		)); ?></h1>
</div>

<div class="createAuthItem">

	<?php $this->renderPartial('_form', array('model'=>$formModel)); ?>

</div>