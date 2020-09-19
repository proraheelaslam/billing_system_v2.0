<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Phase 1</title>

    <link rel="stylesheet" type="text/css" href="{{asset('frontend_assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend_assets/css/email_attachment.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend_assets/css/responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend_assets/css/dev_style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend_assets/css/font-awesome.css')}} ">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend_assets/css/jquery.toast.min.css')}} ">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend_assets/css/jquery-confirm.min.css')}} ">
    <script type="text/javascript" src="{{asset('frontend_assets/js/jquery-1.11.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontend_assets/js/loadingoverlay.min.js')}}"></script>
    <script src="{{asset('frontend_assets/js/jquery.toast.min.js')}}" ></script>
    <script src="{{asset('frontend_assets/js/jquery-confirm.min.js')}}" ></script>
    <script src="{{asset('frontend_assets/js/autosize.js')}}" ></script>
    <script type="text/javascript" src="{{asset('frontend_assets/js/highcharts.js')}}" ></script>
    <link rel="stylesheet" href="{{asset('frontend_assets/css/jquery.fancybox.min.css')}} " />
    <script src="{{asset('frontend_assets/js/jquery.fancybox.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontend_assets/js/my_script.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontend_assets/js/frontend_script.js')}}"></script>


    <script>
        var app_url = '{{url('/')}}';
        // var publicPath = "{{public_path('/')}}"

    </script>

</head>
<body>