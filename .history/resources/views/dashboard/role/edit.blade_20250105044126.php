@extends('dashboard.layouts.master')

@section('content')

    <div class="row">
        <!-- Card for Job Title Update -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5>{{ __('Update Role') }}</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addJobTitleModalLabel">{{ __('Add New Role') }}</h5>
                                </div>
                                {{ Form::open(['url' => 'roles', 'method' => 'post']) }}
                                <div class="modal-body">
                                    <!-- Role Name Input -->
                                    <div class="mb-4">
                                        <label for="roleName" class="form-label">{{ __('Role Name') }}</label>
                                        {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'roleName', 'placeholder' => __('Enter Role Name')]) }}
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    @php
                                    $modules = [
                                        'User', 'Role', 'Award', 'Transfer', 'Resignation', 'Travel', 'Promotion', 'Complaint', 'Warning',
                                        'Termination', 'Department', 'Designation', 'Document Type', 'Branch', 'Award Type', 'Termination Type',
                                        'Employee', 'Payslip Type', 'Allowance Option', 'Loan Option', 'Deduction Option', 'Set Salary', 'Allowance',
                                        'Commission', 'Loan', 'Saturation Deduction', 'Other Payment', 'Overtime', 'Pay Slip', 'Account List',
                                        'Payee', 'Payer', 'Income Type', 'Expense Type', 'Payment Type', 'Deposit', 'Expense', 'Transfer Balance',
                                        'Event', 'Announcement', 'Leave Type', 'Leave', 'Meeting', 'Ticket', 'Attendance', 'TimeSheet', 'Holiday',
                                        'Plan', 'Assets', 'Document', 'Employee Profile', 'Employee Last Login', 'Indicator', 'Appraisal',
                                        'Goal Tracking', 'Goal Type', 'Competencies', 'Competencies', 'Company Policy', 'Trainer', 'Training',
                                        'Training Type', 'Job Category', 'Job Stage', 'Job', 'Job Application', 'Job OnBoard', 'Job Application Note',
                                        'Job Application Skill', 'Custom Question', 'Interview Schedule', 'Career', 'Report', 'Performance Type'
                                    ];

                                    if(Auth::user()->type == 'super admin'){
                                        $modules[] = 'Language';
                                    }
                                    @endphp

                                    @if (!empty($modules))
                                    <div class="permissions-section">
                                        <h5 class="mb-3">{{ __('Assign Permissions to Role') }}</h5>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>{{ __('Module') }}</th>
                                                        <th>{{ __('Manage') }}</th>
                                                        <th>{{ __('Create') }}</th>
                                                        <th>{{ __('Edit') }}</th>
                                                        <th>{{ __('Delete') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($modules as $module)
                                                        <tr>
                                                            <td>{{ ucfirst($module) }}</td>

                                                            @foreach (['Manage', 'Create', 'Edit', 'Delete'] as $action)
                                                                <td>
                                                                    <!-- Check if the permission exists for this module-action combination -->
                                                                    @php
                                                                        $permission = "{$action}_{$module}";
                                                                    @endphp
                                                                    <div class="form-check">
                                                                        <input type="checkbox"
                                                                               name="permissions[]"
                                                                               value="{{ $permission }}"
                                                                               class="form-check-input"
                                                                               id="permission-{{ $permission }}"
                                                                               {{ in_array($permission, (array) $permissions) ? 'checked' : '' }}>
                                                                        <label class="form-check-label visually-hidden" for="permission-{{ $permission }}">{{ $action }}</label>
                                                                    </div>
                                                                </td>
                                                            @endforeach
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    @endif
                                </div>

                                <!-- Modal Footer -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                                </div>
                                {{ Form::close() }}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

 @endsection
