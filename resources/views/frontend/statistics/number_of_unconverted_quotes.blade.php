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
                  <span>Nombers de dvis non convertis (Annee courante)</span>
                  <a href="{{route('tech.statistics')}}"></a>
                </div>
              </li>
            </ul>
          </div>
          <div class="number_convert_main">
            <div class="number_convert">
              <div class="number_convert_num">
                <strong>{{$total_non_converted_quotes}}</strong>
              </div>
              <div class="number_convert_text">
                {{--<p>Vous avez {{$total_non_converted_quotes}} devis non convertis en facture. Cliquez <a href="{{route('quote.list',['type'=> 'quote'])}}">ici</a> pour voir la liste.</p>--}}
                <p>Vous avez {{$total_non_converted_quotes}} devis non convertis en facture. Cliquez <a href="{{route('pre_bill.quote_list')}}">ici</a> pour voir la liste.</p>
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
