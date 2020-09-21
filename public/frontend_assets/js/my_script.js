
$(document).ready(function(e) {


    $("body").on("click",".client_list_arrow a",function(){

        $(this).toggleClass("active");
        $(this).parents(".profile_box").toggleClass("active");
        
    });


    $("body").on("click",".addClient_addBtn",function(){

        var addClient_html = '<div class="addclient_appendRow"> <div class="profile_box"><div class="client_add_del"><a style="display:block" class="addClient_delBtn" href="javascript:void(0);"><i class="fa fa-minus"></i></a></div> <div class="menu_box_table"> <div class="profile_box_tableCell width30"> <div class="profile_box_text"> <strong>Adresse de Chantier:</strong> </div></div><div class="profile_box_tableCell"> </div></div><div class="add_client_detail"> <div class="add_client_detail_row"> <div class="menu_box_table"> <div class="profile_box_tableCell width30"> <div class="profile_box_text"> <strong>Rue:</strong> </div></div><div class="profile_box_tableCell"> <div class="profile_edit_feildOut"> <div class="profile_edit_feild"> <input type="text" name="work_address_street"> </div></div></div></div></div><div class="add_client_detail_row"> <div class="menu_box_table"> <div class="profile_box_tableCell width30"> <div class="profile_box_text"> <strong>Numero:</strong> </div></div><div class="profile_box_tableCell"> <div class="profile_edit_feildOut"> <div class="profile_edit_feild"> <input type="text" name="word_address_street_number"> </div></div></div></div></div><div class="add_client_detail_row"> <div class="menu_box_table"> <div class="profile_box_tableCell width30"> <div class="profile_box_text"> <strong>Code Postal:</strong> </div></div><div class="profile_box_tableCell"> <div class="profile_edit_feildOut"> <div class="profile_edit_feild"> <input type="text" name="work_address_postal_code"> </div></div></div></div></div><div class="add_client_detail_row"> <div class="menu_box_table"> <div class="profile_box_tableCell width30"> <div class="profile_box_text"> <strong>Municipalite:</strong> </div></div><div class="profile_box_tableCell"> <div class="profile_edit_feildOut"> <div class="profile_edit_feild"> <input type="text" name="work_address_municipality"> </div></div></div></div></div></div></div> </div>';
        $(".addclient_appendRow_main").find('.addclient_appendRow:first-child').after(addClient_html);
        //$(this).parent(".addclient_appendRow").addClass("active");
    });



    $("body").on("click",".addClient_delBtn",function(){
        // $(".addclient_appendRow").addClass("active");
        // var row_length = $(".addclient_appendRow").length;
        // if(row_length === 1){
        // 	$(".addclient_appendRow").removeClass("active");
        // }
        $(this).closest(".addclient_appendRow").remove();
    });


    $(".addClient_lang ul li a").click(function(e){
        $(this).parents(".profile_box_tableCell").find(".addClient_lang ul li a").removeClass("active");
        $(this).addClass("active");
    });







    $("body").on("click",".addClient_delBtn",function(){
        // $(".addclient_appendRow").addClass("active");
        // var row_length = $(".addclient_appendRow").length;
        // if(row_length === 1){
        // 	$(".addclient_appendRow").removeClass("active");
        // }
        $(this).parent(".addclient_appendRow").remove();
    });


    $(".addClient_lang ul li a").click(function(e){
        $(this).parents(".profile_box_tableCell").find(".addClient_lang ul li a").removeClass("active");
        $(this).addClass("active");
    });




    $("body").on("click",".addquote_addBtn",function(){
        var addquote_html = $('<div class="addquote_appendRow"> <div class="addNewQuote_qty"> <div class="menu_box_table"> <div class="profile_box_tableCell" style="padding-right: 10px"> <div class="profile_box"> <div class="menu_box_table"> <div class="profile_box_tableCell"> <div class="profile_box_text"> <strong>Quantite:</strong> </div></div><div class="profile_box_tableCell"> <div class="profile_edit_feildOut"> <div class="profile_edit_feild"> <input min="1" type="number"  class="calculate_ quote_quantity" value=""> </div></div></div></div></div></div><div class="profile_box_tableCell" style="padding-left: 10px"> <div class="profile_box"> <div class="menu_box_table"> <div class="profile_box_tableCell"> <div class="profile_box_text"> <strong>Prix Unitaire:</strong> </div></div><div class="profile_box_tableCell"> <div class="profile_edit_feildOut"> <div class="profile_edit_feild"> <input min="1" type="number" name="quote_price" class="quote_price" value="">  </div></div></div></div></div></div></div></div><div class="addNewQuote_dec"> <div class="profile_box"> <div class="menu_box_table"> <div class="profile_box_tableCell width30"> <div class="profile_box_text"> <strong>Description:</strong> </div></div><div class="profile_box_tableCell"> <div class="profile_edit_feildOut"> <div class="profile_edit_feild"> <textarea class="qt_description"></textarea> </div></div></div></div></div></div><a class="addquote_addBtn" href="javascript:void(0);"><i class="fa fa-plus"></i></a> <a class="addquote_delBtn" href="javascript:void(0);"><i class="fa fa-minus"></i></a> </div>');
        //$(".addquote_appendRow_main").prepend(addquote_html);

        //$(this).closest('.addquote_appendRow_main').find('.addquote_appendRow').after(addquote_html)
        $(".addquote_appendRow_main").find('.addquote_appendRow:last-child').after(addquote_html);
        $(".addquote_appendRow").addClass("active");
        quoteCalculation();
        autosize(document.getElementsByClassName('qt_description'));
    });



    $("body").on("click",".addquote_delBtn",function(){
        $(this).parent(".addquote_appendRow").remove();
    });




    $("body").on("click",".onoff_switch a",function(){
        $(this).toggleClass("active");
    });





    //end ready
});









