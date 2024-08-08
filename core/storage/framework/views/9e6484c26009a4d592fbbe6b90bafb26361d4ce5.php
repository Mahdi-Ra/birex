<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo e($general->sitename); ?> <?php if(!empty($page_title)): ?>| <?php echo e($page_title); ?> <?php endif; ?></title>
    <!--Favicon add-->
    <link rel="icon" type="image/png" href="<?php echo e(asset('assets/images/logo/favicon.png')); ?>"/>
    <!--bootstrap Css-->
    <link href="<?php echo e(url('/')); ?>/assets/front/css/bootstrap.min.css" rel="stylesheet">

    <link href="<?php echo e(url('/')); ?>/assets/admin/css/font-awesome.min.css" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/sweetalert.css')); ?>">

    <link href="<?php echo e(url('/')); ?>/assets/front/css/style.css" rel="stylesheet">


    <link href="<?php echo e(url('/')); ?>/assets/front/color.php?color=<?php echo e($general->color); ?>" rel="stylesheet">

    <?php echo $__env->yieldContent('style'); ?>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
            <img style="max-width: 160px;" src="<?php echo e(url('/')); ?>/assets/images/logo/logo.png" alt="logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">


                <li class="nav-item dropdown <?php if(request()->path() == 'buy/btc' ||  request()->path() == 'buy/eth' ||request()->path() == 'buy/doge' ||  request()->path() == 'buy/lite'): ?>active <?php endif; ?>">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        Buy
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?php echo e(route('buy.bitcoin.view')); ?>"> Bitcoin</a>
                        <!--<a class="dropdown-item" href="<?php echo e(route('buy.eth.view')); ?>"> Ethereum </a>-->
                        <!--<a class="dropdown-item" href="<?php echo e(route('buy.doge.view')); ?>"> Dogecoin </a>-->
                        <!--<a class="dropdown-item" href="<?php echo e(route('buy.lite.view')); ?>"> Litecoin </a>-->

                    </div>
                </li>

                <?php if(auth()->guard()->guest()): ?>

                    <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    <li class="nav-item <?php if(request()->path() == 'menu/'.$data->slug ): ?> active <?php endif; ?>">
                        <a class="nav-link" href="<?php echo e(route('menu.view', $data->slug)); ?>"><?php echo e($data->name); ?> </a>
                    </li>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                    <li class="nav-item <?php if(request()->path() == 'http://blog.bircoin.co' ): ?> active <?php endif; ?>">
                        <a class="nav-link" href="http://blog.bircoin.co">Blog</a>
                    </li>
                    
                    <li class="nav-item <?php if(request()->path() == 'contact' ): ?> active <?php endif; ?>">
                        <a class="nav-link" href="<?php echo e(route('contact.index')); ?>">Contact</a>
                    </li>
                <?php else: ?>

                    <li class="nav-item dropdown <?php if(request()->path() == 'user/advertise/coin'|| request()->path() == 'user/advertise/history' ): ?>active <?php endif; ?>">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Advertise
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?php echo e(route('sell.coin')); ?>"> Create Advertise</a>
                            <a class="dropdown-item" href="<?php echo e(route('sell.buy.history')); ?>"> My Advertise History </a>
                        </div>
                    </li>



                    <li class="nav-item dropdown <?php if(request()->path() == 'user/deposits'|| request()->path() == 'user/transactions' ): ?>active <?php endif; ?>">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Transaction
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?php echo e(route('deposit.history')); ?>"> Deposit History</a>
                            <a class="dropdown-item" href="<?php echo e(route('trans.history')); ?>"> Transaction History </a>
                        </div>
                    </li>

                    <li class="nav-item dropdown <?php if(request()->path() == 'user/deposits'|| request()->path() == 'user/transactions' ): ?>active <?php endif; ?>">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Balance
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?php echo e(route('deposit')); ?>"> Balance and Deposit</a>
                            <a class="dropdown-item" href="<?php echo e(route('user.request_a_payment_list')); ?>"> Request a Payment</a>
                        </div>
                    </li>


                <?php endif; ?>
            </ul>

            <?php if(auth()->guard()->guest()): ?>
                <ul class="navbar-nav justify-content-end">
                    <li class="nav-item <?php if(request()->path() == 'register'): ?> active <?php endif; ?>">
                        <a class="nav-link" href="<?php echo e(url('register')); ?>"><i class="fa fa-check-square-o"></i> Register</a>
                    </li>

                    <li class="nav-item <?php if(request()->path() == 'login'): ?> active <?php endif; ?>">
                        <a class="nav-link" href="<?php echo e(url('login')); ?>"><i class="fa fa-user"></i> Login</a>
                    </li>
                </ul>

            <?php else: ?>

                <ul class="navbar-nav  justify-content-end">
                    <li class="nav-item dropdown <?php if(request()->path() == 'user/edit-profile' ||request()->path() == 'user/deposit-confirm' ||request()->path() == 'user/deposit'
                                         ||request()->path() == 'user/change-password' || request()->path() == 'user/home'|| request()->path() == 'user/support' || request()->path() == 'user/support/new'): ?> active <?php endif; ?>">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Hi, <?php echo e(Auth::user()->name); ?>

                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?php echo e(url('user/home')); ?>"> Dashboard </a>
                            <a class="dropdown-item" href="<?php echo e(route('deposit')); ?>"> Balance </a>
                            <a class="dropdown-item" href="<?php echo e(route('edit-profile')); ?>"> My Profile </a>
                            <a class="dropdown-item" href="<?php echo e(route('user.change-password')); ?>"> Change Password </a>
                            <a class="dropdown-item" href="<?php echo e(route('support.index.customer')); ?>"> Support Ticket </a>
                            <a class="dropdown-item" href="<?php echo e(route('user.auth_for_use')); ?>"> Authentication </a>
                            <a class="dropdown-item" href="<?php echo e(route('two.factor.index')); ?>"> Security </a>

                            <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                <?php echo e(csrf_field()); ?>

                            </form>

                        </div>
                    </li>
                    <?php $deal = \App\AdvertiseDeal::where('to_user_id', Auth::id())->where('status', 0) ?>
                    <?php $approval = \App\AdvertiseDeal::where('to_user_id', Auth::id())->where('status', 9) ?>

                    <li class="nav-item dropdown <?php if(request()->path() == ''|| request()->path() == '' ): ?> active <?php endif; ?>">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            <i class="fa fa-comments" aria-hidden="true"></i> <span
                                    class="badge badge-danger"><?php echo e($deal->count() + $approval->count()); ?></span>
                        </a>
                        <?php if($deal->count() > 0 || $approval->count() > 0): ?>
                            <div class="dropdown-menu">
                                <?php $__currentLoopData = $deal->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a class="dropdown-item"
                                       href="<?php echo e(route('noti.message', $data->trans_id)); ?>"><?php echo e($data->gateway->currency); ?> <?php echo e($data->add_type == 1 ? 'buy':'sell'); ?>

                                        request </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <?php $__currentLoopData = $approval->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a class="dropdown-item"
                                       href="<?php echo e(route('noti.message', $data->trans_id)); ?>"><?php echo e($data->gateway->currency); ?>

                                        Approval request </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>

                        <?php endif; ?>
                    </li>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</nav>


