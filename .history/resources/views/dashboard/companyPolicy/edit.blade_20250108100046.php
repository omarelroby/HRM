@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Update Company Policy') }}
@endsection

@section('content')
    <div class="row">
        <!-- Card for Company Policy Update -->
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <!-- Card Header -->
                <div class="card-header  text-white">
                    <h5 class="mb-0">{{ __('Update Company Policy') }}</h5>
                </div>

                <!-- Card Body -->
                <div class="card-body">
                    {{ Form::model($companyPolicy, ['route' => ['company-policy.update', $companyPolicy->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) }}
                    <div class="row g-3">
                        <!-- Branch Selection -->
                        <div class="col-md-12">
                            <div class="form-group">
                                {{ Form::label('branch', __('Branch'), ['class' => 'form-label']) }}
                                {{ Form::select('branch', $branch, null, ['class' => 'form-control select2', 'required' => 'required', 'aria-describedby' => 'branchHelp']) }}
                                <small id="branchHelp" class="form-text text-muted">{{ __('Select the branch for this policy.') }}</small>
                            </div>
                        </div>

                        <!-- Title (English) -->
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('title', __('Title (English)'), ['class' => 'form-label']) }}
                                {{ Form::text('title', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => __('Enter title in English')]) }}
                            </div>
                        </div>

                        <!-- Title (Arabic) -->
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('title_ar', __('Title (Arabic)'), ['class' => 'form-label']) }}
                                {{ Form::text('title_ar', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => __('Enter title in Arabic')]) }}
                            </div>
                        </div>

                        <!-- Description (English) -->
                        <div class="col-md-12">
                            <div class="form-group">
                                {{ Form::label('description', __('Description (English)'), ['class' => 'form-label']) }}
                                {{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => 3, 'placeholder' => __('Enter description in English')]) }}
                            </div>
                        </div>

                        <!-- Description (Arabic) -->
                        <div class="col-md-12">
                            <div class="form-group">
                                {{ Form::label('description_ar', __('Description (Arabic)'), ['class' => 'form-label']) }}
                                {{ Form::textarea('description_ar', null, ['class' => 'form-control', 'rows' => 3, 'placeholder' => __('Enter description in Arabic')]) }}
                            </div>
                        </div>

                        <!-- Attachment -->
                        <div class="col-md-12">
                            <div class="form-group">
                                {{ Form::label('attachment', __('Attachment'), ['class' => 'form-label']) }}
                                <div class="input-group">
                                    <input type="file" class="form-control" name="attachment" id="attachment" aria-describedby="attachmentHelp">
                                    <label for="attachment" class="input-group-text">{{ __('Choose file') }}</label>
                                </div>
                                <small id="attachmentHelp" class="form-text text-muted">{{ __('Upload a file if necessary.') }}</small>
                                <p class="mt-2" id="attachmentFileName">
                                    @if ($companyPolicy->attachment)
                                        {{ __('Current file:') }} <a href="{{ asset($companyPolicy->attachment) }}" target="_blank">{{ basename($companyPolicy->attachment) }}</a>
                                    @else
                                        {{ __('No file uploaded.') }}
                                    @endif
                                </p>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="col-12 text-end">
                            <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Script to display selected file name -->
    <script>
        document.getElementById('attachment').addEventListener('change', function (e) {
            const fileName = e.target.files[0]?.name || '{{ __('No file chosen') }}';
            document.getElementById('attachmentFileName').textContent = '{{ __('Selected file:') }} ' + fileName;
        });
    </script>
@endsection
