@extends('front.layout.master')
@section('style')

@stop
@section('body')

    <nav aria-label="breadcrumb" class="padding-pranto-top">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <h2>{{$type == 1 ? 'Sell':'Buy'}} Coins</h2>
            </li>
        </ol>
    </nav>

    <div class="row padding-pranto-bottom">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table">
                    <thead class="thead-light">
                    <tr>
                        <th width="20%">Seller</th>
                        <th>Coin Name</th>
                        <th>Payment method</th>
                        <th>Price</th>
                        <th>Limits</th>
                        <th>Status</th>
                        <th>Detail</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($buy_btc as $data)
                        <!-- Cart Tr Start -->

                        <tr @if($data->min_amount >= $data->max_amount && $data->add_type == 1) style="display: none" @endif>
                            <td>{{$data->user->username}}</td>
                            <td>{{$data->gateway->name}}</td>
                            <td><img style="width: 30px;"
                                     src="{{asset('assets/images/crypto/'.$data->method->icon)}}"> {{$data->method->name}}
                            </td>
                             <td>{{ App\Price::find($data->currency->name)->am }} {{$data->currency->name}} / BTC</td>
                             <td>@if($data->add_type == 1)
                                    {{$data->min_amount.' BTC-'.$data->max_amount.' BTC'}}
                                @else
                                    {{$data->min_amount.' BTC-'.$data->max_amount.' BTC'}}
                                @endif
                            </td>
                            <td>

                                @if($data->trusted_sell == 1)
                                    <img src="/trusted_sell.png" width="40" height="40">
                                @endif
                            </td>

                            <td><a class="btn btn-primary"
                                   href="{{route('view', ['id'=>$data->id, 'payment'=>Replace($data->method->name)])}}">{{$type == 1 ? 'Sell':'Buy'}}</a>
                            </td>
                        </tr>
                        <!-- Cart Tr End -->
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-12 text-center">
            {{$buy_btc->links()}}
        </div>
    </div>
@stop

@section('script')

@stop