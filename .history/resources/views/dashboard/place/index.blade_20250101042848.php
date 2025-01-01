@extends('dashboard.layouts.master')
@section('content')
    <div class="row">
        <!-- Button to trigger Create Modal -->
        <div class="all-button-box row d-flex justify-content-end mb-4">
            @can('Create Employee')
                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
                    <a href="#"
                       class="btn btn-primary btn-icon-only width-auto"
                       data-toggle="modal"
                       data-target="#createEmployeeShiftModal">
                        <i class="fa fa-plus"></i> {{ __('Create Employee Shift') }}
                    </a>
                </div>
            @endcan
        </div>
        <!-- Employee Shifts List -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5>{{ __('Employee Shifts List') }}</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables" >
                            <thead>
                                <tr>
                                    <th>{{__('Location')}}</th>
                                    <th width="200px">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody class="font-style">
                                @foreach ($places as $place)
                                    <tr>
                                        <td>{{ $place->name }}</td>
                                        <td class="Action text-right">
                                            <span>
                                                @can('Edit Branch')
                                                    <a href="#" class="edit-icon btn btn-success" data-url="{{ URL::to('place/'.$place->id.'/edit') }}" data-size="lg" data-ajax-popup="true" data-title="{{__('Edit Location')}}" data-toggle="tooltip" data-original-title="{{__('Edit')}}"><i class="fa fa-edit"></i></a>
                                                @endcan
                                                @can('Delete Branch')
                                                    <a href="#" class="delete-icon btn btn-danger" data-toggle="tooltip" data-original-title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$place->id}}').submit();"><i class="fa fa-trash"></i></a>
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['place.destroy', $place->id],'id'=>'delete-form-'.$place->id]) !!}
                                                    {!! Form::close() !!}
                                                @endcan
                                            </span>
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

    <!-- Modal for Create Employee Shift -->
    <div class="modal fade" id="createEmployeeShiftModal" tabindex="-1" role="dialog" aria-labelledby="createEmployeeShiftModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createEmployeeShiftModalLabel">{{ __('Create Employee Shift') }}</h5>
                </div>
                <div class="modal-body">
                    {{ Form::open(['url' => 'employee_shifts', 'method' => 'post']) }}
                    <div class="row">
                        <!-- Shift Name -->
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('name', __('Shift Name'), ['class' => 'form-control-label']) }}
                                {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('Enter Shift Name')]) }}
                                @error('name')
                                    <span class="invalid-name" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Shift Name Arabic -->
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('name_ar', __('Shift Name (Arabic)'), ['class' => 'form-control-label']) }}
                                {{ Form::text('name_ar', null, ['class' => 'form-control', 'placeholder' => __('Enter Shift Name in Arabic')]) }}
                                @error('name_ar')
                                    <span class="invalid-name" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Shift Days -->
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('shift_days', __('Shift Days'), ['class' => 'form-control-label']) !!}
                                <select required class="form-control select2" multiple name="shift_days[]">
                                    @foreach ($days as $key => $day)
                                        <option value="{{ $key }}">{{ $day }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Shift Start Date -->
                        <div class="col-md-4">
                            <div class="form-group">
                                {{ Form::label('shift_startdate', __('Shift Start Date'), ['class' => 'form-control-label']) }}
                                {{ Form::date('shift_startdate', null, ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <!-- Shift Start Time -->
                        <div class="col-md-4">
                            <div class="form-group">
                                {{ Form::label('shift_starttime', __('Shift Start Time'), ['class' => 'form-control-label']) }}
                                {{ Form::time('shift_starttime', null, ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <!-- Shift End Time -->
                        <div class="col-md-4">
                            <div class="form-group">
                                {{ Form::label('shift_endtime', __('Shift End Time'), ['class' => 'form-control-label']) }}
                                {{ Form::time('shift_endtime', null, ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <!-- Form Buttons -->
                        <div class="col-12 d-flex justify-content-between">
                            <input type="submit" value="{{ __('Create') }}" class="btn btn-primary">
                            <input type="button" value="{{ __('Cancel') }}" class="btn btn-white" data-dismiss="modal">
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
