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
                                <th>ID</th>
                                <th>Amount</th>
                                <th>After Balance</th>
                                <th>Charge</th>
                                <th>Detail</th>
                                <th>Created At</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $trans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr <?php if($data->type == '+'): ?> style="background-color:#dff0d8" <?php else: ?> style="background-color:#f2dede" <?php endif; ?>>
                                    <td><?php echo e($data->trx); ?></td>
                                    <td>
                                       
                                        <?php echo e(sprintf("%.8f", floor((float)$data->amount  * pow(10, 8)) / pow(10, 8)), round((float)$data->amount , 8)); ?>

                                        
                                      
                                    </td>
                                    <td>
                                        <?php echo e(sprintf("%.8f", floor((float)$data->main_amo  * pow(10, 8)) / pow(10, 8)), round((float)$data->main_amo , 8)); ?>

                                        
                                    </td>
                                    <td><?php echo e($data->charge); ?></td>
                                    <td><?php echo e($data->title); ?></td>
                                    <td><?php echo e($data->created_at); ?></td>
                                </tr>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>
                        </table>
                    </div>
                    <?php echo e($trans->links()); ?>


                </div>

            </div>

        </div>
    </div>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>