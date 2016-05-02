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

    var elm = document.createElement('div');
    elm.setAttribute('class', 'forumHomeHead');
    elm.setAttribute('style', 'position: relative; margin-top: 0px !important;');
    elm.innerHTML = "Recently Posted";

    var elm2 = document.createElement('div');
    elm2.setAttribute('style', 'height: 1px; background-color: #aaa; width: 100%; margin: 5px 0 20px 0;');

    $.ajax({
        type:'GET',
        url:'forum/getcategories/',
        cache: true,
        success: function(data){
            $("#availableForumCatList").html(data.page);
        }
    });

    var keyword = " ";
    $.ajax({
        type:'GET',
        url:'forum/questions/browserecent/',
        cache: true,
        success: function(data){
            $("#numSearchResults").hide();
            $("#resultList").html(" ");
            $("#resultList").append(elm);
            $("#resultList").append(elm2);
            $("#resultList").append(data.page);
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
            $("#numSearchResults").show();
            $("#resultList").html(" ");
            $("#resultList").html(data.page);
        }
    });
}

function displayAndScroll(catN, catname) {
    $('html, body').animate({
        scrollTop: $("#resultList").offset().top+5
    }, 1000);

    var cat = catN.toString();

    var elm = document.createElement('div');
    elm.setAttribute('class', 'forumHomeHead');
    elm.setAttribute('style', 'position: relative; margin-top: 0px !important;');
    elm.innerHTML = "Browse Category: " + catname.toString();

    var elm2 = document.createElement('div');
    elm2.setAttribute('style', 'height: 1px; background-color: #aaa; width: 100%; margin: 5px 0 20px 0;');

    $.ajax({
        type:'GET',
        url:'forum/browse/'+cat+'/',
        cache: true,
        success: function(data){
            $("#numSearchResults").hide();
            $("#resultList").html(" ");
            $("#resultList").append(elm);
            $("#resultList").append(elm2);
            $("#resultList").append(data.page);
        }
    });
}

function upVote(aid, user, elem) {
    if(user == "") {
        $("#signInMessage").show();
        $("#signInMessage").animate({
            'margin-bottom': '15px'
        });
    } else {
        var votesDivID = "answer"+aid+"votes";
        $.ajax({
            type:'GET',
            url:'answer/upvote/'+aid+'/'+user+'/',
            cache: true,
            success: function(data){
                /* Get the current value, incraese the returned value */
                var value = parseInt($("#"+votesDivID).text(), 10) + parseInt(data);
                $("#"+votesDivID).text(value);

                if(data == 0) {
                    $message = "You have already <strong>Up Voted</strong> the post";
                    $("#dangertitle").html($message);
                    $('#DangerPop').show(0).delay(5000).hide(0);
                    $("#DangerPop").animate({
                        'margin-bottom': '15px'
                    });

                    /* mark buttons as voted */
                    elem.className += " upVoteHovered";
                    elem.setAttribute("data-original-title" , "Voted by you");

                    /* unmark the other button as non voted */
                    $("#answer"+aid+"DownVote").removeClass("downVoteHovered");
                    $("#answer"+aid+"DownVote").attr("data-original-title", "Down Vote");

                } else if(data == 1) {
                    $message = "You have <strong>Up Voted</strong> the post";
                    $("#successtitle").html($message);
                    $('#SuccessPop').show(0).delay(5000).hide(0);
                    $("#SuccessPop").animate({
                        'margin-bottom': '15px'
                    });

                    /* mark buttons as voted */
                    elem.className += " upVoteHovered";
                    elem.setAttribute("data-original-title" , "Voted by you");

                    /* unmark the other button as non voted */
                    $("#answer"+aid+"DownVote").removeClass("downVoteHovered");
                    $("#answer"+aid+"DownVote").attr("data-original-title", "Down Vote");
                } else if(data == 2) {
                    $message = "You have <strong>Changed your vote</strong> for the post";
                    $("#successtitle").html($message);
                    $('#SuccessPop').show(0).delay(5000).hide(0);
                    $("#SuccessPop").animate({
                        'margin-bottom': '15px'
                    });

                    /* mark buttons as voted */
                    elem.className += " upVoteHovered";
                    elem.setAttribute("data-original-title" , "Voted by you");

                    /* unmark the other button as non voted */
                    $("#answer"+aid+"DownVote").removeClass("downVoteHovered");
                    $("#answer"+aid+"DownVote").attr("data-original-title", "Down Vote");
                }
            }
        });
        $("#signInMessage").hide();
    }
}

