@extends('layouts.admin')

@section('page-title')
    {{__('Notifications')}}
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
                                    <th>{{__('notification title')}}</th>
                                    <th>{{__('notification body')}}</th>
                                    <th width="200px">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody class="font-style">
                                @foreach($notifications as $notification)
                                    <tr>
                                        <td>{{ $notification['title'.$lang] }}</td>
                                        <td>{{ $notification['body'.$lang] }}</td>
                                        <td class="Action text-right">
                                            <span>
                                                @can('Manage Employee')
                                                    <a href="#" class="delete-icon btn btn-danger btn btn-danger" data-toggle="tooltip" data-original-title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$notification->id}}').submit();"><i class="fa fa-trash"></i></a>
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['notifications.destroy', $notification->id],'id'=>'delete-form-'.$notification->id]) !!}
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

