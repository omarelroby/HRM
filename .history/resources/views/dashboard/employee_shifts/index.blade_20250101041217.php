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
                       data-target="#createNationalityModal">
                        <i class="fa fa-plus"></i> {{ __('Create') }}
                    </a>
                </div>
            @endcan
        </div>

        <!-- Labor Companies List -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5>{{ __('workunits') }}</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables" >
                            <thead>
                                <tr>
                                    <th>{{__('Name')}}</th>
                                    <th>{{__('Name_ar')}}</th>
                                    <th width="200px">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody class="font-style">
                                @foreach ($employee_shifts as $employee_shift)
                                    <tr>
                                        <td>{{ $employee_shift->name }}</td>
                                        <td>{{ $employee_shift->name_ar }}</td>
                                        <td class="Action text-right">
                                            <span>
                                                @can('Edit Employee')
                                                    <a href="#" class="edit-icon btn btn-success" data-url="{{ URL::to('employee_shifts/'.$employee_shift->id.'/edit') }}" data-size="lg" data-ajax-popup="true" data-title="{{__('Edit')}}" data-toggle="tooltip" data-original-title="{{__('Edit')}}"><i class="fa fa-edit"></i></a>
                                                @endcan
                                                @can('Delete Employee')
                                                    <a href="#" class="delete-icon btn btn-danger" data-toggle="tooltip" data-original-title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$employee_shift->id}}').submit();"><i class="fa fa-trash"></i></a>
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['employee_shifts.destroy', $employee_shift->id],'id'=>'delete-form-'.$employee_shift->id]) !!}
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

    <!-- Modal for Create Labor Company -->
    <div class="modal fade" id="createNationalityModal" tabindex="-1" role="dialog" aria-labelledby="createNationalityModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createNationalityModalLabel">{{ __('workunits') }}</h5>
                </div>
                <div class="modal-body">
                    {{ Form::open(['url' => 'workunits', 'method' => 'post']) }}
                    <div class="row">
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

                        <div class="col-12">
                            <div class="form-group">
                                {{ Form::label('name_ar', __('Name_ar'), ['class' => 'form-control-label']) }}
                                {{ Form::text('name_ar', null, ['class' => 'form-control', 'placeholder' => __('Enter Name in Arabic')]) }}
                                @error('name_ar')
                                    <span class="invalid-name" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

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
