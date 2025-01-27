{{ Form::open(array('url' => 'absence', 'method' => 'post')) }}
{{ Form::hidden('employee_id', $employee->id, array()) }}
<div class="row">
    <div class="form-group col-md-6">
        {{ Form::label('type', __('Absent Type'), ['class' => 'form-control-label']) }}
        <select class="form-control" name="type">
            <option value="V"> V - أجازة</option>
            <option value="S"> S - مرضى </option>
            <option value="A"> A - غياب بإذن </option>
            <option value="X"> X - غياب بدون إذن</option>
        </select>
    </div>

    <div class="form-group col-md-6">
        {{ Form::label('number_of_days', __('Number of days'), ['class' => 'form-control-label']) }}
        {{ Form::number('number_of_days', null, ['class' => 'form-control', 'required' => 'required', 'step' => '0.01', 'id' => 'number_of_days', 'readonly' => true]) }}
    </div>

    <div class="form-group col-md-6">
        {{ Form::label('start_date', __('Start Date'), ['class' => 'form-control-label']) }}
        {{ Form::date('start_date', date('Y-m-d'), ['class' => 'form-control datepicker', 'id' => 'start_date']) }}
    </div>

    <div class="form-group col-md-6">
        {{ Form::label('end_date', __('End Date'), ['class' => 'form-control-label']) }}
        {{ Form::date('end_date', date('Y-m-d'), ['class' => 'form-control datepicker', 'id' => 'end_date']) }}
    </div>

    <div class="col-12">
        <input type="submit" value="{{ __('Create') }}" class="btn btn-primary">
        <input type="button" value="{{ __('Cancel') }}" class="btn btn-white" data-bs-dismiss="modal">
    </div>
</div>
{{ Form::close() }}

<!-- Add jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Function to calculate the difference between two dates
        function calculateDays() {
            let startDate = new Date($('#start_date').val());
            let endDate = new Date($('#end_date').val());

            // Calculate the difference in milliseconds
            let timeDifference = endDate - startDate;

            // Convert the difference to days
            let daysDifference = Math.ceil(timeDifference / (1000 * 60 * 60 * 24));

            // If the difference is valid, update the number_of_days field
            if (!isNaN(daysDifference) && daysDifference >= 0) {
                $('#number_of_days').val(daysDifference);
            } else {
                $('#number_of_days').val('');
            }
        }

        // Trigger the calculation when start_date or end_date changes
        $('#start_date, #end_date').on('change', function() {
            calculateDays();
        });
    });
</script>
