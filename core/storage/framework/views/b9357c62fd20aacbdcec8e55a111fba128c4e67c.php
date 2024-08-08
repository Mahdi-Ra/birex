<?php $__env->startSection('body'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title pull-left">Deposit List</h3>
                <div class="pull-right icon-btn">
                    <form method="POST" class="form-inline" action="">
                        <?php echo e(csrf_field()); ?>

                        <input type="text" name="search" class="form-control" placeholder="Search">
                        <button class="btn btn-outline btn-circle  green" type="submit"><i
                                    class="fa fa-search"></i></button>

                    </form>
                </div>


                <div class="table-responsive">

                    <table class="table">
                        <thead class="thead-light">
                        <tr>
                            <th>Username</th>
                            <th>Mobile</th>
                            <th>GateWay Name</th>
                            <th>Address</th>
                            <th>Amount</th>
                            <th>Trx</th>
                            <th>State</th>
                            <th>Raised Time</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $deposit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(\App\User::find($data->user_id)->username); ?></td>
                                <td><?php echo e(\App\User::find($data->user_id)->phone); ?></td>

                                <td><?php echo e($data->gateway->name); ?></td>

                                <td><?php echo e(($data->address)); ?></td>
                                <td><?php echo e(($data->amount)); ?></td>
                                <td><?php echo e(($data->trx)); ?></td>
                                <td><?php echo e(($data->created_at)); ?></td>
                                <td>
                                    <?php if($data->status == -1): ?>
                                        In Pending
                                    <?php elseif($data->status == 0): ?>
                                        Accepted
                                    <?php endif; ?>
                                </td>

                                <td>
                                    <?php if($data->status == -1): ?>
                                        <a href="<?php echo e(route('deposits', $data->id)); ?>"
                                           class="btn btn-success">Confirm</a>
                                    <?php elseif($data->status == 0): ?>
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