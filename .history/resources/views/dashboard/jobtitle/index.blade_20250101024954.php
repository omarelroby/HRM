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
                        <table class="table table-striped table-bordered table-hover dataTables">
                            <thead>
                                <tr>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Name_ar') }}</th>
                                    <th width="200px">{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jobtitles as $jobtitle)
                                    <tr>
                                        <td>{{ $jobtitle->name }}</td>
                                        <td>{{ $jobtitle->name_ar }}</td>
                                        <td class="text-right">
                                            <div class="btn-group" role="group">
                                                @can('Edit Employee')
                                                    <a href="#" class="btn btn-success btn-sm" data-url="{{ URL::to('jobtitle/'.$jobtitle->id.'/edit') }}" data-size="lg" data-ajax-popup="true" data-title="{{ __('Edit') }}" data-toggle="tooltip" data-original-title="{{ __('Edit') }}">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                @endcan

                                                @can('Delete Employee')
                                                    <a href="#" class="btn btn-danger btn-sm" data-toggle="tooltip" data-original-title="{{ __('Delete') }}" data-confirm="{{ __('Are you sure?') }}|{{ __('This action cannot be undone. Do you want to continue?') }}" data-confirm-yes="document.getElementById('delete-form-{{$jobtitle->id}}').submit();">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['jobtitle.destroy', $jobtitle->id], 'id' => 'delete-form-' . $jobtitle->id]) !!}
                                                    {!! Form::close() !!}
                                                @endcan
                                            </div>
                                        </td>
                                        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Job Title Modal -->
    <div class="modal fade" id="addJobTitleModal" tabindex="-1" aria-labelledby="addJobTitleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addJobTitleModalLabel">{{ __('Add New Job Title') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Form for Creating Job Title -->
                {{ Form::open(array('url' => 'jobtitle', 'method' => 'post')) }}
                <div class="modal-body">
                    <div class="row">
                        <!-- Job Title Name -->
                        <div class="col-12">
                            <div class="form-group">
                                {{ Form::label('name', __('Name'), ['class' => 'form-control-label']) }}
                                {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('Enter Name')]) }}
                                @error('name')
                                <span class="invalid-name" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Job Title Name Arabic -->
                        <div class="col-12">
                            <div class="form-group">
                                {{ Form::label('name_ar', __('Name_ar'), ['class' => 'form-control-label']) }}
                                {{ Form::text('name_ar', null, ['class' => 'form-control', 'placeholder' => __('Enter Name in Arabic')]) }}
                                @error('name_ar')
                                <span class="invalid-name_ar" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <input type="submit" value="{{ __('Create') }}" class="btn btn-primary">
                    <input type="button" value="{{ __('Cancel') }}" class="btn btn-secondary" data-bs-dismiss="modal">
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>

@endsection
