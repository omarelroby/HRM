<div class="card bg-none card-box">
    {{Form::open(array('url'=>'leave','method'=>'post'))}}
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
        <div class="col-md-6">
            <div class="form-group">
                {{Form::label('leave_type_id',__('Leave Type'))}}
                <select name="leave_type_id" id="leave_type_id" class="form-control select2">
                    @foreach($leavetypes as $leave)
                        <option value="{{ $leave->id }}">{{ $leave->title }} (<p class="float-right pr-5">{{ $leave->days }}</p>)</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group col-md-6">
            {{ Form::label('ticket', __('Ticket'),['class'=>'form-control-label']) }}
            {{ Form::select('ticket', [ "1" => __('worth_ticket') , "0" => __('non_worth_ticket') ],null, array('class' => 'form-control','required'=>'required')) }}
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
                {{Form::label('leave_reason',__('Leave Reason'))}}
                {{Form::textarea('leave_reason',null,array('class'=>'form-control','placeholder'=>__('Leave Reason')))}}
            </div>
        </div>
    </div>
     <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                {{Form::label('leave_reason',__('Leave Reason_ar'))}}
                {{Form::textarea('leave_reason_ar',null,array('class'=>'form-control','placeholder'=>__('Leave Reason ar')))}}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                {{Form::label('remark',__('Remark'))}}
                {{Form::textarea('remark',null,array('class'=>'form-control','placeholder'=>__('Leave Remark')))}}
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                {{Form::label('remark',__('Remark_ar'))}}
                {{Form::textarea('remark_ar',null,array('class'=>'form-control','placeholder'=>__('Leave Remark ar')))}}
            </div>
        </div>
        <div class="col-12">
            <input type="submit" value="{{__('Create')}}" class="btn btn-primary">
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
