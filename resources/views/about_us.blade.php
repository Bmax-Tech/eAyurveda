@extends('layout')
@section('content')

<!-- Ayurvedic Therapies -->
<div class="container c_container" style="padding: 0px">
    <div align="center" class="embed-responsive" style="background-size: 1170px;background-position-y: -73px;height: 170px;background-image: url({{ URL::asset('assets/img/about_us.png') }})">
        <div class="c_video_wrapper" style="height: 170px">
            <h1 style=" color: #000000;text-shadow: 0px 5px 10px #000;margin: 0px;padding-top: 65px;font-size: 45px">About Us</h1>
        </div>
    </div>
    <div class="col-lg-12 c_no_padding" style="margin-top:20px;padding: 0px 40px">
        <div class="col-lg-4 wow slideInUp">
            <div class="c_therapy_cards" style="border-radius: 50%;background: rgb(69, 138, 78);">
                <div style="background-image: url({{ URL::asset('profile_images/about_us/icon_1.jpg') }});border-color: #FFF;background-position: -40px;-ms-transform: rotate(-90deg);-webkit-transform: rotate(-90deg);transform: rotate(-90deg);" class="c_therapy_icon"></div>
                <p class="c_therapy_heading">Buwaneka Boralessa</p>
                <p class="c_therapy_des" style="text-align: center">buwanekab@gmail.com</p>
                <p class="c_therapy_des" style="text-align: center">Web Developer<br>Designer</p>
            </div>
        </div>
        <div class="col-lg-4 wow slideInUp">
            <div class="c_therapy_cards" style="border-radius: 50%;background: rgb(69, 138, 78);">
                <div style="background-image: url({{ URL::asset('profile_images/about_us/icon_2.jpg') }});border-color: #FFF;background-size: 190px;background-position: -15px" class="c_therapy_icon"></div>
                <p class="c_therapy_heading">Salika Irushan</p>
                <p class="c_therapy_des" style="text-align: center">salika.irushan0@gmail.com</p>
                <p class="c_therapy_des" style="text-align: center">Web Developer<br>Designer</p>
            </div>
        </div>
        <div class="col-lg-4 wow slideInUp">
            <div class="c_therapy_cards" style="border-radius: 50%;background: rgb(69, 138, 78);">
                <div style="background-image: url({{ URL::asset('profile_images/about_us/icon_3.jpg') }});border-color: #FFF;background-size: 190px;background-position: -15px" class="c_therapy_icon"></div>
                <p class="c_therapy_heading">Abdulla Unais</p>
                <p class="c_therapy_des" style="text-align: center">muabdulla@gmail.com</p>
                <p class="c_therapy_des" style="text-align: center">Web Developer<br>Designer</p>
            </div>
        </div>
    </div>
</div>

@stop