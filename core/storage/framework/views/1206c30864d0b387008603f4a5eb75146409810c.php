<?php $__env->startSection('style'); ?>
    <style>
        iframe{
            width:100% ;
            height: 100%
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<div class="row">

    <div class="col-md-6 col-sm-12">

        <div class="jumbotron text-center">
    
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><i class="fa fa-map-marker"></i> <?php echo e($general->address); ?></li>
                <li class="list-group-item"><i class="fa fa-phone"></i> <?php echo e($general->phone); ?></li>
                <li class="list-group-item"><i class="fa fa-envelope-o"></i> <?php echo e($general->email); ?></li>
            </ul>
        </div>

        <div class="jumbotron text-center" style="padding: 10px;height: 276px;">
            <?php echo $basic->google_map; ?>

        </div>

    </div>

    <div class="col-md-6 col-sm-12">
        <div class="jumbotron">
            <h2 class="text-center">CONTACT US</h2>
            <form class="form-horizontal" action="<?php echo e(route('contact-submit')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label class="control-label" for="email">Your Name</label>

                        <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                        <?php if($errors->has('name')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('name')); ?></strong>
                            </span>
                        <?php endif; ?>

                </div>


                <div class="form-group">
                    <label class="control-label" for="email">Email Address</label>

                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                        <?php if($errors->has('email')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('email')); ?></strong>
                            </span>
                        <?php endif; ?>

                </div>

                <div class="form-group">
                    <label class="control-label" for="email">Message</label>

                        <textarea rows="5" class="form-control" name="message" placeholder="Your Message..."></textarea>
                        <?php if($errors->has('message')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('message')); ?></strong>
                            </span>
                        <?php endif; ?>
                </div>

                <div class="form-group">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>