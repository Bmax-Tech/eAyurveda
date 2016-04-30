<div id="coments12" class="container" style="background-color:#CCC;width:920px">
    <input type="hidden" name="page" id="page_number_hidden_com" value="1">
    <input type="hidden" name="page" id="start_com" value="0">
    <input type="hidden" name="page" id="end_com" value="4">
    <ul class="c_ul_1">
         <li>
            <div style="background: rgb(113, 125, 97);color: #FFF;font-size: 15px;padding: 7px 10px;border-bottom: 3px solid #035600;margin-bottom: 10px">
                  User Comments
            </div>
         </li>

        <li id="c_comment_result_ajax_box" style="height:420px;width:920px;margin-left:10px">
            <!--  Ajax Results Load Here -->
        </li>
        <li>
            <div class="col-lg-6 c_no_padding">

                <nav id="search_comment_pagination_panel">
                    <!-- Pagination Load Here -->
                </nav>
            </div>
            <div class="col-lg-6">
                <div style="float: right;padding: 20px 0px">
                    <span>Showing <span id="com_page_no"></span> results</span>
                </div>
            </div>
        </li>
    </ul>




    <input type="hidden" id="hidden_click_com_id" value="0"/>

</div>


<div id="commentRemovePopup" class="container pat_confirm1_box" >

    <div class="center-block pat_confirm1_box_wrapper" style="margin-right: 55%;margin-top: 15%;width: 375px">
        <button  class="pat_close_btn" onclick="commentRemovePopupClose()"><img src="{{ URL::asset('assets/img/close_btn.png') }}"></button>
        <div style="background: #4CBC5B;height: 145px;padding-top: 32px">

            <div class="container c_no_padding col-lg-12">
                <div class="col-lg-10 c_no_padding" style="margin-left: 30px">
                    <ul class="c_ul_1">
                        <li><span style="font-size: 20px;font-weight: 100;margin-left: 30px;color: #FFF">Please Confirm To Remove </span></li>

                        <li> <div style="padding-top: 30px">
                                <div class="col-lg-3 ">
                                    <button class="pat_view_btn_1" onclick="rem_com()" >Confirm</button>
                                </div>
                                <div class="col-lg-3" style="margin-left: 100px">
                                    <button class="pat_view_btn_1" onclick="commentRemovePopupClose()" >Cancel</button>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>

