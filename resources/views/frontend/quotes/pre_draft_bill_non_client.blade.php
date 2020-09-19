@include('frontend.common.head')

@php
      $quote_type = 'quote';
      $sendMailBtnText = 'Envoyer Facture';
      $q_title = "Devis";
      if (request()->type == 'bill') {
           $quote_type = 'bill';
            $q_title = "Facture";
        }
     if (request()->type == 'quote') {
          $sendMailBtnText = 'Envoyer Devis';
          $quote_type = 'quote';

     }else if (request()->type == 'pre_bill'){
           $q_title = "Facture";
           $quote_type = 'convertor';
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
                                    <span>Espace Client</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                @include('frontend.common.header_logo')
                <div class="addNewQuote_detail">
                    <div class="addNewQuote_head">
                        <input type="hidden"  class="client_id" value="0">
                        <input type="hidden"  class="address_id" value="0">
                        <input type="hidden"  class="quote_id" value="{{$quote->id}}">
                        <div class="menu_box_table">
                            <div class="profile_box_tableCell width33">
                                <div class="addNewQuote_head_text">
                                    <p>{{$user->name}}  </p>
                                    <p>{{$user->street}}  </p>
                                    <p>{{$user->street_number}} {{$user->municipality}} </p>
                                    <p>{{$user->tva_number}} </p>
                                </div>
                            </div>
                            <div class="profile_box_tableCell width33">
                                <div class="addNewQuote_head_text text_center ">
                                    <p><b>{{$q_title}}</b>No. <span class="qt_random_quote_number">{{ $quote->document_number  }}</span></p>
                                </div>
                            </div>
                            <div class="profile_box_tableCell width33">
                                <div class="addquote_optional_list">
                                    <ul>
                                        <li>
                                            <div class="profile_edit_feildOut">
                                                <div class="profile_edit_feild">
                                                    <input type="text" placeholder="Nom" class="qoute_name" value="{{$quote->name}}">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="profile_edit_feildOut">
                                                <div class="profile_edit_feild">
                                                    <input type="text" placeholder="Addresse" value="{{$quote->address}}" class="qoute_address">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="profile_edit_feildOut">
                                                <div class="profile_edit_feild">
                                                    <input type="text" value="{{$quote->postal_code}}" placeholder="Code Postal / Municaplite" class="qoute_postal_code_city">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="profile_edit_feildOut">
                                                <div class="profile_edit_feild">
                                                    <input type="text" placeholder="TVA" class="quote_tva" value="{{$quote->tva_number}}">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="profile_edit_feildOut">
                                                <div class="profile_edit_feild">
                                                    <input type="text" placeholder="Addresse Email" class="qoute_email" value="{{$quote->email}}">
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="profile_list">
                        <ul>
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
                                                            <li><a data-name="FR" class="active" href="javascript:void(0);">FR</a></li>
                                                            <li><a data-name="NL" class="" href="javascript:void(0);">NL</a></li>
                                                            <li><a data-name="EN" class="" href="javascript:void(0);">EN</a></li>
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
                                                    <li><a data-name="Tu" class="active" href="javascript:void(0);">Tu</a></li>
                                                    <li><a data-name="Vous" class="" href="javascript:void(0);">Vous</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="menu_box_table">
                                    <div class="profile_box_tableCell width40">
                                        <div class="preview_btn">
                                            <a data-type="{{$quote_type}}" href="javascript:void(0)" class="qt_preview_non_client_btn">Preview</a>
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
                                                                        <input type="text" value="0" disabled="disabled" class="tax_field qt_tax_0 active">
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="profile_edit_feildOut">
                                                                    <div class="profile_edit_feild">
                                                                        <input type="text" value="6"  disabled="disabled" class="tax_field qt_tax_6">
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="profile_edit_feildOut">
                                                                    <div class="profile_edit_feild">
                                                                        <input type="text" value="21"  disabled="disabled" class="tax_field qt_tax_21">
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
                                                <strong>Concerne:</strong>
                                            </div>
                                        </div>
                                        <div class="profile_box_tableCell">
                                            <div class="profile_edit_feildOut">
                                                <div class="profile_edit_feild">
                                                    <input type="text"  class="qt_concern_text" value="{{$quote->concern}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            @php
                                $calculationQuotes = (json_decode($quote->calculation_quote));
                            @endphp
                            @foreach($calculationQuotes as $cal_qoute)
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
                                    </div>
                                </li>
                            @endforeach

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
                                                    <input data-status="update" data-type="{{$quote_type}}" type="submit" value="Save" class="qt_common_sv_btn qt_add_quote_non_client_btn">
                                                </div>
                                            </div>
                                            <div class="profile_box_tableCell">
                                                <div class="addquote_sendBtn">
                                                    <input type="submit" data-status="update" data-type="{{$quote_type}}" value="{{$sendMailBtnText}}" data-email="" data-id="" class="send_quote_in_email_btn">
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
