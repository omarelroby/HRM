<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Smarthr - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, html5, responsive, Projects">
    <meta name="author" content="Dreams technologies - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Mwerdi</title>
    <link href="{{asset('public/front/assets/img/logo.png')}}" rel="icon">
    <link rel="stylesheet" href="{{   asset('public/assets/plugins/tabler-icons/tabler-icons.css') }}">
    @php
        $logo=asset(Storage::url('uploads/logo/'));
        $company_logo=Utility::getValByName('company_logo');
        $company_small_logo=Utility::getValByName('company_small_logo');
        $profile=asset(Storage::url('uploads/avatar/'));
    @endphp

    <link rel="stylesheet" href="{{ asset('public/assets/css/dataTables.bootstrap5.min.css')}} ">

    <link rel="stylesheet" href=" {{   asset('public/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/bootstrap-datetimepicker.css') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{  $logo.'/'.\Auth::user()->id.'_favicon.png' }} ">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@4.3.0/dist/apexcharts.min.css">
    {{-- <link rel="apple-touch-icon" sizes="180x180" href="{{   asset('public/assets/img/apple-touch-icon.png') }} "> --}}

    <script src="{{ asset('public/assets/assets/js/theme-script.js') }}"
            type="8839293e20295dfe9c85554d-text/javascript"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="{{ asset('public/assets/plugins/icons/feather/feather.css') }}">

    {{-- <link href="https://cdn.datatables.net/v/dt/dt-2.1.8/datatables.min.css" rel="stylesheet"> --}}

    <link rel="stylesheet" href="{{   asset('public/assets/plugins/select2/css/select2.min.css') }}">

    <link rel="stylesheet" href="{{   asset('public/assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{   asset('public/assets/plugins/fontawesome/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('public/assets/css/bootstrap-datetimepicker.min.css') }} ">

    {{-- <link rel="stylesheet" href="https://smarthr.dreamstechnologies.com/html/template/assets/plugins/summernote/summernote-lite.min.css"> --}}

    {{-- <link rel="stylesheet" href="https://smarthr.dreamstechnologies.com/html/template/assets/plugins/daterangepicker/daterangepicker.css"> --}}
    <!-- Color Picker Css -->
    <link rel="stylesheet" href="{{  asset('public/assets/plugins/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/plugins/@simonwep/pickr/themes/nano.min.css')}}">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.2/css/bootstrap.min.css" />


    {{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.2/css/bootstrap.min.css" integrity="sha512-hFkX7HG+dChKQVRiHL8ZLZbGzMIJH3MHIxqU2x6iLePgZmwgrtv9A4vTQDEWADud0H5T2LchdDDTiz6JPMm21w==" crossorigin="anonymous" referrerpolicy="no-referrer" />--}}

    <link rel="stylesheet" href="{{ asset('public/assets/dashboard/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('public/assets/css/style.css')}}">


    <link rel="stylesheet" href="{{ asset('public/assets/css/style.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.4/dist/sweetalert2.min.css" rel="stylesheet">

    @yield('css')
    @stack('css')

    <style>
        .sidebar-inner.slimscroll {
            height: calc(100vh); /* Adjust the height as needed */
            overflow-y: auto; /* Enable vertical scrolling */
        }
    </style>
    <style>
        .dropdown-menu {
            display: none;
        }

        .dropdown-menu.show {
            display: block;
        }

    </style>

</head>
