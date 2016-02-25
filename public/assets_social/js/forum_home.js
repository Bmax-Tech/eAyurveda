/**
 * Created by NuttLoose on 2/9/2016.
 */

var dropToggleState = false;
function profileDropDown() {
    hideNotificationDropDown();
    var dropMenu = $('#profileDropDown')[0];
    var UpArrow = $('#upArrow')[0];

    if (!dropToggleState) {
        UpArrow.style.display = 'inherit';
        dropMenu.style.display = 'inherit';
        dropMenu.className += " animateDrop";
        dropToggleState = true;
    } else {
        UpArrow.style.display = 'none';
        dropMenu.style.display = 'none';
        dropMenu.className = dropMenu.className.replace(/(?:^|\s)animateDrop(?!\S)/g, '');
        dropToggleState = false;
    }
}

var notifyDropState = false;
function notificationDropDown() {
    hideProfileDropDown();
    var dropNotify = $('#notificationDropDown')[0];
    var UpArrow2 = $('#UpArrowN')[0];

    if (!notifyDropState) {
        UpArrow2.style.display = 'inherit';
        dropNotify.style.display = 'inherit';
        dropNotify.className += " animateDrop";
        notifyDropState = true;
    } else {
        UpArrow2.style.display = 'none';
        dropNotify.style.display = 'none';
        dropNotify.className = dropNotify.className.replace(/(?:^|\s)animateDrop(?!\S)/g, '');
        notifyDropState = false;
    }
}

function hideProfileDropDown() {
    var dropMenu = $('#profileDropDown')[0];
    var UpArrow = $('#upArrow')[0];

    UpArrow.style.display = 'none';
    dropMenu.style.display = 'none';
    dropMenu.className = dropMenu.className.replace(/(?:^|\s)animateDrop(?!\S)/g, '');
    dropToggleState = false;
}

function hideNotificationDropDown() {
    var dropNotify = $('#notificationDropDown')[0];
    var UpArrow2 = $('#UpArrowN')[0];

    UpArrow2.style.display = 'none';
    dropNotify.style.display = 'none';
    dropNotify.className = dropNotify.className.replace(/(?:^|\s)animateDrop(?!\S)/g, '');
    notifyDropState = false;
}

function hideMessageBox() {
    $("#messageBoxDiv").remove();
}


$(document).on('click', function (e) {
    hideNotificationDropDown();
    hideProfileDropDown();
});


$(document).ready(function () {
    var keyword = $("#txtSearchItem").val();
    $.ajax({
        type:'GET',
        url:'forum/getcategories/',
        cache: true,
        success: function(data){
            $("#availableForumCatList").html(data.page);
        }
    });


    $("#txtSearchItem").focusin(function () {
        $("#btnSearchItem").addClass("btnSearchItemHovered");
    });
    $("#txtSearchItem").focusout(function () {
        $("#btnSearchItem").removeClass("btnSearchItemHovered");
    });
    $("#txtSearchItem").focus();
    var url = window.location.href;
    var qvariable1 = url.substring(url.indexOf("?") + 1, url.indexOf("="));
    var qvalue1 = url.substring(url.indexOf("=") + 1);
    if (qvariable1 == "search") {
        document.getElementById('txtSearchItem').value = qvalue1;
    }

    $(function() {
        $("#txtSearchItem").keypress(function (e) {
            if ((e.which && e.which == 13) || (e.keyCode && e.keyCode == 13)) {
                $('#btnSearchItem').click();
                return false;
            } else {
                return true;
            }
        });
    });

    $('#profileNav').bind('mouseenter', function () {
        $('#profileDropDown2').css('display', 'inherit');
    });
    $('#profileNav').bind('mouseleave', function () {
        $('#profileDropDown2').css('display', 'none');
    });
    $('#profileDropDown').on('click', function(e) {
        e.stopPropagation();
    });
    $('#notificationDropDown').on('click', function(e) {
        e.stopPropagation();
    });
    $('#UpArrow').on('click', function(e) {
        e.stopPropagation();
    });
    $('#UpArrowN').on('click', function(e) {
        e.stopPropagation();
    });
    $('#notificationCount').on('click', function(e) {
        e.stopPropagation();
    });
    $('#profilePic').on('click', function(e) {
        e.stopPropagation();
    });

});

function displayResults(){
    var keyword = $("#txtSearchItem").val();
    $.ajax({
        type:'GET',
        url:'forum/search/'+keyword+'/',
        cache: true,
        success: function(data){
            $("#resultList").html(data.page);
        }
    });
};


