@extends('layout.apps')

@section('content')
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    DATATABLES
                </h2>
            </div>

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2 style="color: #006064;">
                                TABLE MASTER TYPE
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">library_add</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="{{url('/master_type/add')}}">Add Master Type</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Code</th>
                                        <th>Code Parent</th>
                                        <th>Code Kind</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1; ?>
                                @foreach($data as $type)
                                    <tr>
                                        <td>{{$i++}}.</td>
                                        <td>{{$type->code}}</td>
                                        <td>{{$type->code_parent}}</td>
                                        <td>{{$type->code_kind}}</td>
                                        <td>{{$type->name}}</td>
                                        <td>
                                            <a href="{{ url('/master_type/edit/'.$type->id) }}" class="btn btn-primary waves-effect">Edit</a>
                                            <a href="{{ url('/master_type/delete/'.$type->id) }}" onclick="return confirm('Delete?')" class="btn bg-red waves-effect">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
    </section>

@endsection