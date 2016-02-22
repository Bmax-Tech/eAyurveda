<?php
foreach($categories as $category) {
?>

<div class="catCard">
    <div class="catImageViewFrame" style="background-image: url('/assets_social/img/forum_categories/<?= $category->imageURL ?>');">
        <div class="catImageView">
            <?= $category->catName ?>
        </div>
    </div>
</div>

<?php }
?>

