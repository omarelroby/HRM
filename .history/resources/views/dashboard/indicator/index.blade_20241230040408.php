@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Manage Indicator') }}
@endsection

@section('script')
<script src="{{ asset('js/bootstrap-toggle.js') }}"></script>
<script>
    $(document).ready(function () {
        $('.toggleswitch').bootstrapToggle();

        var department_id = $('#department_id').val();
        getDesignation(department_id);

        $(document).on('change', 'select[name=department]', function () {
            getDesignation($(this).val());
        });
    });

    function getDesignation(departmentId) {
        $.ajax({
            url: '{{ route('employee.json') }}',
            type: 'POST',
            data: {
                department_id: departmentId,
                _token: "{{ csrf_token() }}"
            },
            success: function (data) {
                $('#designation_id').empty().append('<option value="">{{ __('Select Designation') }}</option>');
                $.each(data, function (key, value) {
                    $('#designation_id').append(`<option value="${key}">${value}</option>`);
                });
            }
        });
    }
</script>
@endsection

@section('action-button')
<div class="d-flex justify-content-end mb-3">
    @can('Create Indicator')
    <a href="#" data-url="{{ route('indicator.create') }}" class="btn btn-primary" data-ajax-popup="true" data-title="{{ __('Create New Indicator') }}">
        <i class="fas fa-plus"></i> {{ __('Create') }}
    </a>
    @endcan
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-header">
                <h5 class="mb-0">{{ __('Indicators') }}</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered align-middle">
                        <thead>
                            <tr>
                                <th>{{ __('Branch') }}</th>
                                <th>{{ __('Department') }}</th>
                                <th>{{ __('Designation') }}</th>
                                <th>{{ __('Overall Rating') }}</th>
                                <th>{{ __('Added By') }}</th>
                                <th>{{ __('Created At') }}</th>
                                @if(Gate::check('Edit Indicator') || Gate::check('Delete Indicator') || Gate::check('Show Indicator'))
                                <th class="text-center">{{ __('Action') }}</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($indicators as $indicator)
                            @php
                                $rating = !empty($indicator->rating) ? json_decode($indicator->rating, true) : [];
                                $overallRating = !empty($rating) ? array_sum($rating) / count($rating) : 0;
                            @endphp
                            <tr>
                                <td>{{ $indicator->branches->name ?? '' }}</td>
                                <td>{{ $indicator->departments->name ?? '' }}</td>
                                <td>{{ $indicator->designations->name ?? '' }}</td>
                                <td>
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($overallRating < $i)
                                            @if(is_float($overallRating) && round($overallRating) == $i)
                                                <i class="fas fa-star-half-alt text-warning"></i>
                                            @else
                                                <i class="fas fa-star"></i>
                                            @endif
                                        @else
                                            <i class="fas fa-star text-warning"></i>
                                        @endif
                                    @endfor
                                    <span class="text-muted">({{ number_format($overallRating, 1) }})</span>
                                </td>
                                <td>{{ $indicator->user->name ?? '' }}</td>
                                <td>{{ \Auth::user()->dateFormat($indicator->created_at) }}</td>
                                @if(Gate::check('Edit Indicator') || Gate::check('Delete Indicator') || Gate::check('Show Indicator'))
                                <td class="text-center">
                                    <div class="btn-group">
                                        @can('Show Indicator')
                                        <a href="#" data-url="{{ route('indicator.show', $indicator->id) }}" class="btn btn-sm btn-success" data-ajax-popup="true" data-title="{{ __('Indicator Detail') }}" title="{{ __('View Detail') }}">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        @endcan
                                        @can('Edit Indicator')
                                        <a href="#" data-url="{{ route('indicator.edit', $indicator->id) }}" class="btn btn-sm btn-primary" data-ajax-popup="true" data-title="{{ __('Edit Indicator') }}" title="{{ __('Edit') }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        @endcan
                                        @can('Delete Indicator')
                                        <button type="button" class="btn btn-sm btn-danger" data-confirm="{{ __('Are You Sure?') . '|' . __('This action can not be undone. Do you want to continue?') }}" data-confirm-yes="document.getElementById('delete-form-{{ $indicator->id }}').submit();" title="{{ __('Delete') }}">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['indicator.destroy', $indicator->id], 'id' => 'delete-form-' . $indicator->id, 'style' => 'display:none']) !!}
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
