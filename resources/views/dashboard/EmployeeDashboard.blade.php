@extends('dashboard.layouts.master')
@include('dashboard.layouts.header')
@section('content')

    <div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
        <div class="my-auto mb-2">
            <h2 class="mb-1">{{__('Mwerdi Dashbaord')}}</h2>
            <nav>
                <ol class="breadcrumb mb-0">
                    <li>
                        <a href="{{route('home')}}"><i class="ti ti-smart-home"></i>{{__('My Dashboard')}}</a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- /Breadcrumb -->

    <!-- Welcome Wrap -->
    <div class="card border-0">
        <div class="card-body d-flex align-items-center justify-content-between flex-wrap pb-1">
            <div class="d-flex align-items-center mb-3">
							<span class="avatar avatar-xl flex-shrink-0">
								<img src="{{auth()->user()->avatar?asset(Storage::url(auth()->user()->avatar)):asset(Storage::url('uploads/avatar/company.png'))}}" class="rounded-circle" alt="img">
							</span>
                <div class="ms-3">
                    <h3 class="mb-2">{{__('Welcome Back')}}, {{auth()->user()->name}} <a href="javascript:void(0);" class="edit-icon"><i class="ti ti-edit fs-14"></i></a></h3>
                    {{--                            <p>You have <span class="text-primary text-decoration-underline">21</span> Pending Approvals & <span class="text-primary text-decoration-underline">14</span> Leave Requests</p>--}}
                </div>
            </div>
            <div class="d-flex align-items-center flex-wrap mb-1" >
                <a href="#" class="btn btn-secondary btn-md me-2 mb-2 mx-1" data-bs-toggle="modal" data-bs-target="#addEmployeeModal"><i class="ti ti-square-rounded-plus me-1"></i>{{__('Add New Employee')}}</a>
                <a href="#" class="btn btn-primary btn-md mb-2" data-bs-toggle="modal" data-bs-target="#addTaskModal"><i class="ti ti-square-rounded-plus me-1"></i>{{__('Add Task')}}</a>
            </div>
        </div>
    </div>
    <div class="row">
        @if(!empty(session('success')))
            <div class="alert alert-success alert-dismissible fade in" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if(!empty(session('error')))
            <div class="alert alert-danger alert-dismissible fade in" role="alert">
                {{ session('error') }}
            </div>
        @endif
{{--            <div class="col-xxl-8 d-flex">--}}
{{--                <div class="row flex-fill">--}}
{{--                    <div class="col-md-3 d-flex">--}}
{{--                        <div class="card flex-fill">--}}
{{--                            <div class="card-body">--}}
{{--                                <span class="avatar rounded-circle bg-primary mb-2">--}}
{{--                                    <i class="ti ti-calendar-share fs-16"></i>--}}
{{--                                </span>--}}

