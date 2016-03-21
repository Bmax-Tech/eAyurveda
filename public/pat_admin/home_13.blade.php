<?php

$txt = '
  ';

echo $txt;
?>
<link href="assets_social/css/summernote.css" rel="stylesheet">
<link href="http://netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet">
<script src="assets_social/js/summernote.min.js"></script>

<div>
    <div class="forumAdminHead">
        Create Newsletter
        <div style="height: 1px; background-color: #aaa; width: 100%; margin-top: 5px;"></div>
    </div>
    <div id="addCategory">
        <div style="">
            {!! Form::open(array('url' => 'forum/sendnewsletter')) !!}
                <div class="forumTxtLabel">
                    Subject
                </div>
                <div>
                    {!! Form::text('subject','',array(
                       'class' => 'forumCatNameTxt'
                   )) !!}
                </div>
                <div class="forumTxtLabel" style="margin-top: 20px; margin-bottom: 4px;">
                    Body Text
                </div>
            {!! Form::textarea('content','',array(
                        'class' => 'forumCatDescriptionTxt',
                        'id' => 'summernote'
                    )) !!}
            <div>
                {!! Form::submit('Send Newsletter', array(
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
<script type="text/javascript">
    $(document).ready(function () {
        $('#summernote').summernote({
            height: 300,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            focus: false                  // set focus to editable area after initializing summernote
        });
    });
</script>
