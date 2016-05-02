<?php
    $i=0;
        $numAnswers = 0;
        $totalUpVotes = 0;
    foreach($questions as $question) {
        $i++;
        foreach($answers as $answer) {
            if($question->qID == $answer->qID) {
                $numAnswers++;
                $totalUpVotes = $totalUpVotes+$answer->upVotes-$answer->downVotes;
            }

        }

?>

<div class="searchCard" onclick="window.location.href = '/forum/view?question=<?= $question->qID ?>'">
    <div>

        <div class="searchCardLeftPane">
            <div class="byUserDiv">from <?= $question->name ?></div>
            <div style="height: 50px;">
                <div class="upVotesDiv"><?= $totalUpVotes ?></div>
                <div class="numAnswersDiv"><?= $numAnswers ?></div>
                <div class="numViewsDiv"><?= $question->numViews ?></div>
            </div>
        </div>
        <div class="questionContentDiv">
            <?= $question->qBody ?>
        </div>
        <div class="questionActionsDiv">
            <input type="button" class="btnQuestionView"  onclick="window.location.href = '/forum/view?question=<?= $question->qID ?>'">
        </div>
    </div>
</div>

<?php
$totalUpVotes = 0;
$numAnswers = 0;
}
?>

<script type="text/javascript">
    $("#numSearchResults").html("<?= $i ?> Search result(s) for '<?= $searchquery ?>'");
    $("#numSearchResults").css("visibility","visible");
</script>

