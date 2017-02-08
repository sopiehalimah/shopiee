@extends('layout.app')

@section('content')

    <div id="all">

        <div id="content">
            <div class="container">
                <div class="col-md-3">
                    <!-- *** MENUS AND FILTERS ***
 _________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Categories</h3>
                        </div>

                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked category-menu">
                            @foreach($master_parents as $key => $master_parent)
                            @if($master_parent->class == null)
                            <li class="active">
                                    <a href="{{ url('categorys/'.$master_parent->code) }}">{{ $master_parent->name }}</a>
                                    <ul>
                                    @foreach($master_parent->class as $clas)
                                        <li><a href="{{ url('categoryss/'.$clas->code) }}">{{$clas->name}}</a>
                                        </li>
                                    @endforeach 
                                    </ul>
                            </li>
                            @else
                            <li>
                                    <a href="{{ url('categorys/'.$master_parent->code) }}">{{ $master_parent->name }}
                                    </a>
                                    <ul>
                                    @foreach($master_parent->class as $clas)
                                        <li><a href="{{ url('categoryss/'.$clas->code) }}">{{$clas->name}}</a>
                                        </li>
                                    @endforeach 
                                    </ul>
                            </li>
                            @endif
                            @endforeach
                            </ul>

                        </div>
                    </div>

                    <div class="panel panel-default sidebar-menu">
                        <div class="panel-heading">
                            <h3 class="panel-title">Brands</h3>
                        </div>
                        <div class="panel-body">
                             <ul class="nav nav-pills nav-stacked category-menu">
                                @foreach($master_merks as $key => $master_merk)
                                @if($master_merk->class == null)
                                <li><a href="{{url('brand/'.$master_merk->name) }}">{{$master_merk->name}}</a>
                                </li>
                                @else
                                <li><a href="{{url('brand/'.$master_merk->name) }}">{{$master_merk->name}}</a>
                                </li>
                                @endif
                                @endforeach
                             </ul>
                        </div>
                    </div>


                    <!-- *** MENUS AND FILTERS END *** -->

                    <div class="banner">
                        <a href="#">
                            @foreach($advertisement as $key => $advertisement )
                            @if($key == 0)
                            <img src="{{url('/pict_ad/'.$advertisement->pict_ad)}}" alt="" style="width: 100%; height: 300px;" alt="sales 2014" class="img-responsive">
                            @else
                            <img src="{{url('/pict_ad/'.$advertisement->pict_ad)}}" alt="" style="width: 100%; height: 300px;" alt="sales 2014" class="img-responsive">
                            @endif
                            @endforeach
                        </a>
                    </div>
                </div>

                <div class="col-md-9">

                    <div class="box info-bar">
                        <div class="row">
                            <div class="col-sm-12 col-md-4 products-showing">
                                Showing <strong>{!! $product->count() !!}</strong> of <strong>{!! $product->total() !!}</strong> products
                            </div>
                        </div>
                    </div>

                    <div class="row products">
                    @foreach($product as $key => $products)

                        <div class="col-md-4 col-sm-6">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="{{ url('/products/'.$products->slug) }}">
                                                <img src="{{ url('pict_product1/'.$products->pict_product1) }}" alt="" class="img-responsive" style="height: 330px;">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="{{ url('/products/'.$products->slug) }}">
                                                <img src="{{ url('pict_product2/'.$products->pict_product2) }}" alt="" class="img-responsive" style="height: 330px;">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ url('/products/'.$products->slug) }}" class="invisible">
                                    <img src="{{ url('pict_product1/'.$products->pict_product1) }}" alt="" class="img-responsive" style="height: 330px;">
                                </a>
                                <div class="text">
                                    <h3><a href="{{ url('/products/'.$products->slug) }}">{{$products->name}}</a></h3>
                                    <p class="price">{{ "Rp.".number_format($products->price,0,',','.').",-" }}</p>
                                    <p class="buttons">
                                        

                                        <form action="{{url('/savecart')}}"  method="post" enctype="multipart/form-data" >
                                        {!! csrf_field() !!}
                                        <input type="hidden" name="id" value="{{$products->id}}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="code" value="{{ $products->code }}">
                                        <input type="hidden" name="code_parent" value="{{ $products->code_parent }}">
                                        <input type="hidden" name="code_kind" value="{{ $products->code_kind }}">
                                        <input type="hidden" name="code_type" value="{{ $products->code_type }}">
                                        <input type="hidden" name="code_merk" value="{{ $products->code_merk }}">
                                        <input type="hidden" name="pict_product1" value="{{ $products->pict_product1 }}">
                                        <input type="hidden" name="pict_product2" value="{{ $products->pict_product2 }}">
                                        <input type="hidden" name="name" value="{{ $products->name }}">
                                        <input type="hidden" name="desc" value="{{ $products->desc }}">
                                        <input type="hidden" name="slug" value="{{ $products->slug }}">
                                        <input type="hidden" name="price" value="{{ $products->price }}">
                                        <input type="hidden" name="kuantitas" value="{{ $products->kuantitas }}">
                                        <input type="hidden" name="subtotal" value="{{ $products->price }}">
                                        <input type="hidden" name="total" value="{{ $products->price }}">

                                        <center>
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                        <a href="{{ url('/products/'.$products->slug) }}" class="btn btn-default">View detail</a>
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

<!--                         <p class="loadMore">
                            <a href="#" class="btn btn-primary btn-lg"><i class="fa fa-chevron-down"></i> Load more</a>
                        </p> -->

                        <ul class="pagination">
                            {!! $product->render() !!}
                        </ul>
                    </div>


                </div>
                <!-- /.col-md-9 -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
@endsection