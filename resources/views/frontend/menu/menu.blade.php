
@include('frontend.common.head')
<div class="wrapper" role="main">
    <!--menu section start-->
   <div class="menu_main">

    <div class="menu_auto">
      <div class="menu_inner">
       
        <div class="home_header clearfix">
          <div class="home_header_left">

          </div>
          <div class="home_header_right">
            <div class="home_header_menu">
              <ul>
                <li><a class="all_buttons" href="{{route('profile')}}">Profile</a></li>
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
                        <strong>Devis <span>(Creer / Changer un Devis)</span></strong>
                        <i><img src="{{asset('frontend_assets/images/mail_icon.png')}}" alt="#"></i>
                      </div>
                    </div>
                  </div>
                  <a href="{{route('menu.quote')}}"></a>
                </div>
              </li>
              <li>
                <div class="menu_box">
                  <div class="menu_box_table">
                    <div class="menu_box_tableCell">
                      <div class="menu_box_text">
                        <strong>Facture <span>(Creer / Convertir un Devis)</span></strong>
                        <i><img src="{{asset('frontend_assets/images/open_mail_icon.png')}}" alt="#"></i>
                      </div>
                    </div>
                  </div>
                  <a href="{{route('menu.billing')}}"></a>
                </div>
              </li>
              <li>
                <div class="menu_box">
                  <div class="menu_box_table">
                    <div class="menu_box_tableCell">
                      <div class="menu_box_text">
                        <strong>Tableau de Bord <span>(Mettez a jours vos paiements)</span></strong>
                        <i><img src="{{asset('frontend_assets/images/table_icon.png')}} " alt="#"></i>
                      </div>
                    </div>
                  </div>
                  <a href="{{route('bills.list')}}"></a>
                </div>
              </li>
              <li>
                <div class="menu_box">
                  <div class="menu_box_table">
                    <div class="menu_box_tableCell">
                      <div class="menu_box_text">
                        <strong>Clients <span>(Creer Changer)</span></strong>
                        <i><img src="{{asset('frontend_assets/images/client_icon.png')}}" alt="#"></i>
                      </div>
                    </div>
                  </div>
                  <a href="{{route('menu.client')}}"></a>
                </div>
              </li>
              <li>
                <div class="menu_box">
                  <div class="menu_box_table">
                    <div class="menu_box_tableCell">
                      <div class="menu_box_text">
                        <strong>Technique <span>(Analyses Techniques)</span></strong>
                        <i><img src="{{asset('frontend_assets/images/tech_icon.png')}}" alt="#"></i>
                      </div>
                    </div>
                  </div>
                  <a href="{{route('tech.statistics')}}"></a>
                </div>
              </li>
              <li>
                <div class="menu_box">
                  <div class="menu_box_table">
                    <div class="menu_box_tableCell">
                      <div class="menu_box_text">
                        <strong>Historique <span>(Dossier Clients)</span></strong>
                        <i><img src="{{asset('frontend_assets/images/hist_icon.png')}}" alt="#"></i>
                      </div>
                    </div>
                  </div>
                  <a href="{{route('client.folder')}}"></a>
                </div>
              </li>
              <li>
                <div class="menu_box">
                  <div class="menu_box_table">
                    <div class="menu_box_tableCell">
                      <div class="menu_box_text">
                        <strong>Configuration <span>(Emails, Logos...)</span></strong>
                        <i><img src="{{asset('frontend_assets/images/config_icon.png')}} " alt="#"></i>
                      </div>
                    </div>
                  </div>
                  <a href="{{route('configuration.menu')}}"></a>
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
