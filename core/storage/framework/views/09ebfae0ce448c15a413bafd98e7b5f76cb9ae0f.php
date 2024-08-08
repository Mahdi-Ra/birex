<?php $__env->startSection('style'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
   <div class="row padding-pranto-top padding-pranto-bottom">
       <?php if(Auth::user()->status != '1'): ?>
       <div class="col-md-12">
           <h3 style="color: #cc0000; text-align:center" >Your account is Deactivated</h3>
       </div>

       <?php elseif(Auth::user()->email_verify != '1'): ?>

           <div class="col-md-6">
               <div class="card">
                   <form action="<?php echo e(route('sendemailver')); ?>" method="POST">
                       <?php echo csrf_field(); ?>
                   <div class="card-body">
                       <div class="form-group">
                            <input type="email" class="form-control" readonly value="<?php echo e(Auth::user()->email); ?>" >
                       </div>
                   </div>
                   <div class="card-footer">
                       <button type="submit" class="btn btn-primary btn-block">Send Verification Code</button>
                   </div>
                   </form>
               </div>
           </div>
           <div class="col-md-6 margin-top-pranto">
               <div class="card">
                   <form action="<?php echo e(route('emailverify')); ?>" method="post">
                       <?php echo csrf_field(); ?>
                   <div class="card-body">
                       <div class="form-group">
                           <input type="text" class="form-control" name="code" placeholder="Enter Verification Code" required >
                       </div>
                   </div>
                   <div class="card-footer">
                       <button type="submit" class="btn btn-primary btn-block">Verify</button>
                   </div>
                    </form>
                </div>
           </div>


       <?php elseif(Auth::user()->phone_verify != '1'): ?>

           <div class="col-md-6">

               <div class="card">
                   <form action="<?php echo e(route('sendsmsver')); ?>" method="POST">
                       <?php echo csrf_field(); ?>
                   <div class="card-body">
                       <div class="form-group">
                           <input type="text" readonly class="form-control" value="<?php echo e(Auth::user()->phone); ?>" >
                       </div>

                   </div>

                   <div class="card-footer">
                       <button type="submit" class="btn btn-primary btn-block">Send Verification Code</button>
                   </div>
                   </form>
               </div>
           </div>
           <div class="col-md-6 margin-top-pranto">
               <div class="card">
                   <form action="<?php echo e(route('smsverify')); ?>" method="POST">
                       <?php echo csrf_field(); ?>
                       <div class="card-body">
                           <div class="form-group">
                               <input class="form-control" type="text" name="code" placeholder="Enter Verification Code" required >
                           </div>

                       </div>

                       <div class="card-footer">
                           <button type="submit" class="btn btn-primary btn-block">Verify</button>
                       </div>
                   </form>
               </div>
           </div>

       <?php elseif(Auth::user()->tfver != '1'): ?>

           <div class="col-md-8 offset-md-2">
              <div class="jumbotron">
                  <div class="card">
                      <form action="<?php echo e(route('go2fa.verify')); ?>" method="POST">
                          <?php echo csrf_field(); ?>
                          <div class="card-body">
                              <div class="form-group">
                                  <input type="number" class="form-control" name="code" required placeholder="Enter Google Authenticator Code">
                              </div>
                          </div>
                          <div class="card-footer">
                              <button type="submit" class="btn btn-primary btn-block">Verify</button>
                          </div>

                      </form>
                  </div>
              </div>
           </div>
       <?php endif; ?>

   </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>