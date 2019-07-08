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
    <title>Verify - Safe City</title>
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
    <script src="{{asset('assets/js/dashboard.js')}}"></script>
</head>
<body class="">
<div class="page">
    <div class="page-main">
        <div class="header" style="background-color: #014461">
            <div class="container-fluid">
                <div class="d-flex">
                    <a class="navbar-brand mr-auto text-light" href="./index.html">
                        Emergency App
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="page-single">
        <div class="container">
            <div class="row">
                <div class="col col-login mx-auto">
                    <div class="text-center mb-6">
                        {{--                <img src="./assets/brand/tabler.svg" class="h-6" alt="">--}}
                    </div>
                    <form class="card" action="{{url('verify-account')}}" method="POST">
                        @csrf
                        <div class="card-header">
                            <h3 class="card-title m-auto"><span style="font-weight: 600"> Verification Code</span></h3>
                        </div>
                        <div class="card-body p-6">
                            @if (session('warning'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('warning') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    </button>
                                </div>

                            @endif
                            @if (session('message_login'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('message_login') }} Click here to <a href="/login">Login</a>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    </button>
                                </div>

                            @endif
                            @if (session('message_verify'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('message_verify') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    </button>
                                </div>

                            @endif
                            <div class="form-group">
                                <label class="form-label">Verification Code</label>
                                <input type="text" class="form-control{{ $errors->has('verify_code') ? ' is-invalid' : '' }}"
                                       name="verify_code" placeholder="Enter the verification Code">
                            </div>
                                <input type="hidden" name="id" value="{{old('id', session()->get('id'))}}">
                            <div class="form-footer">
                                <button type="submit" class="btn btn-block " style="background:#256589;color:#fff;">Verify</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script
        src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>