<?php
//session_start();
$PRE_DATE = new \DateTime();
$PRE_DATE = $PRE_DATE->sub(new DateInterval('P18Y'));// This holds date which validate date picker in Registration page (Holds date 18 years back)
?>
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
    <link href="{{ URL::asset('assets/datepicker/bootstrap_datepicker.css') }}" rel="stylesheet">
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
        <div class="col-lg-3 c_no_padding">
            <div class="c_admin_top_user">
                <ul class="c_top_ul">
                    <li style="margin-right:25px">
                        <a class="c_href" href="#">
                            <img class="c_user_top_logo" src="assets_admin/img/user_logo.png">


                        </a>
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
    <div class="col-lg-3 c_no_padding c_admin_left_nav">
        <ul class="c_ul_1 c_admin_ul">
            <li ><ul class="c_top_ul"><li><img src="assets_admin/img/dashboard.png" style="width:20px"></li><li style="margin-left:10px">
                        Dashboard
                    </li></ul>
            </li>
            <li id="admin_left_nav_doc_btn"><ul class="c_top_ul"><li><img src="assets_admin/img/doc_user.png" style="width:20px"></li><li style="margin-left:10px">
                        <span class="glyphicon glyphicon-menu-down c_right_gly" id="c_admin_span_1" aria-hidden="true"></span>
                        Doctor
                    </li></ul></li>
            <li id="admin_left_nav_doc" style="padding:0px">
                <ul class="c_admin_ul_in">
                    <li class="c_admin_ul_li c_admin_li_sel" onClick="load_doc_page('1')" style="padding-top: 20px"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Add Physician</li>
                    <li class="c_admin_ul_li" onClick="load_doc_update('2')"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Update Physician</li>
                    <li class="c_admin_ul_li" onClick="load_doc_remove('3')"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Remove Physician</li>
                    <li class="c_admin_ul_li" onClick="load_doc_confirm()"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Confirm Physician</li>
                    <li class="c_admin_ul_li" onClick="load_doc_foreign()" style="padding-bottom: 20px"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Foreign Doctors</li>

                </ul>
            </li>
            <li id="admin_left_nav_pat_btn"><ul class="c_top_ul"><li><img src="assets_admin/img/community_sm.png" style="width:20px"></li><li style="margin-left:10px">
                        <span class="glyphicon glyphicon-menu-right c_right_gly" id="c_admin_span_2" aria-hidden="true"></span>
                        Patient
                    </li></ul></li>
            <li id="admin_left_nav_pat" style="display:none;padding:0px">
                <ul class="c_admin_ul_in">
                    <li class="c_admin_ul_li" onClick="load_pat_page('1')"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>View Users</li>
                    <li class="c_admin_ul_li" onClick="load_pat_page('2')"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>User Comments</li>
                    <li class="c_admin_ul_li" onClick="load_pat_page('3')"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Remove User</li>
                    <li class="c_admin_ul_li" onClick="load_pat_page('4')"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Report</li>
                </ul>
            </li>
            <li><ul class="c_top_ul"><li><img src="assets_admin/img/customize.png" style="width:20px"></li><li style="margin-left:10px">
                        Customize Home
                    </li></ul>
            </li>
        </ul>
    </div>
    <div class="col-lg-9 c_no_padding" id="admin_home_div">
        <!-- Ajax Home Load Here -->
    </div>
</div>

<!-- Admin Top Nav -->
<!-- pop view-->

<div class="container center-block c_pop_up_box_profile" id="doc_view_profile">
    <div id="pop_header">
        <button type="button" data-dismiss="modal" aria-hidden="true" class="close_bt" style="height:100%;background-color:rgba(255,0,0,1);color:rgba(0,0,0,1);float:right" >X</button>
    </div>
    <div id="pop_tab_1"><!-- button-->
        <div class="col-lg-2 pop_but_1 pop_but_active bb1" onclick="change_doc_view_inpop('17')" id="view_btn_1">
            <p style="color:black;padding-top:5px">Registered Details</p>
        </div>
        <div class="col-lg-2 pop_but_2 bb1" onclick="change_doc_view_inpop('18')" id="view_btn_2">
            <p style="color:black;padding-top:5px">Personal Details</p>
        </div>
        <div class="col-lg-2 pop_but_3 bb1" onclick="change_doc_view_inpop('19')" id="view_btn_3">
            <p style="color:black;padding-top:5px">Working Details</p>
        </div>

    </div><!-- end button-->
    <div class="container" id="pop1">
        <div class="doc_table_data" id="pop_view_2" style="margin-top:50px" >
            <!-- Doctor Profile Details load Here -->
        </div>
        <div class="doc_table_data" id="pop_view_3" style="margin-top:50px;display:none" >
            <!-- Doctor Profile Details load Here -->
        </div>
        <div class="doc_table_data" id="pop_view_4" style="margin-top:50px;display:none" >
            <!-- Doctor Profile Details load Here -->
        </div>
    </div>
