@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Manage Employee Request') }}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-none card-box">
                <div class="card-header">
                    <h4 class="card-title">{{ __('Edit Employee Request') }}</h4>
                </div>
                @if(auth()->user()->type=='company' || auth()->user()->type=='super admin')
                <div class="card-body">
                    {{ Form::model($employee_request, ['route' => ['employee_requests.update', $employee_request->id], 'method' => 'PUT', 'class' => 'form-horizontal']) }}

                    @if($employeeId)
                        {{ Form::hidden('employee_id', $employeeId, ['class' => 'form-control']) }}
                    @endif


                        @php
                            // Get the employee's department, sub-department, and section
                            $employee = \Auth::user()->getEmployee($employee_request->employee_id);
                            $employeeDepartment = $employee->department_id ?? null;
                            $employeeSubDepartment = $employee->sub_dep_id ?? null;
                            $employeeSection = $employee->section_id ?? null;

                            // Get the authenticated user's department, sub-department, and section
                            $authUserDepartment = \Auth::user()->employee->department_id ?? null;
                            $authUserSubDepartment = \Auth::user()->employee->sub_dep_id ?? null;
                            $authUserSection = \Auth::user()->employee->section_id ?? null;
                        @endphp
                        @if($authUserSubDepartment==0)
                        <div class="col-md-6" id="status1">
                            {{ Form::label('status', __('Status'), ['class' => 'form-control-label required']) }}
                            {{ Form::select('status', [0 => 'Pending', 1 => 'Approved', 2 => 'Reject' ], null, ['class' => 'form-control select2 status', 'placeholder' => __('Select Status'), 'required' => 'required']) }}
                        </div>
                        @elseif($authUserSection==0)
                            <div class="col-md-6" id="status2">
                                {{ Form::label('status', __('Status'), ['class' => 'form-control-label required']) }}
                                {{ Form::select('status', [0 => 'Pending', 3 => 'Approved', 4 => 'Reject' ], null, ['class' => 'form-control select2 status', 'placeholder' => __('Select Status'), 'required' => 'required']) }}
                            </div>
                        @else
                            <div class="col-md-6" id="status3">
                                {{ Form::label('status', __('Status'), ['class' => 'form-control-label required']) }}
                                {{ Form::select('status', [0 => 'Pending', 5 => 'Approved', 6 => 'Reject'], null, ['class' => 'form-control select2 status', 'placeholder' => __('Select Status'), 'required' => 'required']) }}
                            </div>
                        @endif

                        <div class="col-md-6" id="reject_reason_field" style="display: none;">
                            {{ Form::label('reject_reason', __('Reject Reason'), ['class' => 'form-control-label required']) }}
                            {{ Form::textarea('reject_reason', null, ['class' => 'form-control', 'placeholder' => __('Enter Reject Reason'), 'rows' => 3]) }}
                        </div>


                    <div class="form-group row mb-0 my-2">
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> {{ __('Update') }}
                            </button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                <i class="fas fa-times"></i> {{ __('Cancel') }}
                            </button>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
                @else
                    <div class="card-body">
                        {{ Form::model($employee_request, ['route' => ['employee_requests.update', $employee_request->id], 'method' => 'PUT', 'class' => 'form-horizontal']) }}

                        @if($employeeId)
                            {{ Form::hidden('employee_id', $employeeId, ['class' => 'form-control']) }}
                        @endif

                        @if(auth()->user()->employee->id == $employee_request->employee_id)
                            @if(\Auth::user()->type != 'employee' && !$employeeId)
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        {{ Form::label('employee_id', __('Employee'), ['class' => 'form-control-label required']) }}
                                        {{ Form::select('employee_id', $employees, null, ['class' => 'form-control select2', 'placeholder' => __('Select Employee'), 'required' => 'required']) }}
                                    </div>
                                </div>
                            @endif

                            <div class="form-group row">
                                    <div class="col-md-12">
                                        {{ Form::label('request_type_id', __('Request Type'), ['class' => 'form-control-label required']) }}
                                        {{ Form::select('request_type_id', $leavetypes, null, ['class' => 'form-control select2', 'placeholder' => __('Select Leave Type'), 'required' => 'required']) }}
                                    </div>
                                    <!-- Sub Request Type Dropdown (Initially Hidden) -->
                                    <div   id="sub_request_type_row" style="display: none;">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                {{ Form::label('sub_request_type_id', __('Sub Request Type')) }}
                                                <select name="sub_request_type_id" id="sub_request_type_id" class="form-control select2">
                                                    <option value="">{{ __('Select Sub Request Type') }}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                <div class="col-md-6">
                                    {{ Form::label('start_date', __('Start Date'), ['class' => 'form-control-label required']) }}
                                    {{ Form::date('start_date', null, ['class' => 'form-control datepicker', 'required' => 'required']) }}
                                </div>



                                <div class="col-md-6">
                                    {{ Form::label('end_date', __('End Date'), ['class' => 'form-control-label required']) }}
                                    {{ Form::date('end_date', null, ['class' => 'form-control datepicker', 'required' => 'required']) }}
                                </div>



                                <div class="col-md-6">
                                    {{ Form::label('request_reason', __('Request Reason'), ['class' => 'form-control-label required']) }}
                                    {{ Form::textarea('request_reason', null, ['class' => 'form-control', 'placeholder' => __('Enter Request Reason'), 'rows' => 3, 'required' => 'required']) }}
                                </div>


                                <div class="col-md-6">
                                    {{ Form::label('request_reason_ar', __('Request Reason AR'), ['class' => 'form-control-label required']) }}
                                    {{ Form::textarea('request_reason_ar', null, ['class' => 'form-control', 'placeholder' => __('Enter Request Reason'), 'rows' => 3, 'required' => 'required']) }}
                                </div>
                            </div>

                        @else
                            @php
                                // Get the employee's department, sub-department, and section
                                $employee = \Auth::user()->getEmployee($employee_request->employee_id);
                                $employeeDepartment = $employee->department_id ?? null;
                                $employeeSubDepartment = $employee->sub_dep_id ?? null;
                                $employeeSection = $employee->section_id ?? null;

                                // Get the authenticated user's department, sub-department, and section
                                $authUserDepartment = \Auth::user()->employee->department_id ?? null;
                                $authUserSubDepartment = \Auth::user()->employee->sub_dep_id ?? null;
                                $authUserSection = \Auth::user()->employee->section_id ?? null;
                            @endphp
                            @if($authUserSubDepartment==0)
                                <div class="col-md-6" id="status1">
                                    {{ Form::label('status', __('Status'), ['class' => 'form-control-label required']) }}
                                    {{ Form::select('status', [0 => 'Pending', 1 => 'Approved', 2 => 'Reject' ], null, ['class' => 'form-control select2 status', 'placeholder' => __('Select Status'), 'required' => 'required']) }}
                                </div>
                            @elseif($authUserSection==0)
                                <div class="col-md-6" id="status2">
                                    {{ Form::label('status', __('Status'), ['class' => 'form-control-label required']) }}
                                    {{ Form::select('status', [0 => 'Pending', 3 => 'Approved', 4 => 'Reject' ], null, ['class' => 'form-control select2 status', 'placeholder' => __('Select Status'), 'required' => 'required']) }}
                                </div>
                            @else
                                <div class="col-md-6" id="status3">
                                    {{ Form::label('status', __('Status'), ['class' => 'form-control-label required']) }}
                                    {{ Form::select('status', [0 => 'Pending', 5 => 'Approved', 6 => 'Reject'], null, ['class' => 'form-control select2 status', 'placeholder' => __('Select Status'), 'required' => 'required']) }}
                                </div>
                            @endif

                            <div class="col-md-6" id="reject_reason_field" style="display: none;">
                                {{ Form::label('reject_reason', __('Reject Reason'), ['class' => 'form-control-label required']) }}
                                {{ Form::textarea('reject_reason', null, ['class' => 'form-control', 'placeholder' => __('Enter Reject Reason'), 'rows' => 3]) }}
                            </div>

                        @endif

                        <div class="form-group row mb-0 my-2">
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> {{ __('Update') }}
                                </button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                    <i class="fas fa-times"></i> {{ __('Cancel') }}
                                </button>
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        var initialSubRequestTypeId = {{ $employee_request->sub_request_type_id ?? 'null' }};
    </script>
    <script>
        $(document).ready(function () {
            // Function to handle status change
            function handleStatusChange() {
                const selectedStatus = $(this).val();
                const rejectStatuses = [2, 4, 6]; // Statuses that require reject_reason
                const approveStatuses = [1, 3, 5]; // Statuses that do not require reject_reason

                if (rejectStatuses.includes(parseInt(selectedStatus))) {
                    $('#reject_reason_field').show();
                    $('#reject_reason').attr('required', true); // Make reject_reason required
                } else if (approveStatuses.includes(parseInt(selectedStatus))) {
                    $('#reject_reason_field').hide();
                    $('#reject_reason').attr('required', false); // Remove required attribute
                } else {
                    $('#reject_reason_field').hide();
                    $('#reject_reason').attr('required', false); // Default behavior for other statuses
                }
            }

            // Attach change event to all status dropdowns
            $('.status').change(handleStatusChange);

            // Trigger change event on page load if status is already set to a reject status
            $('.status').each(function () {
                const initialStatus = $(this).val();
                if ([2, 4, 6].includes(parseInt(initialStatus))) {
                    $('#reject_reason_field').show();
                    $('#reject_reason').attr('required', true);
                }
            });

            // Delete confirmation function
            function deleteConfirmation(id) {
                if (confirm("{{ __('Are you sure? This action cannot be undone.') }}")) {
                    document.getElementById('delete-form-' + id).submit();
                }
            }

            // Initialize date picker
            $(".gregorian-date, .datepicker").hijriDatePicker({
                format: 'YYYY-M-D',
                showSwitcher: false,
                hijri: false,
                useCurrent: true,
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            // Initialize Select2 for dropdowns
            $('.select2').select2({
                placeholder: "{{ __('Select an option') }}",
                allowClear: true
            });

            // Function to handle request type change
            function handleRequestTypeChange() {
                const requestTypeId = $(this).val();

                if (requestTypeId) {
                    // Fetch sub_request_types via AJAX
                    $.ajax({
                        url: "{{ route('get.sub_request_types') }}",
                        type: "GET",
                        data: { request_type_id: requestTypeId },
                        success: function (response) {
                            const subRequestSelect = $('#sub_request_type_id');
                            subRequestSelect.empty().append('<option value="">{{ __("Select Sub Request Type") }}</option>');

                            if (response.length > 0) {
                                $.each(response, function (key, value) {
                                    subRequestSelect.append($('<option>', {
                                        value: value.id,
                                        text: value['name{{ $lang }}'],
                                        selected: (value.id == initialSubRequestTypeId)
                                    }));
                                });
                                $('#sub_request_type_row').show();
                            } else {
                                $('#sub_request_type_row').hide();
                                subRequestSelect.append('<option value="">{{ __("No Sub Request Types Found") }}</option>');
                            }
                        },
                        error: function (xhr) {
                            console.error(xhr);
                        }
                    });
                } else {
                    $('#sub_request_type_row').hide();
                    $('#sub_request_type_id').empty().append('<option value="">{{ __("Select Sub Request Type") }}</option>');
                }
            }

            // Bind change event
            $('#request_type_id').on('change', handleRequestTypeChange);

            // Trigger change on initial load if request_type_id is set
            var initialRequestTypeId = $('#request_type_id').val();
            if (initialRequestTypeId) {
                $('#request_type_id').trigger('change');
            }

            // ... existing code ...
        });
    </script>
@endsection
