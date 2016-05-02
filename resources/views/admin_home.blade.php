<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Native Phyisician Rating System</title>
    <link rel="shortcut icon" type="image/png" href="assets/img/logo_ico.png"/>
    <!-- Style Sheets -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet">
    <link href="assets_admin/css/spe_pro_admin_css.css" rel="stylesheet">

    <!-- Theme style -->
    <link rel="stylesheet" href="assets_admin/DashBoard/css/AdminLTE.min.css">
    <!-- Morris charts -->
    <link rel="stylesheet" href="assets_admin/plugins/morris/morris.css">
    <!-- Style Sheets End -->
</head>

<body class="c_body">

<!-- Admin Top Nav -->
<div class="container c_container c_no_padding" style="border-bottom:2px solid #0F7400">

    <div class="col-lg-12 c_no_padding">
        <div class="col-lg-9">
            <img src="assets_admin/img/logo.png" class="c_logo">
            <span style="color:#01A200;font-size:18px">Admin Panel</span>
        </div>
        <?php
            $admin_user = json_decode($_COOKIE['admin_user'],true);
        ?>
        <div class="col-lg-3 c_no_padding">
            <div class="c_admin_top_user">
                <ul class="c_top_ul">
                    <li style="margin-right:25px" >
                        <a class="c_href" onmouseover="showhover()" onmouseout="hidehover()" onclick="showpop()">
                            <img class="c_user_top_logo" src="assets_admin/img/user_logo.png" >
                            <span><?php echo $admin_user[0]['first_name']; ?></span>
                        </a>
                        <div id="edithover"style="display: none;background-color:#7fff7e;width:80px;padding:5px;height:30px;position:fixed;margin-top:-4px;margin-left: 34px;z-index:999990;">
                           <p style ="color: white"> Edit Profile<p>
                         </div>
                    </li>
                    <li>
                        <img class="c_user_top_logo" src="assets_admin/img/signout.png" style="width:33px">
                        <span style="color:#FFFFFF"><a class="c_href" href="admin_logout" id="sign_in_up_btn">Sign Out</a></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</div>
