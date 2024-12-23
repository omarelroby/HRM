@extends('dashboard.layouts.master')
@section('css')
<style>
.card {
max-height: 300px; /* Adjust the height as needed */
overflow-y: auto; /* Adds a scroll bar for overflowing content */
}

.row {
    flex-wrap: nowrap; /* Prevents row elements from wrapping */
}

.col-xxl-4, .col-xl-6 {
    min-height: 300px; /* Ensures the columns maintain consistent height */
}

.card {
    max-height: 300px; /* Limits the maximum height */
    overflow-y: auto;  /* Adds a scrollbar for overflowing content */
}

.row {
    flex-wrap: nowrap; /* Prevents row elements from wrapping */
}

.col-xxl-4, .col-xl-6 {
    min-height: 300px; /* Ensures the columns maintain consistent height */
}

</style>
@endsection
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
                        <h3 class="mb-3">{{ $employeesWithAttendance .'/' .$employees }} <span class="fs-12 fw-medium text-success">
                            <i class="fa-solid fa-caret-up me-1"></i>{{ round($employeesWithAttendance/$employees * 100,2) }}%</span></h3>
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
                            <i class="fa-solid fa-caret-up me-1"></i>{{ round($complete_tasks/$tasks * 100,2) }}%%</span></h3>
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
                        <h3 class="mb-3">{{ $job_app }} <span class="fs-12 fw-medium text-success"><i class="fa-solid fa-caret-up me-1"></i> </span></h3>
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
                        <h3 class="mb-3">{{ $emp_req }} <span class="fs-12 fw-medium text-info"><i class="fa-solid fa-caret-up me-1"></i> </span></h3>
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
                        <h3 class="mb-3">{{ $labor_hiring }} <span class="fs-12 fw-medium text-dark"><i class="fa-solid fa-caret-up me-1"></i></span></h3>
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
                        <h3 class="mb-3">{{ $comp_requests }} <span class="fs-12 fw-medium text-danger"><i class="fa-solid fa-caret-up me-1"></i></span></h3>
                        <a href="candidates.html" class="link-default">View All</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{-- second widget --}}
    <div class="col-xxl-4 d-flex">
        <div class="card flex-fill">
                <div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">
                    <h5 class="mb-2">Employees By Department</h5>

                </div>
                <div class="card-body">
                    <div id="emp-department">
                        <!-- Chart will render here -->
                    </div>
                </div>
            </div>
    </div>
</div>
<div class="row">
        {{-- end widget --}}
                 {{-- check in out widget --}}
                 <div class="col-xxl-4 col-xl-6 d-flex">
                    <div class="card flex-fill">
                        <div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">
                            <h5 class="mb-2">Clock-In/Out</h5>
                            <div class="d-flex align-items-center">
                                <div class="dropdown mb-2">
                                    <a href="javascript:void(0);" class="dropdown-toggle btn btn-white btn-sm d-inline-flex align-items-center border-0 fs-13 me-2" data-bs-toggle="dropdown" aria-expanded="false">
                                        All Departments
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end p-3" style="">
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1">Finance</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1">Development</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1">Marketing</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="dropdown mb-2">
                                    <a href="javascript:void(0);" class="btn btn-white border btn-sm d-inline-flex align-items-center" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ti ti-calendar me-1"></i>Today
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end p-3" style="">
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1">This Month</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1">This Week</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1">Today</a>
                                        </li>
                                    </ul>
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
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Prepare data dynamically from Blade
        var departmentNames = @json($departmentNames); // Get department names
        var employeeCounts = @json($total_employees); // Get employee counts

        // Chart configuration
        var options = {
            series: [{
                data: employeeCounts
            }],
            chart: {
                type: 'bar',
                height: 350
            },
            colors: ['#ea642b'], // Set the bar color to orange
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    horizontal: true // Horizontal bar chart
                }
            },
            dataLabels: {
                enabled: false // Disable data labels
            },
            grid: {
                show: false // Disable grid lines
            },
            xaxis: {
                categories: departmentNames // X-axis categories
            }
        };

        // Initialize and render the chart
        var chart = new ApexCharts(document.querySelector("#emp-department"), options);
        chart.render();
    });
</script>



@endsection
