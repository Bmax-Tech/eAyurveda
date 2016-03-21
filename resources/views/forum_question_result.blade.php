<?php
    $i=0;
    foreach($questions as $question) {
        $i++;
?>

<div class="searchCard" onclick="window.location.href = '/forum/view?question=<?= $question->qID ?>'">
    <div>

        <div class="searchCardLeftPane">
            <div class="byUserDiv">from <?= $question->name ?></div>
            <div style="height: 50px;">
                <div class="upVotesDiv"><?= $question->upvotes ?></div>
                <div class="numAnswersDiv">2</div>
                <div class="numViewsDiv">10</div>
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

<?php }
?>

<script type="text/javascript">
    $("#numSearchResults").html("<?= $i ?> Search result(s) for '<?= $searchquery ?>'");
    $("#numSearchResults").css("visibility","visible");
</script>

