@extends('dashboard.layouts.master')

@section('content')

    <div class="row">
        <!-- Card for Role Update -->
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5>{{ __('Update Role') }}</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">

                                {{ Form::model($role, ['route' => ['roles.update', $role->id], 'method' => 'PUT']) }}
                                <div class="row mb-4">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {{ Form::label('name', __('Name'), ['class' => 'form-control-label']) }}
                                            @if($role->name == 'employee')
                                                <p class="form-control-plaintext">{{ $role->name }}</p>
                                            @else
                                                {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('Enter Role Name')]) }}
                                            @endif
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        @if(!empty($permissions))
                                            <div class="ibox">
                                                <div class="ibox-title">
                                                    <h5>{{ __('Assign Permissions to Roles') }}</h5>
                                                </div>
                                                <div class="ibox-content">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-bordered table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th>{{ __('Module') }}</th>
                                                                    <th>{{ __('Permissions') }}</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @php
                                                                    $modules = [
                                                                        'User ', 'Role', 'Award', 'Transfer', 'Resignation', 'Travel',
                                                                        'Promotion', 'Complaint', 'Warning', 'Termination', 'Department',
                                                                        'Designation', 'Document Type', 'Branch', 'Award Type',
                                                                        'Termination Type', 'Employee', 'Payslip Type', 'Allowance Option',
                                                                        'Loan Option', 'Deduction Option', 'Set Salary', 'Allowance',
                                                                        'Commission', 'Loan', 'Saturation Deduction', 'Other Payment',
                                                                        'Overtime', 'Pay Slip', 'Account List', 'Payee', 'Payer',
                                                                        'Income Type', 'Expense Type', 'Payment Type', 'Deposit',
                                                                        'Expense', 'Transfer Balance', 'Event', 'Announcement',
                                                                        'Leave Type', 'Leave', 'Meeting', 'Ticket', 'Attendance',
                                                                        'TimeSheet', 'Holiday', 'Plan', 'Assets', 'Document',
                                                                        'Employee Profile', 'Employee Last Login', 'Indicator',
                                                                        'Appraisal', 'Goal Tracking', 'Goal Type', 'Competencies',
                                                                        'Company Policy', 'Trainer', 'Training', 'Training Type',
                                                                        'Job Category', 'Job Stage', 'Job', 'Job Application',
                                                                        'Job OnBoard', 'Job Application Note', 'Job Application Skill',
                                                                        'Custom Question', 'Interview Schedule', 'Career', 'Report',
                                                                        'Performance Type'
                                                                    ];
                                                                    if(Auth::user()->type == 'super admin'){
                                                                        $modules[] = 'Language';
                                                                    }
                                                                @endphp
                                                                @foreach($modules as $module)
                                                                    <tr>
                                                                        <td>{{ $module }}</td>
                                                                        <td>
                                                                            <div class="row">
                                                                                @foreach(['Manage', 'Create', 'Edit', 'Delete', 'Show', 'Move', 'Client Permission', 'Invite User', 'Buy', 'Add'] as $action)
                                                                                    @php
                                                                                        $permissionKey = "{$action} {$module}";
                                                                                        $key = array_search($permissionKey, $permissions);
                                                                                    @endphp
                                                                                    @if($key !== false)
                                                                                        <div class="col-md-3 custom-control custom-checkbox">
                                                                                            {{ Form::checkbox('permissions[]', $key, in_array($permissionKey, (array) $role->permissions), ['class' => 'custom-control-input', 'id' => 'permission' . $key]) }}
                                                                                            {{ Form::label('permission' . $key, ucfirst($action), ['class' => 'custom-control-label font-weight-500']) }}<br>
                                                                                        </div>
                                                                                    @endif
                                                                                @endforeach
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="col-12 mt-4">
                                        <input type="submit" value="{{ __('Update') }}" class="btn btn-primary">
                                        <input type="button" value="{{ __('Cancel') }}" class="btn btn-secondary" data-dismiss="modal">
                                    </div>
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
