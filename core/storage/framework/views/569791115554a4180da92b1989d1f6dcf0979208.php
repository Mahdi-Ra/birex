<?php $__env->startSection('body'); ?>
    <div class="row">
        <div class="col-md-6">
            <div class="tile">
                <h4 class="tile-title">
                    <i class="fa fa-user"></i> <?php if($trans->add_type == 1): ?> Buy Request <?php else: ?> Sell Request <?php endif; ?>
                    from <a href="<?php echo e(route('user.single', $trans->from_user->id)); ?>"> <?php echo e($trans->from_user->username); ?> </a> to <a href="<?php echo e(route('user.single', $trans->to_user->id)); ?>">  <?php echo e($trans->to_user->username); ?> </a></h4>
                <div class="tile-body">
                    <hr>
                    <h5>Trans ID: <?php echo e($trans->trans_id); ?></h5>
                    <h5 class="bold">Transaction status:
                        <?php if($trans->status == 0): ?>
                            <span class="badge  badge-warning"> Processing </span>
                        <?php elseif($trans->status == 1): ?>
                            <label class="badge  badge-success"> Paid Complete </label>
                        <?php elseif($trans->status == 9): ?>
                            <span class="badge  badge-info"> Paid Approval </span>
                        <?php else: ?>
                            <span class="badge  badge-danger"> Canceled </span>
                        <?php endif; ?>
                    </h5>
                    <h5 class="bold">Requested At : <?php echo e($trans->created_at); ?></h5>
                    <hr>
                    <p>
                        <strong>Updated At : <?php echo e($trans->updated_at); ?></strong>
                        <br>
                    </p>
                </div>
            </div>

        </div>



        <div class="col-md-6">
            <div class="tile">
                <h4 class="tile-title">Price: <?php echo e($trans->price); ?> <?php echo e($trans->currency->name); ?>/<?php echo e($trans->gateway->currency); ?></h4>
                <div class="tile-body">
                    <hr>
                    <h5 class="bold">Amount In USD : <?php echo e($trans->usd_amount); ?> USD</h5>
                    <h5 class="bold">Amount In <?php echo e($trans->gateway->currency); ?> : <?php echo e(round($trans->coin_amount,8)); ?> <?php echo e($trans->gateway->currency); ?></h5>
                    <hr>
                    <p>
                        <strong>Gateway : <?php echo e($trans->gateway->name); ?></strong><br>
                        <strong>Payment Method : <?php echo e($trans->method->name); ?></strong><br>
                        <strong>Currency Type : <?php echo e($trans->currency->name); ?></strong><br>

                    </p>
                </div>
            </div>

        </div>


        <div class="col-md-12">
            <div class="tile">
                <h4 class="tile-title">Terms & Payment Detal</h4>
                <div class="tile-body">
                    <hr>
                    <h5 class="bold">Terms Detail :</h5>
                    <?php echo $trans->term_detail; ?>

                    <hr>
                    <h5 class="bold">Payment Detail :</h5>
                    <?php echo $trans->payment_detail; ?>

                </div>
            </div>

        </div>



    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>