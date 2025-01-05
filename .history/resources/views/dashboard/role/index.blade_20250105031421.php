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
            @can('Create Employee')
                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#addJobTitleModal" class="btn btn-primary">
                        <i class="fa fa-plus"></i> {{ __('Create') }}
                    </a>
                </div>
            @endcan
        </div>
        <!-- Card for Job Titles List -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5>{{ __('Job Titles List') }}</h5>
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
                                                        <a href="#"
                                                        data-url="{{ URL::to('roles/'.$role->id.'/edit') }}"
                                                        data-id="{{ $role->id }}"
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
                                                           title="{{__('Delete')}}"
                                                           data-confirm="{{ __('Are You Sure?') . '|' . __('This action cannot be undone. Do you want to continue?') }}"
                                                           data-confirm-yes="document.getElementById('delete-form-{{$role->id}}').submit();">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'id' => 'delete-form-'.$role->id]) !!}
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

 <!-- Add Job Title Modal -->
<div class="modal fade" id="addJobTitleModal" tabindex="-1" aria-labelledby="addJobTitleModalLabel" aria-hidden="true">
 <!-- Edit Role Modal -->

    <div class="modal fade" id="EditRoleModal" tabindex="-1" aria-labelledby="addJobTitleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EditRoleModalLabel">{{ __('Add New Role') }}</h5>
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

                <!-- Permissions Section -->
                @if (!empty($permissions))
                <div class="permissions-section">
                    <h5 class="mb-3">{{ __('Assign Permissions to Role') }}</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="table-light">
                                <tr>
                                    <th>{{ __('Module') }}</th>
                                    @foreach (['Manage', 'Create', 'Edit', 'Delete'] as $action)
                                    <th>{{ $action }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $modules = ['User', 'Role', 'Award', 'Transfer', 'Resignation', 'Travel', 'Promotion', 'Complaint', 'Warning', 'Termination', 'Department', 'Designation', 'Document Type', 'Branch', 'Award Type', 'Termination Type', 'Employee', 'Payslip Type', 'Allowance Option', 'Loan Option', 'Deduction Option', 'Set Salary', 'Allowance', 'Commission', 'Loan', 'Saturation Deduction', 'Other Payment', 'Overtime', 'Pay Slip', 'Account List', 'Payee', 'Payer', 'Income Type', 'Expense Type', 'Payment Type', 'Deposit', 'Expense', 'Transfer Balance', 'Event', 'Announcement', 'Leave Type', 'Leave', 'Meeting', 'Ticket', 'Attendance', 'TimeSheet', 'Holiday', 'Plan', 'Assets', 'Document', 'Employee Profile', 'Employee Last Login', 'Indicator', 'Appraisal', 'Goal Tracking', 'Goal Type', 'Competencies', 'Company Policy', 'Trainer', 'Training', 'Training Type', 'Job Category', 'Job Stage', 'Job', 'Job Application', 'Job OnBoard', 'Job Application Note', 'Job Application Skill', 'Custom Question', 'Interview Schedule', 'Career', 'Report', 'Performance Type'];
                                if (Auth::user()->type == 'super admin') {
                                    $modules[] = 'Language';
                                }
                                @endphp
                                @foreach ($modules as $module)
                                <tr>
                                    <td>{{ ucfirst($module) }}</td>
                                    @foreach (['Manage', 'Create', 'Edit', 'Delete'] as $action)
                                    <td>
                                        @if (in_array("$action $module", (array) $permissions))
                                        @if ($key = array_search("$action $module", $permissions))
                                        <div class="form-check">
                                            {{ Form::checkbox('permissions[]', $key, false, ['class' => 'form-check-input', 'id' => "permission$key"]) }}
                                            <label class="form-check-label visually-hidden" for="permission{{ $key }}">{{ $action }}</label>
                                        </div>
                                        @endif
                                        @endif
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





@endsection

@section('script')
<script>
    // Optional: Submit form via AJAX for a smooth UX (No page reload)
    $('#createJobTitleForm').submit(function(event) {
        event.preventDefault();
        var formData = $(this).serialize();

        $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: formData,
            success: function(response) {
                if (response.success) {
                    $('#addJobTitleModal').modal('hide');
                    location.reload(); // Refresh page to show the new Job Title
                } else {
                    alert(response.message); // Show error message if needed
                }
            },
            error: function() {
                alert('{{ __('Something went wrong. Please try again.') }}');
            }
        });
    });
</script>
<script>
    $(document).on('click', '.edit-role-btn', function (e) {
        e.preventDefault();

        const url = $(this).data('url'); // URL for fetching role data
        const modalTitle = $(this).data('title'); // Title for the modal

        $.ajax({
            url: url,
            type: 'GET',
            success: function (response) {
                if (response.role && response.permissions) {
                    // Populate modal title
                    $('#addJobTitleModalLabel').text(modalTitle);

                    // Populate role name
                    $('#roleName').val(response.role.name);

                    // Clear existing permissions
                    $('.permissions-section').empty();

                    // Populate permissions
                    Object.keys(response.permissions).forEach(function (permissionId) {
                        const permissionName = response.permissions[permissionId];

                        // Check if the permission is already assigned to the role
                        const isChecked = response.role.permissions.some(
                            (p) => p.id == permissionId
                        )
                            ? 'checked'
                            : '';

                        // Create permission row
                        const row = `
                            <div class="form-check mb-2">
                                <input type="checkbox"
                                       name="permissions[]"
                                       value="${permissionId}"
                                       class="form-check-input"
                                       id="permission-${permissionId}"
                                       ${isChecked}>
                                <label class="form-check-label" for="permission-${permissionId}">
                                    ${permissionName}
                                </label>
                            </div>
                        `;

                        $('.permissions-section').append(row);
                    });

                    // Show the modal
                    $('#addJobTitleModal').modal('show');
                }
            },
            error: function (xhr) {
                console.error(xhr.responseJSON.message);
                alert('Failed to fetch role data.');
            },
        });
    });
</script>

@endsection
