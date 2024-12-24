<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Login Page">
    <meta name="keywords" content="admin, login, responsive, authentication">
    <meta name="author" content="Your Name">
    <meta name="robots" content="noindex, nofollow">
    <title>Login - Admin Panel</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <!-- Feather CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/icons/feather/feather.css') }}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body class="bg-linear-gradient">

    <div id="global-loader" style="display: none;">
        <div class="page-loader"></div>
    </div>

    <!-- Main Wrapper -->
    <div class="main-wrapper">
        <div class="container-fluid">
            <div class="d-flex justify-content-center align-items-center vh-100">
                <div class="col-md-4">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <h3 class="text-center mb-4">{{ __('Login') }}</h3>

                        <!-- Email Input -->
                        <div class="form-group">
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                   placeholder="{{ __('Email') }}" value="{{ old('email') }}" required autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Password Input -->
                        <div class="form-group">
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                                   placeholder="{{ __('Password') }}" required>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- reCAPTCHA -->
                        @if(env('RECAPTCHA_MODULE') == 'yes')
                            <div class="form-group">
                                {!! NoCaptcha::display() !!}
                                @error('g-recaptcha-response')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        @endif

                        <!-- Submit Button -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary w-100">{{ __('Login') }}</button>
                        </div>

                        <!-- Forgot Password Link -->
                        @if(Route::has('password.request'))
                            <div class="text-center">
                                <a href="{{ route('password.request') }}" class="text-muted">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('public/assets/js/jquery-3.7.1.min.js') }}"></script>

    <!-- Bootstrap Core JS -->
    <script src="{{ asset('public/assets/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Feather Icon JS -->
    <script src="{{ asset('assets/js/feather.min.js') }}"></script>

    <!-- Custom JS -->
    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>

</html>
