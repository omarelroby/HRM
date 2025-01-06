
@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Job') }}
@endsection

@section('content')
    <div class="row">
        <!-- Card for Job Title Update -->
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header  text-white">
                    <h5 class="mb-0">{{ __('Update Job') }}</h5>
                </div>
                <div class="card-body">
                    {{ Form::model($job, ['route' => ['job.update', $job->id], 'method' => 'PUT', 'class' => 'needs-validation', 'novalidate' => true]) }}
                    <div class="row g-3">
                        <!-- Left Column: Job Details -->
                        <div class="col-md-6">
                            <div class="card shadow-sm mb-3">
                                <div class="card-header bg-light">
                                    <h6 class="mb-0">{{ __('Job Details') }}</h6>
                                </div>
                                <div class="card-body">
                                    <!-- Job Title -->
                                    <div class="mb-3">
                                        {!! Form::label('title', __('Job Title'), ['class' => 'form-label']) !!}
                                        {!! Form::text('title', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => __('Enter job title')]) !!}
                                        <div class="invalid-feedback">{{ __('Please enter a job title.') }}</div>
                                    </div>

                                    <!-- Branch -->
                                    <div class="mb-3">
                                        {!! Form::label('branch', __('Branch'), ['class' => 'form-label']) !!}
                                        {{ Form::select('branch', $branches, null, ['class' => 'form-control select2', 'required' => 'required', 'placeholder' => __('Select branch')]) }}
                                        <div class="invalid-feedback">{{ __('Please select a branch.') }}</div>
                                    </div>

                                    <!-- Job Category -->
                                    <div class="mb-3">
                                        {!! Form::label('category', __('Job Category'), ['class' => 'form-label']) !!}
                                        {{ Form::select('category', $categories, null, ['class' => 'form-control select2', 'required' => 'required', 'placeholder' => __('Select category')]) }}
                                        <div class="invalid-feedback">{{ __('Please select a job category.') }}</div>
                                    </div>

                                    <!-- Positions -->
                                    <div class="mb-3">
                                        {!! Form::label('position', __('Positions'), ['class' => 'form-label']) !!}
                                        {!! Form::text('position', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => __('Enter number of positions')]) !!}
                                        <div class="invalid-feedback">{{ __('Please enter the number of positions.') }}</div>
                                    </div>

                                    <!-- Status -->
                                    <div class="mb-3">
                                        {!! Form::label('status', __('Status'), ['class' => 'form-label']) !!}
                                        {{ Form::select('status', $status, null, ['class' => 'form-control select2', 'required' => 'required', 'placeholder' => __('Select status')]) }}
                                        <div class="invalid-feedback">{{ __('Please select a status.') }}</div>
                                    </div>

                                    <!-- Start Date -->
                                    <div class="mb-3">
                                        {!! Form::label('start_date', __('Start Date'), ['class' => 'form-label']) !!}
                                        {!! Form::text('start_date', null, ['class' => 'form-control datepicker', 'placeholder' => __('Select start date')]) !!}
                                    </div>

                                    <!-- End Date -->
                                    <div class="mb-3">
                                        {!! Form::label('end_date', __('End Date'), ['class' => 'form-label']) !!}
                                        {!! Form::text('end_date', null, ['class' => 'form-control datepicker', 'placeholder' => __('Select end date')]) !!}
                                    </div>

                                    <!-- Skills -->
                                    <div class="mb-3">
                                        {!! Form::label('skill', __('Skills'), ['class' => 'form-label']) !!}
                                        <input type="text" class="form-control" value="{{ $job->skill }}" data-toggle="tags" name="skill" placeholder="{{ __('Add skills (e.g., PHP, JavaScript)') }}" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column: Additional Options -->
                        <div class="col-md-6">
                            <!-- Questions to Ask -->
                            <div class="card shadow-sm mb-3">
                                <div class="card-header bg-light">
                                    <h6 class="mb-0">{{ __('Questions to Ask') }}</h6>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="applicant[]" value="gender" id="check-gender" {{ in_array('gender', $job->applicant) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="check-gender">{{ __('Gender') }}</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="applicant[]" value="dob" id="check-dob" {{ in_array('dob', $job->applicant) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="check-dob">{{ __('Date of Birth') }}</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="applicant[]" value="country" id="check-country" {{ in_array('country', $job->applicant) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="check-country">{{ __('Country') }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Visibility Options -->
                            <div class="card shadow-sm mb-3">
                                <div class="card-header bg-light">
                                    <h6 class="mb-0">{{ __('Visibility Options') }}</h6>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="visibility[]" value="profile" id="check-profile" {{ in_array('profile', $job->visibility) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="check-profile">{{ __('Profile Image') }}</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="visibility[]" value="resume" id="check-resume" {{ in_array('resume', $job->visibility) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="check-resume">{{ __('Resume') }}</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="visibility[]" value="letter" id="check-letter" {{ in_array('letter', $job->visibility) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="check-letter">{{ __('Cover Letter') }}</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="visibility[]" value="terms" id="check-terms" {{ in_array('terms', $job->visibility) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="check-terms">{{ __('Terms and Conditions') }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Custom Questions -->
                            <div class="card shadow-sm mb-3">
                                <div class="card-header bg-light">
                                    <h6 class="mb-0">{{ __('Custom Questions') }}</h6>
                                </div>
                                <div class="card-body">
                                    @foreach($customQuestion as $question)
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="custom_question[]" value="{{ $question->id }}" id="custom_question_{{ $question->id }}" {{ in_array($question->id, $job->custom_question) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="custom_question_{{ $question->id }}">{{ $question->question }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Job Description and Requirements -->
                        <div class="col-md-12">
                            <div class="card shadow-sm mb-3">
                                <div class="card-header bg-light">
                                    <h6 class="mb-0">{{ __('Job Description') }}</h6>
                                </div>
                                <div class="card-body">
                                    <textarea class="form-control summernote-simple" name="description" rows="5" placeholder="{{ __('Enter job description...') }}">{{ $job->description }}</textarea>
                                </div>
                            </div>

                            <div class="card shadow-sm mb-3">
                                <div class="card-header bg-light">
                                    <h6 class="mb-0">{{ __('Job Requirements') }}</h6>
                                </div>
                                <div class="card-body">
                                    <textarea class="form-control summernote-simple" name="requirement" rows="5" placeholder="{{ __('Enter job requirements...') }}">{{ $job->requirement }}</textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="col-md-12 text-end">
                            <button type="submit" class="btn btn-primary">{{ __('Update Job') }}</button>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function () {
            $(".gregorian-date, .datepicker").hijriDatePicker({
                format: 'YYYY-M-D',
                showSwitcher: false,
                hijri: false,
                useCurrent: true,
            });
        });
    </script>
@endsection












   {{Form::model($jobOnBoard,array('route' => array('job.on.board.update', $jobOnBoard->id), 'method' => 'post')) }}
    <div class="row">
        <div class="form-group col-md-12">
            {!! Form::label('joining_date', __('Joining Date'),['class'=>'form-control-label']) !!}
            {!! Form::text('joining_date', null, ['class' => 'form-control datepicker']) !!}
        </div>
        <div class="form-group col-md-12">
            {{Form::label('status',__('Status'),['class'=>'form-control-label'])}}
            {{Form::select('status',$status,null,array('class'=>'form-control select2'))}}
        </div>
        <div class="col-12">
            <input type="submit" value="{{__('Update')}}" class="btn btn-primary">
            <input type="button" value="{{__('Cancel')}}" class="btn btn-white" data-dismiss="modal">
        </div>
    </div>
    {{Form::close()}}

    <script>
        $(function () {
            $(".gregorian-date , .datepicker").hijriDatePicker({
            format:'YYYY-M-D',
            showSwitcher: false,
            hijri:false,
            useCurrent: true,
            });
        });
    </script>

