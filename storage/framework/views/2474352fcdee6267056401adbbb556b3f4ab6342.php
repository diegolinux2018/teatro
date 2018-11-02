<?php $__env->startSection('content'); ?>
<div class="container">
	<?php if(session('status')): ?>
	<div class="alert alert-success" role="alert">
		<?php echo e(session('status')); ?>

	</div>
	<?php endif; ?>

	<ul class="nav nav-tabs">
		<li class="active"><a data-toggle="tab" href="#TabTeatro"><?php echo e(__('label.teatro')); ?></a></li>
		<li ><a data-toggle="tab" href="#TabZonas"><?php echo e(__('label.zonas')); ?></a></li>
	</ul>
	<div class="tab-content">
		<div id="TabTeatro" class="tab-pane fade in active">
			<?php echo $__env->make("teatro.formTeatro", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		</div>
		<div id="TabZonas" class="tab-pane fade">
			<?php echo $__env->make("teatro.formZona", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		</div>

	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>