@include('frontend.common.head')
<div class="wrapper" role="main">
  <!--add client section start-->
  <div class="menu_main profile_main add_client_main textSet_main">
    <div class="menu_auto">
      <div class="menu_inner">
        @include('frontend.common.header_prev_button')
        <div class="home_header clearfix">
          <div class="home_header_left">

          </div>
          <div class="home_header_right">
            <div class="home_header_menu">
              <ul>
                <li><a class="all_buttons" href="{{route('menu')}}">Menu</a>
                  <span>Espace Client</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
        @include('frontend.common.header_logo')
        <div class="menu_detail">
          <div class="profile_list ">
            <form id="add_client_form">
              <ul>
                <li>
                  <div class="profile_box">
                    <div class="menu_box_table">
                      <div class="profile_box_tableCell width30">
                        <div class="profile_box_text">
                          <strong>Nom:*</strong>
                        </div>
                      </div>
                      <div class="profile_box_tableCell">
                        <div class="profile_edit_feildOut">
                          <div class="profile_edit_feild">
                            <input type="text" name="last_name">
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
                            <input type="text" name="first_name">
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
                          <strong>Email:*</strong>
                        </div>
                      </div>
                      <div class="profile_box_tableCell">
                        <div class="profile_edit_feildOut">
                          <div class="profile_edit_feild">
                            <input type="email" name="email">
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
                              <strong>Rue:*</strong>
                            </div>
                          </div>
                          <div class="profile_box_tableCell">
                            <div class="profile_edit_feildOut">
                              <div class="profile_edit_feild">
                                <input type="text" name="street">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="add_client_detail_row">
                        <div class="menu_box_table">
                          <div class="profile_box_tableCell width30">
                            <div class="profile_box_text">
                              <strong>Numero:*</strong>
                            </div>
                          </div>
                          <div class="profile_box_tableCell">
                            <div class="profile_edit_feildOut">
                              <div class="profile_edit_feild">
                                <input type="text" name="street_number">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="add_client_detail_row">
                        <div class="menu_box_table">
                          <div class="profile_box_tableCell width30">
                            <div class="profile_box_text">
                              <strong>Code Postal:*</strong>
                            </div>
                          </div>
                          <div class="profile_box_tableCell">
                            <div class="profile_edit_feildOut">
                              <div class="profile_edit_feild">
                                <input type="text" name="postal_code">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="add_client_detail_row">
                        <div class="menu_box_table">
                          <div class="profile_box_tableCell width30">
                            <div class="profile_box_text">
                              <strong>Municipalite:*</strong>
                            </div>
                          </div>
                          <div class="profile_box_tableCell">
                            <div class="profile_edit_feildOut">
                              <div class="profile_edit_feild">
                                <input type="text" name="municipality">
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
                          <strong>Numero de Telephone:*</strong>
                        </div>
                      </div>
                      <div class="profile_box_tableCell">
                        <div class="profile_edit_feildOut">
                          <div class="profile_edit_feild">
                            <input type="text" name="phone_number">
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
                                <li><a data-name="FR" class="active" href="javascript:void(0);">FR</a></li>
                                <li><a data-name="NL" href="javascript:void(0);">NL</a></li>
                                <li><a data-name="EN" href="javascript:void(0);">EN</a></li>
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
                            <li><a data-name="Vous" href="javascript:void(0);">Vous</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="addclient_appendRow_main">
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
                                  <strong>Rue:*</strong>
                                </div>
                              </div>
                              <div class="profile_box_tableCell">
                                <div class="profile_edit_feildOut">
                                  <div class="profile_edit_feild">
                                    <input type="text" name="work_address_street">
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="add_client_detail_row">
                            <div class="menu_box_table">
                              <div class="profile_box_tableCell width30">
                                <div class="profile_box_text">
                                  <strong>Numero:*</strong>
                                </div>
                              </div>
                              <div class="profile_box_tableCell">
                                <div class="profile_edit_feildOut">
                                  <div class="profile_edit_feild">
                                    <input type="text" name="word_address_street_number">
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="add_client_detail_row">
                            <div class="menu_box_table">
                              <div class="profile_box_tableCell width30">
                                <div class="profile_box_text">
                                  <strong>Code Postal:*</strong>
                                </div>
                              </div>
                              <div class="profile_box_tableCell">
                                <div class="profile_edit_feildOut">
                                  <div class="profile_edit_feild">
                                    <input type="text" name="work_address_postal_code">
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="add_client_detail_row">
                            <div class="menu_box_table">
                              <div class="profile_box_tableCell width30">
                                <div class="profile_box_text">
                                  <strong>Municipalite:*</strong>
                                </div>
                              </div>
                              <div class="profile_box_tableCell">
                                <div class="profile_edit_feildOut">
                                  <div class="profile_edit_feild">
                                    <input type="text" name="work_address_municipality">
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="client_add_del">
                          <a style="display: block" class="addClient_addBtn" href="javascript:void(0);"><i class="fa fa-plus"></i></a>
                          <a style="display: none;" class="addClient_delBtn" href="javascript:void(0);"><i class="fa fa-minus"></i></a>
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
                          <strong>Numero TVA:</strong>
                        </div>
                      </div>
                      <div class="profile_box_tableCell">
                        <div class="profile_edit_feildOut">
                          <div class="profile_edit_feild">
                            <input type="text" name="tva_number">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="addClient_saveBtn">
                    <input type="button" value="Save" class="add_client_pg_btn">
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
