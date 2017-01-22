@extends('layout.app')

@section('content')

    <div id="all">

        <div id="content">

            <div class="container">
                <div class="col-md-12">
                    <div id="main-slider">
                    @foreach($advertisement as $key => $advertisement )
                    @if($key == 0)
                        <div class="item">
                            <img class="img-responsive" src="{{url('/pict_ad/'.$advertisement->pict_ad)}}" alt="" style="width: 100%; height: 500px;">
                        </div>
                    @else
                        <div class="item">
                            <img class="img-responsive" src="{{url('/pict_ad/'.$advertisement->pict_ad)}}" alt="" style="width: 100%; height: 500px;">
                        </div>
                    @endif
                    @endforeach
                    </div>
                    <!-- /#main-slider -->
                </div>
            </div>

            <!-- *** ADVANTAGES HOMEPAGE ***
 _________________________________________________________ -->
            <div id="advantages">

                <div class="container">
                    <div class="same-height-row">
                        <div class="col-sm-4">
                            <div class="box same-height clickable">
                                <div class="icon"><i class="fa fa-heart"></i>
                                </div>

                                <h3><a href="#">We love our customers</a></h3>
                                <p>We are known to provide best possible service ever</p>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="box same-height clickable">
                                <div class="icon"><i class="fa fa-tags"></i>
                                </div>

                                <h3><a href="#">Best prices</a></h3>
                                <p>You can check that the height of the boxes adjust when longer text like this one is used in one of them.</p>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="box same-height clickable">
                                <div class="icon"><i class="fa fa-thumbs-up"></i>
                                </div>

                                <h3><a href="#">100% satisfaction guaranteed</a></h3>
                                <p>Free returns on everything for 3 months.</p>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->

                </div>
                <!-- /.container -->

            </div>
            <!-- /#advantages -->

            <!-- *** ADVANTAGES END *** -->

            <!-- *** HOT PRODUCT SLIDESHOW ***
 _________________________________________________________ -->
            <div id="hot">

                <div class="box">
                    <div class="container">
                        <div class="col-md-12">
                            <h2>Hot this week</h2>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="product-slider">
                        @foreach($product as $key => $product)
                        <div class="item">
                            <div class="product">
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
                                <!-- /.text -->
                                <div class="ribbon new">
                                    <div class="theribbon">NEW</div>
                                    <div class="ribbon-background"></div>
                                </div>
                            </div>
                            <!-- /.product -->
                        </div>
                        @endforeach
                        
                    </div>
                    <!-- /.product-slider -->
                </div>
                <!-- /.container -->

            </div>
            <!-- /#hot -->

            <!-- *** HOT END *** -->

            <!-- *** GET INSPIRED ***
 _________________________________________________________ -->
            <div class="container" data-animate="fadeInUpBig">
                <div class="col-md-12">
                    <div class="box slideshow">
                        <h3>Get Inspired</h3>
                        <p class="lead">Get the inspiration from our world class designers</p>
                        <div id="get-inspired" class="owl-carousel owl-theme">
                            @foreach($blogs as $key => $blog)
                            @if($key == 0)
                            <div class="item">
                                <a href="#">
                                    <img src="{{ url('pict/'.$blog->pict) }}" alt="Get inspired" class="img-responsive" style="height: 500px; width: 100%;">
                                </a>
                            </div>
                            @else
                            <div class="item">
                                <a href="#">
                                    <img src="{{ url('pict/'.$blog->pict) }}" alt="Get inspired" class="img-responsive" style="height: 500px; width: 100%;">
                                </a>
                            </div>
                            @endif
                            @endforeach
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- *** GET INSPIRED END *** -->

            <!-- *** BLOG HOMEPAGE ***
 _________________________________________________________ -->

            <div class="box text-center" data-animate="fadeInUp">
                <div class="container">
                    <div class="col-md-12">
                        <h3 class="text-uppercase">From our blog</h3>

                        <p class="lead">What's new in the world of fashion? <a href="{{url('/blogs')}}">Check our blog!</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="container">

                <div class="col-md-12" data-animate="fadeInUp">

                    <div id="blog-homepage" class="row">
                        @foreach($blog1 as $key => $blog)
                        <div class="col-sm-6">
                            <div class="post">
                                <h4><a href="post.html">{{$blog->title}}</a></h4>
                                <p class="author-category">By <a href="#">{{$blog->author}}</a> in <a href="">{{$blog->id_category}}</a>
                                </p>
                                <hr>
                                <p class="intro"><?php echo substr("$blog->content", 0,200);?>...</p>
                                <p class="read-more"><a href="{{ url('blogs/'.$blog->slug) }}" class="btn btn-primary">Continue reading</a>
                                </p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- /#blog-homepage -->
                </div>
            </div>
            <!-- /.container -->

            <!-- *** BLOG HOMEPAGE END *** -->


        </div>
        <!-- /#content -->
@endsection