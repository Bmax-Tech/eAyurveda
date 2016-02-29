<?php

$txt = '
  ';

echo $txt;
?>

<div>
    <div class="forumAdminHead">
        Add New Category
        <div style="height: 1px; background-color: #aaa; width: 100%; margin-top: 5px;"></div>
    </div>
    <div id="addCategory">
        <div style="">
            <div class="forumLeftCol">
                <div class="forumTxtLabel">
                    Category Name
                </div>
                <div>
                    <input type="text" placeholder="Category (eg: Medicine)" class="forumCatNameTxt">
                </div>
                <div class="forumTxtLabel" style="margin-top: 20px;">
                    Category Description
                </div>
                <div>
                    <textarea type="text" placeholder="Describe the category" class="forumCatDescriptionTxt"></textarea>
                </div>
            </div>
            <div class="forumRightCol">
                <div class="forumTxtLabel" style="margin-bottom: 3px !important">
                    Select Image
                </div>
                <div id="forumCatImageDiv">
                    <span style="display: inline-block;height: 100%;vertical-align: middle;"></span>
                    <img src="assets_social/img/upload_image.png" style="display: inline-block;vertical-align: middle;width: 60px">
                </div>
                <div>
                    <button id="forumCatImgUploadBtn" >Browse</button>
                </div>
            </div>

            <div style="padding-top: 310px;">
                <button id="forumCatSaveBtn" >Add Category</button>
            </div>
        </div>
    </div>

    <div class="forumAdminHead">
        Categories Available
        <div style="height: 1px; background-color: #aaa; width: 100%; margin-top: 5px;"></div>
    </div>
    <div id="availableForumCatList">

        <div class="catCard">
            <div class="catImageViewFrame" style="background-image: url('assets_social/img/forum_categories/general.jpg');">
                <div class="catImageView">
                    General
                    <div class="catImageBtnDiv">
                        <button id="forumButton1" class="btnForumCard btnForumRed">Delete</button>
                        <button id="forumButton1" class="btnForumCard btnForumOrange">Edit</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="catCard">
            <div class="catImageViewFrame" style="background-image: url('assets_social/img/forum_categories/medicine.jpg');">
                <div class="catImageView">
                    Medicine
                    <div class="catImageBtnDiv">
                        <button id="forumButton1" class="btnForumCard btnForumRed">Delete</button>
                        <button id="forumButton1" class="btnForumCard btnForumOrange">Edit</button>
                    </div>
                </div>
            </div>

        </div>

        <div class="catCard">
            <div class="catImageViewFrame" style="background-image: url('assets_social/img/forum_categories/treatment.jpg');">
                <div class="catImageView">
                    Treatment
                    <div class="catImageBtnDiv">
                        <button id="forumButton1" class="btnForumCard btnForumRed">Delete</button>
                        <button id="forumButton1" class="btnForumCard btnForumOrange">Edit</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="spacer" style="clear: both;"></div>
    </div>
</div>
