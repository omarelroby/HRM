@extends('dashboard.layouts.master')
@include('dashboard.layouts.header')
@section('content')
    <div class="row">
            <div class="col-xxl-8 d-flex">
                <div class="row flex-fill">
                    <div class="col-md-3 d-flex">
                        <div class="card flex-fill">
                            <div class="card-body">
                                <span class="avatar rounded-circle bg-primary mb-2">
                                    <i class="ti ti-calendar-share fs-16"></i>
                                </span>
                                <h6 class="fs-13 fw-medium text-default mb-1">Attendance Overview</h6>
                                <h3 class="mb-3">{{ $employeesWithAttendance .'/' .$employees ??0 }} <span class="fs-12 fw-medium text-success">
                                    <i class="fa-solid fa-caret-up me-1"></i>{{ $employeesWithAttendance?round($employeesWithAttendance/$employees * 100,2) : 0}}%</span></h3>
                                <a href="attendance-employee.html" class="link-default">View All</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex">
                        <div class="card flex-fill">
                            <div class="card-body">
                                <span class="avatar rounded-circle bg-pink mb-2">
                                    <i class="ti ti-checklist fs-16"></i>
                                </span>
                                <h6 class="fs-13 fw-medium text-default mb-1">Total No of Tasks</h6>
                                <h3 class="mb-3">{{ $complete_tasks .'/' .$tasks }}<span class="fs-12 fw-medium text-success">
                                    <i class="fa-solid fa-caret-up me-1"></i>{{ $complete_tasks ? round($complete_tasks/$tasks * 100,2):0}}%%</span></h3>
                                <a href="tasks.html" class="link-default">View All</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex">
                        <div class="card flex-fill">
                            <div class="card-body">
                                <span class="avatar rounded-circle bg-success mb-2">
                                    <i class="ti ti-users-group fs-16"></i>
                                </span>
                                <h6 class="fs-13 fw-medium text-default mb-1">Job Applicants</h6>
                                <h3 class="mb-3">{{ $job_app ??'0'}} <span class="fs-12 fw-medium text-success"><i class="fa-solid fa-caret-up me-1"></i> </span></h3>
                                <a href="job-list.html" class="link-default">View All</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex">
                        <div class="card flex-fill">
                            <div class="card-body">
                                <span class="avatar rounded-circle bg-info mb-2">
                                    <i class="ti ti-users-group fs-16"></i>
                                </span>
                                <h6 class="fs-13 fw-medium text-default mb-1">Employee Requests</h6>
                                <h3 class="mb-3">{{ $emp_req ??0 }} <span class="fs-12 fw-medium text-info"><i class="fa-solid fa-caret-up me-1"></i> </span></h3>
                                <a href="job-list.html" class="link-default">View All</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex">
                        <div class="card flex-fill">
                            <div class="card-body">
                                <span class="avatar rounded-circle bg-dark mb-2">
                                    <i class="ti ti-user-star fs-16"></i>
                                </span>
                                <h6 class="fs-13 fw-medium text-default mb-1">Labor Hiring</h6>
                                <h3 class="mb-3">{{ $labor_hiring ??0}} <span class="fs-12 fw-medium text-dark"><i class="fa-solid fa-caret-up me-1"></i></span></h3>
                                <a href="candidates.html" class="link-default">View All</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex">
                        <div class="card flex-fill">
                            <div class="card-body">
                                <span class="avatar rounded-circle bg-secondary mb-2">
                                    <i class="ti ti-user-star fs-16"></i>
                                </span>
                                <h6 class="fs-13 fw-medium text-default mb-1">Trainers</h6>
                                <h3 class="mb-3">{{ $trainers ??'0' }} <span class="fs-12 fw-medium text-secondary"><i class="fa-solid fa-caret-up me-1"></i></span></h3>
                                <a href="candidates.html" class="link-default">View All</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex">
                        <div class="card flex-fill">
                            <div class="card-body">
                                <span class="avatar rounded-circle bg-danger mb-2">
                                    <i class="ti ti-user-star fs-16"></i>
                                </span>
                                <h6 class="fs-13 fw-medium text-default mb-1">Company Job Requests</h6>
                                <h3 class="mb-3">{{ $comp_requests ??0}} <span class="fs-12 fw-medium text-danger"><i class="fa-solid fa-caret-up me-1"></i></span></h3>
                                <a href="candidates.html" class="link-default">View All</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex">
                        <div class="card flex-fill">
                            <div class="card-body">
                                <span class="avatar rounded-circle bg-purple mb-2">
                                    <i class="ti ti-user-star fs-16"></i>
                                </span>
                                <h6 class="fs-13 fw-medium text-default mb-1">Orders</h6>
                                <h3 class="mb-3">{{ $orders ??'' }} <span class="fs-12 fw-medium text-purple"><i class="fa-solid fa-caret-up me-1"></i></span></h3>
                                <a href="candidates.html" class="link-default">View All</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            {{-- second widget --}}
            <div class="col-xxl-4 col-xl-6 d-flex">
                <div class="card flex-fill">
                    <div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">
                        <h5 class="mb-2">Employees By Department</h5>

                    </div>
                    <div class="card-body">
                        <div id="chartdiv">
                            <!-- Chart will render here -->
                        </div>
                    </div>
                </div>

            </div>
        </div>
            <div class="row">

            {{-- check in out widget --}}
            <div class="col-xxl-4 col-xl-6 d-flex">
                <div class="card flex-fill">
            <div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">
            <h5 class="mb-2">Clock-In/Out</h5>
            <div class="d-flex align-items-center">
            <div class="dropdown mb-2">


            </div>
            <div class="dropdown mb-2">


            </div>
            </div>
            </div>
            <div class="card-body">
            <div>
            @foreach ($attend_emp as $emp)
            <div class="mb-3 p-2 border br-5">
            <div class="d-flex align-items-center justify-content-between">
                @php
                    // Convert the clock_in and clock_out times to Unix timestamps
                    $clock_in_timestamp = strtotime($emp->clock_in);
                    $clock_out_timestamp = strtotime($emp->clock_out);

                    // Calculate the difference in seconds
                    $time_diff_seconds = $clock_out_timestamp - $clock_in_timestamp;

                    // Convert seconds to minutes
                    $time_diff_minutes = $time_diff_seconds / 60;

                    // Get hours and minutes
                    $hours = floor($time_diff_minutes / 60);
                    $minutes = $time_diff_minutes % 60;
                @endphp

                <div class="d-flex align-items-center">
                    <div class="ms-2">
                        <h6 class="fs-14 fw-medium text-truncate">{{ $emp->employee->name ?? '' }}</h6>
                        <h6 class="fs-14 fw-medium text-truncate"></h6>
                        <p class="fs-13">{{ $emp->employee->department->name ?? '' }}</p>
                    </div>
                </div>

                <div class="d-flex align-items-center">
                    <a href="javascript:void(0);" class="link-default me-2"><i class="ti ti-clock-share"></i></a>
                    <span class="fs-10 fw-medium d-inline-flex align-items-center badge badge-success">
                        <i class="ti ti-circle-filled fs-5 me-1"></i>{{ $hours }} hrs {{ $minutes }} min
                    </span>
                </div>
            </div>

            @php
            $clock_in = date('h:i A', strtotime($emp->clock_in)); // Convert clock_in to h:i A format
            $clock_out = date('h:i A', strtotime($emp->clock_out)); // Convert clock_out to h:i A format
            $late = date('h:i', strtotime($emp->late));
            @endphp


            <div class="d-flex align-items-center justify-content-between flex-wrap mt-2 border br-5 p-2 pb-0">
                <div>
                    <p class="mb-1 d-inline-flex align-items-center">
                        <i class="ti ti-circle-filled text-success fs-5 me-1"></i>Clock In
                    </p>
                    <h6 class="fs-13 fw-normal mb-2">{{ $clock_in ?? '' }}</h6>
                </div>
                <div>
                    <p class="mb-1 d-inline-flex align-items-center">
                        <i class="ti ti-circle-filled text-danger fs-5 me-1"></i>Clock Out
                    </p>
                    <h6 class="fs-13 fw-normal mb-2">{{ $clock_out ?? '' }}</h6>
                </div>
                <div>
                    <p class="mb-1 d-inline-flex align-items-center">
                        <i class="ti ti-circle-filled text-warning fs-5 me-1"></i>late
                    </p>
                    <h6 class="fs-13 fw-normal mb-2">{{  $emp->late  ?? '' }}  </h6>
                </div>
                {{-- <div>
                    <p class="mb-1 d-inline-flex align-items-center">
                        <i class="ti ti-circle-filled text-warning fs-5 me-1"></i>Production
                    </p>
                    <h6 class="fs-13 fw-normal mb-2">09:21 Hrs</h6>
                </div> --}}
            </div>
            </div>
            @endforeach

            </div>

            <a href="attendance-report.html" class="btn btn-light btn-md w-100">View All Attendance</a>
            </div>
            </div>
            </div>
            {{-- end check in out widget --}}

