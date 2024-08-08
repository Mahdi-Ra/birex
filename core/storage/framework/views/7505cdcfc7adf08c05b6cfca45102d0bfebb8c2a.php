<?php $__env->startSection('body'); ?>
    <div class="row padding-pranto-top padding-pranto-bottom">
        <?php if(count($errors) > 0): ?>
            <div class="col-md-12">
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong class="col-md-12"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Alert!</strong>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong style="font-size: 24px;">Create Support Ticket</strong>
                </div>
                <div class="card-body">

                    <form class="form-horizontal" action="<?php echo e(route('ticket.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>

                        <div class="form-group">
                            <strong>Subject Name:</strong>
                            <input class="form-control" type="text"  value="<?php echo e(old('subject')); ?>" required name="subject" placeholder="Title Name">
                        </div>

                        <div class="form-group">
                            <strong>Message:</strong>
                            <textarea class="form-control" name="detail" rows="10" placeholder="Write Here Your Message..."><?php echo old('detail'); ?></textarea>

                        </div>


                        <input type="submit" class="btn btn-primary btn-block" value="Post">
                    </form>

                </div>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>