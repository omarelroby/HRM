@extends('dashboard.layouts.master')

@section('content')
 <!-- Page Wrapper -->
    <div class="card">
        <div class="card-header">
            <h2>{{ __('Employee Profile') }}</h2>
        </div>
        <div class="content" dir="ltr">
            <div class="row">
                <div class="col-xl-4">
                    <div class="card card-bg-1">
                        <div class="card-body p-0">
                            <span class="avatar avatar-xl avatar-rounded border border-2 border-white m-auto d-flex mb-2">
                                <img src=" {{auth()->user()->avatar?asset(Storage::url(auth()->user()->avatar)):asset(Storage::url('uploads/logo/user.png'))}}" class="w-auto h-auto" alt="Img">

                            </span>
                            <div class="text-center px-3 pb-3 border-bottom">
                                <div class="mb-3">
                                    <h5 class="d-flex align-items-center justify-content-center mb-1">
                                        {{ $employee->name ?? '' }}
                                        <i class="ti ti-discount-check-filled text-success ms-1"></i>
                                    </h5>
                                    <span class="badge badge-soft-dark fw-medium me-2">
                                <i class="ti ti-point-filled me-1"></i>{{ $employee->jobtitle->name ?? 'N/A' }}
                            </span>
                                                        <span class="badge badge-soft-secondary fw-medium">
                                {{ $employee->department->name ?? 'Department' }}
                            </span>
                                </div>
                                <div>
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="d-inline-flex align-items-center">
                                        <i class="ti ti-id me-2"></i>
                                        {{ __('Client ID') }}
                                    </span>
                                        <p class="text-dark">
                                            {{ \Auth::user()->employeeIdFormat($employee->employee_id) }}
                                        </p>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="d-inline-flex align-items-center">
                                        <i class="ti ti-star me-2"></i>
                                        {{ __('Department') }}
                                    </span>
                                        <p class="text-dark">
                                            {{ $employee->department->name ?? 'N/A' }}
                                        </p>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="d-inline-flex align-items-center">
                                        <i class="ti ti-star me-2"></i>
                                        {{ __('Sub Department') }}
                                    </span>
                                        <p class="text-dark">
                                            @if($employee->sub_dep_id == '0')
                                                {{ $employee->department->name . ' Manager' }}
                                            @else
                                                {{ $employee->sub_dep->name ?? 'N/A' }}
                                            @endif
                                        </p>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="d-inline-flex align-items-center">
                                        <i class="ti ti-star me-2"></i>
                                        {{ __('Section') }}
                                    </span>
                                        <p class="text-dark">
                                            @if(empty($employee->section_id))
                                                @if($employee->section_id == '0')
                                                    {{ $employee->sub_dep?$employee->sub_dep->name . ' Manager' :'N/A' }}
                                                @else
                                                    {{ $employee->section?$employee->section->name : 'N/A' }}
                                                @endif
                                            @else
                                                {{ $employee->section_id!='0'?$employee->section->name : 'N/A' }}
                                            @endif
                                        </p>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                    <span class="d-inline-flex align-items-center">
                                        <i class="ti ti-calendar-check me-2"></i>
                                        {{ __('Designations') }}
                                    </span>
                                        <p class="text-dark">
                                            {{ $employee->designation->name ?? 'N/A' }}
                                        </p>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="d-inline-flex align-items-center">
                                        <i class="ti ti-calendar-check me-2"></i>
                                        {{ __('Date Of Join') }}
                                    </span>
                                        <p class="text-dark">
                                            {{ $employee->Join_date_gregorian ?? 'N/A' }}
                                        </p>
                                    </div>
                                    <div class="row gx-2 mt-3">
                                        <div class="col-6">
                                            <a href="{{ route('employee.edit', $employee->id) }}" class="btn btn-dark w-100" target="_blank">
                                                <i class="ti ti-edit me-1"></i>Edit Info
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-3 border-bottom">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <h6>{{ __('Basic information') }}</h6>
                                    <a href="javascript:void(0);" class="btn btn-icon btn-sm" data-bs-toggle="modal" data-bs-target="#edit_employee"> </a>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="d-inline-flex align-items-center">
                                        <i class="ti ti-phone me-2"></i>
                                        {{ __('Phone') }}
                                    </span>
                                    <p class="text-dark">{{ $employee->phone ?? 'N/A' }}</p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="d-inline-flex align-items-center">
                                        <i class="ti ti-mail-check me-2"></i>
                                        {{ __('Email') }}
                                    </span>
                                    <p class="text-dark">{{ $employee->email ?? 'N/A' }}</p>

                                 </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="d-inline-flex align-items-center">
                                        <i class="ti ti-mail-check me-2"></i>
                                        {{ __('Personal Email') }}
                                    </span>
                                    <p class="text-dark">{{ $employee->personal_email ?? 'N/A' }}</p>

                                 </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="d-inline-flex align-items-center">
                                        <i class="ti ti-gender-male me-2"></i>
                                        {{ __('Gender') }}
                                    </span>
                                    <p class="text-dark text-end">{{ $employee->gender ?? 'N/A' }}</p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="d-inline-flex align-items-center">
                                        <i class="ti ti-cake me-2"></i>
                                        {{ __('Birdthday') }}
                                    </span>
                                    <p class="text-dark text-end">{{ $employee->dob ?? 'N/A' }}</p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <span class="d-inline-flex align-items-center">
                                        <i class="ti ti-map-pin-check me-2"></i>
                                        {{ __('Address') }}
                                    </span>
                                    <p class="text-dark text-end">{{ $employee->address ?? 'N/A' }}</p>
                                </div>
                            </div>
                            <div class="p-3 border-bottom">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <h6>{{ __('Personal Information') }}</h6>
                                    <a href="javascript:void(0);" class="btn btn-icon btn-sm" data-bs-toggle="modal" data-bs-target="#edit_personal"> </a>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="d-inline-flex align-items-center">
                                        <i class="ti ti-e-passport me-2"></i>
                                        {{ __('Passport No') }}
                                    </span>
                                    <p class="text-dark">{{ $employee->passport_number ?? 'N/A' }}</p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="d-inline-flex align-items-center">
                                        <i class="ti ti-calendar-x me-2"></i>
                                        {{ __('Passport Exp Date') }}
                                    </span>
                                    <p class="text-dark text-end">
                                    <p class="text-dark">{{ $employee->passport_issuance_expirydate_gregorian ?? 'N/A' }}</p>
                                </p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="d-inline-flex align-items-center">
                                        <i class="ti ti-gender-male me-2"></i>
                                        {{ __('Nationality') }}
                                    </span>
                                    <p class="text-dark text-end">{{ $employee->nationality->name ?? 'N/A' }}</p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="d-inline-flex align-items-center">
                                        <i class="ti ti-bookmark-plus me-2"></i>
                                        {{ __('Religion') }}
                                    </span>
                                    <p class="text-dark text-end">{{ $employee->religion ? 'Muslim' : 'NON-MUSLIM' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <h6>{{ __('Emergency Contact Number') }}</h6>
                        <a href="javascript:void(0);" class="btn btn-icon btn-sm" data-bs-toggle="modal" data-bs-target="#edit_emergency"> </a>
                    </div>
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="p-3 border-bottom">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <span class="d-inline-flex align-items-center">
                                            {{ __('Primary') }}
                                        </span>
                                        <h6 class="d-flex align-items-center fw-medium mt-1">{{ $employee->emergency_contact_name ??'' }}
                                            <span class="d-inline-flex mx-1"><i class="ti ti-point-filled text-danger" ></i></span>{{ $employee->emergency_contact_relationship??'' }}</h6>
                                    </div>
                                    <p class="text-dark">{{ $employee->emergency_contact_phone ?? '' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <div>
                        <div class="tab-content custom-accordion-items">
                            <div class="tab-pane active show" id="bottom-justified-tab1" role="tabpanel">
                                <div class="accordion accordions-items-seperate" id="accordionExample">
                                    <div class="accordion-item">
                                        <div class="accordion-header" id="headingTwo">
                                            <div class="accordion-button">
                                                <div class="d-flex align-items-center flex-fill">
                                                    <h5>{{ __('ID_qama_details') }}</h5>
                                                     <a href="#" class="d-flex align-items-center collapsed collapse-arrow"  data-bs-toggle="collapse" data-bs-target="#primaryBorderTwo" aria-expanded="false" aria-controls="primaryBorderTwo">
                                                        <i class="ti ti-chevron-down fs-18"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="primaryBorderTwo" class="accordion-collapse collapse border-top" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <span class="d-inline-flex align-items-center">
                                                            {{ __('ID qama details') }}
                                                        </span>
                                                        <h6 class="d-flex align-items-center fw-medium mt-1">{{ $employee->residence_number??'N/A' }}</h6>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <span class="d-inline-flex align-items-center">
                                                            {{ __('Place_of_issuance_of_ID_residence') }}
                                                        </span>
                                                        <h6 class="d-flex align-items-center fw-medium mt-1">{{ $employee->place_of_issuance_of_ID_residence??'N/A' }}</h6>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <span class="d-inline-flex align-items-center">
                                                            {{ __('Join_date_gregorian') }}
                                                        </span>
                                                        <h6 class="d-flex align-items-center fw-medium mt-1">{{ $employee->iqama_issuance_date_gregorian??'N/A' }}</h6>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <span class="d-inline-flex align-items-center">
                                                            {{ __('Join_date_hijri') }}
                                                        </span>
                                                        <h6 class="d-flex align-items-center fw-medium mt-1">{{ $employee->iqama_issuance_date_Hijri ??'N/A' }}</h6>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <span class="d-inline-flex align-items-center">
                                                            {{ __('Iqama_issuance_expirydate_gregorian') }}
                                                        </span>
                                                        <h6 class="d-flex align-items-center fw-medium mt-1">{{ $employee->iqama_issuance_expirydate_gregorian ??'N/A' }}</h6>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <span class="d-inline-flex align-items-center">
                                                            {{ __('Iqama_issuance_expirydate_Hijri') }}
                                                        </span>
                                                        <h6 class="d-flex align-items-center fw-medium mt-1">{{ $employee->iqama_issuance_expirydate_Hijri ??'N/A' }}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <div class="accordion-header" id="headingThree">
                                            <div class="accordion-button">
                                                <div class="d-flex align-items-center justify-content-between flex-fill">
                                                    <h5>{{ __('Passport_details') }}</h5>
                                                    <div class="d-flex">
                                                         <a href="#" class="d-flex align-items-center collapsed collapse-arrow" data-bs-toggle="collapse" data-bs-target="#primaryBorderThree" aria-expanded="false" aria-controls="primaryBorderThree">
                                                            <i class="ti ti-chevron-down fs-18"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="primaryBorderThree" class="accordion-collapse collapse border-top" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <span class="d-inline-flex align-items-center">
                                                            {{ __('Passport_number') }}
                                                        </span>
                                                        <h6 class="d-flex align-items-center fw-medium mt-1">{{ $employee->passport_number??'N/A' }}</h6>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <span class="d-inline-flex align-items-center">
                                                            {{ __('Place_of_issuance_of_passport') }}
                                                        </span>
                                                        <h6 class="d-flex align-items-center fw-medium mt-1">{{ $employee->place_of_issuance_of_passport??'N/A' }}</h6>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <span class="d-inline-flex align-items-center">
                                                            {{ __('Passport_issuance_expirydate_gregorian') }}
                                                        </span>
                                                        <h6 class="d-flex align-items-center fw-medium mt-1">{{ $employee->passport_issuance_expirydate_gregorian??'N/A' }}</h6>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <span class="d-inline-flex align-items-center">
                                                            {{ __('Passport_issuance_date_gregorian') }}
                                                        </span>
                                                        <h6 class="d-flex align-items-center fw-medium mt-1">{{ $employee->passport_issuance_date_gregorian ??'N/A' }}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                        <div class="col-md-12">
                                            <div class="accordion-item">
                                                <div class="row">
                                                    <div class="accordion-header" id="headingFour">
                                                        <div class="accordion-button">
                                                            <div class="d-flex align-items-center justify-content-between flex-fill">
                                                                <h5>{{ __('Address_in_Saudi_Arabia') }}</h5>
                                                                <div class="d-flex">
                                                                     <a href="#" class="d-flex align-items-center collapsed collapse-arrow" data-bs-toggle="collapse" data-bs-target="#primaryBorderFour" aria-expanded="false" aria-controls="primaryBorderFour">
                                                                        <i class="ti ti-chevron-down fs-18"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="primaryBorderFour" class="accordion-collapse collapse border-top" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                            <div>
                                                                <div class="mb-3">
                                                                    <div class="d-flex align-items-center justify-content-between">
                                                                        <div>
                                                                            <span class="d-inline-flex align-items-center fw-normal">
                                                                                {{ __('Building_number') }}
                                                                            </span>
                                                                            <h6 class="d-flex align-items-center mt-1">{{ $employee->building_number??'N/A' }}</h6>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <div class="d-flex align-items-center justify-content-between">
                                                                        <div>
                                                                            <span class="d-inline-flex align-items-center fw-normal">
                                                                                {{ __('Street_name') }}
                                                                            </span>
                                                                            <h6 class="d-flex align-items-center mt-1">{{ $employee->street_name?? 'N/A' }}</h6>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <div class="d-flex align-items-center justify-content-between">
                                                                        <div>
                                                                            <span class="d-inline-flex align-items-center fw-normal">
                                                                                {{ __('City') }}
                                                                            </span>
                                                                            <h6 class="d-flex align-items-center mt-1">{{ $employee->city?? 'N/A' }}</h6>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <div class="d-flex align-items-center justify-content-between">
                                                                        <div>
                                                                            <span class="d-inline-flex align-items-center fw-normal">
                                                                                {{ __('Country') }}
                                                                            </span>
                                                                            <h6 class="d-flex align-items-center mt-1">{{ $employee->country?? 'N/A' }}</h6>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <div class="d-flex align-items-center justify-content-between">
                                                                        <div>
                                                                            <span class="d-inline-flex align-items-center fw-normal">
                                                                                {{ __('Region') }}
                                                                            </span>
                                                                            <h6 class="d-flex align-items-center mt-1">{{ $employee->region??'N/A' }}</h6>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="accordion-item">
                                                <div class="row">
                                                    <div class="accordion-header" id="headingFive">
                                                        <div class="accordion-button collapsed">
                                                            <div class="d-flex align-items-center justify-content-between flex-fill">
                                                                <h5>{{ __('Address_in_mother_country') }}</h5>
                                                                <div class="d-flex">
                                                                     <a href="#" class="d-flex align-items-center collapsed collapse-arrow" data-bs-toggle="collapse" data-bs-target="#primaryBorderFive" aria-expanded="false" aria-controls="primaryBorderFive">
                                                                        <i class="ti ti-chevron-down fs-18"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="primaryBorderFive" class="accordion-collapse collapse border-top" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                            <div>
                                                                <div class="mb-3">
                                                                    <div class="d-flex align-items-center justify-content-between">
                                                                        <div>
                                                                            <h6 class="d-inline-flex align-items-center fw-medium">
                                                                                {{ __('Address_in_mother_country') }}
                                                                            </h6>
                                                                            <span class="d-flex align-items-center badge bg-secondary-transparent mt-1"><i class="ti ti-point-filled me-1"></i>{{ $employee->address ??'N/A' }}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <div class="d-flex align-items-center justify-content-between">
                                                                        <div>
                                                                            <h6 class="d-inline-flex align-items-center fw-medium">
                                                                                {{ __('City') }}
                                                                            </h6>
                                                                            <span class="d-flex align-items-center badge bg-secondary-transparent mt-1"><i class="ti ti-point-filled me-1"></i>{{ $employee->mother_city ??'N/A' }}</span>
                                                                        </div>
                                                                     </div>
                                                                </div>
                                                                <div>
                                                                    <div class="d-flex align-items-center justify-content-between">
                                                                        <div>
                                                                            <h6 class="d-inline-flex align-items-center fw-medium">
                                                                                {{ __('Country') }}
                                                                            </h6>
                                                                            <span class="d-flex align-items-center badge bg-secondary-transparent mt-1"><i class="ti ti-point-filled me-1"></i>{{ $employee->mother_country ??'N/A' }}</span>
                                                                        </div>
                                                                     </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="accordion-item">
                                                <div class="row">
                                                    <div class="accordion-header" id="headingFive">
                                                        <div class="accordion-button collapsed">
                                                            <div class="d-flex align-items-center justify-content-between flex-fill">
                                                                <h5>{{ __('Documents') }}</h5>
                                                                <div class="d-flex">
                                                                     <a href="#" class="d-flex align-items-center collapsed collapse-arrow" data-bs-toggle="collapse" data-bs-target="#primaryBorderFive2" aria-expanded="false" aria-controls="primaryBorderFive2">
                                                                        <i class="ti ti-chevron-down fs-18"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="primaryBorderFive2" class="accordion-collapse collapse border-top" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                            <div>

                                                                <div class="card-body">
                                                                    <div class="table-responsive">
                                                                        <table class="table table-striped table-bordered table-hover dataTables">
                                                                            <thead class="thead-light">
                                                                            <tr>
                                                                                <th class="text-start ps-4">{{ __('Name') }}</th>
                                                                                <th class="text-start ps-4">{{ __('Employee') }}</th>
                                                                                <th class="text-center">{{ __('Document') }}</th>
                                                                                <th class="text-center">{{ __('Document Type') }}</th>
                                                                                <th class="text-center">{{ __('Is Contract') }}</th>
                                                                                <th class="text-center">{{ __('Specific Or Not Period') }}</th>
                                                                                <th class="text-center">{{ __('Start Date') }}</th>
                                                                                <th class="text-center">{{ __('End Date') }}</th>

                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                            @foreach ($documents as $document)
                                                                                @php
                                                                                    $documentPath = asset(Storage::url('uploads/documentUpload'));
                                                                                @endphp
                                                                                <tr class="hover-shadow">
                                                                                    <td class="text-start ps-4">{{ $document->name }}</td>
                                                                                    <td class="text-start ps-4">{{ $document->employee->name ?? '' }}</td>
                                                                                    <td class="text-center">
                                                                                        @if(!empty($document->document))
                                                                                            <a href="{{ $documentPath . '/' . $document->document }}" target="_blank" class="text-decoration-none">
                                                                                                <i class="fas fa-download text-primary"></i>
                                                                                            </a>
                                                                                        @else
                                                                                            <span class="text-muted">-</span>
                                                                                        @endif
                                                                                    </td>
                                                                                    <td class="text-center">{{ $document->document_type->name ?? '' }}</td>
                                                                                    <td class="text-center">
                    <span class="px-2 py-1 rounded text-white fw-bold {{ $document->is_contract ? 'bg-success' : 'bg-danger' }}">
                        {{ $document->is_contract ? 'YES' : 'NO' }}
                    </span>
                                                                                    </td>
                                                                                    <td class="text-center">
                    <span class="px-2 py-1 rounded text-white fw-bold {{ $document->contract_specific==1 ? 'bg-success' : 'bg-danger' }}">
                        {{ $document->contract_specific==1 ? 'YES' : 'NO' }}
                    </span>
                                                                                    </td>
                                                                                    <td class="text-start">{{ $document->start_date ?? 'N/A' }}</td>
                                                                                    <td class="text-start">{{ $document->end_date ?? 'N/A' }}</td>

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
                                        </div>
                                    <div class="col-md-12">
                                        <div class="accordion-item">
                                            <div class="row">
                                                <div class="accordion-header" id="salaryHeading">
                                                    <div class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#salaryCollapse" aria-expanded="false" aria-controls="salaryCollapse">
                                                        <div class="d-flex align-items-center justify-content-between flex-fill">
                                                            <h5>{{ __('Salary') }}</h5>
                                                            <div class="d-flex">
                            <span class="collapse-arrow">
                                <i class="ti ti-chevron-down fs-18"></i>
                            </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="salaryCollapse" class="accordion-collapse collapse border-top" aria-labelledby="salaryHeading" data-bs-parent="#salaryAccordion">
                                                    <div class="accordion-body">
                                                            <div>

                                                                <div class="card-body">
                                                                    <div class="accordion-body">
                                                                        <div>

                                                                            <div class="card-body">
                                                                                <div class="row">

                                                                                    <div class="col-12">
                                                                                        <div class="row">


                                                                                            <div class="col-md-6">
                                                                                                <div class="card min-height-253">
                                                                                                    <div class="card-header">

                                                                                                        <div class="row">
                                                                                                            <div class="col">
                                                                                                                <h6 class="mb-0" >{{__('Employee Salary')}}</h6>
                                                                                                            </div>

                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="card-body">
                                                                                                        <div class="project-info d-flex text-sm">
                                                                                                            {{--                                <div class="project-info-inner mr-3 col-6">--}}
                                                                                                            {{--                                    <b class="m-0"> {{__('Payslip Type') }} </b>--}}
                                                                                                            {{--                                    <div class="project-amnt pt-1">{{ $employee->salary_type() }}</div>--}}
                                                                                                            {{--                                </div>--}}
                                                                                                            <div class="project-info-inner mr-3 col-6">
                                                                                                                <b class="m-0" style="color: red;"> {{__('Salary') }} </b>
                                                                                                                <div class="project-amnt pt-1" style="color: red;">{{ number_format($employee->salary,2)  ??0 }} SAR</div>
                                                                                                            </div>
                                                                                                                 <div class="project-info-inner mr-3 col-6">
                                                                                                                    <b class="m-0"> {{__('Net Salary') }} </b>
                                                                                                                    <div class="project-amnt pt-1">{{ number_format($employee->net_salary,2)  ??0 }} SAR</div>
                                                                                                                </div>

                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="col-md-6">
                                                                                                <div class="card min-height-253">
                                                                                                    <div class="card-header">
                                                                                                        <div class="row">
                                                                                                            <div class="col">
                                                                                                                <h6 class="mb-0">{{__('social_insurance')}}</h6>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="card-body">
                                                                                                        <div class="project-info d-flex text-sm">
                                                                                                            <div class="project-info-inner mr-3 col-6">
                                                                                                                <b class="m-0"> {{__('on_employee') }} </b>
                                                                                                                <div class="project-amnt pt-1"> {{  \Auth::user()->priceFormat($employee->insurance($employee->id,'employee'))}} </div>
                                                                                                            </div>
                                                                                                            <div class="project-info-inner mr-3 col-6">
                                                                                                                <b class="m-0"> {{__('on_company') }} </b>
                                                                                                                <div class="project-amnt pt-1">{{  \Auth::user()->priceFormat($employee->insurance($employee->id,'company'))}}</div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="col-md-6">
                                                                                                <div class="card min-height-253">
                                                                                                    <div class="card-header">
                                                                                                        <div class="row">
                                                                                                            <div class="col">
                                                                                                                <h6 class="mb-0">{{__('Medical_insurance')}}</h6>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="card-body">
                                                                                                        <div class="project-info d-flex text-sm">
                                                                                                            <div class="project-info-inner mr-3 col-6">
                                                                                                                <b class="m-0"> {{__('on_employee') }} </b>
                                                                                                                <div class="project-amnt pt-1"> {{  \Auth::user()->priceFormat($employee->medical_insurance($employee->id,'employee'))}} </div>
                                                                                                            </div>
                                                                                                            <div class="project-info-inner mr-3 col-6">
                                                                                                                <b class="m-0"> {{__('on_company') }} </b>
                                                                                                                <div class="project-amnt pt-1">{{  \Auth::user()->priceFormat($employee->medical_insurance($employee->id,'company'))}}</div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                            {{-- Delays --}}
                                                                                            <div class="col-md-6">
                                                                                                <div class="card min-height-253">
                                                                                                    <div class="card-header">
                                                                                                        <div class="row">
                                                                                                            <div class="col">
                                                                                                                <h6 class="mb-0">{{__('Delays')}}</h6>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="card-body">
                                                                                                        <div class="project-info d-flex text-sm">

                                                                                                            <div class="project-info-inner mr-3 col-3">
                                                                                                                <b class="m-0"> 0 - 15 m </b>
                                                                                                                <div class="project-amnt pt-1"> {{$employee->getEmployeeDelays(0 , 15)}} </div>
                                                                                                            </div>

                                                                                                            <div class="project-info-inner mr-3 col-3">
                                                                                                                <b class="m-0"> 16 - 30 m </b>
                                                                                                                <div class="project-amnt pt-1"> {{$employee->getEmployeeDelays(16 , 30)}} </div>
                                                                                                            </div>

                                                                                                            <div class="project-info-inner mr-3 col-3">
                                                                                                                <b class="m-0"> 31 - 60 m </b>
                                                                                                                <div class="project-amnt pt-1"> {{$employee->getEmployeeDelays(31 , 60)}} </div>
                                                                                                            </div>

                                                                                                            <div class="project-info-inner mr-3 col-3">
                                                                                                                <b class="m-0"> 61 - ... m </b>
                                                                                                                <div class="project-amnt pt-1"> {{$employee->getEmployeeDelays(61 , null)}} </div>
                                                                                                            </div>

                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                            {{-- overtime --}}
                                                                                            <div class="col-md-6">
                                                                                                <div class="card min-height-253">
                                                                                                    <div class="card-header">
                                                                                                        <div class="row">
                                                                                                            <div class="col">
                                                                                                                <h6 class="mb-0">{{__('Attendance OverTime')}}</h6>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="card-body">
                                                                                                        <div class="project-info d-flex text-sm">

                                                                                                            <div class="project-info-inner mr-3 col-3">
                                                                                                                <b class="m-0"> 0 - 15 m </b>
                                                                                                                <div class="project-amnt pt-1"> {{$employee->getEmployeeOverTimes(0 , 15)}} </div>
                                                                                                            </div>

                                                                                                            <div class="project-info-inner mr-3 col-3">
                                                                                                                <b class="m-0"> 16 - 30 m </b>
                                                                                                                <div class="project-amnt pt-1"> {{$employee->getEmployeeOverTimes(16 , 30)}} </div>
                                                                                                            </div>

                                                                                                            <div class="project-info-inner mr-3 col-3">
                                                                                                                <b class="m-0"> 31 - 60 m </b>
                                                                                                                <div class="project-amnt pt-1"> {{$employee->getEmployeeOverTimes(31 , 60)}} </div>
                                                                                                            </div>

                                                                                                            <div class="project-info-inner mr-3 col-3">
                                                                                                                <b class="m-0"> 61 - ... m </b>
                                                                                                                <div class="project-amnt pt-1"> {{$employee->getEmployeeOverTimes(61 , null)}} </div>
                                                                                                            </div>

                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="col-md-6">
                                                                                                <div class="card ">
                                                                                                    <div class="card-header ">
                                                                                                        <div class="row">
                                                                                                            <div class="col">
                                                                                                                <h6 class="mb-0">{{__('Allowance')}}</h6>
                                                                                                            </div>

                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="table-responsive">
                                                                                                        <table class="table table-striped mb-0">
                                                                                                            <thead>
                                                                                                            <tr>
                                                                                                                <th>{{__('Employee Name')}}</th>
                                                                                                                <th>{{__('Allownace Option')}}</th>
                                                                                                                <th>{{__('Title')}}</th>
                                                                                                                <th>{{__('Amount')}}</th>
                                                                                                                <th>{{__('Action')}}</th>
                                                                                                            </tr>
                                                                                                            </thead>
                                                                                                            <tbody>
                                                                                                            @foreach ($allowances as $allowance)
                                                                                                                <tr>
                                                                                                                    <td>{{ !empty($allowance->employee())?$allowance->employee()->name:'' }}</td>
                                                                                                                    <td>{{ !empty($allowance->allowance_option())?$allowance->allowance_option()->name:'' }}</td>
                                                                                                                    <td>{{ $allowance->title }}</td>
                                                                                                                    <td>{{  \Auth::user()->priceFormat($allowance->amount) }}</td>
                                                                                                                    <td>


                                                                                                                        @can('Delete Allowance')
                                                                                                                            <form method="POST" action="{{ route('allowance.destroy', $allowance->id) }}" class="d-inline" onsubmit="return confirm('{{ __('Are You Sure?') }}\n{{ __('This action cannot be undone. Do you want to continue?') }}');">
                                                                                                                                @csrf
                                                                                                                                @method('DELETE')
                                                                                                                                <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" title="{{ __('Delete') }}">
                                                                                                                                    <i class="fas fa-trash"></i>
                                                                                                                                </button>
                                                                                                                            </form>
                                                                                                                        @endcan

                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                            @endforeach
                                                                                                            </tbody>
                                                                                                        </table>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="col-md-6">
                                                                                                <div class="card">
                                                                                                    <div class="card-header">
                                                                                                        <div class="row">
                                                                                                            <div class="col">
                                                                                                                <h6 class="mb-0">{{__('Commission')}}</h6>
                                                                                                            </div>

                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="table-responsive">
                                                                                                        <table class="table table-striped mb-0">
                                                                                                            <thead>
                                                                                                            <tr>
                                                                                                                <th>{{__('Employee Name')}}</th>
                                                                                                                <th>{{__('Title')}}</th>
                                                                                                                <th>{{__('Amount')}}</th>
                                                                                                                <th>{{__('Type')}}</th>
                                                                                                                <th>{{__('Commission Amount')}}</th>
                                                                                                                <th>{{__('Action')}}</th>
                                                                                                            </tr>
                                                                                                            </thead>
                                                                                                            <tbody>
                                                                                                            @foreach ($commissions as $commission)
                                                                                                                <tr>
                                                                                                                    <td>{{ !empty($commission->employee())?$commission->employee()->name:'' }}</td>
                                                                                                                    <td>{{ $commission->title }}</td>
                                                                                                                    <td>{{ $commission->amount }} SAR</td>
                                                                                                                    <td>{{   $commission->type  }} </td>
                                                                                                                    <td>{{   $commission->commission_amount  }} </td>

                                                                                                                    <td class="text-right">

                                                                                                                        @can('Delete Commission')
                                                                                                                            <form method="POST" action="{{ route('commission.destroy', $commission->id) }}" class="d-inline" onsubmit="return confirm('{{ __('Are You Sure?') }}\n{{ __('This action cannot be undone. Do you want to continue?') }}');">
                                                                                                                                @csrf
                                                                                                                                @method('DELETE')
                                                                                                                                <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" title="{{ __('Delete') }}">
                                                                                                                                    <i class="fas fa-trash"></i>
                                                                                                                                </button>
                                                                                                                            </form>
                                                                                                                        @endcan
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                            @endforeach
                                                                                                            </tbody>
                                                                                                        </table>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="col-md-6">
                                                                                                <div class="card">
                                                                                                    <div class="card-header">
                                                                                                        <div class="row">
                                                                                                            <div class="col">
                                                                                                                <h6 class="mb-0">{{__('Loan')}}</h6>
                                                                                                            </div>

                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="table-responsive">
                                                                                                        <table class="table table-striped mb-0">
                                                                                                            <thead>
                                                                                                            <tr>
                                                                                                                <th>{{__('Employee')}}</th>
                                                                                                                <th>{{__('Loan Options')}}</th>
                                                                                                                <th>{{__('Title')}}</th>
                                                                                                                <th>{{__('Loan Amount')}}</th>
                                                                                                                <th>{{__('Start Date')}}</th>
                                                                                                                <th>{{__('End Date')}}</th>
                                                                                                                <th>{{__('Action')}}</th>
                                                                                                            </tr>
                                                                                                            </thead>
                                                                                                            <tbody>
                                                                                                            @foreach ($loans as $loan)
                                                                                                                <tr>
                                                                                                                    <td>{{ !empty($loan->employee())?$loan->employee()->name:'' }}</td>
                                                                                                                    <td>{{!empty( $loan->loan_option())? $loan->loan_option()->name:'' }}</td>
                                                                                                                    <td>{{ $loan->title }}</td>
                                                                                                                    <td>{{  \Auth::user()->priceFormat($loan->amount) }}</td>
                                                                                                                    <td>{{  \Auth::user()->dateFormat($loan->start_date) }}</td>
                                                                                                                    <td>{{ \Auth::user()->dateFormat( $loan->end_date) }}</td>
                                                                                                                    <td class="text-right">

                                                                                                                        @can('Delete Loan')
                                                                                                                            <form method="POST" action="{{ route('loan.destroy', $loan->id) }}" class="d-inline" onsubmit="return confirm('{{ __('Are You Sure?') }}\n{{ __('This action cannot be undone. Do you want to continue?') }}');">
                                                                                                                                @csrf
                                                                                                                                @method('DELETE')
                                                                                                                                <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" title="{{ __('Delete') }}">
                                                                                                                                    <i class="fas fa-trash"></i>
                                                                                                                                </button>
                                                                                                                            </form>
                                                                                                                        @endcan
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                            @endforeach
                                                                                                            </tbody>
                                                                                                        </table>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="col-md-6">
                                                                                                <div class="card">
                                                                                                    <div class="card-header">
                                                                                                        <div class="row">
                                                                                                            <div class="col">
                                                                                                                <h6 class="mb-0">{{__('Saturation Deduction')}}</h6>
                                                                                                            </div>

                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="table-responsive">
                                                                                                        <table class="table table-striped mb-0">
                                                                                                            <thead>
                                                                                                            <tr>
                                                                                                                <th>{{__('Employee Name')}}</th>
                                                                                                                <th>{{__('Deduction Option')}}</th>
                                                                                                                <th>{{__('Title')}}</th>
                                                                                                                <th>{{__('Amount')}}</th>
                                                                                                                <th>{{__('Action')}}</th>
                                                                                                            </tr>
                                                                                                            </thead>
                                                                                                            <tbody>
                                                                                                            @foreach ($saturationdeductions as $saturationdeduction)
                                                                                                                <tr>
                                                                                                                    <td>{{ !empty($saturationdeduction->employee())?$saturationdeduction->employee()->name:'' }}</td>
                                                                                                                    <td>{{ !empty($saturationdeduction->deduction_option())?$saturationdeduction->deduction_option()->name:'' }}</td>
                                                                                                                    <td>{{ $saturationdeduction->title }}</td>
                                                                                                                    <td>{{ \Auth::user()->priceFormat( $saturationdeduction->amount) }}</td>
                                                                                                                    <td class="text-right">
                                                                                                                        @can('Delete Saturation Deduction')
                                                                                                                            <form method="POST" action="{{ route('saturationdeduction.destroy', $saturationdeduction->id) }}" class="d-inline" onsubmit="return confirm('{{ __('Are You Sure?') }}\n{{ __('This action cannot be undone. Do you want to continue?') }}');">
                                                                                                                                @csrf
                                                                                                                                @method('DELETE')
                                                                                                                                <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" title="{{ __('Delete') }}">
                                                                                                                                    <i class="fas fa-trash"></i>
                                                                                                                                </button>
                                                                                                                            </form>
                                                                                                                        @endcan
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                            @endforeach
                                                                                                            </tbody>
                                                                                                        </table>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="col-md-6">
                                                                                                <div class="card">
                                                                                                    <div class="card-header">
                                                                                                        <div class="row">
                                                                                                            <div class="col">
                                                                                                                <h6 class="mb-0">{{__('Other Payment')}}</h6>
                                                                                                            </div>

                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="table-responsive">
                                                                                                        <table class="table table-striped mb-0">
                                                                                                            <thead>
                                                                                                            <tr>
                                                                                                                <th>{{__('Employee')}}</th>
                                                                                                                <th>{{__('Title')}}</th>
                                                                                                                <th>{{__('Amount')}}</th>
                                                                                                                <th>{{__('Action')}}</th>
                                                                                                            </tr>
                                                                                                            </thead>
                                                                                                            <tbody>
                                                                                                            @foreach ($otherpayments as $otherpayment)
                                                                                                                <tr>
                                                                                                                    <td>{{ !empty($otherpayment->employee())?$otherpayment->employee()->name:'' }}</td>
                                                                                                                    <td>{{ $otherpayment->title }}</td>
                                                                                                                    <td>{{  \Auth::user()->priceFormat($otherpayment->amount) }}</td>
                                                                                                                    <td class="text-right">

                                                                                                                        @can('Delete Other Payment')
                                                                                                                            <form method="POST" action="{{ route('otherpayment.destroy', $otherpayment->id) }}" class="d-inline" onsubmit="return confirm('{{ __('Are You Sure?') }}\n{{ __('This action cannot be undone. Do you want to continue?') }}');">
                                                                                                                                @csrf
                                                                                                                                @method('DELETE')
                                                                                                                                <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" title="{{ __('Delete') }}">
                                                                                                                                    <i class="fas fa-trash"></i>
                                                                                                                                </button>
                                                                                                                            </form>
                                                                                                                        @endcan
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                            @endforeach
                                                                                                            </tbody>
                                                                                                        </table>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="col-md-6">
                                                                                                <div class="card">
                                                                                                    <div class="card-header">
                                                                                                        <div class="row">
                                                                                                            <div class="col">
                                                                                                                <h6 class="mb-0">{{__('Overtime')}}</h6>
                                                                                                            </div>


                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="table-responsive">
                                                                                                        <table class="table table-striped mb-0">
                                                                                                            <thead>
                                                                                                            <tr>
                                                                                                                <th>{{__('Employee Name')}}</th>
                                                                                                                <th>{{__('Overtime Title')}}</th>
                                                                                                                {{--                                    <th>{{__('Number of days')}}</th>--}}
                                                                                                                <th>{{__('Hours')}}</th>
                                                                                                                <th>{{__('Avg Hour')}}</th>
                                                                                                                <th>{{__('amount')}}</th>
                                                                                                                <th>{{__('Rate')}}</th>
                                                                                                                <th>{{__('Action')}}</th>
                                                                                                            </tr>
                                                                                                            </thead>
                                                                                                            <tbody>
                                                                                                            @foreach ($overtimes as $overtime)
                                                                                                                <tr>
                                                                                                                    <td>{{ !empty($overtime->employee())?$overtime->employee()->name:'' }}</td>
                                                                                                                    <td>{{ $overtime->title }}</td>
                                                                                                                    {{--                                        <td>{{ $overtime->number_of_days }}</td>--}}
                                                                                                                    <td>{{ $overtime->hours }}</td>
                                                                                                                    <td>{{ $overtime->avg_hour }}</td>
                                                                                                                    <td>{{ $overtime->amount }}</td>
                                                                                                                    <td>{{  \Auth::user()->priceFormat($overtime->rate) }}</td>
                                                                                                                    <td class="text-right">

                                                                                                                        @can('Delete Overtime')
                                                                                                                            <form method="POST" action="{{ route('overtime.destroy', $overtime->id) }}" class="d-inline" onsubmit="return confirm('{{ __('Are You Sure?') }}\n{{ __('This action cannot be undone. Do you want to continue?') }}');">
                                                                                                                                @csrf
                                                                                                                                @method('DELETE')
                                                                                                                                <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" title="{{ __('Delete') }}">
                                                                                                                                    <i class="fas fa-trash"></i>
                                                                                                                                </button>
                                                                                                                            </form>
                                                                                                                        @endcan
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                            @endforeach
                                                                                                            </tbody>
                                                                                                        </table>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="col-md-6">
                                                                                                <div class="card">
                                                                                                    <div class="card-header">
                                                                                                        <div class="row">
                                                                                                            <div class="col">
                                                                                                                <h6 class="mb-0">{{__('Absences')}}</h6>
                                                                                                            </div>
                                                                                                            @can('Create Overtime')
                                                                                                                <div class="col text-right">
                                                                                                                    <a href="#" style="background-color: #e55b2c; border: none;" data-url="{{ route('absences.create',$employee->id) }}" data-size="md" data-ajax-popup="true" data-title="{{__('Create absence')}}" data-toggle="tooltip" data-original-title="{{__('Create absence')}}" class="btn btn-info">
                                                                                                                        <i class="fa fa-plus"></i>
                                                                                                                    </a>
                                                                                                                </div>
                                                                                                            @endcan
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="table-responsive">
                                                                                                        <table class="table table-striped mb-0">
                                                                                                            <thead>
                                                                                                            <tr>
                                                                                                                <th>{{ __('Employee Name') }}</th>
                                                                                                                <th>{{ __('Absent Type') }}</th>
                                                                                                                <th>{{ __('Number of days') }}</th>
                                                                                                                <th>{{ __('Start Date') }}</th>
                                                                                                                <th>{{ __('End Date') }}</th>
                                                                                                                <th>{{ __('Amount') }}</th>
                                                                                                                <th>{{ __('Action') }}</th>
                                                                                                            </tr>
                                                                                                            </thead>
                                                                                                            <tbody>
                                                                                                            @php
                                                                                                                $totalAbsenceWithPermission = 0;
                                                                                                                $totalDiscountAmount = 0;
                                                                                                            @endphp

                                                                                                            @foreach ($absences as $absence)


                                                                                                                <tr>
                                                                                                                    <td>{{ !empty($absence->employee()) ? $absence->employee()->name : '' }}</td>
                                                                                                                    <td>{{ $absence->type }}</td>
                                                                                                                    <td>{{ $absence->number_of_days }}</td>
                                                                                                                    <td>{{ $absence->start_date }}</td>
                                                                                                                    <td>{{ $absence->end_date }}</td>
                                                                                                                    <td>{{ $absence->discount_amount }}</td>
                                                                                                                    <td class="text-right">
                                                                                                                        @can('Delete Overtime')
                                                                                                                            <form method="POST" action="{{ route('absence.destroy', $absence->id) }}" class="d-inline" onsubmit="return confirm('{{ __('Are You Sure?') }}\n{{ __('This action cannot be undone. Do you want to continue?') }}');">
                                                                                                                                @csrf
                                                                                                                                @method('DELETE')
                                                                                                                                <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" title="{{ __('Delete') }}">
                                                                                                                                    <i class="fas fa-trash"></i>
                                                                                                                                </button>
                                                                                                                            </form>
                                                                                                                        @endcan
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                            @endforeach

                                                                                                            <!-- Display total absence with permission and discount amount -->
                                                                                                            <tr>
                                                                                                                <td colspan="2"><strong>{{ __('Total Absence with Permission') }}</strong></td>
                                                                                                                <td><strong>{{ $abs_with_permission }}</strong></td>
                                                                                                                <td colspan="2"><strong>{{ __('Total Discount Amount') }}</strong></td>
                                                                                                                <td><strong>{{ $abs_with_permission_amount }}</strong></td>
                                                                                                                <td></td>
                                                                                                            </tr>
                                                                                                            <!-- Display total absence with permission and discount amount -->
                                                                                                            <tr>
                                                                                                                <td colspan="2"><strong>{{ __('Total Absence with Out Permission') }}</strong></td>
                                                                                                                <td><strong>{{ $abs_without_permission }}</strong></td>
                                                                                                                <td colspan="2"><strong>{{ __('Total Amount Absence With Out Permission') }}</strong></td>
                                                                                                                <td><strong>{{ $abs_without_permission_amount }}</strong></td>
                                                                                                                <td></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td colspan="2"><strong>{{ __('Total Sick') }}</strong></td>
                                                                                                                <td><strong>{{ $total_sick }}</strong></td>
                                                                                                                <td colspan="2"><strong>{{ __('Total Amount Sick') }}</strong></td>
                                                                                                                <td><strong>{{ $total_sick_amount }}</strong></td>
                                                                                                                <td></td>
                                                                                                            </tr>
                                                                                                            </tbody>
                                                                                                        </table>
                                                                                                    </div>                    </div>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="modal fade" id="dynamicModal" tabindex="-1" role="dialog" aria-labelledby="dynamicModalLabel" aria-hidden="true">
                                                                                    <div class="modal-dialog modal-lg" role="document">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header">
                                                                                                <h5 class="modal-title" id="dynamicModalLabel">Modal Title</h5>
                                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                            </div>
                                                                                            <div class="modal-body">

                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


<!-- /Page Wrapper -->


@endsection