{{-- attendance overview --}}
<div class="col-xxl-4 col-xl-6 d-flex">
    <div class="card flex-fill">
        <div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">
            <h5 class="mb-2">Attendance Overview</h5>

        </div>
        <div class="card-body">
            <div class="d-flex align-items-center">
                <a href="javascript:void(0);" class="link-default me-2"><i class="ti ti-clock-share"></i></a>
                <span class="fs-10 fw-medium d-inline-flex align-items-center badge badge-success">
                    <i class="ti ti-circle-filled fs-5 me-1"></i>9:00 AM (Clock In)
                </span>
            </div>
            <div class="d-flex align-items-center">
                <a href="javascript:void(0);" class="link-default me-2"><i class="ti ti-clock-share"></i></a>
                <span class="fs-10 fw-medium d-inline-flex align-items-center badge badge-danger">
                    <i class="ti ti-circle-filled fs-5 me-1"></i>5:00 PM (Clock Out)
                </span>
            </div>

            <div id="attendanceChart" style="height: 250px;"></div>

            <h6 class="mb-3">Status</h6>

            <div class="d-flex align-items-center justify-content-between">
                <p class="f-13 mb-2"><i class="ti ti-circle-filled" style="color: #4a7fe0;" me-1></i>Coming Early</p>
                <p class="f-13 fw-medium text-gray-9 mb-2">{{ $early_arrivals->count() }} Employee</p>
            </div>
            <div class="d-flex align-items-center justify-content-between">
                <p class="f-13 mb-2"><i class="ti ti-circle-filled" style="color: #e7513e;" me-1></i>Coming Late</p>
                <p class="f-13 fw-medium text-gray-9 mb-2">{{ $late_arrivals->count() }} Employee</p>
            </div>
            <div class="d-flex align-items-center justify-content-between mb-2">
                <p class="f-13 mb-2"><i class="ti ti-circle-filled" style="color: #11c866;" me-1></i>Absent</p>
                <p class="f-13 fw-medium text-gray-9 mb-2">{{ $absent_employees }} Employee</p>
            </div>


        </div>
    </div>
