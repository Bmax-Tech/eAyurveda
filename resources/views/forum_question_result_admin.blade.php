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
    function approveQuestion(qid) {
        var questionID = qid.toString();
        $.ajax({
            type:'GET',
            url:'forum/question/approve/'+questionID+'/',
            cache: true,
            success: function(data){
                $("#forumQuestionsDiv").html(data.page);
            }
        });
    }
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>

<?php
        $numAnswers = 0;
$totalUpVotes = 0;
foreach($questions as $question) {
    foreach($answers as $answer) {
        if($question->qID == $answer->qID) {
            $numAnswers++;
            $totalUpVotes = $totalUpVotes+$answer->upVotes-$answer->downVotes;
        }
    }
?>
<div class="searchCard">
    <div>

        <div class="searchCardLeftPane">
            <div class="byUserDiv">from <?= $question->name ?></div>
            <div style="height: 50px;">
                <div class="upVotesDiv"><?= $totalUpVotes ?></div>
                <div class="numAnswersDiv"><?= $numAnswers ?></div>
                <div class="numViewsDiv"><?= $question->numViews ?></div>
            </div>
        </div>
        <div class="questionContentDiv" onclick="window.location.href = '/forum/view?question=<?= $question->qID ?>'">
            <?= $question->qBody ?>
        </div>
        <div class="questionActionsDiv">
            <input type="button" data-toggle="tooltip" data-container="body" data-placement="right" title="Delete" class="btnQuestionDelete" onclick="bootbox.confirm('Are you sure you want to delete this question?', function(result) {if (result) {deleteQuestion('<?= $question->qID ?>')}});">
            <input type="button" data-toggle="tooltip" data-container="body" data-placement="right" title="Approve" class="btnQuestionApprove" onclick="bootbox.confirm('Are you sure you want to approve this question?', function(result) {if (result) {approveQuestion('<?= $question->qID ?>')}});">
            <input type="button" data-toggle="tooltip" data-container="body" data-placement="right" title="View" class="btnQuestionView" onclick="window.location.href = '/forum/view?question=<?= $question->qID ?>'">
        </div>
    </div>
</div>

<?php
$numAnswers = 0;
$totalUpVotes = 0;
}
?>

