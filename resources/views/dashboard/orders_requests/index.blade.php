@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Manage Plan Requests') }}
@endsection

@section('content')
    <div class="row">

        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header text-white">
                    <h5 class="card-title mb-0">{{ __('Orders List') }}</h5>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables">
                            <thead>
                            <tr>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Email') }}</th>
                                <th>{{ __('Phone') }}</th>
                                <th>{{ __('Payment') }}</th>
                                <th>{{ __('Plan') }}</th>
                                <th>{{ __('Start Date') }}</th>
                                <th>{{ __('End Date') }}</th>
                                <th width="15%">{{ __('Action') }}</th>
                            </tr>
                            </thead>
                            <tbody class="font-style">
                            @foreach ($orders as $planRequest)
                                <tr>
                                    <td>{{ $planRequest->name }}</td>
                                    <td>{{ $planRequest->email ?? __('N/A') }}</td>
                                    <td>{{ $planRequest->phone }}</td>
                                    <td>{{ $planRequest->payment }}</td>
                                    <td>{{ $planRequest->plan->name??'' }}</td>
                                    <td>{{ $planRequest->start_date??'' }}</td>
                                    <td>{{ $planRequest->end_date??'' }}</td>
                                    <td class="text-right">
                                        <form method="POST" action="{{ route('order-requests.destroy', $planRequest->id) }}" class="d-inline" onsubmit="return confirm('{{ __('Are you sure?') }}\n{{ __('This action cannot be undone. Do you want to continue?') }}');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" title="{{ __('Delete') }}">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
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
