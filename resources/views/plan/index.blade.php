@extends('layouts.admin')
@section('page-title')
    {{__('Manage Plan')}}
@endsection

@section('action-button')
    <div class="all-button-box row d-flex justify-content-end">
        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
            <a href="#" data-url="{{ route('plans.create') }}" class="btn btn-primary btn-icon-only width-auto" data-ajax-popup="true" data-toggle="tooltip" data-title="{{__('Create New Plan')}}" data-original-title="{{__('Create Plan')}}">
                <i class="fa fa-plus"></i> {{__('Create')}}
            </a>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        @foreach($plans as $plan)
            <div class="col-md-3">
                <div class="ibox">
                    <div class="ibox-content product-box">
                        <div class="product-imitation">
                            {{$plan->name}}
                        </div>
                        <div class="product-desc">
                            <span class="product-price">
                                {{(!empty(env('CURRENCY_SYMBOL'))?env('CURRENCY_SYMBOL'):'$').$plan->price}}
                            </span>
                            <sub>{{__('Duration : ').ucfirst($plan->duration)}}</sub>

                            <div class="small m-t-xs">
                                {{($plan->max_users==-1)?__('Unlimited'):$plan->max_users}} {{__('Users')}}
                            </div>

                            <div class="small m-t-xs">
                                {{($plan->max_employees==-1)?__('Unlimited'):$plan->max_employees}} {{__('Employees')}}
                            </div>

                            @can('Edit Plan')
                                <a title="{{__('Edit Plan')}}" href="#" class="btn btn-xs btn-outline btn-primary" data-url="{{ route('plans.edit',$plan->id) }}" data-ajax-popup="true" data-title="{{__('Edit Plan')}}" data-toggle="tooltip" data-original-title="{{__('Edit')}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                            @endcan
                            @if(!empty($admin_payment_setting) && ($admin_payment_setting['is_stripe_enabled'] == 'on'  || $admin_payment_setting['is_paypal_enabled'] == 'on' || $admin_payment_setting['is_paystack_enabled'] == 'on'|| $admin_payment_setting['is_flutterwave_enabled'] == 'on'|| $admin_payment_setting['is_razorpay_enabled'] == 'on'|| $admin_payment_setting['is_mercado_enabled'] == 'on'|| $admin_payment_setting['is_paytm_enabled'] == 'on'|| $admin_payment_setting['is_mollie_enabled'] == 'on'||
                            $admin_payment_setting['is_paypal_enabled'] == 'on'|| $admin_payment_setting['is_skrill_enabled'] == 'on' || $admin_payment_setting['is_coingate_enabled'] == 'on') )
                            @can('Buy Plan')
                            @if(($plan->id != \Auth::user()->plan) && \Auth::user()->type!='super admin' )
                            @if($plan->price > 0)
                                            <a href="{{route('stripe',\Illuminate\Support\Facades\Crypt::encrypt($plan->id))}}" class="button text-xs">{{__('Buy Plan')}}</a>
                                        @else
                                            <a href="#" class="button text-xs">{{__('Free')}}</a>
                                        @endif
                                    @endif
                                @endcan
                            @endif
                            
                            @if($plan->id != 1 && \Auth::user()->type !=  'super admin')
                                @if(\Auth::user()->requested_plan != $plan->id)
                                    @if(\Auth::user()->plan == $plan->id)
                                    <a href="#" class="badge badge-pill badge-success">
                                        <span class="btn-inner--icon">active</span>
                                    </a>
                                    @else
                                    <a href="{{route('plan_request',\Illuminate\Support\Facades\Crypt::encrypt($plan->id))}}" class="badge badge-pill badge-success">
                                        <span class="btn-inner--icon"><i class="fas fa-share"></i></span>
                                    </a>
                                    @endif
                                @else
                                    @if(\Auth::user()->plan == $plan->id)
                                    <a href="#" class="badge badge-pill badge-success">
                                        <span class="btn-inner--icon">active</span>
                                    </a>
                                    @else
                                    <a href="#" class="badge badge-pill badge-danger" data-toggle="tooltip"
                                        data-original-title="{{ __('Delete') }}"
                                        data-confirm="{{ __('Are You Sure?') . '|' . __('This action can not be undone. Do you want to continue?') }}"
                                        data-confirm-yes="document.getElementById('delete-form-{{ $plan->id }}').submit();">
                                        <span class="btn-inner--icon"><i class="fas fa-times"></i></span>
                                    </a>
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['plans.destroy', $plan->id], 'id' => 'delete-form-' . $plan->id]) !!}
                                    {!! Form::close() !!}
                                @endif
                                @endif
                            @endif
                        
                            @php
                                $plan_expire_date = \Auth::user()->plan_expire_date;
                            @endphp
                            @if(\Auth::user()->type =='company' && \Auth::user()->plan == $plan->id)
                                <p class="server-plan text-white">
                                    {{__('Plan Expired : ') }} {{!empty($plan_expire_date) ? \Auth::user()->dateFormat($plan_expire_date):'Unlimited'}}
                                </p>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection

