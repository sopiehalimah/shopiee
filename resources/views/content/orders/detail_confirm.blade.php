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
                    @foreach($confirm as $conf)
                    <form action="{{url('orders/detail/confirm/'.$conf->code_shipping)}}" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                     <button type="submit" class="btn btn-primary btn-sm pull-right">Confirmation</button>

                    </form>
                    @endforeach


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
                                        <th>Subtotal</th>
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
                                        <td>{{ "Rp.".number_format($order->price*$order->kuantitas,0,',','.').",-"*$order->kuantitas }}</td>
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
                            
                            <div class="col-md-12">
                            @foreach($shipping as $ship)
                                <h2>Shipping address</h2>
                                <p>{{$ship->name}}
                                    <br>{{$ship->telp}}
                                    <br>{{$ship->email}}
                                    <br>{{$ship->address}}
                                    <br>{{$ship->country}}
                                    <br>{{$ship->state}}
                                </p>
                            @endforeach
                            </div>
                            
                        </div>
                        


                       
                    </div>
                </div>

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
@endsection
