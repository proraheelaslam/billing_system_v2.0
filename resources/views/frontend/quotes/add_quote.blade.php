@include('frontend.common.head')
@php
   $documentText = 'Devis';
   $add_bill_preview = 'qt_preview_btn';
   $saveButton = 'qt_add_new_btn';
   $sendEmailType = 'quote';
   $sendMailBtnText = 'Envoyer Devis';
   $buttonType = 'quote';
   $prev_type = 0;

    $menuText = '<span>Espace Devis</span>';
    if(request()->segment(count(request()->segments())) == 'add_bill'){
                 $documentText = 'Facture';
                 $add_bill_preview = 'qt_preview_non_client_btn';
                 $saveButton = 'qt_add_bill';
                 $sendEmailType = 'bill';
                 $menuText = '<span>Espace Facturation</span>';
                 $sendMailBtnText = 'Envoyer Facture';
                 $buttonType = 'bill';
                 if (request()->is_non_client == 1){
                       $prev_type = 1;
                  }
       }else if (request()->is_non_client == 1){
           $prev_type = 1;
     }
    //


@endphp
<div class="wrapper" role="main">
    <!--add client section start-->
    <div class="menu_main profile_main add_client_main textSet_main addNewQuote_main">
        <div class="menu_auto">
            <div class="menu_inner">
                @include('frontend.common.header_prev_button')
                <div class="home_header clearfix">
                    <div class="home_header_left">
                        <input type="hidden"  class="address_id" value="0">
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
                        <input type="hidden"  class="client_id" value="0">
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
                                    <p><b>{{$documentText}}</b>No. <span class="qt_random_quote_number">{{ $docNumber  }}</span></p>
                                </div>
                            </div>
                            <div class="profile_box_tableCell width33">
                                <div class="addquote_optional_list">
                                    <ul>
                                        <li>
                                            <div class="profile_edit_feildOut">
                                                <div class="profile_edit_feild">
                                                    <input type="text" placeholder="Nom" class="qoute_name">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="profile_edit_feildOut">
                                                <div class="profile_edit_feild">
                                                    <input type="text" placeholder="Addresse" class="qoute_address">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="profile_edit_feildOut">
                                                <div class="profile_edit_feild">
                                                    <input type="text" placeholder="Code Postal / Municaplite" class="qoute_postal_code_city">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="profile_edit_feildOut">
                                                <div class="profile_edit_feild">
                                                    <input type="text" placeholder="TVA" class="quote_tva">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="profile_edit_feildOut">
                                                <div class="profile_edit_feild">
                                                    <input type="text" placeholder="Addresse Email" class="qoute_email">
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
                                            <a data-nonClient="{{$prev_type}}" data-type="{{$buttonType}}" href="javascript:void(0)" class="{{$add_bill_preview}}">Preview</a>
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
                                        <div class="profile_box_tableCell" style="width:177px">
                                            <div class="profile_box_text">
                                                <strong>Concerne:</strong>
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
                                                                        <input min="1" type="number" value=""  class="calculate_ quote_quantity">
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
                                                                        <input min="1" type="number"  name="quote_price" class="quote_price" value="">
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
                                                                <textarea  data-autoresize="" onclick="$(this).focus();" class="qt_description autosizeTextArea"></textarea>
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
                                                    <input data-nonClient="{{$prev_type}}" data-status="new" type="submit" data-type="{{$buttonType}}" value="Save" class="qt_common_sv_btn {{$saveButton}}">
                                                </div>
                                            </div>
                                            <div class="profile_box_tableCell">
                                                <div class="addquote_sendBtn">
                                                    <input data-nonClient="{{$prev_type}}" type="submit" data-status="update" data-type="{{$sendEmailType}}" value="{{$sendMailBtnText}}" data-email="" data-id="" class="send_quote_in_email_btn">
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
<script>


</script>
</body>
</html>
