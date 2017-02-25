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
                                MASTER PRODUCT
                                <small>Edit Master Product</small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="{{url('/product/add')}}">Add Master Product</a></li>
                                        <li><a href="{{url('/product/table')}}">View Table</a></li>
                                        
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                        <form method="post" action="{{url('/product/update')}}" enctype="multipart/form-data" style="padding-bottom: 30px;">
                        {!! csrf_field() !!}
                        <input type="hidden" class="form-control" name="author" value="{{ Auth::user()->name }}" required>
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        
                        		<div class="form-group form-float">
                                   	<div class="form-line">
                                        <label>Code</label>
                                        <input type="text" class="form-control" name="code" required value="{{ $data->code }}" readonly>
                                        
                                    </div>
                                </div>
			                	<div class="form-group form-float">
                                    <label>Select Master Type</label>
                                    <select class="form-control show-tick" name="master_type_id">
                                        @foreach($master_types as $key => $master_type)
                                        <option value="{{ $master_type->id }}">{{ $master_type->name }}</option>
                                        @endforeach
                                    </select>
				            	</div>
                                <div class="form-group form-float">
                                    <label>Select Type</label>
                                    <select class="form-control show-tick" name="type_id">
                                        @foreach($types as $key => $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group form-float">
                                    <label>Select Sub Type</label>
                                    <select class="form-control show-tick" name="sub_type_id">
                                        @foreach($sub_types as $key => $sub_type)
                                        <option value="{{ $sub_type->id }}">{{ $sub_type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group form-float">
                                    <label>Select Merk</label>
                                    <select class="form-control show-tick" name="code_merk">
                                        @foreach($master_merks as $key => $master_merk)
                                        <option value="{{ $data->code_merk }}">{{ $master_merk->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group form-float">
                                <div style="max-width: 50%;height: 10%;"><img class="img-thumbnail" src="{{ url('pict_product/'.$data->pict_product) }}">
                                </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                    <label>Picture 1</label>
                                    <input type="file" name="pict_product1" value="{{ $data->pict_product1 }}" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                    <label>Picture 2</label>
                                    <input type="file" name="pict_product2" value="{{ $data->pict_product2 }}" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                    <label>Picture 3</label>
                                    <input type="file" name="pict_product3" value="{{ $data->pict_product3 }}" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="name"  value="{{ $data->name }}"  required>
                                    </div>
                                </div>
				            	<div class="form-group form-float">
                                    <div class="form-line">
                                        <label>Price</label>
                                        <input type="number" class="form-control" name="price"  value="{{ $data->price }}" required>
                                    </div>
                                </div>
                                <div class="form-group form-float">
	                                <label class="form-label">Desc</label>
	                            	<textarea id="editor1" name="desc" value="{{$data->desc}}" required>{{$data->desc}}</textarea>
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