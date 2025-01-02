<!-- Sidebar Menu -->
<div class="sidebar-inner slimscroll">
    <div id="sidebar-menu" class="sidebar-menu">
        <ul>
            <li class="menu-title"><span>{{ __('Main menu') }}</span></li>
            <li>
                <ul>
                    <li><a href="{{ route('home') }}"><i class="ti ti-smart-home"></i><span>{{ __('Dashboard') }}</span></a></li>
                    <li class="submenu">
                        <a href="javascript:void(0);" class="subdrop">
                            <i class="ti ti-user-circle"></i><span class="submenu-title">{{ __('Employee') }}</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul style="display: none;">
                            <li><a href="{{ url('/employee') }}">{{ __('Employee') }}</a></li>
                            <li><a href="{{ url('/timesheet') }}">{{ __('Timesheet') }}</a></li>
                            <li><a href="{{ route('payslip.index') }}">{{ __('Payslip List') }}</a></li>
                            <li class="submenu">
                                <a href="javascript:void(0);" class="subdrop">
                                    <i class="ti ti-user-circle"></i><span class="submenu-title">{{ __('Employee Setting') }}</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul style="display: none;">
                                    <li><a href="{{ url('/jobtitle') }}">{{ __('Job Titles') }}</a></li>
                                    <li><a href="{{ url('/nationality') }}">{{ __('Nationality') }}</a></li>
                                    <li><a href="{{ url('/labor_companies') }}">{{ __('Labor Companies') }}</a></li>
                                    <li><a href="{{ url('/workunits') }}">{{ __('Work Units') }}</a></li>
                                    <li><a href="{{ url('/employee_shifts') }}">{{ __('Employee Shifts') }}</a></li>
                                    <li><a href="{{ url('/place') }}">{{ __('Location') }}</a></li>
                                    <li><a href="{{ url('/jobtypes') }}">{{ __('Job Types') }}</a></li>
                                    <li><a href="{{ url('/banks') }}">{{ __('Banks') }}</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li class="submenu">
                        <a href="javascript:void(0);" class="subdrop">
                            <i class="ti ti-file-description"></i><span class="submenu-title">{{ __('Payroll') }}</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul style="display: none;">
                            <li><a href="{{ route('salary_setting.index') }}">{{ __('Salary Data Settings') }}</a></li>
                            <li><a href="{{ route('setsalary.index') }}">{{ __('Determine Salary') }}</a></li>
                        </ul>
                    </li>

                    <li class="submenu">
                        <a href="javascript:void(0);" class="subdrop">
                            <i class="ti ti-chart-line"></i><span class="submenu-title">{{ __('Performance') }}</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul style="display: none;">
                            <li><a href="{{ route('indicator.index') }}">{{ __('Indicators') }}</a></li>
                            <li><a href="{{ route('appraisal.index') }}">{{ __('Appraisals') }}</a></li>
                            <li><a href="{{ route('goaltracking.index') }}">{{ __('Goal Tracking') }}</a></li>
                        </ul>
                    </li>

                    <li class="submenu">
                        <a href="javascript:void(0);" class="subdrop">
                            <i class="ti ti-clock"></i><span class="submenu-title">{{ __('Time Statement') }}</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul style="display: none;">
                            <li><a href="{{ route('employee_requests.index') }}">{{ __('Employee Request Management') }}</a></li>
                            <li class="submenu">
                                <a href="javascript:void(0);" class="subdrop">
                                    <i class="ti ti-box"></i><span class="submenu-title">{{ __('Attendance') }}</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul style="display: none;">
                                    <li><a href="{{ route('attendanceemployee.index') }}">{{ __('Attendance History') }}</a></li>
                                    <li><a href="{{ route('attendanceemployee.bulkattendance') }}">{{ __('Collective Attendance') }}</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
