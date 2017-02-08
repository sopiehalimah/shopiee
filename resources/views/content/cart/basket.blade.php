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

                <div class="col-md-12" id="basket">

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
                                    @if(count($cart)==0)
                                    @elseif(count($cart))
                                    
                                        <?php
                                        $grandsubtotal=0;
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
                                                <form action="{{url('/updatecart/'.$key)}}" oninput="subtotal.value=parseInt(a.value)*parseInt(kuantitas.value)" method="post">
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
                                                <input id="subtotal_nominal" type="hidden"  name="subtotal" for="a kuantitas" value="{{ $cart[$key]['subtotal'] }}">
                                                <p id="subtotal_nominal" name="subtotal" for="a kuantitas" value="{{ $cart[$key]['subtotal'] }}">
                                                {{ "Rp.".number_format($cart[$key]['subtotal'],0,',','.').",-" }}
                                                </p>
                                                </form>
                                            </td>
                                            <td><a href="{{url('/hapuscart/'.$key)}}"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                            <?php
                                            $grandsubtotal+=$cart[$key]['subtotal'];
                                            ?>
                                        </tr>
                                        @endforeach
                                    @endif 
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="5">Subtotal</th>
                                            @if(count($cart)!=0)
                                            <!-- <th colspan="2">Rp.<?php echo $grandsubtotal ?>,-</th> -->
                                            <th>{{ "Rp.".number_format($grandsubtotal,0,',','.').",-" }}</th>
                                            @else
                                            @endif
                                        </tr>
                                    </tfoot>
                                </table>

                            </div>
                            
                            <!-- /.table-responsive -->

                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="{{url('/')}}" class="btn btn-default"><i class="fa fa-chevron-left"></i> Continue shopping</a>
                                </div>
                                <div class="pull-right">
                                    @if(Auth::user() == null)
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                      Proceed to checkout
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content" style="top:150px;">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel" style="color: #f44242">Warning !!!</h4>
                                          </div>
                                          <div class="modal-body">
                                            You must log in first
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    @else
                                    <button type="submit" class="btn btn-primary">Proceed to checkout <i class="fa fa-chevron-right"></i>
                                    </button>
                                    @endif
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

                        @foreach($product1 as $key => $product)
                        <div class="col-md-3 col-sm-6">
                            <div class="product same-height">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="{{ url('/products/'.$product->slug) }}">
                                                <img src="{{ url('pict_product1/'.$product->pict_product1) }}" alt="" class="img-responsive" style="height: 235px;">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="{{ url('/products/'.$product->slug) }}">
                                                <img src="{{ url('pict_product2/'.$product->pict_product2) }}" alt="" class="img-responsive" style="height: 235px;">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ url('/products/'.$product->slug) }}" class="invisible">
                                    <img src="{{ url('pict_product1/'.$product->pict_product1) }}" alt="" class="img-responsive" style="height: 235px;">
                                </a>
                                <div class="text">
                                    <h3><a href="{{ url('/products/'.$product->slug) }}">{{$product->name}}</a></h3>
                                    <p class="price">{{ "Rp.".number_format($product->price,0,',','.').",-" }}</p>
                                </div>
                            </div>
                            <!-- /.product -->
                        </div>
                        @endforeach


                    </div>




                </div>
                <!-- /.col-md-9 -->


            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->

@endsection
