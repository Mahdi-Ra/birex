
<?php $__env->startSection('style'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
    <div class="row ">

        <div class="col-md-12 col-sm-12">

            <div class="jumbotron text-center">

                <div class="row">

                    <div class="col-md-4">
                        <div class="card text-uppercase">
                            <div class="card-header">
                                <strong> Personal Detail</strong>
                            </div>
                            <ul class="list-group list-group-flush ">
                                <li class="list-group-item"><i class="fa fa-user"></i> <?php echo e($user->username); ?></li>
                                <li class="list-group-item"><i class="fa fa-user-circle-o"></i> <?php echo e($user->name); ?></li>
                                <li class="list-group-item"><i class="fa fa-map-marker"></i> <?php echo e($user->city); ?></li>
                                <li class="list-group-item"><i class="fa fa-globe"></i> <?php echo e($user->country); ?></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-4 margin-top-pranto">
                        <div class="card">
                            <div class="card-header text-uppercase">
                                Information of <strong> <?php echo e($user->username); ?></strong>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><strong>Trade volume of
                                        BTC:</strong> <?php echo e(round($trade_btc,8)); ?> BTC
                                </li>
                                <li class="list-group-item"><strong>Trade volume of
                                        ETH:</strong> <?php echo e(round($trade_etc,8)); ?> ETH
                                </li>
                                <li class="list-group-item"><strong>Trade volume of
                                        DOGE:</strong> <?php echo e(round($trade_doge,8)); ?> DOGE
                                </li>
                                <li class="list-group-item"><strong>Trade volume of
                                        LTC:</strong> <?php echo e(round($trade_lite,8)); ?> LTC
                                </li>
                                <li class="list-group-item"><strong>User Rate : </strong> <?php echo e($user->star); ?> / 5</li>
                                <li class="list-group-item"><strong>First
                                        purchase:</strong> <?php if(!empty($first_buy)): ?> <?php echo e(\Carbon\Carbon::createFromTimeStamp(strtotime($first_buy->created_at))->diffForHumans()); ?> <?php else: ?>
                                        NA <?php endif; ?></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-4 margin-top-pranto">
                        <div class="card">
                            <div class="card-header text-uppercase">
                                Others Information
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><strong>Account
                                        created:</strong><?php if(!empty($user->created_at)): ?> <?php echo e(\Carbon\Carbon::createFromTimeStamp(strtotime($user->created_at))->diffForHumans()); ?> <?php else: ?>
                                        NA <?php endif; ?></li>
                                <li class="list-group-item"><strong>Last
                                        seen:</strong><?php if(!empty($last_login->created_at)): ?> <?php echo e(\Carbon\Carbon::createFromTimeStamp(strtotime($last_login->created_at))->diffForHumans()); ?><?php else: ?>
                                        NA <?php endif; ?></li>
                                <li class="list-group-item"><strong>Email:</strong> <?php if($user->email_verify == 1): ?> <i
                                            style="color: green;" class="fa fa-check"></i> Verified <?php else: ?> <i
                                            style="color: red;" class="fa fa-times"></i> Unverified  <?php endif; ?></li>
                                <li class="list-group-item"><strong>Phone Number:</strong> <?php if($user->phone_verify == 1): ?>
                                        <i style="color: green;" class="fa fa-check"></i> Verified <?php else: ?> <i
                                                style="color: red;" class="fa fa-times"></i> Unverified  <?php endif; ?></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <hr>
        <div class="col-md-12  col-sm-12">

            <div class="jumbotron text-center">

                <div class="row">
                    <div class="col-md-12">
                        <div class="jumbotron text-center" style="background-color: white;padding:10px;">
                            <h2 class="text-center">All Transaction</h2>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 margin-top-pranto">
                        <div class="card text-uppercase">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"> Total Bitcoin Buy
                                    <strong><?php echo e(\App\AdvertiseDeal::where('to_user_id', $user->id)->where('gateway_id', 505)->where('add_type',1)->count()); ?></strong>
                                </li>
                                <li class="list-group-item"> Total Bitcoin Sell
                                    <strong><?php echo e(\App\AdvertiseDeal::where('from_user_id', $user->id)->where('gateway_id', 505)->where('add_type',2)->count()); ?></strong>
                                </li>
                            </ul>
                        </div>
                    </div>


                    <div class="col-md-3 margin-top-pranto">
                        <div class="card text-uppercase">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"> Total Etherium Buy
                                    <strong><?php echo e(\App\AdvertiseDeal::where('to_user_id', $user->id)->where('gateway_id', 506)->where('add_type',1)->count()); ?></strong>
                                </li>
                                <li class="list-group-item"> Total Etherium Sell
                                    <strong><?php echo e(\App\AdvertiseDeal::where('from_user_id', $user->id)->where('gateway_id', 506)->where('add_type',1)->count()); ?></strong>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 margin-top-pranto">
                        <div class="card text-uppercase">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"> Total Dogecoin Buy
                                    <strong><?php echo e(\App\AdvertiseDeal::where('to_user_id', $user->id)->where('gateway_id', 509)->where('add_type',1)->count()); ?></strong>
                                </li>
                                <li class="list-group-item"> Total Dogecoin Sell
                                    <strong><?php echo e(\App\AdvertiseDeal::where('from_user_id', $user->id)->where('gateway_id', 509)->where('add_type',2)->count()); ?></strong>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 margin-top-pranto">
                        <div class="card text-uppercase">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"> Total Litecoin Buy
                                    <strong><?php echo e(\App\AdvertiseDeal::where('to_user_id', $user->id)->where('gateway_id', 510)->where('add_type',1)->count()); ?></strong>
                                </li>
                                <li class="list-group-item"> Total Litecoin Sell
                                    <strong><?php echo e(\App\AdvertiseDeal::where('from_user_id', $user->id)->where('gateway_id', 510)->where('add_type',2)->count()); ?></strong>
                                </li>
                            </ul>
                        </div>
                    </div>


                </div>
            </div>


            <hr>

            <div class="col-md-12">

                <div class="card">

                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-light">
                                <tr>
                                    <th>Coin Name</th>
                                    <th>Payment method</th>
                                    <th>Price</th>
                                    <th>Limits</th>
                                    <th>Detail</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $coin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <!-- Cart Tr Start -->
                                    <?php
                                        $bal = \App\UserCryptoBalance::where('user_id', $data->user->id)
                                        ->where('gateway_id',$data->gateway_id)->first();
                                      $userdef = $data->max_amount;
                                      $actual = $data->price*$bal->balance;
                                      $max = $userdef>$actual?$actual:$userdef;
                                    ?>

                                    <tr <?php if($data->min_amount >= $max && $data->add_type == 1): ?> style="display: none" <?php endif; ?>>
                                        <td><?php echo e($data->gateway->name); ?></td>
                                        <td><img style="width: 30px;"
                                                 src="<?php echo e(asset('assets/images/crypto/'.$data->method->icon)); ?>"> <?php echo e($data->method->name); ?>

                                        </td>
                                        <td><?php echo e($data->price); ?> <?php echo e($data->currency->name); ?>/<?php echo e($data->gateway->currency); ?></td>
                                        <td><?php if($data->add_type == 1): ?>
                                                <?php echo e($data->min_amount.' '.$data->currency->name .'-'.round($max,2).' '.$data->currency->name); ?>

                                            <?php else: ?>
                                                <?php echo e($data->min_amount.' '.$data->currency->name .'-'.$data->max_amount.' '.$data->currency->name); ?>

                                            <?php endif; ?>
                                        </td>
                                        <td><a class="btn btn-secondary"
                                               href="<?php echo e(route('view', ['id'=>$data->id, 'payment'=>Replace($data->method->name)])); ?>"><?php echo e($data->add_type == 2 ? 'Sell':'Buy'); ?></a>
                                        </td>
                                    </tr>
                                    <!-- Cart Tr End -->
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </tbody>
                            </table>
                        </div>
                        <?php echo e($coin->links()); ?>


                    </div>

                </div>

            </div>

        </div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>