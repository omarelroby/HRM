@extends('dashboard.layouts.master')

@section('script')
<script src="{{ asset('js/bootstrap-toggle.js') }}"></script>
<script>
    $(document).ready(function () {
        $('.toggleswitch').bootstrapToggle();

        var branch = $('#branch').val();
        getEmployee(branch);

        $(document).on('change', 'select[name=branch]', function () {
            getEmployee($(this).val());
        });
    });

    function getEmployee(branchId) {
        $.ajax({
            url: '{{ route('branch.employee.json') }}',
            type: 'POST',
            data: {
                branch: branchId,
                _token: "{{ csrf_token() }}"
            },
            success: function (data) {
                $('#employee').empty().append('<option value="">{{ __('Select Branch') }}</option>');
                $.each(data, function (key, value) {
                    $('#employee').append(`<option value="${key}">${value}</option>`);
                });
            }
        });
    }
</script>
@endsection

@section('action-button')
<div class="d-flex justify-content-end mb-3">
    @can('Create Appraisal')
    <a href="#" data-url="{{ route('appraisal.create') }}" class="btn btn-primary" data-ajax-popup="true" data-title="{{ __('Create New Appraisal') }}">
        <i class="fas fa-plus"></i> {{ __('Create') }}
    </a>
    @endcan
</div>
@endsection

@section('content')
<div class="row">
    <!-- Appraisals Card -->
    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">{{ __('Appraisal List') }}</h5>
            </div>
            @if (session('success'))
            <div class="alert alert-success" style="text-align: center;">{{ session('success') }}</div>
            @elseif (session('error'))
            <div class="alert alert-danger" style="text-align: center;">{{ session('error') }}</div>
            @endif
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered align-middle">
                        <thead>
                            <tr>
                                <th>{{ __('Branch') }}</th>
                                <th>{{ __('Department') }}</th>
                                <th>{{ __('Designation') }}</th>
                                <th>{{ __('Employee') }}</th>
                                <th>{{ __('Overall Rating') }}</th>
                                <th>{{ __('Appraisal Date') }}</th>
                                @if(Gate::check('Edit Appraisal') || Gate::check('Delete Appraisal') || Gate::check('Show Appraisal'))
                                <th class="text-center">{{ __('Action') }}</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($appraisals as $appraisal)
                            @php
                                $rating = !empty($appraisal->rating) ? json_decode($appraisal->rating, true) : [];
                                $overallRating = !empty($rating) ? array_sum($rating) / count($rating) : 0;
                            @endphp
                            <tr>
                                <td>{{ $appraisal->branches->name ?? '' }}</td>
                                <td>{{ $appraisal->employees->department->name ?? '' }}</td>
                                <td>{{ $appraisal->employees->designation->name ?? '' }}</td>
                                <td>{{ $appraisal->employees->name ?? '' }}</td>
                                <td>
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($overallRating < $i)
                                            @if (is_float($overallRating) && round($overallRating) == $i)
                                                <i class="fas fa-star-half-alt text-warning"></i>
                                            @else
                                                <i class="far fa-star"></i>
                                            @endif
                                        @else
                                            <i class="fas fa-star text-warning"></i>
                                        @endif
                                    @endfor
                                    <span class="text-muted">({{ number_format($overallRating, 1) }})</span>
                                </td>
                                <td>{{ $appraisal->appraisal_date }}</td>
                                @if(Gate::check('Edit Appraisal') || Gate::check('Delete Appraisal') || Gate::check('Show Appraisal'))
                                <td class="text-center">
                                    <div class="btn-group btn-group-sm" role="group">
                                        @can('Show Appraisal')
                                        <a href="#" data-url="{{ route('appraisal.show', $appraisal->id) }}" class="btn btn-success" data-ajax-popup="true" data-title="{{ __('Appraisal Detail') }}" title="{{ __('View Detail') }}">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        @endcan
                                        @can('Edit Appraisal')
                                        <a href="#" data-url="{{ route('appraisal.edit', $appraisal->id) }}" class="btn btn-primary" data-ajax-popup="true" data-title="{{ __('Edit Appraisal') }}" title="{{ __('Edit') }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        @endcan
                                        @can('Delete Appraisal')
                                        <button type="button" class="btn btn-danger" data-confirm="{{ __('Are You Sure?') . '|' . __('This action can not be undone. Do you want to continue?') }}" data-confirm-yes="document.getElementById('delete-form-{{ $appraisal->id }}').submit();" title="{{ __('Delete') }}">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['appraisal.destroy', $appraisal->id], 'id' => 'delete-form-' . $appraisal->id, 'style' => 'display:none']) !!}
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
