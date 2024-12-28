@extends('dashboard.layouts.master')
@include('dashboard.layouts.header')
@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h4>{{ __('Add New Employee') }}</h4>
        </div>
        <form id="add_employee" method="POST" action="{{ route('employee.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="alert alert-danger d-none" id="error-messages">
                    <ul></ul>
                </div>

                <div class="contact-grids-tab">
                    <ul class="nav nav-underline" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="info-tab" data-bs-toggle="tab" data-bs-target="#basic-info" type="button" role="tab" aria-selected="true">
                                {{ __('Basic Information') }}
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="identity-tab" data-bs-toggle="tab" data-bs-target="#identity" type="button" role="tab" aria-selected="false">
                                {{ __('ID Details') }}
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="passport-tab" data-bs-toggle="tab" data-bs-target="#passport" type="button" role="tab" aria-selected="false">
                                {{ __('Passport Details') }}
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="address-tab" data-bs-toggle="tab" data-bs-target="#address" type="button" role="tab" aria-selected="false">
                                {{ __('Addresses') }}
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="call-tab" data-bs-toggle="tab" data-bs-target="#call" type="button" role="tab" aria-selected="false">
                                {{ __('Emergency Contact') }}
                            </button>
                        </li>
                    </ul>
                </div>

                <div class="tab-content" id="myTabContent">
                    <!-- Basic Information Tab -->
                    <div class="tab-pane fade show active" id="basic-info" role="tabpanel" aria-labelledby="info-tab">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="name" class="form-label">{{ __('Name') }} <span class="text-danger">*</span></label>
                                <input type="text" name="name" value="{{ $employee->name ??" "}}" id="name" class="form-control">
                                <div id="name_error" class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="name_ar" class="form-label">{{ __('Name (Arabic)') }}</label>
                                <input type="text" value="{{ $employee->name_ar ??'' }}" name="name_ar" id="name_ar" class="form-control">
                                <div id="name_ar_error" class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="email" class="form-label">{{ __('Email') }} <span class="text-danger">*</span></label>
                                <input type="email" value="{{ $employee->email }}" name="email" id="email" class="form-control">
                                <div id="email_error" class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="phone" class="form-label">{{ __('Phone') }} <span class="text-danger">*</span></label>
                                <input type="text" value="{{ $employee->phone }}" name="phone" id="phone" class="form-control">
                                <div id="phone_error" class="invalid-feedback"></div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="dob" class="form-label">{{ __('Date of Birth') }} <span class="text-danger">*</span></label>
                                <div class="input-icon-start position-relative">
                                    <input type="text" value="{{ $employee->dob }}" name="dob" id="dob" class="form-control form-control-lg datetimepicker" placeholder="dd/mm/yyyy">
                                    <span class="input-icon-addon">
                                        <i class="ti ti-calendar text-gray-7"></i>
                                    </span>
                                    <div id="dob_error" class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="department_id" class="form-label">{{ __('Departments') }}</label>
                                <select name="department_id" required id="department_id" class="select select2-hidden-accessible">
                                    <option value="">{{ __('Select') }}</option>
                                    @foreach($departments as $department)
                                        <option @if($department->id == $employee->department_id) selected @endif value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>
                                <div id="department_id_error" class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="designation_id" class="form-label">{{ __('Designation') }}</label>
                                <select name="designation_id" id="designation_id" class="select select2-hidden-accessible">
                                    <option value="">{{ __('Select Designation') }}</option>
                                    @foreach($designations as $designation)
                                        <option  @if($designation->id == $employee->department_id) selected @endif value="{{ $designation->id }}">{{ $designation->name }}</option>
                                    @endforeach
                                </select>
                                <div id="designation_id_error" class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="nationality_type" class="form-label">{{ __('Nationality Type') }}</label>
                                    <select name="nationality_type" id="nationality_type" class="form-select required" aria-label="{{ __('Select Nationality Type') }}">
                                        <option value="0">{{ __('Non-Saudi') }}</option>
                                        <option value="1">{{ __('Saudi') }}</option>
                                    </select>
                                    <div class="wizard-form-error"></div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3" id="nationality">
                                    <label for="nationality_id" class="form-label">{{ __('Nationality') }}</label>
                                    <select name="nationality_id" class="form-select required" aria-label="{{ __('Select Nationality') }}">
                                        <option value="">{{ __('Select Nationality') }}</option>
                                        @foreach($nationalities as $nationality)
                                            <option value="{{ $nationality->id }}">{{ $nationality->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="wizard-form-error"></div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="gender" class="form-label">{{ __('Gender') }}</label>
                                    <select name="gender" required id="gender" class="select select2-hidden-accessible">
                                        <option value="">{{ __('Select') }}</option>
                                        <option value="Male">{{ __('Male') }}</option>
                                        <option value="Female">{{ __('Female') }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="religion" class="form-label">{{ __('Religion') }}</label>
                                    <select name="religion" required id="religion" class="select select2-hidden-accessible">
                                        <option value="">{{ __('Select') }}</option>
                                        <option value="1">{{ __('Muslim') }}</option>
                                        <option value="0">{{ __('Non-Muslim') }}</option>
                                    </select>
                                </div>
                            </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="religion" class="form-label">{{ __('Out of Saudia') }}</label>
                                        <select name="out_of_saudia" required id="out_of_saudia" class="select select2-hidden-accessible">
                                            <option value="">{{ __('Select') }}</option>
                                            <option value="1">{{ __('Yes') }}</option>
                                            <option value="0">{{ __('No') }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="employer_phone" class="form-label">{{ __('Employer Phone') }} <span class="text-danger">*</span></label>
                                        <div class="pass-group">
                                            <input type="text" name="employer_phone" id="employer_phone" class="form-control">
                                            <span class="ti toggle-password  "></span>
                                            <div id="employer_phone" class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3" id="nationality">
                                        <label for="jobtitle_id" class="form-label">{{ __('Job Title') }}</label>
                                        <select name="jobtitle_id" class="form-select required" aria-label="{{ __('Select Job Title') }}">
                                            <option value="">{{ __('Select Job Titles') }}</option>
                                            @foreach($jobtitles as $job)
                                                <option value="{{ $job->id }}">{{ app()->getLocale() == 'en' ? $job->name : $job->name_ar }}</option>
                                            @endforeach
                                        </select>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3 text-center">
                                        <label class="form-label">{{ __('Do you want to register in the list of users?') }}</label>
                                        <div class="form-check form-check-md form-switch d-flex justify-content-center">
                                            <input class="form-check-input" name="user_register" type="checkbox" id="user_register" value="1">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <h6 class="col-md-12 py-2">{{ __('ID_qama_details') }}</h6>
                                    <div class="form-group col-md-3">
                                        <label for="residence_number" class="form-label">{{ __('ID qama details') }}</label>
                                        <input type="text" class="form-control" name="residence_number" id="residence_number">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="residence_number" class="form-label">{{ __('Place_of_issuance_of_ID_residence') }}</label>
                                        <input type="text" class="form-control" name="place_of_issuance_of_ID_residence" id="place_of_issuance_of_ID_residence">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="Join_date_gregorian" class="form-label">{{ __('Join_date_gregorian') }}</label>
                                        <input type="text" class="form-control datetimepicker" id="Join_date_gregorian" name="hijri_date">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="hijri_date" class="form-label">{{ __('Join_date_hijri') }}</label>
                                        <input type="text" class="form-control hijri-date-input" id="hijri_date" name="hijri_date">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="iqama_issuance_expirydate_gregorian" class="form-label">{{ __('Iqama_issuance_expirydate_gregorian') }}</label>
                                        <input type="text" class="form-control datetimepicker" id="iqama_issuance_expirydate_gregorian" name="iqama_issuance_expirydate_gregorian">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="iqama_issuance_expirydate_Hijri" class="form-label">{{ __('Iqama_issuance_expirydate_Hijri') }}</label>
                                        <input type="text" class="form-control hijri-date-input" id="iqama_issuance_expirydate_Hijri" name="iqama_issuance_expirydate_Hijri">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="iqama_attachment" class="form-label">{{ __('Iqama_attachment') }}</label>
                                        <input type="file" class="form-control" id="iqama_attachment" name="iqama_attachment">
                                    </div>
                                </div>

                                <div class="row">
                                    <h6 class="col-md-12 py-2">{{ __('Passport_details') }}</h6>
                                    <div class="form-group col-md-3">
                                        <label for="passport_number" class="form-label">{{ __('Passport_number') }}</label>
                                        <input type="text" class="form-control" name="passport_number" id="passport_number">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="place_of_issuance_of_passport" class="form-label">{{ __('Place_of_issuance_of_passport') }}</label>
                                        <input type="text" class="form-control" name="place_of_issuance_of_passport" id="place_of_issuance_of_passport">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="passport_issuance_expirydate_gregorian" class="form-label">{{ __('Passport_issuance_expirydate_gregorian') }}</label>
                                        <input type="text" class="form-control datetimepicker" id="passport_issuance_expirydate_gregorian" name="passport_issuance_expirydate_gregorian">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="passport_issuance_date_gregorian" class="form-label">{{ __('Passport_issuance_date_gregorian') }}</label>
                                        <input type="text" class="form-control hijri-date-input" id="passport_issuance_date_gregorian" name="passport_issuance_date_gregorian">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="passport_attachment" class="form-label">{{ __('Passport_attachment') }}</label>
                                        <input type="file" class="form-control" id="passport_attachment" name="passport_attachment">
                                    </div>
                                </div>

                                <div class="row">
                                    <h6 class="col-md-12">{{ __('Address_in_Saudi_Arabia') }}</h6>

                                    <div class="form-group col-md-3">
                                        <label for="building_number" class="form-control-label">{{ __('Building_number') }}</label>
                                        <input type="text" id="building_number" name="building_number" value="{{ old('building_number') }}" class="form-control">
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="street_name" class="form-control-label">{{ __('Street_name') }}</label>
                                        <input type="text" id="street_name" name="street_name" value="{{ old('street_name') }}" class="form-control">
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="region" class="form-control-label">{{ __('Region') }}</label>
                                        <input type="text" id="region" name="region" value="{{ old('region') }}" class="form-control">
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="city" class="form-control-label">{{ __('City') }}</label>
                                        <input type="text" id="city" name="city" value="{{ old('city') }}" class="form-control">
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="country" class="form-control-label">{{ __('Country') }}</label>
                                        <input type="text" id="country" name="country" value="{{ old('country') }}" class="form-control">
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="postal_code" class="form-control-label">{{ __('Postal_code') }}</label>
                                        <input type="text" id="postal_code" name="postal_code" value="{{ old('postal_code') }}" class="form-control">
                                    </div>
                                </div>

                                <!-- Address in Mother Country -->
                                <div class="row">
                                    <h6 class="col-md-12">{{ __('Address_in_mother_country') }}</h6>
                                    <div class="form-group col-md-6">
                                        <label for="address" class="form-control-label">{{ __('Address') }}</label>
                                        <input type="text" id="address" name="address" value="{{ old('address') }}" class="form-control">
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="mother_city" class="form-control-label">{{ __('City') }}</label>
                                        <input type="text" id="mother_city" name="mother_city" value="{{ old('mother_city') }}" class="form-control">
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="mother_country" class="form-control-label">{{ __('Country') }}</label>
                                        <input type="text" id="mother_country" name="mother_country" value="{{ old('mother_country') }}" class="form-control">
                                    </div>
                                </div>

                                <!-- Emergency Contact -->
                                <div class="row">
                                    <h6 class="col-md-12">{{ __('Emergency_contact') }}</h6>
                                    <div class="form-group col-md-3">
                                        <label for="emergency_contact_name" class="form-control-label">{{ __('Name') }}</label>
                                        <input type="text" id="emergency_contact_name" name="emergency_contact_name" value="{{ old('emergency_contact_name') }}" class="form-control">
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="emergency_contact_relationship" class="form-control-label">{{ __('Relationship') }}</label>
                                        <input type="text" id="emergency_contact_relationship" name="emergency_contact_relationship" value="{{ old('emergency_contact_relationship') }}" class="form-control">
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="emergency_contact_address" class="form-control-label">{{ __('Address') }}</label>
                                        <input type="text" id="emergency_contact_address" name="emergency_contact_address" value="{{ old('emergency_contact_address') }}" class="form-control">
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="emergency_contact_phone" class="form-control-label">{{ __('Phone') }}</label>
                                        <input type="text" id="emergency_contact_phone" name="emergency_contact_phone" value="{{ old('emergency_contact_phone') }}" class="form-control">
                                    </div>
                                </div>

                                <!-- Custom Fields -->
                                <div class="row">
                                    <h6 class="col-md-12">{{ __('Custom_fields') }}</h6>
                                    <div class="form-group col-md-6">
                                        <label for="custom_field_corona" class="form-control-label">{{ __('Corona_vaccine_doses') }}</label>
                                        <textarea id="custom_field_corona" name="custom_field_corona" class="form-control">{{ old('custom_field_corona') }}</textarea>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="custom_field_notes" class="form-control-label">{{ __('Notes') }}</label>
                                        <textarea id="custom_field_notes" name="custom_field_notes" class="form-control">{{ old('custom_field_notes') }}</textarea>
                                    </div>
                                </div>

                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                                <a href="{{ route('employee.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
                            </div>
                        </div>

        </form>
    </div>
</div>
@endsection
