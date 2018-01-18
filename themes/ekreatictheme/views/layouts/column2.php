<?php/**
 * Created by PhpStorm.
 * User: migration7
 * Date: 29/04/16
 * Time: 12:00
 */?>
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
			<!--
			<div class="nav-search" id="nav-search">
				<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
				</form>
			</div> /.nav-search -->
		</div>

		<?php if( $this->id!=='install' ): ?>

			<div id="sidebar2" class="sidebar h-sidebar navbar-collapse collapse ace-save-state" data-sidebar="true" data-sidebar-scroll="true" data-sidebar-hover="true">
				<?php
                $this->beginWidget('zii.widgets.CPortlet', array('title'=>'',));
                $this->widget('zii.widgets.CMenu', array(
                    'encodeLabel'=>false,
                    'items'=>$this->menu,
                    'htmlOptions'=>array('class'=>'nav nav-list'),
                ));
                $this->endWidget();
                ?>
			</div>

		<?php endif; ?>

		<div class="page-content">
			<div class="row">
                <?php echo $content; ?>
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->


<?php $this->endContent(); ?>