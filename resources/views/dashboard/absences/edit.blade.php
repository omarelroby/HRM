    {{Form::model($Absence,array('route' => array('absence.update', $Absence->id), 'method' => 'PUT')) }}
    <div class="card-body p-0">
        <div class="row">
        <div class="form-group col-md-6">
            {{ Form::label('type', __('Absent Type'),['class'=>'form-control-label']) }}
            <select class="form-control" name="type">
                <option value="V" @if($Absence->type == 'V') selected @endif> V - أجازة</option>
                <option value="S" @if($Absence->type == 'S') selected @endif> S - مرضى </option>
                <option value="A" @if($Absence->type == 'A') selected @endif> A - غياب بإذن </option>
                <option value="X" @if($Absence->type == 'X') selected @endif> X - غياب بدون إذن</option>
            </select>
        </div>

        <div class="form-group col-md-6">
            {{ Form::label('number_of_days', __('Number of days'),['class'=>'form-control-label']) }}
            {{ Form::number('number_of_days',null, array('class' => 'form-control ','required'=>'required','step'=>'0.01')) }}
        </div>

        <div class="form-group col-md-6">
            {{Form::label('start_date',__('Start Date'),['class'=>'form-control-label'])}}
            {{Form::text('start_date',null,array('class'=>'form-control datepicker'))}}
        </div>
        <div class="col-12">
            <input type="submit" value="{{__('Update')}}" class="btn btn-primary">
            <input type="button" value="{{__('Cancel')}}" class="btn btn-white" data-dismiss="modal">
        </div>
    </div>
    {{Form::close()}}

