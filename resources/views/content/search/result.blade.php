@extends('layout.app')

@section('content')

 
    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="{{url('/')}}">Home</a>
                        </li>
                        <li>Search Result</li>
                    </ul>

                </div>
                <div class="col-md-12">

                    
                    @if(count($hasil))
                    <div class="box">
                        <h3>Result for " {{$query}} "</h3>
                        
                    </div>

                    <div class="box info-bar">
                        <div class="row">
                            <div class="col-sm-12 col-md-4 products-showing">
                                Showing <strong>{!! $hasil->count() !!}</strong> of <strong>{!! $hasil->total() !!}</strong> products
                            </div>
                        </div>
                    </div>

                    <div class="row products">
                        @foreach($hasil as $product)
                        <div class="col-md-3 col-sm-4">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="{{ url('/products/'.$product->slug) }}">
                                                <img src="{{ url('pict_product1/'.$product->pict_product1) }}" alt="" class="img-responsive" style="height: 330px;">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="{{ url('/products/'.$product->slug) }}">
                                                <img src="{{ url('pict_product2/'.$product->pict_product2) }}" alt="" class="img-responsive" style="height: 330px;">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ url('/products/'.$product->slug) }}" class="invisible">
                                    <img src="{{ url('pict_product1/'.$product->pict_product1) }}" alt="" class="img-responsive" style="height: 330px;">
                                </a>
                                <div class="text">
                                    <h3><a href="{{ url('/products/'.$product->slug) }}">{{$product->name}}</a></h3>
                                    <p class="price">{{ "Rp.".number_format($product->price,0,',','.').",-" }}</p>
                                    <p class="buttons">
                                        

                                        <form action="{{url('/savecart')}}"  method="post" enctype="multipart/form-data" >
                                        {!! csrf_field() !!}
                                        <input type="hidden" name="id" value="{{$product->id}}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="code" value="{{ $product->code }}">
                                        <input type="hidden" name="master_type_id" value="{{ $product->master_type_id }}">
                                        <input type="hidden" name="type_id" value="{{ $product->type_id }}">
                                        <input type="hidden" name="sub_type_id" value="{{ $product->sub_type_id }}">
                                        <input type="hidden" name="code_merk" value="{{ $product->code_merk }}">
                                        <input type="hidden" name="pict_product1" value="{{ $product->pict_product1 }}">
                                        <input type="hidden" name="pict_product2" value="{{ $product->pict_product2 }}">
                                        <input type="hidden" name="pict_product3" value="{{ $product->pict_product3 }}">
                                        <input type="hidden" name="name" value="{{ $product->name }}">
                                        <input type="hidden" name="desc" value="{{ $product->desc }}">
                                        <input type="hidden" name="slug" value="{{ $product->slug }}">
                                        <input type="hidden" name="price" value="{{ $product->price }}">
                                        <input type="hidden" name="kuantitas" value="{{ $product->kuantitas }}">
                                        <input type="hidden" name="subtotal" value="{{ $product->price }}">
                                        <input type="hidden" name="sub_total" value="{{ $product->price }}">

                                        <input type="hidden" name="total" value="{{ $product->price }}">

                                        <center>
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                        <a href="{{ url('/products/'.$product->slug) }}" class="btn btn-default">View detail</a>
                                        </center>
                                        </form>
                                    </p>
                                </div>
                                <!-- /.text -->

                                <div class="ribbon sale">
                                    <div class="theribbon">SALE</div>
                                    <div class="ribbon-background"></div>
                                </div>
                                <!-- /.ribbon -->

                            </div>
                            <!-- /.product -->
                        </div>
                        @endforeach


                    </div>
                    <!-- /.products -->

                    <div class="pages">

                        <ul class="pagination">
                            {!! $hasil->render() !!}
                        </ul>
                    </div>

                     @else
                    <div class="box">
                        <h3>Result for " {{$query}} "</h3>
                        <center><h4>Not Found</h4></center>
                    </div>
              
            @endif

                </div>
                <!-- /.col-md-9 -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
@endsection