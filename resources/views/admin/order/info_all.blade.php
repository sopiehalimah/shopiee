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
                            <h2 style="color: #006064;"">
                                Mail Info Order
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
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                        <th>Code Order</th>
                                        <th>Name User</th>
                                        <th>Status</th>
                                        <th>Proof of payment</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $order)
                                    <tr>
                                        <td>{{$order->code_order}}</td>
                                        <td>{{$order->id_user}}</td>
                                        <td>{{$order->status}}</td>
                                        <td><img src="{{ url('evidence/'.$order->evidence) }}" alt="" style="width: 200px;height: 200px;"></td>
                                        <td><a href="{{url('/order/mail/'.$order->code_order)}}" class="btn bg-red waves-effect">Detail Order</td>
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