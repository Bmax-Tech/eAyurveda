<?php
foreach($categories as $category) {
        $cat = $category->catID
?>

<div class="catCard" onclick="displayAndScroll('<?= $cat ?>','<?= $category->catName?>')">
    <div class="catImageViewFrame" style="background-image: url('/assets_social/img/forum_categories/<?= $category->imageURL ?>');">
        <div class="catImageView">
            <?= $category->catName ?>
        </div>
    </div>
</div>
<?php }
?>


