@extends('layout.app')

@section('content')

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="{{url('/')}}">Home</a>
                        </li>
                        <?php
                            $master_type_name = ucwords(session("master_type_name"));
                            $type_name = ucwords(session("type_name"));
                            $sub_type_name = ucwords(session("sub_type_name"));
                        ?>
                        <li><a href="{{ url('category/'.session('master_type_name')) }}">{{$master_type_name}}</a></li>
                        <li><a href="{{ url('category/'.session('master_type_name').'/'.session('type_name')) }}">{{$type_name}}</a></li>
                        <li><a href="{{ url('category/'.session('master_type_name').'/'.session('type_name').'/'.session('sub_type_name')) }}">{{$sub_type_name}}</a></li>

                    </ul>
                </div>

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
                
                     <div class="box">
                        <h1>{{$sub_type_name}}</h1>
                        <p>In our Ladies department we offer wide selection of the best productss we have found and carefully selected worldwide.</p>
                    </div>


                    <div class="box info-bar">
                        <div class="row">
                            <div class="col-sm-12 col-md-4 productss-showing">
                                Showing <strong>{!! $products->count() !!}</strong> of <strong>{!! $products->total() !!}</strong> productss
                            </div>
                        </div>
                    </div>

                    <div class="row productss">
                    @foreach($products as $key => $productss)

                        <div class="col-md-4 col-sm-6">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="{{ url('/products/'.$productss->slug) }}">
                                                <img src="{{ url('pict_product1/'.$productss->pict_product1) }}" alt="" class="img-responsive" style="height: 330px;">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="{{ url('/products/'.$productss->slug) }}">
                                                <img src="{{ url('pict_product2/'.$productss->pict_product2) }}" alt="" class="img-responsive" style="height: 330px;">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ url('/products/'.$productss->slug) }}" class="invisible">
                                    <img src="{{ url('pict_product1/'.$productss->pict_product1) }}" alt="" class="img-responsive" style="height: 330px;">
                                </a>
                                <div class="text">
                                    <h3><a href="{{ url('/products/'.$productss->slug) }}">{{$productss->name}}</a></h3>
                                    <p class="price">{{ "Rp.".number_format($productss->price,0,',','.').",-" }}</p>
                                    <p class="buttons">
                                        

                                        <form action="{{url('/savecart')}}"  method="post" enctype="multipart/form-data" >
                                        {!! csrf_field() !!}
                                        <input type="hidden" name="id" value="{{$productss->id}}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="code" value="{{ $productss->code }}">
                                        <input type="hidden" name="master_type_id" value="{{ $productss->master_type_id }}">
                                        <input type="hidden" name="type_id" value="{{ $productss->type_id }}">
                                        <input type="hidden" name="sub_type_id" value="{{ $productss->sub_type_id }}">
                                        <input type="hidden" name="code_merk" value="{{ $productss->code_merk }}">
                                        <input type="hidden" name="pict_product1" value="{{ $productss->pict_product1 }}">
                                        <input type="hidden" name="pict_product2" value="{{ $productss->pict_product2 }}">
                                        <input type="hidden" name="name" value="{{ $productss->name }}">
                                        <input type="hidden" name="desc" value="{{ $productss->desc }}">
                                        <input type="hidden" name="slug" value="{{ $productss->slug }}">
                                        <input type="hidden" name="price" value="{{ $productss->price }}">
                                        <input type="hidden" name="kuantitas" value="{{ $productss->kuantitas }}">
                                        <input type="hidden" name="subtotal" value="{{ $productss->price }}">
                                        <input type="hidden" name="sub_total" value="{{ $productss->price }}">

                                        <input type="hidden" name="total" value="{{ $productss->price }}">

                                        <center>
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                        <a href="{{ url('/products/'.$productss->slug) }}" class="btn btn-default">View detail</a>
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
                    <!-- /.productss -->

                    <div class="pages">

<!--                         <p class="loadMore">
                            <a href="#" class="btn btn-primary btn-lg"><i class="fa fa-chevron-down"></i> Load more</a>
                        </p> -->

                        <ul class="pagination">
                            {!! $products->render() !!}
                        </ul>
                    </div>


                </div>
                <!-- /.col-md-9 -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
@endsection