
<!-- ************************************* -->

<div width="100%" style="margin: 5px;padding: 5px;background: #FFF">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="margin-left: 0px">
        <!-- Content Header (Page header) -->
        <section class="content-header" style="padding-top: 18px">
            <h1>
                Chat Users
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row c_no_padding" style="padding: 10px 10px" id="av_users_list">
            <!-- User Tap Div -->
            </div>
        </section><!-- /.content -->
        <!-- Main content -->
        <section class="content">
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
</div>
<div class="doc_pop_container" id="chat_pop_up_container" style="display: none">
    <input type="hidden" id="current_user_id" value="0">
    <div class="chat_pop_up">
        <div style="background: #FF852F">
            <img src="{{ URL::asset('assets/img/chat_icon.png') }}" style="width: 60px;margin: 8px">
            <span style="color: #FFF;margin-left: 20px" id="user_name_chat_pop_up"></span>
            <img src="{{ URL::asset('assets/img/close_chat_btn.png') }}" style="float: right;width: 20px;margin: 15px;cursor: pointer" onclick="CloseAdminChat()">
        </div>
        <div style="background: #fff;width: 100%;height: 89%;border-top-left-radius: 7px;border-top-right-radius: 7px">
            <div class="c_chat_box">
                <!-- Chat Details Load Here -->
            </div>
            <div style="height: 10%;width: 100%;border-top: 1px solid #F15822">
                <form id="chat_form" method="post" onsubmit="return ChatSubmitCLick();" style="width: 100%;height: 100%">
                    <input name="message" id="chat_message_txt" type="text" placeholder="Type Message Here" spellcheck="false" autocomplete="off">
                    <div class="c_chat_send" id="chat_send" onclick="SendMessage()"><img src="{{ URL::asset('assets/img/sent.png') }}" style="width:60%;margin: 0px 0px 0px 12px;height: 100%;"></div>
                </form>
            </div>
        </div>
    </div>
</div>
<input type="hidden" id="home_base_url" value="{{ URL::asset('assets/img') }}"/>



<!-- ************************************* -->
