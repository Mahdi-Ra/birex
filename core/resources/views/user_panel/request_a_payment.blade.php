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

                    <div class="col-md-12">

                        <div class="card">

                            <div class="card-header">

                            </div>
                            <form method="post" id="uploadDetail" class="form-horizontal">
                                @csrf
                                <div class="card-body">
                                    <strong><i class="fa fa-hoyu"></i> Your BTC Balance :</strong>{{$user_balance}}
                                    <br>
                                    <br>
                                    <div class="form-group col-md-8">
                                        <strong><i class="fa fa-hoyu"></i> Please Enter Amount BTC For Request </strong>
                                        <input id="amount1" name="amount" class="form-control" type="text" required>
                                    </div>

                                    <div class="form-group col-md-8">
                                        <strong><i class="fa fa-add"></i> Please Enter wallet Address </strong>
                                        <input name="wallet" class="form-control" type="text" required>
                                    </div>

                                    <div class="form-group col-md-8">
                                        <input id="checkbox" name="checkbox" type="checkbox">
                                        <strong><i class="fa fa-add"></i> I accept all conditions and take on any
                                            potential problems </strong>
                                    </div>

                                </div>
                                <div class="card-footer">
                                    <button id="b" type="submit" class="btn btn-secondary" disabled>Send</button>
                                </div>
                            </form>

                        </div>


                    </div>
                </div>

            </div>

        </div>
    </div>
@stop

@section('script')
    <script>
        $('#amount1').keyup(function () {
            if ($('#amount1').val() > {{$user_balance}}) {
                $('#amount1').val({{$user_balance}});
            }
        });
        $('#amount1').mousedown(function () {
            if ($('#amount1').val() > {{$user_balance}}) {
                $('#amount1').val({{$user_balance}});
            }
        });
        $('#amount1').mouseup(function () {
            if ($('#amount1').val() > {{$user_balance}}) {
                $('#amount1').val({{$user_balance}});
            }
        });
        $('#checkbox').change(function () {

            if ($('#checkbox').is(':checked')) {

                $('#b').prop('disabled', false);
            } else {
                $('#b').prop('disabled', true);
            }
        });
    </script>
@stop