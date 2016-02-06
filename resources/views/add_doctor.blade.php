@extends('layout')
@section('content')

<!-- Registration Form -->
<div class="container c_container">
    <div class="col-lg-8" style="padding-top:10px">
        <form action="{{URL::to('register/save')}}" method="post" onsubmit="return valid_registration()" name="registration">

        {{--{{ Form::open(array('method'=>'POST','routes'=>'register/save','onsubmit'=>'valid_registration()')) }}--}}
        <ul class="c_ul_1">
            <li class="c_add_margin_20" style="margin-bottom:30px">
                <img src="{{ URL::asset('assets/img/idea.png') }}" style="width: 45px;margin-top: -25px;margin-right: 15px;"><span class="c_font_2" style="color:#39B54A">Suggest Doctor to Community</span>
            </li>
            <li>
                <ul class="c_top_ul">
                    <li><div class="c_sug_doc_tabs c_sug_doc_tabs_active" id="c_sug_1_tab" onclick="change_sug_tab('1')">Personal Info</div></li>
                    <li><div class="c_sug_doc_tabs" id="c_sug_2_tab" onclick="change_sug_tab('2')">Profession Details</div></li>
                    <li><div class="c_sug_doc_tabs" id="c_sug_3_tab" onclick="change_sug_tab('3')">Treatments</div></li>
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
                    <input type="text" class="c_text_box_1" spellcheck="false" name="address_1" onkeydown='only_alph(event)' onkeypress="remove_wrn('address_1')" onchange="remove_wrn('address_1')" autocomplete="off"/>
                </li>
                <li>
                    <span>Address 2</span><span class="c_warning_tips_reg" id="wrn_address_2"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> enter valid Address 2</span>
                </li>
                <li class="c_add_margin_20 c_form_margin_10">
                    <input type="text" class="c_text_box_1" spellcheck="false" name="address_2" onkeydown='only_alph(event)' onkeypress="remove_wrn('address_2')" onchange="remove_wrn('address_2')" autocomplete="off"/>
                </li>
                <li>
                    <span>City</span><span class="c_warning_tips_reg" id="wrn_city"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> enter valid City</span>
                </li>
                <li class="c_add_margin_20 c_form_margin_10">
                    <input type="text" class="c_text_box_1" spellcheck="false" name="city" onkeydown='only_alph(event)' onkeypress="remove_wrn('city')" onchange="remove_wrn('city')" autocomplete="off"/>
                </li>
                <li>
                    <button type="button" class="c_sug_form_next_btn" onclick="change_sug_tab('1')">Next <img src="{{ URL::asset('assets/img/next.png') }}" style="width: 24px;margin-top: -3px;"></button>
                </li>
            </div>
            <div id="c_doc_sug_tab_2_div" style="display: none">
                <li style="margin-top: 20px">
                    <span>Contact Number</span><span class="c_warning_tips_reg" id="wrn_first_name"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> enter valid first name</span>
                </li>
                <li class="c_add_margin_20 c_form_margin_10">
                    <input type="text" class="c_text_box_1" spellcheck="false" name="first_name" onkeydown='only_alph(event)' onkeypress="remove_wrn('first_name')"  onchange="remove_wrn('first_name')" autocomplete="off"/>
                </li>
                <li>
                    <span>Email Address</span><span class="c_warning_tips_reg" id="wrn_last_name"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> enter valid last name</span>
                </li>
                <li class="c_add_margin_20 c_form_margin_10">
                    <input type="text" class="c_text_box_1" spellcheck="false" name="first_name" onkeydown='only_alph(event)' onkeypress="remove_wrn('first_name')"  onchange="remove_wrn('first_name')" autocomplete="off"/>
                </li>
                <li>
                    <span>About Doctor</span><span class="c_warning_tips_reg" id="wrn_last_name"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> enter valid last name</span>
                </li>
                <li class="c_add_margin_20 c_form_margin_10">
                    {{--
                                        <input type="text" class="c_text_box_1" spellcheck="false" name="first_name" onkeydown='only_alph(event)' onkeypress="remove_wrn('first_name')"  onchange="remove_wrn('first_name')" autocomplete="off"/>
                    --}}
                    <textarea class="c_comment_textarea" name="add_doc_description"></textarea>
                </li>
                <li>
                    <button type="button" class="c_sug_form_next_btn" onclick="change_sug_tab('2')">Next <img src="{{ URL::asset('assets/img/next.png') }}" style="width: 24px;margin-top: -3px;"></button>
                </li>
            </div>
            <div id="c_doc_sug_tab_3_div" style="display: none">
                <li style="margin-top: 20px">
                    <span>Specialized on&nbsp;&nbsp;&nbsp;<span style="font-size: 11px">(Max:10)</span></span><span class="c_warning_tips_reg" id="wrn_first_name"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> enter valid first name</span>
                </li>
                <li class="c_add_margin_20 c_form_margin_10">
                    <div class="col-lg-12 c_no_padding">
                        <div class="col-lg-9 c_no_padding">
                            <?php for($i=1;$i<=10;$i++){ ?>
                            <input type="text" class="c_text_box_1 c_spec_txt" id="spec_doc_<?php echo $i; ?>" <?php if($i>1){ echo 'style="display:none"'; } ?> spellcheck="false" name="specialized[]" autocomplete="off" placeholder="Specialization <?php echo $i; ?>"/>
                            <?php } ?>
                        </div>
                        <div class="col-lg-3 c_no_padding" style="padding-left: 50px"><button type="button" onclick="add_more_op()" class="add_op_btn">+</button><input type="text" value="1" name="spec_count" id="spec_count" disabled class="op_count_txt"/><button type="button" onclick="rem_more_op()" class="rem_op_btn">-</button></div>
                    </div>
                </li>
                <li style="margin-top: 20px">
                    <span>Treatment types on&nbsp;&nbsp;&nbsp;<span style="font-size: 11px">(Max:10)</span></span><span class="c_warning_tips_reg" id="wrn_first_name"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> enter valid first name</span>
                </li>
                <li class="c_add_margin_20 c_form_margin_10">
                    <div class="col-lg-12 c_no_padding">
                        <div class="col-lg-9 c_no_padding">
                            <?php for($i=1;$i<=10;$i++){ ?>
                            <input type="text" class="c_text_box_1 c_spec_txt" id="treat_doc_<?php echo $i; ?>" <?php if($i>1){ echo 'style="display:none"'; } ?> spellcheck="false" name="treatments[]" autocomplete="off" placeholder="Treatment <?php echo $i; ?>"/>
                            <?php } ?>
                        </div>
                        <div class="col-lg-3 c_no_padding" style="padding-left: 50px"><button type="button" onclick="add_more_t_op()" class="add_op_btn">+</button><input type="text" value="1" name="treat_count" id="treat_count" disabled class="op_count_txt"/><button type="button" onclick="rem_more_t_op()" class="rem_op_btn">-</button></div>
                    </div>
                </li>
                <li>
                    <span>About Doctor</span><span class="c_warning_tips_reg" id="wrn_last_name"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> enter valid last name</span>
                </li>
                <li class="c_add_margin_20 c_form_margin_10">
                    {{--
                                        <input type="text" class="c_text_box_1" spellcheck="false" name="first_name" onkeydown='only_alph(event)' onkeypress="remove_wrn('first_name')"  onchange="remove_wrn('first_name')" autocomplete="off"/>
                    --}}
                    <textarea class="c_comment_textarea" name="add_doc_description"></textarea>
                </li>
                <li>
                    <button type="button" class="c_sug_form_next_btn" onclick="change_sug_tab('2')">Next <img src="{{ URL::asset('assets/img/next.png') }}" style="width: 24px;margin-top: -3px;"></button>
                </li>
            </div>
        </ul>
        </form>
        {{--{{ Form::close() }}--}}
    </div>
</div>
<!-- Registration Form -->

@stop