<!-- Sidebar Menu -->
<div class="sidebar-inner slimscroll">
    <div id="sidebar-menu" class="sidebar-menu">
        <ul>
            <li class="menu-title"><span>{{ __('Main menu') }}</span></li>
            <li>
                <ul>
                    <li>
                        <a href="{{ route('home') }}" class="{{ request()->is('home') ? 'active' : '' }}">
                            <i class="ti ti-smart-home"></i><span>{{ __('Dashboard') }}</span>
                        </a>
                    </li>
                    <li class="submenu {{ request()->is('employee', 'timesheet', 'payslip.index') ? 'subdrop' : '' }}">
                        <a href="javascript:void(0);" class="subdrop">
                            <i class="ti ti-user-circle"></i>
                            <span class="submenu-title">{{ __('Employee') }}</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul style="display: {{ request()->is('employee', 'timesheet', 'payslip.index') ? 'block' : 'none' }}">
                            <li><a href="{{ url('/employee') }}" class="{{ request()->is('employee') ? 'active' : '' }}">{{ __('Employee') }}</a></li>
                            <li><a href="{{ url('/timesheet') }}" class="{{ request()->is('timesheet') ? 'active' : '' }}">{{ __('Timesheet') }}</a></li>
                            <li><a href="{{ route('payslip.index') }}" class="{{ request()->is('payslip.index') ? 'active' : '' }}">{{ __('Payslip List') }}</a></li>
                        </ul>
                    </li>
                    <li class="submenu {{ request()->is('salary_setting.index', 'setsalary.index') ? 'subdrop' : '' }}">
                        <a href="javascript:void(0);" class="subdrop">
                            <i class="ti ti-file-description"></i><span class="submenu-title">{{ __('Payroll') }}</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul style="display: {{ request()->is('salary_setting.index', 'setsalary.index') ? 'block' : 'none' }}">
                            <li><a href="{{ route('salary_setting.index') }}" class="{{ request()->is('salary_setting.index') ? 'active' : '' }}">{{ __('Salary Data Settings') }}</a></li>
                            <li><a href="{{ route('setsalary.index') }}" class="{{ request()->is('setsalary.index') ? 'active' : '' }}">{{ __('Determine Salary') }}</a></li>
                        </ul>
                    </li>
                    <li class="submenu {{ request()->is('indicator.index', 'appraisal.index', 'goaltracking.index') ? 'subdrop' : '' }}">
                        <a href="javascript:void(0);" class="subdrop">
                            <i class="ti ti-chart-line"></i><span class="submenu-title">{{ __('Performance') }}</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul style="display: {{ request()->is('indicator.index', 'appraisal.index', 'goaltracking.index') ? 'block' : 'none' }}">
                            <li><a href="{{ route('indicator.index') }}" class="{{ request()->is('indicator.index') ? 'active' : '' }}">{{ __('indicators') }}</a></li>
                            <li><a href="{{ route('appraisal.index') }}" class="{{ request()->is('appraisal.index') ? 'active' : '' }}">{{ __('Appraisals') }}</a></li>
                            <li><a href="{{ route('goaltracking.index') }}" class="{{ request()->is('goaltracking.index') ? 'active' : '' }}">{{ __('Goal Tracking') }}</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
