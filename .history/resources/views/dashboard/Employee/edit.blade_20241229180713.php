@extends('dashboard.layouts.master')
@section('content')
<div class="container mt-5" style="max-width: 1200px; background-color: #f8f9fa; padding: 20px; border-radius: 8px;">
    <div class="card shadow-lg" style="background-color: #ffffff; border-radius: 10px; padding: 20px;">
        <div class="card-header bg-primary text-white" style="border-radius: 10px 10px 0 0;">
            <h4 class="mb-0">{{ __('Edit Employee') }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('employee.update', $employee->id) }}" enctype="multipart/form-data" method="post">
                @csrf
                @method('PUT')
                <div id="error-messages" class="alert alert-danger d-none">
                    <ul></ul>
                </div>

                <div class="contact-grids-tab">
                    <ul class="nav nav-underline" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="info-tab" data-bs-toggle="tab" data-bs-target="#basic-info" type="button" role="tab" aria-selected="true">{{ __('Step 1.Basic Information') }}</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="job-tab" data-bs-toggle="tab" data-bs-target="#jobModal" type="button" role="tab" aria-selected="false" tabindex="-1">{{ __('Step 2.Job Information') }}</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="salary-tab" data-bs-toggle="tab" data-bs-target="#salaryModal" type="button" role="tab" aria-selected="false" tabindex="-1">{{ __('Step 3.salary and allowances') }}</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="annual-tab" data-bs-toggle="tab" data-bs-target="#annualModal" type="button" role="tab" aria-selected="false" tabindex="-1">{{ __('Step 4.Annual leave entitlement') }}</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="call-tab" data-bs-toggle="tab" data-bs-target="#lastModal" type="button" role="tab" aria-selected="false" tabindex="-1">{{ __('Step 5.Finish') }}</button>
                        </li>
                    </ul>
                </div>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="basic-info" role="tabpanel" aria-labelledby="info-tab">
                        <div class="modal-body pb-0">
                            <h2>{{ __('Basic Information') }}</h2>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">{{ __('Name') }} <span class="text-danger">*</span></label>
                                        <input type="text" value="{{ $employee->name }}" name="name" id="name" class="form-control">
                                        <div id="name_error" class="invalid-feedback"></div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="name_ar" class="form-label">{{ __('Name (Arabic)') }}</label>
                                        <input type="text" value="{{ $employee->name_ar }}" name="name_ar" id="name_ar" class="form-control">
                                        <div id="name_ar_error" class="invalid-feedback"></div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">{{ __('Email') }} <span class="text-danger">*</span></label>
                                        <input type="email" value="{{ $employee->email }}" name="email" id="email" class="form-control">
                                        <div id="email_error" class="invalid-feedback"></div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">{{ __('Phone') }} <span class="text-danger">*</span></label>
                                        <input type="text" value="{{ $employee->phone }}" name="phone" id="phone" class="form-control">
                                        <div id="phone_error" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="dob" class="form-label">{{ __('Date of Birth') }} <span class="text-danger">*</span></label>
                                        <div class="input-icon-start position-relative">
                                            <input type="text" name="dob" value="{{ $employee->dob }}" id="dob" class="form-control form-control-lg datetimepicker" placeholder="dd/mm/yyyy">
                                            <span class="input-icon-addon">
                                                <i class="ti ti-calendar text-gray-7"></i>
                                            </span>
                                            <div id="dob_error" class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="designati" class="form-label">{{ __('Departments') }}</label>
                                        <select name="department_id" required id="designati" class="select select2-hidden-accessible">
                                            <option value="">{{ __('Select') }}</option>
                                            @foreach($departments as $department)
                                                <option @if($department->id == $employee->department_id) selected @endif value="{{ $department->id }}">{{ $department->name }}</option>
                                            @endforeach
                                        </select>
                                        <div id="" class="invalid-feedback"></div>
                                    </div>
                                </div>

                                <div class="form-group col-md-4">
                                    {{ Form::label('designation_id', __('Designation'), ['class' => 'form-label']) }}
                                    <select name="designation_id" class="select select2-hidden-accessible">
                                        <option value="">{{ __('Select Designation') }}</option>
                                        @foreach($designations as $designation)
                                            <option @if($designation->id == $employee->designation_id) selected @endif value="{{ $designation->id }}">{{ $designation->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="nationality_type" class="form-label">{{ __('Nationality Type') }}</label>
                                        <select name="nationality_type" id="nationality_type" class="form-select required" aria-label="{{ __('Select Nationality Type') }}">
                                            <option @if($employee->nationality_type==0) selected @endif value="0">{{ __('Non-Saudi') }}</option>
                                            <option @if($employee->nationality_type==1) selected @endif value="1">{{ __('Saudi') }}</option>
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
                                                <option @if($nationality->id==$employee->nationality_id) selected @endif  value="{{ $nationality->id }}">{{ $nationality->name }}</option>
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
                                            <option @if($employee->gender=='Male') selected @endif  value="Male">{{ __('Male') }}</option>
                                            <option @if($employee->gender=='Female') selected @endif value="Female">{{ __('Female') }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="religion" class="form-label">{{ __('Religion') }}</label>
                                        <select name="religion" required id="religion" class="select select2-hidden-accessible">
                                            <option value="">{{ __('Select') }}</option>
                                            <option @if($employee->religion=='1') selected @endif value="1">{{ __('Muslim') }}</option>
                                            <option @if($employee->religion=='0') selected @endif value="0">{{ __('Non-Muslim') }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="religion" class="form-label">{{ __('Out of Saudia') }}</label>
                                        <select name="out_of_saudia" required id="out_of_saudia" class="select select2-hidden-accessible">
                                            <option value="">{{ __('Select') }}</option>
                                            <option @if($employee->out_of_saudia=='1') selected @endif value="1">{{ __('Yes') }}</option>
                                            <option @if($employee->out_of_saudia=='0') selected @endif  value="0">{{ __('No') }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="employer_phone" class="form-label">{{ __('Employer Phone') }} <span class="text-danger">*</span></label>
                                        <div class="pass-group">
                                            <input type="text" value="{{ $employee ->employer_phone }}" name="employer_phone" id="employer_phone" class="form-control">
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
                                                <option @if($job->id == ) value="{{ $job->id }}">{{ app()->getLocale() == 'en' ? $job->name : $job->name_ar }}</option>
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
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-light border me-2" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="salaryModal" role="tabpanel" aria-labelledby="salary-tab">
                        <div class="modal-body">
                            <fieldset>
                                <h2>{{ __('salary_and_allowances') }}</h2>
                                <hr>
                                <div class="row">
                                    <!-- Payment Types -->
                                    <div class="col-md-12">
                                        <label class="form-label">{{ __('Payment_details') }}</label>
                                        <div class="d-flex">
                                            <div class="form-check me-3">
                                                <input type="radio" id="cash" name="payment_type" value="cash" class="form-check-input" checked>
                                                <label for="cash" class="form-check-label">{{ __('cash') }}</label>
                                            </div>
                                            <div class="form-check me-3">
                                                <input type="radio" id="bank" name="payment_type" value="bank" class="form-check-input">
                                                <label for="bank" class="form-check-label">{{ __('bank') }}</label>
                                            </div>
                                            <div class="form-check me-3">
                                                <input type="radio" id="cheque" name="payment_type" value="cheque" class="form-check-input">
                                                <label for="cheque" class="form-check-label">{{ __('cheque') }}</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" id="international_transfer" name="payment_type" value="international_transfer" class="form-check-input">
                                                <label for="international_transfer" class="form-check-label">{{ __('international_transfer') }}</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Dynamic Content Sections -->
                                    <div class="col-md-12 mt-4">
                                        <!-- Bank Details -->
                                        <div id="bankDetails" class="d-none">

                                            <div class="row">
                                                <!-- Employee Account Type Dropdown -->
                                                <div class="col-md-6">
                                                    <label for="employee_account_type" class="form-label">{{ __('employee_account_type') }}</label>
                                                    <select name="employee_account_type" id="employee_account_type" class="form-control">
                                                        <option value="0">{{ __('salary_card') }}</option>
                                                        <option value="1">{{ __('bank_account') }}</option>
                                                    </select>
                                                </div>

                                                <!-- Salary Card Number Info -->
                                                <div class="col-md-6" id="salary_card_number_info">
                                                    <label for="salary_card_number" class="form-label">{{ __('salary_card_number') }}</label>
                                                    <input type="text" name="salary_card_number" id="salary_card_number" class="form-control" value="{{ old('salary_card_number') }}">
                                                </div>

                                                <!-- IBAN Number Info -->
                                                <div class="col-md-6 d-none" id="IBAN_number_info">
                                                    <label for="IBAN_number" class="form-label">{{ __('IBAN_number') }}</label>
                                                    <input type="text" name="IBAN_number" id="IBAN_number" class="form-control" value="{{ old('IBAN_number') }}">
                                                </div>

                                                <!-- Bank Name Dropdown -->
                                                <div class="col-md-6">
                                                    <label for="bank_id" class="form-label">{{ __('bank_name') }}</label>
                                                    <select name="bank_id" id="bank_id" class="form-control">
                                                        @foreach ($banks as $id => $name)
                                                            <option value="{{ $name->id }}" {{ old('bank_id') == $id ? 'selected' : '' }}>{{ $name->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>


                                        </div>

                                        <!-- International Transfer Details -->
                                        <div id="internationalTransferDetails" class="col-md-12 d-none mt-3">
                                            <div class="row g-3">
                                                <!-- Bank Name -->
                                                <div class="col-md-4">
                                                    <label for="bank_name" class="form-label">{{ __('bank_name') }}</label>
                                                    <input type="text" name="bank_name" id="bank_name" class="form-control" value="{{ old('bank_name') }}">
                                                </div>

                                                <!-- Account Holder Name -->
                                                <div class="col-md-4">
                                                    <label for="account_holder_name" class="form-label">{{ __('account_holder_name') }}</label>
                                                    <input type="text" name="account_holder_name" id="account_holder_name" class="form-control" value="{{ old('account_holder_name') }}">
                                                </div>

                                                <!-- Account Holder Name (Arabic) -->
                                                <div class="col-md-4">
                                                    <label for="account_holder_name_ar" class="form-label">{{ __('account_holder_name_ar') }}</label>
                                                    <input type="text" name="account_holder_name_ar" id="account_holder_name_ar" class="form-control" value="{{ old('account_holder_name_ar') }}">
                                                </div>

                                                <!-- Branch Location -->
                                                <div class="col-md-4">
                                                    <label for="branch_location" class="form-label">{{ __('branch_name') }}</label>
                                                    <input type="text" name="branch_location" id="branch_location" class="form-control" value="{{ old('branch_location') }}">
                                                </div>

                                                <!-- Branch Location (Arabic) -->
                                                <div class="col-md-4">
                                                    <label for="branch_location_ar" class="form-label">{{ __('branch_name_ar') }}</label>
                                                    <input type="text" name="branch_location_ar" id="branch_location_ar" class="form-control" value="{{ old('branch_location_ar') }}">
                                                </div>

                                                <!-- SWIFT Code -->
                                                <div class="col-md-4">
                                                    <label for="swift_code" class="form-label">{{ __('swift_code') }}</label>
                                                    <input type="text" name="swift_code" id="swift_code" class="form-control" value="{{ old('swift_code') }}">
                                                </div>

                                                <!-- Sort Code -->
                                                <div class="col-md-4">
                                                    <label for="sort_code" class="form-label">{{ __('sort_code') }}</label>
                                                    <input type="text" name="sort_code" id="sort_code" class="form-control" value="{{ old('sort_code') }}">
                                                </div>

                                                <!-- Bank Country -->
                                                <div class="col-md-4">
                                                    <label for="bank_country" class="form-label">{{ __('country') }}</label>
                                                    <input type="text" name="bank_country" id="bank_country" class="form-control" value="{{ old('bank_country') }}">
                                                </div>

                                                <!-- Account Number -->
                                                <div class="col-md-4">
                                                    <label for="account_number" class="form-label">{{ __('bank_account_number') }}</label>
                                                    <input type="text" name="account_number" id="account_number" class="form-control" value="{{ old('account_number') }}">
                                                </div>

                                                <!-- IBAN Number -->
                                                <div class="col-md-4">
                                                    <label for="IBAN_number" class="form-label">{{ __('IBAN_number') }}</label>
                                                    <input type="text" name="IBAN_number" id="IBAN_number" class="form-control" value="{{ old('IBAN_number') }}">
                                                </div>
                                            </div>
                                            <

                                        </div>

                                    </div>
                                </div>
                                <div class="row g-3">
                                                <h6 class="col-md-12">{{ __('insurance') }}</h6>

                                                <!-- Insurance Number -->
                                                <div class="col-md-4">
                                                    <label for="insurance_number" class="form-label">{{ __('insurance_number') }}</label>
                                                    <input type="text" name="insurance_number" id="insurance_number" class="form-control" value="{{ old('insurance_number') }}">
                                                </div>

                                                <!-- Policy Number -->
                                                <div class="col-md-4">
                                                    <label for="policy_number" class="form-label">{{ __('Policy_number') }}</label>
                                                    <input type="text" name="policy_number" id="policy_number" class="form-control" value="{{ old('policy_number') }}">
                                                </div>

                                                <!-- Insurance Start Date -->
                                                <div class="col-md-4">
                                                    <label for="insurance_startdate" class="form-label">{{ __('insurance_startdate') }}</label>
                                                    <input type="text" name="insurance_startdate" id="insurance_startdate" class="form-control datetimepicker" value="{{ old('insurance_startdate') ?? now() }}">
                                                </div>

                                                <!-- Category -->
                                                <div class="col-md-4">
                                                    <label for="category" class="form-label">{{ __('Category') }}</label>
                                                    <input type="text" name="category" id="category" class="form-control" value="{{ old('category') }}">
                                                </div>

                                                <!-- Cost -->
                                                <div class="col-md-4">
                                                    <label for="cost" class="form-label">{{ __('Cost') }}</label>
                                                    <input type="text" name="cost" id="cost" class="form-control" value="{{ old('cost') }}">
                                                </div>

                                                <!-- Availability Health Insurance Council -->
                                                <div class="col-md-4">
                                                    <label for="availability_health_insurance_council" class="form-label">{{ __('availability_health_insurance_council') }}</label>
                                                    <input type="text" name="availability_health_insurance_council" id="availability_health_insurance_council" class="form-control datetimepicker" value="{{ old('availability_health_insurance_council') ?? now() }}">
                                                </div>

                                                <!-- Health Insurance Council Start Date -->
                                                <div class="col-md-4">
                                                    <label for="health_insurance_council_startdate" class="form-label">{{ __('health_insurance_council_startdate') }}</label>
                                                    <input type="text" name="health_insurance_council_startdate" id="health_insurance_council_startdate" class="form-control datetimepicker" value="{{ old('health_insurance_council_startdate') ?? now() }}">
                                                </div>

                                                <!-- Insurance Document -->
                                                <div class="col-md-4">
                                                    <label for="insurance_document" class="form-label">{{ __('add_attachment') }}</label>
                                                    <input type="file" name="insurance_document" id="insurance_document" class="form-control">
                                                </div>
                                            </div>
                            </fieldset>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-light border me-2" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="jobModal" role="tabpanel" aria-labelledby="job-tab">
                        <div class="modal-body">
                            <h2>{{ __('job_information') }}</h2>
                            <hr>
                            <div class="row">
                                <h6 class="col-md-12 my-2">{{ __('job_details') }}</h6>

                                <!-- Join Date (Gregorian) -->
                                <div class="form-group col-md-3 input-icon-start position-relative">
                                    <div class="mb-3">
                                        <label for="Join_date_gregorian" class="form-label">{{ __('Join_date_gregorian') }}</label>
                                        <div class="input-icon-start position-relative">
                                            <input type="text" name="Join_date_gregorian" id="Join_date_gregorian" class="form-control form-control-lg datetimepicker" placeholder="dd/mm/yyyy">
                                            <span class="input-icon-addon">
                                                <i class="ti ti-calendar text-gray-7"></i>
                                            </span>
                                            <div id="Join_date_gregorian_error" class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Join Date (Hijri) -->
                                <div class="form-group col-md-3">
                                    <label for="Join_date_hijri" class="form-label">{{ __('Join_date_hijri') }}</label>
                                    <input type="text" class="form-control hijri-date-input" name="Join_date_hijri" id="Join_date_hijri" value="{{ old('Join_date_hijri') ?? now() }}">
                                </div>

                                <!-- Job Title -->
                                <div class="form-group col-md-3">
                                    <label for="jobtitle_id" class="form-label">{{ __('jobtitle') }}</label>
                                    <select class="form-control" name="jobtitle_id" id="jobtitle_id">
                                        @foreach($jobtitles as $id => $title)
                                            <option value="{{ $title->id }}" {{ old('jobtitle_id') == $id ? 'selected' : '' }}>{{ $title->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Job Type -->
                                <div class="form-group col-md-3">
                                    <label for="work_time" class="form-label">{{ __('job_type') }}</label>
                                    <select class="form-control" name="work_time" id="work_time">
                                        @foreach($job_types as $id => $type)
                                            <option value="{{ $type }}" {{ old('work_time') == $id ? 'selected' : '' }}>{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="row">
                                    <!-- Work Unit -->
                                    <div class="form-group col-md-3">
                                        <label for="work_unit" class="form-label">{{ __('work_unit') }}</label>
                                        <select class="form-control" name="work_unit" id="work_unit">
                                            @foreach($work_units as $id => $unit)
                                                <option value="{{ $unit->id }}" {{ old('work_unit') == $id ? 'selected' : '' }}>{{ $unit->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Class -->
                                    <div class="form-group col-md-3">
                                        <label for="class" class="form-label">{{ __('class') }}</label>
                                        <select class="form-control" name="class" id="class">
                                            @foreach($jobclasses as $id => $jobclass)
                                                <option value="{{ $id }}" {{ old('class') == $id ? 'selected' : '' }}>{{ $jobclass }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                        <!-- Labor Hire Company -->
                                        <div class="form-group col-md-3">
                                            <label for="labor_hire_company" class="form-label">{{ __('labor_hire_company') }}</label>
                                            <select class="form-control" name="labor_hire_company" id="labor_hire_company">
                                                @foreach($laborCompanies as $id => $company)
                                                    <option value="{{ $company->id }}" {{ old('labor_hire_company') == $id ? 'selected' : '' }}>{{ $company->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!-- Branch -->
                                        <div class="form-group col-md-3">
                                            <label for="branch_id" class="form-label">{{ __('Branch') }}</label>
                                            <select class="form-control" name="branch_id" id="branch_id">
                                                @foreach($branches as $id => $branch)
                                                    <option value="{{ $branch->$id }}" {{ old('branch_id') == $id ? 'selected' : '' }}>{{ $branch->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>



                                    <!-- Direct Manager -->
                                    <div class="form-group col-md-3">
                                        <label for="direct_manager" class="form-label">{{ __('direct_manager') }}</label>
                                        <select class="form-control" name="direct_manager" id="direct_manager">
                                            @foreach($employees as $id => $employee)
                                                <option value="{{ $employee->id }}" {{ old('direct_manager') == $employee->id ? 'selected' : '' }}>{{ $employee->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Permission -->
                                    <div class="form-group col-md-3">
                                        <label for="permission" class="form-label">{{ __('Permission') }}</label>
                                        <select class="form-control" name="permission" id="permission">
                                            @foreach($roles as $id => $role)
                                                <option value="{{ $role->id }}" {{ old('permission') == $id ? 'selected' : '' }}>{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Uploading Record Permission -->
                                    <div class="form-group col-md-4">
                                        <div class="form-check mt-4">
                                            <input type="checkbox" class="form-check-input" id="uploading_record_permission" name="uploading_record_permission" checked>
                                            <label class="form-check-label" for="uploading_record_permission">
                                                {{ __('The_possibility_of_uploading_the_record_without_regard_to_the_geographical_location') }}
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="employee_on_probation" class="form-label">{{ __('Is_the_employee_on_probation') }}</label>
                                        <div class="d-flex">
                                            <!-- Yes Option -->
                                            <div class="form-check me-3">
                                                <input type="radio" id="yes" name="employee_on_probation" value="1" class="form-check-input">
                                                <label class="form-check-label" for="yes">{{ __('yes') }}</label>
                                            </div>
                                            <!-- No Option -->
                                            <div class="form-check">
                                                <input type="radio" id="no" name="employee_on_probation" value="0" class="form-check-input" checked>
                                                <label class="form-check-label" for="no">{{ __('no') }}</label>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                            </div>

                            <div class="row">
                                <h6 class="col-md-12">{{ __('contract_details') }}</h6>

                                <!-- Contract Type -->
                                <div class="form-group col-md-3">
                                    <label for="contract_type" class="form-label">{{ __('contract_type') }}</label>
                                    <div class="d-flex">
                                        <div class="form-check me-2">
                                            <input class="form-check-input" type="radio" name="contract_type" id="limited_time" value="1" checked>
                                            <label class="form-check-label" for="limited_time">{{ __('limited_time') }}</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="contract_type" id="unlimited_time" value="0">
                                            <label class="form-check-label" for="unlimited_time">{{ __('unlimited_time') }}</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Contract Duration -->
                                <div class="form-group col-md-3">
                                    <label for="contract_duration" class="form-label">{{ __('contract_duration') }}</label>
                                    <div class="d-flex">
                                        <div class="form-check me-2">
                                            <input class="form-check-input" type="radio" name="contract_duration" id="1year" value="1" checked>
                                            <label class="form-check-label" for="1year">{{ __('1year') }}</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="contract_duration" id="2year" value="2">
                                            <label class="form-check-label" for="2year">{{ __('2year') }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-light border me-2" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="annualModal" role="tabpanel" aria-labelledby="annual-tab">
                        <div class="modal-body">
                            <h2>{{ __('annual_leave_entitlement') }}</h2>
                            <hr>
                            <fieldset>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="annual_leave_entitlement" class="form-label">{{ __('annual_leave_entitlement') }}</label>
                                            <input type="text" name="annual_leave_entitlement" id="annual_leave_entitlement"
                                                   class="form-control" value="{{ old('annual_leave_entitlement') }}">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-light border me-2" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="lastModal" role="tabpanel" aria-labelledby="last-tab">
                        <div class="modal-body">
                            <h2>{{ __('Finish') }}</h2>
                            <hr>
                            <fieldset>
                                <div class="row">
                                    <!-- Shifts Section -->
                                    <div class="col-md-6">
                                        <h2>{{ __('shifts') }}</h2>
                                        @foreach($employee_shifts as $shift)
                                            <div class="form-check form-check-inline">
                                                <input type="radio" id="shift_{{ $shift->id }}" value="{{ $shift->id }}" name="shift" class="form-check-input">
                                                <label class="form-check-label" for="shift_{{ $shift->id }}">
                                                    {{ $lang == '_ar' ? $shift->name_ar : $shift->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>

                                    <!-- Location Section -->
                                    <div class="col-md-6">
                                        <h2>{{ __('Location') }}</h2>
                                        @foreach($employee_location as $location)
                                            <div class="form-check form-check-inline">
                                                <input type="radio" id="location_{{ $location->id }}" value="{{ $location->id }}" name="location" class="form-check-input">
                                                <label class="form-check-label" for="location_{{ $location->id }}">
                                                    {{ $lang == '_ar' ? $location->name_ar : $location->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </fieldset>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-light border me-2" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')

<script>
        $(function () {
        $('.datetimepicker').datetimepicker({
            format: 'DD/MM/YYYY',
            icons: {
                time: 'ti ti-time',
                date: 'ti ti-calendar',
                up: 'ti ti-chevron-up',
                down: 'ti ti-chevron-down',
            },
            widgetPositioning: {
                horizontal: 'auto',
                vertical: 'bottom'
            },
            // Append to body to avoid overflow issues
            widgetParent: 'body'
        });
            });
            $(document).ready(function () {
            $(document).on('change', '#employee_account_type', function () {
            if ($(this).val() == '0') {
                // Show Salary Card Info and Hide IBAN Info
                $('#salary_card_number_info').removeClass('d-none').show();
                $('#IBAN_number_info').addClass('d-none').hide();
            } else if ($(this).val() == '1') {
                // Show IBAN Info and Hide Salary Card Info
                $('#IBAN_number_info').removeClass('d-none').show();
                $('#salary_card_number_info').addClass('d-none').hide();
            }

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

</script>

    <!-- Hijri DatePicker Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/persian-datepicker@1.2.0/dist/css/persian-datepicker.min.css">

    <!-- Moment.js with Hijri support -->
    <script src="https://cdn.jsdelivr.net/npm/moment-hijri@2.17.0/moment-hijri.min.js"></script>

    <!-- Hijri DatePicker Script -->
    <script src="https://cdn.jsdelivr.net/npm/persian-datepicker@1.2.0/dist/js/persian-datepicker.min.js"></script>

    <!-- Your HTML content -->

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap JS (if not already included) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <!-- Bootstrap Hijri Datepicker JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-hijri-datepicker/1.0.7/js/bootstrap-hijri-datepicker.min.js"></script>
   <!-- Scripts -->
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
   <script src="{{ asset('assets/js/bootstrap-hijri-datetimepicker.js') }}"></script>
   <script src="{{ asset('assets/js/bootstrap-hijri-datepicker.js') }}"></script>
   <script>
    document.addEventListener('DOMContentLoaded', function () {
        const paymentTypeInputs = document.querySelectorAll('input[name="payment_type"]');
        const bankDetails = document.getElementById('bankDetails');
        const internationalTransferDetails = document.getElementById('internationalTransferDetails');

        paymentTypeInputs.forEach(input => {
            input.addEventListener('change', function () {
                // Hide all sections initially
                bankDetails.classList.add('d-none');
                internationalTransferDetails.classList.add('d-none');

                // Show the relevant section based on the selected payment type
                if (this.value === 'bank') {
                    bankDetails.classList.remove('d-none');
                } else if (this.value === 'international_transfer') {
                    internationalTransferDetails.classList.remove('d-none');
                }
            });
        });
    });
</script>
    <script>
    $(document).ready(function () {
        // Initialize Hijri Date Picker
        $('.hijri-date-input').hijriDatePicker({
            hijri: true, // Enable Hijri mode
            locale: 'ar-sa', // Arabic locale
            format: 'iYYYY-iMM-iDD', // Hijri format
            hijriFormat: 'iYYYY-iMM-iDD',
            showTodayButton: true,
            showClear: true,
            showClose: true,
            allowInputToggle: true
        });
    });
    </script>



    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const selectAllCheckbox = document.getElementById('select-all');
            const checkboxes = document.querySelectorAll('.datatable tbody .form-check-input');
            selectAllCheckbox.addEventListener('change', function () {
                const isChecked = this.checked;
                checkboxes.forEach(checkbox => {
                    checkbox.checked = isChecked;
                });
            });
            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function () {
                    if (!this.checked) {
                        selectAllCheckbox.checked = false;
                    } else if (Array.from(checkboxes).every(cb => cb.checked)) {
                        selectAllCheckbox.checked = true;
                    }
                });
            });
        });
</script>
<script>
    function toggleSwitch(value) {
        const switchElement = document.getElementById('switch-md');
        if (value === "1") {
            switchElement.checked = true; // Check the switch
        } else if (value === "0") {
            switchElement.checked = false; // Uncheck the switch
        }
    }
</script>
<script>
    $(document).on('change', '#nationality_type', function () {
        var nationality_type = $(this).val();
        if (nationality_type == 1) {
            $('#nationality').hide();
        } else {
            $('#nationality').show();
        }
    });
    $(document).ready(function () {
		var d_id = $('#department_id').val();
		//getDesignation(d_id);
	});



</script>

@endsection
