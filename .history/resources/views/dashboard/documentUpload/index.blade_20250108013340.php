@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Manage Account Assets') }}
@endsection

@section('content')
    <div class="row">
        <div class="d-flex justify-content-end mb-4">
            @can('Create Assets')
                <a href="#" data-bs-toggle="modal" data-bs-target="#addDocumentModal" class="btn btn-primary me-3">
                    <i class="fas fa-plus me-2"></i> {{ __('Upload New Document') }}
                </a>
            @endcan
        </div>
        <div class="col-lg-12">
            <div class="card shadow-sm border-0">
                <!-- Card Header -->
                <div class="card-header bg-gradient-primary text-white py-3">
                    <h5 class="card-title mb-0">{{ __('Account Assets') }}</h5>
                </div>

                <!-- Card Body -->
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-sm dataTables">
                            <thead>
                                <tr>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Document') }}</th>
                                    <th>{{ __('Role') }}</th>
                                    <th>{{ __('Description') }}</th>
                                    @if(Gate::check('Edit Document') || Gate::check('Delete Document'))
                                        <th width="3%">{{ __('Action') }}</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody class="font-style">
                                @foreach ($documents as $document)
                                    @php
                                        $documentPath = asset(Storage::url('uploads/documentUpload'));
                                        $role = \Spatie\Permission\Models\Role::find($document->role);
                                    @endphp
                                    <tr>
                                        <td>{{ $document->name }}</td>
                                        <td>
                                            @if(!empty($document->document))
                                                <a href="{{ $documentPath . '/' . $document->document }}" target="_blank" class="text-decoration-none">
                                                    <i class="fas fa-download text-primary"></i>
                                                </a>
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td>{{ $role ? $role->name : 'All' }}</td>
                                        <td>{{ $document->description }}</td>
                                        @if(Gate::check('Edit Document') || Gate::check('Delete Document'))
                                            <td class="text-right action-btns">
                                                @can('Edit Document')
                                                    <a href="#" data-url="{{ route('document-upload.edit', $document->id) }}" data-size="lg" data-ajax-popup="true" data-title="{{ __('Edit Document') }}" class="edit-icon btn btn-success btn-sm" data-toggle="tooltip" title="{{ __('Edit') }}">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                @endcan
                                                @can('Delete Document')
                                                    <a href="#" class="delete-icon btn btn-danger btn-sm" data-toggle="tooltip" title="{{ __('Delete') }}" data-confirm="{{ __('Are You Sure?') . '|' . __('This action cannot be undone. Do you want to continue?') }}" data-confirm-yes="document.getElementById('delete-form-{{ $document->id }}').submit();">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['document-upload.destroy', $document->id], 'id' => 'delete-form-' . $document->id]) !!}
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

    <!-- Add Document Modal -->
    <div class="modal fade" id="addDocumentModal" tabindex="-1" aria-labelledby="addDocumentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header bg-gradient-primary text-white py-3">
                    <h5 class="modal-title" id="addDocumentModalLabel">{{ __('Upload Document') }}</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    {{ Form::open(['url' => 'document-upload', 'method' => 'post', 'enctype' => 'multipart/form-data']) }}
                        <div class="row">
                            <!-- Employee Selection -->
                            <div class="col-12 mb-3">
                                {{ Form::label('employee_id', __('Ticket for Employee'), ['class' => 'form-label']) }}
                                {{ Form::select('employee_id', $employees, null, ['class' => 'form-select select2', 'placeholder' => __('Select Employee'), 'aria-label' => 'Select Employee']) }}
                            </div>

                            <!-- Document Name -->
                            <div class="col-md-12 mb-3">
                                {{ Form::label('name', __('Name'), ['class' => 'form-label']) }}
                                {{ Form::text('name', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => __('Enter Document Name')]) }}
                            </div>

                            <!-- File Upload -->
                            <div class="col-md-6 mb-3">
                                {{ Form::label('document', __('Document'), ['class' => 'form-label']) }}
                                <div class="input-group">
                                    <input type="file" class="form-control" name="document" id="document" aria-label="Upload Document" required>
                                    <label for="document" class="input-group-text bg-primary text-white">
                                        <i class="fas fa-upload me-2"></i>{{ __('Choose File') }}
                                    </label>
                                </div>
                                <small class="form-text text-muted">{{ __('Allowed file types: PDF, DOC, DOCX') }}</small>
                            </div>

                            <!-- Role Selection -->
                            <div class="col-md-6 mb-3">
                                {{ Form::label('role', __('Role'), ['class' => 'form-label']) }}
                                {{ Form::select('role', $roles, null, ['class' => 'form-control select2', 'placeholder' => __('Select Role'), 'aria-label' => 'Select Role']) }}
                            </div>

                            <!-- Description -->
                            <div class="col-md-12 mb-3">
                                {{ Form::label('description', __('Description'), ['class' => 'form-label']) }}
                                {{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => 3, 'placeholder' => __('Enter Description')]) }}
                            </div>

                            <!-- Buttons -->
                            <div class="col-12 text-end">
                                <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                                <button type="submit" class="btn btn-primary">{{ __('Upload') }}</button>
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
