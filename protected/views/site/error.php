<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error '.$code,
);
?>


<div class="row">
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->

		<div class="error-container">
			<div class="well">
				<h1 class="grey lighter smaller">
											<span class="blue bigger-125">
												<i class="ace-icon fa fa-random"></i>
												<?php echo $code; ?>
											</span>
					Attention !!!
				</h1>

				<hr />
				<h3 class="lighter smaller">
					Vous n'êtes pas authorisé à effectuer cette action
					<i class="ace-icon fa fa-wrench icon-animated-wrench bigger-125"></i>
				</h3>

				<div class="space"></div>

				<div>

					<ul class="list-unstyled spaced inline bigger-110 margin-15">
						<li>
							<i class="ace-icon fa fa-hand-o-right blue"></i>
							Vous n'avez pas le droit d'acceder à cette page
						</li>

						<li>
							<i class="ace-icon fa fa-hand-o-right blue"></i>
							Contacter l'administrateur
						</li>
					</ul>
				</div>

				<hr />
				<div class="space"></div>
			</div>
		</div>

		<!-- PAGE CONTENT ENDS -->
	</div><!-- /.col -->
</div>

<!--h2>Error <?php //echo $code; ?></h2-->
<!--h2>Action non authorisée !</h2-->

<!--div class="error">
<?php //echo CHtml::encode($message); ?>
</div-->