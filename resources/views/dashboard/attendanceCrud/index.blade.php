@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Manage Attendance List') }}
@endsection


@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>

    <div class="row">
    <div class="d-flex justify-content-end mb-3">
        @can('Create Attendance')
            <a href="#" data-bs-toggle="modal" data-bs-target="#addTrainingModal" class="btn btn-primary btn-lg">
                <i class="fas fa-plus"></i> {{ __('Create New Attendance') }}
            </a>
        @endcan
    </div>
{{--    <div class="col-md-12">--}}
{{--        <div class="card shadow-sm">--}}
{{--            <div class="card-header d-flex justify-content-between align-items-center">--}}
{{--                <h5 class="mb-0">{{ __('Attendance Filters') }}</h5>--}}
{{--            </div>--}}
{{--            <div class="card-body">--}}
{{--                {{ Form::open(array('route' => array('attendanceemployee.index'),'method'=>'get','id'=>'attendanceemployee_filter')) }}--}}
{{--                    <div class="row d-flex justify-content-end mt-2">--}}
{{--                        <div class="col-auto">--}}
{{--                            <div class="all-select-box">--}}
{{--                                <div class="btn-box">--}}
{{--                                    <label class="text-type">{{__('Type')}}</label> <br>--}}
{{--                                    <div class="d-flex radio-check">--}}
{{--                                        <div class="custom-control custom-radio custom-control-inline">--}}
{{--                                            <input type="radio" id="monthly" value="monthly" name="type" class="custom-control-input" {{isset($_GET['type']) && $_GET['type']=='monthly' ?'checked':'checked'}}>--}}
{{--                                            <label class="custom-control-label" for="monthly">{{__('Monthly')}}</label>--}}
{{--                                        </div>--}}
{{--                                        <div class="custom-control custom-radio custom-control-inline">--}}
{{--                                            <input type="radio" id="daily" value="daily" name="type" class="custom-control-input" {{isset($_GET['type']) && $_GET['type']=='daily' ?'checked':''}}>--}}
{{--                                            <label class="custom-control-label" for="daily">{{__('Daily')}}</label>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-auto month">--}}
{{--                            <div class="all-select-box">--}}
{{--                                <div class="btn-box">--}}
{{--                                    {{Form::label('month',__('Month'),['class'=>'text-type'])}}--}}
{{--                                    {{Form::month('month',isset($_GET['month'])?$_GET['month']:date('Y-m'),array('class'=>'month-btn form-control month-btn'))}}--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-auto date">--}}
{{--                            <div class="all-select-box">--}}
{{--                                <div class="btn-box">--}}
{{--                                    {{ Form::label('date', __('Date'),['class'=>'text-type'])}}--}}
{{--                                    {{ Form::text('date',isset($_GET['date'])?$_GET['date']:'', array('class' => 'form-control gregorian-date month-btn')) }}--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        @if(\Auth::user()->type != 'employee')--}}
{{--                            <div class="col-xl-2 col-lg-3">--}}
{{--                                <div class="all-select-box">--}}
{{--                                    <div class="btn-box">--}}
{{--                                        {{ Form::label('branch', __('Branch'),['class'=>'text-type'])}}--}}
{{--                                        {{ Form::select('branch', $branch,isset($_GET['branch'])?$_GET['branch']:'', array('class' => 'form-control select2')) }}--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-xl-2 col-lg-3">--}}
{{--                                <div class="all-select-box">--}}
{{--                                    <div class="btn-box">--}}
{{--                                        {{ Form::label('department', __('Department'),['class'=>'text-type'])}}--}}
{{--                                        {{ Form::select('department', $department,isset($_GET['department'])?$_GET['department']:'', array('class' => 'form-control select2')) }}--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endif--}}
{{--                        <div class="col-auto mt-auto mb-3">--}}
{{--                            <a href="#" class="apply-btn btn btn-primary mt-4" onclick="document.getElementById('attendanceemployee_filter').submit(); return false;">--}}
{{--                                <span class="btn-inner--icon"><i class="fa fa-search"></i></span>--}}
{{--                            </a>--}}
{{--                            <a href="{{route('attendanceemployee.index')}}" class="reset-btn btn btn-danger mt-4">--}}
{{--                                <span class="btn-inner--icon"><i class="fa fa-trash"></i></span>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    {{ Form::close() }}--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
</div>

<!-- Attendance Table Section -->
<div class="row mt-4">
    <div class="col-md-12">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">{{ __('Attendance List') }}</h5>
            </div>
            @if (session('success'))
            <div class="alert alert-success" style="text-align: center;">{{ session('success') }}</div>
            @elseif (session('error'))
            <div class="alert alert-danger" style="text-align: center;">{{ session('error') }}</div>
            @endif
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered align-middle">
                        <thead>
                            <tr>

                                <th>{{ __('Employee') }}</th>

                                <th>{{ __('Date') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Clock In') }}</th>
                                <th>{{ __('Clock Out') }}</th>
                                <th>{{ __('Late') }}</th>
                                <th>{{ __('Early Leaving') }}</th>
                                <th>{{ __('Overtime') }}</th>
                                @if (Gate::check('Edit Attendance') || Gate::check('Delete Attendance'))
                                <th>{{ __('Action') }}</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($attendanceEmployee as $attendance)
                            <tr>

                                <td>{{ $attendance->employee->name ?? '' }}</td>

                                <td>{{ \Auth::user()->dateFormat($attendance->date) }}</td>
                                <td>{{ $attendance->status }}</td>
                                <td>{{ $attendance->clock_in != '00:00:00' ? \Auth::user()->timeFormat($attendance->clock_in) : '00:00' }}</td>
                                <td>{{ $attendance->clock_out != '00:00:00' ? \Auth::user()->timeFormat($attendance->clock_out) : '00:00' }}</td>
                                <td>{{ $attendance->late }}</td>
                                <td>{{ $attendance->early_leaving }}</td>
                                <td>{{ $attendance->overtime }}</td>
                                @if (Gate::check('Edit Attendance') || Gate::check('Delete Attendance'))

                                        <td class="text-right action-btns">
                                            @can('Edit Attendance')
                                                <!-- Reply Button -->
                                                <a href="{{ route('attendanceemployee.edit',$attendance->id) }}"
                                                   class="btn btn-sm btn-success mr-2"
                                                   data-toggle="tooltip"
                                                   title="{{ __('Edit') }}"
                                                   aria-label="{{ __('Edit') }}">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            @endcan

                                            @can('Delete Attendance')
                                                <form method="POST" action="{{ route('attendanceemployee.destroy', $attendance->id) }}" class="d-inline" onsubmit="return confirm('{{ __('Are You Sure?') }}\n{{ __('This action cannot be undone. Do you want to continue?') }}');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" title="{{ __('Delete') }}">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            @endcan
                                        </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="addTrainingModal" tabindex="-1" aria-labelledby="addTrainingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header text-white">
                <h5 class="modal-title" id="addTrainingModalLabel">{{ __('Add New Task') }}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('attendanceemployee.store') }}" class="needs-validation" novalidate>
                    @csrf
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="form-group col-lg-6 col-md-6">
                                <label for="employee_id" class="form-label">{{ __('Employee') }}</label>
                                <select name="employee_id" id="employee_id" class="form-control select2" required>
                                    <option value="" disabled selected>{{ __('Select Employee') }}</option>
                                    @foreach($employees as $id => $name)
                                        <option value="{{ $id }}" {{ old('employee_id') == $id ? 'selected' : '' }}>
                                            {{ $name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('employee_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-lg-6 col-md-6">
                                <label for="date" class="form-label">{{ __('Date') }}</label>
                                <input type="text"
                                       name="date"
                                       id="date"
                                       class="form-control datetimepicker"
                                       value="{{ old('date') }}"
                                       required>
                                @error('date')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-lg-6 col-md-6">
                                <label for="clock_in" class="form-label">{{ __('Clock In') }}</label>
                                <input type="text"
                                       name="clock_in"
                                       id="clock_in"
                                       class="form-control timepicker"
                                       placeholder="HH:mm"
                                       pattern="^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$"
                                       value="{{ old('clock_in') }}"
                                       required>
                                @error('clock_in')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-lg-6 col-md-6">
                                <label for="clock_out" class="form-label">{{ __('Clock Out') }}</label>
                                <input type="text"
                                       name="clock_out"
                                       id="clock_out"
                                       class="form-control timepicker"
                                       placeholder="HH:mm"
                                       pattern="^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$"
                                       value="{{ old('clock_out') }}"
                                       required>
                                @error('clock_out')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer pr-0">
                        <button type="button" class="btn dark btn-outline" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-plus me-2"></i>{{ __('Create') }}
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


@endsection

@section('script')
    <!-- Hijri Date Picker -->
    <script src="{{ asset('assets/js/bootstrap-hijri-datepicker.js') }}"></script>
    <link href="{{ asset('assets/css/bootstrap-hijri-datepicker.css') }}" rel="stylesheet">

    <!-- Time Picker -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>

    <script>
        // Initialize all pickers when modal is shown
        $('#addTrainingModal').on('shown.bs.modal', function () {
            // Timepicker initialization
            $('.timepicker').timepicker({
                showMeridian: false,
                minuteStep: 1,
                defaultTime: false,
                showInputs: true,
                template: 'dropdown',
                modalBackdrop: true,
                icons: {
                    up: 'ti ti-chevron-up',
                    down: 'ti ti-chevron-down'
                }
            }).on('changeTime.timepicker', function(e) {
                // Force format to HH:mm
                const time = e.time.value;
                const formatted = moment(time, 'HH:mm').format('HH:mm');
                $(this).val(formatted);
            });

            // Hijri datepicker initialization
            $('.datetimepicker').hijriDatePicker({
                format: 'YYYY-MM-DD',
                hijri: false,
                showSwitcher: false,
                useCurrent: true
            });
        });
        // Radio button toggle
        $(document).ready(function () {
            $('input[name="type"]:radio').on('change', function () {
                const type = $(this).val();
                $('.month').toggleClass('d-none', type !== 'monthly');
                $('.date').toggleClass('d-none', type !== 'daily');
            }).trigger('change');
        });

        // Remove conflicting datetimepicker initialization
    </script>
@endsection
