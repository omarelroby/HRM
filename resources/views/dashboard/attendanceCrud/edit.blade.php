
@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Job') }}
@endsection

@section('content')
    <div class="row">
        <!-- Card for Job Title Update -->
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header text-white">
                    <h5 class="mb-0">{{ __('Update Task') }}</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('attendanceemployee.update', $attendanceEmployee->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="form-group col-lg-6 col-md-6">
                                <label for="employee_id">{{ __('Employee') }}</label>
                                <select name="employee_id" id="employee_id" class="form-control select2">
                                    @foreach($employees as $id => $name)
                                        <option value="{{ $id }}" {{ $attendanceEmployee->employee_id == $id ? 'selected' : '' }}>
                                            {{ $name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('employee_id')
                                <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-lg-6 col-md-6">
                                <label for="date">{{ __('Date') }}</label>
                                <input type="text" name="date" id="date"
                                       class="form-control datetimepicker"
                                       value="{{ old('date', $attendanceEmployee->date) }}">
                                @error('date')
                                <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-lg-6 col-md-6">
                                <label for="clock_in">{{ __('Clock In') }}</label>
                                <input type="time" name="clock_in" id="clock_in"
                                       class="form-control timepicker"
                                       value="{{ old('clock_in', $attendanceEmployee->clock_in ? \Carbon\Carbon::parse($attendanceEmployee->clock_in)->format('H:i') : '') }}"
                                       step="60">
                                @error('clock_in')
                                <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-lg-6 col-md-6">
                                <label for="clock_out">{{ __('Clock Out') }}</label>
                                <input type="time" name="clock_out" id="clock_out"
                                       class="form-control timepicker"
                                       value="{{ old('clock_out', $attendanceEmployee->clock_out ? \Carbon\Carbon::parse($attendanceEmployee->clock_out)->format('H:i') : '') }}"
                                       step="60">
                                @error('clock_out')
                                <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 mt-3">
                                <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                                <button type="button" class="btn btn-white" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                            </div>
                        </div>
                    </form>
                 </div>
            </div>
        </div>
    </div>


@endsection

@section('script')
    <!-- Hijri Date Picker -->
    <script src="{{ asset('assets/js/bootstrap-hijri-datepicker.js') }}"></script>
    <link href="{{ asset('assets/css/bootstrap-hijri-datepicker.css') }}" rel="stylesheet">

    <!-- Time Picker -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>

    <script>
        // Initialize all pickers when modal is shown
        $('#addTrainingModal').on('shown.bs.modal', function () {
            // Timepicker initialization
            $('.timepicker').timepicker({
                showMeridian: false,
                minuteStep: 1,
                defaultTime: false,
                showInputs: true,
                template: 'dropdown',
                modalBackdrop: true,
                icons: {
                    up: 'ti ti-chevron-up',
                    down: 'ti ti-chevron-down'
                }
            }).on('changeTime.timepicker', function(e) {
                // Force format to HH:mm
                const time = e.time.value;
                const formatted = moment(time, 'HH:mm').format('HH:mm');
                $(this).val(formatted);
            });

            // Hijri datepicker initialization
            $('.datetimepicker').hijriDatePicker({
                format: 'YYYY-MM-DD',
                hijri: false,
                showSwitcher: false,
                useCurrent: true
            });
        });
        // Radio button toggle
        $(document).ready(function () {
            $('input[name="type"]:radio').on('change', function () {
                const type = $(this).val();
                $('.month').toggleClass('d-none', type !== 'monthly');
                $('.date').toggleClass('d-none', type !== 'daily');
            }).trigger('change');
        });

        // Remove conflicting datetimepicker initialization
    </script>
@endsection



