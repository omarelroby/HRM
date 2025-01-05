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
                <i class="fas fa-plus"></i> {{ __('Create Trainer') }}
            </a>
        @endcan
    </div>
    <!-- Trainer List Card -->
      <div class="col-lg-12">
        <div class="card shadow-sm">
            <div class="card-header  text-white">
                <h5 class="card-title mb-0">{{ __('Trainer List') }}</h5>
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

                                                @can('Edit Trainer')
                                                <a href="{{ route('trainer.edit', $training->id) }}"
                                                    data-title="{{ __('Edit Training') }}" data-toggle="tooltip"
                                                    data-original-title="{{ __('Edit') }}" class="btn btn-success btn-icon-only">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                @endcan

                                                {{-- Delete Button --}}
                                                @can('Delete Trainer')
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['trainer.destroy', $trainer->id], 'id' => 'delete-form-' . $trainer->id, 'style' => 'display:inline;']) !!}
                                                        <button type="button" class="btn btn-danger btn-icon-only" data-toggle="tooltip" data-original-title="{{ __('Delete') }}"
                                                                onclick="if (confirm('Are you sure you want to delete this item? This action cannot be undone.')) { document.getElementById('delete-form-{{ $trainer->id }}').submit(); }">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
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
<div class="modal fade" id="addTrainingModal" tabindex="-1" aria-labelledby="addTrainingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header text-white">
                <h5 class="modal-title" id="addTrainingModalLabel">{{ __('Add Trainer') }}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('trainer') }}" method="POST">
                    @csrf <!-- Add CSRF token for security -->
                    <div class="row g-3">
                        <!-- Branch Dropdown -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="branch" class="form-label">{{ __('Branch') }}</label>
                                <select name="branch" id="branch" class="select form-control" required data-placeholder="{{ __('Select Branch') }}">
                                    <option value="">{{ __('Select Branch') }}</option>
                                    @foreach ($branches as $k => $name)
                                        <option value="{{ $name->id }}">{{ $name->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- First Name -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="firstname" class="form-label">{{ __('First Name') }}</label>
                                <input type="text" name="firstname" id="firstname" class="form-control" required>
                            </div>
                        </div>

                        <!-- Last Name -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="lastname" class="form-label">{{ __('Last Name') }}</label>
                                <input type="text" name="lastname" id="lastname" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="firstname" class="form-label">{{ __('First Name (AR)') }}</label>
                                <input type="text" name="firstname_ar" id="firstname_ar" class="form-control" required>
                            </div>
                        </div>

                        <!-- Last Name -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="lastname" class="form-label">{{ __('Last Name (AR)') }}</label>
                                <input type="text" name="lastname_ar" id="lastname_ar" class="form-control" required>
                            </div>
                        </div>

                        <!-- Contact -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="contact" class="form-label">{{ __('Contact') }}</label>
                                <input type="text" name="contact" id="contact" class="form-control" required>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('Email') }}</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                        </div>

                        <!-- Expertise -->
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="expertise" class="form-label">{{ __('Expertise') }}</label>
                                <textarea name="expertise" id="expertise" class="form-control" rows="3" placeholder="{{ __('Expertise') }}"></textarea>
                            </div>
                        </div>

                        <!-- Address -->
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="address" class="form-label">{{ __('Address') }}</label>
                                <textarea name="address" id="address" class="form-control" rows="3" placeholder="{{ __('Address') }}"></textarea>
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="col-12 text-end">
                            <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection
