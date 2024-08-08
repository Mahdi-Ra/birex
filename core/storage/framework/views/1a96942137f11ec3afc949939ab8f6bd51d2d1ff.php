<?php $__env->startSection('style'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
    <div class="row padding-pranto-top padding-pranto-bottom">
        <?php if(count($errors) > 0): ?>
            <div class="col-md-12">
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong class="col-md-12"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Alert!</strong>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong style="font-size: 24px;">Support Ticket</strong>

                    <a class="btn btn-primary pull-right " href="<?php echo e(route('add.new.ticket')); ?>"> <i class="fa fa-plus"></i> New Ticket</a>
                </div>
                <div class="card-body">

                    <div class="alert alert-info" role="alert">
                        Dear users,Do not open multiple tickets, since it will increase our response time.
                    </div>

                    <div class="table-responsive">


                        <table class="table">
                            <thead class="thead-light">
                            <tr>
                                <th style="width:10% !important;"> Ticket Id </th>
                                <th> Subject </th>
                                <th> Raised Time </th>
                                <th> Status </th>
                                <th> Action </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $all_ticket; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($data->ticket); ?></td>
                                    <td><b><?php echo e($data->subject); ?></b></td>
                                    <td><?php echo e(\Carbon\Carbon::parse($data->created_at)->format('F dS, Y - h:i A')); ?></td>
                                    <td>
                                        <?php if($data->status == 1): ?>
                                            <button class="btn btn-warning"> Opened</button>
                                        <?php elseif($data->status == 2): ?>
                                            <button type="button" class="btn btn-success">  Answered </button>
                                        <?php elseif($data->status == 3): ?>
                                            <button type="button" class="btn btn-info"> Customer Reply </button>
                                        <?php elseif($data->status == 9): ?>
                                            <button type="button" class="btn btn-danger">  Closed </button>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo e(route('ticket.customer.reply', $data->ticket )); ?>" class="btn btn-secondary"><b>View</b></a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>
                        </table>

                    </div>

                    <?php echo e($all_ticket->links()); ?>




                </div>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>