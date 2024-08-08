


@extends('admin.layout.master')

@section('body')

    <div class="col-md-12">

        <div class="card">


            <div class="card-body">


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


            </div>
        </div>

    </div>

@endsection