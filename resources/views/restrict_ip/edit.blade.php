
    {{Form::model($ip,array('route' => array('edit.ip', $ip->id), 'method' => 'POST')) }}
    <div class="row">
        <div class="form-group col-md-12">
            {{Form::label('ip',__('IP'),['class'=>'form-control-label'])}}
            {{Form::text('ip',null,array('class'=>'form-control'))}}
        </div>
        <div class="col-12">
            <input type="submit" value="{{__('Update')}}" class="btn btn-primary">
            <input type="button" value="{{__('Cancel')}}" class="btn btn-white" data-dismiss="modal">
        </div>
    </div>
    {{Form::close()}}

