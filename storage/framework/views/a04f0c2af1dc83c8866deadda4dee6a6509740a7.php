<!-- Main Content -->
<?php $__env->startSection('content'); ?>

<div class="">
    <div class="kt-login__head">
        <h3 class="kt-login__title">Forgotten Password ?</h3>
        <div class="kt-login__desc">Enter your email to reset your password:</div>
    </div>
    <?php if(session('status')): ?>
        <div class="alert alert-success">
            <?php echo e(session('status')); ?>

        </div>
    <?php endif; ?>
    <form class="kt-form" method="POST" action="<?php echo e(url('/admin/password/email')); ?>">
        <?php echo e(csrf_field()); ?>

        <div class="input-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
            <input class="form-control" type="email" placeholder="Email" value="<?php echo e(old('email')); ?>" name="email" id="kt_email">
            <?php if($errors->has('email')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('email')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
        <div class="kt-login__actions">
            <button type="submit" class="btn btn-brand btn-elevate kt-login__btn-primary">Request</button>&nbsp;&nbsp;
        <button class="btn btn-light btn-elevate kt-login__btn-secondary"><a href="<?php echo e(url('admin/login')); ?>">Cancel</a></button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\rohit\CrazyWorld\crazy_world\resources\views/admin/auth/passwords/email.blade.php ENDPATH**/ ?>