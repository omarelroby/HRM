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
                {{ Form::open(['url' => 'training', 'method' => 'post', 'class' => 'needs-validation', 'novalidate' => true, 'id' => 'createTrainingForm']) }}
                <div class="row">
                    <!-- Branch -->
                    <div class="col-md-12 mb-3">
                        <div class="form-group">
                            {{ Form::label('branch', __('Branch'), ['class' => 'form-control-label']) }}
                            {{ Form::select('branch', $branches, old('branch'), ['class' => 'form-control select2' . ($errors->has('branch') ? ' is-invalid' : ''), 'required' => 'required']) }}
                            @error('branch')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Trainer Option -->
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            {{ Form::label('trainer_option', __('Trainer Option'), ['class' => 'form-control-label']) }}
                            {{ Form::select('trainer_option', $options, old('trainer_option'), ['class' => 'form-control select2' . ($errors->has('trainer_option') ? ' is-invalid' : ''), 'required' => 'required']) }}
                            @error('trainer_option')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Training Type -->
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            {{ Form::label('training_type', __('Training Type'), ['class' => 'form-control-label']) }}
                            {{ Form::select('training_type', $trainingTypes, old('training_type'), ['class' => 'form-control select2' . ($errors->has('training_type') ? ' is-invalid' : ''), 'required' => 'required']) }}
                            @error('training_type')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Trainer -->
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            {{ Form::label('trainer', __('Trainer'), ['class' => 'form-control-label']) }}
                            {{ Form::select('trainer', $trainers, old('trainer'), ['class' => 'form-control select2' . ($errors->has('trainer') ? ' is-invalid' : ''), 'required' => 'required']) }}
                            @error('trainer')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Training Cost -->
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            {{ Form::label('training_cost', __('Training Cost'), ['class' => 'form-control-label']) }}
                            {{ Form::number('training_cost', old('training_cost'), ['class' => 'form-control' . ($errors->has('training_cost') ? ' is-invalid' : ''), 'step' => '0.01', 'required' => 'required']) }}
                            @error('training_cost')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Employee -->
                    <div class="col-md-12 mb-3">
                        <div class="form-group">
                            {{ Form::label('employee', __('Employee'), ['class' => 'form-control-label']) }}
                            {{ Form::select('employee', $employees, old('employee'), ['class' => 'form-control select2' . ($errors->has('employee') ? ' is-invalid' : ''), 'required' => 'required']) }}
                            @error('employee')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Start Date -->
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            {{ Form::label('start_date', __('Start Date'), ['class' => 'form-control-label']) }}
                            {{ Form::text('start_date', old('start_date'), ['class' => 'form-control datetimepicker' . ($errors->has('start_date') ? ' is-invalid' : ''), 'required' => 'required']) }}
                            @error('start_date')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- End Date -->
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            {{ Form::label('end_date', __('End Date'), ['class' => 'form-control-label']) }}
                            {{ Form::text('end_date', old('end_date'), ['class' => 'form-control datetimepicker' . ($errors->has('end_date') ? ' is-invalid' : ''), 'required' => 'required']) }}
                            @error('end_date')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="col-md-12 mb-3">
                        <div class="form-group">
                            {{ Form::label('description', __('Description'), ['class' => 'form-control-label']) }}
                            {{ Form::textarea('description', old('description'), ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => __('Description'), 'rows' => 3]) }}
                            @error('description')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Description (Arabic) -->
                    <div class="col-md-12 mb-3">
                        <div class="form-group">
                            {{ Form::label('description_ar', __('Description (Arabic)'), ['class' => 'form-control-label']) }}
                            {{ Form::textarea('description_ar', old('description_ar'), ['class' => 'form-control' . ($errors->has('description_ar') ? ' is-invalid' : ''), 'placeholder' => __('Description (Arabic)'), 'rows' => 3]) }}
                            @error('description_ar')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
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
