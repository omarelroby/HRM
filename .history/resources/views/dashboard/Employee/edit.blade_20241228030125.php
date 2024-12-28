@extends('dashboard.layouts.master')

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
                                <input type="text" name="name" id="name" class="form-control">
                                <div id="name_error" class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="name_ar" class="form-label">{{ __('Name (Arabic)') }}</label>
                                <input type="text" name="name_ar" id="name_ar" class="form-control">
                                <div id="name_ar_error" class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="email" class="form-label">{{ __('Email') }} <span class="text-danger">*</span></label>
                                <input type="email" name="email" id="email" class="form-control">
                                <div id="email_error" class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="phone" class="form-label">{{ __('Phone') }} <span class="text-danger">*</span></label>
                                <input type="text" name="phone" id="phone" class="form-control">
                                <div id="phone_error" class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="password" class="form-label">{{ __('Password') }} <span class="text-danger">*</span></label>
                                <div class="pass-group">
                                    <input type="password" name="password" id="password" class="form-control">
                                    <span class="ti toggle-password ti-eye-off"></span>
                                    <div id="password_error" class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }} <span class="text-danger">*</span></label>
                                <div class="pass-group">
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                                    <span class="ti toggle-password ti-eye-off"></span>
                                    <div id="password_confirmation_error" class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="dob" class="form-label">{{ __('Date of Birth') }} <span class="text-danger">*</span></label>
                                <div class="input-icon-start position-relative">
                                    <input type="text" name="dob" id="dob" class="form-control form-control-lg datetimepicker" placeholder="dd/mm/yyyy">
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
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>
                                <div id="department_id_error" class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="designation_id" class="form-label">{{ __('Designation') }}</label>
                                <select name="designation_id" id="designation_id" class="select select2-hidden-accessible">
                                    <option value="">{{ __('Select Designation') }}</option>
                                    @foreach($designations as $designation)
                                        <option value="{{ $designation->id }}">{{ $designation->name }}</option>
                                    @endforeach
                                </select>
                                <div id="designation_id_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>

                   
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                <a href="{{ route('employee.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
            </div>
        </form>
    </div>
</div>
@endsection
