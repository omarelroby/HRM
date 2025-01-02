@extends('layouts.admin')
@section('page-title')
    {{ __('Manage Employee') }}
@endsection

@section('action-button')
    <div class="all-button-box row d-flex justify-content-end">
        @can('Create Employee')
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
                <div class="all-button-box">
                    <a href="{{ route('employee.create') }}" class="btn btn-w-m btn-primary">
                        <i class="fa fa-plus"></i> {{ __('Create') }}
                    </a>
                </div>
            </div>
        @endcan

        @if($employees->count() != 0)
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
            <div class="all-button-box">
                <a href="{{ route('employee.export') }}" class="btn btn-w-m btn-primary">
                    <i class="fa fa-file-excel"></i> {{ __('Export') }}
                </a>
            </div>
        </div>
        @endif
        
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
            <div class="all-button-box">
                <a href="#" class="btn btn-w-m btn-primary"
                    data-url="{{ route('employee.file.import') }}" data-ajax-popup="true"
                    data-title="{{ __('Import employee CSV file') }}">
                    <i class="fa fa-file-csv"></i> {{ __('Import') }}
                </a>
            </div>
        </div>

    </div>
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
                                    <th>{{ __('Employee ID') }}</th>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Email') }}</th>
                                    <th>{{ __('Branch') }}</th>
                                    <th>{{ __('Department') }}</th>
                                    <th>{{ __('Designation') }}</th>
                                    <th>{{ __('Date Of Joining') }}</th>
                                    @if (Gate::check('Edit Employee') || Gate::check('Delete Employee'))
                                        <th width="3%">{{ __('Action') }}</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employees as $employee)
                                    <tr>
                                        <td class="Id">
                                            @can('Show Employee')
                                                <a
                                                    href="{{ route('employee.show', \Illuminate\Support\Facades\Crypt::encrypt($employee->id)) }}">{{ \Auth::user()->employeeIdFormat($employee->employee_id) }} - {{$employee->id}}</a>
                                            @else
                                                <a href="#">{{ \Auth::user()->employeeIdFormat($employee->employee_id) }} - {{$employee->id}} </a>
                                            @endcan
                                        </td>
                                        <td class="font-style">{{ $employee->name }}</td>
                                        <td>{{ $employee->email }}</td>
                                        <td class="font-style">
                                            {{ !empty(\Auth::user()->getBranch($employee->branch_id)) ? \Auth::user()->getBranch($employee->branch_id)->name : '' }}
                                        </td>
                                        <td class="font-style">
                                            {{ !empty(\Auth::user()->getDepartment($employee->department_id)) ? \Auth::user()->getDepartment($employee->department_id)->name : '' }}
                                        </td>
                                        <td class="font-style">
                                            {{ !empty(\Auth::user()->getDesignation($employee->designation_id)) ? \Auth::user()->getDesignation($employee->designation_id)->name : '' }}
                                        </td>
                                        <td class="font-style">
                                            {{ \Auth::user()->dateFormat($employee->Join_date_gregorian) }}</td>
                                        @if (Gate::check('Edit Employee') || Gate::check('Delete Employee'))
                                            <td class="text-right action-btns">
                                                @if ($employee->is_active == 1)
                                                    @can('Delete Employee')
                                                        <a href="#" class="delete-icon btn btn-danger" data-toggle="tooltip"
                                                            data-original-title="{{ __('Delete') }}"
                                                            data-confirm="{{ __('Are You Sure?') . '|' . __('This action can not be undone. Do you want to continue?') }}"
                                                            data-confirm-yes="document.getElementById('delete-form-{{ $employee->id }}').submit();"><i
                                                                class="fa fa-trash"></i></a>
                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['employee.destroy', $employee->id], 'id' => 'delete-form-' . $employee->id]) !!}
                                                        {!! Form::close() !!}
                                                    @endcan
                                                @else
                                                    <i class="fas fa-lock"></i>
                                                @endif
                                            </td>
                                        @endif
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
