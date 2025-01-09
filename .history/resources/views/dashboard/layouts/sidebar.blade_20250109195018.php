<!-- Sidebar -->
@php
    $logo=asset(Storage::url('uploads/logo/'));
    $company_logo=Utility::getValByName('company_logo');
    $company_small_logo=Utility::getValByName('company_small_logo');
    $profile=asset(Storage::url('uploads/avatar/'));
@endphp


<div class="sidebar" id="sidebar">
    <!-- Logo Section -->
    <div class="sidebar-logo">
        <!-- Normal Logo -->
        <a href="{{ $logo.'/logo.png' }}" class="logo logo-normal">
            <img  src="{{ $logo.'/2_logo.png' }}" alt="Logo" class="logo-img">
        </a>

        <!-- Small Logo -->
        <a href="https://smarthr.dreamstechnologies.com/html/template/index.html" class="logo-small">
            <img src="{{ $logo.'/2_logo.png' }}" alt="Logo" class="logo-img-small">
        </a>

        <!-- Dark Logo -->
        <a href="https://smarthr.dreamstechnologies.com/html/template/index.html" class="dark-logo">
            <img src="{{ $logo.'/2_logo.png' }}" alt="Logo" class="logo-img-dark">
        </a>
    </div>

    <!-- Profile Section -->
    <div class="modern-profile p-3 pb-0">
        <div class="text-center rounded bg-light p-3 mb-4 user-profile">
            <div class="avatar avatar-lg online mb-3">
                <img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-02.jpg" alt="Img" class="img-fluid rounded-circle">
            </div>
            <h6 class="fs-12 fw-normal mb-1">Adrian Herman</h6>
            <p class="fs-10">System Admin</p>
        </div>

        <!-- Sidebar Navigation Tabs -->
        <div class="sidebar-nav mb-3">
            <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded nav-justified bg-transparent" role="tablist">
                <li class="nav-item"><a class="nav-link active border-0" href="#">Menu</a></li>
                <li class="nav-item"><a class="nav-link border-0" href="https://smarthr.dreamstechnologies.com/html/template/chat.html">Chats</a></li>
                <li class="nav-item"><a class="nav-link border-0" href="https://smarthr.dreamstechnologies.com/html/template/email.html">Inbox</a></li>
            </ul>
        </div>
    </div>

    <!-- Search and Menu Section -->
    <div class="sidebar-header p-3 pb-0 pt-2">
        <!-- Profile Info and Search -->
        <div class="text-center rounded bg-light p-2 mb-4 sidebar-profile d-flex align-items-center">
            <div class="avatar avatar-md online">
                <img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-02.jpg" alt="Img" class="img-fluid rounded-circle">
            </div>
            <div class="text-start sidebar-profile-info ms-2">
                <h6 class="fs-12 fw-normal mb-1">Adrian Herman</h6>
                <p class="fs-10">System Admin</p>
            </div>
        </div>

        <!-- Search Input -->
        <div class="input-group input-group-flat d-inline-flex mb-4">
            <span class="input-icon-addon">
                <i class="ti ti-search"></i>
            </span>
            <input type="text" class="form-control" placeholder="Search in HRMS">
            <span class="input-group-text">
                <kbd>CTRL + / </kbd>
            </span>
        </div>


    </div>

    <!-- Sidebar Menu -->
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">

        </div>
    </div>
</div>
<!-- /Sidebar -->
@php
    $logo = asset(Storage::url('uploads/logo/'));
    $company_logo = Utility::getValByName('company_logo');
    $company_small_logo = Utility::getValByName('company_small_logo');
    $profile = asset(Storage::url('uploads/avatar/'));
@endphp

<!-- Logo Section (Above Sidebar) -->
<div class="sidebar-logo-container">
    <!-- Normal Logo -->
    <a href="{{ $logo.'/logo.png' }}" class="logo logo-normal">
        <img src="{{ $logo.'/2_logo.png' }}" alt="Logo" class="logo-img">
    </a>

    <!-- Small Logo -->
    <a href="https://smarthr.dreamstechnologies.com/html/template/index.html" class="logo-small">
        <img src="{{ $logo.'/2_logo.png' }}" alt="Logo" class="logo-img-small">
    </a>

    <!-- Dark Logo -->
    <a href="https://smarthr.dreamstechnologies.com/html/template/index.html" class="dark-logo">
        <img src="{{ $logo.'/2_logo.png' }}" alt="Logo" class="logo-img-dark">
    </a>
</div>

<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <!-- Profile Section -->
    <div class="modern-profile p-3 pb-0">
        <div class="text-center rounded bg-light p-3 mb-4 user-profile">
            <div class="avatar avatar-lg online mb-3">
                <img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-02.jpg" alt="Img" class="img-fluid rounded-circle">
            </div>
            <h6 class="fs-12 fw-normal mb-1">Adrian Herman</h6>
            <p class="fs-10">System Admin</p>
        </div>

        <!-- Sidebar Navigation Tabs -->
        <div class="sidebar-nav mb-3">
            <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded nav-justified bg-transparent" role="tablist">
                <li class="nav-item"><a class="nav-link active border-0" href="#">Menu</a></li>
                <li class="nav-item"><a class="nav-link border-0" href="https://smarthr.dreamstechnologies.com/html/template/chat.html">Chats</a></li>
                <li class="nav-item"><a class="nav-link border-0" href="https://smarthr.dreamstechnologies.com/html/template/email.html">Inbox</a></li>
            </ul>
        </div>
    </div>

    <!-- Search and Menu Section -->
    <div class="sidebar-header p-3 pb-0 pt-2">
        <!-- Profile Info and Search -->
        <div class="text-center rounded bg-light p-2 mb-4 sidebar-profile d-flex align-items-center">
            <div class="avatar avatar-md online">
                <img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-02.jpg" alt="Img" class="img-fluid rounded-circle">
            </div>
            <div class="text-start sidebar-profile-info ms-2">
                <h6 class="fs-12 fw-normal mb-1">Adrian Herman</h6>
                <p class="fs-10">System Admin</p>
            </div>
        </div>

        <!-- Search Input -->
        <div class="input-group input-group-flat d-inline-flex mb-4">
            <span class="input-icon-addon">
                <i class="ti ti-search"></i>
            </span>
            <input type="text" class="form-control" placeholder="Search in HRMS">
            <span class="input-group-text">
                <kbd>CTRL + / </kbd>
            </span>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title"><span>{{ __('Main menu') }}</span></li>
                <li>
                    <ul>
                        <!-- Menu Items (unchanged) -->
                        <!-- Add your menu items here -->
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
