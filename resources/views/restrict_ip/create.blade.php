    {{Form::open(array('route'=>array('create.ip'),'method'=>'post'))}}
    <div class="row">
        <div class="form-group col-md-12">
            {{Form::label('ip',__('IP'),['class'=>'form-control-label'])}}
            {{Form::text('ip',null,array('class'=>'form-control'))}}
        </div>
        <div class="col-12">
            <input type="submit" value="{{__('Create')}}" class="btn btn-primary">
            <input type="button" value="{{__('Cancel')}}" class="btn btn-white" data-dismiss="modal">
        </div>
    </div>
    {{Form::close()}}
