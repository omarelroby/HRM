@extends('layouts.admin')
@section('page-title')
    {{__('Dashboard')}}
@endsection

@section('content')
@if(session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="row  border-bottom white-bg dashboard-header">
        <div class="col-md-12">
            <div class="flot-chart dashboard-chart">
                <canvas style="height: -webkit-fill-available;" class="flot-chart-content" id="flot-dashboard-chart"></canvas>
            </div>
        </div>
    </div>

@endsection

@push('script-page')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
    <script>
        const ctx    = document.getElementById('flot-dashboard-chart').getContext('2d');
        var companies    = <?php echo $companies; ?>;
        var companyEmployeesCount = <?php echo $companyEmployeesCount; ?>;

        const myChart = new Chart(ctx, {
            type: "line",
            data: {
                labels: companies,
                datasets: [{
                    label: "",
                    fill: !0,
                    backgroundColor: "rgba(156,204,101,.45)",
                    borderColor: "rgba(156,204,101,1)",
                    pointBackgroundColor: "rgba(156,204,101,1)",
                    pointBorderColor: "#fff",
                    pointHoverBackgroundColor: "#fff",
                    pointHoverBorderColor: "rgba(156,204,101,1)",
                    data: companyEmployeesCount,
                }, ],
            },
            options: {
                animations: {
                radius: {
                    duration: 400,
                    easing: 'linear',
                    loop: (context) => context.active
                }
                },
                hoverRadius: 12,
                hoverBackgroundColor: 'yellow',
                interaction: {
                mode: 'nearest',
                intersect: false,
                axis: 'x'
                },
                plugins: {
                    tooltips: {
                    callbacks: {
                        label: function(e, r) {
                            return " $ " + e.yLabel;
                        },
                    },
                },
                }
            },
        });
    </script>
@endpush

