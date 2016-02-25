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
    </style>
@stop

@section('body')

<?php if($questionResult) {
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

                                <img src="{{ URL::asset('assets/img/user_red.jpg') }}"
                                     class="utility-circle" alt="">
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

                        <footer class="Comment__footer"></footer>

                    </div>

                </div>



                <!-- The Replies -->
                <div class="replies">
                    <?php
                        foreach($answerResultSet as $answer) {
                            $numAns++
                    ?>
                    <div class="Comment Media">

                        <div class="Media__figure">
                            <div class="Thumbnail Thumbnail--medium Thumbnail--Circle">
                                <a href="" class="Media__figure">
                                    <img src="{{ URL::asset('assets/img/user_blue.jpg') }}" class="utility-circle" alt="">
                                </a>

                            </div>
                            <div style="width:75px;" align="center"><img class="up_vote" src="{{ URL::asset('assets/img/up_vote.png') }}">
                            </div>
                            <div class="num_votes" align="center"><?= ($answer->upVotes)-($answer->downVotes) ?></div>
                            <div style="width:75px;" align="center"><img class="down_vote"
                                                                         src="{{ URL::asset('assets/img/down_vote.png') }}"></div>
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


                        </div>

                    </div>
                        <?php } ?>




                </div>


                <!-- The Form to Leave a Reply -->
                <h4 class="utility-center">
                    <a href="" style="color: #7C97FF;">Sign in</a> or
                    <a href="" style="color: #7C97FF;">create an account</a> to participate in this forum.
                </h4>
                <article id="reply-form" class="Media">

                    <div class="Media__figure">
                        <div class="Thumbnail Thumbnail--medium Thumbnail--Circle">
                            <avatar username="helloworld" email="" size="75">
                            </avatar>
                            <a href="" class="Media__figure">
                                <img src="{{ URL::asset('assets/img/user_red.jpg') }}" class="utility-circle" alt="">
                            </a>
                        </div>
                        <div style="width:75px;" align="center">patient1</div>
                    </div>


                    <div class="Media__body">
                        {!! Form::open(array('url' => 'forum/submitanswer')) !!}
                            <input name="_token" type="hidden" value="">
                            <input name="conversation_id" type="hidden" value="">
                            <input name="channel" type="hidden" value="code-review">
                            <div class="form-group">
                                {!! Form::text('subjectText', '', array(
                                'placeholder' => 'Subject',
                                'required' => 'required',
                                'class' => 'subjectTextInput'
                                )) !!}

                                {!! Form::textarea('bodyText', '', array(
                                'placeholder' => 'Type your described answer here',
                                'required' => 'required'
                                )) !!}
                            </div>
                            <button type="submit" class="Button Button--Callout" data-single-click="">
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


</div>
<?php } else {
    echo '<div style="color: #666; font-size: 14px;">Requested forum either deleted or not available</div>';
} ?>
@stop
