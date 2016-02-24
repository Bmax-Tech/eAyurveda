@extends('layout')
@section('content')

<!-- Registration Form -->
<div class="container c_container">
    <div class="col-lg-6" style="padding-top:10px">
        <form action="{{URL::to('register/save')}}" method="post" onsubmit="return valid_registration()" name="registration">

        {{--{{ Form::open(array('method'=>'POST','routes'=>'register/save','onsubmit'=>'valid_registration()')) }}--}}
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
                            {{--<li>
                                <span>Gender</span><span class="c_warning_tips_reg" id="wrn_gender">select gender</span>
                            </li>
                            <li class="c_add_margin_20 c_form_margin_10">
                                <select class="c_select_box_1" name="gender" id="reg_gender" onchange="remove_wrn('gender')">
                                    <option value="select">Select</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </li>--}}
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
                <input type="password" class="c_text_box_1" spellcheck="false" name="password" onkeypress="remove_wrn('password')" onchange="remove_wrn('password')" autocomplete="off"/>
            </li>
            <li>
                <span>Confirm Password</span><span class="c_warning_tips_reg" id="wrn_confirm_password">enter valid confirm password</span>
            </li>
            <li class="c_add_margin_20 c_form_margin_10">
                <input type="password" class="c_text_box_1" spellcheck="false" name="confirm_password" onkeypress="remove_wrn('confirm_password')" onchange="remove_wrn('confirm_password')" autocomplete="off"/>
            </li>
            <li style="padding:0px 8px;margin-top:55px">
                <button type="submit" class="c_button_1">Register</button>
            </li>
        </ul>
        </form>
        {{--{{ Form::close() }}--}}
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
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- Registration Form -->

@stop