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
    <title>Register - Safe City</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <!-- Dashboard Core -->
    <link href="{{asset('assets/css/dashboard.css')}}" rel="stylesheet" />
    <script src="{{asset('assets/js/dashboard.js')}}"></script>
  </head>
  <body class="">
    <div class="page">
      <div class="page-main">
        <div class="header border-bottom" style="background-color: #014461">
          <div class="container">
            <div class="d-flex">
              <a class="navbar-brand mr-auto text-light" href="./index.html">
                Emergency App
              </a>
              <a href="{{url('/login')}}" class="btn btn-sm my-1 btn-white" data-toggle="tooltip" title="Login if you have account!">Login</a><
            </div>
          </div>
        </div>
      </div>
      <div class="page-single">
        <div class="container">
          <div class="row">
            <div class="col col-md-7 mx-auto">
              <div class="text-center mb-6">
                <img src="./assets/brand/tabler.svg" class="h-6" alt="">
              </div>
              <form class="card" action="{{url('/signup')}}" method="POST">
                @csrf
                <div class="card-header">
                  <h3 class="card-title m-auto"> <span style="font-weight: 600;">Sign Up</span>
                  </h3>
                </div>
                <div class="card-body p-6">

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Enter name" value="{{ old('name') }}">
                        @if ($errors->has('name'))
                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('name') }}</strong>
                                          </span>
                        @endif
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Enter email" value="{{ old('email') }}">
                        @if ($errors->has('email'))
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-label">Phone Number</label>
                        <input type="text" name="phone_number" class="form-control {{ $errors->has('phone_number') ? ' is-invalid' : '' }}" placeholder="Phone Number">
                        @if ($errors->has('phone_number'))
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('phone_number') }}</strong>
                        </span>
                        @endif
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        @if ($errors->has('password'))
                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('password') }}</strong>
                                          </span>
                        @endif
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
                        @if ($errors->has('password_confirmation'))
                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('password_confirmation') }}</strong>
                                          </span>
                        @endif
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-label">Address</label>
                        <input type="text" id="address-input" name="address_address" class="form-control map-input">
                        <input type="hidden" name="address_latitude" id="address-latitude" value="0" />
                        <input type="hidden" name="address_longitude" id="address-longitude" value="0" />
                      </div>
                    </div>
                    <div id="address-map-container" style="width:100%;height:400px; ">
                      <div style="width: 100%; height: 100%" id="address-map"></div>
                    </div>
                  </div>

                  <div class="form-footer">
                    <button type="submit" class="btn btn-block" style="background:#256589;color:#fff;">Create new account</button>
                  </div>
                </div>
              </form>
              <div class="text-center text-muted">
                Already have account? <a href="{{url('/login')}}">Sign in</a>
              </div>
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
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize" async defer></script>
<script src="/js/mapInput.js"></script>
<script>
  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
  });
</script>
