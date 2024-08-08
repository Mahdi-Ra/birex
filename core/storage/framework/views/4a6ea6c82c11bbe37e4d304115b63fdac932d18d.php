<?php $__env->startSection('style'); ?>
    <style>

        .upload-btn-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
        }

        .btnn {
            border: 2px solid gray;
            color: gray;
            background-color: white;
            padding: 8px 20px;
            border-radius: 8px;
            font-size: 15px;
            font-weight: bold;
        }

        .upload-btn-wrapper input[type=file] {
            font-size: 100px;
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
        }


        .demo-wrapper {
            min-height: 500px;
        }

        .bsap {
            position: absolute;
            top: 0;
            right: 0;
        }

        video {
            border: 1px solid #ccc;
            border-radius: 3px;
            display: block;
            margin: 0 0 20px 0;
        }

        #canvas {
            border: 1px solid #ccc;
            border-radius: 3px;
            display: block;
            margin: 0 0 20px 0;
        }

        #canvas1 {
            border: 1px solid #ccc;
            border-radius: 3px;
            display: block;
            margin: 0 0 20px 0;
        }

        #carbonads {
            position: absolute;
            top: 0;
            right: 0;
            display: block;
            overflow: hidden;
            padding: 1.5em 1em;
            max-width: 230px;
            border: solid 1px hsl(0, 0%, 88%);
            background-color: hsl(0, 0%, 96%);
            text-align: center;
            font-size: 18px;
            line-height: 1.5;
            transition: all .2s ease-in-out;
        }

        #carbonads:hover {
            background-color: hsl(0, 0%, 93%);
        }

        #carbonads a {
            text-decoration: none;
        }

        #carbonads span {
            display: block;
            overflow: hidden;
        }

        .carbon-img img {
            display: block;
            margin: 0 auto 1em;
        }

        .carbon-text {
            display: block;
            margin-bottom: .5em;
        }

        .carbon-poweredby {
            display: block;
            font-size: 16px;
        }

        @media (max-width: 768px) {
            #carbonads {
                display: none;
            }
        }

    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>


    <div class="row padding-pranto-top padding-pranto-bottom">
        <div class="col-md-6 offset-md-3 col-sm-12">
            <form class="form-horizontal" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="jumbotron">

                    <?php if(count($errors) > 0): ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                        &times;
                                    </button>
                                    <h12><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Alert!</h12>
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>



                    <h1 class="tile"><i class="fa fa-user"></i> Authentication Form</h1>

                    <hr>

                    <center>


                        <?php if(!empty($user->expert_message)): ?>
                            <div class="form-group">
                                <strong>Expert Message</strong>
                                <br>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-info alert-dismissible">
                                            <?php echo e($user->expert_message); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        <?php endif; ?>


                        <div class="form-group">
                            <strong>
                                Passport Photo
                            </strong>

                            State :
                            <?php if(!empty($user->passport_image)&&!$user->passport_image_state): ?>
                                <i class="fa fa-spinner fa-lg" style="color: #b0b000;"></i>
                            <?php elseif($user->passport_image_state): ?>
                                <i class="fa fa-check fa-lg" style="color: green;"></i>
                            <?php else: ?>
                                <i class="fa fa-close fa-lg" style="color: red;"></i>
                            <?php endif; ?>

                            <br>
                            <br>

                            <?php if(empty($user->passport_image)): ?>

                                <div class="upload-btn-wrapper">

                                    <button class="btnn">Upload Photo</button>

                                    <input type="file" name="passport_image" accept="image/*"
                                           onchange="loadFile1(event)">
                                    <img id="passport_image"/>
                                    <script>
                                        var loadFile1 = function (event) {
                                            var output = document.getElementById('passport_image');
                                            output.src = URL.createObjectURL(event.target.files[0]);
                                            output.width = 150;
                                            output.height = 120;
                                        };
                                    </script>

                                </div>

                            <?php else: ?>
                                <img width="150" height="120"
                                     src="<?php echo e(route('homepage').'/'.$user->passport_image); ?>"/>
                            <?php endif; ?>

                        </div>

                        <hr>

                        <div class="form-group">
                            <strong>
                                Selfie Bircoin Requested Photo
                            </strong>
                            <br>

                            <a href="<?php echo e(route('homepage').'/for-bircoin.jpg'); ?>" >The requested photo of the site example</a>
                            <br>
                            State :
                            <?php if(!empty($user->selfi_request)&&!$user->selfi_request_state): ?>
                                <i class="fa fa-spinner fa-lg" style="color: #b0b000;"></i>
                            <?php elseif($user->selfi_request_state): ?>
                                <i class="fa fa-check fa-lg" style="color: green;"></i>
                            <?php else: ?>
                                <i class="fa fa-close fa-lg" style="color: red;"></i>
                            <?php endif; ?>

                            <br>
                            <br>

                            <?php if(empty($user->selfi_request)): ?>

                                <div class="upload-btn-wrapper">

                                    <button class="btnn">Upload Photo</button>

                                    <input type="file" name="selfi_request" accept="image/*"
                                           onchange="loadFile2(event)">
                                    <img id="selfi_request"/>
                                    <script>
                                        var loadFile2 = function (event) {
                                            var output = document.getElementById('selfi_request');
                                            output.src = URL.createObjectURL(event.target.files[0]);
                                            output.width = 150;
                                            output.height = 120;
                                        };
                                    </script>

                                </div>
                            <?php else: ?>
                                <img width="150" height="120"
                                     src="<?php echo e(route('homepage').'/'.$user->selfi_request); ?>"/>
                            <?php endif; ?>

                        </div>
                        <hr>

                        <div class="form-group">
                            <strong> Selfie Photo</strong>

                            State :
                            <?php if(!empty($user->selfie_image)&&!$user->selfie_image_state): ?>
                                <i class="fa fa-spinner fa-lg" style="color: #b0b000;"></i>
                            <?php elseif($user->selfie_image_state): ?>
                                <i class="fa fa-check fa-lg" style="color: green;"></i>
                            <?php else: ?>
                                <i class="fa fa-close fa-lg" style="color: red;"></i>
                            <?php endif; ?>

                            <br>

                            <p>Notic : Using Opera Next or Chrome Canary</p>

                            <br>

                            <?php if(empty($user->selfie_image)): ?>

                                <div class="upload-btn-wrapper">

                                    <video id="video" width="170" height="200" autoplay></video>
                                    <canvas id="canvas" width="170" height="200" hidden></canvas>
                                    <button type="button" id="snap" class="sexyButton btnn">Snap Photo</button>
                                    <input type="hidden" name="selfie" id="selfie" value="">

                                </div>
                            <?php else: ?>
                                <img width="170" height="200" src="<?php echo e(route('homepage').'/'.$user->selfie_image); ?>"/>
                            <?php endif; ?>

                        </div>

                        <hr>

                        <div class="form-group">

                            <strong> Custom Photo</strong>

                            State :
                            <?php if(!empty($user->custom_image)&&!$user->custom_image_state): ?>
                                <i class="fa fa-spinner fa-lg" style="color: #b0b000;"></i>
                            <?php elseif($user->custom_image_state): ?>
                                <i class="fa fa-check fa-lg" style="color: green;"></i>
                            <?php else: ?>
                                <i class="fa fa-close fa-lg" style="color: red;"></i>
                            <?php endif; ?>

                            <p>Notic : Using Opera Next or Chrome Canary</p>

                            <strong><?php echo e(\App\Cond::find($user->custom_image_cond)->text); ?></strong>

                            <br>
                            <br>

                            <?php if(empty($user->custom_image)): ?>

                                <div class="upload-btn-wrapper">

                                    <video id="video1" width="170" height="200" autoplay></video>
                                    <canvas id="canvas1" width="170" height="200" hidden></canvas>
                                    <button type="button" id="snap1" class="sexyButton btnn">Snap Photo</button>
                                    <input type="hidden" name="custom" id="custom" value="">


                                </div>
                            <?php else: ?>
                                <img width="170" height="200" src="<?php echo e(route('homepage').'/'.$user->custom_image); ?>"/>
                            <?php endif; ?>

                        </div>

                        <br>
                    </center>

                    <hr>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Upload</button>


                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>

        // Put event listeners into place
        window.addEventListener("DOMContentLoaded", function () {
            // Grab elements, create settings, etc.
            var canvas = document.getElementById('canvas');
            var context = canvas.getContext('2d');
            var video = document.getElementById('video');
            var mediaConfig = {video: true};
            var errBack = function (e) {
                console.log('An error has occurred!', e)
            };

            // Put video listeners into place
            if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                navigator.mediaDevices.getUserMedia(mediaConfig).then(function (stream) {
                    //video.src = window.URL.createObjectURL(stream);
                    video.srcObject = stream;
                    video.play();
                });
            }

            /* Legacy code below! */
            else if (navigator.getUserMedia) { // Standard
                navigator.getUserMedia(mediaConfig, function (stream) {
                    video.src = stream;
                    video.play();
                }, errBack);
            } else if (navigator.webkitGetUserMedia) { // WebKit-prefixed
                navigator.webkitGetUserMedia(mediaConfig, function (stream) {
                    video.src = window.webkitURL.createObjectURL(stream);
                    video.play();
                }, errBack);
            } else if (navigator.mozGetUserMedia) { // Mozilla-prefixed
                navigator.mozGetUserMedia(mediaConfig, function (stream) {
                    video.src = window.URL.createObjectURL(stream);
                    video.play();
                }, errBack);
            }

            // Trigger photo take
            document.getElementById('snap').addEventListener('click', function () {
                console.log(video.empty);
                context.drawImage(video, 0, 0, 170, 200);
                document.getElementById('video').hidden = true;
                document.getElementById('canvas').hidden = false;

                var canvas = document.getElementById('canvas');
                var dataURL = canvas.toDataURL('image/png');
                document.getElementById('selfie').value = dataURL;

            });
        }, false);

        document.body.className += ' demo-page';

        window.addEventListener('load', function () {
            var s = 'script';
            var d = document;
            var w = window;
            var firstScript = d.getElementsByTagName(s)[0];


            (function () {
                var first_paragraph = document.getElementsByTagName('p')[0];
                if (first_paragraph) {
                    first_paragraph.className = 'demo-intro';
                }

                setTimeout(function () {
                    var headerA = d.getElementById('header-fx');
                    if (headerA) headerA.className += ' complete';
                }, 2000);
            })();


            // BSA bitches!
            var bsa = d.createElement(s);
            bsa.async = 1;
            bsa.src = '//s3.buysellads.com/ac/bsa.js';
            firstScript.parentNode.insertBefore(bsa, firstScript);

            // Promo!
            (function () {

                var promoNode = d.getElementById('promoNode');

                // Temporary - use MooTools 2.0 when available
                function createElement(tagName, attr, parent) {
                    var el = d.createElement(tagName);
                    for (prop in attr) {
                        if (attr.hasOwnProperty(prop)) el.setAttribute(prop, attr[prop]);
                    }
                    parent.appendChild(el);
                    return el;
                }

                // Loads a script
                function loadScript(url) {
                    var script = d.createElement('script');
                    script.src = url;
                    script.setAttribute('async', 'true');
                    d.documentElement.firstChild.appendChild(script);
                }

            })();

            [].slice.call(document.querySelectorAll('header img[data-src]')).forEach(function (el) {
                el.src = el.getAttribute('data-src');
            });
        });


        ///////////////////////////////////////////////////////////////////


        // Put event listeners into place
        window.addEventListener("DOMContentLoaded", function () {
            // Grab elements, create settings, etc.
            var canvas1 = document.getElementById('canvas1');
            var context = canvas1.getContext('2d');
            var video1 = document.getElementById('video1');
            var mediaConfig = {video: true};
            var errBack = function (e) {
                console.log('An error has occurred!', e)
            };

            // Put video1 listeners into place
            if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                navigator.mediaDevices.getUserMedia(mediaConfig).then(function (stream) {
                    //video1.src = window.URL.createObjectURL(stream);
                    video1.srcObject = stream;
                    video1.play();
                });
            }

            /* Legacy code below! */
            else if (navigator.getUserMedia) { // Standard
                navigator.getUserMedia(mediaConfig, function (stream) {
                    video1.src = stream;
                    video1.play();
                }, errBack);
            } else if (navigator.webkitGetUserMedia) { // WebKit-prefixed
                navigator.webkitGetUserMedia(mediaConfig, function (stream) {
                    video1.src = window.webkitURL.createObjectURL(stream);
                    video1.play();
                }, errBack);
            } else if (navigator.mozGetUserMedia) { // Mozilla-prefixed
                navigator.mozGetUserMedia(mediaConfig, function (stream) {
                    video1.src = window.URL.createObjectURL(stream);
                    video1.play();
                }, errBack);
            }

            // Trigger photo take
            document.getElementById('snap1').addEventListener('click', function () {

                context.drawImage(video1, 0, 0, 170, 200);
                document.getElementById('video1').hidden = true;
                document.getElementById('canvas1').hidden = false;

                var canvas = document.getElementById('canvas1');
                var dataURL = canvas.toDataURL('image/png');
                document.getElementById('custom').value = dataURL;

                console.log(dataURL);
            });
        }, false);

        document.body.className += ' demo-page';

        window.addEventListener('load', function () {
            var s = 'script';
            var d = document;
            var w = window;
            var firstScript = d.getElementsByTagName(s)[0];


            (function () {
                var first_paragraph = document.getElementsByTagName('p')[0];
                if (first_paragraph) {
                    first_paragraph.className = 'demo-intro';
                }

                setTimeout(function () {
                    var headerA = d.getElementById('header-fx');
                    if (headerA) headerA.className += ' complete';
                }, 2000);
            })();


            // BSA bitches!
            var bsa = d.createElement(s);
            bsa.async = 1;
            bsa.src = '//s3.buysellads.com/ac/bsa.js';
            firstScript.parentNode.insertBefore(bsa, firstScript);

            // Promo!
            (function () {

                var promoNode = d.getElementById('promoNode');

                // Temporary - use MooTools 2.0 when available
                function createElement(tagName, attr, parent) {
                    var el = d.createElement(tagName);
                    for (prop in attr) {
                        if (attr.hasOwnProperty(prop)) el.setAttribute(prop, attr[prop]);
                    }
                    parent.appendChild(el);
                    return el;
                }

                // Loads a script
                function loadScript(url) {
                    var script = d.createElement('script');
                    script.src = url;
                    script.setAttribute('async', 'true');
                    d.documentElement.firstChild.appendChild(script);
                }

            })();

            [].slice.call(document.querySelectorAll('header img[data-src]')).forEach(function (el) {
                el.src = el.getAttribute('data-src');
            });
        });

        //////////////////////

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>