
<?php $__env->startSection('style'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>

    <div class="row padding-pranto-top padding-pranto-bottom">
        <div class="col-md-6 offset-md-3 col-sm-12">
            <form class="form-horizontal" method="post" action="<?php echo e(route('user.change-password')); ?>">

                <div class="jumbotron">
                    <?php if(count($errors) > 0): ?>
                        <div class="row">
                            <div class="col-md-12">
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


                    <?php echo csrf_field(); ?>
                    <?php echo method_field('put'); ?>

                    <h1 class="tile">Edit Your Profile Password</h1>

                    <div class="form-group">
                        <strong>Old Password</strong>
                        <input class="form-control" type="password" name="passwordold" placeholder="Enter Old Password">
                    </div>

                    <div class="form-group">
                        <strong>New Password</strong>
                        <input class="form-control" type="password" name="password" placeholder="Enter New Password">
                    </div>

                    <div class="form-group">
                        <strong>Confirm Password</strong>
                        <input class="form-control" type="password" name="password_confirmation" placeholder="Retype New Password">
                    </div>


                    <button class="btn btn-lg btn-primary btn-block" type="submit">Update</button>

                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>