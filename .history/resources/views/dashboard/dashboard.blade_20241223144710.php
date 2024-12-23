@extends('dashboard.layouts.master')
@section('css')

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
            @endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Prepare data dynamically from Blade
        var departmentNames = @json($departmentNames); // Get department names
        var employeeCounts = @json($total_employees); // Get employee counts

        var options = {
            series: [{
                data: employeeCounts
            }],
            chart: {
                type: 'bar',
                height: 350
            },
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    horizontal: true, // Horizontal bar chart
                }
            },
            dataLabels: {
                enabled: false
            },
            xaxis: {
                categories: departmentNames,
            }
        };

        var chart = new ApexCharts(document.querySelector("#emp-department"), options);
        chart.render(); // Render the chart
    });
    </script>



@endsection
