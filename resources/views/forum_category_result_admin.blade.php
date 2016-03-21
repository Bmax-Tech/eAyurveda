<?php
foreach($categories as $category) {
        $cat = $category->catName
?>

<div class="catCard">
    <div class="catImageViewFrame" style="background-image: url('assets_social/img/forum_categories/<?= $category->imageURL ?>');">
        <div class="catImageView">
            <?= $cat ?>
            <div class="catImageBtnDiv">
                <button id="forumButton1" class="btnForumCard btnForumRed" onclick="bootbox.confirm('Are you sure you want to delete this category? All questions assigned to category will get removed.', function(result) {if (result) {deleteCategory('<?= $cat ?>')}});"></button>

            </div>
        </div>
    </div>
</div>

<?php }
?>

