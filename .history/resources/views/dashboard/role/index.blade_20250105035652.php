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
                            <tbody id="editPermissionsBody">
                                <!-- Permissions will be populated here dynamically -->
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



 <!-- Edit Job Title Modal -->

<div class="modal fade" id="editJobTitleModal" tabindex="-1" aria-labelledby="editJobTitleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editJobTitleModalLabel">{{ __('Edit Role') }}</h5>
            </div>
            {{Form::model($role,array('route' => array('roles.update', $role->id), 'method' => 'PUT')) }}
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        {{Form::label('name',__('Name'),['class'=>'form-control-label'])}}
                        @if($role->name == 'employee')
                            <p class="form-control">{{ $role->name }}</p>
                        @else
                            {{Form::text('name',null,array('class'=>'form-control','placeholder'=>__('Enter Role Name')))}}
                        @endif
                        @error('name')
                        <span class="invalid-name" role="alert">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    @if(!empty($permissions))
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5>{{__('Assign Permission to Roles')}}</h5>
                            </div>
                            <div class="ibox-content">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover dataTables" >
                                        <thead>
                                            <tr>
                                                <th>{{__('Module')}} </th>
                                                <th>{{__('Permissions')}} </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $modules=['User','Role','Award','Transfer','Resignation','Travel','Promotion','Complaint','Warning','Termination','Department','Designation','Document Type','Branch','Award Type','Termination Type','Employee','Payslip Type','Allowance Option','Loan Option','Deduction Option','Set Salary','Allowance','Commission','Loan','Saturation Deduction','Other Payment','Overtime','Pay Slip','Account List','Payee','Payer','Income Type','Expense Type','Payment Type',
                                                'Deposit','Expense','Transfer Balance','Event','Announcement','Leave Type','Leave','Meeting','Ticket','Attendance','TimeSheet','Holiday','Plan','Assets','Document','Employee Profile','Employee Last Login','Indicator','Appraisal','Goal Tracking','Goal Type','Competencies','Company Policy','Trainer','Training','Training Type','Job Category','Job Stage','Job','Job Application','Job OnBoard','Job Application Note','Job Application Skill','Custom Question','Interview Schedule',
                                                'Career','Report','Performance Type'];
                                                if(Auth::user()->type == 'super admin'){
                                                    $modules[] = 'Language';
                                                }
                                            @endphp
                                            @foreach($modules as $module)
                                                <tr>
                                                    <td>{{ $module }}</td>
                                                    <td>
                                                        <div class="row">
                                                            @if(in_array('Manage '.$module,(array) $permissions))
                                                                @if($key = array_search('Manage '.$module,$permissions))
                                                                    <div class="col-md-3 custom-control custom-checkbox">
                                                                        {{Form::checkbox('permissions[]',$key,$role->permission, ['class'=>'custom-control-input','id' =>'permission'.$key])}}
                                                                        {{Form::label('permission'.$key,'Manage',['class'=>'custom-control-label font-weight-500'])}}<br>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                            @if(in_array('Create '.$module,(array) $permissions))
                                                                @if($key = array_search('Create '.$module,$permissions))
                                                                    <div class="col-md-3 custom-control custom-checkbox">
                                                                        {{Form::checkbox('permissions[]',$key,$role->permission, ['class'=>'custom-control-input','id' =>'permission'.$key])}}
                                                                        {{Form::label('permission'.$key,'Create',['class'=>'custom-control-label font-weight-500'])}}<br>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                            @if(in_array('Edit '.$module,(array) $permissions))
                                                                @if($key = array_search('Edit '.$module,$permissions))
                                                                    <div class="col-md-3 custom-control custom-checkbox">
                                                                        {{Form::checkbox('permissions[]',$key,$role->permission, ['class'=>'custom-control-input','id' =>'permission'.$key])}}
                                                                        {{Form::label('permission'.$key,'Edit',['class'=>'custom-control-label font-weight-500'])}}<br>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                            @if(in_array('Delete '.$module,(array) $permissions))
                                                                @if($key = array_search('Delete '.$module,$permissions))
                                                                    <div class="col-md-3 custom-control custom-checkbox">
                                                                        {{Form::checkbox('permissions[]',$key,$role->permission, ['class'=>'custom-control-input','id' =>'permission'.$key])}}
                                                                        {{Form::label('permission'.$key,'Delete',['class'=>'custom-control-label font-weight-500'])}}<br>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                            @if(in_array('Show '.$module,(array) $permissions))
                                                                @if($key = array_search('Show '.$module,$permissions))
                                                                    <div class="col-md-3 custom-control custom-checkbox">
                                                                        {{Form::checkbox('permissions[]',$key,$role->permission, ['class'=>'custom-control-input','id' =>'permission'.$key])}}
                                                                        {{Form::label('permission'.$key,'Show',['class'=>'custom-control-label font-weight-500'])}}<br>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                            @if(in_array('Move '.$module,(array) $permissions))
                                                                @if($key = array_search('Move '.$module,$permissions))
                                                                    <div class="col-md-3 custom-control custom-checkbox">
                                                                        {{Form::checkbox('permissions[]',$key,$role->permission, ['class'=>'custom-control-input','id' =>'permission'.$key])}}
                                                                        {{Form::label('permission'.$key,'Move',['class'=>'custom-control-label font-weight-500'])}}<br>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                            @if(in_array('client permission '.$module,(array) $permissions))
                                                                @if($key = array_search('client permission '.$module,$permissions))
                                                                    <div class="col-md-3 custom-control custom-checkbox">
                                                                        {{Form::checkbox('permissions[]',$key,$role->permission, ['class'=>'custom-control-input','id' =>'permission'.$key])}}
                                                                        {{Form::label('permission'.$key,'Client Permission',['class'=>'custom-control-label font-weight-500'])}}<br>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                            @if(in_array('invite user '.$module,(array) $permissions))
                                                                @if($key = array_search('invite user '.$module,$permissions))
                                                                    <div class="col-md-3 custom-control custom-checkbox">
                                                                        {{Form::checkbox('permissions[]',$key,$role->permission, ['class'=>'custom-control-input','id' =>'permission'.$key])}}
                                                                        {{Form::label('permission'.$key,'Invite User ',['class'=>'custom-control-label font-weight-500'])}}<br>
                                                                    </div>
                                                                @endif
                                                            @endif

                                                            @if(in_array('buy '.$module,(array) $permissions))
                                                                @if($key = array_search('buy '.$module,$permissions))
                                                                    <div class="col-md-3 custom-control custom-checkbox">
                                                                        {{Form::checkbox('permissions[]',$key,$role->permission, ['class'=>'custom-control-input','id' =>'permission'.$key])}}
                                                                        {{Form::label('permission'.$key,'Buy',['class'=>'custom-control-label font-weight-500'])}}<br>
                                                                    </div>
                                                                @endif
                                                            @endif

                                                            @if(in_array('Add '.$module,(array) $permissions))
                                                                @if($key = array_search('Add '.$module,$permissions))
                                                                    <div class="col-md-3 custom-control custom-checkbox">
                                                                        {{Form::checkbox('permissions[]',$key,$role->permission, ['class'=>'custom-control-input','id' =>'permission'.$key])}}
                                                                        {{Form::label('permission'.$key,'Add ',['class'=>'custom-control-label font-weight-500'])}}<br>
                                                                    </div>
                                                                @endif
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
                    @endif
                </div>

                <div class="col-12">
                    <input type="submit" value="{{__('Update')}}" class="btn btn-primary">
                    <input type="button" value="{{__('Cancel')}}" class="btn btn-white" data-dismiss="modal">
                </div>
            </div>
            {{Form::close()}}

        </div>
    </div>
