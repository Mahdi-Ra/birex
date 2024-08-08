<?php $__env->startSection('style'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron text-center">
                <h1 class="display-4" style="font-weight: bold;color: #212529;"><?php echo e($general->banner_title); ?></h1>
                <hr class="my-4">
                <p><?php echo e($general->banner_sub_title); ?></p>
                <?php if(auth()->guard()->guest()): ?>
                    <a class="btn btn-primary btn-lg " href="<?php echo e(url('register')); ?>" role="button"> <i
                                class="fa fa-check-square-o"></i> Sign Up Now</a>
                <?php else: ?>
                    <a class="btn btn-primary btn-lg " href="<?php echo e(url('/home')); ?>" role="button"> <i
                                class="fa fa-check-square-o"></i> Dashboard</a>
                <?php endif; ?>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="card border-dark">
                <div class="card-body text-dark">
                    <form action="<?php echo e(route('quick.search')); ?>" method="GET">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <select name="add_type" class="form-control" required>
                                    <option value="">Select Service</option>
                                    <option value="1">Quick Buy</option>
                                </select>
                            </div>

                            <div class="form-group col-md-3">
                                <select name="gateway_id" class="form-control" required>
                                    <option value="">Select Coin</option>
                                    <?php $__currentLoopData = $coin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($data->id); ?>"><?php echo e($data->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <div class="form-group col-md-3">
                                <select name="method_id" class="form-control" required>
                                    <option value="">Select Payment Method</option>
                                    <?php $__currentLoopData = $methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($data->id); ?>"><?php echo e($data->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <div class="form-group col-md-3">
                                <select name="currency_id" class="form-control" required>
                                    <option value="">Select Currency</option>
                                    <?php $__currentLoopData = $currency; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($data->id); ?>"><?php echo e($data->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-sm btn-block">Search</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <div class="row">

        

        
        
        
        
        
        
        
        
        
        

        
        
        
        
        

        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        


        <div class="col-md-12">
            <h4>Buy Bitcoin</h4>
            <div class="table-responsive">
                <table class="table">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">User</th>
                        <th scope="col">Coin Name</th>
                        <th scope="col">Payment method</th>
                        <th scope="col">Price</th>
                        <th scope="col">Limits</th>
                        <th scope="col">Status</th>
                        <th scope="col">Detail</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php $__currentLoopData = $buy_btc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <!-- Cart Tr Start -->

                        <tr <?php if($data->min_amount >= $data->max_amount && $data->add_type == 1): ?> style="display: none" <?php endif; ?>>
                            <td><?php echo e($data->user->username); ?></td>
                            <td><?php echo e($data->gateway->name); ?></td>
                            <td><img style="width: 30px;"
                                     src="<?php echo e(asset('assets/images/crypto/'.$data->method->icon)); ?>"> <?php echo e($data->method->name); ?>

                            </td>
                            <td><?php echo e($data->price); ?> <?php echo e($data->currency->name); ?>/<?php echo e($data->gateway->currency); ?></td>
                            <td><?php if($data->add_type == 1): ?>
                                    <?php echo e($data->min_amount.' '.$data->currency->name .'-'.$data->max_amount.' '.$data->currency->name); ?>

                                <?php else: ?>
                                    <?php echo e($data->min_amount.' '.$data->currency->name .'-'.$data->max_amount.' '.$data->currency->name); ?>

                                <?php endif; ?>
                            </td>

                            <td><?php if($data->trusted_sell == 1): ?>
                                    <img src="/trusted_sell.png" width="40" height="40">
                                <?php endif; ?>
                            </td>
                            <td><a href="<?php echo e(route('view', ['id'=>$data->id, 'payment'=>Replace($data->method->name)])); ?>"
                                   class="btn btn-light">Buy</a></td>
                        </tr>
                        <!-- Cart Tr End -->
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>


        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        

        
        

        
        
        
        
        
        
        
        
        
        
        
        
        
        
        


        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        

        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        


        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        

        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        

        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        

        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        


        
        
        
        
        
        
        
        
        
        
        
        
        
        

        
        
        

        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        


        
        
        
        
        
        
        
        
        
        
        
        
        
        

        
        
        

        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        


    </div>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>