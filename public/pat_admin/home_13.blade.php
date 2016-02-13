<?php

$txt = '
  ';

echo $txt;
?>
<link href="assets_social/css/summernote.css" rel="stylesheet">
<link href="http://netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet">
<script src="assets_social/js/summernote.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#summernote').summernote({
            onKeyup: function(e) {
                var markupStr = $('#summernote').summernote('code');
                $("#bodyTextArea").val(markupStr);
            },
            height: 300,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            focus: false                  // set focus to editable area after initializing summernote
        });
    });
</script>

<div>
    <div class="forumAdminHead">
        Create Newsletter
        <div style="height: 1px; background-color: #aaa; width: 100%; margin-top: 5px;"></div>
    </div>
    <div id="addCategory">
        <div style="">
            <form action="forum/sendnewsletter" method="post" enctype="multipart/form-data">
                <div class="forumTxtLabel">
                    Subject
                </div>
                <div>
                    <input type="text" name="subject" placeholder="" class="forumCatNameTxt">
                </div>
                <div class="forumTxtLabel" style="margin-top: 20px; margin-bottom: 4px;">
                    Body Text
                </div>
                <div id="summernote" style=""></div>
                <textarea id="bodyTextArea" name="bodyTextArea" ></textarea>
            <div>
                <button id="forumCatSaveBtn" style="margin-bottom: 40px;" type="submit">Send Newsletter</button>
            </div>
            <div class="spacer" style="clear: both;"></div>
                </form>
        </div>
    </div>
    </div>
</div>
