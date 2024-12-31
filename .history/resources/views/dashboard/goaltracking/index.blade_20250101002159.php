@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Manage Goal Tracking') }}
@endsection

@section('css-page')
<style>
    .progress-percentage {
        display: inline-block;
        margin-bottom: 0.5rem;
        font-size: 0.85rem;
        font-weight: 500;
    }
    .table td, .table th {
        vertical-align: middle;
    }
</style>
@endpush

@section('scripts')
<script src="{{ asset('js/bootstrap-toggle.js') }}"></script>
<script>
    $(document).ready(function () {
        $('.toggleswitch').bootstrapToggle();
    });
</script>
@endsection

@section('action-button')
<div class="d-flex justify-content-end mb-3">
    @can('Create Goal Tracking')
    <a href="#" data-url="{{ route('goaltracking.create') }}" class="btn btn-primary" data-ajax-popup="true" data-title="{{ __('Create New Goal Tracking') }}">
        <i class="fas fa-plus"></i> {{ __('Create') }}
    </a>
    @endcan
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">{{ __('Goal Tracking List') }}</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered align-middle">
                        <thead>
                            <tr>
                                <th>{{ __('Goal Type') }}</th>
                                <th>{{ __('Subject') }}</th>
                                <th>{{ __('Branch') }}</th>
                                <th>{{ __('Target Achievement') }}</th>
                                <th>{{ __('Start Date') }}</th>
                                <th>{{ __('End Date') }}</th>
                                <th>{{ __('Rating') }}</th>
                                <th>{{ __('Progress') }}</th>
                                @if(Gate::check('Edit Goal Tracking') || Gate::check('Delete Goal Tracking'))
                                <th class="text-center">{{ __('Action') }}</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($goalTrackings as $goalTracking)
                            <tr>
                                <td>{{ $goalTracking->goalType->name ?? '' }}</td>
                                <td>{{ $goalTracking->subject }}</td>
                                <td>{{ $goalTracking->branches->name ?? '' }}</td>
                                <td>{{ $goalTracking->target_achievement }}</td>
                                <td>{{ \Auth::user()->dateFormat($goalTracking->start_date) }}</td>
                                <td>{{ \Auth::user()->dateFormat($goalTracking->end_date) }}</td>
                                <td>
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($goalTracking->rating < $i)
                                            <i class="far fa-star text-warning"></i>
                                        @else
                                            <i class="fas fa-star text-warning"></i>
                                        @endif
                                    @endfor
                                </td>
                                <td>
                                    <div class="progress-wrapper">
                                        <span class="progress-percentage">{{ $goalTracking->progress }}%</span>
                                        <div class="progress progress-xs mt-1">
                                            <div class="progress-bar bg-{{ Utility::getProgressColor($goalTracking->progress) }}" role="progressbar" style="width: {{ $goalTracking->progress }}%;" aria-valuenow="{{ $goalTracking->progress }}" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </td>
                                @if(Gate::check('Edit Goal Tracking') || Gate::check('Delete Goal Tracking'))
                                <td class="text-center">
                                    <div class="btn-group btn-group-sm" role="group">
                                        @can('Edit Goal Tracking')
                                        <a href="#" data-url="{{ route('goaltracking.edit', $goalTracking->id) }}" class="btn btn-primary" data-ajax-popup="true" data-title="{{ __('Edit Goal Tracking') }}" title="{{ __('Edit') }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        @endcan
                                        @can('Delete Goal Tracking')
                                        <button type="button" class="btn btn-danger" data-confirm="{{ __('Are You Sure?') . '|' . __('This action can not be undone. Do you want to continue?') }}" data-confirm-yes="document.getElementById('delete-form-{{ $goalTracking->id }}').submit();" title="{{ __('Delete') }}">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['goaltracking.destroy', $goalTracking->id], 'id' => 'delete-form-' . $goalTracking->id, 'style' => 'display:none']) !!}
                                        {!! Form::close() !!}
                                        @endcan
                                    </div>
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
