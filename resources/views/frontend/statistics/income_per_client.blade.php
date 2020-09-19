@include('frontend.common.head')
<div class="wrapper" role="main">
  <!--client list section start-->
  <div class="menu_main statistics_main income_main">
    <div class="menu_auto">
      <div class="menu_inner">
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
                  <span>Revenus par client</span>
                  <a href="{{route('tech.statistics')}}"></a>
                </div>
              </li>
            </ul>
          </div>
          <div class="income_chart_main">
              <div class="income_search_main clearfix">
                  <div class="client_search">
                      <input type="search" class="income_srch_client" placeholder="Chercher Client">
                      <input type="submit">
                  </div>
              </div>
             <div id="per_client_income_list_sec">
                 @include('frontend.statistics.income_per_client_list')
             </div>

          </div>
        </div>
      </div>
    </div>
  </div>
  <!--client list section end-->
</div>

</body>
</html>

