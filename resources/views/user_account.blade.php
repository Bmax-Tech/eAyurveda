@extends('layout')
@section('content')

<div class="container c_container c_no_padding">
    {{--<div class="col-lg-12 " style="margin-bottom:10px;margin-top: 5px;margin-left: 10px">
        <span class="c_font_2" style="color:#39B54A">My Account</span>
    </div>--}}
    <div class="col-lg-3">
        <div style="margin-bottom:10px;margin-top: 5px;margin-left: 10px">
            <span class="c_font_2" style="color:#39B54A">My Account</span>
        </div>
        <div style="padding: 10px">
            <div style="background-image: url({{ URL::asset('profile_images/user_images/user_profile_img_13.jpg') }});height: 180px;width: 100%;background-size: 100%;background-position: center;background-repeat: no-repeat;background-color: rgba(42, 167, 0, 0.36)">
        </div>
        <div style="font-size: 23px;font-weight: 100">{{ $user_name }}</div>
        <div>buwanekab@gmail.com</div>
        <div style="margin-top: 35px">
            <ul class="c_ul_1">
                <li><div class="c_ac_btn_1"><img style="width: 35px;margin-right: 23px" src="{{ URL::asset('assets/img/messages_icon.png') }}">Messages</div></li>
                <li><a href="{{ URL::asset('/adddoctor') }}" style="text-decoration: none"><div class="c_ac_btn_1"><img style="width: 35px;margin-right: 23px" src="{{ URL::asset('assets/img/add_user_2.png') }}">Add Doctor</div></a></li>
                <li><div class="c_ac_btn_1"><img style="width: 33px;margin-right: 23px" src="{{ URL::asset('assets/img/settings_icon.png') }}">Settings</div></li>
            </ul>
        </div>
    </div>
    </div>
    <div class="col-lg-9 c_no_padding" style="padding-left: 10px">
        <ul class="c_ul_1">
            <li style="padding-top: 10px">
                <div style="background: #C39000;padding: 10px 40px;color: #FFF;border-bottom-left-radius: 20px;border-top-left-radius: 20px;">
                    <span style="font-size: 16px">Recently Posted Comments</span>
                </div>
            </li>
            <li style="margin-top: 15px;padding: 10px 20px">
                <div class="c_my_ac_com_view">
                    <?php for($i=0;$i<6;$i++){ ?>
                    <div class="col-lg-12 c_no_padding" style="padding: 20px">
                            <div class="c_comment_body" style="padding: 5px">
                                <div class="c_my_ac_doc_img" style="background-image:url({{ URL::asset('profile_images/user_images/user_profile_img_14.jpg') }})"></div>
                                <ul class="c_ul_1" style="margin-bottom: 0px;margin-left: 50px">
                                    <li style="height: 25px">
                                        <div class="col-lg-4 c_no_padding">
                                            <img src="{{ URL::asset('assets/img/star_2.png') }}" class="c_sm_star">
                                        </div>
                                     </li>
                                    <li style="padding-top: 5px">dfgdfgdg</li>
                                    <li style="padding-top: 10px;font-size: 13px;color: rgb(0, 109, 22)">
                                        <ul class="c_top_ul">
                                            <li>by : bb&nbsp;bb</li>
                                            <li style="margin-left: 40px">Posted Date - 4543543</li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                    </div>
                    <?php } ?>
                </div>
            </li>
            <li style="padding-top: 20px">
                <div style="background: #C39000;padding: 10px 40px;color: #FFF;border-bottom-left-radius: 20px;border-top-left-radius: 20px;">
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
</div>

@stop