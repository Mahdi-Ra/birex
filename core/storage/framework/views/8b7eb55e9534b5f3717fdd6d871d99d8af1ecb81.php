<?php $__env->startSection('css'); ?>
    <style>
        rect:nth-child(even){
            fill: #17a2b8;
        }
        rect:nth-child(odd){
            fill: #19b952;
        }
        .card-header {
            padding: 0.40rem 1.25rem;
            /*background: #8c7ae6;*/
            background: #2f353b;
            color: white;
            font-size: 20px;
        }

        .widget-small .info h4{
            font-size: 15px;
        }
        .widget-small{
            margin-bottom: 0px;
        }

        .card{
            margin-bottom: 20px!important;
            border: 1px solid #2f353b;
        }

        @media (min-width:312px) and (max-width:480px) {
            .widget-small {
                margin-bottom: 20px!important;
            }
        }
    </style>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <i class="icon fa fa-users"></i> User Panel Shortcut
                </div>
                <div class="card-body">

                    <div class="row" >
                        <div class="col-md-3">
                            <a href="<?php echo e(url('/admin/users')); ?>" class="text-decoration">
                                <div class="widget-small primary"><i class="icon fa fa-users fa-3x"></i>
                                    <div class="info">
                                        <h4>Total Users</h4>
                                        <p><b><?php echo e($user); ?></b></p>
                                    </div>
                                </div>
                            </a>
                        </div>


                        <div class="col-md-3">
                            <a href="<?php echo e(route('users.active')); ?>" class="text-decoration">
                                <div class="widget-small info "><i class="icon fa fa-check fa-3x"></i>
                                    <div class="info">
                                        <h4>Active Users</h4>
                                        <p><b><?php echo e($user_active); ?></b></p>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-3">
                            <a href="<?php echo e(route('users.email.verified')); ?>" class="text-decoration">
                                <div class="widget-small primary "><i class="icon fa fa-envelope fa-3x"></i>
                                    <div class="info">
                                        <h4>E-Unverified Users</h4>
                                        <p><b><?php echo e($email_active); ?></b></p>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-3">
                            <a href="<?php echo e(route('users.phone.verified')); ?>" class="text-decoration">
                                <div class="widget-small danger "><i class="icon fa fa-phone fa-3x"></i>
                                    <div class="info">
                                        <h4>P-Unverified Users</h4>
                                        <p><b><?php echo e($phone_active); ?></b></p>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>
                    <br>
                    <div class="row" >
                        <div class="col-md-3">
                            <a href="<?php echo e(route('users.new')); ?>" class="text-decoration">
                                <div class="widget-small primary"><i class="icon fa fa-users fa-3x"></i>
                                    <div class="info">
                                        <h4>New  Users</h4>
                                        <p><b><?php echo e($new_users); ?></b></p>
                                    </div>
                                </div>
                            </a>
                        </div>


                        <div class="col-md-3">
                            <a href="<?php echo e(route('users.new.auth')); ?>" class="text-decoration">
                                <div class="widget-small info "><i class="icon fa fa-check fa-3x"></i>
                                    <div class="info">
                                        <h4>Auths</h4>
                                        <p><b><?php echo e($new_auth); ?></b></p>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <i class="icon fa fa-bar-chart"></i> Statistics
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <a href="<?php echo e(url('/admin/deals')); ?>" class="text-decoration">
                                <div class="widget-small primary "><i class="icon fa fa-handshake-o fa-3x"></i>
                                    <div class="info">
                                        <h4>Complete Deal</h4>
                                        <p><b><?php echo e(\App\CryptoAddvertise::where('status', 1)->count()); ?></b></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <a href="<?php echo e(url('/admin/crypto')); ?>" class="text-decoration">
                                <div class="widget-small info "><i class="icon fa fa-money fa-3x"></i>
                                    <div class="info">
                                        <h4>Total Methods</h4>
                                        <p><b><?php echo e($method); ?></b></p>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-6 col-lg-3">
                            <a href="<?php echo e(url('/admin/currency')); ?>" class="text-decoration">
                                <div class="widget-small primary "><i class="icon fa fa-usd fa-3x"></i>
                                    <div class="info">
                                        <h4>Total Currency</h4>
                                        <p><b><?php echo e($currency); ?></b></p>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-6 col-lg-3">
                            <a href="<?php echo e(url('/admin/gateway')); ?>" class="text-decoration">
                                <div class="widget-small danger"><i class="icon fa fa-creative-commons fa-3x"></i>
                                    <div class="info">
                                        <h4>Total Gateway</h4>
                                        <p><b>4</b></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Last 7 Days Active Transaction Time</h3>

                <div id="myfirstchart" ></div>
            </div>

        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script>
        $(document).ready(function () {
            new Morris.Bar({
                element: 'myfirstchart',
                data: <?php echo $monthly_play; ?>,
                xkey: 'y',
                ykeys: ['a'],
                labels: ['Transaction Time']
            });
        });
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>