
<div width="100%" style="padding: 5px">
    <!--Search-->
    <div class="col-lg-12 doc_admin_tab_2 c_no_padding" id="doc_for_div">
        <div class="col-lg-2 doc_admin_menu_1_fo active cc1"  onclick="change_tab_doc_fo('10')" style="margin-top:10px">
            <p style="color:rgba(255,255,255,1);margin-left:20px;margin-top:12px">Add Doctor</p>
        </div>
        <div class="col-lg-2 doc_admin_menu_2_fo cc1"   onclick="change_tab_doc_fo('11')" style="margin-top:10px">
            <p style="color:rgba(255,255,255,1);margin-left:20px;margin-top:12px">Details Handdle</p>
        </div>
        <div class="col-lg-2 doc_admin_menu_3_fo cc1" onclick="change_tab_doc_fo('12')" style="margin-top:10px">
            <p style="color:rgba(255,255,255,1);margin-left:20px;margin-top:12px">Create Advertisment</p>
        </div>
        <p class="doc_admin_hd_fo" style="margin-bottom: 5px"></p>

        <form action="admin_add_foreign_doc/registers" method="post"  name="foreign_doc_registration">
        <div class="col-lg-12" id="foreign_doc_div_add">
            <div class="col-lg-8" id="main_details">
                <div class="doc_form_group">
                    <span>First Name</span> <span class="c_warning_tips_reg" id="wrn_fo_first_name"><span class="glyphicon glyphicon-asterisk" aria-hidden="false"></span> Enter valid first name</span>
                    <input type="text" class="c_text_box_1" spellcheck="false" name="fo_first_name" onkeydown='only_alph(event.value)' onkeypress="remove_wrn('fo_first_name')"  onchange="remove_wrn('fo_first_name')" autocomplete="off"/>
                </div>
                <div class="doc_form_group">
                    <span>Last Name</span> <span class="c_warning_tips_reg" id="wrn_fo_last_name"><span class="glyphicon glyphicon-asterisk" aria-hidden="false"></span> Enter valid last name</span>
                    <input type="text" class="c_text_box_1" spellcheck="false" name="fo_last_name" onkeydown='only_alph(event.value)' onkeypress="remove_wrn('fo_last_name')"  onchange="remove_wrn('fo_last_name')" autocomplete="off"/>
                </div>
                <div>
                    <div class="col-lg-6 doc_form_group c_no_padding doc_form_left">
                        <span>Date of Birth</span>
                        <input class="c_text_box_1" type="date" name="fo_dob" autocomplete="off" spellcheck="false" />
                    </div>
                    <div class="col-lg-6 doc_form_group c_no_padding doc_form_right">
                        <span>Gender</span><span class="c_warning_tips_reg" id="wrn_gender" style="color:red">
                    select gender</span>
                        <ul style="margin-left: 30px;margin-top: 20px"><li>
                                <input type="radio" name="gender" value="male" class="c_radio_btn" checked><span style="margin-left:10px;margin-top:-5px">Male</span></li>

                            <li><input type="radio" name="gender" value="female" class="c_radio_btn"><span style="margin-left: 10px;margin-top: -5px">Female</span>


                            </li></ul>

                    </div>
                </div>
                <div class="doc_form_group">
                    <span>Prefered Language 1</span> <span class="c_warning_tips_reg" id="wrn_fo_language_1" style="color:red"><span class="glyphicon  glyphicon-asterisk" aria-hidden="false"></span> Enter Prefered language</span>
                    <input type="text" class="c_text_box_1" spellcheck="false" name="fo_language_1" onkeydown='only_alph(event)' onkeypress="remove_wrn('fo_language_1')"  onchange="remove_wrn('fo_language_1')" autocomplete="off"/>
                </div>
                <div class="doc_form_group">
                    <span>Prefered Language 2</span> <span class="c_warning_tips_reg" id="wrn_fo_language_2" style="color:red"><span class="glyphicon  glyphicon-asterisk" aria-hidden="false"></span> Enter preerd language 2</span>
                    <input type="text" class="c_text_box_1" spellcheck="false" name="fo_language_2" onkeydown='only_alph(event)' onkeypress="remove_wrn('fo_language_2')"  onchange="remove_wrn('fo_language_2')" autocomplete="off"/>
                </div>
                <div class="doc_form_group">
                    <span>Prefered Language 3</span> <span class="c_warning_tips_reg" id="wrn_fo_language_3" style="color:red"><span class="glyphicon  glyphicon-asterisk" aria-hidden="false"></span> Enter preerd language 2</span>
                    <input type="text" class="c_text_box_1" spellcheck="false" name="fo_language_3" onkeydown='only_alph(event)' onkeypress="remove_wrn('fo_language_3')"  onchange="remove_wrn('fo_language_3')" autocomplete="off"/>
                </div>
                <div class="doc_form_group">
                    <span>Passport Number</span> <span class="c_warning_tips_reg" id="wrn_fo_passport" style="color:red"><span class="glyphicon  glyphicon-asterisk" aria-hidden="false"></span> Enter valid passport number</span>
                    <input type="text" class="c_text_box_1" spellcheck="false" name="fo_passport"  onkeypress="remove_wrn('fo_passport')"  onchange="remove_wrn('fo_passport')" autocomplete="off" placeholder="Eg:- ABXXXXXXX"/>
                </div>
                <div class="doc_form_group">
                    <span>Country</span> <span class="c_warning_tips_reg" id="wrn_fo_country" style="color:red"><span class="glyphicon  glyphicon-asterisk" aria-hidden="false"></span> Enter Country</span>
                    <input type="text" class="c_text_box_1" spellcheck="false" name="fo_country" onkeydown='only_alph(event)' onkeypress="remove_wrn('fo_country')"  onchange="remove_wrn('fo_country')" autocomplete="off"/>
                </div>

                <div class="doc_form_group">
                    <span>Contact Number</span> <span class="c_warning_tips_reg" id="wrn_fo_contact_number" style="color:red"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> Enter valid contact number</span>
                    <input type="text" class="c_text_box_1" spellcheck="false" name="fo_contact_number" onkeypress="remove_wrn('fo_contact_number')" onchange="remove_wrn('fo_contact_number')" placeholder="Eg:- +9XXX XXX XXXX"/>
                </div>


                <div class="doc_form_group">
                    <span>Email Address</span> <span class="c_warning_tips_reg" id="wrn_fo_email" style="color:red"><span class="glyphicon glyphicon-asterisk " aria-hidden="true"></span> Enter valid Email address</span>
                    <input type="text" class="c_text_box_1" spellcheck="false" name="fo_email" onkeypress="remove_wrn('fo_email')" onchange="remove_wrn('fo_email')" placeholder="Eg:- eayurveda@gmail.com"/>
                </div>

                <div class="doc_form_group">
                    <span>Description</span>
                    <textarea class="c_text_box_1" name="fo_description" cols="3" rows="3"></textarea>
                </div>
                <div class="doc_form_group">
                    <span>Username</span> <span class="c_warning_tips_reg" id="wrn_fo_username" style="color:red"><span class="glyphicon  glyphicon-asterisk" aria-hidden="false"></span> Enter username</span>
                    <input type="text" class="c_text_box_1" spellcheck="false" name="fo_username"  onkeypress="remove_wrn('fo_username')"  onchange="remove_wrn('fo_username')" autocomplete="off"/>
                </div>
                <div class="doc_form_group">
                    <span>Password</span> <span class="c_warning_tips_reg" id="wrn_fo_password" style="color:red"><span class="glyphicon  glyphicon-asterisk" aria-hidden="false"></span> Enter password</span>
                    <input type="text" class="c_text_box_1" spellcheck="false" name="fo_password" onkeypress="remove_wrn('fo_password')"  onchange="remove_wrn('fo_password')" autocomplete="off"/>
                </div>


            </div>
            <div class="col-lg-4" id="visiting_details">

                    <p class="doc_admin_hd_fo_n" style="margin-bottom: 25px">Profile Image</p>
                    <div class="doc_form_group" style="padding: 10px 10px 0px 10px">
                        <div class="doc_profile_thumb"><img src="assets_admin/img/profile_image.png" width="30%" style="margin-left: 35%;margin-top: 29%"></div>
                        <button class="doc_thumb_select_btn">+ image</button>
                    </div>

                <p class="doc_admin_hd_fo_n" id="visiting_para">Visiting Details</p>
                <div class="doc_form_group">
                    <span>Place</span> <span class="c_warning_tips_reg" id="wrn_fo_place" style="color:red"><span class="glyphicon  glyphicon-asterisk" aria-hidden="false"></span> Enter comming place</span>
                    <input type="text" class="c_text_box_1" spellcheck="false" name="fo_place"  onkeypress="remove_wrn('fo_place')"  onchange="remove_wrn('fo_place')" autocomplete="off"/>
                </div>
                <div>
                    <div class="col-lg-12 doc_form_group c_no_padding doc_form_left">
                        <span>Comming Date</span><span class="c_warning_tips_reg" id="wrn_fo_comming_date" style="color:red"><span class="glyphicon  glyphicon-asterisk" aria-hidden="false"></span> Enter comming date</span>

                        <input class="c_text_box_1" type="date" name="fo_comming_date" onkeypress="remove_wrn('fo_comming_date')"  onchange="remove_wrn('fo_comming_date')"autocomplete="off" spellcheck="false"/>
                    </div>

                </div>
                <div class="doc_form_group">
                    <span>Time</span> <span class="c_warning_tips_reg" id="wrn_fo_time" style="color:red"><span class="glyphicon  glyphicon-asterisk" aria-hidden="false"></span> Enter channel time</span>
                    <input type="text" class="c_text_box_1" spellcheck="false" name="fo_time"  onkeypress="remove_wrn('fo_time')"  onchange="remove_wrn('fo_time')" autocomplete="off"/>
                </div>
                <div class="doc_form_group">
                    <span>Charges</span> <span class="c_warning_tips_reg" id="wrn_fo_charges" style="color:red"><span class="glyphicon  glyphicon-asterisk" aria-hidden="false"></span> Enter charges </span>
                    <input type="text" class="c_text_box_1" spellcheck="false" name="fo_charges" onkeydown='isNumberKey(event)' onkeypress="remove_wrn('fo_charges')"  onchange="remove_wrn('fo_charges')" autocomplete="off"/>
                </div>
                <div class="doc_form_group">
                    <span>Number of days stay in Sri Lanka</span> <span class="c_warning_tips_reg" id="wrn_fo_days" style="color:red"><span class="glyphicon  glyphicon-asterisk" aria-hidden="false"></span> Enter numbers of date stay in Sri Lanka </span>
                    <input type="text" class="c_text_box_1" spellcheck="false" name="fo_days" onkeydown='isNumberKey(event)' onkeypress="remove_wrn('fo_days')"  onchange="remove_wrn('fo_days')" autocomplete="off"/>
                </div>

            </div>
            <button type="submit" class="doc_thumb_save_fo" >view data</button>

        </div>
        </form>
        <!-- foreign doc handling-->
        <div class="col-lg-12" id="foreign_doc_div_han" style="display:none">
            <div class="col-lg-12" style="width:884px;height:175px;background-color:rgb(249, 249, 249);margin-bottom:5px">
                <div class="col-lg-6">
                    <ul class="c_ul_1" style="padding-top:10px">
                        <li class="c_add_margin_20" style="margin-bottom:10px">
                            <span class="c_font_2" style="color:#39B54A">Benefits of Details Handling</span>
                        </li>
                        <li>
                            <ul class="c_check_list">
                                <li>Can view foregn doctors details</li>
                                <li>Can update foregn doctors details</li>
                                <li>Can delete foregn doctors details</li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6 filter_foreign_div">
                    <form id="filter_doc_rm" method="get">

                        <div class="col-lg-12 doc_form_group c_no_padding doc_form_right">
                            <table style="margin-top:5px">
                            <tr class="ta_fil_fo"><td><span style="color:white">Doctor ID</span></td><td><input type="text" class="c_text_box_fil_fo" spellcheck="false" name="search_text_f"  autocomplete="off"/></td></tr>
                            <tr class="ta_fil_fo"><td><span style="color:white">Filter by Gender</span></td><td><select class="c_select_box_fil_fo"  name="gender_f" id="reg_genderr" >
                                        <option value="all">all</option>
                                        <option value="male">male</option>
                                        <option value="female">female</option>
                                    </select></td></tr>
                            <tr class="ta_fil_fo"><td><span style="color:white">Filter by Country</span></td><td> <select class="c_select_box_fil_fo"  name="country_f" id="citr" >
                                        <option value=all"">all</option>
                                        <option value="kandy">kandy</option>
                                        <option value="colombo">colombo</option>
                                    </select></td></tr>

                            </table>

                            <button type="button" class="c_advanced_search_btn" onclick="load_doc_foreign_search()"><img src="{{ URL::asset('assets/img/search_ad.png') }}" style="width: 18px;margin-right: 12px;margin-top: -5px">Search</button>


                        </div>
                    </form>

                </div>
            </div>
            <div class="col-lg-12 full_div" id="se">
            <?php
            foreach($doctors_r as $doc){
            ?>
            <div class="col-lg-2" style="width:100px;height:100px;background-color:rgba(0, 255, 21, 0.37);margin-bottom:5px">
                <img src="assets_admin/img/dd.png" style="width:80px;height:100px">

            </div>
            <div class="col-lg-4" style="width:618px;height:100px;background-color:rgba(42, 171, 210, 0.12);margin-bottom:5px">
             <p style="font-size:20px;font-weight:600">Dr.&nbsp; <?php echo $doc->first_name; ?>&nbsp;&nbsp; <?php echo $doc->last_name; ?></p>
             <p style="font-size:15px"> From <?php echo $doc->country; ?> can be contacted on <?php echo $doc->contact_number; ?></p>
             <p style="font-size:12px"> Will Come to <?php echo $doc->place; ?> on  <?php echo $doc->comming_date; ?> at <?php echo $doc->time; ?></p>
            </div>
            <div class="col-lg-4" style="width:150px;height:100px;background-color:rgba(27, 109, 133, 0.25);margin-bottom:5px">
                <button type="button" class="btn_sub_but" style="background:#4dddff;border: 1px solid #4dddff;"><img src="{{ URL::asset('assets/img/user_logo.png') }}" style="width: 18px;margin-right: 12px;margin-top: -5px">View&nbsp;&nbsp;&nbsp;&nbsp;</button>

                <button type="button" class="btn_sub_but" style="background:#5ce872;border: 1px solid #5ce872"><img src="{{ URL::asset('assets/img/doc_user.png') }}" style="width: 18px;margin-right: 12px;margin-top: -5px">Update</button>

                <button type="button" class="btn_sub_but" style="background:#f37a90;border: 1px solid #f37a90;"><img src="{{ URL::asset('assets/img/logout.png') }}" style="width: 18px;margin-right: 12px;margin-top: -5px">Remove</button>


            </div>
            <?php
            }
            ?>
            </div>
        </div>
        <!-- end foreign doc handling-->

        <!-- foreign doc handling-->
        <div class="col-lg-12" id="foreign_doc_div_ads" style="display:none">
            <p>sdaaaaaaaaaaasssdsdsdaaaaaaaaaaaaasdsd</p>
            <div class="col-lg-12" >



            </div>
        </div>
        <!-- end foreign doc handling-->
    </div>



</div>


