<?php $__env->startSection('style'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
    <form class="form-signin" method="post" action="<?php echo e(route('user.password.email')); ?>">
        <div class="jumbotron">
            <?php echo csrf_field(); ?>
            <h1 class="h3 mb-3 font-weight-normal">Forgot Password</h1>

            <div class="form-group">
                <label for="inputEmail" class="sr-only">Username</label>
                <input class="form-control"  type="email" name="email" placeholder="Email Address" value="<?php echo e(old('email')); ?>" required autofocus>
                <?php if($errors->has('email')): ?>
                    <span class="help-block">
                            <strong><?php echo e($errors->first('email')); ?></strong>
                        </span>
                <?php endif; ?>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Forgot Password</button>


            <p class="mt-5 mb-3 text-muted text-center"><?php echo e($general->copyright); ?></p>
        </div>
    </form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>