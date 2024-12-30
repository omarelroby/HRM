@extends('dashboard.layouts.master')
@section('content')
<div class="row">
    @foreach ($employees as $employee)
    <div class="col-lg-4 col-md-6 mb-4"> <!-- Adjust size for each card -->
        <div class="card">
            <div class="card-header">
                <h5>{{ $employee->name }}</h5>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <strong>{{ __('Employee Id') }}:</strong>
                        <a href="{{ route('setsalary.show', $employee->id) }}" data-toggle="tooltip" data-original-title="{{__('View')}}">
                            {{ \Auth::user()->employeeIdFormat($employee->employee_id) }}
                        </a>
                    </li>
                    <li class="list-group-item">
                        <strong>{{ __('Payroll Type') }}:</strong> {{ $employee->salary_type() }}
                    </li>
                    <li class="list-group-item">
                        <strong>{{ __('Salary') }}:</strong> {{ \Auth::user()->priceFormat($employee->salary) }}
                    </li>
                </ul>
            </div>
            <div class="card-footer text-center">
                <a href="{{ route('setsalary.show', $employee->id) }}" class="btn btn-success btn-sm" data-toggle="tooltip" data-original-title="{{__('View')}}">
                    <i class="fa fa-eye"></i> {{ __('View') }}
                </a>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection
