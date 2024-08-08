@extends('admin.layout.master')

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title pull-left">Ads List</h3>
                <div class="pull-right icon-btn">

                </div>


                <div class="table-responsive">

                    <table class="table">
                        <thead class="thead-light">
                        <tr>
                            <th>Username</th>
                            <th>Mobile</th>
                            <th>GateWay Name</th>
                            <th>Min-Max</th>
                            <th>Raised Time</th>
                            <th>State</th>
                            <th>Trusted</th>
                            <th>Deposite Id</th>
                            <th>Reject Message</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($ads as $data)
                            <tr>
                                <td>{{\App\User::find($data->user_id)->username}}</td>
                                <td>{{\App\User::find($data->user_id)->phone}}</td>

                                <td>{{$data->gateway->name}}</td>

                                <td>{{$data->min_amount.'BTC -'. $data->max_amount.' BTC '}}</td>
                                <td>{{ ($data->created_at) }}</td>
                                <td>
                                    @if($data->status == -1)
                                        In Pending
                                    @elseif($data->status == 0)
                                        Accepted
                                    @endif
                                </td>
                                <td>
                                    @if($data->trusted_sell == 1)
                                        YES
                                    @elseif($data->trusted_sell == 0)
                                        NO
                                    @endif
                                </td>
                                <td>
                                    @if(is_null($data->deposite_id))
                                        Null
                                    @else
                                        {{$data->deposite_id}}
                                    @endif
                                </td>
                                <td>
                                    
                                    @if($data->reject == 0 && $data->status != 0)
                                        
                                        <input name="msgg"></input>
                                    @elseif($data->reject == 1)
                                        <input disabled name="msgg"></input>
                                        
                                    @endif
                                    
                                </td>
                                <td>
                                    <a href="{{route('admin.advertising', $data->id)}}"
                                       class="btn btn-info">Detail</a>
                                    @if($data->status == -1 && $data->reject != 1)
                                        <a href="{{route('admin.advertising.confirm', $data->id)}}"
                                           class="btn btn-success">Confirm</a>
                                    @elseif($data->status == 0)
                                        <button disabled class="btn btn-success">Confirmed</button>
                                    @endif
                                    
                                      
                                    @if($data->reject == 0 && $data->status != 0)
                                        
                                        <a href="{{route('admin.advertising.reject', $data->id)}}"
                                               class="btn btn-danger">Reject</a>
                                    @elseif($data->reject == 1)
                                        <button disabled class="btn btn-danger">Rejected</button>
                                        
                                    @endif
                                    
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>


{{$ads->links()}}
                </div>
            </div>
        </div>
    </div>


@endsection