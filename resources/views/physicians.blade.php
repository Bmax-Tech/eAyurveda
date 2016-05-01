@extends('layout')
@section('content')

<!-- Ayurvedic Therapies -->
<div class="container c_container" style="padding: 0px">
    <div align="center" class="embed-responsive" style="background-size: 1350px;background-position-y: -360px;height: 170px;background-image: url({{ URL::asset('assets/img/physicians_back_drop.jpg') }})">
        <div class="c_video_wrapper" style="height: 170px">
            <h1 style=" color: #39B54A;margin: 0px;padding-top: 65px;font-size: 45px">Ayurvedic Physicians</h1>
        </div>
    </div>

    <div class="col-lg-12 c_no_padding" style="margin-top: 10px">
        <div class="col-lg-12 c_no_padding c_phy_top_ul">
            <ul class="c_top_ul">
                <li><div class="c_phy_link c_link_active" id="phy_link_0" onclick="phy_type_click('ALL','0')">ALL</div></li>
        <?php
            $i=1;
            foreach(range('A','Z') as $letter){
        ?>
                <li><div class="c_phy_link" id="phy_link_<?php echo $i; ?>" onclick="phy_type_click('<?php echo $letter; ?>','<?php echo $i; ?>')"><?php echo $letter; ?></div></li>
        <?php
                $i++;
            }
        ?>
            </ul>
        </div>
        <div class="c_phy_ajax_load">
            <!-- Ajax Results Will load Here -->
        </div>
        <form id="physicians_paginate_data">
            <input id="phy_page_no" type="hidden" name="page" value="1"/>
            <input id="phy_page_type" type="hidden" name="type" value="ALL"/>
        </form>
        <!-- Hidden Page No Store -->
        <input type="hidden" id="pre_page_no" value="0">
        <input type="hidden" id="next_page_no" value="0">
        <!-- Hidden Page No Store -->
        <div class="col-lg-12 c_no_padding" style="margin-top: 20px;text-align: center">
            <ul class="c_top_ul" id="c_phy_paginate_box">
                <li id="c_phy_paginate_left"><img src="{{ URL::asset('assets/img/back_nav.png') }}" style="width: 30px"></li>
                <li style="margin: 0px 10px"><span id="c_phy_paginate_txt">1 to 9</span></li>
                <li id="c_phy_paginate_right"><img src="{{ URL::asset('assets/img/forward_nav.png') }}" style="width: 30px"></li>
            </ul>
        </div>
    </div>

</div>

<!-- Loading Pop Up Boxes -->
<div class="container" id="c_loading_msg">
    <div class="center-block c_pop_box_1_wrapper" style="width: 440px;height: 130px;margin-top: 18%">
        <ul class="c_top_ul" style="margin-left: 27px">
            <li style="width: 40%"><img src="assets/img/loading.gif"></li>
            <li><span style="font-size: 30px;font-weight: 100">Loading Results</span></li>
        </ul>
    </div>
</div>
<!-- Loading Pop Up Boxes -->

@stop