<div class="container c_container c_no_padding">
    <input type="hidden" id="base_url_admin" value="{{ URL::asset('') }}"/>
    <div class="col-lg-3 c_no_padding c_admin_left_nav">
        <ul class="c_ul_1 c_admin_ul">
            <li id="admin_left_nav_dashboard_btn" onclick="load_dashboard()">
                <ul class="c_top_ul">
                    <li>
                        <img src="assets_admin/img/dashboard.png" style="width:20px">
                    </li>
                    <li style="margin-left:10px">
                        Dashboard
                    </li>
                </ul>
            </li>
            <li id="admin_left_nav_chat_btn" onclick="load_chat()">
                <ul class="c_top_ul">
                    <li>
                        <img src="assets_admin/img/chat.png" style="width:20px">
                    </li>
                    <li style="margin-left:10px">
                        Chat
                    </li>
                </ul>
            </li>
            <li id="admin_left_nav_doc_btn">
                <ul class="c_top_ul">
                    <li>
                        <img src="assets_admin/img/doc_user.png" style="width:20px">
                    </li>
                    <li style="margin-left:10px">
                        <span class="glyphicon glyphicon-menu-right c_right_gly" id="c_admin_span_1" style="margin-right: -135px" aria-hidden="true"></span>
                        Doctor
                    </li>
                </ul>
            </li>
            <li id="admin_left_nav_doc" style="display:none;padding:0px">
                <ul class="c_admin_ul_in">
                    <li class="c_admin_ul_li " style="padding-top: 20px"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Add Physician</li>
                    <li class="c_admin_ul_li"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Update Physician</li>
                    <li class="c_admin_ul_li"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Remove Physician</li>
                    <li class="c_admin_ul_li" onClick="load_doc_page('4')" style="padding-bottom: 20px"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Confirm Physician</li>
                </ul>
            </li>
            <li id="admin_left_nav_pat_btn"><ul class="c_top_ul"><li><img src="assets_admin/img/community_sm.png" style="width:20px"></li><li style="margin-left:10px">
                        <span class="glyphicon glyphicon-menu-right c_right_gly" id="c_admin_span_2" aria-hidden="true" style="margin-left:140px"></span>
                        User
                    </li></ul>
			</li>
            <li id="admin_left_nav_pat" style="display:none;padding:0px">
                <ul class="c_admin_ul_in">
                    <li class="c_admin_ul_li" onClick="load_users_via_ajax()"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>View Users</li>
                    <li class="c_admin_ul_li" onClick="load_comments_via_ajax()"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>User Comments</li>
                    <li class="c_admin_ul_li" onClick="blockedUsers()"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Blocked Users</li>

                    <?php if(  $admin_user[0]['mode'] == 2) {?>
                    <li class="c_admin_ul_li" onClick="admin_reg_via_ajax()"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Admin Registration</li>
                    <li class="c_admin_ul_li" onClick="admin_load_via_ajax()"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Admin Account settings</li>
                   <?php } ?>
                </ul>
            </li>
            <li id="admin_left_nav_for_btn"><ul class="c_top_ul"><li><img src="assets_admin/img/forum_admin_icon.png" style="width:20px"></li><li style="margin-left:10px">
                        <span class="glyphicon glyphicon-menu-right c_right_gly" id="c_admin_span_3" style="margin-right: -142px" aria-hidden="true"></span>
                        Forum
                    </li></ul></li>
            <li id="admin_left_nav_for" style="display:none;padding:0px">
                <ul class="c_admin_ul_in">
                    <li class="c_admin_ul_li" onClick="load_for_page('10.blade')"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Questions</li>
                    <li class="c_admin_ul_li" onClick="load_for_page('11.blade')"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Categories</li>
                    <li class="c_admin_ul_li" onClick="load_for_page('12.blade')"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Flagged Answers</li>
                    <li class="c_admin_ul_li" onClick="load_for_page('14.blade')"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Flagged Questions</li>
                    <li class="c_admin_ul_li" onClick="load_for_page('13.blade')"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Newsletter</li>
                </ul>
            </li>
			<li id="admin_left_nav_cus_btn"><ul class="c_top_ul"><li><img src="assets_admin/img/customize.png" style="width:20px"></li><li style="margin-left:10px">
                        <span class="glyphicon glyphicon-menu-right c_right_gly1" id="c_admin_span_4" aria-hidden="true"></span>
                       Customize Home
                    </li></ul></li>
            <li id="admin_left_nav_cus" style="display:none;padding:0px">
                <ul class="c_admin_ul_in">
                    <li class="c_admin_ul_li" onClick="load_cos_page1_via_ajax()"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Manage Featured Doctors</li>
                    <li class="c_admin_ul_li" onClick="tip_update_via_ajax()"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span> Manage Health tips</li>
                    <li class="c_admin_ul_li" onClick="therapyLoad()"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span> Manage Therapies</li>
                </ul>
            
      
            </li>
			
        </ul>
    </div>
    <div class="col-lg-9 c_no_padding" id="admin_home_div">
        <!-- Ajax Home Load Here -->

        </div>
    </div>
</div>

<!-- Admin Top Nav -->

<!-- Admin Footer -->
<div class="container c_no_padding" style="border-top:2px solid #0F7400">
    <div class="col-lg-12 c_no_padding" id="c_footer">
        <div class="col-lg-2 c_no_padding">
            <img src="assets/img/logo.png" width="50px">
        </div>
        <div class="col-lg-8" style="color:#FFFFFF;font-size:12px;margin-top:9px;"><span style="margin-left:280px">&copy;&nbsp;Copyright 2016 eAyurveda.lk</span></div>
    </div>
</div>

