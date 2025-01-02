 <head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<meta name="description" content="Smarthr - Bootstrap Admin Template">
	<meta name="keywords" content="admin, estimates, bootstrap, business, html5, responsive, Projects">
	<meta name="author" content="Dreams technologies - Bootstrap Admin Template">
	<meta name="robots" content="noindex, nofollow">
	<title>HRm</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

	<link rel="stylesheet" href="{{ asset('public/assets/css/style.css')}}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<link rel="stylesheet" href="{{ asset('public/assets/css/dataTables.bootstrap5.min.css')}} ">

	<link rel="stylesheet" href=" {{   asset('public/assets/css/bootstrap.min.css') }}">
	<!-- Datepicker CSS -->
    <link rel="stylesheet" href="{{ asset('public/assets/css/bootstrap-datetimepicker.css') }}">


	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="{{   asset('public/assets/img/favicon.png') }} ">
	<!-- Apple Touch Icon -->
	<link rel="apple-touch-icon" sizes="180x180" href="{{   asset('public/assets/img/apple-touch-icon.png') }} ">
	<!-- Theme Script js -->
	<script src="{{ asset('public/assets/assets/js/theme-script.js') }}" type="8839293e20295dfe9c85554d-text/javascript"></script>
	<!-- Feather CSS -->
	<link rel="stylesheet" href="{{ asset('public/assets/plugins/icons/feather/feather.css') }}">
	<!-- Tabler Icon CSS -->
    {{-- <link href="https://cdn.datatables.net/v/dt/dt-2.1.8/datatables.min.css" rel="stylesheet"> --}}
	<!-- Select2 CSS -->
    <link rel="stylesheet" href="{{   asset('public/assets/plugins/select2/css/select2.min.css') }}">

	<link rel="stylesheet" href="{{   asset('public/assets/plugins/fontawesome/css/fontawesome.min.css') }}">
	<link rel="stylesheet" href="{{   asset('public/assets/plugins/fontawesome/css/all.min.css') }}">
	<!-- Datetimepicker CSS -->
	<link rel="stylesheet" href="{{ asset('public/assets/css/bootstrap-datetimepicker.min.css') }} ">
	<!-- Summernote CSS -->
	{{-- <link rel="stylesheet" href="https://smarthr.dreamstechnologies.com/html/template/assets/plugins/summernote/summernote-lite.min.css"> --}}
	<!-- Daterangepikcer CSS -->
	{{-- <link rel="stylesheet" href="https://smarthr.dreamstechnologies.com/html/template/assets/plugins/daterangepicker/daterangepicker.css"> --}}
	<!-- Color Picker Css -->
	<link rel="stylesheet" href="{{  asset('public/assets/plugins/flatpickr/flatpickr.min.css') }}">
	<link rel="stylesheet" href="{{ asset('public/assets/plugins/@simonwep/pickr/themes/nano.min.css')}}">
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Moment.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/moment-hijri@2.17.0/moment-hijri.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.2/css/bootstrap.min.css" integrity="sha512-hFkX7HG+dChKQVRiHL8ZLZbGzMIJH3MHIxqU2x6iLePgZmwgrtv9A4vTQDEWADud0H5T2LchdDDTiz6JPMm21w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <link rel="stylesheet" href="{{ asset('public/assets/css/style.css')}}">

    <style>
        .submenu > ul {
            display: none;
            padding-left: 20px;
            opacity: 0;
            max-height: 0;
            overflow: hidden;
            transition: all 0.3s ease-in-out; /* Smooth transition */
        }
        .submenu.active > ul {
            display: block; /* Show the submenu */
        }

        .submenu > a.subdrop + ul {
            display: block;
            opacity: 1;
            max-height: 500px; /* Adjust to the height of your submenu */
        }
        /* Default for English (left-aligned close button) */
        html[lang="en"] .dynamic-close {
            position: absolute;
            left: 15px;
            top: 15px;
            z-index: 1;
        }




        .submenu-title {
            font-weight: bold;
        }


        /* Arabic-specific (right-aligned close button) */
        html[lang="ar"] .dynamic-close {
            position: absolute;
            right: 15px;
            top: 15px;
            z-index: 1;
        }


    </style>
</head>
