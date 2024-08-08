<?php $__env->startSection('style'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
    <div class="row">
        <?php if(count($errors) > 0): ?>
            <div class="col-md-12">
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong class="col-md-12"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                        Alert!</strong>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <strong style="font-size: 24px;"> Create a Coin Trade Advertisement</strong>

                    <?php if(session('message1')): ?>

                        <div class="behnam sweet-overlay" tabindex="-1" style="opacity: 1.08; display: block;"></div>

                        <div class="behnam sweet-alert  showSweetAlert visible" tabindex="-1" data-custom-class=""
                             data-has-cancel-button="true" data-has-confirm-button="true"
                             data-allow-outside-click="false"
                             data-has-done-function="false" data-animation="pop" data-timer="null"
                             style="display: block; margin-top: -190px;">
                            <div class="sa-icon sa-error" style="display: none;">
      <span class="sa-x-mark">
        <span class="sa-line sa-left"></span>
        <span class="sa-line sa-right"></span>
      </span>
                            </div>
                            <div class="sa-icon sa-warning pulseWarning" style="display: block;">
                                <span class="sa-body pulseWarningIns"></span>
                                <span class="sa-dot pulseWarningIns"></span>
                            </div>
                            <div class="sa-icon sa-info" style="display: none;"></div>
                            <div class="sa-icon sa-success" style="display: none;">
                                <span class="sa-line sa-tip"></span>
                                <span class="sa-line sa-long"></span>

                                <div class="sa-placeholder"></div>
                                <div class="sa-fix"></div>
                            </div>
                            <div class="sa-icon sa-custom" style="display: none;"></div>
                            <h2>Alert</h2>
                            <p class="lead text-muted " style="display: block;">
                                <?php echo e(session('message1')); ?>

                            </p>


                            <form method="post" action="<?php echo e(route('deposit.confirm')); ?>">


                                <?php echo csrf_field(); ?>

                                <input type="hidden" name="gateway" value="505">


                                <div class="form-group" style="display: block;">
                                    <div class="input-group">
                                        <input type="text" name="amount" class="form-control input-lg" id="amount"
                                               readonly="readonly" value="<?php echo e(session('btc')); ?>">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">BTC</div>
                                        </div>
                                    </div>


                                </div>

                                <div class="modal-footer">
                                    <button onclick="$('.behnam').hide();" type="button" class="btn btn-default "
                                            data-dismiss="modal">Close
                                    </button>
                                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
                                </div>
                            </form>


                        </div>


                    <?php endif; ?>

                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-info" role="alert">
                                Dear users, Each completed trade costs advertisers <strong><?php echo e($general->trx_charge); ?>%
                                    Wage</strong> of the total trade amount.
                                You may only use payment accounts that are registered in your own name.
                                You must provide your payement details in the advertisement or in the trade chat.
                            </div>
                        </div>
                        <div class="col-md-12 text-center" style="color: #ff1501">
                            What kind of trade advertisement do you wish to create? If you wish to sell coins make sure
                            you have coins in your Local wallet.
                        </div>
                    </div>

                    <br>
                    <br>

                    <form action="<?php echo e(route('sell.buy')); ?>" method="post">
                        <?php echo csrf_field(); ?>

                        <div class="form-row">


                            <div class="form-group col-md-4">
                                <strong>Type</strong>
                                <input class="form-control" type="text" readonly="" value="Sell">
                            </div>

                            <div class="form-group col-md-4">
                                <strong>Select Coin</strong>
                                <select name="gateway_id" id="coin" class="form-control">
                                    <option value="">Select Coin</option>
                                    <?php $__currentLoopData = $coin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($data->id); ?>"><?php echo e($data->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <strong>Payment Method</strong>
                                <select name="crypto_id" class="form-control">
                                    <option value=" ">Select Method</option>
                                    <?php $__currentLoopData = $methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($data->id); ?>"><?php echo e($data->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>


                            <div class="form-group col-md-4">
                                <strong>Currency</strong>
                                <select name="currency" id="currency" class="form-control">
                                    <option value="">Select Currency</option>
                                    <?php $__currentLoopData = $currency; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($data->id); ?>"><?php echo e($data->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <strong>Margin</strong>
                                <div class="input-group">
                                    <input class="form-control" type="number" value="0" name="margin" id="margin"
                                           placeholder="Margin">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">%</div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <strong>Price equation</strong>
                                <input class="form-control" type="text" id="price" readonly>
                            </div>

                        </div>

                        <hr>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <p style="color: gray;">

                                    Your BTC Balance :
                                    <?php echo e($bal); ?>


                                </p>
                                <strong>Min. transaction limit BTC</strong>
                                <div class="input-group">
                                    <input id="mii" class="form-control" type="text" name="min_amount"
                                           value="<?php echo e(old('min_amount')); ?>" placeholder="Min Amount">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><?php echo e($general->currency); ?></div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <p style="color: gray;">

                                    Your BTC Balance :
                                    <?php echo e($bal); ?>


                                </p>
                                <strong>Max. transaction limit BTC</strong>

                                <div class="input-group">
                                    <input id="maa" class="form-control" type="text" name="max_amount"
                                           value="<?php echo e(old('max_amount')); ?>" placeholder="Max Amount">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><?php echo e($general->currency); ?></div>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group col-md-6">
                                <strong>Min. transaction USD</strong>
                                <div class="input-group">
                                    <input id="mi" class="form-control" type="text"
                                           value="" readonly>
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">USD</div>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group col-md-6">
                                <strong>Max. transaction USD</strong>
                                <div class="input-group">
                                    <input id="ma" class="form-control" type="text"
                                           value="" readonly>
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">USD</div>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group col-md-6">
                                <strong>Terms of Trade</strong>
                                <textarea class="form-control" name="term_detail"
                                          rows="5"><?php echo old('detail'); ?></textarea>
                            </div>

                            <div class="form-group col-md-6">
                                <strong>Payment Details</strong>
                                <textarea class="form-control" name="payment_detail"
                                          rows="5"><?php echo old('payment_detail'); ?></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="checkbox-check">
                                    <input type="checkbox" name="agree" value="1" required>
                                    I Agree With All <a href="<?php echo e(route('terms.index')); ?>">Terms</a> & <a
                                            href="<?php echo e(route('policy.index')); ?>">Policy</a></label>
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Publish Advertise   [0.5% Wage]</button>
                        <br>
                        <button name="trusted_sell" value="trusted_sell" type="submit" class="btn btn-primary btn-block">Trusted Sell   [0.75% Wage]</button>
                        <strong>Notic:</strong>
                        <p>This way (Trusted Sell) you get money from the site and you don't need to negotiate with the seller</p>


                    </form>
                </div>
            </div>

        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>


    <script>
        $(document).ready(function () {

            $(document).on('keyup', "#mii", function () {
                $('#mi').val($('#mii').val() *<?php echo e($btc_usd); ?>);
            });

            $(document).on('keyup', "#maa", function () {
                $('#ma').val($('#maa').val() *<?php echo e($btc_usd); ?>);
            });

            $(document).on('change', "#mii", function () {
                $('#mi').val($('#mii').val() *<?php echo e($btc_usd); ?>);
            });

            $(document).on('change', "#maa", function () {
                $('#ma').val($('#maa').val() *<?php echo e($btc_usd); ?>);
            });

            $(document).on('change', "#coin", function () {

                var crypto = $(this).find(":selected").val();

                if (crypto == 505) {
                    var price = '<?php echo e($btc_usd); ?>';
                    var name = 'BTC';
                    getPrice(price);
                } else if (crypto == 506) {
                    var price = '<?php echo e($eth_usd); ?>';
                    var name = 'ETH';
                    getPrice(price);
                } else if (crypto == 509) {
                    var price = '<?php echo e($doge_usd); ?>';
                    var name = 'DOGE';
                    getPrice(price);

                } else {
                    var price = '<?php echo e($lite_usd); ?>';
                    var name = 'LTE';
                    getPrice(price);
                }

                function getPrice(price) {

                    var cur = $("#currency").val();
                    var token = "<?php echo e(csrf_token()); ?>";

                    $("#margin").val('0');

                    $.ajax({
                        type: "POST",
                        url: "<?php echo e(route('currency.check')); ?>",
                        data: {
                            'crypto': cur,
                            '_token': token
                        },

                        success: function (data) {
                            $("#sizing-addon1").text(data.name);
                            $("#sizing-addon2").text(data.name);

                            if ($("#margin").val() == 0) {
                                $("#price").val(data.usd_rate * price + ' ' + data.name + ' to ' + name);
                            }

                            $("#margin").bind('keyup mouseup', function () {

                                var margin = $(this).val();
                                if (margin == 0) {
                                    var afterMargin = (data.usd_rate * price * 1) / 100;
                                    $("#price").val(((data.usd_rate * price) + afterMargin) + ' ' + data.name + ' to ' + name);
                                }
//                            if (margin != 0){
                                var afterMargin = (data.usd_rate * price * margin) / 100;
                                $("#price").val(((data.usd_rate * price) + afterMargin) + ' ' + data.name + ' to ' + name);
//                            }

                            });

                        }
                    });

                }

                $(document).on('change', "#currency", function () {

                    $("#margin").val('0');

                    var cur = $(this).find(":selected").val();
                    var token = "<?php echo e(csrf_token()); ?>";

                    $.ajax({
                        type: "POST",
                        url: "<?php echo e(route('currency.check')); ?>",
                        data: {
                            'crypto': cur,
                            '_token': token
                        },

                        success: function (data) {
                            $("#sizing-addon1").text(data.name);
                            $("#sizing-addon2").text(data.name);

                            if ($("#margin").val() == 0) {
                                $("#price").val(data.usd_rate * price + ' ' + data.name + ' to ' + name);
                            }

                            $("#margin").bind('keyup mouseup', function () {

                                var margin = $(this).val();
                                if (margin == 0) {
                                    var afterMargin = (data.usd_rate * price * 1) / 100;
                                    $("#price").val(((data.usd_rate * price) + afterMargin) + ' ' + data.name + ' to ' + name);
                                }

//                            if (margin != 0){
                                var afterMargin = (data.usd_rate * price * margin) / 100;
                                $("#price").val(((data.usd_rate * price) + afterMargin) + ' ' + data.name + ' to ' + name);
//                            }

                            });

                        }
                    });
                });

            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>