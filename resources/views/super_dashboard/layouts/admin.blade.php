@php
    $logo = \App\Models\Utility::get_file('uploads/logo/');
    $company_favicon = \App\Models\Utility::getValByName('company_favicon');
    $company_logo = \App\Models\Utility::GetLogo();
    $SITE_RTL = \App\Models\Utility::getValByName('SITE_RTL');
    $setting = \App\Models\Utility::colorset();
    $color = !empty($setting['theme_color']) ? $setting['theme_color'] : 'theme-3';
    $pusher_setting = \App\Models\Utility::settings();
    $getseo = App\Models\Utility::getSeoSetting();
    $metatitle = isset($getseo['meta_title']) ? $getseo['meta_title'] : '';
    $metadesc = isset($getseo['meta_description']) ? $getseo['meta_description'] : '';
    $meta_image = \App\Models\Utility::get_file('uploads/meta/');
    $meta_logo = isset($getseo['meta_image']) ? $getseo['meta_image'] : '';
    $enable_cookie = \App\Models\Utility::getCookieSetting('enable_cookie');

    if (isset($setting['color_flag']) && $setting['color_flag'] == 'true') {
        $themeColor = 'custom-color';
    } else {
        $themeColor = $color;
    }
@endphp

    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ $SITE_RTL == 'on' ? 'rtl' : '' }}">

<head>

    <title>
        {{ \App\Models\Utility::getValByName('title_text') ? \App\Models\Utility::getValByName('title_text') : config('app.name', 'HRMGo SaaS') }}
        - @yield('page-title')</title>

    <!-- SEO META -->
    <meta name="title" content="{{ $metatitle }}">
    <meta name="description" content="{{ $metadesc }}">
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ env('APP_URL') }}">
    <meta property="og:title" content="{{ $metatitle }}">
    <meta property="og:description" content="{{ $metadesc }}">
    <meta property="og:image"
          content="{{ isset($meta_logo) && !empty(asset('storage/uploads/meta/' . $meta_logo)) ? asset('storage/uploads/meta/' . $meta_logo) : 'hrmgo.png' }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ env('APP_URL') }}">
    <meta property="twitter:title" content="{{ $metatitle }}">
    <meta property="twitter:description" content="{{ $metadesc }}">
    <meta property="twitter:image"
          content="{{ isset($meta_logo) && !empty(asset('storage/uploads/meta/' . $meta_logo)) ? asset('storage/uploads/meta/' . $meta_logo) : 'hrmgo.png' }}">


    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Dashboard Template Description" />
    <meta name="keywords" content="Dashboard Template" />
    <meta name="author" content="WorkDo" />


    <!-- Favicon icon -->
    <link rel="icon"
          href="{{ $logo . '/' . (isset($company_favicon) && !empty($company_favicon) ? $company_favicon . '?' . time() : 'favicon.png' . '?' . time()) }}"
          type="image/x-icon" />
    <!-- for calender-->
    <link rel="stylesheet" href="{{ asset('super_assets/css/plugins/main.css') }}">

    <link rel="stylesheet" href="{{ asset('super_assets/css/plugins/datepicker-bs5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('super_assets/css/plugins/style.css') }}">
    <!-- font css -->
    <link rel="stylesheet" href="{{ asset('super_assets/css/plugins/bootstrap-switch-button.min.css') }}">
    <link rel="stylesheet" href="{{ asset('super_assets/fonts/tabler-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('super_assets/fonts/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('super_assets/fonts/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('super_assets/fonts/material.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <!-- vendor css -->

    <link rel="stylesheet" href="{{ asset('super_assets/css/customizer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">


    @if ($SITE_RTL == 'on')
        <link rel="stylesheet" href="{{ asset('super_assets/css/style-rtl.css') }}">
    @endif


        <link rel="stylesheet" href="{{ asset('super_assets/css/style.css') }}" id="main-style-link">

    <meta name="url" content="{{ url('') . '/' . config('chatify.routes.prefix') }}"
          data-user="{{ Auth::user()->id }}">

    <link rel='stylesheet' href='https://unpkg.com/nprogress@0.2.0/nprogress.css' />

