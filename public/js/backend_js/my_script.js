$(document).ready(function() {
 var baseURL = config.routes.urlPath;
  $(document).on('click', '.edit-modal', function() {
    
        $('#footer_action_button').text("Update");
        $('#footer_action_button').addClass('glyphicon-check');
        $('#footer_action_button').removeClass('glyphicon-trash');
        $('.actionBtn').addClass('btn-success');
        $('.actionBtn').removeClass('btn-danger');
        $('.actionBtn').addClass('edit');
        $('.modal-title').text('Edit');
        $('.deleteContent').hide();
        $('.form-horizontal').show();
        $('#fid').val($(this).data('id'));
        $('#n').val($(this).data('name'));
        $('#desc').val($(this).data('description'));
        $('#design').val($(this).data('designation'));
        $('#myModal').modal('show');
        //console.log($('#designation').val($(this).data('designation')));
    });
    $(document).on('click', '.delete-modal', function() {
        $('#footer_action_button').text(" Delete");
        $('#footer_action_button').removeClass('glyphicon-check');
        $('#footer_action_button').addClass('glyphicon-trash');
        $('.actionBtn').removeClass('btn-success');
        $('.actionBtn').addClass('btn-danger');
        $('.actionBtn').addClass('delete');
        $('.modal-title').text('Delete');
        $('.did').text($(this).data('id'));
        $('.deleteContent').show();
        $('.form-horizontal').hide();
        $('.dname').html($(this).data('name'));
        $('#myModal').modal('show');
    });

    //Ajax edit
    $('.modal-footer').on('click', '.edit', function() {

        $.ajax({
            type: 'post',
            url : baseURL+'/admin/editItem',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $("#fid").val(),
                'name': $('#n').val(),
                'description': $('#desc').val(),
                'designation': $('#design').val()  
            },
            success: function(data) {
                //console.log(data);
                $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.name + "</td><td>" + data.description + "</td><td>" + data.designation + "</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-name='" + data.name + "' data-description='" + data.description + "' data-designation='" + data.designation + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-name='" + data.name + "'  data-description='" + data.description + "' data-designation='" + data.designation + "'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
            }
        });
    });
    
    //Ajax add
    $("#add").click(function() {
        $.ajax({
            type: 'post',
            url: baseURL+'/admin/addItem',
            data: {
                '_token' : $('input[name=_token]').val(),
                'name'   : $('input[name=name]').val(),
                'description' : $('input[name=description]').val(),
                'designation' : $('input[name=designation]').val(),
            },
            success: function(data) {
                if ((data.errors)){
                  $('.error').removeClass('hidden');
                  $('.error').text(data.errors.name);
                }
                else {
                    $('.error').addClass('hidden');
                    //alert(data.name);
                    $('#table').append("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.name + "</td><td>" + data.description + "</td><td>" + data.designation + "</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-name='" + data.name + "'  data-description='" + data.description + "' data-designation='" + data.designation + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-name='" + data.name + "'  data-description='" + data.description + "' data-designation='" + data.designation + "'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
                }
            },

        });
        $('#name').val('');
        $('#description').val('');
        $('#designation').val('');
    });

    //Ajax delete
    $('.modal-footer').on('click', '.delete', function() {
        $.ajax({
            type: 'post',
            url: baseURL+'/admin/deleteItem',
            data: {
                '_token' : $('input[name=_token]').val(),
                'id'     : $('.did').text()
            },
            success: function(data) {
                $('.item' + $('.did').text()).remove();
            }
        });
    });
});



// Action Delete Record 
$('#datatable').on('click','.btn-delete',function(e){

    e.preventDefault();
    var reload_datatable = $("#datatable").dataTable({bRetrieve: true});
    //console.log(reload_datatable);
    var url = $(this).data('url');
    //alert(url);
    $.confirm({
      title: 'Confirm!',
      content: 'Are You Sure Want to delete?',
      buttons: {
          confirm: function () {
                  e.preventDefault();
                  $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                  });
                  // confirm then
                  $.ajax({
                      url: url,
                      type: 'delete',
                      complete: function(data) {
                  
                          console.log(data);
                           if (reload_datatable != "") {
                                  reload_datatable.fnDraw();
                              }
                          $('.ajaxAlert').show().html('asdsa dasdadadad ');
                          success_message(data.message);
                         
                          //$('#datatable').DataTable().ajax.reload();
                          //$('#conformPopup').hide();
                      }
                  });
          },
          cancel: function () {
              //$.alert('Canceled!');
          }
      }
  });
  })


// Create Data Table  
function createDatable(url, columns, ordering = [], listing_name) {
    // console.log("datatableLoader", datatableLoader);
    var baseURL = config.routes.urlPath;
    var loader = '<img src="'+baseURL+'/images/backend_images/input-spinner.gif'+'" alt="Processing..." class="loader_img">';
    //alert(loader);
    //console.log('loader', loader);
    var oTable = $("#datatable").DataTable({
        serverSide: true,
        bFilter: true,
        ordering: true,
        bSortCellsTop: true,
        responsive: true,
        stateSave: true,
        processing: true,
        pageLength: 50,
        language: {
            lengthMenu: "Records Per Page: _MENU_",
            processing: loader,
        },
        // dom: "<t><'row'<'col-sm-4'i><'col-sm-4'l><'col-sm-4'p>>",
        // dom: "<<rt>ilp>",
        dom: "rtilp",
        // dom: '<f<t>ilp>',
        ajax: {
            url: url,
            data: function (d) {
                switch(listing_name){
                    case "users":
                      
                    break;

                }
            },
            error: function (request, status, error) {
                let result = request.responseJSON;
                //if (result.message)
                    //console.log(result.message);
            }
        },
        columns: columns,
        columnDefs: [
            {"className": "dt-left", "targets": "_all"},// break-words
          ],
        aaSorting: [],
        lengthMenu: [
                    [10, 20, 50, 100, 150, -1],
                    [10, 20, 50, 100, 150, "All"] // change per page values here
                ],
    });
    

   
}

//Toastr Success Alert Messages
function success_message(message, title) {
    if (!title) title = "Success!";
    toastr.remove();
    toastr.success(message, title, {
        closeButton: true,
        timeOut: 5000,
        progressBar: true,
        newestOnTop: true
    });
}

//Toastr Error Alert Messages
function error_message(message, title) {
    if (!title) title = 'Error';
    toastr.remove();
    toastr.error(message, title, {
        closeButton: true,
        timeOut: 5000,
        progressBar: true,
        newestOnTop: true
    });
}