<?php $__env->startSection('body'); ?>
    <form class="form-signin" method="post" action="<?php echo e(url('/register')); ?>">
        <div class="jumbotron">
            <?php echo csrf_field(); ?>
            <h1 class="h3 mb-3 font-weight-normal">Register got your account with <?php echo e($general->sitename); ?> is free,quick
                and easy.</h1>

            <?php if(count($errors) > 0): ?>
                <div class="row">
                    <div class="col-md-010">
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h12><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Alert!</h12>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <div class="form-group">
                <label for="inputEmail" class="sr-only">Full Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo e(old('name')); ?>"
                       placeholder="Enter Full Name" required>
            </div>

            <div class="form-group">
                <label for="inputEmail" class="sr-only">E-mail</label>
                <input type="email" name="email" class="form-control" value="<?php echo e(old('email')); ?>"
                       placeholder="Enter your E-mail" required>
            </div>
            <div class="form-group">
                <label for="inputEmail" class="sr-only">Phone</label>
                <input type="text" name="phone" class="form-control" value="<?php echo e(old('phone')); ?>"
                       placeholder="Enter Phone (With You country Code)" required>
            </div>

            <div class="form-group">
                <label for="inputEmail" class="sr-only">Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo e(old('username')); ?>"
                       placeholder="Enter Username" required>
            </div>

            <div class="form-group">
                <label for="inputPassword" class="sr-only">Password</label>
                Passwords include numbers, uppercase, lowercase, and symbol(@ , !) 
                <input onchange="checkpassword()" type="password" id="passs" class="form-control" name="password" placeholder="Password"
                       required>
            </div>

            <div class="form-group">
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" class="form-control" name="password_confirmation" placeholder="Re-Enter Password"
                       required>
            </div>


            <button onclick="pas();" class="btn btn-lg btn-primary btn-block" type="submit">SIGN UP</button>


            <p class="mt-5 mb-3 text-muted"><?php echo e($general->copyright); ?></p>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>