<div class="container">
    <br>

    <div id="justify-height">
        <?php echo $__env->yieldContent('body'); ?>
    </div>


</div>

<div id="back-to-top" class="scroll-top back-to-top active" data-original-title="" title="" style="display: none">
    <i class="fa fa-angle-up"></i>
</div>

<footer class="blog-footer">
    <div class="container">
        <div class="text-center">
            <a href="<?php echo e(url('/')); ?>"><img style="max-height: 60px; max-width: 160px;"
                                        src="<?php echo e(url('/')); ?>/assets/images/logo/logo.png" class="rounded" alt="logo"></a>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-4"><i class="fa fa-map-marker"></i> <?php echo e($general->address); ?></div>
            <div class="col-md-4"><i class="fa fa-phone"></i> <?php echo e($general->phone); ?></div>
            <div class="col-md-4"><i class="fa fa-envelope"></i> <?php echo e($general->email); ?></div>
        </div>
        <hr>
        <ul class="list-inline">
            <?php $__currentLoopData = $social; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="list-inline-item"><a class="social-icon text-xs-center" target="_blank"
                                                href="<?php echo e($data->link); ?>"><?php echo $data->code; ?></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <p>
            <a href="#"><?php echo e($general->copyright); ?></a>
            <a href="<?php echo e(route('terms.index')); ?>">Terms</a> & <a href="<?php echo e(route('policy.index')); ?>">Policy</a>
        </p>
    </div>
</footer>

<!--jquery script load-->
<script src="<?php echo e(url('/')); ?>/assets/front/js/jquery.js"></script>
<!--Bootstrap v3 script load here-->
<script src="<?php echo e(url('/')); ?>/assets/front/js/bootstrap.min.js"></script>

<script src="<?php echo e(asset('assets/admin/js/sweetalert.js')); ?>"></script>

<script src="<?php echo e(asset('assets/front/js/main.js')); ?>"></script>


<?php echo $__env->yieldContent('script'); ?>
<script type="text/javascript" src="<?php echo e(route('homepage').'/livechat/php/app.php?widget-init.js'); ?>">

</script>
<?php if(Session::has('alert')): ?>
    <script type="text/javascript">
        $(document).ready(function () {
            swal("<?php echo e(Session::get('alert')); ?>", "", "warning");
        });
    </script>
<?php endif; ?>

<?php if(Session::has('message')): ?>
    <script type="text/javascript">
        $(document).ready(function () {
            swal("<?php echo e(Session::get('message')); ?>", "", "success");
        });
    </script>
<?php endif; ?>

<?php if(Session::has('success')): ?>
    <script type="text/javascript">
        $(document).ready(function () {
            swal("<?php echo e(Session::get('success')); ?>", "", "success");
        });
    </script>
<?php endif; ?>
<script>
    $(document).ready(function () {
        var winheight = $(window).height() - 365;
        $('#justify-height').css('min-height', winheight + 'px');
    });
</script>

</body>
</html>
