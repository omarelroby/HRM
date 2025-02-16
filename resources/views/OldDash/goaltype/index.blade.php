@extends('layouts.admin')

@section('page-title')
    {{__('Manage Goal Type')}}
@endsection

@section('action-button')
    <div class="all-button-box row d-flex justify-content-end">
        @can('Create Goal Type')
            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
            <a href="#" data-url="{{ route('goaltype.create') }}" class="btn btn-primary btn-icon-only width-auto" data-ajax-popup="true" data-title="{{__('Create New Goal Type')}}">
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
                                    <th>{{__('Goal Type')}}</th>
                                    <th width="200px">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody class="font-style">
                                @foreach ($goaltypes as $goaltype)
                                    <tr>
                                        <td>{{ $goaltype->name }}</td>
                                        <td>
                                            @can('Edit Goal Type')
                                                <a href="#" data-url="{{ route('goaltype.edit',$goaltype->id) }}" data-size="lg" data-ajax-popup="true" data-title="{{__('Edit Goal Type')}}" class="edit-icon btn btn-success"><i class="fa fa-edit"></i></a>
                                            @endcan
                                            @can('Delete Goal Type')
                                                <a href="#" class="delete-icon btn btn-danger" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$goaltype->id}}').submit();"><i class="fa fa-trash"></i></a>
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['goaltype.destroy', $goaltype->id],'id'=>'delete-form-'.$goaltype->id]) !!}
                                                {!! Form::close() !!}
                                            @endif
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
@endsection

