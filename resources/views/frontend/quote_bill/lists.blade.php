@include('frontend.common.head')
<div class="wrapper" role="main">
  <!--client list section start-->
  <div class="menu_main profile_main client_list_main textSet_main newquote_main">
    <div class="menu_auto">
      <div class="menu_inner">
        <div class="nextPrev_btns">
            <a style="display: block !Important" class="next_btn" href="{{route('menu')}}"></a>
        </div>
        <div class="home_header clearfix">
          <div class="home_header_left">

          </div>
          <div class="home_header_right">
            <div class="home_header_menu">
              <ul>
                <li><a class="all_buttons" href="{{route('menu')}}">Menu</a>
                  @if(request()->segment(count(request()->segments())) === 'show' ||
                      request()->segment(count(request()->segments())) == 'edit'  ||
                      request()->segment(count(request()->segments())) == 'delete' )
                        <span>Espace Devis</span>
                    @else
                        <span>Espace Facturation</span>
                    @endif

                </li>
              </ul>
            </div>
          </div>
        </div>
        @include('frontend.common.header_logo')
        <div class="menu_detail">
          <div class="client_search">
            <input type="search" data-quote-type="quote-bill"  data-type="{{request()->segment(count(request()->segments()))}}" placeholder="Recherche Client/Concerne" class="quote_srch_field">
            <input type="submit" class="search_client_btn">
          </div>
          <div class="listing_popuop delete_confirm_popup_box" style="display: none" >
            <div class="listing_pop_table">
              <div class="listing_pop_tableCell">
                <div class="listing_pop_inner">
                  <div class="menu_box_table">
                    <div class="profile_box_tableCell width55">
                      <div class="listing_pop_text">
                        <p>Etes vous sur de vouloir supprimer ce facture</p>
                      </div>
                    </div>
                    <div class="profile_box_tableCell">
                      <div class="listing_pop_btns">
                        <ul>
                          <li><a href="javascript:void(0)" class="cancel_del_button">Annuler</a></li>
                          <li><a href="javascript:void(0)" class="confirm_del_btn">Oui</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="profile_list " id="client_list_section">
            @include('frontend.quote_bill.quote_bill_listing')
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--client list section end-->
</div>

</body>
</html>
