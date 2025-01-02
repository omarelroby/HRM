@extends('dashboard.layouts.master')
@section('content')
    <div class="row">
        <!-- Button to trigger Create Modal -->
        <div class="all-button-box row d-flex justify-content-end mb-4">
            @can('Create Employee')
                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
                    <a href="#"
                       data-url="{{ route('nationality.create') }}"
                       class="btn btn-primary btn-icon-only width-auto"
                       data-ajax-popup="true"
                       data-title="{{__('Create New')}}"
                       data-toggle="modal" data-target="#createNationalityModal">
                        <i class="fa fa-plus"></i> {{__('Create')}}
                    </a>
                </div>
            @endcan
        </div>

        <!-- Nationalities List -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5>{{__('Employee Attendance Movement')}}</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                         
                    </div>
                    <table class="table table-striped table-bordered table-hover dataTables" >
                        <thead>
                            <tr>
                                <th>{{__('Start Date')}}</th>
                                <th>{{__('End Date')}}</th>
                                <th>{{__('Status')}}</th>
                                <th width="200px">{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody class="font-style">
                            @foreach ($AttendanceMovements as $Attendancemovement)
                                <tr>
                                    <td>{{ $Attendancemovement->start_movement_date }}</td>
                                    <td>{{ $Attendancemovement->end_movement_date }}</td>
                                    <td>{{ $Attendancemovement->status ?  __('closed') : __('opened') }}</td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Create Nationality -->
    <div class="modal fade" id="createNationalityModal" tabindex="-1" role="dialog" aria-labelledby="createNationalityModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createNationalityModalLabel">{{__('Employee attendance movement')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{Form::open(array('url'=>'attendancemovement','method'=>'post'))}}
                    <div class="row">

                        <div class="col-12">
                            <div class="form-group">
                                {{Form::label('start_movement_date',__('Movement start date'),['class'=>'form-control-label'])}}
                                {{Form::date('start_movement_date',null,array('class'=>'form-control'))}}
                                @error('start_movement_date')
                                <span class="invalid-name" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <input type="submit" value="{{__('Create')}}" class="btn btn-primary">
                            <input type="button" value="{{__('Cancel')}}" class="btn btn-white" data-dismiss="modal">
                        </div>

                    </div>
                {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
@endsection
