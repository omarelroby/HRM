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
                                <div class="row my-2">
                                    <div class="col-lg-12">
                                        @if(!empty($permissions))
                                            <div class="ibox ">
                                                <div class="ibox-title my-2">
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

                                    <div class="col-12 my-2">
                                        <input type="submit" value="{{__('Update')}}" class="btn btn-primary">
                                        <input type="button" value="{{__('Cancel')}}" class="btn btn-white" data-dismiss="modal">
                                    </div>
                                </div>
                            {{Form::close()}}


                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

