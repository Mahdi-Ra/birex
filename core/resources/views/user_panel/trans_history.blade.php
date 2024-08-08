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
                                <th>ID</th>
                                <th>Amount</th>
                                <th>After Balance</th>
                                <th>Charge</th>
                                <th>Detail</th>
                                <th>Created At</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($trans as $data)

                                <tr @if($data->type == '+') style="background-color:#dff0d8" @else style="background-color:#f2dede" @endif>
                                    <td>{{$data->trx}}</td>
                                    <td>
                                       
                                        {{
                                            sprintf("%.8f", floor((float)$data->amount  * pow(10, 8)) / pow(10, 8)), round((float)$data->amount , 8)
                                        }}
                                        
                                      
                                    </td>
                                    <td>
                                        {{
                                            sprintf("%.8f", floor((float)$data->main_amo  * pow(10, 8)) / pow(10, 8)), round((float)$data->main_amo , 8)
                                        }}
                                        
                                    </td>
                                    <td>{{$data->charge}}</td>
                                    <td>{{$data->title}}</td>
                                    <td>{{$data->created_at}}</td>
                                </tr>

                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    {{$trans->links()}}

                </div>

            </div>

        </div>
    </div>



@stop

@section('script')

@stop