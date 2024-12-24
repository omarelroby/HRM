<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from smarthr.dreamstechnologies.com/html/template/login-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 22 Dec 2024 18:38:32 GMT -->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<meta name="description" content="Smarthr - Bootstrap Admin Template">
	<meta name="keywords" content="admin, estimates, bootstrap, business, html5, responsive, Projects">
	<meta name="author" content="Dreams technologies - Bootstrap Admin Template">
	<meta name="robots" content="noindex, nofollow">
	<title>Smarthr Admin Template</title>

	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">

	<!-- Apple Touch Icon -->
	<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/favicon.png') }}https://smarthr.dreamstechnologies.com/html/template/assets/img/apple-touch-icon.png">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }} ">

	<!-- Feather CSS -->
	<link rel="stylesheet" href="{{ asset('assets/plugins/icons/feather/feather.css') }} ">

	<!-- Tabler Icon CSS -->
	<link rel="stylesheet" href="{{ asset('assets/plugins/tabler-icons/tabler-icons.css') }} ">

	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }} ">
	<link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">

	<!-- Main CSS -->
	<link rel="stylesheet" href="{{ asset('assets/img/favicon.png') }}https://smarthr.dreamstechnologies.com/html/template/">

</head>

<body class="bg-linear-gradiant">

	<div id="global-loader" style="display: none;">
		<div class="page-loader"></div>
	</div>

	<!-- Main Wrapper -->
	<div class="main-wrapper">
		<div class="container-fuild">
			<div class="w-100 overflow-hidden position-relative flex-wrap d-block vh-100">
				<div class="row justify-content-center align-items-center vh-100 overflow-auto flex-wrap ">
					<div class="col-md-4 mx-auto vh-100">
                        <form method="POST" class="m-t" role="form" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{__('Email')}}" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{__('Password')}}" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            @if(env('RECAPTCHA_MODULE') == 'yes')
                                <div class="form-group ">
                                    {!! NoCaptcha::display() !!}
                                    @error('g-recaptcha-response')
                                    <span class="small text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            @endif
                            <button type="submit" class="btn btn-primary block full-width m-b">{{__('Login')}}</button>

                            @if(Route::has('password.request'))
                                <a href="{{ route('password.request') }}"><small>{{ __('Forgot Your Password?') }}</small></a>
                            @endif
                        </form>
					</div>

				</div>
			</div>
		</div>
	</div>
	<!-- /Main Wrapper -->

	<!-- jQuery -->
	<script src="https://smarthr.dreamstechnologies.com/html/template/assets/js/jquery-3.7.1.min.js" type="bcf677cb83c0f3b92ac2fc0d-text/javascript"></script>

	<!-- Bootstrap Core JS -->
	<script src="https://smarthr.dreamstechnologies.com/html/template/assets/js/bootstrap.bundle.min.js" type="bcf677cb83c0f3b92ac2fc0d-text/javascript"></script>

	<!-- Feather Icon JS -->
	<script src="https://smarthr.dreamstechnologies.com/html/template/assets/js/feather.min.js" type="bcf677cb83c0f3b92ac2fc0d-text/javascript"></script>

	<!-- Custom JS -->
	<script src="https://smarthr.dreamstechnologies.com/html/template/assets/js/script.js" type="bcf677cb83c0f3b92ac2fc0d-text/javascript"></script>

<script src="https://smarthr.dreamstechnologies.com/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="bcf677cb83c0f3b92ac2fc0d-|49" defer></script></body>


<!-- Mirrored from smarthr.dreamstechnologies.com/html/template/login-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 22 Dec 2024 18:38:32 GMT -->
</html>
