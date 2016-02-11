<?php

$servername = "localhost";
$username = "root";
$password = "kitkat";
$dbname = "ayurvedalk";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT catName, catDescription, imageURL FROM forumCategory";
$result = $conn->query($sql);


?>
<div>
    <div class="forumAdminHead">
        Add New Category
        <div style="height: 1px; background-color: #aaa; width: 100%; margin-top: 5px;"></div>
    </div>
    <div id="addCategory">
        <div style="">
            {!! Form::open(array('url' => 'forum/addcategory')) !!}
            <div class="forumLeftCol">
                <div class="forumTxtLabel">
                    Category Name
                </div>
                <div>

                    {!! Form::text('catName','',array(
                        'placeholder' => 'Category (eg: Medicine)',
                        'class' => 'forumCatNameTxt'
                    )) !!}
                </div>
                <div class="forumTxtLabel" style="margin-top: 20px;">
                    Category Description
                </div>
                <div>
                    {!! Form::textarea('catDescription','',array(
                        'placeholder' => 'Describe the category',
                        'class' => 'forumCatDescriptionTxt'
                    )) !!}
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
                    <button id="forumCatImgUploadBtn" type="button" onclick="$('#forumCatImgFileChooser').trigger('click');">Browse</button>
                    <input type="file" name="forumCatImgFileChooser" id="forumCatImgFileChooser" style="display: none;">
                </div>
            </div>

            <div style="padding-top: 310px;">

                {!! Form::submit('Add Category', array(
                    'id' => 'forumCatSaveBtn'
                )) !!}
                {{ Form::hidden('hidden', 'home_11') }}
            </div>
            {!! Form::close() !!}
        </div>
    </div>

    <div class="forumAdminHead">
        Categories Available
        <div style="height: 1px; background-color: #aaa; width: 100%; margin-top: 5px;"></div>
    </div>
    <div id="availableForumCatList">

        <?php if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                ?>

                <div class="catCard">
                    <div class="catImageViewFrame" style="background-image: url('assets_social/img/forum_categories/<?= $row["imageURL"] ?>');">
                        <div class="catImageView">
                            <?= $row["catName"] ?>
                            <div class="catImageBtnDiv">
                                <button id="forumButton1" class="btnForumCard btnForumRed"></button>
                                {{--<button id="forumButton1" class="btnForumCard btnForumOrange"></button>--}}
                            </div>
                        </div>
                    </div>
                </div>

            <?php
            }
            } else {
                echo "0 results";
            }
            $conn->close(); ?>

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
