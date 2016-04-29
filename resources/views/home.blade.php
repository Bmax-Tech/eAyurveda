@extends('layout')
@section('content')

<input type="hidden" id="home_hidden_check" value="YES"/>
<!-- Home Page Content -->
<div class="container c_container c_no_padding">
    <div class="col-lg-12 c_no_padding" id="c_home_banner">
        <div class="row owl-carousel owl-theme" id="home_slider" style="margin-left: 0px;margin-right: 0px">
            <?php
            foreach($health_tips as $tip){
            ?>
            <div class="item">
                <div class="col-lg-6" style="padding-top:30px;padding-left: 0px;padding-right: 0px">
                    <div class="wow slideInUp">
                        <p style="background:rgba(85,85,85,0.87);font-size:30px;color:rgba(255,255,255,1.00);display:inline-block;padding:12px 20px;padding-left:60px">
                            <?php echo $tip['tip']; ?>
                        </p>
                    </div>
                    <div class="wow slideInUp">
                        <p style="background:rgba(0,0,0,0.87);font-size:30px;color:rgba(255,255,255,1.00);display:inline-block;padding:12px 20px;padding-left:60px">
                            <?php echo $tip['discription_1']; ?>
                        </p>
                    </div>
                </div>
                <div class="col-lg-6" style="padding-right: 0px">
                    <div class="c_sub_banner wow zoomIn">
                        <span class="c_health_tip">Health Tip !</span>
                        <p>"<?php echo $tip['discription_2']; ?>"</p>
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
                    //echo '<pre>'.var_dump($featured_docs).'</pre>';
                $i=1;
                foreach($featured_docs as $f_cod){
                ?>
                <li>
                    <div class="c_doc_box item" <?php if($i!=4){ ?>style="margin-right:10px"<?php } ?>>
                        <a href="{{ URL::asset('/profile/Dr.'.$f_cod['doc_first_name'].$f_cod['doc_last_name'].'/'.$f_cod['doc_id']) }}">
                        <ul class="c_ul_1" style="width:252px">
                            <li style="width:100%"><div align="center"><img src="{{ URL::asset($f_cod['image_path']) }}" width="100px" height="94px"></div></li>
                            <li style="width:100%;margin-top:20px"><div class="c_font_5" style="text-align:center">Dr. <?php echo $f_cod['doc_first_name']." ".$f_cod['doc_last_name'];  ?></div></li>
                            <li style="width:100%;margin-top:7px"><div class="c_font_5" style="text-align:center">Specialized in neurology</div></li>
                            <li style="width:100%;margin-top:7px"><div class="c_font_5" style="text-align:center;font-size:13px"><?php echo $f_cod['doc_address_2'].",&nbsp;".$f_cod['doc_city'];  ?></div></li>
                        </ul>
                        </a>
                    </div>
                </li>
                <?php
                    $i++;
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
                            <li style="width:100%;margin-top:15px"><div class="c_font_5" style="text-align:center;font-size:13px"><?php echo $doc['doc_address_2'].",&nbsp;".$doc['doc_city']; ?></div></li>
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
                $i=1;
                foreach($community_sug as $com){
                ?>
                <li>
                    <a href="{{ URL::asset('/profile/Dr.'.$com['doc_first_name'].$com['doc_last_name'].'/'.$com['doc_id']) }}">
                    <div class="c_com_sug_doc" <?php if($i!=5){ ?>style="margin-right:10px"<?php } ?>>
                        <ul class="c_ul_1" style="width:198px">
                            <li style="width:100%"><div class="c_font_5" style="text-align:center">Dr. <?php echo $com['doc_first_name']." ".$com['doc_last_name'];  ?></div></li>
                            <li style="width:100%;margin-top:15px"><div class="c_font_5" style="text-align:center;font-size: 12px;max-width: 198px"><?php echo $com['doc_address_2'].", ".$com['doc_city'];  ?></div></li>
                            <li style="width:100%;margin-top:15px"><div class="c_font_5" style="text-align:center;font-size:13px"><img src="{{ URL::asset($com['image_path']) }}" style="width:30px;height: 30px;border-radius: 20px;border: 1px solid #fff;">&nbsp;&nbsp;<span style="font-style: italic"><?php echo $com['sug_user_name']; ?></span></div></li>
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
                    <area alt="" data-toggle="tooltip" title="Kaluthara" onclick="pick_location('Kaluthara')" shape="poly" coords="43,411,54,408,62,406,69,407,77,403,81,406,86,417,91,426,96,435,97,437,100,445,104,450,104,453,102,457,97,460,95,465,91,464,86,463,79,465,70,460,63,458,57,456,53,451" />
                    <area alt="" data-toggle="tooltip" title="Galle" onclick="pick_location('Galle')" shape="poly" coords="57,455,68,459,80,463,93,464,101,459,113,457,120,464,119,471,112,470,113,476,107,480,109,491,110,495,111,501,110,509,107,513,97,512,90,512,77,504,69,497,60,481,55,459" />
                    <area alt="" data-toggle="tooltip" title="Matara" onclick="pick_location('Matara')" shape="poly" coords="108,515,110,510,112,504,113,500,110,494,109,488,109,483,114,483,115,477,110,471,121,471,121,465,131,456,137,457,138,467,143,466,143,472,139,485,145,492,149,496,145,502,147,506,151,512,146,517,136,520,121,521" />
                    <area alt="" data-toggle="tooltip" title="Hambantota" onclick="pick_location('Hambantota')" shape="poly" coords="152,514,149,508,145,505,147,500,148,493,142,489,138,481,145,473,157,473,168,475,178,478,178,472,187,467,189,463,193,460,204,459,216,464,224,460,236,458,246,455,250,448,256,443,267,439,277,441,273,449,263,461,241,476,219,489" />
                    <area alt="" data-toggle="tooltip" title="Ampara" onclick="pick_location('Ampara')" shape="poly" coords="281,442,271,437,269,424,268,405,269,382,268,368,255,365,255,352,254,345,250,332,247,322,232,331,225,345,213,338,210,326,210,319,211,309,202,309,190,312,189,305,185,301,187,291,194,286,208,293,215,295,219,287,224,286,231,289,242,293,253,313,267,316,280,325,290,320,295,318,299,345,300,376" />
                    <area alt="" data-toggle="tooltip" title="Rathnapura" onclick="pick_location('Rathnapura')" shape="poly" coords="86,390,106,399,121,403,149,413,164,413,170,423,170,434,165,452,173,467,176,479,155,474,140,462,127,459,118,459,103,454,96,437,83,413,81,401,82,394" />
                    <area alt="" data-toggle="tooltip" title="Nuwara Eliya" onclick="pick_location('Nuwara Eliya')" shape="poly" coords="162,402,159,396,157,391,167,387,173,379,177,372,178,359,178,353,169,352,161,350,153,343,150,359,147,367,143,367,134,367,128,369,133,380,128,386,124,381,118,378,114,381,117,393,121,398,120,404,132,408,144,412,160,409" />
                    <area alt="" data-toggle="tooltip" title="Puttalama" onclick="pick_location('Puttalama')" shape="poly" coords="48,340,49,328,44,309,46,296,52,283,57,270,64,262,71,260,75,253,77,243,71,234,71,227,62,219,59,219,53,210,50,199,59,191,62,183,52,177,45,177,39,189,34,200,34,211,33,224,26,209,20,224,20,239,22,260,30,296,30,306,32,322,34,335,37,345" />
                    <area alt="" data-toggle="tooltip" title="Trincomalee" onclick="pick_location('Trincomalee')" shape="poly" coords="238,219,226,219,221,226,217,229,213,233,210,225,201,220,185,215,174,207,178,195,184,186,173,171,171,149,173,140,161,129,170,126,186,124,210,146,229,183" />
                    <area alt="" data-toggle="tooltip" title="Vavuniya" onclick="pick_location('Vavuniya')" shape="poly" coords="138,137,150,133,160,124,156,115,143,113,141,105,128,109,121,106,110,105,110,119,100,122,111,138,95,146,85,149,81,157,88,170,92,172,101,178,126,165,144,152" />
                    <area alt="" data-toggle="tooltip" title="Mullative" onclick="pick_location('Mullative')" shape="poly" coords="176,123,163,127,155,114,139,103,124,112,111,105,110,116,101,121,86,121,84,112,88,94,88,84,92,79,103,77,114,76,132,72,140,63,150,66,165,84" />
                    <area alt="" data-toggle="tooltip" title="Matale" onclick="pick_location('Matale')" shape="poly" coords="187,285,181,297,181,309,174,319,160,322,150,322,139,327,133,324,131,316,131,306,125,290,121,278,124,274,137,268,145,261,151,257,153,251,163,253" />
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