</div>
{{-- end attendance overview --}}
{{-- Job Applicants Widget --}}
<div class="col-xxl-4 d-flex">
    <div class="card flex-fill">
        <div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">
            <h5 class="mb-2">Job Applicants</h5>
            <a href="#" class="btn btn-light btn-md mb-2">View All</a>
        </div>
        <div class="card-body">
            {{-- Tabs Navigation --}}
            <ul class="nav nav-tabs tab-style-1 nav-justified d-sm-flex d-block p-0 mb-4" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link fw-medium" data-bs-toggle="tab" data-bs-target="#openings" href="#openings" role="tab">Opening Job Positions</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link fw-medium active" data-bs-toggle="tab" data-bs-target="#applicants" href="#applicants" role="tab">Job Applicants</a>
                </li>
            </ul>

            <div class="tab-content">
                {{-- Openings Tab --}}
                <div class="tab-pane fade" id="openings" role="tabpanel">
                    @foreach ($openings as $index => $job)
                        <div class="d-flex align-items-center justify-content-between mb-4 p-3"
                            style="background-color: {{ $index % 2 === 0 ? '#f1f8ff' : '#f9f9f9' }}; border-radius: 8px;">
                            <div class="d-flex align-items-center">
                                <div class="ms-2 overflow-hidden">
                                    <p class="text-dark fw-medium text-truncate mb-0">
                                        <a href="#" class="text-primary fw-bold">{{ $job->title ?? '' }}</a>
                                    </p>
                                    <span class="fs-12 text-secondary fw-bold">
                                        No of Openings: {{ $job->position ?? 0 }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Applicants Tab --}}
                <div class="tab-pane fade active show" id="applicants" role="tabpanel">
                    @foreach ($applicants as $applicant)
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="d-flex align-items-center">
                                <div class="ms-2 overflow-hidden">
                                    <p class="text-truncate mb-0">
                                        <a href="#" class="text-dark fw-bold">{{ $applicant->name ?? '' }}</a>
                                    </p>
                                    <span class="fs-13 d-inline-flex align-items-center">
                                        <span class="text-secondary fst-italic">
                                            {{ $applicant->jobRelation->title ?? 'Unknown Job' }}
                                        </span>
                                    </span>
                                </div>
                            </div>
                            <span class="badge badge-xs text-white" style="background-color: #F26522;">
                                {{ $applicant->jobRelation->title ?? 'Unknown' }}
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
{{-- End Job Applicants Widget --}}
{{-- Employees Widgets --}}
<div class="col-xxl-4 col-xl-6 d-flex">
    <div class="card flex-fill">
        <div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">
            <h5 class="mb-2">Employees</h5>
            <a href="employees.html" class="btn btn-light btn-md mb-2">View All</a>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-nowrap mb-0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Department</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php
                    $badgeColors = ['badge-primary', 'badge-success', 'badge-info', 'badge-warning', 'badge-danger']; // Add your desired colors here
                    @endphp
                    @foreach ($all_employees as $index => $employee)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="ms-2">
                                    <h6 class="fw-medium"><a href="javascript:void(0);">{{ $employee->name }}</a></h6>
                                    <span class="fs-12">{{ $employee->department->name??'' }}</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            @php
                                $badgeColor = $badgeColors[$index % count($badgeColors)]; // Cycle through the colors
                            @endphp
                            <span class="badge {{ $badgeColor }} badge-xs">
                                {{ $employee->department->name ??"" }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
{{-- End Employees Widgets --}}

 {{-- Card for End Dates --}}

 <div class="col-xxl-8 d-flex">
    <div class="card flex-fill">
        <div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">
            <h5 class="mb-2">Employee End Dates</h5>
            <div class="d-flex align-items-center">
                <a href="javascript:void(0);" class="link-default me-2"><i class="ti ti-calendar-filled"></i></a>
                <span class="fs-10 fw-medium d-inline-flex align-items-center badge badge-danger">
                    <i class="ti ti-circle-filled fs-5 me-1"></i>Expired Last 3 Months
                </span>
            </div>
            <a href="#" class="btn btn-light btn-md mb-2">View All</a>
        </div>
        <div class="card-body">
            {{-- Tabs Navigation --}}
            <ul class="nav nav-tabs tab-style-1 nav-justified d-sm-flex d-block p-0 mb-4" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link fw-medium active" data-bs-toggle="tab" data-bs-target="#insurance-tab" href="#insurance-tab" role="tab">Insurance End Date</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link fw-medium" data-bs-toggle="tab" data-bs-target="#worker-tab" href="#worker-tab" role="tab">Worker End Date</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link fw-medium" data-bs-toggle="tab" data-bs-target="#contract-tab" href="#contract-tab" role="tab">Contract End Date</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link fw-medium" data-bs-toggle="tab" data-bs-target="#residence-tab" href="#residence-tab" role="tab">Residence Expiry Date</a>
                </li>
            </ul>

            {{-- Tab Content --}}
            <div class="tab-content">
                {{-- Insurance End Date Tab --}}
                <div class="tab-pane fade active show" id="insurance-tab" role="tabpanel">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Employee Name</th>
                                <th>Insurance End Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($records as $employee)
                                <tr>
                                    <td>{{ $employee->employees->name ?? 'N/A'}}</td>
                                    <td>{{ $employee->insurance_enddate ?? 'N/A' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Worker End Date Tab --}}
                <div class="tab-pane fade" id="worker-tab" role="tabpanel">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Employee ID</th>
                                <th>Worker End Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($records as $employee)
                                <tr>
                                    <td>{{ $employee->employees->name ?? 'N/A'}}</td>
                                    <td>{{ $employee->worker_enddate ?? 'N/A' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Contract End Date Tab --}}
                <div class="tab-pane fade" id="contract-tab" role="tabpanel">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Employee ID</th>
                                <th>Contract End Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($records as $employee)
                                <tr>
                                    <td>{{ $employee->employees->name ?? 'N/A'}}</td>
                                    <td>{{ $employee->contract_enddate ?? 'N/A' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Residence Expiry Date Tab --}}
                <div class="tab-pane fade" id="residence-tab" role="tabpanel">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Employee ID</th>
                                <th>Residence Expiry Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($records as $employee)
                                <tr>
                                    <td>{{ $employee->employees->name ?? 'N/A'}}</td>
                                    <td>{{ $employee->residence_expiredate ?? 'N/A' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

 {{-- End Card for End Dates --}}
{{-- Card for Task Status --}}
<div class="col-xxl-4 col-xl-6 d-flex">
    <div class="card flex-fill">
        <div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">
            <h5 class="mb-2">Tasks Statistics</h5>
            <a href="#" class="btn btn-light btn-md mb-2">View All</a>
        </div>
        <canvas id="taskStatusChart" width="400" height="400"></canvas>
        <div id="taskStatusPercentages" class="mt-3 text-center"></div>
    </div>
</div>
{{-- End Card for Task Status --}}
{{-- Tasks Widget --}}
<div class="col-xxl-4 col-xl-6 d-flex">
    <div class="card flex-fill">
        <div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">
            <h5 class="mb-2">Tasks</h5>
            <a href="tasks.html" class="btn btn-light btn-md mb-2">View All</a>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-nowrap mb-0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Priority</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php
                    $priorityLabels = ['Low', 'Medium', 'High', 'Critical']; // Customize priorities if needed
                    $badgeColors = ['badge-success', 'badge-warning', 'badge-danger', 'badge-dark']; // Customize colors
                    @endphp
                    @foreach ($all_tasks as $task)
                    <tr>
                        <td>
                            <h6 class="fw-medium"><a href="javascript:void(0);">{{ $task->name }}</a></h6>
                        </td>
                        <td>{{ $task->start_date ? \Carbon\Carbon::parse($task->start_date)->format('Y-m-d') : '-' }}</td>
                        <td>{{ $task->due_date ? \Carbon\Carbon::parse($task->due_date)->format('Y-m-d') : '-' }}</td>
                        <td>
                            @php
                                $priorityIndex = $task->priority - 1; // Assuming priority is 1-based
                                $priorityIndex = $priorityIndex >= 0 && $priorityIndex < count($priorityLabels) ? $priorityIndex : 0; // Fallback
                                $badgeColor = $badgeColors[$priorityIndex];
                            @endphp
                            <span class="badge {{ $badgeColor }} badge-xs">
                                {{ $priorityLabels[$priorityIndex] }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
{{-- End Tasks Widget --}}



@endsection
@push('scripts')
<script>
        document.addEventListener("DOMContentLoaded", function () {
            var departmentNames = @json($departmentNames ?? []); // Fallback to empty array if null
            var employeeCounts = @json($total_employees ?? []); // Fallback to empty array if null

            // Check if the chart container exists
            var chartContainer = document.getElementById("emp-departments");
            if (!chartContainer) {
                console.error("Chart container with ID 'emp-department' not found.");
                return;
            }

            // Validate data before rendering the chart
            if (departmentNames.length === 0 || employeeCounts.length === 0) {
                console.error("Data for departments or employee counts is missing or invalid.");
                return;
            }

            if (departmentNames.length !== employeeCounts.length) {
                console.error("Mismatch in data: departmentNames and employeeCounts must have the same length.");
                return;
            }

            // Chart configuration
            var ctx = chartContainer.getContext('2d');
            var chart = new Chart(ctx, {
                type: 'bar', // Bar chart
                data: {
                    labels: departmentNames, // X-axis labels (department names)
                    datasets: [{
                        label: 'Number of Employees',
                        data: employeeCounts, // Y-axis data (employee counts)
                        backgroundColor: '#ea642b', // Bar color
                        borderColor: '#ea642b', // Border color
                        borderWidth: 1,
                        borderRadius: 10, // Rounded corners for bars
                        barPercentage: 0.8, // Adjust bar width
                    }]
                },
                options: {
                    indexAxis: 'y', // Horizontal bar chart
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false // Hide legend
                        },
                        tooltip: {
                            enabled: true, // Enable tooltips
                            callbacks: {
                                label: function (context) {
                                    return context.raw + " employees"; // Tooltip format
                                }
                            }
                        }
                    },
                    scales: {
                        x: {
                            beginAtZero: true, // Start X-axis from zero
                            title: {
                                display: true,
                                text: 'Number of Employees', // X-axis title
                                font: {
                                    size: 14,
                                    weight: 'bold'
                                }
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Departments', // Y-axis title
                                font: {
                                    size: 14,
                                    weight: 'bold'
                                }
                            }
                        }
                    }
                }
            });
        });
</script>
<script>
let attendanceChart;
document.addEventListener('DOMContentLoaded', function () {
    if (attendanceChart) {
        attendanceChart.destroy();
    }

    // Fetch dynamic data from backend
    var earlyArrivalsCount = @json($early_arrivals->count() ?? 0);  // Count of early arrivals
    var lateArrivalsCount = @json($late_arrivals->count() ?? 0);    // Count of late arrivals
    var absentEmployeesCount = @json($absent_employees  ?? 0);  // Count of absent employees

    // Chart options
    var options = {
        chart: {
            type: 'donut',
            height: 250
        },
        series: [earlyArrivalsCount, lateArrivalsCount, absentEmployeesCount], // Dynamic attendance data
        labels: ['Coming Early', 'Coming Late', 'Absent'],
        colors: ['#4a7fe0', '#e7513e', '#11c866'], // New custom colors
        legend: {
            position: 'bottom'
        },
    };

    // Initialize the chart
    attendanceChart = new ApexCharts(document.querySelector("#attendanceChart"), options);
    attendanceChart.render();
});
const ctx = document.getElementById('mySemiDonutChart').getContext('2d');


</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const chartData = @json($chartData);

    // Check the data in the console
    console.log('Chart Data:', chartData);

    // Calculate total tasks
    const totalTasks = chartData.completed + chartData.pending + chartData.canceled;

    // Initialize the chart
    const ctx = document.getElementById('taskStatusChart').getContext('2d');
    const taskStatusChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Completed', 'Pending', 'Canceled'],
            datasets: [{
                data: [chartData.completed, chartData.pending, chartData.canceled],
                backgroundColor: ['#4CAF50', '#FFC107', '#F44336'],
                borderWidth: 2,
            }]
        },
        options: {
            rotation: -90,
            circumference: 180,
            cutout: '70%',
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        font: {
                            size: 14
                        }
                    }
                },
                tooltip: {
                    enabled: true
                }
            }
        }
    });


    // Display percentages below the chart
    const percentagesContainer = document.getElementById('taskStatusPercentages');
    const percentagesHTML = `
        <div class="row">
            <div class="col-4 text-success">
                <strong>Completed:</strong> ${(chartData.completed / totalTasks * 100).toFixed(1)}%
            </div>
            <div class="col-4 text-warning">
                <strong>Pending:</strong> ${(chartData.pending / totalTasks * 100).toFixed(1)}%
            </div>
            <div class="col-4 text-danger">
                <strong>Canceled:</strong> ${(chartData.canceled / totalTasks * 100).toFixed(1)}%
            </div>
        </div>
    `;
    percentagesContainer.innerHTML = percentagesHTML;
});
</script>
<style>
    #chartdiv {
      width: 100%;
      height: 500px;
    }
    </style>

    <!-- Resources -->
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <!-- Chart container -->
<div id="chartdiv" style="width: 100%; height: 600px;"></div>

