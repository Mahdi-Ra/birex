<?php $__env->startSection('body'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title pull-left">User List</h3>
                <div class="pull-right icon-btn">
                    <form method="POST" class="form-inline" action="<?php echo e(route('search.users')); ?>">
                        <?php echo e(csrf_field()); ?>

                        <input type="text" name="search" class="form-control" placeholder="Search">
                        <button class="btn btn-outline btn-circle  green" type="submit"><i
                                    class="fa fa-search"></i></button>

                    </form>
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Username</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">Details</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td data-label="Name"><?php echo e($user->name); ?></td>
                                <td data-label="Email"><?php echo e($user->email); ?></td>
                                <td data-label="Username"><?php echo e($user->username); ?></td>
                                <td data-label="Mobile"><?php echo e(isset($user->phone) ? $user->phone : 'N/A'); ?></td>
                                <td  data-label="Details">
                                    <a href="<?php echo e(route('user.single', $user->id)); ?>"
                                       class="btn btn-outline-primary ">
                                        <i class="fa fa-eye"></i> View </a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <?php echo $users->render(); ?>

                </div>
            </div>
        </div>
    </div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>