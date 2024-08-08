<?php $__env->startSection('style'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
    <div class="row  padding-pranto-top padding-pranto-bottom">
        <div class="col-md-12">

            <div class="card">

                <div class="card-header">
                    <h4><?php echo e($title); ?></h4>
                </div>

                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Created at</th>
                                <th>Trade type</th>
                                <th>Trading partner</th>
                                <th>Transaction status</th>
                                <th>Price</th>
                                <th>Trade amount</th>
                                <th>More</th>
                                <th>Rate</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $addvertise; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($data->trans_id); ?></td>
                                    <td><?php echo e($data->created_at); ?></td>
                                    <td><?php echo e($data->add_type==1 ? 'Buy':'Sell'); ?></td>
                                    <?php if(request()->path() == 'user/close/trade' || request()->path() == 'user/open/trade'): ?>
                                        <td><a href="<?php echo e(route('user.profile.view', $data->to_user->username)); ?>"
                                               style="color: black"><strong><?php echo e($data->to_user->username); ?></strong></a>
                                        </td>
                                    <?php else: ?>
                                        <td><a href="<?php echo e(route('user.profile.view', $data->from_user->username)); ?>"
                                               style="color: black"><strong><?php echo e($data->from_user->username); ?></strong></a>
                                        </td>
                                    <?php endif; ?>
                                    <td>
                                        <?php if($data->status == 0): ?>
                                            <span class="label label-warning">Processing</span>
                                        <?php elseif($data->status == 1): ?>
                                            <span class="label label-success">Complete</span>
                                        <?php elseif($data->status == 2): ?>
                                            <span class="label label-danger">Cancelled</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($data->amount_to * App\Price::find($data->currency->name)->am); ?> <?php echo e($data->currency->name); ?></td>
                                    
                                    <td>
                                     
                                        <?php echo e(sprintf("%.8f", floor($data->amount_to * pow(10, 8)) / pow(10, 8)),round($data->amount_to, 8)); ?>

                                        
                                        <?php echo e($data->gateway->currency); ?>

                                    </td>
                                    
                             
                                    
                                    <td><a href="<?php echo e(route('deal_message',$data->trans_id)); ?>"
                                           class="btn btn-primary btn-block">More</a></td>

                                    <?php if(($data->from_user_id==Auth::user()->id && $data->from_user_send==false)||
                                    ($data->to_user_id==Auth::user()->id && $data->to_user_send==false)
                                    ): ?>
                                        <td>
                                            <a href="<?php echo e(route('trade.rate',$data->id)); ?>"
                                               class="btn btn-success btn-block">Rate</a>
                                        </td>
                                    <?php else: ?>
                                        <td>
                                            <button disabled
                                                    class="btn btn-success btn-block">Rate
                                            </button>
                                        </td>
                                    <?php endif; ?>

                                    <?php if($data->status!=1): ?>
                                        <td>
                                            <a href="<?php echo e(route('complainttransactions',$data->id)); ?>"
                                               class="btn btn-danger btn-block">Complaint</a>
                                        </td>
                                    <?php else: ?>
                                        <td>
                                            <button disabled
                                                    class="btn btn-danger btn-block">Complaint
                                            </button>
                                        </td>
                                    <?php endif; ?>

                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <?php echo e($addvertise->links()); ?>


                </div>

            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>