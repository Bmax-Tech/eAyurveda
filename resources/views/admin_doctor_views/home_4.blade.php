
<!-- ************************************* -->

<div width="100%" style="margin: 5px;padding: 5px;background: #FFF">
    <input type="hidden" id="DoctorConfirmPage" value="YES">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="margin-left: 0px;min-height: 529px;">
        <!-- Content Header (Page header) -->
        <section class="content-header" style="padding-top: 18px">
            <h1>
                Physicians
            </h1>
        </section>

        <!-- Main content -->
        <section class="content" style="min-height: 0px;padding-bottom: 0px">
            <div class="row c_no_padding" style="padding: 10px 10px">
                <ul style="list-style: none;padding-left: 5px;padding-right: 5px;">
                    <li style="margin-bottom: 10px;">
                        <lable>Search</lable>
                    </li>
                    <li>
                        <form onsubmit=" return DoctorConfirmSubmit();">
                            <input autocomplete="off" spellcheck="false" placeholder="Enter text here" type="text" onkeyup="LoadDoctorList()" id="searc_con_text" name="doc_search" style="height: 35px;width: 80%;padding-left: 10px;padding-right: 10px;"><button type="submit" style="height: 35px;width: 20%;background: #00890E;border: 1px;color: #FFF;">Search</button>
                        </form>
                    </li>
                </ul>
            </div>
        </section><!-- /.content -->
        <!-- Main content -->
        <section class="content">
            <table class="doc_con_th_table">
                <tr>
                    <th style="width: 5%" class="doc_con_first_th">#</th>
                    <th style="width: 25%" class="doc_con_com_th">Name</th>
                    <th style="width: 15%" class="doc_con_com_th">Ayurvedic ID</th>
                    <th style="width: 15%" class="doc_con_com_th">Doctor Type</th>
                    <th style="width: 25%" class="doc_con_com_th">Email</th>
                    <th style="width: 15%" class="doc_con_com_th">Contact No</th>
                </tr>
            </table>
            <div id="doctor_result">
                <!-- Load Doctor results through Ajax -->
            </div>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
</div>
<div class="doc_pop_container" id="doc_confirm_pop_up" style="display: none">
    <input type="hidden" id="doctor_id_con" value="0"/>
    <input type="hidden" id="doctor_user_id_con" value="0"/>
    <div class="chat_pop_up" id="doc_confirm_form" style="height: 385px;margin-top: 85px">
        <div style="background: #39B54A">
            <div style="color: #FFF;margin-left: 20px;font-size: 18px;padding: 10px 0px">Doctor View</div>
            <img src="{{ URL::asset('assets/img/close_chat_btn.png') }}" style="float: right;width: 20px;margin: 15px;cursor: pointer;margin-top: -30px" onclick="CloseDocConfirmPopup()">
        </div>
        <div style="background: #fff;width: 100%;height: 89%;border-top-left-radius: 7px;border-top-right-radius: 7px;padding: 10px">
            <div class="doc_con_box">
                <div class="col-lg-5 c_no_padding" id="doc_con_load_img"></div>
                <div class="col-lg-7 c_no_padding">
                    <ul style="list-style: none;padding-left: 10px">
                        <li style="margin-bottom: 7px"><span style="font-weight: 500;font-size: 17px">Ayurvedic ID</span></li>
                        <li style="margin-bottom: 10px"><span style="color: #7B7B7B" id="doc_con_load_aid"></span></li>
                        <li style="margin-bottom: 7px"><span style="font-weight: 500;font-size: 17px">Name</span></li>
                        <li style="margin-bottom: 10px"><span style="color: #7B7B7B" id="doc_con_load_name"></span></li>
                        <li style="margin-bottom: 7px"><span style="font-weight: 500;font-size: 17px">Doctor Type</span></li>
                        <li style="margin-bottom: 10px"><span style="color: #7B7B7B" id="doc_con_load_type"></span></li>
                    </ul>
                </div>
            </div>
            <div>
                <div class="col-lg-6 c_no_padding">
                    <ul style="list-style: none;padding-right: 10px;padding-left: 0px">
                        <li style="margin-bottom: 7px"><span style="font-weight: 500;font-size: 17px">Username</span></li>
                        <li style="margin-bottom: 10px"><input type="text" style="padding: 7px 10px;width: 100%;border-radius: 7px;border: 1px solid rgba(0, 0, 0, 0.33)" placeholder="enter username" id="doc_con_load_username" value=""/></li>
                    </ul>
                </div>
                <div class="col-lg-6 c_no_padding">
                    <ul style="list-style: none;padding-left: 10px">
                        <li style="margin-bottom: 7px"><span style="font-weight: 500;font-size: 17px">Password</span></li>
                        <li style="margin-bottom: 10px"><input type="password" style="padding: 7px 10px;width: 100%;border-radius: 7px;border: 1px solid rgba(0, 0, 0, 0.33)" placeholder="enter password" id="doc_con_load_password" value=""/></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-12 c_no_padding" style="padding-top: 20px">
                <div class="col-lg-6 c_no_padding" style="padding-right: 5px;">
                    <button onclick="SaveDocConfirm()" type="button" style="width: 100%;background: #39B54A;color: #FFF;padding: 10px;border: 1px solid #133317;border-radius: 2px;">Save</button>
                </div>
                <div class="col-lg-6 c_no_padding" style="padding-left: 5px;">
                    <button onclick="SaveAndSendMailDocConfirm()" type="button" style="width: 100%;background: #393DB5;color: #FFF;padding: 10px;border: 1px solid #133317;border-radius: 2px;">Save & Send Mail</button>
                </div>
            </div>
        </div>
    </div>
    <div class="waiting_confirm" style="display: none">
        <img style="float: left" src="{{ URL::asset('assets/img/mail.png') }}"><p style="float: left;font-size: 18px;margin: 10px 25px;">Sending Email</p>
    </div>
    <div class="confirm_success" style="display: none">
        <img style="float: left" src="{{ URL::asset('assets/img/ok_3.png') }}"><p style="float: left;font-size: 18px;margin: 10px 25px;">Successfully Saved</p>
    </div>
</div>



<!-- ************************************* -->
