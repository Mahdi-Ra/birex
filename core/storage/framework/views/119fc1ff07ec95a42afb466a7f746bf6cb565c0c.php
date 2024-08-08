<?php $__env->startSection('body'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title pull-left">Ads List</h3>
                <div class="pull-right icon-btn">

                </div>


                <div class="table-responsive">

                    <table class="table">
                        <thead class="thead-light">
                        <tr>
                            <th>Username</th>
                            <th>Phone</th>
                            <th>Amount</th>
                            <th>Wallet Address</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $rp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(\App\User::find($data->user_id)->username); ?></td>
                                <td><?php echo e(\App\User::find($data->user_id)->phone); ?></td>

                                <td><?php echo e($data->amount); ?></td>


                                <td><?php echo e(($data->wallet)); ?></td>

                                <td>
                                    <?php if($data->state == 0): ?>
                                        In Pending
                                    <?php elseif($data->state == 1): ?>
                                        Accepted
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e(($data->date)); ?></td>
                                <td>
                                    <?php if($data->state == 0): ?>
                                        <a href="<?php echo e(route('admin.withdrawal.confirm', $data->id)); ?>"
                                           class="btn btn-success">Confirm</a>
                                    <?php elseif($data->state == 1): ?>
                                        <button disabled class="btn btn-success">Confirmed</button>
                                    <?php endif; ?>

                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>