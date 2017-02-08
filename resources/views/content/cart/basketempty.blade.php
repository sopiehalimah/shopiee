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
                           

                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="{{url('/')}}" class="btn btn-default"><i class="fa fa-chevron-left"></i> Continue shopping</a>
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
