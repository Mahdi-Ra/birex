<?php $__env->startSection('body'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title "><?php echo e($page_title); ?></h3>
                <div class="tile-body">
                    <form role="form" method="POST" action="">
                        <?php echo e(csrf_field()); ?>

                        <div class="row">
                            <div class="col-md-4">
                                <h6>Website Title</h6>
                                <div class="input-group">
                                    <input type="text" class="form-control input-lg" value="<?php echo e($general->sitename); ?>"
                                           name="sitename">
                                    <div class="input-group-append"><span class="input-group-text">
                                            <i class="fa fa-file-text-o"></i>
                                            </span>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-4">
                                <h6>BASE COLOR CODE</h6>
                                <div class="from-group">
                                    <input type="color" style="height: 35px; width: 100%;" value="#<?php echo e($general->color); ?>" name="color">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h6>Decimal After Point</h6>
                                <div class="input-group">
                                    <input type="text" class="form-control input-lg" value="<?php echo e($general->decimal); ?>"
                                           name="decimal">
                                    <div class="input-group-append"><span class="input-group-text">
                                            Decimal
                                            </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <hr/>
                            <div class="col-md-4">
                                <h6>Transection Charge</h6>
                                <div class="input-group">
                                    <input type="text" class="form-control input-lg" value="<?php echo e($general->trx_charge); ?>"
                                           name="trx_charge">
                                    <div class="input-group-append"><span class="input-group-text">
                                            %
                                            </span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <h6>EMAIL VERIFICATION</h6>
                                <input data-toggle="toggle" data-onstyle="success" data-offstyle="danger"
                                       data-width="100%" type="checkbox"
                                       name="email_verification" <?php echo e($general->email_verification == "1" ? 'checked' : ''); ?>>
                            </div>
                            <div class="col-md-4">
                                <h6>SMS VERIFICATION</h6>
                                <input data-toggle="toggle" data-onstyle="success" data-offstyle="danger"
                                       data-width="100%" type="checkbox"
                                       name="sms_verification" <?php echo e($general->sms_verification == "1" ? 'checked' : ''); ?>>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <hr/>
                            <div class="col-md-4">
                                <h6>Registration</h6>
                                <input data-toggle="toggle" data-onstyle="success" data-offstyle="danger"
                                       data-width="100%" type="checkbox"
                                       name="registration" <?php echo e($general->registration == "1" ? 'checked' : ''); ?>>
                            </div>
                            <div class="col-md-4">
                                <h6>EMAIL NOTIFICATION</h6>
                                <input data-toggle="toggle" data-onstyle="success" data-offstyle="danger"
                                       data-width="100%" type="checkbox"
                                       name="email_notification" <?php echo e($general->email_notification == "1" ? 'checked' : ''); ?>>
                            </div>
                            <div class="col-md-4">
                                <h6>SMS NOTIFICATION</h6>
                                <input data-toggle="toggle" data-onstyle="success" data-offstyle="danger"
                                       data-width="100%" type="checkbox"
                                       name="sms_notification" <?php echo e($general->sms_notification == "1" ? 'checked' : ''); ?>>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <h6>Google Map</h6>
                                <div class="input-group">
                                    <input type="text" class="form-control input-lg" value="<?php echo e($general->google_map); ?>"
                                           name="google_map">
                                    <div class="input-group-append"><span class="input-group-text">
                                            <i class="fa fa-globe"></i>
                                            </span>
                                    </div>
                                </div>

                            </div>


                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <h6>Header Title</h6>
                                <div class="form-group">
                                    <input type="text" class="form-control input-lg" value="<?php echo e($general->banner_title); ?>" name="banner_title">
                                </div>

                            </div>

                            <div class="col-md-12">
                                <h6>Header Sub-Title</h6>
                                <div class="form-group">
                                    <input type="text" class="form-control input-lg" value="<?php echo e($general->banner_sub_title); ?>" name="banner_sub_title">
                                </div>

                            </div>


                        </div>
                        <br>
                        <div class="row">
                            <hr/>
                            <div class="col-md-12 ">
                                <button class="btn btn-primary btn-block btn-lg">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>