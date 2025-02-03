@extends('dashboard.layouts.master')
@include('dashboard.layouts.header')
@push('css')
    <style>

        /* Attendance Form Styling */
        .attendance-form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            background-color: #f9f9f9;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .attendance-buttons {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .btn:disabled {
            opacity: 0.7;
            cursor: not-allowed;
        }

        .btn-clock-in {
            background-color: #28a745; /* Green for clock-in */
            color: white;
        }

        .btn-clock-in:hover:not(:disabled) {
            background-color: #218838;
            transform: translateY(-2px);
        }

        .btn-clock-out {
            background-color: #dc3545; /* Red for clock-out */
            color: white;
        }

        .btn-clock-out:hover:not(:disabled) {
            background-color: #c82333;
            transform: translateY(-2px);
        }

        /* Icons */
        .fas {
            font-size: 18px;
        }
        /* Add the CSS code below */
        .attendance-container {
            max-width: 700px;
            margin: 50px auto;
            height: auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            font-family: Arial, sans-serif;
        }
        .attendance-container h2 {
            margin-bottom: 15px;
            font-size: 20px;
            color: #333;
        }
        .office-time {
            margin-bottom: 20px;
            font-size: 14px;
            color: #666;
        }
        .btn-container {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }
        .btn {
            flex: 1;
            padding: 10px 15px;
            font-size: 14px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn-clock-in {
            background-color: #5cb85c;
            color: white;
            width: 250px;
        }
        .btn-clock-in:hover {
            background-color: #4cae4c;
        }
        .btn-clock-out {
            background-color: #d9534f;
            color: white;
            width: 250px;
        }
        .btn-clock-out:hover {
            background-color: #c9302c;
        }
    </style>


@endpush
@section('content')

    <div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
        <div class="my-auto mb-2">
            <h2 class="mb-1">{{__('Mwerdi Dashbaord')}}</h2>
            <nav>
                <ol class="breadcrumb mb-0">
                    <li>
                        <a href="{{route('home')}}"><i class="ti ti-smart-home"></i>{{__('My Dashboard')}}</a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- /Breadcrumb -->

    <!-- Welcome Wrap -->
    <div class="card border-0">
        <div class="card-body d-flex align-items-center justify-content-between flex-wrap pb-1">
            <div class="d-flex align-items-center mb-3">
							<span class="avatar avatar-xl flex-shrink-0">
								<img src="{{auth()->user()->avatar?asset(Storage::url(auth()->user()->avatar)):asset(Storage::url('uploads/avatar/company.png'))}}" class="rounded-circle" alt="img">
							</span>
                <div class="ms-3">
                    <h3 class="mb-2">{{__('Welcome Back')}}, {{auth()->user()->name}} <a href="javascript:void(0);" class="edit-icon"><i class="ti ti-edit fs-14"></i></a></h3>
                    {{--                            <p>You have <span class="text-primary text-decoration-underline">21</span> Pending Approvals & <span class="text-primary text-decoration-underline">14</span> Leave Requests</p>--}}
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        @if(!empty(session('success')))
            <div class="alert alert-success alert-dismissible fade in" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if(!empty(session('error')))
            <div class="alert alert-danger alert-dismissible fade in" role="alert">
                {{ session('error') }}
            </div>
        @endif
{{--            first card widget--}}

            <div class="col-md-4 d-flex card">
                <div class="card-body">
                    <div class="attendance-container">
                        <h2>Mark Attendance</h2>
                        <p class="office-time">My Office Time: 09:00 to 17:00</p>
                        <div class="btn-container">
                            <form id="attendance-form" class="attendance-form">
                                @csrf <!-- Add CSRF token for security -->
                                <input type="hidden" name="action" id="action" value=""> <!-- Hidden field to store action (clock-in/clock-out) -->

                                <div class="attendance-buttons">
                                    @if($emp_att && $emp_att->clock_in)
                                        <button type="button" class="btn btn-clock-in disabled" disabled>
                                            <i class="fas fa-sign-in-alt"></i> Clocked In Today at: {{ $emp_att->clock_in }}
                                        </button>
                                    @else
                                        <button type="button" class="btn btn-clock-in" onclick="handleAttendance('clock-in')">
                                            <i class="fas fa-sign-in-alt"></i> Clock In
                                        </button>
                                    @endif

                                    @if($emp_att && $emp_att->clock_out)
                                        <button type="button" class="btn btn-clock-out disabled" disabled>
                                            <i class="fas fa-sign-out-alt"></i> Clocked Out Today at: {{ $emp_att->clock_out }}
                                        </button>
                                    @else
                                        <button type="button" class="btn btn-clock-out" onclick="handleAttendance('clock-out')">
                                            <i class="fas fa-sign-out-alt"></i> Clock Out
                                        </button>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    <div class="col-xxl-4 d-flex">
        <div class="row flex-fill">

            <div class="col-md-6 d-flex">
                <div class="card flex-fill">
                    <div class="card-body">
                        <span class="avatar rounded-circle bg-primary mb-2">
                            <i class="ti ti-calendar-share fs-16"></i>
                        </span>

                        <h6 class="fs-13 fw-medium text-default mb-1">{{__('Attendance Overview')}}</h6>
                        <h3 class="mb-3">{{ $employeesWithAttendance .'/' .$employees_count ??0 }} <span class="fs-12 fw-medium text-success">
                            <i class="fa-solid fa-caret-up me-1"></i>{{ $employeesWithAttendance?round($employeesWithAttendance/$employees_count * 100,2) : 0}}%</span></h3>
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
                        <h6 class="fs-13 fw-medium text-default mb-1">{{__('Total No of Tasks')}}</h6>
                        <h3 class="mb-3">{{ $complete_tasks .'/' .$tasks }}<span class="fs-12 fw-medium text-success">
                            <i class="fa-solid fa-caret-up me-1"></i>{{ $complete_tasks ? round($complete_tasks/$tasks * 100,2):0}}%%</span></h3>
                        <a href="tasks.html" class="link-default">View All</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 d-flex">
                <div class="card flex-fill">
                    <div class="card-body">
                        <span class="avatar rounded-circle bg-info mb-2">
                            <i class="ti ti-users-group fs-16"></i>
                        </span>
                        <h6 class="fs-13 fw-medium text-default mb-1">{{__('Employee Requests')}}</h6>
                        <h3 class="mb-3">{{ $emp_req ??0 }} <span class="fs-12 fw-medium text-info"><i class="fa-solid fa-caret-up me-1"></i> </span></h3>
                        <a href="job-list.html" class="link-default">View All</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 d-flex">
                <div class="card flex-fill">
                    <div class="card-body">
                        <span class="avatar rounded-circle bg-danger mb-2">
                            <i class="ti ti-user-star fs-16"></i>
                        </span>
                        <h6 class="fs-13 fw-medium text-default mb-1">{{__('Payslip')}}</h6>
                        <h3 class="mb-3">{{ $payslip ??0}} <span class="fs-12 fw-medium text-danger"><i class="fa-solid fa-caret-up me-1"></i></span></h3>
                        <a href="candidates.html" class="link-default">View All</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="col-xxl-4 col-xl-6 d-flex">
        <div class="card flex-fill">
            <div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">
                <h5 class="mb-2">{{__('Employees By Department')}}</h5>

            </div>
            <div class="card-body">
                <div id="chartdiv">
                    <!-- Chart will render here -->
                </div>
            </div>
        </div>
    </div>
{{--            end first card widget--}}
            {{-- check in out widget --}}
            <div class="col-xxl-4 col-xl-6 d-flex">
                <div class="card flex-fill">
                    <div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">
                        <h5 class="mb-2">{{__('Clock-In/Out')}}</h5>
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
                                            <i class="ti ti-circle-filled fs-5 me-1">
                                            </i>{{ $hours }} hrs {{ $minutes }} min
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

{{--    Expiry Dates Employee--}}
    <div class="col-xxl-8 col-xl-12 d-flex">
            <div class="card flex-fill">
                <div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">
                    <h5 class="mb-2">{{ __('Employee End Dates') }}</h5>
                    <a href="{{url('/get-expiry-docs')}}" class="btn btn-light btn-md mb-2">{{ __('View All') }}</a>
                </div>

                <div class="card-body p-0">
                    @if ($records->isNotEmpty())
                        <div class="table-responsive">
                            <div class="card-footer">
                                {{ $records->links('pagination::bootstrap-4') }}
                            </div>
                             <table class="table table-nowrap mb-0">
                                <thead>
                                <tr>
                                    <th>{{ __('Document Type') }}</th>
                                    <th>{{ __('Document') }}</th>
                                    <th>{{ __('Employee') }}</th>
                                    <th>{{ __('Expiry Date') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($records as $documentType => $documents)
                                    @foreach ($documents as $record)
                                        <tr>
                                            <!-- Document Type -->
                                            <td>
                                    <span class="badge {{ $loop->parent->iteration % 2 === 0 ? 'bg-light text-dark' : 'bg-secondary text-white' }}">
                                        {{ $documentType }}
                                    </span>
                                            </td>
                                            <!-- Document Name -->
                                            <td>{{ $record->name ?? 'Unnamed Document' }}</td>
                                            <!-- Employee Name -->
                                            <td>{{ $record->employee->name ?? 'Unknown Employee' }}</td>
                                            <!-- Expiry Date -->
                                            <td>{{ \Carbon\Carbon::parse($record->end_date)->format('Y-m-d') ?? 'N/A' }}</td>
                                        </tr>
                                    @endforeach
                                @endforeach
                                </tbody>
                            </table>

                        </div>

                        <!-- Render pagination links -->

                    @else
                        <p class="text-center py-4">{{ __('No records found.') }}</p>
                    @endif
                </div>
            </div>
        </div>             {{-- End Card for End Dates --}}
{{--   End Expiry Dates Employee--}}
{{-- attendance overview --}}
<div class="col-xxl-4 col-xl-6 d-flex">
    <div class="card flex-fill">
        <div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">
            <h5 class="mb-2">{{__('Attendance Overview')}}</h5>

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

{{-- Card for Task Status --}}
<div class="col-xxl-4 col-xl-6 d-flex">
    <div class="card flex-fill">
        <div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">
            <h5 class="mb-2">{{__('Tasks')}}</h5>
            <a href="#" class="btn btn-light btn-md mb-2">View All</a>
        </div>
        <canvas id="taskStatusChart" width="400" height="400"></canvas>
        <div id="taskStatusPercentages" class="mt-3 text-center"></div>
    </div>
</div>
{{-- End Card for Task Status --}}
            {{-- Tasks Widget --}}
            <div class="col-xxl-8 col-xl-6 d-flex">
                <div class="card flex-fill">
                    <div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">
                        <h5 class="mb-2">{{__('Tasks employee')}}</h5>
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
                                                $priorityIndex = $task->priority - 0; // Assuming priority is 1-based
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
@section('script')
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
                        // console.log(departmentNames);

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

                        // console.log(departmentNames);
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

                        // Calculate total tasks
                        const totalTasks = chartData.active + chartData.pending + chartData.canceled + chartData.finished;

                        // Initialize the chart
                        const ctx = document.getElementById('taskStatusChart').getContext('2d');
                        const taskStatusChart = new Chart(ctx, {
                            type: 'doughnut',
                            data: {
                                labels: ['Active', 'Pending', 'Canceled', 'Finished'],
                                datasets: [{
                                    data: [chartData.active, chartData.pending, chartData.canceled, chartData.finished],
                                    backgroundColor: ['#4CAF50', '#FFC107', '#F44336', '#2196F3'], // Colors for each status
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
                <div class="col-3 text-success">
                    <strong>Active:</strong> ${(chartData.active / totalTasks * 100).toFixed(1)}%
                </div>
                <div class="col-3 text-warning">
                    <strong>Pending:</strong> ${(chartData.pending / totalTasks * 100).toFixed(1)}%
                </div>
                <div class="col-3 text-danger">
                    <strong>Canceled:</strong> ${(chartData.canceled / totalTasks * 100).toFixed(1)}%
                </div>
                <div class="col-3 text-primary">
                    <strong>Finished:</strong> ${(chartData.finished / totalTasks * 100).toFixed(1)}%
                </div>
            </div>
        `;
                        percentagesContainer.innerHTML = percentagesHTML;
                    });
                </script>

                <style>
                    #chartdiv {
                        width: 100%;
                        height: auto;
                    }
                </style>
                <script>
                    function handleAttendance(action) {
                        // Set the action value in the hidden input field
                        document.getElementById('action').value = action;

                        // Get the form data
                        const form = document.getElementById('attendance-form');
                        const formData = new FormData(form);

                        // Send the data to the server using fetch
                        fetch('/mark-attendance', {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}', // Include CSRF token
                            },
                            body: formData,

                        })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    alert(data.message); // Show success message
                                    window.location.reload(); // Reload the page
                                } else {
                                    alert(data.message); // Show error message
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                alert('An error occurred. Please try again.');
                            });
                    }
                </script>
@endsection

