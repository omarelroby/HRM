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
                    <div class="dropdown mb-2">
                        <a href="javascript:void(0);" class="btn btn-white border btn-sm d-inline-flex align-items-center" data-bs-toggle="dropdown">
                            <i class="ti ti-calendar me-1"></i>This Week
                        </a>
                        <ul class="dropdown-menu  dropdown-menu-end p-3">
                            <li>
                                <a href="javascript:void(0);" class="dropdown-item rounded-1">This Month</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="dropdown-item rounded-1">This Week</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="dropdown-item rounded-1">Last Week</a>
                            </li>
                        </ul>
                    </div>
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
                                <div class="d-flex align-items-center justify-content-between mb-3 p-2 border border-dashed br-5">
                                    <div class="d-flex align-items-center">
                                        <a href="javascript:void(0);" class="avatar flex-shrink-0">
                                            <img src="assets/img/profiles/avatar-24.jpg" class="rounded-circle border border-2" alt="img">
                                        </a>
                                        <div class="ms-2">
                                            <h6 class="fs-14 fw-medium text-truncate">Daniel Esbella</h6>
                                            <p class="fs-13">UI/UX Designer</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <a href="javascript:void(0);" class="link-default me-2"><i class="ti ti-clock-share"></i></a>
                                        <span class="fs-10 fw-medium d-inline-flex align-items-center badge badge-success"><i class="ti ti-circle-filled fs-5 me-1"></i>09:15</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-3 p-2 border br-5">
                                    <div class="d-flex align-items-center">
                                        <a href="javascript:void(0);" class="avatar flex-shrink-0">
                                            <img src="assets/img/profiles/avatar-23.jpg" class="rounded-circle border border-2" alt="img">
                                        </a>
                                        <div class="ms-2">
                                            <h6 class="fs-14 fw-medium">Doglas Martini</h6>
                                            <p class="fs-13">Project Manager</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <a href="javascript:void(0);" class="link-default me-2"><i class="ti ti-clock-share"></i></a>
                                        <span class="fs-10 fw-medium d-inline-flex align-items-center badge badge-success"><i class="ti ti-circle-filled fs-5 me-1"></i>09:36</span>
                                    </div>
                                </div>
                                <div class="mb-3 p-2 border br-5">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <a href="javascript:void(0);" class="avatar flex-shrink-0">
                                                <img src="assets/img/profiles/avatar-27.jpg" class="rounded-circle border border-2" alt="img">
                                            </a>
                                            <div class="ms-2">
                                                <h6 class="fs-14 fw-medium text-truncate">Brian Villalobos</h6>
                                                <p class="fs-13">PHP Developer</p>
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
                                            <h6 class="fs-13 fw-normal mb-2">10:30 AM</h6>
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
   var departmentNames = @json($departmentNames) || [];
var employeeCounts = @json($total_employees) || [];

if (departmentNames.length === 0 || employeeCounts.length === 0) {
    document.querySelector("#emp-department").innerHTML = "<p class='text-center'>No data available</p>";
} else {
    var options = {
        series: [{ data: employeeCounts }],
        chart: { type: 'bar', height: 350 },
        colors: ['#ea642b'],
        plotOptions: {
            bar: { borderRadius: 4, horizontal: true }
        },
        dataLabels: { enabled: false },
        grid: { show: false },
        xaxis: { categories: departmentNames }
    };

    var chart = new ApexCharts(document.querySelector("#emp-department"), options);
    chart.render();
}

</script>
<script>
    function fetchDepartmentData(period = 'week') {
    fetch(`/get-department-data?period=${period}`)
        .then(response => response.json())
        .then(data => {
            const { departmentNames, total_employees } = data;

            // Update the chart dynamically
            chart.updateOptions({
                series: [{ data: total_employees }],
                xaxis: { categories: departmentNames },
            });
        })
        .catch(error => console.error("Error fetching data:", error));
}

// Example: Call this function based on dropdown selection
document.querySelectorAll('.filter-period').forEach(item => {
    item.addEventListener('click', function () {
        const period = this.dataset.period; // e.g., 'month', 'week', 'last-week'
        fetchDepartmentData(period);
    });
});

</script>


@endsection
