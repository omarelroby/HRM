@extends('dashboard.layouts.master')
@section('page-title')
    {{ __('Manage Bulk Attendance') }}
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">{{ __('Bulk Attendance Filter') }}</h5>
            </div>
            <div class="card-body">
                {{ Form::open(['route' => ['attendanceemployee.bulkattendance'], 'method' => 'get', 'id' => 'bulkattendance_filter']) }}
                <div class="row g-3">
                    <div class="col-md-4 col-lg-3">
                        <div class="form-group">
                            {{ Form::label('date', __('Date'), ['class' => 'form-label']) }}
                            {{ Form::text('date', isset($_GET['date']) ? $_GET['date'] : date('Y-m-d'), ['class' => 'form-control gregorian-date', 'placeholder' => 'YYYY-MM-DD']) }}
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-3">
                        <div class="form-group">
                            {{ Form::label('branch', __('Branch'), ['class' => 'form-label']) }}
                            {{ Form::select('branch', $branch, isset($_GET['branch']) ? $_GET['branch'] : '', ['class' => 'form-select select2', 'placeholder' => __('Select Branch')]) }}
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-3">
                        <div class="form-group">
                            {{ Form::label('department', __('Department'), ['class' => 'form-label']) }}
                            {{ Form::select('department', $department, isset($_GET['department']) ? $_GET['department'] : '', ['class' => 'form-select select2', 'placeholder' => __('Select Department')]) }}
                        </div>
                    </div>
                    <div class="col-auto align-self-end">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i> {{ __('Apply') }}
                        </button>
                        <a href="{{ route('timesheet.index') }}" class="btn btn-danger">
                            <i class="fas fa-times"></i> {{ __('Reset') }}
                        </a>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-header">
                <h5 class="mb-0">{{ __('Employee Attendance') }}</h5>
            </div>
            <div class="card-body">
                {{ Form::open(['route' => ['attendanceemployee.bulkattendance'], 'method' => 'post']) }}
                <div class="table-responsive">
                    <table class="table table-striped table-bordered align-middle">
                        <thead>
                            <tr>
                                <th>{{ __('Employee ID') }}</th>
                                <th>{{ __('Employee') }}</th>
                                <th>{{ __('Branch') }}</th>
                                <th>{{ __('Department') }}</th>
                                <th class="text-center">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="present_all">
                                        <label class="form-check-label" for="present_all">{{ __('Attendance') }}</label>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $employee)
                            @php
                                $attendance = $employee->present_status($employee->id, isset($_GET['date']) ? $_GET['date'] : date('Y-m-d'));
                            @endphp
                            <tr>
                                <td>
                                    <input type="hidden" name="employee_id[]" value="{{ $employee->id }}">
                                    <a href="{{ route('employee.show', \Illuminate\Support\Facades\Crypt::encrypt($employee->id)) }}">
                                        {{ \Auth::user()->employeeIdFormat($employee->employee_id) }}
                                    </a>
                                </td>
                                <td>{{ $employee->name }}</td>
                                <td>{{ $employee->branch->name ?? '' }}</td>
                                <td>{{ $employee->department->name ?? '' }}</td>
                                <td class="text-center">
                                    <div class="form-check">
                                        <input class="form-check-input present" type="checkbox" name="present-{{ $employee->id }}" id="present{{ $employee->id }}" {{ (!empty($attendance) && $attendance->status == 'Present') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="present{{ $employee->id }}"></label>
                                    </div>
                                    <div class="row mt-2 present_check_in {{ empty($attendance) ? 'd-none' : '' }}">
                                        <div class="col-md-6">
                                            <label class="form-label">{{ __('In') }}</label>
                                            <input type="text" class="form-control timepicker" name="in-{{ $employee->id }}" value="{{ !empty($attendance) && $attendance->clock_in != '00:00:00' ? $attendance->clock_in : \Utility::getValByName('company_start_time') }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">{{ __('Out') }}</label>
                                            <input type="text" class="form-control timepicker" name="out-{{ $employee->id }}" value="{{ !empty($attendance) && $attendance->clock_out != '00:00:00' ? $attendance->clock_out : \Utility::getValByName('company_end_time') }}">
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="text-end mt-4">
                    <input type="hidden" name="date" value="{{ isset($_GET['date']) ? $_GET['date'] : date('Y-m-d') }}">
                    <input type="hidden" name="branch" value="{{ isset($_GET['branch']) ? $_GET['branch'] : '' }}">
                    <input type="hidden" name="department" value="{{ isset($_GET['department']) ? $_GET['department'] : '' }}">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Update') }}
                    </button>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@endsection

@push('script-page')
<script>
    $(document).ready(function () {
        $('.gregorian-date').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
        });

        $('#present_all').on('change', function () {
            $('.present').prop('checked', this.checked).trigger('change');
        });

        $('.present').on('change', function () {
            const row = $(this).closest('tr');
            const checkInOut = row.find('.present_check_in');
            if ($(this).is(':checked')) {
                checkInOut.removeClass('d-none');
            } else {
                checkInOut.addClass('d-none');
            }
        });
    });
</script>
@endpush
