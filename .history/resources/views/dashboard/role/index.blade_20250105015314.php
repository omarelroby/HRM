@extends('dashboard.layouts.master')
@section('page-title')
    {{__('Manage Roles')}}
@endsection

@section('action-button')
 
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
                                    <th>{{__('Role')}}</th>
                                    <th>{{__('Permissions')}}</th>
                                    <th width="3%">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                    <tr>
                                        <td class="Role">{{ $role->name }}</td>
                                        <td class="Permission">
                                            @foreach($role->permissions()->pluck('name') as $permission)
                                                <a href="#" class="absent-btn">{{$permission}}</a>
                                            @endforeach
                                        </td>
                                        <td style="display:flex">
                                            @can('Edit Role')
                                                <a href="#" data-url="{{ URL::to('roles/'.$role->id.'/edit') }}" data-size="lg" data-ajax-popup="true" data-title="{{__('Edit Role')}}" class="edit-icon btn btn-success" data-toggle="tooltip" data-original-title="{{__('Edit')}}"><i class="fa fa-edit"></i></a>
                                            @endcan
                                            @if($role->name!='employee')
                                                @can('Delete Role')
                                                    <a href="#" class="delete-icon btn btn-danger" data-toggle="tooltip" data-original-title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$role->id}}').submit();"><i class="fa fa-trash"></i></a>
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id],'id'=>'delete-form-'.$role->id]) !!}
                                                    {!! Form::close() !!}
                                                @endcan
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
