@php
    $logo=asset(Storage::url('uploads/logo/'));
    $company_logo=Utility::getValByName('company_logo');
    $company_small_logo=Utility::getValByName('company_small_logo');
    $profile=asset(Storage::url('uploads/avatar/'));
@endphp

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">

                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <img alt="image" width="100" class="rounded-circle" src="{{ \Auth::user()->avatar ? $profile.'/'.\Auth::user()->avatar : $profile.'/avatar.png'}}"/>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="block m-t-xs font-bold">{{\Auth::user()->name}}</span>
                            <span class="text-muted text-xs block"> {{ \Auth::user()->type }} <b class="caret"></b></span>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a class="dropdown-item" href="{{route('profile')}}">{{__('My profile')}}</a></li>
                            <li class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">{{__('Logout')}}</a></li>
                            <form id="frm-logout" action="{{ route('logout') }}" method="POST" class="d-none">
                                {{ csrf_field() }}
                            </form>
                        </ul>
                    </div>
                    <div class="logo-element">
                        LOGO
                    </div>
                </li>

                <li class="{{active_link('home')}}">
                    <a href="{{ route('home') }}"><i class="fa fa-tachometer-alt"></i>
                    <span class="nav-label">{{ __('Dashboard') }}</span>
                    <span class="fa arrow"></span></a>
                </li>

                @if(\Auth::user()->type == 'company')
                    <li class="{{active_link('companystructure')}} {{active_link('companytree')}}">
                        <a href="{{ route('companystructure.index') }}">
                            <i class="fa fa-shield"></i>
                            <span class="nav-label"> {{ __('Structure list') }} </span>
                            <span class="fa arrow"></span>
                        </a>
                    </li>
                @endif

                @if(\Auth::user()->type=='super admin')
                    <li class="{{active_link('user')}}">
                        <a href="{{ route('user.index') }}">
                            <i class="fa fa-user"></i>
                            <span class="nav-label">{{ __('Company') }}</span>
                            <span class="fa arrow"></span></a>
                        </a>
                    </li>
                @else
                    @if( Gate::check('Manage User') || Gate::check('Manage Role') || Gate::check('Manage Employee Profile')  || Gate::check('Manage Employee Last Login'))
                        <li class="{{active_link('user')}} {{active_link('roles')}} {{active_link('employee-profile')}} {{active_link('lastlogin')}} ">
                            <a href="#"><i class="fa fa-columns"></i>
                                <span class="nav-label"> {{ __('Staff') }}</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level collapse">
                                @can('Manage User')
                                    <li class="{{active_link('user')}}">
                                        <a href="{{ route('user.index') }}" >
                                            <span class="nav-label"> {{ __('User') }}</span>
                                        </a>
                                    </li>
                                @endcan

                                @can('Manage Role')
                                    <li class="{{active_link('roles')}}">
                                        <a href="{{ route('roles.index') }}" >
                                            <span class="nav-label"> {{ __('Role') }}</span>
                                        </a>
                                    </li>
                                @endcan

                                @can('Manage Employee Profile')
                                    <li class="{{active_link('employee-profile')}}">
                                        <a href="{{ route('employee.profile') }}" >
                                            <span class="nav-label"> {{ __('Employee Profile') }}</span>
                                        </a>
                                    </li>
                                @endcan
                                @can('Manage Employee Last Login')
                                    <li class="{{active_link('lastlogin')}}">
                                        <a href="{{ route('lastlogin') }}">
                                            <span class="nav-label"> {{ __('Last Login') }}</span>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endif
                @endif

                @if(Gate::check('Manage Employee'))
                    @if(\Auth::user()->type =='employee')
                        @php
                            $employee=App\Models\Employee::where('user_id',\Auth::user()->id)->first();
                        @endphp
                        <li class="{{active_link('employee')}}">
                            <a href="{{route('employee.show',\Illuminate\Support\Facades\Crypt::encrypt($employee->id))}}" >
                                <i class="fa fa-users"></i>
                                <span class="nav-label"> {{ __('Employee') }}</span>
                                <span class="fa arrow"></span></a>
                            </a>
                        </li>
                    @else
                        <li class="{{active_link('employee')}} {{active_link('timesheet')}} {{active_link('payslip')}} {{active_link('jobtitle')}} {{active_link('category')}} {{active_link('nationality')}}
                            {{active_link('labor_companies')}}{{active_link('workunits')}}{{active_link('employee_shifts')}}{{active_link('jobtypes')}} {{active_link('banks')}}{{active_link('request_types')}}
                            {{active_link('salary_component_type')}}{{active_link('attendancemovement')}}{{active_link('holiday')}}{{active_link('place')}}">
                            <a href="#">
                                <i class="fa fa-users"></i>
                                <span class="nav-label"> {{ __('Employee') }}</span>
                                <span class="fa arrow"></span>
                            </a>

                            <ul class="nav flex-column submenu-ul">

                                <li class="{{active_link('jobtitle')}} {{active_link('category')}} {{active_link('nationality')}}{{active_link('labor_companies')}}
                                {{active_link('workunits')}}{{active_link('employee_shifts')}}{{active_link('jobtypes')}}{{active_link('banks')}}{{active_link('request_types')}}
                                {{active_link('salary_component_type')}}{{active_link('attendancemovement')}}{{active_link('holiday')}}{{active_link('place')}}">
                                    <a href="#" id="damian">
                                        {{ __('Employee Setting') }}
                                        <span class="fa arrow"></span>
                                    </a>

                                    <ul class="nav nav-third-level">
                                        <li class="{{active_link('jobtitle')}}">
                                            <a href="{{ route('jobtitle.index') }}">{{ __('Job Titles') }}</a>
                                        </li>

                                        <!-- <li class="{{active_link('category')}}">
                                            <a href="{{ route('category.index') }}">{{ __('Categories') }}</a>
                                        </li> -->

                                        <li class="{{active_link('nationality')}}">
                                            <a href="{{ route('nationality.index') }}">{{ __('Nationality') }}</a>
                                        </li>

                                        <li class="{{active_link('labor_companies')}}">
                                            <a href="{{ route('labor_companies.index') }}">{{ __('labor_companies') }}</a>
                                        </li>

                                        <li class="{{active_link('workunits')}}">
                                            <a href="{{ route('workunits.index') }}">{{ __('workunits') }}</a>
                                        </li>

                                        <li class="{{active_link('employee_shifts')}}">
                                            <a href="{{ route('employee_shifts.index') }}">{{ __('employee_shifts') }}</a>
                                        </li>

                                        <li class="{{active_link('place')}}">
                                            <a href="{{ route('place.index') }}">{{ __('Location') }}</a>
                                        </li>

                                        <li class="{{active_link('jobtypes')}}">
                                            <a href="{{ route('jobtypes.index') }}">{{ __('jobtypes') }}</a>
                                        </li>

                                        <li class="{{active_link('banks')}}">
                                            <a href="{{ route('banks.index') }}">{{ __('banks') }}</a>
                                        </li>

                                        <li class="{{active_link('request_types')}}">
                                            <a href="{{ route('request_types.index') }}">{{ __('Request Type') }}</a>
                                        </li>

                                        @can('Manage Holiday')
                                            <li class="{{active_link('holiday')}}">
                                                <a href="{{ route('holiday.index') }}" >
                                                    <span class="nav-label"> {{ __('Holidays') }} </span>
                                                </a>
                                            </li>
                                        @endcan

                                        <li class="{{active_link('salary_component_type')}}">
                                            <a href="{{ route('salary_component_type.index') }}">{{ __('Salary components types') }}</a>
                                        </li>

                                        <li class="{{active_link('attendancemovement')}}">
                                            <a href="{{ route('attendancemovement.index') }}">{{ __('Attendance Movement') }}</a>
                                        </li>

                                    </ul>
                                </li>

                                <li class="{{active_link('employee')}}">
                                    <a href="{{ route('employee.index') }}" >
                                        <span class="nav-label"> {{ __('Employee List') }}</span>
                                    </a>
                                </li>

                                @can('Manage TimeSheet')
                                    <li class="{{active_link('timesheet')}}">
                                        <a href="{{ route('timesheet.index') }}" >
                                            <span class="nav-label"> {{ __('Timesheet List') }}</span>
                                        </a>
                                    </li>
                                @endcan

                                <li class="{{active_link('payslip')}}">
                                    <a href="{{ route('payslip.index') }}" >
                                        <span class="nav-label"> {{ __('Payslip List') }}</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif
                @endif

                @if(Gate::check('Manage Set Salary') || Gate::check('Manage Pay Slip'))
                    <li class="{{active_link('salary_setting')}} {{active_link('setsalary')}}">
                        <a href="#">
                            <i class="fa fa-table"></i>
                            <span class="nav-label"> {{ __('Payroll') }}</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level collapse">
                            <li class="{{active_link('salary_setting')}}">
                                <a href="{{ route('salary_setting.index') }}" >
                                    <span class="nav-label"> {{ __('salary_setting') }}</span>
                                </a>
                            </li>

                            <li class="{{active_link('setsalary')}}">
                                <a href="{{ route('setsalary.index') }}" >
                                    <span class="nav-label"> {{ __('Set Salary') }}</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif


                @if(\Auth::user()->type == 'employee')
                    <li class="{{active_link('setsalary')}} {{active_link('payslip')}}">
                        <a href="#">
                            <i class="fa fa-receipt"></i>
                            <span class="nav-label"> {{ __('Payroll') }}</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level collapse">
                            <li class="{{active_link('setsalary')}}">
                                <a href="{{ route('setsalary.show',\Auth::user()->id) }}" >
                                    <span class="nav-label"> {{ __('Set Salary') }}</span>
                                </a>
                            </li>

                            <li class="{{active_link('payslip')}}">
                                <a href="{{ route('payslip.index') }}" >
                                    <span class="nav-label"> {{ __('Payslip') }}</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

                @if(Gate::check('Manage Attendance') || Gate::check('Manage Leave') || Gate::check('Manage TimeSheet'))
                    <li class="{{active_link('leave')}} {{active_link('attendanceemployee')}} {{active_link('bulkattendance')}}{{active_link('employee_requests')}}">
                        <a href="#">
                            <i class="fa fa-clock-o"></i>
                            <span class="nav-label">{{ __('Timesheet') }}</span>
                            <span class="fa arrow"></span>
                        </a>

                        <ul class="nav flex-column submenu-ul">

                            <!-- @can('Manage Leave')
                                <li class="{{active_link('leave')}}">
                                    <a href="{{ route('leave.index') }}" >
                                        <span class="nav-label"> {{ __('Manage Leave') }}</span>
                                    </a>
                                </li>
                            @endcan -->

                            @can('Manage Leave')
                                <li class="{{active_link('employee_requests')}}">
                                    <a href="{{ route('employee_requests.index') }}" >
                                        <span class="nav-label"> {{ __('Manage employee request') }}</span>
                                    </a>
                                </li>
                            @endcan

                            @can('Manage Attendance')
                                <li class="{{active_link('attendanceemployee')}} {{active_link('bulkattendance')}}">
                                    <a href="#" id="damian">
                                        <i class="fa fa-flag-checkered"></i>
                                        {{ __('Attendance') }}
                                        <span class="fa arrow"></span>
                                    </a>

                                    <ul class="nav nav-third-level">
                                        <li class="{{active_link('attendanceemployee')}}">
                                            <a href="{{ route('attendanceemployee.index') }}">{{__('Marked Attendance')}}</a>
                                        </li>

                                        @can('Create Attendance')
                                            <li class="{{active_link('attendanceemployee' , 'bulkattendance')}}">
                                                <a href="{{ route('attendanceemployee.bulkattendance') }}">{{__('Bulk Attendance')}}</a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endif

                <!-- @if(Gate::check('Manage Attendance'))
                    <li class="{{active_link('home')}}">
                        <a href="#">
                            <i class="fa fa-receipt"></i>
                            <span class="nav-label"> {{ __('empAttendance') }} </span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level collapse">
                            @can('Manage Attendance')
                                <li class="{{active_link('home')}}">
                                    <a href="{{ route('setsalary.show',\Auth::user()->id) }}" >
                                        <span class="nav-label"> {{ __('empAttendance') }}</span>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endif -->

                @if(Gate::check('Manage Indicator') || Gate::check('Manage Appraisal') || Gate::check('Manage Goal Tracking'))
                    <li class="{{active_link('indicator')}} {{active_link('appraisal')}} {{active_link('goaltracking')}}">
                        <a href="#">
                            <i class="fa fa-cube"></i>
                            <span class="nav-label"> {{ __('Performance') }} </span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level collapse">
                            @can('Manage Indicator')
                                <li class="{{active_link('indicator')}}">
                                    <a href="{{ route('indicator.index') }}" >
                                        <span class="nav-label"> {{ __('Indicator') }} </span>
                                    </a>
                                </li>
                            @endcan

                            @can('Manage Appraisal')
                                <li class="{{active_link('appraisal')}}">
                                    <a href="{{ route('appraisal.index') }}" >
                                        <span class="nav-label"> {{ __('Appraisal') }}</span>
                                    </a>
                                </li>
                            @endcan

                            @can('Manage Goal Tracking')
                                <li class="{{active_link('goaltracking')}}">
                                    <a href="{{ route('goaltracking.index') }}" >
                                        <span class="nav-label"> {{ __('Goal Tracking') }}</span>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endif

                <!-- @if(Gate::check('Manage Account List') || Gate::check('Manage Payee')  || Gate::check('Manage Payer')  || Gate::check('Manage Deposit') || Gate::check('Manage Expense') || Gate::check('Manage Transfer Balance'))
                    <li class="{{active_link('accountlist')}} {{active_link('accountbalance')}} {{active_link('payees')}}  {{active_link('payer')}} {{active_link('deposit')}}  {{active_link('expense')}} {{active_link('transferbalance')}}">
                        <a href="#">
                            <i class="fa fa-money"></i>
                            <span class="nav-label"> {{ __('Finance') }} </span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level collapse">
                            @can('Manage Account List')
                                <li class="{{active_link('accountlist')}}">
                                    <a href="{{ route('accountlist.index') }}" >
                                        <span class="nav-label"> {{ __('Account List') }} </span>
                                    </a>
                                </li>
                            @endcan

                            @can('View Balance Account List')
                                <li class="{{active_link('accountbalance')}}">
                                    <a href="{{ route('accountbalance') }}" >
                                        <span class="nav-label"> {{ __('Account Balance') }} </span>
                                    </a>
                                </li>
                            @endcan

                            @can('Manage Payee')
                                <li class="{{active_link('payees')}}">
                                    <a href="{{ route('payees.index') }}" >
                                        <span class="nav-label"> {{ __('Payees') }} </span>
                                    </a>
                                </li>
                            @endcan

                            @can('Manage Payer')
                                <li class="{{active_link('payer')}}">
                                    <a href="{{ route('payer.index') }}" >
                                        <span class="nav-label"> {{ __('Payers') }}</span>
                                    </a>
                                </li>
                            @endcan

                            @can('Manage Deposit')
                                <li class="{{active_link('deposit')}}">
                                    <a href="{{ route('deposit.index') }}" >
                                        <span class="nav-label"> {{ __('Deposit') }} </span>
                                    </a>
                                </li>
                            @endcan

                            @can('Manage Expense')
                                <li class="{{active_link('expense')}}">
                                    <a href="{{ route('expense.index') }}" >
                                        <span class="nav-label"> {{ __('Expense') }} </span>
                                    </a>
                                </li>
                            @endcan

                            @can('Manage Transfer Balance')
                                <li class="{{active_link('transferbalance')}}">
                                    <a href="{{ route('transferbalance.index') }}" >
                                        <span class="nav-label"> {{ __('Transfer Balance') }} </span>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endif -->

                @if(Gate::check('Manage Trainer') || Gate::check('Manage Training'))
                    <li class="{{active_link('training')}} {{active_link('trainer')}}">
                        <a href="#">
                            <i class="fa fa-graduation-cap"></i>
                            <span class="nav-label"> {{ __('Training') }} </span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level collapse">
                            @can('Manage Training')
                                <li class="{{active_link('training')}}">
                                    <a href="{{ route('training.index') }}" >
                                        <span class="nav-label"> {{ __('Training List') }} </span>
                                    </a>
                                </li>
                            @endcan

                            @can('Manage Trainer')
                                <li class="{{active_link('trainer')}}">
                                    <a href="{{ route('trainer.index') }}" >
                                        <span class="nav-label"> {{ __('Trainer') }} </span>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endif

                <!-- @if(Gate::check('Manage Awards') || Gate::check('Manage Transfer') || Gate::check('Manage Resignation')  || Gate::check('Manage Travels') || Gate::check('Manage Promotion') || Gate::check('Manage Complaint')|| Gate::check('Manage Warning') || Gate::check('Manage Termination') || Gate::check('Manage Announcement') || Gate::check('Manage Holiday'))
                    <li class="{{active_link('award')}} {{active_link('transfer')}}{{active_link('resignation')}}
                                {{active_link('travel')}}{{active_link('promotion')}}{{active_link('complaint')}}{{active_link('warning')}}
                                {{active_link('termination')}}{{active_link('announcement')}}{{active_link('holiday')}}">
                        <a href="#">
                            <i class="fa fa-cogs"></i>
                            <span class="nav-label"> {{ __('HR') }} </span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level collapse">
                            @can('Manage Award')
                                <li class="{{active_link('award')}}">
                                    <a href="{{ route('award.index') }}" >
                                        <span class="nav-label"> {{ __('Award') }} </span>
                                    </a>
                                </li>
                            @endcan

                            @can('Manage Transfer')
                                <li class="{{active_link('transfer')}}">
                                    <a href="{{ route('transfer.index') }}" >
                                        <span class="nav-label"> {{ __('Transfer') }} </span>
                                    </a>
                                </li>
                            @endcan

                            @can('Manage Resignation')
                                <li class="{{active_link('resignation')}}">
                                    <a href="{{ route('resignation.index') }}" >
                                        <span class="nav-label"> {{ __('Resignation') }} </span>
                                    </a>
                                </li>
                            @endcan

                            @can('Manage Travel')
                                <li class="{{active_link('travel')}}">
                                    <a href="{{ route('travel.index') }}" >
                                        <span class="nav-label"> {{ __('Trip') }} </span>
                                    </a>
                                </li>
                            @endcan

                            @can('Manage Promotion')
                                <li class="{{active_link('promotion')}}">
                                    <a href="{{ route('promotion.index') }}" >
                                        <span class="nav-label"> {{ __('Promotion') }} </span>
                                    </a>
                                </li>
                            @endcan

                            @can('Manage Complaint')
                                <li class="{{active_link('complaint')}}">
                                    <a href="{{ route('complaint.index') }}" >
                                        <span class="nav-label"> {{ __('Complaints') }} </span>
                                    </a>
                                </li>
                            @endcan

                            @can('Manage Warning')
                                <li class="{{active_link('warning')}}">
                                    <a href="{{ route('warning.index') }}" >
                                        <span class="nav-label"> {{ __('Warning') }} </span>
                                    </a>
                                </li>
                            @endcan

                            @can('Manage Termination')
                                <li class="{{active_link('termination')}}">
                                    <a href="{{ route('termination.index') }}" >
                                        <span class="nav-label"> {{ __('Termination') }} </span>
                                    </a>
                                </li>
                            @endcan

                            @can('Manage Announcement')
                                <li class="{{active_link('announcement')}}">
                                    <a href="{{ route('announcement.index') }}" >
                                        <span class="nav-label"> {{ __('Announcement') }} </span>
                                    </a>
                                </li>
                            @endcan

                            @can('Manage Holiday')
                                <li class="{{active_link('holiday')}}">
                                    <a href="{{ route('holiday.index') }}" >
                                        <span class="nav-label"> {{ __('Holidays') }} </span>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endif -->

                @if(Gate::check('Manage Job') || Gate::check('Manage Job Application')|| Gate::check('Manage Job OnBoard') || Gate::check('Manage Custom Question') || Gate::check('Manage Interview Schedule') )
                    <li class="{{active_link('job')}} {{active_link('job-application')}} {{active_link('job-onboard')}}
                               {{active_link('custom-question')}} {{active_link('interview-schedule')}}">
                        <a href="#">
                            <i class="fa fa-user-md"></i>
                            <span class="nav-label"> {{ __('Recruitment') }} </span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level collapse">
                            @can('Manage Job')
                                <li class="{{active_link('job')}}">
                                    <a href="{{ route('job.index') }}" >
                                        <span class="nav-label"> {{ __('Jobs') }} </span>
                                    </a>
                                </li>
                            @endcan

                            @can('Manage Job Application')
                                <li class="{{active_link('job-application')}}">
                                    <a href="{{ route('job.application.candidate') }}">
                                        <span class="nav-label"> {{ __('Job Application') }} </span>
                                    </a>
                                </li>
                            @endcan

                            @can('Manage Job OnBoard')
                                <li class="{{active_link('job-onboard')}}">
                                    <a href="{{ route('job.on.board') }}" >
                                        <span class="nav-label"> {{ __('Job OnBoard') }} </span>
                                    </a>
                                </li>
                            @endcan

                            @can('Manage Custom Question')
                                <li class="{{active_link('custom-question')}}">
                                    <a href="{{ route('custom-question.index') }}" >
                                        <span class="nav-label"> {{ __('Custom Question') }} </span>
                                    </a>
                                </li>
                            @endcan

                            @can('Manage Interview Schedule')
                                <li class="{{active_link('interview-schedule')}}">
                                    <a href="{{ route('interview-schedule.index') }}" >
                                        <span class="nav-label"> {{ __('Interview Schedule') }} </span>
                                    </a>
                                </li>
                            @endcan

                            <!-- @can('Manage Career')
                                <li class="{{active_link('home')}}">
                                    <a href="{{ route('career',[\Auth::user()->creatorId(),'en']) }}" >
                                        <span class="nav-label"> {{ __('Career') }} </span>
                                    </a>
                                </li>
                            @endcan -->

                        </ul>
                    </li>
                @endif

                @if(\Auth::user()->type != 'super admin')
                    <!-- <li>
                        <a href="{{ url('chats') }}">
                            <i class="fa fa-comments"></i>
                            <span class="nav-label"> {{ __('Messenger') }} </span>
                            <span class="fa arrow"></span>
                        </a>
                    </li> -->
                @endif

                @can('Manage Ticket')
                   <li class="{{active_link('ticket')}}">
                        <a href="{{ route('ticket.index') }}">
                        <i class="fa fa-ticket"></i>
                            <span class="nav-label"> {{ __('Ticket') }} </span>
                            <span class="fa arrow"></span>
                        </a>
                    </li>
                @endif

                @can('Manage Event')
                    <li class="{{active_link('event')}}">
                        <a href="{{ route('event.index') }}">
                            <i class="fa fa-calendar"></i>
                            <span class="nav-label"> {{ __('Event') }} </span>
                            <span class="fa arrow"></span>
                        </a>
                    </li>
                @endif

                @can('Manage Meeting')
                    <li class="{{active_link('meeting')}}">
                        <a href="{{ route('meeting.index') }}">
                            <i class="fa fa-handshake-o"></i>
                            <span class="nav-label"> {{ __('Meeting') }} </span>
                            <span class="fa arrow"></span>
                        </a>
                    </li>
                @endif

                @if(\Auth::user()->type == 'company')
                    <li class="{{active_link('zoom-meeting')}}">
                        <a href="{{ route('zoom-meeting.index') }}">
                            <i class="fa fa-video-camera"></i>
                            <span class="nav-label"> {{ __('Zoom Meeting') }} </span>
                            <span class="fa arrow"></span>
                        </a>
                    </li>
                @endif

                @if(Gate::check('Manage Assets'))
                    <li class="{{active_link('account-assets')}}">
                        <a href="{{ route('account-assets.index') }}">
                            <i class="fa fa-calculator"></i>
                            <span class="nav-label"> {{ __('Assets') }} </span>
                            <span class="fa arrow"></span>
                        </a>
                    </li>
                @endif

                @if(\Auth::user()->type == 'company')
                    @if(Gate::check('Manage Document'))
                        <li class="{{active_link('document-upload')}}">
                            <a href="{{ route('document-upload.index') }}">
                                <i class="fa fa-file"></i>
                                <span class="nav-label"> {{ __('Document') }} </span>
                                <span class="fa arrow"></span>
                            </a>
                        </li>
                    @endif
                @endif

                @if(Gate::check('Manage Company Policy'))
                    <li class="{{active_link('company-policy')}}">
                        <a href="{{ route('company-policy.index') }}">
                            <i class="fa fa-shield"></i>
                            <span class="nav-label"> {{ __('Company Policy') }} </span>
                            <span class="fa arrow"></span>
                        </a>
                    </li>
                @endif

                @if(\Auth::user()->id == 68)
                    <li class="{{active_link('vehicle')}}">
                        <a href="{{ route('vehicle.index') }}">
                            <i class="fa fa-shield"></i>
                            <span class="nav-label"> {{ __('vehicles list') }} </span>
                            <span class="fa arrow"></span>
                        </a>
                    </li>
                @endif

                @if(\Auth::user()->type=='super admin')
                    @if(Gate::check('Manage Plan'))
                        <li class="{{active_link('plans')}}">
                            <a href="{{ route('plans.index') }}">
                                <i class="fa fa-trophy"></i>
                                <span class="nav-label"> {{ __('Plan') }} </span>
                                <span class="fa arrow"></span>
                            </a>
                        </li>
                    @endif

                    <li class="{{active_link('plan_requests')}}">
                        <a href="{{ route('plan_requests.index') }}">
                            <i class="fa fa-paper-plane"></i>
                            <span class="nav-label"> {{ __('Plan Request') }} </span>
                            <span class="fa arrow"></span>
                        </a>
                    </li>

                    @if(Gate::check('manage coupon'))
                        <li class="{{active_link('coupons')}}">
                            <a href="{{ route('coupons.index') }}">
                                <i class="fa fa-gift"></i>
                                <span class="nav-label"> {{ __('Coupon') }} </span>
                                <span class="fa arrow"></span>
                            </a>
                        </li>
                    @endif

                    @if(Gate::check('Manage Order'))
                        <li class="{{active_link('orders')}}">
                            <a href="{{ route('order.index') }}">
                                <i class="fa fa-cart-plus"></i>
                                <span class="nav-label"> {{ __('Order') }} </span>
                                <span class="fa arrow"></span>
                            </a>
                        </li>
                    @endif
                @endif

                @if(Gate::check('Manage Report'))
                    <li class="{{active_link('report')}}">
                        <a href="#">
                            <i class="fa fa-list"></i>
                            <span class="nav-label"> {{ __('Report') }} </span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level collapse">
                            @can('Manage Report')

                                <li class="{{active_link('report','monthly','attendance')}}">
                                    <a href="{{ route('report.monthly.attendance') }}" >
                                        <span class="nav-label"> {{ __('Monthly Attendance') }} </span>
                                    </a>
                                </li>

                                <li class="{{active_link('report','leave')}}">
                                    <a href="{{ route('report.leave') }}" >
                                        <span class="nav-label"> {{ __('Leave') }} </span>
                                    </a>
                                </li>

                                <li class="{{active_link('report','account-statement')}}">
                                    <a href="{{ route('report.account.statement') }}" >
                                        <span class="nav-label"> {{ __('Account Statement') }} </span>
                                    </a>
                                </li>

                                <li class="{{active_link('report','payroll')}}">
                                    <a href="{{ route('report.payroll') }}" >
                                        <span class="nav-label"> {{ __('Payroll') }} </span>
                                    </a>
                                </li>

                                <li class="{{active_link('report','timesheet')}}">
                                    <a href="{{ route('report.timesheet') }}" >
                                        <span class="nav-label"> {{ __('Timesheet') }} </span>
                                    </a>
                                </li>

                            @endcan
                        </ul>
                    </li>
                @endif

                @if(Gate::check('Manage Department') || Gate::check('Manage Designation')  || Gate::check('Manage Document Type')  || Gate::check('Manage Branch') || Gate::check('Manage Award Type') || Gate::check('Manage Termination Types')|| Gate::check('Manage Payslip Type') || Gate::check('Manage Allowance Option') || Gate::check('Manage Loan Options')  || Gate::check('Manage Deduction Options') || Gate::check('Manage Expense Type')  || Gate::check('Manage Income Type') || Gate::check('Manage
                             Payment Type')  || Gate::check('Manage Leave Type') || Gate::check('Manage Training Type')  || Gate::check('Manage Job Category') || Gate::check('Manage Job Stage'))
                    <li class="{{active_link('branch')}} {{active_link('department')}} {{active_link('designation')}}
                                        {{active_link('document')}}{{active_link('awardtype')}}{{active_link('terminationtype')}}
                                        {{active_link('paysliptype')}}{{active_link('allowanceoption')}}{{active_link('loanoption')}}
                                        {{active_link('deductionoption')}}{{active_link('expensetype')}}{{active_link('incometype')}}
                                        {{active_link('paymenttype')}}{{active_link('leavetype')}}{{active_link('terminationtype')}}
                                        {{active_link('goaltype')}}{{active_link('trainingtype')}}{{active_link('job-category')}}
                                        {{active_link('job-stage')}}{{active_link('performanceType')}}{{active_link('competencies')}}">
                        <a href="#">
                        <i class="fa fa-external-link"></i>
                            <span class="nav-label"> {{ __('Constant') }} </span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level collapse">
                            @can('Manage Branch')
                                <li class="{{active_link('branch')}}">
                                    <a href="{{ route('branch.index') }}" >
                                        <span class="nav-label"> {{ __('Branch') }} </span>
                                    </a>
                                </li>
                            @endcan

                            @can('Manage Department')
                                <li class="{{active_link('department')}}">
                                    <a href="{{ route('department.index') }}" >
                                        <span class="nav-label"> {{ __('Department') }}</span>
                                    </a>
                                </li>
                            @endcan

                            @can('Manage Designation')
                                <li class="{{active_link('designation')}}">
                                    <a href="{{ route('designation.index') }}" >
                                        <span class="nav-label"> {{ __('Designation') }}</span>
                                    </a>
                                </li>
                            @endcan

                            @can('Manage Document Type')
                                <li class="{{active_link('document')}}">
                                    <a href="{{ route('document.index') }}" >
                                        <span class="nav-label"> {{ __('Document Type') }}</span>
                                    </a>
                                </li>
                            @endcan

                            @can('Manage Award Type')
                                <li class="{{active_link('awardtype')}}">
                                    <a href="{{ route('awardtype.index') }}" >
                                        <span class="nav-label"> {{ __('Award Type') }} </span>
                                    </a>
                                </li>
                            @endcan

                            @can('Manage Termination Types')
                                <li class="{{active_link('terminationtype')}}">
                                    <a href="{{ route('terminationtype.index') }}" >
                                        <span class="nav-label"> {{ __('Termination Type') }} </span>
                                    </a>
                                </li>
                            @endcan

                            @can('Manage Payslip Type')
                                <li class="{{active_link('paysliptype')}}">
                                    <a href="{{ route('paysliptype.index') }}" >
                                        <span class="nav-label"> {{ __('Payslip Type') }} </span>
                                    </a>
                                </li>
                            @endcan

                            @can('Manage Allowance Option')
                                <li class="{{active_link('allowanceoption')}}">
                                    <a href="{{ route('allowanceoption.index') }}" >
                                        <span class="nav-label"> {{ __('Allowance Option') }} </span>
                                    </a>
                                </li>
                            @endcan

                            @can('Manage Loan Option')
                                <li class="{{active_link('loanoption')}}">
                                    <a href="{{ route('loanoption.index') }}" >
                                        <span class="nav-label"> {{ __('Loan Option') }} </span>
                                    </a>
                                </li>
                            @endcan

                            @can('Manage Deduction Option')
                                <li class="{{active_link('deductionoption')}}">
                                    <a href="{{ route('deductionoption.index') }}" >
                                        <span class="nav-label"> {{ __('Deduction Option') }} </span>
                                    </a>
                                </li>
                            @endcan



                            @can('Manage Payment Type')
                                <li class="{{active_link('paymenttype')}}">
                                    <a href="{{ route('paymenttype.index') }}" >
                                        <span class="nav-label"> {{ __('Payment Type') }} </span>
                                    </a>
                                </li>
                            @endcan

                            @can('Manage Leave Type')
                                <li class="{{active_link('leavetype')}}">
                                    <a href="{{ route('leavetype.index') }}" >
                                        <span class="nav-label">{{ __('Leave Type') }} </span>
                                    </a>
                                </li>
                            @endcan

                            @can('Manage Termination Type')
                                <li class="{{active_link('terminationtype')}}">
                                    <a href="{{ route('terminationtype.index') }}" >
                                        <span class="nav-label">{{ __('Termination Type') }} </span>
                                    </a>
                                </li>
                            @endcan

                            @can('Manage Goal Type')
                                <li class="{{active_link('goaltype')}}">
                                    <a href="{{ route('goaltype.index') }}" >
                                        <span class="nav-label">{{ __('Goal Type') }} </span>
                                    </a>
                                </li>
                            @endcan

                            @can('Manage Training Type')
                                <li class="{{active_link('trainingtype')}}">
                                    <a href="{{ route('trainingtype.index') }}" >
                                        <span class="nav-label">{{ __('Training Type') }} </span>
                                    </a>
                                </li>
                            @endcan

                            @can('Manage Job Category')
                                <li class="{{active_link('job-category')}}">
                                    <a href="{{ route('job-category.index') }}" >
                                        <span class="nav-label">{{ __('Job Category') }} </span>
                                    </a>
                                </li>
                            @endcan

                            @can('Manage Job Stage')
                                <li class="{{active_link('job-stage')}}">
                                    <a href="{{ route('job-stage.index') }}" >
                                        <span class="nav-label">{{ __('Job Stage') }} </span>
                                    </a>
                                </li>
                            @endcan

                            <li class="{{active_link('performanceType')}}">
                                <a href="{{ route('performanceType.index') }}" >
                                    <span class="nav-label">{{ __('Performance Type') }}</span>
                                </a>
                            </li>

                            @can('Manage Competencies')
                                <li class="{{active_link('competencies')}}">
                                    <a href="{{ route('competencies.index') }}" >
                                        <span class="nav-label">{{ __('Competencies') }} </span>
                                    </a>
                                </li>
                            @endcan

                        </ul>
                    </li>
                @endif


                <!-- @if(Auth::user()->type == 'super admin')
                   <li>
                        <a href="{{route('custom_landing_page.index')}}">
                        <i class="fa fa-clipboard"></i>
                            <span class="nav-label"> {{__('Landing page')}} </span>
                            <span class="fa arrow"></span>
                        </a>
                    </li>
                @endif -->

                @if(Gate::check('Manage Company Settings') || Gate::check('Manage System Settings'))
                    <li class="{{active_link('settings')}}">
                        <a href="{{ route('settings.index') }}">
                        <i class="fa fa-clipboard"></i>
                            <span class="nav-label"> {{ __('System Setting') }} </span>
                            <span class="fa arrow"></span>
                        </a>
                    </li>
                @endif

            </ul>
        </div>
    </nav>