{{--    @if ($setting['cust_darklayout'] == 'on')--}}
{{--        <link rel="stylesheet" href="{{ asset('super_assets/css/custom-dark.css') }}">--}}
{{--    @endif--}}

    <style>
        :root {
            --color-customColor: <?=$color ?>;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/custom-color.css') }}">

    @stack('css-page')
</head>



<body class="{{ $themeColor }}">
<!-- [ Pre-loader ] start -->
<div class="loader-bg">
    <div class="loader-track">
        <div class="loader-fill"></div>
    </div>
</div>
<!-- [ Pre-loader ] End -->
<!-- [ navigation menu ] start -->
@php

    $logo = \App\Models\Utility::get_file('uploads/logo/');
    $company_logo = \App\Models\Utility::GetLogo();
    $users = \Auth::user();
    $profile = \App\Models\Utility::get_file('uploads/avatar/');
    $currantLang = $users->currentLanguage();
    $lang = Auth::user()->lang;
@endphp

@if (isset($setting['cust_theme_bg']) && $setting['cust_theme_bg'] == 'on')
    <nav class="dash-sidebar light-sidebar transprent-bg">
        @else
            <nav class="dash-sidebar light-sidebar">
                @endif

                {{-- <nav class="dash-sidebar light-sidebar {{ isset($cust_theme_bg) && $cust_theme_bg == 'on' ? 'transprent-bg' : '' }}"> --}}

                <div class="navbar-wrapper">
                    <div class="m-header main-logo">
                        <a href="{{ route('dashboard') }}" class="b-brand">
                            <!-- ========   change your logo hear   ============ -->
                            <img src="{{ $logo . (isset($company_logo) && !empty($company_logo) ? $company_logo . '?' . time() : 'logo-dark.png' . '?' . time()) }}"
                                 alt="{{ config('app.name', 'HRMGo') }}" class="logo logo-lg" style="height: 40px;">
                        </a>
                    </div>
                    <div class="navbar-content">
                        <ul class="dash-navbar">

                            <!-- dashboard-->
                            @if (\Auth::user()->type != 'company')
                                <li class="dash-item">
                                    <a href="{{ route('dashboard') }}" class="dash-link"><span class="dash-micon"><i
                                                class="ti ti-home"></i></span><span class="dash-mtext">{{ __('Dashboard') }}</span></a>
                                </li>
                            @endif
                            @if (\Auth::user()->type == 'company')
                                <li class="dash-item dash-hasmenu  {{ Request::segment(1) == 'null' ? 'active dash-trigger' : '' }}">
                                    <a href="#" class="dash-link"><span class="dash-micon"><i class="ti ti-home"></i></span><span
                                            class="dash-mtext">{{ __('Dashboard') }}</span><span class="dash-arrow"><i
                                                data-feather="chevron-right"></i></span></a>
                                    <ul class="dash-submenu ">
                                        <li
                                            class="dash-item {{ Request::segment(1) == null || Request::segment(1) == 'report' ? ' active dash-trigger' : '' }}">
                                            <a class="dash-link" href="{{ route('dashboard') }}">{{ __('Overview') }}</a>
                                        </li>

                                        @if (Gate::check('Manage Report'))
                                            <li class="dash-item dash-hasmenu">
                                                <a href="#!" class="dash-link"><span class=""><i
                                                            class=""></i></span><span
                                                        class="dash-mtext">{{ __('Report') }}</span><span class="dash-arrow"><i
                                                            data-feather="chevron-right"></i></span></a>
                                                <ul class="dash-submenu">
                                                    @can('Manage Report')
                                                        <li class="dash-item">
                                                            <a class="dash-link"
                                                               href="{{ route('report.income-expense') }}">{{ __('Income Vs Expense') }}</a>
                                                        </li>

                                                        <li class="dash-item">
                                                            <a class="dash-link"
                                                               href="{{ route('report.monthly.attendance') }}">{{ __('Monthly Attendance') }}</a>
                                                        </li>

                                                        <li class="dash-item">
                                                            <a class="dash-link"
                                                               href="{{ route('report.leave') }}">{{ __('Leave') }}</a>
                                                        </li>


                                                        <li class="dash-item">
                                                            <a class="dash-link"
                                                               href="{{ route('report.account.statement') }}">{{ __('Account Statement') }}</a>
                                                        </li>


                                                        <li class="dash-item">
                                                            <a class="dash-link"
                                                               href="{{ route('report.payroll') }}">{{ __('Payroll') }}</a>
                                                        </li>


                                                        <li class="dash-item">
                                                            <a class="dash-link"
                                                               href="{{ route('report.timesheet') }}">{{ __('Timesheet') }}</a>
                                                        </li>
                                                    @endcan


                                                </ul>
                                            </li>
                                        @endif


                                    </ul>
                                </li>
                            @endif
                            <!--dashboard-->

                            <!-- user-->
                            @if (\Auth::user()->type == 'super admin')
                                <li class="dash-item">
                                    <a href="{{ route('user.index') }}" class="dash-link"><span class="dash-micon"><i
                                                class="ti ti-user"></i></span><span class="dash-mtext">{{ __('Companies') }}</span></a>
                                </li>
                            @else
                                @if (Gate::check('Manage User') ||
                                        Gate::check('Manage Role') ||
                                        Gate::check('Manage Employee Profile') ||
                                        Gate::check('Manage Employee Last Login'))
                                    <li
                                        class="dash-item dash-hasmenu {{ Request::segment(1) == 'user' || Request::segment(1) == 'roles' || Request::segment(1) == 'lastlogin'
                            ? ' active dash-trigger'
                            : '' }} ">
                                        <a href="#!" class="dash-link"><span class="dash-micon"><i
                                                    class="ti ti-users"></i></span><span
                                                class="dash-mtext">{{ __('Staff') }}</span><span class="dash-arrow"><i
                                                    data-feather="chevron-right"></i></span></a>
                                        <ul
                                            class="dash-submenu {{ Request::route()->getName() == 'user.index' || Request::route()->getName() == 'users.create' || Request::route()->getName() == 'user.edit' || Request::route()->getName() == 'lastlogin' ? ' active' : '' }} ">
                                            @can('Manage User')
                                                <li class="dash-item {{ Request::segment(1) == 'lastlogin' ? 'active' : '' }} ">
                                                    <a class="dash-link" href="{{ route('user.index') }}">{{ __('User') }}</a>
                                                </li>
                                            @endcan
                                            @can('Manage Role')
                                                <li class="dash-item">
                                                    <a class="dash-link" href="{{ route('roles.index') }}">{{ __('Role') }}</a>
                                                </li>
                                            @endcan
                                            @can('Manage Employee Profile')
                                                <li class="dash-item">
                                                    <a class="dash-link"
                                                       href="{{ route('employee.profile') }}">{{ __('Employee Profile') }}</a>
                                                </li>
                                            @endcan
                                            {{-- @can('Manage Employee Last Login')
                                                <li class="dash-item">
                                                    <a class="dash-link" href="{{ route('lastlogin') }}">{{ __('Last Login') }}</a>
                                                </li>
                                            @endcan --}}

                                        </ul>
                                    </li>
                                @endif
                            @endif
                            <!-- user-->

                            <!-- employee-->
                            @if (Gate::check('Manage Employee'))
                                @if (\Auth::user()->type == 'employee')
                                    @php
                                        $employee = App\Models\Employee::where('user_id', \Auth::user()->id)->first();
                                    @endphp
                                    <li class="dash-item {{ Request::segment(1) == 'employee' ? 'active' : '' }}">
                                        <a href="{{ route('employee.show', \Illuminate\Support\Facades\Crypt::encrypt($employee->id)) }}"
                                           class="dash-link"><span class="dash-micon"><i class="ti ti-user"></i></span><span
                                                class="dash-mtext">{{ __('Employee') }}</span></a>
                                    </li>
                                @else
                                    <li class="dash-item {{ Request::segment(1) == 'employee' ? 'active' : '' }}">
                                        <a href="{{ route('employee.index') }}" class="dash-link"><span class="dash-micon"><i
                                                    class="ti ti-user"></i></span><span
                                                class="dash-mtext">{{ __('Employee') }}</span></a>
                                    </li>
                                @endif
                            @endif
                            <!-- employee-->

                            <!-- payroll-->
                            @if (Gate::check('Manage Set Salary') || Gate::check('Manage Pay Slip'))
                                <li
                                    class="dash-item dash-hasmenu  {{ Request::segment(1) == 'setsalary' ? 'dash-trigger active' : '' }}">
                                    <a href="#!" class="dash-link">
                        <span class="dash-micon">
                            <i class="ti ti-receipt">
                            </i>
                        </span>
                                        <span class="dash-mtext">
                            {{ __('Payroll') }}
                        </span>
                                        <span class="dash-arrow"><i data-feather="chevron-right">
                            </i>
                        </span>
                                    </a>
                                    <ul class="dash-submenu ">
                                        <li class="dash-item {{ Request::segment(1) == 'setsalary' ? 'active' : '-' }}">
                                            <a class="dash-link" href="{{ route('setsalary.index') }}">{{ __('Set Salary') }}</a>
                                        </li>
                                        <li class="dash-item">
                                            <a class="dash-link" href="{{ route('payslip.index') }}">{{ __('Payslip') }}</a>
                                        </li>

                                    </ul>
                                </li>
                            @endif
                            <!-- payroll-->

                            @if (\Auth::user()->type == 'employee')
                                <li
                                    class="dash-item dash-hasmenu {{ Request::segment(1) == 'setsalary' ? 'dash-trigger active' : '' }}">
                                    <a href="#!" class="dash-link"><span class="dash-micon"><i
                                                class="ti ti-receipt"></i></span><span
                                            class="dash-mtext">{{ __('Payroll') }}</span><span class="dash-arrow"><i
                                                data-feather="chevron-right"></i></span></a>
                                    <ul class="dash-submenu">
                                        <li class="dash-item {{ Request::segment(1) == 'setsalary' ? 'active' : '-' }}">
                                            <a class="dash-link"
                                               href="{{ route('setsalary.show', \Illuminate\Support\Facades\Crypt::encrypt(\Auth::user()->id)) }}">{{ __('Salary') }}</a>
                                        </li>
                                        <li class="dash-item">
                                            <a class="dash-link" href="{{ route('payslip.index') }}">{{ __('Payslip') }}</a>
                                        </li>
                                    </ul>
                                </li>
                            @endif

                            <!-- timesheet-->
                            @if (Gate::check('Manage Attendance') || Gate::check('Manage Leave') || Gate::check('Manage TimeSheet'))
                                <li
                                    class="dash-item dash-hasmenu {{ Request::segment(1) == 'calender' && Request::segment(2) == 'leave' ? 'dash-trigger active' : '' }}">
                                    <a href="#!" class="dash-link"><span class="dash-micon"><i
                                                class="ti ti-clock"></i></span><span
                                            class="dash-mtext">{{ __('Timesheet') }}</span><span class="dash-arrow"><i
                                                data-feather="chevron-right"></i></span></a>
                                    <ul class="dash-submenu">
                                        @can('Manage TimeSheet')
                                            <li class="dash-item">
                                                <a class="dash-link" href="{{ route('timesheet.index') }}">{{ __('Timesheet') }}</a>
                                            </li>
                                        @endcan
                                        @can('Manage Leave')

                                            <li class="dash-item {{ Request::segment(1) == 'calender' ? ' active' : '' }}">
                                                <a class="dash-link" href="{{ route('leave.index') }}">{{ __('Manage Leave') }}</a>
                                            </li>

                                        @endcan
                                        @can('Manage Attendance')
                                            <li class="dash-item dash-hasmenu">
                                                <a href="#!" class="dash-link"><span
                                                        class="dash-mtext">{{ __('Attendance') }}</span><span class="dash-arrow"><i
                                                            data-feather="chevron-right"></i></span></a>
                                                <ul class="dash-submenu">
                                                    <li class="dash-item">
                                                        <a class="dash-link"
                                                           href="{{ route('attendanceemployee.index') }}">{{ __('Marked Attendance') }}</a>
                                                    </li>
                                                    @can('Create Attendance')
                                                        <li class="dash-item">
                                                            <a class="dash-link"
                                                               href="{{ route('attendanceemployee.bulkattendance') }}">{{ __('Bulk Attendance') }}</a>
                                                        </li>
                                                    @endcan
                                                </ul>
                                            </li>
                                        @endcan

                                        {{-- remove biometric code --}}
                                        {{-- @can('Manage Biometric Attendance')

                                            <li class="dash-item">
                                                <a class="dash-link" href="{{ route('biometric-attendance.index') }}">{{ __('Biometric Attendance') }}</a>
                                            </li>

                                        @endcan --}}
                                    </ul>
                                </li>
                            @endif
                            <!--timesheet-->

                            <!-- performance-->
                            @if (Gate::check('Manage Indicator') || Gate::check('Manage Appraisal') || Gate::check('Manage Goal Tracking'))
                                <li class="dash-item dash-hasmenu">
                                    <a href="#!" class="dash-link"><span class="dash-micon"><i
                                                class="ti ti-3d-cube-sphere"></i></span><span
                                            class="dash-mtext">{{ __('Performance') }}</span><span class="dash-arrow"><i
                                                data-feather="chevron-right"></i></span></a>
                                    <ul class="dash-submenu">
                                        @can('Manage Indicator')
                                            <li class="dash-item">
                                                <a class="dash-link" href="{{ route('indicator.index') }}">{{ __('Indicator') }}</a>
                                            </li>
                                        @endcan

                                        @can('Manage Appraisal')
                                            <li class="dash-item">
                                                <a class="dash-link" href="{{ route('appraisal.index') }}">{{ __('Appraisal') }}</a>
                                            </li>
                                        @endcan

                                        @can('Manage Goal Tracking')
                                            <li class="dash-item">
                                                <a class="dash-link"
                                                   href="{{ route('goaltracking.index') }}">{{ __('Goal Tracking') }}</a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                            @endif
                            <!--performance-->

                            <!--fianance-->
                            @if (Gate::check('Manage Account List') ||
                                    Gate::check('Manage Payee') ||
                                    Gate::check('Manage Payer') ||
                                    Gate::check('Manage Deposit') ||
                                    Gate::check('Manage Expense') ||
                                    Gate::check('Manage Transfer Balance'))
                                <li class="dash-item dash-hasmenu">
                                    <a href="#!" class="dash-link"><span class="dash-micon"><i
                                                class="ti ti-wallet"></i></span><span
                                            class="dash-mtext">{{ __('Finance') }}</span><span class="dash-arrow"><i
                                                data-feather="chevron-right"></i></span></a>
                                    <ul class="dash-submenu">
                                        @can('Manage Account List')
                                            <li class="dash-item">
                                                <a class="dash-link"
                                                   href="{{ route('accountlist.index') }}">{{ __('Account List') }}</a>
                                            </li>
                                        @endcan
                                        @can('View Balance Account List')
                                            <li class="dash-item">
                                                <a class="dash-link"
                                                   href="{{ route('accountbalance') }}">{{ __('Account Balance') }}</a>
                                            </li>
                                        @endcan
                                        @can('Manage Payee')
                                            <li class="dash-item">
                                                <a class="dash-link" href="{{ route('payees.index') }}">{{ __('Payees') }}</a>
                                            </li>
                                        @endcan

                                        @can('Manage Payer')
                                            <li class="dash-item">
                                                <a class="dash-link" href="{{ route('payer.index') }}">{{ __('Payers') }}</a>
                                            </li>
                                        @endcan

                                        @can('Manage Deposit')
                                            <li class="dash-item">
                                                <a class="dash-link" href="{{ route('deposit.index') }}">{{ __('Deposit') }}</a>
                                            </li>
                                        @endcan

                                        @can('Manage Expense')
                                            <li class="dash-item">
                                                <a class="dash-link" href="{{ route('expense.index') }}">{{ __('Expense') }}</a>
                                            </li>
                                        @endcan

                                        @can('Manage Transfer Balance')
                                            <li class="dash-item">
                                                <a class="dash-link"
                                                   href="{{ route('transferbalance.index') }}">{{ __('Transfer Balance') }}</a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                            @endif
                            <!-- fianance-->

                            <!--trainning-->
                            @if (Gate::check('Manage Trainer') || Gate::check('Manage Training'))
                                <li
                                    class="dash-item dash-hasmenu {{ Request::segment(1) == 'training' ? 'dash-trigger active' : '' }}">
                                    <a href="#!" class="dash-link "><span class="dash-micon"><i
                                                class="ti ti-school"></i></span><span
                                            class="dash-mtext">{{ __('Training') }}</span><span class="dash-arrow"><i
                                                data-feather="chevron-right"></i></span></a>
                                    <ul class="dash-submenu">
                                        @can('Manage Training')
                                            <li class="dash-item {{ Request::segment(1) == 'training' ? ' active' : '' }}">
                                                <a class="dash-link" href="{{ route('training.index') }}">{{ __('Training List') }}</a>
                                            </li>
                                        @endcan

                                        @can('Manage Trainer')
                                            <li class="dash-item ">
                                                <a class="dash-link" href="{{ route('trainer.index') }}">{{ __('Trainer') }}</a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                            @endif

                            <!-- tranning-->


                            <!-- HR-->
                            @if (Gate::check('Manage Award') ||
                                    Gate::check('Manage Transfer') ||
                                    Gate::check('Manage Resignation') ||
                                    Gate::check('Manage Travels') ||
                                    Gate::check('Manage Promotion') ||
                                    Gate::check('Manage Complaint') ||
                                    Gate::check('Manage Warning') ||
                                    Gate::check('Manage Termination') ||
                                    Gate::check('Manage Announcement') ||
                                    Gate::check('Manage Holiday'))
                                <li
                                    class="dash-item dash-hasmenu {{ Request::segment(1) == 'holiday' ? 'dash-trigger active' : '' }}">
                                    <a href="#!" class="dash-link">
                        <span class="dash-micon">
                            <i class="ti ti-user-plus"></i>
                        </span>
                                        <span class="dash-mtext">{{ __('HR Admin Setup') }}</span>
                                        <span class="dash-arrow">
                            <i data-feather="chevron-right"></i>
                        </span>
                                    </a>
                                    <ul class="dash-submenu">
                                        @can('Manage Award')
                                            <li class="dash-item {{ Request::segment(1) == 'award' ? 'active' : '' }}">
                                                <a class="dash-link" href="{{ route('award.index') }}">{{ __('Award') }}</a>
                                            </li>
                                        @endcan
                                        <li class="dash-item">
                                            <a class="dash-link" href="{{ route('transfer.index') }}">{{ __('Transfer') }}</a>
                                        </li>
                                        <li class="dash-item">
                                            <a class="dash-link"
                                               href="{{ route('resignation.index') }}">{{ __('Resignation') }}</a>
                                        </li>
                                        <li class="dash-item">
                                            <a class="dash-link" href="{{ route('travel.index') }}">{{ __('Trip') }}</a>
                                        </li>
                                        <li class="dash-item">
                                            <a class="dash-link" href="{{ route('promotion.index') }}">{{ __('Promotion') }}</a>
                                        </li>
                                        <li class="dash-item">
                                            <a class="dash-link" href="{{ route('complaint.index') }}">{{ __('Complaints') }}</a>
                                        </li>
                                        <li class="dash-item">
                                            <a class="dash-link" href="{{ route('warning.index') }}">{{ __('Warning') }}</a>
                                        </li>
                                        <li class="dash-item">
                                            <a class="dash-link"
                                               href="{{ route('termination.index') }}">{{ __('Termination') }}</a>
                                        </li>
                                        <li class="dash-item">
                                            <a class="dash-link"
                                               href="{{ route('announcement.index') }}">{{ __('Announcement') }}</a>
                                        </li>
                                        <li class="dash-item {{ Request::segment(1) == 'holiday' ? ' active' : '' }}">
                                            <a class="dash-link" href="{{ route('holiday.index') }}">{{ __('Holidays') }}</a>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                            <!-- HR-->

                            <!-- recruitment-->
                            @if (Gate::check('Manage Job') ||
                                    Gate::check('Manage Job Application') ||
                                    Gate::check('Manage Job OnBoard') ||
                                    Gate::check('Manage Custom Question') ||
                                    Gate::check('Manage Interview Schedule') ||
                                    Gate::check('Manage Career'))
                                <li
                                    class="dash-item dash-hasmenu  {{ Request::segment(1) == 'job' || Request::segment(1) == 'job-application' ? 'dash-trigger active' : '' }} ">
                                    <a href="#!" class="dash-link"><span class="dash-micon"><i
                                                class="ti ti-license"></i></span><span
                                            class="dash-mtext">{{ __('Recruitment') }}</span><span class="dash-arrow"><i
                                                data-feather="chevron-right"></i></span></a>
                                    <ul class="dash-submenu">
                                        @can('Manage Job')
                                            <li
                                                class="dash-item {{ Request::route()->getName() == 'job.index' ? 'active' : 'dash-hasmenu' }}">
                                                <a class="dash-link" href="{{ route('job.index') }}">{{ __('Jobs') }}</a>
                                            </li>
                                        @endcan
                                        @can('Manage Job')
                                            <li
                                                class="dash-item {{ Request::route()->getName() == 'job.create' ? 'active' : 'dash-hasmenu' }}">
                                                <a class="dash-link" href="{{ route('job.create') }}">{{ __('Job Create ') }}</a>
                                            </li>
                                        @endcan
                                        @can('Manage Job Application')
                                            <li class="dash-item {{ request()->is('job-application*') ? 'active' : '' }}">
                                                <a class="dash-link"
                                                   href="{{ route('job-application.index') }}">{{ __('Job Application') }}</a>
                                            </li>
                                        @endcan
                                        @can('Manage Job Application')

                                            <li class="dash-item {{ request()->is('candidates-job-applications') ? 'active' : '' }}">
                                                <a class="dash-link"
                                                   href="{{ route('job.application.candidate') }}">{{ __('Job Candidate') }}</a>
                                            </li>
                                        @endcan

                                        @can('Manage Job OnBoard')
                                            <li class="dash-item">
                                                <a class="dash-link"
                                                   href="{{ route('job.on.board') }}">{{ __('Job On-Boarding') }}</a>
                                            </li>
                                        @endcan

                                        @can('Manage Custom Question')
                                            <li class="dash-item">
                                                <a class="dash-link"
                                                   href="{{ route('custom-question.index') }}">{{ __('Custom Question') }}</a>
                                            </li>
                                        @endcan

                                        @can('Manage Interview Schedule')
                                            <li class="dash-item">
                                                <a class="dash-link"
                                                   href="{{ route('interview-schedule.index') }}">{{ __('Interview Schedule') }}</a>
                                            </li>
                                        @endcan

                                        @can('Manage Career')
                                            <li class="dash-item">
                                                <a class="dash-link" href="{{ route('career', [\Auth::user()->creatorId(), $lang]) }}"
                                                   target="_blank">{{ __('Career') }}</a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                            @endif
                            <!-- recruitment-->
                            <!--contract-->
                            @can('Manage Contract')
                                <li
                                    class="dash-item {{ Request::route()->getName() == 'contract.index' || Request::route()->getName() == 'contract.show' ? 'active' : '' }}">
                                    <a href="{{ route('contract.index') }}" class="dash-link"><span class="dash-micon"><i
                                                class="ti ti-device-floppy"></i></span><span
                                            class="dash-mtext">{{ __('Contracts') }}</span></a>
                                </li>
                            @endcan

                            <!--end-->


                            <!-- ticket-->
                            @can('Manage Ticket')
                                <li class="dash-item {{ Request::segment(1) == 'ticket' ? 'active' : '' }}">
                                    <a href="{{ route('ticket.index') }}" class="dash-link"><span class="dash-micon"><i
                                                class="ti ti-ticket"></i></span><span class="dash-mtext">{{ __('Ticket') }}</span></a>
                                </li>
                            @endcan

                            <!-- Event-->
                            @can('Manage Event')
                                <li class="dash-item">
                                    <a href="{{ route('event.index') }}" class="dash-link"><span class="dash-micon"><i
                                                class="ti ti-calendar-event"></i></span><span
                                            class="dash-mtext">{{ __('Event') }}</span>
                                    </a>
                                </li>
                            @endcan


                            <!--meeting-->
                            @can('Manage Meeting')
                                <li
                                    class="dash-item {{ Request::segment(1) == 'meeting' || Request::segment(2) == 'meeting' ? 'active' : '' }}">
                                    <a href="{{ route('meeting.index') }}" class="dash-link"><span class="dash-micon"><i
                                                class="ti ti-calendar-time"></i></span><span
                                            class="dash-mtext">{{ __('Meeting') }}</span></a>
                                </li>
                            @endcan


                            <!-- Zoom meeting-->
                            @can('Manage Zoom meeting')
                                @if (\Auth::user()->type != 'super admin')
                                    <li class="dash-item {{ Request::segment(1) == 'zoommeeting' ? 'active' : '' }}">
                                        <a href="{{ route('zoom-meeting.index') }}" class="dash-link"><span class="dash-micon"><i
                                                    class="ti ti-video"></i></span><span
                                                class="dash-mtext">{{ __('Zoom Meeting') }}</span></a>
                                    </li>
                                @endif
                            @endcan

                            <!-- assets-->
                            @if (Gate::check('Manage Assets'))
                                <li class="dash-item">
                                    <a href="{{ route('account-assets.index') }}" class="dash-link"><span class="dash-micon"><i
                                                class="ti ti-medical-cross"></i></span><span
                                            class="dash-mtext">{{ __('Assets') }}</span></a>
                                </li>
                            @endcan


                            <!-- document-->
                            @if (Gate::check('Manage Document'))
                                <li class="dash-item">
                                    <a href="{{ route('document-upload.index') }}" class="dash-link"><span
                                            class="dash-micon"><i class="ti ti-file"></i></span><span
                                            class="dash-mtext">{{ __('Document') }}</span></a>
                                </li>
                            @endcan

                            <!--company policy-->



                            @if (Gate::check('Manage Company Policy'))
                                <li class="dash-item">
                                    <a href="{{ route('company-policy.index') }}" class="dash-link"><span
                                            class="dash-micon"><i class="ti ti-pray"></i></span><span
                                            class="dash-mtext">{{ __('Company Policy') }}</span></a>
                                </li>
                            @endcan
                            <!--chats-->
                            @if (\Auth::user()->type != 'super admin')
                                <li class="dash-item {{ Request::segment(1) == 'chats' ? 'active' : '' }}">
                                    <a href="{{ url('chats') }}" class="dash-link"><span class="dash-micon"><i
                                                class="ti ti-messages"></i></span><span
                                            class="dash-mtext">{{ __('Messenger') }}</span></a>
                                </li>
                            @endif

                            @if (\Auth::user()->type == 'company')
                                <li
                                    class="dash-item {{ Request::route()->getName() == 'notification-templates.index' || Request::segment(1) == 'notification-templates-lang' ? 'active' : '' }}">
                                    <a href="{{ route('notification-templates.index') }}" class="dash-link"><span
                                            class="dash-micon"><i class="ti ti-bell"></i></span><span
                                            class="dash-mtext">{{ __('Notification Template') }}</span></a>
                                </li>
                            @endif

                            @if (\Auth::user()->type == 'super admin')
                                @if (Gate::check('Manage Plan'))
                                    <li class="dash-item ">
                                        <a href="{{ route('plans.index') }}" class="dash-link"><span
                                                class="dash-micon"><i class=" ti ti-trophy"></i></span><span
                                                class="dash-mtext">{{ __('Plan') }}</span></a>

                                    </li>
                                @endif
                            @endif
                            @if (\Auth::user()->type == 'super admin')
                                <li class="dash-item ">
                                    <a href="{{ route('plan_request.index') }}" class="dash-link"><span
                                            class="dash-micon"><i class="ti ti-arrow-down-right-circle"></i></span><span
                                            class="dash-mtext">{{ __('Plan Request') }}</span></a>

                                </li>
                            @endif


