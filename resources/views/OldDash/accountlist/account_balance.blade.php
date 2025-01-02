@extends('layouts.admin')
@section('page-title')
    {{__('Manage Account Balances')}}
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
                                        <th>{{__('Account Name')}}</th>
                                        <th>{{__('Initial Balance')}}</th>
                                    </tr>
                                </thead>
                                <tbody class="font-style">
                                    @php $totalInitialBalance = 0; @endphp
                                    @foreach ($accountLists as $accountlist)
                                        @php
                                            $totalInitialBalance = $accountlist->initial_balance + $totalInitialBalance;
                                        @endphp
                                        <tr>
                                            <td>{{ $accountlist->account_name }}</td>
                                            <td>{{  \Auth::user()->priceFormat($accountlist->initial_balance) }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td class="text-left text-dark">{{__('Total')}}</td>
                                        <td>{{ \Auth::user()->priceFormat($totalInitialBalance)   }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

