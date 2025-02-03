@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Manage Tasks') }}
@endsection



@section('content')
    <div class="row">
        <div class="d-flex justify-content-end mb-3">
            @can('Create Ticket')
                <a href="#" data-bs-toggle="modal" data-bs-target="#addTrainingModal" class="btn btn-primary btn-lg">
                    <i class="fas fa-plus"></i> {{ __('Add New Mac Address') }}
                </a>
            @endcan
        </div>
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header text-white">
                    <h5 class="card-title mb-0">{{ __('Mac Address') }}</h5>
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
                                <th>{{ __('Mac Address') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($macs as $key=>$mac)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $mac->mac }}</td>


                                    <td class="text-right action-btns">


                                            <form method="POST" action="{{ route('mac-address.destroy', $mac->id) }}" class="d-inline" onsubmit="return confirm('{{ __('Are You Sure?') }}\n{{ __('This action cannot be undone. Do you want to continue?') }}');">
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
    <!-- Add Ticket Modal -->
<div class="modal fade" id="addTrainingModal" tabindex="-1" aria-labelledby="addTrainingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header text-white">
                <h5 class="modal-title" id="addTrainingModalLabel">{{ __('Add New Mac Address') }}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('mac-address.store')}}" method="post" class="needs-validation" novalidate>
                    @csrf
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>{{ __('Field') }}</th>
                            <th>{{ __('Input') }}</th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr>
                            <td>{{ __('Name Label') }}</td>
                            <td>
                                <input type="text" name="mac" class="form-control" placeholder="{{ __('Add New Mac Address') }}" required>
                                <div class="invalid-feedback">{{ __('Add New Mac Address') }}</div>
                            </td>
                        </tr>

                        <tr>
                            <td>{{ __('Created By') }}</td>
                            <td>
                                <input type="text"   value="{{ auth()->user()->name }}" class="form-control" disabled>
                                <input type="text" hidden="" name="created_by" value="{{ auth()->user()->id }}" class="form-control" disabled>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <!-- Buttons -->
                    <div class="text-end">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                    </div>
                </form>
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
@endpush
