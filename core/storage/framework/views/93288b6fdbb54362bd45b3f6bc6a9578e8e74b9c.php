<?php $__env->startSection('body'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title "><?php echo e($page_title); ?></h3>
                <div class="tile-body">
                    <form role="form" method="POST" action="<?php echo e(route('terms.policy.update')); ?>">
                        <?php echo e(csrf_field()); ?>

                        <div class="row">
                            <div class="col-md-12">
                                <h6>Terms</h6>
                                <div class="form-group">
                                    <textarea id="area1" class="form-control" rows="10" name="terms"><?php echo $general->terms; ?></textarea>
                                </div>

                            </div>

                            <div class="col-md-12">
                                <h6>Policy</h6>
                                <div class="form-group">
                                    <textarea id="area2" class="form-control" rows="10" name="policy"><?php echo $general->policy; ?></textarea>
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
    <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>

    <script type="text/javascript">
        bkLib.onDomLoaded(function() { new nicEditor({fullPanel : true}).panelInstance('area1'); });
    </script>
    <script type="text/javascript">
        bkLib.onDomLoaded(function() { new nicEditor({fullPanel : true}).panelInstance('area2'); });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>