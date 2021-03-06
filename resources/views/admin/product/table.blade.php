@extends('layout.apps')

@section('content')
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    DATATABLES
                    <small>TABLE PRODUCT</small>
                </h2>
            </div>

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2 style="color: #006064;">
                                TABLE MASTER PRODUCT
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">library_add</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="{{url('/product/add')}}">Add Master Product </a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                        <th>Code</th>
                                        <th>Name</th>
                                        <th>Pict</th>
                                        <th>Price</th>
                                        <th>Desc</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $product)
                                    <tr>
                                        <td>{{$product->code}}</td>
                                        <td>{{$product->name}}</td>
                                        <td><img src="{{ url('pict_product1/'.$product->pict_product1) }}" alt="" style="max-width:100%;height: 40px;"></td>
                                        <td>{{$product->price}}</td>
                                        <td><?php echo substr("$product->desc", 0,100);?>...</td>
                                        <td>
                                            <a href="{{ url('/product/edit/'.$product->id) }}" class="btn btn-primary waves-effect">Edit</a>
                                            <a href="{{ url('/product/delete/'.$product->id) }}" onclick="return confirm('Delete?')" class="btn bg-red waves-effect">Delete</a>
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