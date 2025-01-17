@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Update Document') }}
@endsection

@section('content')
    <div class="row">
        <!-- Card for Company Policy Update -->
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <!-- Card Header -->
                <div class="card-header  text-white">
                    <h5 class="mb-0">{{ __('Update Employee Document') }}</h5>
                </div>

                <!-- Card Body -->
                <div class="card-body">
                    <div class="modal-body">
                        <form action="{{route('document-upload.update',$document->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <!-- Employee Selection -->
                                <div class="col-12 mb-3">
                                    <label for="employee_id" class="form-label">{{ __('Employee') }}</label>
                                    <select id="employee_id" name="employee_id" class="form-select" aria-label="Select Employee">
                                        <option selected>{{ __('Select Employee') }}</option>
                                        @foreach ($employees as $id => $name)
                                            <option @if($id==$document->employee_id) selected @endif value="{{ $id }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Document Name -->
                                <div class="col-md-12 mb-3">
                                    <label for="name" class="form-label">{{ __('Name') }}</label>
                                    <input type="text" id="name" value="{{$document->name}}" name="name" class="form-control" placeholder="{{ __('Enter Document Name') }}" required>
                                </div>

                                <!-- File Upload -->
                                <div class="col-md-6 mb-3">
                                    <label for="document" class="form-label">{{ __('Document') }}</label>
                                    <input type="file" id="document" name="document" class="form-control">
                                    <small class="form-text text-muted">{{ __('Allowed file types: PDF, DOC, DOCX') }}</small>
                                </div>

                                <!-- Role Selection -->
                                <div class="col-md-6 mb-3">
                                    <label for="document_type_id" class="form-label">{{ __('Documents Types') }}</label>
                                    <select id="document_type_id" name="document_type_id" class="form-select">
                                        <option selected>{{ __('Select Document Type') }}</option>
                                        @foreach ($documentTypes as $id => $type)
                                            <option @if($id==$document->document_type_id) selected @endif value="{{ $id }}">{{ $type }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Checkbox to show additional fields -->
                                <div class="form-group col-12 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" name="is_start_end_date" @if($document->is_start_end_date==1) checked @endif type="checkbox" id="showDateFields">
                                        <label class="form-check-label" for="showDateFields">
                                            {{ __('Include Date Range') }}
                                        </label>
                                    </div>
                                </div>

                                <!-- Date Fields (Inline) -->
                                <div id="dateFields" style="display: none;" class="row align-items-center">
                                    <div class="form-group col-md-6">
                                        <label for="start_date" class="form-label">{{ __('Start Date') }}</label>
                                        <input type="date" value="{{$document->start_date}}" id="start_date" name="start_date" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="end_date" class="form-label">{{ __('End Date') }}</label>
                                        <input type="date" value="{{$document->end_date}}" id="end_date" name="end_date" class="form-control">
                                    </div>
                                </div>

                                <!-- Description -->
                                <div class="col-md-12 mb-3">
                                    <label for="description" class="form-label">{{ __('Description') }}</label>
                                    <textarea id="description" name="description" class="form-control" rows="3" placeholder="{{ __('Enter Description') }}">{{$document->description??''}}</textarea>
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
    </div>
    <script>
        // JavaScript to toggle visibility of date fields on page load
        document.addEventListener('DOMContentLoaded', function () {
            const showDateFieldsCheckbox = document.getElementById('showDateFields');
            const dateFields = document.getElementById('dateFields');

            function toggleDateFields() {
                if (showDateFieldsCheckbox.checked) {
                    dateFields.style.display = 'flex';
                } else {
                    dateFields.style.display = 'none';
                }
            }

            // Initialize visibility on page load
            toggleDateFields();

            // Add event listener to checkbox
            showDateFieldsCheckbox.addEventListener('change', toggleDateFields);
        });
    </script>

@endsection
