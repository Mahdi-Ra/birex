<?php $__env->startSection('style'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>

        <form class="form-signin" method="post" action="<?php echo e(route('login')); ?>">
            <div class="jumbotron">
                <?php echo csrf_field(); ?>
                <h1 class="h3 mb-3 font-weight-normal">Please login to access <?php echo e($general->sitename); ?> area.</h1>

               <div class="form-group">
                   <label for="inputEmail" class="sr-only">Username</label>
                   <input type="text" id="inputEmail" class="form-control" name="username" value="<?php echo e(old('username')); ?>" placeholder="Username" required autofocus>
                   <?php if($errors->has('username')): ?>
                       <span class="help-block">
                            <strong><?php echo e($errors->first('username')); ?></strong>
                        </span>
                   <?php endif; ?>
               </div>

                <div class="form-group">
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
                    <?php if($errors->has('password')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('password')); ?></strong>
                        </span>
                    <?php endif; ?>
               </div>



                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>

                <a href="<?php echo e(route('password.request')); ?>">Forgot password?</a>

                <p class="mt-5 mb-3 text-muted"><?php echo e($general->copyright); ?></p>
            </div>
        </form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>