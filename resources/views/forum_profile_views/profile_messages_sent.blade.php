<div>
    <div class="messageDisplay">
        <div class="messageFrom" style="text-align: center"><strong>From</strong></div>
        <div class="messageSubject" style="text-align: center"><strong>Subject</strong></div>
        <div class="messageTime" style="text-align: center"><strong>Date and Time</strong></div>
    </div>
</div>
<?php foreach ($messages as $message) { ?>
<div>
    <div class="messageDisplay" id="<?= $message->mID ?>">
        <div class="messageFrom"><?= $message->mTo ?></div>
        <div class="messageSubject"><?= $message->mSubject ?></div>
        <div class="messageTime"><?= $message->sent ?></div>
    </div>
</div>
<?php } ?>

{{--<div>--}}
    {{--<div class="messageDisplay" id="message2">--}}
        {{--<div class="messageFrom">From User</div>--}}
        {{--<div class="messageSubject">The Subject Text</div>--}}
        {{--<div class="messageTime">Date and Time</div>--}}
    {{--</div>--}}
{{--</div>--}}