function downVote(aid, user, elem) {
    if(user == "") {
        $("#signInMessage").show();
        $("#signInMessage").animate({
            'margin-bottom': '15px'
        });
    } else {
        var votesDivID = "answer"+aid+"votes";
        $.ajax({
            type:'GET',
            url:'answer/downvote/'+aid+'/'+user+'/',
            cache: true,
            success: function(data){
                var value = parseInt($("#"+votesDivID).text(), 10) + parseInt(data);
                $("#"+votesDivID).text(value);

                if(data == 0) {
                    $message = "You have already <strong>Down Voted</strong> the post";
                    $("#dangertitle").html($message);
                    $('#DangerPop').show(0).delay(5000).hide(0);
                    $("#DangerPop").animate({
                        'margin-bottom': '15px'
                    });

                    /* mark buttons as voted */
                    elem.className += " downVoteHovered";
                    elem.setAttribute("data-original-title" , "Voted by you");


                    /* unmark the other button as non voted */
                    $("#answer"+aid+"UpVote").removeClass("upVoteHovered");
                    $("#answer"+aid+"UpVote").attr("data-original-title", "Up Vote");
                } else if(data == -1) {
                    $message = "You have <strong>Down Voted</strong> the post";
                    $("#successtitle").html($message);
                    $('#SuccessPop').show(0).delay(5000).hide(0);
                    $("#SuccessPop").animate({
                        'margin-bottom': '15px'
                    });

                    /* mark buttons as voted */
                    elem.className += " downVoteHovered";
                    elem.setAttribute("data-original-title" , "Voted by you");

                    /* unmark the other button as non voted */
                    $("#answer"+aid+"UpVote").removeClass("upVoteHovered");
                    $("#answer"+aid+"UpVote").attr("data-original-title", "Up Vote");

                } else if(data == -2) {
                    $message = "You have <strong>Changed your vote</strong> for the post";
                    $("#successtitle").html($message);
                    $('#SuccessPop').show(0).delay(5000).hide(0);
                    $("#SuccessPop").animate({
                        'margin-bottom': '15px'
                    });

                    /* mark buttons as voted */
                    elem.className += " downVoteHovered";
                    elem.setAttribute("data-original-title" , "Voted by you");

                    /* unmark the other button as non voted */
                    $("#answer"+aid+"UpVote").removeClass("upVoteHovered");
                    $("#answer"+aid+"UpVote").attr("data-original-title", "Up Vote");
                }
            }
        });
        $("#signInMessage").hide();
    }
}

function flagAnswer(aid, user, elem) {
    if(user == "") {
        $("#signInMessage").show();
        $("#signInMessage").animate({
            'margin-bottom': '15px'
        });
    } else {
        bootbox.dialog({
            message: "Are you sure you want to report this answer?",
            title: "Report Answer",
            buttons: {
                danger: {
                    label: "Report",
                    className: "btn-danger",
                    callback: function() {
                        /* Ajax call to report the post */
                        $.ajax({
                            type:'GET',
                            url:'answer/flaganswer/'+aid+'/'+user+'/',
                            cache: true,
                            success: function(data){
                                if(data == "success") {
                                    $('#FlagSuccess').show(0).delay(5000).hide(0);
                                    $("#FlagSuccess").animate({
                                        'margin-bottom': '15px'
                                    });
                                    elem.className += " btnForumFlagActive";
                                    elem.setAttribute("data-original-title" , "Flagged by you");

                                } else if(data == "denied") {
                                    $('#AlreadyFlaggedMessage').show(0).delay(5000).hide(0);
                                    $("#AlreadyFlaggedMessage").animate({
                                        'margin-bottom': '15px'
                                    });
                                    elem.className += " btnForumFlagActive";
                                    elem.title = "Flagged";
                                    elem.setAttribute("data-original-title" , "Flagged by you");
                                }
                            }
                        });
                    }
                },
                main: {
                    label: "Cancel",
                    className: "btn-primary",
                    callback: function() {
                        show: false
                    }
                }
            }
        });
    }
}

