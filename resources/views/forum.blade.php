@extends('forum_top')

@section('title')
    e-Ayurveda Forum
@stop

@section('forumHead')
    <link rel="stylesheet" href="{{ URL::asset('assets_social/css/forum.css') }}">
    <script src="{{ URL::asset('assets/js/jquery-1.12.0.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets_social/js/forum_home.js') }}"></script>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500"/>
    <link href="{{ URL::asset('assets_social/css/summernote.css')}}" rel="stylesheet">
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet">
    <script src="{{ URL::asset('assets_social/js/summernote.min.js')}}"></script>

    <style>
        #question-stats:before {
            z-index: -1;
        }
        .forumDetailsBar {
            height: 40px;
            background-color: #ddd;
            -webkit-box-shadow: 0 2px 3px 0px rgba(0, 0, 0, 0.22);
            box-shadow: 0 2px 3px 0px rgba(0, 0, 0, 0.22);
            color:#888;
            font-size: 15px;
            overflow: hidden;
        }

        .btnForumRight {
            border-top-left-radius: 0px !important;
            border-bottom-left-radius: 0px !important;
        }
        .btnForumMiddle {
            border-radius: 0px !important;
            margin-right: -1px !important;
        }
        .btnForumLeft {
            border-top-right-radius: 0px !important;
            border-bottom-right-radius: 0px !important;
            margin-right: -1px !important;
        }

        .btnForumStyle {
            opacity: 0.5;
            border-radius: 4px;
            height: 40px;
            width: 60px;
            position: relative;
            right: -16px;
            overflow-y: hidden ! important;
            overflow-x: hidden ! important;
            background-color: #fff;
            border-style:solid;
            border-width: 1px;
            border-color: #ccc;
            background-size: 45%;
            background-repeat: no-repeat;
            background-position: 50% 50%;
        }

        .btnForumFlag {
            background-image: url('{{ URL::asset('assets_social/img/flag_awesome.png') }}');
        }
        .btnForumFlag:hover {
            outline: 0;
            background-image: url('{{ URL::asset('assets_social/img/flag_awesome_w.png') }}');
            background-color: #ff4d4d;
            border-color: #e53a3a #e72929 #e71e1e #e92c2c;
            transition: background-color .1s ease;
            transition: border-color .1s ease;
            box-shadow: 0 0px 0 rgba(255,0,0,.2),0 1px 5px rgba(255,0,0,.15);
            opacity: 1;
        }
        .btnForumFlag:focus {
            outline: 0;
            opacity: 1;
        }

        .btnForumMarkBest {
            background-image: url('{{ URL::asset('assets_social/img/star_awesome.png') }}');
        }
        .btnForumMarkBest:hover {
            outline: 0;
            background-image: url('{{ URL::asset('assets_social/img/star_awesome_w.png') }}');
            background-color: #5555ff !important;
            border-color: #5252FF #4444FF #3333FF #4444FF;
            transition: background-color .5s ease;
            transition: border-color .5s ease;
            box-shadow: 0 0px 0 rgba(0,255,0,.2),0 1px 5px rgba(0,255,0,.15);
            opacity: 1;
        }
        .btnForumMarkBest:focus {
            outline: 0;
            opacity: 1;
        }


        .Comment__footer {
            margin-right: 15px !important;
            padding: 0px 0px 0px 0px !important;
            border: 0px solid #e9e9e9 !important;
            background: #fff;
        }

        .note-btn {
            width: auto !important;
        }
        .note-editor {
            box-shadow: 1px 2px 0 1px rgba(0, 0, 0, .07) !important;
            border: 1px solid #ddd !important;
            margin-top: 10px;
        }
        .up_vote:hover {
            background-image: url('{{ URL::asset('assets_social/img/up_awesome_w.png') }}') !important;
            background-color: #359f46 !important;
            border-color: #34a334 #30a430 #228722 #2fa52f !important;
            box-shadow: 0 0px 0 rgba(0,255,0,.2),0 1px 5px rgba(0,255,0,.15);
        }
        .down_vote:hover {
            background-image: url('{{ URL::asset('assets_social/img/down_awesome_w.png') }}') !important;
            background-color: #ff4d4d !important;
            border-color: #e53a3a #e72929 #e71e1e #e92c2c !important;
            box-shadow: 0 0px 0 rgba(0,255,0,.2),0 1px 5px rgba(0,255,0,.15);
        }

    </style>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 300,                 // set editor height
                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor
                focus: false                  // set focus to editable area after initializing summernote
            });
            $("#signInMessage").hide();
            var ans = getUrlParameter('answer');
            if($.isNumeric(ans)) {
                $('html, body').animate({
                    scrollTop: $("#answer" + ans).offset().top - 5
                }, 1000);
            }

            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@stop

