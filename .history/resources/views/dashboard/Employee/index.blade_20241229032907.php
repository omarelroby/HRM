@extends('dashboard.layouts.master')

@section('content')
<div class="content">

    <!-- Breadcrumb -->
    <div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
        <div class="my-auto mb-2">
            <h2 class="mb-1">Employee</h2>
            <nav>
                <ol class="breadcrumb mb-0">
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
                                    <a href="{{ route('employee.edit',$employee->id) }}"
                                       class="me-2" >
                                        <i class="ti ti-edit"></i>
                                    </a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#delete_modal">
                                        <i class="ti ti-trash"></i>
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
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">{{ __('Add New Employee') }}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Form -->
            <form id="add_employee" method="post">
                @csrf
                <!-- Error Messages -->
                <div id="error-messages" class="alert alert-danger d-none">
                    <ul></ul>
                </div>

                <!-- Tab Navigation -->
                <div class="contact-grids-tab">
                    <ul class="nav nav-underline" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="info-tab" data-bs-toggle="tab" data-bs-target="#basic-info" type="button" role="tab" aria-selected="true">
                                {{ __('Step 1.Basic Information') }}
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="job-tab" data-bs-toggle="tab" data-bs-target="#jobModal" type="button" role="tab" aria-selected="false">
                                {{ __('Step 2.Job Information') }}
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="salary-tab" data-bs-toggle="tab" data-bs-target="#salaryModal" type="button" role="tab" aria-selected="false">
                                {{ __('Step 3.salary_and_allowances') }}
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

                <!-- Tab Content -->
                <div class="tab-content" id="myTabContent">
                    <!-- Basic Information Tab -->
                    <div class="tab-pane fade show active" id="basic-info" role="tabpanel" aria-labelledby="info-tab">
                        <div class="modal-body pb-0">
                            <div class="row">
                                <!-- Employee Name -->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">{{ __('Name') }} <span class="text-danger">*</span></label>
                                        <input type="text" name="name" id="name" class="form-control">
                                        <div id="name_error" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <!-- Employee Name (Arabic) -->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="name_ar" class="form-label">{{ __('Name (Arabic)') }}</label>
                                        <input type="text" name="name_ar" id="name_ar" class="form-control">
                                        <div id="name_ar_error" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <!-- Email -->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">{{ __('Email') }} <span class="text-danger">*</span></label>
                                        <input type="email" name="email" id="email" class="form-control">
                                        <div id="email_error" class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!-- Phone -->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">{{ __('Phone') }} <span class="text-danger">*</span></label>
                                        <input type="text" name="phone" id="phone" class="form-control">
                                        <div id="phone_error" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <!-- Password -->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="password" class="form-label">{{ __('Password') }} <span class="text-danger">*</span></label>
                                        <div class="pass-group">
                                            <input type="password" name="password" id="password" class="form-control">
                                            <span class="ti toggle-password ti-eye-off"></span>
                                            <div id="password_error" class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Confirm Password -->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }} <span class="text-danger">*</span></label>
                                        <div class="pass-group">
                                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                                            <span class="ti toggle-password ti-eye-off"></span>
                                            <div id="password_confirmation_error" class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!-- Date of Birth -->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="dob" class="form-label">{{ __('Date of Birth') }} <span class="text-danger">*</span></label>
                                        <div class="input-icon-start position-relative">
                                            <input type="text" name="dob" id="dob" class="form-control datetimepicker" placeholder="dd/mm/yyyy">
                                            <span class="input-icon-addon"><i class="ti ti-calendar"></i></span>
                                            <div id="dob_error" class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Department -->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="designati" class="form-label">{{ __('Departments') }}</label>
                                        <select name="department_id" id="designati" class="select">
                                            <option value="">{{ __('Select') }}</option>
                                            @foreach($departments as $department)
                                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <!-- Designation -->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        {{ Form::label('designation_id', __('Designation'), ['class' => 'form-label']) }}
                                        <select name="designation_id" class="select">
                                            <option value="">{{ __('Select Designation') }}</option>
                                            @foreach($designations as $designation)
                                                <option value="{{ $designation->id }}">{{ $designation->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Additional Tabs (Job, Salary, Addresses, Emergency Contact) -->
                    <!-- Include respective code for other tabs here -->
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-light border" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- End Employee Modal --}}

{{-- Success Modal --}}
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Success</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Body -->
            <div class="modal-body text-center">
                <!-- Success message will be dynamically injected here -->
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="closeAddEmployeeModal()">OK</button>
            </div>
        </div>
    </div>
</div>
{{-- End Success Modal --}}


{{-- Employee Success Modal --}}
<div class="modal fade" id="success_modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center p-3">
                    <span class="avatar avatar-lg avatar-rounded bg-success mb-3">
                        <i class="ti ti-check fs-24"></i>
                    </span>
                    <h5 class="mb-2">Employee Added Successfully</h5>
                    <p class="mb-3">
                        Stephan Peralt has been added with Client ID:
                        <span class="text-primary">#EMP - 0001</span>
                    </p>
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
{{-- End Employee Success Modal --}}

{{-- Delete Confirmation Modal --}}
<div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-body text-center">
                <span class="avatar avatar-xl bg-transparent-danger text-danger mb-3">
                    <i class="ti ti-trash-x fs-36"></i>
                </span>
                <h4 class="mb-1">Confirm Delete</h4>
                <p class="mb-3">
                    You want to delete all the marked items. This action cannot be undone.
                </p>
                <div class="d-flex justify-content-center">
                    <button class="btn btn-light me-3" data-bs-dismiss="modal">Cancel</button>
                    <a href="employees.html" class="btn btn-danger">Yes, Delete</a>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- End Delete Confirmation Modal --}}

