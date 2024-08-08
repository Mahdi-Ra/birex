<?php $__env->startSection('body'); ?>
    <div class="row padding-pranto-top">
        <?php $__currentLoopData = $user_address; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-3 text-center margin-top-pranto">
                <div class="card border-dark">
                    <div class="card-header"><?php echo e($gate->gateway->name); ?> Balance :</div>
                    <div class="card-body text-dark">
                        <h6 class="card-title">
                            <?php if($gate->balance == 0): ?>
                            0.0000 <?php echo e($gate->gateway->currency); ?> 
                            <?php else: ?> 
                            <?php echo e(sprintf("%.8f", floor((float)$gate->balance  * pow(10, 8)) / pow(10, 8)), round((float)$gate->balance , 8)); ?> 
                            <?php echo e($gate->gateway->currency); ?>

                            <?php endif; ?></h6>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

   <div class="row padding-pranto-top">
       <?php if(count($errors) > 0): ?>
           <div class="col-md-12">
               <div class="alert alert-danger alert-dismissible">
                   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                   <strong class="col-md-12"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Alert!</strong>
                   <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <li><?php echo e($error); ?></li>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </div>
           </div>
       <?php endif; ?>

       <?php $__currentLoopData = $gates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <div class="col-md-3 text-center margin-top-pranto padding-pranto-bottom">
               <div class="card">
                   <h5 class="card-header"><?php echo e($gate->name); ?></h5>
                   <div class="card-body">
                       <img src="<?php echo e(asset('assets/images/gateway')); ?>/<?php echo e($gate->id); ?>.jpg" style="width:100%">
                   </div>
                   <div class="card-footer">
                       <a class="btn btn-primary btn-block" style="color: white" data-toggle="modal" data-target="#depositModal<?php echo e($gate->id); ?>" >Deposit Now</a>
                   </div>
               </div>
           </div>

           <div id="depositModal<?php echo e($gate->id); ?>" class="modal fade" role="dialog">
               <div class="modal-dialog">

                   <div class="modal-content">
                       <div class="modal-header">

                           <h4 class="modal-title">Deposit via <strong><?php echo e($gate->name); ?></strong></h4>
                       </div>

                       <form method="post" action="<?php echo e(route('deposit.confirm')); ?>">

                           <div class="modal-body">
                               <?php echo e(csrf_field()); ?>


                               <input type="hidden" name="gateway" value="<?php echo e($gate->id); ?>">

                            
                               <div class="form-group">
                                   <div class="input-group">
                                       <input type="text" name="amount" class="form-control input-lg" id="amount"
                                              placeholder=" Enter Amount" required>
                                       <div class="input-group-prepend">
                                           <div class="input-group-text"><?php echo e($gate->currency); ?></div>
                                       </div>
                                   </div>


                               </div>
                           </div>
                           <div class="modal-footer">
                               <button type="button" class="btn btn-default " data-dismiss="modal">Close
                               </button>
                               <button type="submit" class="btn btn-primary pull-right">Submit</button>
                           </div>
                       </form>
                   </div>

               </div>
           </div>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

   </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<script>
    (function($){
        $(window).on('resize',function(){
            var bodyHeight = $(window).height();
            $('#min-height-deposit').css('min-height',parseInt(bodyHeight) - 650);
            console.log(bodyHeight)
        });
        var bodyHeight = $(window).height();
        $('#min-height-deposit').css('min-height',parseInt(bodyHeight) - 650);
        console.log(bodyHeight)


    }(jQuery))

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>