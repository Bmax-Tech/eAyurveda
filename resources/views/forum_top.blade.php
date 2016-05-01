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

                        <?php
                            $login = false;
                            $user = "";
                            if(isset($_COOKIE['user'])){
                                $user = json_decode($_COOKIE['user'],true);
                                $login = true;
                            } else if(isset($_COOKIE['admin_user'])) {
                                $user = json_decode($_COOKIE['admin_user'],true);
                                $login = true;
                            }

                            if($login) {
                        ?>

                        <div id="loginNavigation" runat="server" align="right">
                            <div>
                                <div id="loginName" runat="server"><?php echo $user[0]['first_name']; ?></div>
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

                                            <div class="notifyCard" onclick="window.location.href='viewmessage.aspx?message=id'">
                                                <div class="notifyImage" style="background-image:url('')"></div>
                                                <div class="notifyFrom">Admin</div>
                                                <br />
                                                <div class="notifyHead">Sample Head</div>
                                                <br />
                                                <div class="notifyBody">Sample Body</div>
                                            </div>

                                        </div>
                                        <div style="height:45px;"></div>
                                        <div class="bottomPanel">
                                            <div id="btnNewMessage"><div id="btnNewMsgIcon"></div>View All</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="loginProfile">
                                <div id="profilePic" onclick="profileDropDown()" runat="server"></div>
                                <div id="upArrow" class="arrow-up"></div>
                                <div id="profileDropDown">
                                    <div>
                                        <div id="dropInnerContent">
                                            <div id="innterProfilePic"></div>
                                            <div id="innerFullName" runat="server">


                                                <?= $user[0]['first_name']; ?>
                                            </div>
                                            <div id="innerEmail" runat="server">youremail@domain.com</div>
                                        </div>
                                        <div id="dropButtons">
                                            <div id="innerLogout">
                                                <input type="button" id="Button1" formnovalidate onclick="window.location = 'logout'; value="Log out" class="BtnInnerLogout">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>

                </nav>
                <div class="barLine"></div>
            </div>
        </div>
        <?php
        if(!$login) {
        ?>
        <div id="LoginButtonTopDiv">
            <input type="button" id="BtnLoginTop" class="loginButtonTop" value="Sign in" onclick="window.location = 'login';"
                   formnovalidate/>
        </div>
        <?php     }
        ?>

        @yield('body')

    </div>
</body>
</html>