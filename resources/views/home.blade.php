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
    <div id="featured" class="col-lg-12 c_no_padding c_home_doc_tabs">
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
    <div id="topRated" class="col-lg-12 c_no_padding c_home_doc_tabs">
        <ul class="c_top_ul">
            <li>
                <img src="assets/img/doctor.png" style="width:80px">
            </li>
            <li style="margin-left:15px;height:80px;vertical-align:text-top;margin-top:14px"><span class="c_font_4" style="bottom:10px">Top Rated Physicians</span></li>
        </ul>
        <div class="col-lg-12 c_no_padding" style="margin-top:-20px">
            <ul class="c_top_ul">
                <?php
                $i=1;
                foreach($top_rated_docs as $doc){
                //echo $i;
                ?>
                <li>
                    <a href="{{ URL::asset('/profile/Dr.'.$doc['doc_first_name'].$doc['doc_last_name'].'/'.$doc['doc_id']) }}">
                    <div class="c_doc_box" <?php if($i!=4){ ?>style="margin-right:10px"<?php } ?>>
                        <ul class="c_ul_1" style="width:252px">
                            <li style="width:100%"><div align="center"><img src="{{ URL::asset($doc['image_path']) }}" width="90px" height="90px"></div></li>
                            <li style="width:100%;margin-top:20px"><div class="c_font_5" style="text-align:center"><?php echo $doc['doc_first_name']." ".$doc['doc_last_name'];  ?></div></li>
                            <li style="width:100%;margin-top:15px"><div class="c_font_5" style="text-align:center">
                                    <?php
                                    for($y=1;$y<=5;$y++){
                                    if($y<=$doc['doc_rating']){
                                    ?>
                                    <img src="{{ URL::asset('assets/img/star_3.png') }}" class="c_sm_star">
                                    <?php
                                    }else{
                                    ?>
                                    <img src="{{ URL::asset('assets/img/star.png') }}" class="c_sm_star">
                                    <?php
                                    }
                                    }
                                    ?>
                                </div></li>
                            <li style="width:100%;margin-top:15px"><div class="c_font_5" style="text-align:center;font-size:13px"><?php echo $doc['doc_address_2'].",".$doc['doc_city']; ?></div></li>
                        </ul>
                    </div>
                    </a>
                </li>
                <?php
                    $i++;
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
    <div id="community" class="col-lg-12 c_no_padding c_home_com_sug">
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
    <div id="map" class="col-lg-6 c_no_padding" style="margin-left:60px">
        <ul class="c_top_ul">
            <li>
                <img src="assets/img/map.png" style="width:223px;height:316px;margin-top:-110px" class="wow zoomIn" usemap="#Map">
                <map name="Map" id="Map">
                    <area alt="" data-toggle="tooltip" title="Kurunagala" onclick="pick_location('Kurunagala')" shape="poly" coords="37,131,42,141,42,150,36,157,31,165,26,174,25,183,26,197,27,202,32,200,39,199,44,205,44,205,50,201,55,195,62,197,69,191,72,181,70,171,66,157,63,149,58,143" />
                    <area alt="" data-toggle="tooltip" title="Anuradhapura" onclick="pick_location('Anuradhapura')" shape="poly" coords="55,104,62,98,70,96,76,91,78,86,78,82,84,80,90,79,94,86,96,93,99,108,100,115,99,124,91,130,87,137,88,148,80,151,77,155,71,161,64,158,55,144,45,138,39,135,35,131,31,127,29,121,31,113,34,107,35,102,40,98,48,97" />
                    <area alt="" data-toggle="tooltip" title="Colombo" onclick="pick_location('Colombo')" shape="poly" coords="22,226,20,230,21,236,23,241,28,242,33,239,37,240,40,240,45,239,43,235,46,232,47,227,34,231,42,227,30,232" />
                    <area alt="" data-toggle="tooltip" title="Gampaha" onclick="pick_location('Gampaha')" shape="poly" coords="20,202,25,202,30,200,34,200,39,200,46,204,44,208,42,212,46,215,44,219,46,228,40,227,37,229,30,230,25,229,21,227" />
                    <area alt="" data-toggle="tooltip" title="Monaragala" onclick="pick_location('Monaragala')" shape="poly" coords="137,189,131,195,127,199,127,205,124,206,119,205,116,208,113,212,115,216,120,220,119,227,115,234,111,239,109,244,108,253,107,257,104,258,100,251,97,252,93,261,93,267,95,274,96,279,100,279,108,269,115,270,120,272,124,275,132,271,137,269,141,262,146,259,148,252,150,238,148,222,139,215,143,208" />
                    <area alt="" data-toggle="tooltip" title="Polonnaruwa" onclick="pick_location('Polonnaruwa')" shape="poly" coords="127,151,123,154,120,163,121,170,119,176,114,173,110,171,100,171,93,173,88,173,87,168,89,162,91,159,92,154,90,151,86,150,86,145,86,141,89,135,91,129,96,127,99,126,104,126,111,129,117,131,122,135,125,132" />
                </map>
            </li>
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
                            <input type="text" id="location_txt" class="c_text_box_1" style="width:100%" placeholder=""/>
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