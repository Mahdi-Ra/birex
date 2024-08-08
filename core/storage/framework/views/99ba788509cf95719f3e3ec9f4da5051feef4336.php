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


                    <div class="form-group error">
                        <div class="col-md-12">

                            <div class="card">

                                <div class="card-header">

                                </div>
                                <form id="uploadDetail" class="form-horizontal" method="post"
                                      enctype="multipart/form-data">

                                    <?php echo csrf_field(); ?>

                                    <div class="card-body">
                                        <div class="form-group">
                                            <strong><i class="fa fa-comment"></i> Send Message to User
                                            </strong>
                                            <textarea name="message" class="form-control" id="message"
                                                      rows="3"></textarea>
                                        </div>

                                        <div class="form-group" id="pranto">
                                            <input type="file" class="form-control" name="image">
                                            <small class="col-md-12"><i class="fa fa-picture-o"></i> Attach document
                                                (PNG ,
                                                JPG and JPEG files only, take a screenshot if necessary):
                                            </small>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" id="submit" class="btn btn-secondary">Send</button>
                                    </div>
                                </form>

                            </div>

                            <br>

                            <div class="card">

                                <div class="card-header">
                                    <strong class="col-md-12">Messages:</strong>
                                </div>

                                <div class="card-body">
                                    <div id="oww" class="oww">
                                        <div id="oww" class="oww">

                                            <?php $__currentLoopData = $complaints; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <div class="col-md-12">
                                                    <div class="alert alert-info">
                                                        <strong> <?php if($data->from_ == 0): ?>
                                                                You <?php else: ?> User <?php endif; ?></strong>
                                                        <p><a href="http://bircoin.me/assets/images/attach/"
                                                              download=""></a>
                                                        </p>
                                                        <p>
                                                            <?php echo e($data->message); ?>

                                                        </p>
                                                        <?php if(!is_null($data->img)): ?>
                                                            <img width="400" height="350"
                                                                 src="https://bircoin.co/assets/images/attach/<?php echo e($data->img); ?>">
                                                        <?php endif; ?>
                                                    </div>
                                                </div>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div></div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>