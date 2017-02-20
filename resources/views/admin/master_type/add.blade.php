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
                                <small>Add Master Type</small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">format_list_bulleted</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="{{url('/master_type/table')}}">View Table</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        @if(count($data) == 5)
                        <div class="body">
                        Tidak bisa lebih dari 5
                        </div>
                        @else
                        <div class="body">
                        <form method="post" action="{{url('/master_type/save')}}" enctype="multipart/form-data" style="padding-bottom: 30px;">
                        {!! csrf_field() !!}
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="name" required>
                                        <label class="form-label">Name</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary waves-effect pull-right">SUBMIT</button>
                              
                                
                        </form>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <!-- #END# CKEditor -->
        </div>
    </section>


@endsection