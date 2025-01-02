    {{ Form::model($Employeeinfo, array('route' => array('employee.update', $Employeeinfo->id), 'method' => 'PUT' , 'enctype' => 'multipart/form-data')) }}
    <input type="hidden" name="update_probationDuration">
    @csrf
    <div class="card-body p-0">
        <div class="row">
            <div class="col-md-6" id="probation_input_duration">
                <div class="form-group">
                    {{ Form::label('probation_periods_duration', __('probation_periods_duration'),['class'=>'form-control-label']) }}
                    {{ Form::text('probation_periods_duration', old('probation_periods_duration'), array('class' => 'form-control' , 'value' => '90')) }}
                </div>
            </div>
        </div>
        
        <div class="col-12">
            <input type="submit" value="{{__('Create')}}" class="btn btn-primary">
            <input type="button" value="{{__('Cancel')}}" class="btn btn-white" data-dismiss="modal">
        </div>
    </div>
    {{Form::close()}}
