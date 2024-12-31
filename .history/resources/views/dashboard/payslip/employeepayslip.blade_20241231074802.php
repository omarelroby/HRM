@extends('layouts.admin')

@section('page-title')
    {{__('Payslip')}}
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{__('Employee Salary')}}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">{{__('Home')}}</a></div>
                    <div class="breadcrumb-item">{{__('Employee Salary')}}</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between w-100">
                                    <h4>{{__('Employee Salary')}}</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped mb-0" id="dataTable1">
                                        <thead>
                                            <tr>
                                                <th>{{__('Name')}}</th>
                                                <th>{{__('Payroll Month')}}</th>
                                                <th>{{__('Salary')}}</th>
                                                <th>{{__('Net Salary')}}</th>
                                                <th>{{__('Status')}}</th>
                                                <th class="text-center" width="200px">{{__('Action')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($payslip as $slip)
                                                <tr>
                                                    <!-- Employee Name -->
                                                    <td>{{ optional(\App\PaySlip::employee($slip->employee_id))->name ?? 'N/A' }}</td>

                                                    <!-- Payroll Month -->
                                                    <td>{{ $slip->salary_month }}</td>

                                                    <!-- Basic Salary -->
                                                    <td>{{ \Auth::user()->priceFormat($slip->basic_salary) }}</td>

                                                    <!-- Net Salary -->
                                                    <td>{{ \Auth::user()->priceFormat($slip->net_payble) }}</td>

                                                    <!-- Status -->
                                                    <td>
                                                        @if($slip->status == 1)
                                                            <div class="badge badge-success">{{ __('Paid') }}</div>
                                                        @else
                                                            <div class="badge badge-danger">{{ __('Unpaid') }}</div>
                                                        @endif
                                                    </td>

                                                    <!-- Actions -->
                                                    <td class="text-center">
                                                        <a href="#" data-url="{{ route('payslip.showemployee', $slip->id) }}" class="btn btn-sm btn-warning btn-round btn-icon" data-ajax-popup="true" data-toggle="tooltip" title="{{__('View Employee Detail')}}">
                                                            <span class="fa fa-eye"></span> {{__('View')}}
                                                        </a>
                                                        <a href="#" data-url="{{ route('payslip.pdf', [$slip->employee_id, $slip->salary_month]) }}" data-size="md-pdf" class="btn btn-sm btn-info btn-round btn-icon" data-ajax-popup="true" data-toggle="tooltip" title="{{__('Download Payslip')}}">
                                                            <span class="fa fa-download"></span> {{__('Payslip')}}
                                                        </a>
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
            </div>
        </section>
    </div>
@endsection
