@include('frontend.common.head')
<div class="wrapper" role="main">
    <!--folder section start-->
    <div class=" menu_main">
        <div class="folder_auto">
            <div class="menu_inner">
                @include('frontend.common.header_prev_button')
                <div class="home_header clearfix">
                    <div class="home_header_left">

                    </div>
                    <div class="home_header_right">
                        <div class="home_header_menu">
                            <ul>
                                <li><a class="all_buttons" href="{{route('menu')}}">Menu</a>
                                    <span>Espace Dossier</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="main_logo_outer">
                    @include('frontend.common.header_logo')
                </div>


                <div class="folder_main_box">
                    @php
                        $folders = $data['folders'];
                        $singleClient = $data['client'];
                        $address = $data['single_address'];
                    @endphp
                    <input type="hidden" class="ct_address_id" value="{{$data['address_id']}}">
                    <input type="hidden" class="ct_client_id" value="{{$data['client_id']}}">
                    <input type="hidden" class="ct_folder_id" value="">
                    <div class="folder_main_box_inner">
                        <div class="folder_box_header">
                            <div class="menu_box_table">
                                <div class="menu_box_tableCell">
                                    <div class="folder_box_header_text">
                                        <p>{{$singleClient->first_name}} {{$singleClient->last_name}}</p>
                                        <p>{{$singleClient->phone_number}}</p>
                                    </div>
                                </div>
                                <div class="menu_box_tableCell text_right">
                                    <div class="folder_box_header_text">
                                        <p>{{ $address['street'] }} {{ $address['street_number'] }} ; {{ $address['postal_code'] }} {{ $address['municipality'] }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="folder_box_content">
                            <div class="folder_section cl_folder_sec" style="display: block;">
                                <div class="folder_section_header">
                                    <div class="menu_box_table">
                                        <div class="menu_box_tableCell">
                                            <div class="folder_addBtn_main">
                                                <a class="folder_addBtn create_folder_btn" href="javascript:void(0);"></a>
                                            </div>
                                        </div>
                                        {{--<div class="menu_box_tableCell">
                                            <div class="nextPrev_btns">
                                                <a class="prev_btn" href="javascript:void(0);"></a>
                                                <a class="next_btn" href="javascript:void(0);"></a>
                                            </div>
                                        </div>--}}
                                    </div>
                                </div>
                                <div class="folder_section_list ">

                                        <ul class="client_folder_sec">
                                            @if(count($folders) > 0)
                                                @foreach($folders as $folder)
                                                    <li>
                                                        <div class="folder_section_detail">
                                                            <i><img  src="{{asset('frontend_assets/images/folder_icon_2.png')}} " alt="#"></i>
                                                            <span>{{$folder->title}}</span>
                                                            <em class="folder_del ">
                                                                <a  data-id="{{$folder->id}}" class="ct_delete_folder" href="javascript:void(0)"></a>
                                                            </em>
                                                            <a data-id="{{$folder->id}}" class="ct_open_folder" href="javascript:void(0);"></a>
                                                        </div>
                                                    </li>

                                                @endforeach
                                            @else
                                                <p class="not_found_folder_msg">No Folder Exists</p>


                                            @endif
                                        </ul>

                                </div>
                            </div>


                            <div class="addFolder_section cl_add_folder_sec" style="display: none;">
                                <div class="addFolder_section_poss">
                                    <div class="addFolder_section_table">
                                        <div class="addFolder_section_tableCell">
                                            <div class="addFolder_section_inner">
                                                <span><img src="{{asset('frontend_assets/images/folder_icon_2.png')}}" alt="#"></span>
                                                <div class="addFolder_section_feild">
                                                    <input type="text" placeholder="Folder Name" class="ct_flder_name">
                                                    <button type="submit" class="cl_save_folder_btn"><i class="fa fa-angle-right"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="addFolder_section addImg_section" style="display: none;">
                                <div class="addFolder_section_poss">
                                    <div class="addFolder_section_table">
                                        <div class="addFolder_section_tableCell">
                                            <div class="addImg_section_inner">
                                                <ul>
                                                    <li>
                                                        <div class="addImg_inner">
                                                            <a href="javascript:void(0);"><img src="{{asset('frontend_assets/images/camera_icon.png')}} " alt="#"></a>
                                                            <input accept="image/*" data-type="camera" type="file" class="add_upload_picture" name="upload_picture">
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="addImg_inner">
                                                            <a href="javascript:void(0);"><img src="{{asset('frontend_assets/images/upload_icon.png')}}" alt="#"></a>
                                                            <input accept="image/*" type="file" class="add_upload_picture" name="upload_picture">
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="addImg_inner">
                                                            <a class="ct_write_note_btn" href="javascript:void(0);"><img src="{{asset('frontend_assets/images/write_icon.png')}}" alt="#"></a>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="gallery_section" style="display: none;">
                                <div class="folder_section_header">
                                    <div class="menu_box_table">
                                        <div class="menu_box_tableCell">
                                            <div class="addImg_inner">
                                                <a href="javascript:void(0);"><img src="{{asset('frontend_assets/images/camera_icon.png')}} " alt="#"></a>
                                                <input accept="image/*" data-type="camera" type="file" class="add_upload_picture" name="upload_picture">
                                            </div>
                                        </div>
                                        <div class="menu_box_tableCell">
                                            <div class="addImg_inner">
                                                <a href="javascript:void(0);">
                                                    <img src="{{asset('frontend_assets/images/upload_icon.png')}}" alt="#">
                                                    <input accept="image/*" type="file" class="add_upload_picture" name="upload_picture">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="menu_box_tableCell" >
                                            <div class="addImg_inner">
                                                <a class="ct_write_note_btn" href="javascript:void(0);"><img src="{{asset('frontend_assets/images/write_icon.png')}}" alt="#"></a>
                                            </div>
                                        </div>
                                        <div class="menu_box_tableCell"  style="display: none">
                                            <div class="nextPrev_btns">
                                                <a  style="display: block !important;" class="prev_btn go_to_folder_btn" href="javascript:void(0);"></a>
                                                <a style="display: none" class="next_btn" href="javascript:void(0);"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gallery_list ">
                                    <ul class="ct_gallery_sec">
                                    </ul>
                                </div>
                            </div>
                            <div class="addNote_section" style="display: none;">
                                <div class="addNote_inner">
                                    <div class="contact_form_feild">
                                        <textarea class="note_field"></textarea>
                                    </div>
                                    <div class="addNote_btns">
                                        <ul>
                                            <li>
                                                <div class="addquote_sendBtn">
                                                    <input data-id="" type="submit" class="save_note_button" value="Save">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="addquote_sendBtn">
                                                    <a href="javascript:void(0);" class="cancel_note_btn">Cancel</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--folder section end-->
</div>

</body>
</html>
