<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>SHOPER</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

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

        <!-- Bootstrap Select Css -->
    <link href="{{url('admin/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />

        <!-- JQuery DataTable Css -->
    <link href="{{url('admin/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{url('admin/css/themes/all-themes.css')}}" rel="stylesheet" />
</head>

<body class="four-zero-four">
    <div class="four-zero-four-container">
        <div class="error-code">403</div>
        <div class="error-message">This page doesn't exist</div>
        <div class="button-place">
            <a href="{{url('/')}}" class="btn btn-default btn-lg waves-effect">GO TO HOMEPAGE</a>
        </div>
</div>

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