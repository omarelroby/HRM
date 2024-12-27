@extends('dashboard.layouts.master')
@section('css')
<style>
.card {

    max-height: 300px; /* Limits the maximum height */
    overflow-y: auto;
}

.row {
    flex-wrap: nowrap; /* Prevents row elements from wrapping */
}
.card-body {
    max-height: calc(100% - 20px); /* Adjust padding/margins as needed */
    overflow-y: auto;
}

.col-xxl-3, .col-xl-6 , .col-xxl-4 {
    min-height: 300px; /* Ensures the columns maintain consistent height */
    max-height: 300px;
    overflow-y: auto;

}

</style>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>

    document.addEventListener("DOMContentLoaded", function() {

        var departmentNames = @json($departmentNames ?? []); // Use null coalescing for fallback
        var employeeCounts = @json($total_employees ?? []); // Use null coalescing for fallback


        // Ensure there is data to render the chart
        if (departmentNames.length > 0 && employeeCounts.length > 0) {
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
                        borderRadius: 10,
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

            var chart = new ApexCharts(document.querySelector("#emp-department"), options);
            chart.render();
        } else {
            console.error("Data for departments or employee counts is missing or invalid.");
        }
    });



</script>
<script>
    // Global variable to store the chart instance
    let attendanceChart;

    document.addEventListener('DOMContentLoaded', function () {
        // If chart already exists, destroy it before re-initializing
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


@endpush
