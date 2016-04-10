@extends('layout')
@section('content')

<div class="container c_container c_no_padding">
    {{--<div class="col-lg-12 " style="margin-bottom:10px;margin-top: 5px;margin-left: 10px">
        <span class="c_font_2" style="color:#39B54A">My Account</span>
    </div>--}}
    <input type="hidden" id="user_account_page" value="YES"/>
    <input type="hidden" id="base_url" value="{{ URL::asset('') }}"/>
    <span id="hidden_star_url" style="display: none">{{ URL::asset('assets/img/star.png') }}</span>
    <span id="hidden_green_star_url" style="display: none">{{ URL::asset('assets/img/star_2.png') }}</span>

    <div class="col-lg-3">
        <div style="margin-bottom:10px;margin-top: 5px;margin-left: 10px">
            <span class="c_font_2" style="color:#39B54A">My Account</span>
        </div>
        <div style="padding: 10px">
            <div class="c_my_ac_pic" style="background-image: url({{ URL::asset('profile_images/user_images/user_profile_img_'.$user_data['id'].'.png') }});height: 180px;width: 100%;background-size: 100%;background-position: center;background-repeat: no-repeat;background-color: rgba(42, 167, 0, 0.36)"></div>
            <div class="c_my_ac_pic" style="font-size: 23px;font-weight: 100">{{ $user_data['first_name'] }}</div>
            <div class="c_my_ac_pic">{{ $user_data['email'] }}</div>
            <div id="c_side_my_ac_panel" style="margin-top: 35px">
                <ul class="c_ul_1">
                    <li>{{--<a href="{{ URL::asset('myaccount/'.$user_data['first_name'] ) }}" style="text-decoration: none">--}}<div class="c_ac_btn_1" onclick="show_tabs('HOME')"><img style="width: 35px;margin-right: 23px" src="{{ URL::asset('assets/img/home_icon.png') }}">Home</div>{{--</a>--}}</li>
                    <li><div class="c_ac_btn_1"><img style="width: 35px;margin-right: 23px" src="{{ URL::asset('assets/img/messages_icon.png') }}">Messages</div></li>
                    <li><a href="{{ URL::asset('/adddoctor') }}" style="text-decoration: none"><div class="c_ac_btn_1"><img style="width: 35px;margin-right: 23px" src="{{ URL::asset('assets/img/add_user_2.png') }}">Add Doctor</div></a></li>
                    <li><div class="c_ac_btn_1" onclick="show_tabs('SET')"><img style="width: 33px;margin-right: 23px" src="{{ URL::asset('assets/img/settings_icon.png') }}" >Settings</div></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-lg-9 c_no_padding" style="padding-left: 10px">
        <div id="c_user_ac_home" >
            <ul class="c_ul_1">
                <li style="padding-top: 10px">
                    <div style="background: #39B54A;padding: 10px 40px;color: #FFF;border-bottom: 3px solid #035600;border-bottom-left-radius: 50px">
                        <span style="font-size: 16px">Recently Posted Comments</span>
                    </div>
                </li>
                <li style="margin-top: 15px;padding: 10px 20px">
                    <div class="c_my_ac_com_view" id="c_user_comments_load">
                        <!-- Load User Recent Posted Comments -->
                    </div>
                </li>
                <li style="padding-top: 20px">
                    <div style="background: #39B54A;padding: 10px 40px;color: #FFF;border-bottom: 3px solid #035600;border-bottom-left-radius: 50px">
                        <span style="font-size: 16px">Recently Viewed Doctors</span>
                    </div>
                </li>
                <li style="margin-top: 15px;padding-left: 55px;padding-top: 10px">
                    <div>
                        <ul class="c_top_ul">
                        <?php for($i=0;$i<5;$i++){ ?>
                            <li>
                            <div class="c_doc_box" <?php if($i!=5){ ?>style="margin-right:10px"<?php } ?>>
                                <ul class="c_ul_1" style="width:140px;font-size: 12px !important;">
                                    <li style="width:100%"><div align="center"><img src="{{ URL::asset('assets/img/doc_user.png') }}" width="30px"></div></li>
                                    <li style="width:100%;margin-top:20px"><div class="c_font_5" style="text-align:center">Dr. Ananada Godagama</div></li>
                                </ul>
                            </div>
                            </li>
                        <?php } ?>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <div id="c_user_ac_update" style="margin-top: 70px;display: none">
           <form action="{{ URL::asset('update_user_profile') }}" onsubmit="return check_update_account()" enctype="multipart/form-data" method="post">
           <div class="col-lg-7 c_no_padding">
                <ul class="c_ul_1">
                    <li>
                        <span>Username</span><span class="c_warning_tips_reg" id="wrn_username"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> enter valid username</span>
                    </li>
                    <li class="c_add_margin_20 c_form_margin_10">
                        <input type="hidden" id="hidden_username" value="{{ $user_data['user_name'] }}">
                        <input type="text" value="{{ $user_data['user_name'] }}" class="c_text_box_1" onkeyup="check_update_existing('username',this.value)" spellcheck="false" name="username" onkeypress="remove_wrn('username')"  onchange="remove_wrn('username')" autocomplete="off"/>
                    </li>
                    <li>
                        <span>First Name</span><span class="c_warning_tips_reg" id="wrn_first_name"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> enter valid first name</span>
                    </li>
                    <li class="c_add_margin_20 c_form_margin_10">
                        <input disabled value="{{ $user_data['first_name'] }}" type="text" class="c_text_box_1" spellcheck="false" name="first_name" onkeydown='only_alph(event)' onkeypress="remove_wrn('first_name')" onchange="remove_wrn('first_name')" autocomplete="off"/>
                    </li>
                    <li>
                        <span>Last Name</span><span class="c_warning_tips_reg" id="wrn_last_name"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> enter valid last name</span>
                    </li>
                    <li class="c_add_margin_20 c_form_margin_10">
                        <input disabled value="{{ $user_data['last_name'] }}" type="text" class="c_text_box_1" spellcheck="false" name="last_name" onkeydown='only_alph(event)' onkeypress="remove_wrn('last_name')" onchange="remove_wrn('last_name')" autocomplete="off"/>
                    </li>
                    <li>
                        <span>Email Address</span><span class="c_warning_tips_reg" id="wrn_email"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> enter valid email address</span>
                    </li>
                    <li class="c_add_margin_20 c_form_margin_10">
                        <input type="hidden" id="hidden_email" value="{{ $user_data['email'] }}">
                        <input value="{{ $user_data['email'] }}" type="text" class="c_text_box_1" onkeyup="check_update_existing('email',this.value)" spellcheck="false" name="email" onkeypress="remove_wrn('email')" onchange="remove_wrn('email')" autocomplete="off"/>
                    </li>
                    <li>
                        <span>Contact Number</span><span class="c_warning_tips_reg" id="wrn_contact_no"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> enter valid contact number</span>
                    </li>
                    <li class="c_add_margin_20 c_form_margin_10">
                        <input value="{{ $user_data['contact_no'] }}" type="text" class="c_text_box_1" spellcheck="false" name="contact_no" onkeypress="remove_wrn('contact_no')" onchange="remove_wrn('contact_no')" autocomplete="off"/>
                    </li>
                    <li style="padding:0px 8px;margin-top:35px">
                        <button type="submit" class="c_button_1">Update</button>
                    </li>
                </ul>
            </div>
            <div class="col-lg-5">
                   <div style="padding: 10px;padding-left: 20px">
                       <div id="profile_thumb" style="background-image: url({{ URL::asset('profile_images/user_images/user_profile_img_'.$user_data['id'].'.png') }});height: 180px;width: 100%;background-size: 100%;background-position: center;background-repeat: no-repeat;background-color: rgba(42, 167, 0, 0.36)">
                       </div>
                       <input class="file_input" type="file" data-id="profile_thumb" data-icon="{{ URL::asset('') }}" id="h_profile_thumb" name="profile_img[]" style="display:none"/>
                       <div><button class="c_img_upload_btn" onclick="get_image('profile_thumb','h_profile_thumb')" type="button">Change Image</button></div>
                   </div>
               </div>
            </form>
        </div>
    </div>
</div>

@stop