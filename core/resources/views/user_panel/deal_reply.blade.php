@extends('front.layout.master')
@section('style')

@stop
@section('body')
    <div class="row padding-pranto-top padding-pranto-bottom">
        @if (count($errors) > 0)
            <div class="col-md-12">
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong class="col-md-12"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                        Alert!</strong>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>
            </div>
        @endif


        <div class="col-md-8">

            <div class="card">

                <div class="card-header">
                    <strong class="col-md-12"><i class="fa fa-comment"></i> Send Message to <a style="color: blue"
                                                                                               href="{{route('user.profile.view', $add->from_user->username)}}">{{$add->from_user->username}}
                            :</a></strong>
                </div>
                <form id="uploadDetail" enctype="multipart/form-data" class="form-horizontal">
                    @csrf
                    <div class="card-body">

Dear user for sending any file you must be add a text.
                        <div class="form-group">
                            <textarea class="form-control" name="message" id="message" rows="3"></textarea>
                        </div>

                        <div class="form-group" id="pranto">
                            <input type="file" class="form-control" name="image">
                            <small class="col-md-12"><i class="fa fa-picture-o"></i> Attach document (PNG , JPG and JPEG
                                files only, take a screenshot if necessary):
                            </small>
                        </div>


                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-secondary" id="submit"><i class="fa fa-paper-plane-o"></i>
                            Send
                        </button>
                    </div>

                </form>

            </div>

            <br>
            <div class="card">

                <div class="card-header">
                    <strong class="col-md-12">Messages </strong>
                </div>

                <div class="card-body">
                    <div id="oww" class="oww">
                        @foreach($add->conversation->reverse() as $data)
                            <div class="col-md-12">
                                <div class="alert alert-{{$data->type ==1? 'success':'info' }}">
                                    <strong>@if($data->type == 1){{$add->from_user->username}} @else You @endif
                                        :</strong>
                                    <p><a href="{{asset('assets/images/attach/'.$data->image)}}"
                                          download="">@if(isset($data->image)) <img style="width: 180px"
                                                                                    src="{{asset('assets/images/attach/'.$data->image)}}"> @endif
                                        </a></p>
                                    <p>{!! $data->deal_detail !!}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>


        </div>


        <div class="col-md-4 margin-top-pranto">
            <div class="card">
                <div class="card-body">
                    <div class="alert alert-info">
                        <strong>
                             {{$add->from_user->name}} want
                            to {{$add->add_type == 2 ? 'sell':'buy' }} {{ $add->amount_to }} {{$add->gateway->currency}}
                            with 
                            
                        
                            
                            {{$add->amount_to * $pr}}
                            {{$add->currency->name}} {{$add->add_type == 1? 'from':'to' }} you
                            .</strong>
                        <br>
                        <br>
                        <p>Transaction status: 
                            @if($add->status == 0)
                                <span class="badge badge-warning"> Processing </span>
                            @elseif($add->status == 1)
                                <span class="badge badge-success"> Paid Complete </span>
                            @elseif($add->status == 9)
                                <span class="badge badge-info"> Paid Approval </span>
                            @else
                                <span class="badge badge-danger"> Canceled </span>
                            @endif</p>
                        <br>
                        <p>Request
                            At: {{\Carbon\Carbon::createFromTimeStamp(strtotime($add->created_at))->diffForHumans()}}</p>
                    </div>
                </div>
            </div>
            <br>
            @if($add->status == 0 || $add->status == 9)
                <div class="card">
                    <div class="card-body">
                        <div class="alert alert-success">
                            <p>Make Sure You have Paid, Then Click Butoon "I Have Received Money"</p><br>
                            <p>
                                <button type="button" data-toggle="modal" data-target="#paidModal"
                                        class="btn btn-primary btn-block">I Have Received Money
                                </button>
                            </p>
                            <br>
                            <p style="color: red">After Click Paid, 
                            
                            {{ $add->amount_to }} {{$add->gateway->currency}}
                       
                                will transfer
                                to {{$add->add_type == 2? 'your wallet':$add->from_user->name. ' from your wallet'}}</p>
                        </div>
                    </div>
                </div>
            @endif

            @if($add->status == 0||$add->status == 9)
                <div class="alert alert-danger">
                    <p>If you do not want to make any deal with {{$add->from_user->name}}, then click "Cencel
                        Request".</p><br>
                    <p>
                        <button type="button" data-toggle="modal" data-target="#cancelModal"
                                class="btn btn-danger btn-block">Cancel Request
                        </button>
                    </p>
                    <br>
                
                </div>
            @endif


        </div>

    </div>

    <!--End Contact Section-->

    <div id="paidModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title">Confirm Paid<strong> from {{$add->from_user->name}}</strong></h4>
                </div>

                <form method="post" action="{{route('confirm.paid')}}">
                    @csrf

                    <div class="modal-body">
                        {{csrf_field()}}
                        <h6 style="color: #0b2e13">
                            {{$add->from_user->name}} want
                            to {{$add->add_type == 2 ? 'sell':'buy' }} {{ $add->amount_to }} {{$add->gateway->currency}}
                            with 
                            
                        
                            
                            {{$add->amount_to * $pr}}
                            {{$add->currency->name}} {{$add->add_type == 1? 'from':'to' }} you
                            .
                            And confirmed you are paid.
                        </h6>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="status" value="{{$add->id}}" class="btn btn-primary pull-right">
                            Confirm Paid
                        </button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>

        </div>
    </div>


    <div id="cancelModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" style="color: red">Confirm Cancel Request<strong>
                            from {{$add->from_user->name}}</strong></h4>
                </div>

                <form method="post" action="{{route('confirm.cancel')}}">
                    @csrf

                    <div class="modal-body">
                        {{csrf_field()}}
                        <h6 style="color: #0b2e13">
                          
                           {{$add->from_user->name}} want
                            to {{$add->add_type == 2 ? 'sell':'buy' }} {{ $add->amount_to }} {{$add->gateway->currency}}
                            with 
                            
                        
                            
                            {{$add->amount_to * $pr}}
                            {{$add->currency->name}} {{$add->add_type == 1? 'from':'to' }} you
                          
                          
                          
                            .
                            And confirm cancel deal.
                        </h6>

                        <hr>
                        <strong>
                            Cause of cancellation
                        </strong>
                        <br>

                        <input type="radio"
                               name="reason_cancel" value="1"><span> I did not agree with the buyer</span>

                        <br>


                        <input type="radio"
                               name="reason_cancel" value="2"><span> I stopped selling</span>

                        <br>


                        <input type="radio"
                               name="reason_cancel" value="3"><span> I am not currently trading</span>

                        <br>
                        
                        <input type="radio"
                               name="reason_cancel" value="4"><span> The buyer did not pay me</span>

                        <br>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="status" value="{{$add->id}}" class="btn btn-primary pull-right">
                            Confirm Cancel
                        </button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@stop

@section('script')



    <script>
        $(window).ready(function () {
            setInterval(function () {
                $(".oww").load(location.href + " .oww");
            }, 500);
        });

        $(document).ready(function () {

            $('#submit').click(function (e) {

                var preLoader = $("#preloader").css('display', 'block');
                preLoader.fadeOut(600);

                e.preventDefault();
                var id = "{{$add->id}}";
                var message = $('#message').val();
                if (message == '') {
                    alert('message field is required');
                }

                var profileForm = $('#uploadDetail')[0];
                var formData = new FormData(profileForm);

                formData.append('id', id);
                formData.append('message', message);
                formData.append('_token', "{{csrf_token()}}");

                $.ajax({
                    type: "POST",
                    url: "{{route('send.message.deal.reply')}}",
                    data: formData,
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {

                        $("#pranto").load(location.href + " #pranto");
                        $('#message').val(' ');

                    }
                });

                setTimeout(function () {
                    $("#oww").load(location.href + "#oww");
                }, 500)
            });

        });
    </script>
    <script>
        $(document).ready(function () {
            function disableBack() {
                window.history.forward()
            }

            window.onload = disableBack();
            window.onpageshow = function (evt) {
                if (evt.persisted) disableBack()
            }
        });
    </script>
@stop