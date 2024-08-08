<?php $__env->startSection('style'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
    <div class="row  padding-pranto-top padding-pranto-bottom">

        <?php if(session('error')): ?>
            <div class="col-md-12">
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong class="col-md-12"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Alert!</strong>
                    <?php echo e(session('error')); ?>

                </div>
            </div>
        <?php endif; ?>


        <div class="col-md-12">

            <div class="card">

                <div class="card-header">
                    <h4><?php echo e($title); ?></h4>
                    <a href="<?php echo e(route('user.request_a_payment')); ?>" class="btn btn-primary btn-block"
                       style="color: white">Create Request Payment</a>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-light">
                            <tr>
                                <th>ID</th>
                                <th>Amount</th>
                                <th>Wallet Address</th>
                                <th>Status</th>
                                <th>Created At</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $rp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr>
                                    <td><?php echo e($data->id); ?></td>

                                    <td><?php echo e($data->amount); ?></td>
                                    <td><?php echo e($data->wallet); ?></td>
                                    <td>
                                        <?php if($data->state==0): ?>
                                            <button class="btn btn-warning btn-block"
                                                    style="color: white">Not Approved
                                            </button>
                                        <?php else: ?>
                                            <button class="btn btn-success btn-block"
                                                    style="color: white">Approved
                                            </button>
                                        <?php endif; ?>

                                    </td>
                                    <td><?php echo e($data->date); ?></td>
                                </tr>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>
                        </table>
                    </div>


                </div>

            </div>

        </div>
    </div>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>