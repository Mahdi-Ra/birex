<?php $__env->startSection('css'); ?>
<style>
    fieldset
    {
        border: 1px solid #ddd !important;
        margin: 0;
        xmin-width: 0;
        padding: 10px;
        position: relative;
        border-radius:4px;
        background-color:#f5f5f5;
        padding-left:10px!important;
    }

    legend
    {
        font-size:14px;
        font-weight:bold;
        margin-bottom: 0px;
        width: 35%;
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 5px 5px 5px 10px;
        background-color: #ffffff;
    }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
    <div class="row">
                <div class="col-md-12">

                    <div class="tile">
                        <div class="tile-body">

                            <h3 class="tile-title">#<?php echo e($ticket_object->ticket); ?> - <?php echo e($ticket_object->subject); ?></h3>

                            <div class="tools" style="margin-bottom: 10px;">
                                <?php if($ticket_object->status == 1): ?>
                                    <button class="btn btn-warning"> Opened</button>
                                <?php elseif($ticket_object->status == 2): ?>
                                    <button type="button" class="btn btn-success">  Answered </button>
                                <?php elseif($ticket_object->status == 3): ?>
                                    <button type="button" class="btn btn-info"> Customer Reply </button>
                                <?php elseif($ticket_object->status == 9): ?>
                                    <button type="button" class="btn btn-danger">  Closed </button>
                                <?php endif; ?>

                            </div>
                        </div>

                        <div class="tile">
                            <div class="tile-body">

                            <form method="POST" action="<?php echo e(route('store.admin.reply', $ticket_object->ticket)); ?>" accept-charset="UTF-8" class="form-horizontal form-bordered">
                                <?php echo e(csrf_field()); ?>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <?php $__currentLoopData = $ticket_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="panel-body">
                                            <fieldset class="col-md-12">
                                                <?php if($data->type == 1): ?>
                                                    <legend><span style="color: #0e76a8"><?php echo e($ticket_object->user_member->username); ?></span> , <small><?php echo e(\Carbon\Carbon::parse($data->updated_at)->format('F dS, Y - h:i A')); ?></small></legend>
                                                 <?php else: ?>
                                                    <legend><span style="color: #0e76a8"><?php echo e(Auth::guard('admin')->user()->name); ?></span> , <small><?php echo e(\Carbon\Carbon::parse($data->updated_at)->format('F dS, Y - h:i A')); ?></small></legend>
                                                <?php endif; ?>
                                                <div class="panel panel-danger">
                                                    <div class="panel-body">
                                                        <p><?php echo $data->comment; ?></p>
                                                    </div>
                                                </div>

                                            </fieldset>

                                            <div class="clearfix"></div>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                                    <div class="form-group">
                                        <label class="col-md-12 bold">Reply: </label>
                                        <div class="col-md-12">
                                            <textarea id="area1" class="form-control" name="comment" rows="10"></textarea>
                                        </div>
                                    </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn purple col-md-12"><i class="fa fa-check"></i> Post</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            </div>

                        </div>
                    </div>
            </div>
            <!-- END PAGE CONTENT-->
        </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>

    <script type="text/javascript">
        bkLib.onDomLoaded(function() { new nicEditor({fullPanel : true}).panelInstance('area1'); });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>