{{--                                <h6 class="fs-13 fw-medium text-default mb-1">{{__('Attendance Overview')}}</h6>--}}
{{--                                <h3 class="mb-3">{{ $employeesWithAttendance .'/' .$employees_count ??0 }} <span class="fs-12 fw-medium text-success">--}}
{{--                                    <i class="fa-solid fa-caret-up me-1"></i>{{ $employeesWithAttendance?round($employeesWithAttendance/$employees * 100,2) : 0}}%</span></h3>--}}
{{--                                <a href="attendance-employee.html" class="link-default">View All</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-3 d-flex">--}}
{{--                        <div class="card flex-fill">--}}
{{--                            <div class="card-body">--}}
{{--                                <span class="avatar rounded-circle bg-pink mb-2">--}}
{{--                                    <i class="ti ti-checklist fs-16"></i>--}}
{{--                                </span>--}}
{{--                                <h6 class="fs-13 fw-medium text-default mb-1">{{__('Total No of Tasks')}}</h6>--}}
{{--                                <h3 class="mb-3">{{ $complete_tasks .'/' .$tasks }}<span class="fs-12 fw-medium text-success">--}}
{{--                                    <i class="fa-solid fa-caret-up me-1"></i>{{ $complete_tasks ? round($complete_tasks/$tasks * 100,2):0}}%%</span></h3>--}}
{{--                                <a href="tasks.html" class="link-default">View All</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-3 d-flex">--}}
{{--                        <div class="card flex-fill">--}}
{{--                            <div class="card-body">--}}
{{--                                <span class="avatar rounded-circle bg-success mb-2">--}}
{{--                                    <i class="ti ti-users-group fs-16"></i>--}}
{{--                                </span>--}}
{{--                                <h6 class="fs-13 fw-medium text-default mb-1">{{__('Job Applicants')}}</h6>--}}
{{--                                <h3 class="mb-3">{{ $job_app ??'0'}} <span class="fs-12 fw-medium text-success"><i class="fa-solid fa-caret-up me-1"></i> </span></h3>--}}
{{--                                <a href="job-list.html" class="link-default">View All</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-3 d-flex">--}}
{{--                        <div class="card flex-fill">--}}
{{--                            <div class="card-body">--}}
{{--                                <span class="avatar rounded-circle bg-info mb-2">--}}
{{--                                    <i class="ti ti-users-group fs-16"></i>--}}
{{--                                </span>--}}
{{--                                <h6 class="fs-13 fw-medium text-default mb-1">{{__('Employee Requests')}}</h6>--}}
{{--                                <h3 class="mb-3">{{ $emp_req ??0 }} <span class="fs-12 fw-medium text-info"><i class="fa-solid fa-caret-up me-1"></i> </span></h3>--}}
{{--                                <a href="job-list.html" class="link-default">View All</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-3 d-flex">--}}
{{--                        <div class="card flex-fill">--}}
{{--                            <div class="card-body">--}}
{{--                                <span class="avatar rounded-circle bg-dark mb-2">--}}
{{--                                    <i class="ti ti-user-star fs-16"></i>--}}
{{--                                </span>--}}
{{--                                <h6 class="fs-13 fw-medium text-default mb-1">{{__('Labor Hiring')}}</h6>--}}
{{--                                <h3 class="mb-3">{{ $labor_hiring ??0}} <span class="fs-12 fw-medium text-dark"><i class="fa-solid fa-caret-up me-1"></i></span></h3>--}}
{{--                                <a href="candidates.html" class="link-default">View All</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-3 d-flex">--}}
{{--                        <div class="card flex-fill">--}}
{{--                            <div class="card-body">--}}
{{--                                <span class="avatar rounded-circle bg-secondary mb-2">--}}
{{--                                    <i class="ti ti-user-star fs-16"></i>--}}
{{--                                </span>--}}
{{--                                <h6 class="fs-13 fw-medium text-default mb-1">{{__('Trainers')}}</h6>--}}
{{--                                <h3 class="mb-3">{{ $trainers ??'0' }} <span class="fs-12 fw-medium text-secondary"><i class="fa-solid fa-caret-up me-1"></i></span></h3>--}}
{{--                                <a href="candidates.html" class="link-default">View All</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-3 d-flex">--}}
{{--                        <div class="card flex-fill">--}}
{{--                            <div class="card-body">--}}
{{--                                <span class="avatar rounded-circle bg-danger mb-2">--}}
{{--                                    <i class="ti ti-user-star fs-16"></i>--}}
{{--                                </span>--}}
{{--                                <h6 class="fs-13 fw-medium text-default mb-1">{{__('Company Job Requests')}}</h6>--}}
{{--                                <h3 class="mb-3">{{ $comp_requests ??0}} <span class="fs-12 fw-medium text-danger"><i class="fa-solid fa-caret-up me-1"></i></span></h3>--}}
{{--                                <a href="candidates.html" class="link-default">View All</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-3 d-flex">--}}
{{--                        <div class="card flex-fill">--}}
{{--                            <div class="card-body">--}}
{{--                                <span class="avatar rounded-circle bg-purple mb-2">--}}
{{--                                    <i class="ti ti-user-star fs-16"></i>--}}
{{--                                </span>--}}
{{--                                <h6 class="fs-13 fw-medium text-default mb-1">{{__('Orders')}}</h6>--}}

{{--                                <h3 class="mb-3">{{ $orders ??'' }} <span class="fs-12 fw-medium text-purple"><i class="fa-solid fa-caret-up me-1"></i></span></h3>--}}
{{--                                <a href="candidates.html" class="link-default">View All</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--         </div>--}}
{{--            <div class="row">--}}

{{--            --}}{{-- check in out widget --}}
{{--            <div class="col-xxl-4 col-xl-6 d-flex">--}}
{{--                <div class="card flex-fill">--}}
{{--            <div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">--}}
{{--            <h5 class="mb-2">{{__('Clock-In/Out')}}</h5>--}}
{{--            <div class="d-flex align-items-center">--}}
{{--            <div class="dropdown mb-2">--}}


{{--            </div>--}}
{{--            <div class="dropdown mb-2">--}}


{{--            </div>--}}
{{--            </div>--}}
{{--            </div>--}}
{{--            <div class="card-body">--}}
{{--            <div>--}}
{{--            @foreach ($attend_emp as $emp)--}}
{{--            <div class="mb-3 p-2 border br-5">--}}
{{--            <div class="d-flex align-items-center justify-content-between">--}}
{{--                @php--}}
{{--                    // Convert the clock_in and clock_out times to Unix timestamps--}}
{{--                    $clock_in_timestamp = strtotime($emp->clock_in);--}}
{{--                    $clock_out_timestamp = strtotime($emp->clock_out);--}}

{{--                    // Calculate the difference in seconds--}}
{{--                    $time_diff_seconds = $clock_out_timestamp - $clock_in_timestamp;--}}

{{--                    // Convert seconds to minutes--}}
{{--                    $time_diff_minutes = $time_diff_seconds / 60;--}}

{{--                    // Get hours and minutes--}}
{{--                    $hours = floor($time_diff_minutes / 60);--}}
{{--                    $minutes = $time_diff_minutes % 60;--}}
{{--                @endphp--}}

{{--                <div class="d-flex align-items-center">--}}
{{--                    <div class="ms-2">--}}
{{--                        <h6 class="fs-14 fw-medium text-truncate">{{ $emp->employee->name ?? '' }}</h6>--}}
{{--                        <h6 class="fs-14 fw-medium text-truncate"></h6>--}}
{{--                        <p class="fs-13">{{ $emp->employee->department->name ?? '' }}</p>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="d-flex align-items-center">--}}
{{--                    <a href="javascript:void(0);" class="link-default me-2"><i class="ti ti-clock-share"></i></a>--}}
{{--                    <span class="fs-10 fw-medium d-inline-flex align-items-center badge badge-success">--}}
{{--                        <i class="ti ti-circle-filled fs-5 me-1"></i>{{ $hours }} hrs {{ $minutes }} min--}}
{{--                    </span>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            @php--}}
{{--            $clock_in = date('h:i A', strtotime($emp->clock_in)); // Convert clock_in to h:i A format--}}
{{--            $clock_out = date('h:i A', strtotime($emp->clock_out)); // Convert clock_out to h:i A format--}}
{{--            $late = date('h:i', strtotime($emp->late));--}}
{{--            @endphp--}}


{{--            <div class="d-flex align-items-center justify-content-between flex-wrap mt-2 border br-5 p-2 pb-0">--}}
{{--                <div>--}}
{{--                    <p class="mb-1 d-inline-flex align-items-center">--}}
{{--                        <i class="ti ti-circle-filled text-success fs-5 me-1"></i>Clock In--}}
{{--                    </p>--}}
{{--                    <h6 class="fs-13 fw-normal mb-2">{{ $clock_in ?? '' }}</h6>--}}
{{--                </div>--}}
{{--                <div>--}}
{{--                    <p class="mb-1 d-inline-flex align-items-center">--}}
{{--                        <i class="ti ti-circle-filled text-danger fs-5 me-1"></i>Clock Out--}}
{{--                    </p>--}}
{{--                    <h6 class="fs-13 fw-normal mb-2">{{ $clock_out ?? '' }}</h6>--}}
{{--                </div>--}}
{{--                <div>--}}
{{--                    <p class="mb-1 d-inline-flex align-items-center">--}}
{{--                        <i class="ti ti-circle-filled text-warning fs-5 me-1"></i>late--}}
{{--                    </p>--}}
{{--                    <h6 class="fs-13 fw-normal mb-2">{{  $emp->late  ?? '' }}  </h6>--}}
{{--                </div>--}}
{{--                --}}{{-- <div>--}}
{{--                    <p class="mb-1 d-inline-flex align-items-center">--}}
{{--                        <i class="ti ti-circle-filled text-warning fs-5 me-1"></i>Production--}}
{{--                    </p>--}}
{{--                    <h6 class="fs-13 fw-normal mb-2">09:21 Hrs</h6>--}}
{{--                </div> --}}
{{--            </div>--}}
{{--            </div>--}}
{{--            @endforeach--}}

{{--            </div>--}}

{{--            <a href="attendance-report.html" class="btn btn-light btn-md w-100">View All Attendance</a>--}}
{{--            </div>--}}
{{--            </div>--}}
{{--            </div>--}}
{{--            --}}{{-- end check in out widget --}}

{{--            --}}{{-- attendance overview --}}
{{--            <div class="col-xxl-4 col-xl-6 d-flex">--}}
{{--                <div class="card flex-fill">--}}
{{--                    <div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">--}}
{{--                        <h5 class="mb-2">{{__('Attendance Overview')}}</h5>--}}

{{--                    </div>--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="d-flex align-items-center">--}}
{{--                            <a href="javascript:void(0);" class="link-default me-2"><i class="ti ti-clock-share"></i></a>--}}
{{--                            <span class="fs-10 fw-medium d-inline-flex align-items-center badge badge-success">--}}
{{--                                <i class="ti ti-circle-filled fs-5 me-1"></i>9:00 AM (Clock In)--}}
{{--                            </span>--}}
{{--                        </div>--}}
{{--                        <div class="d-flex align-items-center">--}}
{{--                            <a href="javascript:void(0);" class="link-default me-2"><i class="ti ti-clock-share"></i></a>--}}
{{--                            <span class="fs-10 fw-medium d-inline-flex align-items-center badge badge-danger">--}}
{{--                                <i class="ti ti-circle-filled fs-5 me-1"></i>5:00 PM (Clock Out)--}}
{{--                            </span>--}}
{{--                        </div>--}}

{{--                        <div id="attendanceChart" style="height: 250px;"></div>--}}

{{--                        <h6 class="mb-3">Status</h6>--}}

{{--                        <div class="d-flex align-items-center justify-content-between">--}}
{{--                            <p class="f-13 mb-2"><i class="ti ti-circle-filled" style="color: #4a7fe0;" me-1></i>Coming Early</p>--}}
{{--                            <p class="f-13 fw-medium text-gray-9 mb-2">{{ $early_arrivals->count() }} Employee</p>--}}
{{--                        </div>--}}
{{--                        <div class="d-flex align-items-center justify-content-between">--}}
{{--                            <p class="f-13 mb-2"><i class="ti ti-circle-filled" style="color: #e7513e;" me-1></i>Coming Late</p>--}}
{{--                            <p class="f-13 fw-medium text-gray-9 mb-2">{{ $late_arrivals->count() }} Employee</p>--}}
{{--                        </div>--}}
{{--                        <div class="d-flex align-items-center justify-content-between mb-2">--}}
{{--                            <p class="f-13 mb-2"><i class="ti ti-circle-filled" style="color: #11c866;" me-1></i>Absent</p>--}}
{{--                            <p class="f-13 fw-medium text-gray-9 mb-2">{{ $absent_employees }} Employee</p>--}}
{{--                        </div>--}}


{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            --}}{{-- end attendance overview --}}
{{--            --}}{{-- Job Applicants Widget --}}
{{--            <div class="col-xxl-4 d-flex">--}}
{{--                <div class="card flex-fill">--}}
{{--                    <div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">--}}
{{--                        <h5 class="mb-2">{{__('Job Applicants')}}</h5>--}}
{{--                        <a href="#" class="btn btn-light btn-md mb-2">View All</a>--}}
{{--                    </div>--}}
{{--                    <div class="card-body">--}}
{{--                        --}}{{-- Tabs Navigation --}}
{{--                        <ul class="nav nav-tabs tab-style-1 nav-justified d-sm-flex d-block p-0 mb-4" role="tablist">--}}
{{--                            <li class="nav-item" role="presentation">--}}
{{--                                <a class="nav-link fw-medium" data-bs-toggle="tab" data-bs-target="#openings" href="#openings" role="tab">Opening Job Positions</a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item" role="presentation">--}}
{{--                                <a class="nav-link fw-medium active" data-bs-toggle="tab" data-bs-target="#applicants" href="#applicants" role="tab">Job Applicants</a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}

{{--                        <div class="tab-content">--}}
{{--                            --}}{{-- Openings Tab --}}
{{--                            <div class="tab-pane fade" id="openings" role="tabpanel">--}}
{{--                                @foreach ($openings as $index => $job)--}}
{{--                                    <div class="d-flex align-items-center justify-content-between mb-4 p-3"--}}
{{--                                        style="background-color: {{ $index % 2 === 0 ? '#f1f8ff' : '#f9f9f9' }}; border-radius: 8px;">--}}
{{--                                        <div class="d-flex align-items-center">--}}
{{--                                            <div class="ms-2 overflow-hidden">--}}
{{--                                                <p class="text-dark fw-medium text-truncate mb-0">--}}
{{--                                                    <a href="#" class="text-primary fw-bold">{{ $job->title ?? '' }}</a>--}}
{{--                                                </p>--}}
{{--                                                <span class="fs-12 text-secondary fw-bold">--}}
{{--                                                    No of Openings: {{ $job->position ?? 0 }}--}}
{{--                                                </span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                @endforeach--}}
{{--                            </div>--}}

{{--                            --}}{{-- Applicants Tab --}}
{{--                            <div class="tab-pane fade active show" id="applicants" role="tabpanel">--}}
{{--                                @foreach ($applicants as $applicant)--}}
{{--                                    <div class="d-flex align-items-center justify-content-between mb-4">--}}
{{--                                        <div class="d-flex align-items-center">--}}
{{--                                            <div class="ms-2 overflow-hidden">--}}
{{--                                                <p class="text-truncate mb-0">--}}
{{--                                                    <a href="#" class="text-dark fw-bold">{{ $applicant->name ?? '' }}</a>--}}
{{--                                                </p>--}}
{{--                                                <span class="fs-13 d-inline-flex align-items-center">--}}
{{--                                                    <span class="text-secondary fst-italic">--}}
{{--                                                        {{ $applicant->jobRelation->title ?? 'Unknown Job' }}--}}
{{--                                                    </span>--}}
{{--                                                </span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <span class="badge badge-xs text-white" style="background-color: #F26522;">--}}
{{--                                            {{ $applicant->jobRelation->title ?? 'Unknown' }}--}}
{{--                                        </span>--}}
{{--                                    </div>--}}
{{--                                @endforeach--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            --}}{{-- End Job Applicants Widget --}}
{{--            --}}{{-- Employees Widgets --}}
{{--            <div class="col-xxl-4 col-xl-6 d-flex">--}}
{{--                <div class="card flex-fill">--}}
{{--                    <div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">--}}
{{--                        <h5 class="mb-2">{{__('Employees')}}</h5>--}}
{{--                        <a href="employees.html" class="btn btn-light btn-md mb-2">View All</a>--}}
{{--                    </div>--}}
{{--                    <div class="card-body p-0">--}}
{{--                        <div class="table-responsive">--}}
{{--                            <table class="table table-nowrap mb-0">--}}
{{--                                <thead>--}}
{{--                                    <tr>--}}
{{--                                        <th>Name</th>--}}
{{--                                        <th>Department</th>--}}
{{--                                    </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                @php--}}
{{--                                $badgeColors = ['badge-primary', 'badge-success', 'badge-info', 'badge-warning', 'badge-danger']; // Add your desired colors here--}}
{{--                                @endphp--}}
{{--                                @foreach ($all_employees as $index => $employee)--}}
{{--                                <tr>--}}
{{--                                    <td>--}}
{{--                                        <div class="d-flex align-items-center">--}}
{{--                                            <div class="ms-2">--}}
{{--                                                <h6 class="fw-medium"><a href="javascript:void(0);">{{ $employee->name }}</a></h6>--}}
{{--                                                <span class="fs-12">{{ $employee->department->name??'' }}</span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        @php--}}
{{--                                            $badgeColor = $badgeColors[$index % count($badgeColors)]; // Cycle through the colors--}}
{{--                                        @endphp--}}
{{--                                        <span class="badge {{ $badgeColor }} badge-xs">--}}
{{--                                            {{ $employee->department->name ??"" }}--}}
{{--                                        </span>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                @endforeach--}}
{{--                                </tbody>--}}
{{--                            </table>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            --}}{{-- End Employees Widgets --}}

{{--             --}}{{-- Card for End Dates --}}




            <div class="col-xxl-8 col-xl-12 d-flex">
                    <div class="card flex-fill">
                        <div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">
                            <h5 class="mb-2">{{ __('Employee End Dates') }}</h5>
                            <a href="{{url('/get-expiry-docs')}}" class="btn btn-light btn-md mb-2">{{ __('View All') }}</a>
                        </div>

                        <div class="card-body p-0">
                            @if ($records->isNotEmpty())
                                <div class="table-responsive">
                                    <div class="card-footer">
                                        {{ $records->links('pagination::bootstrap-4') }}
                                    </div>
                                     <table class="table table-nowrap mb-0">
                                        <thead>
                                        <tr>
                                            <th>{{ __('Document Type') }}</th>
                                            <th>{{ __('Document') }}</th>
                                            <th>{{ __('Employee') }}</th>
                                            <th>{{ __('Expiry Date') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($records as $documentType => $documents)
                                            @foreach ($documents as $record)
                                                <tr>
                                                    <!-- Document Type -->
                                                    <td>
                                            <span class="badge {{ $loop->parent->iteration % 2 === 0 ? 'bg-light text-dark' : 'bg-secondary text-white' }}">
                                                {{ $documentType }}
                                            </span>
                                                    </td>
                                                    <!-- Document Name -->
                                                    <td>{{ $record->name ?? 'Unnamed Document' }}</td>
                                                    <!-- Employee Name -->
                                                    <td>{{ $record->employee->name ?? 'Unknown Employee' }}</td>
                                                    <!-- Expiry Date -->
                                                    <td>{{ \Carbon\Carbon::parse($record->end_date)->format('Y-m-d') ?? 'N/A' }}</td>
                                                </tr>
                                            @endforeach
                                        @endforeach
                                        </tbody>
                                    </table>

                                </div>

                                <!-- Render pagination links -->

                            @else
                                <p class="text-center py-4">{{ __('No records found.') }}</p>
                            @endif
                        </div>
                    </div>
                </div>             {{-- End Card for End Dates --}}
            {{-- Card for Task Status --}}
{{--            <div class="col-xxl-4 col-xl-6 d-flex">--}}
{{--                <div class="card flex-fill">--}}
{{--                    <div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">--}}
{{--                        <h5 class="mb-2">{{__('Tasks')}}</h5>--}}
{{--                        <a href="#" class="btn btn-light btn-md mb-2">View All</a>--}}
{{--                    </div>--}}
{{--                    <canvas id="taskStatusChart" width="400" height="400"></canvas>--}}
{{--                    <div id="taskStatusPercentages" class="mt-3 text-center"></div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            --}}{{-- End Card for Task Status --}}
{{--            --}}{{-- Tasks Widget --}}
{{--            <div class="col-xxl-4 col-xl-6 d-flex">--}}
{{--                <div class="card flex-fill">--}}
{{--                    <div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">--}}
{{--                        <h5 class="mb-2">{{__('Tasks employee')}}</h5>--}}
{{--                        <a href="tasks.html" class="btn btn-light btn-md mb-2">View All</a>--}}
{{--                    </div>--}}
{{--                    <div class="card-body p-0">--}}
{{--                        <div class="table-responsive">--}}
{{--                            <table class="table table-nowrap mb-0">--}}
{{--                                <thead>--}}
{{--                                    <tr>--}}
{{--                                        <th>Name</th>--}}
{{--                                        <th>Start Date</th>--}}
{{--                                        <th>End Date</th>--}}
{{--                                        <th>Priority</th>--}}
{{--                                    </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                @php--}}
{{--                                $priorityLabels = ['Low', 'Medium', 'High', 'Critical']; // Customize priorities if needed--}}
{{--                                $badgeColors = ['badge-success', 'badge-warning', 'badge-danger', 'badge-dark']; // Customize colors--}}
{{--                                @endphp--}}
{{--                                @foreach ($all_tasks as $task)--}}
{{--                                <tr>--}}
{{--                                    <td>--}}
{{--                                        <h6 class="fw-medium"><a href="javascript:void(0);">{{ $task->name }}</a></h6>--}}
{{--                                    </td>--}}
{{--                                    <td>{{ $task->start_date ? \Carbon\Carbon::parse($task->start_date)->format('Y-m-d') : '-' }}</td>--}}
{{--                                    <td>{{ $task->due_date ? \Carbon\Carbon::parse($task->due_date)->format('Y-m-d') : '-' }}</td>--}}
{{--                                    <td>--}}
{{--                                        @php--}}
{{--                                            $priorityIndex = $task->priority - 1; // Assuming priority is 1-based--}}
{{--                                            $priorityIndex = $priorityIndex >= 0 && $priorityIndex < count($priorityLabels) ? $priorityIndex : 0; // Fallback--}}
{{--                                            $badgeColor = $badgeColors[$priorityIndex];--}}
{{--                                        @endphp--}}
{{--                                        <span class="badge {{ $badgeColor }} badge-xs">--}}
{{--                                            {{ $priorityLabels[$priorityIndex] }}--}}
{{--                                        </span>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                @endforeach--}}
{{--                                </tbody>--}}
{{--                            </table>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            --}}{{-- End Tasks Widget --}}
{{--                --}}{{-- Add Employee Modal --}}
{{--                <div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-labelledby="addEmployeeModalLabel" aria-hidden="true">--}}
{{--                    <div class="modal-dialog modal-dialog-centered modal-xl">--}}
{{--                        <div class="modal-content">--}}
{{--                            <div class="modal-header">--}}
{{--                                <div class="d-flex align-items-center">--}}
{{--                                    <h4 class="modal-title me-2">{{ __('Add New Employee') }}</h4>--}}
{{--                                </div>--}}
{{--                                <button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>--}}
{{--                            </div>--}}

{{--                            <form id="add_employee" enctype="multipart/form-data" method="post">--}}
{{--                                @csrf--}}
{{--                                <div id="error-messages" class="alert alert-danger d-none">--}}
{{--                                    <ul></ul>--}}
{{--                                </div>--}}

{{--                                <div class="contact-grids-tab">--}}
{{--                                    <ul class="nav nav-underline" id="myTab" role="tablist">--}}
{{--                                        <li class="nav-item" role="presentation">--}}
{{--                                            <button class="nav-link active" id="info-tab" data-bs-toggle="tab" data-bs-target="#basic-info" type="button" role="tab" aria-selected="true">{{ __('Step 1.Basic Information') }}</button>--}}
{{--                                        </li>--}}
{{--                                        <li class="nav-item" role="presentation">--}}
{{--                                            <button class="nav-link" id="job-tab" data-bs-toggle="tab" data-bs-target="#jobModal" type="button" role="tab" aria-selected="false" tabindex="-1">{{ __('Step 2.Job Information') }}</button>--}}
{{--                                        </li>--}}
{{--                                        <li class="nav-item" role="presentation">--}}
{{--                                            <button class="nav-link" id="salary-tab" data-bs-toggle="tab" data-bs-target="#salaryModal" type="button" role="tab" aria-selected="false" tabindex="-1">{{ __('Step 3.salary and allowances') }}</button>--}}
{{--                                        </li>--}}
{{--                                        <li class="nav-item" role="presentation">--}}
{{--                                            <button class="nav-link" id="annual-tab" data-bs-toggle="tab" data-bs-target="#annualModal" type="button" role="tab" aria-selected="false" tabindex="-1">{{ __('Step 4.Annual leave entitlement') }}</button>--}}
{{--                                        </li>--}}
{{--                                        <li class="nav-item" role="presentation">--}}
{{--                                            <button class="nav-link" id="call-tab" data-bs-toggle="tab" data-bs-target="#lastModal" type="button" role="tab" aria-selected="false" tabindex="-1">{{ __('Step 5.Finish') }}</button>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                                <div class="tab-content" id="myTabContent">--}}
{{--                                    <div class="tab-pane fade show active" id="basic-info" role="tabpanel" aria-labelledby="info-tab">--}}
{{--                                        <div class="modal-body pb-0">--}}
{{--                                            <h2>{{ __('Basic Information') }}</h2>--}}

{{--                                            <div class="row">--}}
{{--                                                <div class="col-md-4">--}}
{{--                                                    <div class="mb-3">--}}
{{--                                                        <label for="name" class="form-label">{{ __('Name') }} <span class="text-danger">*</span></label>--}}
{{--                                                        <input type="text" name="name" id="name" class="form-control">--}}
{{--                                                        <div id="name_error" class="invalid-feedback"></div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

{{--                                                <div class="col-md-4">--}}
{{--                                                    <div class="mb-3">--}}
{{--                                                        <label for="name_ar" class="form-label">{{ __('Name (Arabic)') }}</label>--}}
{{--                                                        <input type="text" name="name_ar" id="name_ar" class="form-control">--}}
{{--                                                        <div id="name_ar_error" class="invalid-feedback"></div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

{{--                                                <div class="col-md-4">--}}
{{--                                                    <div class="mb-3">--}}
{{--                                                        <label for="email" class="form-label">{{ __('Email') }} <span class="text-danger">*</span></label>--}}
{{--                                                        <input type="email" name="email" id="email" class="form-control">--}}
{{--                                                        <div id="email_error" class="invalid-feedback"></div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-md-4">--}}
{{--                                                    <div class="mb-3">--}}
{{--                                                        <label for="personal_email" class="form-label">{{ __('Personal Email') }} <span class="text-danger">*</span></label>--}}
{{--                                                        <input type="email" name="personal_email" id="personal_email" class="form-control">--}}
{{--                                                        <div id="personal_email_error" class="invalid-feedback"></div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

{{--                                                <div class="col-md-4">--}}
{{--                                                    <div class="mb-3">--}}
{{--                                                        <label for="phone" class="form-label">{{ __('Phone') }} <span class="text-danger">*</span></label>--}}
{{--                                                        <input type="text" name="phone" id="phone" class="form-control">--}}
{{--                                                        <div id="phone_error" class="invalid-feedback"></div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

{{--                                                <div class="col-md-4">--}}
{{--                                                    <div class="mb-3">--}}
{{--                                                        <label for="password" class="form-label">{{ __('Password') }} <span class="text-danger">*</span></label>--}}
{{--                                                        <div class="pass-group">--}}
{{--                                                            <input type="password" name="password" id="password" class="form-control">--}}
{{--                                                            <div id="password_error" class="invalid-feedback"></div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

{{--                                                <div class="col-md-4">--}}
{{--                                                    <div class="mb-3">--}}
{{--                                                        <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }} <span class="text-danger">*</span></label>--}}
{{--                                                        <div class="pass-group">--}}
{{--                                                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">--}}
{{--                                                            <div id="password_confirmation_error" class="invalid-feedback"></div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

{{--                                                <div class="col-md-4">--}}
{{--                                                    <div class="mb-3">--}}
{{--                                                        <label for="dob" class="form-label">{{ __('Date of Birth') }} <span class="text-danger">*</span></label>--}}
{{--                                                        <div class="input-icon-start position-relative">--}}
{{--                                                            <input type="text" name="dob" id="dob" class="form-control form-control-lg datetimepicker" placeholder="dd/mm/yyyy">--}}
{{--                                                            <span class="input-icon-addon">--}}
{{--                                                <i class="ti ti-calendar text-gray-7"></i>--}}
{{--                                            </span>--}}
{{--                                                            <div id="dob_error" class="invalid-feedback"></div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

{{--                                                <div class="col-md-4">--}}
{{--                                                    <div class="mb-3">--}}
{{--                                                        <label for="designati" class="form-label">{{ __('Departments') }}</label>--}}
{{--                                                        <select name="department_id" required id="designati" class="select select2-hidden-accessible">--}}
{{--                                                            <option value="">{{ __('Select') }}</option>--}}
{{--                                                            @foreach($departments as $department)--}}
{{--                                                                <option value="{{ $department->id }}">{{ $department->name }}</option>--}}
{{--                                                            @endforeach--}}
{{--                                                        </select>--}}
{{--                                                        <div id="" class="invalid-feedback"></div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

{{--                                                <div class="form-group col-md-4">--}}
{{--                                                    {{ Form::label('designation_id', __('Designation'), ['class' => 'form-label']) }}--}}
{{--                                                    <select name="designation_id" class="select select2-hidden-accessible">--}}
{{--                                                        <option value="">{{ __('Select Designation') }}</option>--}}
{{--                                                        @foreach($designations as $designation)--}}
{{--                                                            <option value="{{ $designation->id }}">{{ $designation->name }}</option>--}}
{{--                                                        @endforeach--}}
{{--                                                    </select>--}}
{{--                                                </div>--}}

{{--                                                <div class="col-md-4">--}}
{{--                                                    <div class="mb-3">--}}
{{--                                                        <label for="nationality_type" class="form-label">{{ __('Nationality Type') }}</label>--}}
{{--                                                        <select name="nationality_type" id="nationality_type" class="form-select required" aria-label="{{ __('Select Nationality Type') }}">--}}
{{--                                                            <option value="0">{{ __('Non-Saudi') }}</option>--}}
{{--                                                            <option value="1">{{ __('Saudi') }}</option>--}}
{{--                                                        </select>--}}
{{--                                                        <div class="wizard-form-error"></div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

{{--                                                <div class="col-md-4">--}}
{{--                                                    <div class="mb-3" id="nationality">--}}
{{--                                                        <label for="nationality_id" class="form-label">{{ __('Nationality') }}</label>--}}
{{--                                                        <select name="nationality_id" class="form-select required" aria-label="{{ __('Select Nationality') }}">--}}
{{--                                                            <option value="">{{ __('Select Nationality') }}</option>--}}
{{--                                                            @foreach($nationalities as $nationality)--}}
{{--                                                                <option value="{{ $nationality->id }}">{{ $nationality->name }}</option>--}}
{{--                                                            @endforeach--}}
{{--                                                        </select>--}}
{{--                                                        <div class="wizard-form-error"></div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

{{--                                                <div class="col-md-4">--}}
{{--                                                    <div class="mb-3">--}}
{{--                                                        <label for="gender" class="form-label">{{ __('Gender') }}</label>--}}
{{--                                                        <select name="gender" required id="gender" class="select select2-hidden-accessible">--}}
{{--                                                            <option value="">{{ __('Select') }}</option>--}}
{{--                                                            <option value="Male">{{ __('Male') }}</option>--}}
{{--                                                            <option value="Female">{{ __('Female') }}</option>--}}
{{--                                                        </select>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

{{--                                                <div class="col-md-4">--}}
{{--                                                    <div class="mb-3">--}}
{{--                                                        <label for="religion" class="form-label">{{ __('Religion') }}</label>--}}
{{--                                                        <select name="religion" required id="religion" class="select select2-hidden-accessible">--}}
{{--                                                            <option value="">{{ __('Select') }}</option>--}}
{{--                                                            <option value="1">{{ __('Muslim') }}</option>--}}
{{--                                                            <option value="0">{{ __('Non-Muslim') }}</option>--}}
{{--                                                        </select>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

{{--                                                <div class="col-md-4">--}}
{{--                                                    <div class="mb-3">--}}
{{--                                                        <label for="religion" class="form-label">{{ __('Out of Saudia') }}</label>--}}
{{--                                                        <select name="out_of_saudia" required id="out_of_saudia" class="select select2-hidden-accessible">--}}
{{--                                                            <option value="">{{ __('Select') }}</option>--}}
{{--                                                            <option value="1">{{ __('Yes') }}</option>--}}
{{--                                                            <option value="0">{{ __('No') }}</option>--}}
{{--                                                        </select>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

{{--                                                <div class="col-md-4">--}}
{{--                                                    <div class="mb-3">--}}
{{--                                                        <label for="employer_phone" class="form-label">{{ __('Employer Phone') }} <span class="text-danger">*</span></label>--}}
{{--                                                        <div class="pass-group">--}}
{{--                                                            <input type="text" name="employer_phone" id="employer_phone" class="form-control">--}}
{{--                                                            <span class="ti toggle-password  "></span>--}}
{{--                                                            <div id="employer_phone" class="invalid-feedback"></div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

{{--                                                <div class="col-md-4">--}}
{{--                                                    <div class="mb-3" id="nationality">--}}
{{--                                                        <label for="jobtitle_id" class="form-label">{{ __('Job Title') }}</label>--}}
{{--                                                        <select name="jobtitle_id" class="form-select required" aria-label="{{ __('Select Job Title') }}">--}}
{{--                                                            <option value="">{{ __('Select Job Titles') }}</option>--}}
{{--                                                            @foreach($jobtitles as $job)--}}
{{--                                                                <option value="{{ $job->id }}">{{ app()->getLocale() == 'en' ? $job->name : $job->name_ar }}</option>--}}
{{--                                                            @endforeach--}}
{{--                                                        </select>--}}
{{--                                                        <div class="wizard-form-error"></div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

{{--                                                <div class="col-md-6">--}}
{{--                                                    <div class="mb-3 text-center">--}}
{{--                                                        <label class="form-label">{{ __('Do you want to register in the list of users?') }}</label>--}}
{{--                                                        <div class="form-check form-check-md form-switch d-flex justify-content-center">--}}
{{--                                                            <input class="form-check-input" name="user_register" type="checkbox" id="user_register" value="1">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

{{--                                                <div class="row">--}}
{{--                                                    <h6 class="col-md-12 py-2">{{ __('ID_qama_details') }}</h6>--}}
{{--                                                    <div class="form-group col-md-3">--}}
{{--                                                        <label for="residence_number" class="form-label">{{ __('ID qama details') }}</label>--}}
{{--                                                        <input type="text"  class="form-control" name="residence_number" id="residence_number">--}}
{{--                                                    </div>--}}
{{--                                                    <div class="form-group col-md-3">--}}
{{--                                                        <label for="residence_number" class="form-label">{{ __('Place_of_issuance_of_ID_residence') }}</label>--}}
{{--                                                        <input type="text"  class="form-control" name="place_of_issuance_of_ID_residence" id="place_of_issuance_of_ID_residence">--}}
{{--                                                    </div>--}}
{{--                                                    <div class="form-group col-md-3">--}}
{{--                                                        <label for="iqama_issuance_date_gregorian" class="form-label">{{ __('Join_date_gregorian') }}</label>--}}
{{--                                                        <input type="text" class="form-control datetimepicker" id="iqama_issuance_date_gregorian" name="iqama_issuance_date_gregorian">--}}
{{--                                                    </div>--}}
{{--                                                    <div class="form-group col-md-3">--}}
{{--                                                        <label for="iqama_issuance_date_Hijri" class="form-label">{{ __('Join_date_hijri') }}</label>--}}
{{--                                                        <input type="text" class="form-control hijri-date-input" id="iqama_issuance_date_Hijri" name="iqama_issuance_date_Hijri">--}}
{{--                                                    </div>--}}
{{--                                                    <div class="form-group col-md-3">--}}
{{--                                                        <label for="iqama_issuance_expirydate_gregorian" class="form-label">{{ __('Iqama_issuance_expirydate_gregorian') }}</label>--}}
{{--                                                        <input type="text" class="form-control datetimepicker" id="iqama_issuance_expirydate_gregorian" name="iqama_issuance_expirydate_gregorian">--}}
{{--                                                    </div>--}}
{{--                                                    <div class="form-group col-md-3">--}}
{{--                                                        <label for="iqama_issuance_expirydate_Hijri" class="form-label">{{ __('Iqama_issuance_expirydate_Hijri') }}</label>--}}
{{--                                                        <input type="text" class="form-control hijri-date-input" id="iqama_issuance_expirydate_Hijri" name="iqama_issuance_expirydate_Hijri">--}}
{{--                                                    </div>--}}
{{--                                                    <div class="form-group col-md-6">--}}
{{--                                                        <label for="iqama_attachment" class="form-label">{{ __('Iqama_attachment') }}</label>--}}
{{--                                                        <input type="file" class="form-control" id="iqama_attachment" name="iqama_attachment">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

{{--                                                <div class="row">--}}
{{--                                                    <h6 class="col-md-12 py-2">{{ __('Passport_details') }}</h6>--}}
{{--                                                    <div class="form-group col-md-3">--}}
{{--                                                        <label for="passport_number" class="form-label">{{ __('Passport_number') }}</label>--}}
{{--                                                        <input type="text" class="form-control" name="passport_number" id="passport_number">--}}
{{--                                                    </div>--}}
{{--                                                    <div class="form-group col-md-3">--}}
{{--                                                        <label for="place_of_issuance_of_passport" class="form-label">{{ __('Place_of_issuance_of_passport') }}</label>--}}
{{--                                                        <input type="text" class="form-control" name="place_of_issuance_of_passport" id="place_of_issuance_of_passport">--}}
{{--                                                    </div>--}}
{{--                                                    <div class="form-group col-md-3">--}}
{{--                                                        <label for="passport_issuance_expirydate_gregorian" class="form-label">{{ __('Passport_issuance_expirydate_gregorian') }}</label>--}}
{{--                                                        <input type="text" class="form-control datetimepicker" id="passport_issuance_expirydate_gregorian" name="passport_issuance_expirydate_gregorian">--}}
{{--                                                    </div>--}}
{{--                                                    <div class="form-group col-md-3">--}}
{{--                                                        <label for="passport_issuance_date_gregorian" class="form-label">{{ __('Passport_issuance_date_gregorian') }}</label>--}}
{{--                                                        <input type="text" class="form-control hijri-date-input" id="passport_issuance_date_gregorian" name="passport_issuance_date_gregorian">--}}
{{--                                                    </div>--}}

{{--                                                    <div class="form-group col-md-6">--}}
{{--                                                        <label for="passport_attachment" class="form-label">{{ __('Passport_attachment') }}</label>--}}
{{--                                                        <input type="file" class="form-control" id="passport_attachment" name="passport_attachment">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

{{--                                                <div class="row">--}}
{{--                                                    <h6 class="col-md-12">{{ __('Address_in_Saudi_Arabia') }}</h6>--}}

{{--                                                    <div class="form-group col-md-3">--}}
{{--                                                        <label for="building_number" class="form-control-label">{{ __('Building_number') }}</label>--}}
{{--                                                        <input type="text" id="building_number" name="building_number" value="{{ old('building_number') }}" class="form-control">--}}
{{--                                                    </div>--}}

{{--                                                    <div class="form-group col-md-3">--}}
{{--                                                        <label for="street_name" class="form-control-label">{{ __('Street_name') }}</label>--}}
{{--                                                        <input type="text" id="street_name" name="street_name" value="{{ old('street_name') }}" class="form-control">--}}
{{--                                                    </div>--}}
{{--                                                    <div class="form-group col-md-3">--}}
{{--                                                        <label for="country" class="form-control-label">{{ __('Country') }}</label>--}}
{{--                                                        <select id="country" name="country" class="form-control">--}}
{{--                                                            <option value="">{{ __('Select Country') }}</option>--}}
{{--                                                        </select>--}}
{{--                                                    </div>--}}

{{--                                                    <div class="form-group col-md-3">--}}
{{--                                                        <label for="region" class="form-control-label">{{ __('Region') }}</label>--}}
{{--                                                        <select id="region" name="region" class="form-control" disabled>--}}
{{--                                                            <option value="">{{ __('Select Region') }}</option>--}}
{{--                                                        </select>--}}
{{--                                                    </div>--}}

{{--                                                    <div class="form-group col-md-3">--}}
{{--                                                        <label for="city" class="form-control-label">{{ __('City') }}</label>--}}
{{--                                                        <select id="city" name="city" class="form-control" disabled>--}}
{{--                                                            <option value="">{{ __('Select City') }}</option>--}}
{{--                                                        </select>--}}
{{--                                                    </div>--}}




{{--                                                    <div class="form-group col-md-3">--}}
{{--                                                        <label for="postal_code" class="form-control-label">{{ __('Postal_code') }}</label>--}}
{{--                                                        <input type="text" id="postal_code" name="postal_code" value="{{ old('postal_code') }}" class="form-control">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

{{--                                                <!-- Address in Mother Country -->--}}
{{--                                                <div class="row">--}}
{{--                                                    <h6 class="col-md-12">{{ __('Address_in_mother_country') }}</h6>--}}
{{--                                                    <div class="form-group col-md-6">--}}
{{--                                                        <label for="address" class="form-control-label">{{ __('Address') }}</label>--}}
{{--                                                        <input type="text" id="address" name="address" value="{{ old('address') }}" class="form-control">--}}
{{--                                                    </div>--}}

{{--                                                    <div class="form-group col-md-3">--}}
{{--                                                        <label for="mother_city" class="form-control-label">{{ __('City') }}</label>--}}
{{--                                                        <input type="text" id="mother_city" name="mother_city" value="{{ old('mother_city') }}" class="form-control">--}}
{{--                                                    </div>--}}

{{--                                                    <div class="form-group col-md-3">--}}
{{--                                                        <label for="mother_country" class="form-control-label">{{ __('Country') }}</label>--}}
{{--                                                        <input type="text" id="mother_country" name="mother_country" value="{{ old('mother_country') }}" class="form-control">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

{{--                                                <!-- Emergency Contact -->--}}
{{--                                                <div class="row">--}}
{{--                                                    <h6 class="col-md-12">{{ __('Emergency_contact') }}</h6>--}}
{{--                                                    <div class="form-group col-md-3">--}}
{{--                                                        <label for="emergency_contact_name" class="form-control-label">{{ __('Name') }}</label>--}}
{{--                                                        <input type="text" id="emergency_contact_name" name="emergency_contact_name" value="{{ old('emergency_contact_name') }}" class="form-control">--}}
{{--                                                    </div>--}}

{{--                                                    <div class="form-group col-md-3">--}}
{{--                                                        <label for="emergency_contact_relationship" class="form-control-label">{{ __('Relationship') }}</label>--}}
{{--                                                        <input type="text" id="emergency_contact_relationship" name="emergency_contact_relationship" value="{{ old('emergency_contact_relationship') }}" class="form-control">--}}
{{--                                                    </div>--}}

{{--                                                    <div class="form-group col-md-3">--}}
{{--                                                        <label for="emergency_contact_address" class="form-control-label">{{ __('Address') }}</label>--}}
{{--                                                        <input type="text" id="emergency_contact_address" name="emergency_contact_address" value="{{ old('emergency_contact_address') }}" class="form-control">--}}
{{--                                                    </div>--}}

{{--                                                    <div class="form-group col-md-3">--}}
{{--                                                        <label for="emergency_contact_phone" class="form-control-label">{{ __('Phone') }}</label>--}}
{{--                                                        <input type="text" id="emergency_contact_phone" name="emergency_contact_phone" value="{{ old('emergency_contact_phone') }}" class="form-control">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

{{--                                                <!-- Custom Fields -->--}}
{{--                                                <div class="row">--}}
{{--                                                    <h6 class="col-md-12">{{ __('Custom_fields') }}</h6>--}}
{{--                                                    <div class="form-group col-md-6">--}}
{{--                                                        <label for="custom_field_corona" class="form-control-label">{{ __('Corona_vaccine_doses') }}</label>--}}
{{--                                                        <textarea id="custom_field_corona" name="custom_field_corona" class="form-control">{{ old('custom_field_corona') }}</textarea>--}}
{{--                                                    </div>--}}

{{--                                                    <div class="form-group col-md-6">--}}
{{--                                                        <label for="custom_field_notes" class="form-control-label">{{ __('Notes') }}</label>--}}
{{--                                                        <textarea id="custom_field_notes" name="custom_field_notes" class="form-control">{{ old('custom_field_notes') }}</textarea>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="modal-footer">--}}
{{--                                            <button type="button" class="btn btn-outline-light border me-2" data-bs-dismiss="modal">Cancel</button>--}}
{{--                                            <button type="submit" class="btn btn-primary">Save</button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="tab-pane fade" id="salaryModal" role="tabpanel" aria-labelledby="salary-tab">--}}
{{--                                        <div class="modal-body">--}}
{{--                                            <fieldset>--}}
{{--                                                <h2>{{ __('salary_and_allowances') }}</h2>--}}
{{--                                                <hr>--}}
{{--                                                <div class="row">--}}
{{--                                                    <!-- Payment Types -->--}}
{{--                                                    <div class="col-md-12">--}}
{{--                                                        <label class="form-label">{{ __('Payment_details') }}</label>--}}
{{--                                                        <div class="d-flex">--}}
{{--                                                            <div class="form-check me-3">--}}
{{--                                                                <input type="radio" id="cash" name="payment_type" value="cash" class="form-check-input" checked>--}}
{{--                                                                <label for="cash" class="form-check-label">{{ __('cash') }}</label>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="form-check me-3">--}}
{{--                                                                <input type="radio" id="bank" name="payment_type" value="bank" class="form-check-input">--}}
{{--                                                                <label for="bank" class="form-check-label">{{ __('bank') }}</label>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="form-check me-3">--}}
{{--                                                                <input type="radio" id="cheque" name="payment_type" value="cheque" class="form-check-input">--}}
{{--                                                                <label for="cheque" class="form-check-label">{{ __('cheque') }}</label>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="form-check">--}}
{{--                                                                <input type="radio" id="international_transfer" name="payment_type" value="international_transfer" class="form-check-input">--}}
{{--                                                                <label for="international_transfer" class="form-check-label">{{ __('international_transfer') }}</label>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}

{{--                                                    <!-- Dynamic Content Sections -->--}}
{{--                                                    <div class="col-md-12 mt-4">--}}
{{--                                                        <!-- Bank Details -->--}}
{{--                                                        <div id="bankDetails" class="d-none">--}}

{{--                                                            <div class="row">--}}
{{--                                                                <!-- Employee Account Type Dropdown -->--}}
{{--                                                                <div class="col-md-6">--}}
{{--                                                                    <label for="employee_account_type" class="form-label">{{ __('employee_account_type') }}</label>--}}
{{--                                                                    <select name="employee_account_type" id="employee_account_type" class="form-control">--}}
{{--                                                                        <option value="0">{{ __('salary_card') }}</option>--}}
{{--                                                                        <option value="1">{{ __('bank_account') }}</option>--}}
{{--                                                                    </select>--}}
{{--                                                                </div>--}}

{{--                                                                <!-- Salary Card Number Info -->--}}
{{--                                                                <div class="col-md-6" id="salary_card_number_info">--}}
{{--                                                                    <label for="salary_card_number" class="form-label">{{ __('salary_card_number') }}</label>--}}
{{--                                                                    <input type="text" name="salary_card_number" id="salary_card_number" class="form-control" value="{{ old('salary_card_number') }}">--}}
{{--                                                                </div>--}}

{{--                                                                <!-- IBAN Number Info -->--}}
{{--                                                                <div class="col-md-6 d-none" id="IBAN_number_info">--}}
{{--                                                                    <label for="IBAN_number" class="form-label">{{ __('IBAN_number') }}</label>--}}
{{--                                                                    <input type="text" name="IBAN_number" id="IBAN_number" class="form-control" value="{{ old('IBAN_number') }}">--}}
{{--                                                                </div>--}}

{{--                                                                <!-- Bank Name Dropdown -->--}}
{{--                                                                <div class="col-md-6">--}}
{{--                                                                    <label for="bank_id" class="form-label">{{ __('bank_name') }}</label>--}}
{{--                                                                    <select name="bank_id" id="bank_id" class="form-control">--}}
{{--                                                                        <option value="">{{ __('select_bank') }}</option>--}}
{{--                                                                        @foreach ($banks as $id => $name)--}}
{{--                                                                            <option value="{{ $name->id }}" {{ old('bank_id') == $id ? 'selected' : '' }}>{{ $name->name }}</option>--}}
{{--                                                                        @endforeach--}}
{{--                                                                    </select>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}


{{--                                                        </div>--}}

{{--                                                        <!-- International Transfer Details -->--}}
{{--                                                        <div id="internationalTransferDetails" class="col-md-12 d-none mt-3">--}}
{{--                                                            <div class="row g-3">--}}
{{--                                                                <!-- Bank Name -->--}}
{{--                                                                <div class="col-md-4">--}}
{{--                                                                    <label for="bank_name" class="form-label">{{ __('bank_name') }}</label>--}}
{{--                                                                    <input type="text" name="bank_name" id="bank_name" class="form-control" value="{{ old('bank_name') }}">--}}
{{--                                                                </div>--}}

{{--                                                                <!-- Account Holder Name -->--}}
{{--                                                                <div class="col-md-4">--}}
{{--                                                                    <label for="account_holder_name" class="form-label">{{ __('account_holder_name') }}</label>--}}
{{--                                                                    <input type="text" name="account_holder_name" id="account_holder_name" class="form-control" value="{{ old('account_holder_name') }}">--}}
{{--                                                                </div>--}}

{{--                                                                <!-- Account Holder Name (Arabic) -->--}}
{{--                                                                <div class="col-md-4">--}}
{{--                                                                    <label for="account_holder_name_ar" class="form-label">{{ __('account_holder_name_ar') }}</label>--}}
{{--                                                                    <input type="text" name="account_holder_name_ar" id="account_holder_name_ar" class="form-control" value="{{ old('account_holder_name_ar') }}">--}}
{{--                                                                </div>--}}

{{--                                                                <!-- Branch Location -->--}}
{{--                                                                <div class="col-md-4">--}}
{{--                                                                    <label for="branch_location" class="form-label">{{ __('branch_name') }}</label>--}}
{{--                                                                    <input type="text" name="branch_location" id="branch_location" class="form-control" value="{{ old('branch_location') }}">--}}
{{--                                                                </div>--}}

{{--                                                                <!-- Branch Location (Arabic) -->--}}
{{--                                                                <div class="col-md-4">--}}
{{--                                                                    <label for="branch_location_ar" class="form-label">{{ __('branch_name_ar') }}</label>--}}
{{--                                                                    <input type="text" name="branch_location_ar" id="branch_location_ar" class="form-control" value="{{ old('branch_location_ar') }}">--}}
{{--                                                                </div>--}}

{{--                                                                <!-- SWIFT Code -->--}}
{{--                                                                <div class="col-md-4">--}}
{{--                                                                    <label for="swift_code" class="form-label">{{ __('swift_code') }}</label>--}}
{{--                                                                    <input type="text" name="swift_code" id="swift_code" class="form-control" value="{{ old('swift_code') }}">--}}
{{--                                                                </div>--}}

{{--                                                                <!-- Sort Code -->--}}
{{--                                                                <div class="col-md-4">--}}
{{--                                                                    <label for="sort_code" class="form-label">{{ __('sort_code') }}</label>--}}
{{--                                                                    <input type="text" name="sort_code" id="sort_code" class="form-control" value="{{ old('sort_code') }}">--}}
{{--                                                                </div>--}}

{{--                                                                <!-- Bank Country -->--}}
{{--                                                                <div class="col-md-4">--}}
{{--                                                                    <label for="bank_country" class="form-label">{{ __('country') }}</label>--}}
{{--                                                                    <input type="text" name="bank_country" id="bank_country" class="form-control" value="{{ old('bank_country') }}">--}}
{{--                                                                </div>--}}

{{--                                                                <!-- Account Number -->--}}
{{--                                                                <div class="col-md-4">--}}
{{--                                                                    <label for="account_number" class="form-label">{{ __('bank_account_number') }}</label>--}}
{{--                                                                    <input type="text" name="account_number" id="account_number" class="form-control" value="{{ old('account_number') }}">--}}
{{--                                                                </div>--}}

{{--                                                                <!-- IBAN Number -->--}}
{{--                                                                <div class="col-md-4">--}}
{{--                                                                    <label for="IBAN_number" class="form-label">{{ __('IBAN_number') }}</label>--}}
{{--                                                                    <input type="text" name="IBAN_number" id="IBAN_number" class="form-control" value="{{ old('IBAN_number') }}">--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <--}}

{{--                                                        </div>--}}

{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="row g-3">--}}
{{--                                                    <h6 class="col-md-12">{{ __('insurance') }}</h6>--}}

{{--                                                    <!-- Insurance Number -->--}}
{{--                                                    <div class="col-md-4">--}}
{{--                                                        <label for="insurance_number" class="form-label">{{ __('insurance_number') }}</label>--}}
{{--                                                        <input type="text" name="insurance_number" id="insurance_number" class="form-control" value="{{ old('insurance_number') }}">--}}
{{--                                                    </div>--}}

{{--                                                    <!-- Policy Number -->--}}
{{--                                                    <div class="col-md-4">--}}
{{--                                                        <label for="policy_number" class="form-label">{{ __('Policy_number') }}</label>--}}
{{--                                                        <input type="text" name="policy_number" id="policy_number" class="form-control" value="{{ old('policy_number') }}">--}}
{{--                                                    </div>--}}

{{--                                                    <!-- Insurance Start Date -->--}}
{{--                                                    <div class="col-md-4">--}}
{{--                                                        <label for="insurance_startdate" class="form-label">{{ __('insurance_startdate') }}</label>--}}
{{--                                                        <input type="text" name="insurance_startdate" id="insurance_startdate" class="form-control datetimepicker" value="{{ old('insurance_startdate') ?? now() }}">--}}
{{--                                                    </div>--}}

{{--                                                    <!-- Category -->--}}
{{--                                                    <div class="col-md-4">--}}
{{--                                                        <label for="category" class="form-label">{{ __('Category') }}</label>--}}
{{--                                                        <input type="text" name="category" id="category" class="form-control" value="{{ old('category') }}">--}}
{{--                                                    </div>--}}

{{--                                                    <!-- Cost -->--}}
{{--                                                    <div class="col-md-4">--}}
{{--                                                        <label for="cost" class="form-label">{{ __('Cost') }}</label>--}}
{{--                                                        <input type="text" name="cost" id="cost" class="form-control" value="{{ old('cost') }}">--}}
{{--                                                    </div>--}}

{{--                                                    <!-- Availability Health Insurance Council -->--}}
{{--                                                    <div class="col-md-4">--}}
{{--                                                        <label for="availability_health_insurance_council" class="form-label">{{ __('availability_health_insurance_council') }}</label>--}}
{{--                                                        <input type="text" name="availability_health_insurance_council" id="availability_health_insurance_council" class="form-control datetimepicker" value="{{ old('availability_health_insurance_council') ?? now() }}">--}}
{{--                                                    </div>--}}

{{--                                                    <!-- Health Insurance Council Start Date -->--}}
{{--                                                    <div class="col-md-4">--}}
{{--                                                        <label for="health_insurance_council_startdate" class="form-label">{{ __('health_insurance_council_startdate') }}</label>--}}
{{--                                                        <input type="text" name="health_insurance_council_startdate" id="health_insurance_council_startdate" class="form-control datetimepicker" value="{{ old('health_insurance_council_startdate') ?? now() }}">--}}
{{--                                                    </div>--}}

{{--                                                    <!-- Insurance Document -->--}}
{{--                                                    <div class="col-md-4">--}}
{{--                                                        <label for="insurance_document" class="form-label">{{ __('add_attachment') }}</label>--}}
{{--                                                        <input type="file" name="insurance_document" id="insurance_document" class="form-control">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </fieldset>--}}
{{--                                        </div>--}}
{{--                                        <div class="modal-footer">--}}
{{--                                            <button type="button" class="btn btn-outline-light border me-2" data-bs-dismiss="modal">Cancel</button>--}}
{{--                                            <button type="submit" class="btn btn-primary">Save</button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="tab-pane fade" id="jobModal" role="tabpanel" aria-labelledby="job-tab">--}}
{{--                                        <div class="modal-body">--}}
{{--                                            <h2>{{ __('job_information') }}</h2>--}}
{{--                                            <hr>--}}
{{--                                            <div class="row">--}}
{{--                                                <h6 class="col-md-12 my-2">{{ __('job_details') }}</h6>--}}

{{--                                                <!-- Join Date (Gregorian) -->--}}
{{--                                                <div class="form-group col-md-3 input-icon-start position-relative">--}}
{{--                                                    <div class="mb-3">--}}
{{--                                                        <label for="Join_date_gregorian" class="form-label">{{ __('Join_date_gregorian') }}</label>--}}
{{--                                                        <div class="input-icon-start position-relative">--}}
{{--                                                            <input type="text" name="Join_date_gregorian" id="Join_date_gregorian" class="form-control form-control-lg datetimepicker" placeholder="dd/mm/yyyy">--}}
{{--                                                            <span class="input-icon-addon">--}}
{{--                                                <i class="ti ti-calendar text-gray-7"></i>--}}
{{--                                            </span>--}}
{{--                                                            <div id="Join_date_gregorian_error" class="invalid-feedback"></div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

{{--                                                <!-- Join Date (Hijri) -->--}}
{{--                                                <div class="form-group col-md-3">--}}
{{--                                                    <label for="Join_date_hijri" class="form-label">{{ __('Join_date_hijri') }}</label>--}}
{{--                                                    <input type="text" class="form-control hijri-date-input" name="Join_date_hijri" id="Join_date_hijri" value="{{ old('Join_date_hijri') ?? now() }}">--}}
{{--                                                </div>--}}

{{--                                                <!-- Job Title -->--}}
{{--                                                <div class="form-group col-md-3">--}}
{{--                                                    <label for="jobtitle_id" class="form-label">{{ __('jobtitle') }}</label>--}}
{{--                                                    <select class="form-control" name="jobtitle_id" id="jobtitle_id">--}}
{{--                                                        @foreach($jobtitles as $id => $title)--}}
{{--                                                            <option value="{{ $title->id }}" {{ old('jobtitle_id') == $id ? 'selected' : '' }}>{{ $title->name }}</option>--}}
{{--                                                        @endforeach--}}
{{--                                                    </select>--}}
{{--                                                </div>--}}

{{--                                                <!-- Job Type -->--}}
{{--                                                <div class="form-group col-md-3">--}}
{{--                                                    <label for="work_time" class="form-label">{{ __('job_type') }}</label>--}}
{{--                                                    <select class="form-control" name="work_time" id="work_time">--}}
{{--                                                        @foreach($job_types as $id => $type)--}}
{{--                                                            <option value="{{ $type->id }}" {{ old('work_time') == $id ? 'selected' : '' }}>{{ $type->name }}</option>--}}
{{--                                                        @endforeach--}}
{{--                                                    </select>--}}
{{--                                                </div>--}}
{{--                                                <div class="row">--}}
{{--                                                    <!-- Work Unit -->--}}
{{--                                                    <div class="form-group col-md-3">--}}
{{--                                                        <label for="work_unit" class="form-label">{{ __('work_unit') }}</label>--}}
{{--                                                        <select class="form-control" name="work_unit" id="work_unit">--}}
{{--                                                            <option value="">{{   __('work_unit')}} /</option>--}}
{{--                                                            @foreach($work_units as $id => $unit)--}}
{{--                                                                <option value="{{ $unit->id }}" {{ old('work_unit') == $id ? 'selected' : '' }}>{{ $unit->name }}</option>--}}
{{--                                                            @endforeach--}}
{{--                                                        </select>--}}
{{--                                                    </div>--}}

{{--                                                    <!-- Class -->--}}
{{--                                                    <div class="form-group col-md-3">--}}
{{--                                                        <label for="class" class="form-label">{{ __('class') }}</label>--}}
{{--                                                        <select class="form-control" name="class" id="class">--}}
{{--                                                            @foreach($jobclasses as $id => $jobclass)--}}
{{--                                                                <option value="{{ $id }}" {{ old('class') == $id ? 'selected' : '' }}>{{ $jobclass }}</option>--}}
{{--                                                            @endforeach--}}
{{--                                                        </select>--}}
{{--                                                    </div>--}}

{{--                                                    <!-- Labor Hire Company -->--}}
{{--                                                    <div class="form-group col-md-3">--}}
{{--                                                        <label for="labor_hire_company" class="form-label">{{ __('labor_hire_company') }}</label>--}}
{{--                                                        <select class="form-control" name="labor_hire_company" id="labor_hire_company">--}}
{{--                                                            @foreach($laborCompanies as $id => $company)--}}
{{--                                                                <option value="{{ $company->id }}" {{ old('labor_hire_company') == $id ? 'selected' : '' }}>{{ $company->name }}</option>--}}
{{--                                                            @endforeach--}}
{{--                                                        </select>--}}
{{--                                                    </div>--}}

{{--                                                    <!-- Branch -->--}}
{{--                                                    <div class="form-group col-md-3">--}}
{{--                                                        <label for="branch_id" class="form-label">{{ __('Branch') }}</label>--}}
{{--                                                        <select class="form-control" name="branch_id" id="branch_id">--}}
{{--                                                            @foreach($branches as $id => $branch)--}}
{{--                                                                <option value="{{ $branch->id }}">{{ $branch->name }}</option>--}}
{{--                                                            @endforeach--}}
{{--                                                        </select>--}}
{{--                                                    </div>--}}



{{--                                                    <!-- Direct Manager -->--}}
{{--                                                    <div class="form-group col-md-3">--}}
{{--                                                        <label for="direct_manager" class="form-label">{{ __('direct_manager') }}</label>--}}
{{--                                                        <select class="form-control" name="direct_manager" id="direct_manager">--}}
{{--                                                            <option value="{{ auth()->user()->id }}">{{ __('Select Direct Manager') }}</option>--}}

{{--                                                            @if(count($employees) == 0)--}}
{{--                                                                {--}}
{{--                                                                <option value="{{ auth()->user()->id }}">{{ __('CEO') }}</option>--}}
{{--                                                                }--}}
{{--                                                            @else--}}
{{--                                                                @foreach($employees as $id => $employee)--}}
{{--                                                                    <option value="{{ $employee->id }}" {{ old('direct_manager') == $employee->id ? 'selected' : '' }}>{{ $employee->name }}</option>--}}
{{--                                                                @endforeach--}}
{{--                                                            @endif--}}
{{--                                                        </select>--}}
{{--                                                    </div>--}}

{{--                                                    <!-- Permission -->--}}
{{--                                                    <div class="form-group col-md-3">--}}
{{--                                                        <label for="permission" class="form-label">{{ __('Permission') }}</label>--}}
{{--                                                        <select class="form-control" name="permission" id="permission">--}}
{{--                                                            @foreach($roles as $id => $role)--}}
{{--                                                                <option value="{{ $role->id }}" {{ old('permission') == $id ? 'selected' : '' }}>{{ $role->name }}</option>--}}
{{--                                                            @endforeach--}}
{{--                                                        </select>--}}
{{--                                                    </div>--}}

{{--                                                    <!-- Uploading Record Permission -->--}}
{{--                                                    <div class="form-group col-md-4">--}}
{{--                                                        <div class="form-check mt-4">--}}
{{--                                                            <input type="checkbox" class="form-check-input" id="uploading_record_permission" name="uploading_record_permission" checked>--}}
{{--                                                            <label class="form-check-label" for="uploading_record_permission">--}}
{{--                                                                {{ __('The_possibility_of_uploading_the_record_without_regard_to_the_geographical_location') }}--}}
{{--                                                            </label>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="form-group col-md-2">--}}
{{--                                                        <label for="employee_on_probation" class="form-label">{{ __('Is_the_employee_on_probation') }}</label>--}}
{{--                                                        <div class="d-flex">--}}
{{--                                                            <!-- Yes Option -->--}}
{{--                                                            <div class="form-check me-3">--}}
{{--                                                                <input type="radio" id="yes" name="employee_on_probation" value="1" class="form-check-input">--}}
{{--                                                                <label class="form-check-label" for="yes">{{ __('yes') }}</label>--}}
{{--                                                            </div>--}}
{{--                                                            <!-- No Option -->--}}
{{--                                                            <div class="form-check">--}}
{{--                                                                <input type="radio" id="no" name="employee_on_probation" value="0" class="form-check-input" checked>--}}
{{--                                                                <label class="form-check-label" for="no">{{ __('no') }}</label>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}


{{--                                                </div>--}}

{{--                                            </div>--}}

{{--                                            <div class="row">--}}
{{--                                                <h6 class="col-md-12">{{ __('contract_details') }}</h6>--}}

{{--                                                <!-- Contract Type -->--}}
{{--                                                <div class="form-group col-md-3">--}}
{{--                                                    <label for="contract_type" class="form-label">{{ __('contract_type') }}</label>--}}
{{--                                                    <div class="d-flex">--}}
{{--                                                        <div class="form-check me-2">--}}
{{--                                                            <input class="form-check-input" type="radio" name="contract_type" id="limited_time" value="1" checked>--}}
{{--                                                            <label class="form-check-label" for="limited_time">{{ __('limited_time') }}</label>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="form-check">--}}
{{--                                                            <input class="form-check-input" type="radio" name="contract_type" id="unlimited_time" value="0">--}}
{{--                                                            <label class="form-check-label" for="unlimited_time">{{ __('unlimited_time') }}</label>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

{{--                                                <!-- Contract Duration -->--}}
{{--                                                <div class="form-group col-md-3">--}}
{{--                                                    <label for="contract_duration" class="form-label">{{ __('contract_duration') }}</label>--}}
{{--                                                    <div class="d-flex">--}}
{{--                                                        <div class="form-check me-2">--}}
{{--                                                            <input class="form-check-input" type="radio" name="contract_duration" id="1year" value="1" checked>--}}
{{--                                                            <label class="form-check-label" for="1year">{{ __('1year') }}</label>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="form-check">--}}
{{--                                                            <input class="form-check-input" type="radio" name="contract_duration" id="2year" value="2">--}}
{{--                                                            <label class="form-check-label" for="2year">{{ __('2year') }}</label>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                        <div class="modal-footer">--}}
{{--                                            <button type="button" class="btn btn-outline-light border me-2" data-bs-dismiss="modal">{{ __('Cancel') }}</button>--}}
{{--                                            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="tab-pane fade" id="annualModal" role="tabpanel" aria-labelledby="annual-tab">--}}
{{--                                        <div class="modal-body">--}}
{{--                                            <h2>{{ __('annual_leave_entitlement') }}</h2>--}}
{{--                                            <hr>--}}
{{--                                            <fieldset>--}}
{{--                                                <div class="row">--}}
{{--                                                    <div class="col-md-12">--}}
{{--                                                        <div class="mb-3">--}}
{{--                                                            <label for="annual_leave_entitlement" class="form-label">{{ __('annual_leave_entitlement') }}</label>--}}
{{--                                                            <input type="text" name="annual_leave_entitlement" id="annual_leave_entitlement"--}}
{{--                                                                   class="form-control" value="{{ old('annual_leave_entitlement') }}">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </fieldset>--}}
{{--                                        </div>--}}

{{--                                        <div class="modal-footer">--}}
{{--                                            <button type="button" class="btn btn-outline-light border me-2" data-bs-dismiss="modal">{{ __('Cancel') }}</button>--}}
{{--                                            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="tab-pane fade" id="lastModal" role="tabpanel" aria-labelledby="last-tab">--}}
{{--                                        <div class="modal-body">--}}
{{--                                            <h2>{{ __('Finish') }}</h2>--}}
{{--                                            <hr>--}}
{{--                                            <fieldset>--}}
{{--                                                <div class="row">--}}
{{--                                                    <!-- Shifts Section -->--}}
{{--                                                    <div class="col-md-6">--}}
{{--                                                        <h2>{{ __('shifts') }}</h2>--}}
{{--                                                        @foreach($employee_shifts as $shift)--}}
{{--                                                            <div class="form-check form-check-inline">--}}
{{--                                                                <input type="radio" id="shift_{{ $shift->id }}" value="{{ $shift->id }}" name="shift" class="form-check-input">--}}
{{--                                                                <label class="form-check-label" for="shift_{{ $shift->id }}">--}}
{{--                                                                    {{ $lang == '_ar' ? $shift->name_ar : $shift->name }}--}}
{{--                                                                </label>--}}
{{--                                                            </div>--}}
{{--                                                        @endforeach--}}
{{--                                                    </div>--}}

{{--                                                    <!-- Location Section -->--}}
{{--                                                    <div class="col-md-6">--}}
{{--                                                        <h2>{{ __('Location') }}</h2>--}}
{{--                                                        @foreach($employee_location as $location)--}}
{{--                                                            <div class="form-check form-check-inline">--}}
{{--                                                                <input type="radio" id="location_{{ $location->id }}" value="{{ $location->id }}" name="location" class="form-check-input">--}}
{{--                                                                <label class="form-check-label" for="location_{{ $location->id }}">--}}
{{--                                                                    {{ $lang == '_ar' ? $location->name_ar : $location->name }}--}}
{{--                                                                </label>--}}
{{--                                                            </div>--}}
{{--                                                        @endforeach--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </fieldset>--}}
{{--                                        </div>--}}

{{--                                        <div class="modal-footer">--}}
{{--                                            <button type="button" class="btn btn-outline-light border me-2" data-bs-dismiss="modal">{{ __('Cancel') }}</button>--}}
{{--                                            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                </div>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                --}}{{-- Success Modal --}}
{{--                <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">--}}
{{--                    <div class="modal-dialog">--}}
{{--                        <div class="modal-content">--}}
{{--                            <div class="modal-header">--}}
{{--                                <h5 class="modal-title" id="successModalLabel">Success</h5>--}}
{{--                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
{{--                            </div>--}}
{{--                            <div class="modal-body">--}}
{{--                                <!-- Success message will be injected here -->--}}
{{--                            </div>--}}
{{--                            <div class="modal-footer">--}}
{{--                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="closeAddEmployeeModal()">OK</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                --}}{{-- end Success Modal --}}


{{--                <div class="modal fade" id="addTaskModal" tabindex="-1" aria-labelledby="addTaskModalLabel" aria-hidden="true">--}}
{{--                    <div class="modal-dialog modal-dialog-centered modal-lg">--}}
{{--                        <div class="modal-content">--}}
{{--                            <!-- Modal Header -->--}}
{{--                            <div class="modal-header text-white">--}}
{{--                                <h5 class="modal-title" id="addTrainingModalLabel">{{ __('Add New Task') }}</h5>--}}
{{--                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>--}}
{{--                            </div>--}}
{{--                            <div class="modal-body">--}}
{{--                                <form action="{{route('tasks.store')}}" method="post" class="needs-validation" novalidate>--}}
{{--                                    @csrf--}}
{{--                                    <table class="table table-bordered">--}}
{{--                                        <thead>--}}
{{--                                        <tr>--}}
{{--                                            <th>{{ __('Field') }}</th>--}}
{{--                                            <th>{{ __('Input') }}</th>--}}
{{--                                        </tr>--}}
{{--                                        </thead>--}}
{{--                                        <tbody>--}}
{{--                                        <!-- Employee ID -->--}}
{{--                                        <tr>--}}
{{--                                            <td>{{ __('Employee ID') }}</td>--}}
{{--                                            <td>--}}
{{--                                                <select  name="employee_id" class="form-control select2" required>--}}
{{--                                                    <option  value=""   >{{ __('Select Employee') }}</option>--}}
{{--                                                    @foreach($employees as $id => $name)--}}
{{--                                                        <option value="{{ $name->id }}">{{ $name->name }}</option>--}}
{{--                                                    @endforeach--}}
{{--                                                </select>--}}
{{--                                                <div class="invalid-feedback">{{ __('Please select an employee.') }}</div>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}

{{--                                        <!-- Name Label -->--}}
{{--                                        <tr>--}}
{{--                                            <td>{{ __('Name Label') }}</td>--}}
{{--                                            <td>--}}
{{--                                                <input type="text" name="name" class="form-control" placeholder="{{ __('Enter Task Name') }}" required>--}}
{{--                                                <div class="invalid-feedback">{{ __('Please enter a name of task.') }}</div>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}

{{--                                        <!-- Start Date -->--}}
{{--                                        <tr>--}}
{{--                                            <td>{{ __('Start Date') }}</td>--}}
{{--                                            <td>--}}
{{--                                                <input type="text" name="start_date" class="form-control datepicker" placeholder="{{ __('Select Start Date') }}" required>--}}
{{--                                                <div class="invalid-feedback">{{ __('Please select a start date.') }}</div>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}

{{--                                        <!-- Due Date -->--}}
{{--                                        <tr>--}}
{{--                                            <td>{{ __('Due Date') }}</td>--}}
{{--                                            <td>--}}
{{--                                                <input type="text" name="due_date" class="form-control datepicker" placeholder="{{ __('Select Due Date') }}" required>--}}
{{--                                                <div class="invalid-feedback">{{ __('Please select a due date.') }}</div>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}

{{--                                        <!-- Status -->--}}
{{--                                        <tr>--}}
{{--                                            <td>{{ __('Status') }}</td>--}}
{{--                                            <td>--}}
{{--                                                <select name="status" class="form-control select2" required>--}}
{{--                                                    <option value="0">{{ __('Active') }}</option>--}}
{{--                                                    <option selected value="1">{{ __('Pending') }}</option>--}}
{{--                                                    <option value="2">{{ __('Canceled') }}</option>--}}
{{--                                                    <option value="3">{{ __('Finished') }}</option>--}}
{{--                                                </select>--}}
{{--                                                <div class="invalid-feedback">{{ __('Please select a status.') }}</div>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td>{{ __('Priority') }}</td>--}}
{{--                                            <td>--}}
{{--                                                <select name="priority" class="form-control select2" required>--}}
{{--                                                    <option value="0">{{ __('Low') }}</option>--}}
{{--                                                    <option value="1">{{ __('Medium') }}</option>--}}
{{--                                                    <option value="2">{{ __('High') }}</option>--}}
{{--                                                    <option value="3">{{ __('Critical') }}</option>--}}
{{--                                                </select>--}}
{{--                                                <div class="invalid-feedback">{{ __('Please select a priority.') }}</div>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                        <!-- Note -->--}}
{{--                                        <tr>--}}
{{--                                            <td>{{ __('Note') }}</td>--}}
{{--                                            <td>--}}
{{--                                                <textarea name="note" class="form-control" placeholder="{{ __('Enter Note') }}" rows="3"></textarea>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}

{{--                                        <!-- Priority -->--}}


{{--                                        <!-- Created By -->--}}
{{--                                        <tr>--}}
{{--                                            <td>{{ __('Created By') }}</td>--}}
{{--                                            <td>--}}
{{--                                                <input type="text"   value="{{ auth()->user()->name }}" class="form-control" disabled>--}}
{{--                                                <input type="text" hidden="" name="created_by" value="{{ auth()->user()->id }}" class="form-control" disabled>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                        </tbody>--}}
{{--                                    </table>--}}

{{--                                    <!-- Buttons -->--}}
{{--                                    <div class="text-end">--}}
{{--                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>--}}
{{--                                        <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>--}}
{{--                                    </div>--}}
{{--                                </form>--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}


            @endsection

