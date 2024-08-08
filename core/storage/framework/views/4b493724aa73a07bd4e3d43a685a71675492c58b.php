<?php $__env->startSection('style'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>

    <nav aria-label="breadcrumb" class="padding-pranto-top">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <h2><?php echo e($type == 1 ? 'Sell':'Buy'); ?> Coins</h2>
            </li>
        </ol>
    </nav>

    <div class="row padding-pranto-bottom">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table">
                    <thead class="thead-light">
                    <tr>
                        <th width="20%">Seller</th>
                        <th>Coin Name</th>
                        <th>Payment method</th>
                        <th>Price</th>
                        <th>Limits</th>
                        <th>Status</th>
                        <th>Detail</th>
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
                             <td><?php echo e(App\Price::find($data->currency->name)->am); ?> <?php echo e($data->currency->name); ?> / BTC</td>
                             <td><?php if($data->add_type == 1): ?>
                                    <?php echo e($data->min_amount.' BTC-'.$data->max_amount.' BTC'); ?>

                                <?php else: ?>
                                    <?php echo e($data->min_amount.' BTC-'.$data->max_amount.' BTC'); ?>

                                <?php endif; ?>
                            </td>
                            <td>

                                <?php if($data->trusted_sell == 1): ?>
                                    <img src="/trusted_sell.png" width="40" height="40">
                                <?php endif; ?>
                            </td>

                            <td><a class="btn btn-primary"
                                   href="<?php echo e(route('view', ['id'=>$data->id, 'payment'=>Replace($data->method->name)])); ?>"><?php echo e($type == 1 ? 'Sell':'Buy'); ?></a>
                            </td>
                        </tr>
                        <!-- Cart Tr End -->
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-12 text-center">
            <?php echo e($buy_btc->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>