function flagQuestion(qid, user, elem) {
    if(user == "") {
        $("#signInMessage").show();
        $("#signInMessage").animate({
            'margin-bottom': '15px'
        });
    } else {
        bootbox.dialog({
            message: "Are you sure you want to report this question?",
            title: "Report Question",
            buttons: {
                danger: {
                    label: "Report",
                    className: "btn-danger",
                    callback: function() {
                        /* Ajax call to report the post */
                        $.ajax({
                            type:'GET',
                            url:'answer/flagquestion/'+qid+'/'+user+'/',
                            cache: true,
                            success: function(data){
                                if(data == "success") {
                                    $('#FlagSuccess').show(0).delay(5000).hide(0);
                                    $("#FlagSuccess").animate({
                                        'margin-bottom': '15px'
                                    });
                                    elem.className += " btnForumFlagActive";
                                    elem.setAttribute("data-original-title" , "Flagged by you");

                                } else if(data == "denied") {
                                    $('#AlreadyFlaggedMessage').show(0).delay(5000).hide(0);
                                    $("#AlreadyFlaggedMessage").animate({
                                        'margin-bottom': '15px'
                                    });
                                    elem.className += " btnForumFlagActive";
                                    elem.title = "Flagged";
                                    elem.setAttribute("data-original-title" , "Flagged by you");
                                }
                            }
                        });
                    }
                },
                main: {
                    label: "Cancel",
                    className: "btn-primary",
                    callback: function() {
                        show: false
                    }
                }
            }
        });
    }
}


function subscribeToForum(qid, user) {

    if(user == "") {
        $("#signInMessage").show();
        $("#signInMessage").animate({
            'margin-bottom': '15px'
        });
    } else {
        bootbox.dialog({
            message: "Subscribe to this Thread?",
            title: "Subscribe",
            buttons: {
                danger: {
                    label: "Subscribe",
                    className: "btn-success",
                    callback: function() {
                        /* Ajax call to subscribe to the post */
                        $.ajax({
                            type:'GET',
                            url:'subscribe/'+qid+'/'+user+'/',
                            cache: true,
                            success: function(data){
                                if(data == "success") {
                                    $('#SubscribeSuccess').show(0).delay(5000).hide(0);
                                    $("#SubscribeSuccess").animate({
                                        'margin-bottom': '15px'
                                    });

                                } else if(data == "unsubscribed") {
                                    $('#AlreadySubscribedMessage').show(0).delay(5000).hide(0);
                                    $("#AlreadySubscribedMessage").animate({
                                        'margin-bottom': '15px'
                                    });
                                }
                            }
                        });
                    }
                },
                main: {
                    label: "Cancel",
                    className: "btn-primary",
                    callback: function() {
                        show: false
                    }
                }
            }
        });
    }
}

function markAsBestAnswer(qid, aid) {

        bootbox.dialog({
            message: "Mar as Best Answer?",
            title: "Mark Best Answer",
            buttons: {
                danger: {
                    label: "Submit",
                    className: "btn-success",
                    callback: function() {
                        /* Ajax call to subscribe to the post */
                        $.ajax({
                            type:'GET',
                            url:'markbestanswer/'+qid+'/'+aid+'/',
                            cache: true,
                            success: function(data){
                                if(data == "success") {
                                    $('#MarkBestSuccess').show(0).delay(5000).hide(0);
                                    $("#MarkBestSuccess").animate({
                                        'margin-bottom': '15px'
                                    });

                                } else if(data == "updated") {
                                    $('#MarkBestUpdated').show(0).delay(5000).hide(0);
                                    $("#MarkBestUpdated").animate({
                                        'margin-bottom': '15px'
                                    });
                                }
                            }
                        });
                    }
                },
                main: {
                    label: "Cancel",
                    className: "btn-primary",
                    callback: function() {
                        show: false
                    }
                }
            }
        });

}

var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};

function timeDifference(current, previous) {

    var msPerMinute = 60 * 1000;
    var msPerHour = msPerMinute * 60;
    var msPerDay = msPerHour * 24;
    var msPerMonth = msPerDay * 30;
    var msPerYear = msPerDay * 365;

    var elapsed = current - previous;

    if (elapsed < msPerMinute) {
        return Math.round(elapsed/1000) + ' seconds ago';
    }

    else if (elapsed < msPerHour) {
        return Math.round(elapsed/msPerMinute) + ' minutes ago';
    }

    else if (elapsed < msPerDay ) {
        return Math.round(elapsed/msPerHour ) + ' hours ago';
    }

    else if (elapsed < msPerMonth) {
        return 'approximately ' + Math.round(elapsed/msPerDay) + ' days ago';
    }

    else if (elapsed < msPerYear) {
        return 'approximately ' + Math.round(elapsed/msPerMonth) + ' months ago';
    }

    else {
        return 'approximately ' + Math.round(elapsed/msPerYear ) + ' years ago';
    }
}



