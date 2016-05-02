@extends('layout')
@section('content')

<!-- Circular Percentage Bar -->
<link href="{{ URL::asset('assets/circular_bar/css/circle.css') }}" rel="stylesheet">
<!-- Circular Percentage Bar -->

<!-- Add Doctor Form -->
<div class="container c_container">
    <div class="col-lg-8" style="padding-top:10px">
        <form action="{{URL::to('adddoctor/save')}}" id="doctor_add_form" method="post" onsubmit="return valid_registration()" name="registration">
        <ul class="c_ul_1">
            <li class="c_add_margin_20" style="margin-bottom:30px">
                <img src="{{ URL::asset('assets/img/idea.png') }}" style="width: 45px;margin-top: -25px;margin-right: 15px;"><span class="c_font_2" style="color:#39B54A">Suggest Doctor to Community</span>
            </li>
           {{-- <li>
                <ul class="c_top_ul">
                    <li><div class="c_add_doc_top_num">1</div></li>
                    <li><div class="c_add_doc_top_num">2</div></li>
                    <li><div class="c_add_doc_top_num">3</div></li>
                </ul>
            </li>--}}
            <li>
                <ul class="c_top_ul">
                    <li><div class="c_sug_doc_tabs c_sug_doc_tabs_active" id="c_sug_1_tab" onclick="change_sug_tab('1')">Personal Info</div></li>
                    <li><div class="c_sug_doc_tabs" id="c_sug_2_tab" onclick="change_sug_tab('2')">Contact Details</div></li>
                    <li><div class="c_sug_doc_tabs" id="c_sug_3_tab" onclick="change_sug_tab('3')">Treatments & Specializations</div></li>
                </ul>
            </li>
            <div id="c_doc_sug_tab_1_div">
                <li style="margin-top: 20px">
                    <span>Doctor`s First Name</span><span class="c_warning_tips_reg" id="wrn_first_name"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> enter valid first name</span>
                </li>
                <li class="c_add_margin_20 c_form_margin_10">
                    <input type="text" class="c_text_box_1 add_doc" data-id="1" spellcheck="false" name="first_name" onkeydown='only_alph(event)' onkeypress="remove_wrn('first_name')"  onchange="remove_wrn('first_name')" autocomplete="off"/>
                </li>
                <li>
                    <span>Doctor`s Last Name</span><span class="c_warning_tips_reg" id="wrn_last_name"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> enter valid last name</span>
                </li>
                <li class="c_add_margin_20 c_form_margin_10">
                    <input type="text" class="c_text_box_1 add_doc" data-id="2" spellcheck="false" name="last_name" onkeydown='only_alph(event)' onkeypress="remove_wrn('last_name')" onchange="remove_wrn('last_name')" autocomplete="off"/>
                </li>
                <li>
                    <span>Gender</span>
                </li>
                <li>
                    <ul class="c_top_ul" style="margin-top: 5px;margin-left: 50px">
                        <li><input type="radio" name="gender" value="male" class="c_radio_btn" checked></li><li><span style="margin-left: 10px;margin-top: -5px">Male</span></li>
                        <li style="margin-left: 20px"><input type="radio" name="gender" value="female" class="c_radio_btn"></li><li><span style="margin-left: 10px;margin-top: -5px">Female</span></li>
                    </ul>
                </li>
                <li class="c_form_margin_10">
                    <span>Address 1</span><span class="c_warning_tips_reg" id="wrn_address_1"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> enter valid Address 1</span>
                </li>
                <li class="c_add_margin_20 c_form_margin_10">
                    <input type="text" class="c_text_box_1 add_doc"  data-id="3" spellcheck="false" name="address_1" onkeypress="remove_wrn('address_1')" onchange="remove_wrn('address_1')" autocomplete="off"/>
                </li>
                <li>
                    <span>Address 2</span><span class="c_warning_tips_reg" id="wrn_address_2"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> enter valid Address 2</span>
                </li>
                <li class="c_add_margin_20 c_form_margin_10">
                    <input type="text" class="c_text_box_1 add_doc" data-id="4" spellcheck="false" name="address_2" onkeypress="remove_wrn('address_2')" onchange="remove_wrn('address_2')" autocomplete="off"/>
                </li>
                <li>
                    <span>City</span><span class="c_warning_tips_reg" id="wrn_city"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> enter valid City</span>
                </li>
                <li class="c_add_margin_20 c_form_margin_10">
                    <input type="text" class="c_text_box_1 add_doc" data-id="5" spellcheck="false" name="city" onkeypress="remove_wrn('city')" onchange="remove_wrn('city')" autocomplete="off"/>
                </li>
                <li>
                    <span>District</span><span class="c_warning_tips_reg" id="wrn_district"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> select district</span>
                </li>
                <li class="c_add_margin_20 c_form_margin_10">
                    <select class="c_select_box_1" name="district" data-id="6" id="district" onchange="remove_wrn('district')">
                        <option value="select">Select</option>
                        <option value="Ampara">Ampara</option>
                        <option value="Anuradhapura">Anuradhapura</option>
                        <option value="Badulla">Badulla</option>
                        <option value="Batticaloa">Batticaloa</option>
                        <option value="Colombo">Colombo</option>
                        <option value="Galle">Galle</option>
                        <option value="Gampaha">Gampaha</option>
                        <option value="Hambantota">Hambantota</option>
                        <option value="Jaffna">Jaffna</option>
                        <option value="Kalutara">Kalutara</option>
                        <option value="Kandy">Kandy</option>
                        <option value="Kegalle">Kegalle</option>
                        <option value="Kilinochchi">Kilinochchi</option>
                        <option value="Kurunegala">Kurunegala</option>
                        <option value="Mannar">Mannar</option>
                        <option value="Matale">Matale</option>
                        <option value="Matara">Matara</option>
                        <option value="Monaragala">Monaragala</option>
                        <option value="Mullaitivu">Mullaitivu</option>
                        <option value="Nuwara Eliya">Nuwara Eliya</option>
                        <option value="Polonnaruwa">Polonnaruwa</option>
                        <option value="Puttalam">Puttalam</option>
                        <option value="Ratnapura">Ratnapura</option>
                        <option value="Trincomalee">Trincomalee</option>
                        <option value="Vavuniya">Vavuniya</option>
                    </select>
                </li>
                <li>
                    <button type="button" class="c_sug_form_next_btn" onclick="change_sug_tab('2')">Next <img src="{{ URL::asset('assets/img/next.png') }}" style="width: 24px;margin-top: -3px;"></button>
                </li>
            </div>
            <div id="c_doc_sug_tab_2_div" style="display: none">
                <li style="margin-top: 20px">
                    <span>Contact Number</span><span class="c_warning_tips_reg" id="wrn_contact_number"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> enter contact number</span>
                </li>
                <li class="c_add_margin_20 c_form_margin_10">
                    <input type="text" class="c_text_box_1 add_doc" data-id="7" spellcheck="false" name="contact_number" onkeypress="remove_wrn('contact_number')" onchange="remove_wrn('contact_number')" placeholder="Eg:- 07X XXX XXXX"/>
                </li>
                <li>
                    <span>Email Address</span><span class="c_warning_tips_reg" id="wrn_email"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> enter email address</span>
                </li>
                <li class="c_add_margin_20 c_form_margin_10">
                    <input type="text" class="c_text_box_1 add_doc" data-id="8" spellcheck="false" name="email"  onkeyup="check_reg_existing('email',this.value)" onkeypress="remove_wrn('email')" onchange="remove_wrn('email')" placeholder="Eg:- eayurveda@gmail.com"/>
                </li>
                <li>
                    <span>About Doctor</span><span class="c_warning_tips_reg" id="wrn_doc_description"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> enter about doctor</span>
                </li>
                <li class="c_add_margin_20 c_form_margin_10">
                    <textarea class="c_comment_textarea add_doc" data-id="9" id="doc_description" name="doc_description" onkeypress="remove_wrn('doc_description')" onchange="remove_wrn('doc_description')"></textarea>
                </li>
                <li>
                    <button type="button" class="c_sug_form_next_btn" style="float: left" onclick="change_sug_tab('1')"><img src="{{ URL::asset('assets/img/back.png') }}" style="width: 24px;margin-top: -3px;"> Previous</button>

                    <button type="button" class="c_sug_form_next_btn" onclick="change_sug_tab('3')">Next <img src="{{ URL::asset('assets/img/next.png') }}" style="width: 24px;margin-top: -3px;"></button>
                </li>
            </div>
            <div id="c_doc_sug_tab_3_div" style="display: none">
                <li style="margin-top: 20px">
                    <span>Specialized on&nbsp;&nbsp;&nbsp;<span style="font-size: 11px">(Max:5)</span></span><span class="c_warning_tips_reg" id="wrn_spec"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> enter valid specialization(s)</span>
                </li>
                <li class="c_add_margin_20 c_form_margin_10">
                    <div class="col-lg-12 c_no_padding">
                        <div class="col-lg-9 c_no_padding">
                            <?php for($i=1;$i<=5;$i++){ ?>
                            <input type="text" class="c_text_box_1 c_spec_txt add_doc" data-id="10" id="spec_doc_<?php echo $i; ?>" <?php if($i>1){ echo 'style="display:none"'; } ?> onkeypress="remove_wrn('spec')" onchange="remove_wrn('spec')" spellcheck="false" name="specialized[]" autocomplete="off" placeholder="Specialization <?php echo $i; ?>"/>
                            <?php } ?>
                        </div>
                        <div class="col-lg-3 c_no_padding" style="padding-left: 50px"><button type="button" onclick="add_more_op()" class="add_op_btn">+</button><input type="text" value="1" name="spec_count" id="spec_count" disabled class="op_count_txt"/><button type="button" onclick="rem_more_op()" class="rem_op_btn">-</button></div>
                    </div>
                </li>
                <li style="margin-top: 20px">
                    <span>Treatment types on&nbsp;&nbsp;&nbsp;<span style="font-size: 11px">(Max:5)</span></span><span class="c_warning_tips_reg" id="wrn_treat"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> enter valid treatment(s)</span>
                </li>
                <li class="c_add_margin_20 c_form_margin_10">
                    <div class="col-lg-12 c_no_padding">
                        <div class="col-lg-9 c_no_padding">
                            <?php for($i=1;$i<=5;$i++){ ?>
                            <input type="text" class="c_text_box_1 c_spec_txt add_doc" data-id="11" id="treat_doc_<?php echo $i; ?>" <?php if($i>1){ echo 'style="display:none"'; } ?> onkeypress="remove_wrn('treat')" onchange="remove_wrn('treat')" spellcheck="false" name="treatments[]" autocomplete="off" placeholder="Treatment <?php echo $i; ?>"/>
                            <?php } ?>
                        </div>
                        <div class="col-lg-3 c_no_padding" style="padding-left: 50px"><button type="button" onclick="add_more_t_op()" class="add_op_btn">+</button><input type="text" value="1" name="treat_count" id="treat_count" disabled class="op_count_txt"/><button type="button" onclick="rem_more_t_op()" class="rem_op_btn">-</button></div>
                    </div>
                </li>
                <li >
                <div class="col-lg-12 c_no_padding" style="padding-top: 50px">
                    <button type="button" class="c_sug_form_next_btn" style="float: left" onclick="change_sug_tab('2')"><img src="{{ URL::asset('assets/img/back.png') }}" style="width: 24px;margin-top: -3px;"> Previous</button>
                    <button type="button" class="c_sug_form_next_btn" onclick="change_sug_tab('4')">Preview <img src="{{ URL::asset('assets/img/next.png') }}" style="width: 24px;margin-top: -3px;"></button>
                    <input type="submit" style="display: none" id="c_add_doc_sub_btn">
                </div>
                </li>
            </div>
        </ul>
        </form>
    </div>
    <div class="col-lg-4 c_no_padding">
        <div style="padding-left: 66px;width: 100%; margin-top: 180px;">
        <div class="c100 p0 big" id="c_completed_cir">
            <span id="c_completed_cir_am">0%</span>
            <div class="slice">
                <div class="bar"></div>
                <div class="fill"></div>
            </div>
        </div>
        </div>
        <br/>
        <div style="width: 100%;text-align: center;font-size: 26px;color: #39B54A">Completed</div>
    </div>
