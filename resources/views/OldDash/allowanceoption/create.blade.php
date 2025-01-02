    {{Form::open(array('url'=>'allowanceoption','method'=>'post'))}}
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                {{Form::label('name',__('Name'),['class'=>'form-control-label'])}}
                {{Form::text('name',null,array('class'=>'form-control','placeholder'=>__('Enter Allowance option Name')))}}
                @error('name')
                <span class="invalid-name" role="alert">
                    <strong class="text-danger">{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                {{Form::label('name_ar',__('Name_ar'),['class'=>'form-control-label'])}}
                {{Form::text('name_ar',null,array('class'=>'form-control','placeholder'=>__('Enter Allowance option Name arabic')))}}
                @error('name_ar')
                <span class="invalid-name" role="alert">
                    <strong class="text-danger">{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group col-md-12">
            {{ Form::label('insurance_active', __('added_to_insurance'),['class'=>'form-control-label']) }}
            {{ Form::select('insurance_active', [ "0" => __('no') , "1" => __('yes') ],null, array('class' => 'form-control','required'=>'required')) }}
        </div>

        <div class="form-group col-md-12">
            {{ Form::label('payroll_dispaly', __('added_to_payroll'),['class'=>'form-control-label']) }}
            {{ Form::select('payroll_dispaly', [ null => __('no') , "1" => __('yes') ],null, array('class' => 'form-control','required'=>'required')) }}
        </div>

        <div class="col-12">
            <input type="submit" value="{{__('Create')}}" class="btn btn-primary">
            <input type="button" value="{{__('Cancel')}}" class="btn btn-white" data-dismiss="modal">
        </div>
    </div>
    {{Form::close()}}
