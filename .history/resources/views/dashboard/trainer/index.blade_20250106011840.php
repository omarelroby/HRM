@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Manage Training') }}
@endsection

@section('content')
    <div class="row">
        <!-- Create Button -->
        <div class="d-flex justify-content-end mb-3">
            @can('Create Employee')
                <a href="#" data-bs-toggle="modal" data-bs-target="#addTrainingModal" class="btn btn-primary btn-lg">
                    <i class="fas fa-plus"></i> {{ __('Create Training') }}
                </a>
            @endcan
        </div>

        <!-- Training List Card -->
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0">{{ __('Training List') }}</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead class="table-light">
                                <tr>
                                    <th>{{ __('Branch') }}</th>
                                    <th>{{ __('Full Name') }}</th>
                                    <th>{{ __('Contact') }}</th>
                                    <th>{{ __('Email') }}</th>
                                    @if(Gate::check('Edit Trainer') || Gate::check('Delete Trainer') || Gate::check('Show Trainer'))
                                        <th class="text-end">{{ __('Actions') }}</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($trainers as $trainer)
                                    <tr>
                                        <td>{{ $trainer->branches->name ?? __('N/A') }}</td>
                                        <td>{{ $trainer->firstname }} {{ $trainer->lastname }}</td>
                                        <td>{{ $trainer->contact }}</td>
                                        <td>{{ $trainer->email }}</td>
                                        @if (Gate::check('Edit Trainer') || Gate::check('Delete Trainer') || Gate::check('Show Trainer'))
                                            <td class="text-end">
                                                <div class="btn-group" role="group">
                                                    @can('Show Trainer')
                                                        <a href="#" data-url="{{ route('trainer.show', $trainer->id) }}"
                                                            data-size="lg" data-ajax-popup="true"
                                                            data-title="{{ __('Trainer Details') }}" class="btn btn-sm btn-info">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                    @endcan
                                                    @can('Edit Trainer')
                                                        <a href="#" data-url="{{ route('trainer.edit', $trainer->id) }}"
                                                            data-size="lg" data-ajax-popup="true"
                                                            data-title="{{ __('Edit Trainer') }}" class="btn btn-sm btn-warning">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                    @endcan
                                                    @can('Delete Trainer')
                                                        <a href="#" class="btn btn-sm btn-danger delete-trainer"
                                                            data-confirm="{{ __('Are you sure?') }}|{{ __('This action cannot be undone.') }}"
                                                            data-confirm-yes="document.getElementById('delete-form-{{ $trainer->id }}').submit();">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['trainer.destroy', $trainer->id], 'id' => 'delete-form-' . $trainer->id, 'class' => 'd-none']) !!}
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

    <!-- Add Trainer Modal -->
<!-- Add Training Modal -->
<div class="modal fade" id="addTrainingModal" tabindex="-1" aria-labelledby="addTrainingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="addTrainingModalLabel">{{ __('Add Training') }}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{ Form::open(['url' => 'trainer', 'method' => 'post', 'id' => 'createTrainingForm']) }}
                    <div class="row g-3">
                        <!-- Branch Dropdown -->
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('branch', __('Branch'), ['class' => 'form-label']) }}
                                {{ Form::select('branch', $branches, null, [
                                    'class' => 'form-control select2',
                                    'required' => 'required',
                                    'data-placeholder' => __('Select Branch'),
                                ]) }}
                            </div>
                        </div>

                        <!-- Other Fields -->
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('firstname', __('First Name'), ['class' => 'form-label']) }}
                                {{ Form::text('firstname', null, ['class' => 'form-control', 'required' => 'required']) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('lastname', __('Last Name'), ['class' => 'form-label']) }}
                                {{ Form::text('lastname', null, ['class' => 'form-control', 'required' => 'required']) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('contact', __('Contact'), ['class' => 'form-label']) }}
                                {{ Form::text('contact', null, ['class' => 'form-control', 'required' => 'required']) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('email', __('Email'), ['class' => 'form-label']) }}
                                {{ Form::text('email', null, ['class' => 'form-control', 'required' => 'required']) }}
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                {{ Form::label('expertise', __('Expertise'), ['class' => 'form-label']) }}
                                {{ Form::textarea('expertise', null, ['class' => 'form-control', 'rows' => 3, 'placeholder' => __('Expertise')]) }}
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                {{ Form::label('address', __('Address'), ['class' => 'form-label']) }}
                                {{ Form::textarea('address', null, ['class' => 'form-control', 'rows' => 3, 'placeholder' => __('Address')]) }}
                            </div>
                        </div>
                        <div class="col-12 text-end">
                            <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                        </div>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    // SweetAlert for Delete Confirmation
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.delete-trainer');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function (e) {
                e.preventDefault();
                const message = this.getAttribute('data-confirm').split('|');
                Swal.fire({
                    title: message[0],
                    text: message[1],
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById(this.getAttribute('data-confirm-yes')).submit();
                    }
                });
            });
        });
    });
</script>
@endsection
