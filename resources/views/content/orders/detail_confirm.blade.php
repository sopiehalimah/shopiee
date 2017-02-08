@extends('layout.app')

@section('content')

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">

                    <ul class="breadcrumb">
                        <li><a href="{{url('/')}}">Home</a>
                        </li>
                        <li><a href="{{url('/orders/history')}}">My orders</a>
                        </li>
                    </ul>

                </div>


                <div class="col-md-12" id="customer-order">
                    <div class="box" style="padding-bottom: 50px;">
                    <form action="{{url('/payment/evidence/'.$orders->code_order)}}" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}


                    @foreach($data1 as $to)
                        <h1>#{{$to->code_order}}</h1>

                        <p class="lead">Order #{{$to->code_order}} was placed on <strong>{{ date_format(date_create($to->created_at),"D, h M Y") }}</strong> and is currently <strong>Being prepared</strong>.</p>
                        <p class="text-muted">If you have any questions, please feel free to <a href="{{url('/contact')}}">contact us</a>, our customer service center is working for you 24/7.</p>

                        <hr>
                    @endforeach
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th colspan="3">Product</th>
                                        <th>Quantity</th>
                                        <th>Unit price</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @foreach($data as $order)
                                    <tr>
                                        <td>
                                            <a href="#">
                                                <img src="{{ url('pict_product1/'.$order->pict_product1) }}" alt="White Blouse Armani" style="max-width:100%;height: 50px;">
                                            </a>
                                        </td>
                                        <td><a href="#">{{ $order->name }}</a>
                                        </td>
                                        <td></td>
                                        <td>{{ $order->kuantitas }}</td>
                                        <td>{{ "Rp.".number_format($order->price,0,',','.').",-" }}</td>
                                        <td>{{ "Rp.".number_format($order->price,0,',','.').",-"*$order->kuantitas }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                @foreach($data2 as $total)
                                    <tr>
                                        <th colspan="5" class="text-right">Order subtotal</th>
                                        <th>{{ "Rp.".number_format($order->subtotal,0,',','.').",-" }}</th>
                                    </tr>
                                    <tr>
                                        <th colspan="5" class="text-right">Shipping and handling</th>
                                        <th>{{ "Rp.".number_format($order->ongkir,0,',','.').",-" }}</th>
                                    </tr>
                                    <tr>
                                        <th colspan="5" class="text-right">Total</th>
                                        <th>{{ "Rp.".number_format($order->total,0,',','.').",-" }}</th>
                                    </tr>
                                @endforeach
                                </tfoot>
                            </table>

                        </div>
                        <!-- /.table-responsive -->

                        <div class="row addresses">
                            
                            <div class="col-md-6">
                            @foreach($shipping as $ship)
                                <h2>Shipping address</h2>
                                <p>{{$ship->name}}
                                    <br>13/25 New Avenue
                                    <br>New Heaven
                                    <br>45Y 73J
                                    <br>England
                                    <br>Great Britain</p>
                            @endforeach
                            </div>
                            
                        </div>

                                            <input type="hidden" name="id" value="{{ $orders->id }}">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="id_user" value="{{$orders->id_user}}">
                                            <input type="hidden" name="code_order" value="{{$orders->code_order}}">
                                            <input type="hidden" name="code" value="{{$orders->code}}">
                                            <input type="hidden" name="code_parent" value="{{$orders->code_parent}}">
                                            <input type="hidden" name="code_kind" value="{{$orders->code_kind}}">
                                            <input type="hidden" name="code_type" value="{{$orders->code_type}}">
                                            <input type="hidden" name="code_merk" value="{{$orders->code_merk}}">
                                            <input type="hidden" name="pict_product1" value="{{$orders->pict_product1}}">
                                            <input type="hidden" name="pict_product2" value="{{$orders->pict_product2}}">
                                            <input type="hidden" name="name" value="{{$orders->name}}">
                                            <input type="hidden" name="desc" value="{{$orders->desc}}">
                                            <input type="hidden" name="price" value="{{$orders->price}}">
                                            <input type="hidden" name="slug" value="{{$orders->slug}}">
                                            <input type="hidden" name="status" value="accepted">
                                            <input type="hidden" name="kuantitas" value="{{$orders->kuantitas}}">

                                            <input type="hidden" name="subtotal" value="{{$orders->subtotal}}">
                                            <input type="hidden" name="total" value="{{$orders->total}}">
                                            <input type="hidden" name="status" value="{{$orders->status}}">
                                             <input type="hidden" name="evidence" value="{{$orders->evidence}}">

                        
                        <button type="submit" class="btn btn-primary btn-sm pull-right">Confirmation</button>

                    </form>
                    </div>
                </div>

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
@endsection
