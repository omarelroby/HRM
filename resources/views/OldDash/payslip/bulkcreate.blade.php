    {{Form::open(array('url'=>'payslip/bulkpayment/'.$date,'method'=>'post'))}}
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                {{ __('Total Unpaid Employee') }} <b>{{ count($unpaidEmployees) }}</b> {{_('out of')}} <b>{{ count($Employees) }}</b>
            </div>
        </div>
        <div class="col-12">
            <input type="submit" value="{{__('Bulk Payment')}}" class="btn btn-primary">
            <input type="button" value="{{__('Cancel')}}" class="btn btn-white" data-bs-dismiss="modal">
        </div>
    </div>
    {{Form::close()}}
