<?php $__env->startSection('body'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title "><?php echo e($page_title); ?></h3>
                <div class="tile-body">
                    <hr>
                    <strong> All Income To Now  :  <?php echo e(App\Income::all()->sum('value')); ?> BTC </strong>
                    <hr>
                        <form method="post">
                            <?php echo csrf_field(); ?>
                            From Date: <input required class="btn btn-info bold uppercase" type="text" name="from" id="aaa">
                            To Date: <input required class="btn btn-primary bold uppercase" type="text" name="to" id="aa">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <button class="btn btn-success bold uppercase"> Submit</button>
                        </form>
                        
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                        
                            <div class="tile">
                                
                                <?php if(!isset($from)||!isset($to)): ?>
                                <h3 class="tile-title">Last 30 Days Income</h3>
                                <?php else: ?>
                                <h3 class="tile-title">From : <?php echo e($from); ?> - To: <?php echo e($to); ?></h3>
                                <?php endif; ?>
                
                                <div id="graph_line" ></div>
                            </div>
                
                        </div>
                        
                        <div class="col-md-12">
                        
                            <div class="tile">
                                  
                                <?php if(!isset($from)||!isset($to)): ?>
                                <h3 class="tile-title">Last 30 Days Income Transaction Log</h3>
                                <?php else: ?>
                                <h3 class="tile-title">From : <?php echo e($from); ?> - To: <?php echo e($to); ?></h3>
                                <?php endif; ?>
                               
                
                                  <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover order-column" id="">
                            <thead>
                            <tr>
                                <th>Username</th>
                                <th>ID</th>
                                <th>Amount</th>
                                <th>After Balance</th>
                                <th>Charge</th>
                                <th>Detail</th>
                                <th>Created At</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $trans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <a href="<?php echo e(route('user.single', $data->user->id)); ?>">
                                            <?php echo e($data->user->username); ?>

                                        </a>
                                    </td>

                                    <td><?php echo e($data->trx); ?></td>
                                    <td>
                                        
                                    <?php echo e(sprintf("%.8f", floor((float)$data->amount  * pow(10, 8)) / pow(10, 8)), round((float)$data->amount , 8)); ?>

                                        
                                    </td>
                                    <td>
                                 
                                  <?php echo e(sprintf("%.8f", floor((float)$data->main_amo  * pow(10, 8)) / pow(10, 8)), round((float)$data->main_amo , 8)); ?>

                                 
                                     
                                    </td>
                                    <td>
                                        <?php echo e($data->charge); ?>

                                        </td>
                                    <td><?php echo e($data->title); ?></td>
                                    <td><?php echo e($data->created_at); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tbody>
                        </table>
                        <?php echo e($trans->links()); ?>

                    </div>
                            </div>
                
                        </div>
                    </div>
                    
                    <hr>
                     
                  
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

 <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script>
        $(document).ready(function () {
            new Morris.Line({
            // ID of the element in which to draw the chart.
            element: 'graph_line',
            // Chart data records -- each entry in this array corresponds to a point on
            // the chart.
            data: <?php echo $monthly_play; ?>,
           
            // The name of the data record attribute that contains x-values.
            xkey: 'date',
            // A list of names of data record attributes that contain y-values.
            ykeys: ['value'],
            // Labels for the ykeys -- will be displayed when you hover over the
            // chart.
            labels: ['value','date']
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>