{{--                            @if (\Auth::user()->type == 'super admin')--}}
{{--                                <li class="dash-item dash-hasmenu  {{ Request::segment(1) == '' ? 'active' : '' }}">--}}
{{--                                    <a href="{{ route('referral-program.index') }}" class="dash-link">--}}
{{--                                        <span class="dash-micon"><i class="ti ti-discount-2"></i></span><span--}}
{{--                                            class="dash-mtext">{{ __('Referral Program') }}</span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            @endif--}}

                            @if (Auth::user()->type == 'super admin')
                                @if (Gate::check('manage coupon'))
                                    <li
                                        class="dash-item dash-hasmenu {{ Request::segment(1) == 'coupons' ? 'active' : '' }}">
                                        <a href="{{ route('coupons.index') }}" class="dash-link"><span
                                                class="dash-micon"><i class="ti ti-gift"></i></span><span
                                                class="dash-mtext">{{ __('Coupon') }}</span></a>

                                    </li>
                                @endif
                            @endif
                            @if (\Auth::user()->type == 'super admin')
                                {{-- @if (Gate::check('Manage Order')) --}}
                                <li class="dash-item ">
                                    <a href="{{ route('order.index') }}"
                                       class="dash-link {{ request()->is('orders*') ? 'active' : '' }}"><span
                                            class="dash-micon"><i class="ti ti-shopping-cart"></i></span><span
                                            class="dash-mtext">{{ __('Order') }}</span></a>

                                </li>
                                {{-- @endif --}}
                            @endif

