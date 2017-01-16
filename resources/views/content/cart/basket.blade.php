@extends('layout.app')

@section('content')

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li>Shopping cart</li>
                    </ul>
                </div>

                <div class="col-md-9" id="basket">

                    <div class="box">

                        <form method="get" action="{{url('/checkout/address')}}">

                            <h1>Shopping cart</h1>
                            <p class="text-muted">You currently have {{count($cart)}} item(s) in your cart.</p>
                           
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Product</th>
                                            <th colspan="2">Quantity</th>
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
                                                <form action="{{url('/updatecart/'.$key)}}" oninput="total.value=parseInt(a.value)*parseInt(kuantitas.value)" method="post">
                                                {!! csrf_field() !!}
                                                <input type="hidden" id="a" name="a" value="{{ $cart[$key]['price'] }}" >
                                                <input type="number" class="form-control"  id="kuantitas" name="kuantitas" value="{{ $cart[$key]['kuantitas'] }}">
                                            </td>
                                            <td>
                                                <button type="submit" class="btn btn-default"><i class="fa fa-refresh"></i></button>
                                                <input type="hidden" name="id" value="{{$cart[$key]['id']}}">
                                                <input type="hidden" name="code" value="{{$cart[$key]['code']}}">
                                                <input type="hidden" name="code_parent" value="{{$cart[$key]['code_parent']}}">
                                                <input type="hidden" name="code_kind" value="{{$cart[$key]['code_kind']}}">
                                                <input type="hidden" name="code_type" value="{{$cart[$key]['code_type']}}">
                                                <input type="hidden" name="code_merk" value="{{$cart[$key]['code_merk']}}">
                                                <input type="hidden" name="pict_product1" value="{{$cart[$key]['pict_product1']}}">
                                                <input type="hidden" name="pict_product2" value="{{$cart[$key]['pict_product2']}}">
                                                <input type="hidden" name="name" value="{{$cart[$key]['name']}}">
                                                <input type="hidden" name="desc" value="{{$cart[$key]['desc']}}">
                                                <input type="hidden" name="slug" value="{{$cart[$key]['slug']}}">
                                                <input type="hidden" name="price" value="{{$cart[$key]['price']}}">

                                                
                                            </td>
                                            <!-- <td>Rp.{{ $cart[$key]['price'] }},-</td> -->
                                            <td>{{ "Rp.".number_format($cart[$key]['price'],0,',','.').",-" }}</td>
                                            <td>
                                                <input id="total_nominal" type="hidden"  name="total" for="a kuantitas" value="{{ $cart[$key]['total'] }}">
                                                <p id="total_nominal" name="total" for="a kuantitas" value="{{ $cart[$key]['total'] }}">
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

                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="category.html" class="btn btn-default"><i class="fa fa-chevron-left"></i> Continue shopping</a>
                                </div>
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-primary">Proceed to checkout <i class="fa fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>

                        </form>

                    </div>
                    <!-- /.box -->


                    <div class="row same-height-row">
                        <div class="col-md-3 col-sm-6">
                            <div class="box same-height">
                                <h3>You may also like these products</h3>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <div class="product same-height">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="detail.html">
                                                <img src="img/product2.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="detail.html">
                                                <img src="img/product2_2.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="detail.html" class="invisible">
                                    <img src="img/product2.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3>Fur coat</h3>
                                    <p class="price">$143</p>
                                </div>
                            </div>
                            <!-- /.product -->
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <div class="product same-height">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="detail.html">
                                                <img src="img/product1.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="detail.html">
                                                <img src="img/product1_2.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="detail.html" class="invisible">
                                    <img src="img/product1.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3>Fur coat</h3>
                                    <p class="price">$143</p>
                                </div>
                            </div>
                            <!-- /.product -->
                        </div>


                        <div class="col-md-3 col-sm-6">
                            <div class="product same-height">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="detail.html">
                                                <img src="img/product3.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="detail.html">
                                                <img src="img/product3_2.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="detail.html" class="invisible">
                                    <img src="img/product3.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3>Fur coat</h3>
                                    <p class="price">$143</p>

                                </div>
                            </div>
                            <!-- /.product -->
                        </div>

                    </div>


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
                                        <th>{{ "Rp.".number_format($grandtotal,0,',','.').",-" }}</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>


                    <div class="box">
                        <div class="box-header">
                            <h4>Coupon code</h4>
                        </div>
                        <p class="text-muted">If you have a coupon code, please enter it in the box below.</p>
                        <form>
                            <div class="input-group">

                                <input type="text" class="form-control">

                                <span class="input-group-btn">

					<button class="btn btn-primary" type="button"><i class="fa fa-gift"></i></button>

				    </span>
                            </div>
                            <!-- /input-group -->
                        </form>
                    </div>

                </div>
                <!-- /.col-md-3 -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->

@endsection