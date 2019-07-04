<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Safe City</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
{{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}
</head>
<body>
<div class="row justify-content-center my-4">
    <div class="col-md-8">
        <form method="POST" action="{{url('verify-account')}}">
            <div class="card">
                <div class="card-header text-center">
                    Verify
                </div>
                <div class="card-body">
                    @if (session('warning'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('warning') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                    @endif
                        @if (session('message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('message') }} ! Please click here to login <a href="{{url('/login')}}">Login</a>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                        @endif
                    @csrf
                    <div class="form-group row">
                        <label for="code"
                               class="col-md-4 col-form-label text-md-right">Code</label>

                        <div class="col-md-6">
                            <input id="code" type="code"
                                   class="form-control{{ $errors->has('verify_code') ? ' is-invalid' : '' }}"
                                   name="verify_code" required>

                            @if ($errors->has('verify_code'))
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('verify_code') }}</strong>
                                        </span>
                            @endif
                        </div>
                        <input type="hidden" name="id" value="{{old('id', session()->get('id'))}}">
                    </div>
                </div>
                <div class="card-footer">
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary btn-sm">
                                Verify
                            </button>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>


