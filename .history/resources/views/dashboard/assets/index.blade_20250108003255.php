@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Manage Ticket') }}
@endsection

@section('content')
    <div class="row">
        <div class="d-flex justify-content-end mb-4">
            @can('Create Assets')
                <a href="#" data-bs-toggle="modal" data-bs-target="#addTrainingModal" class="btn btn-primary btn-lg me-3">
                    <i class="fas fa-plus me-2"></i> {{ __('Create New Ticket') }}
                </a>
            @endcan
            <div class="d-flex">
                <div class="me-3">
                    <a href="{{ route('assets.export') }}" class="btn btn-success btn-icon-only">
                        <i class="fa fa-file-excel me-2"></i> {{ __('Export') }}
                    </a>
                </div>
                <div>
                    <a href="#" class="btn btn-info btn-icon-only" data-url="{{ route('assets.file.import') }}" data-ajax-popup="true" data-title="{{ __('Import Asset CSV file') }}">
                        <i class="fa fa-file-csv me-2"></i> {{ __('Import') }}
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card shadow-sm border-0">
                <!-- Card Header -->
                <div class="card-header bg-gradient-primary text-white py-3">
                    <h5 class="card-title mb-0">{{ __('Ticket List') }}</h5>
                </div>

                <!-- Card Body -->
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-sm dataTables">
                            <!-- Table Header -->
                            <thead class="bg-light">
                                <tr>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Purchase Date') }}</th>
                                    <th>{{ __('Support Until') }}</th>
                                    <th>{{ __('Amount') }}</th>
                                    <th>{{ __('Description') }}</th>
                                    @if(Gate::check('Edit Assets') || Gate::check('Delete Assets'))
                                        <th width="120px">{{ __('Action') }}</th>
                                    @endif
                                </tr>
                            </thead>

                            <!-- Table Body -->
                            <tbody>
                                @foreach ($assets as $asset)
                                    <tr>
                                        <td class="font-style">{{ $asset->name }}</td>
                                        <td class="font-style">{{ \Auth::user()->dateFormat($asset->purchase_date) }}</td>
                                        <td class="font-style">{{ \Auth::user()->dateFormat($asset->supported_date) }}</td>
                                        <td class="font-style">{{ \Auth::user()->priceFormat($asset->amount) }}</td>
                                        <td class="font-style">{{ $asset->description }}</td>
                                        @if(Gate::check('Edit Assets') || Gate::check('Delete Assets'))
                                            <td class="text-end">
                                                <!-- Edit Button -->
                                                @can('')
                                                    <a href="#" class="btn btn-sm btn-success edit-icon me-1" data-url="{{ route('account-assets.edit', $asset->id) }}" data-ajax-popup="true" data-title="{{ __('Edit Assets') }}" data-toggle="tooltip" data-original-title="{{ __('Edit') }}" aria-label="{{ __('Edit') }}">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                @endcan

                                                <!-- Delete Button -->
                                                @can('Delete Assets')
                                                    <a href="#" class="btn btn-sm btn-danger delete-icon" data-toggle="tooltip" data-original-title="{{ __('Delete') }}" data-confirm="{{ __('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?') }}" data-confirm-yes="document.getElementById('delete-form-{{ $asset->id }}').submit();" aria-label="{{ __('Delete') }}">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['account-assets.destroy', $asset->id], 'id' => 'delete-form-'.$asset->id]) !!}
                                                    {!! Form::close() !!}
                                                @endcan
                                            </td>
                                            <td>
                                                @can('Edit Assets')
                                                <a href="{{ route('assets.edit',$question->id) }}" class="btn btn-sm btn-warning" data-toggle="tooltip" title="{{ __('Edit Custom Question') }}">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                @endcan

                                            @can('Delete Custom Question')
                                                <form method="POST" action="{{ route('custom-question.destroy', $question->id) }}" class="d-inline" onsubmit="return confirm('{{ __('Are You Sure?') }}\n{{ __('This action cannot be undone. Do you want to continue?') }}');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" title="{{ __('Delete') }}">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
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

    <!-- Add Ticket Modal -->
    <div class="modal fade" id="addTrainingModal" tabindex="-1" aria-labelledby="addTrainingModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header   text-white">
                    <h5 class="modal-title" id="addTrainingModalLabel">{{ __('Add Custom Question') }}</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{ Form::open(['url' => 'account-assets']) }}
                        <div class="row">
                            <div class="col-12 mb-3">
                                {{ Form::label('employee_id', __('Ticket for Employee'), ['class' => 'form-label']) }}
                                {{ Form::select('employee_id', $employees, null, ['class' => 'form-select select2', 'placeholder' => __('Select Employee')]) }}
                            </div>
                            <div class="col-md-6 mb-3">
                                {{ Form::label('name', __('Name'), ['class' => 'form-label']) }}
                                {{ Form::text('name', '', ['class' => 'form-control', 'required' => 'required']) }}
                            </div>
                            <div class="col-md-6 mb-3">
                                {{ Form::label('amount', __('Amount'), ['class' => 'form-label']) }}
                                {{ Form::number('amount', '', ['class' => 'form-control', 'required' => 'required', 'step' => '0.01']) }}
                            </div>
                            <div class="col-md-6 mb-3">
                                {{ Form::label('purchase_date', __('Purchase Date'), ['class' => 'form-label']) }}
                                {{ Form::text('purchase_date', '', ['class' => 'form-control datetimepicker']) }}
                            </div>
                            <div class="col-md-6 mb-3">
                                {{ Form::label('supported_date', __('Support Until'), ['class' => 'form-label']) }}
                                {{ Form::text('supported_date', '', ['class' => 'form-control datetimepicker']) }}
                            </div>
                            <div class="col-12 mb-3">
                                {{ Form::label('description', __('Description'), ['class' => 'form-label']) }}
                                {{ Form::textarea('description', '', ['class' => 'form-control', 'rows' => 3]) }}
                            </div>
                            <div class="col-12 text-end">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                                <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@endpush
