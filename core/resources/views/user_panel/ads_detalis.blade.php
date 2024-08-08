@extends('front.layout.master')
@section('style')

@stop
@section('body')
    <div class="row">
        @if (count($errors) > 0)
            <div class="col-md-12">
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong class="col-md-12"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Alert!</strong>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>
            </div>
        @endif

        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <strong style="font-size: 24px;"> Edit Coin Trade Advertisement</strong>
                </div>
                @if(session('message1'))

                    <div class="behnam sweet-overlay" tabindex="-1" style="opacity: 1.08; display: block;"></div>

                    <div class="behnam sweet-alert  showSweetAlert visible" tabindex="-1" data-custom-class=""
                         data-has-cancel-button="true" data-has-confirm-button="true"
                         data-allow-outside-click="false"
                         data-has-done-function="false" data-animation="pop" data-timer="null"
                         style="display: block; margin-top: -190px;">
                        <div class="sa-icon sa-error" style="display: none;">
      <span class="sa-x-mark">
        <span class="sa-line sa-left"></span>
        <span class="sa-line sa-right"></span>
      </span>
                        </div>
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
                        <h2>Alert</h2>
                        <p class="lead text-muted " style="display: block;">
                            {{session('message1')}}
                        </p>



                        <form method="post" action="{{route('deposit.confirm')}}">


                            @csrf

                            <input type="hidden" name="gateway" value="505">


                            <div class="form-group" style="display: block;">
                                <div class="input-group">
                                    <input type="text" name="amount" class="form-control input-lg" id="amount"
                                           readonly="readonly" value="{{session('btc')}}">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">BTC</div>
                                    </div>
                                </div>


                            </div>

                            <div class="modal-footer">
                                <button onclick="$('.behnam').hide();" type="button" class="btn btn-default "
                                        data-dismiss="modal">Close
                                </button>
                                <button type="submit" class="btn btn-primary pull-right">Submit</button>
                            </div>
                        </form>


                    </div>


                @endif
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-12 text-center" style="color: #ff1501">
                            What kind of trade advertisement do you wish to create? If you wish to sell coins make sure you have coins in your Local wallet.
                        </div>
                    </div>

                    <br>
                    <br>

                    <form action="{{route('sell.buy.update', $add->id)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-row">

                            <div class="form-group col-md-4">
                                <strong>I Want To</strong>
                                <select name="add_type" id="coin" class="form-control">
                                    <option {{$add->add_type == 1? 'selected':''}} value="sell">Sell</option>
                                    <option {{$add->add_type == 2? 'selected':''}} value="buy">Buy</option>
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <strong>Select Coin</strong>
                                <select name="gateway_id" id="coin" class="form-control">
                                    <option value="">Select Coin</option>
                                    @foreach($coin as $data)
                                        <option {{$add->gateway_id == $data->id? 'selected':''  }} value="{{$data->id}}">{{$data->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <strong>Payment Method</strong>
                                <select name="crypto_id"  class="form-control">
                                    <option value=" ">Select Method</option>
                                    @foreach($methods as $data)
                                        <option {{$add->method_id == $data->id? 'selected':''  }} value="{{$data->id}}">{{$data->name}}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group col-md-4">
                                <strong>Currency</strong>
                                <select name="currency" id="currency" class="form-control">
                                    <option value="">Select Currency</option>
                                    @foreach($currency as $data)
                                        <option {{$add->currency_id == $data->id? 'selected':''  }} value="{{$data->id}}">{{$data->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <strong>Margin</strong>
                                <div class="input-group">
                                    <input class="form-control" type="number" value="{{$add->margin}}" name="margin" id="margin" placeholder="Margin">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">%</div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <strong>Price equation</strong>
                                <input class="form-control" type="text" id="price" readonly>
                            </div>

                        </div>

                        <hr>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>Min. transaction limit</strong>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="min_amount" value="{{$add->min_amount}}"  placeholder="Min Amount">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">{{$general->currency}}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <strong>Max. transaction limit</strong>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="max_amount" value="{{$add->max_amount}}" placeholder="Max Amount">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">{{$general->currency}}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <strong>Terms of Trade</strong>
                                <textarea class="form-control" name="term_detail" rows="5">{!! $add->term_detail !!}</textarea>
                            </div>

                            <div class="form-group col-md-6">
                                <strong>Payment Details</strong>
                                <textarea class="form-control" name="payment_detail" rows="5">{!! $add->payment_detail !!}</textarea>
                            </div>


                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Update Advertise</button>

                    </form>
                </div>
            </div>

        </div>

    </div>
@stop

@section('script')
    <script>
        $(document).ready(function () {
            $(document).on('change',"#coin", function () {

                var crypto = $(this).find(":selected").val();

                if(crypto == 505){
                    var price = '{{$btc_usd}}';
                    var name = 'BTC';
                    getPrice(price);
                }else if(crypto == 506){
                    var price = '{{$eth_usd}}';
                    var name = 'ETH';
                    getPrice(price);
                }else if(crypto == 509){
                    var price = '{{$doge_usd}}';
                    var name = 'DOGE';
                    getPrice(price);

                }else{
                    var price = '{{$lite_usd}}';
                    var name = 'LTE';
                    getPrice(price);
                }

                function getPrice(price) {

                    var cur = $("#currency").val();
                    var token = "{{csrf_token()}}";

                    $("#margin").val('0');

                    $.ajax({
                        type :"POST",
                        url :"{{route('currency.check')}}",
                        data:{
                            'crypto' : cur,
                            '_token' : token
                        },

                        success:function(data){
                            $("#sizing-addon1").text(data.name);
                            $("#sizing-addon2").text(data.name);

                            if ($("#margin").val() == 0){
                                $("#price").val(data.usd_rate*price +' '+data.name+' to '+name);
                            }

                            $("#margin").bind('keyup mouseup', function (){

                                var margin = $(this).val();
                                if (margin == 0){
                                    var afterMargin = (data.usd_rate*price * 1)/100;
                                    $("#price").val(((data.usd_rate*price)+afterMargin) +' '+data.name+' to '+name);
                                }

                                var afterMargin = (data.usd_rate*price * margin)/100;
                                $("#price").val(((data.usd_rate*price)+afterMargin) +' '+data.name+' to '+name);


                            });

                        }
                    });

                }

                $(document).on('change',"#currency", function () {

                    $("#margin").val('0');

                    var cur = $(this).find(":selected").val();
                    var token = "{{csrf_token()}}";

                    $.ajax({
                        type :"POST",
                        url :"{{route('currency.check')}}",
                        data:{
                            'crypto' : cur,
                            '_token' : token
                        },

                        success:function(data){
                            $("#sizing-addon1").text(data.name);
                            $("#sizing-addon2").text(data.name);

                            if ($("#margin").val() == 0){
                                $("#price").val(data.usd_rate*price +' '+data.name+' to '+name);
                            }

                            $("#margin").bind('keyup mouseup', function (){

                                var margin = $(this).val();
                                if (margin == 0){
                                    var afterMargin = (data.usd_rate*price * 1)/100;
                                    $("#price").val(((data.usd_rate*price)+afterMargin) +' '+data.name+' to '+name);
                                }

//                            if (margin != 0){
                                var afterMargin = (data.usd_rate*price * margin)/100;
                                $("#price").val(((data.usd_rate*price)+afterMargin) +' '+data.name+' to '+name);
//                            }

                            });

                        }
                    });
                });

            });
        });
    </script>
@stop