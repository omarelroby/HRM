@extends('dashboard.layouts.master')
@extends('dashboard.layouts.header')

@section('css')
<script>
    /* Add margin to the buttons inside the .btn-group */
    .btn-group .btn {
        margin-right: 12px; /* Adjust space between buttons */
    }

    /* Add margin to the table cell itself */
    .text-right {
        margin-right: 15px; /* Adjust the margin around the whole <td> */
    }

    /* Optional: Adjust height of buttons */
    .btn-sm {
        height: 40px; /* Increase button height */
        padding: 10px 15px; /* Adjust padding for consistent size */
    }

    /* Optional: Adjust font size of icons */
    .btn i {
        font-size: 16px; /* Adjust icon size */
    }
</script>
@endsection

@section('content')
    <div class="row">
        <!-- Create New Button (Triggers Modal) -->
        <div class="d-flex justify-content-end mb-3">
            @can('Create Role')
                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#addJobTitleModal" class="btn btn-primary">
                        <i class="fa fa-plus"></i> {{ __('Create Role') }}
                    </a>
                </div>
            @endcan
        </div>
        <!-- Card for Job Titles List -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5>{{ __('Roles List') }}</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover w-100">
                            <thead>
                                <tr>
                                    <th>{{ __('Role') }}</th>
                                    <th>{{ __('Permissions') }}</th>
                                    <th width="10%">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                    <tr>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            <div class="d-flex flex-wrap gap-1">
                                                @foreach($role->permissions()->pluck('name') as $permission)
                                                    <span class="badge bg-primary">{{ $permission }}</span>
                                                @endforeach
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-1">
                                                @can('Edit Role')
                                                    <a href="{{ URL::to('roles/'.$role->id.'/edit') }}"
                                                       data-title="{{__('Edit Role')}}"
                                                       class="btn btn-success btn-sm edit-role-btn"
                                                       title="{{__('Edit')}}">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                @endcan
                                                @if($role->name != 'employee')
                                                @can('Delete Role')
                                                <a href="#"
                                                   class="btn btn-danger btn-sm"
                                                   data-toggle="tooltip"
                                                   title="{{ __('Delete') }}"
                                                   data-confirm="{{ __('Are You Sure?') . '|' . __('This action cannot be undone. Do you want to continue?') }}"
                                                   onclick="confirmDelete(event, 'delete-form-{{$role->id}}')">
                                                    <i class="fa fa-trash"></i>
                                                </a>

                                                {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'id' => 'delete-form-'.$role->id, 'style' => 'display:none;']) !!}
                                                {!! Form::close() !!}
                                                @endcan
                                                @endif

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Add Role Modal -->
<div class="modal fade" id="addJobTitleModal" tabindex="-1" aria-labelledby="addJobTitleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            {{-- Modal Header --}}
            <div class="modal-header bg-light  ">
                <h5 class="modal-title" id="addJobTitleModalLabel">{{ __('Add New Role') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            {{-- Modal Body --}}
            <div class="modal-body">
                {{-- Form Start --}}
                {{ Form::open(['url' => 'roles', 'method' => 'post', 'class' => 'needs-validation', 'novalidate' => true]) }}
                    {{-- Role Name Input --}}
                    <div class="form-group my-2">
                        {{ Form::label('name', __('Name'), ['class' => 'form-control-label font-weight-bold']) }}
                        {{ Form::text('name', null, ['class' => 'form-control ' . ($errors->has('name') ? 'is-invalid' : ''), 'placeholder' => __('Enter Role Name'), 'required' => true]) }}
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Permissions Section --}}
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-light">
                            <h5 class="card-title mb-0">{{ __('Assign Permissions to Role') }}</h5>
                        </div>
                        <div class="card-body">
                            @if(!empty($permissions))
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover dataTables">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>{{ __('Module') }}</th>
                                                <th>{{ __('Permissions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $modules = [
                                                    'User', 'Role', 'Award', 'Transfer', 'Resignation', 'Travel', 'Promotion', 'Complaint', 'Warning', 'Termination',
                                                    'Department', 'Designation', 'Document Type', 'Branch', 'Award Type', 'Termination Type', 'Employee', 'Payslip Type',
                                                    'Allowance Option', 'Loan Option', 'Deduction Option', 'Set Salary', 'Allowance', 'Commission', 'Loan', 'Saturation Deduction',
                                                    'Other Payment', 'Overtime', 'Pay Slip', 'Account List', 'Payee', 'Payer', 'Income Type', 'Expense Type', 'Payment Type',
                                                    'Deposit', 'Expense', 'Transfer Balance', 'Event', 'Announcement', 'Leave Type', 'Leave', 'Meeting', 'Ticket', 'Attendance',
                                                    'TimeSheet', 'Holiday', 'Plan', 'Assets', 'Document', 'Employee Profile', 'Employee Last Login', 'Indicator', 'Appraisal',
                                                    'Goal Tracking', 'Goal Type', 'Competencies', 'Company Policy', 'Trainer', 'Training', 'Training Type', 'Job Category',
                                                    'Job Stage', 'Job', 'Job Application', 'Job OnBoard', 'Job Application Note', 'Job Application Skill', 'Custom Question',
                                                    'Interview Schedule', 'Career', 'Report', 'Performance Type'
                                                ];
                                                if (Auth::user()->type == 'super admin') {
                                                    $modules[] = 'Language';
                                                }
                                            @endphp

                                            @foreach($modules as $module)
                                                <tr>
                                                    <td>{{ ucfirst($module) }}</td>
                                                    <td>
                                                        <div class="row">
                                                            {{-- Loop through permission types --}}
                                                            @foreach(['Manage', 'Create', 'Edit', 'Delete', 'Show', 'Move', 'Client Permission', 'Invite User', 'Buy', 'Add'] as $action)
                                                                @if(in_array($action . ' ' . $module, (array) $permissions))
                                                                    @php $key = array_search($action . ' ' . $module, $permissions); @endphp
                                                                    <div class="col-md-3 mb-2">
                                                                        <div class="custom-control custom-checkbox">
                                                                            {{ Form::checkbox('permissions[]', $key, false, ['class' => 'custom-control-input', 'id' => 'permission' . $key]) }}
                                                                            {{ Form::label('permission' . $key, $action, ['class' => 'custom-control-label font-weight-500']) }}
                                                                        </div>
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
                            @else
                                <div class="alert alert-warning" role="alert">
                                    {{ __('No permissions available.') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    {{-- Form Actions --}}
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancel') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('Create Role') }}</button>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>




@endsection
@section('script')
<script>
    function confirmDelete(event, formId) {
        // Prevent the default link click behavior
        event.preventDefault();

        const confirmationMessage = "{{ __('Are You Sure?') }}\n{{ __('This action cannot be undone. Do you want to continue?') }}";

        if (confirm(confirmationMessage)) {
            // Submit the form if user confirms
            document.getElementById(formId).submit();
        }
    }
</script>

@endsection

