@include('frontend.common.head')
<script>
  var app_url = '{{url('/')}}'
</script>
<div class="wrapper" role="main">
    <!--profile section start-->
    <div class="menu_main profile_main">
      <div class="menu_auto">
        <div class="menu_inner">
          @include('frontend.common.header_prev_button')
          <div class="home_header clearfix">
            <div class="home_header_left">
              
            </div>
            <div class="home_header_right">
              <div class="home_header_menu">
                <ul>
                  <li><a class="all_buttons" href="{{route('menu')}}">Menu</a></li>
                </ul>
              </div>
            </div>
          </div>
          @include('frontend.common.header_logo')
          <div class="menu_detail">
            <div class="profile_list">
              <input type="hidden" name="user_id" value="{{$user->id}}">
              <ul>
                <li>
                  <div class="profile_box">
                    <div class="menu_box_table">
                      <div class="profile_box_tableCell width40">
                        <div class="profile_box_text">
                          <strong>Nom:</strong>
                        </div>
                      </div>
                      <div class="profile_box_tableCell width50">
                        <div class="profile_box_text profile_afterEdit">
                          <p>{{$user->name}}</p>
                        </div>
                        <div class="profile_edit">
                          <ul>
                            <li>
                              <div class="profile_edit_feildOut">
                                <div class="profile_edit_feild">
                                  <input type="text" value="{{$user->name}}" name="name">
                                </div>
                              </div>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div class="profile_box_tableCell">
                        <div class="profile_box_text">
                          <a class="profile_edit_btn"  data-id="{{$user->id}}" data-name="{{$user->name}}" href="javascript:void(0)">Edit</a>
                          <input class="profile_save_btn" data-type="name" type="submit" value="Save">
                        </div>
                      </div>
                    </div>
                  </div>
                </li>

                <li>
                  <div class="profile_box">
                    <div class="menu_box_table">
                      <div class="profile_box_tableCell width40">
                        <div class="profile_box_text">
                          <strong>Adresse:</strong>
                        </div>
                      </div>
                      <div class="profile_box_tableCell width50">
                        <div class="profile_box_text profile_afterEdit">
                          <p>Rue: <span class="prof_street_spn">{{$user->street}}</span></p>
                          <p>Nimero: <span class="prof_street_number_spn" >{{$user->street_number}}</span></p>
                          <p>Code Postal: <span class="prof_postal_code_spn" >{{$user->postal_code}}</span></p>
                          <p>Municipalite: <span class="prof_municipality_spn" > {{$user->municipality}} </span></p>
                        </div>
                        <div class="profile_edit">
                          <div class="add_client_detail">
                            <div class="add_client_detail_row">
                              <div class="menu_box_table">
                                <div class="profile_box_tableCell width40">
                                  <div class="profile_box_text">
                                    <strong>Rue:</strong>
                                  </div>
                                </div>
                                <div class="profile_box_tableCell">
                                  <div class="profile_edit_feildOut">
                                    <div class="profile_edit_feild">
                                      <input type="text" name="street" class="profile_street" value="{{$user->street}}">
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="add_client_detail_row">
                              <div class="menu_box_table">
                                <div class="profile_box_tableCell width40">
                                  <div class="profile_box_text">
                                    <strong>Numero:</strong>
                                  </div>
                                </div>
                                <div class="profile_box_tableCell">
                                  <div class="profile_edit_feildOut">
                                    <div class="profile_edit_feild">
                                      <input type="text" name="street_number" class="profile_street_number" value="{{$user->street_number}}">
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="add_client_detail_row">
                              <div class="menu_box_table">
                                <div class="profile_box_tableCell width40">
                                  <div class="profile_box_text">
                                    <strong>Code Postal:</strong>
                                  </div>
                                </div>
                                <div class="profile_box_tableCell">
                                  <div class="profile_edit_feildOut">
                                    <div class="profile_edit_feild">
                                      <input type="text" name="postal_code" class="profile_postal_code" value="{{$user->postal_code}}">
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="add_client_detail_row">
                              <div class="menu_box_table">
                                <div class="profile_box_tableCell width40">
                                  <div class="profile_box_text">
                                    <strong>Municipalite:</strong>
                                  </div>
                                </div>
                                <div class="profile_box_tableCell">
                                  <div class="profile_edit_feildOut">
                                    <div class="profile_edit_feild">
                                      <input type="text" name="municipality" class="profile_Municipalite" value="{{$user->municipality}}">
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="profile_box_tableCell">
                        <div class="profile_box_text">
                          <a class="profile_edit_btn"  data-id="{{$user->id}}" href="javascript:void(0)">Edit</a>
                          <input class="profile_save_btn" data-type="address" type="submit" value="Save">
                        </div>
                      </div>
                    </div>
                  </div>
                </li>

                <li>
                  <div class="profile_box">
                    <div class="menu_box_table">
                      <div class="profile_box_tableCell width40">
                        <div class="profile_box_text">
                          <strong>Numero de Telephone:</strong>
                        </div>
                      </div>
                      <div class="profile_box_tableCell width50">
                        <div class="profile_box_text profile_afterEdit">
                          <p>{{$user->phone_number}}</p>
                        </div>
                        <div class="profile_edit">
                          <ul>
                            <li>
                              <div class="profile_edit_feildOut">
                                <div class="profile_edit_feild">
                                  <input type="text" value="{{$user->phone_number}}" name="phone_number">
                                </div>
                              </div>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div class="profile_box_tableCell">
                        <div class="profile_box_text">
                          <a class="profile_edit_btn" data-id="{{$user->id}}" data-name="{{$user->name}}" href="javascript:void(0)">Edit</a>
                          <input class="profile_save_btn"  data-type="phone_number" type="submit" value="Save">
                        </div>
                      </div>
                    </div>
                  </div>
                </li>

                <li>
                  <div class="profile_box">
                    <div class="menu_box_table">
                      <div class="profile_box_tableCell width40">
                        <div class="profile_box_text">
                          <strong>Compte Bancaire:</strong>
                        </div>
                      </div>
                      <div class="profile_box_tableCell width50">
                        <div class="profile_box_text profile_afterEdit">

                          <p>{{$user->bank_account}}</p>
                          <p><span class="bank_bic_spn" >{{$user->bic}}</span></p>

                        </div>
                        <div class="profile_edit">
                          <div class="add_client_detail">
                            <div class="add_client_detail_row">
                              <div class="menu_box_table">
                                <div class="profile_box_tableCell width40">
                                  <div class="profile_box_text">
                                    <strong>IBAN:</strong>
                                  </div>
                                </div>
                                <div class="profile_box_tableCell">
                                  <div class="profile_edit_feildOut">
                                    <div class="profile_edit_feild">
                                      <input type="text" name="bank_account" class="bank_account" value="{{$user->bank_account}}">
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="add_client_detail_row">
                              <div class="menu_box_table">
                                <div class="profile_box_tableCell width40">
                                  <div class="profile_box_text">
                                    <strong>BIC:</strong>
                                  </div>
                                </div>
                                <div class="profile_box_tableCell">
                                  <div class="profile_edit_feildOut">
                                    <div class="profile_edit_feild">
                                      <input type="text" name="bic" class="bic" value="{{$user->bic}}">
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>

                          </div>
                        </div>
                      </div>
                      <div class="profile_box_tableCell">
                        <div class="profile_box_text">
                          <a class="profile_edit_btn" data-id="{{$user->id}}" data-name="{{$user->bank_account}}" href="javascript:void(0)">Edit</a>
                          <input class="profile_save_btn" data-type="bank_account" type="submit" value="Save">
                        </div>
                      </div>
                    </div>
                  </div>
                </li>

                <li>
                  <div class="profile_box">
                    <div class="menu_box_table">
                      <div class="profile_box_tableCell width40">
                        <div class="profile_box_text">
                          <strong>Changer mon mot de passe:</strong>
                        </div>
                      </div>
                      <div class="profile_box_tableCell width50">
                        {{--<div class="profile_box_text profile_afterEdit">
                          <p></p>
                        </div>--}}
                        <div class="profile_edit">
                          <ul>
                            <li>
                              <div class="profile_edit_feildOut">
                                <div class="profile_edit_feild">
                                  <input type="password"  name="password" placeholder="Enter Password" autocomplete="off">
                                </div>
                              </div>
                            </li>
                            <li>
                              <div class="profile_edit_feildOut">
                                <div class="profile_edit_feild">
                                  <input type="password" name="confirm_password"  placeholder="Confirm Password"  autocomplete="off">
                                </div>
                              </div>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div class="profile_box_tableCell">
                        <div class="profile_box_text">
                          <a class="profile_edit_btn" data-id="{{$user->id}}" data-name="{{$user->password}}"  href="javascript:void(0)">Edit</a>
                          <input class="profile_save_btn" data-type="password" type="submit" value="Save">
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="profile_box">
                    <div class="menu_box_table">
                      <div class="profile_box_tableCell width40">
                        <div class="profile_box_text">
                          <strong>Numero de TVA:</strong>
                        </div>
                      </div>
                      <div class="profile_box_tableCell width50">
                        <div class="profile_box_text profile_afterEdit">
                          <p>{{$user->tva_number}}</p>
                        </div>
                        <div class="profile_edit">
                          <ul>
                            <li>
                              <div class="profile_edit_feildOut">
                                <div class="profile_edit_feild">
                                  <input type="text" value="{{$user->tva_number}}" name="tva_number">
                                </div>
                              </div>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div class="profile_box_tableCell">
                        <div class="profile_box_text">
                          <a class="profile_edit_btn" data-id="{{$user->id}}" data-name="{{$user->bank_account}}"  href="javascript:void(0)">Edit</a>
                          <input class="profile_save_btn" data-type="tva_number" type="submit" value="Save">
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="profile_box">
                    <div class="menu_box_table">
                      <div class="profile_box_tableCell width40">
                        <div class="profile_box_text">
                          <strong>Email Adresse:</strong>
                        </div>
                      </div>
                      <div class="profile_box_tableCell width50">
                        <div class="profile_box_text profile_afterEdit">
                          <p>{{$user->email}}</p>
                        </div>
                        <div class="profile_edit">
                          <ul>
                            <li>
                              <div class="profile_edit_feildOut">
                                <div class="profile_edit_feild">
                                  {{--recipient_email--}}
                                  <input type="text" value="{{$user->email}}" name="email">
                                </div>
                              </div>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div class="profile_box_tableCell">
                        <div class="profile_box_text">
                          <a class="profile_edit_btn" data-id="{{$user->id}}" data-name="{{$user->email}}"  href="javascript:void(0)">Edit</a>
                          <input class="profile_save_btn" data-type="email" type="submit" value="Save">
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
  <!--profile section start-->
</div>

</body>
</html>
