

const designUrl = window.location.pathname;
const currentUrl = getCurrentUrl(designUrl.substring(designUrl.lastIndexOf('/') + 1)).filename;

console.log(currentUrl);
$(document).ready(function(e) {



    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    autosize(document.getElementsByClassName('qt_description'));
$(".profile_edit_btn").click(function(e){


	$(this).parents(".profile_box").addClass("active");
});




$(".profile_save_btn").click(function(e){

    $(".error_text").remove();
    let id = parseInt($('input[name="user_id"]').val());
    let type = $(this).attr('data-type');
    let fieldValue = $(this).closest('.profile_box').find('input[name="'+type+'"]').val();
    let bic = $(this).closest('.profile_box').find('input[name="bic"]').val();
    let fieldName = '';
    let postData = {};
    postData['id'] = id;
    postData['type'] = type;

    if (type === 'address') {
        fieldName = 'address';
        let street = $(this).closest('.profile_box').find('input[name="street"]').val();
        let street_number = $(this).closest('.profile_box').find('input[name="street_number"]').val();
        let postal_code = $(this).closest('.profile_box').find('input[name="postal_code"]').val();
        let municipality = $(this).closest('.profile_box').find('input[name="municipality"]').val();

        postData['street'] = street;
        postData['street_number'] =  street_number;
        postData['postal_code'] = postal_code;
        postData['municipality'] = municipality;

        $(this).closest('.profile_box').find('.prof_street_spn').html(street);
        $(this).closest('.profile_box').find('.prof_street_number_spn').html(street_number);
        $(this).closest('.profile_box').find('.prof_postal_code_spn').html(postal_code);
        $(this).closest('.profile_box').find('.prof_municipality_spn').html(municipality);

	}else if (type == 'password') {


        let confirmPasword = $(this).closest('.profile_box').find('input[name="confirm_password"]').val();

        if (fieldValue != confirmPasword) {
            $(this).closest('.profile_box').find('input[name="confirm_password"]').after('<p class="error_text">Password do not match.</p>');
            return false;
        }else {
            postData['fieldValue'] = fieldValue;
        }


    }else if (type == 'bank_account'){

        let bank_account = $(this).closest('.profile_box').find('input[name="bank_account"]').val();
        postData['bic'] = bic;
        postData['bank_account'] = bank_account;
        $(this).closest('.profile_box').find('.bank_bic_spn').html(bic);

    }else {
        postData['id'] = id;
        postData['fieldValue'] = fieldValue;
    }
    $(this).parents(".profile_box").removeClass("active");
    //console.log(postData);
    //return false;
	// request save data
    let obj  = $(this);
    $.ajax({
        url:app_url+'/profile/update',
        type: 'POST',  // user.destroy
        data: postData,
        success: function(result) {
            if(result.status) {
                $(obj).text('Feature')
            }else {
                $(obj).text('Not Feature');
            }
        }
    });
    if (type == 'bank_account') {

        $(this).closest('.profile_box').find('.profile_afterEdit').html(` <p>${fieldValue}</p>
                          <p><span class="bank_bic_spn ">${bic}</span></p>`);
    }else {

        $(this).closest('.profile_box').find('.profile_afterEdit').html(fieldValue);
    }

	$(this).parents(".profile_box").removeClass("active");
});

//
/*$("body").on('keyup','.login_password_field', function (e) {

    let password = $(this).val();
    if ($.trim(password).length == 4) {
        $("#submit_login_form").trigger('click');
    }
});*/

$("#submit_login_form").click(function(e){
    submitLoginForm(e);
});


$("#submit_contact_form").click(function(e){
    submitContactForm(e);
});


// 2nd phase

 $("body").on('click','.add_client_pg_btn', function () {
        let clientForm = $("#add_client_form");
        saveFormClient(clientForm);
 });

  $("body").on('click','.edit_client_pg_btn', function () {
        let clientForm = $("#edit_client_form");

        saveFormClient(clientForm,1);
    });

    $("body").on('keyup','.quote_srch_field', function () {
        let searchType = $(this).attr('data-type');
        let dataType = $(this).attr('data-quote-type');
        searchQuotes(searchType,dataType);
    });

    $("body").on('keyup','.client_srch_field', function () {
        let searchType = $(this).attr('data-type');
        searchClients(searchType);
    });

    $("body").on('click','.config_email_save_button', function () {
        saveEmailConfiguration();
    });

  //


  // 3rd phase

    $("body").on('keyup','.quote_quantity', function () {
        quoteCalculation();
    });
    $("body").on('keyup','.quote_price', function () {
        quoteCalculation();
    });

    $("body").on('click','.taxes_main .profile_edit_feild', function () {

        $('.profile_edit_feild .tax_field').removeClass('active');
        $(this).find('.tax_field').addClass('active');
        quoteCalculation();
    });

    //
    $("body").on('click','.qt_add_new_btn', function () {
        let status = $(this).attr('data-status');
        let q_type = $(this).attr('data-type');
        let isNonClient = $(this).attr('data-nonClient');

        if(status === "new" && q_type == 'quote'){
            if(isNonClient) {
                saveQuotes('non_client','quote','new_quote',0,1);
            }else{
                saveQuotes('quote','new_quote',0,1);
            }

        }else if(status === "new" && q_type === 'bill'){
            saveQuotes('bill','new',0,1);
        }else {
            saveQuotes('quote','new_quote');
        }

    });
    //


    $("body").on('click','.qt_add_bill', function () {
        let isNonClient = $(this).attr('data-nonclient');
        if(isNonClient) {
            saveQuotes('non_client','bill','new_bill');
        }else{
            saveQuotes('bill','new_bill');
        }

    });
    //
    // update exising quote attach with existing client
    $("body").on('click','.quote_cal_save_btn', function () {

        let type = $(this).attr('data-type');
        let statusType = $(this).attr('data-status');
       /* if (type === 'bill') {

        }*/
        saveQuotes(type,'update');
    });

    $("body").on('click','.qt_add_quote_non_client_btn', function () {

        let type = $(this).attr('data-type');
        //let actionType = $(this).attr('data-status');
        if (type == 'convertor') {
            saveQuotes('non_client','quote');
        }else{
            saveQuotes('non_client',type);
        }

    });


    quoteCalculation();


    //
    $("body").on('click','.qt_preview_btn', function () {

        let isNonClient = $(this).attr('data-nonClient');
        console.log('isNonClient', isNonClient);
        qoutePreviewPdf(isNonClient,'','', $(this));
    });

    //
    $("body").on('click','.qt_preview_non_client_btn', function () {
        let type = $(this).attr('data-type');
        qoutePreviewPdf(1,'',type,$(this));
    });

    $("body").on('click','.qt_pre_draft_bill_preview_btn', function () {
        let type = $(this).attr('data-type');
        qoutePreviewPdf(0,1,type,$(this));
    });
    //
    $("body").on('click','.send_bill_emai_btn', function () {

        let type = $(this).attr('data-type');
        saveQuotes(type,'update',1);

    });

    $("body").on('click','.send_email_attchment_button', function () {
        sendEmailAttachment($(this));

    });

    /*$("body").on('click','.send_quote_in_email_btn', function () {

        let type = $(this).attr('data-type');
        let statusType = $(this).attr('data-status');
        if (statusType === 'new') {

            saveQuotes(type,'new_quote',1,1);
        } else if (statusType === 'update'){
            saveQuotes(type,'update',1,1);
        }

    });*/

    $("body").on('click','.send_quote_in_email_btn', function () {

        /*let type = $(this).attr('data-type');
        let statusType = $(this).attr('data-status');
        if (statusType === 'new') {

            saveQuotes(type,'new_quote',1,1);
        } else if (statusType === 'update'){
            saveQuotes(type,'update',1,1);
        }*/
        let type = $(this).attr('data-type');
        sendQuoteBill(type);

    });




    // phase 1v
    $("body").on('click','.delete_client_button', function () {

        let obj = $(this);
        let id = $(obj).attr('data-id');
        let name = $(obj).attr('data-name');
        $(".delete_confirm_popup_box").remove();
        $(this).closest('li').find('.delete_confirm_popup_box').remove();
        $(".delete_confirm_popup_box").show();
        let delPopupHtml = deletePopupHtml();
        $(this).closest('li').prepend(delPopupHtml);
        $(".delete_confirm_popup_box").find('#del_client_name').text(name);
        let url = app_url+'/clients/delete/'+id;
        $(".confirm_del_btn").unbind('click');
        $(".confirm_del_btn").click(function () {
            getAjaxData(url,'',  (result) => {
                $(obj).closest('li').remove();
                showSuccessMessage(result.message);
                $(".delete_confirm_popup_box").hide();

            });
        });

        $(".cancel_del_button").click(function () {
            $(".delete_confirm_popup_box").hide();
        });

    });



    // phase V

    $("body").on('click', '.delete_quote_button', function () {

        let obj = $(this);
        let id = $(obj).attr('data-id');
        let delete_type = $(obj).attr('data-type');
        let name = $(obj).attr('data-name');
        $(".delete_confirm_popup_box").remove();
        $(this).closest('li').find('.delete_confirm_popup_box').remove();
        $(".delete_confirm_popup_box").show();
        let delPopupHtml = deletePopupHtml();
        $(this).closest('li').prepend(delPopupHtml);
        $(".delete_confirm_popup_box").find('#del_client_name').text(name);

        let postData = {};
        postData.id = id;
        postData.delete_type = delete_type;

        let url = app_url+'/quote_bill/delete';

        $(".confirm_del_btn").unbind('click');
        $(".confirm_del_btn").click(function () {
            postAjaxData('POST',url,postData,  (result) => {
                $(obj).parent('p').remove();
                showSuccessMessage(result.message);
                $(".delete_confirm_popup_box").hide();
                setTimeout(function () {
                    location.reload();
                },500)

            });
        });
        $(".cancel_del_button").click(function () {
            $(".delete_confirm_popup_box").hide();
        });
    });


    $("body").on('click','.create_folder_btn', function () {
        $(".ct_flder_name").val('');
        $(".cl_folder_sec").hide();
        $(".cl_add_folder_sec").show();
    });

    $("body").on('click','.cl_save_folder_btn', function () {

        createNewFolder();
    });

    $("body").on('click','.ct_open_folder', function () {

        openFolder($(this));
    });

    $("body").on('click','.ct_delete_folder', function (e) {

        deleteFolder($(this));
    });
    //
    $("body").on('change','.add_upload_picture', function (e) {
        let file_data = this.files;
        saveUploadPicture($(this),file_data);
    });

    $("body").on('click','.del_single_file', function (e) {
        deleteFile($(this));
    });
    //
    $("body").on('click','.ct_write_note_btn', function (e) {
        $(".note_field").val('');
        $(".save_note_button").removeClass('edit_note_button');
        $(".gallery_list ").hide();
        $(".addImg_section ").hide();
        $(".addNote_section").show();

    });
    $("body").on('click','.save_note_button', function (e) {
        saveNote($(this));
    });
    //
    $("body").on('click','.cancel_note_btn', function (e) {
        $(".addNote_section").hide();
        $(".gallery_list ").show();
    });
    //
    $("body").on('click','.view_edit_note', function (e) {

        $(".save_note_button").addClass('edit_note_button');
        getSingleNote($(this));

    });

    $("body").on('click','.go_to_folder_btn', function (e) {

        getAllUpdatedFolders($(this));


    });

    // phase v1

    $("body").on('change','.setting_upload_image', function (e) {
        let file_data = this.files;
        saveSettingUploadImage($(this), file_data);


    });

    $("body").on('click','.update_bill_status', function (e) {
        //paid_revert_bill_btn
        $(this).addClass('paid_revert_bill_btn');
        if($(this).hasClass('active')){
            $(this).removeClass('paid_revert_bill_btn');
        }
        if($(this).hasClass('paid_revert_bill_btn')) {
            updatePaidBillStatus($(this));
        }else {
            updateBillStatus($(this));
        }


    });



    //
    $("body").on('click','.final_review_btn', function (e) {
        updateBillStatus($(this),1);

    });
    //
    $("body").on('keyup','.bill_srch_field', function () {
        searchBills();
    });


    $("body").on('keyup','.income_srch_client', function () {
        searchIncomeClient();
    });
    //

    $("body").on('click','.email_config_lang_sec li', function () {

        let lang = $(this).find('a').attr('data-type');
        let langTone = $('.email_config_lang_ton_sec').find('li a.active').attr('data-type');
        loadEmailTemplate(lang,langTone);
    });

    //
    $("body").on('click','.email_config_lang_ton_sec li', function () {

        let lang = $('.email_config_lang_sec').find('li a.active').attr('data-type');
        let langTone = $(this).find('a').attr('data-type');
        loadEmailTemplate(lang,langTone);
    });


    setTimeout(()=> {
        //autoHeightAddQuoteButtonLineBar();
    },2000);

    let lang =  $('.email_config_lang_sec').find('li a.active').attr('data-type');
    let langTone = $('.email_config_lang_ton_sec').find('li a.active').attr('data-type');

    loadEmailTemplate(lang,langTone);

    //

    $("body").on('blur','.login_email_field', function () {

        $(".error_text").remove();
        let email = $(this).val();
        let status = checkEmail(email);
        if (!status) {
            $(this).after('<p class="error_text">Please enter valid email address.</p>');
        }
    });





 //end ready
 });


