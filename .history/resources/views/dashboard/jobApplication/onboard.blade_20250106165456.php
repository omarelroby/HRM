@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Manage Job OnBoard') }}
@endsection

@section('content')
<div class="row">
    <!-- Create Button -->
    <div class="d-flex justify-content-end mb-4">
        @can('Create Employee')
            <a href="#" data-bs-toggle="modal" data-bs-target="#addJobModal" class="btn btn-primary btn-lg">
                <i class="fas fa-plus me-2"></i> {{ __('Create Job On Board') }}
            </a>
        @endcan
    </div>

    <!-- Job List Card -->
    <div class="col-lg-12">
        <div class="card shadow-sm">
            <div class="card-header  text-white">
                <h5 class="card-title mb-0">{{ __('Job-OnBoard List') }}</h5>
            </div>
            <div class="card-body">
                <!-- Success/Error Messages -->
                @if (session('success'))
                    <div class="alert alert-success text-center">{{ session('success') }}</div>
                @elseif (session('error'))
                    <div class="alert alert-danger text-center">{{ session('error') }}</div>
                @endif

                <!-- Job Table -->
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Job') }}</th>
                                <th>{{ __('Branch') }}</th>
                                <th>{{ __('Applied at') }}</th>
                                <th>{{ __('Joining at') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th width="3%">{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody class="font-style">
                            @foreach ($jobOnBoards as $job)
                                <tr>
                                    <td>{{ $job->applications->name ?? '-' }}</td>
                                    <td>{{ $job->applications->jobs->title ?? '-' }}</td>
                                    <td>{{ $job->applications->jobs->branches->name ?? '-' }}</td>
                                    <td>{{ \Auth::user()->dateFormat($job->applications->created_at ?? '-') }}</td>
                                    <td>{{ \Auth::user()->dateFormat($job->joining_date) }}</td>
                                    <td>
                                        @if($job->status == 'pending')
                                            <span class="badge bg-warning">{{ \App\Models\JobOnBoard::$status[$job->status] }}</span>
                                        @elseif($job->status == 'cancel')
                                            <span class="badge bg-danger">{{ \App\Models\JobOnBoard::$status[$job->status] }}</span>
                                        @else
                                            <span class="badge bg-success">{{ \App\Models\JobOnBoard::$status[$job->status] }}</span>
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        @if($job->status == 'confirm' && $job->convert_to_employee == 0)
                                            <a href="{{ route('job.on.board.convert', $job->id) }}" class="btn btn-sm btn-info" data-toggle="tooltip" title="{{ __('Convert to Employee') }}">
                                                <i class="fas fa-exchange-alt"></i>
                                            </a>
                                        @elseif($job->status == 'confirm' && $job->convert_to_employee != 0)
                                            <a href="{{ route('employee.show', \Crypt::encrypt($job->convert_to_employee)) }}" class="btn btn-sm btn-info" data-toggle="tooltip" title="{{ __('Employee Detail') }}">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        @endif



                                    </td>
                                    <td>
                                    @can('Edit Job')
                                    <a href="{{route('e', $job->id) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" title="{{ __('Edit') }}"><i class="fa fa-edit"></i></a>
                                    @endcan
                                    @can('Delete Job')
                                    <a href="#" class="btn btn-sm btn-danger delete-icon" data-toggle="tooltip" title="{{ __('Delete') }}" data-confirm="{{ __('Are You Sure?') . '|' . __('This action cannot be undone. Do you want to continue?') }}" data-confirm-yes="document.getElementById('delete-form-{{ $job->id }}').submit();">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['job.on.board.delete', $job->id], 'id' => 'delete-form-' . $job->id, 'class' => 'btn btn-danger btn-sm delete-job']) !!}
                                    {!! Form::close() !!}
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['job.destroy', $job->id], 'onsubmit' => 'return confirm("{{ __("Are You Sure?") }}\n{{ __("This action cannot be undone. Do you want to continue?") }}");']) !!}
                                        <button type="submit" class="" data-toggle="tooltip" title="{{ __('Delete') }}">
                                            <i class="fa fa-trash"></i>
                                        </button>
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

<!-- Add Job Modal -->
<div class="modal fade" id="addJobModal" tabindex="-1" aria-labelledby="addJobModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header  text-white">
                <h5 class="modal-title" id="addJobModalLabel">{{ __('Add Job On Board') }}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Body -->
            {{ Form::open(['route' => ['job.on.board.store', $id], 'method' => 'post', 'class' => 'needs-validation', 'novalidate']) }}
            <div class="modal-body">
                <div class="row">
                    @if($id == 0)
                        <div class="form-group col-md-6 mb-3">
                            {{ Form::label('application', __('Interviewer'), ['class' => 'form-label']) }}
                            {{ Form::select('application', $applications, null, ['class' => 'form-control select2', 'required' => 'required']) }}
                            <div class="invalid-feedback">{{ __('Please select an interviewer.') }}</div>
                        </div>
                    @endif
                    <div class="form-group col-md-6 mb-3">
                        {{ Form::label('status', __('Status'), ['class' => 'form-label']) }}
                        {{ Form::select('status', $status, null, ['class' => 'form-control select2', 'required' => 'required']) }}
                        <div class="invalid-feedback">{{ __('Please select a status.') }}</div>
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        {{ Form::label('joining_date', __('Joining Date'), ['class' => 'form-label']) }}
                        {{ Form::text('joining_date', null, ['class' => 'form-control datepicker', 'required' => 'required']) }}
                        <div class="invalid-feedback">{{ __('Please provide a valid joining date.') }}</div>
                    </div>

                </div>
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-close-white" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>

<!-- Datepicker Script -->
<script>
    $(function () {
        $(".datepicker").hijriDatePicker({
            format: 'YYYY-M-D',
            showSwitcher: false,
            hijri: false,
            useCurrent: true,
        });
    });
</script>
@endsection
