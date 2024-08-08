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
                            <th>From Username</th>
                            <th>Complaint User</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $comps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><a href="user/<?php echo e(\App\User::find($data[0]->from_)->id); ?>"><?php echo e(\App\User::find($data[0]->from_)->username); ?></a></td>
                                <td><a href="user/<?php echo e(\App\User::find($data[0]->complaint_user_id)->id); ?>"><?php echo e(\App\User::find($data[0]->complaint_user_id)->username); ?></a></td>

                                <td><?php echo e($data[0]->date); ?></td>
                                <td><?php if(\App\AdvertiseDeal::find($data[0]->addvertise_id)->comp_state): ?>
                                <button href="<?php echo e(route('admin.complaints', $data[0]->addvertise_id)); ?>"
                                       class="btn btn-info">Free</button>
                                <?php else: ?>
                                <button href="<?php echo e(route('admin.complaints', $data[0]->addvertise_id)); ?>"
                                       class="btn btn-info">Lock</button>
                                <?php endif; ?>
                                </td>
                                <td>
                                    <a href="<?php echo e(route('admin.complaints', $data[0]->addvertise_id)); ?>"
                                       class="btn btn-info">Detail</a>
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