function deletePopupHtml() {

    let delPopupHtml = `<div class="listing_popuop delete_confirm_popup_box" style="display: block" >
                            <div class="listing_pop_table">
                              <div class="listing_pop_tableCell">
                                <div class="listing_pop_inner">
                                  <div class="menu_box_table">
                                    <div class="profile_box_tableCell width55">
                                      <div class="listing_pop_text">
                                        <p>Etes vous sur de vouloir supprimer <b id="del_client_name">Choupay Pierrot?</b></p>
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
                       </div>`;
    return delPopupHtml;
}

function getCurrentUrl(url) {
    // returns an object with {filename, ext} from url (from: https://coursesweb.net/ )
    // get the part after last /, then replace any query and hash part
    url = url.split('/').pop().replace(/\#(.*?)$/, '').replace(/\?(.*?)$/, '');
    url = url.split('.');  // separates filename and extension
    return {filename: (url[0] || ''), ext: (url[1] || '')}
}

$.urlParam = function(name){
    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
    return results[1] || 0;
}


function sendQuoteBill(type) {

    let postData = {};
    postData.type = type;
    postData.document_number = $(".qt_random_quote_number").text();
    console.log('postData', postData);
    $.ajax({
        url:app_url+'/email/send_quote_bill',
        type: 'POST',
        data: postData,
        success: function(result) {
            var status = result.status;
            if (status) {
                let emailAttachmentUrl = app_url+'/bills/email_attachment';
                window.open(emailAttachmentUrl+'?quote_id='+result.data.id+'&type='+result.type+'','popUpWindow','height=500,width=1000,left=100,top=100,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes');

            }else {
                showErrorMessage(result.message);
            }

        }
    });
}

function loadEmailTemplate(lang,langTone) {

    if (currentUrl === 'email_configuration')  {
        $(".profile_list").find('.config_email_txt').val('');

        let type = $.urlParam('q');
        $.ajax({

            url:app_url+'/load_email_template',
            type: 'POST',
            data: { type: type, lang: lang, langTone: langTone },
            success: function(result) {


                let data = result.data;
                if (data != null){
                    let msg = nl2br(data.format_message);
                    $(".profile_list").find('.config_email_txt').val(msg.replace(/\<br\>/g," "));
                }

            }
        });
    }


}


function checkEmail(str)
{
    var status = true;
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(!re.test(str)){
        status = false;
    }
    return status;

}

function nl2br (str, replaceMode, isXhtml) {

    var breakTag = (isXhtml) ? '<br />' : '<br>';
    var replaceStr = (replaceMode) ? '$1'+ breakTag : '$1'+ breakTag +'$2';
    return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, replaceStr);
}

