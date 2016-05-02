@extends('layout')
@section('content')

<!-- Ayurvedic Therapies -->
<div class="container c_container" style="padding: 0px">
    <div align="center" class="embed-responsive" style="height: 350px">
        <video id="background_video" autoplay loop onended="this.play();" class="embed-responsive-item" muted style="height: auto;width: 100%">
            <source src="{{ URL::asset('assets/video/new_video.mp4') }}" type="video/mp4">
            {{--<source src="http://php-eayurveda.rhcloud.com/video/new_video.mp4" type="video/mp4">--}}
        </video>
        <div>

        </div>
        <div class="c_video_wrapper">
            <h1 style=" color: #39B54A;margin: 0px;padding-top: 275px;font-size: 45px">Ayurvedic Therapies</h1>
        </div>
    </div>
    <div class="col-lg-12 c_no_padding" style="margin-top: 30px">
    <?php
        for($i=0;$i<sizeof($therapies);$i++)
        {
    ?>
        <div class="col-lg-4 wow slideInUp">
            <div class="c_therapy_cards">
                <div style="background-image: url({{ URL::asset($therapies[$i]->image_path) }})" class="c_therapy_icon"></div>
                <p class="c_therapy_heading">{{ $therapies[$i]->name }}</p>
                <p class="c_therapy_des">{{ $therapies[$i]->description }}</p>
            </div>
        </div>
    <?php
        }
    ?>

    </div>

</div>

@stop