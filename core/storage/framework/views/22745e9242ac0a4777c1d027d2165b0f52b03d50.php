

<?php $__env->startSection('body'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title pull-left"><?php echo e($page_title); ?></h3>

                <div class="table-responsive">


                <table class="table table-striped  table-hover">
                    <thead>
                    <tr>
                        <th scope="col">User</th>
                        <th scope="col">IP</th>
                        <th scope="col">Location</th>
                        <th scope="col">Details</th>
                        <th scope="col">Time</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td data-label="Username"><a href="<?php echo e(route('user.single',$log->user->id)); ?>"><?php echo e($log->user->name); ?></a></td>
                            <td data-label="User IP"><?php echo e($log->user_ip); ?></td>
                            <td data-label="User Location"><?php echo e($log->location); ?></td>
                            <td data-label="Details"><?php echo e($log->details); ?></td>
                            <td data-label="Time"><?php echo e($log->created_at->diffForHumans()); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <tbody>
                </table>
                <?php echo e($logs->links()); ?>

                    </div>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>