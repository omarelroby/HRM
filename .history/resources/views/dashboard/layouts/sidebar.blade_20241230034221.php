	<!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <!-- Logo -->
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
        <!-- /Logo -->
        <div class="modern-profile p-3 pb-0">
            <div class="text-center rounded bg-light p-3 mb-4 user-profile">
                <div class="avatar avatar-lg online mb-3">
                    <img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-02.jpg" alt="Img" class="img-fluid rounded-circle">
                </div>
                <h6 class="fs-12 fw-normal mb-1">Adrian Herman</h6>
                <p class="fs-10">System Admin</p>
            </div>
            <div class="sidebar-nav mb-3">
                <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded nav-justified bg-transparent"
                    role="tablist">
                    <li class="nav-item"><a class="nav-link active border-0" href="#">Menu</a></li>
                    <li class="nav-item"><a class="nav-link border-0" href="https://smarthr.dreamstechnologies.com/html/template/chat.html">Chats</a></li>
                    <li class="nav-item"><a class="nav-link border-0" href="https://smarthr.dreamstechnologies.com/html/template/email.html">Inbox</a></li>
                </ul>
            </div>
        </div>
        <div class="sidebar-header p-3 pb-0 pt-2">
            <div class="text-center rounded bg-light p-2 mb-4 sidebar-profile d-flex align-items-center">
                <div class="avatar avatar-md onlin">
                    <img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-02.jpg" alt="Img" class="img-fluid rounded-circle">
                </div>
                <div class="text-start sidebar-profile-info ms-2">
                    <h6 class="fs-12 fw-normal mb-1">Adrian Herman</h6>
                    <p class="fs-10">System Admin</p>
                </div>
            </div>
            <div class="input-group input-group-flat d-inline-flex mb-4">
                <span class="input-icon-addon">
                    <i class="ti ti-search"></i>
                </span>
                <input type="text" class="form-control" placeholder="Search in HRMS">
                <span class="input-group-text">
                    <kbd>CTRL + / </kbd>
                </span>
            </div>
            <div class="d-flex align-items-center justify-content-between menu-item mb-3">
                <div class="me-3">
                    <a href="https://smarthr.dreamstechnologies.com/html/template/calendar.html" class="btn btn-menubar">
                        <i class="ti ti-layout-grid-remove"></i>
                    </a>
                </div>
                <div class="me-3">
                    <a href="https://smarthr.dreamstechnologies.com/html/template/chat.html" class="btn btn-menubar position-relative">
                        <i class="ti ti-brand-hipchat"></i>
                        <span class="badge bg-info rounded-pill d-flex align-items-center justify-content-center header-badge">5</span>
                    </a>
                </div>
                <div class="me-3 notification-item">
                    <a href="https://smarthr.dreamstechnologies.com/html/template/activity.html" class="btn btn-menubar position-relative me-1">
                        <i class="ti ti-bell"></i>
                        <span class="notification-status-dot"></span>
                    </a>
                </div>
                <div class="me-0">
                    <a href="https://smarthr.dreamstechnologies.com/html/template/email.html" class="btn btn-menubar">
                        <i class="ti ti-message"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="menu-title"><span>{{ __('Main menu') }}</span></li>
                    <li>
                        <ul>
                            <li  >
                                <a href="{{ route('home') }}">
                                    <i class="ti ti-smart-home"></i><span>{{ __('Dashboard') }}</span>
                                </a>
                            </li>
                            <li  >
                                <a href="{{ url('/employee') }}">
                                    <i class="ti ti-smart-home"></i><span>{{ __('Employee') }}</span>
                                </a>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);" class="subdrop">
                                    <i class="ti ti-box"></i><span>{{ __('Payroll') }}</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul style="display: none;"> <!-- Initially hidden -->
                                    <li><a href="{{ route('salary_setting.index') }}">{{ __('Salary data settings') }}</a></li>
                                    <li><a href="{{ route('setsalary.index') }}">{{ __('Determine the salary') }}</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);" class="subdrop">
                                    <i class="ti ti-box"></i><span>{{ __('Performance') }}</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul style="display: none;"> <!-- Initially hidden -->
                                    <li><a href="{{ route('salary_setting.index') }}">{{ __('Salary data settings') }}</a></li>
                                    <li><a href="{{ route('setsalary.index') }}">{{ __('Determine the salary') }}</a></li>
                                    <li><a href="{{ route('setsalary.index') }}">{{ __('Determine the salary') }}</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);" class="subdrop">
                                    <i class="ti ti-box"></i><span>{{ __('Time statement') }}</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul style="display: none;"> <!-- Initially hidden -->
                                    <li><a href="{{ route('employee_requests.index') }}">{{ __('Employee Request Management') }}</a></li>
                                    <li class="submenu">
                                        <a href="javascript:void(0);" class="subdrop">
                                            <i class="ti ti-box"></i><span>{{ __('attendance') }}</span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <ul style="display: none;"> <!-- Initially hidden -->
                                            <li><a href="{{ route('attendanceemployee.index') }}">{{ __('Attendance that was taught') }}</a></li>
                                            <li><a href="{{ route('attendanceemployee.bulkattendance') }}">{{ __('Collective attendance') }}</a></li>

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
