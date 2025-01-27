@extends('super_dashboard.layouts.admin')
@section('page-title')
    {{__('Account Setting')}}
@endsection
@section('action-button')
@endsection
@php
    $profile=asset(Storage::url('uploads/avatar/'));
@endphp
<style>
    .card{
        padding:2%;
    }
    .nav-tabs li{
        border-color:snow;
    }
</style>
@section('content')
    <div class="row">
            <div class="col-lg-12">
                <div class="tabs-container">
                    <div class="col-lg-12 our-system">
                        <div class="row">
                            <ul class="nav nav-tabs" role="tablist">
                                <li>
                                    <a data-toggle="tab" href="#Biling" class="nav-link active">{{__('Personal info')}}</a>
                                </li>
                                <li class="annual-billing">
                                    <a data-toggle="tab" href="#Billing2" class="nav-link">{{__('Change Password')}}</span>
                                    </a>
                                </li>
                            </ul>

                            <div class="col-md-12 tab-content">
                                <div id="Biling" class="card tab-pane in active">
                                    {{Form::model($userDetail,array('route' => array('update.account'), 'method' => 'post', 'enctype' => "multipart/form-data"))}}
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group">
                                                {{Form::label('name',__('Name'),array('class'=>'form-control-label'))}}
                                                {{Form::text('name',null,array('class'=>'form-control font-style','placeholder'=>__('Enter User Name')))}}
                                                @error('name')
                                                <span class="invalid-name" role="alert">
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group">
                                                {{Form::label('email',__('Email'),array('class'=>'form-control-label'))}}
                                                {{Form::text('email',null,array('class'=>'form-control','placeholder'=>__('Enter User Email')))}}
                                                @error('email')
                                                <span class="invalid-email" role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <div class="choose-file">
                                                    <label for="avatar">
                                                        <div>{{__('Choose file here')}}</div>
                                                        <input type="file" class="form-control" id="avatar" name="profile" data-filename="profiles">
                                                    </label>
                                                    <p class="profiles"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 text-right">
                                            <input type="submit" value="{{__('Save Changes')}}" class="btn btn-primary">
                                        </div>
                                    </div>
                                    {{Form::close()}}
                                </div>
                                <div id="Billing2" class="card tab-pane">
                                    {{Form::model($userDetail,array('route' => array('update.password'), 'method' => 'post'))}}
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group">
                                                {{Form::label('current_password',__('Current Password'),array('class'=>'form-control-label'))}}
                                                {{Form::password('current_password',array('class'=>'form-control','placeholder'=>__('Enter Current Password')))}}
                                                @error('current_password')
                                                <span class="invalid-current_password" role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group">
                                                {{Form::label('new_password',__('New Password'),array('class'=>'form-control-label'))}}
                                                {{Form::password('new_password',array('class'=>'form-control','placeholder'=>__('Enter New Password')))}}
                                                @error('new_password')
                                                    <span class="invalid-new_password" role="alert">
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                {{Form::label('confirm_password',__('Re-type New Password'),array('class'=>'form-control-label'))}}
                                                {{Form::password('confirm_password',array('class'=>'form-control','placeholder'=>__('Enter Re-type New Password')))}}
                                                @error('confirm_password')
                                                <span class="invalid-confirm_password" role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-12 text-right">
                                            <input type="submit" value="{{__('Save Changes')}}" class="btn btn-primary">
                                        </div>
                                    </div>
                                    {{Form::close()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


