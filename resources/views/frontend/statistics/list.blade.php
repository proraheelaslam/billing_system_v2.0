@include('frontend.common.head')
<div class="wrapper" role="main">
  <!--client list section start-->
  <div class="menu_main statistics_main">
    <div class="menu_auto">
      <div class="menu_inner">
        @include('frontend.common.header_prev_button')
        <div class="home_header clearfix">
          <div class="home_header_left">

          </div>
          <div class="home_header_right">
            <div class="home_header_menu">
              <ul>
                <li><a class="all_buttons" href="{{route('menu')}}">Menu</a>
                  <span>Espace Statisque</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
        @include('frontend.common.header_logo')
        <div class="statistics_content">
          <div class="statistics_list">
            <ul>
              <li>
                <div class="statistics_list_text">
                  <span>Revenus par an / mois</span>
                  <a href="{{route('tech.per_year')}}"></a>
                </div>
              </li>
              <li>
                <div class="statistics_list_text">
                  <span>Revenus par client</span>
                  <a href="{{route('tech.per_client')}}"></a>
                </div>
              </li>
              <li>
                <div class="statistics_list_text">
                  <span>Nombers de dvis non convertis (Annee courante)</span>
                  <a href="{{route('tech.unconverted_quotes')}}"></a>
                </div>
              </li>
              <li>
                <div class="statistics_list_text">
                  <span>Factures impayees (Annee courante)</span>
                  <a href="{{route('tech.unpaid_bill')}}"></a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--client list section end-->
</div>

</body>
</html>
