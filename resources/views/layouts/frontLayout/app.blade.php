<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{url('frontend_assets/css/reset.css')}}" type="text/css" media="screen">
    <link rel="stylesheet" href="{{url('frontend_assets/css/style.css')}}" type="text/css" media="screen">
    <link rel="stylesheet" href="{{url('frontend_assets/css/grid.css')}}" type="text/css" media="screen">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>    <script src="{{url('frontend_assets/js/cufon-yui.js')}}" type="text/javascript"></script>
    <script src="{{url('frontend_assets/js/cufon-replace.js')}}" type="text/javascript"></script>
    <script src="{{url('frontend_assets/js/NewsGoth_400.font.js')}}" type="text/javascript"></script>
    <script src="{{url('frontend_assets/js/NewsGoth_700.font.js')}}" type="text/javascript"></script>
    <script src="{{url('frontend_assets/js/NewsGoth_Lt_BT_italic_400.font.js')}}" type="text/javascript"></script>
    <script src="{{url('frontend_assets/js/Vegur_400.font.js')}}" type="text/javascript"></script>
    <script src="{{url('frontend_assets/js/jquery.featureCarousel.js')}}" type="text/javascript"></script>

    <script type="text/javascript" src="//connect.facebook.net/en_US/sdk.js"></script>


</head>
<body>
@include('layouts.frontLayout.header')
@yield('content')

@include('layouts.frontLayout.footer')
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript">
    jQuery.fn.extend({
        live: function (event, callback) {
            if (this.selector) {
                jQuery(document).on(event, this.selector, callback);
            }
            return this;
        }
    });
    $(document).ready(function() {
        $("#carousel").featureCarousel({
            autoPlay:7000,
            trackerIndividual:false,
            trackerSummation:false,
            topPadding:50,
            smallFeatureWidth:.9,
            smallFeatureHeight:.9,
            sidePadding:0,
            smallFeatureOffset:0
        });
    });
</script>
</body>
</html>