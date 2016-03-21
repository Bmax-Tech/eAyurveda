@extends('layout')
@section('content')

<!-- Registration Form -->
<input type="hidden" id="register_page" value="YES"/>
<div class="container c_container">
    <div class="col-lg-6" style="padding-top:10px">
        <form action="{{URL::to('register/save')}}" method="post" onsubmit="return valid_registration()" name="registration">
        <ul class="c_ul_1">
            <li class="c_add_margin_20" style="margin-bottom:30px">
                <span class="c_font_2" style="color:#39B54A">Register</span>
            </li>
            <li>
                <span>First Name</span><span class="c_warning_tips_reg" id="wrn_first_name"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> enter valid first name</span>
            </li>
            <li class="c_add_margin_20 c_form_margin_10">
                <input type="text" class="c_text_box_1" spellcheck="false" name="first_name" onkeydown='only_alph(event)' onkeypress="remove_wrn('first_name')"  onchange="remove_wrn('first_name')" autocomplete="off"/>
            </li>
            <li>
                <span>Last Name</span><span class="c_warning_tips_reg" id="wrn_last_name"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> enter valid last name</span>
            </li>
            <li class="c_add_margin_20 c_form_margin_10">
                <input type="text" class="c_text_box_1" spellcheck="false" name="last_name" onkeydown='only_alph(event)' onkeypress="remove_wrn('last_name')" onchange="remove_wrn('last_name')" autocomplete="off"/>
            </li>
            <li>
                <div class="col-lg-12 c_no_padding">
                    <div class="col-lg-6 c_no_padding" style="padding-right:20px">
                        <ul class="c_ul_1">
                            <li>
                                <span>Gender</span>
                            </li>
                            <li>
                                <ul class="c_top_ul" style="margin-top: 10px;margin-left: 50px">
                                    <li><input type="radio" name="gender" value="male" class="c_radio_btn" checked></li><li><span style="margin-left: 10px;margin-top: -5px">Male</span></li>
                                    <li style="margin-left: 20px"><input type="radio" name="gender" value="female" class="c_radio_btn"></li><li><span style="margin-left: 10px;margin-top: -5px">Female</span></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6 c_no_padding" style="padding-left:20px">
                        <ul class="c_ul_1">
                            <li>
                                <span>Date of Birth</span><span class="c_warning_tips_reg" id="wrn_dob">select date of birth</span>
                            </li>
                            <li class="c_add_margin_20 c_form_margin_10">
                                <input type="text" class="c_text_box_1" id="dob_input_box" spellcheck="false" name="dob" onkeypress="remove_wrn('dob')" onchange="remove_wrn('dob')" placeholder="MM/DD/YYYY" autocomplete="off"/>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
            <li>
                <span>NIC</span><span class="c_warning_tips_reg" id="wrn_nic"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> enter NIC (National Identity Card) number</span>
            </li>
            <li class="c_add_margin_20 c_form_margin_10">
                <input type="text" class="c_text_box_1" spellcheck="false" name="nic" onkeypress="remove_wrn('nic')" onchange="remove_wrn('nic')" placeholder="Eg:- XXXXXXXXXV"/>
            </li>
            <li>
                <span>Contact Number</span><span class="c_warning_tips_reg" id="wrn_contact_number"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> enter contact number</span>
            </li>
            <li class="c_add_margin_20 c_form_margin_10">
                <input type="text" class="c_text_box_1" spellcheck="false" name="contact_number" onkeypress="remove_wrn('contact_number')" onchange="remove_wrn('contact_number')" placeholder="Eg:- 07X XXX XXXX"/>
            </li>
            <li>
                <span>Email Address</span><span class="c_warning_tips_reg" id="wrn_email"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> enter email address</span>
            </li>
            <li class="c_add_margin_20 c_form_margin_10">
                <input type="text" class="c_text_box_1" spellcheck="false" name="email"  onkeyup="check_reg_existing('email',this.value)" onkeypress="remove_wrn('email')" onchange="remove_wrn('email')" placeholder="Eg:- eayurveda@gmail.com"/>
            </li>
            <li>
                <span>Username</span><span class="c_warning_tips_reg" id="wrn_username">enter username</span>
            </li>
            <li class="c_add_margin_20 c_form_margin_10">
                <input type="text" class="c_text_box_1" spellcheck="false" name="username" onkeyup="check_reg_existing('username',this.value)" onkeypress="remove_wrn('username')" onchange="remove_wrn('username')" autocomplete="off"/>
            </li>
            <li>
                <span>Password</span><span class="c_warning_tips_reg" id="wrn_password">enter password</span>
            </li>
            <li class="c_add_margin_20 c_form_margin_10">
                <input type="password" class="c_text_box_1 password_regx" spellcheck="false" name="password" onkeypress="remove_wrn('password')" onchange="remove_wrn('password')" autocomplete="off"/>
            </li>
            <li>
                <span>Confirm Password</span><span class="c_warning_tips_reg" id="wrn_confirm_password">enter valid confirm password</span>
            </li>
            <li class="c_add_margin_20 c_form_margin_10">
                <input type="password" class="c_text_box_1" spellcheck="false" name="confirm_password" onkeypress="remove_wrn('confirm_password')" onchange="remove_wrn('confirm_password')" autocomplete="off"/>
            </li>
            <li style="padding:0px 8px;margin-top:35px">
                <!-- ***** Captcha ****** -->
                <div class="c_captcha_pop_up">
                    <div class="c_captcha_pop_up_in_1">
                        <div class="col-lg-12 c_no_padding" id="c_captcha_pop_up_in_1_head">
                            Select all pictures with <span id="c_select_name">dogs</span><img src="{{ URL::asset('assets/img/refresh.png') }}" onclick="refresh_captcha()" style="float: right;width: 20px;margin-right: 15px;cursor: pointer">
                        </div>
                        <div class="captcha_loading">
                            <img src="{{ URL::asset('assets/img/loading_3.gif') }}">
                            {{--<br/>
                            <span style="font-size: 22px;color: #00B000">Loading</span>--}}
                        </div>
                        <div class="col-lg-12 c_no_padding">
                            <?php
                                $count=1;// this holds number of images for captcha
                                for($i=1;$i<4;$i++){
                            ?>
                                <div class="col-lg-4 c_no_padding cap_img">
                                    <img src="" onclick="click_captcha('<?php echo $count; ?>')" id="cap_img_<?php echo $count; ?>">
                                    <div class="captcha_img_select" id="cap_over_<?php echo $count; ?>" onclick="remove_captcha('<?php echo $count; ?>')"><img src="{{ URL::asset('assets/img/ok_2.png') }}" class="captcha_img_select_in"></div>
                                    <input type="hidden" class="img_h" id="img_<?php echo $count; ?>" value="0"/>
                                </div>
                            <?php
                                    $count++;
                                }
                            ?>
                        </div>
                        <div class="col-lg-12 c_no_padding" style="padding-top: 5px">
                            <?php
                                for($i=1;$i<4;$i++){
                            ?>
                                <div class="col-lg-4 c_no_padding cap_img">
                                    <img src="" onclick="click_captcha('<?php echo $count; ?>')" id="cap_img_<?php echo $count; ?>">
                                    <div class="captcha_img_select" id="cap_over_<?php echo $count; ?>" onclick="remove_captcha('<?php echo $count; ?>')"><img src="{{ URL::asset('assets/img/ok_2.png') }}" class="captcha_img_select_in"></div>
                                    <input type="hidden" class="img_h" id="img_<?php echo $count; ?>" value="0"/>
                                </div>
                            <?php
                                $count++;
                                }
                            ?>
                        </div>
                        <button type="button" id="cpa_verify_btn">Verify</button>
                    </div>
                    <div id="arrow_down"></div>
                </div>
                <div class="c_captcha_box">
                    <div class="c_captcha_box_in_1">
                        <img src="{{ URL::asset('assets/img/robot.png') }}" style="width: 30px;margin-right: 10px">I`m not a robot
                        <img class="cap_v_1" src="{{ URL::asset('assets/img/robot_qa.png') }}" style="width: 30px;float: right"><span class="cap_v_1" style="float: right;margin-right: 10px;color: #ff332f">Verify Me</span>
                        <img class="cap_v_2" src="{{ URL::asset('assets/img/ok_3.png') }}" style="width: 30px;float: right"><span class="cap_v_2" style="float: right;margin-right: 10px;color: #228500">Verified</span>
                    </div>
                </div>
                <!-- ***** Captcha ****** -->
            </li>
            <li style="padding:0px 8px;margin-top:55px">
                <button type="submit" class="c_button_1">Register</button>
            </li>
        </ul>
        <div class="c_password_inputs">
            <div id="in_ps_div_1"></div>
            <div id="in_ps_div_2">
                <ul class="c_ul_1">
                    <li id="in_ps_ch_1"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;Must be at least 8 characters long.</li>
                    <li id="in_ps_ch_2"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;Must contain a lowercase letter.</li>
                    <li id="in_ps_ch_3"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;Must contain an uppercase letter.</li>
                    <li id="in_ps_ch_4"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;Must contain a number or special character.</li>
                </ul>
            </div>
        </div>
        </form>
    </div>
    <div class="col-lg-6">
        <ul class="c_ul_1" style="padding-top:10px">
            <li class="c_add_margin_20" style="margin-bottom:30px">
                <span class="c_font_2" style="color:#39B54A">Benefits after Register</span>
            </li>
            <li>
                <ul class="c_check_list">
                    <li>Ayurvedic Physician Suggestion</li>
                    <li>Physician Rating</li>
                    <li>Comment Posting</li>
                    <li>Access to Community Forum</li>
                    <li>Health Tip Alerts</li>
                    <li>Live Chat</li>
                    <li>Appointment Making</li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- Registration Form -->

<?php
    if(isset($success_reg)){
?>
<script>
    // This function will be using to redirect into a page
    function change_window_location(para_1){
        setTimeout(function(){
            window.location = para_1;
        },3000);
    };

    window.change_window_location("{{ URL::asset('') }}");
</script>

<!-- Thanking Messages -->
<div class="container c_pop_up_box_2" id="c_thanking_msg" style="display: block">
    <div class="center-block c_pop_box_1_wrapper" style="margin-top: 15%;width: 412px">
        <div style="background: #DAA100;height: 145px;padding-top: 32px">

            <div class="container c_no_padding col-lg-12">
                <div class="col-lg-4 c_no_padding" style="float: left;margin-left: 27px"><img src="{{ URL::asset('assets/img/thanking.png') }}" style="width: 80px"></div>
                <div class="col-lg-8 c_no_padding" style="margin-top: -75px;margin-left: 114px">
                    <ul class="c_ul_1">
                        <li><span style="font-size: 27px;font-weight: 100;margin-left: 30px;color: #FFF">Thank you</span></li>
                        <li><span style="font-size: 20px;font-weight: 100;margin-left: 30px;color: #FFF"> for your registering with us</span></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Thanking Messages -->
<?php
}
?>

@stop