@section('body')

    <?php
    $user = "";
    $login = false;
    $firstname = "";
    if (isset($_COOKIE['user'])) {
        $user = json_decode($_COOKIE['user'], true);
        $firstname = $user[0]['first_name'];
        $login = true;
    } else if (isset($_COOKIE['admin_user'])) {
        $user = json_decode($_COOKIE['admin_user'], true);
        $firstname = $user[0]['first_name'];
        $login = true;
    }

    if($questionResult) {
    $numAns = 0;
    ?>
<div class="forumDetailsBar">
    <div style="padding: 0px 50px 0 130px;line-height: 40px;">
        Ayurveda.lk > Forum > <?= $questionResult->qCategory ?> > <?= $questionResult->qSubject ?>
    </div>
</div>
<div id="root" class="page " style="padding-top: 50px;">



    <div class="container">
        <div class="Grid__row">
            <div class="Grid__column ten">


                <div id="question" class="Comment Media">
                    <div class="Media__figure">
                        <div class="Thumbnail Thumbnail--medium Thumbnail--Circle">
                            <a href="" class="Media__figure">
                                <img src="{{ URL::asset('assets/img/user_red.jpg')}}" class="utility-circle" alt="">
                            </a>
                        </div>
                    </div>

                    <div class="Media__body">
                        <h5>
                            <a href="https://google.com/+AbdullaUnais"><?= $questionResult->name ?></a>
                                    <span class="utility-muted utility-text-light Comment__days-ago">
                                        — 6 months ago
                                    </span>
                        </h5>

                        <div class="htmlFormattedForumText">
                            <p><?= $questionResult->qSubject ?></p>
                            <p><?= $questionResult->qBody ?></p>
                        </div>

                        <footer class="Comment__footer" style="float: right;">

                        </footer>

                    </div>

                </div>



                <!-- The Replies -->
                <div class="replies">
                    <?php
                        foreach($answerResultSet as $answer) {
                            $numAns++
                    ?>

                    <div id="answer<?= $answer->aid ?>" class="Comment Media">

                        <div class="Media__figure">
                            <div class="Thumbnail Thumbnail--medium Thumbnail--Circle">
                                <a href="" class="Media__figure">
                                    <img src="{{ URL::asset('assets/img/user_blue.jpg') }}" class="utility-circle" alt="">
                                </a>

                            </div>
                        </div>
                        <div style="position: absolute;left: 15px;top:85px;width: 45px;height: 112px;">
                            <div style="line-height: 0;" align="center">
                                <input type="button" class="up_vote" style="background-image: url('{{ URL::asset('assets_social/img/up_awesome.png') }}');" onclick="upVote('<?= $answer->aid ?>', '<?= $firstname ?>')">
                            </div>
                            <div class="num_votes" id="answer<?= $answer->aid ?>votes" align="center"><?= ($answer->upVotes)-($answer->downVotes) ?></div>
                            <div style="line-height: 0;" align="center">
                                <input type="button" class="down_vote" style="background-image: url('{{ URL::asset('assets_social/img/down_awesome.png') }}');" onclick="downVote('<?= $answer->aid ?>', '<?= $firstname ?>')">
                            </div>
                        </div>

                        <div class="Media__body">

                            <h5>
                                <a href=""><?= $answer->name ?></a>


                                        <span class="utility-muted utility-text-light Comment__days-ago">
                                            <a href="">
                                                — 6 months ago
                                            </a>
                                        </span>
                            </h5>

                            <!-- The Formatted Body Text -->
                            <div class="js-reply-body">
                                <div>
                                    <p><?= $answer->aSubject ?></p>
                                    <p><?= $answer->aBody ?></p>
                                </div>
                            </div>

                            <footer class="Comment__footer" style="float: right;">
                                <input type="button" data-toggle="tooltip" data-container="body" data-placement="bottom" title="Mark as Best Answer" class="btnForumStyle btnForumMarkBest btnForumLeft">
                                <input type="button" data-toggle="tooltip" data-container="body" data-placement="bottom" title="Flag Answer" class="btnForumStyle btnForumFlag btnForumRight">
                            </footer>
                        </div>

                    </div>
                        <?php } ?>




                </div>


                <div style="height: 1px; background-color: #ccc; width: 104%; margin-top: 5px; box-shadow: 0 2px 3px 0px rgba(0, 0, 0, 0.22);"></div>
                <!-- The Form to Leave a Reply -->
                <?php if(!$login) { ?>
                <h4 class="utility-center">
                    <a href="" style="color: #7C97FF;">Sign in</a> or
                    <a href="" style="color: #7C97FF;">create an account</a> to participate in this forum.
                </h4>
                <?php } ?>

                <article id="reply-form" class="Media">

                    <div class="Media__figure">
                        <div class="Thumbnail Thumbnail--medium Thumbnail--Circle">
                            <avatar username="helloworld" email="" size="75">
                            </avatar>
                            <a href="" class="Media__figure">
                                <img src="{{ URL::asset('assets/img/user_red.jpg') }}" class="utility-circle" alt="">
                            </a>
                        </div>
                        <?php if($login) { ?>
                            <div style="width:75px;padding-top: 5px;color:#888;font-size: 15px;" align="center"><?= $firstname ?></div>
                        <?php } else { ?>
                            <div style="width:75px;padding-top: 5px;color:#888;font-size: 15px;" align="center">Guest</div>
                        <?php } ?>
                    </div>

                    <div class="Media__body">
                        {!! Form::open(array('url' => 'forum/submitanswer')) !!}
                            <div class="form-group">
                                <div>
                                    {!! Form::text('subjectText', '', array(
                                    'placeholder' => 'Title',
                                    'required' => 'required',
                                    'class' => 'subjectTextInput'
                                    )) !!}
                                </div>
                                <div>
                                    {!! Form::textarea('bodyText', '', array(
                                    'id' => 'summernote',
                                    'class' => 'bodyTextInput'
                                    )) !!}
                                </div>
                            </div>
                            <button style="margin-bottom: 65px;" type="submit" class="Button Button--Callout" data-single-click="">
                                Post Your Reply
                            </button>

                        {!! Form::close() !!}
                    </div>

                </article>

            </div>
            <div class="Grid__column two end">

                <div id="question-stats" class="Box utility-center">
                    <div>
                        <strong><?= $numAns ?></strong> replies with no best answer
                    </div>
                </div>

            </div>

        </div>


    </div>

    <div id="signInMessage" style="text-align: center; position: fixed; bottom: 0px; width: 100%;">
        <div class="container" style="text-align: left; position: relative;">
            <div class="alert alert-danger fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Please <strong>Sign in</strong> to participate or vote in this thread
            </div>
        </div>
    </div>

</div>
<?php } else {
    echo '<div style="color: #666; font-size: 14px;">Requested forum either deleted or not available</div>';
} ?>
@stop
