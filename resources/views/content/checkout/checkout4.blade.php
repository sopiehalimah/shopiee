@extends('layout.app')

@section('content')


    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li>Checkout - Order review</li>
                    </ul>
                </div>

                <div class="col-md-9" id="checkout">

                    <div class="box">
                        <form method="post" action="{{url('/checkout/order/save')}}" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        
                         <input type="hidden" class="form-control" name="id_user" value="{{ Auth::user()->id }}" required>

                                        <?php
                                            $a = rand(0,999);
                                            $b = rand(0,9);
                                            if ($a<100) {
                                              $code = "ORD-SH".$b.substr($a,0,5);
                                              $randomkode = "ORD-SH".$b.substr($a,0,5);
                                            }
                                            elseif ($a<100) {
                                              $code = "ORD-SH".$b.$b.substr($a,0,4);
                                              $randomkode = "ORD-SH".$b.$b.substr($a,0,4);
                                            }
                                            elseif ($a<10) {
                                              $code = "ORD-SH".$b.$b.$b.substr($a,0,3);
                                              $randomkode = "ORD-SH".$b.$b.$b.substr($a,0,3);
                                            }
                                            elseif ($a<10) {
                                              $code = "ORD-SH".$b.$b.$b.$b.substr($a,0,2);
                                              $randomkode = "ORD-SH".$b.$b.$b.$b.substr($a,0,2);
                                            }              
                                            else {
                                              $code = "ORD-SH".$a;
                                              $randomkode = "ORD-SH".$a;
                                            }
                                        ?>
                         <input type="hidden" class="form-control" name="code_order" value="{{ $randomkode}}" required>


                            <h1>Checkout - Order review</h1>
                            <ul class="nav nav-pills nav-justified">
                                <li><a href="checkout1.html"><i class="fa fa-map-marker"></i><br>Address</a>
                                </li>
                                <li><a href="checkout2.html"><i class="fa fa-truck"></i><br>Delivery Method</a>
                                </li>
                                <li><a href="checkout3.html"><i class="fa fa-money"></i><br>Payment Method</a>
                                </li>
                                <li class="active"><a href="#"><i class="fa fa-eye"></i><br>Order Review</a>
                                </li>
                            </ul>

                            <div class="content">
                                <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Product</th>
                                            <th >Quantity</th>
                                            <th>Unit price</th>
                                            <th colspan="2">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($cart))
                                    
                                        <?php
                                        $grandtotal=0;
                                        ?>
                                        @foreach($cart as $key => $cart2)
                                        <tr>
                                            <td>
                                                <a href="#">
                                                    <img src="{{ url('pict_product1/'.$cart[$key]['pict_product1']) }}" alt="White Blouse Armani">
                                                </a>
                                            </td>
                                            <td>
                                                <a href="#">{{ $cart[$key]['name'] }}</a>
                                            </td>
                                            <td>
                                                <a href="#">{{ $cart[$key]['kuantitas'] }}</a>
                                            </td>
                                            <!-- <td>
                                                <form action="{{url('/updatecart/'.$key)}}" oninput="total.value=parseInt(a.value)*parseInt(kuantitas.value)" method="post">
                                                {!! csrf_field() !!}
                                                <input type="hidden" id="a" name="a" value="{{ $cart[$key]['price'] }}" >
                                                <input type="number" class="form-control"  id="kuantitas" name="kuantitas" value="{{ $cart[$key]['kuantitas'] }}">
                                            </td> -->
                                            <td>
                                                <!-- <button type="submit" class="btn btn-default"><i class="fa fa-refresh"></i></button> -->
                                                <input type="hidden" name="id" value="{{$cart[$key]['id']}}">
                                                <input type="hidden" name="code_{{$cart[$key]['id']}}" value="{{$cart[$key]['code']}}">
                                                <input type="hidden" name="code_parent_{{$cart[$key]['id']}}" value="{{$cart[$key]['code_parent']}}">
                                                <input type="hidden" name="code_kind_{{$cart[$key]['id']}}" value="{{$cart[$key]['code_kind']}}">
                                                <input type="hidden" name="code_type_{{$cart[$key]['id']}}" value="{{$cart[$key]['code_type']}}">
                                                <input type="hidden" name="code_merk_{{$cart[$key]['id']}}" value="{{$cart[$key]['code_merk']}}">
                                                <input type="hidden" name="pict_product1_{{$cart[$key]['id']}}" value="{{$cart[$key]['pict_product1']}}">
                                                <input type="hidden" name="pict_product2_{{$cart[$key]['id']}}" value="{{$cart[$key]['pict_product2']}}">
                                                <input type="hidden" name="name_{{$cart[$key]['id']}}" value="{{$cart[$key]['name']}}">
                                                <input type="hidden" name="desc_{{$cart[$key]['id']}}" value="{{$cart[$key]['desc']}}">
                                                <input type="hidden" name="slug_{{$cart[$key]['id']}}" value="{{$cart[$key]['slug']}}">
                                                <input type="hidden" name="price_{{$cart[$key]['id']}}" value="{{$cart[$key]['price']}}">
                                                <input type="hidden" name="kuantitas_{{$cart[$key]['id']}}" value="{{$cart[$key]['kuantitas']}}">


                                                
                                            </td>
                                            <!-- <td>Rp.{{ $cart[$key]['price'] }},-</td> -->
                                            <td>{{ "Rp.".number_format($cart[$key]['price'],0,',','.').",-" }}</td>
                                            <td>
                                                <input id="total_nominal" type="hidden"  name="total_{{$cart[$key]['id']}}" for="a kuantitas" value="{{ $cart[$key]['total'] }}">
                                                <p id="total_nominal" name="total_{{$cart[$key]['id']}}" for="a kuantitas" value="{{ $cart[$key]['total'] }}">
                                                {{ "Rp.".number_format($cart[$key]['total'],0,',','.').",-" }}
                                                </p>
                                                </form>
                                            </td>
                                            <td><a href="{{url('/hapuscart/'.$key)}}"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                            <?php
                                            $grandtotal+=$cart[$key]['total'];
                                            ?>
                                        </tr>
                                        @endforeach
                                    @endif 
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="5">Total</th>
                                            <!-- <th colspan="2">Rp.<?php echo $grandtotal ?>,-</th> -->
                                            <th>{{ "Rp.".number_format($grandtotal,0,',','.').",-" }}</th>
                                        </tr>
                                    </tfoot>
                                </table>

                            </div>
                            
                            <!-- /.table-responsive -->

                            </div>
                            <!-- /.content -->

                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="checkout3.html" class="btn btn-default"><i class="fa fa-chevron-left"></i>Back to Payment method</a>
                                </div>
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-primary">Place an order<i class="fa fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->


                </div>
                <!-- /.col-md-9 -->

                <div class="col-md-3">

                    <div class="box" id="order-summary">
                        <div class="box-header">
                            <h3>Order summary</h3>
                        </div>
                        <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Order subtotal</td>
                                        <th>$446.00</th>
                                    </tr>
                                    <tr>
                                        <td>Shipping and handling</td>
                                        <th>$10.00</th>
                                    </tr>
                                    <tr>
                                        <td>Tax</td>
                                        <th>$0.00</th>
                                    </tr>
                                    <tr class="total">
                                        <td>Total</td>
                                        <th>$456.00</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
                <!-- /.col-md-3 -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
@endsection