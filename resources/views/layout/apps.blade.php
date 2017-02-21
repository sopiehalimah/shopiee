<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Shopiee</title>
    <!-- Favicon-->
    <link rel="icon" href="{{url('img/s.png')}}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="{{url('https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext')}}" rel="stylesheet" type="text/css">
    <link href="{{url('https://fonts.googleapis.com/icon?family=Material+Icons')}}" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{url('admin/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{url('admin/plugins/node-waves/waves.css')}}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{url('admin/plugins/animate-css/animate.css')}}" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="{{url('admin/plugins/morrisjs/morris.css')}}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{url('admin/css/style.css')}}" rel="stylesheet">

     <!-- Wait Me Css -->
    <link href="{{url('admin/plugins/waitme/waitMe.css')}}" rel="stylesheet" />

    <!-- Light Gallery Plugin Css -->
    <link href="{{url('admin/plugins/light-gallery/css/lightgallery.css')}}" rel="stylesheet">

        <!-- Bootstrap Select Css -->
    <link href="{{url('admin/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />

        <!-- JQuery DataTable Css -->
    <link href="{{url('admin/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">

    <link href="{{url('admin/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}" rel="stylesheet" />

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{url('admin/css/themes/all-themes.css')}}" rel="stylesheet" />
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <!-- <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-teal">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div> -->
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.html">ADMIN SHOPER</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
                    
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="{{ url('pict_user/'.Auth::User()->pict_user) }}" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::User()->name}}</div>
                    <div class="email">{{Auth::User()->email}}</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="{{url('/admin/profile/'.Auth::User()->id)}}"><i class="material-icons">person</i>Profile</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="{{url('/logout')}}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="material-icons">input</i>Sign Out</a>
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                 {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="active">
                        <a href="{{url('/home')}}">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li >
                        <a href="javascript:void(0);" class="menu-toggle" style="color: #006064;">
                            <i class="material-icons">book</i>
                            <span style="color: #006064;">Modul</span>
                        </a>
                        <ul class="ml-menu" >
                            
                            <li >
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Category</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="{{url('/master_category/add')}}">Add</a>
                                    </li>
                                    <li>
                                        <a href="{{url('/master_category/table')}}">Table</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Article</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="{{url('/article/add')}}">Add</a>
                                    </li>
                                    <li>
                                        <a href="{{url('/article/table')}}">Table</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Advertisement</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="{{url('/advertisement/add')}}">Add</a>
                                    </li>
                                    <li>
                                        <a href="{{url('/advertisement/table')}}">Table</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Master Type</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="{{url('/master_type/add')}}">Add</a>
                                    </li>
                                    <li>
                                        <a href="{{url('/master_type/table')}}">Table</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Type</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="{{url('/type/add')}}">Add</a>
                                    </li>
                                    <li>
                                        <a href="{{url('/type/table')}}">Table</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Sub Type</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="{{url('/sub_type/add')}}">Add</a>
                                    </li>
                                    <li>
                                        <a href="{{url('/sub_type/table')}}">Table</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Brand</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="{{url('/master_merk/add')}}">Add</a>
                                    </li>
                                    <li>
                                        <a href="{{url('/master_merk/table')}}">Table</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Product</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="{{url('/product/add')}}">Add</a>
                                    </li>
                                    <li>
                                        <a href="{{url('/product/table')}}">Table</a>
                                    </li>
                                </ul>
                            </li>
                            
                        </ul>
                    </li>
                    
                    <li >
                        <a href="javascript:void(0);" class="menu-toggle" style="color: #006064;">
                            <i class="material-icons">shopping_cart</i>
                            <span style="color: #006064;">Orders</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="{{url('/order/table')}}">Request Order </a>
                            </li>
                            <!-- <li>
                                <a href="{{url('/order/mail')}}">Sent Mail </a>
                            </li>
                            <li>
                                <a href="{{url('/order/sent')}}">Sent Order </a>
                            </li> -->
                            <li>
                                <a href="{{url('/order/all')}}">Order All </a>
                            </li>
                        </ul>
                    </li>
                    <li >
                        <a href="javascript:void(0);" class="menu-toggle" style="color: #006064;">
                            <i class="material-icons">account_box</i>
                            <span style="color: #006064;">Customers</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="{{url('/customer/table')}}">All </a>
                            </li>
                        </ul>
                    </li>
                    <li >
                        <a href="javascript:void(0);" class="menu-toggle" style="color: #006064;">
                            <i class="material-icons">recent_actors</i>
                            <span style="color: #006064;">Contact Box</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="{{url('/contact/table')}}">All </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <!-- <div class="legal">
                <div class="copyright">
                    &copy; 2016 <a href="javascript:void(0);">AdminBSB - Material Design</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.4
                </div>
            </div> -->
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>

    
    @yield('content')

    <!-- Jquery Core Js -->
    <script src="{{url('admin/plugins/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{url('admin/plugins/bootstrap/js/bootstrap.js')}}"></script>

    <!-- Select Plugin Js -->
    <script src="{{url('admin/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{url('admin/plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{url('admin/plugins/node-waves/waves.js')}}"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="{{url('admin/plugins/jquery-countto/jquery.countTo.js')}}"></script>

    <!-- Morris Plugin Js -->
    <script src="{{url('admin/plugins/raphael/raphael.min.js')}}"></script>
    <script src="{{url('admin/plugins/morrisjs/morris.js')}}"></script>

    <!-- ChartJs -->
    <script src="{{url('admin/plugins/chartjs/Chart.bundle.js')}}"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="{{url('admin/plugins/flot-charts/jquery.flot.js')}}"></script>
    <script src="{{url('admin/plugins/flot-charts/jquery.flot.resize.js')}}"></script>
    <script src="{{url('admin/plugins/flot-charts/jquery.flot.pie.js')}}"></script>
    <script src="{{url('admin/plugins/flot-charts/jquery.flot.categories.js')}}"></script>
    <script src="{{url('admin/plugins/flot-charts/jquery.flot.time.js')}}"></script>

        <!-- Jquery DataTable Plugin Js -->
    <script src="{{url('admin/plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
    <script src="{{url('admin/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
    <script src="{{url('admin/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')}}"></script>
    <script src="{{url('admin/plugins/jquery-datatable/extensions/export/buttons.flash.min.js')}}"></script>
    <script src="{{url('admin/plugins/jquery-datatable/extensions/export/jszip.min.js')}}"></script>
    <script src="{{url('admin/plugins/jquery-datatable/extensions/export/pdfmake.min.js')}}"></script>
    <script src="{{url('admin/plugins/jquery-datatable/extensions/export/vfs_fonts.js')}}"></script>
    <script src="{{url('admin/plugins/jquery-datatable/extensions/export/buttons.html5.min.js')}}"></script>
    <script src="{{url('admin/plugins/jquery-datatable/extensions/export/buttons.print.min.js')}}"></script>
    <script src="{{url('admin/js/pages/tables/jquery-datatable.js')}}"></script>


    <!-- Light Gallery Plugin Js -->
    <script src="{{url('admin/plugins/light-gallery/js/lightgallery-all.js')}}"></script>

    <!-- Custom Js -->
    <script src="{{url('admin/js/pages/medias/image-gallery.js')}}"></script>


    <!-- Sparkline Chart Plugin Js -->
    <script src="{{url('admin/plugins/jquery-sparkline/jquery.sparkline.js')}}"></script>

    <!-- Custom Js -->
    <script src="{{url('admin/js/admin.js')}}"></script>
    <script src="{{url('admin/js/pages/index.js')}}"></script>

    <!-- Demo Js -->
    <script src="{{url('admin/js/demo.js')}}"></script>
    <script src="{{url('admin/js/pages/forms/editors.js')}}"></script>
        <!-- Ckeditor -->
    <script src="{{url('admin/plugins/ckeditor/ckeditor.js')}}"></script>

    <script src="{{url('admin/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>

    <script src="{{url('admin/plugins/chartjs/Chart.bundle.js')}}"></script>
    <script src="{{url('admin/js/pages/charts/chartjs.js')}}"></script>


    <!-- Moment Plugin Js -->
    <script src="{{url('admin/plugins/momentjs/moment.js') }}"></script>
    <!-- TinyMCE -->
    <script src="{{url('admin/plugins/tinymce/tinymce.js')}}"></script>

     <script type="text/javascript">
        if ( typeof CKEDITOR == 'undefined' ){
        document.write(
            'CKEditor not found');
        }else{
         var editor = CKEDITOR.replace( 'editor1' );       
        CKFinder.setupCKEditor( editor, '' ) ;
        }
    </script>
    
</body>

</html>