
<?php $__env->startSection('css'); ?>

    <style>
        button#btn_add {
            margin-bottom: 10px;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <form class="form-horizontal" method="post" action="<?php echo e(route('currency.update', $crypto->id)); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo e(method_field('put')); ?>



                            <div class="form-group error">
                                <label for="inputName" class="col-sm-12 control-label bold uppercase"><strong>Name :</strong> </label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control has-error bold" id="name" name="name" value="<?php echo e($crypto->name); ?>" placeholder="Crypto Name">
                                </div>
                            </div>
                        <div class="form-group error">
                            <label for="inputName" class="col-sm-12 control-label bold uppercase"><strong>USD Rate:</strong> </label>
                            <div class="col-sm-12">

                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text">1 USD = </span>
                                    </div>
                                    <input type="text" class="form-control has-error bold" value="<?php echo e($crypto->usd_rate); ?>" name="usd_rate">
                                </div>

                            </div>
                        </div>

                            <div class="form-group error">
                                <label for="inputName" class="col-sm-12 control-label bold uppercase"><strong>Status</strong> </label>
                                <div class="col-sm-12">
                                    <input data-toggle="toggle" data-onstyle="success" data-offstyle="danger"
                                           data-width="100%" type="checkbox" <?php echo e($crypto->status ==1? 'checked': ''); ?> data-on="Active" data-off="Deactive"
                                           name="status">
                                </div>
                            </div>



                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary bold uppercase btn-block"><i class="fa fa-send"></i> Update Crypto</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>