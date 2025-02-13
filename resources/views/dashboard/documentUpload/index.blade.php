@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Manage Account Assets') }}
@endsection

@section('content')
    <div class="row">
        <div class="d-flex justify-content-end mb-4">
            @can('Create Document')
                <a href="#" data-bs-toggle="modal" data-bs-target="#addDocumentModal" class="btn btn-primary me-3">
                    <i class="fas fa-plus me-2"></i> {{ __('Upload New Document') }}
                </a>
            @endcan
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card shadow-sm">
                    <!-- Card Header -->
                    <div class="card-header bg-gradient-primary text-white py-3">
                        <h5 class="card-title mb-0">{{ __('Employee Documents') }}</h5>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body">
                        <!-- Filters for Department and Employee -->
                        <div class="row mb-4">
                            <form action="{{ route('document-upload.index') }}" method="GET" class="row g-3">

                                <div class="col-md-4">
                                    <label for="departmentFilter">{{ __('Department') }}</label>
                                    <select  name="department_id" class="form-select">
                                        <option value="">{{ __('All Departments') }}</option>
                                        @foreach($departments as $department)
                                            <option value="{{ $department->id }}" {{ request('department_id') == $department->id ? 'selected' : '' }}>
                                                {{ $department->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="employeeFilter">{{ __('Employee') }}</label>
                                    <select id="employeeFilter" name="employee_id" class="form-select">
                                        <option value="">{{ __('All Employees') }}</option>
                                        @foreach($employees as $id => $employee)
                                            <option value="{{ $id }}" {{ request('employee_id') == $id ? 'selected' : '' }}>
                                                {{ $employee }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="document_type">{{ __('Document Type') }}</label>
                                    <select   name="document_type" class="form-select">
                                        <option value="">{{ __('Document Type') }}</option>
                                        @foreach($types as $id => $type)
                                            <option value="{{ $id }}" {{ request('document_type') == $id ? 'selected' : '' }}>
                                                {{ $type }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">{{ __('Filter') }}</button>
                                    <a href="{{ route('document-upload.index') }}" class="btn btn-secondary">{{ __('Reset') }}</a>
                                </div>
                            </form>
                        </div>

                        <!-- Table -->
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables">
                                <thead class="thead-light">
                                <tr>
                                    <th class="text-start ps-4">{{ __('Name') }}</th>
                                    <th class="text-start ps-4">{{ __('Employee') }}</th>
                                    <th class="text-center">{{ __('Document') }}</th>
                                    <th class="text-center">{{ __('Document Type') }}</th>
                                    <th class="text-center">{{ __('Is Contract') }}</th>
                                    <th class="text-center">{{ __('Specific Or Not Period') }}</th>
                                    <th class="text-center">{{ __('Start Date') }}</th>
                                    <th class="text-center">{{ __('End Date') }}</th>
                                    @if(Gate::check('Edit Document') || Gate::check('Delete Document'))
                                        <th class="text-end pe-4" width="10%">{{ __('Action') }}</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($documents as $document)
                                    @php
                                        $documentPath = asset(Storage::url('uploads/documentUpload'));
                                    @endphp
                                    <tr class="hover-shadow">
                                        <td class="text-start ps-4">{{ $document->name }}</td>
                                        <td class="text-start ps-4">{{ $document->employee->name ?? '' }}</td>
                                        <td class="text-center">
                                            @if(!empty($document->document))
                                                <a href="{{ $documentPath . '/' . $document->document }}" target="_blank" class="text-decoration-none">
                                                    <i class="fas fa-download text-primary"></i>
                                                </a>
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td class="text-center">{{ $document->document_type->name ?? '' }}</td>
                                        <td class="text-center">
                                        <span class="px-2 py-1 rounded text-white fw-bold {{ $document->is_contract ? 'bg-success' : 'bg-danger' }}">
                                            {{ $document->is_contract ? 'YES' : 'NO' }}
                                        </span>
                                        </td>
                                        <td class="text-center">
                                        <span class="px-2 py-1 rounded text-white fw-bold {{ $document->contract_specific==1 ? 'bg-success' : 'bg-danger' }}">
                                            {{ $document->contract_specific==1 ? 'YES' : 'NO' }}
                                        </span>
                                        </td>
                                        <td class="text-start">{{ $document->start_date ?? 'N/A' }}</td>
                                        <td class="text-start">{{ $document->end_date ?? 'N/A' }}</td>
                                        @if(Gate::check('Edit Document') || Gate::check('Delete Document'))
                                            <td class="text-end pe-4">
                                                <div class="d-flex justify-content-end gap-2">
                                                    @can('Edit Document')
                                                        <a href="{{ route('document-upload.edit', $document->id) }}" data-title="{{ __('Edit Document') }}" class="btn btn-sm btn-outline-success" title="{{ __('Edit') }}">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                    @endcan
                                                    @can('Delete Document')
                                                        <form method="POST" action="{{ route('document-upload.destroy', $document->id) }}" class="d-inline" onsubmit="return confirm('{{ __('Are You Sure?') }}\n{{ __('This action cannot be undone. Do you want to continue?') }}');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" title="{{ __('Delete') }}">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
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
                            {{ Form::label('employee_id', __('Select Employee'), ['class' => 'form-label']) }}
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
                            {{ Form::label('document_type_id', __('Document Type'), ['class' => 'form-label']) }}
                            {{ Form::select('document_type_id', $documentTypes, null, ['class' => 'form-control select2', 'placeholder' => __('Select Document Type'), 'aria-label' => 'Select Role']) }}
                            <div class="form-group col-6">
                                <div class="form-check">
                                    <label class="form-check-label" for="showContractFields">
                                        {{ __('If You Choosed Contract Type Press Here') }}
                                    </label>
                                    <input class="form-check-input" name="is_contract" type="checkbox" id="showContractFields">
                                </div>
                            </div>
                        </div>
                        <div id="contractFields" style="display: none;" class="row align-items-center">
                            <div class="col-6">

                            </div>
                            <div class="col-6 mb-3">
                                <label for="contract_specific" class="form-label">{{__('Specific Period Or Not')}}</label>
                                <select id="contract_specific" name="contract_specific" class="form-select select2" aria-label="Select Contract Specific">
                                    <option value="1"   selected>{{__('specified')}}</option>
                                    <option value="2"    >{{__('not specified')}}</option>
                                </select>
                            </div>

                        </div>

                        <!-- Checkbox to show additional fields -->
                        <div class="form-group col-3">
                            <div class="form-check">
                                <input class="form-check-input" name="is_start_end_date" type="checkbox" id="showDateFields">
                                <label class="form-check-label" for="showDateFields">
                                    {{ __('Include Date Range') }}
                                </label>
                            </div>
                        </div>

                        <!-- Date Fields (Inline) -->
                        <div id="dateFields" style="display: none;" class="row align-items-center">
                            <div class="form-group col-md-6">
                                {{Form::label('start_date',__('Start Date'),['class'=>'form-label'])}}
                                {{Form::date('start_date',null,array('class'=>'form-control'))}}
                            </div>
                            <div class="form-group col-md-6">
                                {{Form::label('end_date',__('End Date'),['class'=>'form-label'])}}
                                {{Form::date('end_date',null,array('class'=>'form-control'))}}
                            </div>
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

    <script>
        // JavaScript to toggle visibility of date fields
        document.getElementById('showDateFields').addEventListener('change', function() {
            const dateFields = document.getElementById('dateFields');
            if (this.checked) {
                dateFields.style.display = 'flex';
            } else {
                dateFields.style.display = 'none';
            }
        });
    </script>
    <script>
        // JavaScript to toggle visibility of date fields
        document.getElementById('showContractFields').addEventListener('change', function() {
            const dateFields = document.getElementById('contractFields');
            if (this.checked) {
                dateFields.style.display = 'flex';
            } else {
                dateFields.style.display = 'none';
            }
        });
    </script>

@endsection

@push('scripts')
    <script>

    </script>
@endpush
