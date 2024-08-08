
<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <form class="form-horizontal" action="<?php echo e(route('menu-update',$menu->id)); ?>" method="post"
                          role="form">

                        <?php echo csrf_field(); ?>

                        <div class="form-body">

                            <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                                <label class="col-md-12"><strong style="text-transform: uppercase;">Menu
                                        Name</strong></label>
                                <div class="col-md-12">
                                    <input class="form-control input-lg" value="<?php echo e($menu->name); ?>" name="name"
                                           placeholder="" type="text" required>
                                    <?php if($errors->has('name')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('name')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12"><strong
                                            style="text-transform: uppercase;">CONTENT</strong></label>
                                <div class="col-md-12">
                                    <textarea id="area1" class="form-control" rows="15"
                                              name="description"><?php echo e($menu->description); ?></textarea>
                                </div>
                            </div>
                            <br>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-block btn-lg"><i class="fa fa-send"></i>
                                    UPDATE MENU
                                </button>
                            </div>


                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>




<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>

    <script type="text/javascript">
        bkLib.onDomLoaded(function () {
            new nicEditor({fullPanel: true}).panelInstance('area1');
        });
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>