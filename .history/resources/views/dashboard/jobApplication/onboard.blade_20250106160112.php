@extends('dashboard.layouts.master')
@section('page-title')
    {{__('Manage Job OnBoard')}}
@endsection


@section('content')
<div class="row">

    <!-- Create Button -->
    <div class="d-flex justify-content-end mb-3">
        @can('Create Interview Schedule')
        <a href="#" data-url="{{ route('job.on.board.create',0)}}" data-ajax-popup="true" class="btn btn-primary btn-icon-only width-auto" data-title="{{__('Create New Job OnBoard')}}">
            <i class="fa fa-plus"></i> {{__('Create')}}
        </a>
        @endcan
    </div>
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
                                <th>{{__('Branch')}}</th>
                                <th>{{__('Title')}}</th>
                                <th>{{__('Start Date')}}</th>
                                <th>{{__('End Date')}}</th>
                                <th>{{__('Status')}}</th>
                                <th>{{__('Created At')}}</th>
                                @if( Gate::check('Edit Job') || Gate::check('Delete Job') || Gate::check('Show Job'))
                                    <th width="3%">{{ __('Action') }}</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody class="font-style">
                            @foreach ($jobs as $job)
                                <tr>
                                    <td>{{ !empty($job->branches) ? $job->branches->name : __('All') }}</td>
                                    <td>{{ $job->title }}</td>
                                    <td>{{ \Auth::user()->dateFormat($job->start_date) }}</td>
                                    <td>{{ \Auth::user()->dateFormat($job->end_date) }}</td>
                                    <td>
                                        @if($job->status == 'active')
                                            <span class="badge badge-success">{{ App\Models\Job::$status[$job->status] }}</span>
                                        @else
                                            <span class="badge badge-danger">{{ App\Models\Job::$status[$job->status] }}</span>
                                        @endif
                                    </td>
                                    <td>{{ \Auth::user()->dateFormat($job->created_at) }}</td>
                                    @if( Gate::check('Edit Job') || Gate::check('Delete Job') || Gate::check('Show Job'))
                                        <td>
                                            @if($job->status != 'in_active')
                                                <a href="{{ route('job.requirement', [$job->code, !empty($job) ? $job->createdBy->lang : 'en']) }}" class="btn btn-info btn-sm" data-toggle="tooltip" title="{{ __('Click to copy') }}"><i class="fa fa-link"></i></a>
                                            @endif
                                            @can('Show Job')
                                                <a href="{{ route('job.show', $job->id) }}" class="btn btn-success btn-sm" data-toggle="tooltip" title="{{ __('View Detail') }}"><i class="fa fa-eye"></i></a>
                                            @endcan
                                            @can('Edit Job')
                                                <a href="{{ route('job.edit', $job->id) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" title="{{ __('Edit') }}"><i class="fa fa-edit"></i></a>
                                            @endcan
                                            @can('Delete Job')
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['job.destroy', $job->id], 'onsubmit' => 'return confirm("{{ __("Are You Sure?") }}\n{{ __("This action cannot be undone. Do you want to continue?") }}");']) !!}
                                                <button type="submit" class="btn btn-danger btn-sm delete-job" data-toggle="tooltip" title="{{ __('Delete') }}">
                                                    <i class="fa fa-trash"></i>
                                                </button>
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

<div class="row">

    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5></h5>
            </div>
            <div class="ibox-content">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables" >
                        <thead>
                            <tr>
                                <th>{{__('Name')}}</th>
                                <th>{{__('Job')}}</th>
                                <th>{{__('Branch')}}</th>
                                <th>{{__('Applied at')}}</th>
                                <th>{{__('Joining at')}}</th>
                                <th>{{__('Status')}}</th>
                                <th width="3%">{{__('Action')}}</th>
                            </tr>
                        </thead>
                        <tbody class="font-style">
                            @foreach ($jobOnBoards as $job)
                                <tr>
                                    <td>{{ !empty($job->applications)?$job->applications->name:'-' }}</td>
                                    <td>{{!empty($job->applications)?!empty($job->applications->jobs)?$job->applications->jobs->title:'-':'-'}}</td>
                                    <td>{{!empty($job->applications)?!empty($job->applications->jobs)?!empty($job->applications->jobs)?!empty($job->applications->jobs->branches)?$job->applications->jobs->branches->name:'-':'-':'-':'-'}}</td>
                                    <td>{{\Auth::user()->dateFormat(!empty($job->applications)?$job->applications->created_at:'-' )}}</td>
                                    <td>{{\Auth::user()->dateFormat($job->joining_date)}}</td>
                                    <td>
                                        @if($job->status=='pending')
                                            <span class="badge badge-soft-warning">{{\App\Models\JobOnBoard::$status[$job->status]}}</span>
                                        @elseif($job->status=='cancel')
                                            <span class="badge badge-soft-danger">{{\App\models\JobOnBoard::$status[$job->status]}}</span>
                                        @else
                                            <span class="badge badge-soft-success">{{\App\models\JobOnBoard::$status[$job->status]}}</span>
                                        @endif
                                    </td>

                                    <td class="text-right action-btns">
                                        @if($job->status=='confirm' && $job->convert_to_employee==0)
                                            <a href="{{route('job.on.board.convert', $job->id)}}" class="edit-icon btn btn-success bg-info" data-toggle="tooltip" data-original-title="{{__('Convert to Employee')}}"><i class="fas fa-exchange-alt"></i></a>
                                        @elseif($job->status=='confirm' && $job->convert_to_employee!=0)
                                            <a href="{{route('employee.show', \Crypt::encrypt($job->convert_to_employee))}}" class="edit-icon btn btn-success bg-info" data-toggle="tooltip" data-original-title="{{__('Employee Detail')}}"><i class="fas fa-eye"></i></a>
                                        @endif

                                        <a href="#" data-url="{{route('job.on.board.edit', $job->id)}}" data-ajax-popup="true" class="edit-icon btn btn-success" data-toggle="tooltip" data-original-title="{{__('Edit')}}"><i class="fas fa-edit"></i></a>

                                        <a href="#" class="delete-icon btn btn-danger" data-toggle="tooltip" data-original-title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$job->id}}').submit();"><i class="fas fa-trash"></i></a>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['job.on.board.delete', $job->id],'id'=>'delete-form-'.$job->id]) !!}
                                        {!! Form::close() !!}

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

