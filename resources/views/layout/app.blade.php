<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Obaju e-commerce template">
    <meta name="author" content="Ondrej Svestka | ondrejsvestka.cz">
    <meta name="keywords" content="">

    <title>
        SHOPIE
    </title>

    <meta name="keywords" content="">

    <link href='{{url("http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100")}}' rel='stylesheet' type='text/css'>

    <!-- styles -->
    <link href="{{url('css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{url('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('css/animate.min.css')}}" rel="stylesheet">
    <link href="{{url('css/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{url('css/owl.theme.css')}}" rel="stylesheet">

    <!-- theme stylesheet -->
    <link href="{{url('css/style.default.css')}}" rel="stylesheet" id="theme-stylesheet">

    <!-- your stylesheet with modifications -->
    <link href="{{url('css/custom.css')}}" rel="stylesheet">

    <script src="{{url('js/respond.min.js')}}"></script>

    <link rel="shortcut icon" href="favicon.png">



</head>

<body>

    <!-- *** TOPBAR ***
 _________________________________________________________ -->
    <div id="top">
        <div class="container">
            <div class="col-md-6 offer" data-animate="fadeInDown">
                <a href="#" class="btn btn-success btn-sm" data-animate-hover="shake">Offer of the day</a>  <a href="#">Get flat 35% off on orders over $50!</a>
            </div>
            <div class="col-md-6" data-animate="fadeInDown">
                <ul class="menu">
                    <li><a href="{{ url('/contact')}}">Contact</a>
                    </li>
                    <li><a href="#">Recently viewed</a>
                    </li>
                    @if (Auth::guest())
                    <li><a href="#" data-toggle="modal" data-target="#login-modal">Login</a>
                    </li>
                    <li><a href="#" data-toggle="modal" data-target="#register-modal">Register</a>
                    </li>
                    @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                    </li>
                    <li><a href="{{ url('/orders/history') }}">Orders History</a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
            <div class="modal-dialog modal-sm">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="Login">Customer login</h4>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input type="email" class="form-control" id="email-modal" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <input type="password" class="form-control" id="password-modal" name="password" placeholder="Password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <p class="text-center">
                                <button class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
                            </p>

                        </form>

                        <p class="text-center text-muted">Not registered yet?</p>
                        <p class="text-center text-muted"><a href="{{ url('/') }}"><strong>Register now</strong></a>! It is easy and done in 1&nbsp;minute and gives you access to special discounts and much more!</p>

                    </div>
                </div>
            </div>
        </div>
                <div class="modal fade" id="register-modal" tabindex="-1" role="dialog" aria-labelledby="Register" aria-hidden="true">
            <div class="modal-dialog modal-lg">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="Register">Customer Register</h4>
                    </div>
                    <div class="modal-body">
                        <h1>New account</h1>

                        <p class="lead">Not our registered customer yet?</p>
                        <p>With registration with us new world of fashion, fantastic discounts and much more opens to you! The whole process will not take you more than a minute!</p>
                        <p class="text-muted">If you have any questions, please feel free to <a href="contact.html">contact us</a>, our customer service center is working for you 24/7.</p>

                        <hr>
                        <form method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif

                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email"  name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                            </div>
                             <div class="form-group">
                                <label for="password">Confirm Password</label>
                                <input type="password" class="form-control" id="password-confirm" name="password_confirmation" required>

                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> Register</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- *** TOP BAR END *** -->

    <!-- *** NAVBAR ***
 _________________________________________________________ -->

    <div class="navbar navbar-default yamm" role="navigation" id="navbar">
        <div class="container">
            <div class="navbar-header">

                <a class="navbar-brand home" href="{{url('/')}}" data-animate-hover="bounce">
                    <img src="{{url('img/sh.png')}}" alt="Obaju logo" class="hidden-xs" style="width: 150px;">
                    <img src="{{url('img/sh.png')}}" alt="Obaju logo" class="visible-xs" style="width: 100px;"><span class="sr-only">Shopier - go to homepage</span>
                </a>
                <div class="navbar-buttons">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="fa fa-align-justify"></i>
                    </button>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle search</span>
                        <i class="fa fa-search"></i>
                    </button>
                    @if($cart == 0)
                    <a class="btn btn-default navbar-toggle" href="{{url('/carts')}}">
                        <i class="fa fa-shopping-cart"></i>  <span class="hidden-xs">{{count($cart)}} items in cart</span>
                    </a>
                    @else
                    <a class="btn btn-default navbar-toggle" href="{{url('/cart')}}">
                        <i class="fa fa-shopping-cart"></i>  <span class="hidden-xs">{{count($cart)}} items in cart</span>
                    </a>
                    @endif
                </div>
            </div>
            <!--/.navbar-header -->

            <div class="navbar-collapse collapse" id="navigation">

                <ul class="nav navbar-nav navbar-left">
                    <li class="active"><a href="{{url('/')}}">Home</a>
                    </li>
                    @foreach($master_parents as $key => $master_parent)
                    @if($master_parent->class == null)
                    <li class="active"><a href="index.html">Home</a>
                    </li>
                    @else
                    <li class="dropdown yamm-fw">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">{{ $master_parent->name }}<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="yamm-content">
                                    <div class="row">
                                     @foreach($master_parent->class as $clas)
                                        <div class="col-sm-3">
                                            <h5>{{$clas->name}}</h5>
                                            <ul>
                                            @foreach($clas->class2 as $clas2)
                                            @if($clas2->class3 == null)
                                                <li><a href="{{ url('category/'.$clas2->code) }}">{{ $clas2->name }}</a>
                                                </li>
                                            @else
                                            @foreach($clas2->class3 as $class4)
                                                 <li><a href="{{ url('category/'.$class4->name) }}">{{ $class4->name }}</a>
                                                </li>
                                            @endforeach
                                            @endif
                                            @endforeach
                                            </ul>
                                        </div>
                                    @endforeach 
                                    </div>
                                </div>
                                <!-- /.yamm-content -->
                            </li>
                          
                        </ul>
                    </li>
                    @endif
                    @endforeach

                </ul>

            </div>
            <!--/.nav-collapse -->

            <div class="navbar-buttons">

                <div class="navbar-collapse collapse right" id="basket-overview">
                    @if($cart == 0)
                    <a href="{{url('/carts')}}" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span class="hidden-sm">{{count($cart)}} items in cart</span></a>
                    @else
                    <a href="{{url('/cart')}}" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span class="hidden-sm">{{count($cart)}} items in cart</span></a>
                    @endif
                </div>
                <!--/.nav-collapse -->

                <div class="navbar-collapse collapse right" id="search-not-mobile">
                    <button type="button" class="btn navbar-btn btn-primary" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle search</span>
                        <i class="fa fa-search"></i>
                    </button>
                </div>

            </div>

            <div class="collapse clearfix" id="search">
                <form class="navbar-form" role="search" action="{{ url('search')}}" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" placeholder="Search">
                        <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                </form>

            </div>
            <!--/.nav-collapse -->

        </div>
        <!-- /.container -->
    </div>
    <!-- /#navbar -->

    <!-- *** NAVBAR END *** -->


