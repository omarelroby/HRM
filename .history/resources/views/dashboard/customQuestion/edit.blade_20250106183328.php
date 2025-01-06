@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Job') }}
@endsection

@section('content')
    <div class="row">
        <!-- Card for Job Title Update -->
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header   text-white">
                    <h5 class="mb-0">{{ __('Update Job') }}</h5>
                </div>
                <div class="card-body">
                    {{ Form::model($customQuestion, ['route' => ['custom-question.update', $customQuestion->id], 'method' => 'PUT', 'class' => 'needs-validation', 'novalidate']) }}
                    <div class="row">
                        <!-- Question Field -->
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                {{ Form::label('question', __('Question'), ['class' => 'form-label']) }}
                                {{ Form::text('question', null, ['class' => 'form-control', 'placeholder' => __('Enter question'), 'required' => 'required']) }}
                                <div class="invalid-feedback">{{ __('Please enter a question.') }}</div>
                            </div>
                        </div>

                        <!-- Is Required Field -->
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                {{ Form::label('is_required', __('Is Required'), ['class' => 'form-label']) }}
                                {{ Form::select('is_required', $is_required, null, ['class' => 'form-control select2', 'required' => 'required']) }}
                                <div class="invalid-feedback">{{ __('Please select whether the question is required.') }}</div>
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                            <button type="button" class="btn btn-close-white" data-dismiss="modal">{{ __('Cancel') }}</button>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Datepicker Script -->
    <script>
        $(function () {
            $(".datepicker").hijriDatePicker({
                format: 'YYYY-M-D',
                showSwitcher: false,
                hijri: false,
                useCurrent: true,
            });
        });
    </script>
@endsection
