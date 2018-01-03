 <div class="flashes">

	<?php if( Yii::app()->user->hasFlash('RightsSuccess')===true ):?>

		<div class="alert alert-block alert-success">
			<button type="button" class="close" data-dismiss="alert">
				<i class="ace-icon fa fa-times"></i>
			</button>
			<p>
				<strong>
					<i class="ace-icon fa fa-check"></i>
				</strong>
				<?php echo Yii::app()->user->getFlash('RightsSuccess'); ?>
			</p>
		</div>

	<?php endif; ?>

	<?php if( Yii::app()->user->hasFlash('RightsError')===true ):?>

		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert">
				<i class="ace-icon fa fa-times"></i>
			</button>
			<?php echo Yii::app()->user->getFlash('RightsError'); ?>
		</div>
	<?php endif; ?>

 </div>