</div>

<!-- end view -->
<!-- pop update-->

<div class="container center-block c_pop_up_box_profile" id="doc_update_view">
    <div id="pop_header_u">
        <button type="button" data-dismiss="modal" aria-hidden="true" class="close_bt_up" style="height:100%;background-color:rgba(255,0,0,1);color:rgba(0,0,0,1);float:right" >X</button>

    </div>
    <div id="pop_tab_update_1"><!-- button-->
        <div class="col-lg-2 pop_but_1 pop_but_active xx1" onclick="change_doc_update_inpop('25')" id="view_btn_1">
            <p style="color:black;padding-top:5px">Registered Details</p>
        </div>
        <div class="col-lg-2 pop_but_2 xx1" onclick="change_doc_update_inpop('26')" id="view_btn_2">
            <p style="color:black;padding-top:5px">Personal Details</p>
        </div>
        <div class="col-lg-2 pop_but_3 xx1" onclick="change_doc_update_inpop('27')" id="view_btn_3">
            <p style="color:black;padding-top:5px">Specialization</p>
        </div>
        <div class="col-lg-2 pop_but_4 xx1" onclick="change_doc_update_inpop('28')" id="view_btn_4">
            <p style="color:black;padding-top:5px">Specialization</p>
        </div>

    </div><!-- end button-->
    <div class="container" id="pop_update_vi_1">
        <form name="update_doc_profile_pop_up" id="update_doc_profile_pop_up">
            <div class="doc_table_data" id="pop_update_2" style="margin-top:50px" >
                <!-- Doctor Profile Details load Here -->

            </div>
            <div class="doc_table_data" id="pop_update_3" style="margin-top:50px;display:none" >

                <!-- Doctor Profile Details load Here -->
            </div>
            <div class="doc_table_data" id="pop_update_4" style="margin-top:50px;display:none" >

                <!-- Doctor Profile Details load Here -->

            </div>
            <div class="doc_table_data" id="pop_update_5" style="margin-top:50px;display:none" >

                <!-- Doctor Profile Details load Here -->

            </div>

        </form>
    </div>
</div>

<!-- end pop upate -->
<!-- pop remove -->
<div class="container center-block c_pop_up_box_remove" id="doc_remove_view">
    <div class="c_pop_up_box_remove_header">
        <button type="button" data-dismiss="modal" aria-hidden="true" class="close_bt_remove" style="height:100%;background-color:rgba(255,0,0,1);color:rgba(0,0,0,1);float:right" onClick="close_pop_remove()" >X</button>
    </div>
    <div class="container c_pop_up_box_remove_body1">
        <div style="margin-top:-65px;height:20px;margin-left:100px">Do you want to delete this record....</div>
        <table style="width:100%;height:100%;margin-top:40px"><tr><td style="width:50%"><div class="yes_b" id="yes_btn"><p style="color:rgba(255,255,255,1);text-align:center" onClick="remove_doc()">YES</p></div>
                </td>
                <td><div class="no_b" id="no_btn"><p style="color:rgba(255,255,255,1);text-align:center">NO</p></div>
                </td></tr></table>

    </div>

</div>


<!-- pop remove -->
<!-- pop update -->
<div class="container center-block c_pop_up_box_remove" id="doc_pop_up_date">
    <div class="c_pop_up_box_remove_header">
        <button type="button" data-dismiss="modal" aria-hidden="true" class="close_bt_up_pop" style="height:100%;background-color:rgba(255,0,0,1);color:rgba(0,0,0,1);float:right" onClick="close_pop_update_alert()" >X</button>
    </div>
    <div class="container c_pop_up_box_remove_body1">
        <div style="margin-top:-65px;height:20px;margin-left:100px">Do you want to update this record....</div>
        <table style="width:100%;height:100%;margin-top:40px"><tr><td style="width:50%"><div class="yes_b_up" id="yes_btn"><p style="color:rgba(255,255,255,1);text-align:center" onClick="update_doc_t()">YES</p></div>
                </td>
                <td><div class="no_b_up" id="no_btn"><p style="color:rgba(255,255,255,1);text-align:center">NO</p></div>
                </td></tr></table>

    </div>

</div>


<!-- pop update -->
<!-- pop search up -->
<div class="container center-block filter_pp" id="doc_p">
    <form id="filter_doc" method="get">

        <div class="col-lg-12 doc_form_group c_no_padding doc_form_right">
            <span style="color:white">User ID</span>
            <input type="text" class="c_text_box_f" spellcheck="false" name="search_text"  autocomplete="off"/>

            <span style="color:white">Filter by Gender</span>
            <select class="c_select_box_1"  name="gender" id="reg_gender" >
                <option value="all">all</option>
                <option value="male">male</option>
                <option value="female">female</option>
            </select>

            <span style="color:white">Filter by City</span>
            <select class="c_select_box_1"  name="city" id="cit" >
                <option value=all"">all</option>
                <option value="kandy">kandy</option>
                <option value="colombo">colombo</option>
            </select>
            <button type="button" onClick="search_data()" style="width:100%;margin-top:10px;background-color:#2AA700">Filter</button>

        </div>
    </form>


