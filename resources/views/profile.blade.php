@extends('layout')
@section('content')

    <?php $PRE_DATE = new \DateTime(); ?>
    <input type="hidden" id="profile_view_page" value="YES"/>
    <input type="hidden" id="hidden_doc_id" value="{{ $doctor['doctor_data']->id }}"/>
    <input type="hidden" id="base_url" value="{{ URL::asset('') }}"/>
    <div class="container c_container c_no_padding">
    <div class="col-lg-12 c_no_padding" style="padding:20px 20px 20px 0px">
        <div class="col-lg-3">
            {{--<img src="assets/img/doctor.png">--}}
            <div style="background-position: center;background-image:url({{ URL::asset($doctor['image_data']->image_path) }});width: 100%;height: 230px;background-color: rgba(57, 181, 74, 0.22);background-repeat: no-repeat;background-size:260px"></div>
        </div>
        <div class="col-lg-9 c_no_padding">
            <ul class="c_ul_1">
                <li style="height: 40px"><div class="col-lg-8 c_no_padding"><span style="font-size: 25px">Dr. {{ $doctor['doctor_data']->first_name }} {{ $doctor['doctor_data']->last_name }}</span></div><div class="col-lg-4 c_no_padding">Rating&nbsp;&nbsp;&nbsp;
                        <?php
                            for($i=1;$i<=5;$i++){
                                if($i<=$doctor['doctor_data']->rating){
                        ?>
                                <img src="{{ URL::asset('assets/img/star_2.png') }}" class="c_sm_star">
                        <?php
                                }else{
                        ?>
                                <img src="{{ URL::asset('assets/img/star.png') }}" class="c_sm_star">
                        <?php
                                 }
                            }
                        ?>
                </div></li>
                <li><?php if(($doctor['doctor_data']->doc_type) == "FORMAL"){ ?>Registered ID : <?php echo $doctor['formal_data']->ayurvedic_id; } ?></li>
                <li style="padding: 10px 0px"><hr class="c_hr_1"/></li>
                <li>Location : {{ $doctor['doctor_data']->address_1 }},&nbsp;{{ $doctor['doctor_data']->address_2 }},&nbsp;{{ $doctor['doctor_data']->city }},&nbsp;{{ $doctor['doctor_data']->district }}</li>
                <li><div class="col-lg-6 c_no_padding">Mobile : {{ $doctor['doctor_data']->contact_number }}</div><div class="col-lg-6 c_no_padding">Email : {{ $doctor['doctor_data']->email }}</div></li>
                <li style="margin-top: 30px"><span style="font-size: 25px;color:#085426;">Overview</span></li>
                <li style="margin-top: 10px"><p class="c_no_padding" style="text-align: justify">{{ $doctor['doctor_data']->description }}</p></li>
            </ul>
        </div>
        <div class="col-lg-12" style="padding: 10px 30px 10px 30px">
        <div class="col-lg-4 c_no_padding">
            <ul class="c_ul_1">
                <li><span style="font-size: 25px;color:#085426;">Specialized on</span></li>
                <li style="padding-top: 20px">
                    <div class="col-lg-12 c_no_padding">
                        <ul class="c_check_list">
                            <?php if(($doctor['spec_data']->spec_1) != ""){ ?><li>{{ $doctor['spec_data']->spec_1 }}</li><?php } ?>
                            <?php if(($doctor['spec_data']->spec_2) != ""){ ?><li>{{ $doctor['spec_data']->spec_2 }}</li><?php } ?>
                            <?php if(($doctor['spec_data']->spec_3) != ""){ ?><li>{{ $doctor['spec_data']->spec_3 }}</li><?php } ?>
                            <?php if(($doctor['spec_data']->spec_4) != ""){ ?><li>{{ $doctor['spec_data']->spec_4 }}</li><?php } ?>
                            <?php if(($doctor['spec_data']->spec_5) != ""){ ?><li>{{ $doctor['spec_data']->spec_5 }}</li><?php } ?>
                        </ul>
                    </div>

                </li>
            </ul>
        </div>
        <div class="col-lg-4 c_no_padding">
            <ul class="c_ul_1">
                <li><span style="font-size: 25px;color:#085426;">Treatment Techniques</span></li>
                <li style="padding-top: 20px">
                    <div class="col-lg-12 c_no_padding">
                        <ul class="c_check_list">
                            <?php if(($doctor['treat_data']->treat_1) != ""){ ?><li>{{ $doctor['treat_data']->treat_1 }}</li><?php } ?>
                            <?php if(($doctor['treat_data']->treat_2) != ""){ ?><li>{{ $doctor['treat_data']->treat_2 }}</li><?php } ?>
                            <?php if(($doctor['treat_data']->treat_3) != ""){ ?><li>{{ $doctor['treat_data']->treat_3 }}</li><?php } ?>
                            <?php if(($doctor['treat_data']->treat_4) != ""){ ?><li>{{ $doctor['treat_data']->treat_4 }}</li><?php } ?>
                            <?php if(($doctor['treat_data']->treat_5) != ""){ ?><li>{{ $doctor['treat_data']->treat_5 }}</li><?php } ?>
                        </ul>
                    </div>

                </li>
            </ul>
        </div>
        <div class="col-lg-4 c_no_padding">
            <ul class="c_ul_1" style="margin-bottom: 0px">
                <li><span style="font-size: 25px;color:#085426;">Consultation Times</span></li>
                <li style="padding-top: 20px">
                    <div class="col-lg-12 c_no_padding">
                        <ul class="c_clock_list">
                            <li>10:00 AM to 01:00 PM</li>
                            <li>02:00 PM to 04:00 PM</li>
                            <li>05:00 PM to 08:00 PM</li>
                        </ul>
                    </div>
                </li>
                <li style="padding-top: 112px">
                    <button id="c_booking_btn"><img src="{{ URL::asset('assets/img/click.png') }}">&nbsp;&nbsp;Make Appointment</button>
                </li>
            </ul>
        </div>
        </div>
    </div>
    <!-- Google Maps -->
    <div class="col-lg-12 c_no_padding" style="font-size: 20px;background: #39B54A;color: #FFF;border-bottom: 3px solid #035600;padding: 7px 0px 7px 25px">
        <span>Location</span>
    </div>
    <div class="col-lg-12 c_no_padding" style="padding: 10px">
        <div class="col-lg-12 c_no_padding"  id="map-canvas">

        </div>
    </div>
    <!-- Google Maps -->
    <div class="col-lg-12 c_no_padding" style="font-size: 20px;background: #39B54A;color: #FFF;border-bottom: 3px solid #035600;padding: 7px 0px 7px 25px">
        <span>Comments</span>
        <button type="button" id="com_tab_back" onclick="change_com_tab('-')"><img src="{{ URL::asset('assets/img/back.png') }}" width="30px"></button>
        <button type="button" id="com_tab_next" onclick="change_com_tab('+')"><img src="{{ URL::asset('assets/img/next.png') }}" width="30px"></button>
        <span id="c_comments_count_span">0</span>
    </div>
    <div class="col-lg-12 c_no_padding" id="user_comments_box">
        <div class="center-block" id="comments_loading">
            <div style="margin-left: 38%;margin-top: 3%;margin-bottom: 3%">
            <ul class="c_top_ul">
                <li><img src="{{ URL::asset('assets/img/comments_loader.gif') }}" style="width: 90px"></li>
                <li><span style="font-size: 18px;font-weight: 500">Loading Comments ...</span></li>
            </ul>
            </div>
        </div>
        <div class="center-block" id="no_comments_div" style="display: none">
            <div style="margin-left: 38%;margin-top: 3%;margin-bottom: 3%">
                <ul class="c_top_ul">
                    <li><img src="{{ URL::asset('assets/img/no_comments.png') }}" style="width: 55px"></li>
                    <li style="margin-left: 15px"><span style="font-size: 18px;font-weight: 500">No Comments Found...</span></li>
                </ul>
            </div>
        </div>
        <div id="comments_load_div" style="display: none">
            <!-- Comments Load Here -->
        </div>
    </div>
    <div class="col-lg-12 c_no_padding" style="margin-top: 10px;font-size: 20px;background: #39B54A;color: #FFF;border-bottom: 3px solid #035600;padding: 7px 0px 7px 25px">
        <span>Post Comment</span>
    </div>
    <div class="col-lg-12 c_no_padding">
        <div class="col-lg-12 c_no_padding" style="padding: 20px">
            <div class="col-lg-1" style="padding: 5px">
                <?php
                // Check whether user in logged or not
                $user_id=0;// If user is not logged user
                if(isset($_COOKIE['user'])){
                $user = json_decode($_COOKIE['user'],true);
                $user_id = $user[0]['id'];// Assign logged user`s id
                ?>
                <div class="c_comment_profile_icon" style="background-image:url({{ URL::asset('profile_images/user_images/user_profile_img_'.$user_id.'.png') }})"></div>
                <?php
                }else{
                ?>
                <div class="c_comment_profile_icon" style="background-image:url({{ URL::asset('assets/img/comment_user.png') }});background-size: 50px"></div>
                <?php
                }
                ?>
            </div>
            <div class="col-lg-11">
                <div class="c_comment_body" style="background: rgba(255, 247, 0, 0.15)">
                    <form name="doctor_comment" id="doctor_comment">
                    <input type="hidden" name="doctor_id" value="{{ $doctor['doctor_data']->id }}">
                    <ul class="c_ul_1" style="margin-bottom: 0px">
                        <li style="font-size: 13px;color: rgb(0, 109, 22)">
                            <?php
                            // Check whether user in logged or not
                            if(isset($_COOKIE['user'])){
                            //$user = json_decode($_COOKIE['user'],true);
                            //$user_id = $user[0]['id'];// Assign logged user`s id
                            ?>
                            <ul class="c_top_ul">
                                <li><?php echo $user[0]['first_name']; ?>&nbsp;<?php echo $user[0]['last_name']; ?></li>
                                <li style="margin-left: 45px">Post Date - <?php echo $PRE_DATE->format('d/m/Y'); ?></li>
                            </ul>
                            <?php
                            }
                            ?>
                        </li>
                        <input type="hidden" name="user_id" id="hidden_user_id" value="<?php echo $user_id; ?>">
                        <li style="height: 25px;margin-top: 10px">
                            <div class="col-lg-2 c_no_padding">Select Rating</div>
                            <div class="col-lg-5 c_no_padding">
                                <input type="hidden" name="star_rating" id="star_rating" value="0"/>
                                <img src="{{ URL::asset('assets/img/star.png') }}" class="c_sm_star c_rate" id="c_comment_star_1" onclick="comment_rate_star('1')">
                                <img src="{{ URL::asset('assets/img/star.png') }}" class="c_sm_star c_rate" id="c_comment_star_2" onclick="comment_rate_star('2')">
                                <img src="{{ URL::asset('assets/img/star.png') }}" class="c_sm_star c_rate" id="c_comment_star_3" onclick="comment_rate_star('3')">
                                <img src="{{ URL::asset('assets/img/star.png') }}" class="c_sm_star c_rate" id="c_comment_star_4" onclick="comment_rate_star('4')">
                                <img src="{{ URL::asset('assets/img/star.png') }}" class="c_sm_star c_rate" id="c_comment_star_5" onclick="comment_rate_star('5')">
                                <span style="color: red;margin-left: 20px;font-size: 13px;display: none" id="wrn_star_rating"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span>&nbsp;Select Rating</span>
                            </div>
                        </li>
                        <li style="padding-top: 5px">
                            <div class="col-lg-2 c_no_padding">Comment</div>
                            <div class="col-lg-10 c_no_padding" style="padding-right: 10px;padding-top: 5px">
                                <textarea class="c_comment_textarea" name="comment_description" id="comment_description"></textarea>
                            </div>
                        </li>
                        <li>
                            <div class="row c_no_padding">
                            <div class="col-lg-2 c_no_padding"></div>
                            <div class="col-lg-10 c_no_padding">
                            <button class="c_post_comment_btn" type="button" onclick="check_valid_comment()">Post Your Comment</button>
                            </div>
                            </div>
                        </li>
                    </ul>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <span id="hidden_star_url" style="display: none">{{ URL::asset('assets/img/star.png') }}</span>
    <span id="hidden_green_star_url" style="display: none">{{ URL::asset('assets/img/star_2.png') }}</span>

    <!-- Appointment Form Pop Up -->

    <div class="container c_pop_up_box_reservation">
        <div class="center-block c_pop_box_1_wrapper" style="width: 456px;margin-top: 5%">
            <button class="c_close_btn res_btn_close" style="margin-left: 427px"><img src="{{ URL::asset('assets/img/close_btn.png') }}"></button>
            <div class="c_reservation_box" id="res_box_1">
                <form id="c_reservation_form" method="post">
                    <input type="hidden" name="doc_email" value="{{ $doctor['doctor_data']->email }}">
                    <input type="hidden" name="doc_first_name" value="{{ $doctor['doctor_data']->first_name }}">
                    <input type="hidden" name="doc_last_name" value="{{ $doctor['doctor_data']->last_name }}">
                    <ul class="c_ul_1">
                        <li class="c_add_margin_20">
                            <span class="c_font_2">Appointment Form</span>
                        </li>
                        <li style="margin-bottom: 5px">
                            <span style="color: #FFF;">Name</span>
                        </li>
                        <li  class="c_add_margin_20">
                            <input disabled type="text" class="c_text_box_1" value="" id="res_name" onkeypress="remove_highlight('res_name','c_error_input_field_highlight')" name="res_name" autocomplete="off" spellcheck="false"/>
                        </li>
                        <li style="margin-bottom: 5px">
                            <span style="color: #FFF;">Contact Number</span>
                        </li>
                        <li  class="c_add_margin_20">
                            <input disabled type="text" class="c_text_box_1" value="" id="res_contact" onkeypress="remove_highlight('res_contact','c_error_input_field_highlight')" name="res_contact" autocomplete="off" spellcheck="false" placeholder="Eg:- 07X XXX XXXX"/>
                        </li>
                        <li style="margin-bottom: 5px">
                            <span style="color: #FFF;">Area *</span>
                        </li>
                        <li class="c_add_margin_20">
                            <select class="c_select_box_1" name="res_district" data-id="6" id="res_district" onchange="remove_highlight('res_district','c_error_input_field_highlight')">
                                <option value="select">Select</option>
                                <option value="Ampara">Ampara</option>
                                <option value="Anuradhapura">Anuradhapura</option>
                                <option value="Badulla">Badulla</option>
                                <option value="Batticaloa">Batticaloa</option>
                                <option value="Colombo">Colombo</option>
                                <option value="Galle">Galle</option>
                                <option value="Gampaha">Gampaha</option>
                                <option value="Hambantota">Hambantota</option>
                                <option value="Jaffna">Jaffna</option>
                                <option value="Kalutara">Kalutara</option>
                                <option value="Kandy">Kandy</option>
                                <option value="Kegalle">Kegalle</option>
                                <option value="Kilinochchi">Kilinochchi</option>
                                <option value="Kurunegala">Kurunegala</option>
                                <option value="Mannar">Mannar</option>
                                <option value="Matale">Matale</option>
                                <option value="Matara">Matara</option>
                                <option value="Monaragala">Monaragala</option>
                                <option value="Mullaitivu">Mullaitivu</option>
                                <option value="Nuwara Eliya">Nuwara Eliya</option>
                                <option value="Polonnaruwa">Polonnaruwa</option>
                                <option value="Puttalam">Puttalam</option>
                                <option value="Ratnapura">Ratnapura</option>
                                <option value="Trincomalee">Trincomalee</option>
                                <option value="Vavuniya">Vavuniya</option>
                            </select>
                        </li>
                        <li style="margin-bottom: 5px">
                            <span style="color: #FFF;">Time Slot *</span>
                        </li>
                        <li class="c_add_margin_20">
                            <select class="c_select_box_1" name="res_time_slot" data-id="6" id="res_time_slot" onchange="remove_highlight('res_time_slot','c_error_input_field_highlight')">
                                <option value="select">Select</option>
                                <option value="10:00 AM to 01:00 PM">10:00 AM to 01:00 PM</option>
                                <option value="02:00 PM to 04:00 PM">02:00 PM to 04:00 PM</option>
                                <option value="05:00 PM to 08:00 PM">05:00 PM to 08:00 PM</option>
                            </select>
                        </li>
                        <li style="padding:0px 3px;margin-top:35px">
                            <button type="button" class="c_button_res_1">Submit</button>
                        </li>
                    </ul>
                </form>
            </div>
            <div class="c_reservation_box" id="res_box_2" style="display: none;height: 504px">
                <div id="c_res_pending" style="padding: 40px;background: #FFF;border-radius: 10px;margin:auto;margin-top: 145px">
                    <div style="font-size: 24px;text-align: center;">Sending Appointment Details</div>
                    <img src="{{ URL::asset('assets/img/loading_3.gif') }}" id="c_fog_reset_img" style="margin: 30px 90px 20px 85px;">
                </div>
                <div id="c_res_suc_box" style="display: none;padding: 155px 120px">
                    <ul class="c_ul_1">
                        <li>
                            <img src="{{ URL::asset('assets/img/ok.png') }}" style="width: 60px;margin-left: 45px;">
                        </li>
                        <li style="margin-top: 40px">
                            <div style="color: #FFF;font-size: 14px">Appointment Make</div>
                        </li>
                        <li>
                            <span class="c_font_2">Successful</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Appointment Form Pop Up -->

    <!-- Google Maps Scripts -->

    <script type="text/javascript">
        var gmap, mapCanvas, mapOptions = { zoomControl: true, streetViewControl: false, noClear: true };
        var marker;

        var image_1 = '{{ URL::asset('assets/img/gps_pin.png') }}';

        function mapInitialize( mapCenter, mapZoom ) {
            mapOptions.center = mapCenter;
            mapOptions.zoom = mapZoom;
            mapCanvas.setAttribute( "style", "height:" + window.innerHeight + "px;" );
            setTimeout( function() {
                gmap = new google.maps.Map( mapCanvas, mapOptions );
                marker = new google.maps.Marker({position: mapCenter,map: gmap,icon: image_1});
        }, 20 );


        }
        window.onorientationchange = function() {
            mapInitialize( gmap.getCenter(), gmap.getZoom() );
        }
        function startup() {
            setTimeout( function() {
                mapCanvas = document.getElementById("map-canvas");
                mapInitialize( new google.maps.LatLng({{ $doctor['doctor_data']->latitude }}, {{ $doctor['doctor_data']->longitude }}), 15 );
            }, 125 );
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js" onload="startup()"></script>

    <!-- Google Maps Scripts -->
@stop