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
                                <input type="text" value="{{ $employee->name }}" name="name" id="name" class="form-control">
                                <div id="name_error" class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="name_ar" class="form-label">{{ __('Name (Arabic)') }}</label>
                                <input type="text" value="{{ $employee->name_ar }}" name="name_ar" id="name_ar" class="form-control">
                                <div id="name_ar_error" class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="email" class="form-label">{{ __('Email') }} <span class="text-danger">*</span></label>
                                <input type="email" value="{{ $employee->email }}" name="email" id="email" class="form-control">
                                <div id="email_error" class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="phone" class="form-label">{{ __('Phone') }} <span class="text-danger">*</span></label>
                                <input type="text" v name="phone" id="phone" class="form-control">
                                <div id="phone_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Identity Details Tab -->
                    <div class="tab-pane fade" id="identity" role="tabpanel" aria-labelledby="identity-tab">
                        <h6>{{ __('Identity Details') }}</h6>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="residence_number" class="form-label">{{ __('ID qama details') }}</label>
                                <input type="text" name="residence_number" id="residence_number" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="place_of_issuance_of_ID_residence" class="form-label">{{ __('Place of Issuance') }}</label>
                                <input type="text" name="place_of_issuance_of_ID_residence" id="place_of_issuance_of_ID_residence" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="Join_date_gregorian" class="form-label">{{ __('Join Date (Gregorian)') }}</label>
                                <input type="text" name="Join_date_gregorian" id="Join_date_gregorian" class="form-control datetimepicker">
                            </div>
                        </div>
                    </div>

                    <!-- Add other tabs (Passport, Address, Emergency Contact) here -->
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
