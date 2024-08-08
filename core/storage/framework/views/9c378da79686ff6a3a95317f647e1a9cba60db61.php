<?php $__env->startSection('style'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
    <form class="form-signin" method="post" action="<?php echo e(route('reset.passw')); ?>">
        <div class="jumbotron">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="token" value="<?php echo e($token); ?>">
            <h1 class="h3 mb-3 font-weight-normal">Reset Password</h1>

            <div class="form-group">
                <label for="inputEmail" class="sr-only">Email</label>
                <input id="email" type="email" class="form-control" name="email" value="<?php echo e(isset($email) ? $email : old('email')); ?>" readonly>
            </div>

            <div class="form-group">
                <label for="inputPassword" class="sr-only">New Password</label>
                <input type="password" id="inputPassword" class="form-control" name="password" placeholder="New Password" required>
                <?php if($errors->has('password')): ?>
                    <span class="invalid-feedback">
                        <strong><?php echo e($errors->first('password')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="password-confirm" class="sr-only">Confirm Password</label>
                <input type="password" id="password-confirm" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                <?php if($errors->has('password_confirmation')): ?>
                    <span class="invalid-feedback">
                        <strong><?php echo e($errors->first('password_confirmation')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Reset Password</button>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>