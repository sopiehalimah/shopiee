@extends('layout.app')

@section('content')

    <div id="all">

        <div id="content">
            <div class="container">
<!-- 
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="{{url('/')}}">Home</a>
                        </li>
                        <li><a href="{{ url('categorys/'.$product->master_type_id) }}">{{$product->master_type_id}}</a></li>
                        <li><a href="{{ url('categoryss/'.$product->type_id) }}">{{$product->type_id}}</a></li>
                        <li><a href="{{ url('category/'.$product->sub_type_id) }}">{{$product->sub_type_id}}</a></li>
                        <li>{{$product->name}}</li>
                    </ul>

                </div> -->

                <div class="col-md-3">
                    <!-- *** MENUS AND FILTERS ***
 _________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Categories</h3>
                        </div>

                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked category-menu">
                            @foreach($master_types as $key => $master_type)
                            @if($master_type->class == null)
                            <li class="active">
                                    <?php
                                        $master_type_name = strtolower($master_type->name);
                                    ?>
                                    <a href="{{ url('category/'.$master_type_name) }}">{{ $master_type->name }}</a>
                                    <ul>
                                    @foreach($master_type->class as $clas)
                                        <?php
                                                $type_name = strtolower($clas->name);
                                        ?>

                                        <li><a href="{{ url('category/'.$master_type_name.'/'.$type_name) }}">{{$clas->name}}</a>
                                        </li>
                                    @endforeach 
                                    </ul>
                            </li>
                            @else
                            <li>
                                    <?php
                                        $master_type_name = strtolower($master_type->name);
                                    ?>
                                    <a href="{{ url('category/'.$master_type_name) }}">{{ $master_type->name }}</a>
                                    <ul>
                                    @foreach($master_type->class as $clas)
                                        <?php
                                                $type_name = strtolower($clas->name);
                                        ?>

                                        <li><a href="{{ url('category/'.$master_type_name.'/'.$type_name) }}">{{$clas->name}}</a>
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

                    <div class="row" id="productMain">
                        <div class="col-sm-6">
                            <div id="mainImage">
                                <img src="{{ url('pict_product1/'.$product->pict_product1) }}" alt="" class="img-responsive" style="width:100%;  height: 500px;">
                            </div>

                            <div class="ribbon sale">
                                <div class="theribbon">SALE</div>
                                <div class="ribbon-background"></div>
                            </div>
                            <!-- /.ribbon -->

                            <div class="ribbon new">
                                <div class="theribbon">NEW</div>
                                <div class="ribbon-background"></div>
                            </div>
                            <!-- /.ribbon -->

                        </div>
                        <div class="col-sm-6">
                            <div class="box">
                                <h1 class="text-center">{{$product->name}}</h1>
                                <p class="goToDescription"><a href="#details" class="scroll-to">Scroll to product details, material & care and sizing</a>
                                </p>
                                <p class="price">{{ "Rp.".number_format($product->price,0,',','.').",-" }}</p>

                                <p class="text-center buttons">

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
                                    <input type="hidden" name="name" value="{{ $product->name }}">
                                    <input type="hidden" name="desc" value="{{ $product->desc }}">
                                    <input type="hidden" name="slug" value="{{ $product->slug }}">
                                    <input type="hidden" name="price" value="{{ $product->price }}">
                                    <input type="hidden" name="kuantitas" value="{{ $product->kuantitas }}">
                                    <input type="hidden" name="subtotal" value="{{ $product->price }}">
                                    <input type="hidden" name="sub_total" value="{{ $product->price }}">
                                    <input type="hidden" name="total" value="{{ $product->price }}">

                                    <center>
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Add to cart</button> 
                                    <a href="basket.html" class="btn btn-default"><i class="fa fa-heart"></i> Add to wishlist</a>
                                    </center>
                                    </form>

                                </p>


                            </div>

                            <div class="row" id="thumbs">
                                <div class="col-xs-4">
                                    <a href="{{ url('pict_product1/'.$product->pict_product1) }}" class="thumb">
                                        <img src="{{ url('pict_product1/'.$product->pict_product1) }}" alt="" class="img-responsive" style="width:100%;  height: 100px;">
                                    </a>
                                </div>
                                <div class="col-xs-4">
                                    <a href="{{ url('pict_product2/'.$product->pict_product2) }}" class="thumb">
                                        <img src="{{ url('pict_product2/'.$product->pict_product2) }}" alt="" class="img-responsive" style="width:100%;  height: 100px;" >
                                    </a>
                                </div>
                                <div class="col-xs-4">
                                    <a href="{{ url('pict_product1/'.$product->pict_product1) }}" class="thumb">
                                        <img src="{{ url('pict_product1/'.$product->pict_product1) }}" alt="" class="img-responsive" style="width:100%;  height: 100px;">
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="box" id="details">
                        <p>
                            <h4>Product details</h4>
                            <blockquote>
                                <p><em><?php echo $product->desc; ?></em></p>
                            </blockquote>

                            <hr>
                            <div class="social">
                                <h4>Show it to your friends</h4>
                                <p>
                                    <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>
                                    <a href="#" class="external gplus" data-animate-hover="pulse"><i class="fa fa-google-plus"></i></a>
                                    <a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
                                    <a href="#" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                                </p>
                            </div>
                    </div>

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