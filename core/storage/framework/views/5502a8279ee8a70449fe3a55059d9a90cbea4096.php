<?php $__env->startSection('style'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
    <div class="row  padding-pranto-top padding-pranto-bottom">
        <div class="col-md-12">

            <div class="card">

                <div class="card-header">
                    <h4>Trade Advertise History</h4>
                </div>

                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-light">
                            <tr>
                                <th>Advertise Type</th>
                                <th>GateWay Name</th>
                                <th>Payment Method Name</th>
                                <th>Min-Max</th>
                                <th>Raised Time</th>
                                <th>State</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $addvertise; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <?php if($data->add_type == 1): ?>
                                            <span class="badge badge-primary">Want To Sell</span>
                                        <?php else: ?>
                                            <span class="badge badge-success">Want To Buy</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($data->gateway->name); ?></td>
                                    <td><?php echo e($data->method->name); ?></td>

                                    <td>
                                        
                                        <?php echo e(sprintf("%.8f", floor((float)$data->min_amount  * pow(10, 8)) / pow(10, 8)), round((float)$data->min_amount , 8)
                                      
                                        .' '.$data->currency->name .'-'. 
                                        sprintf("%.8f", floor((float)$data->max_amount  * pow(10, 8)) / pow(10, 8)), round((float)$data->max_amount , 8)
                                    
                                        .' '.$data->currency->name); ?>

                                        </td>
                                    <td><?php echo e(date('g:ia \o\n l jS F Y', strtotime($data->created_at))); ?></td>
                                    <td>
                                        <?php if($data->status == -1 && $data->reject==false): ?>
                                            In Pending
                                        <?php elseif($data->reject): ?>
                                            Rejected
                                        <?php elseif($data->status == 0): ?>
                                            Accepted
                                        <?php endif; ?>
                                    </td>

                                    <td><a href="<?php echo e(route('sell_buy.edit', $data->id)); ?>"
                                           class="btn btn-secondary">Edit</a></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <?php echo e($addvertise->links()); ?>


                </div>

            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function () {
            $("#crypto_id").change(function () {

                var crypto = $(this).val();
                var token = "<?php echo e(csrf_token()); ?>";

                $.ajax({
                    type: "POST",
                    url: "<?php echo e(route('currency.check')); ?>",
                    data: {
                        'crypto': crypto,
                        '_token': token
                    },
                    success: function (data) {
                        $("#currency").val(data.code);

                    }
                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>