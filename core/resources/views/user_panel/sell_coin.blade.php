@extends('front.layout.master')
@section('style')

@stop
@section('body')
    <div class="row">
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

        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <strong style="font-size: 24px;"> Create a Coin Trade Advertisement</strong>

                    @if(session('message1'))

                        <div class="behnam sweet-overlay" tabindex="-1" style="opacity: 1.08; display: block;"></div>

                        <div class="behnam sweet-alert  showSweetAlert visible" tabindex="-1" data-custom-class=""
                             data-has-cancel-button="true" data-has-confirm-button="true"
                             data-allow-outside-click="false"
                             data-has-done-function="false" data-animation="pop" data-timer="null"
                             style="display: block; margin-top: -190px;">
                          
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

                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-info" role="alert">
                                Dear users, Each completed trade costs advertisers <strong>{{$general->trx_charge}}%
                                    Wage</strong> of the total trade amount.
                                You may only use payment accounts that are registered in your own name.
                                You must provide your payement details in the advertisement or in the trade chat.
                            </div>
                        </div>
                        <div class="col-md-12 text-center" style="color: #ff1501">
                            What kind of trade advertisement do you wish to create? If you wish to sell coins make sure
                            you have coins in your Local wallet.
                        </div>
                    </div>

                    <br>
                    <br>

                    <form id="myf1" action="{{route('sell.buy')}}" method="post">
                        @csrf

                        <div class="form-row">


                            <div class="form-group col-md-4">
                                <strong>Type</strong>
                                <input class="form-control" type="text" readonly="" value="Sell">
                            </div>

                            <div class="form-group col-md-4">
                                <strong>Select Coin</strong>
                                <select name="gateway_id" id="coin" class="form-control">
                                    
                                    <option>Select Coin</option>
                                    
                                    @foreach($coin as $key=>$data)
                                    
                                        @if(old('gateway_id') && old('gateway_id') == $data->id)
                                            <option selected="" value="{{old('gateway_id')}}">
                                                {{$data->name}}
                                            </option>
                                        @else
                                            <option value="{{$data->id}}">{{$data->name}}</option>
                                        @endif
                                       
                                    @endforeach
                                    
                                    
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <strong>Payment Method</strong>
                            
                                <select name="crypto_id" class="form-control">
                                    
                                    
                                    <option>Select Method</option>
                                    
                                    @foreach($methods as $key=>$data)
                                    
                                        @if(old('crypto_id') && old('crypto_id') == $data->id)
                                            <option selected="" value="{{old('crypto_id')}}">
                                                {{$data->name}}
                                            </option>
                                        @else
                                            <option value="{{$data->id}}">{{$data->name}}</option>
                                        @endif
                                       
                                    @endforeach
                                    
                                    
                                </select>
                            </div>


                            <div class="form-group col-md-4">
                                <strong>Currency</strong>
                  
                                <select name="currency" id="currency" class="form-control">
                                    
                                    <option>Select Currency</option>
                                    
                                    @foreach($currency as $data)
                                    
                                        @if(old('currency') && old('currency') == $data->id)
                                            <option selected="" value="{{old('currency')}}">
                                                {{$data->name}}
                                            </option>
                                        @else
                                            <option value="{{$data->id}}">{{$data->name}}</option>
                                        @endif
                                       
                                    @endforeach
                                    
                                    
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <strong>Margin</strong>
                          
                                <div class="input-group">
                                    
                                    @if(is_numeric(old('margin')))
                                        <input class="form-control" type="number"  name="margin" value="{{old('margin')}}" id="margin" placeholder="Margin">
                                        
                                    @else
                                        <input class="form-control" type="number"  name="margin" value="0" id="margin" placeholder="Margin">
                                        
                                    @endif
                                    
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">%</div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <strong>Price equation</strong>
                                <input name="s4" value="{{old('s4')}}" class="form-control" type="text" id="price" readonly>
                            </div>

                        </div>

                        <hr>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <p style="color: gray;">

                                    Your BTC Balance :
                                    {{sprintf("%.8f", floor($bal * pow(10, 8)) / pow(10, 8)),round($bal, 8)}}
                                    

                                </p>
                                <strong>Min. transaction limit BTC</strong>
                                <div class="input-group">
                                    <input id="mii" class="form-control" type="text" name="min_amount"
                                           value="{{old('min_amount')}}" placeholder="Min Amount">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">{{$general->currency}}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <p style="color: gray;">

                                    Your BTC Balance :
                                    {{sprintf("%.8f", floor($bal * pow(10, 8)) / pow(10, 8)),round($bal, 8)}}

                                </p>
                                <strong>Max. transaction limit BTC</strong>

                                <div class="input-group">
                                    @if(session()->has('maxx'))
                                        
                                        <input id="maa" class="form-control" type="text" name="max_amount"
                                               value="{{session('maxx')}}" placeholder="Max Amount">
                                    @php session()->forget('maxx'); @endphp
                                    @else
                                        <input id="maa" class="form-control" type="text" name="max_amount"
                                               value="" placeholder="Max Amount">
                                    @endif
                                           
                                    
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">{{$general->currency}}</div>
                                    </div>
                                </div>
                            </div>



                            <div class="form-group col-md-6">
                                <strong>Min. transaction</strong>
                                <div class="input-group">
                                    <input id="mi" name="s2" class="form-control" type="text"
                                           value="{!! old('s2') !!}" readonly>
                                    <div class="input-group-prepend">
                                        <div id="mi_cc" class="input-group-text"></div>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group col-md-6">
                                <strong>Max. transaction</strong>
                                <div class="input-group">
                                    <input id="ma" name="s1" class="form-control" type="text"
                                           value="{!! old('s1') !!}" readonly>
                                    <div class="input-group-prepend">
                                        <div id="mi_c" class="input-group-text"></div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                            
                            
                            <div class="form-group col-md-6">
                                <strong>Terms of Trade</strong>
                                <textarea class="form-control" name="term_detail"
                                          rows="5">{!! old('term_detail') !!}</textarea>
                            </div>

                            <div class="form-group col-md-6">
                                <strong>Payment Details</strong>
                                <textarea class="form-control" name="payment_detail"
                                          rows="5">{!! old('payment_detail') !!}</textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="checkbox-check">
                                    <input type="checkbox" name="agree" value="1" required>
                                    I Agree With All <a href="{{route('terms.index')}}">Terms</a> & <a
                                            href="{{route('policy.index')}}">Policy</a></label>
                            </div>

                        </div>

                        <button  class="btn btn-primary btn-block">Publish Advertise   [0.5% Wage]</button>
                        <br>
                        <button  name="trusted_sell" value="trusted_sell" class="btn btn-primary btn-block">Trusted Sell   [0.75% Wage]</button>
                        <!--<strong>Notic:</strong>-->
                        <!--<p>This way (Trusted Sell) you get money from the site and you don't need to negotiate with the seller</p>-->


                    </form>
                </div>
            </div>

        </div>

    </div>
