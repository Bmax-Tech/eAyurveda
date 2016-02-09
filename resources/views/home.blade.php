@extends('layout')
@section('content')

<input type="hidden" id="home_hidden_check" value="YES"/>
<!-- Home Page Content -->
<div class="container c_container c_no_padding">
    <div class="col-lg-12 c_no_padding" id="c_home_banner">
        <div class="row owl-carousel owl-theme" id="home_slider" style="margin-left: 0px;margin-right: 0px">
            <?php
            for($i=1;$i<=5;$i++){
            ?>
            <div class="item">
                <div class="col-lg-6" style="padding-top:30px;padding-left: 0px;padding-right: 0px">
                    <div class="wow slideInUp">
                        <p style="background:rgba(85,85,85,0.87);font-size:30px;color:rgba(255,255,255,1.00);display:inline-block;padding:12px 20px;padding-left:60px">
                            We Take Care of Your Health
                        </p>
                    </div>
                    <div class="wow slideInUp">
                        <p style="background:rgba(0,0,0,0.87);font-size:30px;color:rgba(255,255,255,1.00);display:inline-block;padding:12px 20px;padding-left:60px">
                            Consultation 24/7
                        </p>
                    </div>
                </div>
                <div class="col-lg-6" style="padding-right: 0px">
                    <div class="c_sub_banner wow zoomIn">
                        <span class="c_health_tip">Health Tip !</span>
                        <p>"Ayurveda, an ancient system of illness prevention and treatment, centres on maintaining mind and body balance through healthy lifestyle practices that combine traditional and complementary medicine."</p>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </div>

    <!-- Featured Physician -->
    <div class="col-lg-12 c_no_padding" id="c_home_doc_tabs">
        <ul class="c_top_ul">
            <li>
                <img src="assets/img/doctor.png" style="width:80px">
            </li>
            <li style="margin-left:15px;height:80px;vertical-align:text-top;margin-top:14px"><span class="c_font_4" style="bottom:10px">Featured Physicians</span></li>
        </ul>
        <div class="col-lg-12 c_no_padding" style="margin-top:-20px">
            <ul class="c_top_ul" id="featured_doc_slider">
                <?php
                for($i=1;$i<7;$i++){
                ?>
                <li>
                    <div class="c_doc_box item" <?php if($i!=4){ ?>style="margin-right:10px"<?php } ?>>
                        <ul class="c_ul_1" style="width:252px">
                            <li style="width:100%"><div align="center"><img src="assets/img/doc_user.png" width="70px"></div></li>
                            <li style="width:100%;margin-top:20px"><div class="c_font_5" style="text-align:center">Dr. Ananada Godagama</div></li>
                            <li style="width:100%;margin-top:15px"><div class="c_font_5" style="text-align:center">Specialized in neurology</div></li>
                            <li style="width:100%;margin-top:15px"><div class="c_font_5" style="text-align:center;font-size:13px">Katugasthota, Kandy</div></li>
                        </ul>
                    </div>
                </li>
                <?php
                }
                ?>
            </ul>
        </div>
        <div style="width:100%" align="center" >
            <ul class="c_top_ul" style="cursor:pointer">
                <li style="margin-top:15px"><img src="assets/img/Plus Filled-100.png" width="25px"></li>
                <li style="color:#39b54a;margin-left:10px">Loadmore</li>
            </ul>
        </div>
    </div>
    <!-- Featured Physician -->
    <!-- Top Rated Physician -->
    <div class="col-lg-12 c_no_padding" id="c_home_doc_tabs">
        <ul class="c_top_ul">
            <li>
                <img src="assets/img/doctor.png" style="width:80px">
            </li>
            <li style="margin-left:15px;height:80px;vertical-align:text-top;margin-top:14px"><span class="c_font_4" style="bottom:10px">Top Rated Physicians</span></li>
        </ul>
        <div class="col-lg-12 c_no_padding" style="margin-top:-20px">
            <ul class="c_top_ul">
                <?php
                for($i=1;$i<5;$i++){
                ?>
                <li>
                    <div class="c_doc_box" <?php if($i!=4){ ?>style="margin-right:10px"<?php } ?>>
                        <ul class="c_ul_1" style="width:252px">
                            <li style="width:100%"><div align="center"><img src="assets/img/doc_user.png" width="70px"></div></li>
                            <li style="width:100%;margin-top:20px"><div class="c_font_5" style="text-align:center">Dr. Ananada Godagama</div></li>
                            <li style="width:100%;margin-top:15px"><div class="c_font_5" style="text-align:center">Specialized in neurology</div></li>
                            <li style="width:100%;margin-top:15px"><div class="c_font_5" style="text-align:center;font-size:13px">Katugasthota, Kandy</div></li>
                        </ul>
                    </div>
                </li>
                <?php
                }
                ?>
            </ul>
        </div>
        <div style="width:100%" align="center">
            <ul class="c_top_ul" style="cursor:pointer">
                <li style="margin-top:15px"><img src="assets/img/Plus Filled-100.png" width="25px"></li>
                <li style="color:#39b54a;margin-left:10px">Loadmore</li>
            </ul>
        </div>
    </div>
    <!-- Top Rated Physician -->
    <!-- Community Suggestions -->
    <div class="col-lg-12 c_no_padding" id="c_home_com_sug">
        <ul class="c_top_ul">
            <li>
                <img src="assets/img/community.png" style="width:80px">
            </li>
            <li style="margin-left:15px;height:80px;vertical-align:text-top;margin-top:-13px"><span class="c_font_4" style="bottom:10px">Community Suggestions</span></li>
        </ul>
        <div class="col-lg-12 c_no_padding" >
            <ul class="c_top_ul">
                <?php
                for($i=1;$i<=5;$i++){
                ?>
                <li>
                    <div class="c_com_sug_doc" <?php if($i!=5){ ?>style="margin-right:10px"<?php } ?>>
                        <ul class="c_ul_1" style="width:198px">
                            <li style="width:100%"><div class="c_font_5" style="text-align:center">Dr. Ananada Godagama</div></li>
                            <li style="width:100%;margin-top:15px"><div class="c_font_5" style="text-align:center">Specialized in neurology</div></li>
                            <li style="width:100%;margin-top:15px"><div class="c_font_5" style="text-align:center;font-size:13px">Katugasthota, Kandy</div></li>
                        </ul>
                    </div>
                </li>
                <?php
                }
                ?>
            </ul>
        </div>
        <div style="width:100%" align="center">
            <ul class="c_top_ul" style="cursor:pointer">
                <li style="margin-top:15px"><img src="assets/img/Plus Filled-100.png" width="25px"></li>
                <li style="color:#39b54a;margin-left:10px">Loadmore</li>
            </ul>
        </div>
    </div>
    <!-- Community Suggestions -->
    <!-- Find by Area -->
    <div class="col-lg-6 c_no_padding" style="margin-left:60px">
        <ul class="c_top_ul">
            <li><img src="assets/img/map.png" style="width:223px;height:316px;margin-top:-110px" class="wow zoomIn"></li>
            <li>
                <div style="width:345px;padding-right:40px;border-right:5px solid rgb( 57, 181, 74 );margin-top:40px;padding-bottom:80px">
                    <ul class="c_ul_1">
                        <li>
                            <ul class="c_top_ul">
                                <li><img src="assets/img/geo_pin.png" width="42px"></li>
                                <li style="margin-left:15px;height:80px;vertical-align:text-top;margin-top:-13px"><span class="c_font_4" style="bottom:10px">Find by Area</span></li>
                            </ul>
                        </li>
                        <li style="width:100%">
                            Seleted Area
                        </li>
                        <li style="width:100%;margin-top:20px">
                            <input type="text" class="c_text_box_1" style="width:100%" placeholder=""/>
                        </li>
                        <li  style="width:100%;margin-top:30px">
                            <button type="button" class="c_button_1">Search</button>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
    <div class="col-lg-5 c_no_padding" style="padding:40px 40px">
        <ul class="c_ul_1">
            <li>
                <ul class="c_top_ul">
                    <li><img src="assets/img/rss.png" width="40px"></li>
                    <li style="margin-left:15px;height:80px;vertical-align:text-top;margin-top:-13px"><span class="c_font_4" style="bottom:10px">Subscribe to Newsletter</span></li>
                </ul>
            </li>
            <li style="width:100%">
                Email Address
            </li>
            <li style="width:100%;margin-top:20px">
                <input type="text" class="c_text_box_1" style="width:100%" placeholder=""/>
            </li>
            <li  style="width:100%;margin-top:30px">
                <button type="button" class="c_button_2">Subscribe</button>
            </li>
        </ul>
    </div>
    <!-- Find by Area -->
</div>
<!-- Home Page Content -->

@stop