<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/table.css')); ?>">
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
                    <div class="table-">
                        <div class="caption font-dark" >
                            <i class="icon-settings font-dark"></i>
                            <a href="#myModal" data-toggle="modal" class="btn btn-primary pull-right bold"><i class="fa fa-plus"></i> Add Currency</a>
                        </div>
                        <br>
                        <br>
                        <br>

                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">USD Rate</th>
                                <th scope="col">Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody id="products-list" name="products-list">
                            <?php $__currentLoopData = $crypto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($key+1); ?></td>
                                    <td><?php echo e($data->name); ?></td>
                                    <td><?php echo e($data->usd_rate); ?></td>
                                    <td>
                                        <?php if($data->status == 1): ?>
                                        <span class="badge badge-success">Active</span>
                                            <?php else: ?>
                                            <span class="badge badge-danger">Deactive</span>
                                        <?php endif; ?>
                                    </td>
                                    <td >
                                        <a href="<?php echo e(route('currency.edit', $data->id)); ?>"  class="btn btn-primary bold uppercase"><i class="fa fa-edit"></i> EDIT</a>
                                    </td>
                                </tr>

                                <!-- Modal for DELETE -->

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <div class="row">
                        <div class="col-md-12 text-center">
                            <?php echo e($crypto->links()); ?>

                        </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-horizontal" method="post" action="<?php echo e(route('currency.store')); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-share-square"></i> Create Currency</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">

                        <div class="form-group error">
                            <label for="inputName" class="col-sm-12 control-label bold uppercase"><strong>Name :</strong> </label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control has-error bold " id="name" name="name" placeholder="Crypto Name">
                            </div>
                        </div>
                        <div class="form-group error">
                            <label for="inputName" class="col-sm-12 control-label bold uppercase"><strong>USD Rate:</strong> </label>
                            <div class="col-sm-12">

                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text">1 USD = </span>
                                    </div>
                                    <input type="text" class="form-control has-error bold " name="usd_rate">
                                </div>

                            </div>
                        </div>



                    <div class="form-group error">
                            <label for="inputName" class="col-sm-12 control-label bold uppercase"><strong>Status</strong> </label>
                            <div class="col-sm-12">
                                <input data-toggle="toggle" data-onstyle="success" data-offstyle="danger"
                                       data-width="100%" type="checkbox" data-on="Active" data-off="Deactive"
                                       name="status">
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                    <button type="submit" class="btn btn-primary bold uppercase"><i class="fa fa-send"></i> Save Crypto</button>

                </div>
                </form>
            </div>
        </div>

    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>