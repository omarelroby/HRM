<div class="col-xxl-4 col-xl-6 d-flex">
    <div class="card flex-fill">
        <div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">
            <h5 class="mb-2">Attendance Overview</h5>
            <div class="dropdown mb-2">
                <a href="javascript:void(0);" class="btn btn-white border btn-sm d-inline-flex align-items-center"
                   data-bs-toggle="dropdown">
                    <i class="ti ti-calendar me-1"></i>Today
                </a>
                <ul class="dropdown-menu  dropdown-menu-end p-3">
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
        <div class="card-body">
            <div class="chartjs-wrapper-demo position-relative mb-4">
                <canvas id="attendance" height="200"></canvas>
                <div class="position-absolute text-center attendance-canvas">
                    <p class="fs-13 mb-1">Total Attendance</p>
                    <h3>{{ $totalAttendance }}</h3>
                </div>
            </div>
            <h6 class="mb-3">Status</h6>
            <div class="d-flex align-items-center justify-content-between">
                <p class="f-13 mb-2"><i class="ti ti-circle-filled text-success me-1"></i>Present</p>
                <p class="f-13 fw-medium text-gray-9 mb-2">{{ $attendancePercentage['present'] }}</p>
            </div>
            <div class="d-flex align-items-center justify-content-between">
                <p class="f-13 mb-2"><i class="ti ti-circle-filled text-secondary me-1"></i>Late</p>
                <p class="f-13 fw-medium text-gray-9 mb-2">{{ $attendancePercentage['late'] }}</p>
            </div>
            <div class="d-flex align-items-center justify-content-between">
                <p class="f-13 mb-2"><i class="ti ti-circle-filled text-warning me-1"></i>Permission</p>
                <p class="f-13 fw-medium text-gray-9 mb-2">{{ $attendancePercentage['leave'] }}</p>
            </div>
            <div class="d-flex align-items-center justify-content-between mb-2">
                <p class="f-13 mb-2"><i class="ti ti-circle-filled text-danger me-1"></i>Absent</p>
                <p class="f-13 fw-medium text-gray-9 mb-2">{{ $attendancePercentage['absent'] }}</p>
            </div>
            <div
                class="bg-light br-5 box-shadow-xs p-2 pb-0 d-flex align-items-center justify-content-between flex-wrap">
                <div class="d-flex align-items-center">
                    <p class="mb-2 me-2">Total Absenties</p>
                    <div class="avatar-list-stacked avatar-group-sm mb-2">
											<span class="avatar avatar-rounded">
												<img class="border border-white" src="assets/img/profiles/avatar-27.jpg"
                                                     alt="img">
											</span>
                        <span class="avatar avatar-rounded">
												<img class="border border-white" src="assets/img/profiles/avatar-30.jpg"
                                                     alt="img">
											</span>
                        <span class="avatar avatar-rounded">
												<img src="assets/img/profiles/avatar-14.jpg" alt="img">
											</span>
                        <span class="avatar avatar-rounded">
												<img src="assets/img/profiles/avatar-29.jpg" alt="img">
											</span>
                        <a class="avatar bg-primary avatar-rounded text-fixed-white fs-10" href="javascript:void(0);">
                            +1
                        </a>
                    </div>
                </div>
                <a href="leaves.html" class="fs-13 link-primary text-decoration-underline mb-2">View Details</a>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
        'use strict';

        if ($('#attendance').length > 0) {
            var ctx = document.getElementById('attendance').getContext('2d');
            var mySemiDonutChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Late', 'Present', 'Permission', 'Absent'],
                    datasets: [{
                        label: 'Attendance Overview',
                        data: [
                            {{ $attendanceData['present'] }},
                            {{ $attendanceData['late'] }},
                            {{ $attendanceData['leave'] }},
                            {{ $attendanceData['absent'] }}
                        ],
                        backgroundColor: ['#03C95A', '#0C4B5E', '#FFC107', '#E70D0D'],
                        borderWidth: 5,
                        borderRadius: 10,
                        borderColor: '#fff',
                        hoverBorderWidth: 0,
                        cutout: '60%',
                    }]
                },
                options: {
                    rotation: -100,
                    circumference: 200,
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                }
            });
        }
    });
</script>
