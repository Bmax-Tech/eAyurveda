@extends('layout')
@section('content')

<div class="container c_container c_no_padding">
    {{--<div class="col-lg-12 " style="margin-bottom:10px;margin-top: 5px;margin-left: 10px">
        <span class="c_font_2" style="color:#39B54A">My Account</span>
    </div>--}}
    <input type="hidden" id="doctor_account_page" value="YES"/>
    <input type="hidden" id="base_url" value="{{ URL::asset('') }}"/>
    <span id="hidden_star_url" style="display: none">{{ URL::asset('assets/img/star.png') }}</span>
    <span id="hidden_green_star_url" style="display: none">{{ URL::asset('assets/img/star_2.png') }}</span>

    <div class="col-lg-3">
        <div style="margin-bottom:10px;margin-top: 5px;margin-left: 10px">
            <span class="c_font_2" style="color:#39B54A">My Account</span>
        </div>
        <div style="padding: 10px">
            <div class="c_my_ac_pic" style="background-image: url({{ URL::asset($image['image_path']) }});height: 180px;width: 100%;background-size: 100%;background-position: center;background-repeat: no-repeat;background-color: rgba(42, 167, 0, 0.36)"></div>
            <div class="c_my_ac_pic" style="font-size: 23px;font-weight: 100">{{ $doctor['first_name'] }}</div>
            <div class="c_my_ac_pic">{{ $doctor['email'] }}</div>
            <div id="c_side_my_ac_panel" style="margin-top: 35px">
                <ul class="c_ul_1">
                    <li><div class="c_ac_btn_1" onclick="show_tabs('HOME')"><img style="width: 35px;margin-right: 23px" src="{{ URL::asset('assets/img/home_icon.png') }}">Home</div>{{--</a>--}}</li>
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
                        <span style="font-size: 16px">Profile Status</span>
                    </div>
                </li>
                <li style="margin-top: 15px;padding: 10px 20px">
                    <div class="c_my_ac_com_view" style="overflow-y: auto" id="c_user_comments_load">
                        <div class="col-lg-7 c_no_padding">
                            <!-- AREA CHART -->
                            <div class="box box-primary">
                                <div class="box-header with-border" style="margin-bottom: 25px;">
                                    <h4 class="box-title">Views</h4>
                                </div>
                                <div class="box-body">
                                    <div class="chart">
                                        <canvas id="areaChart" style="height:250px"></canvas>
                                    </div>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                        <div class="col-lg-5 c_no_padding">
                            <!-- DONUT CHART -->
                            <div class="box box-danger">
                                <div class="box-header with-border" style="padding-left: 70px;margin-bottom: 25px">
                                    <h4 class="box-title">Ratings</h4>
                                </div>
                                <div class="box-body">
                                    <canvas id="pieChart" style="height:250px"></canvas>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                            <div class="col-lg-12 c_no_padding" style="padding-top: 23px">
                                <table style="font-size: 12px;margin: 0 auto">
                                    <tr>
                                        <td style="background: #3c8dbc">&nbsp;&nbsp;&nbsp;</td>
                                        <td style="padding-left: 5px">1 Star</td>
                                        <td width="10px"></td>
                                        <td style="background: #00c0ef">&nbsp;&nbsp;&nbsp;</td>
                                        <td style="padding-left: 5px">2 Star</td>
                                        <td width="10px"></td>
                                        <td style="background: #f39c12">&nbsp;&nbsp;&nbsp;</td>
                                        <td style="padding-left: 5px">3 Star</td>
                                        <td width="10px"></td>
                                        <td style="background: #00a65a">&nbsp;&nbsp;&nbsp;</td>
                                        <td style="padding-left: 5px">4 Star</td>
                                        <td width="10px"></td>
                                        <td style="background: #f56954">&nbsp;&nbsp;&nbsp;</td>
                                        <td style="padding-left: 5px">5 Star</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </li>
                <li style="padding-top: 20px">
                    <div style="background: #39B54A;padding: 10px 40px;color: #FFF;border-bottom: 3px solid #035600;border-bottom-left-radius: 50px">
                        <span style="font-size: 16px">Commented Posts on You</span>
                    </div>
                </li>
                <li style="margin-top: 15px;padding: 10px 20px">
                    <div class="c_my_ac_com_view" id="c_doctor_comments_load">
                        <!-- Load User Recent Posted Comments -->
                    </div>
                </li>
            </ul>
        </div>
        <div id="c_user_ac_update" style="margin-top: 70px;display: none">
           <form action="{{ URL::asset('update_doctor_account') }}" onsubmit="return check_doctor_account_update()" enctype="multipart/form-data" method="post">
           <div class="col-lg-7 c_no_padding">
                <ul class="c_ul_1">
                    <li style="padding-bottom: 10px;font-size: 17px;font-weight: 500;">
                        <span>Personal Details</span>
                    </li>
                    <li>
                        <div class="col-lg-6 c_no_padding" style="padding-right: 10px">
                            <ul class="c_ul_1">
                                <li>
                                    <span>First Name</span><span class="c_warning_tips_reg" id="wrn_first_name"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> enter valid first name</span>
                                </li>
                                <li class="c_add_margin_20 c_form_margin_10">
                                    <input disabled value="{{ $doctor['first_name'] }}" type="text" class="c_text_box_1" spellcheck="false" name="first_name" onkeydown='only_alph(event)' onkeypress="remove_wrn('first_name')" onchange="remove_wrn('first_name')" autocomplete="off"/>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6 c_no_padding">
                            <ul class="c_ul_1">
                                <li>
                                    <span>Last Name</span><span class="c_warning_tips_reg" id="wrn_last_name"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> enter valid last name</span>
                                </li>
                                <li class="c_add_margin_20 c_form_margin_10">
                                    <input disabled value="{{ $doctor['last_name'] }}" type="text" class="c_text_box_1" spellcheck="false" name="last_name" onkeydown='only_alph(event)' onkeypress="remove_wrn('last_name')" onchange="remove_wrn('last_name')" autocomplete="off"/>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="col-lg-6 c_no_padding" style="padding-right: 10px">
                            <ul class="c_ul_1">
                                <li>
                                    <span>Date of Birth</span><span class="c_warning_tips_reg" id="wrn_dob">select date of birth</span>
                                </li>
                                <li class="c_add_margin_20 c_form_margin_10">
                                    <input type="text" value="{{ $doctor['dob'] }}" class="c_text_box_1" id="dob_input_box" spellcheck="false" name="dob" onkeypress="remove_wrn('dob')" onchange="remove_wrn('dob')" placeholder="MM/DD/YYYY" autocomplete="off"/>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6 c_no_padding">
                            <ul class="c_ul_1">
                                <li>
                                    <span>NIC</span><span class="c_warning_tips_reg" id="wrn_nic"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> enter NIC number</span>
                                </li>
                                <li class="c_add_margin_20 c_form_margin_10">
                                    <input type="text" value="{{ $doctor['nic'] }}" class="c_text_box_1" spellcheck="false" name="nic" onkeypress="remove_wrn('nic')" onchange="remove_wrn('nic')" placeholder="Eg:- XXXXXXXXXV"/>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <span>Address 1</span><span class="c_warning_tips_reg" id="wrn_address_1"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> enter address 1</span>
                    </li>
                    <li class="c_add_margin_20 c_form_margin_10">
                        <input type="text" value="{{ $doctor['address_1'] }}" class="c_text_box_1" spellcheck="false" name="address_1" onkeypress="remove_wrn('address_1')" onchange="remove_wrn('address_1')"/>
                    </li>
                    <li>
                        <span>Address 2</span><span class="c_warning_tips_reg" id="wrn_address_2"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> enter address 2</span>
                    </li>
                    <li class="c_add_margin_20 c_form_margin_10">
                        <input type="text" value="{{ $doctor['address_2'] }}" class="c_text_box_1" spellcheck="false" name="address_2" onkeypress="remove_wrn('address_2')" onchange="remove_wrn('address_2')"/>
                    </li>
                    <li>
                        <div class="col-lg-6 c_no_padding" style="padding-right: 10px">
                            <ul class="c_ul_1">
                                <li>
                                    <span>City</span><span class="c_warning_tips_reg" id="wrn_city"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> enter city</span>
                                </li>
                                <li class="c_add_margin_20 c_form_margin_10">
                                    <input type="text" value="{{ $doctor['city'] }}" class="c_text_box_1" spellcheck="false" name="city" onkeypress="remove_wrn('city')" onchange="remove_wrn('city')"/>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6 c_no_padding">
                            <ul class="c_ul_1">
                                <li>
                                    <span>District</span><span class="c_warning_tips_reg" id="wrn_district"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> select district</span>
                                </li>
                                <li class="c_add_margin_20 c_form_margin_10">
                                    <select class="c_select_box_1" name="district" data-id="6" id="district" onchange="remove_wrn('district')">
                                        <option value="select">Select</option>
                                        <option value="Ampara" <?php if($doctor['district'] == "Ampara"){ echo 'selected'; } ?>>Ampara</option>
                                        <option value="Anuradhapura" <?php if($doctor['district'] == "Anuradhapura"){ echo 'selected'; } ?>>Anuradhapura</option>
                                        <option value="Badulla" <?php if($doctor['district'] == "Badulla"){ echo 'selected'; } ?>>Badulla</option>
                                        <option value="Batticaloa" <?php if($doctor['district'] == "Batticaloa"){ echo 'selected'; } ?>>Batticaloa</option>
                                        <option value="Colombo" <?php if($doctor['district'] == "Colombo"){ echo 'selected'; } ?>>Colombo</option>
                                        <option value="Galle" <?php if($doctor['district'] == "Galle"){ echo 'selected'; } ?>>Galle</option>
                                        <option value="Gampaha" <?php if($doctor['district'] == "Gampaha"){ echo 'selected'; } ?>>Gampaha</option>
                                        <option value="Hambantota" <?php if($doctor['district'] == "Hambantota"){ echo 'selected'; } ?>>Hambantota</option>
                                        <option value="Jaffna" <?php if($doctor['district'] == "Jaffna"){ echo 'selected'; } ?>>Jaffna</option>
                                        <option value="Kalutara" <?php if($doctor['district'] == "Kalutara"){ echo 'selected'; } ?>>Kalutara</option>
                                        <option value="Kandy" <?php if($doctor['district'] == "Kandy"){ echo 'selected'; } ?>>Kandy</option>
                                        <option value="Kegalle" <?php if($doctor['district'] == "Kegalle"){ echo 'selected'; } ?>>Kegalle</option>
                                        <option value="Kilinochchi" <?php if($doctor['district'] == "Kilinochchi"){ echo 'selected'; } ?>>Kilinochchi</option>
                                        <option value="Kurunegala" <?php if($doctor['district'] == "Kurunegala"){ echo 'selected'; } ?>>Kurunegala</option>
                                        <option value="Mannar" <?php if($doctor['district'] == "Mannar"){ echo 'selected'; } ?>>Mannar</option>
                                        <option value="Matale" <?php if($doctor['district'] == "Matale"){ echo 'selected'; } ?>>Matale</option>
                                        <option value="Matara" <?php if($doctor['district'] == "Matara"){ echo 'selected'; } ?>>Matara</option>
                                        <option value="Monaragala" <?php if($doctor['district'] == "Monaragala"){ echo 'selected'; } ?>>Monaragala</option>
                                        <option value="Mullaitivu" <?php if($doctor['district'] == "Mullaitivu"){ echo 'selected'; } ?>>Mullaitivu</option>
                                        <option value="Nuwara Eliya" <?php if($doctor['district'] == "Nuwara Eliya"){ echo 'selected'; } ?>>Nuwara Eliya</option>
                                        <option value="Polonnaruwa" <?php if($doctor['district'] == "Polonnaruwa"){ echo 'selected'; } ?>>Polonnaruwa</option>
                                        <option value="Puttalam" <?php if($doctor['district'] == "Puttalam"){ echo 'selected'; } ?>>Puttalam</option>
                                        <option value="Ratnapura" <?php if($doctor['district'] == "Ratnapura"){ echo 'selected'; } ?>>Ratnapura</option>
                                        <option value="Trincomalee" <?php if($doctor['district'] == "Trincomalee"){ echo 'selected'; } ?>>Trincomalee</option>
                                        <option value="Vavuniya" <?php if($doctor['district'] == "Vavuniya"){ echo 'selected'; } ?>>Vavuniya</option>
                                    </select>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <div class="col-lg-12" style="margin-bottom: 25px;border-top: 2px solid #228500;margin-top: 10px;"></div>
                    </li>
                    <li style="padding-bottom: 10px;font-size: 17px;font-weight: 500;">
                        <span>Geo Location Coordinates</span>
                        <span><img src="{{ URL::asset('assets/img/map_icon.png') }}" id="c_map_pick_icon"></span>
                        <span style="font-size: 11px;font-weight: 400">(click here to pick longitude & latitude)</span>
                    </li>
                    <li>
                        <div class="col-lg-6 c_no_padding" style="padding-right: 10px">
                            <ul class="c_ul_1">
                                <li>
                                    <span>Longitude</span><span class="c_warning_tips_reg" id="wrn_longitude"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> enter longitude</span>
                                </li>
                                <li class="c_add_margin_20 c_form_margin_10">
                                    <input readonly type="text" value="{{ $doctor['longitude'] }}" class="c_text_box_1" spellcheck="false" name="longitude" onkeypress="remove_wrn('longitude')" onchange="remove_wrn('longitude')" />
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6 c_no_padding">
                            <ul class="c_ul_1">
                                <li>
                                    <span>Latitude</span><span class="c_warning_tips_reg" id="wrn_latitude"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> enter latitude</span>
                                </li>
                                <li class="c_add_margin_20 c_form_margin_10">
                                    <input readonly type="text" value="{{ $doctor['latitude'] }}" class="c_text_box_1" spellcheck="false" name="latitude" onkeypress="remove_wrn('latitude')" onchange="remove_wrn('latitude')" />
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <div class="col-lg-12" style="margin-bottom: 25px;border-top: 2px solid #228500;margin-top: 10px;"></div>
                    </li>
                    <li style="padding-bottom: 10px;font-size: 17px;font-weight: 500;">
                        <span>Contact Details</span>
                    </li>
                    <li>
                        <span>Contact Number</span><span class="c_warning_tips_reg" id="wrn_contact_no"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> enter valid contact number</span>
                    </li>
                    <li class="c_add_margin_20 c_form_margin_10">
                        <input value="{{ $doctor['contact_number'] }}" type="text" class="c_text_box_1" spellcheck="false" name="contact_no" onkeypress="remove_wrn('contact_no')" onchange="remove_wrn('contact_no')" autocomplete="off"/>
                    </li>
                    <li>
                        <span>Email Address</span><span class="c_warning_tips_reg" id="wrn_email"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> enter valid email address</span>
                    </li>
                    <li class="c_add_margin_20 c_form_margin_10">
                        <input type="hidden" id="hidden_email" value="{{ $doctor['email'] }}">
                        <input value="{{ $doctor['email'] }}" type="text" class="c_text_box_1" onkeyup="check_update_doc_acount_existing('email',this.value)" spellcheck="false" name="email" onkeypress="remove_wrn('email')" onchange="remove_wrn('email')" autocomplete="off"/>
                    </li>

                    <li>
                        <div class="col-lg-12" style="margin-bottom: 25px;border-top: 2px solid #228500;margin-top: 10px;"></div>
                    </li>
                    <li>
                        <span style="font-weight: 500;font-size: 17px">About Profile</span><span class="c_warning_tips_reg" id="wrn_doc_description"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> enter about profile</span>
                    </li>
                    <li class="c_add_margin_20 c_form_margin_10">
                        <textarea class="c_comment_textarea add_doc" data-id="9" id="doc_description" name="doc_description" onkeypress="remove_wrn('doc_description')" onchange="remove_wrn('doc_description')">{{ $doctor['description'] }}</textarea>
                    </li>
                    <li style="padding:0px 8px;margin-top:35px">
                        <button type="submit" class="c_button_1">Update</button>
                    </li>
                </ul>
            </div>
            <div class="col-lg-5">
                <ul class="c_ul_1">
                    <li>
                        <div style="padding: 10px;padding-left: 20px">
                            <div id="profile_thumb" style="background-image: url({{ URL::asset($image['image_path']) }});height: 180px;width: 100%;background-size: 100%;background-position: center;background-repeat: no-repeat;background-color: rgba(42, 167, 0, 0.36)">
                            </div>
                            <input class="file_input" type="file" data-id="profile_thumb" data-icon="{{ URL::asset('') }}" id="h_profile_thumb" name="profile_img[]" style="display:none" accept="image/x-png, image/gif, image/jpeg"/>
                            <div><button class="c_img_upload_btn" onclick="get_image('profile_thumb','h_profile_thumb')" type="button">Change Image</button></div>
                        </div>
                    </li>
                    <li>
                        <div style="padding-left: 20px;padding-bottom: 100px">
                            <ul class="c_ul_1">
                                <li style="margin-top: 20px">
                                    <div class="col-lg-12 c_no_padding" style="margin: 0px 0px 10px 0px"><span style="font-weight: 500">Specialized on&nbsp;&nbsp;&nbsp;<span style="font-size: 11px">(Max:5)</span></span><span class="c_warning_tips_reg" id="wrn_spec"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span></span></div>
                                </li>
                                <li class="c_add_margin_20 c_form_margin_10">
                                    <div class="col-lg-12 c_no_padding">
                                        <div class="col-lg-10 c_no_padding">
                                            <?php
                                                $spec_c=0;
                                                for($i=1;$i<=5;$i++){
                                            ?>
                                            <input type="text" class="c_text_box_1 c_spec_txt add_doc" value="{{ $spec['spec_'.$i] }}" data-id="10" id="spec_doc_<?php echo $i; ?>" <?php if($spec['spec_'.$i] == ""){ echo 'style="display:none"'; }else{ $spec_c++; } ?> onkeypress="remove_wrn('spec')" onchange="remove_wrn('spec')" spellcheck="false" name="specialized[]" autocomplete="off" placeholder="Specialization <?php echo $i; ?>"/>
                                            <?php } ?>
                                        </div>
                                        <div class="col-lg-2 c_no_padding" style="padding-left: 12px"><button type="button" onclick="add_more_op_doc()" class="add_op_btn" style="padding: 1px">+</button><input type="text" value="<?php if($spec_c > 0){ echo $spec_c; }else{ echo "1"; } ?>" name="spec_count" id="spec_count" style="width: 30px" disabled class="op_count_txt"/><button type="button" onclick="rem_more_op_doc()" class="rem_op_btn" style="padding: 1px">-</button></div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div style="padding-left: 20px">
                            <ul class="c_ul_1">
                                <li style="margin-top: 20px">
                                    <div class="col-lg-12 c_no_padding" style="margin: 10px 0px 10px 0px"><span style="font-weight: 500">Treatment types on&nbsp;&nbsp;&nbsp;<span style="font-size: 11px">(Max:5)</span></span><span class="c_warning_tips_reg" id="wrn_treat"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span></span></div>
                                </li>
                                <li class="c_add_margin_20 c_form_margin_10">
                                    <div class="col-lg-12 c_no_padding">
                                        <div class="col-lg-10 c_no_padding">
                                            <?php
                                                $treat_c=0;
                                                for($i=1;$i<=5;$i++){
                                            ?>
                                            <input type="text" class="c_text_box_1 c_spec_txt add_doc" value="{{ $treat['treat_'.$i] }}" data-id="11" id="treat_doc_<?php echo $i; ?>" <?php if($treat['treat_'.$i] == ""){ echo 'style="display:none"'; }else{ $treat_c++; } ?> onkeypress="remove_wrn('treat')" onchange="remove_wrn('treat')" spellcheck="false" name="treatments[]" autocomplete="off" placeholder="Treatment <?php echo $i; ?>"/>
                                            <?php } ?>
                                        </div>
                                        <div class="col-lg-2 c_no_padding" style="padding-left: 12px"><button type="button" onclick="add_more_t_op_doc()" class="add_op_btn" style="padding: 1px">+</button><input type="text" value="<?php if($treat_c > 0){ echo $treat_c; }else{ echo "1"; } ?>" name="treat_count" id="treat_count" style="width: 30px" disabled class="op_count_txt"/><button type="button" onclick="rem_more_t_op_doc()" class="rem_op_btn" style="padding: 1px">-</button></div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div style="padding-left: 20px">
                            <ul class="c_ul_1">
                                <li style="margin-top: 20px">
                                    <div class="col-lg-12 c_no_padding" style="margin: 10px 0px 10px 0px"><span style="font-weight: 500">Consultation Times&nbsp;&nbsp;&nbsp;<span style="font-size: 11px">(Max:3)</span></span><span class="c_warning_tips_reg" id="wrn_consult"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span></span></div>
                                </li>
                                <li class="c_add_margin_20 c_form_margin_10">
                                    <div class="col-lg-12 c_no_padding">
                                        <div class="col-lg-10 c_no_padding">
                                            <?php
                                                $cons_c=0;
                                                for($i=1;$i<=3;$i++){
                                            ?>
                                            <input type="text" class="c_text_box_1 c_spec_txt add_doc" value="<?php if($consult['time_'.$i] != "-" || $consult['time_'.$i] != ""){ echo $consult['time_'.$i]; } ?>" data-id="11" id="consult_time_doc_<?php echo $i; ?>" <?php if(($consult['time_'.$i] == "-" || $consult['time_'.$i] == "") && $i>1){ echo 'style="display:none"'; }else{ $cons_c++; } ?> onkeypress="remove_wrn('consult')" onchange="remove_wrn('consult')" spellcheck="false" name="consult_times[]" autocomplete="off" placeholder="01:30 PM to 03:30 PM"/>
                                            <?php } ?>
                                        </div>
                                        <div class="col-lg-2 c_no_padding" style="padding-left: 12px"><button type="button" onclick="add_more_cons_op()" class="add_op_btn" style="padding: 1px">+</button><input type="text" value="<?php if($cons_c > 0){ echo $cons_c; }else{ echo "1"; } ?>" name="cons_time_count" id="cons_time_count" style="width: 30px" disabled class="op_count_txt"/><button type="button" onclick="rem_more_cons_op()" class="rem_op_btn" style="padding: 1px">-</button></div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
            </form>
        </div>
    </div>
