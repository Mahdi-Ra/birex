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
                            <th>Phone</th>
                            <th>Amount</th>
                            <th>Wallet Address</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>TRX User</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($rp as $data)
                            <tr>
                                <td>{{\App\User::find($data->user_id)->username}}</td>
                                <td>{{\App\User::find($data->user_id)->phone}}</td>

                                <td>{{$data->amount}}</td>


                                <td>{{($data->wallet)}}</td>

                                <td>
                                    @if($data->state == 0)
                                        In Pending
                                    @elseif($data->state == 1)
                                        Accepted
                                    @endif
                                </td>
                                <td>{{ ($data->date)}}</td>
                                <td>
                                    <a href="{{route('withdrawal_request_trx', $data->user_id)}}"
                                           class="btn btn-info">View TRX
                                    </a>
                                </td>
                                <td>
                                    @if($data->state == 0)
                                        <a href="{{route('admin.withdrawal.confirm', $data->id)}}"
                                           class="btn btn-success">Confirm</a>
                                    @elseif($data->state == 1)
                                        <button disabled class="btn btn-success">Confirmed</button>
                                    @endif

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>


@endsection