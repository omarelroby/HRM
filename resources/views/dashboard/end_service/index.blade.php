@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Manage Tasks') }}
@endsection



@section('content')
    <div class="row">
        @if(auth()->user()->type!='employee')
        <div class="d-flex flex-column flex-md-row justify-content-end mb-3">
            <a href="{{ route('end-service-dismissal') }}" class="btn btn-primary btn-lg mb-2 mb-md-0 mr-md-2 mx-2">
                <i class="fas fa-user-minus"></i> {{ __('Create New Dismissal') }}
            </a>
            <a href="{{ route('end-service-resignation') }}" class="btn btn-primary btn-lg">
                <i class="fas fa-sign-out-alt"></i> {{ __('Create New Resignation') }}
            </a>
        </div>
        @endif
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header text-white">
                    <h5 class="card-title mb-0">{{ __('End of service gratuity') }}</h5>
                </div>
                @if (session('success'))
                    <div class="alert alert-success" style="text-align: center;">{{ session('success') }}</div>
                @elseif (session('error'))
                    <div class="alert alert-danger" style="text-align: center;">{{ session('error') }}</div>
                @endif
                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('Employee ID') }}</th>
                                <th>{{ __('Type') }}</th>
                                <th>{{ __('Start Date') }}</th>
                                <th>{{ __('End Date') }}</th>
                                <th>{{ __('years') }}</th>
                                <th>{{ __('months') }}</th>
                                <th>{{ __('days') }}</th>
                                <th>{{ __('Amount') }}</th>
                                 <th>{{ __('Action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($services as $service)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $service->employee->name ?? 'N/A' }}</td>
                                    <td>{{ $service->type }}</td>
                                    <td>{{ $service->work_start_date }}</td>
                                    <td>{{ $service->work_end_date }}</td>
                                    <td>{{ $service->years }}</td>
                                    <td>{{ $service->months }}</td>
                                    <td>{{ $service->days }}</td>
                                    <td>{{ number_format($service->amount,2) }}</td>
                                <td>

{{--                                    <td class="text-right action-btns">--}}

                                            <!-- Reply Button -->
                                            <a href=""
                                               class="btn btn-sm btn-success mr-2"
                                               data-bs-toggle="modal"
                                               data-bs-target="#addPdfModal"
                                               data-url="{{ url('/end-service/pdf',$service->id) }}"
                                               data-toggle="tooltip"
                                               title="{{ __('$service') }}"
                                               aria-label="{{ __('PDF') }}">
                                                <i class="fa fa-file"></i> <!-- Generic file icon -->

                                            </a>



                                            <form method="POST" action="{{ route('end-service.destroy', $service->id) }}" class="d-inline" onsubmit="return confirm('{{ __('Are You Sure?') }}\n{{ __('This action cannot be undone. Do you want to continue?') }}');">
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
    </div>
    <div class="modal fade" id="addPdfModal" tabindex="-1" aria-labelledby="addTrainingModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" >
            <div class="modal-content" >
                <div class="modal-body py-4" >
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                </div>
            </div>
        </div>
    </div>

<!-- Datepicker Script -->
<script>
    $(function () {
        $(".datepicker").hijriDatePicker({
            format: 'YYYY-M-D',
            showSwitcher: false,
            hijri: false,
            useCurrent: true,
        });
    });
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
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
    <script>
        $(document).ready(function () {
            // Handle modal content loading
            $(document).on('click', '[data-bs-target="#addPdfModal"]', function (e) {
                e.preventDefault();
                var url = $(this).data('url'); // URL to fetch payslip data
                var title = $(this).data('title'); // Modal title

                // Set the modal title
                $('#addTrainingModalLabel').text(title);

                // Load content via AJAX
                $.ajax({
                    url: url,
                    method: 'GET',
                    success: function (response) {
                        // Inject the response into the modal body
                        $('#addPdfModal .modal-body').html(response);
                        $('#addPdfModal').modal('show'); // Show the modal
                    },
                    error: function () {
                        alert('Failed to load content.');
                    }
                });
            });
        });
    </script>

@endpush
