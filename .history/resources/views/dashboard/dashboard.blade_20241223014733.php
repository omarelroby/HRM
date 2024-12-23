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
                <div id="emp-department" style="min-height: 235px;" class=""><div id="apexchartsxhxxraba" class="apexcharts-canvas apexchartsxhxxraba apexcharts-theme-" style="width: 382px; height: 220px;"><svg id="SvgjsSvg1295" width="382" height="220" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)"><foreignObject x="0" y="0" width="382" height="220"><div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml" style="max-height: 110px;"></div><style type="text/css">
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
}</style></foreignObject><g id="SvgjsG1297" class="apexcharts-inner apexcharts-graphical" transform="translate(80.7568359375, 10)"><defs id="SvgjsDefs1296"><linearGradient id="SvgjsLinearGradient1300" x1="0" y1="0" x2="0" y2="1"><stop id="SvgjsStop1301" stop-opacity="0.4" stop-color="rgba(216,227,240,0.4)" offset="0"></stop><stop id="SvgjsStop1302" stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)" offset="1"></stop><stop id="SvgjsStop1303" stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)" offset="1"></stop></linearGradient><clipPath id="gridRectMaskxhxxraba"><rect id="SvgjsRect1305" width="289.3931636810303" height="171.70079907417298" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="gridRectBarMaskxhxxraba"><rect id="SvgjsRect1306" width="293.3931636810303" height="175.70079907417298" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="gridRectMarkerMaskxhxxraba"><rect id="SvgjsRect1307" width="289.3931636810303" height="171.70079907417298" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="forecastMaskxhxxraba"></clipPath><clipPath id="nonForecastMaskxhxxraba"></clipPath></defs><rect id="SvgjsRect1304" width="0" height="171.70079907417298" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke-dasharray="3" fill="url(#SvgjsLinearGradient1300)" class="apexcharts-xcrosshairs" y2="171.70079907417298" filter="none" fill-opacity="0.9"></rect><line id="SvgjsLine1331" x1="0" y1="171.70079907417298" x2="0" y2="177.70079907417298" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1332" x1="48.23219394683838" y1="171.70079907417298" x2="48.23219394683838" y2="177.70079907417298" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1333" x1="96.46438789367676" y1="171.70079907417298" x2="96.46438789367676" y2="177.70079907417298" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1334" x1="144.69658184051514" y1="171.70079907417298" x2="144.69658184051514" y2="177.70079907417298" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1335" x1="192.92877578735352" y1="171.70079907417298" x2="192.92877578735352" y2="177.70079907417298" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1336" x1="241.1609697341919" y1="171.70079907417298" x2="241.1609697341919" y2="177.70079907417298" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1337" x1="289.3931636810303" y1="171.70079907417298" x2="289.3931636810303" y2="177.70079907417298" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><g id="SvgjsG1327" class="apexcharts-grid"><g id="SvgjsG1328" class="apexcharts-gridlines-horizontal"><line id="SvgjsLine1339" x1="0" y1="28.616799845695496" x2="289.3931636810303" y2="28.616799845695496" stroke="#e5e7eb" stroke-dasharray="5" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1340" x1="0" y1="57.23359969139099" x2="289.3931636810303" y2="57.23359969139099" stroke="#e5e7eb" stroke-dasharray="5" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1341" x1="0" y1="85.85039953708649" x2="289.3931636810303" y2="85.85039953708649" stroke="#e5e7eb" stroke-dasharray="5" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1342" x1="0" y1="114.46719938278198" x2="289.3931636810303" y2="114.46719938278198" stroke="#e5e7eb" stroke-dasharray="5" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1343" x1="0" y1="143.08399922847747" x2="289.3931636810303" y2="143.08399922847747" stroke="#e5e7eb" stroke-dasharray="5" stroke-linecap="butt" class="apexcharts-gridline"></line></g><g id="SvgjsG1329" class="apexcharts-gridlines-vertical"></g><line id="SvgjsLine1346" x1="0" y1="171.70079907417298" x2="289.3931636810303" y2="171.70079907417298" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line><line id="SvgjsLine1345" x1="0" y1="1" x2="0" y2="171.70079907417298" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line></g><g id="SvgjsG1330" class="apexcharts-grid-borders"><line id="SvgjsLine1338" x1="0" y1="0" x2="289.3931636810303" y2="0" stroke="#e5e7eb" stroke-dasharray="5" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1344" x1="0" y1="171.70079907417295" x2="289.3931636810303" y2="171.70079907417295" stroke="#e5e7eb" stroke-dasharray="5" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1372" x1="0" y1="171.70079907417298" x2="289.3931636810303" y2="171.70079907417298" stroke="#e0e0e0" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt"></line><line id="SvgjsLine1393" x1="0" y1="1" x2="0" y2="171.70079907417298" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt"></line></g><g id="SvgjsG1310" class="apexcharts-bar-series apexcharts-plot-series"><g id="SvgjsG1311" class="apexcharts-series" rel="1" seriesName="Employee" data:realIndex="0"><path id="SvgjsPath1316" d="M 5.101 9.300459949851035 L 188.02977578735351 9.300459949851035 C 190.52977578735351 9.300459949851035 193.02977578735351 11.800459949851035 193.02977578735351 14.300459949851035 L 193.02977578735351 14.316339895844457 C 193.02977578735351 16.816339895844457 190.52977578735351 19.316339895844457 188.02977578735351 19.316339895844457 L 5.101 19.316339895844457 C 2.601 19.316339895844457 0.101 16.816339895844457 0.101 14.316339895844457 L 0.101 14.300459949851035 C 0.101 11.800459949851035 2.601 9.300459949851035 5.101 9.300459949851035 Z " fill="rgba(255,111,40,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area undefined" index="0" clip-path="url(#gridRectBarMaskxhxxraba)" pathTo="M 5.101 9.300459949851035 L 188.02977578735351 9.300459949851035 C 190.52977578735351 9.300459949851035 193.02977578735351 11.800459949851035 193.02977578735351 14.300459949851035 L 193.02977578735351 14.316339895844457 C 193.02977578735351 16.816339895844457 190.52977578735351 19.316339895844457 188.02977578735351 19.316339895844457 L 5.101 19.316339895844457 C 2.601 19.316339895844457 0.101 16.816339895844457 0.101 14.316339895844457 L 0.101 14.300459949851035 C 0.101 11.800459949851035 2.601 9.300459949851035 5.101 9.300459949851035 Z " pathFrom="M 0.101 9.300459949851035 L 0.101 9.300459949851035 L 0.101 19.316339895844457 L 0.101 19.316339895844457 L 0.101 19.316339895844457 L 0.101 19.316339895844457 L 0.101 19.316339895844457 L 0.101 9.300459949851035 Z" cy="37.91725979554653" cx="193.0287757873535" j="0" val="80" barHeight="10.015879945993424" barWidth="192.92877578735352"></path><path id="SvgjsPath1318" d="M 5.101 37.91725979554653 L 260.3780667076111 37.91725979554653 C 262.8780667076111 37.91725979554653 265.3780667076111 40.41725979554653 265.3780667076111 42.91725979554653 L 265.3780667076111 42.933139741539954 C 265.3780667076111 45.433139741539954 262.8780667076111 47.933139741539954 260.3780667076111 47.933139741539954 L 5.101 47.933139741539954 C 2.601 47.933139741539954 0.101 45.433139741539954 0.101 42.933139741539954 L 0.101 42.91725979554653 C 0.101 40.41725979554653 2.601 37.91725979554653 5.101 37.91725979554653 Z " fill="rgba(255,111,40,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area undefined" index="0" clip-path="url(#gridRectBarMaskxhxxraba)" pathTo="M 5.101 37.91725979554653 L 260.3780667076111 37.91725979554653 C 262.8780667076111 37.91725979554653 265.3780667076111 40.41725979554653 265.3780667076111 42.91725979554653 L 265.3780667076111 42.933139741539954 C 265.3780667076111 45.433139741539954 262.8780667076111 47.933139741539954 260.3780667076111 47.933139741539954 L 5.101 47.933139741539954 C 2.601 47.933139741539954 0.101 45.433139741539954 0.101 42.933139741539954 L 0.101 42.91725979554653 C 0.101 40.41725979554653 2.601 37.91725979554653 5.101 37.91725979554653 Z " pathFrom="M 0.101 37.91725979554653 L 0.101 37.91725979554653 L 0.101 47.933139741539954 L 0.101 47.933139741539954 L 0.101 47.933139741539954 L 0.101 47.933139741539954 L 0.101 47.933139741539954 L 0.101 37.91725979554653 Z" cy="66.53405964124202" cx="265.3770667076111" j="1" val="110" barHeight="10.015879945993424" barWidth="265.2770667076111"></path><path id="SvgjsPath1320" d="M 5.101 66.53405964124202 L 188.02977578735351 66.53405964124202 C 190.52977578735351 66.53405964124202 193.02977578735351 69.03405964124202 193.02977578735351 71.53405964124202 L 193.02977578735351 71.54993958723544 C 193.02977578735351 74.04993958723544 190.52977578735351 76.54993958723544 188.02977578735351 76.54993958723544 L 5.101 76.54993958723544 C 2.601 76.54993958723544 0.101 74.04993958723544 0.101 71.54993958723544 L 0.101 71.53405964124202 C 0.101 69.03405964124202 2.601 66.53405964124202 5.101 66.53405964124202 Z " fill="rgba(255,111,40,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area undefined" index="0" clip-path="url(#gridRectBarMaskxhxxraba)" pathTo="M 5.101 66.53405964124202 L 188.02977578735351 66.53405964124202 C 190.52977578735351 66.53405964124202 193.02977578735351 69.03405964124202 193.02977578735351 71.53405964124202 L 193.02977578735351 71.54993958723544 C 193.02977578735351 74.04993958723544 190.52977578735351 76.54993958723544 188.02977578735351 76.54993958723544 L 5.101 76.54993958723544 C 2.601 76.54993958723544 0.101 74.04993958723544 0.101 71.54993958723544 L 0.101 71.53405964124202 C 0.101 69.03405964124202 2.601 66.53405964124202 5.101 66.53405964124202 Z " pathFrom="M 0.101 66.53405964124202 L 0.101 66.53405964124202 L 0.101 76.54993958723544 L 0.101 76.54993958723544 L 0.101 76.54993958723544 L 0.101 76.54993958723544 L 0.101 76.54993958723544 L 0.101 66.53405964124202 Z" cy="95.15085948693752" cx="193.0287757873535" j="2" val="80" barHeight="10.015879945993424" barWidth="192.92877578735352"></path><path id="SvgjsPath1322" d="M 5.101 95.15085948693752 L 43.33319394683838 95.15085948693752 C 45.83319394683838 95.15085948693752 48.33319394683838 97.65085948693752 48.33319394683838 100.15085948693752 L 48.33319394683838 100.16673943293094 C 48.33319394683838 102.66673943293094 45.83319394683838 105.16673943293094 43.33319394683838 105.16673943293094 L 5.101 105.16673943293094 C 2.601 105.16673943293094 0.101 102.66673943293094 0.101 100.16673943293094 L 0.101 100.15085948693752 C 0.101 97.65085948693752 2.601 95.15085948693752 5.101 95.15085948693752 Z " fill="rgba(255,111,40,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area undefined" index="0" clip-path="url(#gridRectBarMaskxhxxraba)" pathTo="M 5.101 95.15085948693752 L 43.33319394683838 95.15085948693752 C 45.83319394683838 95.15085948693752 48.33319394683838 97.65085948693752 48.33319394683838 100.15085948693752 L 48.33319394683838 100.16673943293094 C 48.33319394683838 102.66673943293094 45.83319394683838 105.16673943293094 43.33319394683838 105.16673943293094 L 5.101 105.16673943293094 C 2.601 105.16673943293094 0.101 102.66673943293094 0.101 100.16673943293094 L 0.101 100.15085948693752 C 0.101 97.65085948693752 2.601 95.15085948693752 5.101 95.15085948693752 Z " pathFrom="M 0.101 95.15085948693752 L 0.101 95.15085948693752 L 0.101 105.16673943293094 L 0.101 105.16673943293094 L 0.101 105.16673943293094 L 0.101 105.16673943293094 L 0.101 105.16673943293094 L 0.101 95.15085948693752 Z" cy="123.76765933263302" cx="48.33219394683838" j="3" val="20" barHeight="10.015879945993424" barWidth="48.23219394683838"></path><path id="SvgjsPath1324" d="M 5.101 123.76765933263302 L 139.79758184051514 123.76765933263302 C 142.29758184051514 123.76765933263302 144.79758184051514 126.267659332633 144.79758184051514 128.767659332633 L 144.79758184051514 128.78353927862645 C 144.79758184051514 131.28353927862645 142.29758184051514 133.78353927862645 139.79758184051514 133.78353927862645 L 5.101 133.78353927862645 C 2.601 133.78353927862645 0.101 131.28353927862645 0.101 128.78353927862645 L 0.101 128.767659332633 C 0.101 126.267659332633 2.601 123.76765933263302 5.101 123.76765933263302 Z " fill="rgba(255,111,40,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area undefined" index="0" clip-path="url(#gridRectBarMaskxhxxraba)" pathTo="M 5.101 123.76765933263302 L 139.79758184051514 123.76765933263302 C 142.29758184051514 123.76765933263302 144.79758184051514 126.267659332633 144.79758184051514 128.767659332633 L 144.79758184051514 128.78353927862645 C 144.79758184051514 131.28353927862645 142.29758184051514 133.78353927862645 139.79758184051514 133.78353927862645 L 5.101 133.78353927862645 C 2.601 133.78353927862645 0.101 131.28353927862645 0.101 128.78353927862645 L 0.101 128.767659332633 C 0.101 126.267659332633 2.601 123.76765933263302 5.101 123.76765933263302 Z " pathFrom="M 0.101 123.76765933263302 L 0.101 123.76765933263302 L 0.101 133.78353927862645 L 0.101 133.78353927862645 L 0.101 133.78353927862645 L 0.101 133.78353927862645 L 0.101 133.78353927862645 L 0.101 123.76765933263302 Z" cy="152.3844591783285" cx="144.79658184051513" j="4" val="60" barHeight="10.015879945993424" barWidth="144.69658184051514"></path><path id="SvgjsPath1326" d="M 5.101 152.3844591783285 L 236.2619697341919 152.3844591783285 C 238.7619697341919 152.3844591783285 241.2619697341919 154.8844591783285 241.2619697341919 157.3844591783285 L 241.2619697341919 157.40033912432193 C 241.2619697341919 159.90033912432193 238.7619697341919 162.40033912432193 236.2619697341919 162.40033912432193 L 5.101 162.40033912432193 C 2.601 162.40033912432193 0.101 159.90033912432193 0.101 157.40033912432193 L 0.101 157.3844591783285 C 0.101 154.8844591783285 2.601 152.3844591783285 5.101 152.3844591783285 Z " fill="rgba(255,111,40,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area undefined" index="0" clip-path="url(#gridRectBarMaskxhxxraba)" pathTo="M 5.101 152.3844591783285 L 236.2619697341919 152.3844591783285 C 238.7619697341919 152.3844591783285 241.2619697341919 154.8844591783285 241.2619697341919 157.3844591783285 L 241.2619697341919 157.40033912432193 C 241.2619697341919 159.90033912432193 238.7619697341919 162.40033912432193 236.2619697341919 162.40033912432193 L 5.101 162.40033912432193 C 2.601 162.40033912432193 0.101 159.90033912432193 0.101 157.40033912432193 L 0.101 157.3844591783285 C 0.101 154.8844591783285 2.601 152.3844591783285 5.101 152.3844591783285 Z " pathFrom="M 0.101 152.3844591783285 L 0.101 152.3844591783285 L 0.101 162.40033912432193 L 0.101 162.40033912432193 L 0.101 162.40033912432193 L 0.101 162.40033912432193 L 0.101 162.40033912432193 L 0.101 152.3844591783285 Z" cy="181.00125902402402" cx="241.2609697341919" j="5" val="100" barHeight="10.015879945993424" barWidth="241.1609697341919"></path><g id="SvgjsG1313" class="apexcharts-bar-goals-markers"><g id="SvgjsG1315" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskxhxxraba)"></g><g id="SvgjsG1317" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskxhxxraba)"></g><g id="SvgjsG1319" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskxhxxraba)"></g><g id="SvgjsG1321" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskxhxxraba)"></g><g id="SvgjsG1323" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskxhxxraba)"></g><g id="SvgjsG1325" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskxhxxraba)"></g></g><g id="SvgjsG1314" class="apexcharts-bar-shadows apexcharts-hidden-element-shown"></g></g><g id="SvgjsG1312" class="apexcharts-datalabels apexcharts-hidden-element-shown" data:realIndex="0"></g></g><line id="SvgjsLine1347" x1="0" y1="0" x2="289.3931636810303" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1348" x1="0" y1="0" x2="289.3931636810303" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1373" class="apexcharts-yaxis apexcharts-xaxis-inversed" rel="0"><g id="SvgjsG1374" class="apexcharts-yaxis-texts-g apexcharts-xaxis-inversed-texts-g" transform="translate(0, 0)"><text id="SvgjsText1376" font-family="Helvetica, Arial, sans-serif" x="-15" y="15.609163552197545" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1377">UI/UX</tspan><title>UI/UX</title></text><text id="SvgjsText1379" font-family="Helvetica, Arial, sans-serif" x="-15" y="44.22596339789304" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1380">Development</tspan><title>Development</title></text><text id="SvgjsText1382" font-family="Helvetica, Arial, sans-serif" x="-15" y="72.84276324358854" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1383">Management</tspan><title>Management</title></text><text id="SvgjsText1385" font-family="Helvetica, Arial, sans-serif" x="-15" y="101.45956308928403" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1386">HR</tspan><title>HR</title></text><text id="SvgjsText1388" font-family="Helvetica, Arial, sans-serif" x="-15" y="130.07636293497953" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1389">Testing</tspan><title>Testing</title></text><text id="SvgjsText1391" font-family="Helvetica, Arial, sans-serif" x="-15" y="158.69316278067504" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1392">Marketing</tspan><title>Marketing</title></text></g></g><g id="SvgjsG1349" class="apexcharts-xaxis apexcharts-yaxis-inversed"><g id="SvgjsG1350" class="apexcharts-xaxis-texts-g" transform="translate(0, -8.666666666666666)"><text id="SvgjsText1351" font-family="Helvetica, Arial, sans-serif" x="289.3931636810303" y="201.70079907417298" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#111827" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1353">120</tspan><title>120</title></text><text id="SvgjsText1354" font-family="Helvetica, Arial, sans-serif" x="241.0609697341919" y="201.70079907417298" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#111827" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1356">100</tspan><title>100</title></text><text id="SvgjsText1357" font-family="Helvetica, Arial, sans-serif" x="192.7287757873535" y="201.70079907417298" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#111827" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1359">80</tspan><title>80</title></text><text id="SvgjsText1360" font-family="Helvetica, Arial, sans-serif" x="144.39658184051513" y="201.70079907417298" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#111827" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1362">60</tspan><title>60</title></text><text id="SvgjsText1363" font-family="Helvetica, Arial, sans-serif" x="96.06438789367675" y="201.70079907417298" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#111827" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1365">40</tspan><title>40</title></text><text id="SvgjsText1366" font-family="Helvetica, Arial, sans-serif" x="47.73219394683835" y="201.70079907417298" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#111827" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1368">20</tspan><title>20</title></text><text id="SvgjsText1369" font-family="Helvetica, Arial, sans-serif" x="-0.6000000000000227" y="201.70079907417298" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#111827" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1371">0</tspan><title>0</title></text></g></g><g id="SvgjsG1394" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1395" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1396" class="apexcharts-point-annotations"></g></g><g id="SvgjsG1308" class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)"></g><g id="SvgjsG1309" class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)"></g></svg><div class="apexcharts-tooltip apexcharts-theme-light" style="left: 217.757px; top: -17.0089px;"><div class="apexcharts-tooltip-title" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">Development</div><div class="apexcharts-tooltip-series-group apexcharts-tooltip-series-group-0 apexcharts-active" style="order: 1; display: flex;"><span class="apexcharts-tooltip-marker" style="background-color: rgba(255, 111, 40, 0.85);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label">Employee: </span><span class="apexcharts-tooltip-text-y-value">110</span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>
                <p class="fs-13"><i class="ti ti-circle-filled me-2 fs-8 text-primary"></i>No of
                    Employees increased by <span class="text-success fw-bold">+20%</span> from last Week
                </p>
            </div>
        </div>
    </div>
</div>

 


@endsection
@section('script')
<script>
    var options = {
  series: [{
    name: 'Employee',
    data: [80, 110, 80, 20, 50]
  }],
  xaxis: {
    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May']
  }
};

var chart = new ApexCharts(document.querySelector("#emp-department"), options);
chart.render();
var options = {
  series: [{
    name: 'Employee Count', // modified series label
    data: [80, 110, 80, 20, 50]
  }],
  xaxis: {
    categories: ['January', 'February', 'March', 'April', 'May'] // modified x-axis labels
  },
  tooltip: {
    y: {
      formatter: function(val) {
        return val + " employees" // modified tooltip text
      }
    }
  }
};

var chart = new ApexCharts(document.querySelector("#emp-department"), options);
chart.render();
</script>
@endsection
 
