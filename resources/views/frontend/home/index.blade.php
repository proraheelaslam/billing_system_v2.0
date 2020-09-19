@include('frontend.common.head')
<div class="wrapper" role="main">
    <!--home section start-->
    <div class="home_main" style="background-image: url('{{getSettingImage('home_image')}}');background-repeat:no-repeat;
            background-size: cover;position: relative;">
      <div class="home_auto">
        <div class="home_inner">
          <div class="home_header clearfix">
            <div class="home_header_left">
              <div class="home_header_logo ">
                <a href="{{url('/')}}"><img id="hdr_logo_set" src="{{getSettingImage('logo')}} " alt="#"></a>
              </div>
            </div>
            <div class="home_header_right">
              <div class="home_header_menu">
                <ul>
                  <li><a class="all_buttons" href="{{route('contact_us')}}">Contact</a></li>
                  <li><a class="all_buttons" href="{{route('login')}}">Login</a></li>

                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <!--home section start-->
</div>

</body>
</html>
