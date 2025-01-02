    {{Form::open(array('url'=>'overtime','method'=>'post'))}}
    {{ Form::hidden('employee_id',$employee->id, array()) }}
    <div class="row">
        <div class="form-group col-md-12">
            {{ Form::label('title', __('Overtime Title*'),['class'=>'form-control-label']) }}
            {{ Form::text('title',null, array('class' => 'form-control ','required'=>'required')) }}
        </div>
        <div class="form-group col-md-6">
            {{Form::label('date',__('Date'),['class'=>'form-control-label'])}}
            {{Form::text('date',date('Y-m-d'),array('class'=>'form-control datepicker'))}}
        </div>
        <div class="form-group col-md-6">
            {{ Form::label('hours', __('Hours'),['class'=>'form-control-label']) }}
            {{ Form::number('hours',null, array('class' => 'form-control ','onkeyup' => 'calculateOvertimeRate('.$employee->id.')','required'=>'required','step'=>'0.01')) }}
        </div>
        <div class="form-group col-md-6">
            {{ Form::label('rate', __('Rate'),['class'=>'form-control-label']) }}
            {{ Form::number('rate',null, array('class' => 'form-control ','required'=>'required','step'=>'0.01')) }}
        </div>
        <div class="col-12">
            <input type="submit" value="{{__('Create')}}" class="btn btn-primary">
            {{-- <input type="button" value="{{__('Cancel')}}" class="btn btn-white" data-dismiss="modal"> --}}
        </div>
    </div>
    {{ Form::close() }}
