<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    @section('head')
        <link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('assets_social/css/forum_top_style.css') }}" rel="stylesheet">
    @show
    @yield('forumHead')
</head>
<body>
    <div>
        <div id="topBar">
            <div>
                <nav role="navigation" class="navbar navbar-default">
                    <div class="topBarLogoDiv">
                        <img src="{{ URL::asset('assets/img/logo_ico.png') }}" class="topBarLogo">
                    </div>

                    <!-- toggle get grouped for better mobile display -->
                    <div class="navbar-header">

                        <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <!-- Collection of nav links and other content for toggling -->
                    <div id="navbarCollapse" class="collapse navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li><a href="/">Home</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Physicians</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">About</a></li>
                            <li class="active"><a href="/forum">Forum</a></li>
                        </ul>

                        <?php $admin_user = json_decode($_COOKIE['admin_user'],true); ?>

                        <div id="loginNavigation" runat="server" align="right">
                            <div>
                                <div id="loginName" runat="server"><?php echo $admin_user[0]['first_name']; ?></div>
                            </div>
                            <div id="loginNotifications">
                                <div id="notificationCount" title="Notification(s)" class="notificationCountZero" onclick="notificationDropDown()" runat="server">0</div>
                                <div id="UpArrowN" class="arrow-up2"></div>
                                <div id="notificationDropDown">
                                    <div>
                                        <div id="notifyHeader">
                                            <div style="margin-left:20px;">Notifications</div>
                                        </div>
                                        <div id="notificationCards">



                                        </div>
                                        <div style="height:45px;"></div>
                                        <div class="bottomPanel">
                                            <div id="btnNewMessage"><div id="btnNewMsgIcon"></div>New Message</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="loginProfile">
                                <div id="profilePic" onclick="profileDropDown()" runat="server"></div>
                                <div id="upArrow" class="arrow-up"></div>
                                <div id="profileDropDown">
                                    <div>
                                        <div id="dropHeader"><div style="margin-left:20px;">Account</div></div>
                                        <div id="dropInnerContent">
                                            <div id="innterProfilePic"></div>
                                            <div id="innerFullName" runat="server"><?= $admin_user[0]['first_name']." Unais"; ?></div>
                                            <div id="innerEmail" runat="server">youremail@domain.com</div>
                                        </div>
                                        <div id="dropButtons">
                                            <div id="innerLogout">
                                                <input type="button" id="Button1" formnovalidate value="Log out" class="BtnInnerLogout">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </nav>
                <div class="barLine"></div>
            </div>
        </div>

        @yield('body')

    </div>
</body>
</html>