</div>


<!--end pop search-->
<!-- pop search rem -->
<div class="container center-block filter_pp" id="doc_pr">
    <form id="filter_doc_rm" method="get">

        <div class="col-lg-12 doc_form_group c_no_padding doc_form_right">
            <span style="color:white">User ID</span>
            <input type="text" class="c_text_box_f" spellcheck="false" name="search_text_r"  autocomplete="off"/>

            <span style="color:white">Filter by Gender</span>
            <select class="c_select_box_1"  name="gender_r" id="reg_genderr" >
                <option value="all">all</option>
                <option value="male">male</option>
                <option value="female">female</option>
            </select>

            <span style="color:white">Filter by City</span>
            <select class="c_select_box_1"  name="city_r" id="citr" >
                <option value=all"">all</option>
                <option value="kandy">kandy</option>
                <option value="colombo">colombo</option>
            </select>
            <button type="button" onClick="search_data_r()" style="width:100%;margin-top:10px;background-color:#2AA700">Search</button>

        </div>
    </form>


</div>


<!--end pop search-->

<!-- pop save details-->





<div class="container center-block c_pop_up_box_savedetails" id="doc_save_details_view">
    <div class="c_pop_up_box_savedetails_header" id="save_header">
        <table style="height:20px;width:100%"><tr><td id="doc_name_save"> </td><td>

        <button type="button" data-dismiss="modal" aria-hidden="true" class="close_bt_up_pop" style="height:32px;background-color:rgba(255,0,0,1);color:rgba(0,0,0,1);float:right" onClick="close_save_details()" >X</button>
         </td></tr></table>
    </div>
    <div class="container col-lg-12 c_pop_up_box_savedetails_body1 c_no_padding" style="background-color:rgba(255,255,255,0.97)" id="save_body">
        <div class="row">
            <div class="col-lg-4 c_no_padding fr_1" id="fr_1_data">

            </div>
            <div class="col-lg-4 c_no_padding fr_2" id="fr_2_data">

            </div>
            <div class="col-lg-4 c_no_padding fr_3" id="fr_3_data">

            </div>


        </div>


        <div class="row">
        <div class="col-lg-4 c_no_padding sr_1" id="sr_1_data">

        </div>
        <div class="col-lg-4 c_no_padding sr_2" id="sr_2_data">

        </div>
        <div class="col-lg-4 c_no_padding sr_3" id="sr_3_data">

        </div>


        </div>
        </div>
</div>


<!-- end pop save detail-->
<!-- validation error-->
<div class="container center-block c_pop_up_box_remove" id="validation_error">
    <div class="c_pop_up_box_remove_header">
        <button type="button" data-dismiss="modal" aria-hidden="true" class="close_bt_up_pop" style="height:100%;background-color:rgba(255,0,0,1);color:rgba(0,0,0,1);float:right" onClick="close_validation_error()" >X</button>
    </div>
    <div class="container c_pop_up_box_remove_body1">
        <div style="margin-top:-55px;height:20px;margin-left:50px;font-size:15px;font-weight:500"><img src="assets/img/warni.png" style="width:50px;height:50px">Complete Feilds Correctly First</div>


    </div>

</div>


<!-- end validation error-->
<!-- Admin Footer -->
<div class="container c_no_padding" style="border-top:2px solid #0F7400">
    <div class="col-lg-12 c_no_padding" id="c_footer">
        <div class="col-lg-2 c_no_padding">
            <img src="assets/img/logo.png" width="50px">
        </div>
        <div class="col-lg-8" style="color:#FFFFFF;font-size:12px;margin-top:9px;"><span style="margin-left:280px">&copy;&nbsp;Copyright 2016 eAyurveda.lk</span></div>
    </div>
</div>
<!-- Admin Footer -->


<!-- JavaScripts -->
<script src="assets/js/jquery-1.12.0.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/wow.min.js"></script>
<script src="assets_admin/js/sep_pro_admin.js"></script>
<script>
    new WOW().init();
</script>
<script src="{{ URL::asset('assets/datepicker/bootstrap_datepicker.js') }}"></script>
<script>
    $('#un_doc_dob').datepicker({
        endDate: "<?php echo $PRE_DATE->format('m/d/Y'); ?>",
        startView: 2,
        autoclose: true
    });
</script>
<!-- JavaScripts End -->
<!--my test pop -->

<!-- end -->

</body>
</html>