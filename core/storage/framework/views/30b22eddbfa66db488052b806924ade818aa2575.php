<?php $__env->startSection('body'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title ">Payment Methods</h3>


                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Icon</th>
                                <th>Coin Name</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $gateways; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$gateway): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(++$k); ?></td>
                                    <td><img style="height: 80px;" src="<?php echo e(asset('assets/images/gateway')); ?>/<?php echo e($gateway->id); ?>.jpg" alt=""/></td>
                                    <td><?php echo $gateway->name; ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>







<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>