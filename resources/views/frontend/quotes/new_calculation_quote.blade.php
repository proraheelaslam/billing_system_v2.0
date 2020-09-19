@include('frontend.common.head')
@php
  $tax_value = '';
  $menuText = '<span>Espace Devis</span>';
  if(count($client->quotes)){
      $tax_value = $client->quotes[0]->tax;
  }
  $quote_type = 'quote';
  $sendMailBtnText = 'Envoyer Devis';
  if (request()->q == 'bill') {
       $quote_type = 'bill';
        $menuText = '<span>Espace Facturation</span>';
        $sendMailBtnText = 'Envoyer Facture';

 }


@endphp
<div class="wrapper" role="main">
  <!--add client section start-->
  <div class="menu_main profile_main add_client_main textSet_main addNewQuote_main">
    <div class="menu_auto">
      <div class="menu_inner">
        @include('frontend.common.header_prev_button')
        <div class="home_header clearfix">
          <div class="home_header_left">

          </div>
          <div class="home_header_right">
            <div class="home_header_menu">
              <ul>
                <li>
                  <a class="all_buttons" href="{{route('menu')}}">Menu</a>
                  {!! $menuText !!}
                </li>
              </ul>
            </div>
          </div>
        </div>
        @include('frontend.common.header_logo')
        <div class="addNewQuote_detail">
          <div class="addNewQuote_head">
            <div class="menu_box_table">
              <div class="profile_box_tableCell width33">

                  <input type="hidden"  class="client_id" value="{{$client->id }}">
                  <input type="hidden"  class="address_id" value="{{$id }}">
                  <input type="hidden"  class="qoute_name" value="{{$client->last_name }} {{ $client->first_name }}">
                  <input type="hidden" class="qoute_address" value="{{$client->street }}">
                  <input type="hidden"  class="qoute_postal_code_city" value="{{$client->municipality }}">
                  <input type="hidden"  class="quote_tva" value="{{$client->tva_number}}">
                  <input type="hidden"  class="qoute_email" value="{{$client->email }}">
                  <input type="hidden"  class="qt_language" value="{{$client->language }}">
                  <input type="hidden"  class="qt_language_tone" value="{{$client->language_tone }}">

                <div class="addNewQuote_head_text">
                  <p>{{$client->user->name}}  </p>
                  <p>{{$client->user->street}}  </p>
                  <p>{{$client->user->street_number}} {{$client->user->municipality}} </p>
                  <p>{{$client->user->tva_number}} </p>
                </div>
              </div>
              <div class="profile_box_tableCell width33">
                <div class="addNewQuote_head_text text_center ">

                  @php
                    $docNumber = 1001;
                           if(getMaxDocumentNumber()) {
                              $docNumber = getMaxDocumentNumber()+1;
                           }else {
                               if(getMaxQuoteNumber()){
                                 $docNumber = getMaxQuoteNumber()+1;
                               }
                           }
                  @endphp

                  <p><b>{{$type == 'bill' ? 'Facture' : 'Devis'}}</b>No. <span class="qt_random_quote_number">{{ $docNumber  }}</span></p>
                </div>
              </div>
              <div class="profile_box_tableCell width33">

                @php
                        $clientData = [];
                        $clientData['last_name'] = $client->last_name;
                        $clientData['first_name'] = $client->first_name;
                        $clientData['street'] = $client->street;
                        $clientData['street_number'] = $client->street_number;
                        $clientData['tva_number'] = $client->tva_number;
                        $clientData['municipality'] = $client->municipality;
                        $clientEncodeData = json_encode($clientData);

                 @endphp
                <div class="addNewQuote_head_text qt_client_info_sec" data-client="{{$clientEncodeData}}" >
                  <p>{{$client->last_name }} {{ $client->first_name }}</p>
                  <p class="qt_client_street">{{$client->street }}</p>
                  <p>{{$client->street_number }} {{$client->municipality }}</p>
                  <p>{{$client->tva_number }}</p>
                </div>
              </div>
            </div>
          </div>
          <div class="profile_list">
            <ul>
              <li>
                <div class="menu_box_table">
                  <div class="profile_box_tableCell width40">
                    <div class="preview_btn">
                      <a href="javascript:void(0)" class="{{$type == 'bill' ? 'qt_preview_non_client_btn' : 'qt_preview_btn'}} ">Preview</a>
                    </div>
                  </div>
                  <div class="profile_box_tableCell width60">
                    <div class="profile_box">
                      <div class="menu_box_table">
                        <div class="profile_box_tableCell width30">
                          <div class="profile_box_text">
                            <strong>Tax:</strong>
                          </div>
                        </div>
                        <div class="profile_box_tableCell">
                          <div class="taxes_main">
                            <ul>
                              <li>
                                <div class="profile_edit_feildOut">
                                  <div class="profile_edit_feild">
                                    <input  type="text" value="0" disabled="disabled" class="tax_field qt_tax_0 {{$tax_value == 0 ? 'active' : ''}}">
                                  </div>
                                </div>
                              </li>
                              <li>
                                <div class="profile_edit_feildOut">
                                  <div class="profile_edit_feild">
                                    <input type="text" value="6"  disabled="disabled" class="tax_field qt_tax_6 {{$tax_value == 6 ? 'active' : ''}}">
                                  </div>
                                </div>
                              </li>
                              <li>
                                <div class="profile_edit_feildOut">
                                  <div class="profile_edit_feild">
                                    <input type="text" value="21"  disabled="disabled" class="tax_field qt_tax_21" {{$tax_value == 21 ? 'active' : ''}}>
                                  </div>
                                </div>
                              </li>
                              <li>
                                <span class="tax_prcnt">%</span>
                              </li>
                            </ul>
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
                    <div class="profile_box_tableCell">
                      <div class="profile_box_text">
                        <strong>Concerne: <span>{{$singleAddressArr['street']}} {{ $singleAddressArr['street_number'] }}</span></strong>
                        <input type="hidden" class="qt_concern_address" value="{{$singleAddressArr['street']}} {{ $singleAddressArr['street_number'] }}">
                      </div>
                    </div>
                    <div class="profile_box_tableCell">
                      <div class="profile_edit_feildOut">
                        <div class="profile_edit_feild">
                          <input type="text" class="qt_concern_text" value="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </li>



                  <li>
                      <div class="addquote_appendRow_main">
                  <div class="addquote_appendRow">
                    <div class="addNewQuote_qty">
                      <div class="menu_box_table">
                        <div class="profile_box_tableCell" style="padding-right: 10px">
                          <div class="profile_box">
                            <div class="menu_box_table">
                              <div class="profile_box_tableCell">
                                <div class="profile_box_text">
                                  <strong>Quantite:</strong>
                                </div>
                              </div>
                              <div class="profile_box_tableCell">
                                <div class="profile_edit_feildOut">
                                  <div class="profile_edit_feild">
                                    <input min="1" type="number" value=""  class=" calculate_ quote_quantity">
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="profile_box_tableCell" style="padding-left: 10px">
                          <div class="profile_box">
                            <div class="menu_box_table">
                              <div class="profile_box_tableCell">
                                <div class="profile_box_text">
                                  <strong>Prix Unitaire:</strong>
                                </div>
                              </div>
                              <div class="profile_box_tableCell">
                                <div class="profile_edit_feildOut">
                                  <div class="profile_edit_feild">
                                    <input min="1" type="number" name="quote_price" class="quote_price" value="">
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="addNewQuote_dec">
                      <div class="profile_box">
                        <div class="menu_box_table">
                          <div class="profile_box_tableCell width30">
                            <div class="profile_box_text">
                              <strong>Description:</strong>
                            </div>
                          </div>
                          <div class="profile_box_tableCell">
                            <div class="profile_edit_feildOut">
                              <div class="profile_edit_feild">
                                <textarea class="qt_description"></textarea>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <a class="addquote_addBtn" href="javascript:void(0);"><i class="fa fa-plus"></i></a>
                    {{--<a class="addquote_delBtn" href="javascript:void(0);"><i class="fa fa-minus"></i></a>--}}
                  </div>
                </div>
                  </li>



              <li>
                <div class="menu_box_table">
                  <div class="profile_box_tableCell">
                    <div class="addquote_box">
                      <div class="menu_box_table">
                        <div class="profile_box_tableCell width30">
                          <div class="profile_box_text">
                            <strong>Total</strong>
                          </div>
                        </div>
                        <div class="profile_box_tableCell">
                          <div class="addquote_box_text qt_total_cal_span">
                            <span>33,50</span>
                          </div>
                        </div>
                        <div class="profile_box_tableCell">
                          <div class="addquote_box_text">
                            <span>€</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                    <div class="profile_box_tableCell">
                        <div class="menu_box_table addquote_btns_main">
                            <div class="profile_box_tableCell">
                                <div class="addquote_sendBtn">
                                    <input type="submit" data-status="new" data-type="{{$quote_type}}" value="Save" class="qt_common_sv_btn qt_add_new_btn">
                                </div>
                            </div>
                            <div class="profile_box_tableCell">
                                <div class="addquote_sendBtn">
                                    <input type="submit" data-status="update" data-type="{{$quote_type}}" value="{{$sendMailBtnText}}" data-email="{{$client->email}}" data-id="{{$client->id}}" class="send_quote_in_email_btn">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--add client section end-->
</div>

</body>
</html>
