<?php $__env->startSection('content'); ?>
<div class="container">
                    <form method="POST" action="<?php echo e(route('register')); ?>">
                        <?php echo csrf_field(); ?>
			<h3><?php echo e(__('label.reserva_teatro')); ?></h3>
			<h4><?php echo e(__('label.registrar_usuario')); ?></h4>

			<fieldset>
			<input id="name" type="text" placeholder="<?php echo e(__('Name')); ?>" class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" name="name" value="<?php echo e(old('name')); ?>" required autofocus>

			<?php if($errors->has('name')): ?>
				<span class="invalid-feedback" role="alert">
				<strong><?php echo e($errors->first('name')); ?></strong>
				</span>
			<?php endif; ?>
			</fieldset>

			<fieldset>
                                <input id="email" type="email" placeholder="<?php echo e(__('label.usuario')); ?>" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required>

                                <?php if($errors->has('email')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
			</fieldset>

			<fieldset>
                                <input id="password" type="password" placeholder="<?php echo e(__('label.contrasena')); ?>" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required>

                                <?php if($errors->has('password')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
			</fieldset>

			<fieldset>
                                <input id="password-confirm" type="password" placeholder="<?php echo e(__('label.confirmar_contrasena')); ?>" class="form-control" name="password_confirmation" required>
			</fieldset>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    <?php echo e(__('Register')); ?>

                                </button>
                            </div>
                        </div>
                    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>