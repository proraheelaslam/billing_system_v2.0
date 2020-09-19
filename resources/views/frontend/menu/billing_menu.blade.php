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
                <li><a class="all_buttons" href="{{route('menu')}}">Menu</a><span>Espace Facturation</span></li>
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
                        <strong>Creer une Facture</strong>
                        <i><img src="{{asset('frontend_assets/images/plus_icon_black.png')}} " alt="#"></i>
                      </div>
                    </div>
                  </div>
                  <a href="{{route('billing_menu.create')}}"></a>
                </div>
              </li>
              <li>
                <div class="menu_box">
                  <div class="menu_box_table">
                    <div class="menu_box_tableCell">
                      <div class="menu_box_text">
                        <strong>Editer une Facture</strong>
                        <i><img src="{{asset('frontend_assets/images/towArrow_icon.png')}} " alt="#"></i>
                      </div>
                    </div>
                  </div>
                  <a href="{{route('bill.edit')}}"></a>
                </div>
              </li>
              <li>
                <div class="menu_box">
                  <div class="menu_box_table">
                    <div class="menu_box_tableCell">
                      <div class="menu_box_text">
                        <strong>Afficher une Facture</strong>
                        <i><img src="{{asset('frontend_assets/images/lcd_icon.png')}}" alt="#"></i>
                      </div>
                    </div>
                  </div>
                  <a href="{{route('bill.show')}}"></a>
                </div>
              </li>
              <li>
                <div class="menu_box disabled_section">
                  <div class="menu_box_table">
                    <div class="menu_box_tableCell">
                      <div class="menu_box_text">
                        <strong>Envoyer une Facture</strong>
                        <i><img src="{{asset('frontend_assets/images/send_icon.png')}}" alt="#"></i>
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
                        <strong>Supprimer une Facture</strong>
                        <i><img src="{{asset('frontend_assets/images/del_icon.png')}}" alt="#"></i>
                      </div>
                    </div>
                  </div>
                  <a href="{{route('bill.delete_list')}}"></a>
                </div>
              </li>
              <li>
                <div class="menu_box disabled_section">
                  <div class="menu_box_table">
                    <div class="menu_box_tableCell">
                      <div class="menu_box_text">
                        <strong>Dupliquer une Facture</strong>
                        <i><img src="{{asset('frontend_assets/images/page_icon.png')}}" alt="#"></i>
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
