<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo e($basic->sitename); ?> | <?php echo e($page_title); ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="<?php echo e(asset('assets/images/logo/favicon.png')); ?>" />
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/admin/css/main.css')); ?>">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/admin/css/font-awesome.min.css')); ?>">
    <link href="<?php echo e(asset('assets/admin/css/bootstrap-toggle.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/admin/css/bootstrap-fileinput.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/admin/css/toastr.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('assets/admin/css/table.css')); ?>" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/admin/css/custom.css')); ?>">

    <script src="<?php echo e(asset('assets/admin/js/sweetalert.js')); ?>"></script>
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/sweetalert.css')); ?>">
    
    
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="<?php echo e(asset('assets/admin/js/jquery-3.2.1.min.js')); ?>"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
    $( function() {
    $( "#aaa" ).datepicker();
    } );
    </script>
  <script>
    $( function() {
    $( "#aa" ).datepicker();
    } );
    </script>  
    
    <?php echo $__env->yieldContent('css'); ?>
</head>
<body class="app sidebar-mini rtl">
<!-- Navbar-->
<header class="app-header"><a class="app-header__logo" href="<?php echo e(url('/')); ?>"><?php echo e($basic->sitename); ?></a>
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">
        <!-- User Menu-->
          <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><?php echo e(Auth::guard('admin')->user()->username); ?> <i class="fa fa-chevron-down" aria-hidden="true"></i></a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
                <li><a class="dropdown-item" href="<?php echo e(route('admin.changePass')); ?>"><i class="fa fa-cog fa-lg"></i> Password Settings</a></li>
                <li><a class="dropdown-item" href="<?php echo e(route('admin.profile')); ?>"><i class="fa fa-user fa-lg"></i> Profile</a></li>
                <li><a class="dropdown-item" href="<?php echo e(route('admin.logout')); ?>"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
            </ul>
        </li>
    </ul>
</header>
<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <?php echo $__env->make('admin.layout.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-hand-o-right"></i> <?php echo e($page_title); ?></h1>
        </div>
    </div>
    <?php echo $__env->yieldContent('body'); ?>



</main>
<!-- Essential javascripts for application to work-->
<script src="<?php echo e(asset('assets/admin/js/popper.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/js/bootstrap-toggle.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/js/bootstrap-fileinput.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/admin/js/main.js')); ?>"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="<?php echo e(asset('assets/admin/js/pace.min.js')); ?>"></script>
<!-- Page specific javascripts-->
<?php echo $__env->yieldContent('script'); ?>
<?php if(Session::has('message')): ?>
    <script type="text/javascript">
        $(document).ready(function () {
            swal("<?php echo e(Session::get('message')); ?>","", "success");
        });
    </script>
<?php endif; ?>

<?php if(Session::has('success')): ?>
    <script type="text/javascript">
        $(document).ready(function () {
            swal("<?php echo e(Session::get('success')); ?>","", "success");
        });
    </script>
<?php endif; ?>

<?php if(Session::has('alert')): ?>
    <script type="text/javascript">
        $(document).ready(function () {
            swal("<?php echo e(Session::get('alert')); ?>","", "warning");
        });
    </script>
<?php endif; ?>
</body>
</html>