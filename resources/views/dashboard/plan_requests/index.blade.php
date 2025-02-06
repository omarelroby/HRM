@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Manage Plan Requests') }}
@endsection

@section('content')
    <div class="row">
        <div class="d-flex justify-content-end mb-3">
            @can('Create Plan Request')
                <a href="#" data-bs-toggle="modal" data-bs-target="#addPlanRequestModal" class="btn btn-primary btn-lg">
                    <i class="fas fa-plus"></i> {{ __('Create New Plan Request') }}
                </a>
            @endcan
        </div>
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header text-white">
                    <h5 class="card-title mb-0">{{ __('Plan Requests List') }}</h5>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables">
                            <thead>
                            <tr>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Plan') }}</th>
                                <th>{{ __('Phone') }}</th>
                                <th>{{ __('Email') }}</th>
                                <th width="15%">{{ __('Action') }}</th>
                            </tr>
                            </thead>
                            <tbody class="font-style">
                            @foreach ($plansRequests as $planRequest)
                                <tr>
                                    <td>{{ $planRequest->name }}</td>
                                    <td>{{ $planRequest->Plan->name ?? __('N/A') }}</td>
                                    <td>{{ $planRequest->phone }}</td>
                                    <td>{{ $planRequest->email }}</td>
                                    <td class="text-right">
                                        @if($planRequest->approve == 0)
                                            <!-- Show Approve and Reject buttons if status is 0 (pending) -->
                                            <button type="button" class="btn btn-sm btn-success approve-btn" data-toggle="modal" data-target="#approveModal" data-request-id="{{ $planRequest->id }}">
                                                <i class="fas fa-check"></i> {{ __('Approve') }}
                                            </button>

                                            <form method="POST" action="{{ route('plan-requests.reject', $planRequest->id) }}" class="d-inline" onsubmit="return confirm('{{ __('Are you sure you want to reject this request?') }}');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="fas fa-times"></i> {{ __('Reject') }}
                                                </button>
                                            </form>
                                        @elseif($planRequest->approve == 1)
                                            <!-- Show Approved text if status is 1 (approved) -->
                                            <span class="badge badge-success">
            <i class="fas fa-check"></i> {{ __('Approved') }}
        </span>
                                        @elseif($planRequest->approve == 2)
                                            <!-- Show Rejected text if status is 2 (rejected) -->
                                            <span class="badge badge-danger">
            <i class="fas fa-times"></i> {{ __('Rejected') }}
        </span>
                                        @endif

                                        <!-- Delete Button (always visible) -->
                                        <form method="POST" action="{{ route('plan-requests.destroy', $planRequest->id) }}" class="d-inline" onsubmit="return confirm('{{ __('Are you sure?') }}\n{{ __('This action cannot be undone. Do you want to continue?') }}');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" title="{{ __('Delete') }}">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Approve Modal -->
                <div class="modal fade" id="approveModal" tabindex="-1" role="dialog" aria-labelledby="approveModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="approveModalLabel">{{ __('Approve Plan Request') }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form id="approveForm" method="POST" action="{{ route('plan-requests.approve') }}">
                                @csrf
                                <div class="modal-body">
                                    <input type="hidden" name="request_id" id="request_id">
                                    <div class="form-group">
                                        <label for="months">{{ __('Select Duration') }}</label>
                                        <select class="form-control" id="months" name="months" required>
                                            <option value="3">3 {{ __('Months') }}</option>
                                            <option value="6">6 {{ __('Months') }}</option>
                                            <option value="12">12 {{ __('Months') }}</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="payment_method">{{ __('Payment Method') }}</label>
                                        <select class="form-control" id="payment_method" name="payment" required>
                                            <option value="credit_card">{{ __('Credit Card') }}</option>
                                            <option value="cash">{{ __('Cash') }}</option>
                                            <option value="bank_transfer">{{ __('Bank Transfer') }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary mx-2" data-dismiss="modal">{{ __('Close') }}</button>
                                    <button type="submit" class="btn btn-primary">{{ __('Approve') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>

 @endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
            $('.select2').select2({
                theme: 'bootstrap4'
            });
        });
    </script>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).ready(function () {
                    // When the approve button is clicked
                    $('.approve-btn').on('click', function () {
                        var requestId = $(this).data('request-id'); // Get the request ID
                        $('#request_id').val(requestId); // Set the request ID in the hidden input
                    });


                    $('#approveForm').on('submit', function (e) {
                        e.preventDefault(); // Prevent default form submission

                        // Submit the form via AJAX
                        $.ajax({
                            url: $(this).attr('action'),
                            type: 'POST',
                            data: $(this).serialize(),
                            success: function (response) {
                                if (response.success) {
                                    alert(response.message);
                                    location.reload(); // Reload the page to reflect changes
                                } else {
                                    alert('An error occurred. Please try again.');
                                }
                            },
                            error: function (xhr) {
                                alert('An error occurred. Please try again.');
                            }
                        });
                    });
                });
            </script>
@endpush