<div id="projectqq" class="container pat_confirm1_box1" >
    <div class="center-block pat_success1_box_wrapper1" style="margin-right: 30%;margin-top: 2%;width: 600px">
        <button  class="pat_close_btn1" onclick="projectqqclose()"><img src="{{ URL::asset('assets/img/close_btn.png') }}"></button>
        <div style="background: #ECF0F5;height: 575px;padding-top: 22px">

            <div class="container c_no_padding col-lg-12">
                <div class="col-lg-12 c_no_padding" style="margin-left: 30px">
                    <ul class="c_ul_1">
                        <li><span style="font-size: 20px;font-weight: 400;margin-left: 30px;color: #000000">Admin Profile </span> </li>
                        <?php
                        if(isset($admin_ob)){
                            foreach($admin_ob as $qq){
                             ?>

                        <li> <div id="op1" style="padding-top: 40px">
                                <div class="col-lg-12 ">
                                    <div class="col-lg-12 ">
                                        <span>First Name</span><span style="margin-left:225px" class="c_warning_tips_reg" id="wrn_fname1"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> Invalid first name</span>
                                    </div>
                                    <div class="col-lg-11 " style="margin-top: 5px">
                                        <div class="col-lg-9 " >
                                        <input style="height: 30px"  value=<?php  echo $qq->first_name;?>  class="c_text_box_1" id="fname1" onkeypress="remove_wrn('fname1')" onchange="remove_wrn('fname1')" name="fname1" type="text" maxlength="100"autocomplete="off" spellcheck="false" disabled>
                                          </div>
                                        <div class="col-lg-3 " >
                                            <span id="editFN"  class="profile_edit_span" onclick="setEditable('fname1')">Edit</span>
                                            <div id="changeFN" style="display: none">
                                                <div class="col-lg-6 " >
                                                     <span id="saveFN" class="profile_edit_span" onclick="saveFName()">Save</span>
                                                </div>
                                                <div class="col-lg-6 " >
                                                    <span id="cancelFN" style="" class="profile_edit_span" onclick="cancelEdit('fname1','<?php  echo $qq->first_name;?>')">Cancel</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 " style="margin-top: 20px">
                                    <div class="col-lg-12 ">
                                        <span>Last Name</span><span style="margin-left:225px" class="c_warning_tips_reg" id="wrn_lname1"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> Invalid last name</span>
                                    </div>
                                    <div class="col-lg-11 " style="margin-top: 5px">
                                        <div class="col-lg-9">
                                        <input style="height: 30px"  value=<?php  echo $qq->last_name;?> id="lname1" onkeypress="remove_wrn('lname1')" onchange="remove_wrn('lname1')" class="c_text_box_1" name="lname1" type="text" maxlength="100"autocomplete="off" spellcheck="false" disabled>
                                        </div>
                                        <div class="col-lg-3 " >
                                            <span id="editLN"  class="profile_edit_span" onclick="setEditable('lname1')">Edit</span>
                                            <div id="changeLN" style="display: none">
                                                <div class="col-lg-6 " >
                                                    <span id="saveLN" class="profile_edit_span" onclick="saveLName()">Save</span>
                                                </div>
                                                <div class="col-lg-6 " >
                                                    <span id="cancelLN" style="" class="profile_edit_span" onclick="cancelEdit('lname1','<?php  echo $qq->last_name;?>')">Cancel</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 " style="margin-top: 20px">
                                    <div class="col-lg-12 ">
                                        <span>Email</span> <span style="margin-left:255px" class="c_warning_tips_reg" id="wrn_email1"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> Invalid email</span>
                                    </div>
                                    <div class="col-lg-11 " style="margin-top: 5px">
                                        <div class="col-lg-9">
                                        <input style="height: 30px"  value=<?php  echo $qq->email;?> id="email1" class="c_text_box_1" onkeypress="remove_wrn('email1')" onchange="remove_wrn('email1')" name="email1" type="text" maxlength="100"autocomplete="off" spellcheck="false"  disabled>
                                         </div>
                                        <div class="col-lg-3 " >
                                            <span id="editEM"  class="profile_edit_span" onclick="setEditable('email1')">Edit</span>
                                            <div id="changeEM" style="display: none">
                                                <div class="col-lg-6 " >
                                                    <span id="saveEM" class="profile_edit_span" onclick="saveEmail()">Save</span>
                                                </div>
                                                <div class="col-lg-6 " >
                                                    <span id="cancelEM" style="" class="profile_edit_span" onclick="cancelEdit('email1','<?php  echo $qq->email;?>')">Cancel</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 " style="margin-top: 20px">

                                    <div class="col-lg-12 ">
                                       <span> Username</span> <span class="c_warning_tips_reg " id="wrn_username">enter username</span>
                                    </div>
                                    <div class="col-lg-11 " style="margin-top: 5px">
                                        <div class="col-lg-9">
                                        <input style="height: 30px"  value=<?php  echo $qq->username;?>  class="c_text_box_1" onkeyup="check_reg_existing('username',this.value),remove_wrn('username')" id="uname1" name="uname1" type="text" maxlength="100"autocomplete="off" spellcheck="false" disabled>
                                         </div>
                                        <div class="col-lg-3 " >
                                            <span id="editUN"  class="profile_edit_span" onclick="setEditable('uname1')">Edit</span>
                                            <div id="changeUN" style="display: none">
                                                <div class="col-lg-6 " >
                                                    <span id="saveUN" class="profile_edit_span" onclick="saveUName()">Save</span>
                                                </div>
                                                <div class="col-lg-6 " >
                                                    <span id="cancelUN" style="" class="profile_edit_span" onclick="cancelEdit('uname1','<?php  echo $qq->username;?>')">Cancel</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="editbtn"class="col-lg-12 "  style="margin-top: 50px;margin-left: 25px">
                                    <button class="pat_view_btn_2" onclick="enableEdit()" >Change Password</button>
                                </div>

                            </div>



                            <div id="op2" style="padding-top: 20px;display: none">







                                <div id="passwordset" style="">
                                    <div class="col-lg-11 "style="margin-top: 20px">
                                        <div class="col-lg-12 ">
                                            <span>Password</span><span style="margin-left:230px " class="c_warning_tips_reg" id="wrn_pwrd"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> Invalid Password</span>
                                        </div>
                                        <div class="col-lg-9 " style="margin-top: 5px">
                                            <input style="height: 30px" onkeypress="remove_wrn('pwrd'),remove_wrn('acpwrd')" onchange="remove_wrn('pwrd'),remove_wrn('acpwrd')" onkeyup="passwordValidateAdmin()" id="pwrd" class="c_text_box_1 password_regx" name="pwrd" type="password" maxlength="100"autocomplete="off" spellcheck="false">
                                        </div>
                                    </div>
                                    <div class="col-lg-11"style="margin-top: 20px">
                                        <div class="col-lg-12 ">
                                            <span>Confirm Password</span><span style="margin-left:180px " class="c_warning_tips_reg" id="wrn_acpwrd"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> Invalid Password</span>
                                        </div>
                                        <div class="col-lg-9 " style="margin-top: 5px">
                                            <input style="height: 30px" onkeypress="remove_wrn('acpwrd'),remove_wrn('pwrd')" onchange="remove_wrn('acpwrd'),remove_wrn('pwrd')" id="acpwrd" class="c_text_box_1" name="acpwrd" type="password" maxlength="100"autocomplete="off" spellcheck="false">
                                        </div>
                                    </div>
                                    <div class="a_password_inputs1">
                                        <div id="a_in_ps_div_1"></div>
                                        <div id="a_in_ps_div_2">
                                            <ul class="c_ul_1">
                                                <li id="in_ps_ch_1"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;Must be at least 8 characters long.</li>
                                                <li id="in_ps_ch_2"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;Must contain a lowercase letter.</li>
                                                <li id="in_ps_ch_3"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;Must contain an uppercase letter.</li>
                                                <li id="in_ps_ch_4"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;Must contain a number or special character.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <?php    }
                                }?>

                                <div class="col-lg-12" style="margin-top: 10px">
                                    <div id="backbtn"class="col-lg-6"  style="margin-top: 20px;margin-left: 190px">
                                        <input type="button" class="pat_view_btn_1 " onclick="goBack()" value="Back">
                                    </div>
                                    <div id="savebtn"class="col-lg-3"  style="margin-top: 20px;margin-left: -100px">
                                        <input id="adminSubmit"  type="button" class="pat_view_btn_1 " onclick="savePassword()" value="Save">


                                    </div>
                                </div>

                            </div>

                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
    <div id="adminFNPopup" class="container pat_confirm1_box" >
        <div class="center-block pat_success1_box_wrapper" style="margin-right: 40%;margin-top: 15%;width: 375px">
            <button  class="pat_close_btn" onclick="adminFNPopupClose()"><img src="{{ URL::asset('assets/img/close_btn.png') }}"></button>
            <div style="background: #4CBC5B;height: 145px;padding-top: 32px">

                <div class="container c_no_padding col-lg-12">
                    <div class="col-lg-10 c_no_padding" style="margin-left: 30px">
                        <ul class="c_ul_1">
                            <li><span style="font-size: 20px;font-weight: 100;margin-left: 30px;color: #FFF">Please Confirm To Save </span></li>

                            <li> <div style="padding-top: 30px">
                                    <div class="col-lg-3 ">
                                        <button class="pat_view_btn_1" onclick="confirmChangeFName()" >Confirm</button>
                                    </div>
                                    <div class="col-lg-3" style="margin-left: 100px">
                                        <button class="pat_view_btn_1" onclick="adminFNPopupClose()" >Cancel</button>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div id="adminLNPopup" class="container pat_confirm1_box" >
        <div class="center-block pat_success1_box_wrapper" style="margin-right: 40%;margin-top: 15%;width: 375px">
            <button  class="pat_close_btn" onclick="adminLNPopupClose()"><img src="{{ URL::asset('assets/img/close_btn.png') }}"></button>
            <div style="background: #4CBC5B;height: 145px;padding-top: 32px">

                <div class="container c_no_padding col-lg-12">
                    <div class="col-lg-10 c_no_padding" style="margin-left: 30px">
                        <ul class="c_ul_1">
                            <li><span style="font-size: 20px;font-weight: 100;margin-left: 30px;color: #FFF">Please Confirm To Save </span></li>

                            <li> <div style="padding-top: 30px">
                                    <div class="col-lg-3 ">
                                        <button class="pat_view_btn_1" onclick="confirmChangeLName()" >Confirm</button>
                                    </div>
                                    <div class="col-lg-3" style="margin-left: 100px">
                                        <button class="pat_view_btn_1" onclick="adminLNPopupClose()" >Cancel</button>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div id="adminEmailPopup" class="container pat_confirm1_box" >
        <div class="center-block pat_success1_box_wrapper" style="margin-right: 40%;margin-top: 15%;width: 375px">
            <button  class="pat_close_btn" onclick="adminEmailPopupClose()"><img src="{{ URL::asset('assets/img/close_btn.png') }}"></button>
            <div style="background: #4CBC5B;height: 145px;padding-top: 32px">

                <div class="container c_no_padding col-lg-12">
                    <div class="col-lg-10 c_no_padding" style="margin-left: 30px">
                        <ul class="c_ul_1">
                            <li><span style="font-size: 20px;font-weight: 100;margin-left: 30px;color: #FFF">Please Confirm To Save </span></li>

                            <li> <div style="padding-top: 30px">
                                    <div class="col-lg-3 ">
                                        <button class="pat_view_btn_1" onclick="confirmChangeEmail()" >Confirm</button>
                                    </div>
                                    <div class="col-lg-3" style="margin-left: 100px">
                                        <button class="pat_view_btn_1" onclick="adminEmailPopupClose()" >Cancel</button>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div id="adminUNPopup" class="container pat_confirm1_box" >
        <div class="center-block pat_success1_box_wrapper" style="margin-right: 40%;margin-top: 15%;width: 375px">
            <button  class="pat_close_btn" onclick="adminUNPopupClose()"><img src="{{ URL::asset('assets/img/close_btn.png') }}"></button>
            <div style="background: #4CBC5B;height: 145px;padding-top: 32px">

                <div class="container c_no_padding col-lg-12">
                    <div class="col-lg-10 c_no_padding" style="margin-left: 30px">
                        <ul class="c_ul_1">
                            <li><span style="font-size: 20px;font-weight: 100;margin-left: 30px;color: #FFF">Please Confirm To Save </span></li>

                            <li> <div style="padding-top: 30px">
                                    <div class="col-lg-3 ">
                                        <button class="pat_view_btn_1" onclick="confirmChangeUName()" >Confirm</button>
                                    </div>
                                    <div class="col-lg-3" style="margin-left: 100px">
                                        <button class="pat_view_btn_1" onclick="adminUNPopupClose()" >Cancel</button>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div id="adminPWDPopup" class="container pat_confirm1_box" >
        <div class="center-block pat_success1_box_wrapper" style="margin-right: 40%;margin-top: 15%;width: 375px">
            <button  class="pat_close_btn" onclick="adminPWDPopupClose()"><img src="{{ URL::asset('assets/img/close_btn.png') }}"></button>
            <div style="background: #4CBC5B;height: 145px;padding-top: 32px">

                <div class="container c_no_padding col-lg-12">
                    <div class="col-lg-10 c_no_padding" style="margin-left: 30px">
                        <ul class="c_ul_1">
                            <li><span style="font-size: 20px;font-weight: 100;margin-left: 30px;color: #FFF">Please Confirm To Save </span></li>

                            <li> <div style="padding-top: 30px">
                                    <div class="col-lg-3 ">
                                        <button class="pat_view_btn_1" onclick="confirmChangePwrd()" >Confirm</button>
                                    </div>
                                    <div class="col-lg-3" style="margin-left: 100px">
                                        <button class="pat_view_btn_1" onclick="adminPWDPopupClose()" >Cancel</button>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>

<!-- Admin Footer -->


<!-- JavaScripts -->

<script src="assets/js/jquery-1.12.0.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/wow.min.js"></script>
<!-- Morris.js charts -->
<script src="assets_admin/plugins/reachel.js"></script>
<script src="assets_admin/plugins/morris/morris.min.js"></script>
<script src="assets_admin/js/sep_pro_admin.js"></script>

<!-- page script -->

<script>
    new WOW().init();
</script>
<!-- JavaScripts End -->

</body>
</html>