</div>


@endsection

@section('script')
<script>
    $(document).on('click', '.edit-role-btn', function (e) {
        e.preventDefault();
        const url = $(this).data('url');
        const roleId = $(this).data('id');
        const modalTitle = $(this).data('title');

        $.ajax({
            url: url,
            type: 'GET',
            success: function (response) {
                if (response.role && response.permissions) {
                    $('#addJobTitleModalLabel').text(modalTitle);
                    $('#roleName').val(response.role.name);
                    $('#edit-role-form').attr('action', '/roles/' + roleId);

                    $('#editPermissionsBody').empty();

                    // Loop through modules and add permissions dynamically
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

                    @foreach ($modules as $module)
                        const actions = ['Manage', 'Create', 'Edit', 'Delete'];
                        let row = `<tr>
                            <td>{{ ucfirst($module) }}</td>`;

                        actions.forEach(function(action) {
                            const permission = `${action}_${$module}`;
                            const isChecked = response.role.permissions.some((p) => p.name === permission) ? 'checked' : '';

                            row += `
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" name="permissions[]" value="${permission}" ${isChecked} class="form-check-input" id="permission-${permission}">
                                        <label class="form-check-label visually-hidden" for="permission-${permission}">${action}</label>
                                    </div>
                                </td>
                            `;
                        });

                        row += `</tr>`;
                        $('#editPermissionsBody').append(row);
                    }

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