{{--                            @if (\Auth::user()->type == 'super admin')--}}
{{--                                <li class="dash-item {{ Request::route()->getName() == 'email_template.index' || Request::segment(1) == 'email_template_lang' || Request::route()->getName() == 'manageemail.lang' ? 'active' : '' }}">--}}
{{--                                    <a href="{{ route('email_template.index') }}"--}}
{{--                                       class="dash-link"><span--}}
{{--                                            class="dash-micon"><i class="ti ti-template"></i></span><span--}}
{{--                                            class="dash-mtext">{{ __('Email Templates') }}</span></a>--}}

{{--                                </li>--}}
{{--                            @endif--}}
                            <!--report-->
                            <!-- @if (Gate::check('Manage Report'))
                                <li class="dash-item dash-hasmenu">
                                <a href="#!" class="dash-link"><span class="dash-micon"><i
                                class="ti ti-list"></i></span><span
                                class="dash-mtext">{{ __('Report') }}</span><span
class="dash-arrow"><i data-feather="chevron-right"></i></span></a>
<ul class="dash-submenu">
@can('Manage Report')
                                    <li class="dash-item">
                                    <a class="dash-link"
                                    href="{{ route('report.income-expense') }}">{{ __('Income Vs Expense') }}</a>
</li>

<li class="dash-item">
<a class="dash-link"
href="{{ route('report.monthly.attendance') }}">{{ __('Monthly Attendance') }}</a>
</li>

