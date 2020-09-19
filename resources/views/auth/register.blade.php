
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
{{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

<!---header file-->

    <meta charset="utf-8">
    <link rel="stylesheet" href="{{url('frontend_assets/css/reset.css')}}" type="text/css" media="screen">
    <link rel="stylesheet" href="{{url('frontend_assets/css/style.css')}}" type="text/css" media="screen">
    <link rel="stylesheet" href="{{url('frontend_assets/css/grid.css')}}" type="text/css" media="screen">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <script src="{{url('frontend_assets/js/jquery-1.6.3.min.js')}}" type="text/javascript"></script>
    <script src="{{url('frontend_assets/js/cufon-yui.js')}}" type="text/javascript"></script>
    <script src="{{url('frontend_assets/js/cufon-replace.js')}}" type="text/javascript"></script>
    <script src="{{url('frontend_assets/js/NewsGoth_400.font.js')}}" type="text/javascript"></script>
    <script src="{{url('frontend_assets/js/NewsGoth_700.font.js')}}" type="text/javascript"></script>
    <script src="{{url('frontend_assets/js/NewsGoth_Lt_BT_italic_400.font.js')}}" type="text/javascript"></script>
    <script src="{{url('frontend_assets/js/Vegur_400.font.js')}}" type="text/javascript"></script>
    <script src="{{url('frontend_assets/js/FF-cash.js')}}" type="text/javascript"></script>
    <script src="{{url('frontend_assets/js/jquery.featureCarousel.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
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

</head>
<body id="app-layout">

<!--Navigation bar header-->

<!--==============================header=================================-->
<header>
    <div class="row-top">
        <div class="main">
            <div class="wrapper">
                <h1><a href="index.html">Advertising Site</a></h1>
                <form id="search-form" method="post" enctype="multipart/form-data">

                    <fieldset>
                        <div class="search-field">

                            <input name="search" type="text" value="Search..." onBlur="if(this.value=='') this.value='Search...'" onFocus="if(this.value =='Search...' ) this.value=''" />

                            <a class="search-button" href="#" onClick="document.getElementById('search-form').submit()"></a>
                        </div>

                    </fieldset>


                @if (Auth::guest())
                    <!-- <li><a href="{{ url('/login') }}">Login</a></li> -->
                    <!-- <li><a href="{{ url('/register') }}">Register</a></li> -->
                        <a href="{{ url('/login') }}"> <button type="button" class="btn btn-primary" id = "btn-login">Login</button></a>

                        <a href="{{ url('/register') }}"><button type="button" class="btn btn-primary" id="btn-sign-up">Signup</button></a>

                    @endif


                </form>
            </div>
        </div>
    </div>
    <div class="menu-row">
        <div class="menu-bg">
            <div class="main">
                <nav class="indent-left">
                    <ul class="menu wrapper">
                        <li class="active"><a href="{{url('/ads_list')}}">Advertising</a></li>
                        <li><a href="option.html">option</a></li>
                        <li><a href="Test3.html">Test3</a></li>
                        @if (!Auth::guest())
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                                </ul>
                            </li>
                    @endif
                    <!-- <li><a href="projects.html">our projects</a></li>
                                <li><a href="contact.blade.php">Contact Us</a></li> -->
                    </ul>
                </nav>
            </div>
        </div>
    </div>

</header>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

