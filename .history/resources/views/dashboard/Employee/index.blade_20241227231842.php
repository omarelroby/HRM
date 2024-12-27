@extends('dashboard.layouts.master')
@if(auth()->check())
    @include('dashboard.layouts.header')
@endif
@section('content')

<div class="content">

    <!-- Breadcrumb -->
    <div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
        <div class="my-auto mb-2">
            <h2 class="mb-1">Employee</h2>
            <nav>
                <ol class="breadcrumb mb-0">
                    <li  >
                        <a href="{{ route('home') }}"><i class="ti ti-smart-home"></i>Home</a>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">

            <div class="me-2 mb-2">
                <div class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle btn btn-white d-inline-flex align-items-center" data-bs-toggle="dropdown">
                        <i class="ti ti-file-export me-1"></i>Export
                    </a>
                    <ul class="dropdown-menu  dropdown-menu-end p-3">
                        <li>
                            <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-file-type-pdf me-1"></i>Export as PDF</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-file-type-xls me-1"></i>Export as Excel </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="mb-2">
                <a href="#" data-bs-toggle="modal" data-bs-target="#addEmployeeModal" class="btn btn-primary d-flex align-items-center"><i class="ti ti-circle-plus me-2"></i>Add Employee</a>
            </div>

        </div>
    </div>
    <!-- /Breadcrumb -->

    <div class="row">

        <!-- Total Plans -->
        <div class="col-lg-3 col-md-6 d-flex">
            <div class="card flex-fill">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center overflow-hidden">
                        <div>
                            <span class="avatar avatar-lg bg-dark rounded-circle"><i class="ti ti-users"></i></span>
                        </div>
                        <div class="ms-2 overflow-hidden">
                            <p class="fs-12 fw-medium mb-1 text-truncate">Total Employee</p>
                            <h4>{{ $employees->count() }}</h4>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- /Total Plans -->

        <!-- Total Plans -->
        <div class="col-lg-3 col-md-6 d-flex">
            <div class="card flex-fill">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center overflow-hidden">
                        <div>
                            <span class="avatar avatar-lg bg-success rounded-circle"><i class="ti ti-user-share"></i></span>
                        </div>
                        <div class="ms-2 overflow-hidden">
                            <p class="fs-12 fw-medium mb-1 text-truncate">Active</p>
                            <h4>{{ $employees->where('is_active',1)->count() }}</h4>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- /Total Plans -->

        <!-- Inactive Plans -->
        <div class="col-lg-3 col-md-6 d-flex">
            <div class="card flex-fill">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center overflow-hidden">
                        <div>
                            <span class="avatar avatar-lg bg-danger rounded-circle"><i class="ti ti-user-pause"></i></span>
                        </div>
                        <div class="ms-2 overflow-hidden">
                            <p class="fs-12 fw-medium mb-1 text-truncate">InActive</p>
                            <h4>{{ $employees->where('is_active','!=',1)->count() }}</h4>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- /Inactive Companies -->

        <!-- No of Plans  -->
        <div class="col-lg-3 col-md-6 d-flex">
            <div class="card flex-fill">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center overflow-hidden">
                        <div>
                            <span class="avatar avatar-lg bg-info rounded-circle"><i class="ti ti-user-plus"></i></span>
                        </div>
                        <div class="ms-2 overflow-hidden">
                            <p class="fs-12 fw-medium mb-1 text-truncate">New Joiners</p>
                            <h4>67</h4>
                        </div>
                    </div>
                    {{ $new_join }}
                </div>
            </div>
        </div>
        <!-- /No of Plans -->

    </div>

    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
            <h5>Employees List</h5>

        </div>
        <div class="row">
            <div class="col-12">
                   @if ($errors->any())
                     <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                   @endif
            </div>
        </div>
        <div class="card-body p-0">
            <div class="custom-datatable-filter table-responsive">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="dataTables_length" id="DataTables_Table_0_length">

                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div id="DataTables_Table_0_filter" class="dataTables_filter">

                 </div>
            </div>
                </div>
                <div class="row dt-row">
                    <div class="col-sm-12 table-responsive">
                            <table class="table datatable dataTable no-footer" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
                    <thead class="thead-light">
                        <tr>
                            <th class="no-sort sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="
                            : activate to sort column descending" style="width: 21px;">
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox" id="select-all">
                                </div>
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="ID" style="width: 55.5341px;">ID</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Name: " style="width: 136.818px;">Name</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Email: " style="width: 155.534px;">Email</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Job Title: " style="width: 95.2045px;">Job Title</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Designation:  " style="width: 126.648px;">Department</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Joining Date:  " style="width: 79.2273px;">Joining Date</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Status:  " style="width: 74.5568px;">Status</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label=":  " style="width: 60px;"></th></tr>
                    </thead>
                    <tbody>
                        @foreach($employees as $key=>$employee)
                        <tr class="odd">
                            <td class="sorting_1">
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td><a href="employee-details.html">{{ ++$key }}</a></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="ms-2">
                                        <p class="text-dark mb-0"><a href="employee-details.html" data-bs-toggle="modal" data-bs-target="#view_details">{{ $employee->name }}
                                            </a>
                                        </p>
                                        <span class="fs-12">{{ $employee->departments->name ??'' }}</span>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $employee->email ??''}}</td>
                            <td>{{ $employee->jobtitle->name ??'' }}</td>

                            <td>{{ $employee->departments->name ??''}}</td>
                            <td>{{ $employee->Join_date_gregorian ??'' }}</td>
                            <td>
                                @if($employee->is_active)
                                <span class="badge badge-success d-inline-flex align-items-center badge-xs">
                                    <i class="ti ti-point-filled me-1"></i>Active
                                </span>
                                @else
                                <span class="badge badge-danger d-inline-flex align-items-center badge-xs">
                                    <i class="ti ti-point-filled me-1"></i>In-Acitve
                                </span>
                                @endif
                            </td>
                            <td>
                                <div class="action-icon d-inline-flex">
                                    <a href="#" class="me-2" data-bs-toggle="modal" data-bs-target="#edit_employee"><i class="ti ti-edit">
                                        </i>
                                    </a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#delete_modal">
                                        <i class="ti ti-trash">
                                            </i>
                                        </a>
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
    </div>


