<div>
    <div class="forumAdminHead" style="position: relative;">
        Recently Posted
        <div style="position: absolute;right: 0;top: -5px;">
            <input type="text" class="txtSearchQuestion" style="background-image: url('assets_social/img/ic_action_search.png');" placeholder="Search Question">
        </div>
        <div style="height: 1px; background-color: #aaa; width: 100%; margin-top: 5px;"></div>
    </div>
    <div id="forumQuestionsDiv">
        <div style="">

            <?php for($i=0; $i<20;$i++) { ?>
            <div class="questionCard">
                <div class="questionIDDiv">
                    001
                </div>
                <div class="questionTextDiv">
                    This is my question
                </div>
                <div class="questionActionDiv">
                    <button id="forumButton1" class="btnQuestionCard btnQuestionRed">Delete</button>
                    <button id="forumButton1" class="btnQuestionCard btnQuestionOrange">View</button>
                </div>
            </div>
            <?php } ?>

        </div>
    </div>
    <div class="spacer" style="clear: both;"></div>
    <div style="padding-bottom: 30px;"></div>
</div>

