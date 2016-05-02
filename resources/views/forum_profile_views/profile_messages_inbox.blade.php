<div>
    <div class="messageDisplay">
        <div class="messageFrom" style="text-align: center"><strong>From</strong></div>
        <div class="messageSubject" style="text-align: center"><strong>Subject</strong></div>
        <div class="messageTime" style="text-align: center"><strong>Date and Time</strong></div>
    </div>
</div>

<?php foreach ($messages as $message) { ?>
<div>
    <div class="messageDisplay" id="<?= $message->mID ?>" >
        <div class="messageFrom"><?= $message->mFrom ?></div>
        <div class="messageSubject"><?= $message->mSubject ?></div>
        <div class="messageTime"><?= $message->sent ?></div>
    </div>
</div>
<?php } ?>

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
{{--<div>--}}
    {{--<div class="messageDisplay" id="message2">--}}
        {{--<div class="messageFrom">From User</div>--}}
        {{--<div class="messageSubject">The Subject Text</div>--}}
        {{--<div class="messageTime">Date and Time</div>--}}
    {{--</div>--}}
{{--</div>--}}


{{--<button type="button" class="btn btn-info btn-lg floatingAction" data-toggle="modal" data-target="#myModal"></button>--}}

<script>
    function openMessage(messageID) {

    }


</script>