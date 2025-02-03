@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Employee Request Type') }}
@endsection

@section('content')
    <div class="row">
        <!-- Card for Job Title Update -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5>{{ __('Update Sub Employee Request Type') }}</h5>
                </div>
                <div class="card-body">

                {{Form::model($subRequestType,array('route' => array('sub-request-type.update', $subRequestType->id), 'method' => 'PUT')) }}
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            {{Form::label('name',__('Name'),['class'=>'form-control-label'])}}
                            {{Form::text('name',null,array('class'=>'form-control','placeholder'=>__('Enter Name')))}}
                            @error('name')
                            <span class="invalid-name" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            {{Form::label('name_ar',__('Name_ar'),['class'=>'form-control-label'])}}
                            {{Form::text('name_ar',null,array('class'=>'form-control','placeholder'=>__('Enter Name arabic')))}}
                            @error('name')
                            <span class="invalid-name" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            {{ Form::label('request_type_id', __('Request Type'), ['class' => 'form-control-label']) }}
                            {{ Form::select('request_type_id', $request_types->pluck('name', 'id'), null, ['class' => 'form-control select2', 'placeholder' => __('Select Request Type')]) }}
                            @error('request_type_id')
                            <span class="invalid-request-type" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 my-2">
                        <input type="submit" value="{{__('Update')}}" class="btn btn-primary">
                        <input type="button" value="{{__('Cancel')}}" class="btn btn-white" data-dismiss="modal">
                    </div>
                </div>
                {{Form::close()}}


                </div>
            </div>
        </div>
    </div>
@endsection
e
