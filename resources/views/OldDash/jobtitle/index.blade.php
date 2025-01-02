@extends('layouts.admin')

@section('page-title')
    {{__('Job Titles')}}
@endsection

@section('action-button')
    <div class="all-button-box row d-flex justify-content-end">
        @can('Create Employee')
            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
                <a href="#" data-url="{{ route('jobtitle.create') }}" class="btn btn-primary" data-ajax-popup="true" data-title="{{__('Create New')}}">
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
                                    <th>{{__('Name')}}</th>
                                    <th>{{__('Name_ar')}}</th>
                                    <th width="200px">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody class="font-style">
                                @foreach ($jobtitles as $jobtitle)
                                    <tr>
                                        <td>{{ $jobtitle->name }}</td>
                                        <td>{{ $jobtitle->name_ar }}</td>
                                        <td class="Action text-right">
                                            <span>
                                                @can('Edit Employee')
                                                    <a href="#" class="edit-icon btn btn-success" data-url="{{ URL::to('jobtitle/'.$jobtitle->id.'/edit') }}" data-size="lg" data-ajax-popup="true" data-title="{{__('Edit')}}" data-toggle="tooltip" data-original-title="{{__('Edit')}}"><i class="fa fa-edit"></i></a>
                                                @endcan
                                                @can('Delete Employee')
                                                    <a href="#" class="delete-icon btn btn-danger" data-toggle="tooltip" data-original-title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$jobtitle->id}}').submit();"><i class="fa fa-trash"></i></a>
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['jobtitle.destroy', $jobtitle->id],'id'=>'delete-form-'.$jobtitle->id]) !!}
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

@endsection

