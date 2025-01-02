<div class="card bg-none card-box">
    {{Form::open(array('url'=>'employee_requests','method'=>'post'))}}
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
                <select name="request_type_id" id="request_type_id" class="form-control select2">
                    @foreach($requesttypes as $requesttype)
                        <option value="{{ $requesttype->id }}">{{$requesttype['name'.$lang]}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {{Form::label('start_date',__('Start Date'))}}
                {{Form::text('start_date',null,array('class'=>'form-control gregorian-date'))}}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{Form::label('end_date',__('End Date'))}}
                {{Form::text('end_date',null,array('class'=>'form-control gregorian-date'))}}
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
