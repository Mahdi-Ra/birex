
<?php $__env->startSection('body'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron text-center">
                <h1 class="display-4"><?php echo e($page_title); ?></h1>
            </div>
        </div>

        <div class="col-md-12">
            <p><?php echo $general->terms; ?></p>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>