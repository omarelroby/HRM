@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Edit Timesheet Entry') }}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xxl-8 col-xl-10">
                <div class="card card-rounded shadow-sm">
                    <div class="card-header   text-white">
                        <h3 class="card-title mb-0">{{ __('Update Timesheet Entry') }}</h3>
                    </div>

                    <div class="card-body">
                        {{ Form::model($timeSheet, [
                            'route' => ['timesheet.update', $timeSheet->id],
                            'method' => 'PUT',
                            'class' => 'needs-validation',
                            'novalidate' => true
                        ]) }}

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
                                    {{ Form::text('date', null, [
                                        'class' => 'form-control datepicker',
                                        'id' => 'date',
                                        'required' => 'required',
                                        'placeholder' => __('YYYY-MM-DD')
                                    ]) }}
                                    {{ Form::label('date', __('Date'), ['class' => 'form-label']) }}
                                    <div class="invalid-feedback">
                                        {{ __('Please select a valid date') }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    {{ Form::number('hours', null, [
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
                                <div class="d-flex justify-content-end gap-3">
                                    <a href="{{ route('timesheet.index') }}" class="btn btn-secondary">
                                        {{ __('Cancel') }}
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save me-2"></i>{{ __('Update Entry') }}
                                    </button>
                                </div>
                            </div>
                        </div>

                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // Initialize datepicker
            $('.datepicker').hijriDatePicker({
                format: 'YYYY-M-D',
                showSwitcher: false,
                hijri: false,
                useCurrent: true,
                locale: 'en',
                showTodayButton: true,
                icons: {
                    today: 'fas fa-calendar-check'
                }
            });

            // Initialize Select2
            $('.select2').select2({
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
