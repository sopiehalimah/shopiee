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
                        <form method="post" action="{{url('/product/save')}}" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <input type="hidden" class="form-control" name="author" value="{{ Auth::user()->name }}" required>
                        		<div class="form-group form-float">
                                   	<div class="form-line">
                                        <label>Code</label>
                                        <?php
                                            $a = rand(0,999);
                                            $b = rand(0,9);
                                            if ($a<100) {
                                              $code = "SH-".$b.substr($a,0,5);
                                              $randomkode = "SH-".$b.substr($a,0,5);
                                            }
                                            elseif ($a<100) {
                                              $code = "SH-".$b.$b.substr($a,0,4);
                                              $randomkode = "SH-".$b.$b.substr($a,0,4);
                                            }
                                            elseif ($a<10) {
                                              $code = "SH-".$b.$b.$b.substr($a,0,3);
                                              $randomkode = "SH-".$b.$b.$b.substr($a,0,3);
                                            }
                                            elseif ($a<10) {
                                              $code = "SH-".$b.$b.$b.$b.substr($a,0,2);
                                              $randomkode = "SH-".$b.$b.$b.$b.substr($a,0,2);
                                            }              
                                            else {
                                              $code = "SH".$a;
                                              $randomkode = "SH-".$a;
                                            }
                                        ?>
                                        <input type="text" class="form-control" name="code" required value="{{ $randomkode}}" readonly>
                                        
                                    </div>
                                </div>
			                	<div class="form-group form-float">
                                    <select class="form-control show-tick" name="code_parent">
                                        <option value="">Select Parent</option>
                                        @foreach($master_parents as $key => $master_parent)
                                        <option value="{{ $master_parent->code }}">{{ $master_parent->name }}</option>
                                        @endforeach
                                    </select>
				            	</div>
                                <div class="form-group form-float">
                                    <select class="form-control show-tick" name="code_kind">
                                        <option value="">Select Kind</option>
                                        @foreach($master_kinds as $key => $master_kind)
                                        <option value="{{ $master_kind->code }}">{{ $master_kind->code }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group form-float">
                                    <select class="form-control show-tick" name="code_type">
                                        <option value="">Select Type</option>
                                        @foreach($master_types as $key => $master_type)
                                        <option value="{{ $master_type->code }}">{{ $master_type->code }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group form-float">
                                    <select class="form-control show-tick" name="code_merk">
                                        <option value="">Select Merk</option>
                                        @foreach($master_merks as $key => $master_merk)
                                        <option value="{{ $master_merk->name }}">{{ $master_merk->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                    <label>Picture 1</label>
                                    <input type="file" name="pict_product1" class="form-control"   required>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                    <label>Picture 2</label>
                                    <input type="file" name="pict_product2" class="form-control"   required>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="name" required>
                                        <label class="form-label">Name</label>
                                    </div>
                                </div>
				            	<div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" class="form-control" name="price" required>
                                        <label class="form-label">Price</label>
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