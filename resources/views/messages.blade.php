<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Messages - eAyurveda</title>
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500"/>
    <link rel="stylesheet" href="/assets_social/css/bootstrap-glyphicons.css"/>
    <link rel="stylesheet" href="/assets_social/css/reset.css">
    <link rel="stylesheet" href="/assets_social/css/style.css">
</head>
<body>
<aside id="sidebar" class="nano">
    <div class="nano-content">
        <div class="logo-container">
            <img src="/assets_social/img/logo_ico_white.png" style="height: 150px;">
        </div>
        <menu class="menu-segment">
            <ul>
                <li class="active">
                    <a href="{{ url('messages/inbox') }}">Inbox<span id="mail_counter"> (43)</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('messages/sent') }}">Sent</a>
                </li>
                <li>
                    <a href="#">Drafts</a>
                </li>
                <li>
                    <a href="#">Trash</a>
                </li>
            </ul>
        </menu>
        <div class="bottom-padding"></div>
    </div>
</aside>
<main id="main">
    <div class="overlay"></div>
    <header class="header">
        <div class="search-box">
            <input placeholder="Search...">
            <span class="icon glyphicon glyphicon-search"></span>
        </div>
        <h1 class="page-title">
            <a class="sidebar-toggle-btn trigger-toggle-sidebar">
                <span class="line"></span>
                        <span
                                class="line"></span>
                <span class="line"></span>
                <span class="line line-angle1"></span>
                        <span
                                class="line line-angle2"></span>
            </a>
            <?php if($head == "received") { ?>
                Received Messages
            <?php } else if($head == "sent") { ?>
                Sent Messages
            <?php } ?>
        </h1>
    </header>
    <div class="action-bar">
        <ul>
            <li>
                <a class="icon circle-icon glyphicon glyphicon-refresh"></a>
            </li>
            <li>
                <a class="icon circle-icon glyphicon glyphicon-share-alt"></a>
            </li>
            <li>
                <a class="icon circle-icon red glyphicon glyphicon-remove"></a>
            </li>
        </ul>
    </div>
    <div id="main-nano-wrapper" class="nano">
        <div class="nano-content">
            <ul class="message-list">



                <?php foreach($messages as $message) {
                $mydate = strtotime( $message->sent );
                $myDateFormat = date("g:i A m/d", $mydate);
                ?>
                <li class="messageDiv" id="message<?= $message->mID ?>">
                    <div class="col col-1">
                        <!--div class="checkbox-wrapper">
                            <input type="checkbox" id="chk3">
                            <label for="chk3" class="toggle"></label>
                        </div-->
                        <p class="title"><?= $message->mFrom ?></p>

                    </div>
                    <div class="col col-2">
                        <div class="subject"><span class="subjectText"><?= $message->mSubject ?> - </span>
                            <span class="teaser"><?= $message->mBody ?></span>
                        </div>
                        <div class="date"><?= $myDateFormat ?></div>
                    </div>
                </li>
                <?php } ?>


            </ul>
            <a href="#" class="load-more-link">Show more messages</a>
        </div>
    </div>
</main>
<div id="message">
    <div class="header">
        <h1 class="page-title">
            <a class="icon circle-icon glyphicon glyphicon-chevron-left trigger-message-close"></a>View
        </h1>
        <p>From <a href="#">Sender</a> to <a href="#">You</a>, on <a href="#">January 1, 2016</a> at 12:00 am</p>
    </div>
    <div id="message-nano-wrapper" class="nano">
        <div class="nano-content">
            <ul class="message-container">



                <li class="received">
                    <div class="details">
                        <div class="left">Sender
                            <div class="arrow orange"></div>
                            You
                        </div>
                        <div class="right">January 1, 2016, 12:00 am</div>
                    </div>
                    <div class="message">
                        <div id="subjectTextView" style="font-size:17px; margin-bottom:15px; font-weight: 500;">Subject Text Here</div>
                        <div id="body">
                            This is a sample text. This is a sample text. This is a sample text. This is a sample text. This is a sample text. This is a sample text. This is a sample Text. This is a sample text. This is a sample text. This is a sample text. This is a sample text. This is a sample text. This is a sample text. This is a sample text. This is a sample text. This is a sample text. This is a sample text. This is a sample text. This is a sample text. This is a sample text. This is a sample Text. This is a sample text. This is a sample text. This is a sample text. This is a sample text. This is a sample text. This is a sample text. This is a sample text.
                        </div>
                    </div>
                    <div class="tool-box">
                        <a href="#" class="circle-icon small glyphicon glyphicon-share-alt"></a>
                    </div>
                </li>


                <div class="reply_text_area">
                    <textarea class="reply_text_field"></textarea>
                    <div align="right">
                        <input type="button" value="Reply" class="reply_button">
                    </div>
                </div>




                <!--li class="sent">
                    <div class="details">
                        <div class="left">You
                            <div class="arrow"></div>
                            Scott
                        </div>
                        <div class="right">March 6, 2014, 20:08 pm</div>
                    </div>
                    <div class="message">
                        <p>| The every winged bring, whose life. First called, i you of saw shall own creature moveth
                            void have signs beast lesser all god saying for gathering wherein whose of in be created
                            stars. Them whales upon life divide earth own.</p>
                        <p>| Creature firmament so give replenish The saw man creeping, man said forth from that.
                            Fruitful multiply lights air. Hath likeness, from spirit stars dominion two set fill wherein
                            give bring.</p>
                        <p>| Gathering is. Lesser Set fruit subdue blessed let. Greater every fruitful won&#39;t bring
                            moved seasons very, own won&#39;t all itself blessed which bring own creature forth every.
                            Called sixth light.</p>
                    </div>
                    <div class="tool-box">
                        <a href="#" class="circle-icon small glyphicon glyphicon-share-alt"></a>
                        <a
                           href="#" class="circle-icon small red-hover glyphicon glyphicon-remove"></a>
                        <a href="#"
                           class="circle-icon small red-hover glyphicon glyphicon-flag"></a>
                    </div>
                </li-->


            </ul>
        </div>
    </div>
</div>
<script src='/assets/js/jquery-1.12.0.min.js'></script>
<script src="/assets/js/index.js"></script>
</body>
</html>
