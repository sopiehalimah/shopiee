@extends('layout.apps')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>MODULS</h2>
            </div>

            <!-- CKEditor -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2 style="color: #006064;">
                                CUSTOMERS
                                <small>Edit Customers </small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="{{url('/blog/add')}}">Add Article</a></li>
                                        <li><a href="{{url('/blog/table')}}">View Table</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                        <form method="post" action="{{url('/customer/update')}}" enctype="multipart/form-data" style="padding-bottom: 30px;">
                        {!! csrf_field() !!}

                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="row clearfix">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="image">
                                            <img src="{{ url('pict_user/'.$data->pict_user) }}" width="250" height="250" alt="User" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                        <input type="file" name="pict_user" value="{{ $data->pict_user }}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Name</label>
                                            <input type="text" class="form-control" name="name" value="{{$data->name}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email" value="{{$data->email}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="datepicker form-control" placeholder="Please choose a date...">
                                        </div>
                                    </div>
                                    <div class="demo-radio-button">
                                        <label>Gender</label>
                                        <br>
                                        <input name="gender" type="radio" class="with-gap" id="radio_3" value="Male" checked="{{$data->gender}}" />
                                        <label for="radio_3">Male</label>
                                        <input name="gender" type="radio" id="radio_4" class="with-gap" value="Female" checked="{{$data->gender}}"/>
                                        <label for="radio_4">Female</label>
                                    </div>
                                        
                                </div>
                            </div>
                                <div class="form-group form-float">
                                <button type="submit" class="btn btn-primary waves-effect pull-right">SUBMIT</button>
                                </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# CKEditor -->
        </div>
    </section>


@endsection