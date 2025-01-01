@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Job Titles') }}
@endsection

@section('content')

    <div class="row">
        <!-- Card for Job Title Update -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5>{{ __('Update Job Title') }}</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <!-- Form for Editing Job Title -->
                        {{ Form::model($jobtitle, ['route' => ['jobtitle.update', $jobtitle->id], 'method' => 'PUT']) }}

                        <div class="row">
                            <!-- Job Title Name -->
                            <div class="col-12">
                                <div class="form-group">
                                    {{ Form::label('name', __('Name'), ['class' => 'form-control-label']) }}
                                    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('Enter Name')]) }}
                                    @error('name')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Job Title Name (Arabic) -->
                            <div class="col-12">
                                <div class="form-group">
                                    {{ Form::label('name_ar', __('Name_ar'), ['class' => 'form-control-label']) }}
                                    {{ Form::text('name_ar', null, ['class' => 'form-control', 'placeholder' => __('Enter Name in Arabic')]) }}
                                    @error('name_ar')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Form Action Buttons -->
                            <div class="col-12 d-flex justify-content-end gap-2">
                                <!-- Update Button -->
                                <input type="submit" value="{{ __('Update') }}" class="btn btn-primary">
                                <!-- Cancel Button -->
                                <input type="button" value="{{ __('Cancel') }}" class="btn btn-secondary" data-dismiss="modal">
                            </div>
                        </div>

                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