</div>
{{-- Add Employee Modal --}}
<div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-labelledby="addEmployeeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="d-flex align-items-center">
                    <h4 class="modal-title me-2">Add New Employee</h4>
                 </div>
                <button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="add_employee" method="post">
                @csrf
                <div id="error-messages" class="alert alert-danger d-none">
                    <ul></ul>
                </div>

                <div class="contact-grids-tab">
                    <ul class="nav nav-underline" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="info-tab" data-bs-toggle="tab" data-bs-target="#basic-info" type="button" role="tab" aria-selected="true">معلومات أساسية</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="identity-tab" data-bs-toggle="tab" data-bs-target="#identity" type="button" role="tab" aria-selected="false" tabindex="-1">تفاصيل الهوية</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pssport-tab" data-bs-toggle="tab" data-bs-target="#passport" type="button" role="tab" aria-selected="false" tabindex="-1">تفاصيل جواز السفر</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="address-tab" data-bs-toggle="tab" data-bs-target="#address" type="button" role="tab" aria-selected="false" tabindex="-1">العناوين</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="call-tab" data-bs-toggle="tab" data-bs-target="#call" type="button" role="tab" aria-selected="false" tabindex="-1">جهة الاتصال للطوارئ</button>
                        </li>
                    </ul>
                </div>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="basic-info" role="tabpanel" aria-labelledby="info-tab">
                        <div class="modal-body pb-0">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" id="name" class="form-control">
                                        <div id="name_error" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="name_ar" class="form-label">Name (Arabic)</label>
                                        <input type="text" name="name_ar" id="name_ar" class="form-control">
                                        <div id="name_ar_error" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                        <input type="email" name="email" id="email" class="form-control">
                                        <div id="email_error" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
                                        <input type="text" name="phone" id="phone" class="form-control">
                                        <div id="phone_error" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                        <div class="pass-group">
                                            <input type="password" name="password" id="password" class="form-control">
                                            <span class="ti toggle-password ti-eye-off"></span>
                                            <div id="password_error" class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="password_confirmation" class="form-label">Confirm Password <span class="text-danger">*</span></label>
                                        <div class="pass-group">
                                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                                            <span class="ti toggle-password ti-eye-off"></span>
                                            <div id="password_confirmation_error" class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="dob" class="form-label">Date of Birth <span class="text-danger">*</span></label>
                                        <div class="input-icon-start position-relative">
                                            <input type="text" name="dob" id="dob" class="form-control datetimepicker" placeholder="dd/mm/yyyy">
                                            <span class="input-icon-addon">
                                                <i class="ti ti-calendar text-gray-7"></i>
                                            </span>
                                            <div id="dob_error" class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="designati" class="form-label">Deparments</label>
                                        <select name="department_id" required id="designati" class="select select2-hidden-accessible">
                                            <option value="">Select</option>
                                            @foreach($departments as $department)
                                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                                            @endforeach
                                        </select>
                                        <div id="" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    {{ Form::label('designation_id', __('Designation'), ['class' => 'form-label']) }}
                                    <select name="designation_id" class="select select2-hidden-accessible">
                                        <option value="">{{ __('Select Designation') }}</option>
                                        @foreach($designations as $designation)
                                            <option value="{{ $designation->id }}">{{ $designation->name }}</option>
                                        @endforeach
                                    </select>
                                </div>



                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="nationality_type" class="form-label">{{ __('nationality_type') }}</label>
                                        <select name="nationality_type" id="nationality_type" class="form-select required" aria-label="{{ __('Select Nationality Type') }}">
                                            <option value="0">{{ __('non_saudi') }}</option>
                                            <option value="1">{{ __('saudi') }}</option>
                                        </select>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>


                                <div class="col-md-3">
                                    <div class="mb-3" id="nationality">
                                        <label for="nationality_id" class="form-label">{{ __('nationality') }}</label>
                                        <select name="nationality_id" class="form-select required" aria-label="{{ __('Select Nationality') }}">
                                            <option value="">{{ __('Select Nationality') }}</option>
                                            @foreach($nationalities as $nationality)
                                                <option value="{{ $nationality->id }}">{{ $nationality->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="gender" class="form-label">{{ __('Gender') }}</label>
                                        <select name="gender" required id="gender" class="select select2-hidden-accessible">
                                            <option value="">Select</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="religion" class="form-label">Religion</label>
                                        <select name="religion" required id="religion" class="select select2-hidden-accessible">
                                            <option value="">Select</option>
                                            <option value="1">muslim</option>
                                            <option value="0">non-muslim</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="religion" class="form-label">{{ __('out_of_saudia') }}</label>
                                        <select name="out_of_saudia" required id="out_of_saudia" class="select select2-hidden-accessible">
                                            <option value="">Select</option>
                                            <option value="1">yes</option>
                                            <option value="0">no</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="employer_phone" class="form-label">{{ __('employer_phone') }} <span class="text-danger">*</span></label>
                                        <div class="pass-group">
                                            <input type="text" name="employer_phone" id="employer_phone" class="form-control">
                                            <span class="ti toggle-password  "></span>
                                            <div id="employer_phone" class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3" id="nationality">
                                        <label for="jobtitle_id" class="form-label">{{ __('jobtitle') }}</label>
                                        <select name="jobtitle_id" class="form-select required" aria-label="{{ __('Select Nationality') }}">
                                            <option value="">{{ __('Select Job Titles') }}</option>
                                            @foreach($jobtitles as $job)
                                                <option value="{{ $job->id }}">{{ app()->getLocale()=='en'?$job->name:$job->name_ar }}</option>
                                            @endforeach
                                        </select>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <h6 class="col-md-12">تفاصيل الهوية / الأقامة</h6>
                                    <div class="form-group col-md-3">
                                        <label for="hijri_date" class="form-label">تاريخ هجري</label>
                                        <input type="text" class="form-control   hijri-date-input" id="hijri_date" name="hijri_date">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 text-center">
                                        <label class="form-label">Do you want to register in the list of users?</label>
                                        <div class="form-check form-check-md form-switch d-flex justify-content-center">
                                            <input class="form-check-input" name="user_register" type="checkbox" id="user_register" value="1">
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-light border me-2" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
                        <div class="modal-body">
                            <div class="card bg-light-500 shadow-none">
                                <div class="card-body">
                                    <h6>العناوين</h6>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-light border me-2" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="identity" role="tabpanel" aria-labelledby="identity-tab">
                        <div class="modal-body">
                            <div class="card bg-light-500 shadow-none">
                                <div class="card-body">
                                    <h6>معلومات الهوية</h6>
                                </div>
                            </div>
                            <div class="row">
                                <h6 class="col-md-12">تفاصيل الهوية / الأقامة</h6>

                                <div class="form-group col-md-3">
                                    <label for="hijri_date" class="form-label">تاريخ هجري</label>
                                    <input type="text" class="form-control hijri-date-input" name="hijri_date" id="hijri_date">
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="gregorian_date" class="form-label">تاريخ ميلادي</label>
                                    <input type="text" class="form-control gregorian-date" name="gregorian_date" id="gregorian_date">
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-light border me-2" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Success Modal --}}
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Success</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Success message will be injected here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="closeAddEmployeeModal()">OK</button>
            </div>
        </div>
    </div>
</div>
{{-- end Success Modal --}}
<div class="modal fade" id="edit_employee">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="d-flex align-items-center">
                    <h4 class="modal-title me-2">Edit Employee</h4><span>Employee  ID : EMP -0024</span>
                </div>
                <button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ti ti-x"></i>
                </button>
            </div>
            <form action="employees.html">
                <div class="contact-grids-tab">
                    <ul class="nav nav-underline" id="myTab2" role="tablist">
                        <li class="nav-item" role="presentation">
                          <button class="nav-link active" id="info-tab2" data-bs-toggle="tab" data-bs-target="#basic-info2" type="button" role="tab" aria-selected="true">Basic Information</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="address-tab2" data-bs-toggle="tab" data-bs-target="#address2" type="button" role="tab" aria-selected="false" tabindex="-1">تفاصيل الهوية</button>
                        </li>
                    </ul>
                </div>
                <div class="tab-content" id="myTabContent2">
                    <div class="tab-pane fade show active" id="basic-info2" role="tabpanel" aria-labelledby="info-tab2" tabindex="0">
                            <div class="modal-body pb-0 ">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="d-flex align-items-center flex-wrap row-gap-3 bg-light w-100 rounded p-3 mb-4">
                                            <div class="d-flex align-items-center justify-content-center avatar avatar-xxl rounded-circle border border-dashed me-2 flex-shrink-0 text-dark frames">
                                                <img src="assets/img/users/user-13.jpg" alt="img" class="rounded-circle">
                                            </div>
                                            <div class="profile-upload">
                                                <div class="mb-2">
                                                    <h6 class="mb-1">Upload Profile Image</h6>
                                                    <p class="fs-12">Image should be below 4 mb</p>
                                                </div>
                                                <div class="profile-uploader d-flex align-items-center">
                                                    <div class="drag-upload-btn btn btn-sm btn-primary me-2">
                                                        Upload
                                                        <input type="file" class="form-control image-sign" multiple="">
                                                    </div>
                                                    <a href="javascript:void(0);" class="btn btn-light btn-sm">Cancel</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">First Name <span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control" value="Anthony">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Last Name</label>
                                            <input type="email" class="form-control" value="Lewis">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Employee ID <span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control" value="Emp-001">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Joining Date <span class="text-danger"> *</span></label>
                                            <div class="input-icon-end position-relative">
                                                <input type="text" class="form-control datetimepicker" placeholder="dd/mm/yyyy" value="17-10-2022">
                                                <span class="input-icon-addon">
                                                    <i class="ti ti-calendar text-gray-7"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Username <span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control" value="Anthony">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Email <span class="text-danger"> *</span></label>
                                            <input type="email" class="form-control" value="anthony@example.com	">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3 ">
                                            <label class="form-label">Password <span class="text-danger"> *</span></label>
                                            <div class="pass-group">
                                                <input type="password" class="pass-input form-control">
                                                <span class="ti toggle-password ti-eye-off"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3 ">
                                            <label class="form-label">Confirm Password <span class="text-danger"> *</span></label>
                                            <div class="pass-group">
                                                <input type="password" class="pass-inputs form-control">
                                                <span class="ti toggle-passwords ti-eye-off"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Phone Number <span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control" value="(123) 4567 890">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Company<span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control" value="Abac Company">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Department</label>
                                            <select class="select select2-hidden-accessible" data-select2-id="select2-data-7-ncp1" tabindex="-1" aria-hidden="true">
                                                <option>Select</option>
                                                <option>All Department</option>
                                                <option selected="" data-select2-id="select2-data-9-4hln">Finance</option>
                                                <option>Developer</option>
                                                <option>Executive</option>
                                            </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="select2-data-8-xnn6" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-wyl2-container" aria-controls="select2-wyl2-container"><span class="select2-selection__rendered" id="select2-wyl2-container" role="textbox" aria-readonly="true" title="Finance">Finance</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Designation</label>
                                            <select class="select select2-hidden-accessible" data-select2-id="select2-data-10-rgme" tabindex="-1" aria-hidden="true">
                                                <option>Select</option>
                                                <option selected="" data-select2-id="select2-data-12-gdo3">Finance</option>
                                                <option>Developer</option>
                                                <option>Executive</option>
                                            </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="select2-data-11-pr1v" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-ip24-container" aria-controls="select2-ip24-container"><span class="select2-selection__rendered" id="select2-ip24-container" role="textbox" aria-readonly="true" title="Finance">Finance</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">About <span class="text-danger"> *</span></label>
                                            <textarea class="form-control" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-light border me-2" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Save </button>
                            </div>
                    </div>
                    <div class="tab-pane fade" id="address2" role="tabpanel" aria-labelledby="address-tab2" tabindex="0">
                        <div class="modal-body">
                            <div class="card bg-light-500 shadow-none">
                                <div class="card-body d-flex align-items-center justify-content-between flex-wrap row-gap-3">
                                    <h6>Enable Options</h6>
                                    <div class="d-flex align-items-center justify-content-end">
                                        <div class="form-check form-switch me-2">
                                            <label class="form-check-label mt-0">
                                            <input class="form-check-input me-2" type="checkbox" role="switch">
                                                Enable all Module
                                            </label>
                                        </div>
                                        <div class="form-check d-flex align-items-center">
                                            <label class="form-check-label mt-0">
                                                <input class="form-check-input" type="checkbox" checked="">
                                                Select All
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive border rounded">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-check form-switch me-2">
                                                    <label class="form-check-label mt-0">
                                                    <input class="form-check-input me-2" type="checkbox" role="switch" checked="">
                                                        Holidays
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox" checked="">
                                                        Read
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Write
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Create
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox" checked="">
                                                        Delete
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Import
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Export
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check form-switch me-2">
                                                    <label class="form-check-label mt-0">
                                                    <input class="form-check-input me-2" type="checkbox" role="switch">
                                                    Leaves
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Read
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Write
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Create
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Delete
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Import
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Export
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check form-switch me-2">
                                                    <label class="form-check-label mt-0">
                                                    <input class="form-check-input me-2" type="checkbox" role="switch">
                                                    Clients
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Read
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Write
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Create
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Delete
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Import
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Export
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check form-switch me-2">
                                                    <label class="form-check-label mt-0">
                                                    <input class="form-check-input me-2" type="checkbox" role="switch">
                                                    Projects
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Read
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Write
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Create
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Delete
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Import
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Export
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check form-switch me-2">
                                                    <label class="form-check-label mt-0">
                                                    <input class="form-check-input me-2" type="checkbox" role="switch">
                                                    Tasks
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Read
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Write
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Create
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Delete
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Import
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Export
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check form-switch me-2">
                                                    <label class="form-check-label mt-0">
                                                    <input class="form-check-input me-2" type="checkbox" role="switch">
                                                    Chats
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Read
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Write
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Create
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Delete
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Import
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Export
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check form-switch me-2">
                                                    <label class="form-check-label mt-0">
                                                    <input class="form-check-input me-2" type="checkbox" role="switch" checked="">
                                                    Assets
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Read
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Write
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox" checked="">
                                                        Create
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Delete
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox" checked="">
                                                        Import
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Export
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check form-switch me-2">
                                                    <label class="form-check-label mt-0">
                                                    <input class="form-check-input me-2" type="checkbox" role="switch">
                                                    Timing Sheets
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Read
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Write
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Create
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Delete
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Import
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Export
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-light border me-2" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#success_modal">Save </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- end edit Modal --}}
{{-- add Employee Success  --}}
<div class="modal fade" id="success_modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center p-3">
                    <span class="avatar avatar-lg avatar-rounded bg-success mb-3"><i class="ti ti-check fs-24"></i></span>
                    <h5 class="mb-2">Employee Added Successfully</h5>
                    <p class="mb-3">Stephan Peralt has been added with Client ID : <span class="text-primary">#EMP - 0001</span>
                    </p>
                    <div>
                        <div class="row g-2">
                            <div class="col-6">
                                <a href="employees.html" class="btn btn-dark w-100">Back to List</a>
                            </div>
                            <div class="col-6">
                                <a href="employee-details.html" class="btn btn-primary w-100">Detail Page</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end Employee Success  --}}
{{-- delete modal --}}
<div class="modal fade" id="delete_modal">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-body text-center">
                <span class="avatar avatar-xl bg-transparent-danger text-danger mb-3">
                    <i class="ti ti-trash-x fs-36"></i>
                </span>
                <h4 class="mb-1">Confirm Delete</h4>
                <p class="mb-3">You want to delete all the marked items, this cant be undone once you delete.</p>
                <div class="d-flex justify-content-center">
                    <a href="javascript:void(0);" class="btn btn-light me-3" data-bs-dismiss="modal">Cancel</a>
                    <a href="employees.html" class="btn btn-danger">Yes, Delete</a>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end delete modal --}}
