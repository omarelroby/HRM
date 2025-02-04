@extends('dashboard.layouts.master')
@section('content')
    <div class="row">
        <!-- Card for Job Title Update -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5>{{ __('Update Subscription Plans') }}</h5>
                </div>
                <div class="card-body">



                    {{Form::model($plan, array('route' => array('plans.update', $plan->id), 'method' => 'PUT', 'enctype' => "multipart/form-data")) }}
                    <div class="row">
                        <div class="form-group col-md-12">
                            {{Form::label('name',__('Name'),['class'=>'form-control-label'])}}
                            {{Form::text('name',null,array('class'=>'form-control font-style','placeholder'=>__('Enter Plan Name'),'required'=>'required'))}}
                        </div>
                        @if($plan->price>0)
                            <div class="form-group col-md-6">
                                {{Form::label('price',__('Price'),['class'=>'form-control-label'])}}
                                {{Form::number('price',null,array('class'=>'form-control','placeholder'=>__('Enter Plan Price'),'required'=>'required'))}}
                            </div>
                        @endif
                        <div class="form-group col-md-6">
                            {{ Form::label('duration', __('Duration'),['class'=>'form-control-label']) }}
                            {!! Form::select('duration', $arrDuration, null,array('class' => 'form-control select2','required'=>'required')) !!}
                        </div>
                        <div class="form-group col-md-6">
                            {{Form::label('max_users',__('Maximum Users'),['class'=>'form-control-label'])}}
                            {{Form::number('max_users',null,array('class'=>'form-control','required'=>'required'))}}
                            <span class="small">{{__('Note: "-1" for Unlimited')}}</span>
                        </div>
                        <div class="form-group col-md-6">
                            {{Form::label('max_employees',__('Maximum Employees'),['class'=>'form-control-label'])}}
                            {{Form::number('max_employees',null,array('class'=>'form-control','required'=>'required'))}}
                            <span class="small">{{__('Note: "-1" for Unlimited')}}</span>
                        </div>
                        <!-- ChatGPT Access -->
                        <div class="form-group col-md-6">
                            <div class="form-check">
                                {{ Form::checkbox('chat_gpt', 1, $plan->chat_gpt == 1, ['class' => 'form-check-input', 'id' => 'chat_gpt']) }}
                                {{ Form::label('chat_gpt', __('Enable ChatGPT Access'), ['class' => 'form-check-label']) }}
                            </div>
                            <small class="form-text text-muted">{{ __('Allow users to access ChatGPT features with this plan.') }}</small>
                        </div>


                        <!-- Storage Limit -->
                        <div class="form-group col-md-6">
                            {{ Form::label('storage', __('Storage Limit (GB)'), ['class' => 'form-control-label']) }}
                            {{ Form::number('storage', null, ['class' => 'form-control', 'placeholder' => __('Enter Storage Limit in GB'), 'step' => '0.1', 'min' => '0']) }}
                            <small class="form-text text-muted">{{ __('Set the storage limit for this plan. Use "0" for unlimited storage.') }}</small>
                        </div>
                        <div class="form-group col-md-12">
                            {{ Form::label('description', __('Description'),['class'=>'form-control-label']) }}
                            {!! Form::textarea('description', null, ['class'=>'form-control','rows'=>'2']) !!}
                        </div>
                        <div class="col-12 my-2">
                            <input type="submit" value="{{__('Update')}}" class="btn btn-primary">
                            <input type="button" value="{{__('Cancel')}}" class="btn btn-white" data-dismiss="modal">
                        </div>
                    </div>
                    {{ Form::close() }}

                </div>
            </div>
        </div>
    </div>
@endsection












