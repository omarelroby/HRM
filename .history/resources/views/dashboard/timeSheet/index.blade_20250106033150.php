@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Manage Timesheet') }}
@endsection

@section('content')

    <div class="row">
        <div class="d-flex justify-content-end mb-3">
            @can('Create TimeSheet')
                <!-- Create Timesheet Button -->
                <div class="mr-2">
                    <a href="#" data-url="{{ route('timesheet.create') }}" class="btn btn-primary btn-icon-only" data-ajax-popup="true" data-title="{{ __('Create New') }}">
                        <i class="fa fa-plus"></i> {{ __('Create') }}
                    </a>
                </div>

                <!-- Export Timesheet Button -->
                <div class="mr-2">
                    <a href="{{ route('timesheet.export') }}" class="btn btn-primary btn-icon-only">
                        <i class="fa fa-file-excel"></i> {{ __('Export') }}
                    </a>
                </div>

                <!-- Import Timesheet CSV Button -->
                <div>
                    <a href="#" class="btn btn-primary btn-icon-only" data-url="{{ route('timesheet.file.import') }}" data-ajax-popup="true" data-title="{{ __('Import Timesheet CSV file') }}">
                        <i class="fa fa-file-csv"></i> {{ __('Import') }}
                    </a>
                </div>
            @endcan
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success" style="text-align: center;">{{ session('success') }}</div>
                    @elseif (session('error'))
                    <div class="alert alert-danger" style="text-align: center;">{{ session('error') }}</div>
                    @endif
                    @if(\Auth::user()->type != 'employee')
                        <!-- Filter Form -->
                        {{ Form::open(['route' => ['timesheet.index'], 'method' => 'get', 'id' => 'timesheet_filter']) }}
                            <div class="row justify-content-end mb-4">
                                <div class="col-xl-2 col-lg-2 col-md-3">
                                    <div class="form-group">
                                        {{ Form::label('start_date', __('Start Date')) }}
                                        {{ Form::text('start_date', isset($_GET['start_date']) ? $_GET['start_date'] : '', ['class' => 'form-control datepicker', 'placeholder' => 'Select start date']) }}
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-2 col-md-3">
                                    <div class="form-group">
                                        {{ Form::label('end_date', __('End Date')) }}
                                        {{ Form::text('end_date', isset($_GET['end_date']) ? $_GET['end_date'] : '', ['class' => 'form-control datepicker', 'placeholder' => 'Select end date']) }}
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-3 col-md-3">
                                    <div class="form-group">
                                        {{ Form::label('employee', __('Employee')) }}
                                        {{ Form::select('employee', $employeesList, isset($_GET['employee']) ? $_GET['employee'] : '', ['class' => 'form-control select2', 'placeholder' => 'Select employee']) }}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <a href="#" class="btn btn-primary mt-4" onclick="document.getElementById('timesheet_filter').submit(); return false;" data-toggle="tooltip" data-original-title="{{ __('Apply') }}">
                                        <i class="fa fa-search"></i> {{ __('Apply') }}
                                    </a>
                                    <a href="{{ route('timesheet.index') }}" class="btn btn-danger mt-4" data-toggle="tooltip" data-original-title="{{ __('Reset') }}">
                                        <i class="fa fa-refresh"></i> {{ __('Reset') }}
                                    </a>
                                </div>
                            </div>
                        {{ Form::close() }}
                    @endif

                    <!-- Timesheet Table -->
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables">
                            <thead>
                                <tr>
                                    @if (\Auth::user()->type != 'employee')
                                        <th>{{ __('Employee') }}</th>
                                    @endif
                                    <th>{{ __('Date') }}</th>
                                    <th>{{ __('Hours') }}</th>
                                    <th>{{ __('Description') }}</th>
                                    <th width="10%">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($timeSheets as $timeSheet)
                                    <tr>
                                        @if (\Auth::user()->type != 'employee')
                                            <td>{{ !empty($timeSheet->employee) ? $timeSheet->employee->name : '' }}</td>
                                        @endif
                                        <td>{{ \Auth::user()->dateFormat($timeSheet->date) }}</td>
                                        <td>{{ $timeSheet->hours }}</td>
                                        <td>{{ $timeSheet->remark }}</td>
                                        <td class="text-right">
                                            @can('Edit TimeSheet')
                                                <a href="#" data-url="{{ route('timesheet.edit', $timeSheet->id) }}" data-size="lg" data-ajax-popup="true" data-title="{{ __('Edit Timesheet') }}" class="btn btn-success btn-icon-only" data-toggle="tooltip" data-original-title="{{ __('Edit') }}">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            @endcan
                                            @can('Delete TimeSheet')
                                                <a href="#" class="btn btn-danger btn-icon-only" data-toggle="tooltip" data-original-title="{{ __('Delete') }}" data-confirm="{{ __('Are you sure?') }}|{{ __('This action cannot be undone. Do you want to continue?') }}" data-confirm-yes="document.getElementById('delete-form-{{ $timeSheet->id }}').submit();">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['timesheet.destroy', $timeSheet->id], 'id' => 'delete-form-' . $timeSheet->id]) !!}
                                                {!! Form::close() !!}
                                            @endcan
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
