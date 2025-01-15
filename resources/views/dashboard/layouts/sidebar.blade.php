<!-- Sidebar -->
@php
    $logo=asset(Storage::url('uploads/logo/'));
    $company_logo=Utility::getValByName('company_logo');
    $company_small_logo=Utility::getValByName('company_small_logo');
    $profile=asset(Storage::url('uploads/avatar/'));
@endphp
<style>
    .sidebar-logo {
        display: flex; /* Enable flexbox */
        justify-content: center; /* Center horizontally */
        align-items: center; /* Center vertically */
        height: 100px; /* Adjust as needed to provide space for the logo */
        background-color: #ffffff; /* Optional: Add a background color */
        padding: 10px; /* Optional: Add padding for spacing */
        /*border-bottom: 1px solid #e0e0e0; !* Optional: Add a bottom border *!*/
        border-right: 1px solid #e0e0e0; /* Optional: Add a bottom border */
        z-index: 1;
    }

    .logo-img, .logo-img-small, .logo-img-dark {
        display: block; /* Ensure the image is treated as a block element */
        margin: 0 auto; /* Center the image horizontally */
    }

</style>

<div class="sidebar mb-4" id="sidebar">
    <!-- Logo Section -->
    <div class="sidebar-logo">
        <!-- Normal Logo -->
        <a href="{{ route('home') }}" class="logo logo-normal">

            <img style="width: auto;   height: 80px; object-fit: cover;" src="{{  $logo.'/'.\Auth::user()->id.'_logo.png' }}" alt="Logo" class="logo-img">
        </a>

        <!-- Small Logo -->
        <a href="{{ route('home') }}" class="logo-small">
            <img src="{{  $logo.'/'.\Auth::user()->id.'_logo.png' }}" alt="Logo" class="logo-img-small">
        </a>

        <!-- Dark Logo -->
        <a href="{{ route('home') }}" class="dark-logo">
            <img src="{{ $logo.'/'.\Auth::user()->id.'_logo.png' }}" alt="Logo" class="logo-img-dark">
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



    <!-- Sidebar Menu -->
    <div class="sidebar-inner slimscroll" style="margin: 5px;">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul >
{{--                 <li class="menu-title" ><span>{{ __('Main menu') }}</span></li>--}}
                <li>
                    <ul>
                        <li class="{{ Request::is('home')  ? 'active' : '' }}">
                            <a href="{{ route('home') }}">
                                <i class="ti ti-smart-home"></i><span>{{ __('Dashboard') }}</span>
                            </a>
                        </li>
                        @if(\Auth::user()->can('Manage User'))
                        <li class="submenu">
                            <a href="javascript:void(0);" class="subdrop {{ Request::is('user')|| Request::is('roles')|| Request::is('employee-profile')|| Request::is('lastlogin')    ? 'active' : '' }}">
                                <i class="ti ti-user-circle"></i>
                                <span class="submenu-title">{{ __('Users') }}</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul style="display: none;">
                                @if(\Auth::user()->can('Manage User'))
                                <li><a href="{{ url('/user') }}"  class="{{ Request::is('user') ?'active' :'' }}">{{ __('User') }}</a></li>
                                @endif
                                @if(\Auth::user()->can('Manage Role'))
                                <li><a href="{{ url('/roles') }}" class="{{ Request::is('roles') ?'active' :'' }}">{{ __('roles') }}</a></li>
                                @endif
                                @if(\Auth::user()->can('Manage Employee Profile'))

                                <li><a href="{{ url('/employee-profile') }}" class="{{ Request::is('employee-profile') ?'active' :'' }}">{{ __('Employee Profile') }}</a></li>
                                @endif
                                @if(\Auth::user()->can('Manage Employee Last Login'))

                                <li><a href="{{ url('/lastlogin') }}" class="{{ Request::is('lastlogin') ?'active' :'' }}">{{ __('Last Login') }}</a></li>
                                @endif
                            </ul>
                        </li>
                        @endif
                        @if(\Auth::user()->can('Manage Employee'))
                         <li class="submenu">
                            <a href="javascript:void(0);" class="subdrop {{ Request::is('employee')|| Request::is('attendancemovement')|| Request::is('salary_component_type')|| Request::is('holiday') || Request::is('timesheet')|| Request::is('request_types')  || Request::is('payslip') || Request::is('jobtitle')||Request::is('nationality') || Request::is('labor_companies') || Request::is('employee_shifts') || Request::is('place')|| Request::is('jobtypes') || Request::is('banks')  ? 'active' : '' }}">
                                <i class="ti ti-user-circle"></i>
                                <span class="submenu-title">{{ __('Employee') }}</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul style="display: none;">
                                @if(\Auth::user()->can('Manage Employee'))
                                <li><a href="{{ url('/employee') }}"  class="{{ Request::is('employee') ?'active' :'' }}">{{ __('Employee') }}</a></li>
                                @endif
                                @if(\Auth::user()->can('Manage TimeSheet'))
                                <li><a href="{{ url('/timesheet') }}" class="{{ Request::is('timesheet') ?'active' :'' }}">{{ __('Timesheet') }}</a></li>
                                @endif

                                <li class="submenu">
                                    <a href="javascript:void(0);" class="subdrop {{ Request::is('jobtitle')|| Request::is('attendancemovement')|| Request::is('salary_component_type')|| Request::is('holiday') || Request::is('nationality')|| Request::is('request_types') || Request::is('labor_companies') || Request::is('workunits') || Request::is('employee_shifts') || Request::is('place')|| Request::is('jobtypes') || Request::is('banks') ?'active' :'' }}">
                                        <i class="ti ti-user-circle"></i><span class="submenu-title">{{ __('Employee Setting') }}</span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    @if(\Auth::user()->can('Manage Employee'))
                                    <ul style="display: none;">

                                        <li><a href="{{ url('/jobtitle') }}" class="{{ Request::is('jobtitle') ?'active' :'' }}">{{ __('Job Titles') }}</a></li>

                                         <li><a href="{{ url('/nationality') }}" class="{{ Request::is('nationality') ?'active' :'' }}">{{ __('Nationality') }}</a></li>

                                         <li><a href="{{ url('/labor_companies') }}" class="{{ Request::is('labor_companies') ?'active' :'' }}">{{ __('labor_companies') }}</a></li>
                                         <li><a href="{{ url('/workunits') }}" class="{{ Request::is('workunits') ?'active' :'' }}">{{ __('workunits') }}</a></li>
                                         <li><a href="{{ url('/employee_shifts') }}" class="{{ Request::is('employee_shifts') ?'active' :'' }}">{{ __('employee_shifts') }}</a></li>
                                         <li><a href="{{ url('/place') }}" class="{{ Request::is('place') ?'active' :'' }}">{{ __('location') }}</a></li>
                                         <li><a href="{{ url('/jobtypes') }}" class="{{ Request::is('jobtypes') ?'active' :'' }}">{{ __('job_type') }}</a></li>
                                         <li><a href="{{ url('/banks') }}" class="{{ Request::is('banks') ?'active' :'' }}">{{ __('banks') }}</a></li>
                                         <li><a href="{{ url('/request_types') }}" class="{{ Request::is('request_types') ?'active' :'' }}">{{ __('request_types') }}</a></li>
                                         <li><a href="{{ url('/holiday') }}" class="{{ Request::is('holiday') ?'active' :'' }}">{{ __('holiday') }}</a></li>

                                         <li><a href="{{ url('/salary_component_type') }}" class="{{ Request::is('salary_component_type') ?'active' :'' }}">{{ __('salary_component_type') }}</a></li>

                                         <li><a href="{{ url('/attendancemovement') }}" class="{{ Request::is('attendancemovement') ?'active' :'' }}">{{ __('attendancemovement') }}</a></li>
                                     </ul>
                                    @endif
                                </li>
                            </ul>
                        </li>
                        @endif
                        @if(\Auth::user()->can('Manage Set Salary'))
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
                        @endif
                        @if(\Auth::user()->can('Manage Indicator') || \Auth::user()->can('Manage Appraisal') || \Auth::user()->can('Manage Goal Tracking') )
                        <li class="submenu">
                            <a href="javascript:void(0);" class="subdrop {{ Request::is('indicator') || Request::is('goaltracking') || Request::is('appraisal') ? 'active' : '' }}">
                                <i class="ti ti-chart-line"></i><span class="submenu-title">{{ __('Performance') }}</span>
                                <span class="menu-arrow"></span>
                            </a>
                        <ul style="display: none;">

                        @if(\Auth::user()->can('Manage Indicator'))
                        <li><a class="{{ Request::is('indicator') ?'active' :'' }}" href="{{ route('indicator.index') }}">{{ __('indicators') }}</a></li>
                            @endif
                        @if(\Auth::user()->can('Manage Appraisal'))
                        <li><a class="{{ Request::is('appraisal') ?'active' :'' }}" href="{{ route('appraisal.index') }}">{{ __('Appraisals') }}</a></li>
                            @endif
                        @if(\Auth::user()->can('Manage Goal Tracking'))
                        <li><a class="{{ Request::is('goaltracking') ?'active' :'' }}" href="{{ route('goaltracking.index') }}">{{ __('Goal Tracking') }}</a></li>
                            @endif
                        </ul>
                        </li>
                        @endif
                        @if(\Auth::user()->can('Manage Attendance'))
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
                        @endif
                        @if(\Auth::user()->can('Manage Training') ||\Auth::user()->can('Manage Trainer')  )
                        <li class="submenu">
                            <a href="javascript:void(0);" class="subdrop {{ Request::is('training') || Request::is('trainer')  ? 'active' : '' }}">
                                <i class="ti ti-activity"></i><span class="submenu-title">{{ __('Training') }}</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul style="display: none;">
                                @if(\Auth::user()->can('Manage Training'))
                                <li><a class="{{ Request::is('training') ?'active' :'' }}" href="{{ route('training.index') }}">{{ __('Training') }}</a></li>
                                @endif
                                @if(\Auth::user()->can('Manage Trainer'))

                                <li><a class="{{ Request::is('trainer') ?'active' :'' }}" href="{{ route('trainer.index') }}">{{ __('Trainer') }}</a></li>
                                    @endif
                            </ul>
                        </li>
                        @endif
                        @if(\Auth::user()->can('Manage Job Category') ||\Auth::user()->can('Manage Job')  )
                        <li class="submenu">
                            <a href="javascript:void(0);" class="subdrop {{ Request::is('job')  || Request::is('interview-schedule') || Request::is('custom-question') || Request::is('job-onboard') || Request::is('job.application.candidate')  ? 'active' : '' }}">
                                <i class="ti ti-shopping-bag"></i><span class="submenu-title">{{ __('Recruitment') }}</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul style="display: none;">
                                @if(\Auth::user()->can('Manage Job'))
                                <li><a class="{{ Request::is('job') ?'active' :'' }}" href="{{ route('job.index') }}">{{ __('Job') }}</a></li>
                                @endif
                                <li><a class="{{ Request::is('job-application/candidate') ?'active' :'' }}" href="{{ route('job.application.candidate') }}">{{ __('Job Application') }}</a></li>
                                <li><a class="{{ Request::is('job-onboard') ?'active' :'' }}" href="{{ route('job.on.board') }}">{{ __('Job On Board') }}</a></li>
                                <li><a class="{{ Request::is('custom-question') ?'active' :'' }}" href="{{ route('custom-question.index') }}">{{ __('Custom Question') }}</a></li>
                                <li><a class="{{ Request::is('interview-schedule') ?'active' :'' }}" href="{{ route('interview-schedule.index') }}">{{ __('Interview Schedule') }}</a></li>
                            </ul>
                        </li>
                        @endif
                        @if(\Auth::user()->can('Manage tasks'))
                        <li class="{{ Request::is('tasks')  ? 'active' : '' }}">
                            <a href="{{ route('tasks.index') }}">
                                <i class="ti ti-clock"></i><span>{{ __('tasks') }}</span>
                            </a>
                        </li>
                        @endif
                        @if(\Auth::user()->can('Manage Ticket'))
                        <li class="{{ Request::is('ticket')  ? 'active' : '' }}">
                            <a href="{{ route('ticket.index') }}">
                                <i class="ti ti-file-description"></i><span>{{ __('ticket') }}</span>
                            </a>
                        </li>
                        @endif
                        @if(\Auth::user()->can('Manage Event'))
                        <li class="{{ Request::is('event')  ? 'active' : '' }}">
                            <a href="{{ route('event.index') }}">
                                <i class="ti ti-calendar"></i><span>{{ __('event') }}</span>
                            </a>
                        </li>
                        @endif
                        @if(\Auth::user()->can('Manage Meeting'))
                        <li class="{{ Request::is('meeting')  ? 'active' : '' }}">
                            <a href="{{ route('meeting.index') }}">
                                <i class="ti ti-clock"></i><span>{{ __('meeting') }}</span>
                            </a>
                        </li>
                        @endif

                        <li class="{{ Request::is('zoom-meeting')  ? 'active' : '' }}">
                            <a href="{{ route('zoom-meeting.index') }}">
                                <i class="ti ti-video"></i><span>{{ __('zoom-meeting') }}</span>
                            </a>
                        </li>
                        @if(\Auth::user()->can('Manage Assets'))
                        <li class="{{ Request::is('account-assets')  ? 'active' : '' }}">
                            <a href="{{ route('account-assets.index') }}">
                                <i class="ti ti-calculator"></i><span>{{ __('account-assets') }}</span>
                            </a>
                        </li>
                        @endif
                        @if(\Auth::user()->can('Manage Document'))
                        <li class="{{ Request::is('document-upload')  ? 'active' : '' }}">
                            <a href="{{ route('document-upload.index') }}">
                                <i class="ti ti-file-description"></i><span>{{ __('Document') }}</span>
                            </a>
                        </li>
                        @endif
                        @if(\Auth::user()->can('Manage Company Policy'))
                        <li class="{{ Request::is('company-policy')  ? 'active' : '' }}">
                            <a href="{{ route('company-policy.index') }}">
                                <i class="ti ti-device-analytics    "></i><span>{{ __('Company Policy') }}</span>
                            </a>
                        </li>
                        @endif

                        <li class="submenu">
                            <a href="javascript:void(0);" class="subdrop {{ Request::is('branch')
                             || Request::is('Department')
                             || Request::is('designation')
                             || Request::is('document')
                             || Request::is('awardtype')
                             || Request::is('paysliptype')
                             || Request::is('allowanceoption')
                             || Request::is('loanoption')
                             || Request::is('deductionoption')
                             || Request::is('paymenttype')
                             || Request::is('leavetype')
                             || Request::is('terminationtype')
                             || Request::is('goaltype')
                             || Request::is('trainingtype')
                             || Request::is('job-category')
                             || Request::is('job-stage')
                             || Request::is('performanceType')
                             || Request::is('competencies')
                             ? 'active' : '' }}">
                                <i class="ti ti-shopping-bag"></i><span class="submenu-title">{{ __('constant') }}</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul style="display: none;">
                                <li><a class="{{ Request::is('branch') ?'active' :'' }}" href="{{ route('branch.index') }}">{{ __('Branch') }}</a></li>
                                <li><a class="{{ Request::is('department') ?'active' :'' }}" href="{{ route('department.index') }}">{{ __('Department') }}</a></li>
                                <li><a class="{{ Request::is('designation') ?'active' :'' }}" href="{{ route('designation.index') }}">{{ __('Designation') }}</a></li>
                                <li><a class="{{ Request::is('document') ?'active' :'' }}" href="{{ route('document.index') }}">{{ __('Document type') }}</a></li>
                                <li><a class="{{ Request::is('awardtype') ?'active' :'' }}" href="{{ route('awardtype.index') }}">{{ __('Award Type') }}</a></li>
                                <li><a class="{{ Request::is('paysliptype') ?'active' :'' }}" href="{{ route('paysliptype.index') }}">{{ __('Payslip Type') }}</a></li>
                                <li><a class="{{ Request::is('allowanceoption') ?'active' :'' }}" href="{{ route('allowanceoption.index') }}">{{ __('allowance option') }}</a></li>
                                <li><a class="{{ Request::is('loanoption') ?'active' :'' }}" href="{{ route('loanoption.index') }}">{{ __('loanoption') }}</a></li>
                                <li><a class="{{ Request::is('deductionoption') ?'active' :'' }}" href="{{ route('deductionoption.index') }}">{{ __('deduction option') }}</a></li>
                                <li><a class="{{ Request::is('paymenttype') ?'active' :'' }}" href="{{ route('paymenttype.index') }}">{{ __('payment type') }}</a></li>
                                <li><a class="{{ Request::is('leavetype') ?'active' :'' }}" href="{{ route('leavetype.index') }}">{{ __('leave type') }}</a></li>
                                <li><a class="{{ Request::is('terminationtype') ?'active' :'' }}" href="{{ route('terminationtype.index') }}">{{ __('termination type') }}</a></li>
                                <li><a class="{{ Request::is('goaltype') ?'active' :'' }}" href="{{ route('goaltype.index') }}">{{ __('goal type') }}</a></li>
                                <li><a class="{{ Request::is('trainingtype') ?'active' :'' }}" href="{{ route('trainingtype.index') }}">{{ __('training type') }}</a></li>
                                <li><a class="{{ Request::is('job-category') ?'active' :'' }}" href="{{ route('job-category.index') }}">{{ __('job category') }}</a></li>
                                <li><a class="{{ Request::is('job-stage') ?'active' :'' }}" href="{{ route('job-stage.index') }}">{{ __('job stage') }}</a></li>
                                <li><a class="{{ Request::is('performanceType') ?'active' :'' }}" href="{{ route('performanceType.index') }}">{{ __('Performance Type') }}</a></li>
                                <li><a class="{{ Request::is('competencies') ?'active' :'' }}" href="{{ route('competencies.index') }}">{{ __('competencies') }}</a></li>
                             </ul>
                        </li>
                        @if(\Auth::user()->can('Manage Report'))
                        <li class="submenu">
                            <a href="javascript:void(0);" class="subdrop {{ Request::is('report/monthly/attendance')
                            || Request::is('report/leave')
                            || Request::is('report/account-statement')
                            || Request::is('report/payroll')
                            || Request::is('report/timesheet')
                            ? 'active' : '' }}">
                                <i class="ti ti-exchange"></i><span class="submenu-title">{{ __('Report') }}</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul style="display: none;">
                                <li><a class="{{ Request::is('report/monthly/attendance') ?'active' :'' }}" href="{{ route('report.monthly.attendance') }}">{{ __('Monthly Attendance') }}</a></li>
                                <li><a class="{{ Request::is('report/leave') ?'active' :'' }}" href="{{ route('report.leave') }}">{{ __('report leave') }}</a></li>
                                <li><a class="{{ Request::is('report/account-statement') ?'active' :'' }}" href="{{ route('report.account.statement') }}">{{ __('report account statement') }}</a></li>
                                <li><a class="{{ Request::is('report/payroll') ?'active' :'' }}" href="{{ route('report.payroll') }}">{{ __('report payroll') }}</a></li>
                                <li><a class="{{ Request::is('report/timesheet') ?'active' :'' }}" href="{{ route('report.timesheet') }}">{{ __('report timesheet') }}</a></li>
                            </ul>
                        </li>
                        @endif
                        @if(\Auth::user()->can('Manage System Settings') || \Auth::user()->can('Manage Company Settings') )
                        <li class="{{ Request::is('settings')  ? 'active' : '' }}">
                            <a href="{{ route('settings.index') }}">
                                <i class="ti ti-device-analytics    "></i><span>{{ __('System Setting') }}</span>
                            </a>
                        </li>
                        @endif

                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->
