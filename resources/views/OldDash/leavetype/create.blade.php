    {{Form::open(array('url'=>'leavetype','method'=>'post'))}}
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                {{Form::label('title',__('Leave Type'),['class'=>'form-control-label'])}}
                {{Form::text('title',null,array('class'=>'form-control','placeholder'=>__('Enter Leave Type Name')))}}
                @error('title')
                <span class="invalid-name" role="alert">
                    <strong class="text-danger">{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                {{Form::label('title_ar',__('Leave Type_ar'),['class'=>'form-control-label'])}}
                {{Form::text('title_ar',null,array('class'=>'form-control','placeholder'=>__('Enter Leave Type Name arabic')))}}
                @error('title_ar')
                <span class="invalid-name" role="alert">
                    <strong class="text-danger">{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                {{Form::label('days',__('Days Per Year'),['class'=>'form-control-label'])}}
                {{Form::number('days',null,array('class'=>'form-control','placeholder'=>__('Enter Days / Year')))}}
            </div>
        </div>
        <div class="col-12">
            <input type="submit" value="{{__('Create')}}" class="btn btn-primary">
            <input type="button" value="{{__('Cancel')}}" class="btn btn-white" data-dismiss="modal">
        </div>
    </div>
    {{Form::close()}}
