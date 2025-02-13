@extends('layouts.admin')

@section('page-title')
    {{__('Manage Termination')}}
@endsection

@section('action-button')
    <div class="all-button-box row d-flex justify-content-end">
        @can('Create Termination')
            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
                <a href="#" data-url="{{ route('termination.create') }}" class="btn btn-primary btn-icon-only width-auto" data-ajax-popup="true" data-title="{{__('Create New Termination')}}">
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
                                        @role('company')
                                        <th>{{__('Employee Name')}}</th>
                                        @endrole
                                        <th>{{__('Termination Type')}}</th>
                                        <th>{{__('Notice Date')}}</th>
                                        <th>{{__('Termination Date')}}</th>
                                        <th>{{__('Description')}}</th>
                                        @if(Gate::check('Edit Termination') || Gate::check('Delete Termination'))
                                            <th width="3%">{{ __('Action') }}</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody class="font-style">
                                    @foreach ($terminations as $termination)
                                        <tr>
                                            @role('company')
                                            <td>{{ !empty($termination->employee())?$termination->employee()->name:'' }}</td>
                                            @endrole

                                            <td>{{ !empty($termination->terminationType())?$termination->terminationType()->name:'' }}</td>
                                            <td>{{  \Auth::user()->dateFormat($termination->notice_date) }}</td>
                                            <td>{{  \Auth::user()->dateFormat($termination->termination_date) }}</td>
                                            <td>{{ $termination->description }}</td>
                                            @if(Gate::check('Edit Termination') || Gate::check('Delete Termination'))
                                                <td class="text-right action-btns">
                                                    @can('Edit Termination')
                                                        <a href="#" data-url="{{ URL::to('termination/'.$termination->id.'/edit') }}" data-size="lg" data-ajax-popup="true" data-title="{{__('Edit Termination')}}" class="edit-icon btn btn-success" data-toggle="tooltip" data-original-title="{{__('Edit')}}"><i class="fa fa-edit"></i></a>
                                                    @endcan
                                                    @can('Delete Termination')
                                                        <a href="#" class="delete-icon btn btn-danger" data-toggle="tooltip" data-original-title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$termination->id}}').submit();"><i class="fa fa-trash"></i></a>
                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['termination.destroy', $termination->id],'id'=>'delete-form-'.$termination->id]) !!}
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

