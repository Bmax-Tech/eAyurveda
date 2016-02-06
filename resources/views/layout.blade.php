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
    <link rel="shortcut icon" type="image/png" href="{{ URL::asset('assets/img/logo_ico.png') }}"/>
    <!-- Style Sheets -->
    <link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/animate.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/spe_pro_css.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/datepicker/bootstrap_datepicker.css') }}" rel="stylesheet">
    <!-- Style Sheets End -->
</head>

<body class="c_body">
<!-- Top Header -->
<div class="container c_container">
    <div class="row">
        <div class="col-lg-6 c_no_padding c_float_right">
            <div class="col-lg-12 c_no_padding">
                <div class="c_top_menu_bar">
                    <ul class="c_top_ul">
                        <?php
                            if(isset($_COOKIE['user'])){
                            $user = json_decode($_COOKIE['user'],true);
                        ?>
                        <li style="margin-right:25px">
                            <a class="c_href" href="{{ URL::asset('adddoctor') }}">
                                <img class="c_user_top_logo" src="{{ URL::asset('assets/img/add_doc.png') }}">
                                <span>Add Doctor</span>
                            </a>
                        </li>
                        <li style="margin-right:25px">
                            <a class="c_href" href="{{ URL::asset('myaccount/'.$user[0]['first_name']) }}">
                                <img class="c_user_top_logo" src="{{ URL::asset('assets/img/user_logo.png') }}">
                                <span><?php echo $user[0]['first_name']; ?></span>
                            </a>
                        </li>
                        <?php
                            }
                        ?>
                        <li>
                            <?php
                            if(isset($_COOKIE['user'])){
                            ?>
                                <img class="c_user_top_logo" src="{{ URL::asset('assets/img/logout.png') }}" style="width:33px">
                                <span style="color:#FFFFFF"><a class="c_href" href="{{ URL::asset('logout') }}" >Sign Out</a></span>
                            <?php
                                }else{
                            ?>
                                <img class="c_user_top_logo" src="{{ URL::asset('assets/img/sign_in.png') }}" style="width:33px">
                                <span style="color:#FFFFFF"><a class="c_href" href="#" id="sign_in_up_btn">Sign in</a> / <a class="c_href" href="/register">Register</a></span>
                            <?php
                                }
                            ?>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-12 c_no_padding c_top_contact_bar">
                <ul class="c_top_ul">
                    <li style="margin-right:25px">
                        <a href="#" class="c_href">
                            <div class="c_rounded_1">
                                <img class="c_logo_1" src="{{ URL::asset('assets/img/phone.png') }}" style="margin-right:10px">
                                <span class="c_font_1">Call Us&nbsp;&nbsp;&nbsp;+(94) 771234543</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="c_href">
                            <div class="c_rounded_1">
                                <img class="c_logo_1" src="{{ URL::asset('assets/img/mail.png') }}" style="margin-right:10px">
                                <span class="c_font_1">Email Us&nbsp;&nbsp;&nbsp;help@eayurveda.lk</span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-lg-6 c_no_padding">
            <a href="/"><img class="c_logo" src="{{ URL::asset('assets/img/logo.png') }}"></a>
        </div>
    </div>
