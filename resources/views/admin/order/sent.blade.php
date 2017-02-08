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
                                TABLE ORDER
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
                                        <th>Total</th>
                                        <th>Evidence</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $order)
                                    <tr>
                                        <td>{{$order->code_order}}</td>
                                        <td>{{$order->id_user}}</td>
                                        <td>{{ "Rp.".number_format($order->total,0,',','.').",-" }}</td>
                                        <td>{{$order->evidence}}</td>
                                        <td>
                                            @if($order->status == 'accepted')
                                            <form action="{{url('/sent/'.$order->code_order)}}" method="post">
                                                {!! csrf_field() !!}

                                            <input type="hidden" name="status" value="sent">
                                            <button type="submit" class="btn btn-success waves-effect">Send Order</button>
                                            <input type="hidden" name="id" value="{{ $order->id }}">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="id_user" value="{{$order->id_user}}">
                                            <input type="hidden" name="code_order" value="{{$order->code_order}}">
                                            <input type="hidden" name="code" value="{{$order->code}}">
                                            <input type="hidden" name="code_parent" value="{{$order->code_parent}}">
                                            <input type="hidden" name="code_kind" value="{{$order->code_kind}}">
                                            <input type="hidden" name="code_type" value="{{$order->code_type}}">
                                            <input type="hidden" name="code_merk" value="{{$order->code_merk}}">
                                            <input type="hidden" name="pict_product1" value="{{$order->pict_product1}}">
                                            <input type="hidden" name="pict_product2" value="{{$order->pict_product2}}">
                                            <input type="hidden" name="name" value="{{$order->name}}">
                                            <input type="hidden" name="desc" value="{{$order->desc}}">
                                            <input type="hidden" name="price" value="{{$order->price}}">
                                            <input type="hidden" name="slug" value="{{$order->slug}}">
                                            <input type="hidden" name="status" value="accepted">
                                            <input type="hidden" name="kuantitas" value="{{$order->kuantitas}}">

                                            <input type="hidden" name="subtotal" value="{{$order->subtotal}}">
                                            <input type="hidden" name="total" value="{{$order->total}}">
                                            <input type="hidden" name="status" value="{{$order->accepted}}">

                                            </form>
                                            @else
                                            <button type="button" class="btn bg-grey waves-effect">Sent</button>
                                            @endif
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