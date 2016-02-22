@extends('forum_top')

@section('title')
    e-Ayurveda Forum
@stop

@section('forumHead')
    <script src="{{ URL::asset('assets/js/jquery-1.12.0.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('assets_social/js/forum_home.js') }}" type="text/javascript"></script>
@stop


@section('body')

    <div id="bodyContent">
        <div>
            <div id="forumHeadTxt">
                Welcome To e-Ayurveda Forums
            </div>
        </div>
        <div class="forumHomeHead" style="position: relative;">
            Browse by Category
        </div>
        <div style="height: 1px; background-color: #aaa; width: 100%; margin-top: 5px;"></div>
        <div id="availableForumCatList">




        </div>
        <div class="spacer" style="clear: both;"></div>
        <div class="forumHomeHead" style="position: relative; margin-top: 0px !important;">
            or Search our Forum
        </div>
        <div style="height: 1px; background-color: #aaa; width: 100%; margin-top: 5px;"></div>
        <div id="forumSearch">
                <input id="txtSearchItem" type="text" placeholder="Search forums">
                <input type="button" id="btnSearchItem" onclick="displayResults()">
        </div>
        <div id="searchResults">
            <div id="numSearchResults" class="forumHomeHead" style="visibility:hidden;position: relative; margin-top: 25px !important; margin-left: 8%">
                0 Search result(s) for ''
            </div>
            <div id="resultList">



            </div>
        </div>
    </div>
    <style>
        .floatingAction {
            border:1px solid #348c45 !important;
            height:65px;
            width: 65px;
            position: fixed;
            bottom: 3%;
            right: 3%;
            background-color: #359f46 !important;
            border-radius: 100%;
            overflow-y: hidden ! important;
            overflow-x: hidden ! important;
            background-size: 50%;
            background-repeat: no-repeat;
            background-position: 50% 50%;
            background-image: url('{{ URL::asset('assets_social/img/pencil_Awesome_w.png') }}');
            box-shadow: 0px 2px 3px rgba(0, 0, 0, 0.1),2px 4px 4px rgba(0,0,0,0.2);
            outline: none !important;
        }
        .floatingAction:hover, .floatingAction:active {
            background-image: url('{{ URL::asset('assets_social/img/pencil_Awesome_w.png') }}') !important;
            border:1px solid #347f3f !important;
            background-color: #309042 !important;
            outline: none !important;

        }
    </style>
    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <p>Some text in the modal.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <button type="button" class="btn btn-info btn-lg floatingAction" data-toggle="modal" data-target="#myModal"></button>
@stop
