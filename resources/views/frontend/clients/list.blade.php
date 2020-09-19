@include('frontend.common.head')

@php
      $addQuoteCls = '';
      $showAddButton = 'block';
      $menuText = '<span>Espace Facturation</span>';
      if(request()->segment(count(request()->segments())) === 'bill'){
              $addQuoteCls = 'newquote_main';
      }elseif (request()->segment(count(request()->segments())) == 'delete' &&  $type == 'delete'){
               $showAddButton = 'none';
      }
      elseif(request()->segment(count(request()->segments())) === 'folder'){
              $addQuoteCls = 'newquote_main';
              $showAddButton = 'none';
               $menuText = '<span>Espace Dossier</span>';
      }elseif(request()->segment(count(request()->segments())) === 'clients' ||
             request()->segment(count(request()->segments())) === 'show' ||
             request()->segment(count(request()->segments())) === 'delete'){
               $menuText = '<span>Espace Clients</span>';
      }

//
@endphp
<div class="wrapper" role="main">
  <!--client list section start-->
  <div class="menu_main profile_main client_list_main textSet_main {{$addQuoteCls}}">
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
                  <span>{!! $menuText !!}</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="main_logo_outer">
          @include('frontend.common.header_logo')
        </div>
        <div class="menu_detail">
          <div class="client_search">
            <input type="search" data-type="{{request()->segment(count(request()->segments()))}}" placeholder="Recherche Client" class="client_srch_field">
            <input type="submit" class="search_client_btn">
          </div>

          <div class="profile_list " id="client_list_section">
            @include('frontend.clients.client_listing')
          </div>

              <ul style="display: {{$showAddButton}}">
                <li>
                  <div class="add_client_btn add_new_client_button">
                    <a href="{{route('client.create')}}">Ajouter Nouveau Client</a>
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
