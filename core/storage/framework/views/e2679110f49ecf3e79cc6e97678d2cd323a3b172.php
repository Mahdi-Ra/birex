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
                    <strong style="font-size: 24px;">View Ticket</strong>

                    <?php if($ticket_object->status == 1): ?>
                        <button class="btn btn-warning  pull-right "> Opened</button>
                    <?php elseif($ticket_object->status == 2): ?>
                        <button type="button" class="btn btn-success  pull-right ">  Answered </button>
                    <?php elseif($ticket_object->status == 3): ?>
                        <button type="button" class="btn btn-info pull-right "> Customer Reply </button>

                    <?php elseif($ticket_object->status == 9): ?>
                        <button type="button" class="btn btn-danger pull-right ">  Closed </button>
                    <?php endif; ?>

                    <a href="<?php echo e(route('ticket.close', $ticket_object->ticket)); ?>" class="btn btn-danger pull-right" style="margin-right: 10px;" >Click To Make Close</a>

                </div>
                <div class="card-body">
                    <h4 class="card-title text-center">#<?php echo e($ticket_object->ticket); ?> - <?php echo e($ticket_object->subject); ?></h4>
                    <br>
                    <br>

                    <form method="POST" action="<?php echo e(route('store.customer.reply', $ticket_object->ticket)); ?>" accept-charset="UTF-8" >
                    <?php echo e(csrf_field()); ?>


                        <?php $__currentLoopData = $ticket_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="card" style="margin-top: 10px;">
                                <div class="card-header">
                                    <?php if($data->type == 1): ?>
                                        <p><span style="color: #0e76a8"><?php echo e(Auth::user()->username); ?></span> , <small><?php echo e(\Carbon\Carbon::parse($data->updated_at)->format('F dS, Y - h:i A')); ?></small></p>
                                    <?php else: ?>
                                        <p><span style="color: #0e76a8"><?php echo e($general->sitename); ?></span> , <small><?php echo e(\Carbon\Carbon::parse($data->updated_at)->format('F dS, Y - h:i A')); ?></small></p>
                                    <?php endif; ?>
                                </div>
                                <div class="card-body">
                                    <p class="card-text"><?php echo $data->comment; ?></p>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        <div class="form-group padding-pranto-top">
                            <strong >Reply: </strong>
                            <textarea class="form-control" name="comment" rows="10"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-check"></i> Post</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>