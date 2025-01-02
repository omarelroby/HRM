<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{env('SITE_RTL') == 'on'?'rtl':''}}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{asset(Storage::url('uploads/logo')).'/favicon.png'}}" type="image" sizes="16x16">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{(Utility::getValByName('title_text')) ? Utility::getValByName('title_text') : config('app.name', 'HRMGo')}} - @yield('page-title')</title>

    <link href="{{asset('admin/css/bootstrap.min.css')}} " rel="stylesheet">
    <link href="{{asset('admin/font-awesome/css/font-awesome.css')}} " rel="stylesheet">

    <link href="{{asset('admin/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/style.css')}}" rel="stylesheet">
    @if(env('SITE_RTL')=='on')
        <link rel="stylesheet" href="{{ asset('admin/css/bootstrap-rtl.css') }}">
    @endif
</head>
<body class="gray-bg">

@yield('content')

@stack('custom-scripts')

    <script src="{{asset('admin/js/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('admin/js/popper.min.js')}}"></script>
    <script src="{{asset('admin/js/bootstrap.js')}}"></script>
</body>
</html>
