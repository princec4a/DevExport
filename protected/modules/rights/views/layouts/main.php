<?php $this->beginContent('//layouts/main'); ?>
<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<?php if(isset($this->breadcrumbs)):?>
				<?php $this->widget('zii.widgets.CBreadcrumbs', array(
					'links'=>$this->breadcrumbs,
					'homeLink'=>false,
					'tagName'=>'ul',
					'separator'=>'',
					'activeLinkTemplate'=>'<li><a href="{url}">{label}</a></li>',
					'inactiveLinkTemplate'=>'<li><span>{label}</span></li>',
					'htmlOptions'=>array ('class'=>'breadcrumb')
				)); ?>
				<!-- breadcrumbs -->
			<?php endif?>
			<div class="nav-search" id="nav-search">
				<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
				</form>
			</div><!-- /.nav-search -->
		</div>

		<?php if( $this->id!=='install' ): ?>

			<div id="sidebar2" class="sidebar h-sidebar navbar-collapse collapse ace-save-state" data-sidebar="true" data-sidebar-scroll="true" data-sidebar-hover="true">
				<?php $this->renderPartial('/_menu'); ?>
			</div>

		<?php endif; ?>

		<div class="page-content">
			<div class="row">
				<?php $this->renderPartial('/_flash'); ?>

				<?php echo $content; ?>
			</div><!-- /.col -->
		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->
<?php $this->endContent(); ?>