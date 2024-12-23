@extends('dashboard.layouts.master')
@section('css')
<style type="text/css">
.apexcharts-flip-y {
transform: scaleY(-1) translateY(-100%);
transform-origin: top;
transform-box: fill-box;
}
.apexcharts-flip-x {
transform: scaleX(-1);
transform-origin: center;
transform-box: fill-box;
}
.apexcharts-legend {
display: flex;
overflow: auto;
padding: 0 10px;
}
.apexcharts-legend.apx-legend-position-bottom, .apexcharts-legend.apx-legend-position-top {
flex-wrap: wrap
}
.apexcharts-legend.apx-legend-position-right, .apexcharts-legend.apx-legend-position-left {
flex-direction: column;
bottom: 0;
}
.apexcharts-legend.apx-legend-position-bottom.apexcharts-align-left, .apexcharts-legend.apx-legend-position-top.apexcharts-align-left, .apexcharts-legend.apx-legend-position-right, .apexcharts-legend.apx-legend-position-left {
justify-content: flex-start;
}
.apexcharts-legend.apx-legend-position-bottom.apexcharts-align-center, .apexcharts-legend.apx-legend-position-top.apexcharts-align-center {
justify-content: center;
}
.apexcharts-legend.apx-legend-position-bottom.apexcharts-align-right, .apexcharts-legend.apx-legend-position-top.apexcharts-align-right {
justify-content: flex-end;
}
.apexcharts-legend-series {
cursor: pointer;
line-height: normal;
display: flex;
align-items: center;
}
.apexcharts-legend-text {
position: relative;
font-size: 14px;
}
.apexcharts-legend-text *, .apexcharts-legend-marker * {
pointer-events: none;
}
.apexcharts-legend-marker {
position: relative;
display: flex;
align-items: center;
justify-content: center;
cursor: pointer;
margin-right: 1px;
}

.apexcharts-legend-series.apexcharts-no-click {
cursor: auto;
}
.apexcharts-legend .apexcharts-hidden-zero-series, .apexcharts-legend .apexcharts-hidden-null-series {
display: none !important;
}
.apexcharts-inactive-legend {
opacity: 0.45;
}</style>
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
                        <h3 class="mb-3">120/154 <span class="fs-12 fw-medium text-success"><i class="fa-solid fa-caret-up me-1"></i>+2.1%</span></h3>
                        <a href="attendance-employee.html" class="link-default">View Details</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex">
                <div class="card flex-fill">
                    <div class="card-body">
                        <span class="avatar rounded-circle bg-secondary mb-2">
                            <i class="ti ti-browser fs-16"></i>
                        </span>
                        <h6 class="fs-13 fw-medium text-default mb-1">Total No of Project's</h6>
                        <h3 class="mb-3">90/125 <span class="fs-12 fw-medium text-danger"><i class="fa-solid fa-caret-down me-1"></i>-2.1%</span></h3>
                        <a href="projects.html" class="link-default">View All</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex">
                <div class="card flex-fill">
                    <div class="card-body">
                        <span class="avatar rounded-circle bg-info mb-2">
                            <i class="ti ti-users-group fs-16"></i>
                        </span>
                        <h6 class="fs-13 fw-medium text-default mb-1">Total No of Clients</h6>
                        <h3 class="mb-3">69/86 <span class="fs-12 fw-medium text-danger"><i class="fa-solid fa-caret-down me-1"></i>-11.2%</span></h3>
                        <a href="clients.html" class="link-default">View All</a>
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
                        <h3 class="mb-3">225/28 <span class="fs-12 fw-medium text-success"><i class="fa-solid fa-caret-down me-1"></i>+11.2%</span></h3>
                        <a href="tasks.html" class="link-default">View All</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex">
                <div class="card flex-fill">
                    <div class="card-body">
                        <span class="avatar rounded-circle bg-purple mb-2">
                            <i class="ti ti-moneybag fs-16"></i>
                        </span>
                        <h6 class="fs-13 fw-medium text-default mb-1">Earnings</h6>
                        <h3 class="mb-3">$21445 <span class="fs-12 fw-medium text-success"><i class="fa-solid fa-caret-up me-1"></i>+10.2%</span></h3>
                        <a href="expenses.html" class="link-default">View All</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex">
                <div class="card flex-fill">
                    <div class="card-body">
                        <span class="avatar rounded-circle bg-danger mb-2">
                            <i class="ti ti-browser fs-16"></i>
                        </span>
                        <h6 class="fs-13 fw-medium text-default mb-1">Profit This Week</h6>
                        <h3 class="mb-3">$5,544 <span class="fs-12 fw-medium text-success"><i class="fa-solid fa-caret-up me-1"></i>+2.1%</span></h3>
                        <a href="purchase-transaction.html" class="link-default">View All</a>
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
                        <h3 class="mb-3">98 <span class="fs-12 fw-medium text-success"><i class="fa-solid fa-caret-up me-1"></i>+2.1%</span></h3>
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
                        <h6 class="fs-13 fw-medium text-default mb-1">New Hire</h6>
                        <h3 class="mb-3">45/48 <span class="fs-12 fw-medium text-danger"><i class="fa-solid fa-caret-down me-1"></i>-11.2%</span></h3>
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
                <div id="emp-department" class="" style="min-height: 235px;"><div id="apexchartsh725f0j7" class="apexcharts-canvas apexchartsh725f0j7 apexcharts-theme-" style="width: 401px; height: 220px;"><svg id="SvgjsSvg1837" width="401" height="220" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)"><foreignObject x="0" y="0" width="401" height="220"><div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml" style="max-height: 110px;">
                </div>
                <p class="fs-13"><i class="ti ti-circle-filled me-2 fs-8 text-primary"></i>No of
                    Employees increased by <span class="text-success fw-bold">+20%</span> from last Week
                </p>
            </div>
        </div>
    </div>
</div>
 
@endsection
@section('script')

var options = {
    series: [{
    data: [400, 430, 448, 470, 540, 580, 690, 1100, 1200, 1380]
  }],
    chart: {
    type: 'bar',
    height: 350
  },
  plotOptions: {
    bar: {
      borderRadius: 4,
      borderRadiusApplication: 'end',
      horizontal: true,
    }
  },
  dataLabels: {
    enabled: false
  },
  xaxis: {
    categories: ['South Korea', 'Canada', 'United Kingdom', 'Netherlands', 'Italy', 'France', 'Japan',
      'United States', 'China', 'Germany'
    ],
  }
  };

  var chart = new ApexCharts(document.querySelector("#chart"), options);
  chart.render();
@endsection
 