@endsection
@section('script')


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
   <script src="{{ asset('public/assets/plugins/bootstrap-tagsinput/bootstrap-hijri-datetimepicker.js') }}"></script>
   <script src="{{ asset('public/assets/plugins/bootstrap-tagsinput/bootstrap-hijri-datepicker.js') }}"></script>
   <script>
      $(".hijri-date-input").hijriDatePicker({

// timezone
timeZone: 'Etc/UTC',

// Date format. See moment.js docs for valid formats.
format: 'DD-MM-YYYY',
hijriFormat: 'iYYYY-iMM-iDD',
hijriDayViewHeaderFormat: 'iMMMM iYYYY',

// Changes the heading of the datepicker when in "days" view.
dayViewHeaderFormat: 'MMMM YYYY',

// Allows for several input formats to be valid.
extraFormats: false,

// Number of minutes the up/down arrow's will move the minutes value in the time picker
stepping: 1,

// Prevents date/time selections before this date
minDate: '1950-01-01',

// Prevents date/time selections after this date
maxDate: '2070-01-01',

// On show, will set the picker to the current date/time
useCurrent: true,

// Using a Bootstraps collapse to switch between date/time pickers.
collapse: true,

// See moment.js for valid locales.
locale: 'ar-SA',

// Sets the picker default date/time.
defaultDate: false,

// Disables selection of dates in the array, e.g. holidays
disabledDates: false,

// Disables selection of dates NOT in the array, e.g. holidays
enabledDates: false,

// Change the default icons for the pickers functions.
icons: {
  time: 'fa fa-clock text-primary',
  date: 'glyphicon glyphicon-calendar',
  up: 'fa fa-chevron-up text-primary',
  down: 'fa fa-chevron-down text-primary',
  previous: '<<',
  next: '>>',
  today: 'اليوم',
  clear: 'مسح',
  close: 'اغلاق'
},

// custom tooltip text
tooltips: {
  today: 'Go to today',
  clear: 'Clear selection',
  close: 'Close the picker',
  selectMonth: 'Select Month',
  prevMonth: 'Previous Month',
  nextMonth: 'Next Month',
  selectYear: 'Select Year',
  prevYear: 'Previous Year',
  nextYear: 'Next Year',
  selectDecade: 'Select Decade',
  prevDecade: 'Previous Decade',
  nextDecade: 'Next Decade',
  prevCentury: 'Previous Century',
  nextCentury: 'Next Century',
  pickHour: 'Pick Hour',
  incrementHour: 'Increment Hour',
  decrementHour: 'Decrement Hour',
  pickMinute: 'Pick Minute',
  incrementMinute: 'Increment Minute',
  decrementMinute: 'Decrement Minute',
  pickSecond: 'Pick Second',
  incrementSecond: 'Increment Second',
  decrementSecond: 'Decrement Second',
  togglePeriod: 'Toggle Period',
  selectTime: 'Select Time'
},

// Defines if moment should use scrict date parsing when considering a date to be valid
useStrict: false,

// Shows the picker side by side when using the time and date together
sideBySide: false,

// Disables the section of days of the week, e.g. weekends.
daysOfWeekDisabled: [],

// Shows the week of the year to the left of first day of the week
calendarWeeks: false,

// The default view to display when the picker is shown
// Accepts: 'years','months','days'
viewMode: 'days',

// Changes the placement of the icon toolbar
toolbarPlacement: 'default',

// Show the "Today" button in the icon toolbar
showTodayButton: false,

// Show the "Clear" button in the icon toolbar
showClear: false,

// Show the "Close" button in the icon toolbar
showClose: false,

// On picker show, places the widget at the identifier (string) or jQuery object if the element has css position: 'relative'
widgetPositioning: {
  horizontal: 'auto',
  vertical: 'auto'
},

// On picker show, places the widget at the identifier (string) or jQuery object **if** the element has css `position: 'relative'`
widgetParent: null,

// Allow date picker show event to fire even when the associated input element has the `readonly="readonly"`property.
ignoreReadonly: false,

// Will cause the date picker to stay open after selecting a date if no time components are being used
keepOpen: false,

// If `false`, the textbox will not be given focus when the picker is shown.
focusOnShow: true,

// Will display the picker inline without the need of a input field. This will also hide borders and shadows.
inline: false,

// Will cause the date picker to **not** revert or overwrite invalid dates.
keepInvalid: false,

// CSS selector
datepickerInput: '.datepickerinput',

// shows switcher
showSwitcher: true,

// Debug mode
debug: false,

// If `true`, the picker will show on textbox focus and icon click when used in a button group.
allowInputToggle: false,

// Must be in 24 hour format. Will allow or disallow hour selections (much like `disabledTimeIntervals`) but will affect all days.
disabledTimeIntervals: false,

// Disable/enable hours
disabledHours: false,
enabledHours: false,

// This will change the `viewDate` without changing or setting the selected date.
viewDate: false,

// Use hijri date
hijri: false,

// Enable/disable RTL mode
isRTL: false

});
    </script>

    <script>



