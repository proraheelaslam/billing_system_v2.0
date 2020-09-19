@include('frontend.common.head')
<div class="wrapper" role="main">
  <!--menu section start-->
  <div class="menu_main create_quote_main">
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
          <div class="create_quote_list">
            <ul>
              <li>
                <div class="create_quote_btn">
                  <a href="{{route('clients_quote.list')}}">Client Existant</a>
                </div>
              </li>
              <li>
                <div class="create_quote_btn">
                  <a href="{{route('quote.add',['is_non_client'=>1])}}">Client Non-Existant</a>
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
