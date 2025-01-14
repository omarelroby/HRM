@extends('dashboard.layouts.master')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
        <div class="ibox ">
            <div class="ibox-title">
                <h5></h5>
            </div>
            @if (session('success'))
            <div class="alert alert-success" style="text-align: center;">{{ session('success') }}</div>
            @elseif (session('error'))
            <div class="alert alert-danger" style="text-align: center;">{{ session('error') }}</div>
            @endif
            <div class="ibox-content">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables" >
                    <thead>
                            <tr>
                                <th>{{__('Employee Id')}}</th>
                                <th>{{__('Name')}}</th>

                                <th>{{__('Salary') }}</th>
                                <th width="3%">{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $employee)
                                <tr>
                                    <td class="Id">
                                        <a href="{{route('setsalary.show',$employee->id)}}"  data-toggle="tooltip" data-original-title="{{__('View')}}">
                                            {{ \Auth::user()->employeeIdFormat($employee->employee_id) ??'' }}
                                        </a>
                                    </td>
                                    <td>{{ $employee->name ??'' }}</td>

                                    <td>{{ \Auth::user()->priceFormat($employee->salary) ??'' }}</td>
                                    <td>
                                        <a href="{{route('setsalary.show',$employee->id)}}" class="edit-icon btn btn-success bg-success" data-toggle="tooltip" data-original-title="{{__('View')}}">
                                            <i class="fa fa-eye"></i>
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
</div>
@endsection
