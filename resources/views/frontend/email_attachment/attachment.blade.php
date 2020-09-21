@include('frontend.common.head')
<div class="wrapper" role="main">
  <div class="eTemp_wrapper">
  @php

    $qoute =  $data['qoute'];
    $email_template =  $data['email_template'];
    $user =  $data['user'];

   @endphp
    <div class="eTemp_content_main">

      <div class="eTemp_header">
        <div class="eTemp_header_inner">

          <div class="eTemp_header_menu eTmp_hdrMen">

          </div>
          <div class="eTemp_header_send">
            <a class="all_buttons btn_blue send_email_attchment_button" href="javascript:void(0)">Send</a>
          </div>
         {{-- <div class="insEmail_close_parent">
            <a class="insEmail_closeBtn" href="javascript:void(0)"></a>
          </div>--}}
        </div>
      </div>

      <div class="eTemp_toSubject_header">
        <input type="hidden" value="{{request()->type}}" id="attchment_tmplate_type">
        <input type="hidden" value="{{request()->quote_id}}" id="attchment_quote_id">
        <input type="hidden"  value="{{$user->name}}" id="q_client_name">

        <div class="eTemp_toSubject_header_inner">
          <div class="eTemp_toSubject_row eTemp_to_row">
            <strong>From:</strong>
            <div class="eTemp_toSubject_address">

              <div class="profile_box_tableCell">
                <div class="profile_edit_feildOut">
                  <div class="profile_edit_feild">
                    {{--{{$user->recipient_email}}--}}
                    <input disabled="disabled" type="text" class="from_email_address" value="{{$user->email}}">
                  </div>
                </div>
              </div>

            </div>
          </div>
          <div class="eTemp_toSubject_row eTemp_to_row">
            <strong>To:</strong>
            <div class="eTemp_toSubject_address">
              <div class="profile_box_tableCell">
                <div class="profile_edit_feildOut">
                  <div class="profile_edit_feild">
                    <input type="text" class="to_email_address" value="{{$qoute->email}}">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="eTemp_toSubject_row eTemp_to_row">
            <strong>Subject:</strong>
            <div class="eTemp_toSubject_address">
              <div class="profile_box_tableCell">
                <div class="profile_edit_feildOut">
                  <div class="profile_edit_feild">
                    <input type="text" class="email_subject" value="{{$data['subject_line']}}">
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="eTemp_toSubject_row eTemp_subject_row">

            <strong>Message:</strong>
              <div class="profile_box_tableCell">
                <div class="profile_edit_feildOut">
                  <div class="profile_edit_feild">
                    <textarea class="qt_description email_body" style="overflow: hidden scroll;overflow-wrap: break-word;height: 186px;width: 100%;">{!! str_replace("<br />", "\r\n", @$email_template->message)!!}
                      </textarea>
                  </div>
                </div>
              </div>

          </div>
        </div>
      </div>


      <div class="eTemp_editor_main">
        <div class="eTemp_editor_inner">

          <div class="eTemp_attachedFiles_main eTemp_default_attachment">
            <div class="eTemp_attachedFiles_inner">
              <strong class="eTemp_additional_attachment_heading">Attachment</strong>
              <ul id="eTemp_default_attachedFiles_append">
                <li data-id=""  data-file="Pdf">
                  <div class="eTemp_attachedFiles_name">
                    <span class="attachment_pdf_file_name" data-file-path="{{$qoute->file_path}}">{{$qoute->file}}</span>
                  </div>

                </li>
              </ul>
              <ul id="eTemp_attachedFiles_append">

              </ul>
            </div>
          </div>




        </div>
      </div>




    </div>


  </div>
  <!--client list section end-->
</div>

</body>
</html>
