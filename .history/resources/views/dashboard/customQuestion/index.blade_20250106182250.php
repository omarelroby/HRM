@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Manage Training') }}
@endsection

@section('content')
<div class="row">

    <!-- Create Button -->
    <div class="d-flex justify-content-end mb-3">
        @can('Create Employee')
            <a href="#" data-bs-toggle="modal" data-bs-target="#addTrainingModal" class="btn btn-primary btn-lg">
                <i class="fas fa-plus"></i> {{ __('Create Job') }}
            </a>
        @endcan
    </div>
    @can('Create Custom Question')
    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
        <a href="#" data-url="{{ route('custom-question.create') }}" class="btn btn-primary btn-icon-only width-auto" data-ajax-popup="true" data-title="{{__('Create New Custom Question')}}">
            <i class="fa fa-plus"></i> {{__('Create')}}
        </a>
    </div>
@endcan
    <!-- Job List Card -->
    <div class="col-lg-12">
        <div class="row">

            <!-- Total Plans -->
            <div class="col-lg-4 col-md-6 d-flex">
                <div class="card flex-fill">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center overflow-hidden">
                            <div>
                                <span class="avatar avatar-lg bg-dark rounded-circle"><i class="ti ti-users"></i></span>
                            </div>
                            <div class="ms-2 overflow-hidden">
                                <p class="fs-12 fw-medium mb-1 text-truncate">Total Jobs</p>
                                <h4> {{ $data['total'] }}</h4>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- /Total Plans -->

            <!-- Total Plans -->
            <div class="col-lg-4 col-md-6 d-flex">
                <div class="card flex-fill">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center overflow-hidden">
                            <div>
                                <span class="avatar avatar-lg bg-success rounded-circle"><i class="ti ti-user-share"></i></span>
                            </div>
                            <div class="ms-2 overflow-hidden">
                                <p class="fs-12 fw-medium mb-1 text-truncate">Active Jobs</p>
                                <h4> {{ $data['active'] }}</h4>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- /Total Plans -->

            <!-- Inactive Plans -->
            <div class="col-lg-4 col-md-6 d-flex">
                <div class="card flex-fill">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center overflow-hidden">
                            <div>
                                <span class="avatar avatar-lg bg-danger rounded-circle"><i class="ti ti-user-pause"></i></span>
                            </div>
                            <div class="ms-2 overflow-hidden">
                                <p class="fs-12 fw-medium mb-1 text-truncate">InActive Jobse</p>
                                <h4>{{ $data['in_active'] }} </h4>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- /Inactive Companies -->



        </div>
        <div class="card shadow-sm">

            <div class="card-header text-white">
                <h5 class="card-title mb-0">{{ __('Job List') }}</h5>
            </div>
            @if (session('success'))
            <div class="alert alert-success" style="text-align: center;">{{ session('success') }}</div>
            @elseif (session('error'))
            <div class="alert alert-danger" style="text-align: center;">{{ session('error') }}</div>
            @endif
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>{{__('Question')}}</th>
                                <th>{{__('Is Required')}}</th>
                                <th width="3%">{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody class="font-style">
                            @foreach ($questions as $question)
                                <tr>
                                    <td>{{ $question->question }}</td>
                                    <td>
                                        @if($question->is_required=='yes')
                                            <span class="badge badge-soft-success">{{\App\models\CustomQuestion::$is_required[$question->is_required]}}</span>
                                        @else
                                            <span class="badge badge-soft-danger">{{\App\models\CustomQuestion::$is_required[$question->is_required]}}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @can('Edit Custom Question')
                                            <a href="#" data-url="{{ route('custom-question.edit',$question->id) }}" data-size="lg" data-ajax-popup="true" data-title="{{__('Edit Custom Question')}}" class="edit-icon btn btn-success" data-toggle="tooltip" data-original-title="{{__('Edit')}}"><i class="fa fa-edit"></i></a>
                                        @endcan
                                        @can('Delete Custom Question')
                                            <a href="#" class="delete-icon btn btn-danger" data-toggle="tooltip" data-original-title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$question->id}}').submit();"><i class="fa fa-trash"></i></a>
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['custom-question.destroy', $question->id],'id'=>'delete-form-'.$question->id]) !!}
                                            {!! Form::close() !!}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Job Modal -->
<div class="modal fade" id="addTrainingModal" tabindex="-1" aria-labelledby="addTrainingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header text-white">
                <h5 class="modal-title" id="addTrainingModalLabel">{{ __('Add Job') }}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">

                {{ Form::open(['url' => 'job', 'method' => 'post', 'class' => 'needs-validation', 'novalidate' => true]) }}
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
                                    {!! Form::text('title', old('title'), ['class' => 'form-control', 'required' => 'required', 'placeholder' => __('Enter job title')]) !!}
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
                                    {!! Form::text('position', old('positions'), ['class' => 'form-control', 'required' => 'required', 'placeholder' => __('Enter number of positions')]) !!}
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
                                    {!! Form::text('start_date', old('start_date'), ['class' => 'form-control datepicker', 'placeholder' => __('Select start date')]) !!}
                                </div>

                                <!-- End Date -->
                                <div class="mb-3">
                                    {!! Form::label('end_date', __('End Date'), ['class' => 'form-label']) !!}
                                    {!! Form::text('end_date', old('end_date'), ['class' => 'form-control datepicker', 'placeholder' => __('Select end date')]) !!}
                                </div>

                                <!-- Skills -->
                                <div class="mb-3">
                                    {!! Form::label('skill', __('Skills'), ['class' => 'form-label']) !!}
                                    <input type="text" class="form-control" data-toggle="tags" name="skill" placeholder="{{ __('Add skills (e.g., PHP, JavaScript)') }}" />
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
                                        <input type="checkbox" class="form-check-input" name="applicant[]" value="gender" id="check-gender">
                                        <label class="form-check-label" for="check-gender">{{ __('Gender') }}</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="applicant[]" value="dob" id="check-dob">
                                        <label class="form-check-label" for="check-dob">{{ __('Date of Birth') }}</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="applicant[]" value="country" id="check-country">
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
                                        <input type="checkbox" class="form-check-input" name="visibility[]" value="profile" id="check-profile">
                                        <label class="form-check-label" for="check-profile">{{ __('Profile Image') }}</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="visibility[]" value="resume" id="check-resume">
                                        <label class="form-check-label" for="check-resume">{{ __('Resume') }}</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="visibility[]" value="letter" id="check-letter">
                                        <label class="form-check-label" for="check-letter">{{ __('Cover Letter') }}</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="visibility[]" value="terms" id="check-terms">
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
                                        <input type="checkbox" class="form-check-input" name="custom_question[]" value="{{ $question->id }}" id="custom_question_{{ $question->id }}">
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
                                <textarea class="form-control summernote-simple" name="description" rows="5" placeholder="{{ __('Enter job description...') }}"></textarea>
                            </div>
                        </div>

                        <div class="card shadow-sm mb-3">
                            <div class="card-header bg-light">
                                <h6 class="mb-0">{{ __('Job Requirements') }}</h6>
                            </div>
                            <div class="card-body">
                                <textarea class="form-control summernote-simple" name="requirement" rows="5" placeholder="{{ __('Enter job requirements...') }}"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="col-md-12 text-end">
                        <button type="submit" class="btn btn-primary">{{ __('Create Job') }}</button>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
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
