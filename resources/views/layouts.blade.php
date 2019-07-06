<!doctype html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="icon" href="./favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico" />
    <!-- Generated: 2018-04-04 18:58:30 +0200 -->
    <title>Login - Safe City</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <script src="{{asset('assets/js/require.min.js')}}"></script>
    <script>
        requirejs.config({
            baseUrl: '.'
        });
    </script>
    <!-- Dashboard Core -->
    <link href="./assets/css/dashboard.css" rel="stylesheet" />
    <script src="./assets/js/dashboard.js"></script>
    <!-- c3.js Charts Plugin -->
    <link href="./assets/plugins/charts-c3/plugin.css" rel="stylesheet" />
    <script src="./assets/plugins/charts-c3/plugin.js"></script>
    <!-- Google Maps Plugin -->
    <link href="./assets/plugins/maps-google/plugin.css" rel="stylesheet" />
    <script src="./assets/plugins/maps-google/plugin.js"></script>
    <!-- Input Mask Plugin -->
    <script src="./assets/plugins/input-mask/plugin.js"></script>
    <style type="text/css">
        ul li{
            display: block;
            text-decoration: none;
        }
        .sidebar-nav {
            background: #014461;
        }
        .sidebar-nav ul {
            padding: 0;
            margin: 0;
            list-style: none;
            background: #343a40;
        }

        .sidebar-nav .metismenu {
            background: #014461;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
        }

        .sidebar-nav .metismenu li + li {
            margin-top: 5px;
        }

        .sidebar-nav .metismenu li:first-child {
            margin-top: 5px;
        }
        .sidebar-nav .metismenu li:last-child {
            margin-bottom: 5px;
        }


        .sidebar-nav .metismenu > li {
            /*-webkit-box-flex: 1;
            -ms-flex: 1 1 0%;
            flex: 1 1 0%;*/
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            position: relative;
        }
        .sidebar-nav .metismenu a {
            position: relative;
            display: block;
            padding: 13px 15px;
            color: #adb5bd;
            outline-width: 0;
            transition: all .3s ease-out;
        }

        .sidebar-nav .metismenu ul a {
            padding: 10px 15px 10px 30px;
        }

        .sidebar-nav .metismenu ul ul a {
            padding: 10px 15px 10px 45px;
        }

        .sidebar-nav .metismenu a:hover,
        .sidebar-nav .metismenu a:focus,
        .sidebar-nav .metismenu a:active,
        .sidebar-nav .metismenu .mm-active > a {
            color: #000;
            text-decoration: none;
            background: #fff;
        }
    </style>
</head>
<body class="">
<div class="page">
    <div class="page-main">
        <div class="header">
            <div class="container-fluid">
                <div class="d-flex">
                    <a class="navbar-brand" href="./index.html">
                        Safe City
                    </a>
                    <div class="ml-auto d-flex order-lg-2">

                        <!--<div class="dropdown d-none d-md-flex">-->
                        <!--<a class="nav-link icon" data-toggle="dropdown">-->
                        <!--<i class="fe fe-message-square"></i>-->
                        <!--</a>-->
                        <!--<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow px-4">-->
                        <!--Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium architecto asperiores dolorem, est fugiat in maxime natus officia velit voluptas! Ab asperiores-->
                        <!--delectus dolore dolores maxime nesciunt qui quia totam.-->
                        <!--</div>-->
                        <!--</div>-->
                        <div class="dropdown d-none d-md-flex">
                            <a class="nav-link icon" data-toggle="dropdown">
                                <i class="fe fe-bell"></i>
                                <span class="nav-unread"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                <a href="#" class="dropdown-item d-flex">
                                    <span class="avatar mr-3 align-self-center" style="background-image: url(demo/faces/male/41.jpg)"></span>
                                    <div>
                                        <strong>Nathan</strong> pushed new commit: Fix page load performance issue.
                                        <div class="small text-muted">10 minutes ago</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item d-flex">
                                    <span class="avatar mr-3 align-self-center" style="background-image: url(demo/faces/female/1.jpg)"></span>
                                    <div>
                                        <strong>Alice</strong> started new task: Tabler UI design.
                                        <div class="small text-muted">1 hour ago</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item d-flex">
                                    <span class="avatar mr-3 align-self-center" style="background-image: url(demo/faces/female/18.jpg)"></span>
                                    <div>
                                        <strong>Rose</strong> deployed new version of NodeJS REST Api V3
                                        <div class="small text-muted">2 hours ago</div>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item text-center text-muted-dark">Mark all as read</a>
                            </div>
                        </div>
                        <div class="dropdown">
                            <a href="#" class="nav-link pr-0" data-toggle="dropdown">
                                <span class="avatar" style="background-image: url(./demo/faces/female/25.jpg)"></span>
                                <span class="ml-2 d-none d-lg-block">
                      <span class="text-default">{{auth()->user()->name}}</span>
                      <small class="text-muted d-block mt-1">{{auth()->user()->is_admin}}</small>
                    </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">



                                <a class="dropdown-item" href="{{url('logout')}}">
                                    <i class="dropdown-icon fe fe-log-out"></i> Sign out
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="min-height:680px;overflow: hidden">
            <div class="col-lg-1 col-md-2 text-center">
                <nav class="sidebar-nav h-100" style="background-color: #014461!important">
                    <ul class="metismenu" id="menu2">
                        <li>
                            <a class="has-arrow" href="#">
                                <span class="fa fa-fw fa-github fa-lg"></span>
                                <span class="badge badge-danger" style="position: absolute;top:7px;right:29px;border-radius: 50%;">2</span>
                                Accidents
                            </a>
                        </li>
                        <li>
                            <a class="has-arrow" href="#">
                                <span class="fa fa-fw fa-github fa-lg"></span><br />
                                <span class="badge badge-danger" style="position: absolute;top:7px;right:29px;border-radius: 50%;">5</span>
                                Fire
                            </a>
                        </li>
                        <li>
                            <a class="has-arrow" href="#">
                                <span class="fa fa-fw fa-github fa-lg"></span><br />
                                <span class="badge badge-danger" style="position: absolute;top:7px;right:29px;border-radius: 50%;">2</span>
                                Abuse
                            </a>
                        </li>
                        <li>
                            <a class="has-arrow" href="#">
                                <span class="fa fa-fw fa-github fa-lg"></span><br />
                                <span class="badge badge-danger" style="position: absolute;top:7px;right:29px;border-radius: 50%;">8</span>
                                Users
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-11 col-md-7">
                <div class="row" style="overflow-y: hidden;">

                    @yield('content')

                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="container">
            <div class="row align-items-center flex-row-reverse">
                <div class="col-auto ml-auto">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <ul class="list-inline list-inline-dots mb-0">
                                <li class="list-inline-item"><a href="./docs/index.html">Documentation</a></li>
                                <li class="list-inline-item"><a href="./faq.html">FAQ</a></li>
                            </ul>
                        </div>
                        <div class="col-auto">
                            <a href="https://github.com/tabler/tabler" class="btn btn-outline-primary btn-sm">Source code</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-auto mt-3 mt-lg-0 text-center">
                    Copyright &copy; 2019 <a href=".">Safe City</a>.
                </div>
            </div>
        </div>
    </footer>
</div>
</body>
</html>
@stack('scripts')