@include('frontend.common.head')
@php
  $disbleCls = '';
  $paramName = Request::segment(2);
  $showArrow = 'none';
  $backArrow = 'none';
   if ($paramName == 'show'){
       $disbleCls = 'all_field_disable';
        $backArrow = 'block';

    }
   if ($paramName == 'edit'){

        $showArrow = 'block';

    }
@endphp
<div class="wrapper" role="main">
  <!--add client section start-->
  <div class="menu_main profile_main add_client_main textSet_main">
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
                <li><a class="all_buttons" href="{{url('menu')}}">Menu</a>
                  <span>Espace Client</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="main_logo_outer">
          @include('frontend.common.header_logo')
          <div class="edit_view_row_sec">
            <a style="display: {{$showArrow}} !important;" class="edit_view_btn" href="{{route('client_list.show', Hashids::encode($client->id))}}" >Afficher</a>
            <a style="display: {{$backArrow}} !important;" class="edit_view_btn" href="{{route('client.edit', Hashids::encode($client->id))}}" >Editer</a>
          </div>
        </div>
        <div class="menu_detail {{$disbleCls}}">
          <div class="profile_list ">
            <form id="edit_client_form">
              <input type="hidden" value="{{$client->id}}" id="client_id">
              <ul>
                <li>
                  <div class="profile_box">
                    <div class="menu_box_table">
                      <div class="profile_box_tableCell width30">
                        <div class="profile_box_text">
                          <strong>Nom:</strong>
                        </div>
                      </div>
                      <div class="profile_box_tableCell">
                        <div class="profile_edit_feildOut">
                          <div class="profile_edit_feild">
                            <input type="text" name="last_name" value="{{$client->last_name}}">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="profile_box">
                    <div class="menu_box_table">
                      <div class="profile_box_tableCell width30">
                        <div class="profile_box_text">
                          <strong>Prenom:</strong>
                        </div>
                      </div>
                      <div class="profile_box_tableCell">
                        <div class="profile_edit_feildOut">
                          <div class="profile_edit_feild">
                            <input type="text" name="first_name" value="{{$client->first_name}}">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="profile_box">
                    <div class="menu_box_table">
                      <div class="profile_box_tableCell width30">
                        <div class="profile_box_text">
                          <strong>Email:</strong>
                        </div>
                      </div>
                      <div class="profile_box_tableCell">
                        <div class="profile_edit_feildOut">
                          <div class="profile_edit_feild">
                            <input type="email" name="email" value="{{$client->email}}">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="profile_box">
                    <div class="menu_box_table">
                      <div class="profile_box_tableCell width30">
                        <div class="profile_box_text">
                          <strong>Adresse de Facturation:</strong>
                        </div>
                      </div>
                      <div class="profile_box_tableCell">

                      </div>
                    </div>
                    <div class="add_client_detail">
                      <div class="add_client_detail_row">
                        <div class="menu_box_table">
                          <div class="profile_box_tableCell width30">
                            <div class="profile_box_text">
                              <strong>Rue:</strong>
                            </div>
                          </div>
                          <div class="profile_box_tableCell">
                            <div class="profile_edit_feildOut">
                              <div class="profile_edit_feild">
                                <input type="text" name="street" value="{{$client->street}}">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="add_client_detail_row">
                        <div class="menu_box_table">
                          <div class="profile_box_tableCell width30">
                            <div class="profile_box_text">
                              <strong>Numero:</strong>
                            </div>
                          </div>
                          <div class="profile_box_tableCell">
                            <div class="profile_edit_feildOut">
                              <div class="profile_edit_feild">
                                <input type="text" name="street_number" value="{{$client->street_number}}">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="add_client_detail_row">
                        <div class="menu_box_table">
                          <div class="profile_box_tableCell width30">
                            <div class="profile_box_text">
                              <strong>Code Postal:</strong>
                            </div>
                          </div>
                          <div class="profile_box_tableCell">
                            <div class="profile_edit_feildOut">
                              <div class="profile_edit_feild">
                                <input type="text" name="postal_code" value="{{$client->postal_code}}">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="add_client_detail_row">
                        <div class="menu_box_table">
                          <div class="profile_box_tableCell width30">
                            <div class="profile_box_text">
                              <strong>Municipalite:</strong>
                            </div>
                          </div>
                          <div class="profile_box_tableCell">
                            <div class="profile_edit_feildOut">
                              <div class="profile_edit_feild">
                                <input type="text" name="municipality" value="{{$client->municipality}}">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="profile_box">
                    <div class="menu_box_table">
                      <div class="profile_box_tableCell width30">
                        <div class="profile_box_text">
                          <strong>Numero de Telephone:</strong>
                        </div>
                      </div>
                      <div class="profile_box_tableCell">
                        <div class="profile_edit_feildOut">
                          <div class="profile_edit_feild">
                            <input type="text" name="phone_number" value="{{$client->phone_number}}">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="menu_box_table addClient_lang_main">
                    <div class="profile_box_tableCell width60">
                      <div class="profile_box">
                        <div class="menu_box_table">
                          <div class="profile_box_tableCell width30">
                            <div class="profile_box_text">
                              <strong>Langue:</strong>
                            </div>
                          </div>
                          <div class="profile_box_tableCell">
                            <div class="addClient_lang client_language_sec">
                              <ul>
                                <li><a  data-name="FR" class="{{$client->language === 'FR' ? 'active' : ''}}" href="javascript:void(0);">FR</a></li>
                                <li><a data-name="NL" class="{{$client->language === 'NL' ? 'active' : ''}}" href="javascript:void(0);">NL</a></li>
                                <li><a data-name="EN" class="{{$client->language === 'EN' ? 'active' : ''}}" href="javascript:void(0);">EN</a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="profile_box_tableCell width40">
                      <div class="profile_box">
                        <div class="addClient_lang client_language_tone">
                          <ul>
                            <li><a data-name="Tu" class="{{$client->language_tone == "Tu" ? 'active' : ''}}" href="javascript:void(0);">Tu</a></li>
                            <li><a data-name="Vous" class="{{$client->language_tone == "Vous" ? 'active' : ''}}" href="javascript:void(0);">Vous</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="addclient_appendRow_main">
                    @php  $workAddressArr = json_decode($client->work_address, true);
                    @endphp
                    @if(($workAddressArr))
                      @foreach($workAddressArr as $address)

                         <div class="addclient_appendRow">
                          <div class="profile_box">
                            <div class="menu_box_table">
                              <div class="profile_box_tableCell width30">
                                <div class="profile_box_text">
                                  <strong>Adresse de Chantier:</strong>
                                </div>
                              </div>
                              <div class="profile_box_tableCell">

                              </div>
                            </div>
                            <div class="add_client_detail">
                              <div class="add_client_detail_row">
                                <div class="menu_box_table">
                                  <div class="profile_box_tableCell width30">
                                    <div class="profile_box_text">
                                      <strong>Rue:</strong>
                                    </div>
                                  </div>
                                  <div class="profile_box_tableCell">
                                    <div class="profile_edit_feildOut">
                                      <div class="profile_edit_feild">
                                        <input type="text" name="work_address_street" value="{{ $address['street'] }}">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="add_client_detail_row">
                                <div class="menu_box_table">
                                  <div class="profile_box_tableCell width30">
                                    <div class="profile_box_text">
                                      <strong>Numero:</strong>
                                    </div>
                                  </div>
                                  <div class="profile_box_tableCell">
                                    <div class="profile_edit_feildOut">
                                      <div class="profile_edit_feild">
                                        <input type="text" name="word_address_street_number" value="{{ $address['street_number'] }}">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="add_client_detail_row">
                                <div class="menu_box_table">
                                  <div class="profile_box_tableCell width30">
                                    <div class="profile_box_text">
                                      <strong>Code Postal:</strong>
                                    </div>
                                  </div>
                                  <div class="profile_box_tableCell">
                                    <div class="profile_edit_feildOut">
                                      <div class="profile_edit_feild">
                                        <input type="text" name="work_address_postal_code" value="{{ $address['postal_code'] }}">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="add_client_detail_row">
                                <div class="menu_box_table">
                                  <div class="profile_box_tableCell width30">
                                    <div class="profile_box_text">
                                      <strong>Municipalite:</strong>
                                    </div>
                                  </div>
                                  <div class="profile_box_tableCell">
                                    <div class="profile_edit_feildOut">
                                      <div class="profile_edit_feild">
                                        <input type="text" name="work_address_municipality" value="{{ $address['municipality'] }}">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <a style="display: {{$disbleCls != '' ? 'none' : 'block'}}" class="addClient_addBtn" href="javascript:void(0);"><i class="fa fa-plus"></i></a>
                          <a style="display: {{$disbleCls != '' ? 'none' : 'block'}}" class="addClient_delBtn" href="javascript:void(0);"><i class="fa fa-minus"></i></a>
                        </div>

                      @endforeach
                    @endif
                  </div>
                </li>
                <li>
                  <div class="profile_box">
                    <div class="menu_box_table">
                      <div class="profile_box_tableCell width30">
                        <div class="profile_box_text">
                          <strong>Numero TVA:</strong>
                        </div>
                      </div>
                      <div class="profile_box_tableCell">
                        <div class="profile_edit_feildOut">
                          <div class="profile_edit_feild">
                            <input type="text" name="tva_number" value="{{ $client->tva_number}}">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="addClient_saveBtn">
                    <input type="button" value="Save" class="edit_client_pg_btn" style="display: {{$disbleCls != '' ? 'none' : 'block'}}">
                  </div>
                </li>
              </ul>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--add client section end-->
</div>

</body>
</html>