</div>


<!-- Google Map Longitude & Latitude Picker Pop Up -->

<div class="container c_pop_up_box_map_picker" style="background: rgba(105, 105, 105, 0.419608)">
    <div class="center-block c_pop_box_1_wrapper" style="width: 550px;margin-top: 4.1%">
        <button class="c_close_btn map_picker_btn_close" style="margin-left: 520px;z-index: 1"><img src="{{ URL::asset('assets/img/close_btn.png') }}"></button>
        <div class="c_map_picker_box" style="width: 100%;height: 538px;padding:2px">
            <ul class="c_ul_1">
                <li style="margin-bottom: 8px;padding-left: 10px">
                    <span class="c_font_2"><img  src="{{ URL::asset('assets/img/map_icon_2.png') }}" style="width: 40px;margin-right: 20px">Location Picker</span>
                </li>
                <li style="margin-bottom: 8px;padding-left: 5px">
                    <span style="color: #FFF;font-size: 12px;font-weight: 300;">drag and drop map pin which you want to set as your location</span>
                </li>
                <li>
                <div class="col-lg-12 c_no_padding"  id="doc-acc-map-canvas" style="border-radius: 0px">
                    <!-- Load Google Map -->
                </div>
                </li>
                <li>
                <div><button id="pick" class="c_confirm_loc_btn"><img src="{{ URL::asset('assets/img/confirm_icon.png') }}" style="width: 20px;margin-right: 15px">Confirm Location</button></div>
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- Google Map Longitude & Latitude Picker Pop Up -->

@stop