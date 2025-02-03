@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Manage Employee Request') }}
@endsection

@section('content')
<div class="row">
    <div class="row d-flex justify-content-end mt-3">
        @if (\Auth::user()->type == 'employee')
            @can('Create Leave')
                <div class="col-auto">
                    <a   class="btn btn-primary"
                       data-bs-toggle="modal" data-bs-target="#addTrainingModal" data-title="{{ __('Create New Request') }}">
                        <i class="fas fa-plus"></i> {{ __('Create') }}
                    </a>
                </div>
            @endcan
        @endif
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5>{{ __('Employee Requests') }}</h5>
            </div>
            @if (session('success'))
            <div class="alert alert-success" style="text-align: center;">{{ session('success') }}</div>
            @elseif (session('error'))
            <div class="alert alert-danger" style="text-align: center;">{{ session('error') }}</div>
            @endif
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                @if (\Auth::user()->type != 'employee')
                                    <th>{{ __('Employee') }}</th>
                                @endif
                                <th>{{ __('Request Type') }}</th>
                                <th>{{ __('Request Date') }}</th>
                                <th>{{ __('Start Date') }}</th>
                                <th>{{ __('End Date') }}</th>
                                <th>{{ __('Request Reason') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th width="5%">{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($leaves as $leave)
                                <tr>
                                    @if (\Auth::user()->type != 'employee')
                                        <td>{{ \Auth::user()->getEmployee($leave->employee_id)->name ?? '' }}</td>
                                    @endif
                                    <td>{{ $leave->requestType['name' . $lang] ?? '' }}</td>
                                    <td>{{ \Auth::user()->dateFormat($leave->applied_on) }}</td>
                                    <td>{{ \Auth::user()->dateFormat($leave->start_date) }}</td>
                                    <td>{{ \Auth::user()->dateFormat($leave->end_date) }}</td>
                                    <td>{{ $leave['request_reason' . $lang] }}</td>
                                    <td class="text-center">
                                        @if ($leave->status == 0)
                                            <span class="badge bg-warning">{{ __('Pending') }}</span>
                                        @elseif ($leave->status == 1)
                                            <span class="badge bg-success">{{ __('Approve By Department Manager') }}</span>
                                        @elseif ($leave->status == 2)
                                            <span class="badge bg-danger">{{ __('Reject By Department Manager') }}</span>
                                        @elseif ($leave->status == 3)
                                            <span class="badge bg-info">{{ __('Approve By Sub Department Manager') }}</span>
                                        @elseif ($leave->status == 4)
                                            <span class="badge bg-danger">{{ __('Reject By Sub Department Manager') }}</span>
                                        @elseif ($leave->status == 5)
                                            <span class="badge bg-primary">{{ __('Approve By Company Manager') }}</span>
                                        @elseif ($leave->status == 6)
                                            <span class="badge bg-danger">{{ __('Reject By Company Manager') }}</span>
                                        @endif
                                    </td>

                                        <td class="text-center">
                                            @if ($leave->status == 0)
                                                @php
                                                    // Get the employee's department, sub-department, and section
                                                    $employee = \Auth::user()->getEmployee($leave->employee_id);
                                                    $employeeDepartment = $employee->department_id ?? null;
                                                    $employeeSubDepartment = $employee->sub_dep_id ?? null;
                                                    $employeeSection = $employee->section_id ?? null;
                                                    $authUserDepartment = \Auth::user()->employee->department_id ?? null;
                                                    $authUserSubDepartment = \Auth::user()->employee->sub_dep_id ?? null;
                                                    $authUserSection = \Auth::user()->employee->section_id ??null  ;                                            ;


                                                @endphp
                                            @if(auth()->user()->type=='company')
                                                 @if ($employeeDepartment && $authUserSubDepartment == 0)

                                                    <button class="btn btn-sm btn-success approve-btn" data-id="{{ $leave->id }}" title="{{$authUserSubDepartment }}">
                                                        <i class="fas fa-check"></i>
                                                    </button>
                                                    <button class="btn btn-sm btn-danger decline-btn" data-id="{{ $leave->id }}" title="{{ __('Reject') }}">
                                                        <i class="fas fa-times"></i>
                                                    </button>


                                                @endif
                                                {{-- Show buttons for sub-department manager if the employee is in the same sub-department and section_id is 0 --}}
                                                @if ( $employeeSubDepartment  && empty($authUserSection) && $authUserSubDepartment != 0)

                                                    <button class="btn btn-sm btn-success approve-btn" data-id="{{ $leave->id }}" title="{{ auth()->user()->employee->id }}">
                                                        <i class="fas fa-check"></i>
                                                    </button>
                                                    <button class="btn btn-sm btn-danger decline-btn" data-id="{{ $leave->id }}" title="{{ __('Reject') }}">
                                                        <i class="fas fa-times"></i>
                                                    </button>


                                                @endif
                                                @else
                                                    @if ($employeeDepartment && $authUserSubDepartment == 0)
                                                        @if($leave->employee_id != Auth::user()->employee->id )
                                                            <button class="btn btn-sm btn-success approve-btn" data-id="{{ $leave->id }}" title="{{$authUserSubDepartment }}">
                                                                <i class="fas fa-check"></i>
                                                            </button>
                                                            <button class="btn btn-sm btn-danger decline-btn" data-id="{{ $leave->id }}" title="{{ __('Reject') }}">
                                                                <i class="fas fa-times"></i>
                                                            </button>
                                                        @endif

                                                    @endif
                                                    {{-- Show buttons for sub-department manager if the employee is in the same sub-department and section_id is 0 --}}
                                                    @if ( $employeeSubDepartment  && empty($authUserSection) && $authUserSubDepartment != 0)
                                                        @if($leave->employee_id != Auth::user()->employee->id )

                                                            <button class="btn btn-sm btn-success approve-btn" data-id="{{ $leave->id }}" title="{{ auth()->user()->employee->id }}">
                                                                <i class="fas fa-check"></i>
                                                            </button>
                                                            <button class="btn btn-sm btn-danger decline-btn" data-id="{{ $leave->id }}" title="{{ __('Reject') }}">
                                                                <i class="fas fa-times"></i>
                                                            </button>

                                                        @endif
                                                    @endif
                                                @endif
                                        @endif

                                                <!-- Add this to your Blade template -->
                                                <div class="modal fade" id="rejectReasonModal" tabindex="-1" role="dialog" aria-labelledby="rejectReasonModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="rejectReasonModalLabel">{{ __('reject Request Reason') }}</h5>

                                                            </div>
                                                            <div class="modal-body">
                                                                <textarea id="rejectReason" class="form-control" placeholder="{{ __('Enter reason for rejection...') }}" rows="3" required></textarea>
                                                            </div>
                                                            <div class="modal-footer my-2">
                                                                <button type="button" class="btn btn-secondary mx-1" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                                                                <button type="button" class="btn btn-primary" id="submitRejectReason">{{ __('Submit') }}</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        @can('Edit Leave')
                                            <a href="{{ URL::to('employee_requests/' . $leave->id . '/edit') }}"   data-size="lg"
                                                 data-title="{{ __('Edit Request') }}" class="btn btn-sm btn-success"
                                               title="{{ __('Edit') }}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        @endcan

                                        @if(in_array($leave->status, [2,4,6]))
                                            <button class="btn btn-sm btn-info view-reason-btn"
                                                    data-reason="{{ $leave->reject_reason??'' }}"
                                                    title="{{ __('View Request Reason') }}">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        @endif
                                        @can('Delete Leave')
                                            <button class="btn btn-sm btn-danger" title="{{ __('Delete') }}"
                                                onclick="deleteConfirmation({{ $leave->id }})">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                            <form id="delete-form-{{ $leave->id }}" method="POST"
                                                  action="{{ route('employee_requests.destroy', $leave->id) }}" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        @endcan
{{--
                                        <a href="#" data-url="{{ URL::to('employee_requests/' . $leave->id . '/action') }}" data-size="lg"
                                           data-ajax-popup="true" data-title="{{ __('Request Action') }}" class="btn btn-sm btn-primary"
                                           title="{{ __('Request Action') }}">
                                            <i class="fas fa-caret-right"></i>
                                        </a> --}}
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
<!-- Add this modal at the bottom of your Blade template -->
<div class="modal fade" id="viewReasonModal" tabindex="-1" role="dialog" aria-labelledby="viewReasonModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewReasonModalLabel">{{ __('Reject Request Reason') }}</h5>

            </div>
            <div class="modal-body">
                <p id="requestReasonText"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="addTrainingModal" tabindex="-1" aria-labelledby="addTrainingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header text-white">
                <h5 class="modal-title" id="addTrainingModalLabel">{{ __('Add Custom Question') }}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <div class="card bg-none card-box">
                    {{Form::open(array('url'=>'employee_requests','method'=>'post'))}}
                    @if($employeeId) {{ Form::hidden('employee_id',$employeeId, array()) }} @endif
                    @if(\Auth::user()->type !='employee')
                        @if(!$employeeId)
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {{Form::label('employee_id',__('Employee'))}}
                                        {{Form::select('employee_id',$employees,null,array('class'=>'form-control select2','id'=>'employee_id','placeholder'=>__('Select Employee')))}}
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif

                    <div class="row">

                        <div class="row">
                            <!-- Request Type Dropdown -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{ Form::label('request_type_id', __('Request Type')) }}
                                    <select name="request_type_id" id="request_type_id" class="form-control select2">
                                        <option value="">{{ __('Select Request Type') }}</option>
                                        @foreach($requesttypes as $requesttype)
                                            <option value="{{ $requesttype->id }}">{{ $requesttype['name'.$lang] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Sub Request Type Dropdown (Initially Hidden) -->
                        <div class="row" id="sub_request_type_row" style="display: none;">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{ Form::label('sub_request_type_id', __('Sub Request Type')) }}
                                    <select name="sub_request_type_id" id="sub_request_type_id" class="form-control select2">
                                        <option value="">{{ __('Select Sub Request Type') }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('start_date',__('Start Date'))}}
                                {{Form::date('start_date',null,array('class'=>'form-control   datepicker'))}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('end_date',__('End Date'))}}
                                {{Form::date('end_date',null,array('class'=>'form-control gregorian-date datepicker'))}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{Form::label('request_reason',__('Request Reason'))}}
                                {{Form::textarea('request_reason',null,array('class'=>'form-control','placeholder'=>__('Request Reason')))}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{Form::label('request_reason_ar',__('Request Reason ar'))}}
                                {{Form::textarea('request_reason_ar',null,array('class'=>'form-control','placeholder'=>__('Request Reason ar')))}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <input type="submit" value="{{__('Create')}}" class="btn btn-primary">
                            <input type="button" value="{{__('Cancel')}}" class="btn btn-white" data-bs-dismiss="modal">
                        </div>
                    </div>

                    {{Form::close()}}
                </div>



            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    function deleteConfirmation(id) {
        if (confirm("{{ __('Are you sure? This action cannot be undone.') }}")) {
            document.getElementById('delete-form-' + id).submit();
        }
    }
</script>
<script>
    $(document).ready(function () {
        // Initialize Select2 for dropdowns
        $('.select2').select2({
            placeholder: "{{ __('Select an option') }}",
            allowClear: true
        });

        // Handle change event for request_type dropdown
        $('#request_type_id').change(function () {
            const requestTypeId = $(this).val();

            if (requestTypeId) {
                // Fetch sub_request_types via AJAX
                $.ajax({
                                                                                                            url: "{{ route('get.sub_request_types') }}",
                    type: "GET",
                    data: {
                        request_type_id: requestTypeId
                    },
                    success: function (response) {
                        if (response.length > 0) {
                            // Populate sub_request_type dropdown
                            $('#sub_request_type_id').empty().append('<option value="">{{ __('Select Sub Request Type') }}</option>');
                            $.each(response, function (key, value) {
                                $('#sub_request_type_id').append('<option value="' + value.id + '">' + value['name{{ $lang }}'] + '</option>');
                            });

                            // Show the sub_request_type dropdown
                            $('#sub_request_type_row').show();
                        } else {
                            // Hide the sub_request_type dropdown if no data is found
                            $('#sub_request_type_row').hide();
                            $('#sub_request_type_id').empty().append('<option value="">{{ __('No Sub Request Types Found') }}</option>');
                        }
                    },
                    error: function (xhr) {
                        console.error(xhr);
                    }
                });
            } else {
                // Hide the sub_request_type dropdown if no request_type is selected
                $('#sub_request_type_row').hide();
                $('#sub_request_type_id').empty().append('<option value="">{{ __('Select Sub Request Type') }}</option>');
            }
        });
    });
</script>
<script>
    $(function () {
        $(".gregorian-date , .datepicker").hijriDatePicker({
            format:'YYYY-M-D',
            showSwitcher: false,
            hijri:false,
            useCurrent: true,
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Approve button handler
        document.querySelectorAll('.approve-btn').forEach(function(button) {
            button.addEventListener('click', function() {
                const leaveId = this.getAttribute('data-id');
                if (confirm('{{ __("Are you sure you want to approve this request?") }}')) {
                    updateStatus(leaveId, 1);
                }
            });
        });

        // Decline button handler
        document.querySelectorAll('.decline-btn').forEach(function(button) {
            button.addEventListener('click', function() {
                const leaveId = this.getAttribute('data-id');
                // Store leave ID in modal and show
                $('#rejectReasonModal').data('leaveId', leaveId).modal('show');
            });
        });

        // Submit rejection reason handler
        document.getElementById('submitRejectReason').addEventListener('click', function() {
            const leaveId = $('#rejectReasonModal').data('leaveId');
            const reason = document.getElementById('rejectReason').value.trim();

            if (reason) {
                updateStatus(leaveId, 2, reason);
                $('#rejectReasonModal').modal('hide');
                document.getElementById('rejectReason').value = ''; // Clear input
            }
        });

        function updateStatus(leaveId, status, reason = null) {
            const payload = { status: status };
            if (reason) payload.reason = reason;

            fetch(`/employee_requests/${leaveId}/update-status`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify(payload)
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert(data.success);
                        location.reload();
                    } else {
                        alert(data.error);
                    }
                })
                .catch(error => console.error('Error:', error));
        }
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // View request reason handler
        document.querySelectorAll('.view-reason-btn').forEach(button => {
            button.addEventListener('click', function() {
                const reason = this.getAttribute('data-reason');
                document.getElementById('requestReasonText').textContent = reason;
                $('#viewReasonModal').modal('show');
            });
        });

        // Keep your existing approve/decline logic here
    });
</script>
@endsection
