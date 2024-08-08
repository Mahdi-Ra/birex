<?php $__env->startSection('style'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
    <div class="row padding-pranto-top padding-pranto-bottom">
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



            <div class="col-md-8">

                <div class="card">

                    <div class="card-header">
                        Advertisement <span>#<?php echo e($add->trans_id); ?></span>
                    </div>
                    <form id="uploadDetail" class="form-horizontal" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="card-body">
Dear user for sending any file you must be add a text.
                            <div class="form-group">
                                <strong><i class="fa fa-comment"></i> Send Message to <a style="color: blue" href="<?php echo e(route('user.profile.view', $add->to_user->username)); ?>"><?php echo e($add->to_user->username); ?> :</a></strong>
                                <textarea name="message"  class="form-control" id="message" rows="3"><?php echo old('detail'); ?></textarea>
                            </div>

                            <div class="form-group" id="pranto">
                                <input type="file" class="form-control" name="image">
                                <small class="col-md-12"><i class="fa fa-picture-o"></i> Attach document (PNG , JPG and JPEG files only, take a screenshot if necessary):</small>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="button" id="submit" class="btn btn-secondary">Send</button>
                        </div>
                    </form>

                </div>

                <br>
                <div class="card">

                    <div class="card-header">
                        <strong class="col-md-12">Messages </strong>
                    </div>

                    <div class="card-body">
                        <div id="oww" class="oww">
                            <?php $__currentLoopData = $add->conversation->reverse(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-12">
                                    <div class="alert alert-<?php echo e($data->type ==1? 'success':'info'); ?>">
                                        <strong><?php if($data->type == 1): ?>You <?php else: ?> <?php echo e($add->to_user->username); ?> <?php endif; ?> :</strong>
                                        <p><a href="<?php echo e(asset('assets/images/attach/'.$data->image)); ?>" download=""><?php if(isset($data->image)): ?> <img style="width: 180px" src="<?php echo e(asset('assets/images/attach/'.$data->image)); ?>"> <?php endif; ?></a></p>
                                        <p><?php echo $data->deal_detail; ?></p>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>

                </div>

            </div>

            <div class="col-md-4">
                <div class="alert alert-info">
                    <p>You are <?php echo e($add->add_type == 1 ? 'buying':'selling'); ?> 
                    <?php echo e($add->amount_to); ?> <?php echo e($add->gateway->currency); ?>

                            with 
                            
                    <?php echo e($add->amount_to * $pr); ?>

                    <?php echo e($add->currency->name); ?>

                    
                    <?php echo e($add->add_type == 2? 'from':'to'); ?> <?php echo e($add->to_user->name); ?> .</p><br>
                    <p>Transaction status: <?php if($add->status == 0): ?>
                            <span class="badge badge-warning"> Processing </span>
                        <?php elseif($add->status == 1): ?>
                            <span class="badge badge-success"> Paid Complete </span>
                        <?php elseif($add->status == 9): ?>
                            <span class="badge badge-info"> Paid Approval </span>
                        <?php else: ?>
                            <span class="badge badge-danger"> Canceled </span>
                        <?php endif; ?></p>


                    <div class="row">
                        <div class="col-md-12">

                            <div id="accordion">
                                <div class="card">
                                    <div class="card-header" style="padding: 10px" id="headingOne">
                                        <h5 class="mb-0" >
                                            <button class="btn btn-primary" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                Terms of trade with <?php echo e($add->to_user->name); ?>

                                            </button>
                                        </h5>
                                    </div>

                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            <?php echo $add->term_detail; ?>

                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header" style="padding: 10px" id="headingTwo">
                                        <h5 class="mb-0">
                                            <button class="btn btn-primary collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                Payment Detail with <?php echo e($add->to_user->name); ?>

                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                        <div class="card-body">
                                            <?php echo $add->payment_detail; ?>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                <?php if($add->status == 0): ?>
                    <div class="alert alert-success text-center">
                        <strong>Make Sure You Paid, Then Click Butoon "I Have Paid Money"</strong>
                        <br>
                        <br>
                        <button type="button" data-toggle="modal" data-target="#paidModal" class="btn btn-success btn-block" >I Have Paid Money </button>
                    </div>
                <?php endif; ?>

                <?php if($add->status == 0): ?>
                    <div class="alert alert-danger text-center">
                        <strong>If you do not want to make any deal with <?php echo e($add->to_user->name); ?>, then click "Cencel Request".</strong>
                        <br>
                        <br>
                        <p><button type="button" data-toggle="modal" data-target="#cancelModal" class="btn btn-danger btn-block" >Cancel Request</button></p><br>
                    </div>
                <?php else: ?>
                    <div class="alert alert-danger text-center">
                        <strong>If you do not want to make any deal with <?php echo e($add->to_user->name); ?>, then click "Cencel Request".</strong>
                        <br>
                        <br>
                        <p><button disabled="" type="button" data-toggle="modal" class="btn btn-danger btn-block" >Cancel Request</button></p><br>
                    </div>
                <?php endif; ?>
            </div>



    </div>


    <div id="paidModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Confirm Paid<strong> from <?php echo e($add->to_user->name); ?> ?</strong></h4>
                </div>

                <form method="post" action="<?php echo e(route('confirm.paid.reverse')); ?>">
                    <?php echo csrf_field(); ?>


                    <div class="modal-footer">
                        <button type="submit" name="status" value="<?php echo e($add->id); ?>" class="btn btn-primary pull-right">I Have Paid Money</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                    
                </form>
            </div>

        </div>
    </div>


    <div id="cancelModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" style="color: red">Confirm Cancel Request</h4>
                </div>

                <form method="post" action="<?php echo e(route('confirm.cancel.reverse')); ?>">
                    <?php echo csrf_field(); ?>
                    
                    <?php if($add->status == 0): ?>
                    <div class="modal-footer">
                        <button type="submit" name="status" value="<?php echo e($add->id); ?>" class="btn btn-primary pull-right">Confirm Cancel</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                    <?php else: ?>
                    <div class="modal-footer">
                        <button disabled="" type="submit" name="status"  class="btn btn-primary pull-right">Confirm Cancel</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                    <?php endif; ?>
                    
                    
                    
                </form>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>

        $(window).ready( function() {
            setInterval( function() {
                $("#oww").load(location.href + " #oww");
            }, 500 );
        });

        $(document).ready(function () {

            $('#submit').click(function (e) {

                var preLoader = $("#preloader").css('display','block');
                preLoader.fadeOut(600);

                e.preventDefault();
                var id = "<?php echo e($add->id); ?>";
                var message = $('#message').val();

                if (message == ''){
                    alert('message field is required');
                }
                var profileForm = $('#uploadDetail')[0];
                var formData = new FormData(profileForm);

                formData.append('id', id);
                formData.append('message', message);
                formData.append('_token', "<?php echo e(csrf_token()); ?>");


                $.ajax({
                    type : "POST",
                    url : "<?php echo e(route('send.message.deal')); ?>",
                    data : formData,
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success:function (data) {

                        $("#pranto").load(location.href + " #pranto");
                        $('#message').val(' ');
                    }
                })

                setTimeout(function () {
                    $("#oww").load(location.href + " #oww");
                }, 3000)
            });

        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>