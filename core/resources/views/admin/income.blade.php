@extends('admin.layout.master')
@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title ">{{$page_title}}</h3>
                <div class="tile-body">
                    <hr>
                    <strong> All Income To Now  :  {{App\Income::all()->sum('value')}} BTC </strong>
                    <hr>
                        <form method="post">
                            @csrf
                            From Date: <input required class="btn btn-info bold uppercase" type="text" name="from" id="aaa">
                            To Date: <input required class="btn btn-primary bold uppercase" type="text" name="to" id="aa">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <button class="btn btn-success bold uppercase"> Submit</button>
                        </form>
                        
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                        
                            <div class="tile">
                                
                                @if(!isset($from)||!isset($to))
                                <h3 class="tile-title">Last 30 Days Income</h3>
                                @else
                                <h3 class="tile-title">From : {{$from}} - To: {{$to}}</h3>
                                @endif
                
                                <div id="graph_line" ></div>
                            </div>
                
                        </div>
                        
                        <div class="col-md-12">
                        
                            <div class="tile">
                                  
                                @if(!isset($from)||!isset($to))
                                <h3 class="tile-title">Last 30 Days Income Transaction Log</h3>
                                @else
                                <h3 class="tile-title">From : {{$from}} - To: {{$to}}</h3>
                                @endif
                               
                
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
                            @foreach($trans as $data)
                                <tr>
                                    <td>
                                        <a href="{{route('user.single', $data->user->id)}}">
                                            {{$data->user->username}}
                                        </a>
                                    </td>

                                    <td>{{$data->trx}}</td>
                                    <td>
                                        
                                    {{
                                        sprintf("%.8f", floor((float)$data->amount  * pow(10, 8)) / pow(10, 8)), round((float)$data->amount , 8)
                                    
                                    }}
                                        
                                    </td>
                                    <td>
                                 
                                  {{   sprintf("%.8f", floor((float)$data->main_amo  * pow(10, 8)) / pow(10, 8)), round((float)$data->main_amo , 8)}}
                                 
                                     
                                    </td>
                                    <td>
                                        {{$data->charge}}
                                        </td>
                                    <td>{{$data->title}}</td>
                                    <td>{{$data->created_at}}</td>
                                </tr>
                            @endforeach
                            <tbody>
                        </table>
                        {{$trans->links()}}
                    </div>
                            </div>
                
                        </div>
                    </div>
                    
                    <hr>
                     
                  
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')

 <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script>
        $(document).ready(function () {
            new Morris.Line({
            // ID of the element in which to draw the chart.
            element: 'graph_line',
            // Chart data records -- each entry in this array corresponds to a point on
            // the chart.
            data: {!! $monthly_play !!},
           
            // The name of the data record attribute that contains x-values.
            xkey: 'date',
            // A list of names of data record attributes that contain y-values.
            ykeys: ['value'],
            // Labels for the ykeys -- will be displayed when you hover over the
            // chart.
            labels: ['value','date']
            });
        });
    </script>
@stop