<div class="card bg-none card-box">
    {{Form::model($employee_request,array('route' => array('employee_requests.update', $employee_request->id), 'method' => 'PUT')) }}
    @if($employeeId) {{ Form::hidden('employee_id',$employeeId, array()) }} @endif
    @if(\Auth::user()->type !='employee')
        @if(!$employeeId)
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        {{Form::label('employee_id',__('Employee'))}}
                        {{Form::select('employee_id',$employees,null,array('class'=>'form-control select2','id'=>'employee_id','placeholder'=>__('Select Employee')))}}
                    </div>
                </div>
            </div>
        @endif
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                {{Form::label('request_type_id',__('Request_type'))}}
                {{Form::select('request_type_id',$leavetypes,null,array('class'=>'form-control select2','placeholder'=>__('Select Leave Type')))}}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {{Form::label('start_date',__('Start Date'))}}
                {{Form::text('start_date',null,array('class'=>'form-control datepicker'))}}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{Form::label('end_date',__('End Date'))}}
                {{Form::text('end_date',null,array('class'=>'form-control datepicker'))}}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                {{Form::label('request_reason',__('Request Reason'))}}
                {{Form::textarea('request_reason',null,array('class'=>'form-control','placeholder'=>__('Request Reason')))}}
            </div>
        </div>
    </div>

        
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                {{Form::label('request_reason_ar',__('Request Reason ar'))}}
                {{Form::textarea('request_reason_ar',null,array('class'=>'form-control','placeholder'=>__('Request Reason ar')))}}
            </div>
        </div>
    </div>

    <div class="row">
        @role('Company')
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    {{Form::label('status',__('Status'))}}
                    <select name="status" id="" class="form-control select2">
                        <option value="">{{__('Select Status')}}</option>
                        <option value="pending" @if($employee_request->status=='Pending') selected="" @endif>{{__('Pending')}}</option>
                        <option value="approval" @if($employee_request->status=='Approval') selected="" @endif>{{__('Approval')}}</option>
                        <option value="reject" @if($employee_request->status=='Reject') selected="" @endif>{{__('Reject')}}</option>
                    </select>
                </div>
            </div>
        </div>
        @endrole
        <div class="row">
            <div class="col-12">
                <input type="submit" value="{{__('Update')}}" class="btn btn-primary">
                <input type="button" value="{{__('Cancel')}}" class="btn btn-white" data-dismiss="modal">
            </div>
        </div>
    {{Form::close()}}
</div>

<script>
    $(function () {
        $(".gregorian-date , .datepicker").hijriDatePicker({
        format:'YYYY-M-D',
        showSwitcher: false,
        hijri:false,
        useCurrent: true,
        });
    });
</script>