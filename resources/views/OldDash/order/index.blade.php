@extends('layouts.admin')
@section('page-title')
    {{__('Manage Plan Order')}}
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
                                        <th>{{__('Order Id')}}</th>
                                        <th>{{__('Name')}}</th>
                                        <th>{{__('Plan Name')}}</th>
                                        <th>{{__('Price')}}</th>
                                        <th>{{__('Status')}}</th>
                                        <th>{{__('Date')}}</th>
                                        <th>{{__('Coupon')}}</th>
                                        <th>{{__('Type')}}</th>
                                        <th>{{__('Invoice')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>{{$order->order_id}}</td>
                                            <td>{{$order->user_name}}</td>
                                            <td>{{$order->plan_name}}</td>
                                            <td>{{(!empty(env('CURRENCY_SYMBOL'))?env('CURRENCY_SYMBOL'):'$').$order->price}}</td>
                                            <td>
                                                @if($order->payment_status == 'succeeded')
                                                    <i class="mdi mdi-circle text-success"></i> {{ucfirst($order->payment_status)}}
                                                @else
                                                    <i class="mdi mdi-circle text-danger"></i> {{ucfirst($order->payment_status)}}
                                                @endif
                                            </td>
                                            <td>{{$order->created_at->format('d M Y')}}</td>
                                            <td>{{!empty($order->total_coupon_used)? !empty($order->total_coupon_used->coupon_detail)?$order->total_coupon_used->coupon_detail->code:'':''}}</td>
                                            <td>{{$order->payment_type}}</td>
                                            <td>
                                                @if(empty($order->receipt))
                                                    <p>{{__('Manually plan upgraded by super admin')}}</p>
                                                @elseif($order->receipt =='free coupon')
                                                    <p>{{__('Used 100 % discount coupon code.')}}</p>
                                                @else
                                                    <a href="{{$order->receipt}}" title="Invoice" target="_blank" class="edit-icon btn btn-success"><i class="fas fa-file-invoice"></i> </a>
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
