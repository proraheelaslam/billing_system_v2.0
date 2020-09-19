@include('frontend.common.head')
<div class="wrapper" role="main">
  <!--menu section start-->
  <div class="menu_main">

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
        <div class="menu_detail">
          <div class="menu_list">
            <ul>
              <li>
                <div class="menu_box">
                  <div class="menu_box_table">
                    <div class="menu_box_tableCell">
                      <div class="menu_box_text">
                        <strong>Email de Devis</strong>
                        <i><img src="{{asset('frontend_assets/images/mail_icon.png')}}" alt="#"></i>
                      </div>
                    </div>
                  </div>
                  <a href="{{route('email_configuration', ['q'=>'quote'])}}"></a>
                </div>
              </li>
              <li>
                <div class="menu_box">
                  <div class="menu_box_table">
                    <div class="menu_box_tableCell">
                      <div class="menu_box_text">
                        <strong>Email de Facture</strong>
                        <i><img src="{{asset('frontend_assets/images/open_mail_icon.png')}}" alt="#"></i>
                      </div>
                    </div>
                  </div>
                  <a href="{{route('email_configuration', ['q'=>'bill'])}}"></a>
                </div>
              </li>
              <li>
                <div class="menu_box">
                  <div class="menu_box_table">
                    <div class="menu_box_tableCell">
                      <div class="menu_box_text">
                        <strong>Email de Remerciement</strong>
                        <i><img src="{{asset('frontend_assets/images/thank_icon.png')}} " alt="#"></i>
                      </div>
                    </div>
                  </div>
                  <a href="{{route('email_configuration', ['q'=>'thank'])}}"></a>
                </div>
              </li>
              <li>
                <div class="menu_box">
                  <div class="menu_box_table">
                    <div class="menu_box_tableCell">
                      <div class="menu_box_text">
                        <strong>Logo</strong>
                        <i><img src="{{asset('frontend_assets/images/brand_icon.png')}}" alt="#"></i>
                      </div>
                    </div>
                  </div>
                  <a href="{{route('setting.logo')}}"></a>
                </div>
              </li>
              <li>
                <div class="menu_box">
                  <div class="menu_box_table">
                    <div class="menu_box_tableCell">
                      <div class="menu_box_text">
                        <strong>Page Contact</strong>
                        <i><img src="{{asset('frontend_assets/images/mail_icn.png')}}" alt="#"></i>
                      </div>
                    </div>
                  </div>
                  <a href="{{route('setting.contact_image')}}"></a>
                </div>
              </li>
              <li>
                <div class="menu_box">
                  <div class="menu_box_table">
                    <div class="menu_box_tableCell">
                      <div class="menu_box_text">
                        <strong>Page Menu Publique</strong>
                        <i><img src="{{asset('frontend_assets/images/menu_icon.png')}}" alt="#"></i>
                      </div>
                    </div>
                  </div>
                  <a href="{{route('setting.home_image')}}"></a>
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

</body>
</html>