@stop

@section('script')


    <script>
            
        $(document).ready(function () {
            
            var price = 0;
            
            
            $(document).on('keyup', "#mii", function () {
                $('#mi').val($('#mii').val() *price);
            });

            $(document).on('change', "#mii", function () {
                $('#mi').val($('#mii').val() *price);
            });



            $(document).on('keyup', "#maa", function () {
                $('#ma').val($('#maa').val() *price);
            });
            
            $(document).on('change', "#maa", function () {
                $('#ma').val($('#maa').val() *price);
            });



            $(document).on('change', "#margin", function () {
                if(document.getElementById("margin").value>0)
                {
                    document.getElementById("price").value = price + 
                    price * document.getElementById("margin").value/100;
                }else
                {
                    document.getElementById("price").value=price;
                }
            });
            
            $(document).on('change', "#currency", function () {

                var cur = $(this).find(":selected").val();
                
                switch(cur)
                {
                    case '1': price = {{$usd}}; document.getElementById("mi_c").innerText=document.getElementById("mi_cc").innerText="USD";
                    document.getElementById("price").value ={{$usd}};
                    break;
                    case '2': price = {{$try}}; document.getElementById("mi_c").innerText=document.getElementById("mi_cc").innerText="TRY";
                    document.getElementById("price").value ={{$try}};
                    break;
                    case '3': price = {{$eur}}; document.getElementById("mi_c").innerText=document.getElementById("mi_cc").innerText="EUR"; 
                    document.getElementById("price").value ={{$eur}};
                    break;
                    default:break;
                }
              
            });
                
            $(document).on('change', "#coin", function () {

                var crypto = $(this).find(":selected").val();

                if (crypto == 505) {
                    var price = '{{$usd}}';
                    var name = 'BTC';
                    // getPrice(price);
                }
                // } else if (crypto == 506) {
                //     var price = '{{$eth_usd}}';
                //     var name = 'ETH';
                //     getPrice(price);
                // } else if (crypto == 509) {
                //     var price = '{{$doge_usd}}';
                //     var name = 'DOGE';
                //     getPrice(price);

                // } else {
                //     var price = '{{$lite_usd}}';
                //     var name = 'LTE';
                //     getPrice(price);
                // }


              

            });
        });
    </script>
@stop