// Select All Checkbox Functionality
document.addEventListener('DOMContentLoaded', function () {
    const selectAllCheckbox = document.getElementById('select-all');
    const checkboxes = document.querySelectorAll('.datatable tbody .form-check-input');

    // Add event listener to the Select All checkbox
    selectAllCheckbox.addEventListener('change', function () {
        const isChecked = this.checked;
        checkboxes.forEach(checkbox => {
            checkbox.checked = isChecked;
        });
    });

    // Add event listeners to individual checkboxes
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
    $('#add_employee').on('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(this);

        $.ajax({
            url: '{{ route("employee.store") }}', // Replace with your store route
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.status === 'success') {
                    // Close the Add Employee Modal
                    $('#add_employee').modal('hide');

                    // Reset the form
                    $('#add_employee')[0].reset();

                    // Remove validation error states
                    $('#add_employee input, #add_employee select').removeClass('is-invalid');
                    $('.invalid-feedback').text('').hide();

                    // Show success message in a new modal
                    $('#successModal .modal-body').text(response.message);
                    $('#successModal').modal('show');

                    // Optionally, refresh the employee table or page content
                    if ($.fn.DataTable) {
                        $('#employeeTable').DataTable().ajax.reload();
                    }
                }
            },
            error: function(xhr) {
                if (xhr.status === 422) {
                    // Handle validation errors
                    let errors = xhr.responseJSON.errors;
                    $.each(errors, function(key, error) {
                        let inputField = $(`#add_employee [name="${key}"]`);
                        inputField.addClass('is-invalid'); // Highlight input field
                        inputField.siblings('.invalid-feedback').text(error[0]).show(); // Show error message
                    });
                } else {
                    alert('An error occurred. Please try again.');
                }
            }
        });
    });
</script>
<script>
    // Function to close the Add Employee Modal
    function closeAddEmployeeModal() {
        $('#addEmployeeModal').modal('hide');
        location.reload();

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
