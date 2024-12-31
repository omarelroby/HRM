@extends('dashboard.layouts.master')

@section('content')
<div class="content">

    <!-- Breadcrumb -->
    <div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
        <div class="my-auto mb-2">
            <h2 class="mb-1">Employee Time Sheet</h2>
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
                <a href="#" data-bs-toggle="modal" data-bs-target="#addEmployeeModal" class="btn btn-primary d-flex align-items-center"><i class="ti ti-circle-plus me-2"></i>{{ __('Add Employee time sheet') }}</a>
            </div>

        </div>
    </div>
    <!-- /Breadcrumb -->



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
                   <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables">
                        <thead>
                            <tr>
                                @if (\Auth::user()->type != 'employee')
                                    <th>{{ __('Employee') }}</th>
                                @endif
                                <th>{{ __('Date') }}</th>
                                <th>{{ __('Hours') }}</th>
                                <th>{{ __('Description') }}</th>
                                <th width="10%">{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($timeSheets as $timeSheet)
                                <tr>
                                    @if (\Auth::user()->type != 'employee')
                                        <td>{{ !empty($timeSheet->employee) ? $timeSheet->employee->name : '' }}</td>
                                    @endif
                                    <td>{{ \Auth::user()->dateFormat($timeSheet->date) }}</td>
                                    <td>{{ $timeSheet->hours }}</td>
                                    <td>{{ $timeSheet->remark }}</td>
                                    <td class="text-right">
                                        @can('Edit TimeSheet')
                                            <a href="{{ route('timesheet.edit', $timeSheet->id) }}" data-url="{{ route('timesheet.edit', $timeSheet->id) }}" data-size="lg" data-ajax-popup="true" data-title="{{ __('Edit Timesheet') }}" class="btn btn-success btn-icon-only" data-toggle="tooltip" data-original-title="{{ __('Edit') }}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        @endcan
                                        @can('Delete TimeSheet')
                                        <!-- Delete Button -->
                                        <a href="#"
                                        class="btn btn-danger btn-icon-only"
                                        data-toggle="tooltip"
                                        data-original-title="{{ __('Delete') }}"
                                        onclick="if(confirm('{{ __('Are you sure? This action cannot be undone.') }}')) {
                                                        document.getElementById('delete-form-{{ $timeSheet->id }}').submit();
                                                    }">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>

                                        <!-- Form for Delete -->
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['timesheet.destroy', $timeSheet->id], 'id' => 'delete-form-' . $timeSheet->id, 'style' => 'display:none;']) !!}
                                        {!! Form::close() !!}
                                    @endcan




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
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Add Employee time sheet') }}</h5>
                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
            </div>

            {{ Form::open(array('route' => array('timesheet.store'))) }}
            <div class="modal-body">
                <div class="row">
                    <!-- Employee Selection (Visible only for non-employees) -->
                    @if(\Auth::user()->type != 'employee')
                    <div class="form-group col-md-4 mb-3">
                        {{ Form::label('employee_id', __('Employee'),['class'=>'form-control-label']) }}
                        {!! Form::select('employee_id', $employees, null, array('class' => 'form-control select2', 'required' => 'required')) !!}
                    </div>
                    @endif

                    <!-- Date Input -->
                    <div class="form-group col-md-4 mb-3">
                        {{ Form::label('date', __('Date'),['class'=>'form-control-label']) }}
                        {{ Form::text('date', '', array('class' => 'form-control datepicker', 'required' => 'required')) }}
                    </div>

                    <!-- Hours Input -->
                    <div class="form-group col-md-4 mb-3">
                        {{ Form::label('hours', __('Hours'),['class'=>'form-control-label']) }}
                        {{ Form::number('hours', '', array('class' => 'form-control', 'required' => 'required', 'step' => '0.01')) }}
                    </div>

                    <!-- Remarks Input -->
                    <div class="form-group col-md-6 mb-3">
                        {{ Form::label('remark', __('Remark'),['class'=>'form-control-label']) }}
                        {!! Form::textarea('remark', null, ['class'=>'form-control', 'rows'=>'2']) !!}
                    </div>

                    <!-- Arabic Remarks Input -->
                    <div class="form-group col-md-6 mb-3">
                        {{ Form::label('remark_ar', __('Remark_ar'),['class'=>'form-control-label']) }}
                        {!! Form::textarea('remark_ar', null, ['class'=>'form-control', 'rows'=>'2']) !!}
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="d-flex justify-content-end gap-2">
                    <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                </div>
            </div>
            {{ Form::close() }}

            <script>
                $(function () {
                    $(".datepicker").hijriDatePicker({
                        format: 'YYYY-M-D',
                        showSwitcher: false,
                        hijri: false,
                        useCurrent: true
                    });
                });
            </script>
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
{{-- Delete Confirmation Modal --}}
<div class="modal fade" id="delete_modal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-body text-center">
                <span class="avatar avatar-xl bg-transparent-danger text-danger mb-3">
                    <i class="ti ti-trash-x fs-36"></i>
                </span>
                <h4 class="mb-1">Confirm Delete</h4>
                <p class="mb-3">Are you sure you want to delete this item? This action cannot be undone.</p>

                <form id="delete_form" action="" method="POST">
                    @csrf
                    @method('DELETE')

                    <div class="d-flex justify-content-center">
                        <button type="button" class="btn btn-light me-3" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- End Delete Confirmation Modal --}}


@endsection

@section('script')
<script>

document.addEventListener('DOMContentLoaded', function () {
    const deleteModal = document.getElementById('delete_modal');
    const deleteForm = document.getElementById('delete_form');

    deleteModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget; // Button that triggered the modal
        const deleteUrl = button.getAttribute('data-url'); // Extract the URL from the data-url attribute
        deleteForm.action = deleteUrl; // Update the form action dynamically
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
                    // $('#addEmployeeModal').modal('hide');
                    closeAddEmployeeModal();
                    // Reset the form
                    // $('#add_employee')[0].reset();

                    // Remove validation error states
                    // $('#add_employee input, #add_employee select').removeClass('is-invalid');
                    // $('.invalid-feedback').text('').hide();

                    // // Show success message in a new modal
                    // $('#successModal .modal-body').text(response.message);
                    // $('#successModal').modal('show');

                    // Optionally, refresh the employee table or page content
                    // if ($.fn.DataTable) {
                    //     $('#employeeTable').DataTable().ajax.reload();
                    // }
                }
            },
            error: function(xhr) {
                // if (xhr.status === 422) {
                //     // Handle validation errors
                //     let errors = xhr.responseJSON.errors;
                //     $.each(errors, function(key, error) {
                //         let inputField = $(`#add_employee [name="${key}"]`);
                //         inputField.addClass('is-invalid'); // Highlight input field
                //         inputField.siblings('.invalid-feedback').text(error[0]).show(); // Show error message
                //     });
                // } else {
                //     alert('An error occurred. Please try again.');
                // }
            }
        });
    });
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

    $(document).ready(function() {
    $('[data-confirm]').on('click', function (e) {
        e.preventDefault();
        var message = $(this).data('confirm').split('|');
        var confirmMessage = message[0] + "\n\n" + message[1];

        // Show the confirmation dialog
        if (confirm(confirmMessage)) {
            var formId = $(this).data('confirm-yes');
            document.getElementById(formId).submit(); // Submit the form if confirmed
        }
    });
});



</script>

@endsection
