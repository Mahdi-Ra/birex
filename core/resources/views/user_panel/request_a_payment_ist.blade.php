@extends('front.layout.master')
@section('style')

@stop
@section('body')
    <div class="row  padding-pranto-top padding-pranto-bottom">

        @if (session('error'))
            <div class="col-md-12">
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong class="col-md-12"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Alert!</strong>
                    {{session('error')}}
                </div>
            </div>
        @endif


        <div class="col-md-12">

            <div class="card">

                <div class="card-header">
                    <h4>{{$title}}</h4>
                    <a href="{{route('user.request_a_payment')}}" class="btn btn-primary btn-block"
                       style="color: white">Create Request Payment</a>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-light">
                            <tr>
                                <th>ID</th>
                                <th>Amount</th>
                                <th>Wallet Address</th>
                                <th>Status</th>
                                <th>Created At</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($rp as $data)

                                <tr>
                                    <td>{{$data->id}}</td>

                                    <td>
                                        {{
                                            sprintf("%.8f", floor((float)$data->amount  * pow(10, 8)) / pow(10, 8)), round((float)$data->amount , 8)
                                        }}
                                    </td>
                                    <td>{{$data->wallet}}</td>
                                    <td>
                                        @if($data->state==0)
                                            <button class="btn btn-warning btn-block"
                                                    style="color: white">Not Approved
                                            </button>
                                        @else
                                            <button class="btn btn-success btn-block"
                                                    style="color: white">Approved
                                            </button>
                                        @endif

                                    </td>
                                    <td>{{$data->date}}</td>
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