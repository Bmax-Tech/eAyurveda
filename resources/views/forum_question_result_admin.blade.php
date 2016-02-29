<?php
foreach($questions as $question) {
?>
<script src="{{ URL::asset('assets_social/js/bootbox.min.js') }}" type="text/javascript"></script>
<script type="text/javascript">
    function deleteQuestion(qid) {
        var questionID = qid.toString();
        $.ajax({
            type:'GET',
            url:'forum/question/delete/'+questionID+'/',
            cache: true,
            success: function(data){
                $("#forumQuestionsDiv").html(data.page);
            }
        });
    }
</script>
<div class="searchCard">
    <div>

        <div class="searchCardLeftPane">
            <div class="byUserDiv">from <?= $question->name ?></div>
            <div style="height: 50px;">
                <div class="upVotesDiv"><?= $question->upvotes ?></div>
                <div class="numAnswersDiv">2</div>
                <div class="numViewsDiv">10</div>
            </div>
        </div>
        <div class="questionContentDiv" onclick="window.location.href = '/forum/view?question=<?= $question->qID ?>'">
            <?= $question->qBody ?>
        </div>
        <div class="questionActionsDiv">
            <input type="button" class="btnQuestionDelete" onclick="bootbox.confirm('Are you sure you want to delete this question?', function(result) {if (result) {deleteQuestion('<?= $question->qID ?>')}});">
            <input type="button" class="btnQuestionView" onclick="window.location.href = '/forum/view?question=<?= $question->qID ?>'">
        </div>
    </div>
</div>

<?php }
?>

