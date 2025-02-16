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

</style>
@endsection
@section('content')

<div class="row">
    <div class="col-xxl-4 d-flex">
        <div class="row flex-fill">
            <div class="col-md-6 d-flex">
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
            <div class="col-md-6 d-flex">
                <div class="card flex-fill">
                    <div class="card-body">
                        <span class="avatar rounded-circle bg-pink mb-2">
                            <i class="ti ti-checklist fs-16"></i>
                        </span>
                        <h6 class="fs-13 fw-medium text-default mb-1">Total No of Tasks</h6>
                        <h3 class="mb-3">{{ $complete_tasks .'/' .$tasks }}<span class="fs-12 fw-medium text-success">
                            <i class="fa-solid fa-caret-down me-1"></i>{{ round($complete_tasks/$tasks * 100,2) }}%%</span></h3>
                        <a href="tasks.html" class="link-default">View All</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 d-flex">
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
            <div class="col-md-6 d-flex">
                <div class="card flex-fill">
                    <div class="card-body">
                        <span class="avatar rounded-circle bg-dark mb-2">
                            <i class="ti ti-user-star fs-16"></i>
                        </span>
                        <h6 class="fs-13 fw-medium text-default mb-1">Labor Hiring</h6>
                        <h3 class="mb-3">{{ $labor_hiring }} <span class="fs-12 fw-medium text-success"><i class="fa-solid fa-caret-up me-1"></i></span></h3>
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
                                @foreach ($attend_emp as $emp )
                                <div class="mb-3 p-2 border br-5">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center">
                                            {{-- <a href="javascript:void(0);" class="avatar flex-shrink-0">
                                                <img src="{{ asset($emp->employee->login_image) ??'' }}" class="rounded-circle border border-2" alt="img">
                                            </a> --}}
                                            <div class="ms-2">
                                                <h6 class="fs-14 fw-medium text-truncate">{{ $emp->employee->name ??'' }}</h6>
                                                <h6 class="fs-14 fw-medium text-truncate"></h6>
                                                <p class="fs-13">{{ $emp->employee->department->name ??'' }}</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <a href="javascript:void(0);" class="link-default me-2"><i class="ti ti-clock-share"></i></a>
                                            <span class="fs-10 fw-medium d-inline-flex align-items-center badge badge-success"><i class="ti ti-circle-filled fs-5 me-1"></i>09:15</span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between flex-wrap mt-2 border br-5 p-2 pb-0">
                                        <div>
                                            <p class="mb-1 d-inline-flex align-items-center"><i class="ti ti-circle-filled text-success fs-5 me-1"></i>Clock In</p>
                                            <h6 class="fs-13 fw-normal mb-2">{{ Carbon::createFromFormat('H:i:s', $time)->format('h:i A')$emp->clock_in ??'' }}  </h6>
                                        </div>
                                        <div>
                                            <p class="mb-1 d-inline-flex align-items-center"><i class="ti ti-circle-filled text-danger fs-5 me-1"></i>Clock Out</p>
                                            <h6 class="fs-13 fw-normal mb-2">09:45 AM</h6>
                                        </div>
                                        <div>
                                            <p class="mb-1 d-inline-flex align-items-center"><i class="ti ti-circle-filled text-warning fs-5 me-1"></i>Production</p>
                                            <h6 class="fs-13 fw-normal mb-2">09:21 Hrs</h6>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <h6 class="mb-2">Late</h6>
                            <div class="d-flex align-items-center justify-content-between mb-3 p-2 border border-dashed br-5">
                                <div class="d-flex align-items-center">
                                    <span class="avatar flex-shrink-0">
                                        <img src="assets/img/profiles/avatar-29.jpg" class="rounded-circle border border-2" alt="img">
                                    </span>
                                    <div class="ms-2">
                                        <h6 class="fs-14 fw-medium text-truncate">Anthony Lewis <span class="fs-10 fw-medium d-inline-flex align-items-center badge badge-success"><i class="ti ti-clock-hour-11 me-1"></i>30 Min</span></h6>
                                        <p class="fs-13">Marketing Head</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <a href="javascript:void(0);" class="link-default me-2"><i class="ti ti-clock-share"></i></a>
                                    <span class="fs-10 fw-medium d-inline-flex align-items-center badge badge-danger"><i class="ti ti-circle-filled fs-5 me-1"></i>08:35</span>
                                </div>
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