@yield('content')


        <!-- *** FOOTER ***
 _________________________________________________________ -->
        <div id="footer" data-animate="fadeInUp">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <h4>Pages</h4>

                        <ul>
                            <li><a href="text.html">About us</a>
                            </li>
                            <li><a href="text.html">Terms and conditions</a>
                            </li>
                            <li><a href="faq.html">FAQ</a>
                            </li>
                            <li><a href="contact.html">Contact us</a>
                            </li>
                        </ul>

                        <hr>

                        <h4>User section</h4>

                        <ul>
                            <li><a href="#" data-toggle="modal" data-target="#login-modal">Login</a>
                            </li>
                            <li><a href="register.html">Regiter</a>
                            </li>
                        </ul>

                        <hr class="hidden-md hidden-lg hidden-sm">

                    </div>
                    <!-- /.col-md-3 -->

                    <div class="col-md-3 col-sm-6">

                        <h4>Top categories</h4>

                        <h5>Men</h5>

                        <ul>
                            <li><a href="category.html">T-shirts</a>
                            </li>
                            <li><a href="category.html">Shirts</a>
                            </li>
                            <li><a href="category.html">Accessories</a>
                            </li>
                        </ul>

                        <h5>Ladies</h5>
                        <ul>
                            <li><a href="category.html">T-shirts</a>
                            </li>
                            <li><a href="category.html">Skirts</a>
                            </li>
                            <li><a href="category.html">Pants</a>
                            </li>
                            <li><a href="category.html">Accessories</a>
                            </li>
                        </ul>

                        <hr class="hidden-md hidden-lg">

                    </div>
                    <!-- /.col-md-3 -->

                    <div class="col-md-3 col-sm-6">

                        <h4>Where to find us</h4>

                        <p><strong>Obaju Ltd.</strong>
                            <br>13/25 New Avenue
                            <br>New Heaven
                            <br>45Y 73J
                            <br>England
                            <br>
                            <strong>Great Britain</strong>
                        </p>

                        <a href="contact.html">Go to contact page</a>

                        <hr class="hidden-md hidden-lg">

                    </div>
                    <!-- /.col-md-3 -->



                    <div class="col-md-3 col-sm-6">

                        <h4>Get the news</h4>

                        <p class="text-muted">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>

                        <form>
                            <div class="input-group">

                                <input type="text" class="form-control">

                                <span class="input-group-btn">

          <button class="btn btn-default" type="button">Subscribe!</button>

      </span>

                            </div>
                            <!-- /input-group -->
                        </form>

                        <hr>

                        <h4>Stay in touch</h4>

                        <p class="social">
                            <a href="#" class="facebook external" data-animate-hover="shake"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="twitter external" data-animate-hover="shake"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="instagram external" data-animate-hover="shake"><i class="fa fa-instagram"></i></a>
                            <a href="#" class="gplus external" data-animate-hover="shake"><i class="fa fa-google-plus"></i></a>
                            <a href="#" class="email external" data-animate-hover="shake"><i class="fa fa-envelope"></i></a>
                        </p>


                    </div>
                    <!-- /.col-md-3 -->

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#footer -->

        <!-- *** FOOTER END *** -->




        <!-- *** COPYRIGHT ***
 _________________________________________________________ -->
        <div id="copyright">
            <div class="container">
                <div class="col-md-6">
                    <p class="pull-left">© 2015 Your name goes here.</p>

                </div>
                <div class="col-md-6">
                    <p class="pull-right">Template by <a href="https://bootstrapious.com/e-commerce-templates">Bootstrapious.com</a>
                         <!-- Not removing these links is part of the license conditions of the template. Thanks for understanding :) If you want to use the template without the attribution links, you can do so after supporting further themes development at https://bootstrapious.com/donate  -->
                    </p>
                </div>
            </div>
        </div>
        <!-- *** COPYRIGHT END *** -->



    </div>
    <!-- /#all -->


    

    <!-- *** SCRIPTS TO INCLUDE ***
 _________________________________________________________ -->


    <script src="{{url('js/jquery-1.11.0.min.js')}}"></script>
    <script src="{{url('js/bootstrap.min.js')}}"></script>
    <script src="{{url('js/jquery.cookie.js')}}"></script>
    <script src="{{url('js/waypoints.min.js')}}"></script>
    <script src="{{url('js/modernizr.js')}}"></script>
    <script src="{{url('js/bootstrap-hover-dropdown.js')}}"></script>
    <script src="{{url('js/owl.carousel.min.js')}}"></script>
    <script src="{{url('js/front.js')}}"></script>


</body>

</html>