<script type="text/javascript" src="{{asset('js/backend_js/datatable/jquery-1.12.3.js')}}"></script>
<!--Confirm_Jquery_Popup-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="{{ url('/admin/home') }}" class="logo">
        <img src="{{asset('images/backend_images/logo.png')}}" alt="">
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->

<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <!-- <li>
            <input type="text" class="form-control search" placeholder=" Search">
        </li> -->
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
            @if(Auth::user())
                <img alt="" src="{{asset('images/backend_images/avatar1_small.jpg')}}">
                <span class="username">{{ Auth::user()->name }}</span>
                <b class="caret"></b>
            @else 
                <img alt="" src="{{asset('images/backend_images/user.png')}}">
                <b class="caret"></b>  
            @endif              
                
            </a>
         
            <ul class="dropdown-menu extended logout">
            @if (Auth::guest())
                <li><a href="{{ url('/admin/login') }}">Login</a></li>
                <li><a href="{{ url('/admin/register') }}">Register</a></li>
            @else  
                <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                <li>
                <a href="{{ url('/admin/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        <i class="fa fa-key"></i> Log Out</a>
                                    </a>  
                                    <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>  
            @endif
                </li>
            </ul>
        </li>
    </ul>
    <!--search & user info end-->

<ul style="padding-top:5px; display: block;" class="nav pull-right top-menu">
<li class="dropdown">
<a style="padding:5px; font-size:13px;" data-toggle="dropdown" class="dropdown-toggle" href="#">
@php $locale = session()->get('locale'); @endphp
        @switch($locale)
            @case('fr')
            <img src="{{asset('images/backend_images/flags/fr.png')}}" width="30px" height="20x"> French
            @break
            @case('es')
            <img src="{{asset('images/backend_images/flags/es.png')}}" width="30px" height="20x"> Spanish
            @break
            @default
            <img src="{{asset('images/backend_images/flags/us.png')}}" width="30px" height="20x"> English
        @endswitch
<!-- Right Side Of Navbar -->
    <ul class="dropdown-menu extended logout">
        <!-- Authentication Links -->
        <li><a class="lang" data-lang="en" href="#"><img src="{{asset('images/backend_images/flags/us.png')}}" width="30px" height="20x"> English</a></li>
        <li><a class="lang" data-lang="fr" href="#"><img src="{{asset('images/backend_images/flags/fr.png')}}" width="30px" height="20x"> French</a></li>
        <li><a class="lang" data-lang="es" href="#"><img src="{{asset('images/backend_images/flags/es.png')}}" width="30px" height="20x"> Spanish</a></li>

    </ul>
</a>


</li>

</ul>


</div>


</header>


<script type="text/javascript">
// Switch languages
//$( document ).ready(function() {
    $(function(){
    //var currentLanguage = document.documentElement.lang;
    //alert(currentLanguage);
    $('.lang').on('click', function($event) {
        $event.preventDefault();
        var $selectedLang = $(this).data('lang');
        var $baseurl = {!! json_encode(url('/admin/switchLang/')) !!};
        var $base_url  = $baseurl + '/'+ $selectedLang;
        //alert($baseurl);
        $.ajax({
            url: $base_url,
            type: 'GET',
            success: function(response)
            {
                //console.log(response);
                location.href = window.location.href;
            }
        });
    });
});
//});
</script>