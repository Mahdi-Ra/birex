<?php $__env->startSection('body'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-title">
                    <div class="pull-right">
                        <a href="<?php echo e(route('menu-create')); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Create New Menu</a>
                    </div>
                </div>
                <br><br>

                <div class="tile-body">
                    <div class="row">
                        <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-6">
                                <div class="text-center"><b><?php echo e($m->name); ?></b></div>
                                <br>
                                <p class="text-center">
                                    <?php echo $m->description; ?>

                                </p>
                                <div class="col-md-12">
                                    <a href="<?php echo e(route('menu-edit',$m->id)); ?>" class="btn btn-info"><i class="fa fa-edit"></i> Edit Menu </a>
                                    <button type="button" class="btn btn-danger delete_button"
                                            data-toggle="modal" data-target="#DelModal"
                                            data-id="<?php echo e($m->id); ?>">
                                        <i class='fa fa-trash'></i> Delete Menu
                                    </button>
                                </div>

                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <?php echo $menus->links(); ?>

            </div>
        </div>
    </div>



    <div class="modal fade" id="DelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"> <i class='fa fa-trash'></i> Delete !</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>

                <div class="modal-body">
                    <strong>Are you sure you want to Delete ?</strong>
                </div>

                <div class="modal-footer">
                    <form method="post" action="<?php echo e(route('menu-delete')); ?>" >
                        <?php echo csrf_field(); ?>

                        <?php echo e(method_field('DELETE')); ?>

                        <input type="hidden" name="id" class="abir_id" value="0">

                        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">DELETE</button>
                    </form>
                </div>

            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function () {
            $(document).on("click", '.delete_button', function (e) {
                var id = $(this).data('id');
                $(".abir_id").val(id);

            });

        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>