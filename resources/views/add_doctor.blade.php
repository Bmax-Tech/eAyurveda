@extends('layout')
@section('content')

<!-- Add Doctor Form -->
<div class="container c_container">
    <div class="col-lg-8" style="padding-top:10px">
        <form action="{{URL::to('adddoctor/save')}}" method="post" onsubmit="return valid_registration()" name="registration">
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
                    <input type="text" class="c_text_box_1" spellcheck="false" name="first_name" onkeydown='only_alph(event)' onkeypress="remove_wrn('first_name')"  onchange="remove_wrn('first_name')" autocomplete="off"/>
                </li>
                <li>
                    <span>Doctor`s Last Name</span><span class="c_warning_tips_reg" id="wrn_last_name"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> enter valid last name</span>
                </li>
                <li class="c_add_margin_20 c_form_margin_10">
                    <input type="text" class="c_text_box_1" spellcheck="false" name="last_name" onkeydown='only_alph(event)' onkeypress="remove_wrn('last_name')" onchange="remove_wrn('last_name')" autocomplete="off"/>
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
                    <input type="text" class="c_text_box_1" spellcheck="false" name="address_1" onkeypress="remove_wrn('address_1')" onchange="remove_wrn('address_1')" autocomplete="off"/>
                </li>
                <li>
                    <span>Address 2</span><span class="c_warning_tips_reg" id="wrn_address_2"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> enter valid Address 2</span>
                </li>
                <li class="c_add_margin_20 c_form_margin_10">
                    <input type="text" class="c_text_box_1" spellcheck="false" name="address_2" onkeypress="remove_wrn('address_2')" onchange="remove_wrn('address_2')" autocomplete="off"/>
                </li>
                <li>
                    <span>City</span><span class="c_warning_tips_reg" id="wrn_city"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> enter valid City</span>
                </li>
                <li class="c_add_margin_20 c_form_margin_10">
                    <input type="text" class="c_text_box_1" spellcheck="false" name="city" onkeypress="remove_wrn('city')" onchange="remove_wrn('city')" autocomplete="off"/>
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
                    <input type="text" class="c_text_box_1" spellcheck="false" name="contact_number" onkeypress="remove_wrn('contact_number')" onchange="remove_wrn('contact_number')" placeholder="Eg:- 07X XXX XXXX"/>
                </li>
                <li>
                    <span>Email Address</span><span class="c_warning_tips_reg" id="wrn_email"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> enter email address</span>
                </li>
                <li class="c_add_margin_20 c_form_margin_10">
                    <input type="text" class="c_text_box_1" spellcheck="false" name="email"  onkeyup="check_reg_existing('email',this.value)" onkeypress="remove_wrn('email')" onchange="remove_wrn('email')" placeholder="Eg:- eayurveda@gmail.com"/>
                </li>
                <li>
                    <span>About Doctor</span><span class="c_warning_tips_reg" id="wrn_doc_description"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> enter about doctor</span>
                </li>
                <li class="c_add_margin_20 c_form_margin_10">
                    <textarea class="c_comment_textarea" id="doc_description" name="doc_description" onkeypress="remove_wrn('doc_description')" onchange="remove_wrn('doc_description')"></textarea>
                </li>
                <li>
                    <button type="button" class="c_sug_form_next_btn" style="float: left" onclick="change_sug_tab('1')"><img src="{{ URL::asset('assets/img/back.png') }}" style="width: 24px;margin-top: -3px;"> Previous</button>

                    <button type="button" class="c_sug_form_next_btn" onclick="change_sug_tab('3')">Next <img src="{{ URL::asset('assets/img/next.png') }}" style="width: 24px;margin-top: -3px;"></button>
                </li>
            </div>
            <div id="c_doc_sug_tab_3_div" style="display: none">
                <li style="margin-top: 20px">
                    <span>Specialized on&nbsp;&nbsp;&nbsp;<span style="font-size: 11px">(Max:10)</span></span><span class="c_warning_tips_reg" id="wrn_spec"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> enter valid specialization</span>
                </li>
                <li class="c_add_margin_20 c_form_margin_10">
                    <div class="col-lg-12 c_no_padding">
                        <div class="col-lg-9 c_no_padding">
                            <?php for($i=1;$i<=10;$i++){ ?>
                            <input type="text" class="c_text_box_1 c_spec_txt" id="spec_doc_<?php echo $i; ?>" <?php if($i>1){ echo 'style="display:none"'; } ?> onkeypress="remove_wrn('spec')" onchange="remove_wrn('spec')" spellcheck="false" name="specialized[]" autocomplete="off" placeholder="Specialization <?php echo $i; ?>"/>
                            <?php } ?>
                        </div>
                        <div class="col-lg-3 c_no_padding" style="padding-left: 50px"><button type="button" onclick="add_more_op()" class="add_op_btn">+</button><input type="text" value="1" name="spec_count" id="spec_count" disabled class="op_count_txt"/><button type="button" onclick="rem_more_op()" class="rem_op_btn">-</button></div>
                    </div>
                </li>
                <li style="margin-top: 20px">
                    <span>Treatment types on&nbsp;&nbsp;&nbsp;<span style="font-size: 11px">(Max:10)</span></span><span class="c_warning_tips_reg" id="wrn_treat"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> enter valid treatment</span>
                </li>
                <li class="c_add_margin_20 c_form_margin_10">
                    <div class="col-lg-12 c_no_padding">
                        <div class="col-lg-9 c_no_padding">
                            <?php for($i=1;$i<=10;$i++){ ?>
                            <input type="text" class="c_text_box_1 c_spec_txt" id="treat_doc_<?php echo $i; ?>" <?php if($i>1){ echo 'style="display:none"'; } ?> onkeypress="remove_wrn('treat')" onchange="remove_wrn('treat')" spellcheck="false" name="treatments[]" autocomplete="off" placeholder="Treatment <?php echo $i; ?>"/>
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
</div>

<!-- Preview Pop Up -->
<div class="container c_pop_up_box_2" style="background: rgba(218, 218, 218, 0.19)" id="c_preview_pop_up">
    <div class="center-block c_pop_box_1_wrapper" style="margin-top: 4.65%;width:70%;max-width: 1056px" id="c_preview_pop_up_inner">
        <div style="background: #DAA100;padding-top: 2px">
            <div class="container c_no_padding" style="max-width: 100%;width: 100%;padding: 0px 15px">
                <div class="col-lg-7 c_no_padding" style="padding-right: 20px">
                    <ul class="c_ul_1" style="margin-bottom: 0px">
                        <li style="margin-top: 15px;margin-bottom:25px">
                           <span class="c_font_2" style="color:#ffffff"><img src="{{ URL::asset('assets/img/visible_icon.png') }}" style="margin-right: 20px;margin-top: -8px">Profile Preview</span>
                        </li>
                        <li>
                            <ul class="c_top_ul" style="color: #FFF">
                                <li style="width: 130px"><span style="font-size: 16px">Name</span></li>
                                <li style="width: 20px">:</li>
                                <li><span id="c_pre_name" style="color: #000">Buwaneka</span></li>
                            </ul>
                        </li>
                        <li style="margin-top: 10px">
                            <ul class="c_top_ul" style="color: #FFF">
                                <li style="width: 130px"><span style="font-size: 16px">Gender</span></li>
                                <li style="width: 20px">:</li>
                                <li><span id="c_pre_gender"  style="color: #000">Male</span></li>
                            </ul>
                        </li>
                        <li style="margin-top: 10px">
                            <ul class="c_top_ul" style="color: #FFF">
                                <li style="width: 130px"><span style="font-size: 16px">Address 1</span></li>
                                <li style="width: 20px">:</li>
                                <li><span id="c_pre_address_1"  style="color: #000">213 sdsdsdsd</span></li>
                            </ul>
                        </li>
                        <li style="margin-top: 10px">
                            <ul class="c_top_ul" style="color: #FFF">
                                <li style="width: 130px"><span style="font-size: 16px">Address 2</span></li>
                                <li style="width: 20px">:</li>
                                <li><span id="c_pre_address_2"  style="color: #000">fdgfdgfdgdg</span></li>
                            </ul>
                        </li>
                        <li style="margin-top: 10px">
                            <ul class="c_top_ul" style="color: #FFF">
                                <li style="width: 130px"><span style="font-size: 16px">City</span></li>
                                <li style="width: 20px">:</li>
                                <li><span id="c_pre_city"  style="color: #000">Colombodsd s</span></li>
                            </ul>
                        </li>
                        <li style="margin-top: 10px">
                            <ul class="c_top_ul" style="color: #FFF">
                                <li style="width: 130px"><span style="font-size: 16px">Contact No</span></li>
                                <li style="width: 20px">:</li>
                                <li><span id="c_pre_contact_no"  style="color: #000">54354353535</span></li>
                            </ul>
                        </li>
                        <li style="margin-top: 10px">
                            <ul class="c_top_ul" style="color: #FFF">
                                <li style="width: 130px"><span style="font-size: 16px">Email Address</span></li>
                                <li style="width: 20px">:</li>
                                <li><span id="c_pre_email"  style="color: #000">fdsfsdf@dd.lk</span></li>
                            </ul>
                        </li>
                        <li style="margin-top: 10px">
                            <table width="100%">
                                <tr style="color: #FFF">
                                    <td style="width: 130px" valign="top"><span style="font-size: 16px">About Doctor</span></td>
                                    <td style="width: 27px" valign="top">&nbsp;:</td>
                                    <td><div id="c_pre_description">About Doctor dsfdsf dsfdsaf dsgfdgfdg dfgfdgg fdgdfg fdsg sfdgsdfg fds gfdghfghfghghbngbg dbgfbngfngfnnhgnhgnhg nhgn ghn fghnjhgn gfhn hnhgnhg fghn g n</div></td>
                                </tr>
                            </table>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-5 c_no_padding" style="padding-left: 10px;padding-top: 10px">
                    <ul class="c_ul_1">
                        <li style="margin-top: 15px;margin-bottom:15px">
                            <span class="c_font_2" style="color:#ffffff;font-size: 24px">Specializations</span>
                        </li>
                        <li>
                            <div class="c_pre_opt" id="c_pre_spec_div">
                                <!-- Load Specializations -->
                            </div>
                        </li>
                        <li style="margin-top: 15px;margin-bottom:15px">
                            <span class="c_font_2" style="color:#ffffff;font-size: 24px">Treatments</span>
                        </li>
                        <li>
                            <div class="c_pre_opt" id="c_pre_treat_div">
                                <!-- Load Treatments -->
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-12 c_no_padding" style="padding-top: 40px;padding-bottom: 15px;padding-left: 26%">
                    <button type="button" class="c_pre_btn" onclick="preview_submit()" style="padding-bottom: 12px;margin-right: 8px"><img src="{{ URL::asset('assets/img/save_icon.png') }}" style="width: 25px;margin-right: 20px;">Submit</button>
                    <button type="button" class="c_pre_btn" onclick="preview_close()" style="padding: 7px 50px"><img src="{{ URL::asset('assets/img/cancel_icon.png') }}" style="width: 35px;margin-right: 20px;">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Preview Pop Up -->

<!-- Add Doctor Form -->

@stop