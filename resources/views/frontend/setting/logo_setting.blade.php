@include('frontend.common.head')
<div class="wrapper" role="main">
  <!--menu section start-->
  <div class="menu_main client_detail_main">
    <div class="menu_auto">
      <div class="menu_inner">
        @include('frontend.common.header_prev_button')
        <div class="home_header clearfix">
          <div class="home_header_left">

          </div>
          <div class="home_header_right">
            <div class="home_header_menu">
              <ul>
                <li><a class="all_buttons" href="{{route('menu')}}">Menu</a><span>Espace de Configuration</span></li>
              </ul>
            </div>
          </div>
        </div>
        @include('frontend.common.header_logo')
        @php
          $type = 'logo';
          $imagePath = getSettingImage('logo');
          if(request()->segment(count(request()->segments())) === 'logo'){
                  $type = 'logo';
          }elseif (request()->segment(count(request()->segments())) === 'contact_image'){
                   $type = 'contact_image';
                    $imagePath = getSettingImage('contact_image');
          }elseif (request()->segment(count(request()->segments())) === 'home_image'){
                   $type = 'home_image';
                   $imagePath = getSettingImage('home_image');
          }
        @endphp

        <div class="menu_detail">
          <div class="menu_list menu_logo_sec">
            <ul>
              <li>
                    <div class="change_log_section" >
                      <img id="image_place_sec" src="{{$imagePath}}" alt="your image" />
                    </div>
              </li>
              <li>
                <div class="organization_logo_right">
                  <div class="organization_logo_btns logo_btn_sec ">
                    <a id="anchr_download_img " class="all_buttons" download href="{{$imagePath}}">Download Image</a>

                </div>
                </div>
              </li>
              <li>
                <div class="organization_logo_right input_file_sec">
                  <div class="organization_logo_btns">
                    <button class="all_buttons" type="button">
                      <input  data-type="{{$type}}"  accept="image/*" type="file" name="org_logo" class="setting_upload_image">
                      Change
                    </button>

                  </div>
                </div>
              </li>
            </ul>

          </div>
        </div>
      </div>
    </div>
  </div>
  <!--menu section start-->
</div>
<script>

</script>
</body>
</html>
