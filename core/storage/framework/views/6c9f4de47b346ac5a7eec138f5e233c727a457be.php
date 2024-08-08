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

                    <div class="col-md-12">

                        <div class="card">



                            <div class="card-header">

                            </div>
                            <form method="post" id="uploadDetail" class="form-horizontal">
                                <?php echo csrf_field(); ?>
                                <div class="card-body">
                                    <strong><i class="fa fa-hoyu"></i><?php echo e($title); ?></strong>
                                    <br>
                                    <br>
                                    
                                    <div class="form-group col-md-8">
                                        <strong><i class="fa fa-hoyu"></i> Please Enter Name </strong>
                                        <input  name="name" class="form-control" type="text" required>
                                    </div>


                                    <div class="form-group col-md-8">
                                        <strong><i class="fa fa-add"></i> Please Enter Email </strong>
                                        <input name="email" class="form-control" type="text" required>
                                    </div>
                                    
                                    
                                    <div class="form-group col-md-8">
                                        <strong><i class="fa fa-add"></i> Please Enter Phone </strong>
                                        <input name="phone" class="form-control" type="text" required>
                                    </div>
                                    
                                    
                                    <div class="form-group col-md-8">
                                        <strong><i class="fa fa-add"></i> Please Enter Amount </strong>
                                        <input name="amount" class="form-control" type="text" required>
                                    </div>
                                    
                                    
                                    <div class="form-group col-md-8">
                                        <input id="checkbox" name="checkbox" type="checkbox">
                                        <strong><i class="fa fa-add"></i> Please check to send the request</strong>
                                    </div>

                                </div>
                                <div class="card-footer">
                                    <button id="b" type="submit" class="btn btn-secondary" disabled>Send</button>
                                </div>
                            </form>

                        </div>


                    </div>
                </div>

            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
  <script>
     
        $('#checkbox').change(function () {
            if ($('#checkbox').is(':checked')) {

                $('#b').prop('disabled', false);
            } else {
                $('#b').prop('disabled', true);
            }
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>