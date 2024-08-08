@extends('admin.layout.master')

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title pull-left">Deposit List</h3>
                <div class="pull-right icon-btn">
                    <form method="POST" class="form-inline" action="">
                        {{csrf_field()}}
                        <input type="text" name="search" class="form-control" placeholder="Search">
                        <button class="btn btn-outline btn-circle  green" type="submit"><i
                                    class="fa fa-search"></i></button>

                    </form>
                </div>


                <div class="table-responsive">

                    <table class="table">
                        <thead class="thead-light">
                        <tr>
                            <th>Id</th>
                            <th>Username</th>
                            <th>Mobile</th>
                            <th>GateWay Name</th>
                            <th>Address</th>
                            <th>Amount</th>
                            <th>Tx</th>
                            <th>Raised Time</th>
                            <th>State</th>
                            <th>Ad</th>
                            
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($deposit as $data)
                            <tr>
                                <td>{{$data->id}}</td>
                                <td>{{\App\User::find($data->user_id)->username}}</td>
                                <td>{{\App\User::find($data->user_id)->phone}}</td>

                                <td>{{$data->gateway->name}}</td>

                                <td>{{ ($data->address) }}</td>
                                <td>
                                    {{
                                      sprintf("%.8f", floor((float)$data->amount  * pow(10, 8)) / pow(10, 8)), round((float)$data->amount , 8)
                                  
                                    }}
                                </td>
                                <td>{{ ($data->trx) }}</td>
                                <td>{{ ($data->created_at) }}</td>
                                <td>
                                    @if($data->status == -1)
                                        In Pending
                                    @elseif($data->status == 0)
                                        Accepted
                                    @endif
                                </td>
                                <td>
                                   {{$data->ad}}
                                </td>
                                <td>
                                    @if($data->status == -1)
                                        <a href="{{route('deposits', $data->id)}}"
                                           class="btn btn-success">Confirm</a>
                                           
                                       <a href="{{route('deposits_delete', $data->id)}}"
                                            class="btn btn-danger">Delete</a>
                                    @elseif($data->status == 0)
                                        <button disabled class="btn btn-success">Confirmed</button>
                                    @endif

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
{{$deposit->links()}}
                </div>
            </div>
        </div>
    </div>


@endsection