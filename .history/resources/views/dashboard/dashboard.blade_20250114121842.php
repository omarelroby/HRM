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
            <div class="col-xxl-4 d-flex">
                <div class="card flex-fill">
                    <div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">
                        <h5 class="mb-2">Employees By Department</h5>
                        <div class="dropdown mb-2">
                            <a href="javascript:void(0);" class="btn btn-white border btn-sm d-inline-flex align-items-center" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ti ti-calendar me-1"></i>This Week
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end p-3" style="">
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
                        <div id="emp-department" class="" style="min-height: 235px;"><div id="apexchartsf58g9sj5" class="apexcharts-canvas apexchartsf58g9sj5 apexcharts-theme-" style="width: 663px; height: 220px;"><svg id="SvgjsSvg1335" width="663" height="220" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)"><foreignObject x="0" y="0" width="663" height="220"><div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml" style="max-height: 110px;"></div><style type="text/css">
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
}</style></foreignObject><g id="SvgjsG1337" class="apexcharts-inner apexcharts-graphical" transform="translate(80.37272644042969, 10)"><defs id="SvgjsDefs1336"><linearGradient id="SvgjsLinearGradient1340" x1="0" y1="0" x2="0" y2="1"><stop id="SvgjsStop1341" stop-opacity="0.4" stop-color="rgba(216,227,240,0.4)" offset="0"></stop><stop id="SvgjsStop1342" stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)" offset="1"></stop><stop id="SvgjsStop1343" stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)" offset="1"></stop></linearGradient><clipPath id="gridRectMaskf58g9sj5"><rect id="SvgjsRect1345" width="570.7589092254639" height="171.46545384407042" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="gridRectBarMaskf58g9sj5"><rect id="SvgjsRect1346" width="574.7589092254639" height="175.46545384407042" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="gridRectMarkerMaskf58g9sj5"><rect id="SvgjsRect1347" width="570.7589092254639" height="171.46545384407042" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="forecastMaskf58g9sj5"></clipPath><clipPath id="nonForecastMaskf58g9sj5"></clipPath></defs><rect id="SvgjsRect1344" width="0" height="171.46545384407042" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke-dasharray="3" fill="url(#SvgjsLinearGradient1340)" class="apexcharts-xcrosshairs" y2="171.46545384407042" filter="none" fill-opacity="0.9"></rect><line id="SvgjsLine1371" x1="0" y1="171.46545384407042" x2="0" y2="177.46545384407042" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1372" x1="95.12648487091064" y1="171.46545384407042" x2="95.12648487091064" y2="177.46545384407042" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1373" x1="190.2529697418213" y1="171.46545384407042" x2="190.2529697418213" y2="177.46545384407042" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1374" x1="285.37945461273193" y1="171.46545384407042" x2="285.37945461273193" y2="177.46545384407042" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1375" x1="380.5059394836426" y1="171.46545384407042" x2="380.5059394836426" y2="177.46545384407042" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1376" x1="475.6324243545532" y1="171.46545384407042" x2="475.6324243545532" y2="177.46545384407042" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1377" x1="570.7589092254639" y1="171.46545384407042" x2="570.7589092254639" y2="177.46545384407042" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><g id="SvgjsG1367" class="apexcharts-grid"><g id="SvgjsG1368" class="apexcharts-gridlines-horizontal"><line id="SvgjsLine1379" x1="0" y1="28.577575640678404" x2="570.7589092254639" y2="28.577575640678404" stroke="#e5e7eb" stroke-dasharray="5" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1380" x1="0" y1="57.15515128135681" x2="570.7589092254639" y2="57.15515128135681" stroke="#e5e7eb" stroke-dasharray="5" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1381" x1="0" y1="85.73272692203521" x2="570.7589092254639" y2="85.73272692203521" stroke="#e5e7eb" stroke-dasharray="5" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1382" x1="0" y1="114.31030256271362" x2="570.7589092254639" y2="114.31030256271362" stroke="#e5e7eb" stroke-dasharray="5" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1383" x1="0" y1="142.887878203392" x2="570.7589092254639" y2="142.887878203392" stroke="#e5e7eb" stroke-dasharray="5" stroke-linecap="butt" class="apexcharts-gridline"></line></g><g id="SvgjsG1369" class="apexcharts-gridlines-vertical"></g><line id="SvgjsLine1386" x1="0" y1="171.46545384407042" x2="570.7589092254639" y2="171.46545384407042" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line><line id="SvgjsLine1385" x1="0" y1="1" x2="0" y2="171.46545384407042" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line></g><g id="SvgjsG1370" class="apexcharts-grid-borders"><line id="SvgjsLine1378" x1="0" y1="0" x2="570.7589092254639" y2="0" stroke="#e5e7eb" stroke-dasharray="5" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1384" x1="0" y1="171.4654538440704" x2="570.7589092254639" y2="171.4654538440704" stroke="#e5e7eb" stroke-dasharray="5" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1412" x1="0" y1="171.46545384407042" x2="570.7589092254639" y2="171.46545384407042" stroke="#e0e0e0" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt"></line><line id="SvgjsLine1433" x1="0" y1="1" x2="0" y2="171.46545384407042" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt"></line></g><g id="SvgjsG1350" class="apexcharts-bar-series apexcharts-plot-series"><g id="SvgjsG1351" class="apexcharts-series" rel="1" seriesName="Employee" data:realIndex="0"><path id="SvgjsPath1356" d="M 5.101 9.28771208322048 L 375.6069394836426 9.28771208322048 C 378.1069394836426 9.28771208322048 380.6069394836426 11.78771208322048 380.6069394836426 14.28771208322048 L 380.6069394836426 14.28986355745792 C 380.6069394836426 16.78986355745792 378.1069394836426 19.28986355745792 375.6069394836426 19.28986355745792 L 5.101 19.28986355745792 C 2.601 19.28986355745792 0.101 16.78986355745792 0.101 14.28986355745792 L 0.101 14.28771208322048 C 0.101 11.78771208322048 2.601 9.28771208322048 5.101 9.28771208322048 Z " fill="rgba(255,111,40,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area undefined" index="0" clip-path="url(#gridRectBarMaskf58g9sj5)" pathTo="M 5.101 9.28771208322048 L 375.6069394836426 9.28771208322048 C 378.1069394836426 9.28771208322048 380.6069394836426 11.78771208322048 380.6069394836426 14.28771208322048 L 380.6069394836426 14.28986355745792 C 380.6069394836426 16.78986355745792 378.1069394836426 19.28986355745792 375.6069394836426 19.28986355745792 L 5.101 19.28986355745792 C 2.601 19.28986355745792 0.101 16.78986355745792 0.101 14.28986355745792 L 0.101 14.28771208322048 C 0.101 11.78771208322048 2.601 9.28771208322048 5.101 9.28771208322048 Z " pathFrom="M 0.101 9.28771208322048 L 0.101 9.28771208322048 L 0.101 19.28986355745792 L 0.101 19.28986355745792 L 0.101 19.28986355745792 L 0.101 19.28986355745792 L 0.101 19.28986355745792 L 0.101 9.28771208322048 Z" cy="37.86528772389889" cx="380.6059394836426" j="0" val="80" barHeight="10.002151474237442" barWidth="380.5059394836426"></path><path id="SvgjsPath1358" d="M 5.100999999999999 37.86528772389889 L 518.2966667900085 37.86528772389889 C 520.7966667900085 37.86528772389889 523.2966667900085 40.36528772389889 523.2966667900085 42.86528772389889 L 523.2966667900085 42.86743919813633 C 523.2966667900085 45.36743919813633 520.7966667900085 47.86743919813633 518.2966667900085 47.86743919813633 L 5.100999999999999 47.86743919813633 C 2.6009999999999995 47.86743919813633 0.101 45.36743919813633 0.101 42.86743919813633 L 0.101 42.86528772389889 C 0.101 40.36528772389889 2.6009999999999995 37.86528772389889 5.100999999999999 37.86528772389889 Z " fill="rgba(255,111,40,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area undefined" index="0" clip-path="url(#gridRectBarMaskf58g9sj5)" pathTo="M 5.100999999999999 37.86528772389889 L 518.2966667900085 37.86528772389889 C 520.7966667900085 37.86528772389889 523.2966667900085 40.36528772389889 523.2966667900085 42.86528772389889 L 523.2966667900085 42.86743919813633 C 523.2966667900085 45.36743919813633 520.7966667900085 47.86743919813633 518.2966667900085 47.86743919813633 L 5.100999999999999 47.86743919813633 C 2.6009999999999995 47.86743919813633 0.101 45.36743919813633 0.101 42.86743919813633 L 0.101 42.86528772389889 C 0.101 40.36528772389889 2.6009999999999995 37.86528772389889 5.100999999999999 37.86528772389889 Z " pathFrom="M 0.101 37.86528772389889 L 0.101 37.86528772389889 L 0.101 47.86743919813633 L 0.101 47.86743919813633 L 0.101 47.86743919813633 L 0.101 47.86743919813633 L 0.101 47.86743919813633 L 0.101 37.86528772389889 Z" cy="66.44286336457729" cx="523.2956667900086" j="1" val="110" barHeight="10.002151474237442" barWidth="523.1956667900085"></path><path id="SvgjsPath1360" d="M 5.101 66.44286336457729 L 375.6069394836426 66.44286336457729 C 378.1069394836426 66.44286336457729 380.6069394836426 68.94286336457729 380.6069394836426 71.44286336457729 L 380.6069394836426 71.44501483881473 C 380.6069394836426 73.94501483881473 378.1069394836426 76.44501483881473 375.6069394836426 76.44501483881473 L 5.101 76.44501483881473 C 2.601 76.44501483881473 0.101 73.94501483881473 0.101 71.44501483881473 L 0.101 71.44286336457729 C 0.101 68.94286336457729 2.601 66.44286336457729 5.101 66.44286336457729 Z " fill="rgba(255,111,40,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area undefined" index="0" clip-path="url(#gridRectBarMaskf58g9sj5)" pathTo="M 5.101 66.44286336457729 L 375.6069394836426 66.44286336457729 C 378.1069394836426 66.44286336457729 380.6069394836426 68.94286336457729 380.6069394836426 71.44286336457729 L 380.6069394836426 71.44501483881473 C 380.6069394836426 73.94501483881473 378.1069394836426 76.44501483881473 375.6069394836426 76.44501483881473 L 5.101 76.44501483881473 C 2.601 76.44501483881473 0.101 73.94501483881473 0.101 71.44501483881473 L 0.101 71.44286336457729 C 0.101 68.94286336457729 2.601 66.44286336457729 5.101 66.44286336457729 Z " pathFrom="M 0.101 66.44286336457729 L 0.101 66.44286336457729 L 0.101 76.44501483881473 L 0.101 76.44501483881473 L 0.101 76.44501483881473 L 0.101 76.44501483881473 L 0.101 76.44501483881473 L 0.101 66.44286336457729 Z" cy="95.0204390052557" cx="380.6059394836426" j="2" val="80" barHeight="10.002151474237442" barWidth="380.5059394836426"></path><path id="SvgjsPath1362" d="M 5.101 95.0204390052557 L 90.22748487091064 95.0204390052557 C 92.72748487091064 95.0204390052557 95.22748487091064 97.5204390052557 95.22748487091064 100.0204390052557 L 95.22748487091064 100.02259047949313 C 95.22748487091064 102.52259047949313 92.72748487091064 105.02259047949313 90.22748487091064 105.02259047949313 L 5.101 105.02259047949313 C 2.601 105.02259047949313 0.101 102.52259047949313 0.101 100.02259047949313 L 0.101 100.0204390052557 C 0.101 97.5204390052557 2.601 95.0204390052557 5.101 95.0204390052557 Z " fill="rgba(255,111,40,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area undefined" index="0" clip-path="url(#gridRectBarMaskf58g9sj5)" pathTo="M 5.101 95.0204390052557 L 90.22748487091064 95.0204390052557 C 92.72748487091064 95.0204390052557 95.22748487091064 97.5204390052557 95.22748487091064 100.0204390052557 L 95.22748487091064 100.02259047949313 C 95.22748487091064 102.52259047949313 92.72748487091064 105.02259047949313 90.22748487091064 105.02259047949313 L 5.101 105.02259047949313 C 2.601 105.02259047949313 0.101 102.52259047949313 0.101 100.02259047949313 L 0.101 100.0204390052557 C 0.101 97.5204390052557 2.601 95.0204390052557 5.101 95.0204390052557 Z " pathFrom="M 0.101 95.0204390052557 L 0.101 95.0204390052557 L 0.101 105.02259047949313 L 0.101 105.02259047949313 L 0.101 105.02259047949313 L 0.101 105.02259047949313 L 0.101 105.02259047949313 L 0.101 95.0204390052557 Z" cy="123.5980146459341" cx="95.22648487091064" j="3" val="20" barHeight="10.002151474237442" barWidth="95.12648487091064"></path><path id="SvgjsPath1364" d="M 5.101 123.5980146459341 L 280.48045461273193 123.5980146459341 C 282.98045461273193 123.5980146459341 285.48045461273193 126.09801464593409 285.48045461273193 128.5980146459341 L 285.48045461273193 128.60016612017154 C 285.48045461273193 131.10016612017154 282.98045461273193 133.60016612017154 280.48045461273193 133.60016612017154 L 5.101 133.60016612017154 C 2.601 133.60016612017154 0.101 131.10016612017154 0.101 128.60016612017154 L 0.101 128.5980146459341 C 0.101 126.09801464593409 2.601 123.5980146459341 5.101 123.5980146459341 Z " fill="rgba(255,111,40,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area undefined" index="0" clip-path="url(#gridRectBarMaskf58g9sj5)" pathTo="M 5.101 123.5980146459341 L 280.48045461273193 123.5980146459341 C 282.98045461273193 123.5980146459341 285.48045461273193 126.09801464593409 285.48045461273193 128.5980146459341 L 285.48045461273193 128.60016612017154 C 285.48045461273193 131.10016612017154 282.98045461273193 133.60016612017154 280.48045461273193 133.60016612017154 L 5.101 133.60016612017154 C 2.601 133.60016612017154 0.101 131.10016612017154 0.101 128.60016612017154 L 0.101 128.5980146459341 C 0.101 126.09801464593409 2.601 123.5980146459341 5.101 123.5980146459341 Z " pathFrom="M 0.101 123.5980146459341 L 0.101 123.5980146459341 L 0.101 133.60016612017154 L 0.101 133.60016612017154 L 0.101 133.60016612017154 L 0.101 133.60016612017154 L 0.101 133.60016612017154 L 0.101 123.5980146459341 Z" cy="152.1755902866125" cx="285.47945461273196" j="4" val="60" barHeight="10.002151474237442" barWidth="285.37945461273193"></path><path id="SvgjsPath1366" d="M 5.101 152.1755902866125 L 470.7334243545532 152.1755902866125 C 473.2334243545532 152.1755902866125 475.7334243545532 154.6755902866125 475.7334243545532 157.1755902866125 L 475.7334243545532 157.17774176084995 C 475.7334243545532 159.67774176084995 473.2334243545532 162.17774176084995 470.7334243545532 162.17774176084995 L 5.101 162.17774176084995 C 2.601 162.17774176084995 0.101 159.67774176084995 0.101 157.17774176084995 L 0.101 157.1755902866125 C 0.101 154.6755902866125 2.601 152.1755902866125 5.101 152.1755902866125 Z " fill="rgba(255,111,40,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area undefined" index="0" clip-path="url(#gridRectBarMaskf58g9sj5)" pathTo="M 5.101 152.1755902866125 L 470.7334243545532 152.1755902866125 C 473.2334243545532 152.1755902866125 475.7334243545532 154.6755902866125 475.7334243545532 157.1755902866125 L 475.7334243545532 157.17774176084995 C 475.7334243545532 159.67774176084995 473.2334243545532 162.17774176084995 470.7334243545532 162.17774176084995 L 5.101 162.17774176084995 C 2.601 162.17774176084995 0.101 159.67774176084995 0.101 157.17774176084995 L 0.101 157.1755902866125 C 0.101 154.6755902866125 2.601 152.1755902866125 5.101 152.1755902866125 Z " pathFrom="M 0.101 152.1755902866125 L 0.101 152.1755902866125 L 0.101 162.17774176084995 L 0.101 162.17774176084995 L 0.101 162.17774176084995 L 0.101 162.17774176084995 L 0.101 162.17774176084995 L 0.101 152.1755902866125 Z" cy="180.75316592729092" cx="475.73242435455325" j="5" val="100" barHeight="10.002151474237442" barWidth="475.6324243545532"></path><g id="SvgjsG1353" class="apexcharts-bar-goals-markers"><g id="SvgjsG1355" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskf58g9sj5)"></g><g id="SvgjsG1357" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskf58g9sj5)"></g><g id="SvgjsG1359" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskf58g9sj5)"></g><g id="SvgjsG1361" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskf58g9sj5)"></g><g id="SvgjsG1363" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskf58g9sj5)"></g><g id="SvgjsG1365" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskf58g9sj5)"></g></g><g id="SvgjsG1354" class="apexcharts-bar-shadows apexcharts-hidden-element-shown"></g></g><g id="SvgjsG1352" class="apexcharts-datalabels apexcharts-hidden-element-shown" data:realIndex="0"></g></g><line id="SvgjsLine1387" x1="0" y1="0" x2="570.7589092254639" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1388" x1="0" y1="0" x2="570.7589092254639" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1413" class="apexcharts-yaxis apexcharts-xaxis-inversed" rel="0"><g id="SvgjsG1414" class="apexcharts-yaxis-texts-g apexcharts-xaxis-inversed-texts-g" transform="translate(0, 0)"><text id="SvgjsText1416" font-family="Helvetica, Arial, sans-serif" x="-15" y="15.58776853127913" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1417">UI/UX</tspan><title>UI/UX</title></text><text id="SvgjsText1419" font-family="Helvetica, Arial, sans-serif" x="-15" y="44.165344171957535" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1420">Development</tspan><title>Development</title></text><text id="SvgjsText1422" font-family="Helvetica, Arial, sans-serif" x="-15" y="72.74291981263593" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1423">Management</tspan><title>Management</title></text><text id="SvgjsText1425" font-family="Helvetica, Arial, sans-serif" x="-15" y="101.32049545331434" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1426">HR</tspan><title>HR</title></text><text id="SvgjsText1428" font-family="Helvetica, Arial, sans-serif" x="-15" y="129.89807109399274" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1429">Testing</tspan><title>Testing</title></text><text id="SvgjsText1431" font-family="Helvetica, Arial, sans-serif" x="-15" y="158.47564673467116" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1432">Marketing</tspan><title>Marketing</title></text></g></g><g id="SvgjsG1389" class="apexcharts-xaxis apexcharts-yaxis-inversed"><g id="SvgjsG1390" class="apexcharts-xaxis-texts-g" transform="translate(0, -8.666666666666666)"><text id="SvgjsText1391" font-family="Helvetica, Arial, sans-serif" x="570.7589092254639" y="201.46545384407042" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#111827" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1393">120</tspan><title>120</title></text><text id="SvgjsText1394" font-family="Helvetica, Arial, sans-serif" x="475.5324243545532" y="201.46545384407042" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#111827" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1396">100</tspan><title>100</title></text><text id="SvgjsText1397" font-family="Helvetica, Arial, sans-serif" x="380.30593948364265" y="201.46545384407042" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#111827" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1399">80</tspan><title>80</title></text><text id="SvgjsText1400" font-family="Helvetica, Arial, sans-serif" x="285.079454612732" y="201.46545384407042" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#111827" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1402">60</tspan><title>60</title></text><text id="SvgjsText1403" font-family="Helvetica, Arial, sans-serif" x="189.8529697418213" y="201.46545384407042" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#111827" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1405">40</tspan><title>40</title></text><text id="SvgjsText1406" font-family="Helvetica, Arial, sans-serif" x="94.62648487091064" y="201.46545384407042" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#111827" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1408">20</tspan><title>20</title></text><text id="SvgjsText1409" font-family="Helvetica, Arial, sans-serif" x="-0.6000000000000227" y="201.46545384407042" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#111827" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1411">0</tspan><title>0</title></text></g></g><g id="SvgjsG1434" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1435" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1436" class="apexcharts-point-annotations"></g></g><g id="SvgjsG1348" class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)"></g><g id="SvgjsG1349" class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)"></g></svg><div class="apexcharts-tooltip apexcharts-theme-light" style="left: 460.373px; top: -45.7583px;"><div class="apexcharts-tooltip-title" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">UI/UX</div><div class="apexcharts-tooltip-series-group apexcharts-tooltip-series-group-0 apexcharts-active" style="order: 1; display: flex;"><span class="apexcharts-tooltip-marker" style="background-color: rgba(255, 111, 40, 0.85);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label">Employee: </span><span class="apexcharts-tooltip-text-y-value">80</span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>
                        <p class="fs-13"><i class="ti ti-circle-filled me-2 fs-8 text-primary"></i>No of
                            Employees increased by <span class="text-success fw-bold">+20%</span> from last Week
                        </p>
                    </div>
                </div>
            </div>
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
                paddingLeft: 0,
                paddingRight: 0,
                paddingTop: 20,
                paddingBottom: 20
            }));

            // Hide zoom-out button
            chart.zoomOutButton.set("forceHidden", true);

            // Create Y-axis renderer
            var yRenderer = am5xy.AxisRendererY.new(root, {
                minGridDistance: 30,
                minorGridEnabled: true,
                inversed: true,
                location: 1,
                width: am5.percent(40)
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
                width: am5.percent(70)
            });

            var xAxis = chart.xAxes.push(am5xy.ValueAxis.new(root, {
                maxDeviation: 0,
                min: 0,
                strictMinMax: true,
                extraMin: 0.01,
                extraMax: 0.01,
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

            // Set the same custom color for all columns
            series.columns.template.setAll({
                fill: am5.color("#f8864f"), // Your custom color
                stroke: am5.color("#f8864f")
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
                series.dataItems.sort(function (x, y) {
                    return y.get("valueX") - x.get("valueX");
                });

                am5.array.each(yAxis.dataItems, function (dataItem) {
                    var seriesDataItem = getSeriesItem(dataItem.get("category"));

                    if (seriesDataItem) {
                        var index = series.dataItems.indexOf(seriesDataItem);
                        var deltaPosition = (index - dataItem.get("index", 0)) / series.dataItems.length;
                        dataItem.set("index", index);
                        dataItem.set("deltaPosition", -deltaPosition);
                        dataItem.animate({
                            key: "deltaPosition",
                            to: 0,
                            duration: 1000,
                            easing: am5.ease.out(am5.ease.cubic)
                        });
                    }
                });

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
