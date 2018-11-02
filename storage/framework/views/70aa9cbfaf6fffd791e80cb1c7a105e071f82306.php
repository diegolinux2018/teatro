<?php $__env->startSection('content'); ?>
<div class="container_login">
	<form method="POST" action="<?php echo e(route('login')); ?>">
	<?php echo csrf_field(); ?>

	<h3><?php echo e(__('label.reserva_teatro')); ?></h3>
	<h4><?php echo e(__('label.inicio_sesion')); ?></h4>
	<fieldset>
		<input id="email" type="email" placeholder="<?php echo e(__('label.usuario')); ?>" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required autofocus>

		<?php if($errors->has('email')): ?>
			<span class="invalid-feedback" role="alert">
			<strong><?php echo e($errors->first('email')); ?></strong>
			</span>
		<?php endif; ?>
	</fieldset>
	<fieldset>
		<input id="password" type="password"  placeholder="<?php echo e(__('label.contrasena')); ?>" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required>

		<?php if($errors->has('password')): ?>
			<span class="invalid-feedback" role="alert">
			<strong><?php echo e($errors->first('password')); ?></strong>
			</span>
		<?php endif; ?>
	</fieldset>

	<div class="form-group row">
		<div class="col-md-6 offset-md-4">
		<div class="form-check">
			<input class="form-check-input" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>

			<label class="form-check-label" for="remember">
			<?php echo e(__('label.recuerdame')); ?>

			</label>
		</div>
		</div>
	</div>

	<div class="form-group row mb-0">
		<div class="col-md-8 offset-md-4">
		<button type="submit" class="btn btn-primary">
			<?php echo e(__('Login')); ?>

		</button>

		<a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">
			<?php echo e(__('label.olvido_password')); ?>

		</a>
		</div>
	</div>
	</form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>