{{ Form::open(array('url' => 'commission', 'method' => 'post')) }}
{{ Form::hidden('employee_id', $employee->id, array()) }}
<div class="row">
    <div class="form-group col-md-12">
        {{ Form::label('title', __('Title'), ['class' => 'form-control-label']) }}
        {{ Form::text('title', null, ['class' => 'form-control', 'required' => 'required']) }}
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('date', __('Date'), ['class' => 'form-control-label']) }}
        {{ Form::text('date', date('Y-m-d'), ['class' => 'form-control datepicker']) }}
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('type', __('commision_type'), ['class' => 'form-control-label']) }}
        {{ Form::select('type', [ "$" => __('commission_budget'), "%" => __('commission_percentage') ], null, ['class' => 'form-control', 'id' => 'commission_type', 'required' => 'required']) }}
    </div>
    <div class="form-group col-md-6" id="total_budget_field" style="display: none;">
        {{ Form::label('total_budget', __('Total Budget'), ['class' => 'form-control-label']) }}
        {{ Form::number('total_budget', null, ['class' => 'form-control', 'step' => '0.01', 'id' => 'total_budget']) }}
    </div>
    <div class="form-group col-md-6" id="percentage_field" style="display: none;">
        {{ Form::label('percentage', __('Percentage (%)'), ['class' => 'form-control-label']) }}
        {{ Form::number('percentage', null, ['class' => 'form-control', 'step' => '0.01', 'id' => 'percentage']) }}
    </div>
    <div class="form-group col-md-6" id="commission_amount_field" style="display: none;">
        {{ Form::label('commission_amount', __('Commission Amount'), ['class' => 'form-control-label']) }}
        {{ Form::number('commission_amount', null, ['class' => 'form-control', 'readonly' => true, 'id' => 'commission_amount']) }}
    </div>
    <div class="form-group col-md-6" id="amount_field">
        {{ Form::label('amount', __('Amount'), ['class' => 'form-control-label']) }}
        {{ Form::number('amount', null, ['class' => 'form-control', 'required' => 'required', 'step' => '0.01', 'id' => 'amount']) }}
    </div>
    <div class="col-12">
        <input type="submit" value="{{ __('Create') }}" class="btn btn-primary">
    </div>
</div>
{{ Form::close() }}

<!-- Add jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Show/hide fields based on commission type
        $('#commission_type').change(function() {
            if ($(this).val() === '%') {
                $('#total_budget_field').show(); // Show total budget field
                $('#percentage_field').show(); // Show percentage field
                $('#commission_amount_field').show(); // Show commission amount field
                $('#amount_field').hide(); // Hide amount field
            } else {
                $('#total_budget_field').hide(); // Hide total budget field
                $('#percentage_field').hide(); // Hide percentage field
                $('#commission_amount_field').hide(); // Hide commission amount field
                $('#amount_field').show(); // Show amount field
            }
        });

        // Calculate commission amount when percentage or total budget changes
        $('#percentage, #total_budget').on('input', function() {
            let percentage = parseFloat($('#percentage').val());
            let totalBudget = parseFloat($('#total_budget').val());

            if (!isNaN(percentage) && percentage >= 0 && percentage <= 100 && !isNaN(totalBudget) && totalBudget >= 0) {
                let calculatedAmount = (totalBudget * percentage) / 100;
                $('#commission_amount').val(calculatedAmount.toFixed(2)); // Set calculated amount
                $('#amount').val(calculatedAmount.toFixed(2)); // Also update the hidden amount field
            } else {
                $('#commission_amount').val(''); // Clear commission amount if inputs are invalid
                $('#amount').val('');
            }
        });
    });
</script>
