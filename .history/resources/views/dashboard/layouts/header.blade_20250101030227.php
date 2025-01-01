<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Smarthr - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, html5, responsive, Projects">
    <meta name="author" content="Dreams technologies - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>HRm</title>

    <!-- Preload important CSS files -->
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" as="style">
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/bootstrap4-hijri-datepicker/dist/css/bootstrap-datetimepicker.min.css" as="style">

    <!-- Favicon and Apple Touch Icon -->
    <link rel="shortcut icon" href="{{ asset('public/assets/img/favicon.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('public/assets/img/apple-touch-icon.png') }}">

    <!-- Combined and Minified CSS -->
    <link rel="stylesheet" href="{{ asset('public/assets/css/style.css') }}">

    <!-- External Fonts and Icons (Load with Preload or Async) -->
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" as="style">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- JavaScript Files (Defer Loading) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" defer></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/moment-hijri@2.17.0/moment-hijri.min.js" defer></script>

    <style>
        /* Custom styles to improve rendering speed */
        .submenu > ul {
            display: none;
            padding-left: 20px;
            opacity: 0;
            max-height: 0;
            overflow: hidden;
            transition: all 0.3s ease-in-out;
        }
        .submenu > a.subdrop + ul {
            display: block;
            opacity: 1;
            max-height: 500px;
        }
    </style>
</head>
