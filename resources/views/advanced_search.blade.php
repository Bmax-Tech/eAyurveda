@extends('layout')
@section('content')

        <!-- Search Result -->
<input type="hidden" id="doc_search_page1" value="YES"/>
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

        <div id="c_search_filter_box" >
            <form name="filter_selections" id="filter_selections">
            <div >

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
                    <?php
                    }
                    ?>
                            <!--Store the current page number-->
                       <input type="hidden" name="page" id="page_number_hidden1" value="1">
                        <!-- store the first result no of the page-->
                        <input type="hidden" name="page" id="start1" value="0">
                        <!-- Store the value of number of results per page-->
                        <input type="hidden" name="page" id="end1" value="4">
                        <div style="display: none" ><span  id="c_tot_doc_filter1">0</span></div>

            </div>
                </form>
        </div>


    <!-- Filters -->
    <!-- Doctor Results -->
    <div class="col-lg-12" style="padding-right: 0px">
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
            <li  id="c_doctor_result_ajax_box1" >
                <!--  Ajax Results Load Here -->
            </li>
            <li>
                <div class="col-lg-6 c_no_padding">
                    <nav id="search_doc_pagination_panel1">
                        <!-- Pagination Load Here -->
                    </nav>
                </div>
                <div class="col-lg-6">
                    <div style="float: right;padding: 20px 0px">
                        <span>Showing <span id="c_page_no1"></span> results</span>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <!-- Doctor Results -->
</div>

<!-- Search Result -->

<div class="container" id="c_loading_msg1">
    <div class="center-block c_pop_box_1_wrapper" style="width: 440px;height: 130px;margin-top: 18%">
        <ul class="c_top_ul" style="margin-left: 27px">
            <li style="width: 40%"><img src="assets/img/loading.gif"></li>
            <li><span style="font-size: 30px;font-weight: 100">Loading Results</span></li>
        </ul>
    </div>
</div>
<!-- Pop Up Boxes -->

@stop