</div>

<!-- Preview Pop Up -->
<div class="container c_pop_up_box_2" style="background: rgba(0, 0, 0, 0.44);display: none" id="c_preview_pop_up">
    <div class="center-block c_pop_box_1_wrapper" style="padding: 0px;margin-top: 4.65%;width:70%;max-width: 1056px" id="c_preview_pop_up_inner">
        <div style="background: #39B54A">
            <span style="color: #FFF;margin-left: 20px;font-size: 20px" id="user_name_chat_pop_up"><img src="{{ URL::asset('assets/img/visible_icon.png') }}" style="margin-right: 20px;">Profile Preview</span>
            <img src="{{ URL::asset('assets/img/close_chat_btn.png') }}" style="float: right;width: 20px;margin: 15px;cursor: pointer" onclick="preview_close()">
        </div>
        <div style="background: #ffffff;">
            <div class="container c_no_padding" style="max-width: 100%;width: 100%;padding: 0px">
                <div class="col-lg-7 c_no_padding" style="padding: 20px">
                    <ul class="c_ul_1" style="margin-bottom: 0px">
                        <li>
                            <ul class="c_top_ul" style="color: rgba(0, 0, 0, 0.56)">
                                <li style="width: 130px"><span style="font-size: 15px;font-weight: 500">Name</span></li>
                                <li style="width: 20px">:</li>
                                <li><span id="c_pre_name" style="color: #000"></span></li>
                            </ul>
                        </li>
                        <li style="margin-top: 10px">
                            <ul class="c_top_ul" style="color: rgba(0, 0, 0, 0.56)">
                                <li style="width: 130px"><span style="font-size: 15px;font-weight: 500">Gender</span></li>
                                <li style="width: 20px">:</li>
                                <li><span id="c_pre_gender"  style="color: #000"></span></li>
                            </ul>
                        </li>
                        <li style="margin-top: 10px">
                            <ul class="c_top_ul" style="color: rgba(0, 0, 0, 0.56)">
                                <li style="width: 130px"><span style="font-size: 15px;font-weight: 500">Address 1</span></li>
                                <li style="width: 20px">:</li>
                                <li><span id="c_pre_address_1"  style="color: #000"></span></li>
                            </ul>
                        </li>
                        <li style="margin-top: 10px">
                            <ul class="c_top_ul" style="color: rgba(0, 0, 0, 0.56)">
                                <li style="width: 130px"><span style="font-size: 15px;font-weight: 500">Address 2</span></li>
                                <li style="width: 20px">:</li>
                                <li><span id="c_pre_address_2"  style="color: #000"></span></li>
                            </ul>
                        </li>
                        <li style="margin-top: 10px">
                            <ul class="c_top_ul" style="color: rgba(0, 0, 0, 0.56)">
                                <li style="width: 130px"><span style="font-size: 15px;font-weight: 500">City</span></li>
                                <li style="width: 20px">:</li>
                                <li><span id="c_pre_city"  style="color: #000"></span></li>
                            </ul>
                        </li>
                        <li style="margin-top: 10px">
                            <ul class="c_top_ul" style="color: rgba(0, 0, 0, 0.56)">
                                <li style="width: 130px"><span style="font-size: 15px;font-weight: 500">District</span></li>
                                <li style="width: 20px">:</li>
                                <li><span id="c_pre_district"  style="color: #000"></span></li>
                            </ul>
                        </li>
                        <li style="margin-top: 10px">
                            <ul class="c_top_ul" style="color: rgba(0, 0, 0, 0.56)">
                                <li style="width: 130px"><span style="font-size: 15px;font-weight: 500">Contact No</span></li>
                                <li style="width: 20px">:</li>
                                <li><span id="c_pre_contact_no"  style="color: #000"></span></li>
                            </ul>
                        </li>
                        <li style="margin-top: 10px">
                            <ul class="c_top_ul" style="color: rgba(0, 0, 0, 0.56)">
                                <li style="width: 130px"><span style="font-size: 15px;font-weight: 500">Email Address</span></li>
                                <li style="width: 20px">:</li>
                                <li><span id="c_pre_email"  style="color: #000"></span></li>
                            </ul>
                        </li>
                        <li style="margin-top: 10px">
                            <table width="100%">
                                <tr style="color: rgba(0, 0, 0, 0.56)">
                                    <td style="width: 130px" valign="top"><span style="font-size: 15px;font-weight: 500">About Doctor</span></td>
                                    <td style="width: 27px" valign="top">&nbsp;:</td>
                                    <td><div id="c_pre_description"></div></td>
                                </tr>
                            </table>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-5 c_no_padding" style="">
                    <ul class="c_ul_1">
                        <li style="margin-top: 15px;margin-bottom:15px">
                            <span class="c_font_2" style="color:rgba(0, 0, 0, 0.56);font-size: 24px;font-weight: 500">Specializations</span>
                        </li>
                        <li style="padding-right: 20px">
                            <div class="c_pre_opt" id="c_pre_spec_div">
                                <!-- Load Specializations -->
                            </div>
                        </li>
                        <li style="margin-top: 15px;margin-bottom:15px">
                            <span class="c_font_2" style="color:rgba(0, 0, 0, 0.56);font-size: 24px;font-weight: 500">Treatments</span>
                        </li>
                        <li style="padding-right: 20px">
                            <div class="c_pre_opt" id="c_pre_treat_div">
                                <!-- Load Treatments -->
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-12 c_no_padding" style="padding:20px">
                    <div class="col-lg-6 c_no_padding" style="padding: 0px 5px 0px 0px">
                        <button type="button" class="c_pre_btn" onclick="preview_submit()" style="background: #39B54A;padding: 10px 50px;width: 100%"><img src="{{ URL::asset('assets/img/save_icon.png') }}" style="width: 25px;margin-right: 20px;">Submit</button>
                    </div>
                    <div class="col-lg-6 c_no_padding" style="padding: 0px 0px 0px 5px">
                        <button type="button" class="c_pre_btn" onclick="preview_close()" style="background: #393DB5;padding: 6px 50px;width: 100%"><img src="{{ URL::asset('assets/img/cancel_icon.png') }}" style="width: 35px;margin-right: 20px;">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="waiting_confirm" style="padding: 28px 93px;display: none">
        <img style="float: left;width: 55px" src="{{ URL::asset('assets/img/doctor.png') }}"><p style="float: left;font-size: 18px;margin: 10px 25px;">Adding New Doctor</p>
    </div>
    <div class="confirm_success" style="display: none">
        <img style="float: left" src="{{ URL::asset('assets/img/ok_3.png') }}"><p style="float: left;font-size: 18px;margin: 10px 25px;">Successfully Saved</p>
    </div>
</div>
<!-- Preview Pop Up -->

<!-- Add Doctor Form -->

@stop