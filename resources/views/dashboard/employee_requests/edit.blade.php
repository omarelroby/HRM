@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Manage Employee Request') }}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-none card-box">
                <div class="card-header">
                    <h4 class="card-title">{{ __('Edit Employee Request') }}</h4>
                </div>
                <div class="card-body">
                    {{ Form::model($employee_request, ['route' => ['employee_requests.update', $employee_request->id], 'method' => 'PUT', 'class' => 'form-horizontal']) }}

                    @if($employeeId)
                        {{ Form::hidden('employee_id', $employeeId, ['class' => 'form-control']) }}
                    @endif

                    @if(\Auth::user()->type != 'employee' && !$employeeId)
                        <div class="form-group row">
                            <div class="col-md-12">
                                {{ Form::label('employee_id', __('Employee'), ['class' => 'form-control-label required']) }}
                                {{ Form::select('employee_id', $employees, null, ['class' => 'form-control select2', 'placeholder' => __('Select Employee'), 'required' => 'required']) }}
                            </div>
                        </div>
                    @endif

                    <div class="form-group row">
                        <div class="col-md-6">
                            {{ Form::label('request_type_id', __('Request Type'), ['class' => 'form-control-label required']) }}
                            {{ Form::select('request_type_id', $leavetypes, null, ['class' => 'form-control select2', 'placeholder' => __('Select Leave Type'), 'required' => 'required']) }}
                        </div>
                        <div class="col-md-6">
                            {{ Form::label('start_date', __('Start Date'), ['class' => 'form-control-label required']) }}
                            {{ Form::date('start_date', null, ['class' => 'form-control datepicker', 'required' => 'required']) }}
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            {{ Form::label('end_date', __('End Date'), ['class' => 'form-control-label required']) }}
                            {{ Form::date('end_date', null, ['class' => 'form-control datepicker', 'required' => 'required']) }}
                        </div>
                    </div>

                    @php
                        // Get the employee's department, sub-department, and section
                        $employee = \Auth::user()->getEmployee($employee_request->employee_id);
                        $employeeDepartment = $employee->department_id ?? null;
                        $employeeSubDepartment = $employee->sub_dep_id ?? null;
                        $employeeSection = $employee->section_id ?? null;

                        // Get the authenticated user's department, sub-department, and section
                        $authUserDepartment = \Auth::user()->employee->department_id ?? null;
                        $authUserSubDepartment = \Auth::user()->employee->sub_dep_id ?? null;
                        $authUserSection = \Auth::user()->employee->section_id ?? null;
                    @endphp
                    <div class="form-group row">
                        <div class="col-md-12">
                            {{ Form::label('request_reason', __('Request Reason'), ['class' => 'form-control-label required']) }}
                            {{ Form::textarea('request_reason', null, ['class' => 'form-control', 'placeholder' => __('Enter Request Reason'), 'rows' => 3, 'required' => 'required']) }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            {{ Form::label('request_reason_ar', __('Request Reason AR'), ['class' => 'form-control-label required']) }}
                            {{ Form::textarea('request_reason_ar', null, ['class' => 'form-control', 'placeholder' => __('Enter Request Reason'), 'rows' => 3, 'required' => 'required']) }}
                        </div>
                    </div>
                @if($employeeDepartment && $authUserSubDepartment == 0)
                        <div class="form-group row">
                            <div class="col-md-12">
                                {{ Form::label('reject_reason', __('Reject Request Reason'), ['class' => 'form-control-label required']) }}
                                {{ Form::textarea('reject_reason', null, ['class' => 'form-control', 'placeholder' => __('Enter Request Reason'), 'rows' => 3, 'required' => 'required']) }}
                            </div>
                        </div>
                    @endif

                    @if($employeeSubDepartment && empty($authUserSection) && $authUserSubDepartment != 0)

                        <div class="form-group row">
                            <div class="col-md-12">
                                {{ Form::label('reject_reason', __('Request Reason'), ['class' => 'form-control-label required']) }}
                                {{ Form::textarea('reject_reason', null, ['class' => 'form-control', 'placeholder' => __('Enter Request Reason'), 'rows' => 3, 'required' => 'required']) }}
                            </div>
                        </div>
                    @endif

                    <div class="form-group row mb-0 my-2">
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> {{ __('Update') }}
                            </button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                <i class="fas fa-times"></i> {{ __('Cancel') }}
                            </button>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function deleteConfirmation(id) {
            if (confirm("{{ __('Are you sure? This action cannot be undone.') }}")) {
                document.getElementById('delete-form-' + id).submit();
            }
        }

        $(function () {
            $(".gregorian-date, .datepicker").hijriDatePicker({
                format: 'YYYY-M-D',
                showSwitcher: false,
                hijri: false,
                useCurrent: true,
            });
        });
    </script>
@endsection
