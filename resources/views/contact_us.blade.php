@extends('layout')
@section('content')

<!-- Ayurvedic Therapies -->
<div class="container c_container" style="padding: 0px">
    <div align="center" class="embed-responsive" style="background-size: 1170px;background-position-y: -215px;height: 170px;background-image: url({{ URL::asset('assets/img/contactus.jpg') }})">
        <div class="c_video_wrapper" style="height: 170px">
            <h1 style=" color: #000000;text-shadow: 0px 5px 10px #000;margin: 0px;padding-top: 65px;font-size: 45px">Contact Us</h1>
        </div>
    </div>
    <div class="col-lg-12 c_no_padding" style="padding: 0px 40px">
        <div class="col-lg-4" style="padding: 50px 60px">
            <ul class="c_ul_1" style="margin-bottom: 40px">
                <li><span style="font-size: 26px;font-weight: 500">Address</span></li>
                <li style="margin-top: 10px"><span>1234, SLIIT Malabe Campus,</span></li>
                <li><span>Malabe</span></li>
            </ul>

            <ul class="c_ul_1" style="margin-bottom: 40px">
                <li><span style="font-size: 26px;font-weight: 500">Telephone</span></li>
                <li style="margin-top: 10px"><span>+94 0113456789</span></li>
                <li><span>+94 7734424324</span></li>
            </ul>

            <ul class="c_ul_1">
                <li><span style="font-size: 26px;font-weight: 500">Email</span></li>
                <li style="margin-top: 10px"><span>eayurveda@info.com</span></li>
            </ul>
        </div>
        <div class="col-lg-8" style="padding-top: 50px">
            <ul class="c_ul_1">
                <li><span style="font-size: 26px;font-weight: 500">Location</span></li>
                <li style="margin-top: 20px">
                    <div class="col-lg-12 c_no_padding"  id="mapc" style="border-radius: 0px !important;">

                    </div>
                </li>
            </ul>

        </div>
    </div>
</div>

<!-- Google Maps Scripts -->

<script type="text/javascript">
    var gmap_2, mapCanvas_2, mapOptions_2 = { zoomControl: true, streetViewControl: false, noClear: true };
    var marker_2;

    var image_2 = '{{ URL::asset('assets/img/gps_pin.png') }}';

    function mapInitialize_2( mapCenter, mapZoom ) {
        mapOptions_2.center = mapCenter;
        mapOptions_2.zoom = mapZoom;
        mapCanvas_2.setAttribute( "style", "height:" + window.innerHeight + "px;" );
        setTimeout( function() {
            gmap_2 = new google.maps.Map( mapCanvas_2, mapOptions_2 );
            marker_2 = new google.maps.Marker({position: mapCenter,map: gmap_2,icon: image_2});
        }, 20 );


    }
    window.onorientationchange = function() {
        mapInitialize_2( gmap_2.getCenter(), gmap_2.getZoom() );
    }
    function startup_2() {
        setTimeout( function() {
            mapCanvas_2 = document.getElementById("mapc");
            mapInitialize_2( new google.maps.LatLng(6.9147, 79.9733), 17 );
        }, 125 );
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js" onload="startup_2()"></script>

<!-- Google Maps Scripts -->

@stop