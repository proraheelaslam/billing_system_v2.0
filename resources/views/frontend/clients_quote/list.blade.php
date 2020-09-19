@include('frontend.common.head')
<div class="wrapper" role="main">
  <!--client list section start-->
  <div class="menu_main profile_main client_list_main textSet_main newquote_main">
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
                  <span>Espace Devis</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
        @include('frontend.common.header_logo')
        <div class="menu_detail">
          <div class="client_search">
            <input data-type="{{request()->segment(count(request()->segments()))}}" type="search" placeholder="Recherche Client" class="client_srch_field">
            <input type="submit" class="search_client_btn">
          </div>
          <div class="profile_list " id="client_list_section">
            @include('frontend.clients_quote.quote_listing')
          </div>
          <ul>
            <li>
              <div class="add_client_btn add_new_client_button">
                <a href="{{route('quote.add')}}">Nouveau Devis</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!--client list section end-->
</div>

</body>
</html>
