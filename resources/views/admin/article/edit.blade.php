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
                                ARTICLE
                                <small>Edit Article</small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="{{url('/article/add')}}">Add Article</a></li>
                                        <li><a href="{{url('/article/table')}}">View Table</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                        <form method="post" action="{{url('/article/update')}}" enctype="multipart/form-data" style="padding-bottom: 30px;">
                        {!! csrf_field() !!}
                        <input type="hidden" class="form-control" name="author" value="{{ Auth::user()->name }}" required>
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        		<div class="form-group form-float">
                                    <div class="form-line">

                                        <label>Title</label>
                                        <input type="text" class="form-control" name="title" value="{{$data->title}}" required>
                                    </div>
                                </div>
			                	<div class="form-group form-float">
                                    <label>Category</label>
                                    <select class="form-control show-tick" name="category_id">
                                        <option value="{{$data->category_id}}">{{$data->category_id}}</option>
                                        @foreach($categorys as $key => $category)
                                        <option value="{{ $category->name }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
				            	</div>
                                <div class="form-group form-float">
                                <div style="max-width: 50%;height: 10%;"><img class="img-thumbnail" src="{{ url('pict/'.$data->pict) }}">
                                </div>
                                </div>
				            	<div class="form-group form-float">
				            	 	<div class="form-line">
					                <input type="file" name="pict" value="{{ $data->pict }}" class="form-control">
					                </div>
			                	</div>
                                <div class="form-group form-float">
	                                <label class="form-label">Content</label>
	                            	<textarea id="editor1" name="content" value="{{$data->content}}" required>{{$data->content}}</textarea>
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