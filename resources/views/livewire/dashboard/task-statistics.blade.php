<div class="col-xxl-4 col-xl-5 d-flex">
    <div class="card flex-fill">
        <div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">
            <h5 class="mb-2">Tasks Statistics</h5>
            <div class="d-flex align-items-center">
                <div class="dropdown mb-2">
                    <a href="javascript:void(0);" class="btn btn-white border btn-sm d-inline-flex align-items-center"  data-bs-toggle="dropdown">
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
                            <a href="javascript:void(0);" class="dropdown-item rounded-1">Today</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="chartjs-wrapper-demo position-relative mb-4">
                <canvas id="mySemiDonutChart" height="190"></canvas>
                <div class="position-absolute text-center attendance-canvas">
                    <p class="fs-13 mb-1">Total Tasks</p>
                    <h3>124/165</h3>
                </div>
            </div>
            <div class="d-flex align-items-center flex-wrap">
                <div class="border-end text-center me-2 pe-2 mb-3">
                    <p class="fs-13 d-inline-flex align-items-center mb-1"><i class="ti ti-circle-filled fs-10 me-1 text-warning"></i>Ongoing</p>
                    <h5>24%</h5>
                </div>
                <div class="border-end text-center me-2 pe-2 mb-3">
                    <p class="fs-13 d-inline-flex align-items-center mb-1"><i class="ti ti-circle-filled fs-10 me-1 text-info"></i>On Hold </p>
                    <h5>10%</h5>
                </div>
                <div class="border-end text-center me-2 pe-2 mb-3">
                    <p class="fs-13 d-inline-flex align-items-center mb-1"><i class="ti ti-circle-filled fs-10 me-1 text-danger"></i>Overdue</p>
                    <h5>16%</h5>
                </div>
                <div class="text-center me-2 pe-2 mb-3">
                    <p class="fs-13 d-inline-flex align-items-center mb-1"><i class="ti ti-circle-filled fs-10 me-1 text-success"></i>Ongoing</p>
                    <h5>40%</h5>
                </div>
            </div>
            <div class="bg-dark br-5 p-3 pb-0 d-flex align-items-center justify-content-between">
                <div class="mb-2">
                    <h4 class="text-success">389/689 hrs</h4>
                    <p class="fs-13 mb-0">Spent on Overall Tasks This Week</p>
                </div>
                <a href="tasks.html" class="btn btn-sm btn-light mb-2 text-nowrap">View All</a>
            </div>
        </div>
    </div>
</div>

<script>
    $(function() {
        'use strict';

        if($('#mySemiDonutChart').length > 0) {
            var ctx = document.getElementById('mySemiDonutChart').getContext('2d');
            var mySemiDonutChart = new Chart(ctx, {
                type: 'doughnut', // Chart type
                data: {
                    labels: ['Ongoing','Onhold', 'Completed', 'Overdue'],
                    datasets: [{
                        label: 'Semi Donut',
                        data: [20, 40, 20, 10],
                        backgroundColor: ['#FFC107', '#1B84FF', '#03C95A', '#E70D0D'],
                        borderWidth: -10,
                        borderColor: 'transparent', // Border between segments
                        hoverBorderWidth: 0,   // Border radius for curved edges
                        cutout: '75%',
                        spacing: -30,
                    }]
                },
                options: {
                    rotation: -100,
                    circumference: 185,
                    layout: {
                        padding: {
                            top: -20,    // Set to 0 to remove top padding
                            bottom: 20, // Set to 0 to remove bottom padding
                        }
                    },
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false // Hide the legend
                        }
                    },elements: {
                        arc: {
                            borderWidth: -30, // Ensure consistent overlap
                            borderRadius: 30, // Add some rounding
                        }
                    },
                }
            });
        }
    });
</script>
