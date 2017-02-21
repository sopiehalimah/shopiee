@extends('layout.app')

@section('content')

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">

                    <ul class="breadcrumb">
                        <li><a href="{{url('/')}}">Home</a>
                        </li>
                        <li>My account</li>
                    </ul>

                </div>

                <div class="col-md-3">
                    <!-- *** CUSTOMER MENU ***
 _________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Customer section</h3>
                        </div>

                        <div class="panel-body">

                            <ul class="nav nav-pills nav-stacked">
                                <li class="active">
                                    <a href="{{url('/orders/history/user/'.Auth::User()->email)}}"><i class="fa fa-list"></i> My orders</a>
                                </li>
                                <li>
                                    <a href="{{url('/user/account/'.Auth::User()->id)}}"><i class="fa fa-user"></i> My account</a>
                                </li>
                                <li>
                                    <a href="{{url('/logout')}}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Logout</a>
                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                     {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <!-- /.col-md-3 -->

                    <!-- *** CUSTOMER MENU END *** -->
                </div>

                <div class="col-md-9">
                    <div class="box">
                        <h1>My account</h1>
                        <p class="lead">Change your personal details here.</p>
                        <p class="text-muted">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>

                        <hr>

                        <h3>Personal details</h3>
                        <form action="{{url('/update/member')}}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="row">
                                    <div class="col-sm-4">
                                        @if($data->pict_user == null)
                                        <div class="form-group">
                                            <div class="image">
                                                <img src="{{ url('admin/images/user.png')}}" width="250" height="250" alt="User" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-line">
                                            <input type="file" name="pict_user" value="{{ $data->pict_user }}" class="form-control">
                                            </div>
                                        </div>
                                        @else
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
                                        @endif
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <label for="firstname">Name</label>
                                            <input type="text" name="name" value="{{$data->name}}" class="form-control" id="firstname" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" value="{{$data->email}}"  class="form-control" id="email" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="firstname">Gender</label><br>
                                            <input name="gender" type="radio" class="with-gap" id="radio_3" value="Male" checked="{{$data->gender}}" />
                                            <label for="radio_3">Male</label>
                                            <span style="padding-left-left: 20px;"></span>
                                            <input name="gender" type="radio" id="radio_4" class="with-gap" value="Female" checked="{{$data->gender}}" />
                                            <label for="radio_4">Female</label>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary pull-right" style="margin-right: 50px;"><i class="fa fa-refresh"></i>Update</button>
                                </div>
                               
                                <!-- /.row -->
                        </form>
                    </div>
                </div>

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


@endsection