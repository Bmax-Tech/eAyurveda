<div>
    <div align="center">
        <div id="sidebarNav">
            <div id="logoMessages" style="padding-top: 30px;">
                <img src="{{ URL::asset('assets/img/logo_ico.png')}}" style="height: auto; width:40%;">
            </div>
            <div style="font-family: 'Segoe UI', 'Roboto', 'Helvetica Neue'; font-size: 20px; color:#999; font-weight: 300; padding:20px 0 30px 0;">Messages & Notifications</div>

            <div class="LeftBarLink" onclick="loadinbox();">Inbox</div>
            <div class="LeftBarLink" onclick="loadsent();">Sent</div>
        </div>

        <div id="messagesDiv">

        </div>

        <div style="clear:both;"></div>
    </div>
</div>





<script>
    function loadinbox() {
        $.ajax({
            type: 'GET',
            url: '/forum/messages/inbox',
            cache: true,
            success: function (data) {
                $("#messagesDiv").html(data.page);
            }
        });
    }

    function loadsent() {
        $.ajax({
            type: 'GET',
            url: '/forum/messages/sent',
            cache: true,
            success: function (data) {
                $("#messagesDiv").html(data.page);
            }
        });
    }

</script>