@include('frontend.common.head')
<div class="wrapper" role="main">
  <!--client list section start-->
  <div class="menu_main profile_main client_list_main textSet_main newquote_main ">
    <div class="menu_auto">
      <div class="menu_inner">
        @if(request()->status == 'unpaid')
          <div class="nextPrev_btns">
            <a style="display: block !important;" class="next_btn" href="{{route('tech.unpaid_bill')}}"></a>
          </div>
          @else
          <div class="nextPrev_btns">
            <a style="display: block !important;" class="next_btn" href="{{url()->previous()}}"></a>
          </div>
        @endif

        <div class="home_header clearfix">
          <div class="home_header_left">

          </div>
          <div class="home_header_right">
            <div class="home_header_menu">
              <ul>
                <li><a class="all_buttons" href="{{route('menu')}}">Menu</a>
                  <span>Espace de mise a jour</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="main_logo_outer stats_sec">
        @include('frontend.common.header_logo')



        </div>
        <div class="">
          <div class="client_search">
            <input type="search" class="bill_srch_field" placeholder="Recherche Numero de Facture / Nom de Client / Concerne">
            <input type="submit">
          </div>


          <div id="bill_list_section">
            @include('frontend.bills.bill_listing')
          </div>

        </div>
      </div>
    </div>
  </div>
  <!--client list section end-->
</div>

</body>
</html>
