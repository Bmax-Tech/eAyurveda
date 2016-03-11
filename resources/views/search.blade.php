@extends('layout')
@section('content')

<!-- Search Result -->
<input type="hidden" id="doc_search_page" value="YES"/>
<?php
    if(isset($advanced)){
?>
<input type="hidden" id="search_text_hidden" value="{{ $doc_name }}">
<?php
    }else{
?>
<input type="hidden" id="search_text_hidden" value="{{ $search_text }}">
<?php
    }
?>
<div class="container c_container c_no_padding">
    <!-- Filters -->
    <div class="col-lg-2 c_no_padding" style="min-width: 275px">
        <div id="c_search_filter_box" >
        <div style="border: 2px solid rgba(3,86,0,1.00);border-radius: 5px">
            <form name="filter_selections" id="filter_selections">
                <?php
                if(isset($advanced)){
                ?>
                    <input type="hidden" name="advanced_search" value="YES">
                    <input type="hidden" name="advanced_doc_name" value="{{ $doc_name }}">
                    <input type="hidden" name="advanced_doc_speciality" value="{{ $doc_speciality }}">
                    <input type="hidden" name="advanced_doc_treatment" value="{{ $doc_treatment }}">
                    <input type="hidden" name="advanced_doc_location" value="{{ $doc_location }}">
                    <input type="hidden" name="search_text_hidden" id="search_text_hidden" value="{{ $doc_name }}">
                <?php
                }else{
                ?>
                    <input type="hidden" name="advanced_search" value="NO">
                    <input type="hidden" name="search_text_hidden" id="search_text_hidden" value="{{ $search_text }}">
                    <input type="hidden" name="filter_loc" id="filter_loc_hidden" value="-">
                    <input type="hidden" name="filter_spec" id="filter_spec_hidden" value="-">
                <?php
                }
                ?>
                <input type="hidden" name="page" id="page_number_hidden" value="1">
                <ul class="c_ul_1" style="background:#39B54A;margin-bottom: 0px">
                    <li><div class="c_search_filter_f">Total Doctors<span style="float: right;background: rgba(255, 255, 255, 0.52);padding: 2px 12px;border-radius: 10px;color: #1A942A;margin-top: -2px;" id="c_tot_doc_filter">0</span></div></li>
                    <li><hr class="c_hr_1"/></li>
                    <li><div class="c_search_filter_f" style="background: #288E36">Rating</div></li>
                    <li>
                        <div style="background:#39B54A;padding: 18px 13px">
                            <input type="hidden" name="filter_star_rating" id="filter_star_rating" value="0">
                            <button type="button" class="c_filter_star star_1" onclick="filter_by_star_rating('1')"><span>1</span><img src="assets/img/star.png"></button>
                            <button type="button" class="c_filter_star star_2" onclick="filter_by_star_rating('2')"><span>2</span><img src="assets/img/star.png"></button>
                            <button type="button" class="c_filter_star star_3" onclick="filter_by_star_rating('3')"><span>3</span><img src="assets/img/star.png"></button>
                            <button type="button" class="c_filter_star star_4" onclick="filter_by_star_rating('4')"><span>4</span><img src="assets/img/star.png"></button>
                            <button type="button" class="c_filter_star star_5" onclick="filter_by_star_rating('5')"><span>5</span><img src="assets/img/star.png"></button>
                        </div>
                    </li>
                    <li><hr class="c_hr_1"/></li>
                    <li><div class="c_search_filter_f" style="background: #288E36">Specialization</div></li>
                    <li style="background:#39B54A;">
                        <div id="c_filter_spec_div" style="background:#39B54A;padding: 10px 13px;">
                            <ul class="c_ul_1" style="color: #FFF;padding-left: 5px;font-size: 13px;">
                                <?php
                                    foreach($spec as $item)
                                    {
                                        if($item->spec_list != ""){
                                ?>
                                <li><input type="radio" name="specialization" class="c_check_box" value="{{ $item->spec_list }}">{{ $item->spec_list }}</li>
                                <?php
                                        }
                                    }
                                ?>
                            </ul>
                        </div>
                    </li>
                    <li><hr class="c_hr_1"/></li>
                    <li><div class="c_search_filter_f" style="background: #288E36">District</div></li>
                    <li style="background:#39B54A;">
                        <div id="c_filter_loc_div" style="background:#39B54A;padding: 10px 13px;">
                            <ul class="c_ul_1" style="color: #FFF;padding-left: 5px;font-size: 13px;">
                                <li><input type="radio" name="district" class="c_check_box" value="Ampara">Ampara</li>
                                <li><input type="radio" name="district" class="c_check_box" value="Anuradhapura">Anuradhapura</li>
                                <li><input type="radio" name="district" class="c_check_box" value="Badulla">Badulla</li>
                                <li><input type="radio" name="district" class="c_check_box" value="Batticaloa">Batticaloa</li>
                                <li><input type="radio" name="district" class="c_check_box" value="Colombo">Colombo</li>
                                <li><input type="radio" name="district" class="c_check_box" value="Galle">Galle</li>
                                <li><input type="radio" name="district" class="c_check_box" value="Gampaha">Gampaha</li>
                                <li><input type="radio" name="district" class="c_check_box" value="Hambantota">Hambantota</li>
                                <li><input type="radio" name="district" class="c_check_box" value="Jaffna">Jaffna</li>
                                <li><input type="radio" name="district" class="c_check_box" value="Kalutara">Kalutara</li>
                                <li><input type="radio" name="district" class="c_check_box" value="Kandy">Kandy</li>
                                <li><input type="radio" name="district" class="c_check_box" value="Kegalle">Kegalle</li>
                                <li><input type="radio" name="district" class="c_check_box" value="Kilinochchi">Kilinochchi</li>
                                <li><input type="radio" name="district" class="c_check_box" value="Kurunegala">Kurunegala</li>
                                <li><input type="radio" name="district" class="c_check_box" value="Mannar">Mannar</li>
                                <li><input type="radio" name="district" class="c_check_box" value="Matale">Matale</li>
                                <li><input type="radio" name="district" class="c_check_box" value="Matara">Matara</li>
                                <li><input type="radio" name="district" class="c_check_box" value="Monaragala">Monaragala</li>
                                <li><input type="radio" name="district" class="c_check_box" value="Mullaitivu">Mullaitivu</li>
                                <li><input type="radio" name="district" class="c_check_box" value="Nuwara Eliya">Nuwara Eliya</li>
                                <li><input type="radio" name="district" class="c_check_box" value="Polonnaruwa">Polonnaruwa</li>
                                <li><input type="radio" name="district" class="c_check_box" value="Puttalam">Puttalam</li>
                                <li><input type="radio" name="district" class="c_check_box" value="Ratnapura">Ratnapura</li>
                                <li><input type="radio" name="district" class="c_check_box" value="Trincomalee">Trincomalee</li>
                                <li><input type="radio" name="district" class="c_check_box" value="Vavuniya">Vavuniya</li>
                            </ul>
                        </div>
                    </li>
                    <li style="padding: 5px;background:#39B54A;height: 54px">
                        <button type="button" onclick="filter_result_btn()" class="c_button_3"><img src="assets/img/filter.png" style="width:20px">&nbsp;&nbsp;&nbsp;Filter</button>
                        <div id="c_filter_no_select_wrn" style="display: none;position: relative; margin-top: -168px;">
                            <div style="border-radius: 5px;padding: 4px;width: 240px; height: 100px; background: #CE2316; margin-left: 10px;">
                                <div style="border-radius: 5px;background: #fff;width: 100%;height: 100%;text-align: center;padding-top: 30px">
                                    <span style="font-size: 20px;">Please Select any Field</span>
                                </div>
                            </div>
                            <div id="arrow_down" style="border-top:20px solid #CE2316"></div>
                        </div>
                    </li>
                    <li style="padding: 5px;background:#39B54A;text-align: center;color: #FFF">
                        <span style="cursor: pointer" onclick="filter_reset()">Reset</span>
                    </li>
                </ul>
            </form>
        </div>
        </div>
    </div>
    <!-- Filters -->
    <!-- Doctor Results -->
    <div class="col-lg-9" style="padding-right: 0px">
        <ul class="c_ul_1">
            <li>
                <?php
                if(isset($advanced)){
                ?>
                    <div style="background:#FF9235;color: #FFF;font-size: 15px;padding: 4px 10px;border-bottom: 3px solid #035600;margin-bottom: 10px">
                        <img src="{{ URL::asset('assets/img/advanced_search.png') }}" style="width: 30px;margin-right: 17px">Advanced Search Results for "{{ $doc_name }} / {{ $doc_speciality }} / {{ $doc_treatment }} / {{ $doc_location }}"
                    </div>
                <?php
                }else{
                ?>
                    <div style="background:#39B54A;color: #FFF;font-size: 15px;padding: 7px 10px;border-bottom: 3px solid #035600;margin-bottom: 10px">
                        Results for "{{ $search_text }}"
                    </div>
                <?php
                }
                ?>
            </li>
            <li id="c_doctor_result_ajax_box" style="height: 340px;min-height: 340px;">
                <!--  Ajax Results Load Here -->
            </li>
            <li>
                <div class="col-lg-6 c_no_padding">
                    <nav id="search_doc_pagination_panel">
                        <!-- Pagination Load Here -->
                    </nav>
                </div>
                <div class="col-lg-6">
                    <div style="float: right;padding: 20px 0px">
                        <span id="c_show_page_no">Showing <span id="c_page_no"></span> results</span>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <!-- Doctor Results -->
</div>

<!-- Search Result -->

<div class="container" id="c_loading_msg">
    <div class="center-block c_pop_box_1_wrapper" style="width: 440px;height: 130px;margin-top: 18%">
        <ul class="c_top_ul" style="margin-left: 27px">
            <li style="width: 40%"><img src="assets/img/loading.gif"></li>
            <li><span style="font-size: 30px;font-weight: 100">Loading Results</span></li>
        </ul>
    </div>
</div>
<!-- Pop Up Boxes -->

@stop