@endsection
@section('script')

<!-- Styles and Libraries -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/persian-datepicker@1.2.0/dist/css/persian-datepicker.min.css">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/moment-hijri@2.17.0/moment-hijri.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/persian-datepicker@1.2.0/dist/js/persian-datepicker.min.js"></script>
<script src="{{ asset('assets/js/bootstrap-hijri-datetimepicker.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-hijri-datepicker.js') }}"></script>

<script>
    $(document).ready(function () {
        // Initialize Date Pickers
        initializeDatePickers();

        // Payment Type Toggle Logic
        handlePaymentTypeToggle();

        // Nationality Type Toggle Logic
        handleNationalityToggle();

        // Select All Checkbox Logic
        handleSelectAllCheckbox();

        // Add Employee Form Submission
        handleAddEmployeeForm();

        // Handle Designation Dropdown
        handleDesignationDropdown();
    });

    // Initialize Hijri and Gregorian Date Pickers
    function initializeDatePickers() {
        $('.datetimepicker').datetimepicker({
            format: 'DD/MM/YYYY',
            icons: {
                time: 'ti ti-time',
                date: 'ti ti-calendar',
                up: 'ti ti-chevron-up',
                down: 'ti ti-chevron-down',
            },
            widgetPositioning: { horizontal: 'auto', vertical: 'bottom' },
            widgetParent: 'body',
        });

        $('.hijri-date-input').hijriDatePicker({
            hijri: true,
            locale: 'ar-sa',
            format: 'iYYYY-iMM-iDD',
            showTodayButton: true,
            showClear: true,
            showClose: true,
            allowInputToggle: true,
        });
    }

    // Handle Payment Type Toggle
    function handlePaymentTypeToggle() {
        $(document).on('change', '#employee_account_type', function () {
            if ($(this).val() == '0') {
                $('#salary_card_number_info').removeClass('d-none').show();
                $('#IBAN_number_info').addClass('d-none').hide();
            } else {
                $('#salary_card_number_info').addClass('d-none').hide();
                $('#IBAN_number_info').removeClass('d-none').show();
            }
        });

        $('input[name="payment_type"]').on('change', function () {
            $('#bankDetails, #internationalTransferDetails').addClass('d-none');
            if (this.value === 'bank') {
                $('#bankDetails').removeClass('d-none');
            } else if (this.value === 'international_transfer') {
                $('#internationalTransferDetails').removeClass('d-none');
            }
        });
    }

    // Handle Nationality Type Toggle
    function handleNationalityToggle() {
        $(document).on('change', '#nationality_type', function () {
            $(this).val() == '1' ? $('#nationality').hide() : $('#nationality').show();
        });
    }

    // Handle "Select All" Checkbox Logic
    function handleSelectAllCheckbox() {
        const selectAllCheckbox = document.getElementById('select-all');
        const checkboxes = document.querySelectorAll('.datatable tbody .form-check-input');

        if (selectAllCheckbox) {
            selectAllCheckbox.addEventListener('change', function () {
                const isChecked = this.checked;
                checkboxes.forEach((checkbox) => (checkbox.checked = isChecked));
            });

            checkboxes.forEach((checkbox) => {
                checkbox.addEventListener('change', function () {
                    if (!this.checked) {
                        selectAllCheckbox.checked = false;
                    } else if (Array.from(checkboxes).every((cb) => cb.checked)) {
                        selectAllCheckbox.checked = true;
                    }
                });
            });
        }
    }

    // Handle Add Employee Form Submission
    function handleAddEmployeeForm() {
        $('#add_employee').on('submit', function (e) {
            e.preventDefault();

            const formData = new FormData(this);
            $.ajax({
                url: '{{ route("employee.store") }}',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response.status === 'success') {
                        $('#addEmployeeModal').modal('hide');
                        $('#add_employee')[0].reset();
                        $('.invalid-feedback').text('').hide();
                        $('#successModal .modal-body').text(response.message).modal('show');
                        if ($.fn.DataTable) {
                            $('#employeeTable').DataTable().ajax.reload();
                        }
                    }
                },
                error: function (xhr) {
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        $.each(errors, function (key, error) {
                            let inputField = $(`#add_employee [name="${key}"]`);
                            inputField.addClass('is-invalid');
                            inputField.siblings('.invalid-feedback').text(error[0]).show();
                        });
                    } else {
                        alert('An error occurred. Please try again.');
                    }
                },
            });
        });
    }

    // Handle Designation Dropdown (Optional Placeholder Functionality)
    function handleDesignationDropdown() {
        const departmentId = $('#department_id').val();
        // You can implement dynamic designation fetching based on departmentId here
    }

    // Function to Close Add Employee Modal and Reload Page
    function closeAddEmployeeModal() {
        $('#addEmployeeModal').modal('hide');
        location.reload();
    }
</script>

@endsection
