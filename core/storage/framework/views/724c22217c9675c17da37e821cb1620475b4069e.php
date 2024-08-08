

<?php $__env->startSection('body'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <form class="form-horizontal" role="form" action="<?php echo e(url('admin/profile')); ?>" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="id" value="<?php echo e($admin->id); ?>">
                        <div class="form-body">
                            <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                                <label class="col-md-2 offset-1 control-label"><b>Name</b></label>
                                <div class="col-md-9 offset-1">
                                    <div class="input-group">
                                        <input type="text" name="name" value="<?php echo e($admin->name); ?>" class="form-control input-lg"
                                               placeholder="Your Name">
                                        <div class="input-group-append"><span class="input-group-text"><i class="fa fa-user"></i></span></div>
                                    </div>
                                    <?php if($errors->has('name')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('name')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group <?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                <label class="col-md-2 offset-1 control-label"><b>Email</b></label>
                                <div class="col-md-9 offset-1">
                                    <div class="input-group">
                                        <input type="email" name="email" value="<?php echo e($admin->email); ?>" class="form-control input-lg"
                                               placeholder="Your Email">
                                        <div class="input-group-append"><span class="input-group-text"><i class="fa fa-envelope"></i></span></div>
                                    </div>
                                    <?php if($errors->has('email')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('email')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('mobile') ? ' has-error' : ''); ?>">
                                <label class="col-md-2 offset-1 control-label"><b>Mobile</b></label>
                                <div class="col-md-9 offset-1">
                                    <div class="input-group">
                                        <input type="text" name="mobile" value="<?php echo e($admin->mobile); ?>" class="form-control input-lg"
                                               placeholder="Your Mobile">
                                        <div class="input-group-append"><span class="input-group-text"><i class="fa fa-phone"></i></span></div>
                                    </div>
                                    <?php if($errors->has('mobile')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('mobile')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 offset-1 control-label"><b>Profile</b></label>
                                <div class="col-md-9 offset-1">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <?php if($admin->image == null): ?>
                                            <div class="fileinput-new thumbnail" style="width: 215px; height: 215px;" data-trigger="fileinput">
                                                <img style="width: 215px" src="<?php echo e(asset('assets/images/user/user-default.jpg')); ?>/" alt="...">
                                            </div>
                                        <?php else: ?>
                                            <div class="fileinput-new thumbnail" style="width: 215px; height: 215px;" data-trigger="fileinput">
                                                <img style="width: 215px" src="<?php echo e(asset('assets/admin/img')); ?>/<?php echo e($admin->image); ?>" alt="...">
                                            </div>
                                        <?php endif; ?>

                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 215px; max-height: 215px"></div>
                                        <div>
                                                <span class="btn btn-info btn-file">
                                                    <span class="fileinput-new bold uppercase"><i class="fa fa-file-image-o"></i> Select image</span>
                                                    <span class="fileinput-exists bold uppercase"><i class="fa fa-edit"></i> Change</span>
                                                    <input type="file" name="image" accept="image/*">
                                                </span>
                                            <a href="#" class="btn btn-danger fileinput-exists bold uppercase" data-dismiss="fileinput"><i class="fa fa-trash"></i> Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                             <div class="col-md-offset-2 col-md-9 offset-1">
                                    <button type="submit" class="btn  btn-block btn-primary btn-lg">Submit</button>
                                </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>