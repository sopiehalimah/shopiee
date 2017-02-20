@extends('layout.apps')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h1>Welcome Admin!</h1>
            </div>
            <div class="row clearfix">
                <!-- Basic Example -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <!-- Hover Zoom Effect -->
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box bg-deep-orange hover-zoom-effect">
                                <div class="icon">
                                    <i class="material-icons">add_shopping_cart</i>
                                </div>
                                <div class="content">
                                    <div class="text">REQUEST ORDER</div>
                                    <div class="number">{{count($req_order)}}</div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box bg-cyan hover-zoom-effect">
                                <div class="icon">
                                    <i class="material-icons">shopping_cart</i>
                                </div>
                                <div class="content">
                                    <div class="text">ORDERS</div>
                                    <div class="number">{{count($all_order)}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box bg-green hover-zoom-effect">
                                <div class="icon">
                                    <i class="material-icons">account_box</i>
                                </div>
                                <div class="content">
                                    <div class="text">CUSTOMERS</div>
                                    <div class="number">{{count($customer)}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box bg-pink hover-zoom-effect">
                                <div class="icon">
                                    <i class="material-icons">recent_actors</i>
                                </div>
                                <div class="content">
                                    <div class="text">CONTACT BOX</div>
                                    <div class="number">{{count($contact)}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
            <!-- #END# Hover Zoom Effect -->
            <!-- Hover Expand Effect -->
                    <div class="card">
                        <div class="header">
                            <h2 style="color: #006064;">
                                ADVERTISEMENT
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                <!-- Indicators -->
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                </ol>

                                <!-- Wrapper for slides -->
                                <div class="carousel-inner" role="listbox">
                                    @foreach($advertisement as $key => $advertisement )
                                     @if($key == 0)
                                    <div class="item active">
                                        <img src="{{url('/pict_ad/'.$advertisement->pict_ad)}}" style="width: 100%; height: 400px;" />
                                    </div>
                                    @else
                                    <div class="item">
                                        <img src="{{url('/pict_ad/'.$advertisement->pict_ad)}}" style="width: 100%; height: 400px;"/>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>

                                <!-- Controls -->
                                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Basic Example -->
               
            </div>
                <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2 style="color: #006064;">
                                GALLERY
                                <small>All Products</small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            
                            <div id="aniimated-thumbnials" class="list-unstyled row clearfix">
                                @foreach($product as $key => $product)
                                @if($key == 0)
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <a href="{{ url('pict_product1/'.$product->pict_product1) }}"" data-sub-html="{{$product->name}}">
                                        <img class="img-responsive thumbnail" src="{{ url('pict_product1/'.$product->pict_product1) }}">
                                    </a>
                                </div>
                                @else
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <a href="{{ url('pict_product1/'.$product->pict_product1) }}"" data-sub-html="{{$product->name}}">
                                        <img class="img-responsive thumbnail" src="{{ url('pict_product1/'.$product->pict_product1) }}">
                                    </a>
                                </div>
                                @endif
                             @endforeach
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection