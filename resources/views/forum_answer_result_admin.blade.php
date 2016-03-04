<script src="{{ URL::asset('assets_social/js/bootbox.min.js') }}" type="text/javascript"></script>
<script type="text/javascript">
    function deleteAnswer(aid) {
        var answerID = aid.toString();
        $.ajax({
            type:'GET',
            url:'forum/answer/delete/'+answerID+'/',
            cache: true,
            success: function(data){
                $("#forumQuestionsDiv").html(data.page);
            }
        });
    }

    function confirmDelete(aid) {
        var answerID = aid.toString();
        bootbox.confirm('Are you sure you want to delete this question?', function(result) {
            if (result) {
                deleteAnswer(aid);
            }
        });
    }

    function approveAnswer(aid) {
        var answerID = aid.toString();
        $.ajax({
            type:'GET',
            url:'forum/answer/approve/'+answerID+'/',
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
foreach($answers as $answer) {
?>

<div class="searchCard">
    <div>

        <div class="searchCardLeftPane">
            <div class="byUserDiv">from <?= $answer->name ?></div>
            <div style="height: 50px;">
                <div class="upVotesDiv"><?= $answer->upVotes ?></div>
                <div class="numAnswersDiv"><?= $answer->downVotes ?></div>
                <div class="numViewsDiv">10</div>
            </div>
        </div>
        <div class="questionContentDiv" onclick="window.location.href = '/forum/view?question=<?= $answer->qID ?>'">
            <?= $answer->aBody ?>
        </div>
        <div class="questionActionsDiv">
            <input type="button" data-toggle="tooltip" data-container="body" data-placement="right" title="Delete" class="btnQuestionDelete" onclick="confirmDelete('<?= $answer->aID ?>');">
            <input type="button" data-toggle="tooltip" data-container="body" data-placement="right" title="Approve" class="btnQuestionApprove" onclick="bootbox.confirm('Are you sure you want to approve this question?', function(result) {if (result) {approveAnswer('<?= $answer->aID ?>')}});">
            <input type="button" data-toggle="tooltip" data-container="body" data-placement="right" title="View in Forums" class="btnQuestionView" onclick="window.location.href = '/forum/view?question=<?= $answer->qID ?>&answer=<?= $answer->aid ?>'">
        </div>
    </div>
</div>

<?php }
?>

