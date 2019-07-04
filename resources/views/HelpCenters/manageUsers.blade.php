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
    <link rel="icon" href="./favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico" />
    <!-- Generated: 2018-04-04 18:58:30 +0200 -->
    <title>SAVINGA - Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <script src="{{asset('assets/js/require.min.js')}}"></script>
    <script>
      requirejs.config({
          baseUrl: '.'
      });
    </script>
    <!-- Dashboard Core -->
    <link href="{{asset('assets/css/dashboard.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" />
    <script src="{{asset('assets/js/dashboard.js')}}"></script>
  </head>
  <body class="">
    <div class="page">
      <div class="page-main">
        <div class="header">
          <div class="container">
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
                      <span class="text-default">Jane Pearson</span>
                      <small class="text-muted d-block mt-1">Administrator</small>
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

        <div class="page-content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-10 mx-auto">
                <div class="card">
                  <div class="card-header">
                    <nav class="nav nav-pills nav-justified">
                      <a class="nav-item nav-link active" href="#info">Un Approved</a>
                      <a class="nav-item nav-link" href="#contributions">Approved</a>
                      <a class="nav-item nav-link" href="#penalties">Blocked</a>
                    </nav>
                  </div>
                  <div class="card-body">

                    @if (session('message'))
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        </button>
                      </div>

                    @endif
                    <div class="tab-content">

                      <div class="tab-pane active container form" id="info">
                        <table class="table card-table table-vcenter">
                          @if(count($user) < 1)
                            <h3 class="text-danger">No other supporters registered</h3>
                          @else
                            @foreach($user as $user)
                              <tr>
                                <td>
                                  {{$user->name}}
                                </td>
                                <td class="text-right text-muted d-none d-md-table-cell text-nowrap">{{$user->phone_number}}</td>
                                <td class="text-right text-muted d-none d-md-table-cell text-nowrap">{{$user->address}}</td>
                                <td class="text-right">
                                  @if(auth()->user()->is_admin == 'admin')
                                    <a href="activate/{{$user->id}}" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Click to activate">Activate</a>
                                  @endif
                                  <a></a>
                                </td>
                              </tr>
                            @endforeach
                          @endif
                          <tr>
                        </table>
                      </div>
                      <div class="tab-pane container form" id="contributions">
                        fdfd
                      </div>
                      <div class="tab-pane container form" id="penalties">
                      </div>
                      <div class="tab-pane container form" id="events">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
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

                </div>
              </div>
            </div>
            <div class="col-12 col-lg-auto mt-3 mt-lg-0 text-center">
              Copyright © 2018 <a href=".">SysCom</a>. All rights reserved.
            </div>
          </div>
        </div>
      </footer>
    </div>
  </body>
</html>
<script>
  <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
  });
</script>