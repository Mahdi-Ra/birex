@extends('front.layout.master')
@section('style')

@stop
@section('body')
    <div class="row  padding-pranto-top padding-pranto-bottom">
        <div class="col-md-12">

            <div class="card">

                <div class="card-header">
                    <h4>{{$title}}</h4>
                </div>

                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Created at</th>
                                <th>Trade type</th>
                                <th>Trading partner</th>
                                <th>Transaction status</th>
                                <th>Price</th>
                                <th>Trade amount</th>
                                <th>More</th>
                                <th>Rate</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($addvertise as $data)
                                <tr>
                                    <td>{{$data->trans_id}}</td>
                                    <td>{{$data->created_at}}</td>
                                    <td>{{$data->add_type==1 ? 'Buy':'Sell'}}</td>
                                    @if(request()->path() == 'user/close/trade' || request()->path() == 'user/open/trade')
                                        <td><a href="{{route('user.profile.view', $data->to_user->username)}}"
                                               style="color: black"><strong>{{$data->to_user->username}}</strong></a>
                                        </td>
                                    @else
                                        <td><a href="{{route('user.profile.view', $data->from_user->username)}}"
                                               style="color: black"><strong>{{$data->from_user->username}}</strong></a>
                                        </td>
                                    @endif
                                    <td>
                                        @if($data->status == 0)
                                            <span class="label label-warning">Processing</span>
                                        @elseif($data->status == 1)
                                            <span class="label label-success">Complete</span>
                                        @elseif($data->status == 2)
                                            <span class="label label-danger">Cancelled</span>
                                        @endif
                                    </td>
                                    <td>{{$data->amount_to * App\Price::find($data->currency->name)->am}} {{$data->currency->name}}</td>
                                    
                                    <td>
                                     
                                        {{
                                        sprintf("%.8f", floor($data->amount_to * pow(10, 8)) / pow(10, 8)),round($data->amount_to, 8)
                                        }}
                                        
                                        {{$data->gateway->currency}}
                                    </td>
                                    
                             
                                    
                                    <td><a href="{{route('deal_message',$data->trans_id)}}"
                                           class="btn btn-primary btn-block">More</a></td>

                                    @if(($data->from_user_id==Auth::user()->id && $data->from_user_send==false)||
                                    ($data->to_user_id==Auth::user()->id && $data->to_user_send==false)
                                    )
                                        <td>
                                            <a href="{{route('trade.rate',$data->id)}}"
                                               class="btn btn-success btn-block">Rate</a>
                                        </td>
                                    @else
                                        <td>
                                            <button disabled
                                                    class="btn btn-success btn-block">Rate
                                            </button>
                                        </td>
                                    @endif

                                    @if($data->status!=1)
                                        <td>
                                            <a href="{{route('complainttransactions',$data->id)}}"
                                               class="btn btn-danger btn-block">Complaint</a>
                                        </td>
                                    @else
                                        <td>
                                            <button disabled
                                                    class="btn btn-danger btn-block">Complaint
                                            </button>
                                        </td>
                                    @endif

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{$addvertise->links()}}

                </div>

            </div>

        </div>
    </div>
@stop

@section('script')

@stop