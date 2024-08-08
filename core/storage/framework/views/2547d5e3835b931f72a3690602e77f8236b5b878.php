<?php $__env->startSection('style'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
   <div class="row">
       <div class="col-md-8 offset-md-2 col-sm-12">
           <form class="form-horizontal" method="post" action="<?php echo e(route('edit-profile')); ?>">

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
                   <h1 class="tile">Edit Your Profile</h1>

                   <div class="form-group">
                       <strong >Name</strong>
                       <input class="form-control" type="text" name="name"  value="<?php echo e($user->name); ?>" placeholder="Enter Full Name">
                   </div>

                   <div class="form-group">
                       <strong >Email</strong>
                       <input class="form-control" type="email" value="<?php echo e($user->email); ?>" readonly placeholder="Enter your E-mail">
                   </div>

                   <div class="form-group">
                       <strong >Phone (With You country Code)</strong>
                       <input class="form-control" type="tel" name="phone" value="<?php echo e($user->phone); ?>" placeholder="Enter Phone Number">
                   </div>

                   <div class="form-group">
                       <strong >Zip-Code</strong>
                       <input class="form-control" type="text" name="zip_code" value="<?php echo e($user->zip_code); ?>" placeholder="Enter Zip-Code">
                   </div>

                   <div class="form-group">
                       <strong >Address</strong>
                       <input class="form-control" type="text" name="address" value="<?php echo e($user->address); ?>" placeholder="Enter Address">
                   </div>

                   <div class="form-group">
                       <strong >City</strong>
                       <input class="form-control" type="text" name="city" value="<?php echo e($user->city); ?>" placeholder="Enter Your City Name">
                   </div>

                   <div class="form-group">
                       <strong >Country</strong>
                       <input class="form-control" type="text" name="country" value="<?php echo e($user->country); ?>" placeholder="Enter Country Name">
                   </div>





                   <button class="btn btn-lg btn-primary btn-block" type="submit">Update</button>

               </div>
           </form>
       </div>
   </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>