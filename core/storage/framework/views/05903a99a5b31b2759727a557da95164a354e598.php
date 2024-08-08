<?php $__env->startSection('body'); ?>
	<div class="row">
		<div class="col-md-8 offset-md-2 col-sm-12">
			<div class="jumbotron">
				<div class="card border-dark text-center" >
				    
				

                        <div class="behnam sweet-overlay" tabindex="-1" style="opacity: 1.08; display: none;"></div>

                        <div class="behnam sweet-alert  showSweetAlert visible" tabindex="-1" data-custom-class=""
                            data-has-cancel-button="true" data-has-confirm-button="true"
                            data-allow-outside-click="false"
                            data-has-done-function="false" data-animation="pop" data-timer="null"
                            style="display: none; margin-top: -210px;">
                            
                        
                            <div class="sa-icon sa-warning pulseWarning" style="display: block;">
                            <span class="sa-body pulseWarningIns"></span>
                            <span class="sa-dot pulseWarningIns"></span>
                            </div>
                            <div class="sa-icon sa-info" style="display: none;"></div>
                            <div class="sa-icon sa-success" style="display: none;">
                            <span class="sa-line sa-tip"></span>
                            <span class="sa-line sa-long"></span>
                            
                            <div class="sa-placeholder"></div>
                            <div class="sa-fix"></div>
                            </div>
                            <div class="sa-icon sa-custom" style="display: none;"></div>
                            
                            <h2>Notification</h2>
                            <hr>
                            <p id="m1" class="lead text-muted " style="display: block;">
                            
                            </p>
                            <hr>
                            <p id="m2" class="lead text-muted " style="display: block;">
                            
                            </p>
                            <hr>
                            <p id="m3" class="lead text-muted " style="display: block;">
                            
                            </p>
                             <hr>
                            <div class="modal-footer">
                                <a href="https://bircoin.co/user/deposit" class="btn btn-primary pull-right">OK</a>
                            </div>
                  

                        </div>


				    
					<div class="card-header">
						<h5>Deposit via <?php echo e($page_title); ?></h5>
					</div>
					<div class="card-body text-dark">
						<h6 class="card-title"> PLEASE SEND EXACTLY <span style="color: green"> <?php echo e($bcoin); ?></span> BTC</h6>
						<h5>TO <span style="color: green"> <?php echo e($wallet); ?></span></h5>
						<?php echo $qrurl; ?>

						<h4 style="font-weight:bold;">SCAN TO SEND</h4>
					</div>
					<div class="card-footer">
						<h6 class="text-center" style="color: red;">One Wallet Address Can Be Used Once. </h6>
					</div>

                    <a disabled class="btn btn-success" href="<?php echo e(route('deposit.history')); ?>">I Paid</a>


				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>

    let socket = new WebSocket("wss://www.blockonomics.co/payment/<?php echo e($wallet); ?>");
    
    socket.onopen = function(e) {
        console.log("[open] Connection established");
    };
    
    socket.onmessage = function(event) {
        
        if(event.status==0){
            document.getElementById("m1").innerHTML="Payment Status : Unconfirmed";
        }
        if(event.status==1){
            document.getElementById("m1").innerHTML="Payment Status : Partially Confirmed";
        }
        if(event.status==2){
            document.getElementById("m1").innerHTML="Payment Status : Confirmed (Please For Review)";
        }
        document.getElementById("m2").innerHTML="Payment Value : " + event.value;
        document.getElementById("m3").innerHTML="Payment Txid : "+event.txid;
        
        if(event.status!=""&event.value!=""&event.txid!="")
        {
            var appBanners = document.getElementsByClassName("behnam");
            for (var i = 0; i < appBanners.length; i ++) {
                appBanners[i].style.display = 'block';
            }
        }
    };
    
    socket.onclose = function(event) {
    };
    
    socket.onerror = function(error) {
       console.log(error.message);
    };
    
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>