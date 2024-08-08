@extends('admin.layout.master')
@section('css')

    <style>
        button#btn_add {
            margin-bottom: 10px;
        }
    </style>
@stop

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">


                    <div class="form-group error">
                        <div class="col-md-12">

                            <div class="card">

                                <div class="card-header">

                                </div>
                                <form id="uploadDetail" class="form-horizontal" method="post"
                                      enctype="multipart/form-data">

                                    @csrf

                                    <div class="card-body">
                                        <div class="form-group">
                                            <strong><i class="fa fa-comment"></i> Send Message to User
                                            </strong>
                                            <textarea name="message" class="form-control" id="message"
                                                      rows="3"></textarea>
                                        </div>

                                        <div class="form-group" id="pranto">
                                            <input type="file" class="form-control" name="image">
                                            <small class="col-md-12"><i class="fa fa-picture-o"></i> Attach document
                                                (PNG ,
                                                JPG and JPEG files only, take a screenshot if necessary):
                                            </small>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" id="submit" class="btn btn-secondary">Send</button>
                                    </div>
                                </form>

                            </div>

                            <br>

                            <div class="card">

                                <div class="card-header">
                                    <strong class="col-md-12">Messages:</strong>
                                </div>

                                <div class="card-body">
                                    <div id="oww" class="oww">
                                        <div id="oww" class="oww">

                                            @foreach($complaints as $data)

                                                <div class="col-md-12">
                                                    <div class="alert alert-info">
                                                        <strong> @if($data->from_ == 0)
                                                                You @else User @endif</strong>
                                                        <p><a href="http://bircoin.me/assets/images/attach/"
                                                              download=""></a>
                                                        </p>
                                                        <p>
                                                            {{$data->message}}
                                                        </p>
                                                        @if(!is_null($data->img))
                                                            <img width="400" height="350"
                                                                 src="https://bircoin.co/assets/images/attach/{{$data->img}}">
                                                        @endif
                                                    </div>
                                                </div>

                                            @endforeach


                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div></div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>


@stop