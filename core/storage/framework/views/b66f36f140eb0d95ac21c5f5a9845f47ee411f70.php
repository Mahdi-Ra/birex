<?php $__env->startSection('body'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title "><?php echo e($page_title); ?></h3>
                <div class="tile-body">
                    <hr>
                    <strong> Bircoin Income To Now  :  <?php echo e(App\Income::all()->sum('value')); ?> BTC </strong>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover order-column" id="">
                            <thead>
                            <tr>
                                <th>Username</th>
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
                                <tr>
                                    <td>
                                        <a href="<?php echo e(route('user.single', $data->user->id)); ?>">
                                            <?php echo e($data->user->username); ?>

                                        </a>
                                    </td>

                                    <td><?php echo e($data->trx); ?></td>
                                    <td>
                                        
                                    <?php echo e(sprintf("%.8f", floor((float)$data->amount  * pow(10, 8)) / pow(10, 8)), round((float)$data->amount , 8)); ?>

                                        
                                    </td>
                                    <td>
                                 
                                  <?php echo e(sprintf("%.8f", floor((float)$data->main_amo  * pow(10, 8)) / pow(10, 8)), round((float)$data->main_amo , 8)); ?>

                                 
                                     
                                    </td>
                                    <td>
                                        <?php echo e($data->charge); ?>

                                        </td>
                                    <td><?php echo e($data->title); ?></td>
                                    <td><?php echo e($data->created_at); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tbody>
                        </table>
                        <?php echo e($trans->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>