<li class="dash-item">
<a class="dash-link"
href="{{ route('report.leave') }}">{{ __('Leave') }}</a>
</li>


<li class="dash-item">
<a class="dash-link"
href="{{ route('report.account.statement') }}">{{ __('Account Statement') }}</a>
</li>



<li class="dash-item">
<a class="dash-link"
href="{{ route('report.timesheet') }}">{{ __('Timesheet') }}</a>
</li>
@endcan


                                </ul>
                                </li>
@endif -->


                            <!--constant-->
                            @if (Gate::check('Manage Department') ||
                                    Gate::check('Manage Designation') ||
                                    Gate::check('Manage Document Type') ||
                                    Gate::check('Manage Branch') ||
                                    Gate::check('Manage Award Type') ||
                                    Gate::check('Manage Termination Types') ||
                                    Gate::check('Manage Payslip Type') ||
                                    Gate::check('Manage Allowance Option') ||
                                    Gate::check('Manage Loan Options') ||
                                    Gate::check('Manage Deduction Options') ||
                                    Gate::check('Manage Expense Type') ||
                                    Gate::check('Manage Income Type') ||
                                    Gate::check('Manage Payment Type') ||
                                    Gate::check('Manage Leave Type') ||
                                    Gate::check('Manage Training Type') ||
                                    Gate::check('Manage Job Category') ||
                                    Gate::check('Manage Job Stage'))
                                <li
                                    class="dash-item dash-hasmenu {{ Request::route()->getName() == 'branch.index' ||Request::route()->getName() == 'department.index' ||Request::route()->getName() == 'designation.index' ||Request::route()->getName() == 'leavetype.index' ||Request::route()->getName() == 'document.index' ||Request::route()->getName() == 'paysliptype.index' ||Request::route()->getName() == 'allowanceoption.index' ||Request::route()->getName() == 'loanoption.index' ||Request::route()->getName() == 'deductionoption.index' ||Request::route()->getName() == 'goaltype.index' ||Request::route()->getName() == 'trainingtype.index' ||Request::route()->getName() == 'awardtype.index' ||Request::route()->getName() == 'terminationtype.index' ||Request::route()->getName() == 'job-category.index' ||Request::route()->getName() == 'job-stage.index' ||Request::route()->getName() == 'performanceType.index' ||Request::route()->getName() == 'competencies.index' ||Request::route()->getName() == 'expensetype.index' ||Request::route()->getName() == 'incometype.index' ||Request::route()->getName() == 'paymenttype.index' ||Request::route()->getName() == 'contract_type.index'? ' active': '' }}">
                                    <a href="{{ route('branch.index') }}" class="dash-link"><span class="dash-micon"><i
                                                class="ti ti-table"></i></span><span
                                            class="dash-mtext">{{ __('HRM System Setup') }}</span></a>
                                </li>
                                <!-- <ul class="dash-submenu">
@can('Manage Branch')
                                    <li class="dash-item {{ request()->is('branch*') ? 'active' : '' }}">
<a class="dash-link"
href="{{ route('branch.index') }}">{{ __('Branch') }}</a>
</li>
@endcan
                                @can('Manage Department')
                                    <li class="dash-item {{ request()->is('department*') ? 'active' : '' }}">
<a class="dash-link"
href="{{ route('department.index') }}">{{ __('Department') }}</a>
</li>
@endcan
                                @can('Manage Designation')
                                    <li class="dash-item {{ request()->is('designation*') ? 'active' : '' }}">
<a class="dash-link"
href="{{ route('designation.index') }}">{{ __('Designation') }}</a>
</li>
@endcan
                                @can('Manage Document Type')
                                    <li class="dash-item {{ request()->is('document*') ? 'active' : '' }}">
<a class="dash-link"
href="{{ route('document.index') }}">{{ __('Document Type') }}</a>
</li>
@endcan

                                @can('Manage Award Type')
                                    <li class="dash-item {{ request()->is('awardtype*') ? 'active' : '' }}">
<a class="dash-link"
href="{{ route('awardtype.index') }}">{{ __('Award Type') }}</a>
</li>
@endcan
                                @can('Manage Termination Types')
                                    <li
                                    class="dash-item {{ request()->is('terminationtype*') ? 'active' : '' }}">
<a class="dash-link"
href="{{ route('terminationtype.index') }}">{{ __('Termination Type') }}</a>
</li>
@endcan
                                @can('Manage Payslip Type')
                                    <li class="dash-item {{ request()->is('paysliptype*') ? 'active' : '' }}">
<a class="dash-link"
href="{{ route('paysliptype.index') }}">{{ __('Payslip Type') }}</a>
</li>
@endcan
                                @can('Manage Allowance Option')
                                    <li
                                    class="dash-item {{ request()->is('allowanceoption*') ? 'active' : '' }}">
<a class="dash-link"
href="{{ route('allowanceoption.index') }}">{{ __('Allowance Option') }}</a>
</li>
@endcan
                                @can('Manage Loan Option')
                                    <li class="dash-item {{ request()->is('loanoption*') ? 'active' : '' }}">
<a class="dash-link"
href="{{ route('loanoption.index') }}">{{ __('Loan Option') }}</a>
</li>
@endcan
                                @can('Manage Deduction Option')
                                    <li
                                    class="dash-item {{ request()->is('deductionoption*') ? 'active' : '' }}">
<a class="dash-link"
href="{{ route('deductionoption.index') }}">{{ __('Deduction Option') }}</a>
</li>
@endcan
                                @can('Manage Expense Type')
                                    <li class="dash-item {{ request()->is('expensetype*') ? 'active' : '' }}">
<a class="dash-link"
href="{{ route('expensetype.index') }}">{{ __('Expense Type') }}</a>
</li>
@endcan
                                @can('Manage Income Type')
                                    <li class="dash-item {{ request()->is('incometype*') ? 'active' : '' }}">
<a class="dash-link"
href="{{ route('incometype.index') }}">{{ __('Income Type') }}</a>
</li>
@endcan
                                @can('Manage Payment Type')
                                    <li class="dash-item {{ request()->is('paymenttype*') ? 'active' : '' }}">
<a class="dash-link"
href="{{ route('paymenttype.index') }}">{{ __('Payment Type') }}</a>
</li>
@endcan
                                @can('Manage Leave Type')
                                    <li class="dash-item {{ request()->is('leavetype*') ? 'active' : '' }}">
<a class="dash-link"
href="{{ route('leavetype.index') }}">{{ __('Leave Type') }}</a>
</li>
@endcan
                                @can('Manage Termination Type')
                                    <li
                                    class="dash-item {{ request()->is('terminationtype*') ? 'active' : '' }}">
<a class="dash-link"
href="{{ route('terminationtype.index') }}">{{ __('Termination Type') }}</a>
</li>
@endcan
                                @can('Manage Goal Type')
                                    <li class="dash-item {{ request()->is('goaltype*') ? 'active' : '' }}">
<a class="dash-link"
href="{{ route('goaltype.index') }}">{{ __('Goal Type') }}</a>
</li>
@endcan
                                @can('Manage Training Type')
                                    <li class="dash-item {{ request()->is('trainingtype*') ? 'active' : '' }}">