function autoHeightAddQuoteButtonLineBar() {

    $(".addquote_appendRow_main").find('.addquote_appendRow').each(function() {

        let descBoxHeight = $(this).find('.qt_description').height();
        let netHeight = (descBoxHeight/2)+20;
        let objDsc = $(this).find('.addNewQuote_dec');
        //$(`<style>'.':before {height:${netHeight}px;}</style>`).appendTo('head');
        console.log('netHeight', netHeight);
    });
}


function setImage(obj,input) {
    if (input[0] && input[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {

            $(obj).attr('src', e.target.result);
        };
        reader.readAsDataURL(input[0]);
    }
}
function readURL(input) {

    if (input[0] && input[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {

            $('#image_place_sec').attr('src', e.target.result);
            $('#anchr_download_img').attr('href', e.target.result);
        };
        reader.readAsDataURL(input[0]);
    }
}

function submitContactForm(e) {

    $(".error_text").remove();
    let status = true;
    let email = $(".contact_email").val();
    let subject = $(".contact_subject").val();
    let message = $(".contact_message").val();
    if ($.trim(email).length === 0) {
        $(".contact_email").after('<p class="error_text">Please enter email.</p>');
        status =  false;
    }
    if ($.trim(subject).length === 0) {
        $(".contact_subject").after('<p class="error_text">Please enter subject.</p>');
        status =  false;
    }
    if ($.trim(message).length === 0) {
        $(".contact_message").after('<p class="error_text">Please enter message.</p>');
        status =  false;
    }
    if (status) {

        $('#submit_contact_form').LoadingOverlay("show");
        $.ajax({
            url:app_url+'/contact',
            type: 'POST',
            data: { email: email, subject: subject, message: message },
            success: function(result) {
                console.log(result);
                if(result.status) {
                    showSuccessMessage('Message has been sent');
                }else {
                    showErrorMessage('Error! Message has been not sent');
                }
                $('#submit_contact_form').LoadingOverlay("hide");
            }
        });
    }
}

function submitLoginForm(obj) {

    var status = true;
    $(".error_text").remove();
    let password = $(".login_password_field").val();
    let email = $(".login_email_field").val();
    if ($.trim(email).length === 0) {
        $(".login_email_field").after('<p class="error_text">Please enter email.</p>');
        return false;
    }
    if ($.trim(password).length === 0) {
        $(".login_password_field").after('<p class="error_text">Please enter password.</p>');
        return false;
    }

    if(status) {
        $('#submit_login_form').LoadingOverlay("show");
        $.ajax({
            url:app_url+'/login',
            type: 'POST',
            data: { password: password, email:email },
            success: function(result) {
                if(result.status) {
                    window.location.href = app_url+'/menu';
                }else {
                    $(".login_password_field").after(`<p class="error_text">${result.message}</p>`);
                }
                $('#submit_login_form').LoadingOverlay("hide");
            }
        });
    }


}


// 2nd phase functions

function saveFormClient(clientForm, isEdit) {



    $(".error_text").remove();
    let status = true;
    let first_name = $(clientForm).find('input[name="first_name"]').val();
    let client_id = $(clientForm).find('#client_id').val();
    let last_name =  $(clientForm).find('input[name="last_name"]').val();
    let email =  $(clientForm).find('input[name="email"]').val();
    let street =  $(clientForm).find('input[name="street"]').val();
    let street_number =  $(clientForm).find('input[name="street_number"]').val();
    let postal_code =  $(clientForm).find('input[name="postal_code"]').val();
    let municipality =  $(clientForm).find('input[name="municipality"]').val();
    let tva_number =  $(clientForm).find('input[name="tva_number"]').val();
    let phone_number =  $(clientForm).find('input[name="phone_number"]').val();

    if ($.trim(last_name) === ""){
        $(clientForm).find('input[name="last_name"]').after('<p class="error_text">Nom is required.</p>');
        status = false;
    }  if ($.trim(email) === ""){

        $(clientForm).find('input[name="email"]').after('<p class="error_text">Email is required.</p>');
        status = false;

    } if ($.trim(street) === ""){

        $(clientForm).find('input[name="street"]').after('<p class="error_text">Rue is required.</p>');
        status = false;
    } if ($.trim(street_number) === "") {

        $(clientForm).find('input[name="street_number"]').after('<p class="error_text">Numero is required.</p>');
        status = false;
    } if ($.trim(postal_code) === "") {
        $(clientForm).find('input[name="postal_code"]').after('<p class="error_text">Postal code is required.</p>');
        status = false;

    } if ($.trim(municipality) === ""){
        $(clientForm).find('input[name="municipality"]').after('<p class="error_text">Municipality is required.</p>');
        status = false;

    }if ($.trim(phone_number) === ""){
        $(clientForm).find('input[name="phone_number"]').after('<p class="error_text">Numero de Telephone is required.</p>');
        status = false;

    }

    let lang = $(clientForm).find('.client_language_sec').find('li a.active').attr('data-name');
    let langTone = $(clientForm).find('.client_language_tone').find('li a.active').attr('data-name');

    let workAddress = [];
    let wrkAddressId = 1;

    $('.addclient_appendRow').each(function () {

            let work_address_street = $(this).find('input[name="work_address_street"]').val();
            let word_address_street_number = $(this).find('input[name="word_address_street_number"]').val();
            let work_address_postal_code = $(this).find('input[name="work_address_postal_code"]').val();
            let work_address_municipality = $(this).find('input[name="work_address_municipality"]').val();

            if ($.trim(work_address_street) === ""){
                $(this).find('input[name="work_address_street"]').after('<p class="error_text">Rue is required.</p>');
                status = false;
            }
            if ($.trim(word_address_street_number) === ""){
                $(this).find('input[name="word_address_street_number"]').after('<p class="error_text">Numero is required.</p>');
                status = false;
            }
            if ($.trim(work_address_postal_code) === ""){
                $(this).find('input[name="work_address_postal_code"]').after('<p class="error_text">Postal code is required.</p>');
                status = false;
            }
            if ($.trim(work_address_municipality) === ""){
                $(this).find('input[name="work_address_municipality"]').after('<p class="error_text">Municipality is required.</p>');
                status = false;
            }

        workAddress.push({
                'id': wrkAddressId,
                'street': work_address_street,
                'street_number': word_address_street_number,
                'municipality': work_address_municipality,
                'postal_code': work_address_postal_code,
            });
        wrkAddressId = wrkAddressId+1;
    });

    if (status) {
        $(".addClient_saveBtn").LoadingOverlay("show");
        let postData = {
            "first_name": first_name,
            "last_name": last_name,
            "email": email,
            "street": street,
            "street_number": street_number,
            "municipality": municipality,
            "phone_number": phone_number,
            "tva_number": tva_number,
            "language": lang,
            "language_tone": langTone,
            "postal_code": postal_code,
            "work_address": workAddress
        };

        let url = app_url+'/clients/save';
        if (isEdit) {
            url = app_url+'/clients/update';
            postData.client_id = client_id;
        }
        console.log('postData', postData);
        $.ajax({
            url:url,
            type: 'POST',
            data:postData ,
            success: function(result) {
                showSuccessMessage(result.message);
                if(result.status) {
                    window.location.href = app_url+'/clients';
                }
                $(".addClient_saveBtn").LoadingOverlay("hide");
            }
        });

    }

}

function searchQuotes(searchType,dataType) {

    let field_value = $(".quote_srch_field").val();
    let url = app_url+'/search_quote?q='+field_value+'&type='+searchType;
    if(dataType == 'quote-bill') {
        url = app_url+'/search_quote_bill?q='+field_value+'&type='+searchType;
    }else if(dataType == 'pre-bill'){
        url = app_url+'/search_pre_bill?q='+field_value+'&type='+searchType;
    }
    getAjaxData(url,'',  (result) => {
        $("#client_list_section").html(result.view);

    });
}

function searchClients(searchType) {

    let field_value = $(".client_srch_field").val();
    let url = app_url+'/search_client?q='+field_value+'&type='+searchType;
    getAjaxData(url,'',  (result) => {
        $("#client_list_section").html(result.view);

    });
}

function saveEmailConfiguration() {

    $(".error_text").remove();
    let language = $(".email_config_lang_sec").find('li a.active').attr('data-type');
    let language_tone = $(".email_config_lang_ton_sec").find('li a.active').attr('data-type');
    let message =  $("textarea[name='config_email_msg']").val();
    let type =  $(".email_template_type").val();
    let status = true;
    if ($.trim(message) === ""){
        $("textarea[name='config_email_msg']").after('<p class="error_text">Message is required.</p>');
        status = false;
    }
    if (type == ""){
        return false;
    }
    let postData = {
        "language": language,
        "language_tone": language_tone,
        "message": message,
        "type": type,
    };
    if (status) {
        $(".config_email_save_button").LoadingOverlay("show");
        let url = app_url+'/email_configuration/save';
        postAjaxData('POST',url,postData,(res) => {
            showSuccessMessage(res.message);
            $(".error_text").remove();
            $(".config_email_save_button").LoadingOverlay("hide");
        });
    }

}

// third phase

function quoteCalculation(){

    let total_cal_arr = [];
    let selectedTax = $(".taxes_main").find('.tax_field.active').val();
    $(".addquote_appendRow_main").find('.addquote_appendRow').each(function(){

        let quantity = $(this).find('.addNewQuote_qty').find('.quote_quantity').val();
        let price = $(this).find('.addNewQuote_qty').find('.quote_price').val();
        let description = $(this).find('.addNewQuote_dec').find('.qt_description').val();
        let total_cal = 0;
        if (selectedTax == 0) {
            total_cal = quantity*price;
        }else if (selectedTax == 6) {
            total_cal = (quantity*price)*1.06;
        }else if (selectedTax == 21) {
            total_cal = (quantity*price)*1.21;
        }
        total_cal_arr.push(total_cal);

    });
    if (total_cal_arr.length > 0) {
        total_cal_arr = total_cal_arr.reduce((a, b) => a + b, 0);
    }
    $(".qt_total_cal_span span").text(parseFloat(total_cal_arr).toFixed(2));
}

function qoutePreviewPdf(isNonClient,isPreDraftBill,type,obj) {

    $(obj).LoadingOverlay("show");
    //
    let postData = {};
    let quoteData = [];
    let total_arr = [];
    let total_calculation = 0;
    let tva_val = 0;
    let clientData = {};
    let is_non_client = 0;
    if (isNonClient) {
        clientData['last_name'] =  $(".qoute_name").val();
        clientData['first_name'] = '';
        clientData['street'] = $(".qoute_address").val();
        clientData['street_number'] =  '';
        clientData['municipality'] = $(".qoute_postal_code_city").val();
        clientData['tva_number'] = $(".quote_tva").val();
        is_non_client = 1;

    }
    if (isPreDraftBill) {
        is_non_client = 1;
    }
    if ($(".qt_client_info_sec").attr('data-client') !== undefined) {
        clientData = JSON.parse($(".qt_client_info_sec").attr('data-client'));
    }
    let selectedTax = $(".taxes_main").find('.tax_field.active').val();
    let concerned = $(".qt_concern_text").val();
    let quote_number = $(".qt_random_quote_number").text();
    let subTotal_arr = [];
    let sub_total_amount = 0;
    $(".addquote_appendRow_main").find('.addquote_appendRow').each(function(){

            let quantity = $(this).find('.addNewQuote_qty').find('.quote_quantity').val();
            let price = $(this).find('.addNewQuote_qty').find('.quote_price').val();
            let description = $(this).find('.addNewQuote_dec').find('.qt_description').val();
            let sub_total = price*quantity;
            let total_cal = 0;
            if (selectedTax == 0) {
                total_cal = quantity*price;
            }else if (selectedTax == 6) {
                total_cal = (quantity*price)*1.06;
            }else if (selectedTax == 21) {
                total_cal = (quantity*price)*1.21;
            }
           quoteData.push({
                "quantity": quantity,
                "description": description,
                "unit_price": price,
                "total": total_cal,
                "sub_total": sub_total,
            });
           total_arr.push(total_cal);
           subTotal_arr.push(sub_total);

    });
    if (total_arr.length > 0) {
        total_calculation = total_arr.reduce((a, b) => a + b, 0);
    }
    //sum sub total
    if (subTotal_arr.length > 0) {
        sub_total_amount = subTotal_arr.reduce((a, b) => a + b, 0);
    }


    let taxPercent = (parseInt(selectedTax) / 100 ) ;
    tva_val = taxPercent * sub_total_amount;

    //tva_val = taxPercent * sub_total_amount;

    //let total_amount = total_calculation+tva_val;
    let total_amount = sub_total_amount+tva_val;

    postData.client = clientData;
    postData.quotes = quoteData;
    postData.total = sub_total_amount.toFixed(2);
    postData.sub_total = sub_total_amount.toFixed(2);
    postData.tva_val = tva_val.toFixed(2);
    postData.tva_tax = tva_val.toFixed(2);
    postData.amount = total_amount.toFixed(2);
    postData.concerned = concerned;
    postData.quote_number = quote_number;
    postData.is_non_client = is_non_client;
    postData.type = type;
    postData.selectedTax = selectedTax;


    let url = app_url+'/quote/client/generate_pdf';
    postAjaxData('POST',url,postData,(res) => {
        let pdfUrl = res.pdf_url;
        let url = app_url+'/uploads/quotes/'+pdfUrl;
        window.open(url,'_blank');
        $(obj).LoadingOverlay("hide");

    });
}

function sendEmailAttachment(obj) {

    $(obj).LoadingOverlay("show");
    let status = true;
    let template_type = $("#attchment_tmplate_type").val();
    let quote_id = $("#attchment_quote_id").val();
    let from_email = $(".from_email_address").val();
    let to_email = $(".to_email_address").val();
    let subject = $(".email_subject").val();
    let body = $(".email_body").val();
    let client_name = $("#q_client_name").val();
    let attachment = $(".attachment_pdf_file_name").attr('data-file-path');

    let postData = {};
    postData.from_email = from_email;
    postData.to_email = to_email;
    postData.subject = subject;
    postData.attachment = attachment;
    postData.email_body = body;
    postData.template_type = template_type;
    postData.quote_id = quote_id;
    postData.client_name = client_name;
    let url = app_url+'/email/send/attachment';
    if (status) {

        postAjaxData('POST',url,postData,(res) => {
            $(obj).LoadingOverlay("hide");
            if (res.status) {
                showSuccessMessage('Email was correctly sent');

                if(template_type === "convertor") {
                    window.opener.location = '../billing/pre_bill';
                    window.close();
                }else {

                    window.opener.location.reload(false);
                    window.close();
                }


            } else {
                showErrorMessage('Error some went wrong');
            }

        });
    }


}

function saveQuotes(qType,actionType,isSendEmail,isSameAddress) {


    $(".error_text").remove();
    let status = true;
    let quoteType = 'quote';
    let postData = {};
    let quoteData = [];
    let total_arr = [];
    let total_calculation = [];
    let tva_val = 0;
    let client_id = $(".client_id").val();
    let address_id = $(".address_id").val();
    let concern_address = $(".qt_concern_address").val();
    let username = $(".qoute_name").val();
    let address = $(".qoute_address").val();
    let postal_code = $(".qoute_postal_code_city").val();
    let tva_number = $(".quote_tva").val();
    let email = $(".qoute_email").val();
    let concern = $(".qt_concern_text").val();

    let document_number = $(".qt_random_quote_number").text();
    let selectedTax = $(".taxes_main").find('.tax_field.active').val();
    let lang = $('.profile_list').find('.client_language_sec').find('li a.active').attr('data-name');
    let langTone = $('.profile_list').find('.client_language_tone').find('li a.active').attr('data-name');
    let subTotal_arr = [];
    let sub_total_amount = 0;
    let clientData = {};

    if ($.trim(concern) === ""){
        $(".qt_concern_text").after('<p class="error_text">Concerne is required.</p>');
        status = false;
    }

    if(actionType == 'update') {

        lang = $(".qt_language").val();
        langTone = $(".qt_language_tone").val();


    }else if (qType == 'non_client' || qType == 'bill') {

        if ($.trim(address) === "") {
            $(".qoute_address").after('<p class="error_text">Address is required.</p>');
            status = false;
        }
        if ($.trim(postal_code) === "") {
            $(".qoute_postal_code_city").after('<p class="error_text">Postal Code is required.</p>');
            status = false;
        }
        postData['qoute_id'] = $(".quote_id").val();
        quoteType = 'bill';

        clientData['last_name'] =  $(".qoute_name").val();
        clientData['first_name'] = '';
        clientData['street'] = $(".qoute_address").val();
        clientData['street_number'] =  '';
        clientData['municipality'] = $(".qoute_postal_code_city").val();
        clientData['tva_number'] = $(".quote_tva").val();





    }else if (qType ==  'quote' && actionType == 'new_quote'){

        lang = $(".qt_language").val();
        langTone = $(".qt_language_tone").val();
        if(langTone == undefined || langTone == undefined) {

             lang = $('.profile_list').find('.client_language_sec').find('li a.active').attr('data-name');
             langTone = $('.profile_list').find('.client_language_tone').find('li a.active').attr('data-name');
        }
    }

    if ($.trim(username) === "") {
        $(".qoute_name").after('<p class="error_text">Nom is required.</p>');
        status = false;
    }
    if ($.trim(email) === "") {
        $(".qoute_email").after('<p class="error_text">Email is required.</p>');
        status = false;
    }
    $(".addquote_appendRow_main").find('.addquote_appendRow').each(function(){

        let quantity = $(this).find('.addNewQuote_qty').find('.quote_quantity').val();
        let price = $(this).find('.addNewQuote_qty').find('.quote_price').val();
        let description = $(this).find('.addNewQuote_dec').find('.qt_description').val();

        if ($.trim(quantity) === ""){
            $(this).find('.addNewQuote_qty').find('.quote_quantity').after('<p class="error_text">Quantite is required.</p>');
            status = false;
        }if ($.trim(price) === ""){
            $(this).find('.addNewQuote_qty').find('.quote_price').after('<p class="error_text">Prix Unitaire is required.</p>');
            status = false;
        }if ($.trim(description) === ""){
            $(this).find('.addNewQuote_dec').find('.qt_description').after('<p class="error_text">Description is required.</p>');
            status = false;
        }

        let sub_total = price*quantity;

        let total_cal = 0;
        if (selectedTax == 0) {
            total_cal = quantity*price;
        }else if (selectedTax == 6) {
            total_cal = (quantity*price)*1.06;
        }else if (selectedTax == 21) {
            total_cal = (quantity*price)*1.21;
        }
        quoteData.push({
            "quantity": quantity,
            "description": description,
            "unit_price": price,
            "total": total_cal,
            "sub_total": sub_total,
        });
        total_arr.push(total_cal);
        subTotal_arr.push(sub_total);

    });
    if (total_arr.length > 0) {
        total_calculation = total_arr.reduce((a, b) => a + b, 0);
    }
    //sum sub total
    if (subTotal_arr.length > 0) {
        sub_total_amount = subTotal_arr.reduce((a, b) => a + b, 0);
    }
    let taxPercent = ( parseInt(selectedTax) / 100 ) ;
    tva_val = taxPercent * total_calculation;
    let tva_tax = taxPercent * sub_total_amount;
    let total_amount = total_calculation+tva_val;

   // let sub_total_tax_amount = total_calculation+taxPercent;
    let sub_total_tax_amount = sub_total_amount+tva_tax;



    if ($(".qt_client_info_sec").attr('data-client') !== undefined) {
        clientData = JSON.parse($(".qt_client_info_sec").attr('data-client'));
    }
    if (isSameAddress) {

        //document_number = 0;
        postData['qoute_id'] = 0;
       // postData['document_number'] = 0;
    }

    //return false;

    postData.name = username;
    postData.address = address;
    postData.postal_code = postal_code;
    postData.tva_number = tva_number;
    postData.email = email;
    postData.concern = concern;
    postData.calculation_quote = quoteData;
    postData.sub_total = sub_total_amount.toFixed(2);
    postData.total = total_calculation;
    postData.total_amount = total_amount.toFixed(2);
    postData.amount = sub_total_tax_amount.toFixed(2);

    postData.total_tva = tva_val.toFixed(2);
    postData.tva_tax = tva_tax.toFixed(2);
    postData.tax = selectedTax;
    postData.language = lang;
    postData.language_tone = langTone;
    postData.client_id = client_id;
    postData.concern_address = concern_address;
    postData.document_number = document_number;
    postData.address_id = address_id;
    postData.client = clientData;
    postData.type = qType;

    if (qType == 'non_client') {

        if(actionType == 'bill') {
            postData.type = 'bill';
        }else if (actionType == 'quote'){
            postData.type = 'quote';
        }
    }

    postData.is_send = 0;
    if (isSendEmail === 1) {
        postData.is_send = 1;
    }


    console.log(postData);

  // return false;
    let url = app_url+'/quote/save';
    if (status) {
        if (isSendEmail === 1) {
            $(".send_quote_in_email_btn").LoadingOverlay("show");

        }else {

            $(".qt_common_sv_btn").LoadingOverlay("show");

        }
        postAjaxData('POST',url,postData,(res) => {

            let quote_id = res.data.id;
            if (isSendEmail === 1) {

                let emailAttachmentUrl = app_url+'/bills/email_attachment';
                window.open(emailAttachmentUrl+'?quote_id='+quote_id+'&type='+qType+'','popUpWindow','height=500,width=1000,left=100,top=100,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes');

            }else{

                if ((qType ==  'bill' && actionType == 'update')) {
                    showSuccessMessage('Bill was updated successfully');
                }else if (qType ==  'bill' && actionType == 'new'){

                    showSuccessMessage('Bill added successfully');
                }
                else {
                    showSuccessMessage(res.message);
                }
            }
            $(".qt_random_quote_number").text(res.data.document_number);
            $(".send_quote_in_email_btn").LoadingOverlay("hide");
            $(".qt_common_sv_btn").LoadingOverlay("hide");

        });
    }

}


// phase v
function createNewFolder() {

    $(".error_text").remove();
    let status = true;
    let folderName = $(".ct_flder_name").val();
    let clientId = $(".ct_client_id").val();
    let addressId = $(".ct_address_id").val();
    if ($.trim(folderName) === ""){
        $(".ct_flder_name").after('<p class="error_text">Please enter folder name</p>');
        status = false;
    }
    if (status) {
        //
        let postData = {};
        postData.title = folderName;
        postData.name = folderName.replace(/ /g,"_").toLowerCase();
        postData.clientId = clientId;
        postData.addressId = addressId;

        $(".cl_save_folder_btn").LoadingOverlay("show");
        let url = app_url+'/clients/folder/create';
        postAjaxData('POST',url,postData,(res) => {

            $(".error_text").remove();
            $(".cl_save_folder_btn").LoadingOverlay("hide");
            if (res.status) {
                let data = res.data;
                $(".ct_folder_id").val(data.id);
                showSuccessMessage(res.message);
                $(".cl_add_folder_sec").hide();
                $(".addImg_section").show();

            }else {
                showErrorMessage(res.message);
                $(".ct_flder_name").after('<p class="error_text">'+res.message+'</p>');
            }

        });
    }
}

function openFolder(obj) {

    let folderId = $(obj).attr('data-id');
    let client_id = $(".ct_client_id").val();
    let address_id = $(".ct_address_id").val();
    $(".ct_folder_id").val(folderId);
    let url = app_url+'/clients/folder/all_files';
    let postData = {};
    postData.folder_id = folderId;
    postData.client_id = client_id;
    postData.address_id = address_id;
    $(".cl_folder_sec").hide();
    $(".gallery_section").show();
    postAjaxData('POST',url,postData,(res) => {
        console.log(res);
        let data = res.data;
        showAllFiles(data);

    });


}


function showAllFiles(data) {

    $(".ct_gallery_sec").html('');
    let fileListHtml = '';
    if (data.length > 0) {
        for (let f = 0; f < data.length; f++) {
            let single = data[f];

            let noteIconPath = app_url+'/frontend_assets/images/write_icon.png';
            if (single.type === 'image') {
                let filePath = app_url+'/uploads/folders/'+single.name.toLowerCase()+'/'+single.file;
                fileListHtml +=` <li>
                                    <div class="gallery_inner" data-id="${single.id}">
                                        <div class="gallery_img">
                                            <a data-fancybox="images" data-fancybox="gallery"  href="${filePath}">
                                            <img src="${filePath}" alt="#">
                                            </a>
                                            <em class="folder_del del_single_file"></em>
                                        </div>
                                    </div>
                                 </li>`;
            } else if (single.type === 'note'){

                fileListHtml +=` <li>
                                    <div class="gallery_inner" data-id="${single.id}">
                                        <div class="gallery_img">
                                            <a class="view_edit_note" href="javascript:void(0);"><img src="${noteIconPath}" alt="#"></a>
                                            <em class="folder_del del_single_file"></em>
                                        </div>
                                    </div>
                                 </li>`;
            }

        }
        $(".ct_gallery_sec").html(fileListHtml);

        $(".gallery_section").show();
        $(".gallery_list").show();
        $(".addImg_section").hide();
        $(".addNote_section").hide();
    }
}

function showAllFolders(data) {
    console.log('data', data);
    $(".client_folder_sec").html('');
    let folderHtml = '';
    if (data.length > 0) {
        for (let f = 0; f < data.length; f++) {
            let single = data[f];
            let folderImagePath = app_url+'/frontend_assets/images/folder_icon_2.png';
            folderHtml +=`<li>
                                <div class="folder_section_detail">
                                    <i><img  src="${folderImagePath}" alt="#"></i>
                                    <span>${single.title}</span>
                                    <em class="folder_del ">
                                        <a  data-id="${single.id}" class="ct_delete_folder" href="javascript:void(0)"></a>
                                    </em>
                                    <a data-id="${single.id}" class="ct_open_folder" href="javascript:void(0);"></a>
                                </div>
                            </li>`;
        }
        $(".client_folder_sec").html(folderHtml);
        $(".gallery_section").hide();
        $(".addNote_section").hide();
        $(".cl_folder_sec").show();
    }
}

function getAllUpdatedFolders(){

    let client_id = $(".ct_client_id").val();
    let address_id = $(".ct_address_id").val();
    let postData = {};
    postData.client_id = client_id;
    postData.address_id = address_id;

    let url = app_url+'/clients/folder/all';
    postAjaxData('POST',url,postData,(res) => {
        showAllFolders(res.data);


    });
}

function saveUploadPicture(obj,file_data) {


    let client_id = $(".ct_client_id").val();
    let address_id = $(".ct_address_id").val();
    let folder_id = $(".ct_folder_id").val();
    let form_data = new FormData();
    let singleImg = file_data[0];
    let singImgSize = singleImg.size;
    let imgSizeKb = singImgSize/1000;
    if (imgSizeKb > 5000) {
        showAlertMessage('Upload file size should be 5MB');
        return false;
    }
    let allowedExtensions = /(\.jpg|\.jpeg|\.png|\.svg|\.webp|\.gif)$/i;
    if(!allowedExtensions.exec(singleImg.name)) {
        showAlertMessage('This type file is not allowed. Allowed image files are .png, .jpg, .svg, .gif, .webp.');
        return false;
    }
    form_data.append('file', singleImg);
    form_data.append('client_id', client_id);
    form_data.append('address_id', address_id);
    form_data.append('folder_id', folder_id);
    let url = app_url+'/clients/file/upload';
    $(".gallery_list ").LoadingOverlay("show");
    $.ajax({
        url: url,
        dataType: 'json',
        type: 'POST',
        processData: false,
        contentType: false,
        data: form_data,
        success: function (result) {

            if (result.status == true) {
                let data = result.data;
                $(".gallery_list ").LoadingOverlay("hide");
                showAllFiles(data);
            }
        }
    });
}


function deleteFile(obj) {

    let fileId = $(obj).closest('.gallery_inner').attr('data-id');
    let url = app_url+'/clients/folder/file/delete/'+fileId;

    $.confirm({
        title: 'Confirm!',
        content: 'Veuillez confirmer, Etes-vous sur de vouloir supprimer cet élément du fichier ?',
        boxWidth: '30%',
        useBootstrap: false,
        buttons: {
            confirm: function () {
                getAjaxData(url,'',(res) => {
                    if (res.status) {
                        showSuccessMessage(res.message);
                        $(obj).closest('li').remove();
                    }else {
                        showErrorMessage(res.message);
                    }
                })
            },
            cancel: function () {},

        }
    });




}

function deleteFolder(obj) {

    let folder_id = $(obj).attr('data-id');
    let client_id = $(".ct_client_id").val();
    let address_id = $(".ct_address_id").val();

    let url = app_url+'/clients/folder/delete';
    let postData = {};
    postData.folder_id = folder_id;
    postData.client_id = client_id;
    postData.address_id = address_id;
    $.confirm({
        title: 'Confirm!',
        content: 'Are you sure you want to delete folder!',
        boxWidth: '30%',
        useBootstrap: false,
        buttons: {
            confirm: function () {
                postAjaxData('POST',url,postData,(res) => {
                    console.log(res);
                    if (res.status) {
                        showAllFolders(res.data);
                        showSuccessMessage(res.message);
                        $(obj).closest('li').remove();
                    }else {
                        showErrorMessage(res.message);
                    }
                })
            },
            cancel: function () {},

        }
    });
}

function saveNote(obj) {

    $(".error_text").remove();
    let status = true;
    let client_id = $(".ct_client_id").val();
    let address_id = $(".ct_address_id").val();
    let folder_id = $(".ct_folder_id").val();
    let note = $(".note_field").val();

    if ($.trim(note) === "") {
        $(".note_field").after('<p class="error_text">Note field is required.</p>');
        status = false;
    }
    if (status) {
        // edit note
        if ($(obj).hasClass('edit_note_button')) {
            editNote($(obj));
        }else {
            let url = app_url+'/clients/note/save';
            let postData = {};
            postData.folder_id = folder_id;
            postData.client_id = client_id;
            postData.address_id = address_id;
            postData.note = note;

            postAjaxData('POST',url,postData,(res) => {
                console.log(res);
                let data = res.data;
                showAllFiles(data);
                showSuccessMessage(res.message);
                $(".gallery_list ").show();
                $(".addNote_section").hide();

            });
        }
    }

}

function getSingleNote(obj) {

    $(".error_text").remove();

    let id = $(obj).closest('.gallery_inner').attr('data-id');
    $(".save_note_button").attr('data-id',id);
    let noteUrl = app_url+'/clients/note/'+id;
    getAjaxData(noteUrl,'',  (result) => {

        let data = result.data;
        $('.addNote_section').find('.note_field').val(data.note);
        $(".gallery_list ").hide();
        $(".addNote_section").show();

    });
}

function editNote(obj) {

    let id = $(obj).attr('data-id');
    let folder_id = $(".ct_folder_id").val();
    let note = $(obj).closest('.addNote_section').find('.note_field').val();
    //
    let url = app_url+'/clients/note/update';
    let postData = {};
    postData.id = id;
    postData.note = note;
    postData.folder_id = folder_id;
    postAjaxData('POST',url,postData,(res) => {
        console.log(res);
        let data = res.data;
        showAllFiles(data);
        showSuccessMessage(res.message);
        $(".gallery_list ").show();
        $(".addNote_section").hide();

    });
}

//

function saveSettingUploadImage(obj,file_data) {


    let settingType = $(obj).attr('data-type');
    let form_data = new FormData();
    let singleImg = file_data[0];
    let singImgSize = singleImg.size;
    let imgSizeKb = singImgSize/1000;
    if (imgSizeKb > 5000) {
        showAlertMessage('Upload file size should be 5MB');
        return false;
    }
    let allowedExtensions = /(\.jpg|\.jpeg|\.png|\.svg|\.webp|\.gif)$/i;
    if(!allowedExtensions.exec(singleImg.name)) {
        showAlertMessage('This type file is not allowed. Allowed image files are .png, .jpg, .svg, .gif, .webp.');
        return false;
    }
    form_data.append('file', singleImg);
    form_data.append('setting_type', 'image');
    form_data.append('setting_key',settingType);
    let url = app_url+'/setting/upload/image';
    $(".gallery_list ").LoadingOverlay("show");
    $.ajax({
        url: url,
        dataType: 'json',
        type: 'POST',
        processData: false,
        contentType: false,
        data: form_data,
        success: function (result) {
            console.log('result', result);
            if (settingType === 'logo'){
                setImage($("#hdr_logo_set"),file_data);
            }
            readURL(file_data);

        }
    });

}

function updatePaidBillStatus(obj) {

    let id = $(obj).attr('data-id');
    let status = $(obj).attr('data-type');
    let url = app_url+'/bills/status';
    let postData = {};
    postData.id = id;
    postData.status = 'to_unpaid';


    postAjaxData('POST',url,postData,(res) => {

            if (res.status) {
                //$(obj).addClass('active');
                $(obj).attr('data-type','unpaid');
                appendPaidBillToUnpaidLists(obj);
                $(obj).closest('li').remove();
                showSuccessMessage(res.message);
               // window.location.reload();
            } else {
                showErrorMessage(res.message);
            }


    });
}
function updateBillStatus(obj, isFinalReview) {

    let id = $(obj).attr('data-id');
    let status = $(obj).attr('data-type');
    let url = app_url+'/bills/status';
    let postData = {};
    postData.id = id;
    postData.status = status;
    if (isFinalReview) {
        postData.status = 'paid';
    }

    postAjaxData('POST',url,postData,(res) => {

        if (isFinalReview) {

            $(obj).remove();
            location.reload();
            return false;
        }else {

            if (res.status) {
                $(obj).addClass('active');
                $(obj).attr('data-type','paid');
                appendUpaidBillToPaidList(obj);
                $(obj).closest('li').remove();
                showSuccessMessage(res.message);
                //window.location.reload();
            } else {
                showErrorMessage(res.message);
            }
        }

    });
}


function appendPaidBillToUnpaidLists(obj) {


    let total_unpaid = parseInt($("#total_paid_bill_span").text());
    total_unpaid = total_unpaid-1;
    $("#total_paid_bill_span").text(total_unpaid);

    // increment paid bill
    let total_paid = parseInt($("#total_unpaid_bill_span").text());
    total_paid = total_paid+1;
    $("#total_unpaid_bill_span").text(total_paid);
    let id = $(obj).attr('data-id');
    let unpaidBillHtml = `<li>${$(obj).closest('li').html()}<a data-id="${id}" class=" final_review_btn paid_revert_bill_btn" href="javascript:void(0);"></a></li>`;
    $("#unpaid_bill_lists").prepend(unpaidBillHtml);
    $("#unpaid_bill_lists").find('.final_review_btn').removeClass('dash_left_icon');

}

function appendUpaidBillToPaidList(obj) {

    // decrement unpaid bill
    let total_unpaid = parseInt($("#total_unpaid_bill_span").text());
    total_unpaid = total_unpaid-1;
    $("#total_unpaid_bill_span").text(total_unpaid);

    // increment paid bill
    let total_paid = parseInt($("#total_paid_bill_span").text());
    total_paid = total_paid+1;
    $("#total_paid_bill_span").text(total_paid);
    let id = $(obj).attr('data-id');
    let unpaidBillHtml = `<li>${$(obj).closest('li').html()}<a data-id="${id}" class="dash_left_icon final_review_btn " href="javascript:void(0);"></a></li>`;
    $("#paid_bill_lists").prepend(unpaidBillHtml);
}


function searchBills() {


    let field_value = $(".bill_srch_field").val();
    let url = app_url+'/bills/search_bill?q='+field_value;
    getAjaxData(url,'',  (result) => {
        $("#bill_list_section").html(result.view);

    });
}

function searchIncomeClient() {

    let field_value = $(".income_srch_client").val();
    let url = app_url+'/technical/statistics/search_client?q='+field_value;
    getAjaxData(url,'',  (result) => {

        $("#per_client_income_list_sec").html(result.view);

    });
}

function generateRandomNumber(){
    return Math.floor(Math.random() * 899 + 100000);
}


function br2nl(str) {
    return str.replace(/<br\s*\/?>/mg,"%20");
}

function getAjaxData(url,params = "", callback) {
    $.ajax({
        url: url,
        type: 'GET',
        data: params,
        success: function (result) {
            callback(result);
        }
    });
}

function postAjaxData(type,url,data,callback) {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: url,
        type: type,
        data:data,
        success: function (result) {
            callback(result);
        }
    });
}

function showSuccessMessage(msg) {
    $.toast({
        heading: 'Success',
        text: msg,
        position: 'top-right',
        icon: 'success',
        hideAfter: 9000
    })
}
function showErrorMessage(msg) {
    $.toast({
        heading: 'Error',
        text: msg,
        position: 'top-right',
        icon: 'error',
        hideAfter: 9000
    })
}


function showAlertMessage(msg) {
    $.alert({
        title: 'Alert!',
        boxWidth: '30%',
        useBootstrap: false,
        content: msg,

    });
}
 
 
 
 
 

 