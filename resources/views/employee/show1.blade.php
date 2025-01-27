@extends('layouts.admin')

@section('page-title')
    {{__('Employee')}}
@endsection

@section('action-button')
    <div class="all-button-box row d-flex justify-content-end">
        @can('Edit Employee')
            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
                <a href="{{route('employee.edit',\Illuminate\Support\Facades\Crypt::encrypt($employee->id))}}" class="btn btn-primary btn-icon-only width-auto">
                    <i class="fa fa-edit"></i> {{ __('Edit') }}
                </a>
            </div>
        @endcan
    </div>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-6 ">
            <div class="employee-detail-wrap">
                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0">{{__('Personal Detail')}}</h6>
                    </div>
                    <div class="card-body employee-detail-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="info text-sm">
                                    <strong>{{__('EmployeeId')}}</strong>
                                    <span>{{$employeesId}}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info text-sm font-style">
                                    <strong>{{__('Name')}}</strong>
                                    <span>{{$employee->name}}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info text-sm font-style">
                                    <strong>{{__('Email')}}</strong>
                                    <span>{{$employee->email}}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info text-sm">
                                    <strong>{{__('Date of Birth')}}</strong>
                                    <span>{{\Auth::user()->dateFormat($employee->dob)}}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info text-sm">
                                    <strong>{{__('Phone')}}</strong>
                                    <span>{{$employee->phone}}</span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="info text-sm">
                                    <strong>{{__('jobtitle')}}</strong>
                                    <span>{{$employee->jobtitle ? $employee->jobtitle->name_ar : ''}}</span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="info text-sm">
                                    <strong>{{__('nationality')}}</strong>
                                    <span>{{$employee->nationality_type == 0 && $employee->nationality ?  $employee->nationality->name_ar : __('saudi') }}</span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="info text-sm">
                                    <strong>{{__('category')}}</strong>
                                    <span>{{$employee->category ? $employee->category->name_ar : ''}}</span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="info text-sm">
                                    <strong>{{__('work_time')}}</strong>
                                    <span>{{$employee->work_time == 1 ? __('full_time') : __('part_time')}}</span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="info text-sm">
                                    <strong>{{__('passport_number')}}</strong>
                                    <span>{{$employee->passport_number}}</span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="info text-sm">
                                    <strong>{{__('residence_number')}}</strong>
                                    <span>{{$employee->residence_number}}</span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="info text-sm">
                                    <strong>{{__('social_status')}}</strong>
                                    <span>{{$employee->social_status == 1 ? __('married') : __('single')}}</span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="info text-sm">
                                    <strong>{{__('commencement_date')}}</strong>
                                    <span>{{$employee->commencement_date}}</span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="info text-sm">
                                    <strong>{{__('contract_number')}}</strong>
                                    <span>{{$employee->contract_number}}</span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="info text-sm">
                                    <strong>{{__('insurance_number')}}</strong>
                                    <span>{{$employee->insurance_number}}</span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="info text-sm">
                                    <strong>{{__('driving_license')}}</strong>
                                    <span>{{$employee->driving_license == 1 ? __('yes') : __('no')}}</span>
                                </div>
                            </div>
                            
                            @if($employee->driving_license == 1)
                                <div class="col-md-6">
                                    <div class="info text-sm">
                                        <strong>{{__('driving_license_number')}}</strong>
                                        <span>{{$employee->driving_license_number}}</span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="info text-sm">
                                        <strong>{{__('expiry_date')}}</strong>
                                        <span>{{$employee->expiry_date}}</span>
                                    </div>
                                </div>
                            @endif

                            <div class="col-md-6">
                                <div class="info text-sm">
                                    <strong>{{__('city')}}</strong>
                                    <span>{{$employee->city}}</span>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="info text-sm">
                                    <strong>{{__('Address')}}</strong>
                                    <span>{{$employee->address}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 ">
            <div class="employee-detail-wrap">
                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0">{{__('Company Detail')}}</h6>
                    </div>
                    <div class="card-body employee-detail-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="info text-sm">
                                    <strong>{{__('Branch')}}</strong>
                                    <span>{{!empty($employee->branch)?$employee->branch->name:''}}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info text-sm font-style">
                                    <strong>{{__('Department')}}</strong>
                                    <span>{{!empty($employee->department)?$employee->department->name:''}}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info text-sm font-style">
                                    <strong>{{__('Designation')}}</strong>
                                    <span>{{!empty($employee->designation)?$employee->designation->name:''}}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info text-sm">
                                    <strong>{{__('Date Of Joining')}}</strong>
                                    <span>{{\Auth::user()->dateFormat($employee->company_doj)}}</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 ">
            <div class="employee-detail-wrap">
                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0">{{__('Contract_Detail')}}</h6>
                    </div>
                    <div class="card-body employee-detail-body">
                        @if($employeeContract)
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="info text-sm">
                                        <strong>{{__('contract_type')}}</strong>
                                        <span>
                                            @if($employeeContract->contract_type == 1)
                                                {{__('limited_time')}}
                                            @elseif($employeeContract->contract_type == 1)
                                                {{__('unlimited_time')}}
                                            @else
                                                {{__('temporary')}}
                                            @endif
                                        </span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="info text-sm">
                                        <strong>{{__('contract_startdate')}}</strong>
                                        <span>{{$employeeContract->contract_startdate}}</span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="info text-sm">
                                        <strong>{{__('contract_enddate')}}</strong>
                                        <span>{{$employeeContract->contract_enddate}}</span>
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="info text-sm">
                                        <strong>{{__('medical_insurance')}}</strong>
                                        <span>{{$employeeContract->medical_insurance == 1 ? __('available') : __('not_available') }}</span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="info text-sm">
                                        <strong>{{__('insurance_startdate')}}</strong>
                                        <span>{{$employeeContract->insurance_startdate}}</span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="info text-sm">
                                        <strong>{{__('insurance_enddate')}}</strong>
                                        <span>{{$employeeContract->insurance_enddate}}</span>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="info text-sm">
                                        <strong>{{__('worker')}}</strong>
                                        <span>{{$employeeContract->worker == 1 ? __('available') : __('not_available')}}</span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="info text-sm">
                                        <strong>{{__('worker_startdate')}}</strong>
                                        <span>{{$employeeContract->worker_startdate}}</span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="info text-sm">
                                        <strong>{{__('worker_enddate')}}</strong>
                                        <span>{{$employeeContract->worker_enddate}}</span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="info text-sm">
                                        <strong>{{__('passport_number')}}</strong>
                                        <span>{{$employeeContract->passport_number}}</span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="info text-sm">
                                        <strong>{{__('passport_expiredate')}}</strong>
                                        <span>{{$employeeContract->passport_expiredate}}</span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="info text-sm">
                                        <strong>{{__('residence_number')}}</strong>
                                        <span>{{$employeeContract->residence_number}}</span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="info text-sm">
                                        <strong>{{__('residence_expiredate')}}</strong>
                                        <span>{{$employeeContract->residence_expiredate}}</span>
                                    </div>
                                </div>

                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h6 class="mb-0">{{__('followers_Detail')}}</h6>
                        </div>
                        <div class="col text-right">
                            <a href="#" data-url="{{ route('followers.add',$employee->id) }}" data-size="md" data-ajax-popup="true" data-title="{{__('Create_follower')}}" data-toggle="tooltip" data-original-title="{{__('Create_follower')}}" class="apply-btn btn btn-primary mt-4">
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped mb-0">
                        <thead>
                        <tr>
                            <th>{{__('Employee Name')}}</th>
                            <th>{{__('follower_name')}}</th>
                            <th>{{__('residence_number')}}</th>
                            <th>{{__('passport_number')}}</th>
                            <th>{{__('Action')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($employeeFollowers as $Follower)
                                <tr>
                                    <td>{{ !empty($Follower->employee())?$Follower->employee()->name:'' }}</td>
                                    <td>{{ $Follower->name }}</td>
                                    <td>{{ $Follower->residence_number }}</td>
                                    <td>{{ $Follower->passport_number }}</td>
                                    <td class="text-right">
                                        <a href="#" data-url="{{ URL::to('followers/'.$Follower->id.'/edit') }}" data-size="lg" data-ajax-popup="true" data-title="{{__('Edit followers')}}" class="edit-icon btn btn-success" data-toggle="tooltip" data-original-title="{{__('Edit')}}"><i class="fas fa-edit"></i></a>
                                        <a href="#" class="delete-icon btn btn-danger" data-toggle="tooltip" data-original-title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('followers-delete-form-{{$Follower->id}}').submit();"><i class="fas fa-trash"></i></a>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['followers.destroy', $Follower->id],'id'=>'followers-delete-form-'.$Follower->id]) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-md-6 ">
            <div class="employee-detail-wrap">
                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0">{{__('Document Detail')}}</h6>
                    </div>
                    <div class="card-body employee-detail-body">
                        <div class="row">
                            @php
                               $employeedoc = $employee->documents()->pluck('document_value','document_id');
                            @endphp
                            @foreach($documents as $key=>$document)
                                <div class="col-md-12">
                                    <div class="info text-sm">
                                        <strong>{{$document->name }}</strong>
                                        <span><a href="{{ (!empty($employeedoc[$document->id])?asset(Storage::url('uploads/document')).'/'.$employeedoc[$document->id]:'') }}" target="_blank">{{ (!empty($employeedoc[$document->id])?$employeedoc[$document->id]:'') }}</a></span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 ">
            <div class="employee-detail-wrap">
                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0">{{__('Bank Account Detail')}}</h6>
                    </div>
                    <div class="card-body employee-detail-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="info text-sm">
                                    <strong>{{__('Account Holder Name')}}</strong>
                                    <span>{{$employee->account_holder_name}}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info text-sm font-style">
                                    <strong>{{__('Account Number')}}</strong>
                                    <span>{{$employee->account_number}}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info text-sm font-style">
                                    <strong>{{__('Bank Name')}}</strong>
                                    <span>{{$employee->bank_name}}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info text-sm">
                                    <strong>{{__('Bank Identifier Code')}}</strong>
                                    <span>{{$employee->bank_identifier_code}}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info text-sm">
                                    <strong>{{__('Branch Location')}}</strong>
                                    <span>{{$employee->branch_location}}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info text-sm">
                                    <strong>{{__('Tax Payer Id')}}</strong>
                                    <span>{{$employee->tax_payer_id}}</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h6 class="mb-0">{{__('Employee_Tracking')}}</h6>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped mb-0">
                        <thead>
                        <tr>
                            <th>{{__('track_date')}}</th>
                            <th>{{__('Action')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                            @for($i = 0 ; $i < count($employee_tracking_dates) ; $i++)
                                <tr>
                                    <td>{{ $employee_tracking_dates[$i]['date'] }}</td>

                                    <td class="text-right">
                                        <a target="_blank" style="width: 50px;" href="{{asset('/')}}show-employee-tracking/{{ $employee_tracking_dates[$i]['employee_id'] }}/{{ $employee_tracking_dates[$i]['date'] }}" class="edit-icon btn btn-success bg-success" data-toggle="tooltip" data-original-title="{{__('tracking')}}">
                                            <i class="fa fa-map-marker"> {{__('tracking')}} </i> 
                                        </a>
                                    </td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection

