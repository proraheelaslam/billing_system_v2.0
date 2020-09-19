@include('frontend.common.head')
<div class="wrapper" role="main">
  <!--menu section start-->
  <div class="menu_main quote_detail_main">
    <div class="menu_auto">
      <div class="menu_inner">
        @include('frontend.common.header_prev_button')
        <div class="home_header clearfix">
          <div class="home_header_left">

          </div>
          <div class="home_header_right">
            <div class="home_header_menu">
              <ul>

                  @if(request()->segment(count(request()->segments())) === 'quote_menu')

                      <li><a class="all_buttons" href="{{route('menu')}}">Menu</a><span>Espace Devis</span></li>
                   @elseif(request()->segment(count(request()->segments())) === 'quote_menu')


                  @endif

              </ul>
            </div>
          </div>
        </div>

        <div class="main_logo_outer">
          @include('frontend.common.header_logo')

        </div>

        <div class="menu_detail">
          <div class="menu_list">
            <ul>
              <li>
                <div class="menu_box">
                  <div class="menu_box_table">
                    <div class="menu_box_tableCell">
                      <div class="menu_box_text">
                        <strong>Creer un Devis</strong>
                        <i><img src="{{asset('frontend_assets/images/plus_icon_black.png')}} " alt="#"></i>
                      </div>
                    </div>
                  </div>
                  <a href="{{route('quote_menu.create')}}"></a>
                </div>
              </li>
              <li>
                <div class="menu_box">
                  <div class="menu_box_table">
                    <div class="menu_box_tableCell">
                      <div class="menu_box_text">
                        <strong>Editer un Devis</strong>
                        <i><img src="{{asset('frontend_assets/images/towArrow_icon.png')}} " alt="#"></i>
                      </div>
                    </div>
                  </div>
                  <a href="{{route('quote.edit')}}"></a>
                </div>
              </li>
              <li>
                <div class="menu_box">
                  <div class="menu_box_table">
                    <div class="menu_box_tableCell">
                      <div class="menu_box_text">
                        <strong>Afficher un Devis</strong>
                        <i><img src="{{asset('frontend_assets/images/lcd_icon.png')}}" alt="#"></i>
                      </div>
                    </div>
                  </div>
                  <a href="{{route('quote.show')}}"></a>
                </div>
              </li>
              <li>
                <div class="menu_box disabled_section">
                  <div class="menu_box_table">
                    <div class="menu_box_tableCell">
                      <div class="menu_box_text">
                        <strong>Envoyer un Devis</strong>
                        <i><img src="{{asset('frontend_assets/images/send_icon.png')}}" alt="#"></i>
                        <span class="version_feature_sec">V2.0</span>
                      </div>
                    </div>
                  </div>
                  <a href="javascript:void(0);"></a>
                </div>
              </li>
              <li>
                <div class="menu_box">
                  <div class="menu_box_table">
                    <div class="menu_box_tableCell">
                      <div class="menu_box_text">
                        <strong>Supprimer un Devis</strong>
                        <i><img src="{{asset('frontend_assets/images/del_icon.png')}}" alt="#"></i>
                      </div>
                    </div>
                  </div>
                  <a href="{{route('quote.delete_list')}}"></a>
                </div>
              </li>
              <li>
                <div class="menu_box disabled_section">
                  <div class="menu_box_table">
                    <div class="menu_box_tableCell">
                      <div class="menu_box_text">
                        <strong>Dupliquer un Devis</strong>
                        <i><img src="{{asset('frontend_assets/images/page_icon.png')}}" alt="#"></i>
                        <span class="version_feature_sec">V2.0</span>
                      </div>
                    </div>
                  </div>
                  <a href="javascript:void(0);"></a>
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
