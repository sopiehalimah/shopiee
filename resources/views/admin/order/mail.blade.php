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
                            <h2>
                                PRODUCT
                                <small>ADD PRODUCT</small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                        <form method="post" action="{{url('/sendmail')}}" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="id_user" value="{{$data->id_user}}">
                                        <label class="form-label">To</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
	                                <label class="form-label">Desc</label>
	                            	<textarea id="editor1" name="desc" required></textarea>
                            	</div>
                            	<div class="form-group form-float">
                            	<button type="submit" class="btn btn-primary waves-effect">SUBMIT</button>
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