<?php $__env->startSection('body'); ?>
    <style>
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
        }
    </style>


    <div class="row">
        <div class="col-md-8">
            <div class="tile">
                <h4 class="tile-title">
                    <i class="fa fa-cogs"></i> Update Profile
                </h4>
                <div class="tile-body">
                    <form id="form" method="POST" action="<?php echo e(route('user.balance.update')); ?>"
                          enctype="multipart/form-data" name="editForm">
                        <?php echo e(csrf_field()); ?>

                        <input type="hidden" name="id" value="<?php echo e($user->id); ?>">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label> <strong>Name</strong></label>
                                <input data-toggle="toggle" checked data-onstyle="success" data-offstyle="danger" data-on=" <i class='fa fa-plus'></i> Add Money" data-off="<i class='fa fa-minus'></i> Substruct Money"  data-width="100%" data-height="20" type="checkbox" name="operation">

                            </div>
                            <div class="form-group col-md-6">
                                <label><strong>Select Gateway</strong></label>
                               <select class="form-control" name="gateway_id">
                                   <?php $__currentLoopData = $balance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <option value="<?php echo e($data->id); ?>"><?php echo e($data->gateway->currency); ?></option>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                               </select>
                            </div>

                        </div>

                        <div class="row">
                            <div class="form-group col-md-12">
                                <label><strong>Amount</strong></label>
                                <div class="form-group">
                                    <input type="text" name="amount" class="form-control input-lg">
                                </div>
                                <?php if($errors->has('amount')): ?>
                                    <span class="help-block">
                                                <strong><?php echo e($errors->first('amount')); ?></strong>
                                            </span>
                                <?php endif; ?>
                            </div>

                        </div>

                        <div class="row">
                            <div class="form-group col-md-12 ">
                                <label> <strong>Message</strong></label>
                                <textarea name="message" id="" class="form-control"  rows="5" required></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-lg btn-primary btn-block">Update</button>

                    </form>
                </div>
            </div>

        </div>

        <div class="col-md-4">
            <div class="tile">
                <h4 class="tile-title">
                    <i class="fa fa-money"></i> Current Balance
                </h4>
                <div class="title-body">
                        <?php if( file_exists($user->image)): ?>
                            <img src=" <?php echo e(url('assets/user/images/'.$user->image)); ?> " class="img-responsive propic"
                                 alt="Profile Pic">
                        <?php else: ?>

                            <img src=" <?php echo e(url('assets/user/images/user-default.png')); ?> " class="img-responsive propic"
                                 alt="Profile Pic">
                        <?php endif; ?>

                        <br>
                    <h5>User Name : <?php echo e($user->username); ?></h5>
                    <h5>Name : <?php echo e($user->name); ?></h5>
                            <?php $__currentLoopData = $balance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <h6> <?php echo e($data->gateway->name); ?> BALANCE : <?php echo e(number_format(floatval($data->balance), $basic->decimal, '.', '')); ?> <?php echo e($data->gateway->currency); ?></h6>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <hr>
                    <p><strong>Last Login : <?php echo e(Carbon\Carbon::parse($user->login_time)->diffForHumans()); ?></strong> <br></p>
                </div>
            </div>

        </div>


    </div>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>