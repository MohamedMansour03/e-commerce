<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .bold-header {
            font-weight: bold;
            text-align: center;
            font-size: 20px;
        }
        
        .pass {
            color: black !important;
        }
        
        .btn1 {
            border: none;
            color: #fff;
            background-image: linear-gradient(30deg, #f15412, #f77944);
            border-radius: 20px;
            background-size: 100% auto;
            font-family: inherit;
            font-size: 17px;
            padding: 0.6em 1.5em;
        }
        
        .btn1:hover {
            background-position: right center;
            background-size: 300% auto;
            -webkit-animation: pulse 2s infinite;
            animation: pulse512 1.5s infinite;
        }

        .card {
            box-shadow: 4px 4px 8px rgba(35, 25, 25, 0.1); 
        }

        @keyframes pulse512 {
            0% {
                box-shadow: 0 0 0 0 #f15412;
            }

            70% {
                box-shadow: 0 0 0 10px rgb(218 103 68 / 0%);
            }

            100% {
                box-shadow: 0 0 0 0 rgb(218 103 68 / 0%);
            }
        }
    </style>
</head>

<body>
    @extends('Master_page')
    @section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-5  mt-5">
                <div class="card mt-3">
                    <div class="card-header bold-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="mb-3 form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn1">
                                    <i class="fa fa-paper-plane"></i>
                                </button>

                                @if (Route::has('password.request'))
                                <a class="btn btn-link  pass" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <img width="500px" src="{{ asset('assets/images/login.png') }}" alt="" class="img-fluid mb-5 mt-5">
            </div>
        </div>
    </div>
    @endsection

</body>

</html>

