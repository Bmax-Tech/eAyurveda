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
                    </div>
                </nav>
                <div class="barLine"></div>
            </div>
        </div>

        @yield('body')

    </div>
</body>
</html>