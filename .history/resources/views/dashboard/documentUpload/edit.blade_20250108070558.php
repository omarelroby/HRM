@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Update Document') }}
@endsection

@section('content')
    <div class="row">
        <!-- Card for Document Update -->
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">{{ __('Update Document') }}</h5>
                </div>
                <div class="card-body">
                    {{ Form::model($ducumentUpload, ['route' => ['document-upload.update', $ducumentUpload->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) }}
                        @csrf
                        <div class="row">
                            <!-- Name Field -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{ Form::label('name', __('Name'), ['class' => 'form-control-label']) }}
                                    {{ Form::text('name', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => __('Enter document name')]) }}
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Document Upload Field -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('document', __('Document'), ['class' => 'form-control-label']) }}
                                    <div class="choose-file form-group">
                                        <label for="document" class="form-control-label">
                                            <div>{{ __('Choose file here') }}</div>
                                            <input type="file" class="form-control" name="document" id="document" data-filename="document_update">
                                        </label>
                                        <p class="document_update mt-2"></p>
                                        @error('document')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Role Selection Field -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('role', __('Role'), ['class' => 'form-control-label']) }}
                                    {{ Form::select('role', $roles, null, ['class' => 'form-control select2', 'placeholder' => __('Select a role')]) }}
                                    @error('role')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Description Field -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{ Form::label('description', __('Description'), ['class' => 'form-control-label']) }}
                                    {{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => 3, 'placeholder' => __('Enter document description')]) }}
                                    @error('description')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancel') }}</button>
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Datepicker Script -->
    <script>
        $(document).ready(function () {
            $(".datepicker").hijriDatePicker({
                format: 'YYYY-M-D',
                showSwitcher: false,
                hijri: false,
                useCurrent: true,
            });
        });
    </script>
@endsection
