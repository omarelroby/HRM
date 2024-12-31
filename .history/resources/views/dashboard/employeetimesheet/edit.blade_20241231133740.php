@extends('dashboard.layouts.master')
@section('content')
<div class="container mt-5" style="max-width: 1200px; background-color: #f8f9fa; padding: 20px; border-radius: 8px;">
    <div class="card shadow-lg" style="background-color: #ffffff; border-radius: 10px; padding: 20px;">
        <div class="card-header bg-primary text-white" style="border-radius: 10px 10px 0 0;">
            <h4 class="mb-0">{{ __('Edit Employee') }}</h4>
        </div>
        <div class="card-body">
            {{ Form::open(array('route' => array('timesheet.store'))) }}
            <div class="modal-body">
                <div class="row">
                    <!-- Employee Selection (Visible only for non-employees) -->
                    @if(\Auth::user()->type != 'employee')
                    <div class="form-group col-md-4 mb-3">
                        {{ Form::label('employee_id', __('Employee'),['class'=>'form-label']) }}
                        {!! Form::select('employee_id', $employees, null, array('class' => 'form-select select2', 'required' => 'required')) !!}
                    </div>
                    @endif

                    <!-- Date Input -->
                    <div class="form-group col-md-4 mb-3">
                        {{ Form::label('date', __('Date'),['class'=>'form-label']) }}
                        {{ Form::text('date', '', array('class' => 'form-control datepicker', 'required' => 'required')) }}
                    </div>

                    <!-- Hours Input -->
                    <div class="form-group col-md-4 mb-3">
                        {{ Form::label('hours', __('Hours'),['class'=>'form-label']) }}
                        {{ Form::number('hours', '', array('class' => 'form-control', 'required' => 'required', 'step' => '0.01')) }}
                    </div>

                    <!-- Remarks Input -->
                    <div class="form-group col-md-6 mb-3">
                        {{ Form::label('remark', __('Remark'),['class'=>'form-label']) }}
                        {!! Form::textarea('remark', null, ['class'=>'form-control', 'rows'=>'2']) !!}
                    </div>

                    <!-- Arabic Remarks Input -->
                    <div class="form-group col-md-6 mb-3">
                        {{ Form::label('remark_ar', __('Remark_ar'),['class'=>'form-label']) }}
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
        </div>
    </div>
</div>
@endsection

@section('script')

<script>
    $(document).ready(function () {
        // Initialize Hijri Date Picker
        $('.datepicker').hijriDatePicker({
            format: 'YYYY-M-D',
            showSwitcher: false,
            hijri: false,
            useCurrent: true
        });

        // DateTime Picker
        $('.datetimepicker').datetimepicker({
            format: 'DD/MM/YYYY',
            icons: {
                time: 'bi bi-clock',
                date: 'bi bi-calendar',
                up: 'bi bi-chevron-up',
                down: 'bi bi-chevron-down',
            },
            widgetPositioning: {
                horizontal: 'auto',
                vertical: 'bottom'
            },
            // Append to body to avoid overflow issues
            widgetParent: 'body'
        });

        // Toggle Salary Card Info vs IBAN Info
        $(document).on('change', '#employee_account_type', function () {
            if ($(this).val() == '0') {
                $('#salary_card_number_info').removeClass('d-none').show();
                $('#IBAN_number_info').addClass('d-none').hide();
            } else if ($(this).val() == '1') {
                $('#IBAN_number_info').removeClass('d-none').show();
                $('#salary_card_number_info').addClass('d-none').hide();
            }
        });

        // Nationality type toggle
        $(document).on('change', '#nationality_type', function () {
            var nationality_type = $(this).val();
            if (nationality_type == 1) {
                $('#nationality').hide();
            } else {
                $('#nationality').show();
            }
        });

        // Select All checkboxes in datatable
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

        // Toggle switch value change
        function toggleSwitch(value) {
            const switchElement = document.getElementById('switch-md');
            if (value === "1") {
                switchElement.checked = true; // Check the switch
            } else if (value === "0") {
                switchElement.checked = false; // Uncheck the switch
            }
        }
    });
</script>

<!-- Hijri DatePicker Styles -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/persian-datepicker@1.2.0/dist/css/persian-datepicker.min.css">

<!-- Moment.js with Hijri support -->
<script src="https://cdn.jsdelivr.net/npm/moment-hijri@2.17.0/moment-hijri.min.js"></script>

<!-- Hijri DatePicker Script -->
<script src="https://cdn.jsdelivr.net/npm/persian-datepicker@1.2.0/dist/js/persian-datepicker.min.js"></script>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap 5 Bundle (Popper.js + Bootstrap JS) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function () {
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

@endsection
