<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="<?php echo e(asset('assets/images/logo/favicon.png')); ?>" />
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/admin/css/main.css')); ?>">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/admin/css/font-awesome.min.css')); ?>">
    <title><?php echo e($page_title); ?> | <?php echo e($basic->sitename); ?></title>
    <style>
        #error{
            color: red;
        }
        .error
        {
            color: red;
        }
        .abir{
            display: fixed;
            z-index: 299;
            position: absolute;
            /*width: 85%;*/
            color: #FFF;
            background-color: #26a1ab;
            border-color: #26a1ab;
        }
        .slow-spin {
            -webkit-animation: fa-spin 2s infinite linear;
            animation: fa-spin 2s infinite linear;
        }
    </style>
</head>
<body>
<section class="material-half-bg">
    <div class="cover"></div>
</section>
<section class="login-content">
    <div class="logo">
        <h1><?php echo e($basic->sitename); ?></h1>
    </div>
    <div class="login-box">
        <form class="login-form" id="login-form" action="" method="post">
            <?php echo e(csrf_field()); ?>

            <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
            <div class="form-group">
                <label class="control-label">USERNAME</label>
                <input class="form-control" name="username" type="text" placeholder="Username" autofocus>
            </div>
            <div class="form-group">
                <label class="control-label">PASSWORD</label>
                <input class="form-control" name="password" type="password" placeholder="Password">
            </div>


            <div class="form-group btn-container" id="working">
                <button class="btn btn-primary btn-block" ><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>

            </div>
            <br>



                <div id="error"></div>

        </form>

    </div>
</section>
<!-- Essential javascripts for application to work-->
<script src="<?php echo e(asset('assets/admin/js/jquery-3.2.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/js/popper.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/js/jquery.validate.min.js')); ?>" type="text/javascript"></script>

<script src="<?php echo e(asset('assets/admin/js/main.js')); ?>"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="<?php echo e(asset('assets/admin/js/pace.min.js')); ?>"></script>


<script>
    $('document').ready(function(){
        /* validation */
        $("#login-form").validate({
            rules:
                {
                    password: {
                        required: true,
                    },
                    username: {
                        required: true,
                    },
                },
            messages:
                {
                    password: "<span style='color: red'>Password is required.</span>",
                    username: "<span style='color: red'>Username is required.</span>",
                },
            submitHandler: submitForm
        });
        /* validation */

        /* login submit */
        function submitForm(){
            var data = $("#login-form").serialize();

            $.ajax({

                type : 'POST',
                url  : "<?php echo e(route('admin.login')); ?>",
                data : data,
                beforeSend: function()
                {
                    $("#error").fadeOut();
                    $("#working").html('<button class="btn btn-primary btn-block" ><strong class="block" style="font-weight: bold;">  <i class = "fa fa-spinner slow-spin"></i>  Validating Your Data.... </strong></button>');
                },
                success :  function(response)
                {

                    if(response=="ok"){

                        $("#working").html('<button class="btn btn-primary btn-block"> <i class="fa fa-check"></i> Success! Waiting to Dashboard...</button>');
                        setTimeout(' window.location.href = "<?php echo e(route('admin.dashboard')); ?>"; ',3000);
                    }
                    else{

                        $("#error").fadeIn(1000, function(){
                            $("#error").html('<div class="alert alert-dismissible alert-danger"><button class="close" type="button" data-dismiss="alert">×</button>'+response+'</div>');
                            $("#working").html('<button class="btn btn-primary btn-block" id="working"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>');
                        });
                    }
                },
                error :  function(response)
                {
                    $("#error").fadeIn(1000, function(){
                        $("#error").html('<div class="alert alert-dismissible alert-danger"><button class="close" type="button" data-dismiss="alert">×</button>'+response+'</div>');
                        $("#working").html('');
                    });

                }

            });
            return false;
        }
        /* login submit */
    });
</script>
</body>
</html>