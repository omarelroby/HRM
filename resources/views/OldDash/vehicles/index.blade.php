@extends('layouts.admin')

@section('page-title')
    {{__('vehicles list')}}
@endsection

@section('action-button')
    <div class="all-button-box row d-flex justify-content-end">
        @can('Create Travel')
            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
            <a href="#" data-url="{{ route('vehicle.create') }}" class="btn btn-primary btn-icon-only width-auto" data-ajax-popup="true" data-title="{{__('Create New vehicle')}}">
                <i class="fa fa-plus"></i> {{__('Create')}}
            </a>
            </div>
        @endcan
    </div>
@endsection

@section('content')
    <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5></h5>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables" >
                                <thead>
                                    <tr>
                                        <th>{{__('vehicle_type')}}</th>
                                        <th>{{__('model')}}</th>
                                        <th>{{__('registration_date')}}</th>
                                        <th>{{__('insurance_date')}}</th>
                                        <th>{{__('check_date')}}</th>
                                        @if(Gate::check('Edit Travel') || Gate::check('Delete Travel'))
                                            <th width="3%">{{ __('Action') }}</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody class="font-style">
                                    @foreach($vehicles as $vehicle)
                                        <tr>
                                            
                                            <td>{{ $vehicle->vehicle_type }}</td>
                                            <td>{{ $vehicle->model }}</td>
                                            <td>{{ \Auth::user()->dateFormat( $vehicle->registration_date) }}</td>
                                            <td>{{ \Auth::user()->dateFormat( $vehicle->insurance_date) }}</td>
                                            <td>{{ \Auth::user()->dateFormat( $vehicle->check_date) }}</td>
                                            @if(Gate::check('Edit Travel') || Gate::check('Delete Travel'))
                                                <td class="text-right action-btns">
                                                    @can('Edit Travel')
                                                        <a href="#" data-url="{{ URL::to('vehicle/'.$vehicle->id.'/edit') }}" data-size="lg" data-ajax-popup="true" data-title="{{__('Edit Trip')}}" class="edit-icon btn btn-success" data-toggle="tooltip" data-original-title="{{__('Edit Trip')}}"><i class="fa fa-edit"></i></a>
                                                    @endcan
                                                    @can('Delete Travel')
                                                        <a href="#" class="delete-icon btn btn-danger" data-toggle="tooltip" data-original-title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$vehicle->id}}').submit();"><i class="fa fa-trash"></i></a>
                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['vehicle.destroy', $vehicle->id],'id'=>'delete-form-'.$vehicle->id]) !!}
                                                        {!! Form::close() !!}
                                                    @endcan
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

