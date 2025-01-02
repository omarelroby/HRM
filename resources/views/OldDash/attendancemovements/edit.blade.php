
{{Form::model($AttendanceMovement,array('route' => array('attendancemovement.update', $AttendanceMovement->id), 'method' => 'PUT')) }}
    <div class="row">
        
        <div class="col-12">
            <div class="form-group">
                {{Form::label('start_movement_date',__('Movement start date'),['class'=>'form-control-label'])}}
                {{Form::date('start_movement_date',null,array('class'=>'form-control'))}}
                @error('start_movement_date')
                <span class="invalid-name" role="alert">
                    <strong class="text-danger">{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="col-12">
            <div class="form-group">
                {{ Form::label('status', __('Status'),['class'=>'form-control-label']) }}
                {!! Form::select('status', ['1' => __('closed') , '' => __('opened')], null,array('class' => 'form-control','required'=>'required')) !!}
            </div>
        </div>
        
        <div class="col-12">
            <input type="submit" value="{{__('Update')}}" class="btn btn-primary">
            <input type="button" value="{{__('Cancel')}}" class="btn btn-white" data-dismiss="modal">
        </div>
    </div>
{{Form::close()}}