</div>
<!-- Top Header End -->
<!-- Navigation Bar -->
<div class="container c_container c_no_padding">
    <nav role="navigation" class="navbar navbar-default">
        <!-- toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <!-- Collection of nav links and other content for toggling -->
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/">Home</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Physicians</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">About</a></li>
                <li><a href="/forum">Forum</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right" style="margin-right:30px">
                <li>
                    <form action="/search" method="get">
                        <input type="text" class="c_search_text_box" name="search_text" autocomplete="off" spellcheck="false" placeholder="Search text">
                        <buton type="buton" id="c_advance_search_drop"><span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true" id="c_advance_drop_span"></span></buton>
                        <button type="submit" id="c_search_icon"><img src="{{ URL::asset('assets/img/search.png') }}" width="27px"></button>
                    </form>
                </li>
            </ul>
            <div id="c_advance_search_box">
                <form action="/advanced_search" method="get">
                <ul class="c_ul_1">
                    <li>
                        <ul class="c_top_ul c_advanced_search">
                            <li style="width: 34%"><span>Doctor`s Name</span></li>
                            <li style="width: 64%"><input type="text" class="c_text_box_1" name="doc_name"/></li>
                        </ul>
                    </li>
                    <li>
                        <ul class="c_top_ul c_advanced_search">
                            <li style="width: 34%"><span>Speciality</span></li>
                            <li style="width: 64%"><input type="text" class="c_text_box_1" name="doc_speciality"/></li>
                        </ul>
                    </li>
                    <li>
                        <ul class="c_top_ul c_advanced_search">
                            <li style="width: 34%"><span>Treatment Type</span></li>
                            <li style="width: 64%"><input type="text" class="c_text_box_1" name="doc_treatment"/></li>
                        </ul>
                    </li>
                    <li>
                        <ul class="c_top_ul c_advanced_search">
                            <li style="width: 34%"><span>Location</span></li>
                            <li style="width: 64%"><input type="text" class="c_text_box_1" name="doc_location"/></li>
                        </ul>
                    </li>
                    <li>
                        <button type="submit" class="c_advanced_search_btn"><img src="{{ URL::asset('assets/img/search_ad.png') }}" style="width: 18px;margin-right: 12px;margin-top: -5px">Search</button>
                    </li>
                </ul>
                </form>
            </div>
        </div>
    </nav>
</div>
<!-- Navigation Bar -->

<!-- Home Page Content -->
@yield('content')
<!-- Home Page Content -->

<!-- Footer -->
<div class="container c_container c_no_padding">
    <div class="col-lg-12 c_no_padding" id="c_footer">
        <div class="col-lg-2 c_no_padding">
            <img src="{{ URL::asset('assets/img/logo.png') }}" width="200px">
        </div>
        <div class="col-lg-3 c_no_padding" style="padding-top:30px;color:#FFFFFF">
            <ul class="c_ul_1">
                <li>Call Us&nbsp;&nbsp;&nbsp;(+94) 771234543</li>
                <li>Email &nbsp;&nbsp;&nbsp;mail@eayurveda.lk</li>
            </ul>
        </div>
        <div class="col-lg-2 c_no_padding" style="padding:30px 0px 0px 20px;color:#FFFFFF">
            <ul class="c_ul_1">
                <a href="#"><li>SERVICES</li></a>
                <a href="#"><li>PHYSICIANS</li></a>
                <a href="#"><li>CONTACT</li> </a>
                <a href="#"><li>ABOUT</li></a>
                <a href="#"><li>REGISTER</li></a>
            </ul>
        </div>
        <div class="col-lg-2 c_no_padding" style="padding:30px 0px 0px 0px;color:#FFFFFF">
            <ul class="c_ul_1">
                <a href="#"><li>FEATURED DOCTORS</li></a>
                <a href="#"><li>TOP RATED DOCTORS</li></a>
                <a href="#"><li>POST DOCTOR</li> </a>
            </ul>
        </div>
        <div class="col-lg-3 c_no_padding" style="padding-left:40px;padding-top:30px;color:#FFFFFF">
            <ul class="c_ul_1">
                <li>&copy;&nbsp;Copyright 2016 eAyurveda.lk</li>
            </ul>
        </div>
    </div>
</div>
<!-- Footer -->

<!-- Side Nav Bar -->
<div class="c_side_nav_bar">
    <ul class="c_ul_1">
        <li class="c_side_bar_ul" id="featured_sd_btn"><button class="c_side_nav_btn"><img src="{{ URL::asset('assets/img/thumb_up.png') }}"></button></li>
        <li class="c_side_bar_ul" id="top_sd_btn"><button class="c_side_nav_btn"><img src="{{ URL::asset('assets/img/star_up.png') }}"></button></li>
        <li class="c_side_bar_ul" id="com_sd_btn"><button class="c_side_nav_btn"><img src="{{ URL::asset('assets/img/community_up.png') }}"></button></li>
        <li class="c_side_bar_ul" id="loc_sd_btn"><button class="c_side_nav_btn"><img src="{{ URL::asset('assets/img/mark_up.png') }}"></button></li>
    </ul>
</div>
<!-- Side Nav Bar -->

<!-- Pop Up Boxes -->
<div class="container c_pop_up_box_1" <?php if(isset($username_error) || isset($password_error) || isset($reset_email_error) || isset($reset_username_error)){ ?> style="display: block" <?php } ?>>
    <div class="center-block c_pop_box_1_wrapper">
        <button class="c_close_btn"><img src="{{ URL::asset('assets/img/close_btn.png') }}"></button>
        <div id="c_sign_in_box" <?php if(isset($reset_email_error) || isset($reset_username_error)){ ?>style="display: none" <?php } ?>>
            <form action="{{URL::to('login')}}" method="post">
            <ul class="c_ul_1">
                <li class="c_add_margin_20">
                    <span class="c_font_2">Sign In</span>
                </li>
                <li class="c_add_margin_20">
                    <input type="text" class="c_text_box_1 <?php if(isset($username_error)){ echo 'c_error_input_field_highlight'; }?>"  <?php if(isset($password_error)){?>value="<?php echo $pre_username; ?>" <?php } ?>  id="login_username" onkeypress="remove_highlight('login_username','c_error_input_field_highlight')" placeholder="username" name="username" autocomplete="off" spellcheck="false"/>
                </li>
                <li>
                    <input type="password" class="c_text_box_1 <?php if(isset($password_error)){ echo 'c_error_input_field_highlight'; } ?>" id="login_password" onkeypress="remove_highlight('login_password','c_error_input_field_highlight')" placeholder="password" name="password" autocomplete="off" spellcheck="false"/>
                </li>
                <li style="text-align:right">
                    <span class="c_font_3"><a href="#" id="c_forgotten_pass_link">forgotten password ?</a></span>
                </li>
                <li style="padding:0px 8px;margin-top:35px">
                    <button type="submit" class="c_button_1">Sign In</button>
                </li>
                <li style="text-align:center;margin-top:20px">
                    <span class="c_font_3"><a href="/register">Register with e-Ayurveda</a></span>
                </li>
            </ul>
            </form>
        </div>

        <!-- Forgotten Password Form -->
        <div id="c_forgotten_pass_box" <?php if(isset($reset_email_error) || isset($reset_username_error)){ ?>style="display: block" <?php } ?>>
            <form action="{{URL::to('forgotten_password')}}" method="post" onsubmit="return check_forgotten_password_form()">
                <ul class="c_ul_1">
                    <li class="c_add_margin_20">
                        <span class="c_font_2">Reset Password</span>
                    </li>
                    <li style="margin-bottom: 7px">
                        <input type="text" class="c_text_box_1 <?php if(isset($reset_username_error)){ echo 'c_error_input_field_highlight'; }?>"  <?php if(isset($reset_email_error)){?>value="<?php echo $pre_username; ?>" <?php } ?>  id="reset_ps_username" onkeypress="remove_highlight('reset_ps_username','c_error_input_field_highlight')" placeholder="username" name="reset_ps_username" autocomplete="off" spellcheck="false"/>
                    </li>
                    <li style="margin-bottom: 7px">
                        <input type="text" class="c_text_box_1 <?php if(isset($reset_email_error)){ echo 'c_error_input_field_highlight'; } ?>" id="reset_ps_email" onkeypress="remove_highlight('reset_ps_email','c_error_input_field_highlight')" placeholder="email" name="reset_ps_email" autocomplete="off" spellcheck="false"/>
                    </li>
                    <li style="margin-bottom: 7px">
                        <input type="password" class="c_text_box_1" id="reset_ps_password" onkeypress="remove_highlight('reset_ps_password','c_error_input_field_highlight')" placeholder="new password" name="reset_ps_password" autocomplete="off" spellcheck="false"/>
                    </li>
                    <li>
                        <input type="password" class="c_text_box_1" id="reset_ps_confirm_password" onkeypress="remove_highlight('reset_ps_confirm_password','c_error_input_field_highlight')" placeholder="confirm password" name="reset_ps_confirm_password" autocomplete="off" spellcheck="false"/>
                    </li>
                    <li style="padding:0px 8px;margin-top:26px">
                        <button type="submit" class="c_button_1">Reset</button>
                    </li>
                </ul>
            </form>
        </div>
    </div>
</div>
<!-- Pop Up Boxes -->

<!-- Warning Messages -->
<div class="container c_pop_up_box_2" id="c_warning_msg">
    <div class="center-block c_pop_box_1_wrapper" style="margin-top: 15%">
        <div style="background: #b92c28;height: 145px;padding-top: 32px">
            <ul class="c_ul_1">
                <li>
                    <ul class="c_top_ul">
                        <li style="margin-left: 27px"><img src="{{ URL::asset('assets/img/warning.png') }}" style="width: 80px"></li>
                        <li style="height: 80px"><span style="font-size: 27px;font-weight: 100;margin-left: 30px;color: #FFF">Please Login</span></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- Warning Messages -->

<!-- Thanking Messages -->
<div class="container c_pop_up_box_2" id="c_thanking_msg">
    <div class="center-block c_pop_box_1_wrapper" style="margin-top: 15%;width: 375px">
        <div style="background: #DAA100;height: 145px;padding-top: 32px">

            <div class="container c_no_padding col-lg-12">
                <div class="col-lg-4 c_no_padding" style="float: left;margin-left: 27px"><img src="{{ URL::asset('assets/img/thanking.png') }}" style="width: 80px"></div>
                <div class="col-lg-8 c_no_padding" style="margin-top: -75px;margin-left: 120px">
                    <ul class="c_ul_1">
                        <li><span style="font-size: 27px;font-weight: 100;margin-left: 30px;color: #FFF">Thank you</span></li>
                        <li><span style="font-size: 20px;font-weight: 100;margin-left: 30px;color: #FFF"> for your collaboration</span></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Thanking Messages -->

<!-- JavaScripts -->
<script src="{{ URL::asset('assets/js/jquery-1.12.0.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/wow.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/sep_pro_js.js') }}"></script>
<script>
    new WOW().init();
</script>
<script src="{{ URL::asset('assets/datepicker/bootstrap_datepicker.js') }}"></script>
<script>
$('#dob_input_box').datepicker({
    endDate: "<?php echo $PRE_DATE->format('m/d/Y'); ?>",
    startView: 2,
    autoclose: true
});
</script>
<!-- JavaScripts End -->

</body>
</html>