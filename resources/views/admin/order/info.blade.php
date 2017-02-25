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
                            <h2 style="color: #006064;"">
                                Detail Order Info
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
                        @foreach($data1 as $to)
                        <form method="post" action="{{url('/email/send/'.$to->code_order)}}" enctype="multipart/form-data" style="padding-bottom: 30px;">
                        {!! csrf_field() !!}
                            
                                <div class="form-group form-float">

                                    <div class="form-line">

                                        <label>To</label>
                                        
                                        <input type="text" class="form-control" name="id_user" value="{{ $to->id_user }}" required>
                                       
                                    </div>
                                </div>

                                <br>
                                <h1>
                                    <input type="hidden" class="form-control" name="code_order" value="{{ $to->code_order }}" required>
                                    <input type="hidden" class="form-control" name="code_shipping" value="{{ $to->code_shipping }}" required>

                                    #{{$to->code_order}}
                                </h1>
                                <br>
                                <br>
                             @endforeach
                                
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>

                                        <th>Picture</th>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Subtotal</th>

                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $order)
                                    <tr>
                                        <td>
                                            <input type="hidden" class="form-control" name="pict_product1" value="{{ $order->pict_product1 }}" required>
                                            <img src="{{ url('pict_product1/'.$order->pict_product1) }}" alt="" style="max-width:100%;height: 100px;">
                                        </td>
                                        <td>
                                            <input type="hidden" class="form-control" name="name" value="{{ $order->name }}" required>
                                            {{$order->name}}
                                        </td>
                                         <td>
                                            <input type="hidden" class="form-control" name="kuantitas" value="{{ $order->kuantitas}}" required>
                                            {{ $order->kuantitas }}
                                        </td>
                                        <td>
                                            <input type="hidden" class="form-control" name="price" value="{{ $order->price}}" required>
                                            {{ "Rp.".number_format($order->price,0,',','.').",-" }}
                                        </td>
                                        <td>
                                            {{ "Rp.".number_format($order->price*$order->kuantitas,0,',','.').",-" }}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                @foreach($data2 as $total)
                                        <tr>
                                            <th colspan="4">Subtotal</th>
                                            <th>
                                                <input type="hidden" class="form-control" name="subtotal" value="{{ $total->sub_total }}" required>
                                                {{ "Rp.".number_format($total->sub_total,0,',','.').",-" }}    
                                            </th>
                                        </tr>
                                        <tr>
                                            <th colspan="4">Shipping Cost</th>
                                            <th>
                                                <input type="hidden" class="form-control" name="ongkir" value="{{ $total->ongkir }}" required>
                                                {{ "Rp.".number_format($total->ongkir,0,',','.').",-" }}    
                                            </th>
                                        </tr>
                                        <tr>
                                            <th colspan="4">Total</th>
                                            <th>
                                                <input type="hidden" class="form-control" name="total" value="{{ $total->total }}" required>
                                                {{ "Rp.".number_format($total->total,0,',','.').",-" }}

                                            </th>
                                        </tr>
                                @endforeach
                                </tfoot>
                            </table>
                            <br>
                            <div class="form-group form-float">
                                <button type="submit" class="btn btn-primary waves-effect pull-right">Send Mail</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
                                       
        </div>
    </section>


@endsection

