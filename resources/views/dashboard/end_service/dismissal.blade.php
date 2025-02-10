@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Manage Tasks') }}
@endsection

@section('content')
    <div class="row">
        @if(auth()->user()->type != 'employee')
            <div class="d-flex flex-column flex-md-row justify-content-end mb-3">
                <a href="{{ route('end-service-dismissal') }}" class="btn btn-primary btn-lg mb-2 mb-md-0 mr-md-2 mx-2">
                    <i class="fas fa-user-minus"></i> {{ __('Create New Dismissal') }}
                </a>
                <a href="{{ route('end-service-dismissal') }}" class="btn btn-primary btn-lg">
                    <i class="fas fa-sign-out-alt"></i> {{ __('Create New Resignation') }}
                </a>
            </div>
        @endif
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header text-white">
                    <h5 class="card-title mb-0">{{ __('End of service gratuity') }}</h5>
                </div>
                @if (session('success'))
                    <div class="alert alert-success" style="text-align: center;">{{ session('success') }}</div>
                @elseif (session('error'))
                    <div class="alert alert-danger" style="text-align: center;">{{ session('error') }}</div>
                @endif
                <div class="card-body">
                    <form action="{{ route('end-service.store') }}" method="POST">
                        @csrf <!-- CSRF token for security -->
                        <input type="hidden" name="type" value="dismissal">
                        <input type="hidden" name="years" id="years_val">
                        <input type="hidden" name="months" id="months_val">
                        <input type="hidden" name="days" id="days_val">
                        <input type="hidden" name="check_basic_salary" id="check_basic_salary">
                        <input type="hidden" name="check_allownce" id="check_allownce">
                        <div class="row">
                            @if(\Auth::user()->type != 'employee')
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="employee_id" class="form-control-label">{{ __('Ticket for Employee') }}</label>
                                        <select name="employee_id" id="employee_id" class="form-control select2">
                                            <option value="">{{ __('Select Employee') }}</option>
                                            @foreach($employees as $employee)
                                                <option value="{{ $employee->id }}" data-work-start-date="{{ $employee->work_start_date }}" data-basic-salary="{{ $employee->salary }}" data-allownce-salary="{{ $employee->allowances_sum_amount }}">
                                                    {{ $employee->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="work_start_date" class="form-control-label">{{ __('Start Working Date') }}</label>
                                        <input type="date" name="work_start_date" id="work_start_date" class="form-control" placeholder="{{ __('Enter Start Working Date') }}" readonly disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="work_end_date" class="form-control-label">{{ __('End Working Date') }}</label>
                                        <input type="date" name="work_end_date" id="work_end_date" class="form-control" placeholder="{{ __('Enter End Working Date') }}">
                                    </div>
                                </div>
                            @endif



                            <!-- Table to display years, months, days, basic_salary, and allownce -->
                            <div class="col-md-12 my-3">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>{{ __('Years') }}</th>
                                        <th>{{ __('Months') }}</th>
                                        <th>{{ __('Days') }}</th>
                                        <th id="basic_salary_header" style="display: none;">{{ __('Basic Salary') }}</th>
                                        <th id="allownce_header" style="display: none;">{{ __('Allownce') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td id="years">0</td>
                                        <td id="months">0</td>
                                        <td id="days">0</td>
                                        <td id="basic_salary_cell" style="display: none;">0</td>
                                        <td id="allownce_cell" style="display: none;">0</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                                <!-- Checkbox to toggle basic_salary display -->
                                <div class="col-md-1">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="show_basic_salary">
                                        <label class="form-check-label" for="show_basic_salary">{{ __('Salary') }}</label>
                                    </div>
                                </div>

                                <!-- Checkbox to toggle allownce display -->
                                <div class="col-md-1">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="show_allownce">
                                        <label class="form-check-label" for="show_allownce">{{ __('Allownce') }}</label>
                                    </div>
                                </div>

                            <div class="col-12 my-2">
                                <input type="submit" value="{{ __('Create') }}" class="btn btn-primary">
                                <input type="button" value="{{ __('Cancel') }}" class="btn btn-white" data-dismiss="modal">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
    <script>
        $(document).ready(function () {
            // When the employee dropdown changes
            $('#employee_id').on('change', function () {
                // Get the selected employee's work_start_date, basic_salary, and allownce from the data attribute
                const workStartDate = $(this).find(':selected').data('work-start-date');
                const basicSalary = $(this).find(':selected').data('basic-salary');
                const allownceSalary = $(this).find(':selected').data('allownce-salary');

                console.log('Selected work_start_date:', workStartDate); // Debugging
                console.log('Selected basic_salary:', basicSalary); // Debugging
                console.log('Selected allownce_salary:', allownceSalary); // Debugging

                if (workStartDate) {
                    // Convert DD-MM-YYYY to YYYY-MM-DD
                    const [day, month, year] = workStartDate.split('-');
                    const formattedDate = `${year}-${month}-${day}`;

                    // Parse the date and format it for the input[type="date"]
                    const dateObj = new Date(formattedDate);
                    if (dateObj instanceof Date && !isNaN(dateObj)) {
                        const isoDate = dateObj.toISOString().split('T')[0];
                        console.log('Formatted date:', isoDate); // Debugging
                        $('#work_start_date').val(isoDate);
                    } else {
                        console.error('Invalid date format:', workStartDate); // Debugging
                        $('#work_start_date').val('');
                    }
                } else {
                    console.log('No work_start_date found'); // Debugging
                    $('#work_start_date').val('');
                }

                // Update basic_salary and allownce in the table
                $('#basic_salary_cell').text(basicSalary || '0');
                $('#allownce_cell').text(allownceSalary || '0');
            });

            // When the work_end_date changes
            $('#work_end_date').on('change', function () {
                const startDate = $('#work_start_date').val();
                const endDate = $(this).val();

                if (startDate && endDate) {
                    const diff = calculateDateDifference(startDate, endDate);
                    $('#years').text(diff.years);
                    $('#years_val').val(diff.years);
                    $('#months').text(diff.months);
                    $('#months_val').val(diff.months);
                    $('#days').text(diff.days);
                    $('#days_val').val(diff.days);
                } else {
                    $('#years').text('0');
                    $('#months').text('0');
                    $('#days').text('0');
                }
            });

            // When the basic_salary checkbox is toggled
            $('#show_basic_salary').on('change', function () {
                if ($(this).is(':checked')) {
                    $('#basic_salary_header').show();
                    $('#basic_salary_cell').show();
                    $('#check_basic_salary').val(1);
                } else {
                    $('#basic_salary_header').hide();
                    $('#basic_salary_cell').hide();
                    $('#check_basic_salary').val(0);
                }
            });

            // When the allownce checkbox is toggled
            $('#show_allownce').on('change', function () {
                if ($(this).is(':checked')) {
                    $('#allownce_header').show();
                    $('#allownce_cell').show();
                    $('#check_allownce').val(1);
                } else {
                    $('#allownce_header').hide();
                    $('#allownce_cell').hide();
                    $('#check_allownce').val(0);

                }
            });

            // Function to calculate the difference between two dates
            function calculateDateDifference(startDate, endDate) {
                const start = new Date(startDate);
                const end = new Date(endDate);

                let years = end.getFullYear() - start.getFullYear();
                let months = end.getMonth() - start.getMonth();
                let days = end.getDate() - start.getDate();

                if (days < 0) {
                    months--;
                    days += new Date(end.getFullYear(), end.getMonth(), 0).getDate();
                }

                if (months < 0) {
                    years--;
                    months += 12;
                }

                return { years, months, days };
            }
        });
    </script>
    <script>
        $(function () {
            $(".gregorian-date, .datepicker").hijriDatePicker({
                format: 'YYYY-M-D',
                showSwitcher: false,
                hijri: false,
                useCurrent: true,
            });
        });
        $(function () {
            $('.datetimepicker').datetimepicker({
                format: 'DD/MM/YYYY',
                icons: {
                    time: 'ti ti-time',
                    date: 'ti ti-calendar',
                    up: 'ti ti-chevron-up',
                    down: 'ti ti-chevron-down',
                },
                widgetPositioning: {
                    horizontal: 'auto',
                    vertical: 'bottom'
                },
                // Append to body to avoid overflow issues
                widgetParent: 'body'
            });
        });
    </script>
@endpush
