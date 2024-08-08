<?php $__env->startSection('style'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
    <?php
        $bal = \App\UserCryptoBalance::where('user_id', $coin->user->id)
        ->where('gateway_id',$coin->gateway_id)->first();
      $userdef = $coin->max_amount;
      $actual = $bal->balance;
      if ($coin->add_type == 1){
      $max = $userdef>$actual?$actual:$userdef;
      }else{
      $max = $coin->max_amount;
      }

    ?>



    <div class="row">
        <div class="col-md-12">
            <div class="pb-2 mt-4 mb-2 border-bottom">
                <?php echo e($coin->add_type == 2 ? 'Sell':'Buy'); ?> <?php echo e($coin->gateway->name); ?> using <img style="width: 40px;" src="<?php echo e(asset('assets/images/crypto/'.$coin->method->icon)); ?>"> <?php echo e($coin->method->name); ?>

            </div>
        </div>

        <div class="col-md-12">
            <h6 class="text-center"><?php echo e(url('/')); ?> user: <?php echo e($coin->user->name); ?> wishes to <?php echo e($coin->add_type == 1 ? 'sell':'buy'); ?> <?php echo e($coin->gateway->name); ?> to you.</h6>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="card">
                <div class="card-body text-center">
                    <!--<h5><strong>Price : <span style="color: #17c325"><i class="fa fa-money"></i> <?php echo e($coin->price); ?> <?php echo e($coin->currency->name); ?> / <?php echo e($coin->gateway->currency); ?></span></strong></h5>-->

                    <p><strong>User : </strong><span><a href="<?php echo e(route('user.profile.view', $coin->user->username)); ?>" style="color: black"><i class="fa fa-user"></i> <?php echo e($coin->user->username); ?></a></span></p>

                    <p><strong>Payment Method : </strong><span><img style="width: 30px;" src="<?php echo e(asset('assets/images/crypto/'.$coin->method->icon)); ?>"> <?php echo e($coin->method->name); ?></span></p>

                    <p><strong>Trade Limit : </strong><span><?php echo e($coin->min_amount); ?> - <?php echo e($max); ?> BTC</span></p>
                    <p><strong>Trade Limit (Price In <?php echo e($coin->currency->name); ?>) : </strong><span><?php echo e($coin->min_amount * $pr); ?> - <?php echo e($max * $pr); ?> <?php echo e($coin->currency->name); ?></span></p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card margin-top-pranto">
                <div class="card-body">
                    <br>
                    <button type="button" data-toggle="modal" data-target="#termModal" class="btn btn-dark btn-lg btn-block"><?php echo e($coin->user->name); ?>'s Terms</button><br>
                    <button type="button" data-toggle="modal" data-target="#paymentModal" class="btn btn-secondary btn-lg btn-block"><?php echo e($coin->user->name); ?>'s Payment Detail</button><br>
                </div>
            </div>
        </div>
    </div> <hr>

    <div class="row">
        <?php if(auth()->guard()->guest()): ?>

            <div class="col-md-8 offset-md-2 col-sm-12 padding-pranto-bottom">
                <div class="login-admin login-admin1">
                    
                    <div class="login-form">
                        <a href="<?php echo e(url('/login')); ?>" class="btn btn-danger" style="display: block;text-decoration:none">Sign In Now</a>
                    </div>
                    <br>
                    <div class="login-form">
                        <a href="<?php echo e(url('/register')); ?>" class="btn btn-primary" style="display: block;text-decoration:none">Sign Up Now</a>
                    </div>

                </div>
            </div>

        <?php else: ?>


            <div class="col-md-8 offset-md-2 col-sm-12 padding-pranto-bottom">

                <div class="card">
                    <div class="card-header text-center">
                       <h3> How Much Want To <?php echo e($coin->add_type == 2 ? 'Sell':'Buy'); ?> ?</h3>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo e(route('store.deal', $coin->id)); ?>" class="form-horizontal" method="POST">

                            <?php if(count($errors) > 0): ?>
                                <div class="row">
                                    <div class="col-md-010">
                                        <div class="alert alert-danger alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            <h12><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Alert!</h12>
                                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><?php echo e($error); ?></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>


                            <?php echo csrf_field(); ?>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <div class="input-group">
                                        <input type="text" id="amount" name="amount"  placeholder="How Much Want To <?php echo e($coin->add_type == 2 ? 'Sell':'Buy'); ?>" class="form-control"  aria-describedby="inputGroupPrepend2" required>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend2">BTC</span>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <textarea class="form-control" name="detail" rows="5" placeholder="Contact Message And Others Information..."></textarea>
                            </div>


                            <input type="submit" class="btn btn-primary btn-block" style="display: none" id="submit" value="Send Request">

                        </form>
                    </div>
                </div>

            </div>
        <?php endif; ?>
    </div>








    <div id="termModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" style="color: green">Terms Of <strong> <?php echo e($coin->user->name); ?></strong></h4>
                </div>
                <div class="modal-body">
                    <p class="text-center"><?php echo $coin->term_detail; ?></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <div id="paymentModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" style="color: green">Payment Detail of <strong> <?php echo e($coin->user->name); ?></strong></h4>
                </div>
                <div class="modal-body">
                    <p class="text-center"><?php echo $coin->payment_detail; ?></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
    $(document).ready(function () {
        var min = "<?php echo e($coin->min_amount); ?>";
        var max = "<?php echo e($max); ?>";
        var price = "<?php echo e($price); ?>";

        $(document).on('keyup', "#amount",function(){
            var val = $(this).val();

            if(parseFloat(val) >= parseFloat(min) && parseFloat(val) <= parseFloat(max)){
                $("#amount").css("background-color", "#87E9B9");
                $("#submit").css("display", "block");
                $("#inCoin").val(parseFloat(val)/price);

            }else {
                $("#amount").css("background-color", "#F59898");
                $("#submit").css("display", "none");
                $("#inCoin").val(' ');
            }


        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>