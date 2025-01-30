@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Manage Timesheet') }}
@endsection
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/hijri-datepicker@latest/css/bootstrap-hijri-datepicker.min.css" rel="stylesheet">
@endpush
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-rounded">
                    <div class="card-header bg-light">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title mb-0">{{ __('Timesheet Management') }}</h3>
                            <div class="btn-group">
                                @can('Create TimeSheet')
                                    <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-plus me-2"></i>{{ __('Actions') }}
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#addTrainingModal" data-title="{{ __('Create New') }}">
                                                <i class="fas fa-file-alt me-2"></i>{{ __('New Time Sheet') }}
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('timesheet.export') }}">
                                                <i class="fas fa-file-excel me-2"></i>{{ __('Export') }}
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#" data-url="{{ route('timesheet.file.import') }}" data-ajax-popup="true" data-title="{{ __('Import Timesheet CSV file') }}">
                                                <i class="fas fa-file-import me-2"></i>{{ __('Import') }}
                                            </a>
                                        </li>
                                    </ul>
                                @endcan
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @elseif (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if(\Auth::user()->type != 'employee')
                            <div class="advanced-filter mb-4">
                                {{ Form::open(['route' => ['timesheet.index'], 'method' => 'get', 'id' => 'timesheet_filter']) }}
                                <div class="row g-3 align-items-end">
                                    <div class="col-12 col-md-3">
                                        {{ Form::label('start_date', __('Start Date'), ['class' => 'form-label']) }}
                                        <div class="input-group">
                                            {{ Form::text('start_date', request('start_date'), ['class' => 'form-control datepicker', 'placeholder' => __('Select start date')]) }}
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        {{ Form::label('end_date', __('End Date'), ['class' => 'form-label']) }}
                                        <div class="input-group">
                                            {{ Form::text('end_date', request('end_date'), ['class' => 'form-control datepicker', 'placeholder' => __('Select end date')]) }}
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        {{ Form::label('employee', __('Employee'), ['class' => 'form-label']) }}
                                        {{ Form::select('employee', $employeesList, request('employee'), ['class' => 'form-select select2', 'placeholder' => __('Select employee')]) }}
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <div class="d-grid gap-2">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-filter me-2"></i>{{ __('Apply Filters') }}
                                            </button>
                                            <a href="{{ route('timesheet.index') }}" class="btn btn-outline-secondary">
                                                <i class="fas fa-undo me-2"></i>{{ __('Reset') }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                {{ Form::close() }}
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-hover table-striped align-middle dataTables">
                                <thead class="table-light">
                                <tr>

                                    <th>{{ __('Employee') }}</th>

                                    <th>{{ __('Date') }}</th>
                                    <th class="text-center">{{ __('Hours') }}</th>
                                    <th>{{ __('Description') }}</th>
                                    <th class="text-end">{{ __('Actions') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($timeSheets as $timeSheet)
                                    <tr>

                                            <td>{{  $timeSheet->employees->name??'' }}</td>

                                        <td>{{ \Auth::user()->dateFormat($timeSheet->date) }}</td>
                                        <td class="text-center">
                                            <span class="badge bg-primary rounded-pill px-3 py-2">
                                                {{ $timeSheet->hours }} {{ __('Hours') }}
                                            </span>
                                        </td>
                                        <td class="text-truncate" style="max-width: 250px;" title="{{ $timeSheet->remark }}">
                                            {{ $timeSheet->remark }}
                                        </td>
                                        <td class="text-end">
                                            <div class="btn-group">
                                                @can('Edit TimeSheet')
                                                    <a href="{{ route('timesheet.edit', $timeSheet->id) }}"

                                                       data-title="{{ __('Edit Timesheet') }}"
                                                       class="btn btn-sm btn-outline-secondary"

                                                       title="{{ __('Edit') }}">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                @endcan

                                                @can('Delete TimeSheet')
                                                    <form method="POST" action="{{ route('timesheet.destroy', $timeSheet->id) }}"
                                                          class="d-inline"
                                                          data-confirm="{{ __('Are you sure?') }}|{{ __('This action cannot be undone. Do you want to continue?') }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                                class="btn btn-sm btn-outline-danger"
                                                                data-bs-toggle="tooltip"
                                                                title="{{ __('Delete') }}">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                @endcan
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
    <div class="modal fade" id="addTrainingModal" tabindex="-1" aria-labelledby="addTrainingModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header text-white">
                    <h3 class="modal-title  " id="addTrainingModalLabel">{{ __('Add Timesheet') }}</h3>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    {{ Form::open(['route' => 'timesheet.store', 'class' => 'needs-validation', 'novalidate' => true]) }}
                    <div class="row g-4">
                        @if(\Auth::user()->type != 'employee')
                            <div class="col-12">
                                <div class="form-floating">
                                    {!! Form::select('employee_id', $employees, null, [
                                        'class' => 'form-select select2',
                                        'id' => 'employee_id',
                                        'required' => 'required',
                                        'placeholder' => __('Select Employee')
                                    ]) !!}
                                    {{ Form::label('employee_id', __('Employee'), ['class' => 'form-label']) }}
                                    <div class="invalid-feedback">
                                        {{ __('Please select an employee') }}
                                    </div>
                                </div>
                            </div>
                        @endif

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="date"
                                           name="date"
                                           id="date"
                                           class="form-control datepicker"
                                           placeholder="{{ __('YYYY-MM-DD') }}"
                                           required>
                                    <label for="date" class="form-label">{{ __('Date') }}</label>
                                    <div class="invalid-feedback">
                                        {{ __('Please select a date') }}
                                    </div>
                                </div>
                            </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                {{ Form::number('hours', '', [
                                    'class' => 'form-control',
                                    'id' => 'hours',
                                    'required' => 'required',
                                    'step' => '0.01',
                                    'min' => '0',
                                    'placeholder' => __('0.00')
                                ]) }}
                                {{ Form::label('hours', __('Hours Worked'), ['class' => 'form-label']) }}
                                <div class="invalid-feedback">
                                    {{ __('Please enter valid hours') }}
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-floating">
                                {!! Form::textarea('remark', null, [
                                    'class' => 'form-control',
                                    'id' => 'remark',
                                    'rows' => 3,
                                    'placeholder' => __('Enter remarks in English')
                                ]) !!}
                                {{ Form::label('remark', __('English Remarks'), ['class' => 'form-label']) }}
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-floating">
                                {!! Form::textarea('remark_ar', null, [
                                    'class' => 'form-control',
                                    'id' => 'remark_ar',
                                    'rows' => 3,
                                    'placeholder' => __('Enter remarks in Arabic')
                                ]) !!}
                                {{ Form::label('remark_ar', __('Arabic Remarks'), ['class' => 'form-label']) }}
                            </div>
                        </div>

                        <div class="col-12 mt-4">
                            <div class="d-flex justify-content-end gap-2">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                    {{ __('Cancel') }}
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-2"></i>{{ __('Create Entry') }}
                                </button>
                            </div>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>


@endsection
@push('scripts')
    {{-- Hijri Datepicker JS --}}
    <script src="https://cdn.jsdelivr.net/npm/hijri-datepicker@latest/js/bootstrap-hijri-datepicker.min.js"></script>
    <script>
        // Initialize Select2
        $('.select2').select2({
            dropdownParent: $('#addTrainingModal'),
            width: '100%',
            placeholder: "{{ __('Select Employee') }}",
            allowClear: true
        });

        // Bootstrap form validation
        var forms = document.querySelectorAll('.needs-validation');
        Array.prototype.slice.call(forms).forEach(function(form) {
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });

    </script>
    <script>
        $(document).ready(function() {
            // Initialize Hijri Datepicker
            $(".datepicker").hijriDatePicker({
                format: 'YYYY-MM-DD',
                hijri: false, // Show Gregorian calendar
                showSwitcher: false,
                useCurrent: true,
                locale: 'en'
            });

            // Initialize Select2
            $('.select2').select2({
                dropdownParent: $('#addTrainingModal'),
                width: '100%',
                placeholder: "{{ __('Select Employee') }}",
                allowClear: true
            });

            // Bootstrap form validation
            var forms = document.querySelectorAll('.needs-validation');
            Array.prototype.slice.call(forms).forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        });
    </script>
@endpush
@section('css')
    <style>
        .card-rounded {
            border-radius: 1rem;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }
        .table-hover tbody tr:hover {
            background-color: rgba(0, 0, 0, 0.025);
        }
        .advanced-filter .input-group-text {
            background-color: #f8f9fa;
        }
        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_filter {
            padding: 1rem;
        }
    </style>

@endsection
