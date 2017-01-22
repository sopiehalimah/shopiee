@extends('layout.apps')

@section('content')
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    DATATABLES
                    <small>TABLE ORDER</small>
                </h2>
            </div>

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                EXPORTABLE TABLE
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
                                        <th>Send Mail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $order)
                                    <tr>
                                        <td>{{$order->code_order}}</td>
                                        <td>{{$order->id_user}}</td>
                                        <td>
                                            <button type="button" class="btn bg-red waves-effect" data-toggle="modal" data-target="#defaultModal">
                                                <i class="material-icons">print</i> Send Mail
                                            </button>
                                             <a href="{{url('/order/mail/'.$order->code_order)}}" class="btn bg-red waves-effect">
                                                <i class="material-icons">print</i> Send Mail
                                            </a>
                                            

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
                                        <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="defaultModalLabel">Modal title</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sodales orci ante, sed ornare eros vestibulum ut. Ut accumsan
                                                        vitae eros sit amet tristique. Nullam scelerisque nunc enim, non dignissim nibh faucibus ullamcorper.
                                                        Fusce pulvinar libero vel ligula iaculis ullamcorper. Integer dapibus, mi ac tempor varius, purus
                                                        nibh mattis erat, vitae porta nunc nisi non tellus. Vivamus mollis ante non massa egestas fringilla.
                                                        Vestibulum egestas consectetur nunc at ultricies. Morbi quis consectetur nunc.
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-link waves-effect">SAVE CHANGES</button>
                                                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
        </div>
    </section>

@endsection