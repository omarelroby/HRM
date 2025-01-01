@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Job Titles') }}
@endsection

@section('content')
    <div class="row">
        <!-- Create New Button (Triggers Modal) -->
        <div class="d-flex justify-content-end mb-3">
            @can('Create Employee')
                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#addJobTitleModal" class="btn btn-primary">
                        <i class="fa fa-plus"></i> {{ __('Create') }}
                    </a>
                </div>
            @endcan
        </div>

        <!-- Card for Job Titles List -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5>{{ __('Job Titles List') }}</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        {{Form::model($jobtitle,array('route' => array('jobtitle.update', $jobtitle->id), 'method' => 'PUT')) }}
                        <div class="row">
                            <div class="col-12">
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

                            <div class="col-12">
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
                                <input type="submit" value="{{__('Update')}}" class="btn btn-primary">
                                <input type="button" value="{{__('Cancel')}}" class="btn btn-white" data-dismiss="modal">
                            </div>
                        </div>
                    {{Form::close()}}

                    </div>
                </div>
            </div>
        </div>
    </div>
 

@endsection


