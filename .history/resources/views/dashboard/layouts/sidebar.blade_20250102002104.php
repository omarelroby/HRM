<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <!-- Logo Section -->
    <div class="sidebar-logo">
        <a href="{{ route('home') }}" class="logo logo-normal">
            <img src="{{ asset('assets/img/logo.svg') }}" alt="Logo">
        </a>
        <a href="{{ route('home') }}" class="logo-small">
            <img src="{{ asset('assets/img/logo-small.svg') }}" alt="Logo">
        </a>
        <a href="{{ route('home') }}" class="dark-logo">
            <img src="{{ asset('assets/img/logo-white.svg') }}" alt="Logo">
        </a>
    </div>

    <!-- Profile Section -->
    <div class="modern-profile p-3 pb-0">
        <div class="text-center rounded bg-light p-3 mb-4 user-profile">
            <div class="avatar avatar-lg online mb-3">
                <img src="{{ asset('assets/img/profiles/avatar-02.jpg') }}" alt="Img" class="img-fluid rounded-circle">
            </div>
            <h6 class="fs-12 fw-normal mb-1">Adrian Herman</h6>
            <p class="fs-10">System Admin</p>
        </div>

        <!-- Sidebar Navigation Tabs -->
        <div class="sidebar-nav mb-3">
            <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded nav-justified bg-transparent" role="tablist">
                <li class="nav-item"><a class="nav-link active border-0" href="#">Menu</a></li>
                <li class="nav-item"><a class="nav-link border-0" href="{{ url('/chat') }}">Chats</a></li>
                <li class="nav-item"><a class="nav-link border-0" href="{{ url('/email') }}">Inbox</a></li>
            </ul>
        </div>
    </div>

    <!-- Search and Menu Section -->
    <div class="sidebar-header p-3 pb-0 pt-2">
        <!-- Profile Info and Search -->
        <div class="text-center rounded bg-light p-2 mb-4 sidebar-profile d-flex align-items-center">
            <div class="avatar avatar-md online">
                <img src="{{ asset('assets/img/profiles/avatar-02.jpg') }}" alt="Img" class="img-fluid rounded-circle">
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

        <!-- Menu Item Action Buttons -->
        <div class="d-flex align-items-center justify-content-between menu-item mb-3">
            <div class="me-3">
                <a href="{{ url('/calendar') }}" class="btn btn-menubar">
                    <i class="ti ti-layout-grid-remove"></i>
                </a>
            </div>
            <div class="me-3">
                <a href="{{ url('/chat') }}" class="btn btn-menubar position-relative">
                    <i class="ti ti-brand-hipchat"></i>
                    <span class="badge bg-info rounded-pill d-flex align-items-center justify-content-center header-badge">5</span>
                </a>
            </div>
            <div class="me-3 notification-item">
                <a href="{{ url('/activity') }}" class="btn btn-menubar position-relative me-1">
                    <i class="ti ti-bell"></i>
                    <span class="notification-status-dot"></span>
                </a>
            </div>
            <div class="me-0">
                <a href="{{ url('/email') }}" class="btn btn-menubar">
                    <i class="ti ti-message"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title"><span>{{ __('Main menu') }}</span></li>
                <li>
                    <ul>
                        <!-- Dashboard -->
                        <li class="{{ request()->routeIs('home') ? 'active' : '' }}">
                            <a href="{{ route('home') }}">
                                <i class="ti ti-smart-home"></i><span>{{ __('Dashboard') }}</span>
                            </a>
                        </li>

                        <!-- Employee Submenu -->
                        <li class="submenu {{ request()->routeIs('employee.*') ? 'active subdrop' : '' }}">
                            <a href="javascript:void(0);" class="subdrop">
                                <i class="ti ti-user-circle"></i>
                                <span class="submenu-title">{{ __('Employee') }}</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul style="{{ request()->routeIs('employee.*') ? 'display: block;' : 'display: none;' }}">
                                <li class="{{ request()->routeIs('employee.index') ? 'active' : '' }}">
                                    <a href="{{ url('/employee') }}">{{ __('Employee') }}</a>
                                </li>
                                <li class="{{ request()->routeIs('timesheet.index') ? 'active' : '' }}">
                                    <a href="{{ url('/timesheet') }}">{{ __('Timesheet') }}</a>
                                </li>
                                <li class="{{ request()->routeIs('payslip.index') ? 'active' : '' }}">
                                    <a href="{{ route('payslip.index') }}">{{ __('Payslip List') }}</a>
                                </li>

                                <!-- Employee Setting Submenu -->
                                <li class="submenu {{
                                    request()->routeIs('jobtitle.*') ||
                                    request()->routeIs('nationality.*') ||
                                    request()->routeIs('labor_companies.*') ||
                                    request()->routeIs('workunits.*') ||
                                    request()->routeIs('employee_shifts.*') ||
                                    request()->routeIs('place.*') ||
                                    request()->routeIs('jobtypes.*') ||
                                    request()->routeIs('banks.*')
                                    ? 'active subdrop' : '' }}">
                                    <a href="javascript:void(0);" class="subdrop">
                                        <i class="ti ti-user-circle"></i>
                                        <span class="submenu-title">{{ __('Employee Setting') }}</span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <ul style="{{
                                        request()->routeIs('jobtitle.*') ||
                                        request()->routeIs('nationality.*') ||
                                        request()->routeIs('labor_companies.*') ||
                                        request()->routeIs('workunits.*') ||
                                        request()->routeIs('employee_shifts.*') ||
                                        request()->routeIs('place.*') ||
                                        request()->routeIs('jobtypes.*') ||
                                        request()->routeIs('banks.*')
                                        ? 'display: block;' : 'display: none;' }}">
                                        <li class="{{ request()->routeIs('jobtitle.index') ? 'active' : '' }}">
                                            <a href="{{ url('/jobtitle') }}">{{ __('Job Titles') }}</a>
                                        </li>
                                        <li class="{{ request()->routeIs('nationality.index') ? 'active' : '' }}">
                                            <a href="{{ url('/nationality') }}">{{ __('Nationality') }}</a>
                                        </li>
                                        <li class="{{ request()->routeIs('labor_companies.index') ? 'active' : '' }}">
                                            <a href="{{ url('/labor_companies') }}">{{ __('Labor Companies') }}</a>
                                        </li>
                                        <li class="{{ request()->routeIs('workunits.index') ? 'active' : '' }}">
                                            <a href="{{ url('/workunits') }}">{{ __('Work Units') }}</a>
                                        </li>
                                        <li class="{{ request()->routeIs('employee_shifts.index') ? 'active' : '' }}">
                                            <a href="{{ url('/employee_shifts') }}">{{ __('Employee Shifts') }}</a>
                                        </li>
                                        <li class="{{ request()->routeIs('place.index') ? 'active' : '' }}">
                                            <a href="{{ url('/place') }}">{{ __('Location') }}</a>
                                        </li>
                                        <li class="{{ request()->routeIs('jobtypes.index') ? 'active' : '' }}">
                                            <a href="{{ url('/jobtypes') }}">{{ __('Job Types') }}</a>
                                        </li>
                                        <li class="{{ request()->routeIs('banks.index') ? 'active' : '' }}">
                                            <a href="{{ url('/banks') }}">{{ __('Banks') }}</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <!-- Payroll Submenu -->
                        <li class="submenu {{ request()->routeIs('salary_setting.*') || request()->routeIs('setsalary.*') ? 'active subdrop' : '' }}">
                            <a href="javascript:void(0);" class="subdrop">
                                <i class="ti ti-file-description"></i>
                                <span class="submenu-title">{{ __('Payroll') }}</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul style="{{ request()->routeIs('salary_setting.*') || request()->routeIs('setsalary.*') ? 'display: block;' : 'display: none;' }}">
                                <li class="{{ request()->routeIs('salary_setting.index') ? 'active' : '' }}">
                                    <a href="{{ route('salary_setting.index') }}">{{ __('Salary Data Settings') }}</a>
                                </li>
                                <li class="{{ request()->routeIs('setsalary.index') ? 'active' : '' }}">
                                    <a href="{{ route('setsalary.index') }}">{{ __('Determine Salary') }}</a>
                                </li>
                            </ul>
                        </li>

                        <!-- Performance Submenu -->
                        <li class="submenu {{ request()->routeIs('indicator.*') || request()->routeIs('appraisal.*') || request()->routeIs('goaltracking.*') ? 'active subdrop' : '' }}">
                            <a href="javascript:void(0);" class="subdrop">
                                <i class="ti ti-chart-line"></i>
                                <span class="submenu-title">{{ __('Performance') }}</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul style="{{ request()->routeIs('indicator.*') || request()->routeIs('appraisal.*') || request()->routeIs('goaltracking.*') ? 'display: block;' : 'display: none;' }}">
                                <li class="{{ request()->routeIs('indicator.index') ? 'active' : '' }}">
                                    <a href="{{ route('indicator.index') }}">{{ __('Indicators') }}</a>
                                </li>
                                <li class="{{ request()->routeIs('appraisal.index') ? 'active' : '' }}">
                                    <a href="{{ route('appraisal.index') }}">{{ __('Appraisals') }}</a>
                                </li>
                                <li class="{{ request()->routeIs('goaltracking.index') ? 'active' : '' }}">
                                    <a href="{{ route('goaltracking.index') }}">{{ __('Goal Tracking') }}</a>
                                </li>
                            </ul>
                        </li>

                        <!-- Time Statement Submenu -->
                        <li class="submenu {{ request()->routeIs('employee_requests.*') || request()->routeIs('attendanceemployee.*') ? 'active subdrop' : '' }}">
                            <a href="javascript:void(0);" class="subdrop">
                                <i class="ti ti-clock"></i>
                                <span class="submenu-title">{{ __('Time Statement') }}</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul style="{{ request()->routeIs('employee_requests.*') || request()->routeIs('attendanceemployee.*') ? 'display: block;' : 'display: none;' }}">
                                <li class="{{ request()->routeIs('employee_requests.index') ? 'active' : '' }}">
                                    <a href="{{ route('employee_requests.index') }}">{{ __('Employee Request Management') }}</a>
                                </li>

                                <!-- Attendance Submenu -->
                                <li class="submenu {{ request()->routeIs('attendanceemployee.*') ? 'active subdrop' : '' }}">
                                    <a href="javascript:void(0);" class="subdrop">
                                        <i class="ti ti-box"></i>
                                        <span class="submenu-title">{{ __('Attendance') }}</span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <ul style="{{ request()->routeIs('attendanceemployee.*') ? 'display: block;' : 'display: none;' }}">
                                        <li class="{{ request()->routeIs('attendanceemployee.index') ? 'active' : '' }}">
                                            <a href="{{ route('attendanceemployee.index') }}">{{ __('Attendance History') }}</a>
                                        </li>
                                        <li class="{{ request()->routeIs('attendanceemployee.bulkattendance') ? 'active' : '' }}">
                                            <a href="{{ route('attendanceemployee.bulkattendance') }}">{{ __('Collective Attendance') }}</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <!-- Add more main menu items as needed -->
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->

<!-- JavaScript for Submenu Toggle -->

