@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Update Document') }}
@endsection

@section('content')
    <div class="row">
        <!-- Card for Document Update -->
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <!-- Card Header -->
                <div class="card-header bg-gradient-primary text-white py-3">
                    <h5 class="mb-0">{{ __('Update Employee Document') }}</h5>
                </div>

                <!-- Card Body -->
                <div class="card-body">
                    <form action="{{ route('document-upload.update', $document->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <!-- Employee Selection -->
                            <div class="col-12 mb-3">
                                <label for="employee_id" class="form-label">{{ __('Select Employee') }}</label>
                                <select id="employee_id" name="employee_id" class="form-select select2" aria-label="Select Employee">
                                    <option value="" disabled>{{ __('Select Employee') }}</option>
                                    @foreach ($employees as $id => $name)
                                        <option value="{{ $id }}" @if($id == $document->employee_id) selected @endif>{{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Document Name -->
                            <div class="col-md-12 mb-3">
                                <label for="name" class="form-label">{{ __('Name') }}</label>
                                <input type="text" id="name" name="name" value="{{ $document->name }}" class="form-control" required placeholder="{{ __('Enter Document Name') }}">
                            </div>

                            <!-- File Upload -->
                            <div class="col-md-6 mb-3">
                                <label for="document" class="form-label">{{ __('Document') }}</label>
                                <div class="input-group">
                                    <input type="file" id="document" name="document" class="form-control">
                                    <label for="document" class="input-group-text bg-primary text-white">
                                        <i class="fas fa-upload me-2"></i>{{ __('Choose File') }}
                                    </label>
                                </div>
                                <small class="form-text text-muted">{{ __('Allowed file types: PDF, DOC, DOCX') }}</small>
                            </div>

                            <!-- Document Type -->
                            <div class="col-md-6 mb-3">
                                <label for="document_type_id" class="form-label">{{ __('Document Type') }}</label>
                                <select id="document_type_id" name="document_type_id" class="form-select select2" aria-label="Select Document Type">
                                    <option value="" disabled>{{ __('Select Document Type') }}</option>
                                    @foreach ($documentTypes as $id => $type)
                                        <option value="{{ $id }}" @if($id == $document->document_type_id) selected @endif>{{ $type }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Is Contract Checkbox -->
                            <div class="form-group col-md-6 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="is_contract" id="showContractFields" @if($document->is_contract) checked @endif>
                                    <label class="form-check-label" for="showContractFields">
                                        {{ __('If You Choosed Contract Type Press Here') }}
                                    </label>
                                </div>
                            </div>

                            <!-- Contract Fields -->
                            <div id="contractFields" style="display: none;" class="row align-items-center">
                                <div class="col-6"></div>
                                <div class="col-6 mb-3">
                                    <label for="contract_specific" class="form-label">{{ __('Specific Period Or Not') }}</label>
                                    <select id="contract_specific" name="contract_specific" class="form-select select2" aria-label="Select Contract Specific">
                                        <option value="1" @if($document->contract_specific == 1) selected @endif>{{ __('Specified') }}</option>
                                        <option value="2" @if($document->contract_specific == 2) selected @endif>{{ __('Not Specified') }}</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Include Date Range Checkbox -->
                            <div class="form-group col-12 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="is_start_end_date" id="showDateFields" @if($document->is_start_end_date) checked @endif>
                                    <label class="form-check-label" for="showDateFields">
                                        {{ __('Include Date Range') }}
                                    </label>
                                </div>
                            </div>

                            <!-- Date Fields -->
                            <div id="dateFields" style="display: none;" class="row align-items-center">
                                <div class="form-group col-md-6">
                                    <label for="start_date" class="form-label">{{ __('Start Date') }}</label>
                                    <input type="date" id="start_date" name="start_date" value="{{ $document->start_date }}" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="end_date" class="form-label">{{ __('End Date') }}</label>
                                    <input type="date" id="end_date" name="end_date" value="{{ $document->end_date }}" class="form-control">
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="col-md-12 mb-3">
                                <label for="description" class="form-label">{{ __('Description') }}</label>
                                <textarea id="description" name="description" class="form-control" rows="3" placeholder="{{ __('Enter Description') }}">{{ $document->description }}</textarea>
                            </div>

                            <!-- Buttons -->
                            <div class="col-12 text-end">
                                <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                                <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // JavaScript for toggling visibility of contract and date fields
        document.addEventListener('DOMContentLoaded', function () {
            const showContractFieldsCheckbox = document.getElementById('showContractFields');
            const contractFields = document.getElementById('contractFields');
            const showDateFieldsCheckbox = document.getElementById('showDateFields');
            const dateFields = document.getElementById('dateFields');

            function toggleFields(checkbox, fields) {
                fields.style.display = checkbox.checked ? 'flex' : 'none';
            }

            // Initialize visibility on page load
            toggleFields(showContractFieldsCheckbox, contractFields);
            toggleFields(showDateFieldsCheckbox, dateFields);

            // Add event listeners
            showContractFieldsCheckbox.addEventListener('change', () => toggleFields(showContractFieldsCheckbox, contractFields));
            showDateFieldsCheckbox.addEventListener('change', () => toggleFields(showDateFieldsCheckbox, dateFields));
        });
    </script>
@endsection
