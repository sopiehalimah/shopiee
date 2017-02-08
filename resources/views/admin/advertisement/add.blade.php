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
                                ADVERTISEMENT
                                <small>Add Advertisement</small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">format_list_bulleted</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="{{url('/advertisement/table')}}">View Table</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                        <form method="post" action="{{url('/advertisement/save')}}" enctype="multipart/form-data" style="padding-bottom: 30px;">
                        {!! csrf_field() !!}

			                	<div class="form-group form-float">
                                    <select class="form-control show-tick" name="category">
                                        <option value="">Select Category</option>
                                        @foreach($master_blogs as $key => $master_blog)
                                        <option value="{{ $master_blog->category }}">{{ $master_blog->category }}</option>
                                        @endforeach
                                    </select>
				            	</div>
				            	 <div class="form-group form-float">
				            	 	<div class="form-line">
					                <input type="file" name="pict_ad" class="form-control"   required>
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