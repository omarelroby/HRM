    {{Form::model($department,array('route' => array('department.update', $department->id), 'method' => 'PUT')) }}
    <div class="row ">
        <div class="col-12">
            <div class="form-group">
                {{Form::label('branch_id',__('Branch'))}}
                {{Form::select('branch_id',$branch,null,array('class'=>'form-control select2 ','placeholder'=>__('select Branch')))}}
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                {{Form::label('employee_id',__('Employee'))}}
                {{Form::select('employee_id',$employees,null,array('class'=>'form-control select2','id'=>'employee_id','placeholder'=>__('Select Employee')))}}
            </div>
        </div>
        
        <div class="col-12">
            <div class="form-group">
                {{Form::label('name',__('Name'))}}
                {{Form::text('name',null,array('class'=>'form-control','placeholder'=>__('Enter Department Name')))}}
                @error('name')
                <span class="invalid-name" role="alert">
                    <strong class="text-danger">{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                {{Form::label('name_ar',__('Name_ar'),['class'=>'form-control-label'])}}
                {{Form::text('name_ar',null,array('class'=>'form-control','placeholder'=>__('Enter Department Name arabic')))}}
                @error('name_ar')
                <span class="invalid-name" role="alert">
                    <strong class="text-danger">{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="col-12">
            <input type="submit" value="{{__('Update')}}" class="btn btn-primary">
            <input type="button" value="{{__('Cancel')}}" class="btn btn-white" data-dismiss="modal">
        </div>
    </div>
    {{Form::close()}}
