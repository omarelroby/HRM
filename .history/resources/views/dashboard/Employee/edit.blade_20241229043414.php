@extends('dashboard.layouts.master')
@include('dashboard.layouts.header')
@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h4>{{ __('Add New Employee') }}</h4>
        </div>
       {{-- Edit Employee Modal --}}
<div class="modal fade" id="editEmployeeModal" tabindex="-1" aria-labelledby="editEmployeeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <div class="d-flex align-items-center">
                    <h4 class="modal-title me-2">{{ __('Edit Employee') }}</h4>
                </div>
                <button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="edit_employee" enctype="multipart/form-data" method="post" action="{{ route('employee.update', $employee->id) }}">
                @csrf
                @method('PUT')
                <div id="error-messages" class="alert alert-danger d-none">
                    <ul></ul>
                </div>

                <div class="contact-grids-tab">
                    <ul class="nav nav-underline" id="editTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="edit-info-tab" data-bs-toggle="tab" data-bs-target="#edit-basic-info" type="button" role="tab" aria-selected="true">{{ __('Step 1.Basic Information') }}</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="edit-job-tab" data-bs-toggle="tab" data-bs-target="#edit-jobModal" type="button" role="tab" aria-selected="false" tabindex="-1">{{ __('Step 2.Job Information') }}</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="edit-salary-tab" data-bs-toggle="tab" data-bs-target="#edit-salaryModal" type="button" role="tab" aria-selected="false" tabindex="-1">{{ __('Step 3.salary and allowances') }}</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="edit-annual-tab" data-bs-toggle="tab" data-bs-target="#edit-annualModal" type="button" role="tab" aria-selected="false" tabindex="-1">{{ __('Step 4.Annual leave entitlement') }}</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="edit-call-tab" data-bs-toggle="tab" data-bs-target="#edit-lastModal" type="button" role="tab" aria-selected="false" tabindex="-1">{{ __('Step 5.Finish') }}</button>
                        </li>
                    </ul>
                </div>

                <div class="tab-content" id="editTabContent">
                    <div class="tab-pane fade show active" id="edit-basic-info" role="tabpanel" aria-labelledby="edit-info-tab">
                        <div class="modal-body pb-0">
                            <h2>{{ __('Basic Information') }}</h2>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="edit_name" class="form-label">{{ __('Name') }} <span class="text-danger">*</span></label>
                                        <input type="text" name="name" id="edit_name" value="{{ $employee->name }}" class="form-control">
                                        <div id="name_error" class="invalid-feedback"></div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="edit_name_ar" class="form-label">{{ __('Name (Arabic)') }}</label>
                                        <input type="text" name="name_ar" id="edit_name_ar" value="{{ $employee->name_ar }}" class="form-control">
                                        <div id="name_ar_error" class="invalid-feedback"></div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="edit_email" class="form-label">{{ __('Email') }} <span class="text-danger">*</span></label>
                                        <input type="email" name="email" id="edit_email" value="{{ $employee->email }}" class="form-control">
                                        <div id="email_error" class="invalid-feedback"></div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="edit_phone" class="form-label">{{ __('Phone') }} <span class="text-danger">*</span></label>
                                        <input type="text" name="phone" id="edit_phone" value="{{ $employee->phone }}" class="form-control">
                                        <div id="phone_error" class="invalid-feedback"></div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="edit_dob" class="form-label">{{ __('Date of Birth') }} <span class="text-danger">*</span></label>
                                        <div class="input-icon-start position-relative">
                                            <input type="text" name="dob" id="edit_dob" value="{{ $employee->dob }}" class="form-control datetimepicker" placeholder="dd/mm/yyyy">
                                            <span class="input-icon-addon">
                                                <i class="ti ti-calendar text-gray-7"></i>
                                            </span>
                                            <div id="dob_error" class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="edit_designation" class="form-label">{{ __('Designation') }}</label>
                                        <select name="designation_id" id="edit_designation" class="select select2-hidden-accessible">
                                            <option value="">{{ __('Select Designation') }}</option>
                                            @foreach($designations as $designation)
                                                <option value="{{ $designation->id }}" {{ $employee->designation_id == $designation->id ? 'selected' : '' }}>{{ $designation->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Add more fields similarly -->
                            </div>
                        </div>
                    </div>

                    <!-- Repeat for other tabs -->
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-light border me-2" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('Save Changes') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

    </div>
</div>
@endsection
