
<?php $__env->startSection('css'); ?>
    <style>
        #imaginary_container{
            margin-top:20%; /* Don't copy this */
        }
        .stylish-input-group .input-group-addon{
            background: white !important;
        }
        .stylish-input-group .form-control{
            border-right:0;
            box-shadow:0 0 0;
            border-color:#ccc;
        }
        .stylish-input-group button{
            border:0;
            background:transparent;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
    <div class="row">

        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title ">Search By Trans ID</h3>
                <div class="tile-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <form class="form-horizontal" method="GET" action="<?php echo e(route('trans.search')); ?>">

                                    <div class="input-group stylish-input-group">
                                        <input type="text" class="form-control has-error bold" name="trans_id" required placeholder="Search By Trans ID" >

                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                            <button type="submit">
                                                    <span><i class="fa fa-search"></i></span>
                                                </button>
                                            </span>
                                        </div>

                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title "><?php echo e($page_title); ?></h3>
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover order-column" id="">
                            <thead>
                            <tr>
                                <th>Trans Id</th>
                                <th>Trans Title</th>
                                <th>Amount</th>
                                <th>Created At</th>
                                <th>Detail</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $trans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($data->trans_id); ?></td>
                                    <td>
                                        <?php if($data->add_type == 1): ?> Buy Request <?php else: ?> Sell Request <?php endif; ?>
                                        from <?php echo e($data->from_user->username); ?> to <?php echo e($data->to_user->username); ?>

                                    </td>
                                    <td><?php echo e($data->amount_to); ?> <?php echo e($data->currency->name); ?></td>
                                    <td><?php echo e($data->created_at); ?></td>
                                    <td><a class="btn btn-primary" href="<?php echo e(route('deal.view.admin', $data->trans_id)); ?>" style="color: white">Detail</a></td>
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