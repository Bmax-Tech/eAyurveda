@extends('forum_top')

@section('title')
    Forum Profile - e-Ayurveda
@stop

@section('forumHead')
    <script src="{{ URL::asset('assets/js/jquery-1.12.0.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets_social/js/forum_profile.js') }}"></script>
    <link rel="stylesheet"  href="{{ URL::asset('assets_social/css/forum_profile.css') }}">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
@stop


@section('body')

    <div id="bodyContent">
        <div id="topNavTabs">
            <div>
                <div onclick="load_profile_page('1');" id="tab1" class="tab tabActive tabActive1">Profile</div>
                <div onclick="load_profile_page('2');" id="tab2" class="tab">Activity</div>
                <div onclick="load_profile_page('3');" id="tab3" class="tab">Stats</div>
                <div onclick="load_profile_page('4');" id="tab4" class="tab">Messages</div>
            </div>
        </div>
        <div id="barThick"></div>

        <div id="ContentDiv">

        </div>

    </div>
@stop
