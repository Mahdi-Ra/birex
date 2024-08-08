<?php $__env->startSection('style'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
    <div class="row padding-pranto-top">
        <?php $__currentLoopData = $balance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-3 text-center margin-top-pranto">
            <div class="card border-dark">
                <div class="card-header"><?php echo e($gate->gateway->name); ?> Balance :</div>
                <div class="card-body text-dark">
                    <h6 class="card-title">
                        <?php if($gate->balance == 0): ?> 0.0000 
                            <?php echo e($gate->gateway->currency); ?>

                        <?php else: ?> 
                            <?php echo e(sprintf("%.8f", floor((float)$gate->balance  * pow(10, 8)) / pow(10, 8)), round((float)$gate->balance , 8)); ?>

                            <?php echo e($gate->gateway->currency); ?>

                        <?php endif; ?>
                    </h6>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <div class="row padding-pranto-top margin-top-pranto padding-pranto-bottom">
        <div class="col-md-3 text-center margin-top-pranto">
            <div class="card border-dark">
                <div class="card-header">
                    <h5>Open Advertisements :</h5>
                </div>
                <div class="card-body text-dark">
                    <h5 class="card-title"><?php echo e(App\AdvertiseDeal::where('from_user_id', Auth::id())->where('status', 0)->count()); ?></h5>
                </div>
                <div class="card-footer">
                    <a href="<?php echo e(route('open.trade')); ?>" class="btn btn-primary btn-block">Open Trades</a>
                </div>
            </div>
        </div>


        <div class="col-md-3 text-center margin-top-pranto">
            <div class="card border-dark">
                <div class="card-header">
                    <h5>All closed trades :</h5>
                </div>
                <div class="card-body text-dark">
                    <h5 class="card-title"><?php echo e(App\AdvertiseDeal::where('from_user_id', Auth::id())->where('status', 2)->count()); ?></h5>
                </div>
                <div class="card-footer">
                    <a href="<?php echo e(route('close.trade')); ?>" class="btn btn-primary btn-block">Closed Trades</a>
                </div>
            </div>
        </div>

        <div class="col-md-3 text-center margin-top-pranto">
            <div class="card border-dark">
                <div class="card-header">
                    <h5>Completed trades :</h5>
                </div>
                <div class="card-body text-dark">
                    <h5 class="card-title"><?php echo e(App\AdvertiseDeal::where('to_user_id', Auth::id())->orWhere('from_user_id', Auth::id())->where('status', 1)->count()); ?></h5>
                </div>
                <div class="card-footer">
                    <a href="<?php echo e(route('complete.trade')); ?>" class="btn btn-primary btn-block">Completed Trades</a>
                </div>
            </div>
        </div>

        <div class="col-md-3 text-center margin-top-pranto">
            <div class="card border-dark">
                <div class="card-header">
                    <h5>Cancelled trades :</h5>
                </div>
                <div class="card-body text-dark">
                    <h5 class="card-title"><?php echo e(App\AdvertiseDeal::where('to_user_id', Auth::id())->where('status', 2)->count()); ?></h5>
                </div>
                <div class="card-footer">
                    <a href="<?php echo e(route('cancel.trade')); ?>" class="btn btn-primary btn-block">Cancelled Trades</a>
                </div>
            </div>
        </div>


    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>