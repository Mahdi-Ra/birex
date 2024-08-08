@extends('admin.layout.master')

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title ">{{$page_title}}</h3>
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover order-column" id="">
                            <thead>
                            <tr>
                                <th>Username</th>
                                <th>ID</th>
                                <th>Amount</th>
                                <th>After Balance</th>
                                <th>Charge</th>
                                <th>Detail</th>
                                <th>Created At</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($deposits as $data)
                                <tr>
                                    <td>
                                        <a href="{{route('user.single', $data->user->id)}}">
                                            {{$data->user->username}}
                                        </a>
                                    </td>

                                    <td>{{$data->trx}}</td>
                                    <td>
                                        {{
                                            sprintf("%.8f", floor($data->amount  * pow(10, 8)) / pow(10, 8)), round($data->amount , 8)
                                        }}
                                       
                                    </td>
                                    <td>
                                        {{
                                            sprintf("%.8f", floor($data->main_amo  * pow(10, 8)) / pow(10, 8)), round($data->main_amo , 8)
                                        }}
                                     
                                    </td>
                                    <td>{{$data->charge}}</td>
                                    <td>{{$data->title}}</td>
                                    <td>{{$data->created_at}}</td>
                                </tr>
                            @endforeach
                            <tbody>
                        </table>

                        {!! $deposits->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection