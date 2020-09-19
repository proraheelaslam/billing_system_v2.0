@include('frontend.common.head')
<div class="wrapper" role="main">
  <!--add client section start-->
  <div class="menu_main profile_main config_main">
    <div class="menu_auto">
      <div class="menu_inner">
        @include('frontend.common.header_prev_button')
        <div class="home_header clearfix">
          <div class="home_header_left">

          </div>
          <div class="home_header_right">
            <div class="home_header_menu">
              <ul>
                <li><a class="all_buttons" href="{{route('menu')}}">Menu</a><span>Espace de Configuration</span></li>
              </ul>
            </div>
          </div>
        </div>
        @include('frontend.common.header_logo')
        <div class="menu_detail">

          <input type="hidden" class="email_template_type" value="{{request()->q}}">

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
                          <div class="addClient_lang email_config_lang_sec">
                            <ul>
                              <li><a data-type="FR" class="active" href="javascript:void(0);">FR</a></li>
                              <li><a data-type="NL" href="javascript:void(0);">NL</a></li>
                              <li><a data-type="EN" href="javascript:void(0);">EN</a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="profile_box_tableCell width40">
                    <div class="profile_box">
                      <div class="addClient_lang email_config_lang_ton_sec">
                        <ul>
                          <li><a data-type="Tu" class="active" href="javascript:void(0);">Tu</a></li>
                          <li><a data-type="Vous" href="javascript:void(0);">Vous</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="config_detail">
                  <textarea name="config_email_msg"class="config_email_txt" ></textarea>
                </div>
              </li>
              <li>
                <div class="config_saveBtn config_email_save_button">
                  <input type="submit" value="Save">
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
