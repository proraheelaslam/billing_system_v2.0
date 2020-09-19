<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{asset('images/backend_images/logo.png')}}">
    <title>{{ config('app.name', 'Advertisment Admin panel') }}</title>

    <!--Core CSS -->
    <link href="{{asset('bs3/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('js/backend_js/jquery-ui/jquery-ui-1.10.1.custom.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/backend_css/bootstrap-reset.css')}}" rel="stylesheet">
    <link href="{{asset('fonts/backend_fonts/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('js/backend_js/jvector-map/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet">
    <link href="{{asset('css/backend_css/clndr.css')}}" rel="stylesheet">

    <link href="{{asset('bs3/fileuploader/dist/jquery.fileuploader.min.css')}}" rel="stylesheet">

    <!--dynamic table-->
    <link href="{{asset('js/backend_js/advanced-datatable/css/demo_page.css')}}" rel="stylesheet" />
    <link href="{{asset('js/backend_js/advanced-datatable/css/demo_table.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('js/backend_js/data-tables/DT_bootstrap.css')}}" />
    <!--clock css-->
    <link href="{{asset('js/backend_js/css3clock/css/style.css')}}" rel="stylesheet">
    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="{{asset('js/backend_js/morris-chart/morris.css')}}">
    <!-- Custom styles for this template -->
    <link href="{{asset('css/backend_css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/backend_css/style-responsive.css')}}" rel="stylesheet"/>
    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]>
    <script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

      <!-- Scripts -->
      <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
<section id="container">

<!--header start-->
@include('layouts.adminLayout.admin_header')
<!--header end-->


<!--left sidebar start-->
@include('layouts.adminLayout.admin_leftsidebar')
<!--left sidebar end-->

<!--main content start-->
<section id="main-content">
<section class="wrapper">
@yield('content');
</section>
</section>
<!--main content end-->



<!--right sidebar start-->
@include('layouts.adminLayout.admin_rightsidebar')
<!--right sidebar end-->
</section>


<!-- Placed js at the end of the document so the pages load faster -->
<!--Core js-->
<!-- <script src="{{asset('js/backend_js/jquery.js')}}"></script> -->
<script src="{{asset('js/backend_js/jquery-ui/jquery-ui-1.10.1.custom.min.js')}}"></script>

<script src="{{asset('bs3/js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/backend_js/jquery.scrollTo.min.js')}}"></script>
<script src="{{asset('js/backend_js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js')}}"></script>
<script src="{{asset('js/backend_js/jquery.nicescroll.js')}}"></script>

<script src="{{asset('js/backend_js/skycons/skycons.js')}}"></script>
<script src="{{asset('js/backend_js/jquery.scrollTo/jquery.scrollTo.js')}}"></script>
<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="{{asset('js/backend_js/calendar/clndr.js')}}"></script> -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js"></script>
<script src="{{asset('js/backend_js/calendar/moment-2.2.1.js')}}"></script>

@if(\Request::is('admin/home'))
<script src="{{asset('js/backend_js/dashboard.js')}}"></script>
@endif

<!--common script init for all pages-->
<script src="{{asset('js/backend_js/scripts.js')}}"></script>

<!--dynamic table-->
<script type="text/javascript" language="javascript" src="{{asset('js/backend_js/advanced-datatable/js/jquery.dataTables.js')}}"></script>
<script type="text/javascript" src="{{asset('js/backend_js/data-tables/DT_bootstrap.js')}}"></script>

<!--yajra table_table-->
<!-- <script type="text/javascript" src="{{asset('js/backend_js/datatable/jquery-1.12.3.js')}}"></script> -->
<script type="text/javascript" src="{{asset('js/backend_js/datatable/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/backend_js/datatable/dataTables.bootstrap.min.js')}}"></script>
<link href="{{asset('js/backend_js/datatable/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('js/backend_js/datatable/dataTables.bootstrap.min.css')}}" rel="stylesheet">

<script src="{{ asset('js/backend_js/my_script.js') }}"></script>

<!--Multiple selct dropdown js-->
<script type="text/javascript" src="{{ asset('js/backend_js/bootstrap-colorpicker/js/bootstrap-colorpicker.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/backend_js/bootstrap-timepicker/js/bootstrap-timepicker.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/backend_js/jquery-multi-select/js/jquery.multi-select.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/backend_js/jquery-multi-select/js/jquery.quicksearch.js') }}"></script>

<link rel="stylesheet" type="text/css" href="{{ asset('js/backend_js/select2/select2.min.css') }}" />
<script src="{{asset('js/backend_js/select2/select2.min.js')}}"></script>


<!--Datepicker js-->
<link rel="stylesheet" type="text/css" href="{{ asset('js/backend_js/bootstrap-datetimepicker/css/datetimepicker.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('js/backend_js/bootstrap-datepicker/css/datepicker.css') }}" />
<script type="text/javascript" src="{{ asset('js/backend_js/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/backend_js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js') }}"></script>



<!--Upload image CSS -->
<link rel="stylesheet" type="text/css" href="{{asset('js/backend_js/bootstrap-fileupload/bootstrap-fileupload.css')}}" />

<!--Product Image js-->
@if(!Request::is('admin/view_listing'))
<link rel="stylesheet" href="{{ asset('css/backend_css/sweetalert.css') }}" />
<!-- <script src="{{ asset('js/backend_js/jquery.min.js') }} "></script>  -->

<script src="{{ asset('js/backend_js/jquery.validate.js') }} "></script>
<!--  <script src="{{ asset('js/backend_js/matrix.form_validation.js') }} "></script> -->
<script src="{{ asset('js/backend_js/sweetalert.min.js') }}"></script>
@endif
<script src="{{ asset('bs3/fileuploader/dist/jquery.fileuploader.min.js') }}"></script>
<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" type="text/css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" integrity="sha256-3blsJd4Hli/7wCQ+bmgXfOdK7p/ZUMtPXY08jmxSSgk=" crossorigin="anonymous"></script>



<!--global app configuration object -->
<script>
    var config = {
        routes: {
            urlPath: "{{ URL::to('/') }}"
        }
    };


</script>

@yield('scripts')

</body>
</html>