<a class="dash-link"
href="{{ route('trainingtype.index') }}">{{ __('Training Type') }}</a>
</li>
@endcan

                                @if (\Auth::user()->type !== 'hr')
                                    @can('Manage Job Category')
                                        <li
                                        class="dash-item {{ request()->is('job-category*') ? 'active' : '' }}">
<a class="dash-link"
href="{{ route('job-category.index') }}">{{ __('Job Category') }}</a>
</li>
@endcan
                                @endif

                                @if (\Auth::user()->type !== 'hr')
                                    @can('Manage Job Stage')
                                        <li
                                        class="dash-item {{ request()->is('job-stage*') ? 'active' : '' }}">
<a class="dash-link"
href="{{ route('job-stage.index') }}">{{ __('Job Stage') }}</a>
</li>
@endcan
                                @endif

                                <li
                                class="dash-item {{ request()->is('performanceType*') ? 'active' : '' }}">
<a class="dash-link"
href="{{ route('performanceType.index') }}">{{ __('Performance Type') }}</a>
</li>

@can('Manage Competencies')
                                    <li class="dash-item {{ request()->is('competencies*') ? 'active' : '' }}">

<a class="dash-link"
href="{{ route('competencies.index') }}">{{ __('Competencies') }}</a>
</li>
@endcan
                                </ul> -->
                            @endif
                            <!--constant-->

                            @if (\Auth::user()->type == 'super admin')
                                <li class="dash-item dash-hasmenu {{ (Request::route()->getName() == 'landingpage.index') || (Request::route()->getName() == 'custom_page.index') || (Request::route()->getName() == 'homesection.index') || (Request::route()->getName() == 'features.index') || (Request::route()->getName() == 'discover.index') || (Request::route()->getName() == 'screenshots.index') || (Request::route()->getName() == 'pricing_plan.index') || (Request::route()->getName() == 'faq.index') || (Request::route()->getName() == 'testimonials.index') || (Request::route()->getName() == 'join_us.index') ? ' active' : '' }}">
                                    <a href="{{ route('landingpage.index') }}" class="dash-link">
                                        <span class="dash-micon"><i class="ti ti-license"></i></span><span class="dash-mtext">{{__('Landing Page')}}</span>
                                    </a>
                                </li>
{{--                                @include('landingpage::menu.landingpage')--}}
                            @endif

                            @if (Gate::check('Manage System Settings'))
                                <li class="dash-item ">
                                    <a href="{{ route('settings.index') }}" class="dash-link"><span
                                            class="dash-micon"><i class="ti ti-settings"></i></span><span
                                            class="dash-mtext">{{ __('Settings') }}</span></a>
                                </li>
                            @endif
                            <!--------------------- Start System Setup ----------------------------------->

                            @if (\Auth::user()->type != 'super admin')

                                @if (Gate::check('Manage Plan') || Gate::check('Manage Order') || Gate::check('Manage Company Settings'))
                                    <li class="dash-item dash-hasmenu">
                                        <a href="#!" class="dash-link ">
                                            <span class="dash-micon"><i class="ti ti-settings"></i></span><span
                                                class="dash-mtext">{{ __('System Setup') }}</span><span
                                                class="dash-arrow">
                                <i data-feather="chevron-right"></i></span>
                                        </a>
                                        <ul class="dash-submenu">
                                            @if (Gate::check('Manage Company Settings'))
                                                <li
                                                    class="dash-item dash-hasmenu {{ Request::segment(1) == 'company-setting' ? ' active' : '' }}">
                                                    <a href="{{ route('settings.index') }}"
                                                       class="dash-link">{{ __('System Settings') }}</a>
                                                </li>
                                            @endif
                                            @if (Gate::check('Manage Plan'))
                                                <li
                                                    class="dash-item{{ Request::route()->getName() == 'plans.index' || Request::route()->getName() == 'stripe' ? ' active' : '' }}">
                                                    <a href="{{ route('plans.index') }}"
                                                       class="dash-link">{{ __('Setup Subscription Plan') }}</a>
                                                </li>
                                            @endif
                                            <li
                                                class="dash-item{{ Request::route()->getName() == 'referral-program.company' ? ' active' : '' }}">
                                                <a href="{{ route('referral-program.company') }}"
                                                   class="dash-link">{{ __('Referral Program') }}</a>
                                            </li>
                                            @if (\Auth::user()->type == 'super admin' || \Auth::user()->type == 'company')
                                                <li
                                                    class="dash-item {{ Request::segment(1) == 'order' ? 'active' : '' }}">
                                                    <a href="{{ route('order.index') }}"
                                                       class="dash-link">{{ __('Order') }}</a>
                                                </li>
                                            @endif
                                        </ul>
                                    </li>
                                @endif
                            @endif

                            <!--------------------- End System Setup ----------------------------------->
                        </ul>

                    </div>
                </div>
            </nav>
