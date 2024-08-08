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

                                <th>GateWay Name</th>
                                <th>Address</th>
                                <th>Amount</th>
                                <th>Trx</th>
                                <th>State</th>
                                <th>Raised Time</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($deposit as $data)
                                <tr>
                                    <td>{{$data->gateway->name}}</td>

                                    <td>{{ ($data->address) }}</td>
                                    <td>
                                          {{
                                            sprintf("%.8f", floor((float)$data->amount * pow(10, 8)) / pow(10, 8)),round((float)$data->amount, 8)
                                          
                                            
                                        }}
                                     
                                    </td>
                                    
                                    <td>{{ ($data->trx) }}</td>
                                    <td>
                                        @if($data->status == -1)
                                            In Pending
                                        @elseif($data->status == 0)
                                            Accepted
                                        @endif
                                    </td>
                                    <td>{{ ($data->created_at) }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>


                </div>

            </div>

        </div>
    </div>
@stop

@section('script')

@stop