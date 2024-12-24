@extends('layouts.auth')
@section('page-title')
    {{__('Login')}}
@endsection
@php
    $logo=asset(Storage::url('uploads/logo/'));
@endphp

@push('custom-scripts')
@if(env('RECAPTCHA_MODULE') == 'yes')
    {!! NoCaptcha::renderJs() !!}
@endif
@endpush

@section('content')
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>
{{--                <img src="{{$logo.'/logo.png'}}" width="250" class="navbar-brand-img auth-logo" alt="logo">--}}
                <img src="{{asset('assets\img\idevLogo.webp')}}" width="150" class="navbar-brand-img auth-logo" alt="logo">
            </div>
            <h3>{{__('Login')}}</h3>

            <p class="m-t">
                <small>
                    {{(Utility::getValByName('footer_text')) ? Utility::getValByName('footer_text') :  __('Copyright HRMGo') }} {{ date('Y') }}
                </small>
            </p>
        </div>
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
@endsection