<!-- [ navigation menu ] end -->
<!-- [ Header ] start -->

            @php
                use App\Models\Utility;
                $users = \Auth::user();
                $currantLang = $users->currentLanguage();
                $languages = \App\Models\Utility::languages();
                $profile = \App\Models\Utility::get_file('uploads/avatar/');
                $unseenCounter = App\Models\ChMessage::where('to_id', Auth::user()->id)
                    ->where('seen', 0)
                    ->count();
                $unseen_count = DB::select('SELECT from_id, COUNT(*) AS totalmasseges FROM ch_messages WHERE seen = 0 GROUP BY from_id');
            @endphp


            @if (isset($setting['cust_theme_bg']) && $setting['cust_theme_bg'] == 'on')
                <header class="dash-header transprent-bg">
                    @else
                        <header class="dash-header">
                            @endif
                            {{-- <header class="dash-header  {{ isset($setting['is_sidebar_transperent']) && $setting['is_sidebar_transperent'] == 'on' ? 'transprent-bg' : '' }}"> --}}

                            <div class="header-wrapper">
                                <div class="me-auto dash-mob-drp">
                                    <ul class="list-unstyled">
                                        <li class="dash-h-item mob-hamburger">
                                            <a href="#!" class="dash-head-link" id="mobile-collapse">
                                                <div class="hamburger hamburger--arrowturn">
                                                    <div class="hamburger-box">
                                                        <div class="hamburger-inner"></div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>

                                        <li class="dropdown dash-h-item drp-company">
                                            <a class="dash-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#"
                                               role="button" aria-haspopup="false" aria-expanded="false">
                    <span class="theme-avtar">
                        <img alt="#"
                             src="{{ !empty($users->avatar) ? $profile . $users->avatar : $profile . 'avatar.png' }}"
                             class="header-avtar" style="width: 100%; border-radius:50%">
                    </span>
                                                <span class="hide-mob ms-2"> {{ 'Hi, ' . Auth::user()->name . '!' }}
                        <i class="ti ti-chevron-down drp-arrow nocolor hide-mob"></i>
                                            </a>
                                            <div class="dropdown-menu dash-h-dropdown">
                                                <a href="{{ route('profile') }}" class="dropdown-item">
                                                    <i class="ti ti-user"></i>
                                                    <span>{{ __('My Profile') }}</span>
                                                </a>

                                                <a href="{{ route('logout') }}" class="dropdown-item"
                                                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                                    <i class="ti ti-power"></i>
                                                    <span>{{ __('Logout') }}</span>
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf</form>
                                            </div>
                                        </li>


                                    </ul>
                                </div>
                                <div class="ms-auto">
                                    <ul class="list-unstyled">

                                        @if (Auth::user()->type != 'super admin')
                                            @impersonating($guard = null)
                                            <li class="dropdown dash-h-item drp-company">
                                                <a class="btn btn-danger btn-sm me-3" href="{{ route('exit.company') }}"><i class="ti ti-ban"></i>
                                                    {{ __('Exit Company Login') }}
                                                </a>
                                            </li>
                                            @endImpersonating
                                            <li class="dash-h-item">
                                                <a class="dash-head-link me-0" href="{{ url('/chats') }}">
                                                    <i class="ti ti-message-circle"></i>
                                                    <span
                                                        class="bg-danger dash-h-badge message-counter custom_messanger_counter">{{ $unseenCounter }}
                            <span class="sr-only"></span>
                        </span>
                                                </a>
                                            </li>
                                        @endif

                                        {{-- unread messages --}}

                                        @if (\Auth::user()->type != 'super admin')
                                            <li class="dropdown dash-h-item drp-notification">
                                                <a class="dash-head-link dropdown-toggle arrow-none me-0 " data-bs-toggle="dropdown" href="#"
                                                   role="button" aria-haspopup="false" aria-expanded="false" id="msg-btn">
                                                    <i class="ti ti-message-2"></i>
                                                    <span
                                                        class="bg-danger dash-h-badge message-counter custom_messanger_counter">{{ $unseenCounter }}
                            <span class="sr-only"></span>
                        </span>
                                                </a>
                                                <div class="dropdown-menu dash-h-dropdown dropdown-menu-end">
                                                    <div class="noti-header">
                                                        <h5 class="m-0">{{ __('Messages') }}</h5>
                                                        <a href="#" class="dash-head-link mark_all_as_read_message">{{ __('Clear All') }}</a>
                                                    </div>

                                                    <div class="noti-body dropdown-list-message-msg">
                                                        <div style="display: flex;">
                                                            <a href="#" class="show-listView"></a>
                                                            {{-- unread messages --}}
                                                            <div class="count-listOfContacts">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="noti-footer">
                                                        <div class="d-grid">
                                                            <a href="{{ route('chats') }}"
                                                               class="btn dash-head-link justify-content-center text-primary mx-0">View all</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endif

                                        @php
                                            // $currantLang = basename(\App::getLocale());
                                            // $languages = \App\Models\Utility::languages();
                                            // $lang = isset($users->lang) ? $users->lang : 'en';
                                            // if ($lang == null) {
                                            //     $lang = 'en';
                                            // }
                                            // if (\Schema::hasTable('languages')) {
                                            //     $LangName = \App\Models\Languages::where('code', $lang)->first()->fullName;
                                            // } else {
                                            //     $LangName = 'english';
                                            // }

                                            $lang = isset($users->lang) ? $users->lang : 'en';
                                            if ($lang == null) {
                                                $lang = 'en';
                                            }
                                            $LangName = \App\Models\Languages::where('code', $lang)->first()->fullName;
                                            if (empty($LangName)) {
                                                $LangName = new App\Models\Utility();
                                                $LangName->fullName = 'English';
                                            }
                                        @endphp

                                        <li class="dropdown dash-h-item drp-language">
                                            <a class="dash-head-link dropdown-toggle arrow-none me-0 " data-bs-toggle="dropdown" href="#"
                                               role="button" aria-haspopup="false" aria-expanded="false" id="dropdownLanguage">
                                                <i class="ti ti-world nocolor"></i>
                                                <span class="drp-text hide-mob">{{ Str::ucfirst($LangName) }}</span>
                                                <i class="ti ti-chevron-down drp-arrow nocolor"></i>
                                            </a>
                                            <div class="dropdown-menu dash-h-dropdown dropdown-menu-end" aria-labelledby="dropdownLanguage">
                                                {{-- @foreach (App\Models\Utility::languages() as $lang)
                                                    <a href="{{ route('change.language', $lang) }}"
                                                        class="dropdown-item {{ basename(App::getLocale()) == $lang ? 'text-danger' : '' }}">{{ Str::upper($lang) }}</a>
                                                @endforeach --}}
                                                @foreach (App\Models\Utility::languages() as $code => $lang)
                                                    <a href="{{ route('change.language', $code) }}"
                                                       class="dropdown-item {{ $currantLang == $code ? 'text-primary' : '' }}">
                                                        <span>{{ ucFirst($lang) }}</span>
                                                    </a>
                                                @endforeach
                                                @if (\Auth::user()->type == 'super admin')
                                                    <div class="dropdown-divider m-0"></div>
                                                    <a href="#" class="dropdown-item text-primary" data-size="md"
                                                       data-url="{{ route('create.language') }}" data-ajax-popup="true"
                                                       data-title="{{ __('Create New Language') }}"
                                                       data-bs-toggle="tooltip">{{ __('Create Language') }}</a>
                                                    <div class="dropdown-divider m-0"></div>
                                                    <a href="{{ route('manage.language', [basename(App::getLocale())]) }}"
                                                       class="dropdown-item text-primary">{{ __('Manage Language') }}</a>
                                                @endif
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </header>
                        @push('scripts')
                            {{-- @include('Chatify::layouts.modals') --}}
                            <script>
                                $('#msg-btn').click(function() {
                                    let contactsPage = 1;
                                    let contactsLoading = false;
                                    let noMoreContacts = false;
                                    $.ajax({
                                        url: url + "/getContacts",
                                        method: "GET",
                                        data: {
                                            _token: "{{ csrf_token() }}",
                                            page: contactsPage,
                                            type: 'custom',
                                        },
                                        dataType: "JSON",
                                        success: (data) => {

                                            if (contactsPage < 2) {
                                                $(".count-listOfContacts").html(data.contacts);

                                            } else {
                                                $(".count-listOfContacts").append(data.contacts);
                                            }
                                            $('.count-listOfContacts').find('.messenger-list-item').each(function(e) {
                                                $('.noti-body .activeStatus').remove()
                                                $('.noti-body .avatar').remove()
                                                $(this).find('span').remove()
                                                $(this).find('p').addClass("d-inline")
                                                // $(this).find('b').addClass('position-absolute')
                                                // $(this).find('b').css({position: "absolute"});
                                                $(this).find('b').css({
                                                    "position": "absolute",
                                                    "right": "50px"
                                                });
                                                $(this).find('tr').remove('td')

                                            })
                                        },
                                        error: (error) => {
                                            setContactsLoading(false);
                                            console.error(error);
                                        },
                                    });
                                })
                            </script>
                        @endpush

<!-- Modal -->
<div class="modal notification-modal fade" id="notification-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-close float-end" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                <h6 class="mt-2">
                    <i data-feather="monitor" class="me-2"></i>Desktop settings
                </h6>
                <hr />
                <div class="form-check form-switch">
                    <input type="checkbox" class="form-check-input" id="pcsetting1" checked />
                    <label class="form-check-label f-w-600 pl-1" for="pcsetting1">Allow desktop
                        notification</label>
                </div>
                <p class="text-muted ms-5">
                    you get lettest content at a time when data will updated
                </p>
                <div class="form-check form-switch">
                    <input type="checkbox" class="form-check-input" id="pcsetting2" />
                    <label class="form-check-label f-w-600 pl-1" for="pcsetting2">Store Cookie</label>
                </div>
                <h6 class="mb-0 mt-5">
                    <i data-feather="save" class="me-2"></i>Application settings
                </h6>
                <hr />
                <div class="form-check form-switch">
                    <input type="checkbox" class="form-check-input" id="pcsetting3" />
                    <label class="form-check-label f-w-600 pl-1" for="pcsetting3">Backup Storage</label>
                </div>
                <p class="text-muted mb-4 ms-5">
                    Automaticaly take backup as par schedule
                </p>
                <div class="form-check form-switch">
                    <input type="checkbox" class="form-check-input" id="pcsetting4" />
                    <label class="form-check-label f-w-600 pl-1" for="pcsetting4">Allow guest to print
                        file</label>
                </div>
                <h6 class="mb-0 mt-5">
                    <i data-feather="cpu" class="me-2"></i>System settings
                </h6>
                <hr />
                <div class="form-check form-switch">
                    <input type="checkbox" class="form-check-input" id="pcsetting5" checked />
                    <label class="form-check-label f-w-600 pl-1" for="pcsetting5">View other user chat</label>
                </div>
                <p class="text-muted ms-5">Allow to show public user message</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-danger btn-sm" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="button" class="btn btn-light-primary btn-sm">
                    Save changes
                </button>
            </div>
        </div>
    </div>
</div>
<!-- [ Header ] end -->


<!-- [ Main Content ] start -->
<section class="dash-container">
    <div class="dash-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <div class="page-header-title">
                            <h4 class="m-b-10">
                                @yield('page-title')
                            </h4>
                        </div>
                        <ul class="breadcrumb">
                            @yield('breadcrumb')
                        </ul>
                    </div>
                    <div class="col-sm-auto col-md">
                        <div class="float-end "
                             @if ($SITE_RTL == 'on') style=" float: left !important;" @endif>
                            @yield('action-button')
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <!-- [ basic-table ] start -->
        @yield('content')
        <!-- [ basic-table ] end -->
        <!-- [ Main Content ] end -->
    </div>
</section>
<div class="modal fade" id="commonModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="body">
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="commonModalOver" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            </div>
        </div>
    </div>
</div>

<div class="position-fixed top-0 end-0 p-3" style="z-index: 99999">
    <div id="liveToast" class="toast text-white  fade" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body"></div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
        </div>
    </div>
