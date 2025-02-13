    {!! Form::open(['route' => 'user.store','method' => 'post']) !!}
    @csrf
    <div class="row">
        
        <div class="form-group col-lg-6 col-md-6">
            {!! Form::label('name', __('Name'),['class'=>'form-control-label']) !!}
            {!! Form::text('name', null, ['class' => 'form-control','required' => 'required']) !!}
        </div>
        
        <div class="form-group col-lg-6 col-md-6">
            {!! Form::label('email', __('Email'),['class'=>'form-control-label']) !!}
            {!! Form::text('email', null, ['class' => 'form-control','required' => 'required']) !!}
        </div>

        <div class="form-group col-lg-6 col-md-6">
            {!! Form::label('password', __('Password'),['class'=>'form-control-label']) !!}
            {!! Form::password('password', ['class' => 'form-control','required' => 'required']) !!}
        </div>

        @if(\Auth::user()->type != 'super admin')
            <div class="form-group col-lg-6 col-md-6">
                {{ Form::label('role', __('User Role'),['class'=>'form-control-label']) }}
                {!! Form::select('role', $roles, null,array('class' => 'form-control select2','required'=>'required')) !!}
                @error('role')
                <span class="invalid-role" role="alert">
                    <strong class="text-danger">{{ $message }}</strong>
                </span>
                @enderror
            </div>
        @endif

        <div class="col-md-12">
            <input type="submit" value="{{__('Create')}}" class="btn btn-primary">
            <input type="button" value="{{__('Cancel')}}" class="btn btn-white" data-dismiss="modal">
        </div>
    </div>
    {!! Form::close() !!}
