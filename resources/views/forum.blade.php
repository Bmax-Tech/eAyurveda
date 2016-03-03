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
    <script src="{{ URL::asset('assets_social/js/bootbox.min.js')}}"></script>

    <style>
        #question-stats:before {
            z-index: -1;
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
        .modal-header, .modal-body {
            color:#888 !important;
        }
        .btn-primary {
            background-color: #A9A9A9 !important;
            border-color: #8A8A8A !important;
            outline: none !important;
        }
        .btn-primary:hover {
            background-color: #939393 !important;
            border-color: #747474 !important;
        }
        .btn-primary:active {
            background-color: #727272 !important;
            border-color: #5c5c5c !important;
            outline: none !important;
        }
        .btn-danger,  .btn-danger:active{
            outline: none !important;
        }
        .modal-dialog {
            width: 400px !important;
            margin: 20% auto !important;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function() {
           /* $('#summernote').summernote({
                height: 300,                 // set editor height
                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor
                focus: false                  // set focus to editable area after initializing summernote
            });*/
            $("#signInMessage").hide();
            $("#AlreadyFlaggedMessage").hide();
            $("#FlagSuccess").hide();
            $("#SuccessPop").hide();
            $("#DangerPop").hide();
            var ans = getUrlParameter('answer');
            if($.isNumeric(ans)) {
                $('html, body').animate({
                    scrollTop: $("#answer" + ans).offset().top - 5
                }, 1000);
            }

            $('[data-toggle="tooltip"]').tooltip();
        });

        function postReply(uid) {
            var question = getUrlParameter('question');
            $subject = $("#subjectText").val();
            $body = $("#summernote").val();


            $.ajax({
                type:'GET',
                url: '/forum/submitanswer/'+question+'/'+uid+'/'+$subject+'/'+$body,
                cache: true,
                success: function(data){
                    location.reload();
                }
            });
        }
    </script>
@stop

@section('body')

    <?php
    $user = "";
    $login = false;
    $firstname = "";
    $userid = "";
    if (isset($_COOKIE['user'])) {
        $user = json_decode($_COOKIE['user'], true);
        $firstname = $user[0]['first_name'];
        $userid = $user[0]['id'];
        $login = true;
    } else if (isset($_COOKIE['admin_user'])) {
        $user = json_decode($_COOKIE['admin_user'], true);
        $firstname = $user[0]['first_name'];
        $userid = $user[0]['id'];
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
                                    {{--<span class="utility-muted utility-text-light Comment__days-ago">--}}
                                        {{--— 6 months ago--}}
                                    {{--</span>--}}
                        </h5>

                        <div class="htmlFormattedForumText">
                            <p><?= $questionResult->qSubject ?></p>
                            <p><?= $questionResult->qBody ?></p>
                        </div>

                        <footer class="Comment__footer" style="float: right;">
                            <input type="button" data-toggle="tooltip" data-container="body" data-placement="bottom" title="Flag Answer" class="btnForumStyle btnForumFlag btnForumSingle"  onclick="flagQuestion('<?= $questionResult->qID ?>', '<?= $userid ?>', this);">
                        </footer>

                    </div>

                </div>



                <!-- The Replies -->
                <div class="replies" id="repliedAnswerList">
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
                                <input id="answer<?= $answer->aid ?>UpVote" type="button" data-toggle="tooltip" data-container="body" data-placement="left" title="Up Vote" class="up_vote" style="background-image: url('{{ URL::asset('assets_social/img/up_awesome.png') }}');" onclick="upVote('<?= $answer->aid ?>', '<?= $userid ?>', this);">
                            </div>
                            <div class="num_votes" id="answer<?= $answer->aid ?>votes" align="center"><?= ($answer->upVotes)-($answer->downVotes) ?></div>
                            <div style="line-height: 0;" align="center">
                                <input id="answer<?= $answer->aid ?>DownVote" type="button" data-toggle="tooltip" data-container="body" data-placement="left" title="Down Vote" class="down_vote" style="background-image: url('{{ URL::asset('assets_social/img/down_awesome.png') }}');" onclick="downVote('<?= $answer->aid ?>', '<?= $userid ?>', this);">
                            </div>
                        </div>

                        <div class="Media__body">

                            <h5>
                                <a href=""><?= $answer->name ?></a>


                                        {{--<span class="utility-muted utility-text-light Comment__days-ago">--}}
                                            {{--<a href="">--}}
                                                {{--— 6 months ago--}}
                                            {{--</a>--}}
                                        {{--</span>--}}
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
                                <input type="button" data-toggle="tooltip" data-container="body" data-placement="bottom" title="Flag Answer" class="btnForumStyle btnForumFlag btnForumRight" onclick="flagAnswer('<?= $answer->aid ?>', '<?= $userid ?>', this);">
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

                            <div class="form-group">
                                <div>
                                    <input type="text" id="subjectText" name="subjectText" placeholder="Title" required="required" class="subjectTextInput">
                                </div>
                                <div>
                                    <textarea name="bodyText" id="summernote" placeholder="Type your answer here" class="bodyTextInput"></textarea>
                                </div>
                            </div>
                            <button style="margin-bottom: 65px;" type="submit" class="Button Button--Callout" data-single-click="" onclick="postReply('<?= $userid ?>');">
                                Post Your Reply
                            </button>

                    </div>

                </article>

            </div>
            <div class="Grid__column two end">

                <div id="question-stats" class="Box utility-center">
                    <div>
                        <strong><?= $numAns ?></strong> replies with no best answer
                    </div>
                </div>
                <div id="question-stats" class="Box utility-center" style="margin-top: 15px;">
                    <div>
                        Thread marked as Not Solved
                    </div>
                </div>

            </div>

        </div>


    </div>

    <div id="signInMessage" style="text-align: center; position: fixed; bottom: 0px; width: 100%;">
        <div class="container" style="text-align: left; position: relative;">
            <div class="alert alert-danger fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <div>Please <strong>Sign in</strong> to participate or vote in this thread</div>
            </div>
        </div>
    </div>
    <div id="AlreadyFlaggedMessage" style="text-align: center; position: fixed; bottom: 0px; width: 100%;">
        <div class="container" style="text-align: left; position: relative;">
            <div class="alert alert-danger fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <div>You have already <strong>flagged</strong> this post</div>
            </div>
        </div>
    </div>
    <div id="FlagSuccess" style="text-align: center; position: fixed; bottom: 0px; width: 100%;">
        <div class="container" style="text-align: left; position: relative;">
            <div class="alert alert-warning fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <div>Post is <strong>flagged</strong> for review</div>
            </div>
        </div>
    </div>
    <div id="SuccessPop" style="text-align: center; position: fixed; bottom: 0px; width: 100%;">
        <div class="container" style="text-align: left; position: relative;">
            <div class="alert alert-success fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <div id="successtitle"></div>
            </div>
        </div>
    </div>
    <div id="DangerPop" style="text-align: center; position: fixed; bottom: 0px; width: 100%;">
        <div class="container" style="text-align: left; position: relative;">
            <div class="alert alert-danger fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <div id="dangertitle"></div>
            </div>
        </div>
    </div>


</div>
<?php } else {
    echo '<div style="color: #666; font-size: 14px;">Requested forum either deleted or not available</div>';
} ?>
@stop
