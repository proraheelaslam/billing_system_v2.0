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
                  <<span>Espace Statisque</span>
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
                  <span>Factures impayees (Annee courante)</span>
                  <a href="{{route('tech.statistics')}}"></a>
                </div>
              </li>
            </ul>
          </div>
          <div class="number_convert_main">
            <div class="number_convert">
              <div class="number_convert_num">
                <strong>{{$total_unpaid_bills}}</strong>
              </div>
              <div class="number_convert_text">
                <p>Vous avez {{$total_unpaid_bills}} factures impayees. Cliquez <a href="{{route('bills.list',['status'=>'unpaid'])}}">ici</a> pour voir la liste.</p>
              </div>
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
