@extends('dashboard.layouts.master')
@extends('dashboard.layouts.header')

@section('css')
<script>
    /* Add margin to the buttons inside the .btn-group */
    .btn-group .btn {
        margin-right: 12px; /* Adjust space between buttons */
    }

    /* Add margin to the table cell itself */
    .text-right {
        margin-right: 15px; /* Adjust the margin around the whole <td> */
    }

    /* Optional: Adjust height of buttons */
    .btn-sm {
        height: 40px; /* Increase button height */
        padding: 10px 15px; /* Adjust padding for consistent size */
    }

    /* Optional: Adjust font size of icons */
    .btn i {
        font-size: 16px; /* Adjust icon size */
    }
</script>
@endsection

@section('page-title')
    {{ __('Manage Training') }}
@endsection

@section('content')
    <div class="row">
        <div class="d-flex justify-content-end mb-3 my">
            @can('Create Employee')
                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#addJobTitleModal" class="btn btn-primary">
                        <i class="fa fa-plus"></i> {{ __('Create') }}
                    </a>
                </div>
            @endcan
        </div>
        <!-- Card for Training List -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5>{{ __('Training List') }}</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables">
                            <thead>
                                <tr>
                                    <th>{{ __('Branch') }}</th>
                                    <th>{{ __('Training Type') }}</th>
                                    <th>{{ __('Employee') }}</th>
                                    <th>{{ __('Trainer') }}</th>
                                    <th>{{ __('Training Duration') }}</th>
                                    <th>{{ __('Cost') }}</th>
                                    @if (Gate::check('Edit Training') || Gate::check('Delete Training') || Gate::check('Show Training'))
                                        <th width="200px">{{ __('Actions') }}</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody class="font-style">
                                @foreach ($trainings as $training)
                                    <tr>
                                        <td>{{ !empty($training->branches) ? $training->branches->name : '' }}</td>
                                        <td>
                                            {{ !empty($training->types) ? $training->types->name : '' }} <br>
                                            @if ($training->status == 0)
                                                <span class="text-warning">{{ __($status[$training->status]) }}</span>
                                            @elseif($training->status == 1)
                                                <span class="text-primary">{{ __($status[$training->status]) }}</span>
                                            @elseif($training->status == 2)
                                                <span class="text-success">{{ __($status[$training->status]) }}</span>
                                            @elseif($training->status == 3)
                                                <span class="text-info">{{ __($status[$training->status]) }}</span>
                                            @endif
                                        </td>
                                        <td>{{ !empty($training->employees) ? $training->employees->name : '' }}</td>
                                        <td>{{ !empty($training->trainers) ? $training->trainers->firstname : '' }}</td>
                                        <td>{{ \Auth::user()->dateFormat($training->start_date) . ' to ' . \Auth::user()->dateFormat($training->end_date) }}</td>
                                        <td>{{ \Auth::user()->priceFormat($training->training_cost) }}</td>
                                        @if (Gate::check('Edit Training') || Gate::check('Delete Training') || Gate::check('Show Training'))
                                            <td class="text-right">
                                                @can('Show Training')
                                                    <a href="{{ route('training.show', \Illuminate\Support\Facades\Crypt::encrypt($training->id)) }}"
                                                        class="btn btn-success btn-icon-only" data-toggle="tooltip"
                                                        data-original-title="{{ __('View Detail') }}">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                @endcan
                                                @can('Edit Training')
                                                    <a href="#" data-url="{{ route('training.edit', $training->id) }}"
                                                        data-size="lg" data-ajax-popup="true"
                                                        data-title="{{ __('Edit Training') }}" data-toggle="tooltip"
                                                        data-original-title="{{ __('Edit') }}" class="btn btn-success btn-icon-only">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                @endcan
                                                @can('Delete Training')
                                                    <a href="#" class="btn btn-danger btn-icon-only"
                                                        data-confirm="{{ __('Are You Sure?') . '|' . __('This action can not be undone. Do you want to continue?') }}"
                                                        data-confirm-yes="document.getElementById('delete-form-{{ $training->id }}').submit();"
                                                        data-toggle="tooltip" data-original-title="{{ __('Delete') }}">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['training.destroy', $training->id], 'id' => 'delete-form-' . $training->id]) !!}
                                                    {!! Form::close() !!}
                                                @endcan
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
   <!-- Add Training Modal -->