</div>
<!-- [ Main Content ] end -->
<footer class="dash-footer">
    <div class="footer-wrapper">
        <div class="py-1">
                <span class="text-muted">
                    @if (empty(App\Models\Utility::getValByName('footer_text')))
                        &copy;{{ date(' Y') }}
                    @endif
                    {{ App\Models\Utility::getValByName('footer_text') ? App\Models\Utility::getValByName('footer_text') : config('app.name', 'HRMGo SaaS') }}

                    {{-- {{ \App\Models\Utility::getValByName('footer_text') ? \App\Models\Utility::getValByName('footer_text') : '©Copyright HRMGo SaaS' . date(' Y') }} --}}

                </span>
        </div>

    </div>
</footer>
<!-- Warning Section start -->
<!-- Older IE warning message -->
<!--[if lt IE 11]>

<![endif]-->
<!-- Warning Section Ends -->
<!-- Required Js -->
<script src="{{ asset('super_assets/js/plugins/choices.min.js') }}"></script>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/jquery.form.js') }}"></script>

<script src="{{ asset('js/letter.avatar.js') }}"></script>
<script src="{{ asset('super_assets/js/plugins/datepicker-full.min.js') }}"></script>
<script src="{{ asset('super_assets/js/plugins/popper.min.js') }}"></script>
<script src="{{ asset('super_assets/js/plugins/simplebar.min.js') }}"></script>
<script src="{{ asset('super_assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('super_assets/js/plugins/bootstrap.min.js') }}"></script>
<script src="{{ asset('super_assets/js/plugins/feather.min.js') }}"></script>
<script src="{{ asset('super_assets/js/plugins/bootstrap-switch-button.min.js') }}"></script>
<script src="{{ asset('super_assets/js/dash.js') }}"></script>
<script src="{{ asset('super_assets/js/plugins/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('super_assets/js/plugins/simple-datatables.js') }}"></script>
<script src="{{ asset('super_assets/js/plugins/flatpickr.min.js') }}"></script>

<script src="{{ asset('js/custom_new.js') }}"></script>

<script src="{{ asset('js/chatify/autosize.js') }}"></script>
<script src='https://unpkg.com/nprogress@0.2.0/nprogress.js'></script>


{{-- <script>
    if($("#pc-dt-simple").lenght > 0) {
        const dataTable = new simpleDatatables.DataTable("#pc-dt-simple");
    }
</script> --}}

<script>
    const dataTable = new simpleDatatables.DataTable("#pc-dt-simple");
</script>

<script>
    feather.replace();
    var pctoggle = document.querySelector("#pct-toggler");
    if (pctoggle) {
        pctoggle.addEventListener("click", function() {
            if (
                !document.querySelector(".pct-customizer").classList.contains("active")
            ) {
                document.querySelector(".pct-customizer").classList.add("active");
            } else {
                document.querySelector(".pct-customizer").classList.remove("active");
            }
        });
    }
    var themescolors = document.querySelectorAll(".themes-color > a");
    for (var h = 0; h < themescolors.length; h++) {
        var c = themescolors[h];
        c.addEventListener("click", function(event) {
            var targetElement = event.target;
            if (targetElement.tagName == "SPAN") {
                targetElement = targetElement.parentNode;
            }
            var temp = targetElement.getAttribute("data-value");
            removeClassByPrefix(document.querySelector("body"), "theme-");
            document.querySelector("body").classList.add(temp);
        });
    }
    var custthemebg = document.querySelector("#cust_theme_bg");
    custthemebg.addEventListener("click", function() {
        if (custthemebg.checked) {
            document.querySelector(".dash-sidebar").classList.add("transprent-bg");
            document
                .querySelector(".dash-header:not(.dash-mob-header)")
                .classList.add("transprent-bg");
        } else {
            document.querySelector(".dash-sidebar").classList.remove("transprent-bg");
            document
                .querySelector(".dash-header:not(.dash-mob-header)")
                .classList.remove("transprent-bg");
        }
    });
    var custdarklayout = document.querySelector("#cust_darklayout");
    custdarklayout.addEventListener("click", function() {
        if (custdarklayout.checked) {
            document
                .querySelector("#main-style-link")
                .setAttribute("href", "{{ asset('super_assets/css/style-dark.css') }}");
            document
                .querySelector(".m-header > .b-brand > .logo-lg")
                .setAttribute("src", "{{ asset('/storage/uploads/logo/logo-light.png') }}");
        } else {
            document
                .querySelector("#main-style-link")
                .setAttribute("href", "{{ asset('super_assets/css/style.css') }}");
            document
                .querySelector(".m-header > .b-brand > .logo-lg")
                .setAttribute("src", "{{ asset('/storage/uploads/logo/logo-dark.png') }}");
        }
    });

    function removeClassByPrefix(node, prefix) {
        for (let i = 0; i < node.classList.length; i++) {
            let value = node.classList[i];
            if (value.startsWith(prefix)) {
                node.classList.remove(value);
            }
        }
    }
</script>

<script>
    $(document).on('click', '.local_calender .fc-daygrid-event', function(e) {
        // if (!$(this).hasClass('project')) {
        e.preventDefault();
        var event = $(this);
        var title = $(this).find('.fc-event-title').html();

        var size = 'md';
        var url = $(this).attr('href');
        $("#commonModal .modal-title ").html(title);
        $("#commonModal .modal-dialog").addClass('modal-' + size);
        $.ajax({
            url: url,
            success: function(data) {
                $('#commonModal .body').html(data);
                $("#commonModal").modal('show');
                if ($(".d_week").length > 0) {
                    $($(".d_week")).each(function(index, element) {
                        var id = $(element).attr('id');

                        (function() {
                            const d_week = new Datepicker(document.querySelector('#' +
                                id), {
                                buttonClass: 'btn',
                                format: 'yyyy-mm-dd',
                            });
                        })();

                    });
                }

            },
            error: function(data) {
                data = data.responseJSON;
                toastrs('Error', data.error, 'error')
            }
        });
        // }
    });
</script>

<script src="https://js.pusher.com/5.0/pusher.min.js"></script>

@if (\App\Models\Utility::getValByName('gdpr_cookie') == 'on')
    <script type="text/javascript">
        var defaults = {
            'messageLocales': {
                /*'en': 'We use cookies to make sure you can have the best experience on our website. If you continue to use this site we assume that you will be happy with it.'*/
                'en': "{{ \App\Models\Utility::getValByName('cookie_text') }}"
            },
            'buttonLocales': {
                'en': 'Ok'
            },
            'cookieNoticePosition': 'bottom',
            'learnMoreLinkEnabled': false,
            'learnMoreLinkHref': '/cookie-banner-information.html',
            'learnMoreLinkText': {
                'it': 'Saperne di più',
                'en': 'Learn more',
                'de': 'Mehr erfahren',
                'fr': 'En savoir plus'
            },
            'buttonLocales': {
                'en': 'Ok'
            },
            'expiresIn': 30,
            'buttonBgColor': '#d35400',
            'buttonTextColor': '#fff',
            'noticeBgColor': '#000',
            'noticeTextColor': '#fff',
            'linkColor': '#009fdd'
        };
    </script>
    <script src="{{ asset('js/cookie.notice.js') }}"></script>
@endif

@if (\Auth::user()->type != 'super admin')
    <script>
        $(document).ready(function() {
            pushNotification('{{ Auth::id() }}');
        });

        function pushNotification(id) {

            // ajax setup form csrf token
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Enable pusher logging - don't include this in production
            Pusher.logToConsole = false;

            var pusher = new Pusher('{{ $pusher_setting['pusher_app_key'] }}', {
                cluster: '{{ $pusher_setting['pusher_app_cluster'] }}',
                forceTLS: true
            });

            // Pusher Notification
            var channel = pusher.subscribe('send_notification');
            channel.bind('notification', function(data) {
                if (id == data.user_id) {
                    $(".notification-toggle").addClass('beep');
                    $(".notification-dropdown #notification-list").prepend(data.html);
                }
            });

            // Pusher Message
            var msgChannel = pusher.subscribe('my-channel');
            msgChannel.bind('my-chat', function(data) {

                if (id == data.to) {
                    getChat();
                }
            });
        }

        // Get chat for top ox
    </script>
@endif


@if ($message = Session::get('success'))
    <script>
        show_toastr('Success', '{!! $message !!}', 'success');
    </script>
@endif
@if ($message = Session::get('error'))
    <script>
        show_toastr('Error', '{!! $message !!}', 'error');
    </script>
@endif


@stack('script-page')

@stack('scripts')
{{--@include('Chatify::layouts.footerLinks')--}}

@stack('custom-scripts')
@if ($enable_cookie['enable_cookie'] == 'on')
    @include('layouts.cookie_consent')
@endif

</body>

</html>
