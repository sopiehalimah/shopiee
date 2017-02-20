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
                                MASTER TYPE
                                <small>Edit Master Type</small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="{{url('/master_type/add')}}">Add Master Type</a></li>
                                        <li><a href="{{url('/master_type/table')}}">View Table</a></li>
                                        
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                        <form method="post" action="{{url('/master_type/update')}}" enctype="multipart/form-data" style="padding-bottom: 30px;">
                        {!! csrf_field() !!}
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="name" value="{{$data->name}}" required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary waves-effect pull-right">SUBMIT</button>
                              
                                
                        </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# CKEditor -->
        </div>
    </section>


@endsection