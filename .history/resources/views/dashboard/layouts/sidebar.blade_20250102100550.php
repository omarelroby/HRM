<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <!-- Logo Section -->
    <div class="sidebar-logo">
        <a href="https://smarthr.dreamstechnologies.com/html/template/index.html" class="logo logo-normal">
            <img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/logo.svg" alt="Logo">
        </a>
        <a href="https://smarthr.dreamstechnologies.com/html/template/index.html" class="logo-small">
            <img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/logo-small.svg" alt="Logo">
        </a>
        <a href="https://smarthr.dreamstechnologies.com/html/template/index.html" class="dark-logo">
            <img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/logo-white.svg" alt="Logo">
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
            <ul>
                <li class="menu-title"><span>{{ __('Main menu') }}</span></li>
                <li>
                    <ul>
                        <li>
                            <a href="{{ route('home') }}">
                                <i class="ti ti-smart-home"></i><span>{{ __('Dashboard') }}</span>
                            </a>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);" class="subdrop {{ Request::is('employee') || Request::is('timesheet') || Request::is('payslip') || Request::is('jobtitle')||Request::is('nationality') || Request::is('labor_companies') || Request::is('employee_shifts') || Request::is('place')|| Request::is('jobtypes') || Request::is('banks')  ? 'active' : '' }}">
                                <i class="ti ti-user-circle"></i>
                                <span class="submenu-title">{{ __('Employee') }}</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul style="display: none;">
                                <li><a href="{{ url('/employee') }}"  class="{{ Request::is('employee') ?'active' :'' }}">{{ __('Employee') }}</a></li>
                                <li><a href="{{ url('/timesheet') }}" class="{{ Request::is('timesheet') ?'active' :'' }}">{{ __('Timesheet') }}</a></li>
                                <li><a href="{{ route('payslip.index') }}" class="{{ Request::is('payslip') ?'active' :'' }}">{{ __('Payslip List') }}</a></li>
                                <li class="submenu">
                                    <a href="javascript:void(0);" class="subdrop {{ Request::is('jobtitle') || Request::is('nationality') || Request::is('labor_companies') || Request::is('nationality')   ?'active' :'' }}">
                                        <i class="ti ti-user-circle"></i><span class="submenu-title">{{ __('Employee Setting') }}</span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <ul style="display: none;">
                                        <li><a href="{{ url('/jobtitle') }}" class="{{ Request::is('jobtitle') ?'active' :'' }}">{{ __('Job Titles') }}</a></li>
                                        <li><a href="{{ url('/nationality') }}" class="{{ Request::is('nationality') ?'active' :'' }}">{{ __('Nationality') }}</a></li>
                                        <li><a href="{{ url('/labor_companies') }}" class="{{ Request::is('labor_companies') ?'active' :'' }}">{{ __('labor_companies') }}</a></li>
                                        <li><a href="{{ url('/workunits') }}" class="{{ Request::is('workunits') ?'active' :'' }}">{{ __('workunits') }}</a></li>
                                        <li><a href="{{ url('/employee_shifts') }}" class="{{ Request::is('employee_shifts') ?'active' :'' }}">{{ __('employee_shifts') }}</a></li>
                                        <li><a href="{{ url('/place') }}" class="{{ Request::is('place') ?'active' :'' }}">{{ __('location') }}</a></li>
                                        <li><a href="{{ url('/jobtypes') }}" class="{{ Request::is('jobtypes') ?'active' :'' }}">{{ __('job_type') }}</a></li>
                                        <li><a href="{{ url('/banks') }}" class="{{ Request::is('banks') ?'active' :'' }}">{{ __('banks') }}</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <li class="submenu">
                            <a href="javascript:void(0);" class="subdrop {{ Request::is('salary_setting') || Request::is('setsalary') ? 'active' : '' }}">
                                <i class="ti ti-file-description"></i><span class="submenu-title">{{ __('Payroll') }}</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul style="display: none;">
                                <li><a href="{{ route('salary_setting.index') }}"  class="{{ Request::is('salary_setting') ?'active' :'' }}">{{ __('Salary Data Settings') }}</a></li>
                                <li><a href="{{ route('setsalary.index') }}"  class="{{ Request::is('setsalary') ?'active' :'' }}">{{ __('Determine Salary') }}</a></li>
                            </ul>
                        </li>

                        <li class="submenu">
                            <a href="javascript:void(0);" class="subdrop {{ Request::is('indicator') || Request::is('goaltracking') || Request::is('appraisal') ? 'active' : '' }}">
                                <i class="ti ti-chart-line"></i><span class="submenu-title">{{ __('Performance') }}</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul style="display: none;">
                                <li><a class="{{ Request::is('indicator') ?'active' :'' }}" href="{{ route('indicator.index') }}">{{ __('indicators') }}</a></li>
                                <li><a class="{{ Request::is('appraisal') ?'active' :'' }}" href="{{ route('appraisal.index') }}">{{ __('Appraisals') }}</a></li>
                                <li><a class="{{ Request::is('goaltracking') ?'active' :'' }}" href="{{ route('goaltracking.index') }}">{{ __('Goal Tracking') }}</a></li>
                            </ul>
                        </li>

                        <li class="submenu">
                            <a href="javascript:void(0);" class="subdrop {{ Request::is('employee_requests') || Request::is('attendanceemployee') || Request::is('attendanceemployee/bulkattendance') ? 'active' : '' }}">
                                <i class="ti ti-clock"></i><span class="submenu-title">{{ __('Time Statement') }}</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul style="display: none;">
                                <li><a class="{{ Request::is('employee_requests') ?'active' :'' }}" href="{{ route('employee_requests.index') }}">{{ __('Employee Request Management') }}</a></li>
                                <li class="submenu">
                                    <a href="javascript:void(0);" class="subdrop {{ Request::is('attendanceemployee') || Request::is('attendanceemployee/bulkattendance')  ?'active' :'' }}">
                                        <i class="ti ti-box"></i><span class="submenu-title">{{ __('Attendance') }}</span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <ul style="display: none;">
                                        <li><a class="{{ Request::is('attendanceemployee') ?'active' :'' }}" href="{{ route('attendanceemployee.index') }}">{{ __('Attendance History') }}</a></li>
                                        <li><a class="{{ Request::is('attendanceemployee/bulkattendance') ?'active' :'' }}" href="{{ route('attendanceemployee.bulkattendance') }}">{{ __('Collective attendance') }}</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->
