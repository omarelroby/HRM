<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from smarthr.dreamstechnologies.com/html/template/login-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 22 Dec 2024 18:38:32 GMT -->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<meta name="description" content="Smarthr - Bootstrap Admin Template">
	<meta name="keywords" content="admin, estimates, bootstrap, business, html5, responsive, Projects">
	<meta name="author" content="Dreams technologies - Bootstrap Admin Template">
	<meta name="robots" content="noindex, nofollow">
	<title>Smarthr Admin Template</title>

	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="https://smarthr.dreamstechnologies.com/html/template/assets/img/favicon.png">

	<!-- Apple Touch Icon -->
	<link rel="apple-touch-icon" sizes="180x180" href="https://smarthr.dreamstechnologies.com/html/template/assets/img/apple-touch-icon.png">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://smarthr.dreamstechnologies.com/html/template/assets/css/bootstrap.min.css">

	<!-- Feather CSS -->
	<link rel="stylesheet" href="https://smarthr.dreamstechnologies.com/html/template/assets/plugins/icons/feather/feather.css">

	<!-- Tabler Icon CSS -->
	<link rel="stylesheet" href="https://smarthr.dreamstechnologies.com/html/template/assets/plugins/tabler-icons/tabler-icons.css">

	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="https://smarthr.dreamstechnologies.com/html/template/assets/plugins/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" href="https://smarthr.dreamstechnologies.com/html/template/assets/plugins/fontawesome/css/all.min.css">

	<!-- Main CSS -->
	<link rel="stylesheet" href="https://smarthr.dreamstechnologies.com/html/template/assets/css/style.css">

</head>

<body class="bg-white">

	<div id="global-loader" style="display: none;">
		<div class="page-loader"></div>
	</div>

	<!-- Main Wrapper -->
	<div class="main-wrapper">

		<div class="container-fuild">
			<div class="w-100 overflow-hidden position-relative flex-wrap d-block vh-100">
				<div class="row">
					<div class="col-lg-5">
						<div class="d-lg-flex align-items-center justify-content-center d-none flex-wrap vh-100 bg-primary-transparent">
							<div>
								<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/bg/authentication-bg-03.svg" alt="Img">
							</div>
						</div>
					</div>
					<div class="col-lg-7 col-md-12 col-sm-12">
						<div class="row justify-content-center align-items-center vh-100 overflow-auto flex-wrap ">
							<div class="col-md-7 mx-auto vh-100">
							    <!-- Main Wrapper -->
    <div class="main-wrapper">
        <div class="container-fluid">
            <div class="d-flex justify-content-center align-items-center vh-100">
                <div class="col-md-4">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <h3 class="text-center mb-4">{{ __('Login') }}</h3>

                        <!-- Email Input -->
                        <div class="form-group my-2">
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                   placeholder="{{ __('Email') }}" value="{{ old('email') }}" required autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Password Input -->
                        <div class="form-group my-2">
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
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /Main Wrapper -->

	<!-- jQuery -->
	<script src="https://smarthr.dreamstechnologies.com/html/template/assets/js/jquery-3.7.1.min.js" type="9f97ce86f7f5e1d77bb16331-text/javascript"></script>

	<!-- Bootstrap Core JS -->
	<script src="https://smarthr.dreamstechnologies.com/html/template/assets/js/bootstrap.bundle.min.js" type="9f97ce86f7f5e1d77bb16331-text/javascript"></script>

	<!-- Feather Icon JS -->
	<script src="https://smarthr.dreamstechnologies.com/html/template/assets/js/feather.min.js" type="9f97ce86f7f5e1d77bb16331-text/javascript"></script>

	<!-- Custom JS -->
	<script src="https://smarthr.dreamstechnologies.com/html/template/assets/js/script.js" type="9f97ce86f7f5e1d77bb16331-text/javascript"></script>

<script src="https://smarthr.dreamstechnologies.com/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="9f97ce86f7f5e1d77bb16331-|49" defer></script></body>


<!-- Mirrored from smarthr.dreamstechnologies.com/html/template/login-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 22 Dec 2024 18:38:32 GMT -->
</html>