<!-- Chart code -->
<script>
    am5.ready(function() {

        // Create root element
        var root = am5.Root.new("chartdiv");

        // Set themes
        root.setThemes([
          am5themes_Animated.new(root)
        ]);

        // Create chart
        var chart = root.container.children.push(am5xy.XYChart.new(root, {
          panX: false,
          panY: false,
          wheelX: "none",
          wheelY: "none",
          paddingLeft: 0, // No padding on the left since Y-axis is on the right
          paddingRight: 0, // No padding on the right
          paddingTop: 20,
          paddingBottom: 20
        }));

        // Hide zoom-out button
        chart.zoomOutButton.set("forceHidden", true);

        var yRenderer = am5xy.AxisRendererY.new(root, {
   minGridDistance: 30,
   minorGridEnabled: true,
   inversed: true,
   location: 1,
   width: am5.percent(40) // Adjust as necessary
});

yRenderer.labels.template.setAll({
   fontSize: 14,
   maxWidth: 150,
   oversizedBehavior: "wrap",
   textAlign: "right",
   tooltipText: "{category}"
});

var yAxis = chart.yAxes.push(am5xy.CategoryAxis.new(root, {
   maxDeviation: 0,
   categoryField: "network",
   renderer: yRenderer,
   tooltip: am5.Tooltip.new(root, { themeTags: ["axis"] })
}));


        // Create X-axis
        var xRenderer = am5xy.AxisRendererX.new(root, {
          strokeOpacity: 0.1,
          minGridDistance: 80,
          width: am5.percent(70) // X-axis takes 70% of the chart width
        });

        var xAxis = chart.xAxes.push(am5xy.ValueAxis.new(root, {
          maxDeviation: 0,
          min: 0,
          strictMinMax: true, // Ensure the axis strictly adheres to min and max values
          extraMin: 0.01, // Reduce extra space at the start of the X-axis
          extraMax: 0.01, // Reduce extra space at the end of the X-axis
          numberFormatter: am5.NumberFormatter.new(root, {
            "numberFormat": "#,###a"
          }),
          renderer: xRenderer
        }));

        // Add series
        var series = chart.series.push(am5xy.ColumnSeries.new(root, {
          name: "Series 1",
          xAxis: xAxis,
          yAxis: yAxis,
          valueXField: "value",
          categoryYField: "network",
          tooltip: am5.Tooltip.new(root, {
            pointerOrientation: "left",
            labelText: "{valueX}"
          })
        }));

        // Rounded corners for columns
        series.columns.template.setAll({
          cornerRadiusTR: 5,
          cornerRadiusBR: 5,
          strokeOpacity: 0
        });

        // Make each column a different color
        series.columns.template.adapters.add("fill", function (fill, target) {
          return chart.get("colors").getIndex(series.columns.indexOf(target));
        });

        series.columns.template.adapters.add("stroke", function (stroke, target) {
          return chart.get("colors").getIndex(series.columns.indexOf(target));
        });

        // Set data dynamically from PHP
        var departmentNames = @json($departmentNames);
        var totalEmployees = @json($total_employees);

        var data = departmentNames.map((name, index) => {
            return {
                network: name,
                value: totalEmployees[index]
            };
        });

        yAxis.data.setAll(data);
        series.data.setAll(data);
        sortCategoryAxis();

        // Get series item by category
        function getSeriesItem(category) {
          for (var i = 0; i < series.dataItems.length; i++) {
            var dataItem = series.dataItems[i];
            if (dataItem.get("categoryY") == category) {
              return dataItem;
            }
          }
        }

        // Axis sorting
        function sortCategoryAxis() {
          // Sort by value
          series.dataItems.sort(function (x, y) {
            return y.get("valueX") - x.get("valueX"); // Sort in descending order
          });

          // Go through each axis item
          am5.array.each(yAxis.dataItems, function (dataItem) {
            // Get corresponding series item
            var seriesDataItem = getSeriesItem(dataItem.get("category"));

            if (seriesDataItem) {
              // Get index of series data item
              var index = series.dataItems.indexOf(seriesDataItem);
              // Calculate delta position
              var deltaPosition = (index - dataItem.get("index", 0)) / series.dataItems.length;
              // Set index to be the same as series data item index
              dataItem.set("index", index);
              // Set deltaPosition instantly
              dataItem.set("deltaPosition", -deltaPosition);
              // Animate delta position to 0
              dataItem.animate({
                key: "deltaPosition",
                to: 0,
                duration: 1000,
                easing: am5.ease.out(am5.ease.cubic)
              });
            }
          });

          // Sort axis items by index
          yAxis.dataItems.sort(function (x, y) {
            return x.get("index") - y.get("index");
          });
        }

        // Make stuff animate on load
        series.appear(1000);
        chart.appear(1000, 100);

    }); // end am5.ready()
</script>

@endpush
