@include('frontend.common.head')

@php


    $sendMailBtnText = 'Envoyer Facture';
    $disbleCls = '';
    $showActionButton = 'block';
    //$sendType = 'quote';
    $buttonType  = 'bill';
    if(request()->q == 'view'){
        $disbleCls = 'all_field_disable';
        $showActionButton = 'none';
    }

    if (request()->type == 'quote') {
          $sendMailBtnText = 'Envoyer Devis';
          $buttonType = 'quote';

     }else if (request()->type == 'pre_bill'){
           $buttonType = 'convertor';
     }


@endphp
<div class="wrapper" role="main">
  <!--add client section start-->
  <div class="menu_main profile_main add_client_main textSet_main addNewQuote_main">
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
                <li>
                  <a class="all_buttons" href="{{route('menu')}}">Menu</a>
                  <span>Espace Facturation</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="main_logo_outer">
          @include('frontend.common.header_logo')
          <div class="edit_view_row_sec">

            @if(request()->q == 'view')
              <a style="display: block !important;" class="edit_view_btn" href="{{Request::url()}}?q=edit&type={{request()->type}}" >Editer</a>

              @elseif(request()->q == 'edit')
              <a style="display: block !important;" class="edit_view_btn" href="{{Request::url()}}?q=view&type={{request()->type}}" >Afficher</a>

            @endif


          </div>
        </div>


        <div class="addNewQuote_detail {{$disbleCls}}">

          @php  $quote = $data['quote'];  $tax_value = $quote->tax; @endphp
          <div class="addNewQuote_head">
            <div class="menu_box_table">
              <div class="profile_box_tableCell width33">
                  <input type="hidden"  class="address_id" value="{{$quote->address_id }}">
                  <input type="hidden"  class="client_id" value="{{$quote->client->id }}">
                  <input type="hidden"  class="qoute_name" value="{{$quote->client->last_name }} {{ $quote->client->first_name }}">
                  <input type="hidden" class="qoute_address" value="{{$quote->client->street }}">
                  <input type="hidden"  class="qoute_postal_code_city" value="{{$quote->client->municipality }}">
                  <input type="hidden"  class="quote_tva" value="{{$quote->client->tva_number}}">
                  <input type="hidden"  class="qoute_email" value="{{$quote->client->email }}">
                  <input type="hidden"  class="qt_language" value="{{$quote->client->language }}">
                  <input type="hidden"  class="qt_language_tone" value="{{$quote->client->language_tone }}">

                <div class="addNewQuote_head_text">
                  <p>{{$quote->client->user->name}}  </p>
                  <p>{{$quote->client->user->street}}  </p>
                  <p>{{$quote->client->user->street_number}} {{$quote->client->user->municipality}} </p>
                  <p>{{$quote->client->user->tva_number}} </p>
                </div>
              </div>
              <div class="profile_box_tableCell width33">
                <div class="addNewQuote_head_text text_center ">

                  <p>

                    @if(request()->type == 'quote')
                        <b>Devis</b>No. <span class="qt_random_quote_number">{{$quote->document_number}}</span>
                      @else
                        <b>Facture</b>No. <span class="qt_random_quote_number">{{$quote->document_number}}</span>
                    @endif
                  </p>
                </div>
              </div>
              <div class="profile_box_tableCell width33">

                @php
                        $clientData = [];
                        $clientData['last_name'] = $quote->client->last_name;
                        $clientData['first_name'] = $quote->client->first_name;
                        $clientData['street'] = $quote->client->street;
                        $clientData['street_number'] = $quote->client->street_number;
                        $clientData['tva_number'] = $quote->client->tva_number;
                        $clientData['municipality'] = $quote->client->municipality;
                        $clientEncodeData = json_encode($clientData);

                 @endphp

                <div class="addNewQuote_head_text qt_client_info_sec" data-client="{{$clientEncodeData}}" >
                  <p>{{$quote->client->last_name }} {{ $quote->client->first_name }}</p>
                  <p class="qt_client_street">{{$quote->client->street }}</p>
                  <p>{{$quote->client->street_number }} {{$quote->client->municipality }}</p>
                  <p>{{$quote->client->tva_number }}</p>
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
                      <a data-type="{{$buttonType}}" href="javascript:void(0)" class="qt_pre_draft_bill_preview_btn">Preview</a>
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
                                    <input type="text" value="0" disabled="disabled" class="tax_field qt_tax_0 {{$tax_value == 0 ? 'active' : ''}}">
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
                                    <input type="text" value="21"  disabled="disabled" class="tax_field qt_tax_21 {{$tax_value == 21 ? 'active' : ''}}">
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
                        <strong>Concerne: <span>{{$quote->concern_address}}</span></strong>
                        <input type="hidden" class="qt_concern_address" value="{{$quote->concern_address}}">
                      </div>
                    </div>
                    <div class="profile_box_tableCell">
                      <div class="profile_edit_feildOut">
                        <div class="profile_edit_feild">
                          <input type="text" class="qt_concern_text" value="{{$quote->concern}}">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <li>
                <div class="addquote_appendRow_main">
                   @php  $calculationQuote = json_decode($quote->calculation_quote) @endphp
                  @if(count($calculationQuote) > 0)
                      @foreach($calculationQuote as $cal_qoute)
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
                                        <input type="text" value="{{$cal_qoute->quantity}}"  class=" calculate_ quote_quantity">
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
                                        <input type="text" name="quote_price" class="quote_price" value="{{$cal_qoute->unit_price}}">
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
                                    <textarea class="qt_description">{{$cal_qoute->description}}</textarea>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <a class="addquote_addBtn" href="javascript:void(0);"><i class="fa fa-plus"></i></a>
                        {{--<a class="addquote_delBtn" href="javascript:void(0);"><i class="fa fa-minus"></i></a>--}}
                      </div>
                      @endforeach


                    @else

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
                                      <input type="text" value=""  class=" calculate_ quote_quantity">
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
                                      <input type="text" name="quote_price" class="quote_price" value="">
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

                    @endif

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

                      <div class="profile_box_tableCell" style="display: {{$showActionButton}}">
                          <div class="menu_box_table addquote_btns_main">
                              <div class="profile_box_tableCell">
                                  <div class="addquote_sendBtn">
                                      <input type="submit" data-status="update" data-type="quote"  value="Save" class="qt_common_sv_btn quote_cal_save_btn update_bill_btn">
                                  </div>
                              </div>
                              <div class="profile_box_tableCell">
                                  <div class="addquote_sendBtn">
                                      <input type="submit" data-status="update" data-type="{{$buttonType}}"  value="{{$sendMailBtnText}}" data-email="{{$quote->client->email}}" data-id="{{$quote->client->id}}" class="send_bill_emai_btn update_bill_btn">
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