<div class="modal fade" id="addJobTitleModal" tabindex="-1" aria-labelledby="addJobTitleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="addJobTitleModalLabel">{{ __('Add New Training') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                {{ Form::open(['url' => 'training', 'method' => 'post', 'class' => 'needs-validation', 'novalidate' => true]) }}
                <div class="row">
                    <!-- Branch -->
                    <div class="col-md-12 mb-3">
                        <div class="form-group">
                            {{ Form::label('branch', __('Branch'), ['class' => 'form-control-label']) }}
                            {{ Form::select('branch', $branches, null, ['class' => 'form-control select2', 'required' => 'required']) }}
                        </div>
                    </div>

                    <!-- Trainer Option -->
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            {{ Form::label('trainer_option', __('Trainer Option'), ['class' => 'form-control-label']) }}
                            {{ Form::select('trainer_option', $options, null, ['class' => 'form-control select2', 'required' => 'required']) }}
                        </div>
                    </div>

                    <!-- Training Type -->
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            {{ Form::label('training_type', __('Training Type'), ['class' => 'form-control-label']) }}
                            {{ Form::select('training_type', $trainingTypes, null, ['class' => 'form-control select2', 'required' => 'required']) }}
                        </div>
                    </div>

                    <!-- Trainer -->
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            {{ Form::label('trainer', __('Trainer'), ['class' => 'form-control-label']) }}
                            {{ Form::select('trainer', $trainers, null, ['class' => 'form-control select2', 'required' => 'required']) }}
                        </div>
                    </div>

                    <!-- Training Cost -->
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            {{ Form::label('training_cost', __('Training Cost'), ['class' => 'form-control-label']) }}
                            {{ Form::number('training_cost', null, ['class' => 'form-control', 'step' => '0.01', 'required' => 'required']) }}
                        </div>
                    </div>

                    <!-- Employee -->
                    <div class="col-md-12 mb-3">
                        <div class="form-group">
                            {{ Form::label('employee', __('Employee'), ['class' => 'form-control-label']) }}
                            {{ Form::select('employee', $employees, null, ['class' => 'form-control select2', 'required' => 'required']) }}
                        </div>
                    </div>

                    <!-- Start Date -->
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            {{ Form::label('start_date', __('Start Date'), ['class' => 'form-control-label']) }}
                            {{ Form::text('start_date', null, ['class' => 'form-control datetimepicker', 'required' => 'required']) }}
                        </div>
                    </div>

                    <!-- End Date -->
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            {{ Form::label('end_date', __('End Date'), ['class' => 'form-control-label']) }}
                            {{ Form::text('end_date', null, ['class' => 'form-control datetimepicker', 'required' => 'required']) }}
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="col-md-12 mb-3">
                        <div class="form-group">
                            {{ Form::label('description', __('Description'), ['class' => 'form-control-label']) }}
                            {{ Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => __('Description'), 'rows' => 3]) }}
                        </div>
                    </div>

                    <!-- Description (Arabic) -->
                    <div class="col-md-12 mb-3">
                        <div class="form-group">
                            {{ Form::label('description_ar', __('Description (Arabic)'), ['class' => 'form-control-label']) }}
                            {{ Form::textarea('description_ar', null, ['class' => 'form-control', 'placeholder' => __('Description (Arabic)'), 'rows' => 3]) }}
                        </div>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    // Optional: Submit form via AJAX for a smooth UX (No page reload)
    $('#createTrainingForm').submit(function(event) {
        event.preventDefault();
        var formData = $(this).serialize();

        $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: formData,
            success: function(response) {
                if (response.success) {
                    $('#addTrainingModal').modal('hide');
                    location.reload(); // Refresh page to show the new Training
                } else {
                    alert(response.message); // Show error message if needed
                }
            },
            error: function() {
                alert('{{ __('Something went wrong. Please try again.') }}');
            }
        });
    });
</script>
@endsection
