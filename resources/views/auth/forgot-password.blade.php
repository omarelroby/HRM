@extends('layouts.auth')
@section('page-title')
    {{__('Forgot Password')}}
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
                <img src="{{$logo.'/logo.png'}}" class="navbar-brand-img auth-logo" alt="logo">
            </div>
            <h3>{{__('Forgot Password')}}</h3>
            <small class="text-muted">{{ __('We will send a link to reset your password') }}</small>
            @if (session('status'))
                <small class="text-muted">{{ session('status') }}</small>
            @endif
            <form method="POST" class="m-t" role="form" action="{{ route('password.email') }}">
                @csrf
                <div class="form-group">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{__('Email')}}" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
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
                <button type="submit" class="btn btn-primary block full-width m-b">{{ __('Send Password Reset Link') }}</button>
                <div class="or-text">{{__('OR')}}</div>
                <a href="{{ route('login') }}"><small>{{__('Login')}}</small></a>
                
            </form>
            <p class="m-t"> 
                <small>
                    {{(Utility::getValByName('footer_text')) ? Utility::getValByName('footer_text') :  __('Copyright HRMGo') }} {{ date('Y') }}
                </small> 
            </p>
        </div>
    </div>
@endsection
