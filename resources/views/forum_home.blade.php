@extends('forum_top')

@section('title')
    e-Ayurveda Forum
@stop

@section('forumHead')
    <script src="{{ URL::asset('assets/js/jquery-1.12.0.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets_social/js/summernote.min.js') }}" type="text/javascript"></script>
    <link rel="stylesheet"  href="{{ URL::asset('assets_social/css/summernote.css') }}">
    <script type="text/javascript" src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('assets_social/js/forum_home.js') }}" type="text/javascript"></script>
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet">
    <script type="text/javascript">
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 200,
                minHeight: null,             // set minimum height of editor
                maxHeight: null,// set editor height
                focus: false                  // set focus to editable area after initializing summernote
            });
        });
    </script>
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
        .close {
            position: relative;
            z-index: 99;
            margin: 20px 25px;
            padding-bottom: 5px !important;
            border-radius: 100%;
            height: 24px;
            width: 24px;
            background-color: #18E000 !important;
            color: #0B4A00 !important;
            opacity: .5 !important;
        }

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
        .forumCatNameTxt {
            height:40px;
            width:90%;
            border:1px solid #CCC;
            outline:none;
            border-radius:2px;
            padding-left:15px;
            padding-right:15px;
            font-size:14px;
            margin-top:5px;
            margin-bottom: 10px;
            font-family: 'Open Sans', Arial;
        }
        .forumCatDescriptionTxt {
            width:90%;
            border:1px solid #CCC;
            outline:none;
            border-radius:2px;
            margin:auto;
        }
        .forumCatNameTxt:focus, .forumCatDescriptionTxt:focus {
            border-color: #55aa55;
            box-shadow: inset 0 0 8px rgba(0,255,0,.2);
        }
        .catCard:hover {
            cursor: pointer;
        }
        #forumCatSaveBtn {
            height: 45px;
            width: 90%;
            background-color: #39b54a;
            border:1px solid;
            border-color: #3db43d #34b434 #2eb42e #2eb42e;
            border-radius:3px;
            margin-top: 17px;
            font-size:16px;
            font-family:'Open Sans', Tahoma, 'Roboto';
            color:#fff;
            transition: all 0.5s  ease-out;
        }
        #forumCatSaveBtn:hover {
            background-color: #359f46;
            border-color: #34a334 #30a430 #228722 #2fa52f;
            border-width:2px 1px 2px 1px;
            box-shadow: 0 0px 0 rgba(0, 0, 255, .2), 0 1px 5px rgba(0, 0, 255, .15);
        }
        .forumCatSelect {
            height:40px;
            width:90%;
            border:1px solid #CCC;
            outline:none;
            border-radius:2px;
            padding-left:15px;
            padding-right:15px;
            font-size:14px;
            margin-top:20px;
            margin-bottom: 10px;
            font-family: 'Open Sans', Arial;
        }
    </style>
    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="forumHomeHead" style="position:relative;padding-top:20px;padding-left:40px;margin-top:0px !important;margin-left:0px;border-top-right-radius:5px;border-top-left-radius:5px;padding-bottom:15px;background-color:#00B000;color:#fff;border-bottom:1px solid #009A00;box-shadow: 0px 0px 0px rgba(0, 0, 0, 0.05),0px 3px 10px rgba(0,0,0,0.2);">
                    Post new Question
                </div>
                <div style="text-align: center">
                    {!! Form::open(array('url' => 'forum/postquestion')) !!}
                    <div>
                        <span style="float: left;margin-left: 6%;margin-top: 18px;margin-bottom: -18px;font-family: Arial;color: #aaa;">Select Category</span>
                        <select name="category" class="forumCatSelect" required="required">
                            <?php
                            foreach($categories as $cat) {
                            if($cat->catID == 1) {
                            ?>
                                <option value="$cat->catName" selected><?= $cat->catName ?></option>

                            <?php
                            } else {
                            ?>
                                <option value="$cat->catName"><?= $cat->catName ?></option>
                            <?php
                            }
                            }
                            ?>
                        </select>
                    </div>
                    <div>

                        {!! Form::text('title','',array(
                            'placeholder' => 'Question Title',
                            'class' => 'forumCatNameTxt'
                        )) !!}
                    </div>
                    <div style="width:90%;margin:auto; text-align: left;">
                        {!! Form::textarea('body','',array(
                        'class' => 'forumCatDescriptionTxt',
                        'id' => 'summernote'
                    )) !!}
                    </div>
                    <div>
                        {!! Form::submit('Post Question', array(
                    'id' => 'forumCatSaveBtn',
                    'style' => 'margin-bottom: 40px;'
                )) !!}
                    </div>
                    <div class="spacer" style="clear: both;"></div>
                    {!! Form::close() !!}
                </div>
            </div>

        </div>
    </div>

    <button type="button" class="btn btn-info btn-lg floatingAction" data-toggle="modal" data-target="#myModal"></button>
@stop
