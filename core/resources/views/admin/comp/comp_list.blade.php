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
                            <th>From Username</th>
                            <th>Complaint User</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($comps as $data)
                            <tr>
                                <td><a href="user/{{\App\User::find($data[0]->from_)->id}}">{{\App\User::find($data[0]->from_)->username}}</a></td>
                                <td><a href="user/{{\App\User::find($data[0]->complaint_user_id)->id}}">{{\App\User::find($data[0]->complaint_user_id)->username}}</a></td>

                                <td>{{$data[0]->date}}</td>
                                <td>@if(\App\AdvertiseDeal::find($data[0]->addvertise_id)->comp_state)
                                <button href="{{route('admin.complaints', $data[0]->addvertise_id)}}"
                                       class="btn btn-info">Free</button>
                                @else
                                <button href="{{route('admin.complaints', $data[0]->addvertise_id)}}"
                                       class="btn btn-info">Lock</button>
                                @endif
                                </td>
                                <td>
                                    <a href="{{route('admin.complaints', $data[0]->addvertise_id)}}"
                                       class="btn btn-info">Detail</a>
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