@extends('layouts.admin')
@section('page-title')
    {{__('Employee')}}
@endsection

<style>
    body {
    background: #fff;
    }
    .filters {
    font-family: sans-serif;
    }
    .filters-content {
    margin: 2rem 0 2.5rem;
    background-color: #eee;
    padding: 0.375rem;
    border-radius: 0.75rem;
    display: flex;
    justify-content: space-between;
    -moz-column-gap: 0.5rem;
        column-gap: 0.5rem;
    }
    .filters__button {
    width: 100%;
    border: none;
    outline: none;
    padding: 1rem;
    transition: 0.3s;
    border-radius: 0.5rem;
    }
    .filters__button:hover {
    background-color: #fff;
    }

    /* Hide*/
    .filters [data-content] {
    display: none;
    }

    [data-content].is-active[data-content] {
    display: grid;
    }

    [data-target].is-active {
    background-color: #4042f6;
    color: #fff;
    }

    #btn-anchor{
        float: none;
        
        padding: 1%;
    }

    .ibox{width:100%;padding: 5%;}

</style>

@section('content')
    <section class="filters">
        <ul class="filters-content">
            <button class="filters__button is-active" data-target="#personal"> {{__('Personal')}} </button>
            <button class="filters__button" data-target="#organization_info">{{__('Organization')}}</button>
            <button class="filters__button" data-target="#financial"> {{__('Financial')}}</button>
            <button class="filters__button" data-target="#assets"> {{__('assets')}}</button>
            <button class="filters__button" data-target="#documents"> {{__('Documents')}}</button>
            <button class="filters__button" data-target="#leaves"> {{__('employee requests')}}</button>
            <button class="filters__button" data-target="#attendance"> {{__('attendance')}}</button>
        </ul>

        <div>

            <div data-content class="is-active" id="personal">
                <div class="card">
                    {{ Form::model($employee, array('route' => array('employee.update', $employee->id), 'method' => 'PUT' , 'enctype' => 'multipart/form-data')) }}
                    @csrf
                        <div class="card col-md-12">

                            <div class="row">
                                <h5 class="col-md-12">{{__('general_information')}}</h5>
                                <div class="form-group col-md-4">
                                    {!! Form::label('name', __('Name'),['class'=>'form-control-label']) !!}
                                    {!! Form::text('name', old('name'), ['class' => 'form-control wizard-required']) !!}
                                    <div class="wizard-form-error"></div>
                                </div>

                                <div class="form-group col-md-4">
                                    {!! Form::label('name_ar', __('Name_ar'),['class'=>'form-control-label']) !!}
                                    {!! Form::text('name_ar', old('name_ar'), ['class' => 'form-control wizard-required' ]) !!}
                                    <div class="wizard-form-error"></div>
                                </div>

                                <div class="form-group col-md-4">
                                    {!! Form::label('sync_attendance_employee_id', __('sync_attendance_employee_id'),['class'=>'form-control-label']) !!}
                                    <select class="form-control wizard-required" name="sync_attendance_employee_id">
                                        @for($i = 0 ; $i < count($attandance_employees) ; $i++)
                                            <option value="{{ $attandance_employees[$i]['id'] }}">{{ $attandance_employees[$i]['name'] }}</option>
                                        @endfor
                                    </select>
                                    <div class="wizard-form-error"></div>
                                </div>

                                <div class="form-group col-md-6">
                                    {!! Form::label('employee_id', __('Employee ID'),['class'=>'form-control-label']) !!}
                                    {!! Form::text('employee_id', $employeesId, ['class' => 'form-control '  ,'disabled'=>'disabled']) !!}
                                    <div class="wizard-form-error"></div>
                                </div>

                                <div class="form-group col-md-3 ">
                                    {{ Form::label('nationality_type', __('nationality_type'),['class'=>'form-control-label']) }}
                                    {{ Form::select('nationality_type', [ "0" => __('non_saudi') , "1" => __('saudi') ],null, array('class' => 'form-control wizard-required' ,'id' => 'nationality_type')) }}
                                    <div class="wizard-form-error"></div>
                                </div>

                                
                                <div class="form-group col-md-3">
                                    <div id="nationality" >
                                        {{ Form::label('nationality_id', __('nationality'),['class'=>'form-control-label']) }}
                                        {{ Form::select('nationality_id', $nationalities,null, array('class' => 'form-control wizard-required' )) }}
                                    </div>
                                    <div class="wizard-form-error"></div>
                                </div>
                                

                                <div class="form-group @if(\Auth::user()->type != 'employee') col-md-4 @else col-md-6 @endif">
                                    {!! Form::label('email', __('Email'),['class'=>'form-control-label']) !!}
                                    {!! Form::email('email',old('email'), ['class' => 'form-control wizard-required']) !!}
                                    <div class="wizard-form-error"></div>
                                </div>

                                <div class="form-group @if(\Auth::user()->type != 'employee') col-md-4 @else col-md-6 @endif">
                                    {!! Form::label('phone', __('Phone'),['class'=>'form-control-label']) !!}
                                    {!! Form::text('phone',old('phone'), ['class' => 'form-control wizard-required']) !!}
                                    <div class="wizard-form-error"></div>
                                </div>

                                @if(\Auth::user()->type != 'employee')
                                    <div class="form-group col-md-4">
                                        {!! Form::label('password', __('Password'),['class'=>'form-control-label']) !!}
                                        {!! Form::password('password', ['class' => 'form-control']) !!}
                                        <div class="wizard-form-error"></div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <fieldset>
                                            <legend>
                                                {{__('Do you want to register in the list of users')}}
                                            </legend>
                                            
                                            <div class="form-check abc-radio abc-radio-info form-check-inline">
                                                <input class="form-check-input" type="radio" id="inlineRadio1" value="1" name="user_register" @if($employee->user_register == 1) checked="" @endif>
                                                <label class="form-check-label" for="inlineRadio1"> {{__('yes')}} </label>
                                            </div>

                                            <div class="form-check abc-radio form-check-inline">
                                                <input class="form-check-input" type="radio" id="inlineRadio2" value="0" name="user_register" @if($employee->user_register == 0) checked="" @endif>
                                                <label class="form-check-label" for="inlineRadio2"> {{__('no')}} </label>
                                            </div>

                                        </fieldset>
                                    </div> 
                                @endif
                                
                            </div>

                            <div class="optional-toggle">
                                <div class="flex_xiMMzi itemsCenter_3nXjZC optional-toggle-content">
                                    <p class="caption12_2TCN8H weight_bold" style="color: var(--onboarding-slategrey-700);text-align: center;">{{__('optional_information')}}</p>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="6" height="9" viewBox="0 0 6 9" class="" style="transform: rotate(-90deg);">
                                        <path
                                            fill="#7889a0"
                                            fill-rule="evenodd"
                                            d="M5.42879461,8.138845 C5.53304571,8.35942538 5.75437086,8.5 5.99740852, 8.5 C6.24044619,8.5 6.46177133,8.35942538 6.56602243,8.138845 L10.3492379, 3.37399091 C10.658484,2.89389728 10.4789218,2.5 9.93025921, 2.5 L2.06455783,2.5 C1.52587097,2.5 1.336333,2.89389728 1.65555484,3.37399091 L5.42879461, 8.138845 Z"
                                            transform="rotate(-90 4 6.5)"
                                        ></path>
                                    </svg>
                                </div>
                            </div>

                            <div class="row">
                                <h6 class="col-md-12">{{__('employee_identification')}}</h6>

                                <div class="form-group col-md-3">
                                    {{ Form::label('gender', __('Gender'),['class'=>'form-control-label']) }}
                                    {{ Form::select('gender', [ "Male" => __('Male') , "Female" => __('Female') ],null, array('class' => 'form-control')) }}
                                </div>

                                <div class="form-group col-md-3">
                                    {{ Form::label('social_status', __('social_status'),['class'=>'form-control-label']) }}
                                    {{ Form::select('social_status', [ "1" => __('married') , "0" => __('single') , "2" => __('divorced') ],null, array('class' => 'form-control')) }}
                                </div>

                                <div class="form-group col-md-3">
                                    {{ Form::label('religion', __('Religion'),['class'=>'form-control-label']) }}
                                    {{ Form::select('religion', [ "1" => __('muslim') , "0" => __('non_muslim') ],null, array('class' => 'form-control')) }}
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        {!! Form::label('dob', __('Date of Birth'),['class'=>'form-control-label']) !!}
                                        {!! Form::text('dob', $employee->dob ?? now(), ['class' => 'form-control gregorian-date']) !!}
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    {{ Form::label('department_id', __('Department'),['class'=>'form-control-label']) }}
                                    {{ Form::select('department_id', $departments,null, array('class' => 'form-control required' )) }}
                                </div>

                                <div class="form-group col-md-6">
                                    {{ Form::label('designation_id', __('Designation'),['class'=>'form-control-label']) }}
                                    {{ Form::select('designation_id', $designations,null, array('class' => 'form-control required' )) }}
                                </div>

                                <div class="form-group col-md-4">
                                    {{ Form::label('out_of_saudia', __('out_of_saudia'),['class'=>'form-control-label']) }}
                                    {{ Form::select('out_of_saudia', [ "1" => __('yes') , "0" => __('no') ],null, array('class' => 'form-control')) }}
                                </div>

                                <div class="form-group col-md-4">
                                    {!! Form::label('employer_phone', __('employer_phone'),['class'=>'form-control-label']) !!}
                                    {!! Form::text('employer_phone',old('employer_phone'), ['class' => 'form-control']) !!}
                                </div>

                                <div class="form-group col-md-4">
                                    {{ Form::label('jobtitle_id', __('jobtitle'),['class'=>'form-control-label']) }}
                                    {{ Form::select('jobtitle_id', $jobtitles,null, array('class' => 'form-control ')) }}
                                </div>
                            </div>

                            <div class="row">
                                <h6 class="col-md-12">{{__('ID_qama_details')}}</h6>
                                <div class="form-group col-md-3">
                                    {!! Form::label('residence_number', __('residence_number'),['class'=>'form-control-label']) !!}
                                    {!! Form::text('residence_number', old('residence_number'), ['class' => 'form-control']) !!}
                                </div>

                                <div class="form-group col-md-3">
                                    {!! Form::label('place_of_issuance_of_ID_residence', __('place_of_issuance_of_ID_residence'),['class'=>'form-control-label']) !!}
                                    {!! Form::text('place_of_issuance_of_ID_residence', old('place_of_issuance_of_ID_residence'), ['class' => 'form-control']) !!}
                                </div>

                                <div class="form-group col-md-3">
                                    {!! Form::label('iqama_issuance_date_Hijri', __('iqama_issuance_date_Hijri'),['class'=>'form-control-label']) !!}
                                    {!! Form::text('iqama_issuance_date_Hijri', old('iqama_issuance_date_Hijri') ?? now(), ['id' => 'hijri_4' , 'class' => 'form-control hijri-date-input']) !!}
                                </div>

                                <div class="form-group col-md-3">
                                    {!! Form::label('iqama_issuance_date_gregorian', __('iqama_issuance_date_gregorian'),['class'=>'form-control-label']) !!}
                                    {!! Form::text('iqama_issuance_date_gregorian', $employee->iqama_issuance_date_gregorian ?? now(), ['id' => 'gregorian_4' ,'class' => 'form-control gregorian-date']) !!}
                                </div>

                                <div class="form-group col-md-3">
                                    {!! Form::label('iqama_issuance_expirydate_Hijri', __('iqama_issuance_expirydate_Hijri'),['class'=>'form-control-label']) !!}
                                    {!! Form::text('iqama_issuance_expirydate_Hijri', $employee->iqama_issuance_expirydate_Hijri ?? now(), ['id' => 'hijri_5' ,'class' => 'form-control hijri-date-input']) !!}
                                </div>

                                <div class="form-group col-md-3">
                                    {!! Form::label('iqama_issuance_expirydate_gregorian', __('iqama_issuance_expirydate_gregorian'),['class'=>'form-control-label']) !!}
                                    {!! Form::text('iqama_issuance_expirydate_gregorian', $employee->iqama_issuance_expirydate_gregorian ?? now(), ['id' => 'gregorian_5','class' => 'form-control gregorian-date']) !!}
                                </div>

                                <div class="form-group col-md-3">
                                    {!! Form::label('iqama_attachment', __('add_attachment'),['class'=>'form-control-label']) !!}
                                    {!! Form::file('iqama_attachment', old('iqama_attachment'), ['class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="row">
                                <h6 class="col-md-12">{{__('Passport_details')}}</h6>

                                <div class="form-group col-md-3">
                                    {!! Form::label('passport_number', __('passport_number'),['class'=>'form-control-label']) !!}
                                    {!! Form::text('passport_number', old('passport_number'), ['class' => 'form-control']) !!}
                                </div>

                                <div class="form-group col-md-3">
                                    {!! Form::label('place_of_issuance_of_passport', __('place_of_issuance_of_passport'),['class'=>'form-control-label']) !!}
                                    {!! Form::text('place_of_issuance_of_passport', old('place_of_issuance_of_passport'), ['class' => 'form-control']) !!}
                                </div>

                                <div class="form-group col-md-3">
                                    {!! Form::label('passport_issuance_date_gregorian', __('passport_issuance_date_gregorian'),['class'=>'form-control-label']) !!}
                                    {!! Form::text('passport_issuance_date_gregorian', $employee->passport_issuance_date_gregorian ?? now(), ['class' => 'form-control gregorian-date']) !!}
                                </div>

                                <div class="form-group col-md-3">
                                    {!! Form::label('passport_issuance_expirydate_gregorian', __('passport_issuance_expirydate_gregorian'),['class'=>'form-control-label']) !!}
                                    {!! Form::text('passport_issuance_expirydate_gregorian', $employee->passport_issuance_expirydate_gregorian ?? now(), ['class' => 'form-control gregorian-date']) !!}
                                </div>

                                <div class="form-group col-md-3">
                                    {!! Form::label('passport_attachment', __('add_attachment'),['class'=>'form-control-label']) !!}
                                    {!! Form::file('passport_attachment', old('passport_attachment'), ['class' => 'form-control']) !!}
                                </div>

                            </div>

                            <div class="row">
                                <h6 class="col-md-12">{{__('Address_in_saudia')}}</h6>
                                <div class="form-group col-md-3">
                                    {!! Form::label('building_number', __('building_number'),['class'=>'form-control-label']) !!}
                                    {!! Form::text('building_number', old('building_number'), ['class' => 'form-control']) !!}
                                </div>

                                <div class="form-group col-md-3">
                                    {!! Form::label('street_name', __('Street_name'),['class'=>'form-control-label']) !!}
                                    {!! Form::text('street_name', old('street_name'), ['class' => 'form-control']) !!}
                                </div>

                                <div class="form-group col-md-3">
                                    {!! Form::label('region', __('region'),['class'=>'form-control-label']) !!}
                                    {!! Form::text('region', old('region'), ['class' => 'form-control']) !!}
                                </div>

                                <div class="form-group col-md-3">
                                    {!! Form::label('city', __('city'),['class'=>'form-control-label']) !!}
                                    {!! Form::text('city', old('city'), ['class' => 'form-control']) !!}
                                </div>

                                <div class="form-group col-md-3">
                                    {!! Form::label('country', __('Country'),['class'=>'form-control-label']) !!}
                                    {!! Form::text('country', old('country'), ['class' => 'form-control']) !!}
                                </div>

                                <div class="form-group col-md-3">
                                    {!! Form::label('postal_code', __('postal_code'),['class'=>'form-control-label']) !!}
                                    {!! Form::text('postal_code', old('postal_code'), ['class' => 'form-control']) !!}
                                </div>

                            </div>

                            <div class="row">
                                <h6 class="col-md-12">{{__('Address_in_mother_country')}}</h6>
                                <div class="form-group col-md-6">
                                    {!! Form::label('Address', __('Address'),['class'=>'form-control-label']) !!}
                                    {!! Form::text('address', old('address'), ['class' => 'form-control']) !!}
                                </div>

                                <div class="form-group col-md-3">
                                    {!! Form::label('mother_city', __('city'),['class'=>'form-control-label']) !!}
                                    {!! Form::text('mother_city', old('mother_city'), ['class' => 'form-control']) !!}
                                </div>

                                <div class="form-group col-md-3">
                                    {!! Form::label('mother_country', __('Country'),['class'=>'form-control-label']) !!}
                                    {!! Form::text('mother_country', old('mother_country'), ['class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="row">
                                <h6 class="col-md-12">{{__('Emergency_contact')}}</h6>
                                <div class="form-group col-md-3">
                                    {!! Form::label('emergency_contact_name', __('Name'),['class'=>'form-control-label']) !!}
                                    {!! Form::text('emergency_contact_name', old('emergency_contact_name'), ['class' => 'form-control']) !!}
                                </div>

                                <div class="form-group col-md-3">
                                    {!! Form::label('emergency_contact_relationship', __('relationship'),['class'=>'form-control-label']) !!}
                                    {!! Form::text('emergency_contact_relationship', old('emergency_contact_relationship'), ['class' => 'form-control']) !!}
                                </div>

                                <div class="form-group col-md-3">
                                    {!! Form::label('emergency_contact_address', __('Address'),['class'=>'form-control-label']) !!}
                                    {!! Form::text('emergency_contact_address', old('emergency_contact_address'), ['class' => 'form-control']) !!}
                                </div>

                                <div class="form-group col-md-3">
                                    {!! Form::label('emergency_contact_phone', __('Phone'),['class'=>'form-control-label']) !!}
                                    {!! Form::text('emergency_contact_phone', old('emergency_contact_phone'), ['class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="row">
                                <h6 class="col-md-12">{{__('custom_fields')}}</h6>
                                <div class="form-group col-md-6">
                                    {!! Form::label('custom_field_corona', __('corona_vaccine_doses'),['class'=>'form-control-label']) !!}
                                    {!! Form::textarea('custom_field_corona', old('custom_field_corona'), ['class' => 'form-control']) !!}
                                </div>

                                <div class="form-group col-md-6">
                                    {!! Form::label('custom_field_notes', __('Notes'),['class'=>'form-control-label']) !!}
                                    {!! Form::textarea('custom_field_notes', old('custom_field_notes'), ['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <input type="submit" value="{{__('Update')}}" class="btn btn-primary radius-10px float-right">
                            </div>
                        </div>
                    {!! Form::close() !!}

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox ">
                                <div class="ibox-title">
                                    <h5>{{__('family_members')}}</h5>
                                    <a href="#" data-url="{{ route('followers.add',$employee->id) }}" data-size="md" data-ajax-popup="true" data-title="{{__('Create_follower')}}" data-toggle="tooltip" data-original-title="{{__('Create_follower')}}" class="btn btn-info">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                                <div class="ibox-content">
                                    <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover dataTables" >
                                        <thead>
                                        <tr>
                                            <th>{{__('Name')}}</th>
                                            <th>{{__('residence_number')}}</th>
                                            <th>{{__('passport_number')}}</th>
                                            <th>{{__('Attachment')}}</th>
                                            <th>{{__('Action')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($employeeFollowers as $Follower)
                                            @php
                                                $documentPath = asset(Storage::url('uploads/documentUpload'));
                                            @endphp
                                                <tr>
                                                    <td>{{ $Follower->name }}</td>
                                                    <td>{{ $Follower->residence_number }}</td>
                                                    <td>{{ $Follower->passport_number }}</td>
                                                    <td>
                                                        @if(!empty($Follower->documents))
                                                            <a href="{{$documentPath.'/'.$Follower->documents}}" target="_blank">
                                                                <i class="fa fa-download"></i>
                                                            </a>
                                                        @else
                                                            <p>-</p>
                                                        @endif
                                                    </td>
                                                    <td class="text-right">
                                                        <a href="#" data-url="{{ URL::to('followers/'.$Follower->id.'/edit') }}" data-size="lg" data-ajax-popup="true" data-title="{{__('Edit followers')}}" class="edit-icon btn btn-success" data-toggle="tooltip" data-original-title="{{__('Edit')}}"><i class="fa fa-edit"></i></a>
                                                        <a href="#" class="delete-icon btn btn-danger" data-toggle="tooltip" data-original-title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('followers-delete-form-{{$Follower->id}}').submit();"><i class="fa fa-trash"></i></a>
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
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox ">
                                <div class="ibox-title">
                                    <h5>{{__('qualifications')}}</h5>
                                    <a href="#" data-url="{{ route('qualifications.add',$employee->id) }}" data-size="md" data-ajax-popup="true" data-title="{{__('add_qualification')}}" data-toggle="tooltip" data-original-title="{{__('add_qualification')}}" class="btn btn-info">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                                <div class="ibox-content">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover dataTables" >
                                            <thead>
                                                <tr>
                                                    <th>{{__('major')}}</th>
                                                    <th>{{__('quakification_degree')}}</th>
                                                    <th>{{__('institute_name')}}</th>
                                                    <th>{{__('study_length')}}</th>
                                                    <th>{{__('graduation_date')}}</th>
                                                    <th>{{__('Action')}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($qualifications as $qualification)
                                                    <tr>
                                                        <td>{{ $qualification->major }}</td>
                                                        <td>{{ $qualification->degree }}</td>
                                                        <td>{{ $qualification->institute_name }}</td>
                                                        <td>{{ $qualification->study_length }}</td>
                                                        <td>{{ $qualification->graduation_date }}</td>
                                                        <td class="text-right">
                                                            <a href="#" data-url="{{ URL::to('qualifications/'.$qualification->id.'/edit') }}" data-size="lg" data-ajax-popup="true" data-title="" class="edit-icon btn btn-success" data-toggle="tooltip" data-original-title="{{__('Edit')}}"><i class="fa fa-edit"></i></a>
                                                            <a href="#" class="delete-icon btn btn-danger" data-toggle="tooltip" data-original-title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('qualifications-delete-form-{{$qualification->id}}').submit();"><i class="fa fa-trash"></i></a>
                                                            {!! Form::open(['method' => 'DELETE', 'route' => ['qualifications.destroy', $qualification->id],'id'=>'qualifications-delete-form-'.$qualification->id]) !!}
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
                    </div>
                </div>
            </div>

            <div data-content id="organization_info">
                <div class="card mb-4 ol-md-12">
                    {{ Form::model($employee, array('route' => array('employee.update', $employee->id), 'method' => 'PUT' , 'enctype' => 'multipart/form-data')) }}
                        @csrf
                        <input type="hidden" name="update_organization_info">
                        
                        <div class="row">
                            <h5 class="col-md-12">{{__('general_information')}}</h5>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label('Join_date_gregorian', __('Join_date_gregorian'),['class'=>'form-control-label']) !!}
                                    {!! Form::text('Join_date_gregorian', $employee->Join_date_gregorian, ['id' => 'gregorian_1' ,'class' => 'form-control gregorian-date']) !!}
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label('Join_date_hijri', __('Join_date_hijri'),['class'=>'form-control-label']) !!}
                                    {!! Form::text('Join_date_hijri', old('Join_date_hijri'), ['id' => 'hijri_1' ,'class' => 'form-control hijri-date-input']) !!}
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                {{ Form::label('jobtitle_id', __('jobtitle'),['class'=>'form-control-label']) }}
                                {{ Form::select('jobtitle_id', $jobtitles,null, array('class' => 'form-control  select2')) }}
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    {{ Form::label('work_time', __('job_type'),['class'=>'form-control-label']) }}
                                    {{ Form::select('work_time', $job_types,null, array('class' => 'form-control  select2')) }}
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    {{ Form::label('labor_hire_company', __('labor_hire_company'),['class'=>'form-control-label']) }}
                                    {{ Form::select('labor_hire_company', $laborCompanies,null, array('class' => 'form-control')) }}
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                {{ Form::label('branch_id', __('Branch'),['class'=>'form-control-label']) }}
                                {{ Form::select('branch_id', $branches,null, array('class' => 'form-control')) }}
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    {{ Form::label('work_unit', __('work_unit'),['class'=>'form-control-label']) }}
                                    {{ Form::select('work_unit', $work_units,null, array('class' => 'form-control ')) }}
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    {{ Form::label('class', __('class'),['class'=>'form-control-label']) }}
                                    {{ Form::select('class', $jobclasses,null, array('class' => 'form-control ')) }}
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    {{ Form::label('direct_manager', __('direct_manager'),['class'=>'form-control-label']) }}
                                    {{ Form::select('direct_manager', $employees,null, array('class' => 'form-control ')) }}
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    {{ Form::label('permission', __('Permission'),['class'=>'form-control-label']) }}
                                    {{ Form::select('permission', $roles,null, array('class' => 'form-control ')) }}
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <input checked="checked" name="uploading_record_permission" type="checkbox" style="height: auto;margin-top: 45px;">
                                    {{ Form::label('uploading_record_permission', __('The_possibility_of_uploading_the_record_without_regard_to_the_geographical_location'),['class'=>'form-control-label']) }}
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <fieldset>
                                    <div class="col-md-6">
                                        <h6>{{__('shifts')}}</h6>
                                        @foreach($employee_shifts as $shift)
                                            <div class="radio-check">
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="shift_{{$shift->id}}" @if($shift->id == $employee->shift) checked @endif value="{{$shift->id}}" name="shift" class="custom-control-input">
                                                    <label class="custom-control-label" for="shift_{{$shift->id}}">{{$lang == '_ar' ? $shift->name_ar : $shift->name}}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
        
                                    <div class="col-md-6">
                                        <h6>{{__('Location')}}</h6>
                                        @foreach($employee_location as $location)
                                            <div class="radio-check">
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="shift_{{$location->id}}" @if($location->id == $employee->location) checked @endif value="{{$location->id}}" name="location" class="custom-control-input">
                                                    <label class="custom-control-label" for="shift_{{$location->id}}">{{$lang == '_ar' ? $location->name_ar : $location->name}}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </fieldset>
                            </div>

                        </div>
                        
                        <div class="row">
                            <div class="col-12">
                                <input type="submit" value="{{__('Update')}}" class="btn btn-primary radius-10px">
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>

                <div>
                    <div class="card mb-4 col-md-12">
                        <div class="row">
                            <h5 class="col-md-12">{{__('probation_periods_duration')}}</h5>
                            <div style="width:100%;padding: 5%;" class="ibox">
                                <div class="ibox-content py-0">
                                    @if($employee->employee_on_probation == 1)
                                    @if($employee->probation_periods_status != 1)
                                        <a href="#" class="btn btn-primary mt-4" data-toggle="tooltip" data-original-title=""
                                            data-confirm="{{ __('Are You Sure?') . '|' . __('This action can not be undone. Do you want to continue?') }}"
                                            data-confirm-yes="document.getElementById('finish_probationDuration-form-{{ $employee->id }}').submit();">
                                            {{ __('finish_trial_period') }}
                                        </a>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['employee.destroy', $employee->id], 'id' => 'finish_probationDuration-form-' . $employee->id]) !!}
                                        <input type="hidden" name="finish_probationDuration">
                                        {!! Form::close() !!}
                                    @endif
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover dataTables" > 
                                            <thead>
                                                <tr>
                                                    <th>{{ __('contract_startdate_gregorian') }}</th>
                                                    <th>{{ __('contract_enddate_gregorian') }}</th>
                                                    <th>{{ __('Status') }}</th>
                                                    <th>{{ __('Details') }}</th>
                                                    @if(Gate::check('Edit Employee'))
                                                        <th width="3%">{{ __('Action') }}</th>
                                                    @endif
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>{{ Carbon\Carbon::parse($employee->Join_date_gregorian)->format('d-m-Y')}}</td>
                                                    <td>{{ Carbon\Carbon::parse($employee->Join_date_gregorian)->addDays($employee->probation_periods_duration)->format('d-m-Y')}}</td>
                                                    <td>@if($employee->probation_periods_status == 1) {{__('passed_trial_period')}} @else {{__('under_trial_period')}} @endif</td>
                                                    <td>
                                                        {{__('current_period')}} {{$employee->probation_periods_duration}} {{__('days')}}
                                                    </td>
                                                    <td>
                                                        @if($employee->probation_periods_status != 1)
                                                            <a id="btn-anchor" href="#" data-url="{{ URL::to('probation_periods/'.$employee->id) }}" data-size="lg" data-ajax-popup="true" data-title="" class="edit-icon btn btn-success" data-toggle="tooltip" data-original-title=""><i class="fa fa-edit"></i></a>
                                                        @endif

                                                        <a href="#" class="delete-icon btn btn-danger" data-toggle="tooltip"
                                                            data-original-title="{{ __('Delete') }}"
                                                            data-confirm="{{ __('Are You Sure?') . '|' . __('This action can not be undone. Do you want to continue?') }}"
                                                            data-confirm-yes="document.getElementById('delete-duration-form-{{ $employee->id }}').submit();"><i
                                                            class="fa fa-trash"></i>
                                                        </a>
                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['employee.destroy', $employee->id], 'id' => 'delete-duration-form-' . $employee->id]) !!}
                                                        <input type="hidden" name="delete-duration">
                                                        {!! Form::close() !!}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    @else
                                        <div class="text-center">
                                            <h5 class="text-center"> {{ __('not_probationary_period_for_this_employee') }} </h5>
                                            <a id="btn-anchor" href="#" data-url="{{ URL::to('probation_periods/'.$employee->id) }}" data-size="lg" data-ajax-popup="true" data-title="" class="btn btn-info mb-4" data-toggle="tooltip" data-original-title=""> {{__('Add_trial_period')}} </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card col-md-12">
                        <div class="row">
                            <h5 class="col-md-12">{{__('contract_duration')}}</h5>
                            <div style="width:100%;padding: 5%;" class="ibox">
                                <div class="ibox-content py-0">
                                    @if($employeeContract)
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover dataTables" >
                                                <thead>
                                                    <tr>
                                                        <th>{{ __('contract_type') }}</th>
                                                        <th>{{ __('contract_duration') }}</th>
                                                        <th>{{ __('contract_startdate_gregorian') }}</th>
                                                        <th>{{ __('contract_startdate_Hijri') }}</th>
                                                        <th>{{ __('contract_enddate_gregorian') }}</th>
                                                        <th>{{ __('contract_enddate_Hijri') }}</th>
                                                        <th>{{ __('contract_document') }}</th>
                                                        @if(Gate::check('Edit Employee'))
                                                            <th width="3%">{{ __('Action') }}</th>
                                                        @endif
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>{{ $employeeContract->contract_type == 1 ? __('limited_time') : __('unlimited_time')}}</td>
                                                        <td>{{ $employeeContract->contract_duration }} {{__('year')}}</td>
                                                        <td>{{ $employeeContract->contract_startdate }}</td>
                                                        <td>{{ $employeeContract->contract_startdate_hijri }}</td>
                                                        <td>{{ $employeeContract->contract_enddate }}</td>
                                                        <td>{{ $employeeContract->contract_enddate_hijri }}</td>
                                                        <td>
                                                            @if(!empty($employeeContract->contract_document))
                                                                <a href=" {{asset(Storage::url('uploads/document/'.$employeeContract->contract_document))}}" target="_blank">
                                                                    <i class="fa fa-download"></i>
                                                                </a>
                                                            @else
                                                                <p>-</p>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a id="btn-anchor" href="#" data-url="{{ URL::to('contracts/'.$employeeContract->id.'/edit') }}" data-size="lg" data-ajax-popup="true" data-title="" class="edit-icon btn btn-success" data-toggle="tooltip" data-original-title=""><i class="fa fa-edit"></i></a>
                                                            <a href="#" class="delete-icon btn btn-danger" data-toggle="tooltip"
                                                                data-original-title="{{ __('Delete') }}"
                                                                data-confirm="{{ __('Are You Sure?') . '|' . __('This action can not be undone. Do you want to continue?') }}"
                                                                data-confirm-yes="document.getElementById('delete-contract-form-{{ $employeeContract->id }}').submit();"><i
                                                                class="fa fa-trash"></i>
                                                            </a>
                                                            {!! Form::open(['method' => 'DELETE', 'route' => ['contracts.destroy', $employeeContract->id], 'id' => 'delete-contract-form-' . $employeeContract->id]) !!}
                                                            {!! Form::close() !!}
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    @else
                                        <div class="text-center">
                                            <h5 class="text-center"> {{ __('No_contract_added') }} </h5>
                                            <a id="btn-anchor" href="#" data-url="{{ URL::to('contract/create/'.$employee->id) }}" data-size="lg" data-ajax-popup="true" data-title="" class="btn btn-info mb-4" data-toggle="tooltip" data-original-title=""> {{__('Add_Contract')}} </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div data-content id="financial">
                <div class="card">
                    {{ Form::model($employee, array('route' => array('employee.update', $employee->id), 'method' => 'PUT' , 'enctype' => 'multipart/form-data')) }}
                        @csrf
                        <input type="hidden" name="update_financial_info">
                        <div class="card col-md-12">
                            <div class="row">
                                <h5 class="col-md-12">{{__('Financial')}}</h5>
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {!! Form::label('salary', __('basic_salary'),['class'=>'form-control-label']) !!}
                                        {!! Form::text('salary', old('salary'), ['class' => 'form-control wizard-required']) !!}
                                    </div>
                                    <div class="wizard-form-error"></div>
                                </div>
                                

                                
                                <div class="col-md-12 paymentDetails">
                                    {{ Form::label('Payment_details', __('Payment_details'),['class'=>'form-control-label']) }}
                                    <div class="d-flex radio-check">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="cash" value="cash" @if($employee->payment_type == 'cash') checked @endif name="payment_type" class="custom-control-input">
                                            <label class="custom-control-label" for="cash">{{__('cash')}}</label>
                                        </div>
                                    </div>

                                    <div class="d-flex radio-check">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="bank" value="bank" @if($employee->payment_type == 'bank') checked @endif  name="payment_type" class="custom-control-input">
                                            <label class="custom-control-label" for="bank">{{__('bank')}}</label>
                                        </div>
                                    </div>

                                    <div class="d-flex radio-check">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="cheque" value="cheque" @if($employee->payment_type == 'cheque') checked @endif name="payment_type" class="custom-control-input">
                                            <label class="custom-control-label" for="cheque">{{__('cheque')}}</label>
                                        </div>
                                    </div>

                                    <div class="d-flex radio-check">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="international_transfer" @if($employee->payment_type == 'international_transfer') checked @endif  value="international_transfer" name="payment_type" class="custom-control-input">
                                            <label class="custom-control-label" for="international_transfer">{{__('international_transfer')}}</label>
                                        </div>
                                    </div>
                                </div>

                                <div style="display:none;" id="paymentContent" class="col-md-12">
                                    <div style="display:none;" id="bankDetails" class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div style="margin-top: 15%;" class="form-group">
                                                    {{ Form::label('employee_account_type', __('employee_account_type'),['class'=>'form-control-label']) }}
                                                    {{ Form::select('employee_account_type', [ "0" => __('salary_card') , "1" => __('bank_account') ],null, array('class' => 'form-control ' ,'id' => 'employee_account_type')) }}       
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div style="display:none;" id="IBAN_number_info" class="form-group">
                                                    {!! Form::label('IBAN_number', __('IBAN_number'),['class'=>'form-control-label']) !!}
                                                    {!! Form::text('bank_IBAN_number', old('bank_IBAN_number'), ['class' => 'form-control']) !!}
                                                </div>
                                                
                                                <div id="salary_card_number_info" class="form-group">
                                                    {!! Form::label('salary_card_number', __('salary_card_number'),['class'=>'form-control-label']) !!}
                                                    {!! Form::text('salary_card_number', old('salary_card_number'), ['class' => 'form-control']) !!}
                                                </div>

                                                <div class="form-group">
                                                    {{ Form::label('bank_id', __('bank_name'),['class'=>'form-control-label']) }}
                                                    {{ Form::select('bank_id', $banks,null, array('class' => 'form-control ')) }}       
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>

                                    <div style="display:none;padding: 2%;" id="internationalTransferDetails" class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                {{ Form::label('bank_name', __('bank_name'),['class'=>'form-control-label']) }}
                                                {{ Form::text('bank_name',null, array('class' => 'form-control ')) }}       
                                            </div>
                                            <div class="col-md-4">
                                                {{ Form::label('account_holder_name', __('account_holder_name'),['class'=>'form-control-label']) }}
                                                {{ Form::text('account_holder_name',null, array('class' => 'form-control ')) }}       
                                            </div>
                                            <div class="col-md-4">
                                                {{ Form::label('account_holder_name_ar', __('account_holder_name_ar'),['class'=>'form-control-label']) }}
                                                {{ Form::text('account_holder_name_ar',null, array('class' => 'form-control ')) }}       
                                            </div>
                                            <div class="col-md-4">
                                                {{ Form::label('branch_location', __('branch_name'),['class'=>'form-control-label']) }}
                                                {{ Form::text('branch_location',null, array('class' => 'form-control ')) }}       
                                            </div>
                                            <div class="col-md-4">
                                                {{ Form::label('branch_location_ar', __('branch_name_ar'),['class'=>'form-control-label']) }}
                                                {{ Form::text('branch_location_ar',null, array('class' => 'form-control ')) }}       
                                            </div>
                                            <div class="col-md-4">
                                                {{ Form::label('swift_code', __('swift_code'),['class'=>'form-control-label']) }}
                                                {{ Form::text('swift_code',null, array('class' => 'form-control ')) }}       
                                            </div>
                                            <div class="col-md-4">
                                                {{ Form::label('sort_code', __('sort_code'),['class'=>'form-control-label']) }}
                                                {{ Form::text('sort_code',null, array('class' => 'form-control ')) }}
                                            </div>
                                            <div class="col-md-4">
                                                {{ Form::label('bank_country', __('country'),['class'=>'form-control-label']) }}
                                                {{ Form::text('bank_country',null, array('class' => 'form-control ')) }}
                                            </div>
                                            <div class="col-md-4">
                                                {{ Form::label('account_number', __('bank_account_number'),['class'=>'form-control-label']) }}
                                                {{ Form::text('account_number',null, array('class' => 'form-control ')) }}
                                            </div>
                                            <div class="col-md-4">
                                                {{ Form::label('IBAN_number', __('IBAN_number'),['class'=>'form-control-label']) }}
                                                {{ Form::text('IBAN_number',null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="optional-toggle">
                                    <div style="text-align: center;" class="flex_xiMMzi itemsCenter_3nXjZC optional-toggle-content">
                                        <p class="caption12_2TCN8H weight_bold" style="color: var(--onboarding-slategrey-700);">{{__('medical_insurance')}}</p>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="6" height="9" viewBox="0 0 6 9" class="" style="transform: rotate(-90deg);">
                                            <path
                                                fill="#7889a0"
                                                fill-rule="evenodd"
                                                d="M5.42879461,8.138845 C5.53304571,8.35942538 5.75437086,8.5 5.99740852, 8.5 C6.24044619,8.5 6.46177133,8.35942538 6.56602243,8.138845 L10.3492379, 3.37399091 C10.658484,2.89389728 10.4789218,2.5 9.93025921, 2.5 L2.06455783,2.5 C1.52587097,2.5 1.336333,2.89389728 1.65555484,3.37399091 L5.42879461, 8.138845 Z"
                                                transform="rotate(-90 4 6.5)"
                                            ></path>
                                        </svg>
                                    </div>
                                </div>

                                <div class="row">
                                    <h6 class="col-md-12">{{__('insurance')}}</h6>

                                    <div class="form-group col-md-4">
                                        {!! Form::label('insurance_number', __('insurance_number'),['class'=>'form-control-label']) !!}
                                        {!! Form::text('insurance_number', old('insurance_number'), ['class' => 'form-control']) !!}
                                    </div>

                                    <div class="form-group col-md-4">
                                        {!! Form::label('policy_number', __('Policy_number'),['class'=>'form-control-label']) !!}
                                        {!! Form::text('policy_number', old('policy_number'), ['class' => 'form-control']) !!}
                                    </div>

                                    <div class="form-group col-md-4">
                                        {!! Form::label('insurance_startdate', __('insurance_startdate'),['class'=>'form-control-label']) !!}
                                        {!! Form::text('insurance_startdate', $employee->insurance_startdate , ['class' => 'form-control gregorian-date']) !!}
                                    </div>

                                    

                                    <div class="form-group col-md-4">
                                        {!! Form::label('cost', __('Cost'),['class'=>'form-control-label']) !!}
                                        {!! Form::text('cost', old('cost'), ['class' => 'form-control']) !!}
                                    </div>

                                    <div class="form-group col-md-4">
                                        {!! Form::label('availability_health_insurance_council', __('availability_health_insurance_council'),['class'=>'form-control-label']) !!}
                                        {!! Form::text('availability_health_insurance_council', $employee->availability_health_insurance_council , ['class' => 'form-control gregorian-date']) !!}
                                    </div>

                                    <div class="form-group col-md-4">
                                        {!! Form::label('health_insurance_council_startdate', __('health_insurance_council_startdate'),['class'=>'form-control-label']) !!}
                                        {!! Form::text('health_insurance_council_startdate', $employee->health_insurance_council_startdate , ['class' => 'form-control gregorian-date']) !!}
                                    </div>

                                    <div class="form-group col-md-4">
                                        {!! Form::label('insurance_document', __('add_attachment'),['class'=>'form-control-label']) !!}
                                        {!! Form::file('insurance_document', ['class' => 'form-control']) !!}
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <input type="submit" value="{{__('Update')}}" class="btn btn-primary radius-10px float-right">
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>

            <div data-content id="assets">
                <div class="card">
                    <h2 class="text-center">{{__('assets')}}</h2>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="ibox">
                                @can('Create Assets')
                                    <div class="text-center">
                                        <a id="btn-anchor" href="#" data-url="{{ route('account-assets.create') }}?employee_id={{$employee->id}}" data-size="lg" data-ajax-popup="true" data-title="" class="btn btn-info mb-4" data-toggle="tooltip" data-original-title=""> {{__('Add_asset')}} </a>
                                    </div>
                                @endcan
                                <div class="ibox-content py-0">
                                    @if(count($assets) != 0)
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover dataTables" >
                                            <thead>
                                            <tr>
                                                <th> {{__('Name')}}</th>
                                                <th> {{__('Purchase Date')}}</th>
                                                <th> {{__('Support Until')}}</th>
                                                <th> {{__('Amount')}}</th>
                                                <th> {{__('Description')}}</th>
                                                @if(Gate::check('Edit Assets') || Gate::check('Delete Assets'))
                                                    <th width="3%"> {{__('Action')}}</th>
                                                @endif
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($assets as $asset)
                                                <tr>
                                                    <td class="font-style">{{ $asset->name }}</td>
                                                    <td class="font-style">{{ \Auth::user()->dateFormat($asset->purchase_date) }}</td>
                                                    <td class="font-style">{{ \Auth::user()->dateFormat($asset->supported_date) }}</td>
                                                    <td class="font-style">{{ \Auth::user()->priceFormat($asset->amount) }}</td>
                                                    <td class="font-style">{{ $asset->description }}</td>
                                                    @if(Gate::check('Edit Assets') || Gate::check('Delete Assets'))
                                                        <td class="text-right action-btns">
                                                            @can('Edit Assets')
                                                                <a href="#" class="edit-icon btn btn-success" data-url="{{ route('account-assets.edit',$asset->id) }}" data-ajax-popup="true" data-title="{{__('Edit Assets')}}" data-toggle="tooltip" data-original-title="{{__('Edit')}}">
                                                                    <i class="fa fa-edit"></i>
                                                                </a>
                                                            @endcan
                                                            @can('Delete Assets')
                                                                <a href="#" class="delete-icon btn btn-danger" data-toggle="tooltip" data-original-title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$asset->id}}').submit();">
                                                                    <i class="fa fa-trash"></i>
                                                                </a>
                                                                {!! Form::open(['method' => 'DELETE', 'route' => ['account-assets.destroy', $asset->id],'id'=>'delete-form-'.$asset->id]) !!}
                                                                {!! Form::close() !!}
                                                            @endcan
                                                        </td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div data-content id="documents">
                <div class="card">
                    <h2 class="text-center">{{__('Documents')}}</h2>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="ibox">
                                @can('Create Document')
                                    <div class="text-center">
                                        <a id="btn-anchor" href="#" data-url="{{ route('document-upload.create') }}?employee_id={{$employee->id}}" data-size="lg" data-ajax-popup="true" data-title="" class="btn btn-info mb-4" data-toggle="tooltip" data-original-title=""> {{__('Add_document')}} </a>
                                    </div>
                                @endcan
                                <div class="ibox-content py-0">
                                    @if(count($documents) != 0)
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover dataTables" >
                                            <thead>
                                            <tr>
                                                <th>{{__('Name')}}</th>
                                                <th>{{__('Document')}}</th>
                                                <th>{{__('Role')}}</th>
                                                <th>{{__('Description')}}</th>
                                                @if(Gate::check('Edit Document') || Gate::check('Delete Document'))
                                                    <th width="3%">{{__('Action')}}</th>
                                                @endif
                                            </tr>
                                            </thead>
                                            <tbody class="font-style">
                                            @foreach ($documents as $document)
                                                @php
                                                    $documentPath=asset(Storage::url('uploads/documentUpload'));
                                                    $roles = \Spatie\Permission\Models\Role::find($document->role);
                                                @endphp
                                                <tr>
                                                    <td>{{ $document->name }}</td>
                                                    <td>
                                                        @if(!empty($document->document))
                                                            <a href="{{$documentPath.'/'.$document->document}}" download>
                                                                <i class="fa fa-download"></i>
                                                            </a>

                                                            <a href="{{$documentPath.'/'.$document->document}}" target="_blank">
                                                                <i class="fa fa-eye"></i>
                                                            </a>
                                                        @else
                                                            <p>-</p>
                                                        @endif
                                                    </td>
                                                    <td>{{ !empty($roles)?$roles->name:'All' }}</td>
                                                    <td>{{ $document->description }}</td>
                                                    @if(Gate::check('Edit Document') || Gate::check('Delete Document'))
                                                        <td class="text-right action-btns">
                                                            @can('Edit Document')
                                                                <a href="#" data-url="{{ route('document-upload.edit',$document->id)}}" data-size="lg" data-ajax-popup="true" data-title="{{__('Edit Document')}}" class="edit-icon btn btn-success" data-toggle="tooltip" data-original-title="{{__('Edit')}}"><i class="fa fa-edit"></i></a>
                                                            @endcan
                                                            @can('Delete Document')
                                                                <a href="#" class="delete-icon btn btn-danger" data-toggle="tooltip" data-original-title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$document->id}}').submit();"><i class="fa fa-trash"></i></a>
                                                                {!! Form::open(['method' => 'DELETE', 'route' => ['document-upload.destroy', $document->id],'id'=>'delete-form-'.$document->id]) !!}
                                                                {!! Form::close() !!}
                                                            @endif
                                                        </td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div data-content id="leaves">
                <div class="card">
                    <h2 class="text-center">{{__('employee requests')}}</h2>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="ibox">
                                
                                <div class="ibox-content py-0">
                                    @if(count($leaves) != 0)
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover dataTables" >
                                                
                                                <thead>
                                                    <tr>
                                                        @if (\Auth::user()->type != 'employee')
                                                            <th>{{ __('Employee') }}</th>
                                                        @endif
                                                        <th>{{ __('Request_type') }}</th>
                                                        <th>{{ __('Request Date') }}</th>
                                                        <th>{{ __('Start Date') }}</th>
                                                        <th>{{ __('End Date') }}</th>
                                                        <th>{{ __('Request Reason') }}</th>
                                                        <th>{{ __('status') }}</th>
                                                        <th width="5%">{{ __('Action') }}</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @foreach ($leaves as $leave)
                                                        <tr>
                                                            @if (\Auth::user()->type != 'employee')
                                                                <td>{{ !empty(\Auth::user()->getEmployee($leave->employee_id)) ? \Auth::user()->getEmployee($leave->employee_id)->name : '' }}
                                                                </td>
                                                            @endif
                                                            <td>{{ $leave->requestType['name'.$lang] }}
                                                            </td>
                                                            <td>{{ \Auth::user()->dateFormat($leave->applied_on) }}</td>
                                                            <td>{{ \Auth::user()->dateFormat($leave->start_date) }}</td>
                                                            <td>{{ \Auth::user()->dateFormat($leave->end_date) }}</td>
                                                            <td>{{ $leave['request_reason'.$lang] }}</td>
                                                            <td style="text-align: center;">
                                                                @if($leave->status == 0)
                                                                    <div class="badge badge-pill badge-warning">{{ __('Pending') }}</div>
                                                                @elseif($leave->status == 1)
                                                                    <div class="badge badge-pill badge-success">{{ __('Approve By Department Manager') }}</div>
                                                                @elseif($leave->status == 2)
                                                                    <div class="badge badge-pill badge-danger">{{ __('Reject By Department Manager') }}</div>
                                                                @elseif($leave->status == 3)
                                                                    <div class="badge badge-pill badge-success">{{ __('Approve By Branch Manager') }}</div>
                                                                @elseif($leave->status == 4)
                                                                    <div class="badge badge-pill badge-danger">{{ __('Reject By Branch Manager') }}</div>
                                                                @endif
                                                            </td>
                                                            <td class="text-right action-btns">
                                                                
                                                                @if($leave->status == 0)
                                                                    @can('Edit Leave')
                                                                        <a class="btn btn-success" href="#" data-url="{{ URL::to('employee_requests/' . $leave->id . '/edit') }}"
                                                                            data-size="lg" data-ajax-popup="true"
                                                                            data-title="{{ __('Edit Request') }}" class="edit-icon btn btn-success"
                                                                            data-toggle="tooltip" data-original-title="{{ __('Edit') }}"><i class="fa fa-edit"></i></a>
                                                                    @endcan
                                                                @endif

                                                                @can('Delete Leave')
                                                                    <a class="btn btn-danger" href="#" class="delete-icon btn btn-danger" data-toggle="tooltip"
                                                                        data-original-title="{{ __('Delete') }}"
                                                                        data-confirm="{{ __('Are You Sure?') . '|' . __('This action can not be undone. Do you want to continue?') }}"
                                                                        data-confirm-yes="document.getElementById('delete-form-{{ $leave->id }}').submit();"><i class="fa fa-trash"></i>
                                                                    </a>
                                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['employee_requests.destroy', $leave->id], 'id' => 'delete-form-' . $leave->id]) !!}
                                                                    {!! Form::close() !!}
                                                                @endcan

                                                                <a href="#" class="btn btn-primary" data-url="{{ URL::to('employee_requests/' . $leave->id . '/action') }}"
                                                                    data-size="lg" data-ajax-popup="true"
                                                                    data-title="{{ __('Request Action') }}" class="edit-icon btn btn-success bg-success"
                                                                    data-toggle="tooltip" data-original-title="{{ __('Request Action') }}">
                                                                    <i class="fa fa-caret-right"></i> 
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody> 
                                                                    
                                            </table>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div data-content id="attendance">
                <div class="card">
                    <h2 class="text-center">{{__('attendance')}}</h2>

                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="table-responsive py-4 attendance-table-responsive">
                                    <table class="table table-striped mb-0" id="dataTable-1">
                                        <thead>
                                            <tr>
                                                <th class="active">{{__('Name')}}</th>
                                                @foreach($dates as $date)
                                                    <th>{{explode('/',$date)[2]}}</th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($employeesAttendance as $attendance)
                                                <tr>
                                                    <td>{{$attendance['name']}}</td>
                                                    @foreach($attendance['status'] as $key => $status)
                                                        <td>
                                                            @if($status == 'P')
                                                                <span style="color:#28a745!important"> <b> P </b> </span>
                                                            @elseif(in_array( explode('-',$key)[1] , explode(',',$setting->week_vacations ?? '') ))
                                                                <span style="color:#424443!important"> <b> O </b> </span>
                                                            @elseif(in_array( date("Y-m-d", strtotime(explode('-',$key)[0]) ) , $holidays ?? [] ))
                                                                <span style="color:#377424!important"> <b> H </b> </span>
                                                            @elseif($status =='A')
                                                                <span style="color:#990001!important"> <b> A </b> </span>
                                                            @elseif($status =='V')
                                                                <span style="color:#786301!important"> <b> V </b> </span>
                                                            @elseif($status =='S')
                                                                <span style="color:#C09000!important"> <b> S </b> </span>
                                                            @elseif($status =='X')
                                                                <span style="color:#CC4025!important"> <b> X </b> </span>
                                                            @else
                                                                -
                                                            @endif
                                                        </td>
                                                    @endforeach
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection

@push('script-page')
<script>
    const tabs = document.querySelectorAll("[data-target]"),
    tabContents = document.querySelectorAll("[data-content]");

    tabs.forEach((tab) => {
        tab.addEventListener("click", () => {
            const target = document.querySelector(tab.dataset.target);

            tabContents.forEach((tc) => {
            tc.classList.remove("is-active");
            });
            target.classList.add("is-active");

            tabs.forEach((t) => {
            t.classList.remove("is-active");
            });
            tab.classList.add("is-active");
        });
    });

    $(document).ready(function(){
		var i = {{$employee->empAllowance->count()}};
		$(document).on('click' ,'#add_allowances_btn', function() {
			i++;
			var trContent = '<tr id="row' + i +'" style="height:80px;"><td>{{ Form::label('allowance_option', __('Allowance_type'),['class'=>'form-control-label']) }}{{ Form::select('allowance_option[]', $allowance_options,null, array('class' => 'form-control wizard-required' )) }}</td><td>{!! Form::label('amount', __('amount'),['class'=>'form-control-label']) !!}{!! Form::text('amount[]', old('amount'), ['class' => 'form-control wizard-required']) !!}</td><td><div class="styles_tableAction__3jBnD"><svg id="'+ i+'" class="remove_allowances_btn" width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg" data-testid="undefined-deleteIcon"><path fill-rule="evenodd" clip-rule="evenodd" d="M7 0H3V2H0V3H10V2H7V0ZM2 4H8V10H2V4Z" fill="#4B6C89"></path></svg></div></td></tr>';
			$('#allowance_body').append(trContent);	
		});

		$(document).on('click', '.remove_allowances_btn', function(){
			i--;
			var button_id = $(this).attr("id");
			$('#row' + button_id + '').remove();
		});
	});

	$(document).on('change' ,'#employee_account_type', function() {
		if($(this).val() == 0)
		{
			$('#salary_card_number_info').css('display','block');
			$('#IBAN_number_info').css('display','none');
		}else{
			$('#salary_card_number_info').css('display','none');
			$('#IBAN_number_info').css('display','block');
		}
	});

	$(document).on('change', 'input[name=payment_type]', function () {
        
		if($(this).val() == 'cash' || $(this).val() == 'cheque')
		{
			$('#paymentContent').css('display','none');
		}else if($(this).val() == 'bank'){
			$('#paymentContent').css('display','block');
			$('#bankDetails').css('display','block');
			$('#internationalTransferDetails').css('display','none');
		}else if($(this).val() == 'international_transfer'){
			$('#paymentContent').css('display','block');
			$('#bankDetails').css('display','none');
			$('#internationalTransferDetails').css('display','block');
		} 
	});

    window.onload = (event) => {
        var paymentType = $('input[name=payment_type]:checked').val();
        if(paymentType == 'cash' ||paymentType == 'cheque')
		{
			$('#paymentContent').css('display','none');
		}else if(paymentType == 'bank'){
			$('#paymentContent').css('display','block');
			$('#bankDetails').css('display','block');
			$('#internationalTransferDetails').css('display','none');
		}else if(paymentType == 'international_transfer'){
			$('#paymentContent').css('display','block');
			$('#bankDetails').css('display','none');
			$('#internationalTransferDetails').css('display','block');
		}

        var employee_account_type = $('#employee_account_type').val();
        if(employee_account_type == 0)
		{
			$('#salary_card_number_info').css('display','block');
			$('#IBAN_number_info').css('display','none');
		}else{
			$('#salary_card_number_info').css('display','none');
			$('#IBAN_number_info').css('display','block');
		} 

    };
</script>
@endpush

