<?php $__env->startSection('style'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
    <div class="row  padding-pranto-top padding-pranto-bottom">
        <div class="col-md-12">

            <div class="card">

                <div class="card-header">
                    <h4><?php echo e($title); ?></h4>
                </div>

                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-light">
                            <tr>

                                <th>GateWay Name</th>
                                <th>Address</th>
                                <th>Amount</th>
                                <th>Trx</th>
                                <th>State</th>
                                <th>Raised Time</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $deposit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($data->gateway->name); ?></td>

                                    <td><?php echo e(($data->address)); ?></td>
                                    <td>
                                          <?php echo e(sprintf("%.8f", floor((float)$data->amount * pow(10, 8)) / pow(10, 8)),round((float)$data->amount, 8)); ?>

                                     
                                    </td>
                                    
                                    <td><?php echo e(($data->trx)); ?></td>
                                    <td>
                                        <?php if($data->status == -1): ?>
                                            In Pending
                                        <?php elseif($data->status == 0): ?>
                                            Accepted
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e(($data->created_at)); ?></td>
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