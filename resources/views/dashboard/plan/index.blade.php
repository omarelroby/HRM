@extends('dashboard.layouts.master')
@section('page-title')
    {{__('Manage Subscription Plans')}}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb-4">
            <h4 class="h3 mb-0 text-gray-800">{{__('Subscription Plans')}}</h4>
            @can('Create Plan')
                <a href="#"   class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPlanModal"   data-title="{{__('Create New Plan')}}">
                    <i class="fas fa-plus mr-2"></i>{{__('Create Plan')}}
                </a>

            @endcan
        </div>

        <div class="row">
            @if (session('success'))
                <div class="alert alert-success" style="text-align: center;">{{ session('success') }}</div>
            @elseif (session('error'))
                <div class="alert alert-danger" style="text-align: center;">{{ session('error') }}</div>
            @endif

            @foreach($plans as $plan)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card plan-card shadow-sm border-0 @if(\Auth::user()->plan == $plan->id) border-primary @endif">
                        @if(\Auth::user()->plan == $plan->id)
                            <div class="card-header bg-primary text-white position-relative">
                        <span class="badge badge-light position-absolute" style="top: -10px; right: -10px">
                            <i class="fas fa-check-circle text-success mr-1"></i>{{__('Active')}}
                        </span>
                                @else
                                    <div class="card-header text-white position-relative"
                                         style="background-color: {{ ['#f27439',  '#24314e', '#ffa508', '#9d2d2c', '#858796'][$loop->index % 6] }}; width: 50%;margin: auto">
                                        @if(\Auth::user()->plan == $plan->id)
                                            <span class="badge badge-light position-absolute" style="top: -10px; right: -10px">
                                             <i class="fas fa-check-circle text-success mr-1"></i>{{__('Active')}}
                                            </span>
                                             @endif
                                        @endif

                                        <h5 class="card-title mb-0 text-center text-white">{{$plan->name}}</h5>
                                    </div>

                                    <div class="card-body">
                                        <div class="text-center mb-4">
                                        <span class="display-4 font-weight-bold text-primary">
                                            {{ (!empty(env('CURRENCY_SYMBOL')) ? env('CURRENCY_SYMBOL') : '$') }}{{ $plan->price }}
                                        </span>
                                            <span class="text-muted">/ {{ ucfirst($plan->duration) }}</span>
                                        </div>

                                        <ul class="list-group list-group-flush mb-4">
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                {{ __('USERS') }}
                                                <span class="badge badge-pill badge-success">
                                                {{ $plan->max_users == -1 ? __('Unlimited') : $plan->max_users }}
                                                <i class="ti ti-circle-plus"></i>
                                            </span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                {{ __('EMPLOYEES') }}
                                                <span class="badge badge-pill badge-success">
                                                    {{ $plan->max_employees == -1 ? __('Unlimited') : $plan->max_employees }}
                                                    <i class="ti ti-circle-plus"></i>
                                                </span>
                                            </li>

                                            {{-- Show Storage only if chat_gpt column is 1 --}}
                                            @if($plan->chat_gpt == 1)
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    {{ __('CHAT GPT') }}
                                                    <span class="badge badge-pill badge-info">
                                                    Enable
                                                    <i class="ti ti-align-right"></i>
                                                </span>
                                                </li>
                                            @else
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    {{ __('CHAT GPT') }}
                                                    <span class="badge badge-pill badge-danger">
                                                    Disabled
                                                    <i class="ti ti-align-right"></i>
                                                </span>
                                                </li>
                                            @endif
                                            @if($plan->storage)
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    {{ __('STORAGE') }}
                                                    <span class="badge badge-pill badge-info">
                                                    {{ $plan->storage }} GB
                                                    <i class="ti ti-database"></i>
                                                </span>
                                                </li>
                                            @endif

                                        </ul>


                                        <div class="text-center">
                                            @can('Edit Plan')
                                                <div class="row">
                                                    <div class="col-2">
                                                        <a href="{{ route('plans.edit',$plan->id) }}" class="btn btn-sm btn-outline-secondary mb-2"

                                                           data-title="{{__('Edit Plan')}}">
                                                            <i class="fas fa-edit mr-1"></i>{{__('Edit')}}
                                                        </a>
                                                    </div>
                                                    <div class="col-1">
                                                        <form method="POST" action="{{ route('plans.destroy', $plan->id) }}" class="d-inline" onsubmit="return confirm('{{ __('Are You Sure?') }}\n{{ __('This action cannot be undone. Do you want to continue?') }}');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-outline-danger" data-toggle="tooltip" title="{{ __('Delete') }}">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            @endcan



                                            @if(!empty($admin_payment_setting) && ($admin_payment_setting['is_stripe_enabled'] == 'on' || $admin_payment_setting['is_paypal_enabled'] == 'on' || $admin_payment_setting['is_paystack_enabled'] == 'on' || $admin_payment_setting['is_flutterwave_enabled'] == 'on' || $admin_payment_setting['is_razorpay_enabled'] == 'on' || $admin_payment_setting['is_mercado_enabled'] == 'on' || $admin_payment_setting['is_paytm_enabled'] == 'on' || $admin_payment_setting['is_mollie_enabled'] == 'on' || $admin_payment_setting['is_skrill_enabled'] == 'on' || $admin_payment_setting['is_coingate_enabled'] == 'on'))
                                                @can('Buy Plan')
                                                    @if(($plan->id != \Auth::user()->plan) && \Auth::user()->type != 'super admin')
                                                        @if($plan->price > 0)
                                                            <a href="{{route('stripe',\Illuminate\Support\Facades\Crypt::encrypt($plan->id))}}"
                                                               class="btn btn-sm btn-primary mb-2">
                                                                <i class="fas fa-shopping-cart mr-1"></i>{{__('Subscribe')}}
                                                            </a>
                                                        @else
                                                            <span class="btn btn-sm btn-success mb-2">
                                                <i class="fas fa-gift mr-1"></i>{{__('Free')}}
                                            </span>
                                                        @endif
                                                    @endif
                                                @endcan
                                            @endif
                                        </div>

                                        @if($plan->id != 1 && \Auth::user()->type != 'super admin')
                                            <div class="text-center mt-3">
                                                @if(\Auth::user()->requested_plan != $plan->id)
                                                    @if(\Auth::user()->plan != $plan->id)
                                                        <a href="{{route('plan_request',\Illuminate\Support\Facades\Crypt::encrypt($plan->id))}}"
                                                           class="btn btn-sm btn-outline-success">
                                                            <i class="fas fa-share mr-1"></i>{{__('Request Plan')}}
                                                        </a>
                                                    @endif
                                                @else
                                                    <div class="d-flex justify-content-center align-items-center">
                                                        <span class="text-info mr-2"><i class="fas fa-clock"></i> {{__('Request Pending')}}</span>
                                                        <a href="#" class="text-danger" data-toggle="tooltip"
                                                           data-original-title="{{ __('Cancel Request') }}"
                                                           data-confirm="{{ __('Are You Sure?') . '|' . __('This action can not be undone. Do you want to continue?') }}"
                                                           data-confirm-yes="document.getElementById('delete-form-{{ $plan->id }}').submit();">
                                                            <i class="fas fa-times-circle"></i>
                                                        </a>
                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['plans.destroy', $plan->id], 'id' => 'delete-form-' . $plan->id]) !!}
                                                        {!! Form::close() !!}
                                                    </div>
                                                @endif
                                            </div>
                                        @endif
                                    </div>

                                    @if(\Auth::user()->type == 'company' && \Auth::user()->plan == $plan->id)
                                        <div class="card-footer bg-light">
                                            <small class="text-muted">
                                                {{__('Plan Expires: ') }}
                                                {{ !empty($plan_expire_date) ? \Auth::user()->dateFormat($plan_expire_date) : __('Unlimited') }}
                                            </small>
                                        </div>
                                    @endif
                            </div>
                    </div>
                    @endforeach
                </div>
        </div>
        <div class="modal fade" id="addPlanModal" tabindex="-1" aria-labelledby="addTrainingModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header text-white">
                        <h5 class="modal-title" id="addTrainingModalLabel">{{ __('Add Subscription Plans') }}</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                        {{ Form::open(array('url' => 'plans', 'enctype' => "multipart/form-data")) }}
                        <div class="row">
                            <div class="form-group col-md-12">
                                {{Form::label('name',__('Name'),['class'=>'form-control-label']) }}
                                {{Form::text('name',null,array('class'=>'form-control font-style','placeholder'=>__('Enter Plan Name'),'required'=>'required'))}}
                            </div>
                            <div class="form-group col-md-6">
                                {{Form::label('price',__('Price'),['class'=>'form-control-label']) }}
                                {{Form::number('price',null,array('class'=>'form-control','placeholder'=>__('Enter Plan Price')))}}
                            </div>
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
                                    {{ Form::checkbox('chat_gpt', 1, false, ['class' => 'form-check-input', 'id' => 'chat_gpt']) }}
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
                            <div class="col-12 my-3">
                                <input type="submit" value="{{__('Create')}}" class="btn btn-primary">
                                <input type="button" value="{{__('Cancel')}}" class="btn btn-white" data-bs-dismiss="modal">
                            </div>
                        </div>
                        {{ Form::close() }}

                    </div>
                </div>
            </div>
        </div>

        <style>
            .plan-card {
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                border-radius: 15px;
            }
            .plan-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 20px rgba(0,0,0,0.1);
            }
            .card-header {
                border-radius: 15px 15px 0 0 !important;
            }
            .list-group-item {
                background-color: rgba(255,255,255,0.9);
            }
        </style>
@endsection
