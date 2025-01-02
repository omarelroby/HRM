    {{Form::model($overtime,array('route' => array('overtime.update', $overtime->id), 'method' => 'PUT')) }}
    <div class="card-body p-0">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    {{ Form::label('title', __('Title')) }}
                    {{ Form::text('title',null, array('class' => 'form-control ','required'=>'required')) }}
                </div>
            </div>
            <div class="form-group col-md-6">
                {{Form::label('date',__('Date'),['class'=>'form-control-label'])}}
                {{Form::text('date',null,array('class'=>'form-control datepicker'))}}
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('hours', __('Hours')) }}
                    {{ Form::text('hours',null, array('class' => 'form-control ','onkeyup' => 'calculateOvertimeRate('.$overtime->employee_id.')','required'=>'required')) }}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('rate', __('Rate')) }}
                    {{ Form::number('rate',null, array('class' => 'form-control ','step' => '0.01','required'=>'required')) }}
                </div>
            </div>
        </div>
        <div class="col-12">
            <input type="submit" value="{{__('Update')}}" class="btn btn-primary">
            <input type="button" value="{{__('Cancel')}}" class="btn btn-white" data-dismiss="modal">
        </div>
    </div>
    {{Form::close()}}

