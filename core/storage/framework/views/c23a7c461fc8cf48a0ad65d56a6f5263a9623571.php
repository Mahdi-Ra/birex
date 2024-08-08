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
                            <th>Mobile</th>
                            <th>GateWay Name</th>
                            <th>Min-Max</th>
                            <th>Raised Time</th>
                            <th>State</th>
                            <th>Trusted</th>
                            <th>Deposite Id</th>
                            <th>Reject Message</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $ads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(\App\User::find($data->user_id)->username); ?></td>
                                <td><?php echo e(\App\User::find($data->user_id)->phone); ?></td>

                                <td><?php echo e($data->gateway->name); ?></td>

                                <td><?php echo e($data->min_amount.'BTC -'. $data->max_amount.' BTC '); ?></td>
                                <td><?php echo e(($data->created_at)); ?></td>
                                <td>
                                    <?php if($data->status == -1): ?>
                                        In Pending
                                    <?php elseif($data->status == 0): ?>
                                        Accepted
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if($data->trusted_sell == 1): ?>
                                        YES
                                    <?php elseif($data->trusted_sell == 0): ?>
                                        NO
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if(is_null($data->deposite_id)): ?>
                                        Null
                                    <?php else: ?>
                                        <?php echo e($data->deposite_id); ?>

                                    <?php endif; ?>
                                </td>
                                <td>
                                    
                                    <?php if($data->reject == 0 && $data->status != 0): ?>
                                        
                                        <input name="msgg"></input>
                                    <?php elseif($data->reject == 1): ?>
                                        <input disabled name="msgg"></input>
                                        
                                    <?php endif; ?>
                                    
                                </td>
                                <td>
                                    <a href="<?php echo e(route('admin.advertising', $data->id)); ?>"
                                       class="btn btn-info">Detail</a>
                                    <?php if($data->status == -1 && $data->reject != 1): ?>
                                        <a href="<?php echo e(route('admin.advertising.confirm', $data->id)); ?>"
                                           class="btn btn-success">Confirm</a>
                                    <?php elseif($data->status == 0): ?>
                                        <button disabled class="btn btn-success">Confirmed</button>
                                    <?php endif; ?>
                                    
                                      
                                    <?php if($data->reject == 0 && $data->status != 0): ?>
                                        
                                        <a href="<?php echo e(route('admin.advertising.reject', $data->id)); ?>"
                                               class="btn btn-danger">Reject</a>
                                    <?php elseif($data->reject == 1): ?>
                                        <button disabled class="btn btn-danger">Rejected</button>
                                        
                                    <?php endif; ?>
                                    
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>


<?php echo e($ads->links()); ?>

                </div>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>