@include('frontend.common.head')
<script>
    var app_url = '{{url('/')}}'
</script>
<div class="wrapper" role="main">
    <!--contact section start-->
    <div class="contact_main" style="background-image: url('{{getSettingImage('contact_image')}}');background-repeat:no-repeat;  ;background-size:cover;position: relative;">
      <div class="contact_auto">
        <div class="contact_inner">
          <div class="home_header clearfix">
            <div class="home_header_left">
              
            </div>
            <div class="home_header_right">
              <div class="home_header_menu">
                <ul>
                 {{-- <li><a class="all_buttons active" href="javascript:void(0);">Contact</a></li>--}}
                  <li><a class="all_buttons" href="{{url('/')}}">Menu</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="contact_form">
            <ul>
              <li>
                <div class="contact_formFeild_out">
                  <div class="contact_form_feild">
                    <input type="email" name="" class="contact_email" placeholder="Email Address">
                  </div>
                </div>
              </li>
              <li>
                <div class="contact_formFeild_out">
                  <div class="contact_form_feild">
                    <input type="text" name="" class="contact_subject" placeholder="Subjet">
                  </div>
                </div>
              </li>
              <li>
                <div class="contact_formFeild_out">
                  <div class="contact_form_feild">
                    <textarea placeholder="Votre Message" class="contact_message"></textarea>
                  </div>
                </div>
              </li>
              <li>
                <div class="contact_form_submit clearfix">
                  <input type="button" name="" value="Envoyer" id="submit_contact_form">
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  <!--contact section start-->
</div>

</body>
</html>
