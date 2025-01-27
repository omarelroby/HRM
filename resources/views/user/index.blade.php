@extends('layouts.admin')
@section('page-title')
    @if(\Auth::user()  ->type=='super admin')
        {{__('Manage Companies')}}
    @else
        {{__('Manage Users')}}
    @endif
@endsection

@section('action-button')
    @can('Create User')
        <div class="all-button-box row d-flex justify-content-end">
            @if(\Auth::user()->type=='super admin')
                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
                    <a href="#" data-url="{{ route('user.create') }}" data-size="xl" data-ajax-popup="true" data-title="{{__('Create New Company')}}" class="btn btn-primary btn-icon-only width-auto">
                        <i class="fa fa-plus"></i> {{__('Create')}}
                    </a>
                </div>
            @else
                <!-- <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
                    <a href="#" data-url="{{ route('user.create') }}" data-size="xl" data-ajax-popup="true" data-title="{{__('Create New User')}}" class="btn btn-primary btn-icon-only width-auto">
                        <i class="fa fa-plus"></i> {{__('Create')}}
                    </a>
                </div> -->
            @endif
        </div>
    @endcan
@endsection

@php
    $profile=asset(Storage::url('uploads/avatar/'));
@endphp
@section('content')
    
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            @foreach($users as $user)
                <div class="col-md-3">
                    <div class="ibox">
                        <div class="ibox-content product-box">
                            <div class="product-imitation">
                                <img style="width: 100px;height: 100px;" src="{{(!empty($user->avatar)? $profile.'/'.$user->avatar : $profile.'/avatar.png')}}" class="avatar rounded-circle avatar-xl">
                            </div>

                            <div class="product-desc">  
                                <div class="row">
                                    @can('Edit User')
                                        <a href="#" data-url="{{ route('user.edit',$user->id) }}" class="btn btn-xs btn-outline btn-primary" data-ajax-popup="true" data-toggle="tooltip" data-title="{{__('Edit User')}}" data-original-title="{{ __('Edit User') }}"> <i class="fa fa-edit"></i> </a>
                                    @endcan
                                    @can('Delete User')
                                        <a href="#" class="btn btn-xs btn-outline btn-danger" data-toggle="tooltip" data-original-title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$user->id}}').submit();"> <i class="fa fa-trash"></i> </a>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['user.destroy', $user->id],'id'=>'delete-form-'.$user->id]) !!}
                                        {!! Form::close() !!}
                                    @endcan      
                                </div>                    
                                <small class="text-muted">{{ $user->company_name }}</small>
                                <a href="#" class="product-name"> {{ $user->name }}</a>

                                <div class="small m-t-xs">
                                    <div class="sal-right-card">
                                        <span class="badge badge-pill badge-blue">{{ $user->type }}</span>
                                    </div>
                                    <h6 class="office-time mb-0 mt-4">{{ $user->email }}</h6>
                                    @if(\Auth::user()->type == 'super admin')
                                        <div class="mt-4">
                                            <div class="row justify-content-between align-items-center">
                                                <div class="col-6 text-center">
                                                    <span class="d-block font-weight-bold mb-0">{{!empty($user->currentPlan)?$user->currentPlan->name:''}}</span>
                                                </div>
                                                <div class="col-6 text-center Id">
                                                    <a href="#" data-url="{{ route('plan.upgrade',$user->id) }}" class="btn btn-white" data-ajax-popup="true" data-title="{{__('Upgrade Plan')}}">{{__('Upgrade Plan')}}</a>
                                                </div>
                                                <div class="col-12">
                                                    <hr class="my-3">
                                                </div>
                                                <div class="col-12 text-center pb-2">
                                                    <span class="text-dark text-xs">{{__('Plan Expire : ') }} {{!empty($user->plan_expire_date) ? \Auth::user()->dateFormat($user->plan_expire_date):'Unlimited'}}</span>
                                                </div>
                                                <div class="col-6 text-center">
                                                    <span class="d-block text-sm font-weight-bold mb-0">{{\Auth::user()->countUsers()}}</span>
                                                    <span class="d-block text-sm text-muted">{{__('Users')}}</span>
                                                </div>
                                                <div class="col-6 text-center">
                                                    <span class="d-block text-sm font-weight-bold mb-0">{{\Auth::user()->countEmployees()}}</span>
                                                    <span class="d-block text-sm text-muted">{{__('Employees')}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection


